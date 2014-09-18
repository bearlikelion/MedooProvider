<?php
namespace Bearlikelion;

use Autarky\Kernel\ServiceProvider;
use Autarky\Container\ContainerInterface;

/**
 * Service provider for laravel's Eloquent ORM
 */
class MedooProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->share('Medoo', function() {
			$db = new medoo;
			return $db;
		});
	}
}
