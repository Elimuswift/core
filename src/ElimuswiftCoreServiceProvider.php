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
		$this->loadMigrationsFrom(__DIR__.'/Migrations');
		$this->loadRoutesFrom(__DIR__.'/routes.php');
	}

}
