<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("carousel_connect.php");
if(isset($_GET['id']) xor isset($_GET['use_original_pic']))
	header("Location: Circle_edit.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$data=mysql_query("select * from circle where circle_id = '$id'");
	$rs=mysql_fetch_assoc($data);
}
else
{
	$data=mysql_query("select * from circle where circle_id != '-1'");
	$id = mysql_num_rows($data);
}
if($_POST['headers']!='')
	$headers=$_POST['headers'];
if($_POST['description']!='')
	$description=$_POST['description'];
if($_POST['icon']!='')
	$icon=$_POST['icon'];
if($_POST['link_src']!='')
	$link_src=$_POST['link_src'];
?>
<?php
if(isset($headers) or isset($description) or isset($icon) or isset($link_src) or isset($_SESSION['img_src']))
{
	$check = 0;
	if($_GET['use_original_pic']=='true')
		$_SESSION['img_src']=$rs['img_src'];
	if(isset($headers) and isset($description) and isset($icon) and isset($link_src) and isset($_SESSION['img_src']))
	{
		$check = 1;
		if($_GET['use_original_pic']!="true")
			$_SESSION['img_src'] = substr($_SESSION['img_src'],3);//upload/test.php問題 因此需要去掉../
		if($_GET['use_original_pic']=="false")
		{
			$edittime = date("Y/m/d G:i:s");
			$deletepath = explode("/img/","$rs[img_src]");
			rename("$rs[img_src]","$deletepath[0]/delete_img/$deletepath[1]");
			mysql_query("Insert into edit_circle value('$deletepath[0]/delete_img/$deletepath[1]','$rs[headers]','$rs[description]','$rs[icon]','$rs[link_src]','$edittime','$rs[post_id]')");
		}
		elseif($_GET['use_original_pic']=="true")
		{
			$edittime = date("Y/m/d G:i:s");
			mysql_query("Insert into edit_circle value('$rs[img_src]','$rs[headers]','$rs[description]','$rs[icon]','$rs[link_src]','$edittime','$rs[post_id]')");
		}
		if(isset($_GET['id']))
		{
			mysql_query("update circle set headers = '$headers',description = '$description',icon = '$icon',link_src = '$link_src',img_src = '$_SESSION[img_src]' where circle_id = '$id'");
		}
		else
		{
			$createtime = date("Y/m/d G:i:s");
			mysql_query("Insert into circle value('','$id','$_SESSION[img_src]','$headers','$description','$icon','$link_src','$createtime','')");
		}
		unset($_SESSION["img_src"]);
		header("location:Circle_edit.php");
		exit();
	}
}
ob_start();                      // start capturing output
include('Circle_post_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Circle_post_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Circle_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean(); 
include("master.php");
?>
