<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\YandexPay
 *
 * @property int $id
 * @property string $status
 * @property string $yandex_id
 * @property string|null $description
 * @property string|null $confirmation_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bill|null $bill
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereConfirmationUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereYandexId($value)
 * @mixin \Eloquent
 */
class YandexPay extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_SUCCEEDED = 'succeeded';
    const STATUS_CANCELED = 'canceled';

    protected $guarded = [];

    public function bill()
    {
        return $this->morphOne(Bill::class, 'payment_system');
    }
}
