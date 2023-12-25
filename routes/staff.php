<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\CampController;
use App\Http\Controllers\Staff\TeamController;
use App\Http\Controllers\Staff\ParentController;
use App\Http\Controllers\Staff\PlayerController;
use App\Http\Controllers\Staff\DashboardController;

Route::name('staff.')->prefix('s')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('camps', CampController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);
    Route::resource('parents', ParentController::class); 
});