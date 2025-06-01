<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlayerApiController;
use App\Http\Controllers\Api\TeamApiController;
use App\Http\Controllers\Api\TeamPlayerApiController;

// API RESTful para Players
Route::apiResource('players', PlayerApiController::class);

// API RESTful para Teams
Route::apiResource('teams', TeamApiController::class);
// API para Team <-> Player (relación pivote)
Route::prefix('team-player')->group(function () {
    Route::get('/{teamId}', [TeamPlayerApiController::class, 'index']); // GET api/team-player/{teamId}
    Route::post('/attach', [TeamPlayerApiController::class, 'attach']); // POST api/team-player/attach
    Route::post('/detach', [TeamPlayerApiController::class, 'detach']); // POST api/team-player/detach
});