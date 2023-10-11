<?php

namespace App\Livewire\Topic;

use App\Models\Category;
use App\Models\Topic;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTopicPost extends Component
{
    use WithFileUploads;
    public $title;
    public $body = '';
    public $image;
    public $tags = '';
    public $category_id = 1;
    #[On('save-draft')]
    public function saveDraft($body)
    {
        $this->body = $body;
        $this->dispatch('draft-saved', $body)->to(QuillEditor::class);
       
    }

    #[Computed]
    public function categories()
    {
        return Category::get();
    }
    public function createTopic()
    {
        $this->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:10',
            'tags' => 'string',
            'category_id' => 'required|numeric|between:0,' . (count($this->categories())),
            'image' => 'nullable|image|max:2048',
        ]);
        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('topic-images', 'public'); // Store the image
        }
        $categories = array_map('trim', explode(',', $this->tags, 3));

        Topic::create([
            'title' => $this->title,
            'body' => $this->body,
            'categories' => json_encode($categories),
            'category_id' => $this->category_id,
            'user_id' => auth()->id(),
            'image_path' => $imagePath,
            // Assuming each post is tied to a user
        ]);

        session()->flash('message', 'Topic successfully created.');

        return redirect()->to('/topics'); // Redirect user to topic main page after post creation
    }

    public function render()
    {
        $this->dispatch('contentChanged')->self();
        //$this->dispatch();
        return view('livewire.topic.create-topic-post');
    }
}
