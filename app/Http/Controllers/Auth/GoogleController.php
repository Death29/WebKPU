<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $user = Socialite::driver('google')->user();

            $findUser = User::where('google_id',$user->id)->first();
            
            if($findUser){
                Auth::login($findUser);

                return redirect('/home');
    
            }else{
                $newUser = User::create([
                    'nim' => $user->nim,
                    'name' => $user->name,
                    'fakultas' => $user->fakultas,
                    'email' => $user->email,
                    'password' => encrypt('Superman_test'),
                    'google_id' => $user->id
                ]);
                Auth::login($newUser);

                return redirect('/home');
            }
        }
        catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
