<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\MailerliteGroup
 *
 * @property int $id
 * @property int $ml_group_id
 * @property string $name
 * @property int $product_id
 * @property int $paid
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereMlGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MailerliteGroup extends Model
{
    const FREE = 0;
    const PAID = 1;

    protected $fillable = ['name', 'ml_group_id', 'product_id', 'paid'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
