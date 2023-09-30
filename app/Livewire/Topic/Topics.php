<?php

namespace App\Livewire\Topic;

use App\Models\Topic;
use Livewire\Component;
use Livewire\WithPagination;

class Topics extends Component
{
    use WithPagination;
    public $tab = 'newest';
    public $search = '';

    public $listerners = [
        '$refresh'
    ];

    public function render()
    {
        $topics = $this->fetchTopics();
        return view('livewire.topic.topics',['topics'=>$topics]);
    }
    public function fetchTopics()
    {
        // Fetch posts based on the active tab.
        // For simplicity, this example assumes a 'created_at' for newest and a 'likes_count' for popular.
        // Adjust the query as per your actual database structure.
        return $this->tab === 'newest'
            ? Topic::where('title', 'like', '%' . $this->search . '%')->latest()->take(10)->paginate(10)
            : Topic::where('title', 'like', '%' . $this->search . '%')->orderBy('likes_count', 'desc')->take(10)->paginate(10);
    }

    public function switchTab($tabName)
    {
        $this->tab = $tabName;
    }

}
