<?php


namespace App\Services\PaymentServices\HttpHandlers\Rbk;


use App\Models\Bill;
use App\Models\Client;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class RbkInvoiceHandler extends RbkHandler
{
    public function createInvoice(Bill $bill, string $currency = 'RUB'): ?Response
    {
        $command = [
            "shopID" => env('RBK_ID_SHOP'),
            "amount" => $bill->sum * 100, //TODO maybe fix for foreign currencies
            "currency" => $currency,
            "metadata" => [
                "bill_id" => $bill->id
            ],
            "dueDate" => Carbon::now()->add(CarbonInterval::month(3))->format('Y-m-d\TH:i:s\Z'),
            "product" => 'Продукты счета №' . $bill->id,
            "description" => 'Описание: ' . $bill->getProductsNameString()
        ];
        $url = "https://api.rbk.money/v2/processing/invoices";

        return $this->sendPostRequest($url, $command);
    }

    public function getInvoiceByID(string $invoiceId): ?Response
    {
        $url = "https://api.rbk.money/v2/processing/invoices/{$invoiceId}";
        return $this->sendGetRequest($url);
    }

    public function createInvoiceAccessToken(string $invoiceId): ?Response
    {
        $url = "https://api.rbk.money/v2/processing/invoices/{$invoiceId}/access-tokens";
        return $this->sendPostRequest($url);
    }

    public function rescindInvoice(string $invoiceId, string $reason = ''): ?Response
    {
        $url = "https://api.rbk.money/v2/processing/invoices/{$invoiceId}/rescind";
        $command = [
          'reason' => $reason
        ];

        return $this->sendPostRequest($url, $command);
    }

    public function getInvoiceEvents(string $invoiceId)
    {
        $url = "https://api.rbk.money/v2/processing/invoices/{$invoiceId}/events?limit=50";
        return  $this->sendGetRequest($url);
    }

}
