<h1 align="center">回覆頁面</h1>
				<?php
				$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="60%" border="1">
					<tr>
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
				<br>
				<form id="reply_form" name="reply_form" method="post" align="center">
				回覆內容：
				<br><textarea name="reply" id="reply" style="width:60%;" rows="8">
				</textarea><br>
				<input type="submit" value="送出">
				</form>