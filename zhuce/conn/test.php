<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$host = "127.0.0.1";									//MySQL服务器地址
$userName = "wwwjxncamcn";									//用户名
$password = "UwX6byDcJWQ6W0O";									//密码
$dbName = "wwwjxncamcn";							//数据库名称
$conn = mysqli_connect($host, $userName, $password, $dbName) or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
mysqli_query($conn,"set names utf8");
$sql = "INSERT INTO jifen_user ( username, wet_name, address, telephone, oppenid, total_intergral, exchange_intergral, gestation, gestation_state )
VALUES
	( 'dzy', 'hah', '四川成都', '17778470761', '123212', 1000, 10000, 12, 1 );";
$result = mysqli_query($conn,$sql);
if($result){
	echo "插入了";
}else{
	echo "添加失败";
}
?>