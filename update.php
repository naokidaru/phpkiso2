<?php

  $name = htmlspecialchars($_POST["name"]);
   $vorname = htmlspecialchars($_POST["vorname"]);
   $anschrift = htmlspecialchars($_POST["anschrift"]);
  //どのデータを消すのか指定しているデータをGET送信de修
  //var_dump($_GET['code']);
  //echo 'delete.phpに移動してるよ';
  //if (isset($_GET['code'])){
    //step1
 //データベースに接続
  require('dbconect.php');


  //step2
  //SQL実行
  $sql = 'UPDATE `survey` SET `nickname`=("'.$name.'"),`email`=("'.$vorname.'"),`content`=("'.$anschrift.'") WHERE `code`='.$_POST['code'];

  //SQL文文を実行する準備
  $stmt = $dbh->prepare($sql);

  //SQL文を実行
  $stmt->execute();



  //step3
  //データベースの破棄
  $dbh = null;
  


  //view.phpに戻る
  header('Location: view.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<input type="hidden" name="code"  value="<?php echo $_POST["code"]; ?>">
<input type="hidden" name="name" value="<?php echo $_POST["name"]; ?>">
<input type="hidden" name="vorname" value="<?php echo $_POST["vorname"]; ?>">
<input type="hidden" name="anschrift" value="<?php echo $_POST["anschrift"]; ?>">

<?php echo $_POST['code']; ?>
<?php echo $_POST['vorname']; ?>
</body>
</html>