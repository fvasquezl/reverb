<?php

namespace App\Models;

use App\Events\PostChanged;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'image',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($post) {
            if ($post->isDirty('active') && $post->active) {
                $houseIds = $post->houses()->pluck('houses.id')->toArray();
                
                static::whereHas('houses', function ($query) use ($houseIds) {
                    $query->whereIn('houses.id', $houseIds);
                })
                ->where('id', '!=', $post->id)
                ->where('active', true)
                ->update(['active' => false]);
            }
        });

        static::updated(function ($post) {
            if ($post->wasChanged('active')) {
                broadcast(new PostChanged($post->fresh()))->toOthers();
            }
        });
    }

    /**
     * Get the houses associated with the post.
     */
    public function houses()
    {
        return $this->belongsToMany(House::class, 'house_post');
    }

    /**
     * Accessor para obtener la URL completa de la imagen
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? \Storage::url($this->image) : null;
    }
}
