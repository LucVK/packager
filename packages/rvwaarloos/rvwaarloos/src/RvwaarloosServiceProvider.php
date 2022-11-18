<?php

namespace Rvwaarloos\Rvwaarloos;

use Illuminate\Support\ServiceProvider;

class RvwaarloosServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'rvwaarloos');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'rvwaarloos');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rvwaarloos.php', 'rvwaarloos');

        // Register the service the package provides.
        $this->app->singleton('rvwaarloos', function ($app) {
            return new Rvwaarloos;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['rvwaarloos'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/rvwaarloos.php' => config_path('rvwaarloos.php'),
        ], 'rvwaarloos.config');

        // Publishing seeders.
        $this->publishes([
            __DIR__.'/../database/seeders' => database_path('seeders'),
        ], 'rvwaarloos.seeders');

        // Publishing models.
        $this->publishes([
            __DIR__.'/../models' => app_path('Models/Rv'),
        ], 'rvwaarloos.models');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/rvwaarloos'),
        ], 'rvwaarloos.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/rvwaarloos'),
        ], 'rvwaarloos.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/rvwaarloos'),
        ], 'rvwaarloos.views');*/

        // Registering package commands.
        // $this->commands([]);

    }
}
