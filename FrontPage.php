<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("carousel_connect.php");
if(isset($_POST['frontpage']))
{
	mysql_query("update homepage_select set homepage_select = '$_POST[frontpage]'");
}
$select = mysql_query("select * from homepage_select");
$s_rs = mysql_fetch_assoc($select);
ob_start();                      // start capturing output
include('FrontPage_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('FrontPage_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");

?>
