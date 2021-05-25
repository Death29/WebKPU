<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Redirect;
use Validator;
use Session;

class LoginPemilihController extends Controller
{
    public function index()
    {
        if(Auth::guard('pemilih')->check())
        {
            return Redirect::to('/beranda-user');
        }
        return view('login-pemilih');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'email.required' => 'E-mail harus diisi',
            'password.required' => 'Password harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'email' => $request->input("email"),
            'password' => $request->input("password"),
        ];

        $msg = "Login berhasil";
        Auth::guard('pemilih')->attempt($data);

        if(Auth::guard('pemilih')->check())
        {
            return Redirect::to('/beranda-user')->with(['login-msg', $msg]);
        }
        else
        {
            $errorMsg = 'E-mail atau Password salah!';
            return Redirect::back()->withErrors([$errorMsg, 'msg']);
        }
    }
}
