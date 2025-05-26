<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamPlayerController;

Route::resource('players', PlayerController::class);
Route::resource('teams', TeamController::class);
/* Route::resource('teams.players', TeamPlayerController::class)
    ->only(['index', 'store', 'destroy'])
    ->shallow(); // Permite acceder a los jugadores de un equipo sin necesidad de especificar el equipo en la URL
*/
