<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;



/**
 * App\Models\ProductUpSale
 *
 * @property int $id
 * @property int $up_sale_id
 * @property int $additional_product_id
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductUpSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductUpSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductUpSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductUpSale whereAdditionalProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductUpSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductUpSale whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductUpSale whereUpSaleId($value)
 * @mixin \Eloquent
 */
class ProductUpSale extends Pivot
{
    //
}
