<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fuel_dev',
			'username'   => 'purazumakoi',
			'password'   => 'otokogackt',
		),
		'identifier'   => '`',
		//'table_prefix' => 'sw_',
		'charset'      => 'utf8',
		'caching'      => false,
		'profiling'    => false,
	),
	'mongo' => array(
		// このグループは、インスタンス名が省略された場合に使用されます。
		'default' => array(
			'hostname'   => 'localhost',
			'database'   => 'mongo_fuel',
		),
	),
	/*'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fuel_dev',
			'username'   => 'root',
			'password'   => 'root',
		),
	),*/
);
