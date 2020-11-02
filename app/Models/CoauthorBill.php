<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;


/**
 * App\Models\CoauthorBill
 *
 * @property int $bill_id
 * @property int $coauthor_id
 * @property int $sum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoauthorBill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoauthorBill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoauthorBill query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoauthorBill whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoauthorBill whereCoauthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoauthorBill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoauthorBill whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoauthorBill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CoauthorBill extends Pivot
{
    protected $table = 'coauthor_bill';
}
