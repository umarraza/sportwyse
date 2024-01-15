<?php

use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\JsonViewerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Fortify::loginView(function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => false,
        'canResetPassword' => Route::has('password.request'),
        'status' => session('status'),
    ]);
});

 Route::middleware([
     'auth:sanctum',
     config('jetstream.auth_session'),
     'verified',
 ])->group(function () {
     Route::get('dashboard', function () {
        if (Auth::user()->isClub()) {
            $route = 'club.dashboard';
        }

        if (Auth::user()->isStaff()) {
            $route = 'staff.dashboard';
        }

        if (Auth::user()->isParent()) {
            $route = 'parent.dashboard';
        }

        return redirect()->route($route);

        return Inertia::render('Dashboard');
     })->name('dashboard');
 });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('import', [JsonViewerController::class, 'index'])->name('import');
});
