<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','quiz_id','score'];

    // Many-to-one relationship: A result belongs to a quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
