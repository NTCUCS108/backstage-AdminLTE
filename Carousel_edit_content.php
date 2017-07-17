<br><br>
				<h1 align='center'>管理首頁板</h1><br>
				<button onclick="location.href='./Carousel_post.php'">新增</button>
				<form name='delete_homepage' method='post'>
				<input type='submit' value='刪除勾選投影片'>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="60%" border="1">
					<tr>
						<td width="5%"><input type='checkbox' name='delete[]' value='<?php echo "$rs[slide_id]";?>'></td>
						<td width="10%">slide id:<?php echo "$rs[slide_id]";?></td>
						<td width="85%">header:<?php echo "<a href='Carousel_detail.php?id=$rs[slide_id]'>$rs[headers]</a>";?></td>
					</tr>
				</table>
				<?php
				}
				?>
				</form>