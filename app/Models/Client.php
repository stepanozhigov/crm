<?php

namespace App\Models;

use Arr;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property int $status
 * @property string $password
 * @property int|null $tag_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $bills
 * @property-read int|null $bills_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ClientMailerlite[] $subscribers
 * @property-read int|null $subscribers_count
 * @property-read \App\Models\Tag|null $tag
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Client extends \Illuminate\Foundation\Auth\User
{
    use Notifiable;

    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;

    protected $fillable = [
        'name', 'email', 'status', 'phone', 'tag_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * List of owned products
     *
     * @param int $projectId
     *
     * @return Collection
     */
    public function openCourses(int $projectId): Collection
    {
        return $this->belongsToMany(Product::class)
            ->using(ClientProduct::class)
            ->whereIn('type', Product::visibleProductTypes())
            ->where('project_id', $projectId)
            ->get();
    }

    public function hasProduct($productId)
    {
        return in_array($productId, \Arr::pluck($this->products, 'id'));
    }

    //check if client has comments
    public function hasComment($commentId)
    {
        return in_array($commentId, \Arr::pluck($this->comments, 'id'));
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function projectMatch($subdomain): bool
    {
        $allowSubdomains = Arr::pluck($this->projects, 'domain');
        return in_array($subdomain, $allowSubdomains);
    }

    public function hasMailerGroup(MailerliteGroup $group): bool
    {
        if ($this->subscribers->isNotEmpty()) {
            foreach ($this->subscribers as $subscriber) {
                if ($subscriber->ml_client_id === $group->id) {
                    return true;
                }
            }
        }

        return false;
    }

    public function subscriberForMlGroupId($groupId): ?Model
    {
        return $this->hasOne(ClientMailerlite::class)
            ->where('mailerlite_group_id', $groupId)
            ->first();
    }

    public function subscribers()
    {
        return $this->hasMany(ClientMailerlite::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class)
            ->using(ClientProject::class)
            ->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(ClientProduct::class)
            ->withTimestamps();
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
