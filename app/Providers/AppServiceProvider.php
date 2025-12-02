<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\UserRegistered;
use App\Listeners\SendUserVerificationEmail;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    protected $listen = [
        \App\Events\UserRegistered::class => [
            \App\Listeners\SendUserVerificationEmail::class,
        ],
    ];


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
