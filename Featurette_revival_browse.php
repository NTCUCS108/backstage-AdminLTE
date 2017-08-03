<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("homepage_connect.php");
//checkbox批次刪除
if(isset($_POST['revival']))
{
$revival = $_POST['revival'];
foreach($revival as $value)
{
	$data=mysql_query("select * from featurette where post_id = '$value'");
	$rs=mysql_fetch_assoc($data);
	$edittime=date("Y-m-d G:i:s");
	$revivalpath = explode("/delete_img/",$rs[img_src]);
	rename("$rs[img_src]","$revivalpath[0]/img/$revivalpath[1]");//move file
	$id = mysql_num_rows(mysql_query("select * from featurette where featurette_id != '-1'"));
	mysql_query("update featurette set featurette_id = '$id',img_src = '$revivalpath[0]/img/$revivalpath[1]',dead_time = '0000-00-00 00:00:00',recent_edit_time = '$edittime' where post_id='$rs[post_id]'");
}
}
$data=mysql_query("select * from featurette where featurette_id = '-1' order by post_id");
ob_start();                      // start capturing output
include('Featurette_revival_browse_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Featurette_revival_browse_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Featurette_revival_browse_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean();
include("master.php");
?>
