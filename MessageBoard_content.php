<div class="row">
	<div class="col-md-4">
		<form name="search" method="get">
			<p><font size="4">查看留言板</font></p>
			<font size="2">搜尋類別：</font>
                <select name="guestContentType" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
				<span class="fa fa-caret-down"></span>
                <ul class="dropdown-menu">
				
					<?php echo '<option value="不限"';if($search=="不限") echo ' selected';echo '>不限</option>'; ?>
					<?php echo '<option value="產品"';if($search=="產品") echo ' selected';echo '>產品</option>'; ?>
					<?php echo '<option value="實績"';if($search=="實績") echo ' selected';echo '>實績</option>'; ?>
					<?php echo '<option value="其他"';if($search=="其他") echo ' selected';echo '>其他</option>'; ?>
					<?php echo '<option value="已回覆"';if($search=="已回覆") echo ' selected';echo '>已回覆</option>'; ?>
					<?php echo '<option value="未回覆"';if($search=="未回覆") echo ' selected';echo '>未回覆</option>'; ?>
					<?php echo '<optionvalue="已讀"';if($search=="已讀") echo ' selected';echo '>已讀</option>'; ?>
					<?php echo '<option value="未讀"';if($search=="未讀") echo ' selected';echo '>未讀</option>'; ?>
				
                </ul>
				</select>

            <br>
				<font size="2">排序類別：</font>
				<select name="sortorder" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
				<span class="fa fa-caret-down"></span>
				<ul class="dropdown-menu">
				
					<?php echo '<option value="guestTime"';if($sortorder=="guestTime") echo ' selected';echo '>時間</option>'; ?>
					<?php echo '<option value="browse_count"';if($sortorder=="browse_count") echo ' selected';echo '>瀏覽人數</option>'; ?>
				</ul>
				</select><br>
				<font size="2">排序順序：</font>
				<select name="sortway" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
				<span class="fa fa-caret-down"></span>
				<ul class="dropdown-menu">
				
					<?php echo '<option value="desc"';if($sortway=="desc") echo ' selected';echo '>新or多</option>'; ?>
					<?php echo '<option value=""';if($sortway=="") echo ' selected';echo '>舊or少</option>'; ?>
				</ul>
				</select><br>
				<input type="submit" class="btn btn-primary" value="送出">
			</form>
		</div>
	</div>

<section class="content">
<div class="row">
<div class="col-md-12">
   	<div class="box">
   		<div class="box-header">
	        <p align="center">
		    <font size="6">留言板</font>
		    </p>
		</div>
		<!-- /.box-header -->
            
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
				<li>
				<?php
				for($i=1;$i<=$page_num;$i++)
					echo "<a href='MessageBoard.php?guestContentType=$search&sortorder=$sortorder&sortway=$sortway&page=$i'>$i </a>"//顯示頁數
				?>
				</li>
				</ul>
			</div>
            <div class="box-body" class="col-md-12">
            	<form name="delete comment" method="post" role="form" class="form">
				<input type="submit" class="btn btn-warning" value="刪除勾選的留言">

				<table align="center" width="60%" border="1" class="table table-bordered">
					<tr>
						<th width="10%">刪除</th>
						<th width="10%">ID</th>
						<th width="10%">類型</th>
						<th width="60%">主旨：</th>
						<th width="10%">瀏覽人數</th>
						<th width="10%">已回覆</th>
						<th width="5%">已讀</th>
					</tr>


				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				
					<tr>
						<td width="5%">
							<input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $rs[guestID];?>">
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
				


				
				<?php
				}
				?>
				</table>
				</form>
			</div>
		</div>
	</div>
</div>
</section>			