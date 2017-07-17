<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("carousel_connect.php");
//checkbox批次刪除
if(isset($_POST['delete']))
{
$delete = $_POST['delete'];
foreach($delete as $value)
{
	$data=mysql_query("select * from slide where slide_id = '$value'");
	$rs=mysql_fetch_assoc($data);
	unlink("$rs[img_src]");//delete file
	mysql_query("delete from slide where slide_id = '$value'");
}
}
$data=mysql_query("select * from slide order by slide_id");
for($i=0;$i<mysql_num_rows($data);$i++)
{
	$rs = mysql_fetch_assoc($data);
	mysql_query("update slide set slide_id = '$i' where slide_id='$rs[slide_id]'");
}
$data=mysql_query("select * from slide order by slide_id");
ob_start();                      // start capturing output
include('Carousel_edit_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Carousel_edit_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
