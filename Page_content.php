<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">
			<div class="box-header">
				<h1 align='center'>管理頁面板</h1><br>
			</div>
			<div class="box-body">
				<button class="btn btn-success" onclick="location.href='./Page_add.php'">新增</button>
				<form name='delete_page' method='post'>
				<input class="btn btn-warning" type='submit' value='刪除勾選頁面'>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table class="table table-bordered" align="center" width="20%" border="1">
					<tr>
						<td width="15%"><input type='checkbox' name='delete[]' value='<?php echo "$rs[name]";?>'></td>
						<td width="15%"><?php echo "$rs[parent]";?></td>
						<td width="35%"><a href='./Page_browse.php?name=<?php echo "$rs[name]";?>'><?php echo "$rs[name]";?></a></td>
						<td width="35%">最後編輯時間<?php echo "$rs[recent_edit_time]";?></td>
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