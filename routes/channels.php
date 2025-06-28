<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('house.{houseId}', function ($user, $houseId) {
    // Permitir solo a los usuarios que pertenezcan a la casa
    return (int) $user->house_id === (int) $houseId;
});
