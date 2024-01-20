<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\CampController;
use App\Http\Controllers\Club\TeamController;
use App\Http\Controllers\Club\ParentController;
use App\Http\Controllers\Club\PlayerController;
use App\Http\Controllers\Club\DashboardController;
use App\Http\Controllers\Club\TeamPlayerController;
use App\Http\Controllers\Club\ParentPlayerController;

Route::name('club.')->prefix('club')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('camps', CampController::class);
    Route::resource('parents', ParentController::class);
    Route::resource('parents.players', ParentPlayerController::class)->except('show', 'index')->shallow();
    
    Route::resource('teams', TeamController::class);

    /**
     * TeamPlayerController
     */
    Route::get('teams/{team}/players', [TeamPlayerController::class, 'index'])->name('teams.players.index');
    Route::get('players/{plyare}', [TeamPlayerController::class, 'show'])->name('players.show');
    Route::get('teams/{team}/players/add', [TeamPlayerController::class, 'add'])->name('teams.players.add');
    Route::post('teams/{team}/players', [TeamPlayerController::class, 'store'])->name('teams.players.store');
    Route::delete('teams/{team}/players/{player}', [TeamPlayerController::class, 'delete'])->name('teams.players.delete');

    /**
     * PlayerController
     */
    Route::get('players', [PlayerController::class, 'index'])->name('players.index');
    Route::get('player/{player}/teams', [PlayerController::class, 'teams'])->name('players.teams');
    Route::get('players/{player}/details', [PlayerController::class, 'show'])->name('players.details');
    Route::post('player/{player}/teams/{team}/update-status', [PlayerController::class, 'updateStatus'])->name('players.teams.update-status');
});