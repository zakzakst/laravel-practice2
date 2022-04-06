<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('App\MyClasses\MyService', function($app) {
            $myservice = new MyService();
            $myservice->setId(0);
            return $myservice;
        });
    }
}
