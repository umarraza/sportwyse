<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Club\Team\TeamRepository;
use App\Repository\Club\Team\TeamRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
