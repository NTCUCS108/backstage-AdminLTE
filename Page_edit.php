<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("page_connect.php");
$data = mysql_query("select * from page where name = '$_GET[name]'");
$rs = mysql_fetch_assoc($data);
if(isset($_POST['name']))
{
	$conflict = mysql_query("select * from page where name = '$_POST[name]' and post_id != '$rs[post_id]'");
	if(mysql_num_rows($conflict)>0)
	{
		$_POST['name'] = '';
		$error = 1;
	}
}
if($_POST['editor1'] != '' and $_POST['name'] != '')
{
	$backup = mysql_query("select * from page_data where name = '$_GET[name]'");
	$b_rs = mysql_fetch_assoc($backup);
	$edittime = date("Y-m-d G:i:s");
	mysql_query("insert into edit_page value('$b_rs[content]','$b_rs[name]','$rs[parent]','$rs[recent_edit_time]','$rs[post_id]')");
	mysql_query("update page_data set content = '$_POST[editor1]',name = '$_POST[name]' where name = '$rs[name]'");
	mysql_query("update page set name = '$_POST[name]',parent = '$_POST[parent]',recent_edit_time = '$edittime' where post_id = '$rs[post_id]'");
    header("location:Page_browse.php?name=$_POST[name]");
}
ob_start();                      // start capturing output
include('Page_edit_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Page_edit_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Page_edit_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
