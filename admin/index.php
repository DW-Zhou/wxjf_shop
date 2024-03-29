﻿<!DOCTYPE html>
<html>
<head>
    <title>江西百佳艾玛后台</title>
    <link rel="stylesheet" href="js/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/skins/_all-skins.css">
</head>
<body class="hold-transition skin-blue sidebar-mini" style="overflow:hidden;">
    <?php
    session_start();
    if(empty($_SESSION['username'])){
     header("Location: ../login.php?errno=3");
     exit();
    }
?>
    <div id="ajax-loader" style="cursor: progress; position: fixed; top: -50%; left: -50%; width: 200%; height: 200%; background: #fff; z-index: 10000; overflow: hidden;">
        <img src="img/ajax-loader.gif" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; margin: auto;" />
    </div>
    <div class="wrapper">
        <!--头部信息-->
        <header class="main-header">
            <a href="javascript:void (0)" class="logo">
                <span class="logo-mini"></span>
                <span class="logo-lg">江西百佳艾玛积分后台 </span>
            </a>
            <nav class="navbar navbar-static-top" style="display:block;font-weight: 500;font-size: 14px;color: #fff;padding-left: 10px">
                <!--<div class="sidebar-toggle">-->
                    <!--<span class="sr-only">天夏模板</span>-->
                <!--</div>-->
                <span class="index_top"><strong></strong></span>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" style="cursor: default;">
                                <img src="img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">admin</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--左边导航-->
        <div class="main-sidebar">
            <div class="sidebar">
                <ul class="sidebar-menu" id="sidebar-menu">
                    <li class="header">导航菜单</li>
                </ul>
            </div>
        </div>
        <!--中间内容-->
        <div id="content-wrapper" class="content-wrapper">
            <div class="content-iframe" style="overflow: hidden;">
                <div class="mainContent" id="content-main" style="margin: 10px; margin-bottom: 0; padding: 0;">
                   <iframe id="myFrame" class="LRADMS_iframe" width="100%" height="100%" src="Test4/index.php" frameborder="0" data-id="default.html"></iframe>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery/jQuery-2.2.0.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <script>
        var colorIndex = 0;
        $(function(){
            changeColor(colorIndex);
            $(".hidden-xs").click(function(){
                $("#color_div").hide();
            });
            $("#color").hover(function(){
                $("#color_div").show();
            });
            $(".color_ul li").each(function(index){
                $(this).click(function(){
                    if(index<5){
                        changeColor(index)
                    }else {
                        changeColor(0)
                    }

                })
            })
        });
        function changeColor(index){
            var logo = $(".logo");
            var navbar = $(".skin-blue .main-header .navbar");
            var left_Side = $(".skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side");
            var header = $(".skin-blue .sidebar-menu > li.header");
            var treeview_menu = $(".skin-blue .sidebar-menu > li > .treeview-menu");
            var aa = $(".skin-blue .sidebar-menu > li.active > a");
            var page_tabs_content = $(".content-wrapper .content-tabs .page-tabs .page-tabs-content a");
            if(index==0) {
                logo.addClass("logo1");
                navbar.addClass("navbar1");
                left_Side.addClass("left-side1");
                header.addClass("header1");
                treeview_menu.addClass("treeview-menu1");
                aa.addClass("a0");

                logo.removeClass("logo2");
                navbar.removeClass("navbar2");
                left_Side.removeClass("left-side2");
                header.removeClass("header2");
                treeview_menu.removeClass("treeview-menu2");
                aa.removeClass("a2");

                logo.removeClass("logo3");
                navbar.removeClass("navbar3");
                left_Side.removeClass("left-side3");
                header.removeClass("header3");
                treeview_menu.removeClass("treeview-menu3");
                aa.removeClass("a3");

                logo.removeClass("logo4");
                navbar.removeClass("navbar4");
                left_Side.removeClass("left-side4");
                header.removeClass("header4");
                treeview_menu.removeClass("treeview-menu4");
                aa.removeClass("a4");

                logo.removeClass("logo5");
                navbar.removeClass("navbar5");
                left_Side.removeClass("left-side5");
                header.removeClass("header5");
                treeview_menu.removeClass("treeview-menu5");
                aa.removeClass("a5");
            }else if(index==1){
                logo.removeClass("logo1");
                navbar.removeClass("navbar1");
                left_Side.removeClass("left-side1");
                header.removeClass("header1");
                treeview_menu.removeClass("treeview-menu1");
                aa.removeClass("a0");

                logo.addClass("logo2");
                navbar.addClass("navbar2");
                left_Side.addClass("left-side2");
                header.addClass("header2");
                treeview_menu.addClass("treeview-menu2");
                aa.addClass("a2");

                logo.removeClass("logo3");
                navbar.removeClass("navbar3");
                left_Side.removeClass("left-side3");
                header.removeClass("header3");
                treeview_menu.removeClass("treeview-menu3");
                aa.removeClass("a3");

                logo.removeClass("logo4");
                navbar.removeClass("navbar4");
                left_Side.removeClass("left-side4");
                header.removeClass("header4");
                treeview_menu.removeClass("treeview-menu4");
                aa.removeClass("a4");


                logo.removeClass("logo5");
                navbar.removeClass("navbar5");
                left_Side.removeClass("left-side5");
                header.removeClass("header5");
                treeview_menu.removeClass("treeview-menu5");
                aa.removeClass("a5");

            }else if(index==2){
                logo.removeClass("logo1");
                navbar.removeClass("navbar1");
                left_Side.removeClass("left-side1");
                header.removeClass("header1");
                treeview_menu.removeClass("treeview-menu1");
                aa.removeClass("a0");

                logo.removeClass("logo2");
                navbar.removeClass("navbar2");
                left_Side.removeClass("left-side2");
                header.removeClass("header2");
                treeview_menu.removeClass("treeview-menu2");
                aa.removeClass("a2");

                logo.addClass("logo3");
                navbar.addClass("navbar3");
                left_Side.addClass("left-side3");
                header.addClass("header3");
                treeview_menu.addClass("treeview-menu3");
                aa.addClass("a3");


                logo.removeClass("logo4");
                navbar.removeClass("navbar4");
                left_Side.removeClass("left-side4");
                header.removeClass("header4");
                treeview_menu.removeClass("treeview-menu4");
                aa.removeClass("a4");

                logo.removeClass("logo5");
                navbar.removeClass("navbar5");
                left_Side.removeClass("left-side5");
                header.removeClass("header5");
                treeview_menu.removeClass("treeview-menu5");
                aa.removeClass("a5");

            }else if(index==3){
                logo.removeClass("logo1");
                navbar.removeClass("navbar1");
                left_Side.removeClass("left-side1");
                header.removeClass("header1");
                treeview_menu.removeClass("treeview-menu1");
                aa.removeClass("a0");

                logo.removeClass("logo2");
                navbar.removeClass("navbar2");
                left_Side.removeClass("left-side2");
                header.removeClass("header2");
                treeview_menu.removeClass("treeview-menu2");
                aa.removeClass("a2");

                logo.removeClass("logo3");
                navbar.removeClass("navbar3");
                left_Side.removeClass("left-side3");
                header.removeClass("header3");
                treeview_menu.removeClass("treeview-menu3");
                aa.removeClass("a3");


                logo.addClass("logo4");
                navbar.addClass("navbar4");
                left_Side.addClass("left-side4");
                header.addClass("header4");
                treeview_menu.addClass("treeview-menu4");
                aa.addClass("a4");


                logo.removeClass("logo5");
                navbar.removeClass("navbar5");
                left_Side.removeClass("left-side5");
                header.removeClass("header5");
                treeview_menu.removeClass("treeview-menu5");
                aa.removeClass("a5");

            }
            else if(index==4){
                logo.removeClass("logo1");
                navbar.removeClass("navbar1");
                left_Side.removeClass("left-side1");
                header.removeClass("header1");
                treeview_menu.removeClass("treeview-menu1");
                aa.removeClass("a0");

                logo.removeClass("logo2");
                navbar.removeClass("navbar2");
                left_Side.removeClass("left-side2");
                header.removeClass("header2");
                treeview_menu.removeClass("treeview-menu2");
                aa.removeClass("a2");

                logo.removeClass("logo3");
                navbar.removeClass("navbar3");
                left_Side.removeClass("left-side3");
                header.removeClass("header3");
                treeview_menu.removeClass("treeview-menu3");
                aa.removeClass("a3");


                logo.removeClass("logo4");
                navbar.removeClass("navbar4");
                left_Side.removeClass("left-side4");
                header.removeClass("header4");
                treeview_menu.removeClass("treeview-menu4");
                aa.removeClass("a4");

                logo.addClass("logo5");
                navbar.addClass("navbar5");
                left_Side.addClass("left-side5");
                header.addClass("header5");
                treeview_menu.addClass("treeview-menu5");
                aa.addClass("a5");

            }


        }
    </script>
</body>
</html>
