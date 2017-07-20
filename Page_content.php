<br><br>
				<h1 align='center'>管理頁面板</h1><br>
				<button onclick="location.href='./Page_add.php'">新增</button>
				<form name='delete_page' method='post'>
				<input type='submit' value='刪除勾選頁面'>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="10%" border="1">
					<tr>
						<td width="15%"><input type='checkbox' name='delete[]' value='<?php echo "$rs[name]";?>'></td>
						<td width="85%"><a href='./Page_browse.php?name=<?php echo "$rs[name]";?>'><?php echo "$rs[name]";?></a></td>
					</tr>
				</table>
				<?php
				}
				?>
				</form>