<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrasiOTP;
use Carbon\Carbon;

class TestEmailController extends Controller
{
    public function index()
    {
        $nim = "99999999";
        $nama = "Unnamed";
        $otp = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 1,  6);
        $otp_expire = Carbon::now()->addMinutes(30);

        Mail::to("tes@gmail.com")->send(new RegistrasiOTP($nim, $nama, $otp, $otp_expire));

        return view('login');
    }
}
