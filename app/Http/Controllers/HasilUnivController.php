<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonLegis;

class HasilUnivController extends Controller
{
    public function index()
    {
        $calonlegis = CalonLegis::where("jenis_legislatif", "Universitas")->get();
        return view('hasil-univ', ["calonlegis" => $calonlegis]);
    }
}
