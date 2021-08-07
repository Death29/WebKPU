<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Prodi;
use App\Mail\RegistrasiOTP;
use Carbon\Carbon;
use Redirect;
use Validator;
use Session;

class RegistrasiPemilihController extends Controller
{
    public function index()
    {
        if(Auth::guard('pemilih')->check())
        {
            if(Auth::guard('pemilih')->user()->email_verified_at == NULL)
            {
                return Redirect::to("/verifikasi-email");
            }
            else
            {
                return Redirect::to("/beranda-user");
            }
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

        $check_email_uii = substr($request->input("email"), 8);
        if($check_email_uii === "@students.uii.ac.id")
        {
            $sub_nim = substr($request->input("email"), 2, 3);
            $prodi = Prodi::where("nim", $sub_nim)->get();

            $fakultas_pemilih = "";

            foreach($prodi as $key => $data) 
            {
                if(!empty($data->fakultas))
                {
                    $fakultas_pemilih = $data->fakultas;
                }
            }

            if($fakultas_pemilih != "")
            {
                $nim = substr($request->input("email"), 0, 8);
                $nama = $request->input("name");
                $otp = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 1,  6);
                $otp_expire = Carbon::now()->addMinutes(30);

                $data = [
                    'name' => $request->input("name"),
                    'email' => $request->input("email"),
                    'password' => $request->input("password"),
                ];

                event(new Registered($user = $this->create($request->all())));
                Auth::guard('pemilih')->login($user);

                if(Auth::guard('pemilih')->check())
                {
                    $id = Auth::guard('pemilih')->user()->id;
                    $kirim = User::where("id", $id)->update(["otp" => $otp, "otp_expired" => $otp_expire]);
                    Mail::to($request->input("email"))->send(new RegistrasiOTP($nim, $nama, $otp, $otp_expire));
                    return Redirect::to('/verifikasi-email');
                }
                else
                {
                    $errorMsg = 'Registrasi gagal!';
                    return Redirect::back()->withErrors([$errorMsg, 'msg']);
                }
            }
            else
            {
                $errorMsg = "Pemilwa tidak tersedia pada fakultas anda!";
                return Redirect::back()->withErrors([$errorMsg, "msg"]);
            }
        }
        else
        {
            $errorMsg = "Harap menggunakan E-mail UII";
            return Redirect::back()->withErrors([$errorMsg, "msg"]);
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

    public function resend(Request $request)
    {
        $id = $request->input("id");
        $user = User::where("id", $id)->get()->first();

        $email = $user->email;
        $nim = substr($email, 0, 8);
        $nama = $user->nama;
        $otp = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 1,  6);
        $otp_expire = Carbon::now()->addMinutes(30);

        Mail::to($email)->send(new RegistrasiOTP($nim, $nama, $otp, $otp_expire));
        $kirim = User::where("id", $id)->update(["otp" => $otp, "otp_expired" => $otp_expire]);
        $msg = "Kode OTP sudah terkirim!";

       return Redirect::back()->with(['resend_msg' => $msg]);
    }
}
