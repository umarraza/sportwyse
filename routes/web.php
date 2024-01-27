<?php

use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Features;
use Laravel\Fortify\RoutePath;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JsonViewerController;
use App\Http\Controllers\RegisteredUserController;

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
Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    
    $enableViews = config('fortify.views', true);
    
    // Registration...
    if (Features::enabled(Features::registration())) {
        if ($enableViews) {
            Route::get(RoutePath::for('register', '/register'), [RegisteredUserController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard')])
                ->name('register');
        }
    
        Route::post(RoutePath::for('register', '/register'), [RegisteredUserController::class, 'store'])
            ->middleware(['guest:'.config('fortify.guard')]);
    }

    Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
        Route::get('/login', [AdminController::class, 'loginForm']);
        Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
    });

    // In FortifyServiceProvider, if use Laravel\Fortify\Actions\AttemptToAuthenticate & Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable, admin login will work
    // If use App\Actions\Fortify\AttemptToAuthenticate &  App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable, admin login will not work and simple login will work.

    // Somehow, we need to decide inside LoginResponse which route to redirect to based on the user type.
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');
});

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
    Route::get('import', [JsonViewerController::class, 'index'])->name('import');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Log:info(Auth::guard()->name);

    Route::get('dashboard', function () {
        return Inertia::render('Admin/Dashboard');

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
