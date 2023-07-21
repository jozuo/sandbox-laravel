<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Domain\Chirp\ChirpRepository;
use Packages\Infra\Repository\ChirpRepositoryImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ChirpRepository::class, function ($app) {
            return new ChirpRepositoryImpl;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
