<?php

namespace App\Livewire\Topic;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTopicPost extends Component
{
    use WithFileUploads;
    public $topicId;
    public $topic;
    public $image;
    public $title;
    public $tags = '';
    public $category_id;
    public $body = '';
    public function mount($topicId)
    {
        $this->dispatch('edit-post')->to(QuillEditor::class);

        $this->topicId = $topicId;
        $this->topic = Topic::find($topicId);
        $this->body = $this->topic->body;
        $this->title = $this->topic->title;
        $this->tags = implode(',', json_decode($this->topic->categories));
        $this->category_id = $this->topic->category_id;

    }

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
    public function updateTopic()
    {
        $this->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:10',
            'tags' => 'string',
            'category_id' => 'required|numeric|between:0,' . (count($this->categories())),
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $this->topic->image_path;
        if ($this->image) {
            if ($this->topic->image and Storage::disk('public')->exists($this->topic->image_path)) {
                Storage::disk('public')->delete($this->topic->image_path);
            }
            $imagePath = $this->image->store('topic-images', 'public'); // Store the image
        }
        $categories = array_map('trim', explode(',', $this->tags, 3));


        $this->topic->update([
            'title' => $this->title,
            'body' => $this->body,
            'categories' => json_encode($categories),
            'category_id' => $this->category_id,
            'image_path' => $imagePath,
        ]);

        session()->flash('message', 'Topic successfully created.');

        return redirect()->route('user.profile', ['user' => Str::slug(Auth::user()->name), 'id' => Auth::user()]); // Redirect user back to profile
    }


    public function render()
    {
        return view('livewire.topic.edit-topic-post', );
    }
}
