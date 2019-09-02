<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
 $host = "127.0.0.1";									//MySQL服务器地址
$userName = "wwwjxncamcn";									//用户名
$password = "UwX6byDcJWQ6W0O";									//密码
$dbName = "wwwjxncamcn";							//数据库名称
$conn = mysqli_connect($host, $userName, $password, $dbName) or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
mysqli_query($conn,"set names utf8");

$sql = "update jifen_user set total_intergral = 120 where userid = 14417327";
$result = mysqli_query($conn,$sql);
if ($result) {
	echo "成功";
}else{
	echo "失败";
}
$sql1 = "insert into jifen_admin (username,password) values ('admin2','123421')";
$result1 = mysqli_query($conn,$sql1);
if ($result1) {
	echo "管理员表成功";
}else{
	echo "管理员表失败";
}

?>