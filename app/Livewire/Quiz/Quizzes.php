<?php

namespace App\Livewire\Quiz;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class Quizzes extends Component
{
    use WithPagination;
    public $tab = 'newest';
    public $search = '';

    public $listerners = [
        '$refresh'
    ];
    public function render()
    {
        $quizzes = $this->fetchQuizzes();
        return view('livewire.quiz.quizzes', ['quizzes' => $quizzes]);
    }
    public function fetchQuizzes()
    {
        // Fetch posts based on the active tab.
        // For simplicity, this example assumes a 'created_at' for newest and a 'likes_count' for popular.
        // Adjust the query as per your actual database structure.
        return $this->tab === 'newest'
            ? Quiz::where('title', 'like', '%' . $this->search . '%')->latest()->get()
            : Quiz::where('title', 'like', '%' . $this->search . '%')->orderBy('likes_count', 'desc')->take(10)->paginate(10);
    }
    public function switchTab($tabName)
    {
        $this->tab = $tabName;
    }
}
