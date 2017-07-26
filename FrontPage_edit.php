<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("carousel_connect.php");
$data=mysql_query("select * from homepage"); 
$rs=mysql_fetch_assoc($data);
if($_POST['editor1']!='')
{
	$edittime = date("Y-m-d G:i:s");
	mysql_query("insert into edit_homepage value('$rs[content]','$rs[recent_edit_time]')");
    mysql_query("update homepage set content = '$_POST[editor1]',recent_edit_time = '$edittime'");
    header("location:FrontPage.php");
}
ob_start();                      // start capturing output
include('FrontPage_edit_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('FrontPage_edit_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('FrontPage_edit_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
