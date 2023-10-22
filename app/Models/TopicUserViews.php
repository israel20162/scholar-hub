<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicUserViews extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'topic_id'];
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
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
