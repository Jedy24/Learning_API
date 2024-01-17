<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('auth/google', [GoogleController::class, 'googlepage']);
Route::get('auth/google/callback', [GoogleController::class, 'googlecallback']);

Route::get('auth/github', [GitHubController::class, 'githubpage']);
Route::get('auth/github/callback', [GitHubController::class, 'githubcallback']);

Route::get('auth/facebook', [FacebookController::class, 'facebookpage']);
Route::get('auth/facebook/callback', [FacebookController::class, 'facebookcallback']);
