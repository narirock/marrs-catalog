<?php

namespace Marrs\MarrsCatalog;

use Illuminate\Support\ServiceProvider;
use Marrs\MarrsCatalog\Console\Commands\Install;
use Marrs\MarrsCatalog\Console\Commands\Remove;
use Marrs\MarrsCatalog\Views\Components\Main\Footer;
use Marrs\MarrsCatalog\Views\Components\Main\Nav;

class MarrsCatalogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'marrs-catalog');

        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/marrs-catalog'),
        ]);

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'marrs-catalog');

        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('marrs-catalog.php')
        ], 'marrs-catalog-config');

        $this->loadViewComponentsAs('marrs-catalog-main', [
            Footer::class,
            Nav::class,
        ]);


        $this->publishes([
            __DIR__ . '/public' => public_path('vendor/marrs-catalog'),
        ], 'marrs-catalog-assets');


        $this->loadCommands();
    }

    public function register()
    {
    }

    protected function loadCommands()
    {
        $this->commands([
            Install::class,
            Remove::class
        ]);
    }
}
