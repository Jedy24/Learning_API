<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'google_id' => $user->google_id,
            'github_id' => $user->github_id,
            'facebook_id' => $user->facebook_id,
        ];

        if ($request->expectsJson()) {
            return response()->json($userData);
        }

        return redirect()->intended($this->redirectPath());
    }
}
