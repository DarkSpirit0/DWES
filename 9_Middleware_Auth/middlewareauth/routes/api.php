<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/
Route::get('/', [ExampleController::class, 'index'])->name('index')->middleware('example');
//Le damos también un nombre de ruta con el método name
Route::get('/no-access', [ExampleController::class, 'noAccess'])->name('no-access');