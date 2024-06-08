<?php

namespace Tests\Feature\Controllers;

use App\Models\Guild;
use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GuildControllerTest extends TestCase
{
    use DatabaseMigrations;
    public function test_user_can_create_an_server()
    {
        $this->withoutExceptionHandling();
        // Prepare
        $user = User::factory()->create();

        $payload = [
            'name' => 'Basement Developers',
            'icon_url' => 'https://github.com/danielhe4rt.png',
            //'members_count' => '',
            //'messages_count' => '',
            'is_nsfw' => true,
        ];

        // Act
        $response  = $this
            ->actingAs($user)
            ->post(route('guilds.store'), $payload);

        // Assert

        $response->assertRedirectToRoute('guilds.index');

        $this->assertDatabaseHas(Guild::class ,$payload);

    }

    public function test_owner_joins_a_guild_after_being_created()
    {
        // Prepare

        $guild = Guild::factory()->create(['members_count' => 0]);

        $this->assertDatabaseHas(Member::class, [
            'guild_id' => $guild->getKey(),
            'user_id' => $guild->user->getKey()
        ]);

        $this->assertDatabaseHas(Guild::class, [
            'members_count' => 1
        ]);
    }
}
