<?php

namespace App\Providers;

use App\Repositories\Crew\CrewRepository;
use App\Repositories\Crew\CrewRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CrewRepositoryInterface::class, CrewRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
