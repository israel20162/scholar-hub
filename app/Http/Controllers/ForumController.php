<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        return view('forum.index');
    }
    public function singleForum(int $id)
    {

        return view('forum.single', ['postId' => $id]);

    }
    public function createForum()
    {
        return view('forum.create');
    }
}
