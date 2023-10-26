<?php

namespace App\Livewire\User;

use Livewire\Component;

class Profile extends Component
{
    public $user;
    public $bio;             // Contains the bio content.
    public $isEditing = false;
    public function toggleEdit()
    {
        $this->isEditing = !$this->isEditing;
    }// Toggles the input/textarea.
    public function saveBio()
    {
        $this->user->update([
            'bio'=>$this->bio
        ]);

        $this->isEditing = false; // Hide the textarea after saving.
    }

    public function mount($user)
    {
        $this->user = $user;
        $this->bio = $user->bio;
    }
    public function render()
    {
        return view('livewire.user.profile');
    }
}
