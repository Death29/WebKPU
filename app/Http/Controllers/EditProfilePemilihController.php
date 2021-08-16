<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Redirect;
use Session;

class EditProfilePemilihController extends Controller
{
    public function index()
    {
        if(Auth::guard("pemilih")->check())
        {
            $id = Auth::guard("pemilih")->user()->id;
            $user = User::where("id", $id)->get();
            return view('edit-profile-pemilih', ["user" => $user]);
        }
        else
        {
            return Redirect::to('/login-pemilih');
        }
    }

    public function edit(Request $request)
    {
        $update = User::where("id", $request->id)->update(["name" => $request->nama]);
        $msg = "Profile berhasil diupdate";
        return Redirect::to('/info-profile')->with(['edit-msg' => $msg]);
    }
}
