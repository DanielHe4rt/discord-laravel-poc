<?php

namespace App\Services;

use App\Enums\UnaryEnum;
use App\Models\Channel;
use App\Models\Guild;
use App\Models\Member;
use App\Models\Message;

class MessageService
{
    public function create(Guild $guild, Channel $channel, string $message): Message
    {
        // TODO: caching key for member_id
        $member = Member::where('user_id', auth()->id())->first();
        $payload = ['content' => $message, 'member_id' => $member->getKey()];

        $message = $channel->messages()->create($payload);

        $member->handleMessageCount(UnaryEnum::Increment);
        $guild->handleMessageCount(UnaryEnum::Increment);

        return $message;
    }
}
