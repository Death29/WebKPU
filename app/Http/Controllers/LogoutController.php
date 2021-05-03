<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class LogoutController extends Controller
{
    public function index()
    {
        return view('login-admin');
    }
}
