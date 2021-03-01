<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('login-admin');
    }

    public function login(Request $request)
    {
        if($request->username == "admin" && $request->password == "admin")
        {
            $admin = "Admin";
            return Redirect::to('/admin')->with([ 'admin' => $admin ]);
        }
        else
        {
            return Redirect::back()->withErrors(['Username atau Password Salah!','msg']);
        }
    }
}
