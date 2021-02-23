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

Route::get('/admin', function(){
    return view('admin');
});

Route::get('/login-admin', function(){
    return view('login-admin');
});

Route::get('/info-pemilwa-univ', function(){
    return view('hasil-univ');
});

Route::get('/info-pemilwa-fakultas', function(){
    return view('hasil-fakultas');
});

Route::get('/info-pemilih', function(){
    return view('info-pemilih');
});

Route::post('/auth-admin', 'App\Http\Controllers\LoginAdminController@login');

Auth::routes();

Route::get('auth/{provider}', 'App\Http\Controllers\Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'App\Http\Controllers\Auth\AuthController@handleProviderCallback');
