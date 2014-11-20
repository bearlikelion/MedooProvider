## Autarky Medoo Provider

[Medoo](https://github.com/catfan/Medoo) is a lightweight easy and powerful database framework compatible with various databases including MySQL, MSSQL, SQLite, MariaDB, Sybase, Oracle, PostgreSQL and more. [Autarky](https://github.com/autarky/framework) is a PHP framework aimed at developers wit a focus on freedom of choice.

### Usage Instructions

First, update database config to use a new, Medoo specific connection.

```PHP
return [
	/** The connection to use. */
	'connection' => 'medoo',

	/** The connections to choose from. */
	'connections' => [
		'medoo' => [
			/** Required */
			'server' => '{sever_host}',
			'username' => '{username}',
			'password' => '{password}',
			'database_type' => 'mysql',
			'database_name' => '{database_name}',

			/** Optional */
			'port' => 3306,
			'charset' => 'utf8',
		]
	]
];
```

Once configured, you can resolve Medoo using Autarky's container

```PHP
	$container = $this->app->getContainer();
	$db = $container->resolve('Medoo'); // Medoo is also aliased as DB

	$student = $db->get('students', '*', [
		'name' => 'Bobby Tables'
	]);
```

For further documentation on using Medoo, please consult the [documentation](http://medoo.in/doc).
