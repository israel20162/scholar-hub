<?php

namespace App\Livewire\Forum;


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
        if (auth()->id() === $this->post->user_id) {
            $this->user->increment('karma', 0);
        } else {
            $this->post->user->increment('karma', 5);
        }
        $this->loadPost(); // Refresh the post data after liking
    }

    public function unlikePost()
    {
        $this->post->likedByUsers()->detach(auth()?->id());
        $this->post->decrement('likes_count');
        if (auth()->id() === $this->topic->user_id) {
            $this->user->decrement('karma', 0);
        } else {
            $this->post->user->decrement('karma', 5);
        }
        $this->loadPost(); // Refresh the post data after unliking
    }


    public function render()
    {
        return view('livewire.forum.view-forum-post');
    }
}
