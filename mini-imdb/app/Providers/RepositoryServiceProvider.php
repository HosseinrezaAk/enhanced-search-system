<?php

namespace App\Providers;

use App\Repositories\Crew\CrewRepository;
use App\Repositories\Crew\CrewRepositoryInterface;
use App\Repositories\Genre\GenreRepository;
use App\Repositories\Genre\GenreRepositoryInterface;
use App\Repositories\Movie\MovieRepository;
use App\Repositories\Movie\MovieRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CrewRepositoryInterface::class, CrewRepository::class);
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
