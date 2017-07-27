<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">
			
				<h1 align='center'>管理列列板</h1>
				<br>
			<div class="box-header">
				<button class="btn btn-success pull-left" onclick="location.href='./Featurette_post.php'">新增列列</button>
			</div>
			<div class="box-body">	
				<form name='delete_homepage' method='post'>
				<input class="btn btn-warning" type='submit' value='刪除勾選列列'>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="60%" border="1" class="table table-bordered">
					<tr>
						<td width="5%"><input calss="form-control" type='checkbox' name='delete[]' value='<?php echo "$rs[featurette_id]";?>'></td>
						<td width="10%">列列編號:<?php echo "$rs[featurette_id]";?></td>
						<td width="50%">列列標題:<?php echo "<a href='Featurette_detail.php?id=$rs[featurette_id]'>$rs[headers]</a>";?></td>
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