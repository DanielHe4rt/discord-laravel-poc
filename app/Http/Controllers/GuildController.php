<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Guild;
use App\Services\GuildService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuildController extends Controller
{
    public function __construct(
        private readonly GuildService $guildService
    )
    {
    }

    public function getGuilds(): View
    {
        $guilds = Guild::paginate(5);
        return view('guilds.get-guilds', [
            'guilds' => $guilds
        ]);
    }

    public function getGuild(Guild $guild): View
    {
        Channel::factory()->create(['guild_id' => $guild->id]);

        return view('guilds.show-guild', [
            'guild' => $guild,
            'channels' => $guild->channels()->paginate(10)
        ]);
    }

    public function postGuild(Request $request): RedirectResponse
    {

        $this->guildService->create($request->all());
        return response()->redirectToRoute('guilds.index');
    }
}
