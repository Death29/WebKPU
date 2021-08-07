<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Redirect;
use Validator;
use Session;

class VerifikasiEmailController extends Controller
{
    public function index()
    {
        if(Auth::guard('pemilih')->check())
        {
            $id = Auth::guard('pemilih')->user()->id;
            $email = Auth::guard('pemilih')->user()->email;
            return view('verifemail', ["id" => $id, "email" => $email]);
        }
        return Redirect::to('/register-pemilih');
    }
}
