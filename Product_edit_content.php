<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">
			
				<h1 align='center'>產品資訊管理</h1>
				<br>
			<div class="box-header">
				<button class="btn btn-success pull-left" onclick="location.href='./Product_post.php'">新增產品</button>
			</div>
			<div class="box-body">	
				<form name='delete_homepage' method='post'>
				<input class="btn btn-warning" type='submit' value='刪除勾選產品'>
				<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				<table align="center" width="60%" border="1" class="table table-bordered">
					<tr>
						<td width="5%"><input calss="form-control" type='checkbox' name='delete[]' value='<?php echo "$rs[product_id]";?>'></td>
						<td width="10%">產品編號:<?php echo "$rs[product_id]";?></td>
						<td width="50%">產品名稱:<?php echo "<a href='Product_detail.php?id=$rs[product_id]'>$rs[headers]</a>";?></td>
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