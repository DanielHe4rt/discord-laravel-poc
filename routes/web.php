<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\GuildController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//$guild = Guild::factory()->create();
//$user = User::factory()->create();
//
// Auth::loginUsingId($user->id);



Route::prefix('guilds')
    ->middleware(['auth:web'])
    ->group(function () {
        Route::get('/', [GuildController::class, 'getGuilds'])->name('guilds.index');
        Route::post('/', [GuildController::class, 'postGuild'])->name('guilds.store');
        Route::post('/{guild}', [GuildController::class, 'getGuild'])->name('guilds.show');

        Route::prefix('/{guild}/channels')->group(function () {
            Route::post('/', [ChannelController::class, 'postChannel'])->name('guilds.channels.store');
        });
    });
