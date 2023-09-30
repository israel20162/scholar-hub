<?php

namespace App\Livewire;

use Livewire\Component;

class Timer extends Component
{
    public $secondsRemaining;
    public $initialMinutes;

    public function mount($initialMinutes = 10)
    {
        $this->secondsRemaining = $initialMinutes * 60;
        $this->initialMinutes = $initialMinutes;
    }

    public function stopTimer()
    {
        $this->secondsRemaining = 0;
        $this->emit('timerFinished'); // Emit this event to possibly handle actions in the parent component
    }

    public function decrementCount()
    {
        if ($this->secondsRemaining > 0) {
            $this->secondsRemaining--;
        }

        if ($this->secondsRemaining == 0) {
            $this->emit('timerFinished');
        }
    }
    public function render()
    {
        return view('livewire.timer');
    }
}
