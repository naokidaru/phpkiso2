<?php 
//ステップ１
//DB接続
require('dbconect.php');

//step2
//SQL文実行
$sql = 'SELECT * FROM `survey` WHERE `code` = '.$_GET['code'];

  //SQL文文を実行する準備
  $stmt = $dbh->prepare($sql);

  //SQL文を実行
  $stmt->execute();
//ヒント　ここにフェッチしたデータを保存しておく代入文を記述！！
$record = $stmt ->fetch(PDO::FETCH_ASSOC);  

//step3
//接続の解除

$dbh = null;





 ?>






<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <title>お問い合わせ</title>
  </head>
  <body>
 <!-- <h1>お問い合わせ情報入力</h1>
  <form method="POST" action="check.php">
    <div>
        ニックネーム<br>
        <input type="text" name="nickname" style="width:100px">
    </div>
    <div>
        メールアドレス<br>
        <input type="text" name="email" style="width: 200px">
    </div>
    <div>
        お問い合わせ内容<br>
        <textarea name="content" cols="40" rows="5"></textarea>
    </div>
    <input type="submit" value="送信">
  </form>
 -->
<form class="form-horizontal" method="POST" action="update.php">
<fieldset>

<!-- Form Name -->
<legend>お問い合わせ情報編集</legend>

<div class="form-group">
<label class="col-md-4 control-label" for="name">コード</label>  
  <div class="col-md-4">
<input id="name" name="code" type="text" required="" class="form-control input-md" value="<?php echo $record["code"] ?>">

  <!-- コード<br> -->
  <!-- <?php //echo $_GET['code']; ?> -->
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">ニックネーム</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" required="" class="form-control input-md" value="<?php echo $record["nickname"] ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vorname">メールアドレス</label>  
  <div class="col-md-4">
  <input id="vorname" name="vorname" type="text" required="" class="form-control input-md" value="<?php echo $record["email"] ?>" >
    
  </div>
</div>


<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="anschrift">お問い合わせ内容</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="anschrift" required="" name="anschrift" rows="5"><?php echo $record["content"] ?></textarea>
  </div>

</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="anmelden"></label>
  <div class="col-md-8">
     <button id="anmelden" name="anmelden" class="btn btn-success">送信</button> 
     <button  value="初期値に戻す"  type="reset" id="reset" name="reset" class="btn btn-danger">リセット</button>
  </div>
</div>

</fieldset>
</form>


</body>
</html>
