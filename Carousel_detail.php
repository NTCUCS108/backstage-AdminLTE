<?php
include("carousel_connect.php");
$id = $_GET["id"];
if(!isset($id))
	header("location:Carousle_edit.php");
$data=mysql_query("select * from slide where slide_id = '$id'");
$rs=mysql_fetch_assoc($data);
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理者後台</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="icon" href="dist/img/icon.png">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->

        <header class="main-header">

            <!-- Logo -->
            <a href="starter.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>精德</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>精德</b>實業</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-danger">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">系統有3則新留言!</li>
                                <li>
                                    <!-- inner menu: contains the messages -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <!-- User Image -->
                                                    <img src="dist/img/user_ji.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <!-- Message title and timestamp -->
                                                <h4>
                                                    ㄇㄚˊ幾
                                                    <small><i class="fa fa-clock-o"></i> 3分鐘前</small>
                                                </h4>
                                                <!-- The message -->
                                                <p>要開開心心過每一天喔~</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                    </ul>
                                    <!-- /.menu -->
                                </li>
                                <li class="footer"><a href="#">查看所有新留言</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="dist/img/user_maji.png" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">管理者1</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="dist/img/user_maji.png" class="img-circle" alt="User Image">

                                    <p>
                                        管理者1
                                        <small>從2017年7月開始擔任</small>
                                    </p>
                                </li>
                        </li>
                        <!-- Menu Footer -->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">登出</a>
                            </div>
                        </li>
                        </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user_maji.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>管理者1</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> 上線中 </a>
                    </div>
                </div>

                
                <!-- search form (Optional) 
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
                        </span>
                    </div>
                </form>
                 /.search form -->

                <!-- Sidebar Menu -->
                
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"></li>
                    <li>
                        <a href="FrontPage.php"><i class="fa fa-edit"></i> <span>首頁</span>
                    </a>
                    </li>

                    <!-- Optionally, you can add icons to the links -->
                    <li>
                        <a href="ProductInformation.php">
                        <i class="fa fa-link"></i>
                         <span>產品資訊</span>
                        </a>
                    </li>

                    <li><a href="MessageBoard.php"><i class="fa fa-link"></i> <span>留言板</span></a></li>
                    <li>
                        <a href="CompanyIntroduce.php">
                            <i class="fa fa-link"></i> <span>公司簡介</span>
                        </a>
                    </li>
                    <li><a href="ConnectWays.php"><i class="fa fa-link"></i> <span>聯絡方式</span></a></li>

                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <!-- 隨著頁面而變動 -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="starter.php"><i class="fa fa-edit"></i>管理者後台</a></li>
                    <li class="active">首頁</li>
					<li class="active">投影片編輯</li>
					<li class="active">第<?php echo "$rs[slide_id]"?>則投影</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
                | Your Page Content Here |
                -------------------------->
                <!--
                <h1>
                    從資料庫抓首頁資料顯示於網頁上
                    <small></small>
                </h1>
                -->
                <br><br>
				<h1 align="center">第<?php echo $id;?>則投影</h1><br>
				<button onclick="location.href = 'Carousel_edit.php';">回管理首頁板</button><br>
				<table align="center" width="60%" border="1">
					<tr>
						<td width="20%"><?php echo "投影片id：$rs[slide_id]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "圖片位置：";?></td>
						<td width="80%"><?php echo "$rs[img_src]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "圖片內容：";?></td>
						<td width="80%"><?php echo "<img src='$rs[img_src]' style='max-width:500px;max-height:300px;'>";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "投影片alt:$rs[alt]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "標題：";?></td>
						<td width="80%"><?php echo "$rs[headers]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "介紹：";?></td>
						<td width="80%"><?php echo "$rs[description]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "按鈕顯示：";?></td>
						<td width="80%"><?php echo "$rs[icon]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "網址連結：";?></td>
						<td width="80%"><?php echo "$rs[link_src]";?></td>
					</tr>
				</table>
				<p align="center">
					<a href="Carousel_post.php?id=<?php echo "$rs[slide_id]"?>">編輯</a>
					<a href="Carousel_delete.php?id=<?php echo "$rs[slide_id]"?>">刪除</a>
				</p>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2017 <a href="#">精德實業股份有限公司</a>.</strong>
        </footer>


        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>