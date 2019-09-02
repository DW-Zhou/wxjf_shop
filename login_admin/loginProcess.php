<?php
//这里主要讲session，关于登录信息验证，就不涉及到数据库了
//接收登录信息，保存session
if(!empty($_POST['submit'])){
 if($_POST['username']=="admin" && $_POST['pwd']=="123456"){
  echo "登录成功";
  session_start();//开启session
  $_SESSION['username'] = $_POST['username'];//将登录名保存到session中
  header("Location: ../admin/index.php");
  exit();
 }else{
  header("Location: login.php?errno=1");
  exit();
 }
}else{
 header("Location: login.php?errno=2");
 exit();
}
?>