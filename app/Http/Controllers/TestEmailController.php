<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrasiOTP;

class TestEmailController extends Controller
{
    public function index()
    {
        $nim = "99999999";
        $nama = "Unnamed";

        Mail::to("tes@gmail.com")->send(new RegistrasiOTP($nim, $nama));

        return view('login');
    }
}
