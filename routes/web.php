<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']) -> name('user.index');
Route::view( '/', 'index')->name('index');
Route::view( '/about', 'about')->name('about');
Route::view( '/services', 'services')->name('services');
Route::view( '/contact', 'contact')->name('contact');

