<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("message_connect.php");
$_SESSION['havenot_read_data'] = mysql_query("select * from comment where admin_read = '0'");
$_SESSION['havenot_read_num'] = mysql_num_rows($_SESSION['havenot_read_data']);
$_SESSION['havenot_reply_data'] = mysql_query("select * from comment where guestReply = ''");
$_SESSION['havenot_reply_num'] = mysql_num_rows($_SESSION['havenot_reply_data']);

//checkbox批次刪除
if(isset($_POST['delete']))
{
$delete = $_POST['delete'];
foreach($delete as $value)
	mysql_query("delete from comment where guestID = '$value'");
}
//對資料庫的資料進行分頁
if(!isset($_GET["guestContentType"]))
	$search="不限";
else
	 $search = $_GET["guestContentType"];
if(!isset($_GET["sortorder"]))
	$sortorder="guestTime";
else
	$sortorder=$_GET["sortorder"];
if(!isset($_GET["sortway"]))
	$sortway="desc";
else
	$sortway=$_GET["sortway"];
$num = 10;//一頁筆數
if($search=="不限")//符合的資料共有幾筆
	$data = mysql_query("select * from comment");
else if($search=="已回覆")
	$data = mysql_query("select * from comment where guestReply != ''");
else if($search=="未回覆")
	$data = mysql_query("select * from comment where guestReply = ''");
else if($search=="未讀")
	$data = mysql_query("select * from comment where admin_read = '0'");
else if($search=="已讀")
	$data = mysql_query("select * from comment where admin_read = '1'");
else
	$data = mysql_query("select * from comment where guestContentType = '$search'");
$page = $_GET["page"];//目前在第幾頁
if(!isset($page))
	$page = 1;//未設定則內建1
$start = ($page-1)*$num;//跟著頁數變化資料從第幾筆開始顯示
$page_num = ceil(mysql_num_rows($data)/$num);//一共幾頁
if($search=="不限")
	$data = mysql_query("select * from comment order by $sortorder $sortway limit $start,$num");//抓取正確範圍的資料
else if($search=="已回覆")
	$data = mysql_query("select * from comment where guestReply != '' order by $sortorder $sortway limit $start,$num");
else if($search=="未回覆")
	$data = mysql_query("select * from comment where guestReply = '' order by $sortorder $sortway limit $start,$num");
else if($search=="未讀")
	$data = mysql_query("select * from comment where admin_read = '0' order by $sortorder $sortway limit $start,$num");
else if($search=="已讀")
	$data = mysql_query("select * from comment where admin_read = '1' order by $sortorder $sortway limit $start,$num");
else
	$data = mysql_query("select * from comment where guestContentType = '$search' order by $sortorder $sortway limit $start,$num");
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
                                <span class="label label-danger"><?php echo $_SESSION[havenot_read_num]+$_SESSION[havenot_reply_num];?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><a href="MessageBoard.php?guestContentType=未讀">系統有<?php echo "$_SESSION[havenot_read_num]";?>則未讀留言!</a></li>
								<li class="header"><a href="MessageBoard.php?guestContentType=未回覆">系統有<?php echo "$_SESSION[havenot_reply_num]";?>則未回覆留言!</a></li>
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
                        <a href="FrontPage.php"><i class="fa fa-link"></i> <span>首頁</span>
                    </a>
                    </li>

                    <!-- Optionally, you can add icons to the links -->
                    <li>
                        <a href="ProductInformation.php">
                        <i class="fa fa-link"></i>
                         <span>產品資訊</span>
                        </a>
                    </li>
                    
                    <li> <a href="MessageBoard.php"><i class="fa fa-edit"></i> <span>留言板</span></a></li>
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
                    <li class="active">留言板</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
			<form name="search" method="get">
				搜尋類別：
				<select name="guestContentType">
				<?php
					echo '<option value="不限"';if($search=="不限") echo ' selected';echo '>不限</option>';
					echo '<option value="產品"';if($search=="產品") echo ' selected';echo '>產品</option>';
					echo '<option value="實績"';if($search=="實績") echo ' selected';echo '>實績</option>';
					echo '<option value="其他"';if($search=="其他") echo ' selected';echo '>其他</option>';
					echo '<option value="已回覆"';if($search=="已回覆") echo ' selected';echo '>已回覆</option>';
					echo '<option value="未回覆"';if($search=="未回覆") echo ' selected';echo '>未回覆</option>';
					echo '<option value="已讀"';if($search=="已讀") echo ' selected';echo '>已讀</option>';
					echo '<option value="未讀"';if($search=="未讀") echo ' selected';echo '>未讀</option>';
				?>
				</select><br>
				排序類別：
				<select name="sortorder">
				<?php
					echo '<option value="guestTime"';if($sortorder=="guestTime") echo ' selected';echo '>時間</option>';
					echo '<option value="browse_count"';if($sortorder=="browse_count") echo ' selected';echo '>瀏覽人數</option>';
				?>
				</select><br>
				排序順序：
				<select name="sortway">
				<?php
					echo '<option value="desc"';if($sortway=="desc") echo ' selected';echo '>新or多</option>';
					echo '<option value=""';if($sortway=="") echo ' selected';echo '>舊or少</option>';
				?>
				</select><br>
				<input type="submit" value="送出">
				</form>
				<form name="delete comment" method="post">
				<input type="submit" value="刪除勾選的留言">
<table align="center" width="60%" border="1">
					<tr>
						<td width="5%">
							刪除
						</td>
						<td width="5%">ID</td>
						<td width="5%">類型</td>
						<td width="60%">主旨：</td>
						<td width="10%">瀏覽人數</td>
						<td width="10%">已回覆</td>
						<td width="5%">已讀</td>
					</tr>
				</table>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="60%" border="1">
					<tr>
						<td width="5%">
							<input type="checkbox" name="delete[]" value="<?php echo $rs[guestID];?>">
						</td>
						<td width="5%"><?php echo "$rs[guestID]"?></td>
						<td width="5%"><?php echo "$rs[guestContentType]"?></td>
						<td width="60%"><?php echo "<a href='MessageBoard_detail.php?id=$rs[guestID]'>$rs[guestSubject]</a>"?></td>
						<td width="10%"><?php echo $rs[browse_count]?></td>
						<?php 
							if($rs[guestReply]!="")
								echo "<td width='10%' style='color:green;'>y</td>";
							else
								echo "<td width='10%' style='color:red;'>n</td>";
						?>
						<?php 
							if($rs[admin_read]=="1")
								echo "<td width='10%' style='color:green;'>y</td>";
							else
								echo "<td width='10%' style='color:red;'>n</td>";
						?>
					</tr>
				</table>
				<?php
				}
				?>
				</form>
				<p align="center">
				<?php
				for($i=1;$i<=$page_num;$i++)
					echo "<a href='MessageBoard.php?guestContentType=$search&sortorder=$sortorder&sortway=$sortway&page=$i'>$i </a>"//顯示頁數
				?>
				</p>
                <!--------------------------
                | Your Page Content Here |
                -------------------------->
            <!--
            <h1>
                從資料庫抓留言板的資料顯示於網頁上
                <small></small>
            </h1>
            -->
                <br><br>
                <a href="#">
                    <button type="link" pull-right class="btn btn-primary">編輯</button>
                </a>
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