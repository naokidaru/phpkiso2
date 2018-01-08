<?PHP
   //扱いやすいように変数に代入
   $name = htmlspecialchars($_POST["name"]);
   $vorname = htmlspecialchars($_POST["vorname"]);
   $anschrift = htmlspecialchars($_POST["anschrift"]);

  //データベースとのやり取りの処理を記述

  //ステップ１データベースに接続する
  //データベース接続文字列
// mysql :接続するデータベースの種類
//  abaname データベース名
//host パソコンの名前, localhost このプログラムが存在している場所と同じサーバー
//空欄を入れないように記述
  //$dsn = 'mysql:dbname=phpkiso;host=localhost';

  //$user データベース接続用ユーザー名
  //$password データベース接続用パスワード
  //$user = 'root';
  //$password='';

  //データベース接続オブジェクト
  //$dbh = new PDO($dsn, $user, $password);

  //今から実行するsql文を文字コードutf-8で送る設定（文字化け防止）
  //$dbh->query('SET NAMES utf8');


require('dbconect.php');
//ステップ２
  $sql = 'INSERT INTO `survey` (`nickname`,`email`,`content`) VALUES ("'.$name.'","'.$vorname.'","'.$anschrift.'");';

  // var_dump($sql);
  //SQL文文を実行する準備
  //→ アロー演算子
  $stmt = $dbh->prepare($sql);
  //SQL文を実行
  $stmt->execute();



//ステップ３　データベースの切断（オブジェクトを空っぽにしている）
  $dbh = null;

  ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

  <title>送信完了</title>
</head>
<body>
<div id="last">
<h1>お問い合わせありがとうございました！</h1>



<div class="list-group">
  <a href="#" class="list-group-item disabled">お名前：<?php echo htmlspecialchars($_POST["name"]); ?>様</a>
  <a href="#" class="list-group-item">メールアドレス：<?php echo htmlspecialchars($_POST["vorname"]); ?></a>
  <a href="#" class="list-group-item">お問い合わせ内容：<?php echo htmlspecialchars($_POST["anschrift"]); ?></a>
</div>
<?php include('copyright.php');

?>
</body>
</html>