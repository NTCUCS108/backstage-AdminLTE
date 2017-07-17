<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("message_connect.php");
$_SESSION['havenot_read_data'] = mysql_query("select * from comment where admin_read = '0'");
$_SESSION['havenot_read_num'] = mysql_num_rows($_SESSION['havenot_read_data']);
$_SESSION['havenot_reply_data'] = mysql_query("select * from comment where guestReply = ''");
$_SESSION['havenot_reply_num'] = mysql_num_rows($_SESSION['havenot_reply_data']);
mysql_close();
mysql_connect("localhost","root","admin"); //連結伺服器
mysql_select_db("company"); //選擇資料庫
mysql_query("set names utf8"); //以utf-8讀取資料，讓資料可以讀取中文
$data=mysql_query("select * from backstagehome"); //從contact資料庫中選擇所有的資料表
ob_start();                      // start capturing output
include('starter_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");
?>
