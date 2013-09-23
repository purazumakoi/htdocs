<?php
/**
 * Created by JetBrains PhpStorm.
 * User: purazumakoi
 * Date: 2013/09/15
 * PDOのインサート
 *
 * 参照
 * http://qiita.com/tabo_purify/items/2575a58c54e43cd59630
 */

try {
    $pdo = new PDO('mysql:host=localhost;dbname=pdo_db;charset=utf8','root','otokogackt',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
        ));

    //　insert
    $str_sql = 'INSERT INTO test01 (name, age, address, e_mail) VALUES (:name, :age, :address, :e_mail)';
    $stmt = $pdo -> prepare($str_sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':e_mail', $e_mail, PDO::PARAM_STR);

    for($i=0; $i<1000; $i++){
        $name = '市原'.$i;
        $age = 15;
        $address = '俺です。いぇーください。';
        $e_mail = 'hogehoge@exsample.com';
        $stmt->execute();
    }
    var_dump($age);


} catch (PDOException $e) {
    exit( $e->getMessage() );
}








