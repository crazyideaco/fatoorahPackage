<?php

namespace Fatoorahpayment\Gatewayintegration;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class GatewayintegrationServiceProvider  extends ServiceProvider
{

    /**
     * Bootstrap any package services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/myfatoorahConfig.php' =>  config_path('myfatoorahConfig.php'),
        ], 'crazyfatoorahpackage-config');

        // Fatoorahpayment\Gatewayintegration\src\GatewayintegrationServiceProvider.php
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

        // Fatoorahpayment\Gatewayintegration\src\GatewayintegrationServiceProvider.php
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'Gatewayintegration');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/fatoorahpackage'),
        ], 'crazyfatoorahpackage-views');

        // Fatoorahpayment\Gatewayintegration\src\GatewayintegrationServiceProvider.php
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
    }

    public function register()
    {
    }


}
