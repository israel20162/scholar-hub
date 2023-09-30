<?php

namespace App\Livewire\Topic;

use App\Models\Topic;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTopicPost extends Component
{
    use WithFileUploads;
    public $title;
    public $body;
    public $image;
    public $categories = '';
    public function createTopic()
    {
        $this->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:10',
            'categories' => 'string',
            'image' => 'nullable|image|max:2048',
        ]);
        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('topic-images', 'public'); // Store the image
        }
        $categories = array_map('trim', explode(',', $this->categories, 3));

        Topic::create([
            'title' => $this->title,
            'body' => $this->body,
            'categories' => json_encode($categories),
            'user_id' => auth()->id(),
            'image_path' => $imagePath, // Assuming each post is tied to a user
        ]);

        session()->flash('message', 'Topic successfully created.');

        return redirect()->to('/topics'); // Redirect user to topic main page after post creation
    }
    public function render()
    {
        return view('livewire.topic.create-topic-post');
    }
}
