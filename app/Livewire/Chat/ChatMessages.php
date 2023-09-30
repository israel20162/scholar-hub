<?php

namespace App\Livewire\Chat;

use Livewire\Attributes\On;
use Livewire\Component;

class ChatMessages extends Component
{
    public $userId;
    public $messages=[];
   // protected $lisecho:chat.10,MessageSentteners = ['message.event' => 'handleNewMessage'];
    #[On('Echo')]
    public function handleNewMessage($event)
    {
      $this->messages[]=$event;
        // Handle the incoming broadcasted data.
    }

    public function render()
    {
        return view('livewire.chat.chat-messages');
    }
}
