<?php
session_start();
if($_SESSION['login'] != "yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
if(!isset($_GET['id']))
	header("location:Carousel_edit.php");
include("carousel_connect.php");
$id = $_GET['id'];
//echo $_GET['id'];
$data=mysql_query("select * from slide where slide_id = '$id'");
$rs=mysql_fetch_assoc($data);
unlink("$rs[img_src]");//delete file
mysql_query("delete from slide where slide_id = '$id'");
$data=mysql_query("select * from slide order by slide_id");
for($i=0;$i<mysql_num_rows($data);$i++)
{
	$rs = mysql_fetch_assoc($data);
	mysql_query("update slide set slide_id = '$i' where slide_id='$rs[slide_id]'");
}
header("location:Carousel_edit.php");
?>