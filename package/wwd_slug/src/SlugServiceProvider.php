<?php

namespace wwd\slug;

use Illuminate\Support\ServiceProvider;


class SlugServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . 'database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../views', 'wwd/slug');
    }


    public function register()
    {
    }

}