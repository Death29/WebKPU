<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemilih;
use Redirect;
use Validator;
use Session;

class RegistrasiPemilihController extends Controller
{
    public function index()
    {
        if(Auth::guard('pemilih')->check())
        {
            return Redirect::to("/beranda-user");
        }
        return view('registrasi-pemilih');
    }
}
