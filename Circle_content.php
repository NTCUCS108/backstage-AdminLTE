<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">

				<h1 align='center'>管理圈圈</h1>
				<br>
			<div class="box-header">
				<button class="btn btn-success pull-left" onclick="location.href='./Circle_post.php'">新增圈圈</button>
				<button class="btn btn-success pull-left" onclick="location.href='./Circle_revival_browse.php'">瀏覽已刪除圈圈</button>
			</div>
			<div class="box-body">
				<form name='delete_circle' method='post'>
				<input class="btn btn-warning" type='submit' value='刪除勾選圈圈'>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="60%" border="1" class="table table-bordered">
					<tr>
						<td width="5%"><input calss="form-control" type='checkbox' name='delete[]' value='<?php echo "$rs[circle_id]";?>'></td>
						<td width="10%">圈圈編號:<?php echo "$rs[circle_id]";?></td>
						<td width="50%">圈圈標題:<?php echo "<a href='Circle_detail.php?id=$rs[circle_id]'>$rs[headers]</a>";?></td>
						<td width="35%">最後編輯時間:<?php echo "$rs[recent_edit_time]";?></td>
					</tr>
				</table>
				<?php
				}
				?>
				</form>
			</div>
</div>
</div>
</div>
</section>
