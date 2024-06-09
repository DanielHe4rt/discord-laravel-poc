<?php

namespace Tests\Feature\Controllers;

use App\Events\SendMessageEvent;
use App\Models\Channel;
use App\Models\Guild;
use App\Models\Member;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
    use DatabaseMigrations;
    public function test_user_can_send_messages(): void
    {
        Event::fake();
        $this->withoutExceptionHandling();
        // Prepare
        $user = User::factory()->create();
        $channel = Channel::factory()->create();
        $payload = ['content' => 'vai framengo!!'];

        $member = $channel->guild->members()->create(['user_id' => $user->id]);

        // Act
        $response = $this
            ->actingAs($user)
            ->postJson(route('guilds.channels.messages.store', [
            'guild' => $channel->guild,
            'channel' => $channel
        ]), $payload);

        // Assert
        $response->assertCreated()
            ->assertJsonFragment($payload);

        Event::assertDispatched(
            SendMessageEvent::class,
            fn (SendMessageEvent $event) => $event->message->content == $payload['content']
        );

        $this->assertDatabaseHas(Message::class, [
            'channel_id' => $channel->getKey(),
            'member_id' => $member->getKey(),
            'content' => $payload['content'],
        ]);

        $this->assertDatabaseHas(Member::class, [
            'user_id' => $member->user_id,
            'messages_count' => 1
        ]);

        $this->assertDatabaseHas(Guild::class, [
            'id' => $channel->guild->getKey(),
            'messages_count' => 1
        ]);

    }
}
