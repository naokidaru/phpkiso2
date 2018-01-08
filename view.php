<?PHP
   
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
 // $dbh = new PDO($dsn, $user, $password);

  //今から実行するsql文を文字コードutf-8で送る設定（文字化け防止）
  //$dbh->query('SET NAMES utf8');



require('dbconect.php');
//ステップ２
  $sql = 'SELECT * FROM `survey`;';
  //SQL文文を実行する準備
  //→ アロー演算子
  $stmt = $dbh->prepare($sql);
  //SQL文を実行
  $stmt->execute();



//ステップ３　データベースの切断（オブジェクトを空っぽにしている）
  //$dbh = null;

  ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<title>お問い合わせ一覧</title>
</head>
<body>
<h1>お問い合わせ一覧</h1>


<table class="table table-striped">
<tbody>
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ニックネーム</th>
      <th scope="col">email</th>
      <th scope="col">お問い合わせ内容</th>
    
</tr>
</thead>
</tbody>
  </table>


<?php
//条件指定ができる繰り返し文
//無限ループwhile (1) 
while (1) {

//一行取得
$record = $stmt->fetch(PDO::FETCH_ASSOC);

if ($record == false){
    //処理を中断する
	break;
}

?>
     <!-- <table class="table table-condensed"><?php //echo $record["code"]; ?></table> -->


<table class="table">
  
  <tbody>
    <tr>
      <td><?php echo $record["code"] ?></td>
      <td><?php echo $record["nickname"] ?></td>
      <td><?php echo $record["email"] ?></td>
      <td><?php echo $record["content"] ?></td>

      
    </tr>

  </tbody>

  </table>
      <a onclick="return confirm('<?php echo $record["code"]; ?>削除します、よろしいですか');" href="delete.php?code=<?php echo $record["code"] ?>"><input type="button" value="削除"></a>
      <a href="edit.php?code=<?php echo $record["code"] ?>"><input type="button" value="編集"></a>

<?php  
}
  $dbh = null;


?>


</body>
</html>