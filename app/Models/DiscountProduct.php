<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


/**
 * App\Models\DiscountProduct
 *
 * @property int $discount_id
 * @property int $product_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct whereDiscountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct whereProductId($value)
 * @mixin \Eloquent
 */
class DiscountProduct extends Pivot
{

}
