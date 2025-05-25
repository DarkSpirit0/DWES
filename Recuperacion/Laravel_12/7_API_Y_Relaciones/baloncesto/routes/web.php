<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamPlayerController;


// Ruta de inicio
Route::get('/', function () {
    return redirect()->route('teams.index');
});

// CRUD Equipos
Route::resource('teams', TeamController::class);

// CRUD Jugadores
Route::resource('players', PlayerController::class);;

route::resource('team_player', TeamPlayerController::class)
    ->only(['index', 'store', 'destroy'])
    ->names([
        'index' => 'team_player.index',
        'store' => 'team_player.store',
        'destroy' => 'team_player.destroy'
    ]); 