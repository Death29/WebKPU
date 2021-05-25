<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'E-mail harus diisi',
            'password.required' => 'Password harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            'password' => $request->input("password"),
        ];

        $msg = "Registrasi berhasil";

        event(new Registered($user = $this->create($request->all())));
        Auth::guard('pemilih')->login($user);

        if(Auth::guard('pemilih')->check())
        {
            return Redirect::to('/beranda-user')->with(['registrasi-msg', $msg]);
        }
        else
        {
            $errorMsg = 'Registrasi gagal!';
            return Redirect::back()->withErrors([$errorMsg, 'msg']);
        }
    }

    public function create(array $data)
    {
        $user = User::create([
                    "name" => $data["name"],
                    "email" => $data["email"],
                    "password" => Hash::make($data["password"]),
                ]);
        return $user;
    }
}
