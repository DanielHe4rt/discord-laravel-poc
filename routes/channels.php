<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('room.{room}', function (User $user, $room) {
    return $user->toArray();
});
