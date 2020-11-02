<?php


namespace App\Services\PaymentServices\HttpHandlers\Rbk;


use App\Models\Client;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class RbkPaymentHandler extends RbkHandler
{

    public function getPayments(string $invoiceId): ?Response
    {
        $url = "https://api.rbk.money/v2/processing/invoices/{$invoiceId}/payments";

        return $this->sendGetRequest($url);
    }

    public function getPaymentByID(string $invoiceId, string $paymentId): ?Response
    {
        $url = "https://api.rbk.money/v2/processing/invoices/{$invoiceId}/payments/{$paymentId}";
        $this->sendGetRequest($url);

        return $this->sendGetRequest($url);
    }


    public function createPayment(string $invoiceId, Client $client, string $paymentToolToken, string $paymentSession): ?Response
    {
        $command = [
            "flow" => [
                "type" => "PaymentFlowInstant",
            ],
            "payer" => [
                "payerType" => "PaymentResourcePayer",
                "paymentToolToken" => $paymentToolToken,
                "paymentSession" => $paymentSession,
                "contactInfo" => [
                    "email" => $client->email,
                    "phoneNumber" => $client->phone ?: '',
                ],
            ],
        ];
        $url = "https://api.rbk.money/v2/processing/invoices/{$invoiceId}/payments";

        return $this->sendPostRequest($url, $command);
    }

}
