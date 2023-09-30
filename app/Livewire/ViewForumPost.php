<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\ForumPost;
use App\Models\ForumPostReply;

class ViewForumPost extends Component
{
    public $postId;
    public $post;
    public $reply;

    protected $listeners = ['loadPost' => 'loadPost'];

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->loadPost();
    }

    public function loadPost()
    {
        $this->post = ForumPost::with('replies')->find($this->postId);
    }

    public function addReply()
    {
        $this->validate([
            'reply' => 'required|min:5',
        ]);

        ForumPostReply::create([
            'post_id' => $this->postId,
            'body' => $this->reply,
             'user_id' => auth()->id()
        ]);

        $this->reply = ''; // Clear the input
        $this->loadPost(); // Refresh the post with the new reply
    }
    public function likePost()
    {
        $this->post->likedByUsers()->attach(auth()?->id());
        $this->post->increment('likes_count');
        $this->loadPost(); // Refresh the post data after liking
    }

    public function unlikePost()
    {
        $this->post->likedByUsers()->detach(auth()?->id());
        $this->post->decrement('likes_count');
        $this->loadPost(); // Refresh the post data after unliking
    }


    public function render()
    {
        return view('livewire.view-forum-post');
    }
}
