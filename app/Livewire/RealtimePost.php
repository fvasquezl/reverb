<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class RealtimePost extends Component
{
    public $post;
    public $latestPost = [];

    protected $listeners = ['echo:posts,post.created' => 'handleNewPost'];


    public function mount()
    {
        $user = auth()->user();
        $post = null;
        if ($user && $user->house_id) {
            $post = Post::whereHas('houses', function ($q) use ($user) {
                $q->where('houses.id', $user->house_id);
            })->latest()->first();
        }
        if ($post) {
            $this->latestPost = [
                'id' => $post->id,
                'title' => $post->title,
                'image' => $post->image_url,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ];
        }
    }

    public function handleNewPost($event = null)
    {
        if (!$event || !is_array($event)) {
            return;
        }

        // Asigna todos los elementos del post recibido por el evento
        $this->latestPost = [
            'id' => $event['id'] ?? null,
            'title' => $event['title'] ?? null,
            'image' => $event['image'] ?? null,
            'created_at' => $event['created_at'] ?? null,
            'updated_at' => $event['updated_at'] ?? null,
        ];





    }


    public function render()
    {
        return view('livewire.realtime-post');
    }
}
