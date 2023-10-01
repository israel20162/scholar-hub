<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Livewire\Component;

class Notes extends Component
{
    public $notes;
    public function mount()
    {
        $this->notes = Note::get();
    }
    public function render()
    {
        return view('livewire.notes.notes',['notes'=>$this->notes]);
    }
}
