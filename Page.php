<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("page_connect.php");
//checkbox批次刪除
if(isset($_POST['delete']))
{
$delete = $_POST['delete'];
foreach($delete as $value)
{
	$data=mysql_query("select * from page where name = '$value'");
	$rs=mysql_fetch_assoc($data);
	$deletetime=date("Y-m-d G:i:s");
	mysql_query("update page set dead_time = '$deletetime',recent_edit_time = '$deletetime' where post_id = '$rs[post_id]'");
}
}
$data=mysql_query("select * from page where dead_time = '0000-00-00 00:00:00' order by post_id");
ob_start();                      // start capturing output
include('Page_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Page_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
