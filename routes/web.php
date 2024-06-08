<?php

use App\Http\Controllers\GuildController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('guilds')
    ->middleware(['auth:web'])
    ->group(function () {
        Route::get('/', [GuildController::class, 'getGuilds'])->name('guilds.index');
        Route::post('/', [GuildController::class, 'postGuild'])->name('guilds.store');
    });
