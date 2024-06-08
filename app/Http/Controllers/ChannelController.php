<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use App\Services\ChannelService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function __construct(
        private readonly ChannelService $channelService,
    )
    {
    }

    public function postChannel(Guild $guild, Request $request): RedirectResponse
    {
        $this->channelService->create($guild, $request->all());
        return redirect()->route('guilds.show', $guild);
    }
}
