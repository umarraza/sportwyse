<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\CampController;
use App\Http\Controllers\Club\TeamController;
use App\Http\Controllers\Club\PlayerController;
use App\Http\Controllers\Club\DashboardController;

Route::name('club.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('camps', CampController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);
});