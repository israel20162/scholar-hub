<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadNotesPost extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $note_pdf;

    public function uploadNote()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'note_pdf' => 'required|mimes:pdf|max:10240', // 10 MB max
        ]);
        if ($this->note_pdf) {

            $filePath = $this->note_pdf->store('app/notes','public');
        }
        Note::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'file_path' => $filePath,
        ]);

        // Reset the fields
        $this->reset(['title', 'description', 'note_pdf']);

        session()->flash('message', 'Note uploaded successfully.');
    }

    public function render()
    {
        return view('livewire.notes.upload-notes-post');
    }
}
