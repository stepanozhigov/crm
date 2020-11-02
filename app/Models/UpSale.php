<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * App\Models\UpSale
 *
 * @property int $id
 * @property string $name
 * @property int $product_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $additionalProducts
 * @property-read int|null $additional_products_count
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UpSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UpSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UpSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UpSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UpSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UpSale whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UpSale whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UpSale whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UpSale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UpSale extends Model
{
    protected $fillable = ['product_id', 'name', 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function additionalProducts()
    {
        return $this->belongsToMany(Product::class,
            'product_up_sale',
        'up_sale_id',
        'additional_product_id')
            ->using(ProductUpSale::class);
    }


}
