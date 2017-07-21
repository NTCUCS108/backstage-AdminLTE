<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">
			
				<h1 align='center'>管理首頁板</h1>
				<br>
			<div class="box-header">
				<button class="btn btn-success pull-left" onclick="location.href='./Carousel_post.php'">新增投影片</button>
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
						<td width="85%">投影片標題:<?php echo "<a href='Carousel_detail.php?id=$rs[slide_id]'>$rs[headers]</a>";?></td>
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