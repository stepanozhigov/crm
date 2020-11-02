<?php


namespace App\Http\Controllers\Common;


use App\Models\Bill;
use App\Models\RbkPay;
use App\Models\YandexPay;
use App\Services\Bill\BillRepository;
use App\Services\PaymentServices\HttpHandlers\StripePayHandler;
use App\Services\PaymentServices\RbkService;
use App\Services\PaymentServices\YandexPayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Throwable;

class PaymentController extends Controller
{
    private $rbkService;
    private $billRepository;
    private $yandexPayService;

    public function __construct(RbkService $rbkService, YandexPayService $yandexPayService, BillRepository $billRepository)
    {
        $this->rbkService = $rbkService;
        $this->yandexPayService = $yandexPayService;
        $this->billRepository = $billRepository;
    }

    //ajax
    public function getInvoiceRbk(Request $request)
    {
        $bill = Bill::findOrFail($request->billId);

        $accessToken = $this->rbkService->getAccessToken($bill);

        if (!$accessToken) {
            return redirect()->route('common.bill.index', ['bill' => $bill->getIdHash()]);
        }

        return response()->json($accessToken);
    }

    public function rbkPay(Request $request, Bill $bill)
    {
        $paymentData = $request->validate([
            'token' => 'string',
            'session' => 'string'
        ]);

        /** @var RbkPay $rbk */
        $rbk = $bill->paymentSystem;

        $payment = $this->rbkService->getPaymentByID($rbk)
            ?: $this->rbkService->createPayment($bill, $paymentData);

        if ($payment) {
            $paymentEvent = $this->rbkService->checkInvoiceEvents($bill->getRbkInvoiceId(), $bill->getIdHash());

            if ($paymentEvent) {
                //if event type redirect - do redirect page, else check bill paid
                if ($paymentEvent['status'] == RbkPay::INVOICE_EVENT_REDIRECT) {
                    $this->billRepository->changeStatus($bill, Bill::STATUS_WAIT);
                    $this->billRepository->changeRbkModel($rbk, [
                        'user_interaction_request' => $paymentEvent['userInteractionRequest']
                    ]);
                    return view('common.bill.check-status', [
                            'userInteractionRequest' => $paymentEvent['userInteractionRequest']]
                    );
                } elseif ($paymentEvent['status'] == RbkPay::INVOICE_EVENT_PAID) {
                    return view('common.bill.payment-success', compact($bill));
                }
            }
        }

        return redirect()->route('common.bill.index', ['bill' => $bill->getIdHash()]);
    }

    //ajax
    public function yandexPay(Bill $bill)
    {
        //if yandex payment exist
        $paymentSystem = $bill->paymentSystem;
        if ($paymentSystem && $paymentSystem->getMorphClass() == YandexPay::class) {
            /** @var YandexPay $paymentSystem */
            $paymentInfo = $this->yandexPayService->getPaymentInfo($paymentSystem->yandex_id);
            //if payment not paid and sum the same - repay, else create new payment
            if ($paymentInfo->status == YandexPay::STATUS_PENDING && $paymentInfo->amount->value == $bill->sum) {
                return redirect()->away($paymentSystem->confirmation_url);
            }
        }

        $confirmation_url = $this->yandexPayService->createPayment($bill);
        return redirect()->away($confirmation_url);
    }

    /**
     * Create Stripe PaymentIntent and PaymentMethod and get data
     *
     * @param StripePayHandler $handler
     * @param Bill $bill
     * 
     * @return JsonResponse
     */
    public function getStripeData(StripePayHandler $handler, Bill $bill): JsonResponse
    {
        $number    = (int)request('number');
        $expMonth  = (int)request('expMonth');
        $expYear   = (int)request('expYear');
        $cvc       = (int)request('cvc');

        try {
            $secret    = $handler->getClientSecret($bill);
            $paymentId = $handler->getPaymentId($number, $expMonth, $expYear, $cvc);
        }
        catch (Throwable $e) {
            report($e);
            
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'clientSecret' => $secret,
                'paymentId'    => $paymentId,
            ]
        ]);
    }

    /**
     * Payment success page
     *
     * @return View
     */
    public function success(): View
    {
        return view('common.bill.payment-success');
    }
}
