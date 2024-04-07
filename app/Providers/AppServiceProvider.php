<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Country;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        try {
            // Your super fun database stuff
            view()->share([

                'countCountries' => Country::count(),
                'countCities' => City::count(),
                'countShops' => Shop::count(),

            ]);
        } catch (\Exception $e) {
            // do nothing
        }
    }
}
