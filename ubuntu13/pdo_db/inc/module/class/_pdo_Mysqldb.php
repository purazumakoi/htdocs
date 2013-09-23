<?php
/**
 * Mysqldb データベース接続クラス
 * Create: 2013/09/18 市原 (ichihara) -- mdb2のをPDOに変換
 */



Class Mysqldb {

		protected $pdo;
		protected $qry;

		function __construct() {
			$dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s',
				DB_HOST,
				DB_NAME,
				DEFENCOMYSQL
			);

				$options = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,	// エラーレポート : 例外 を投げる
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,	// Classオブジェクトとして戻り値を返す
				PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,		// selectでもrowCountを使うため
				PDO::ATTR_EMULATE_PREPARES => true,				// プリペアステートメントをon（PHP5.3.6より前＆sjis時はfalseにする）
			);

			try{
				$this->pdo =& new PDO($dsn, DB_USER, DB_PASS, $options	);

			}catch (PDOException $e){
				print "Connection failed: " . $e->getMessage() . "<br>";
			}
		}

		function __destruct() {
			$this->fCloseDB();
		}

		function fCloseDB() {
			$this->pdo = null;
		}

		function fQueryDB($sql) {
			unset($this->qry);
			if(strlen($sql) == 0){
				throw new Exception("empty sql");
				return;
			}
			try {
	        	$this->qry =& $this->pdo->query($sql);
			} catch( PDOExecption $e ) {
				print "fQueryDB Error: " . $e->getMessage() . "<br>";
			}

    }

		function fNumRowsDB() {
			return $this->qry->rowCount();
		}

    function fFetchRowDB() {
			try {
				$row =& $this->qry->fetch(PDO::FETCH_ASSOC);
			} catch( PDOExecption $e ) {
				print "fFetchRowDB Error: " . $e->getMessage() . "<br>";
			}
			return $row;
    }

		function fClearQueryDB() {
			$this->qry->closeCursor();
			unset($this->qry);
		}

		function fGetInsertId() {
			$id = $this->pdo->lastInsertId();
			return $id;
		}
}

