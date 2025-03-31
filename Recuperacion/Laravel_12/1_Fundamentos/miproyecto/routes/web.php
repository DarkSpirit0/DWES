<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
*/

Route::view( '/', 'landing.index')->name('index');

Route::view( '/about', 'landing.about')->name('about');

//});
