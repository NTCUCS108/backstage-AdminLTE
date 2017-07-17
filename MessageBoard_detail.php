<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("message_connect.php");
$_SESSION['havenot_read_data'] = mysql_query("select * from comment where admin_read = '0'");
$_SESSION['havenot_read_num'] = mysql_num_rows($_SESSION['havenot_read_data']);
$_SESSION['havenot_reply_data'] = mysql_query("select * from comment where guestReply = ''");
$_SESSION['havenot_reply_num'] = mysql_num_rows($_SESSION['havenot_reply_data']);

if(!isset($_GET['id']))
	header("location:MessageBoard.php");
$id = $_GET["id"];
$data = mysql_query("select * from comment where guestID = '$id'");
mysql_query("update comment set admin_read = '1' where guestID = '$id'");
$rs = mysql_fetch_assoc($data);
ob_start();                      // start capturing output
include('MessageBoard_detail_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('MessageBoard_detail_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
