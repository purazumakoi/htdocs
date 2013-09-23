<?php
  $host = "localhost";
  $user = "root";
  $pass = "5BYDz7sWQQ";
  $db = "testDB";

  // MySQLへ接続する
  $link = mysql_connect($host,$user,$pass) or die("MySQLへの接続に失敗しました。");

  // データベースを選択する
  $sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

  // クエリを送信する
  $sql = "SELECT * FROM test";
  $result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);

  //結果セットの行数を取得する
  $rows = mysql_num_rows($result);

  //結果保持用メモリを開放する
  mysql_free_result($result);

  // MySQLへの接続を閉じる
  mysql_close($link) or die("MySQL切断に失敗しました。");
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>全件表示</title>
  </head>
  <body>
    接続ID:<?php print $link ?><br />
    選択の成否:<?php print $sdb ?><br />
    結果ID:<?php print $result ?><br />
    行数:<?php print $rows ?><br />
  </body>
</html>