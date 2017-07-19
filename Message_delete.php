<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("message_connect.php");
if(!isset($_GET['id']))
	header("location:MessageBoard.php");
$id = $_GET["id"];
$data = mysql_query("select * from comment where guestID = '$id'");
$rs = mysql_fetch_assoc($data);
$deletetime=date("Y/m/d G:i:s");
mysql_query("insert into dead_comment value('$rs[guestID]','$rs[guestName]','$rs[guestEmail]','$rs[guestGender]','$rs[guestSubject]','$rs[guestTime]','$rs[guestContentType]','$rs[guestContent]','$rs[guestReply]','$rs[guestReplyTime]','$rs[browse_count]','$rs[admin_read]','$deletetime')");
mysql_query("delete from comment where guestID = '$id'");
header("location:MessageBoard.php");
?>
