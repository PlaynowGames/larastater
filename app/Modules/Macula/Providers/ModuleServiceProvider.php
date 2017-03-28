<?php

namespace App\Modules\Macula\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'macula');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'macula');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'macula');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
