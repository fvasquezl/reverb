<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'image',
    ];

    /**
     * Get the houses associated with the post.
     */
    public function houses()
    {
        return $this->belongsToMany(House::class, 'house_post');
    }



}
