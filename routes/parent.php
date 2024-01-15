<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Parent\DashboardController;

Route::name('parent.')->prefix('parent')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});