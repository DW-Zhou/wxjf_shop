<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
include_once("conn/conn.php");//包含数据库连接文件
if($_POST['action'] == "update"){
	if(!($_POST['total_intergral'] or $_POST['exchange_intergral'])){
		echo "输入不允许为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
	}else{
		$sqlstr = "update jifen_user set username = '".$_POST['username']."', telephone = '".$_POST['telephone']."', address = '".$_POST['address']."',total_intergral = '".$_POST['total_intergral']."', exchange_intergral = '".$_POST['exchange_intergral']."', lmp = '".$_POST['lmp']."', baby1 = '".$_POST['baby1']."',  baby2 = '".$_POST['baby2']."' where userid = ".$_POST['userid'];//定义更新语句
		$result = mysqli_query($conn,$sqlstr);//执行更新语句
		if($result){
			echo "修改成功,点击<a href='index.php'>这里</a>查看";
		}else{
			echo "修改失败.<br>$sqlstr";
		}
	}
}
?>