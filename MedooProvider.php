<?php
namespace Bearlikelion;
use Autarky\Kernel\ServiceProvider;

/**
 * Service provider for the Medoo ORM
 */
class MedooProvider extends ServiceProvider
{
	/**
	 * Register the service provider
	 */
	public function register()
	{
		$containter = $this->app->getContainer();
		$containter->define('Medoo', function() {
			$connection = $this->app->getConfig()->get("database.connection");
			$db = new \medoo($this->app->getConfig()->get("database.connections.$connection"));
			return $db;
		});

		$container->share('Medoo');

		$container->alias('Medoo', 'DB');
	}
}
