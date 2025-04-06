<?php

use App\Models\Player;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlayerController::class, 'index'])->name('player.index');
Route::get('/create', [PlayerController::class, 'create'])->name('player.create');
