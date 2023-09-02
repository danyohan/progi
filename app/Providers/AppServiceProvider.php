<?php

namespace App\Providers;

use App\Http\Controllers\BidCalculationController;
use App\Repositories\FeeRepository;
use App\Services\CalculateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /*$this->app->bind(BidCalculationController::class, function ($app) {
            return new CalculateService(new FeeRepository());
          });*/

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
