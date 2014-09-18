<?php
namespace Bearlikelion;

use Autarky\Kernel\ServiceProvider;
use Autarky\Container\ContainerInterface;

/**
 * Service provider for the Medoo ORM
 */
class MedooProvider extends ServiceProvider
{
	public function register()
	{
		$connection = $this->app->getConfig()->get("database.connection");
		$this->app->share('Medoo', function() {
			$db = new medoo($this->app->getConfig()->get("database.connections.$connection"));
			return $db;
		});
	}
}
