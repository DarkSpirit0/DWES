<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\EquipoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Rutas para usuarios admin y coach, con acceso total
Route::middleware(['auth', 'role:admin,coach'])->group(function () {
    Route::resource('jugadores', JugadorController::class)->except(['index']);
    Route::resource('equipos', EquipoController::class)->except(['index']);
});

// Rutas para todos los usuarios (admin, coach, user) que solo pueden ver la lista
Route::middleware(['auth', 'role:admin,coach,user'])->group(function () {
    Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
    Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
});
