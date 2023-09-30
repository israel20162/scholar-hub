<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        return view('topic.index');
    }
    public function single(int $id)
    {
        return view('topic.single', ['topicId' => $id]);
    }
    public function createTopic()
    {
        return view('topic.create');
    }
}
