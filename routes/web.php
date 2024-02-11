<?php

use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Features;
use Laravel\Fortify\RoutePath;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\JsonViewerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TempTransactionController;
use App\Http\Controllers\UploadStripeDataController;
use App\Http\Controllers\BatchUpdateTransactionsController;

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
});

Route::get('stripe', [UploadStripeDataController::class, 'index'])->name('stripe.index');
Route::post('stripe', [UploadStripeDataController::class, 'store'])->name('stripe.store');
Route::get('stripe/edit', [UploadStripeDataController::class, 'edit'])->name('stripe.edit');
Route::get('stripe/create', [UploadStripeDataController::class, 'create'])->name('stripe.create');
Route::post('stripe/update', [UploadStripeDataController::class, 'update'])->name('stripe.update');
 
Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::post('stripe/proccess', [TransactionController::class, 'proccess'])->name('stripe.proccess');

Route::patch('transactions/{transaction}', [TempTransactionController::class, 'update'])->name('transaction.update');


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

Route::middleware('verified')->group(function () {
    Route::get('model-select', function () {
        return Inertia::render('ModelSelect');
    })->name('model-select');
});
