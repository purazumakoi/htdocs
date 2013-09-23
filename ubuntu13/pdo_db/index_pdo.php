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



require_once('/pdo_db/inc/module/class/_pdo_Mysqldb.php');

try {
	$pdo = new PDO('mysql:host=localhost;dbname=pdo_db;charset=utf8', 'root', 'otokogackt',
		array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,	// エラーレポート : 例外 を投げる
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
			PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
			PDO::ATTR_EMULATE_PREPARES => true,
		));


	$time_start = microtime(true);

		$ary_test = [];


		// select 普通に書く
		$str_sql = "SELECT * FROM test01 ORDER BY id ASC LIMIT 100";
		$stmt = $pdo->query($str_sql);
		//while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
		foreach ($stmt as $row) {
			$obj = $row;
			$ary_test[$obj->id] = $row;

		}
	print_r($ary_test);

	$time = microtime(true) - $time_start;
	echo "{$time} 秒 <br>";



} catch (PDOException $e) {
	exit($e->getMessage());
}








