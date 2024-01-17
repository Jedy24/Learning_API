<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class GoogleController extends Controller
{
    public function googlepage(){
        return socialite::driver('google')->redirect();
    }


    public function googlecallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
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
