<?php
header("Access-Control-Allow-Origin: *");
		$host = "127.0.0.1";									//MySQL服务器地址
		$userName = "wwwjxncamcn";									//用户名
		$password = "UwX6byDcJWQ6W0O";									//密码
		$dbName = "wwwjxncamcn";							//数据库名称
		$conn = mysqli_connect($host, $userName, $password, $dbName) or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
		mysqli_query($conn,"set names utf8");
		/*$singday = 1;
		$a = 2;
		$c = 30;
		$strs = $a.',';
		$cc = $c.',';
		$str = $singday.',';
		$strm = $strs.$str.$cc;
		echo $strm;
		echo "<br>";
		echo gettype($str);
		echo "<br>";
		$hello = explode(',', $strm);
		for($i = 0 ; $i < count($hello);$i++){
			echo $hello[$i];
			echo "<br>";
		}

		die();*/
		//$singday = $_GET['singday'];
		//$id = $_GET['id'];
		//先判断数据库有没有该数据，没有就保存进去，
		$openid = $_GET['id'];
		$current_day = $_GET['signday'];
		$current_day_str = $current_day.',';
		//先判断数据库有没有这个用户的数据
		$sql = "select * from jifen_qiandao where id = '$openid'";
		$result = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($result);		
		$sql2="select * from jifen_user where oppenid = '$openid'";
		$result2 = mysqli_query($conn,$sql2);
		while($myrow = mysqli_fetch_assoc($result2)){
			$total_intergral = $myrow['total_intergral'];
		}
		$num1 = mysqli_num_rows($result2);
		if($num1 != 0){
				if($num != 0){
				$myrow = mysqli_fetch_assoc($result);
				$count = $myrow['count'];
				$total_intergral+=2;
				mysqli_query($conn,"update jifen_user set total_intergral = $total_intergral where oppenid='$openid'");
				$last_time = $myrow['sign_time'];
				$str = $last_time.$current_day_str;
				$sql_update="update jifen_qiandao set sign_time = '$str' where id ='$openid'";

				$result_update = mysqli_query($conn,$sql_update);

				if($result_update){
					echo "<script>恭喜您,签到成功,请继续坚持!</script>";
				}else{
					echo "<script>不好意思,签到失败！</script>";
				}
			}else{
				$count = 1;
				$total_intergral+=2;
				mysqli_query($conn,"update jifen_user set total_intergral = '$total_intergral' where oppenid='$openid'");
				$sql1 = "insert into jifen_qiandao (id,count,sign_time) values ('".$openid."','".$count."','".$current_day_str."')";
				$result1 = mysqli_query($conn,$sql1);
				if($result1){
					echo "<script>恭喜您,签到成功,请继续坚持!</script>";
				}

			}	

		}else{
			echo "<script>alert('请先完善个人信息,谢谢!');history.go(-1);</script>"
		}
		
		
?>	