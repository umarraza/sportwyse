<?php

namespace App\Providers;

use App\Repository\Camp\CampRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Player\PlayerRepository;
use App\Repository\Stripe\StripeRepository;
use App\Repository\Club\Team\TeamRepository;
use App\Repository\Camp\CampRepositoryInterface;
use App\Repository\Staff\Team\StaffTeamRepository;
use App\Repository\Parent\ParentPlayerRepository;
use App\Repository\Player\PlayerRepositoryInterface;
use App\Repository\Stripe\StripeRepositoryInterface;
use App\Repository\Club\Team\TeamRepositoryInterface;
use App\Repository\Parent\ParentPlayerRepositoryInterface;
use App\Repository\Staff\Team\StaffTeamRepositoryInterface;

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
        $this->app->bind(CampRepositoryInterface::class, CampRepository::class);
        $this->app->bind(StripeRepositoryInterface::class, StripeRepository::class);
        $this->app->bind(StaffTeamRepositoryInterface::class, StaffTeamRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
