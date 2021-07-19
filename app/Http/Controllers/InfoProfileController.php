<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pemilih;
use App\Models\CalonLegis;
use Redirect;
use Session;

class InfoProfileController extends Controller
{
    public function index()
    {
        if(Auth::guard('pemilih')->check())
        {
            $user_id = Auth::guard('pemilih')->user()->id;
            $nim = substr(Auth::guard('pemilih')->user()->email, 0 , 8);

            $info_user = User::where("id", $user_id)->get();
            $pilihan = Pemilih::where("nim", $nim)->get();

            $nama_calon_u = "";
            $nama_calon_f = "";

            foreach($pilihan as $key => $data)
            {
                if(!empty($data->pilihan_univ))
                {
                    $nama_calon_u = CalonLegis::where("id", $data->pilihan_univ)->get();
                }
                if(!empty($data->pilihan_fakultas))
                {
                    $nama_calon_f = CalonLegis::where("id", $data->pilihan_fakultas)->get();
                }
            }

            return view('info-profile', ["info_user" => $info_user, "pilihan_u" => $nama_calon_u, "pilihan_f" => $nama_calon_f]);
        }
        else
        {
            return Redirect::to('/login-pemilih');
        }
    }
}