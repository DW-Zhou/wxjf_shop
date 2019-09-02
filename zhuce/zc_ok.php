<?php 
	header("content-type:text/html;charset=utf-8");
$conn = mysqli_connect("localhost", "wwwjxncamcn", "UwX6byDcJWQ6W0O", "wwwjxncamcn") or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
    mysqli_query($conn,"set names utf8");                       //设置数据库编码格式utf8
  if(isset($_POST['submit']) && $_POST['submit']!=""){
        $username = $_POST['username'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $oppenid = $_POST['oppenid'];
        $total_intergral = $_POST['total_intergral'];
        $exchange_intergral = $_POST['exchange_intergral'];
        $lmp = $_POST['lmp'];
        $gestation_state = $_POST['gestation_state'];
        $baby1 = $_POST['baby1'];
        $baby2 = $_POST['baby2'];

        if(empty($lmp)){
            $lmp = "null";
        }
        if(empty($baby1)){
            $baby1 = "null";
        }
        if(empty($baby2)){
            $baby2 = "null";
        }
    }
    $sql = "update jifen_user set username='$username',address='$address',telephone='$telephone',total_intergral=$total_intergral "
   /* $sql1 = "select * from jifen_user where oppenid = '$oppenid'";
    $result1 = mysqli_query($conn,$sql1);
    $num = mysqli_num_rows($result1);
    if($num == 1){
        $sql2 = "update jifen_user set username='$username',address='$address',telephone='$telephone',lmp='$lmp',baby1='$baby1',baby2='$baby2' where oppenid = '$oppenid'";
        $result2 = mysqli_query($conn,$sql2);
        if($result2){
            echo "<script>alert('您的个人信息修改成功，谢谢！');history.go(-1)</script>";
        }
    }else{
         $sql = "insert into jifen_user(userid,username,address,telephone,oppenid,total_intergral,exchange_intergral,lmp,gestation_state,baby1,baby2) values ('".$user_id."','".$username."','".$address."','".$telephone."','".$oppenid."','".$total_intergral."','".$exchange_intergral."','".$lmp."','".$gestation_state."','".$baby1."','".$baby2."')";
            $sql = "update jifen_user set username='$username',address='$address',telephone='$telephone',total_intergral='$total_intergral',exchange_intergral='$exchange_intergral',lmp='$lmp',baby1='$baby1',baby2='$baby2' where oppenid = '$oppenid'";
            $result = mysqli_query($conn,$sql);

        if($result){
             echo "<script>alert('注册成功，谢谢！');history.go(-1)</script>";
        }else{
            echo "<script>alert('请重新完善您的个人信息，谢谢！');history.go(-1)</script>";
         }
    }*/
 
?>

