<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Redirect;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->check())
        {
            return view('admin');
        }
        else
        {
            return Redirect::to('/login-admin');
        }
    }
}
