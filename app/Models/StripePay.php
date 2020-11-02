<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StripePay
 *
 * @property string $payment_id
 * @property int $amount
 * @property string $currency
 * @property string $status
 * @property-read \App\Models\Bill|null $bill
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay whereStripeId($value)
 * @mixin \Eloquent
 */
class StripePay extends Model
{
    const STATUS_SUCCEEDED               = 'succeeded';
    const STATUS_REQUIRES_PAYMENT_METHOD = 'requires_payment_method';   // Status for both PaymentIntent created and attempt failed events

    public function bill()
    {
        return $this->morphOne(Bill::class, 'payment_system');
    }
}
