<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		 <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
		<title>会员中心</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
	</head>
	<body>
		<?php
		    header("content-type:text/html;charset=utf-8");
		   	include "qrcode/qrcode.php";
		    $code = $_GET["code"];//预定义的 $_GET 变量用于收集来自 method="get" 的表单中的值。
		    if (isset($_GET['code'])){//判断code是否存在
		        $userinfo = getUserInfo($code);
		        $nickname = $userinfo['nickname'];//获取nickname对应的值,即用户名
		       /* print '<h2 style="text-align:center">用户名：'.$username.'</h2>';//打印输出*/
		       $user_logo = $userinfo['headimgurl'];

		       $openid = $userinfo['openid'];
		      /* print '<h2 style="text-align:center">用户logo：'.$user_logo.'</h2>';*/
		    }else{
		        echo "NO CODE";
		    }
		    
		    function getUserInfo($code)
		    {
		        $appid = "wx428361e1f92f3bbe";
		        $appsecret = "8f6ab31fa47777e160589fd5d9a69e5b";
		
		        //Get access_token
		        $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
		        $access_token_json = https_request($access_token_url);//自定义函数
		        $access_token_array = json_decode($access_token_json,true);//对 JSON 格式的字符串进行解码，转换为 PHP 变量，自带函数
		        //获取access_token
		        $access_token = $access_token_array['access_token'];//获取access_token对应的值
		        //获取openid
		        $openid = $access_token_array['openid'];//获取openid对应的值
		        	
		        //Get user info
		        $userinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid";
		        $userinfo_json = https_request($userinfo_url);
		        $userinfo_array = json_decode($userinfo_json,ture);
		        return $userinfo_array;
		    }
		
		    function https_request($url)//自定义函数,访问url返回结果
		    {
		        $curl = curl_init();
		        curl_setopt($curl, CURLOPT_URL, $url);
		        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		        curl_setopt($curl,  CURLOPT_SSL_VERIFYHOST, FALSE);
		        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		        $data = curl_exec($curl);
		        if (curl_errno($curl)){
		            return 'ERROR'.curl_error($curl);
		        }
		        curl_close($curl);
		        return $data;
		    }
		?> 
		<!-- 头部部分 -->
		<div class="header">
			<div class="content">
				<!-- 头部 -->
				<div class="header_content">
					<div class="item item_1">
						<div class="item_logo">
							<div class="item1_logo">
								<img src="<?php echo $user_logo;?>" alt="">
							</div>
						</div>
					</div>
					<div class="item item_2">
						<div class="item2_name">
							<span><?php echo $username;?></span>
						</div>
					</div>
					<div class="item item_3">
						<div class="qr_code">
							<div class="qr_code_img" id="show_code">
								<a href="javascript:openLogin();"><img src="img/two_code.png" alt="" class="two_code"></a>
							</div>
						</div>
					</div>
					<!-- 模态框 -->
					<div id=win style="display:none ;    POSITION: absolute;
    left: 6%;
    top: 6%;
    width: 6.4rem;
    height: 7rem;
    /* margin-left: -300px; */
    /* margin-top: -200px; */
    border: 1px solid #888;
    background-color: white;
    text-align: center;
	z-index: 33;">
	<?php 
		$host = "127.0.0.1";									//MySQL服务器地址
$userName = "wwwjxncamcn";									//用户名
$password = "UwX6byDcJWQ6W0O";									//密码
$dbName = "wwwjxncamcn";							//数据库名称
$conn = mysqli_connect($host, $userName, $password, $dbName) or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
mysqli_query($conn,"set names utf8");
	$sql = "select * from jifen_user where oppenid = '$openid'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	if($num == 0){
		$userid = substr(rand(100000, 999999), 0, 6);
		 $sql2 = "insert into jifen_user(userid,nickname,user_logo,username,address,telephone,oppenid,total_intergral,exchange_intergral,lmp,gestation_state,baby1,baby2) values ('".$userid."','".$nickname."','".$user_logo."',null,null,null,'".$openid."',0,0,null,0,null,null)";
		 $result2 = mysqli_query($conn,$sql2);
	}
	?>
						
						<a href="javascript:closeLogin();" style="    margin-left: 5rem;
    text-decoration: none;
    color: black;
    font-size: 10px;
    margin-top: 0.2rem;
    display: block;">关闭</a>
    		<!-- 	二为吗 -->
    			<?php echo scerweima($userid)?>
    			<?php 
    				header("content-type:text/html;charset=utf-8");
    $conn = mysqli_connect("localhost", "wwwjxncamcn", "UwX6byDcJWQ6W0O", "wwwjxncamcn") or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
    mysqli_query($conn,"set names utf8"); 
    				$sql = "select * from jifen_user where oppenid = '$openid'";
    				$result = mysqli_query($conn,$sql);
    				while($myrow=mysqli_fetch_assoc($result)){
    					$user_id = $myrow['userid'];
    				}
    			?>
    			<div style="width: 6.3rem"><img src="barcodegen/buidcode.php?codebar=BCGcode39&text=<?php echo $user_id;?>" alt=""></div>
					</div>
				</div>
			</div>
		</div>
		<div class="box"></div>
		<!-- 积分部分 -->
		<div class="jifen_content">
			<div class="jifen_top">
				<div class="jifen_logo">
					<img src="img/hosipita_logo.png" class="logo1">
				</div>
				<div class="jifen_logo">
					<span>积分卡</span>
				</div>
			</div>
			<!-- 积分显示部分 -->
	 	<?php
			 	header("content-type:text/html;charset=utf-8");
    			include_once("conn/conn.php");
    			$sql = "select * from jifen_user where oppenid = '$openid'";
    			$result = mysqli_query($conn,$sql);
    			$num = mysqli_num_rows($result);
    		if(mysqli_num_rows($result) >= 1){
         	while($myrow=mysqli_fetch_array($result)){
    		?> 
     		<div class="jifen_shuzi">
				<div class="shuzi shuzi1"><?php echo $myrow[8]; ?></div>
				<div class="shuzi shuzi2"><?php echo $myrow[9]; ?></div>
				<div class="shuzi shuzi3"><?php echo $myrow[8]-$myrow[9]; ?></div>
			</div>
     <?php
       		 }
    	}else{ 
        	?> 
    		<div class="jifen_shuzi">
				<div class="shuzi shuzi1">0</div>
				<div class="shuzi shuzi2">0</div>
				<div class="shuzi shuzi3">0</div>
			</div>
		 <?php
    		}
		?> 
			<div class="divide2"></div>
			<div class="jifen_mean">
				<div class="mean mean1">总积分</div>
				<div class="mean mean2">已兑换积分</div>
				<div class="mean mean3">剩余积分</div>
			</div>	
		</div>
		<div class="content" style="margin-top: 0.16rem;">
			<div class="four_box">
				<div class="fourbox_item fourbox_item1" style="margin-right: 0.05rem; box-sizing: border-box;">
					<div class="box1_top">
						<a href="qiandao/index.php?uid=<?php echo $openid;?>"><img src="img/qiandao123.png" alt=""></a>
					</div>
					<div class="box1_bottom">
						<span>每日签到</span>
					</div>	
					<div class="box_bottom_1"><span>签到加积分领好礼</span></div>
				</div>
					<div class="fourbox_item fourbox_item1" style="margin-left: 0.05rem;box-sizing: border-box;">
						<div class="box1_top">
							<?php
								include_once('conn/conn.php');
								mysqli_query($conn,"set names utf8");
								$sql = "select * from user where openid = '829131'";
								$result = mysqli_query($conn,$sql);
								$username = null;
								while($myrow = mysqli_fetch_assoc($result)){
									$username = $myrow['username'];
								}
								if($username == null){
									echo "<a href='zhuce/zc.php?openid=<?php echo $openid;?>'><img src='img/logo4.png' alt=''></a>";
								}else{
									echo "<a href='zhuce/xg.php?openid=<?php echo $openid;?>'><img src='img/logo4.png' alt=''></a>";
								}
							?>
							<!-- <a href="zhuce/zc.php?openid=<?php  $openid;?>"><img src="img/logo4.png" alt=""></a> -->
						</div>
						<div class="box1_bottom">
							<span>个人信息</span>
						</div>	
						<div class="box_bottom_1"><span>完善个人信息可获取积分</span></div>
					</div>
			</div>
		</div>
		<!-- 展示列表部分 -->
		<div class="s-side">
			<ul>
				 <li class="first">
	                <div class="d-firstNav s-firstNav">
	                	<i class="fa fa-bars"></i>	                    
	                    <img src="img/course.png" alt=""><span style="font-size: 0.37rem;">活动/课程</span>
						<i class="fa fa-caret-right fr" ></i>
	                </div>
	                <ul class="d-firstDrop s-firstDrop">
	                    <li class="s-secondItem">
	                        <i class="fa fa-minus-square-o"></i>
	                        <a href="huodong.html" style="font-size: 0.3rem;text-decoration: none;color:white;">活动</a>
	                    </li>
	                    <li class="s-secondItem" style="background-color: #fb916c;">
	                        <i class="fa fa-minus-square-o"></i>
	                        <a href="kecheng.html" style="font-size: 0.3rem;text-decoration: none;color:white;">课程</a>
	                    </li>
	                </ul>
	            </li>
				<hr>	
				<li class="first">
				    <div class="d-firstNav s-firstNav">
				    	<i class="fa fa-bars"></i>	                    
				        <a href="exchange.html"><img src="img/rule.png" alt=""><span style="font-size: 0.37rem;">积分兑换</span></a>
						<i class="fa fa-caret-right fr" ></i>
				    </div>
				 <!--  <ul class="d-firstDrop s-firstDrop">
				        <li class="s-secondItem">
				            <i class="fa fa-minus-square-o"></i>
				            <a href="#" style="font-size: 0.3rem;text-decoration: none;color:gray;">活动规则</a>
				        </li>
				        <li class="s-secondItem">
				            <i class="fa fa-minus-square-o"></i>
				            <a href="#" style="font-size: 0.3rem;text-decoration: none;color:gray;">任务</a>
				        </li>
				    </ul> -->
				</li>
				<hr>
				<li class="first">
				    <div class="d-firstNav s-firstNav">
				    	<i class="fa fa-bars"></i>	                    
				       <a href="task.html"><img src="img/exchange.png" alt=""><span style="font-size: 0.37rem;">积分规则</span></a>
						<i class="fa fa-caret-right fr" ></i>
				    </div>
				 <!--   <ul class="d-firstDrop s-firstDrop">
				        <li class="s-secondItem">
				            <i class="fa fa-minus-square-o"></i>
				            <a href="#" style="font-size: 0.3rem;text-decoration: none;color:gray;">积分兑换</a>
				        </li>
				       
				    </ul> -->
				</li>
				<hr>
			</ul>
		</div>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/index.js" ></script>
		<script type="text/javascript">
			function openLogin(){
			document.getElementById("win").style.display="";
			}
			function closeLogin(){
			document.getElementById("win").style.display="none";
			}
		</script>
	</body>
</html>
