<?php


namespace App\Helpers;


use App\Models\Bill;
use App\Models\Discount;
use App\Models\Product;
use App\Models\RbkPay;
use App\Models\StripePay;
use App\Models\YandexPay;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class BillHelper
{
    public static function getSumLabel(Collection $products): string
    {
        $sum = $products->sum('pivot.price');

        return "<span class='bill_sum'>{$sum}</span><br>";
    }

    public static function getInvoiceStatusLabel(int $status, string $billId): string
    {
        $url = Url::route('common.bill.index', ['bill' => $billId]);

        switch ($status) {
            case Bill::STATUS_CREATED:
                return "<a target='_blank' href='$url'>создан</a>";
            case Bill::STATUS_WAIT:
                return "<a target='_blank' href='$url'>ожидается</a>";
            case Bill::STATUS_PAID:
                return '<span class="badge badge badge-success">оплачен</span></a>';
            case Bill::STATUS_CANCELLED:
                return 'отменен';
            case Bill::STATUS_REFUNDED:
                return '<span class="badge badge badge-warning">возврат</span>';
            case Bill::STATUS_FAILED:
                return '<span class="badge badge badge-warning">ошибка</span>';
        }
    }

    public static function calculateSum(Product $product, Discount $discount)
    {
        $baseSum = $product->price;

        if ($discount->typeCurrency()) {
            $baseSum -= $discount->size;
        } elseif ($discount->typePercent()) {
            $baseSum *= (100 - $discount->size) / 100;
        }

    return (int)$baseSum;
}

    public static function getNamesListProducts(Collection $products): string
    {
        $label = '';
        foreach ($products as $product) {
            $label .=  "<span>$product->name</span><br>";
        }

        return $label;
    }

    public static function checkBillPageSetting(array $blockSettings, Bill $bill): bool
    {
        //if checked product, compare only by product
        if (isset($blockSettings['product'])) {
            if (in_array($bill->product_id, $blockSettings['product'])) {
                return true;
            }
        } else {
            if (
                isset($blockSettings['project'])
                && isset($blockSettings['product_type'])
                && in_array($bill->product->project_id, $blockSettings['project'])
                && in_array($bill->product->type, $blockSettings['product_type'])
            ) {
                return true;
            }
        }

        return false;
    }

    public static function getBillStatusFromRbk(string $invoiceStatus): int
    {
        switch ($invoiceStatus) {
            case RbkPay::STATUS_CANCELLED:
                return Bill::STATUS_CANCELLED;
            case RbkPay::STATUS_PAID:
            case RbkPay::STATUS_FULFILLED:
                return Bill::STATUS_PAID;
            case RbkPay::STATUS_UNPAID:
                return Bill::STATUS_CREATED;
            default:
                return 0;
        }
    }

    public static function getPaymentName(?Model $paymentSystem): string
    {
        if (null === $paymentSystem) {
            return '';
        }

        $paymentsMap = [
            RbkPay::class    => 'RBK',
            YandexPay::class => 'Yandex',
            StripePay::class => 'Stripe',
        ];
    
        return $paymentsMap[$paymentSystem->getMorphClass()] ?? '';
    }

    /**
     * Get bill status from stripe status value
     *
     * @param string $status
     *
     * @return int
     */
    public static function getBillStatusFromStripe(string $status): int
    {
        switch ($status) {
            case StripePay::STATUS_SUCCEEDED:
                return Bill::STATUS_PAID;
            case StripePay::STATUS_REQUIRES_PAYMENT_METHOD:
                return Bill::STATUS_FAILED;
            default:
                return 0;
        }
    }
}
