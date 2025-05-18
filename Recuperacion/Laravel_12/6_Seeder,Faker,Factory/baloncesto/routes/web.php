<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;

// Ruta de inicio
Route::get('/', function () {
    return redirect()->route('teams.index');
});

// CRUD Equipos
Route::resource('teams', TeamController::class);

// CRUD Jugadores
Route::resource('players', PlayerController::class);
