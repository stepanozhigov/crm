<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;


/**
 * App\Models\ClientProduct
 *
 * @property int $client_id
 * @property int $product_id
 * @property int|null $bill_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientProduct extends Pivot
{
    //
}
