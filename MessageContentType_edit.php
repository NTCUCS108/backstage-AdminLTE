<?php
session_start();
if($_SESSION['login']!="yes")
	header("Location: ../bootstrap-3.3.1/docs/examples/signin/signin.php");
include("message_connect.php");
//checkbox批次勾選
if(isset($_POST['add']))
{
	$conflic = mysql_query("select * from guestContenttype where name = '$_POST[add]'");
	if(mysql_num_rows($conflic)>0)
	{
		$error = 1;
	}
	else
	{
		$error = 0;
		mysql_query("insert into guestcontenttype value('','$_POST[add]','1')");
	}
}
if(isset($_POST['checked']))
{
	$original = mysql_query("select * from guestcontenttype where live = '1' order by post_id");
	$o_rs = mysql_fetch_assoc($original);
	$select = $_POST['select'];
	//comment dead_commet 搬移
	$i = 0;
	$j = 0;
	for(;$i<count($select) and $j<mysql_num_rows($original);)
	{
		if($select[$i]<$o_rs['post_id'])//原本沒有，後來有 死->活
		{
			$type = mysql_query("select * from guestcontenttype where post_id = '$select[$i]'");
			$t_rs = mysql_fetch_assoc($type);
			$move = mysql_query("select * from dead_comment where guestContentType = '$t_rs[name]'");
			for($k=1;$k<=mysql_num_rows($move);$k++)
			{
				$m_rs = mysql_fetch_assoc($move);
				mysql_query("insert into comment value('$m_rs[guestID]','$m_rs[guestName]','$m_rs[guestEmail]','$m_rs[guestGender]','$m_rs[guestSubject]','$m_rs[guestTime]','$m_rs[guestContentType]','$m_rs[guestContent]','$m_rs[guestReply]','$m_rs[guestReplyTime]','$m_rs[browse_count]','$m_rs[admin_read]')");
				mysql_query("delete from dead_comment where guestID = '$m_rs[guestID]'");
			}
			$i++;
		}
		elseif($select[$i]>$o_rs['post_id'])//原本有，後來沒有 活->死
		{
			$move = mysql_query("select * from comment where guestContentType = '$o_rs[name]'");
			for($k=1;$k<=mysql_num_rows($move);$k++)
			{
				$m_rs = mysql_fetch_assoc($move);
				$deletetime = date("Y-m-d G:i:s");
				mysql_query("insert into dead_comment value('$m_rs[guestID]','$m_rs[guestName]','$m_rs[guestEmail]','$m_rs[guestGender]','$m_rs[guestSubject]','$m_rs[guestTime]','$m_rs[guestContentType]','$m_rs[guestContent]','$m_rs[guestReply]','$m_rs[guestReplyTime]','$m_rs[browse_count]','$m_rs[admin_read]','$deletetime')");
				mysql_query("delete from comment where guestID = '$m_rs[guestID]'");
			}
			$j++;
			$o_rs = mysql_fetch_assoc($original);
		}
		else
		{
			$i++;
			$j++;
			$o_rs = mysql_fetch_assoc($original);
		}
	}
	for(;$i<count($select);$i++)//原本沒有，後來有 死->活
	{
		$type = mysql_query("select * from guestcontenttype where post_id = '$select[$i]'");
		$t_rs = mysql_fetch_assoc($type);
		$move = mysql_query("select * from dead_comment where guestContentType = '$t_rs[name]'");
		for($k=1;$k<=mysql_num_rows($move);$k++)
		{
			$m_rs = mysql_fetch_assoc($move);
			mysql_query("insert into comment value('$m_rs[guestID]','$m_rs[guestName]','$m_rs[guestEmail]','$m_rs[guestGender]','$m_rs[guestSubject]','$m_rs[guestTime]','$m_rs[guestContentType]','$m_rs[guestContent]','$m_rs[guestReply]','$m_rs[guestReplyTime]','$m_rs[browse_count]','$m_rs[admin_read]')");
			mysql_query("delete from dead_comment where guestID = '$m_rs[guestID]'");
		}
	}
	for(;$j<mysql_num_rows($original);$j++)//原本有，後來沒有 活->死
	{
		$move = mysql_query("select * from comment where guestContentType = '$o_rs[name]'");
		for($k=1;$k<=mysql_num_rows($move);$k++)
		{
			$m_rs = mysql_fetch_assoc($move);
			$deletetime = date("Y-m-d G:i:s");
			mysql_query("insert into dead_comment value('$m_rs[guestID]','$m_rs[guestName]','$m_rs[guestEmail]','$m_rs[guestGender]','$m_rs[guestSubject]','$m_rs[guestTime]','$m_rs[guestContentType]','$m_rs[guestContent]','$m_rs[guestReply]','$m_rs[guestReplyTime]','$m_rs[browse_count]','$m_rs[admin_read]','$deletetime')");
			mysql_query("delete from comment where guestID = '$m_rs[guestID]'");
		}
		$o_rs = mysql_fetch_assoc($original);
	}
		//$data = mysql_query("select * from comment where guestID = '$value'");
		//$rs = mysql_fetch_assoc($data);
		//$deletetime=date("Y/m/d G:i:s");
		//重新設定guestcontenttype的live
		mysql_query("update guestcontenttype set live = '0'");
		if(isset($select))
		{
			foreach($select as $value)
			mysql_query("update guestcontenttype set live = '1' where post_id = '$value'");
		}
		header("Location: MessageBoard.php");
		exit();
}

ob_start();                      // start capturing output
include('MessageContentType_edit_header.php');   // execute the file
$header = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('MessageContentType_edit_content.php');   // execute the file
$content = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
ob_start();                      // start capturing output
include('MessageContentType_edit_script.php');   // execute the file
$script = ob_get_contents();    // get the contents from the buffer
ob_end_clean();                  // stop buffering and discard contents
include("master.php");

?>
