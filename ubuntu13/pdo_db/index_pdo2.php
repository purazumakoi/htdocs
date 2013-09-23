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


require_once('inc/config/config.php');
require_once('inc/module/class/_pdo_Mysqldb.php');


try {
	$time_start = microtime(true);

		$ary_test = [];

		$str_sql = "SELECT * FROM test01 ORDER BY id ASC";
		$stmt = new Mysqldb();
		$stmt->fQueryDB($str_sql);

		$num = $stmt->fNumRowsDB();

		if ($num > 0) {
			for ($i = 0; $i < $num; $i++) {
				$ary_test[$i] = $stmt->fFetchRowDB();

			}
		}
//		foreach ($stmt as $row) {
//			$ary_test[] = $row;
//		}
	//

		$stmt->fClearQueryDB();

		$stmt->fCloseDB();
	print_r($ary_test);


	$time = microtime(true) - $time_start;
	echo "{$time} 秒 <br>";



} catch (PDOException $e) {
	exit($e->getMessage());
}








