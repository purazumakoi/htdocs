<?php
/**
 * Created by JetBrains PhpStorm.
 * User: purazumakoi
 * Date: 2013/09/09
 * PDOのselect方法３パターン
 *
 * 参照
 * http://qiita.com/mpyw/items/b00b72c5c95aac573b71
 */


	// PEAR Packages
	$pear_lib = array(
		'PEAR.php',
		'PEAR/Exception.php',
		'MDB2.php',
		'MDB2/Driver/mysql.php',
		'MDB2/Driver/Manager/mysql.php',
		'HTML/QuickForm.php',
		'HTML/QuickForm/Renderer/QuickHtml.php',
		'HTML/Template/IT.php',
		'Net/FTP.php',
		'Net/URL.php',
		'Net/Socket.php',
		'HTTP/HTTP.php',
		'HTTP/Request.php'
	);

	//キャラセット
	define('DEFENCOPHP', 'UTF-8');
	define('DEFENCOHTML', 'UTF-8');
	define('DEFENCOMYSQL', 'UTF8');

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'pdo_db');
	define('DB_USER', 'root');
	define('DB_PASS', 'otokogackt');

	define('BASE_DIR', '/var/www/pdo_db/');
	define('MAIL_MASTER', 'purazumakoi@gmail.com');
	define('MAIL_MASTERNANE', 'WEB MASTER');
	define('MAIL_PATH', '/usr/sbin/sendmail');
	define('CONVERT_PATH', '/usr/bin/convert');

	define('LIBRARY_DIR', BASE_DIR . 'lib/');
	define('LOG_DIR', BASE_DIR .'log/');
	define('PEAR_DIR', LIBRARY_DIR . 'PEAR/');

	ini_set('include_path', PEAR_DIR . ini_get('include_path'));

	foreach($pear_lib as $key => $value) {
		require_once(PEAR_DIR . $value);
	}

	mb_internal_encoding(DEFENCOPHP);








