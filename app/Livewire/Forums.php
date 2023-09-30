<?php

namespace App\Livewire;

use App\Models\ForumPost;
//use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Forums extends Component
{
    use WithPagination;
    public $tab = 'newest';
    public $search = '';

    public $listerners = [
        '$refresh'
    ];


    public function render()
    {
        $posts = $this->fetchPosts();

        return view('livewire.forums', ['posts' => $posts]);
    }

    public function fetchPosts()
    {
        // Fetch posts based on the active tab.
        // For simplicity, this example assumes a 'created_at' for newest and a 'likes_count' for popular.
        // Adjust the query as per your actual database structure.
        return $this->tab === 'newest'
            ? ForumPost::where('title', 'like', '%' . $this->search . '%')->latest()->take(10)->paginate(10)
            : ForumPost::where('title', 'like', '%' . $this->search . '%')->orderBy('likes_count', 'desc')->take(10)->paginate(10);
    }

    public function switchTab($tabName)
    {
        $this->tab = $tabName;
    }

}
