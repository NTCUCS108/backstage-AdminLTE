<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("page_connect.php");
if(!isset($_GET['name']))
	header("location:Page.php");
$name = $_GET["name"];
$data = mysql_query("select * from page where name = '$name'");
$rs = mysql_fetch_assoc($data);
$deletetime=date("Y-m-d G:i:s");
mysql_query("update page set dead_time = '$deletetime',recent_edit_time = '$deletetime' where name = '$rs[name]'");
header("location:Page.php");
?>
