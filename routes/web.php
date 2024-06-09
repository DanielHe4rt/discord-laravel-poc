<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\GuildController;
use App\Models\Guild;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


if($userId = request()->query('userId')) {
    Auth::loginUsingId($userId);
}



Route::prefix('guilds')
    ->middleware(['auth:web'])
    ->group(function () {
        Route::get('/', [GuildController::class, 'getGuilds'])->name('guilds.index');
        Route::post('/', [GuildController::class, 'postGuild'])->name('guilds.store');
        Route::get('/{guild}', [GuildController::class, 'getGuild'])->name('guilds.show');

        Route::prefix('/{guild}/channels')->group(function () {
            Route::post('/', [ChannelController::class, 'postChannel'])->name('guilds.channels.store');
            Route::get('/{channel}', [ChannelController::class, 'getChannel'])->name('guilds.channels.show');
        });
    });
