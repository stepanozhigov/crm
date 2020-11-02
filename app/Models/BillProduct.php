<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;


/**
 * App\Models\BillProduct
 *
 * @property int $bill_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BillProduct extends Pivot
{

}
