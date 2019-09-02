<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<head>
<title>签到</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/sign2.css"/>

</head>
<body>
	<?php
  header("content-type:text/html;charset=utf-8");
    sleep(3);
    $oppenid = $_GET['uid'];
    $host = "127.0.0.1";                 //MySQL服务器地址
    $userName = "wwwjxncamcn";                 //用户名
    $password = "UwX6byDcJWQ6W0O";                 //密码
    $dbName = "wwwjxncamcn";              //数据库名称
    $conn = mysqli_connect($host, $userName, $password, $dbName) or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
    mysqli_query($conn,"set names utf8");
    $sql = "select * from jifen_qiandao where id = '$oppenid'";
  
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);
    $sign_time = $row['sign_time'];
  ?>
<div style="" id="calendar"></div>

<div id="sign_note" style="text-align:center;position: relative;padding: 15px;    font-size: 14px;">
	<span style="color:red;">*提示：签到请点击当前日,签到完成后点击蓝色部分退返回主页！</span>
</div>
</body>
</html>
<script type="text/javascript">
$(function(){
   var signList=[];
  var data = '<?php echo $sign_time;?>';
  var strs = new Array();
 var strq = new Array();
  strs = data.split(",");
  for(var i = 0 ; i< strs.length;i++){
       var b = strs[i];
       signList.push({"signDay":b});
       console.log(b);
  }
  //ajax获取日历json数据
  // var signList=[{"signDay":"09"},{"signDay":"11"},{"signDay":"12"},{"signDay":"13"}];
   calUtil.init(signList);
});
</script>
<script id="testScript" type="text/javascript" src="js/calendar2.js" data="<?php echo $oppenid?>"></script>
