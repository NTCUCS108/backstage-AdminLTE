<form name="search" method="get">
				搜尋類別：
                <button name="guestContentType" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
				--類別--<span class="fa fa-caret-down"></span>
                <ul class="dropdown-menu">
				
					<?php echo '<li value="不限"';if($search=="不限") echo ' selected';echo '>不限</li>'; ?>
					<?php echo '<li value="產品"';if($search=="產品") echo ' selected';echo '>產品</li>'; ?>
					<?php echo '<li value="實績"';if($search=="實績") echo ' selected';echo '>實績</li>'; ?>
					<?php echo '<li value="其他"';if($search=="其他") echo ' selected';echo '>其他</li>'; ?>
					<?php echo '<li value="已回覆"';if($search=="已回覆") echo ' selected';echo '>已回覆</li>'; ?>
					<?php echo '<li value="未回覆"';if($search=="未回覆") echo ' selected';echo '>未回覆</li>'; ?>
					<?php echo '<li value="已讀"';if($search=="已讀") echo ' selected';echo '>已讀</li>'; ?>
					<?php echo '<li value="未讀"';if($search=="未讀") echo ' selected';echo '>未讀</li>'; ?>
				
                </ul>
				</button>

                <br>
				排序類別：
				<select name="sortorder">
				<?php
					echo '<option value="guestTime"';if($sortorder=="guestTime") echo ' selected';echo '>時間</option>';
					echo '<option value="browse_count"';if($sortorder=="browse_count") echo ' selected';echo '>瀏覽人數</option>';
				?>
				</select><br>
				排序順序：
				<select name="sortway">
				<?php
					echo '<option value="desc"';if($sortway=="desc") echo ' selected';echo '>新or多</option>';
					echo '<option value=""';if($sortway=="") echo ' selected';echo '>舊or少</option>';
				?>
				</select><br>
				<input type="submit" value="送出">
				    </form>
 

				<form name="delete comment" method="post">
				<input type="submit" value="刪除勾選的留言">
<table align="center" width="60%" border="1">
					<tr>
						<td width="5%">
							刪除
						</td>
						<td width="5%">ID</td>
						<td width="5%">類型</td>
						<td width="60%">主旨：</td>
						<td width="10%">瀏覽人數</td>
						<td width="10%">已回覆</td>
						<td width="5%">已讀</td>
					</tr>
				</table>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="60%" border="1">
					<tr>
						<td width="5%">
							<input type="checkbox" name="delete[]" value="<?php echo $rs[guestID];?>">
						</td>
						<td width="5%"><?php echo "$rs[guestID]"?></td>
						<td width="5%"><?php echo "$rs[guestContentType]"?></td>
						<td width="60%"><?php echo "<a href='MessageBoard_detail.php?id=$rs[guestID]'>$rs[guestSubject]</a>"?></td>
						<td width="10%"><?php echo $rs[browse_count]?></td>
						<?php 
							if($rs[guestReply]!="")
								echo "<td width='10%' style='color:green;'>y</td>";
							else
								echo "<td width='10%' style='color:red;'>n</td>";
						?>
						<?php 
							if($rs[admin_read]=="1")
								echo "<td width='10%' style='color:green;'>y</td>";
							else
								echo "<td width='10%' style='color:red;'>n</td>";
						?>
					</tr>
				</table>
				<?php
				}
				?>
				</form>
				<p align="center">
				<?php
				for($i=1;$i<=$page_num;$i++)
					echo "<a href='MessageBoard.php?guestContentType=$search&sortorder=$sortorder&sortway=$sortway&page=$i'>$i </a>"//顯示頁數
				?>
				</p>