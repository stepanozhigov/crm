<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Email
 *
 * @property int $id
 * @property string $email
 * @property int|null $client_id
 * @property string $subject
 * @property string $content
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Email whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Email extends Model
{
    protected $fillable = ['email', 'client_id', 'subject', 'content', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
