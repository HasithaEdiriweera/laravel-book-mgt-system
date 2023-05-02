<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AuthorServiceInterface;
use App\Services\AuthorService;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        AuthorServiceInterface::class => AuthorService::class,
    ];
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
        //
    }
}
