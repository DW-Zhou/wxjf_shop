<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="css/index.css" />
</head>

<body>

<img class="bgone" src="img/1.jpg" />
<img class="pic" src="img/a.png" />

<div class="table">
	<div class="wel">百佳艾玛积分系统后台登录</div>
	<div class="wel1">BAI JIA AI MA HUO TAI DENG LU</div>
	<form name="form1" action="loginProcess.php" method="post">
		<div class="user">
			<div id="yonghu" style=""><img src="img/yhm.png" /></div>
			<input type="text" name="username" placeholder="用户名" />
		</div>			
		<div class="password">
			<div id="yonghu"><img src="img/mm.png" /></div>
			<input type="password" name="pwd" placeholder="请输入密码"/>
		</div>
		<input class="btn" type="submit" name="submit" onclick="return check(form)" value="登录" />
	</form>
</div>
<script type="text/javascript">
	function check(form){
		if(form.username.value == ""){
			alert("请输入用户名：");
			form.username.focus();
			return false;
		}
		if(form.pwd.value == ""){
			alert("请输入密码：");
			form.pwd.focus();
			return false;
		}
	}
</script>>
</body>
</html>