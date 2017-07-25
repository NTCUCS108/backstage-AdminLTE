<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">
			<div class="box-header">
				<h1 align="center">新增列列</h1>
			</div>
			<div class="box-body">
			<?php
				if(!isset($check) and isset($_POST['headers']))
					echo '<p style="color:red;">尚未開始輸入</p>';
				?>
				<?php if($_GET['use_original_pic']!="true")include("upload/upload_featurette_pic.php");?><?php if(isset($check) and !isset($_SESSION['img_src'])) echo '<p style="color:red;">選擇圖片後請記得點上傳圖片</p>';?>
				<form method="post">
				<div class="form-group">
					標題:<input class="form-control" type='text' name='headers' value="<?php if($_POST['headers'] != '') echo "$_POST[headers]"; else if(isset($rs))echo "$rs[headers]";?>"><?php if(isset($check) and $_POST['headers'] == '') echo '<p style="color:red;">請輸入標題</p>';?><br>
					敘述:<input class="form-control" type='text' name='description' value="<?php if($_POST['description'] != '') echo "$_POST[description]"; else if(isset($rs))echo "$rs[description]";?>"><br><?php if(isset($check) and $_POST['description'] == '') echo '<p style="color:red;">請輸入敘述</p>';?>
				</div>
				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">	
					<input class="btn btn-success form-control" type='submit' value='提交'>
					</div>
					<br>
				</div>
				</form>
			</div>
				
</div>
</div>
</div>
</section>