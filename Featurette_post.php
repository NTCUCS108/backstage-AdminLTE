<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("carousel_connect.php");
if(isset($_GET['id']) xor isset($_GET['use_original_pic']))
	header("Location: Featurette_edit.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$data=mysql_query("select * from featurette where featurette_id = '$id'");
	$rs=mysql_fetch_assoc($data);
}
else
{
	$data=mysql_query("select * from featurette where featurette_id != '-1'");
	$id = mysql_num_rows($data);
}
if($_POST['headers']!='')
	$headers=$_POST['headers'];
if($_POST['description']!='')
	$description=$_POST['description'];
?>
<?php
if(isset($headers) or isset($description) or isset($_SESSION['img_src']))
{
	$check = 0;
	if($_GET['use_original_pic']=='true')
		$_SESSION['img_src']=$rs['img_src'];
	if(isset($headers) and isset($description) and isset($_SESSION['img_src']))
	{
		$check = 1;
		if($_GET['use_original_pic']!="true")
			$_SESSION['img_src'] = substr($_SESSION['img_src'],3);//upload/test.php問題 因此需要去掉../
		if($_GET['use_original_pic']=="false")
		{
			$deletepath = explode("/img/","$rs[img_src]");
			rename("$rs[img_src]","$deletepath[0]/delete_img/$deletepath[1]");
			mysql_query("Insert into edit_featurette value('$deletepath[0]/delete_img/$deletepath[1]','$rs[headers]','$rs[description]','$rs[recent_edit_time]','$rs[post_id]')");
		}
		elseif($_GET['use_original_pic']=="true")
		{
			mysql_query("Insert into edit_featurette value('$rs[img_src]','$rs[headers]','$rs[description]','$rs[recent_edit_time]','$rs[post_id]')");
		}
		if(isset($_GET['id']))
		{

			$edittime = date("Y-m-d G:i:s");
			mysql_query("update featurette set headers = '$headers',description = '$description',img_src = '$_SESSION[img_src]',recent_edit_time = '$edittime' where featurette_id = '$id'");
		}
		else
		{
			$createtime = date("Y-m-d G:i:s");
			mysql_query("Insert into featurette value('','$id','$_SESSION[img_src]','$headers','$description','$createtime','','$createtime')");
		}
		unset($_SESSION["img_src"]);
		header("location:Featurette_edit.php");
		exit();
	}
}
ob_start();                      // start capturing output
include('Featurette_post_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Featurette_post_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Featurette_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean(); 
include("master.php");
?>
