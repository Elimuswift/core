<?php
namespace Elimuswift\Core;

use Illuminate\Support\ServiceProvider;

class ElimuswiftCoreServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadFiles();
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/core.php', 'core'
        );
        
        $this->app->singleton('envatoapi', function(){
            return new EnvatoApi(env('ENVATO_SECRET'));
        });

        $this->app->bind('Elimuswift\Core\Repositories\Contracts\RepositoryContract', 'Elimuswift\Core\Repositories\UpdatesRepository');
    }

    /**
     * Load and publish app migration files
     *
     * @return void
     * 
     **/
    protected function loadFiles()
    {
         $this->publishes([
            __DIR__.'config/core.php' => config_path('core.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

}
