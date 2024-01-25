<?php

use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/admin/dashboard', function () {
    return Inertia::render('Admin/Dashboard');
})->name('dashboard');

// Route::name('admin.')->prefix('admin')->group(function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });
