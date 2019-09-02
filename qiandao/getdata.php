<?php 
	 $host = "127.0.0.1";									//MySQL服务器地址
$userName = "root";									//用户名
$password = "123456";									//密码
$dbName = "tb_demo02";							//数据库名称
$conn = mysqli_connect($host, $userName, $password, $dbName) or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
mysqli_query($conn,"set names utf8");
$action=$_GET[action];
$sql = "select * from user where id = '1231'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($result);
$sign_time = $row['sign_time'];
echo $sign_time;

?>