<?php

namespace App\Livewire\Topic;

use App\Models\Topic;
use Livewire\Component;

class ViewTopicPost extends Component
{
    public $topicId;
    public $topic;

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
}
