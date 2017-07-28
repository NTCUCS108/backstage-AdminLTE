<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("page_connect.php");
$data=mysql_query("select * from page_data where name = '$_GET[name]'");
$rs=mysql_fetch_assoc($data);
ob_start();                      // start capturing output
include('Page_revival_detail_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Page_revival_detail_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
