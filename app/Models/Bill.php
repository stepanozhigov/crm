<?php

namespace App\Models;

use App\Helpers\CurrencyHelper;
use Arr;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Bill
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $product_id
 * @property int|null $payment_system_id
 * @property string|null $payment_system_type
 * @property int $invoice_status
 * @property string|null $paid_at
 * @property int|null $sum
 * @property int|null $discount_id
 * @property int|null $sum_src
 * @property string|null $referrer
 * @property int|null $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $coautors
 * @property-read int|null $coautors_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $paymentSystem
 * @property-read \App\Models\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Tag|null $tag
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereDiscountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereInvoiceStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill wherePaymentSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill wherePaymentSystemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereReferrer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereSumSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bill extends Model
{
    const STATUS_CREATED   = 1;
    const STATUS_WAIT      = 2;
    const STATUS_PAID      = 3;
    const STATUS_CANCELLED = 4;
    const STATUS_REFUNDED  = 5;
    const STATUS_FAILED    = 6;

    protected $guarded = [];
    protected $casts = [
        'invoice' => 'array',
//        'paid_at' => 'timestamp'
    ];

    public function getIdHash()
    {
        return strtr(base64_encode($this->id), '+/=', '._-');
    }

    public function getProductsNameString(): string
    {
        $products = $this->products->all();
        if ($products) {
            return implode(', ', Arr::pluck($products, 'name'));
        } else {
            return '';
        }
    }

    public function getRbkInvoiceId()
    {
        return ($this->paymentSystem && $this->paymentSystem->getMorphClass() == RbkPay::class)
            ? $this->paymentSystem->invoice_id
            : '';
    }

    public function statusCreated()
    {
        return $this->invoice_status === self::STATUS_CREATED;
    }

    public function statusWait()
    {
        return $this->invoice_status === self::STATUS_WAIT;
    }

    public function statusPaid()
    {
        return $this->invoice_status === self::STATUS_PAID;
    }

    public function statusCanceled()
    {
        return $this->invoice_status === self::STATUS_CANCELLED;
    }

    public function statusRefunded()
    {
        return $this->invoice_status === self::STATUS_REFUNDED;
    }

    public function paymentSystem()
    {
        return $this->morphTo();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(BillProduct::class)
            ->withTimestamps();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function coautors()
    {
        return $this->belongsToMany(Bill::class)
            ->using(CoauthorBill::class)
            ->withPivot(['sum'])
            ->withTimestamps();
    }

    public function upSales()
    {
        return $this->hasMany(BillProduct::class);
    }

    /**
     * Get bill sum in a currency’s smallest unit for payment systems
     *
     * @return int
     */
    public function getSumAmount(): int
    {
        if (CurrencyHelper::isZeroDecimal($this->product->project->currency)) {
            return $this->sum * 100;
        }

        return $this->sum;
    }
}
