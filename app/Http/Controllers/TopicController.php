<?php

namespace App\Http\Controllers;


use App\Models\Topic;
use App\Models\TopicUserViews;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TopicController extends Controller
{
    public function index()
    {
        return view('topic.index');
    }
    public function single(int $id)
    { // Key for caching
        $cacheKey = "topic_{$id}_views";


        // get the cache
        $views = Cache::get($cacheKey);
        //   dd($views);
        $view_exist = TopicUserViews::where('topic_id', $id)->where('user_id', auth()->id())->first();

        if (!$view_exist) {
            $views = Cache::increment($cacheKey);
            TopicUserViews::create([
                'user_id' => auth()->id(),
                'topic_id' => $id
            ]);

        }

        if ($views >= 1) {

            Topic::find($id)->increment('views', $views);
            Cache::forget($cacheKey);
        }

        return view('topic.single', ['topicId' => $id]);
    }
    public function createTopic()
    {
        return view('topic.create');
    }
    public function editTopic($id)
    {
        return view('topic.edit',['topicId'=>$id]);
    }
}
