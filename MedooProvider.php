<?php
namespace Bearlikelion;

use Autarky\Kernel\ServiceProvider;

/**
 * Service provider for the Medoo ORM
 */
class MedooProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->getContainer()->share('Medoo', function() {
			$connection = $this->app->getConfig()->get("database.connection");
			$db = new \medoo($this->app->getConfig()->get("database.connections.$connection"));
			return $db;
		});

		$this->app->getContainer()->alias('DB', 'Medoo');
	}
}
