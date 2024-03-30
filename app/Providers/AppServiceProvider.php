<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('new_york_address', function ($attribute, $value, $parameters, $validator) {
            // Custom validation logic to check if the address contains keywords or patterns associated with New York City

            $keywords = ['NY', 'nyc', 'manhattan', 'brooklyn', 'queens', 'bronx', 'staten island'];
            foreach ($keywords as $keyword) {
                if (stripos($value, $keyword) !== false) {
                    return true;
                }
            }

            return false;
        });
    }
}
