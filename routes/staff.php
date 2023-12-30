<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\TeamController;
use App\Http\Controllers\Staff\DashboardController;

Route::name('staff.')->prefix('staff')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('teams', TeamController::class);

    // Route::get('teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('teams/{team}/add-player', [TeamController::class, 'create'])->name('teams.add-player');
    Route::post('teams/{team}/add-player', [TeamController::class, 'addPlayer'])->name('teams.add-player');
    // Route::delete('teams/{team}/players/{player}', [TeamController::class, 'deletePlayer'])->name('teams.player.delete');
});