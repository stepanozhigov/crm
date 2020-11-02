<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Product
 *
 * @property int $id
 * @property int|null $project_id
 * @property int $type
 * @property string $name
 * @property string|null $title
 * @property string|null $youtube_id
 * @property string|null $content
 * @property string|null $content_video
 * @property int $price
 * @property int|null $fake_price
 * @property int $unlim_bills
 * @property int $private
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $bills
 * @property-read int|null $bills_count
 * @property-read \App\Models\Coauthor|null $coauthor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discount[] $discounts
 * @property-read int|null $discounts_count
 * @property-read \App\Models\MailerliteGroup|null $mailerGroupFree
 * @property-read \App\Models\MailerliteGroup|null $mailerGroupPaid
 * @property-read \App\Models\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UpSale[] $upSalesActive
 * @property-read int|null $up_sales_active_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UpSale[] $upSalesProducts
 * @property-read int|null $up_sales_products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereContentVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFakePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUnlimBills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereYoutubeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product withoutTrashed()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use SoftDeletes;

    const TYPE_OK = 1; // main course
    const TYPE_SK = 2; // special course
    const TYPE_CONSULT = 3;
    const TYPE_CONSTRUCT = 4;
    const TYPE_OTHER = 5;

    protected $fillable = ['project_id', 'type', 'name', 'title', 'youtube_id', 'content', 'content_video', 'price', 'fake_price', 'unlim_bills', 'private'];

    public function belongProject(int $projectId): bool
    {
        return $this->project_id === $projectId;
    }

    public function coauthor()
    {
        return $this->hasOne(Coauthor::class);
    }

    public function upSalesActive()
    {
        return $this->hasOne(UpSale::class, 'product_id')->where('status', 1)->with('additionalProducts');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class)
            ->using(DiscountProduct::class);
    }

    public function bills()
    {
        return $this->belongsToMany(Bill::class)
            ->using(BillProduct::class)
            ->withTimestamps();
    }

    public function mailerGroupFree()
    {
        return $this->hasOne(MailerliteGroup::class)->where('paid', MailerliteGroup::FREE);
    }

    public function mailerGroupPaid()
    {
        return $this->hasOne(MailerliteGroup::class)->where('paid', MailerliteGroup::PAID);
    }

    public function typeConstructor()
    {
        return $this->type === self::TYPE_CONSTRUCT;
    }

    /**
     * List of visible product types in personal area
     *
     * @return array
     */
    public static function visibleProductTypes(): array
    {
        return [self::TYPE_OK, self::TYPE_SK, self::TYPE_OTHER];
    }
}
