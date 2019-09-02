<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>更新数据</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<style type="text/css">
  table{
    width="765" height="200"  border="0" cellpadding="0" cellspacing="0"
    width: 30%;
    height: 400px;
    border: 0;
    cellpadding:0;
    cellspacing:0;
  }
   .top{
  width: 400px;
    height: 40px;
    line-height: 40px;
    background-color: rgb(92,183,92);
    color: white;
    text-align: center;
  }
</style>
</head>
<body>
<center>
<?php
    include_once("conn/conn.php");//包含数据库连接文件
    if($_GET['action'] == "add"){//判断地址栏参数action的值是否等于update
  $sqlstr = "select * from jifen_user where userid = ".$_GET['id'];//定义查询语句
  $result = mysqli_query($conn,$sqlstr);//执行查询语句
  $rows = mysqli_fetch_row($result);//将查询结果返回为数组
?>
  <div class="top">增加积分</div>
    <form name="intFrom" method="post" action="add_ok.php" style="width: 398px;border: 1px solid #cccc">

    <table>
          <tr align="center" valign="middle">
      <td width="0%" class="c_td">&nbsp;</td>
            <td width="30%" align="right" class="c_td">&nbsp;</td>
            <td width="10%" class="c_td">&nbsp;</td>
      <td width="20%" class="c_td">&nbsp;</td>
          </tr>
          <tr>
      <td class="c_td">&nbsp;</td>
            <td align="right" valign="middle" class="c_td">姓名：</td>
            <td align="center" valign="middle" class="c_td"><input type="text" name="username" value="<?php echo $rows[2] ?>" readonly="true"></td>
      <td class="c_td">&nbsp;</td>
          </tr>
          <tr>
      <td class="c_td">&nbsp;</td>
            <td align="right" valign="middle" class="c_td">电话：</td>
            <td align="center" valign="middle" class="c_td"><input type="text" name="telephone" value="<?php echo $rows[4] ?>" readonly="true"></td>
            <td class="c_td">&nbsp;</td>
      </tr>
          <tr>
      <td class="c_td">&nbsp;</td>
            <td align="right" valign="middle" class="c_td">总积分：</td>
            <td align="center" valign="middle" class="c_td"><input type="text" name="total_intergral" value="<?php echo $rows[6] ?>" readonly="true"></td>
            <td class="c_td">&nbsp;</td>
      </tr>
         <tr>
      <td class="c_td">&nbsp;</td>
            <td align="right" valign="middle" class="c_td">增加积分：</td>
            <td align="center" valign="middle" class="c_td"><input type="text" name="add_item" oninput="value=value.replace(/[^\d]/g,'')"></td>
            <td class="c_td">&nbsp;</td>
      </tr>
         <tr>
      <td class="c_td">&nbsp;</td>
            <td align="right" valign="middle" class="c_td">增加说明：</td>
            <td align="center" valign="middle" class="c_td"><input type="text" name="remark"></td>
            <td class="c_td">&nbsp;</td>
      </tr>
       <tr style="display: none">
      <td class="c_td">&nbsp;</td>
            <td align="right" valign="middle" class="c_td">减少积分：</td>
            <td align="center" valign="middle" class="c_td"><input type="text" name="reduce_item" value="0"></td>
            <td class="c_td">&nbsp;</td>
      </tr>
      <tr align="center" valign="middle">
      <td class="c_td">&nbsp;</td>
            <td colspan="2" class="c_td">
      <input type="hidden" name="action" value="add">
      <input type="hidden" name="userid" value="<?php echo $rows[1] ?>">
      <input type="submit" name="Submit" value="保存" style="margin-left: 0%;height: 35px;width: 90px; border-radius: 8px; background-color: rgb(92,184,92);"></td>
           <td class="c_td">&nbsp;</td>
        </tr>
        </table>
      </form>
<?php
  }
?>
</center>
</body>
</html>

