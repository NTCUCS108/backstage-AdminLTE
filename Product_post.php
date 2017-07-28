<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("product_connect.php");
if(isset($_GET['id']) xor isset($_GET['use_original_pic']))
	header("Location: Product_edit.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$data=mysql_query("select * from product where product_id = '$id'");
	$rs=mysql_fetch_row($data);
}
else
{
	$data=mysql_query("select * from product where product_id != '-1'");
	$id = mysql_num_rows($data);
}
if($_POST['headers']!='')
	$headers=$_POST['headers'];
if($_POST['editor1']!='')
	$description=$_POST['editor1'];
if($_POST['link']!='')
	$link=$_POST['link'];
?>
<?php
if(isset($headers) or isset($description) or isset($link))
{
	$check = 0;
	if($_GET['use_original_pic']=='true')
		$_SESSION['img_src']=$rs[2];
	if(isset($headers) and isset($description) and isset($link))
	{
		$check = 1;
		if($_GET['use_original_pic']!="true")
			$_SESSION['img_src'] = substr($_SESSION['img_src'],3);//upload/test.php問題 因此需要去掉../
		if($_GET['use_original_pic']=="false")
		{
			$deletepath = explode("/img/","$rs[2]");
			rename("$rs[2]","$deletepath[0]/delete_img/$deletepath[1]");
			mysql_query("Insert into edit_product value('$deletepath[0]/delete_img/$deletepath[1]','$rs[3]','$rs[4]','$rs[5]','$rs[8]','$rs[0]')");
		}
		elseif($_GET['use_original_pic']=="true")
		{
			mysql_query("Insert into edit_product value('$rs[2]','$rs[3]','$rs[4]','$rs[5]','$rs[8]','$rs[0]')");
		}
		if(isset($_GET['id']))
		{
			$edittime = date("Y-m-d G:i:s");
			mysql_query("update product set headers = '$headers',description = '$description',link = '$link',img_src = '$_SESSION[img_src]',recent_edit_time = '$edittime' where product_id = '$id'");
		}
		else
		{
			$createtime = date("Y-m-d G:i:s");
			mysql_query("Insert into product value('','$id','$_SESSION[img_src]','$headers','$description','$link','$createtime','','$createtime')");
		}
		unset($_SESSION["img_src"]);
		header("location:Product_edit.php");
		exit();
	}
}
ob_start();                      // start capturing output
include('Product_post_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Product_post_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('Product_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean(); 
include("master.php");
?>
