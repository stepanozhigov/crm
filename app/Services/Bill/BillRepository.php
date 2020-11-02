<?php


namespace App\Services\Bill;


use App\Helpers\BillHelper;
use App\Models\Bill;
use App\Models\Client;
use App\Models\Discount;
use App\Models\Product;
use App\Models\RbkPay;
use App\Models\YandexPay;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BillRepository
{

    public function getAllPaginateWithRelations(int $count): LengthAwarePaginator
    {
        return Bill::query()->with('client', 'products')->paginate($count);
    }

    public function getBillByProduct(Client $client, Product $product, ?int $discountId = null): ?Bill
    {
        $query = Bill::query()
            ->where('client_id', $client->id)
            ->where('product_id', $product->id)
            ->where('invoice_status', '!=', Bill::STATUS_PAID);

        if ($discountId) {
            $query->where('discount_id', $discountId);
        }

        return $query->first();
    }

    public function create(Client $client, Product $product, ?int $tagId, ?Discount $discount = null, ?int $sum = null): Bill
    {
        $bill = new Bill([
            'client_id' => $client->id,
            'product_id' => $product->id,
            'invoice_status' => Bill::STATUS_CREATED,
            'sum_src' => $product->price,
            'tag_id' => $tagId
        ]);

        if ($discount) {
            $bill->fill([
                'discount_id' => $discount->id,
                'sum' => $sum,
            ]);
        } else {
            $bill->fill([
                'sum' => $product->price,
            ]);
        }

        $bill->save();

        return $bill;
    }

    public function createForConstructor(Client $client, Product $product, int $sumSrc, int $sum): Bill
    {
        $bill = new Bill([
            'client_id' => $client->id,
            'product_id' => $product->id,
            'invoice_status' => Bill::STATUS_CREATED,
            'sum_src' => $sumSrc,
            'sum' => $sum,
        ]);

        $bill->save();

        return $bill;
    }

    public function updatePrice(Bill $bill, int $sumSrc, int $sum)
    {
        $bill->sum_src = $sumSrc;
        $bill->sum = $sum;

        $bill->save();
    }

    public function increaseUpSaleCost(Bill $bill, int $sumUpSale): Bill
    {
        $bill->sum_src += $sumUpSale;
        $bill->sum += $sumUpSale;
        $bill->save();

        return $bill;
    }

    public function cutUpSaleCost(Bill $bill, int $sumUpSale): Bill
    {
        $bill->sum_src -= $sumUpSale;
        $bill->sum -= $sumUpSale;
        $bill->save();

        return $bill;
    }

    public function createRbkModel(array $data): RbkPay
    {
        $rbkModel = new RbkPay($data);
        $rbkModel->status = RbkPay::STATUS_UNPAID;
        $rbkModel->save();

        return $rbkModel;
    }

    public function fillRbkPayment(Bill $bill, string $paymentId)
    {
        $bill->paymentSystem->payment_id = $paymentId;
        $bill->paymentSystem->save();
    }

    public function changeStatus(Bill $bill, int $billStatus)
    {
        $bill->invoice_status = $billStatus;
        $bill->save();
    }

    public function changeRbkStatusPaid(Bill $bill, RbkPay $rbkModel)
    {
        $bill->invoice_status = Bill::STATUS_PAID;
        $bill->paid_at = Carbon::now();
        $rbkModel->status = RbkPay::STATUS_PAID;
        $bill->push();
    }

    public function changeBillStatusPaid(Bill $bill)
    {
        $bill->invoice_status = Bill::STATUS_PAID;
        $bill->paid_at = Carbon::now();
        $bill->save();
    }

    public function rescindRbkInvoice(string $invoiceId)
    {
        $rbkModel = RbkPay::where('invoice_id', $invoiceId)->first();
        $rbkModel->status = RbkPay::STATUS_CANCELLED;
        $rbkModel->save();
    }

    public function createYandexModel(array $data): YandexPay
    {
        $yandexModel = new YandexPay($data);
        $yandexModel->save();

        return $yandexModel;
    }

    public function changeRbkModel(RbkPay $rbk, array $data): RbkPay
    {
        $rbk->fill($data)->save();
        return $rbk;
    }

}
