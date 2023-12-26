<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\CampController;
use App\Http\Controllers\Staff\TeamController;
use App\Http\Controllers\Staff\ParentController;
use App\Http\Controllers\Staff\PlayerController;
use App\Http\Controllers\Staff\DashboardController;

Route::name('staff.')->prefix('staff')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('teams', TeamController::class);
});