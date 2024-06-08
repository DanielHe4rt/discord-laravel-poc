<?php

namespace App\Observers;

use App\Enums\UnaryEnum;
use App\Models\Guild;

class GuildObserver
{
    public function created(Guild $guild)
    {
        // Adding the guild owner as a member (countable).
        $guild->members()
            ->create(['user_id' => $guild->user_id]);

        $guild->incrementMembers(UnaryEnum::Increment);
    }
}
