<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <title></title>
</head>
<body>
<h1>入力内容確認</h1>
<!-- ようこそ、<?php //echo $_POST["nickname"]; ?>様
<br>
<br>
メールアドレス：<? //echo $_POST["email"]; ?>
<br>
<br>
お問い合わせ内容：<? //echo $_POST["content"]; ?>
<br>

<input type="button" value="戻る" onclick="history.back();"> 

<form method="POST" action="thanks.php">
<input type="hidden" name="nickname" value="<?php //echo $_POST["nickname"]; ?>">
<input type="hidden" name="email" value="<?php //echo $_POST["email"]; ?>">
<input type="hidden" name="content" value="<?php //echo $_POST["content"]; ?>">
<input type="submit" value="OK">
</form> -->

<div id="center">
<div class="list-group">

<?php if ($_POST["name"] =="") {
  echo 'ニックネームを表示してください';
  }else{?> 
  <a href="#" class="list-group-item disabled">ようこそ、 <?php echo htmlspecialchars($_POST["name"]); ?>様</a> 
 <?php  } ?><br>

 <?php if ($_POST["vorname"] =="") {
  echo 'メールアドレスを表示してください'; 
  }else{ ?> 
  <a href="#" class="list-group-item">メールアドレス：<?php echo htmlspecialchars($_POST["vorname"]); ?></a><?php } ?><br>

  <?php if ($_POST["anschrift"] =="") {
  echo '内容を表示してください';
  }else{?>
  <a href="#" class="list-group-item">お問い合わせ内容：<?php echo htmlspecialchars($_POST["anschrift"]); ?></a><?php } ?>
</div>
</div>



<form method="POST" action="thanks.php">
<input type="hidden" name="name" value="<?php echo $_POST["name"]; ?>">
<input type="hidden" name="vorname" value="<?php echo $_POST["vorname"]; ?>">
<input type="hidden" name="anschrift" value="<?php echo $_POST["anschrift"]; ?>">



<div class="form-group">
  <label class="col-md-4 control-label" for="anmelden"></label>
  <div class="col-md-8">
    <?php if (($_POST['name'] != "") && ($_POST['vorname'] != "") && ($_POST['anschrift'] != "")){?>
    <div id="button">
     <button id="anmelden" name="anmelden" class="btn btn-success">OK</button> 
     <?php  }?>
     <button  a href="#" type="button" onclick="history.back();" id="reset" name="reset" class="btn btn-danger">戻る </button>
     
    </div>
</form> 




</body>
</html>