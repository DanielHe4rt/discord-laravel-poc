<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('room.{room}', function ($room) {
    return true;
});
