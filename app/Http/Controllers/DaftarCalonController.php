<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarCalonController extends Controller
{
    public function index()
    {
        return view('daftar-calon');
    }
}
