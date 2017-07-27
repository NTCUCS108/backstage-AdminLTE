<section class="content">
<div class="row">
<div class="col-md-8 col-md-offset-2">
	<div class="box">
		<div class="box-header">
			<h1 align="center">回覆頁面</h1>
		</div>

		<div class="box-body" class="col-md-8 col-md-offset-2">
				<table align="center" width="60%" border="1" class="table table-bordered">
					<tr><td width="20%"><?php echo "主旨：";?></td>
						<td width="20%"><?php echo $rs[guestSubject];?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "暱稱：";?></td>
						<td width="80%"><?php echo $rs[guestName];?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "信箱：";?></td>
						<td width="80%"><?php echo $rs[guestEmail];?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "性別：";?></td>
						<td width="80%"><?php if($rs[guestGender]==0)echo "女";else echo "男";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "內容：";?></td>
						<td width="80%"><?php echo $rs[guestContent];?></td><!--無法換行-->
					</tr>
					<tr>
						<td width="20%"><?php echo "時間：";?></td>
						<td width="80%"><?php echo $rs[guestTime];?></td>
					</tr>
				</table>
		</div>
				<br>
				<form id="reply_form" name="reply_form" method="post" align="center">

				回覆內容
				<br><textarea name="reply" id="reply" style="width:60%;" rows="8"><?php echo "$rs[guestReply]";?></textarea><br>
				<input type="submit" class="btn btn-success" value="送出">
				</form>
	</div>
</div>
</div>
</section>
