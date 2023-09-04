<?php

namespace App\Providers;

use App\Http\Controllers\CalculationController;
use App\Interfaces\CalculationInterface;
use App\Repositories\CalculationRepository;
use App\Services\CalculateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(CalculationController::class)
            ->needs(CalculationInterface::class)
            ->give(function () {
                return new CalculateService(new CalculationRepository());
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
