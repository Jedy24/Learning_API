<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($request->expectsJson() && $user) {
            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
            ]);
        }

        return view('dashboard', compact('user'));
    }
}
