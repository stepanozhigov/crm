<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $logo
 * @property string|null $content_page
 * @property string|null $commission
 * @property int $status
 * @property string|null $maturity_of_money
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereContentPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereMaturityOfMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PaymentMethod extends Model
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    protected $guarded = [];

    public function isRBK(): bool
    {
        return $this->name === 'РБК';
    }

    public function isPayPal(): bool
    {
        return $this->name === 'PayPal';
    }

    public function isYandex(): bool
    {
        return $this->name === 'Yandex';
    }

    public function isStripe(): bool
    {
        return $this->name === 'Stripe';
    }
}
