<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">
				<h1 align="center">第<?php echo $id;?>個列列</h1><br>
				<div class="box-header">
				<div class="col-md-offset-4 col-md-4">	
					<p align="center">
						<button class="btn btn-primary" onclick="location.href = 'Featurette_edit.php';">回管理列列板</button><br>
					</p>
				</div>
				</div>
	
	<div class="box-body">
				<table align="center" width="60%" border="1" class="table table-bordered">
					<tr>
						<td width="20%"><?php echo "列列id：$rs[featurette_id]";?></td>
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
				</table>
				<div class="col-md-offset-3 col-md-1">
						<a href="Featurette_edit_mode_select.php?id=<?php echo "$rs[featurette_id]"?>" class="btn btn-success">編輯</a>
				</div>
				<div class="col-md-offset-4 col-md-1">
						<a href="Featurette_delete.php?id=<?php echo "$rs[featurette_id]"?>" class="btn btn-warning">刪除</a>
				</div>
				
	</div>
</div>
</div>
</div>
</section>