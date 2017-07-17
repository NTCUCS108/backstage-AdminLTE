<br><br>
				<h1 align="center">第<?php echo $id;?>則投影</h1><br>
				<button onclick="location.href = 'Carousel_edit.php';">回管理首頁板</button><br>
				<table align="center" width="60%" border="1">
					<tr>
						<td width="20%"><?php echo "投影片id：$rs[slide_id]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "圖片位置：";?></td>
						<td width="80%"><?php echo "$rs[img_src]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "圖片內容：";?></td>
						<td width="80%"><?php echo "<img src='$rs[img_src]' style='max-width:500px;max-height:300px;'>";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "標題：";?></td>
						<td width="80%"><?php echo "$rs[headers]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "介紹：";?></td>
						<td width="80%"><?php echo "$rs[description]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "按鈕顯示：";?></td>
						<td width="80%"><?php echo "$rs[icon]";?></td>
					</tr>
					<tr>
						<td width="20%"><?php echo "網址連結：";?></td>
						<td width="80%"><?php echo "$rs[link_src]";?></td>
					</tr>
				</table>
				<p align="center">
					<a href="Carousel_edit_mode_select.php?id=<?php echo "$rs[slide_id]"?>">編輯</a>
					<a href="Carousel_delete.php?id=<?php echo "$rs[slide_id]"?>">刪除</a>
				</p>