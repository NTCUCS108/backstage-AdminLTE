<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("message_connect.php");


//checkbox批次刪除
if(isset($_POST['delete']))
{
$delete = $_POST['delete'];
foreach($delete as $value)
{
	//$data = mysql_query("select * from comment where guestID = '$value'");
	//$rs = mysql_fetch_assoc($data);
	//$deletetime=date("Y/m/d G:i:s");
	//mysql_query("insert into dead_comment value('$rs[guestID]','$rs[guestName]','$rs[guestEmail]','$rs[guestGender]','$rs[guestSubject]','$rs[guestTime]','$rs[guestContentType]','$rs[guestContent]','$rs[guestReply]','$rs[guestReplyTime]','$rs[browse_count]','$rs[admin_read]','$deletetime')");
	mysql_query("delete from comment where guestID = '$value'");
}
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
	$display = mysql_query("select * from comment");
else if($search=="已回覆")
	$display = mysql_query("select * from comment where guestReply != ''");
else if($search=="未回覆")
	$display = mysql_query("select * from comment where guestReply = ''");
else if($search=="未讀")
	$display = mysql_query("select * from comment where admin_read = '0'");
else if($search=="已讀")
	$display = mysql_query("select * from comment where admin_read = '1'");
else
	$display = mysql_query("select * from comment where guestContentType = '$search'");
$page = $_GET["page"];//目前在第幾頁
if(!isset($page))
	$page = 1;//未設定則內建1
$start = ($page-1)*$num;//跟著頁數變化資料從第幾筆開始顯示
$page_num = ceil(mysql_num_rows($display)/$num);//一共幾頁
if($search=="不限")
	$display = mysql_query("select * from comment order by $sortorder $sortway limit $start,$num");//抓取正確範圍的資料
else if($search=="已回覆")
	$display = mysql_query("select * from comment where guestReply != '' order by $sortorder $sortway limit $start,$num");
else if($search=="未回覆")
	$display = mysql_query("select * from comment where guestReply = '' order by $sortorder $sortway limit $start,$num");
else if($search=="未讀")
	$display = mysql_query("select * from comment where admin_read = '0' order by $sortorder $sortway limit $start,$num");
else if($search=="已讀")
	$display = mysql_query("select * from comment where admin_read = '1' order by $sortorder $sortway limit $start,$num");
else
	$display = mysql_query("select * from comment where guestContentType = '$search' order by $sortorder $sortway limit $start,$num");

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
