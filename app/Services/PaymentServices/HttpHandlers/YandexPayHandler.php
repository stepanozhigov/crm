<?php


namespace App\Services\PaymentServices\HttpHandlers;


use App\Models\Bill;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use YandexCheckout\Client;
use YandexCheckout\Request\Payments\CreatePaymentResponse;
use YandexCheckout\Request\Payments\PaymentResponse;

class YandexPayHandler
{
    private $client;
    private $returnUrl;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->returnUrl = env('COMMON_DOMAIN').'/ya/success/';
        $this->client->setAuth(env('YANDEX_LOGIN'), env('YANDEX_PASSWORD'));
    }

    public function createPayment(Bill $bill): CreatePaymentResponse
    {
        $paymentData =
            [
                'amount' => [
                    'value' => $bill->sum,
                    'currency' => 'RUB',
                ],
                'payment_method_data' => [
                    'type' => 'bank_card',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => $this->returnUrl . $bill->getIdHash(),
                ],
                'description' => 'Заказ №' . $bill->id,
                'capture' => true,
            ];

        return $this->client->createPayment($paymentData, uniqid('', true));
    }

    public function getPaymentInfo($paymentId): PaymentResponse
    {
        return $this->client->getPaymentInfo($paymentId);
    }
}
