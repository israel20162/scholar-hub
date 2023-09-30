<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'quizzes';
    protected $fillable = ['user_id', 'quiz', 'title', 'time_limit'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
