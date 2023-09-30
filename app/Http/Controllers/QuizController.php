<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index');
    }
    public function single(int $id)
    {
        return view('quiz.single',['quizId'=>$id]);
    }
    public function createQuiz()
    {
        return view('quiz.create');
    }
}
