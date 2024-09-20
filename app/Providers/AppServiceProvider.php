<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
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
        define('BASE','127.0.0.1:8001/');
        Http::macro('room', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])->baseUrl(BASE.'rooms');
        });

        Http::macro('image', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])->baseUrl(BASE.'media/');
        });

        Http::macro('event', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])->baseUrl(BASE.'events');
        });
    }
}
