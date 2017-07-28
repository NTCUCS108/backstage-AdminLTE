<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">

				<h1 align='center'>管理投影片板</h1>
				<br>
			<div class="box-header">
				<button class="btn btn-success pull-left" onclick="location.href='./Slide_post.php'">新增投影片</button>
				<button class="btn btn-success pull-left" onclick="location.href='./Slide_revival_browse.php'">瀏覽已刪除投影片</button>
			</div>
			<div class="box-body">
				<form name='delete_homepage' method='post'>
				<input class="btn btn-warning" type='submit' value='刪除勾選投影片'>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="60%" border="1" class="table table-bordered">
					<tr>
						<td width="5%"><input calss="form-control" type='checkbox' name='delete[]' value='<?php echo "$rs[slide_id]";?>'></td>
						<td width="10%">投影片編號:<?php echo "$rs[slide_id]";?></td>
						<td width="50%">投影片標題:<?php echo "<a href='Slide_detail.php?id=$rs[slide_id]'>$rs[headers]</a>";?></td>
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
