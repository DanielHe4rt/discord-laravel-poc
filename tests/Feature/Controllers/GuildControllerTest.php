<?php

namespace Tests\Feature\Controllers;

use App\Models\Guild;
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
}
