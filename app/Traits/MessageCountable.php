<?php

namespace App\Traits;

use App\Enums\UnaryEnum;

trait MessageCountable
{

    public function handleMessageCount(UnaryEnum $enum): bool
    {
        return match($enum) {
            UnaryEnum::Increment => $this->increment('messages_count'),
            UnaryEnum::Decrement => $this->decrement('messages_count'),
        };
    }
}
