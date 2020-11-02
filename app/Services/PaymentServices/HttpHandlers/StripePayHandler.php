<?php


namespace App\Services\PaymentServices\HttpHandlers;

use App\Events\BillPaid;
use App\Helpers\BillHelper;
use App\Models\Bill;
use App\Models\StripePay;
use App\Services\Bill\BillRepository;
use DB;
use Exception;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Stripe;
use Stripe\Webhook;
use Throwable;

/**
 * Service for handling stripe payment
 */
class StripePayHandler
{
    private $webhookSecret;
    private $repository;

    const DEFAULT_CURRENCY = 'usd';
    const RETRY_COUNT      = 3;

    public function __construct(BillRepository $repository)
    {
        $this->repository = $repository;

        $secretKey           = config('stripe.secret');
        $this->webhookSecret = config('stripe.webhook_secret');

        if (null === $secretKey) {
            throw new Exception('Stripe secret key not set');
        }
        if (null === $this->webhookSecret) {
            throw new Exception('Stripe webhook secret key not set');
        }

        Stripe::setApiKey($secretKey);
        Stripe::setMaxNetworkRetries(self::RETRY_COUNT);
    }

    /**
     * Create PaymentIntent and get client secret for bill
     * 
     * @param Bill $bill
     *
     * @return string
     */
    public function getClientSecret(Bill $bill): string
    {
        $paymentIntent = PaymentIntent::create([
            'amount'   => $bill->getSumAmount(),
            'currency' => $bill->product->project->currency,
            'metadata' => ['billId' => $bill->id],
        ]);

        return $paymentIntent->client_secret;
    }

    /**
     * Create PaymentMethod and get id
     * 
     * @param int $number
     * @param int $expMonth
     * @param int $expYear
     * @param int $cvc
     *
     * @return string
     */
    public function getPaymentId(int $number, int $expMonth, int $expYear, int $cvc): string
    {
       $method = PaymentMethod::create([
        'type' => 'card',
        'card' => [
            'number'    => $number,
            'exp_month' => $expMonth,
            'exp_year'  => $expYear,
            'cvc'       => $cvc,
            ],
        ]);

        return $method->id;
    }

    /**
     * Handle stripe webhook
     *
     * @param Request $request
     *
     * @return void
     *
     * @author Sergey Yashin <Serg41-lineage@mail.ru>
     */
    public function handleWebhook(Request $request)
    {
        $data   = $request->all()['data']['object'];
        $billId = $data['metadata']['billId'] ?? null;
        if (null === $billId) {
            return;
        }

        DB::beginTransaction();
        try {
            $sigHeader = $request->server('HTTP_STRIPE_SIGNATURE');
            Webhook::constructEvent($request->getContent(), $sigHeader, $this->webhookSecret);

            $bill = Bill::find($billId);
            if (null === $bill) {
                throw new Exception('Bill for stripe payment not found');
            }

            /** @var StripePay */
            $payment = $bill->paymentSystem;
            if (null === $payment) {
                $payment             = new StripePay;
                $payment->payment_id = $data['id'];
                $payment->amount     = $data['amount'];
                $payment->currency   = $data['currency'];
                $payment->status     = $data['status'];
                $payment->save();

                $bill->paymentSystem()->associate($payment)->save();
            } else {
                $payment->status = $data['status'];
                $payment->save();
            }

            $billStatus = BillHelper::getBillStatusFromStripe($payment->status);
            $this->repository->changeStatus($bill, $billStatus);

            DB::commit();

            if (StripePay::STATUS_SUCCEEDED === $payment->status) {
                $this->repository->changeBillStatusPaid($bill);
                event(new BillPaid($bill));
            }
        }
        catch (Throwable $e) {
            DB::rollback();

            throw $e;
        }
    }
}