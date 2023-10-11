<?php

namespace App\Livewire\Topic;

use Livewire\Attributes\On;
use Livewire\Component;

class QuillEditor extends Component
{
    public $body;
   
    // #[On('draft-saved')]
    // public function foo()
    // {
        
        
    // }
    public function saveDraft()
    {
      //  $this->dispatch('//);
    }
    public function render()
    {
        return view('livewire.topic.quill-editor');
    }
}
