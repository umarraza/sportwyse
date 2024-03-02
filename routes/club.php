<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\CampController;
use App\Http\Controllers\Club\TeamController;
use App\Http\Controllers\Club\ParentController;
use App\Http\Controllers\Club\PlayerController;
use App\Http\Controllers\Club\DashboardController;
use App\Http\Controllers\Club\ReportingController;
use App\Http\Controllers\Club\TeamPlayerController;
use App\Http\Controllers\Club\ParentPlayerController;
use App\Http\Controllers\Club\PlayerTransactionController;

Route::name('club.')->prefix('club')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('camps', CampController::class);
    Route::resource('parents', ParentController::class);
    Route::resource('parents.players', ParentPlayerController::class)->except('show')->shallow();
    Route::get('players/{player}', [ParentPlayerController::class, 'show'])->name('parent.players.show');
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

    /**
     * PlayerTransactionController
     */
    Route::post('players/{player}/transactions', [PlayerTransactionController::class, 'store'])->name('players.transactions.store');
    Route::patch('transactions/{transaction}', [PlayerTransactionController::class, 'update'])->name('players.transactions.update');

    /**
     * ReportingController
     */
    Route::get('reports', [ReportingController::class, 'index'])->name('reports');
    Route::get('camps/{camp}/teams/{team}/report', [ReportingController::class, 'playerReports'])->name('team.reports');
    Route::get('teams/{team}/players/{player}/report', [ReportingController::class, 'finalReport'])->name('team.reports.final');
});