<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("page_connect.php");
if(isset($_POST['name']))
{
	$conflict = mysql_query("select * from page where name = '$_POST[name]'");
	if(mysql_num_rows($conflict)>0)
	{
		$error = 1;
		$_POST['name'] = '';
	}
}
if($_POST['editor1'] != '' and $_POST['name'] != '')
{
	$createtime =  date("Y/m/d G:i:s");
    mysql_query("Insert into page value('','$_POST[name]','$_POST[parent]','$createtime','')");
	mysql_query("Insert into page_data value('$_POST[editor1]','$_POST[name]')");
    header("location:Page.php");
}
ob_start();                      // start capturing output
include('Page_add_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Page_add_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Page_add_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
