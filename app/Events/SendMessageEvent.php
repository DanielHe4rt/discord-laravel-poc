<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessageEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public readonly Message $message)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('room-' . $this->message->channel_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'newMessage';
    }

    public function broadcastWith(): array
    {
        $usernames = [
            'danielhe4rt',
            'luisnadachi',
            'jhownfs',
            'dcatori'
        ];

        $avatar = collect($usernames)
            ->shuffle()
            ->first();

        return [
            'id' => $this->message->getKey(),
            'content' => $this->message->content,
            'name' => $this->message->member->user->name,
            'avatar' => $avatar,
            'sent_at' => $this->message->created_at->format('d/m/Y H:i:s')
        ];
    }
}
