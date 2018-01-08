<?php


  //どのデータを消すのか指定しているデータをGET送信de修
  //var_dump($_GET['code']);
  //echo 'delete.phpに移動してるよ';
  if (isset($_GET['code'])){
    //step1
 //データベースに接続
  require('dbconect.php');


  //step2
  //SQL実行
  $sql = 'DELETE FROM `survey` WHERE `code`='.$_GET['code'];

  //SQL文文を実行する準備
  $stmt = $dbh->prepare($sql);

  //SQL文を実行
  $stmt->execute();



  //step3
  //データベースの破棄
  $dbh = null;
  


  //view.phpに戻る
  header('Location: view.php');



  }

?>
<!-- local -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
不正なアクセスしないで
</body>
</html>