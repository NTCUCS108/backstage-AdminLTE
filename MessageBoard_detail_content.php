<button onclick="location.href = 'MessageBoard.php';" class="btn btn-success">回管理留言板</button>


<div class="row">
<div class="col-md-8 col-md-offset-2">
	<div class="box">
		<div class="box-header">
			<h1 align="center">第<?php echo $id;?>則留言</h1>
		</div>
		<!-- /.box-header -->		
				<br><br><br>
			<div class="box-body no-padding">
				<table align="center" width="60%" border="1">
					<tr>
						<td width="20%"><?php echo "主旨："?></td>
						<td width="80%"><?php echo $rs[guestSubject]?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "類型："?></td>
						<td width="80%"><?php echo $rs[guestContentType]?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "瀏覽次數："?></td>
						<td width="80%"><?php echo $rs[browse_count]?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "ID："?></td>
						<td width="80%"><?php echo $rs[guestID]?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "暱稱："?></td>
						<td width="80%"><?php echo $rs[guestName]?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "信箱："?></td>
						<td width="80%"><?php echo $rs[guestEmail]?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "性別："?></td>
						<td width="80%"><?php if($rs[guestGender]==0)echo "女";else echo "男";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "內容："?></td>
						<td width="80%"><?php echo $rs[guestContent]?></td><!--無法換行-->
					</tr>
					<tr>
						<td width="20%"><?php echo "時間："?></td>
						<td width="80%"><?php echo $rs[guestTime]?></td>
					</tr>
					<?php if($rs[guestReply]!=""){?>
							<tr>
							  <td colspan="2" style="background:#999; color:white; text-align:center">站長回覆</td>
							</tr>
							<tr>
							  <td colspan="2"><?php echo $rs[guestReply];?></td>
							</tr>
					<?php } ?>
				</table>
			</div>
	
				<br>
				<div class="box-tools">
				<p align="center">
					<a href="Message_reply.php?id=<?php echo $rs[guestID];?>">回覆</a>
					<a href="Message_delete.php?id=<?php echo $rs[guestID];?>">刪除</a>
				</p>
				</div>
		</div>
</div>
</div>