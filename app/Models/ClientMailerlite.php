<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ClientMailerlite
 *
 * @property int $id
 * @property int $client_id
 * @property string $ml_client_id
 * @property int|null $mailerlite_group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\MailerliteGroup|null $mailerliteGroup
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereMailerliteGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereMlClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientMailerlite extends Model
{
    protected $fillable = ['client_id', 'ml_client_id', 'mailerlite_group_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function mailerliteGroup()
    {
        return $this->belongsTo(MailerliteGroup::class);
    }
}
