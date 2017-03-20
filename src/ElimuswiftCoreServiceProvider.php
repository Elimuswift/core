<?php

namespace Elimuswift\Core;

use Illuminate\Support\ServiceProvider;

class ElimuswiftCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadFiles();
    }

//end boot()

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/core.php',
            'core'
        );

        $this->app->singleton(
            'envatoapi',
            function () {
                return new EnvatoApi(env('ENVATO_SECRET'));
            }
        );

        $this->app->bind('Elimuswift\Core\Repositories\Contracts\RepositoryContract', 'Elimuswift\Core\Repositories\UpdatesRepository');
    }

//end register()

    /**
     * Load and publish app migration files.
     **/
    protected function loadFiles()
    {
        $this->publishes(
             [
              __DIR__.'config/core.php' => config_path('core.php'),
             ]
         );
        // $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

//end loadFiles()
}//end class
