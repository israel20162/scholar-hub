<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Livewire\Component;

class ViewNotesPost extends Component
{
    public $noteId;

    public function mount($noteId)
    {
        $this->noteId = $noteId;
    }

    public function render()
    {
        $note = Note::find($this->noteId);
        return view('livewire.notes.view-notes-post', ['note' => $note]);
    }
}
