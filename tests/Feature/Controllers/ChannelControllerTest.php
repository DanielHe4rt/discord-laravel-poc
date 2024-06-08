<?php

namespace Tests\Feature\Controllers;

use App\Models\Channel;
use App\Models\Guild;
use http\Client\Curl\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ChannelControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_owner_create_a_new_channel()
    {
        $this->withoutExceptionHandling();
        // prepare
        $guild = Guild::factory()->create();

        $payload = ['name' => 'SALA FODA SO OS DEW VERDADE ENTRAM'];

        // act
        $response = $this
            ->actingAs($guild->owner)
            ->post(route('guilds.channels.store', $guild), $payload);

        // assert

        $response->assertRedirectToRoute('guilds.show', $guild);
        $this->assertDatabaseHas(Channel::class, $payload);
    }

    public function test_user_can_join_a_channel(): void
    {
        $this->withoutExceptionHandling();
        $channel = Channel::factory()->create();

        $response = $this
            ->actingAs($channel->guild->owner)
            ->get(route('guilds.channels.show', [
                'guild' => $channel->guild,
                'channel' => $channel
            ]));

        $response->assertOk()
            ->assertSee($channel->name);
    }
}
