<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CalonLegis;
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
}
