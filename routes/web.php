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

Route::get('/login-admin', 'App\Http\Controllers\LoginAdminController@index')->name('login-admin');
Route::post('/auth-admin', 'App\Http\Controllers\LoginAdminController@login');

Route::group(['middleware' => 'auth:admin'], function() 
{
    Route::get('/admin', 'App\Http\Controllers\AdminController@index');
    Route::get('/info-pemilwa-univ', 'App\Http\Controllers\HasilUnivController@index');
    Route::get('/info-pemilwa-fakultas', 'App\Http\Controllers\HasilFakultasController@index');
    Route::get('/info-pemilih', 'App\Http\Controllers\InfoPemilihController@index');
    Route::get('/daftar-calon', 'App\Http\Controllers\DaftarCalonController@index');
    Route::get('/edit-calon/{id}', 'App\Http\Controllers\EditCalonController@index');
    Route::get('/hapus-calon/{id}', 'App\Http\Controllers\HapusCalonController@index');
    Route::get('/logout', 'App\Http\Controllers\LogoutController@index');

    Route::post('/daftar-calonlegis', 'App\Http\Controllers\DaftarCalonController@daftar');
    Route::post('/edit-calonlegis', 'App\Http\Controllers\EditCalonController@edit');
    Route::post('/filter-hasilfakultas', 'App\Http\Controllers\HasilFakultasController@filter');
});

Route::get('/login-pemilih', 'App\Http\Controllers\LoginPemilihController@index');
Route::get('/register-pemilih', 'App\Http\Controllers\RegistrasiPemilihController@index');

Route::group(['middleware' => 'auth:pemilih'], function()
{
    
});

Auth::routes();

Route::get('auth/{provider}', 'App\Http\Controllers\Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'App\Http\Controllers\Auth\AuthController@handleProviderCallback');
