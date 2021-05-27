<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CalonLegis;
use App\Models\Pemilih;
use Redirect;
use Session;

class BerandaUserController extends Controller
{
    public function index()
    {
        if(Auth::guard('pemilih')->check())
        {
            $calonlegis_univ = CalonLegis::where("jenis_legislatif", "Universitas")->get();
            $calonlegis_fakultas = CalonLegis::where("jenis_legislatif", "Fakultas")->get(); 
            return view('BerandaUser', ["calonlegis_univ" => $calonlegis_univ, "calonlegis_fakultas" => $calonlegis_fakultas]);
        }
        else
        {
            return Redirect::to('/login-pemilih');
        }
    }

    public function vote_univ(Request $request)
    {
        $nim = substr(Auth::guard('pemilih')->user()->email, 0, 8);
        $nama = Auth::guard('pemilih')->user()->name;

        $pilihan_univ = CalonLegis::where("id", $request->vote)->where("jenis_legislatif", "Universitas")->get();

        foreach($pilihan_univ as $key => $data)
        {
            $id_calon = $data->id;
        }

        Pemilih::create([
            "nim" => $nim,
            "nama" => $nama,
            "pilihan_univ" => $id_calon,
        ]);
        $msg = "Berhasil vote calon legislatif universitas";
        return Redirect::to('/beranda-user')->with(["success_msg" => $msg]);
    }

    public function vote_fakultas(Request $request)
    {
        $nim = substr(Auth::guard('pemilih')->user()->email, 0, 8);
        $nama = Auth::guard('pemilih')->user()->name;

        $pilihan_fakultas = CalonLegis::where("id", $request->vote)->where("jenis_legislatif", "Fakultas")->get();

        foreach($pilihan_fakultas as $key => $data)
        {
            $id_calon = $data->id;
        }

        Pemilih::create([
            "nim" => $nim,
            "nama" => $nama,
            "pilihan_fakultas" => $id_calon,
        ]);
        $msg = "Berhasil vote calon legislatif fakultas";
        return Redirect::to('/beranda-user')->with(["success_msg" => $msg]);
    }
}
