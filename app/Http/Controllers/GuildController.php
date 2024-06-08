<?php

namespace App\Http\Controllers;

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
        return view('guilds.get-guilds');
    }

    public function postGuild(Request $request): RedirectResponse
    {

        $this->guildService->create($request->all());
        return response()->redirectToRoute('guilds.index');
    }
}
