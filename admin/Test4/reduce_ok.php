<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
include_once("conn/conn.php");//包含数据库连接文件
if($_POST['action'] == "reduce"){
	if(!($_POST['redece_item'] or $_POST['remark'])){
		echo "输入不允许为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
	}else{
		$sql = "insert into jifen_detail (userid,username,telephone,add_item,reduce_item,remark) values ('".$_POST['userid']."','".$_POST['username']."','".$_POST['telephone']."','".$_POST['add_item']."','".$_POST['reduce_item']."','".$_POST['remark']."')";
		$result1 = mysqli_query($conn,$sql);
		$num = $_POST['total_intergral']-$_POST['reduce_item'];
		$sqlstr = "update jifen_user set  total_intergral = '".$num."', exchange_intergral = '".$_POST['reduce_item']."' where userid = ".$_POST['userid'];//定义更新语句
		$result = mysqli_query($conn,$sqlstr);//执行更新语句*/
		if($result && $result1){
			echo "修改成功,点击<a href='index.php'>这里</a>查看";
		}else{
			echo "修改失败.<br>$sql";
		}
	}
}
?>