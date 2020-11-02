<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Coauthor
 *
 * @property int $id
 * @property int $coauthor
 * @property int|null $product_id
 * @property int $commission
 * @property int $commission_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $bills
 * @property-read int|null $bills_count
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor whereCoauthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor whereCommissionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coauthor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Coauthor extends Model
{
    const COAUTHOR_ILIA = 1;
    const COAUTHOR_OKSANA = 2;

    const COMMISSION_TYPE_PERCENT = 1;
    const COMMISSION_TYPE_RUB = 2;

    protected $fillable = ['coauthor', 'commission', 'commission_type', 'product_id'];

    public function bills()
    {
        return $this->belongsToMany(Bill::class, 'coauthor_bill')
            ->using(CoauthorBill::class)
            ->withPivot(['sum'])
            ->withTimestamps();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getCommissionSum()
    {
        $productPrice = $this->product->price;
        if ($this->commission_type == self::COMMISSION_TYPE_PERCENT) {
            return $productPrice * $this->commission / 100;
        } else {
            return $this->commission;
        }
    }

    /**
     * Get list of coauthors
     *
     * @return array
     */
    public static function getCoauthors(): array
    {
        return [
            Coauthor::COAUTHOR_ILIA   => 'Илья',
            Coauthor::COAUTHOR_OKSANA => 'Оксана',
        ];
    }
}
