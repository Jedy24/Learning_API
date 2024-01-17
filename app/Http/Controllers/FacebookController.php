<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class FacebookController extends Controller
{
    public function facebookpage(){
        return socialite::driver('facebook')->redirect();
    }

    public function facebookcallback(){
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => Hash::make('123456789')
                ]);

                Auth::login($newUser);
            }

            $userData = [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ];

            if (request()->expectsJson()) {
                return response()->json($userData);
            }

            return redirect()->intended('dashboard')->with('userData', $userData);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
