<?php

namespace App\Providers;

use App\Services\HttpClientService;
use App\Services\RetryHttpClientDecorator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(HttpClientService::class, function ($app) {
            return HttpClientService::getInstance();
        });

        $this->app->singleton('retryHttpClient', function($app){
            $httpClient = $app->make(HttpClientService::class)->getHttpClient();
            return new RetryHttpClientDecorator($httpClient, 3);
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
