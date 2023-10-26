<?php

namespace App\Http\Controllers;


use App\Models\ForumPost;
use App\Models\Quiz;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{
    public function homePage()
    {
        $trendingTopics = Topic::orderBy('likes_count', 'desc')->take(3)->get();
        $latestQuizzes = Quiz::latest()->take(3)->get();
        $latestForumPosts = ForumPost::latest()->orderBy('likes_count', 'desc')->take(3)->get();
        $users = User::get();
        $newUsers = User::whereDate('created_at', '>=', Carbon::now()->subWeek())->get()->count();
        return view('home', ['users' => $users, 'newUserCount' => $newUsers, 'topicCount' => Topic::count(), 'quizCount' => Quiz::count(), 'topics' => $trendingTopics, 'quizzes' => $latestQuizzes, 'forumPosts' => $latestForumPosts]);
    }

    /**
     * @param  Request $request
     */
    public function userProfile(User $id, $user, Request $request)
    {

        return view('user.profile',['user'=>$id]);
    }
    public function showUserProfile(User $user)
    {
        return view('user.view-profile', compact('user'));
    }
}
