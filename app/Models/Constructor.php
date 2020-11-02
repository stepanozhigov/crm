<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;


/**
 * App\Models\Constructor
 *
 * @property int $product_id
 * @property int $project_id
 * @property string|null $discount1
 * @property string|null $discount2
 * @property string|null $discount3
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Constructor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Constructor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Constructor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Constructor whereDiscount1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Constructor whereDiscount2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Constructor whereDiscount3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Constructor whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Constructor whereProjectId($value)
 * @mixin \Eloquent
 */
class Constructor extends Pivot
{
    protected $table = 'constructors';
    public $timestamps = false;
}
