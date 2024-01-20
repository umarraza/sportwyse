<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Player\PlayerRepository;
use App\Repository\Club\Team\TeamRepository;
use App\Repository\Parent\ParentPlayerRepository;
use App\Repository\Player\PlayerRepositoryInterface;
use App\Repository\Club\Team\TeamRepositoryInterface;
use App\Repository\Parent\ParentPlayerRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
        $this->app->bind(ParentPlayerRepositoryInterface::class, ParentPlayerRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
