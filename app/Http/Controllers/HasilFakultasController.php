<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonLegis;

class HasilFakultasController extends Controller
{
    public function index()
    {
        $calonlegis = CalonLegis::where("jenis_legislatif", "Fakultas")->where("fakultas", "Fakultas Bisnis dan Ekonomika")->get();
        return view('hasil-fakultas', ["calonlegis" => $calonlegis]);
    }

    public function filter(Request $request)
    {
        $fakultas = $request->fakultas;
        $calonlegis = CalonLegis::where("jenis_legislatif", "Fakultas")->where("fakultas", $fakultas)->get();
        return view('hasil-fakultas', ["calonlegis" => $calonlegis, "selected_fakultas" => $fakultas]);
    }
}
