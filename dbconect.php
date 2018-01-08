<?php


//開発環境用

$dsn = 'mysql:dbname=phpkiso;host=localhost';

  
 $user = 'root';
  $password='';

  
  $dbh = new PDO($dsn, $user, $password);

 $dbh->query('SET NAMES utf8');


//本番環境用
  //$dsn = 'mysql:dbname=LAA0918884-phpkiso;host=mysql103.phy.lolipop.lan';

  
 //$user = 'LAA0918884';
  //$password ='naokidaru';

  
  //$dbh = new PDO($dsn, $user, $password);

  //$dbh->query('SET NAMES utf8');


  ?>