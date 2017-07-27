<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("homepage_connect.php");
//checkbox批次刪除
if(isset($_POST['delete']))
{
$delete = $_POST['delete'];
foreach($delete as $value)
{
	$data=mysql_query("select * from circle where circle_id = '$value'");
	$rs=mysql_fetch_assoc($data);
	$deletetime=date("Y-m-d G:i:s");
	$deletepath = explode("/img/",$rs[img_src]);
	rename("$rs[img_src]","$deletepath[0]/delete_img/$deletepath[1]");//move file
	mysql_query("update circle set circle_id = '-1',img_src = '$deletepath[0]/delete_img/$deletepath[1]',dead_time = '$deletetime',recent_edit_time = '$deletetime' where circle_id='$rs[circle_id]'");
}
}
$data=mysql_query("select * from circle where circle_id != '-1' order by circle_id");
for($i=0;$i<mysql_num_rows($data);$i++)
{
	$rs = mysql_fetch_assoc($data);
	mysql_query("update circle set circle_id = '$i' where circle_id='$rs[circle_id]'");
}
$data=mysql_query("select * from circle where circle_id != '-1' order by circle_id");
ob_start();                      // start capturing output
include('Circle_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Circle_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Circle_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean();
include("master.php");
?>
