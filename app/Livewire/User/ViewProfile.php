<?php

namespace App\Livewire\User;

use Livewire\Component;

class ViewProfile extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.user.view-profile');
    }
}
