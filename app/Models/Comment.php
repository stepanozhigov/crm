<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'client_id', 'content', 'approved', 'private', 'parent_id'];

    protected $casts = [
        'approved' => 'boolean',
        'private' => 'boolean',
    ];

    //check if client comment
    public function isClientComment(): bool
    {
        return $this->client_id != env('COMMENT_ADMIN_ID');
    }

    //check if is admin replies
    public function isAdminComment(): bool
    {
        return $this->client_id == env('COMMENT_ADMIN_ID');
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

    public function scopePublicOnlyOrOfClient($query,$client_id) {
        return $query->where('client_id',$client_id)->orWhere('private',0);
    }

    //comment by admin or client with id
    public function scopeByClient($query,$client)
    {
        if($client == 'admin')
            return $query->where('client_id', env('COMMENT_ADMIN_ID'));
        return $query->where('client_id', $client);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    //approved replies to comment
    public function childrenApproved()
    {
        return $this->hasMany(Comment::class,
        'parent_id',
        'id')->where('approved', true);
    }

    //reply to comment (not trashed)
    public function reply()
    {
        return $this->hasOne(Comment::class,
            'parent_id',
            'id');
    }

    //reply to comment (not trashed)
    public function replyTo()
    {
        return $this->belongsTo(Comment::class,
            'parent_id',
            'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
