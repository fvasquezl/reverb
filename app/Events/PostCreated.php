<?php

namespace App\Events;

use App\Models\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $post;

    /**
     * Create a new event instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        // Emitir en canales privados por cada house asociada al post
        return $this->post->houses->map(function ($house) {
            return new PrivateChannel('house.' . $house->id);
        })->all();
    }

    /**
     * Get the broadcast event name.
     */
    public function broadcastAs(): string
    {
        return 'post.created';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->post->id,
            'title' => $this->post->title,
            'image' => $this->post->image_url, // Usar accessor
            'created_at' => $this->post->created_at,
            'updated_at' => $this->post->updated_at,
            // Agrega aquí cualquier otro campo relevante
        ];
    }
}
