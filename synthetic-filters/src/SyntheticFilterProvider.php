<?php

namespace SyntheticFilters;

use Illuminate\Support\ServiceProvider;

class SyntheticFilterProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->publishes([
            __DIR__ . '/Config/synthetic-filter.php' => config_path('synthetic-filter.php'),
        ], 'synthetic-filter');
    }
}
