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

Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/login-admin', 'App\Http\Controllers\LoginAdminController@index');
Route::get('/info-pemilwa-univ', 'App\Http\Controllers\HasilUnivController@index');
Route::get('/info-pemilwa-fakultas', 'App\Http\Controllers\HasilFakultasController@index');
Route::get('/info-pemilih', 'App\Http\Controllers\InfoPemilihController@index');
Route::get('/daftar-calon', 'App\Http\Controllers\DaftarCalonController@index');

Route::post('/auth-admin', 'App\Http\Controllers\LoginAdminController@login');
Route::post('/daftar-calonlegis', 'App\Http\Controllers\DaftarCalonController@daftar');
Route::post('/filter-hasilfakultas', 'App\Http\Controllers\HasilFakultasController@filter');

Auth::routes();

Route::get('auth/{provider}', 'App\Http\Controllers\Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'App\Http\Controllers\Auth\AuthController@handleProviderCallback');
