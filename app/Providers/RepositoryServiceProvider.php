<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Player\PlayerRepository;
use App\Repository\Club\Team\TeamRepository;
use App\Repository\Player\PlayerRepositoryInterface;
use App\Repository\Club\Team\TeamRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
