<?php

use App\Http\Controllers\API\V1\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/guilds/{guild}/channels/{channel}/messages', [MessageController::class, 'postMessage'])
    ->name('guilds.channels.messages.store')
    ->middleware('auth:web');

