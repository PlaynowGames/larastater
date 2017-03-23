<?php

namespace App\Modules\Financas\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'financas');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'financas');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'financas');
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
