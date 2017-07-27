<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("message_connect.php");

if(!isset($_GET["id"]))
	header("location:MessageBoard.php");
$id = $_GET["id"];
if($_POST["reply"]!='')
$guestReply = $_POST["reply"];
$data = mysql_query("select * from comment where guestID = '$id'");
$rs = mysql_fetch_assoc($data);
if(isset($guestReply))
{
	$time = date("Y-m-d G:i:s");
	$guestReply = str_replace("\n","<br>",$guestReply);
	mysql_query("update comment set guestReply='$guestReply',guestReplyTime='$time' where guestID='$id'");
	header("location:MessageBoard.php?guestContentType=未回覆&sortorder=guestTime&sortway=desc");
}
ob_start();                      // start capturing output
include('MessageBoard_reply_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('MessageBoard_reply_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
