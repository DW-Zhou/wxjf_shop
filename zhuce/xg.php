<!DOCTYPE HTML>
<html>
<head>
<title>个人信息</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta content="telephone=no" name="format-detection" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta content="" name="keywords">
    <meta content="" name="description">
	 
    <link rel="stylesheet" href="css/register-wap.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>    
    <script src="Mdate/iScroll.js"></script>
    <script src="Mdate/Mdate.js"></script>
    <style type="text/css">
        #btnSendCode1{
    width: 6rem;
    height: 30px;
    padding: 0 5px;
    margin: 0;
    font-size: 14px;
    text-align: center;
    background: transparent;
    border-radius: 30px;
    color: #a07941;
    border-color: #a07941;
        }
    </style>
    <script type="text/javascript">
        var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;//手机号正则 
        function check(form) {
        if (form.username.value == '') {
            alert("请输入用户姓名!");
            form.username.focus();
            return false;
        }
         else if (!phoneReg.test(form.telephone.value)) {
            alert("请输入用户有效手机号码!");
            form.telephone.focus();
            return false;
        }
         else if (form.address.value == '') {
            alert("请输入地址!");
            form.address.focus();
            return false;
        }
    }
    </script>
</head>
<body>

<nav>
        <a href="javascript:history.back(-1)" class='goback'> 
            <b></b>
        </a>
        完善信息</nav>


<form action="zc_ok.php" autocomplete="off" method="post">
        <!-- ÊÖ»ú×¢²á¿ªÊ¼ -->
		<div id="error_display" style="text-align:center;color:red;display:none;">
                <!--´íÎóÐÅÏ¢ÏÔÊ¾ÇøÓò-->
        </div>
        <section class="phone-register">
             <div class="register-item">
                <div class="inputs ">
                    <label for="username">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</label>
                    <input type="text" class="form-control" name="username" id="username" />
                </div>
                <div class="tip">请输入姓名</div>
            </div>
            
            <div class="register-item">
                <div class="inputs ">
                    <label for="phone">联系方式：</label>
                    <input type="phone" class="form-control" id="telephone" name="telephone"/>
                </div>
                <div class="tip">请输入电话</div>
            </div>

            <!-- µØÖ· -->
             <div class="register-item">
                <div class="inputs ">
                    <label for="username">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：</label>
                    <input type="text" class="form-control" name="address" id="address"/>
                </div>
                <div class="tip">请输入地址</div>
            </div>
			<!-- oppenid -->
             <div class="register-item" style="display: none">
                <div class="inputs ">
                    <label for="username">微信ID：</label>
                    <input type="text" class="form-control" name="oppenid" value="<?php echo $oppenid;?>" />
                </div>
                <div class="tip">请输入微信ID</div>
            </div>

            <div class="register-item">
                <div class="inputs " style="padding-left:2rem ">
                    <input type="radio" name="gestation_state" value="0" onclick="document.getElementById('lmp').style.display='';document.getElementById('lmp_box').style.display='';document.getElementById('baby1').style.display='none';document.getElementById('baby1_box').style.display='none';document.getElementById('baby2').style.display='none';document.getElementById('baby2_box').style.display='none'; ">孕妈
                    <input type="radio" name="gestation_state" value="1" onclick="document.getElementById('baby1').style.display='';document.getElementById('baby1_box').style.display='';document.getElementById('lmp').style.display='none';document.getElementById('lmp_box').style.display='none'  " style="margin-left:4rem">宝妈
                </div>
                <div class="tip">是否怀孕</div>
            </div>

            <div class="register-item " style="display: none" id="lmp_box">
                <div class="inputs ">
                    <label for="password" style="width: 120px">末次月经时间：</label>
                    <input type="text" class="form-control mh_date" name="lmp" id="lmp"/>
                </div>
            </div>
            <!-- 宝宝1 -->
            <div class="register-item " style="display:none " id="baby1_box">
                <div class="inputs">
                    <label for="password" style="width: 120px;margin-top: 0.4rem">大宝生日：</label>
                    <input type="text" class="form-control mh_date" name="baby1" id="baby1" style="width: 9rem"/>
                    <a href="#" onclick="document.getElementById('baby2').style.display='';document.getElementById('baby2_box').style.display='';"><img src="add.png" style="width: 2rem"></a>
                </div>
                <div class="tip">请输入大宝生日</div>
            </div>

            <div class="register-item " style="display: none" id="baby2_box">
                <div class="inputs ">
                    <label for="password" style="width: 120px">二宝生日：</label>
                    <input type="text" class="form-control mh_date" name="baby2" id="baby2"  style="width: 9rem"/>
                    <a href="javascript:void(0)"><img src="add.png" style="width: 2rem"></a>
                </div>
                <div class="tip">请输入二宝生日</div>
            </div>
        </section>
        <!-- ×¢²á°´¼ü -->
        <section class="register-btn">
			<input type="submit" id="submit" name="submit" value="提交" onclick="return check(this.form)">
        </section>
</form>

</body>
<script type="text/javascript">
   new Mdate("lmp"); 
   new Mdate("baby1");
   new Mdate("baby2");
</script>
</html>