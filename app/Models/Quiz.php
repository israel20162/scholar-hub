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
    public function results()
    {
        return $this->hasMany(QuizResult::class);
    }

    // Calculate the average score dynamically
    public function averageScore()
    {
        return $this->results()->avg('score');
    }

    // Calculate the number of times the quiz was taken
    public function timesTaken()
    {
        return $this->results()->count();
    }
}
