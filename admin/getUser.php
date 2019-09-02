<?php 
  $host = "127.0.0.1";									//MySQL服务器地址
$userName = "wwwjxncamcn";									//用户名
$password = "UwX6byDcJWQ6W0O";									//密码
$dbName = "wwwjxncamcn";							//数据库名称

$json = '';
$data = array();

class User{
	public $id;
	public $username;
	public $wet_name;
	public $address;
	public $telephone;
	public $oppenid;
	public $total_intergral;
	public $exchange_intergral;
	public $gestation;
	public $gestation_state;
	public $CURRENT_TIME;
}

$conn = mysqli_connect($host, $userName, $password, $dbName) or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
mysqli_query($conn,"set names utf8");

$sql = "select * from jifen_user";
$result = mysqli_query($conn,$sql);

if($result){
//echo "查询成功";
while ($row = mysqli_fetch_array($result,MYSQL_ASSOC))
{
$user = new User();
$user->id = $row["id"];
$user->username = $row["username"];
$user->wet_name = $row["wet_name"];
$user->address = $row["address"];
$user->telephone = $row["telephone"];
$user->oppenid = $row["oppenid"];
$user->total_intergral = $row["total_intergral"];
$user->exchange_intergral = $row["exchange_intergral"];
$user->gestation = $row["gestation"];
$user->gestation_state = $row["gestation_state"];
$user->CURRENT_TIME = $row["CURRENT_TIME"];
$data[]=$user;
}
$json = json_encode($data,JSON_UNESCAPED_UNICODE);//把数据转换为JSON数据.
file_put_contents('./json/userall.json', $json);
echo "{".'"user"'.":".$json."}";
}else{
echo "查询失败";
}













?>