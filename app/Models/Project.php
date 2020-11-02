<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property string $domain
 * @property string $language
 * @property string $currency
 * @property array|null $constructor_settings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \App\Models\Product|null $constructor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PaymentMethod[] $paymentActiveMethods
 * @property-read int|null $payment_active_methods_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PaymentMethod[] $paymentMethods
 * @property-read int|null $payment_methods_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $productsForConstructor
 * @property-read int|null $products_for_constructor_count
 * @property-read \App\Models\Product|null $productsOK
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $productsSK
 * @property-read int|null $products_s_k_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereConstructorSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereName($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    const LANG_RU = 'ru';
    const LANG_EN = 'en';

    public $timestamps = false;

    protected $fillable = ['name', 'domain', 'language', 'currency', 'constructor_settings'];
    protected $casts = [
        'constructor_settings' => 'array'
    ];

    public static function current($subdomain): ?Model
    {
        return Project::where('domain', $subdomain)->first();
    }

    public function paymentMethods()
    {
        return $this->belongsToMany(PaymentMethod::class)
            ->using(PaymentMethodProject::class);
    }

    //get payment systems with status=1, order by pivot table "payment_method_project" value
    public function paymentActiveMethods()
    {
        return $this->belongsToMany(PaymentMethod::class)
            ->where('status', PaymentMethod::STATUS_ACTIVE)
            ->using(PaymentMethodProject::class)
            ->withPivot('order')
            ->orderBy('pivot_order','asc');
    }

    public function constructor()
    {
        return $this->hasOne(Product::class)->where('type', Product::TYPE_CONSTRUCT);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class)
            ->using(ClientProject::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productsSK()
    {
        return $this->hasMany(Product::class)->where('type', Product::TYPE_SK);
    }

    public function productsOK()
    {
        return $this->hasOne(Product::class)->where('type', Product::TYPE_OK);
    }

    public function productsForConstructor()
    {
        return $this->belongsToMany(Product::class,'constructors')
            ->using(Constructor::class);
    }

}
