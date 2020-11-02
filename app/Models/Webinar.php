<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Webinar
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $page_title
 * @property string|null $title
 * @property string|null $description
 * @property string $video_frame
 * @property string|null $buttons
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereButtons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar wherePageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereVideoFrame($value)
 * @mixin \Eloquent
 */
class Webinar extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
