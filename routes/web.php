<?php

use Illuminate\Support\Facades\Route;

/*
memanggil halaman view sebagai view di tampilan
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('auth/google','Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback','Auth\GoogleController@handleGoogleCallback');
