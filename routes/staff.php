<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\TeamController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\TeamPlayerController;

Route::name('staff.')->prefix('staff')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('teams/{team}/players', [TeamPlayerController::class, 'index'])->name('teams.players.index');
    Route::get('teams/{team}/players/add', [TeamPlayerController::class, 'add'])->name('teams.players.add');
    Route::post('teams/{team}/players', [TeamPlayerController::class, 'store'])->name('teams.players.store');
    Route::delete('teams/{team}/players/{player}', [TeamPlayerController::class, 'delete'])->name('teams.players.delete');

});