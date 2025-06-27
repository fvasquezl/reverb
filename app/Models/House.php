<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    protected $fillable = [
        'name',
        'address',
    ];

    /**
     * Get the users associated with the house.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(House::class, 'house_post');
    }
}
