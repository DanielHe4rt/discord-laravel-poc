<?php

namespace App\Console\Commands;

use App\Models\Channel;
use App\Models\Guild;
use App\Models\Member;
use App\Models\Message;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class SendMessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(MessageService $messageService): int
    {
        Auth::loginUsingId(User::first()->getKey());
        $channel = Channel::first();

        $message = $messageService->create(
            Guild::first(),
            $channel,
            'vai caraio'
        );

        dump($message);

        return self::SUCCESS;
    }
}
