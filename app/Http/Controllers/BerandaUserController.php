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

            $nim = substr(Auth::guard('pemilih')->user()->email, 0 , 8);
            $can_vote_u = true;
            $can_vote_f = true;

            $find_vote_u = Pemilih::where("nim", $nim)->whereNotNull("pilihan_univ")->get();
            $find_vote_f = Pemilih::where("nim", $nim)->whereNotNull("pilihan_fakultas")->get();

            foreach($find_vote_u as $key => $data)
            {
                if(!empty($data->pilihan_univ))
                {
                    $can_vote_u = false;
                }
            }

            foreach($find_vote_f as $key => $data)
            {
                if(!empty($data->pilihan_fakultas))
                {
                    $can_vote_f = false;
                }
            }

            return view('BerandaUser', [
            "calonlegis_univ" => $calonlegis_univ, 
            "calonlegis_fakultas" => $calonlegis_fakultas,
            "can_vote_u" => $can_vote_u,
            "can_vote_f" => $can_vote_f,
            ]);
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
            $suara = $data->suara;
        }

        $suara = $suara + 1;
        CalonLegis::find($id_calon)->update(["suara" => $suara]);

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
            $suara = $data->suara;
        }

        $suara = $suara + 1;
        CalonLegis::find($id_calon)->update(["suara" => $suara]);

        Pemilih::create([
            "nim" => $nim,
            "nama" => $nama,
            "pilihan_fakultas" => $id_calon,
        ]);
        $msg = "Berhasil vote calon legislatif fakultas";
        return Redirect::to('/beranda-user')->with(["success_msg" => $msg]);
    }
}
