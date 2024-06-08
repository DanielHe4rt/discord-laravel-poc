<?php

namespace App\Services;

use App\Models\Channel;
use App\Models\Guild;

class ChannelService
{
    public function create(Guild $guild, array $payload): Channel
    {
        return $guild->channels()->create($payload);
    }
}
