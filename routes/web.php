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

    Route::post('/daftar-calonlegis', 'App\Http\Controllers\DaftarCalonController@daftar');
    Route::post('/edit-calonlegis', 'App\Http\Controllers\EditCalonController@edit');
    Route::post('/filter-hasilfakultas', 'App\Http\Controllers\HasilFakultasController@filter');
});

Route::get('/login-pemilih', 'App\Http\Controllers\LoginPemilihController@index')->name('login-pemilih');
Route::post('/auth-pemilih', 'App\Http\Controllers\LoginPemilihController@login');
Route::get('/register-pemilih', 'App\Http\Controllers\RegistrasiPemilihController@index');
Route::post('/daftar-pemilih', 'App\Http\Controllers\RegistrasiPemilihController@register');

Route::group(['middleware' => 'auth:pemilih'], function()
{
    Route::get('/beranda-user', 'App\Http\Controllers\BerandaUserController@index');
    Route::post('/vote-univ', 'App\Http\Controllers\BerandaUserController@vote_univ');
    Route::post('/vote-fakultas', 'App\Http\Controllers\BerandaUserController@vote_fakultas');
    Route::get('/info-profile', 'App\Http\Controllers\InfoProfileController@index');
});

Route::get('/tes-email','App\Http\Controllers\TestEmailController@index');
Route::get('/logout', 'App\Http\Controllers\LogoutController@index');

Auth::routes();

Route::get('auth/{provider}', 'App\Http\Controllers\Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'App\Http\Controllers\Auth\AuthController@handleProviderCallback');
