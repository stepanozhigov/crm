<?php


namespace App\Services\PaymentServices;


use App\Helpers\BillHelper;
use App\Models\Bill;
use App\Models\Client;
use App\Models\RbkPay;
use App\Services\Bill\BillRepository;
use App\Services\Bill\BillService;
use App\Services\PaymentServices\HttpHandlers\Rbk\RbkInvoiceHandler;
use App\Services\PaymentServices\HttpHandlers\Rbk\RbkPaymentHandler;


class RbkService
{
    private $invoiceHandler;
    private $paymentHandler;
    private $billRepository;

    public function __construct(RbkInvoiceHandler $invoiceHandler, RbkPaymentHandler $paymentHandler, BillRepository $billRepository)
    {
        $this->invoiceHandler = $invoiceHandler;
        $this->paymentHandler = $paymentHandler;
        $this->billRepository = $billRepository;
    }

    public function createInvoice(Bill $bill): string
    {
        $response = $this->invoiceHandler->createInvoice($bill);
        $data = [
            'invoice' => $response->json()['invoice'],
            'invoice_id' => $response->json()['invoice']['id'],
            'invoice_access_token' => $response->json()['invoiceAccessToken']['payload']
        ];

        //add rbk model to bill
        $rbkModel = $this->billRepository->createRbkModel($data);
        $bill->paymentSystem()->associate($rbkModel)->save();

        return $rbkModel->invoice_access_token;
    }

    public function getAccessToken(Bill $bill): ?string
    {
        if ($invoiceId = $bill->getRbkInvoiceId()) {

            $invoiceResponse = $this->invoiceHandler->getInvoiceByID($invoiceId);
            $invoiceStatus = $invoiceResponse->json()['status'];
            $invoiceAmount = $invoiceResponse->json()['amount'];

            if ($invoiceStatus == RbkPay::STATUS_UNPAID) {
                if ($bill->sum == $invoiceAmount) {
                    $accessToken = $bill->paymentSystem->invoice_access_token;
                } else { //if the amount is different, close old and create new invoice
                    $this->invoiceHandler->rescindInvoice($invoiceId, 'new invoice create');
                    $this->billRepository->rescindRbkInvoice($invoiceId);
                    $accessToken = $this->createInvoice($bill);
                }
            } else {
                $billStatus = BillHelper::getBillStatusFromRbk($invoiceStatus);
                $this->billRepository->changeStatus($bill, $billStatus);
                $accessToken = null;
            }
        } else {
            $accessToken = $this->createInvoice($bill);
        }

        return $accessToken;

    }

    public function createInvoiceAccessToken(string $invoiceId): ?string
    {
        $response = $this->invoiceHandler->createInvoiceAccessToken($invoiceId);
        //return access token
        return $response->json()['payload'] ?? null;
    }

    public function createPayment(Bill $bill, array $paymentData)
    {
        $response = $this->paymentHandler->createPayment($bill->getRbkInvoiceId(), $bill->client, $paymentData['token'], $paymentData['session']);
        if (isset($response->json()['id'])) {
            $this->billRepository->fillRbkPayment($bill, $response->json()['id']);
            return true;
        } else {
            return false;
        }
    }

    public function getPaymentByID(RbkPay $rbk)
    {
        if ($rbk->payment_id) {
            $response = $this->paymentHandler->getPaymentByID($rbk->invoice_id, $rbk->payment_id);
            return $response->json();
        } else {
            return null;
        }
    }


    public function getInvoiceEvents(string $invoiceId, string $billId): ?array
    {
        $response = $this->invoiceHandler->getInvoiceEvents($invoiceId);
        $changes = $response->json();
        $lastChange = array_pop($changes)['changes'][0];
        //for payment without 3d-secure
        if ($lastChange['changeType'] == 'PaymentStatusChanged' && $lastChange['status'] == 'captured') {
            $events['status'] = RbkPay::INVOICE_EVENT_PAID;
        } elseif ($lastChange['changeType'] == 'PaymentInteractionRequested') {
        //for payment with 3d-secure
            $userInteractionRequest = $lastChange['userInteraction']['request'];
            $userInteractionRequest['form'][0]['template'] = str_replace('{?termination_uri}','?termination_uri=' . urlencode (env('COMMON_DOMAIN') . "/bill/$billId"), $userInteractionRequest['form'][0]['template']);
            $events['status'] = RbkPay::INVOICE_EVENT_REDIRECT;
            $events['userInteractionRequest'] = $userInteractionRequest;
        }

        return $events ?? null;
    }

    public function checkInvoiceEvents(string $rbkInvoiceId, string $billId): ?array
    {
        for ($try = 0; $try < 30; $try++) {
            sleep(1);
            $paymentEvent = $this->getInvoiceEvents($rbkInvoiceId, $billId);

            if ($paymentEvent) {
                return $paymentEvent;
            }
        }

        return null;
    }


}
