<?php
namespace Bearlikelion;

use Illuminate\Database\Capsule\Manager;

use Autarky\Kernel\ServiceProvider;
use Autarky\Container\ContainerInterface;

/**
 * Service provider for laravel's Eloquent ORM
 */
class EloquentProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->share('Illuminate\Database\Capsule\Manager', function() {
		    $capsule = new Capsule;
		    $connection = $this->app->getConfig()->get("database.connection");
		    $capsule->addConnection($this->app->getConfig()->get("database.connections.$connection");
		    return $capsule;
		});

	    $this->app->config(function($app) {
	        $this->app->resolve('Illuminate\Database\Capsule\Manager')->bootEloquent();
	    });
	}
}
