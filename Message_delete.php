<?php
include("message_connect.php");
if(!isset($_GET['id']))
	header("location:MessageBoard.php");
$id = $_GET["id"];
mysql_query("delete from comment where guestID = '$id'");
header("location:MessageBoard.php");
?>
