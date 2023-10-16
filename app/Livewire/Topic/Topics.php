<?php

namespace App\Livewire\Topic;

use App\Models\Topic;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Topics extends Component
{
    use WithPagination;
    public $tab = 'newest';
    public $search = '';

    #[Url]
    public $tag = '';

  #[Url( as: 'cate',history: true)]
    public $category = '';

    #[Url( as: 'id',history: true)]
    public $category_id ='';

    public $listerners = [
        '$refresh'
    ];

    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category->name;
        $this->category_id = $category->id;
    }
    public function resetCategory()
    {
        $this->category = '';
        $this->category_id = '';
    }
    public function render()
    {
        $topics = $this->fetchTopics();
        return view('livewire.topic.topics', ['topics' => $topics]);
    }
    public function fetchTopics()
    {

        // Fetch posts based on the active tab.
        // For simplicity, this example assumes a 'created_at' for newest and a 'likes_count' for popular.
        // Adjust the query as per your actual database structure.
        return $this->tab === 'newest'
            ? Topic::when($this->category_id, function ($topic) {
                return $topic->where('title', 'like', '%' . $this->search . '%')->where('category_id', $this->category_id)->latest()->paginate(10);
            }, function ($topic) {
            return $topic->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        })
            : Topic::when($this->category_id, function ($topic) {
                return $topic->where('title', 'like', '%' . $this->search . '%')->where('category_id', $this->category_id)->orderBy('likes_count', 'desc')->paginate(10);
            }, function ($topic) {
            return $topic->where('title', 'like', '%' . $this->search . '%')->orderBy('likes_count', 'desc')->paginate(10);
        });
    }

    public function switchTab($tabName)
    {
        $this->tab = $tabName;
    }

}
