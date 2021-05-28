<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->check())
        {
            Auth::guard('admin')->logout();
            return Redirect::to('/');
        }
        
        if(Auth::guard('pemilih')->check())
        {
            Auth::guard('pemilih')->logout();
            return Redirect::to('/');
        }
    }
}
