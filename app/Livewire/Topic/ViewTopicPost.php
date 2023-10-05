<?php

namespace App\Livewire\Topic;

use App\Models\Topic;
use App\Models\TopicPostReply;
use Livewire\Component;

class ViewTopicPost extends Component
{
    public $topicId;
    public $topic;
    public $reply;

    public function mount($topicId)
    {
        $this->topicId = $topicId;
        $this->loadPost();
    }
    public function loadPost()
    {
        $this->topic = Topic::find($this->topicId);
    }
        public function render()
    {
        return view('livewire.topic.view-topic-post');
    }
    public function addReply()
    {
        $this->validate([
            'reply' => 'required|min:3',
        ]);



        TopicPostReply::create([
            'topic_id' => $this->topicId,
            'body' => $this->reply,
            'user_id' => auth()->id()
        ]);

        $this->reply = ''; // Clear the input
        $this->loadPost(); // Refresh the post with the new reply
    }
    public function likePost()
    {
        $this->topic->likedByUsers()->attach(auth()?->id());
        $this->topic->increment('likes_count');
        $this->loadPost(); // Refresh the post data after liking
    }

    public function unlikePost()
    {
        $this->topic->likedByUsers()->detach(auth()?->id());
        $this->topic->decrement('likes_count');
        $this->loadPost(); // Refresh the post data after unliking
    }
}
