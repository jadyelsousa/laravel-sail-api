<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repositories\Contracts\UserRepositoryInterface','App\Repositories\UserRepository');
        $this->app->bind('App\Repositories\Contracts\CityRepositoryInterface','App\Repositories\CityRepository');
        $this->app->bind('App\Repositories\Contracts\DoctorRepositoryInterface','App\Repositories\DoctorRepository');
        $this->app->bind('App\Repositories\Contracts\PatientRepositoryInterface','App\Repositories\PatientRepository');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
