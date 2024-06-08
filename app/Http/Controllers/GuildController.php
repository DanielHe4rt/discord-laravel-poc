<?php

namespace App\Http\Controllers;

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

    public function getGuild(Guild $guild)
    {
        // TODO: implement
    }

    public function postGuild(Request $request): RedirectResponse
    {

        $this->guildService->create($request->all());
        return response()->redirectToRoute('guilds.index');
    }
}
