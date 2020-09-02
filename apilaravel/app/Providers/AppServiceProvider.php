<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Extensions\BindsRepositorios;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        new BindsRepositorios($this->app);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
