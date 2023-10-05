<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
      protected $fillable = ['title', 'body', 'categories','category_id', 'user_id','image_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(TopicPostReply::class, 'topic_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_topic_likes');
    }
}
