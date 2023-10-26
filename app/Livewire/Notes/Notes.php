<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Livewire\Component;
use Livewire\WithPagination;

class Notes extends Component
{
    use WithPagination;

    public $search = '';
     public $tab = 'newest';
    public function mount()
    {

    }

    public function fetchNotes()
    {
        // Fetch posts based on the active tab.
        // For simplicity, this example assumes a 'created_at' for newest and a 'likes_count' for popular.
        // Adjust the query as per your actual database structure.
        return $this->tab === 'newest'
            ? Note::where('title', 'like', '%' . $this->search . '%')->latest()->paginate(10)
            : Note::where('title', 'like', '%' . $this->search . '%')->orderBy('likes_count', 'desc')->take(10);
    }
    public function render()
    {
        $notes = $this->fetchNotes();
        return view('livewire.notes.notes',['notes'=>$notes]);
    }

     public function switchTab($tabName)
    {
        $this->tab = $tabName;
    }
}
