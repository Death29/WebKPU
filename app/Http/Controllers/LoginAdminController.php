<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Redirect;
use Validator;
use Session;

class LoginAdminController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->check())
        {
            $admin = "Admin";
            return Redirect::to('/admin')->with([ 'admin' => $admin ]);
        }
        return view('login-admin');
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        Auth::guard('admin')->attempt($data);

        if(Auth::guard('admin')->check()) 
        {
            $admin = "Admin";
            return Redirect::to('/admin')->with([ 'admin' => $admin ]);
        }
        else
        {
            $errorMsg = 'Username atau Password salah!';
            return Redirect::back()->withErrors([$errorMsg,'msg']);
        }
    }
}