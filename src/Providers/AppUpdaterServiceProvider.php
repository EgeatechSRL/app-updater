<?php

namespace EgeaTech\AppUpdater\Providers;

use EgeaTech\AppUpdater\AppUpdater;
use Illuminate\Support\ServiceProvider;

class AppUpdaterServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
         $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'app-updater');

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
        $this->mergeConfigFrom(__DIR__.'/../../config/app-updater.php', 'app-updater');

        // Register the service the package provides.
        $this->app->singleton('app-updater', function ($app) {
            return new AppUpdater();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['app-updater'];
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
            __DIR__.'/../../config/app-updater.php' => config_path('app-updater.php'),
        ], 'app-updater.config');

    }
}
