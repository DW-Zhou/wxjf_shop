<?php
	include_once('conn/conn.php');
	if(isset($_POST['submit']) && $_POST['submit']!=""){
        $username = $_POST['username'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $oppenid = $_POST['oppenid'];
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
   $url="";
    $sql = "update jifen_user set username = '$username',address='$address',telephone='$telephone',lmp='$lmp',gestation_state='$gestation_state',baby1='$baby1',baby2='$baby2' where oppenid = '$oppenid'";
    $result = mysqli_query($conn,$sql);
    if($result){
    	echo "<script>alert('您的个人信息修改成功！');location.href='$url'</script>";
    }else{
    	echo "<script>alert('抱歉，您的个人信息修改失败！');location.href='$url'</script>";
    }


?>