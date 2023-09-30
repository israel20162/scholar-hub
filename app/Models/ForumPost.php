<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'tags', 'user_id','image_path'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(ForumPostReply::class, 'post_id');
    }
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes');
    }
}
