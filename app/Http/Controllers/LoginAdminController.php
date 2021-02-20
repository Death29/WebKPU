<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class LoginAdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->username == "admin" && $request->password == "admin")
        {
            return Redirect::to('/admin');
        }
        else
        {
            return Redirect::back()->withErrors(['Username atau Password Salah!','msg']);
        }
    }
}
