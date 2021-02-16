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
