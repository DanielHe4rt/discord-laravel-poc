<?php

namespace App\Services;

use App\Models\Guild;

class GuildService
{
    public function create(array $payload): Guild
    {

        $payload['user_id'] = auth()->id();
        return Guild::create($payload);
    }
}
