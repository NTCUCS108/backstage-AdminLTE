<section class="content">
<div class="row">
<div class="col-md-12">
   	<div class="box">
   		<div class="box-header">
	        <p align="center">
		    <font size="6">留言類型</font>
		    </p>
		</div>
		<!-- /.box-header -->
            
            
            <div class="box-body" class="col-md-12">
            	<form name="select type" method="post" role="form" class="form">
				

				<table align="center" width="30%" border="1" class="table table-bordered">
				
				<?php
				$data = mysql_query("select * from guestcontenttype order by post_id");
				for($i=1;$i<=mysql_num_rows($data);$i++){
					$rs = mysql_fetch_assoc($data);
				?>
				
					<tr>
						<td width="10%">
							<input type="checkbox" class="checkbox" name="select[]" <?php if($rs['live'] == 1) echo "checked=checked";?> value="<?php echo "$rs[post_id]";?>">
						</td>
						<td width="90%">
							<?php echo "$rs[name]";?>
						</td>
					</tr>
				<?php
				}
				?>
				</table>
				<input type="hidden" name="checked" value="checked">
				<input type="submit" class="btn btn-primary" value="完成">
				</form>
				<form name="add" method="post" role="form" class="form">
					<input type="submit" class="btn btn-warning" value="新增"> <input type="text" name="add"><?php if($error == 1) echo "名稱重複，請重新輸入";?>
				</form>
			</div>
		</div>
	</div>
</div>
</section>			