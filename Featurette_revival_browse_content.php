<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">

				<h1 align='center'>管理列列</h1>
				<br>
			<div class="box-body">
				<form name='revival_featurette' method='post'>
				<input class="btn btn-primary" type='submit' value='復活勾選列列'>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="60%" border="1" class="table table-bordered">
					<tr>
						<td width="5%"><input calss="form-control" type='checkbox' name='revival[]' value='<?php echo "$rs[post_id]";?>'></td>
						<td width="10%">列列編號:<?php echo "$rs[post_id]";?></td>
						<td width="50%">列列標題:<?php echo "<a href='Featurette_revival_detail.php?id=$rs[post_id]'>$rs[headers]</a>";?></td>
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
