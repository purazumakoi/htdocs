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

try {
    $pdo = new PDO('mysql:host=localhost;dbname=pdo_db;charset=utf8','root','otokogackt',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
        ));

    // select 普通に書く
    $str_sql = "SELECT * FROM test01 ORDER BY id ASC";
    $stmt = $pdo->query($str_sql);
    //while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    foreach ($stmt as $row) {
        print_r($row);
    }

    // select 疑問符プレースホルダ
    $id = 0;
    $age = 15;
    $str_sql = 'SELECT * FROM `test01` WHERE `id` > ? AND `age` > ?';
    $stmt = $pdo->prepare($str_sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->bindValue(2, $age, PDO::PARAM_INT);
    $stmt->execute();
    $ret=$stmt->fetchAll();
    foreach ($ret as $row) {
        print_r($row);
    }

    // select 名前付きプレースホルダ
    $id = 0;
    $age = 15;
    $str_sql = 'SELECT * FROM `test01` WHERE `id` > :id AND `age` > :age';
    $stmt = $pdo->prepare($str_sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':age', $age, PDO::PARAM_INT);
    $stmt->execute();
    $ret=$stmt->fetchAll();
    foreach ($ret as $row) {
        print_r($row);
    }

    // select 疑問符プレースホルダ
    // prepare() → execute() の2ステップでクエリを実行する  execute() の引数に配列を渡す
    $id = 0;
    $age = 15;
    $str_sql = 'SELECT * FROM `test01` WHERE `id` > ? AND `age` > ?';
    $stmt = $pdo->prepare($str_sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->bindValue(2, $age, PDO::PARAM_INT);
    $stmt->execute();
    $ret=$stmt->fetchAll();
    foreach ($ret as $row) {
        print_r($row);
    }



} catch (PDOException $e) {
    exit( $e->getMessage() );
}








