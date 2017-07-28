<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("page_connect.php");
//checkbox批次刪除
if(isset($_POST['revival']))
{
$revival = $_POST['revival'];
foreach($revival as $value)
{
	$data=mysql_query("select * from page where post_id = '$value'");
	$rs=mysql_fetch_assoc($data);
	$edittime=date("Y-m-d G:i:s");
	mysql_query("update page set dead_time = '0000-00-00 00:00:00',recent_edit_time = '$edittime',parent = '測試' where post_id = '$rs[post_id]'");
}
}
$data=mysql_query("select * from page where dead_time != '0000-00-00 00:00:00' order by post_id");
ob_start();                      // start capturing output
include('Page_revival_browse_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Page_revival_browse_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
