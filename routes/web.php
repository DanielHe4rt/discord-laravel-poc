<?php

use App\Http\Controllers\GuildController;
use App\Models\Guild;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    });
