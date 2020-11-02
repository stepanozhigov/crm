<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\RbkPay
 *
 * @property int $id
 * @property array $invoice
 * @property string $status
 * @property string $invoice_id
 * @property string|null $payment_id
 * @property string $invoice_access_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $user_interaction_request
 * @property-read \App\Models\Bill|null $bill
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereInvoiceAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereUserInteractionRequest($value)
 * @mixin \Eloquent
 */
class RbkPay extends Model
{
    const STATUS_UNPAID = 'unpaid';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_PAID = 'paid';
    const STATUS_FULFILLED = 'fulfilled';

    const INVOICE_EVENT_PAID = 'paid';
    const INVOICE_EVENT_REDIRECT = 'redirect';

    protected $fillable = ['invoice', 'invoice_access_token', 'invoice_id', 'payment_id', 'status', 'user_interaction_request'];
    protected $casts = [
        'invoice' => 'array',
        'user_interaction_request' => 'array'
    ];

    public function bill()
    {
        return $this->morphOne(Bill::class, 'payment_system');
    }
}
