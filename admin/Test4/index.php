<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/main.css">
		<style>
			   p{margin:0}
            #page{
                height:40px;
                padding:20px 0px;
            }
            #page a{
                display:block;
                float:left;
                margin-right:10px;
                padding:2px 12px;
                height:24px;
                border:1px #cccccc solid;
                background:#fff;
                text-decoration:none;
                color:#808080;
                font-size:12px;
                line-height:24px;
            }
            #page a:hover{
                color:#077ee3;
                border:1px #077ee3 solid;
            }
            #page a.cur{
                border:none;
                background:#077ee3;
                color:#fff;
            }
            #page p{
                float:left;
                padding:2px 12px;
                font-size:12px;
                height:24px;
                line-height:24px;
                color:#bbb;
                border:1px #ccc solid;
                background:#fcfcfc;
                margin-right:8px;
 
            }
            #page p.pageRemark{
                border-style:none;
                background:none;
                margin-right:0px;
                padding:4px 0px;
                color:#666;
            }
            #page p.pageRemark b{
                color:red;
            }
            #page p.pageEllipsis{
                border-style:none;
                background:none;
                padding:4px 0px;
                color:#808080;
            }
            .dates li {font-size: 14px;margin:20px 0}
            .dates li span{float:right}
		</style>
        <script type="text/javascript">
            window.onload = function(){
                var oTab = document.getElementById("tab");
                var oBt=document.getElementsByTagName("input");
                var i = oTab.tBodies[0].rows.length;
                oBt[1].onclick=function(){
     for(var i=1;i<oTab.tBodies[0].rows.length;i++)
     {
     var str4=oTab.tBodies[0].rows[i].cells[0].innerHTML.toUpperCase();
      var str3=oTab.tBodies[0].rows[i].cells[1].innerHTML.toUpperCase();
      var str1=oTab.tBodies[0].rows[i].cells[3].innerHTML.toUpperCase();
      var str2=oBt[0].value.toUpperCase();
      //使用string.toUpperCase()(将字符串中的字符全部转换成大写)或string.toLowerCase()(将字符串中的字符全部转换成小写)
      //所谓忽略大小写的搜索就是将用户输入的字符串全部转换大写或小写，然后把信息表中的字符串的全部转换成大写或小写，最后再去比较两者转换后的字符就行了
      /*******************************JS实现表格忽略大小写搜索*********************************/
      if(str1==str2 || str3==str2 || str4==str2){
       oTab.tBodies[0].rows[i].style.display='';
      }
      else{
        oTab.tBodies[0].rows[i].style.displayi='none';
      }
     /***********************************JS实现表格的模糊搜索*************************************/
     //表格的模糊搜索的就是通过JS中的一个search()方法，使用格式，string1.search(string2);如果
     //用户输入的字符串是其一个子串，就会返回该子串在主串的位置，不匹配则会返回-1，故操作如下
     if(str1.search(str2)!=-1 || str3.search(str2)!=-1 || str4.search(str2)!=-1){oTab.tBodies[0].rows[i].style.display='';}
     else{oTab.tBodies[0].rows[i].style.display='none';}
     /***********************************JS实现表格的多关键字搜索********************************/
     //表格的多关键字搜索，加入用户所输入的多个关键字之间用空格隔开，就用split方法把一个长字符串以空格为标准，分成一个字符串数组，
     //然后以一个循环将切成的数组的子字符串与信息表中的字符串比较
     var arr=str2.split(' ');
     for(var j=0;j<arr.length;j++)
     {
      if(str1.search(arr[j])!=-1){oTab.tBodies[0].rows[i].style.display='';}
     }
     }
    }
   }
        </script>
	</head>
	<body>
		<div class="box">
			<div class="top">
				<span>用户管理</span>
			</div>
			<div class="nav">
				<div class="nav_item">
					<input type="text" name="search" id="search_text">
				</div>
				<div class="nav_search">
					<input type="button" value="查询" id="search">
				</div>
			</div>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				 <tr>
    <td align="center"><table width="100%" border="0" id="tab">
      <tr class="t2">
       <td ><span class="STYLE1">UID</span></td>
        <td><span class="STYLE1">用户名</span></td>
        <td><span class="STYLE1">地址</span></td>
        <td><span class="STYLE1">手机号码</span></td>
        <td><span class="STYLE1">微信ID</span></td>
         <td><span class="STYLE1">总积分</span></td>
        <td><span class="STYLE1">兑换积分</span></td>
         <td><span class="STYLE1">末次月经时间</span></td>
        <td><span class="STYLE1">宝妈/孕妈</span></td>
         <td><span class="STYLE1">大宝生日</span></td>
        <td><span class="STYLE1">二宝生日</span></td>
         <td><span class="STYLE1">创建时间</span></td>
        <td><span class="STYLE1">操作</span></td>
      </tr>
      <?php
       include_once("conn/conn.php");
        $sqlstr = "select * from jifen_user order by id desc";
        $result = mysqli_query($conn,$sqlstr);

    while ($rows = mysqli_fetch_row($result)){
        echo "<tr class='t3'>";
        for($i = 1; $i < count($rows); $i++){
           echo "<td align='center'><span class='STYLE2'>".$rows[$i]."</span></td>";
        }
         echo "<td align='center'><span class='STYLE2'><a href=add.php?action=add&id=".$rows[1].">增加</a>/<a href=reduce.php?action=reduce&id=".$rows[1].">减少</a></span></td>";
        echo "</tr>";
    }    
?>
    </table></td>
  </tr>
  </tr>
			</table>

		</div>
	</body>
</html>
