<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Guild;
use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct(private readonly MessageService $messageService)
    {
    }

    public function postMessage(Guild $guild, Channel $channel, Request $request)
    {
        $response = $this->messageService->create(
            $guild,
            $channel,
            $request->input('content')
        );

        return response()->json($response, 201);
    }
}
