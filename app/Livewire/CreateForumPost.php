<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ForumPost;
use Livewire\WithFileUploads;

class CreateForumPost extends Component
{
    use WithFileUploads;
    public $title;
    public $body;
    public $image;
    public $tags ='';

    public function createPost()
    {
        $this->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:10',
            'tags' => 'string',
            'image' => 'nullable|image|max:2048',
        ]);
        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('forum-images', 'public'); // Store the image
        }
         $tags = array_map('trim', explode(',', $this->tags,3));

        ForumPost::create([
            'title' => $this->title,
            'body' => $this->body,
            'tags' => json_encode($tags),
            'user_id' => auth()->id(),
            'image_path' => $imagePath, // Assuming each post is tied to a user
        ]);

        session()->flash('message', 'Forum post successfully created.');

        return redirect()->to('/forums'); // Redirect user to forum main page after post creation
    }

    public function render()
    {
        return view('livewire.create-forum-post');
    }
}
