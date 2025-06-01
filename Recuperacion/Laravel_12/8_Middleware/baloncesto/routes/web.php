<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamPlayerController;

Route::get('/', fn () => view('welcome'));
Route::resource('players', PlayerController::class);
Route::resource('teams', TeamController::class);
//Tabla pivote entre equipos y jugadores
Route::get('/team_player', [TeamPlayerController::class, 'index'])->name('team_player.index');
Route::post('/team_player/attach', [TeamPlayerController::class, 'attach'])->name('team_player.attach');
Route::post('/team_player/detach', [TeamPlayerController::class, 'detach'])->name('team_player.detach');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
