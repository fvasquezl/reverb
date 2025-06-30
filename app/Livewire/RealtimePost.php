<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class RealtimePost extends Component
{
    public $post;
    public $latestPost = [];
    public $houseId;

    public function mount()
    {
        $user = auth()->user();
        $this->houseId = $user->house_id ?? null;
        $post = null;
        if ($user && $user->house_id) {
            $post = Post::whereHas('houses', function ($q) use ($user) {
                $q->where('houses.id', $user->house_id);
            })->where('active', true)->first();
        }
        if ($post) {
            $this->latestPost = [
                'id' => $post->id,
                'title' => $post->title,
                'image' => $post->image_url,
                'active' => $post->active,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ];
        }
    }


    public function handlePostUpdated($event = null)
    {
        \Log::info('Evento recibido en Livewire', $event);
        if (!$event || !is_array($event)) {
            return;
        }

        // Si el post recibido está activo, actualizar la vista
        if ($event['active'] ?? false) {
            $this->latestPost = [
                'id' => $event['id'] ?? null,
                'title' => $event['title'] ?? null,
                'image' => $event['image'] ?? null,
                'active' => $event['active'] ?? false,
                'created_at' => $event['created_at'] ?? null,
                'updated_at' => $event['updated_at'] ?? null,
            ];
        } else if (($event['id'] ?? null) === ($this->latestPost['id'] ?? null)) {
            // Si el post actual se desactivó, limpiar la vista
            $this->latestPost = [];
        }
        
        // Forzar re-render del componente
        $this->dispatch('$refresh');
    }


    public function render()
    {
        return view('livewire.realtime-post');
    }
}
