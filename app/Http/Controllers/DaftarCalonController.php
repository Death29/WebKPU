<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\CalonLegis;

class DaftarCalonController extends Controller
{
    public function index()
    {
        return view('daftar-calon');
    }

    public function daftar(Request $request)
    {
        CalonLegis::create([
            "nim" => $request->nim,
            "nama" => $request->nama,
            "jenis_legislatif" => $request->jenis_legislatif,
            "fakultas" => $request->fakultas,
            "jurusan" => $request->jurusan,
            "suara" => 0,
        ]);
        return Redirect::to('/admin');
    }
}
