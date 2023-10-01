<?php

namespace App\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Events\MessageSent;
use App\Models\Message;


class ChatForm extends Component
{
    public $message;

    public $messages;

    public $to_id;

    public $from_id;


    public function mount($from_id, $to_id)
    {
        $this->to_id = $to_id;
        $this->from_id = $from_id;
        $this->messages = Message::where(function ($query,) {
            $query->whereIn('from_id', [$this->to_id, $this->from_id])
                ->whereIn('to_id', [$this->to_id, $this->from_id]);
        })->get();
        //dd($this->messages);
    }
    // #[On('update')]
    // public function updateMessage($message)
    // {


    // }

    public function sendMessage()
    {


        $user = Auth::user();

        $message = Message::create([
            'message' => $this->message,
            'from_id' => $user->id,
            'to_id' => $this->to_id
        ]);


        $this->messages[] = $message;
        // dd($message);
        // $this->dispatch('update',$message);

      MessageSent::dispatch($message);




        //event(new MessageSent('Your message content here'));




        //   event(new MessageSent('Someone'));
        $this->message = ''; // reset the input
    }

    public function render()
    {
        return view('livewire.chat.chat-form');
    }
}
