<br>
<section class="content">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<div class="box">
			<div class="box-header">
				<h1 align="center">新增產品</h1>
			</div>
			<div class="box-body">
			<?php
				if(!isset($check) and isset($_POST['headers']))
					echo '<p style="color:red;">尚未開始輸入</p>';
				?>
				<?php if($_GET['use_original_pic']!="true")include("upload/upload_Product_pic.php");?>
				<form method="post">
				<div class="form-group">
					產品名稱:<input class="form-control" type='text' name='headers' value="<?php if($_POST['headers'] != '') echo "$_POST[headers]"; else if(isset($rs))echo "$rs[3]";?>"><?php if(isset($check) and $_POST['headers'] == '') echo '<p style="color:red;">請輸入產品名稱</p>';?><br>
					功能&敘述:<div class="row">
                    <div class="col-md-10">
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">HTML語法文字編輯器
                                    <small>HTML editor</small>
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <form method="post" accept-charset="utf-8">
                                    <textarea id="editor1" name="editor1" rows="10" cols="80">

                                    <?php
                                    if(isset($rs))echo "$rs[4]";
                                    ?>

                                    <script type="text/javascript">
                                    var content = Document.getElementById('editor1').value;
                                    </script>
                                    </textarea>
                                </form>
                            </div>
                        </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
					
					
					
					<!--<div class="box-header" class="col-md-10 col-md-offset-9">
					<a href="Product_detail_edit.php" class="btn btn-primary">
                    編輯
					</a>
					最後於<?php //if(isset($rs)) echo $rs[8];?>編輯
					</div>-->
					<div class="box-body">
					<?php if(isset($rs)) echo $rs[4] ?>
					</div>
					<!--<input class="form-control" type='text' name='feature' value="<?php //if($_POST['feature'] != '') echo "$_POST[feature]"; else if(isset($rs))echo "$rs[feature]";?>"><br><?php //if(isset($check) and $_POST['feature'] == '') echo '<p style="color:red;">請輸入功能</p>';?>
					<input class="form-control" type='text' name='description' value="<?php //if($_POST['description'] != '') echo "$_POST[description]"; else if(isset($rs))echo "$rs[description]";?>"><br><?php //if(isset($check) and $_POST['description'] == '') echo '<p style="color:red;">請輸入敘述</p>';?>-->
					連結:<input class="form-control" type='text' name='link' value="<?php if($_POST['link'] != '') echo "$_POST[link]"; else if(isset($rs))echo "$rs[5]";?>"><br><?php if(isset($check) and $_POST['link'] == '') echo '<p style="color:red;">請輸入連結</p>';?>
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