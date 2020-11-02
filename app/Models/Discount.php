<?php

namespace App\Models;

use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Discount
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $size
 * @property int $type
 * @property string|null $start_date
 * @property string|null $end_date
 * @property bool $sw_time_limit
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereSwTimeLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Discount extends Model
{
    use FormAccessible;

    const TYPE_CURRENCY = 1;
    const TYPE_PERCENT = 2;

    protected $fillable = [
        'name',
        'description',
        'size',
        'type',
        'start_date',
        'end_date',
        'sw_time_limit'
    ];

    protected $casts = [
        'sw_time_limit' => 'boolean'
    ];

    public function typeCurrency(): bool
    {
        return $this->type === self::TYPE_CURRENCY;
    }

    public function typePercent(): bool
    {
        return $this->type === self::TYPE_PERCENT;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(DiscountProduct::class);
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function formStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function formEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

}
