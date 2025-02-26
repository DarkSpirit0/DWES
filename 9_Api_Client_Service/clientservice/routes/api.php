<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('services', ServiceController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::apiResource('clients', ClientController::class);
Route::apiResource('services', ServiceController::class);

//rutas para introducir un servicio a un cliente
//de uno en uno
Route::post('/clients/{client}/services/{service}', [ClientController::class, 'addService']);

//de varios a la vez
Route::post('/clients/{client}/services', [ClientController::class, 'attachServices']);