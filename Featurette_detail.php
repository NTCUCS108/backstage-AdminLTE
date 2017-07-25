<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("carousel_connect.php");
$id = $_GET["id"];
if(!isset($id))
	header("location:Featurette_edit.php");
$data=mysql_query("select * from featurette where featurette_id = '$id'");
$rs=mysql_fetch_assoc($data);
ob_start();                      // start capturing output
include('Featurette_detail_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Featurette_detail_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Featurette_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean(); 
include("master.php");
?>
