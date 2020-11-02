<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property bool $is_ml
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $bill
 * @property-read int|null $bill_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Client[] $client
 * @property-read int|null $client_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const TAG_LK = 'LK';

    protected $fillable = ['name', 'status', 'is_ml'];

    protected $casts = [
        'is_ml' => 'boolean'
    ];

    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function bill()
    {
        return $this->hasMany(Bill::class);
    }

    /**
     * Get tag type query
     *
     * @return Builder
     */
    public static function findTags(): Builder
    {
        return static::where('is_ml', false);
    }

    /**
     * Get mailerlite type query
     *
     * @return Builder
     */
    public static function findML(): Builder
    {
        return static::where('is_ml', true);
    }

    /**
     * Type name
     *
     * @return string
     */
    public function getTypeLabel(): string
    {
        return $this->is_ml ? 'MailerLite' : 'Tag';
    }
}
