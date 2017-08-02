<?php
session_start();
if($_SESSION['login'] != "yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
if(!isset($_GET['id']))
	header("location:Circle_revival_browse.php");
include("homepage_connect.php");
$id = $_GET['id'];
//echo $_GET['id'];
$data=mysql_query("select * from circle where post_id = '$id'");
$rs=mysql_fetch_assoc($data);
$edittime=date("Y-m-d G:i:s");
$revivalpath = explode("/delete_img/",$rs[img_src]);
rename("$rs[img_src]","$revivalpath[0]/img/$revivalpath[1]");//move file
$circle_id = mysql_num_rows(mysql_query("select * from circle where circle_id != '-1'"));
mysql_query("update circle set circle_id = '$circle_id',img_src = '$revivalpath[0]/img/$revivalpath[1]',dead_time = '0000-00-00 00:00:00',recent_edit_time = '$edittime' where post_id='$id'");
header("location:Circle_revival_browse.php");
?>
