<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('searchinputs', function (string $expression): string 
        {
            return <<<EOL
                <input id="operationtype-input-$expression" type="hidden" value="$expression"
                name="operation_type">
                <input id="locationid-input-$expression" type="hidden" name="id">
                <input id="locationname-input-$expression" type="hidden" name="name">
            EOL;
        });
    }
}
