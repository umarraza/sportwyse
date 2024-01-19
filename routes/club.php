<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\CampController;
use App\Http\Controllers\Club\TeamController;
use App\Http\Controllers\Club\ParentController;
use App\Http\Controllers\Club\PlayerController;
use App\Http\Controllers\Club\DashboardController;
use App\Http\Controllers\Club\TeamPlayerController;

Route::name('club.')->prefix('club')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('camps', CampController::class);
    Route::resource('parents', ParentController::class);
    Route::resource('parents.players', PlayerController::class)->except('show')->shallow();
    
    Route::resource('teams', TeamController::class);
    Route::get('teams/{team}/players', [TeamPlayerController::class, 'index'])->name('teams.players.index');
    Route::get('players/{plyare}', [TeamPlayerController::class, 'show'])->name('players.show');
    Route::get('teams/{team}/players/add', [TeamPlayerController::class, 'add'])->name('teams.players.add');
    Route::post('teams/{team}/players', [TeamPlayerController::class, 'store'])->name('teams.players.store');
    Route::delete('teams/{team}/players/{player}', [TeamPlayerController::class, 'delete'])->name('teams.players.delete');
});