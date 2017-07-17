<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("message_connect.php");
$_SESSION['havenot_read_data'] = mysql_query("select * from comment where admin_read = '0'");
$_SESSION['havenot_read_num'] = mysql_num_rows($_SESSION['havenot_read_data']);
$_SESSION['havenot_reply_data'] = mysql_query("select * from comment where guestReply = ''");
$_SESSION['havenot_reply_num'] = mysql_num_rows($_SESSION['havenot_reply_data']);

//checkbox批次刪除
if(isset($_POST['delete']))
{
$delete = $_POST['delete'];
foreach($delete as $value)
	mysql_query("delete from comment where guestID = '$value'");
}
//對資料庫的資料進行分頁
if(!isset($_GET["guestContentType"]))
	$search="不限";
else
	 $search = $_GET["guestContentType"];
if(!isset($_GET["sortorder"]))
	$sortorder="guestTime";
else
	$sortorder=$_GET["sortorder"];
if(!isset($_GET["sortway"]))
	$sortway="desc";
else
	$sortway=$_GET["sortway"];
$num = 10;//一頁筆數
if($search=="不限")//符合的資料共有幾筆
	$data = mysql_query("select * from comment");
else if($search=="已回覆")
	$data = mysql_query("select * from comment where guestReply != ''");
else if($search=="未回覆")
	$data = mysql_query("select * from comment where guestReply = ''");
else if($search=="未讀")
	$data = mysql_query("select * from comment where admin_read = '0'");
else if($search=="已讀")
	$data = mysql_query("select * from comment where admin_read = '1'");
else
	$data = mysql_query("select * from comment where guestContentType = '$search'");
$page = $_GET["page"];//目前在第幾頁
if(!isset($page))
	$page = 1;//未設定則內建1
$start = ($page-1)*$num;//跟著頁數變化資料從第幾筆開始顯示
$page_num = ceil(mysql_num_rows($data)/$num);//一共幾頁
if($search=="不限")
	$data = mysql_query("select * from comment order by $sortorder $sortway limit $start,$num");//抓取正確範圍的資料
else if($search=="已回覆")
	$data = mysql_query("select * from comment where guestReply != '' order by $sortorder $sortway limit $start,$num");
else if($search=="未回覆")
	$data = mysql_query("select * from comment where guestReply = '' order by $sortorder $sortway limit $start,$num");
else if($search=="未讀")
	$data = mysql_query("select * from comment where admin_read = '0' order by $sortorder $sortway limit $start,$num");
else if($search=="已讀")
	$data = mysql_query("select * from comment where admin_read = '1' order by $sortorder $sortway limit $start,$num");
else
	$data = mysql_query("select * from comment where guestContentType = '$search' order by $sortorder $sortway limit $start,$num");
ob_start();                      // start capturing output
include('MessageBoard_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('MessageBoard_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('MessageBoard_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");

?>
