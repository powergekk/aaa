<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerTestRepository();
    }

    public function registerTestRepository()
    {
        $this->app->singleton('test', 'App\Repository\Test\Eloquent\TestRepository');
    }
}
