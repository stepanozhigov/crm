<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;


/**
 * App\Models\PaymentMethodProject
 *
 * @property int $payment_method_id
 * @property int $project_id
 * @property int $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject whereProjectId($value)
 * @mixin \Eloquent
 * @property int $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject whereOrder($value)
 */
class PaymentMethodProject extends Pivot
{
    //
}
