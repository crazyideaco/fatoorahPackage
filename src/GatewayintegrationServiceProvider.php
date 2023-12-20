<?php

namespace Fatoorahpayment\Gatewayintegration;

use Illuminate\Support\ServiceProvider;

class GatewayintegrationServiceProvider  extends ServiceProvider
{

    /**
     * Bootstrap any package services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/myfatoorahConfig.php' => config_path('myfatoorahConfig.php'),
        ]);

        // Fatoorahpayment\Gatewayintegration\src\GatewayintegrationServiceProvider.php
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

        // Fatoorahpayment\Gatewayintegration\src\GatewayintegrationServiceProvider.php
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'Gatewayintegration');
        // Fatoorahpayment\Gatewayintegration\src\GatewayintegrationServiceProvider.php
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
    }

    public function register()
    {
    }
}
