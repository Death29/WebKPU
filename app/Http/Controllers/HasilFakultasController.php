<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilFakultasController extends Controller
{
    public function index()
    {
        return view('hasil-fakultas');
    }
}
