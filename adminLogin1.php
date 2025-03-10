<?php include 'head.php'?>
<?php include 'links.php' ?>
<?php SESSION_start(); ?>
<?php 
$username =$_POST['username'];
$password =$_POST['password'];
if($username=='admin' && $password == 'admin'){
  $_SESSION["role"] = 'admin';
  $url = "admin_home.php";
  header("Location:".$url);
}else{
  $url = "msg.php?msg=Invalid Login Details&class=text-danger";
  header("Location:".$url);
}
?>
