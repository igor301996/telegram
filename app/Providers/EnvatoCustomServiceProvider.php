<?php

namespace App\Providers;

use App\library\Services\DemoOne;
use App\library\Services\Help;
use App\library\Services\Start;
use Illuminate\Support\ServiceProvider;

class EnvatoCustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Library\Services\DemoOne', function ($app) {
            return new DemoOne();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
