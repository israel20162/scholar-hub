<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPostReply extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'body','likes_count'];

    public function post()
    {
        return $this->belongsTo(ForumPost::class,'post_id');
    }

    /**
     * Get the user that owns the function.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
