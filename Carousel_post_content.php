<br><br>
				<?php if($_GET['use_original_pic']!="true")include("upload/upload_homepage_pic.php");?>
				<form method="post">
					標題:<input type='text' name='headers' value="<?php if($_POST['headers'] != '') echo "$_POST[headers]"; else if(isset($rs))echo "$rs[headers]";?>"><br>
					敘述:<input type='text' name='description' value="<?php if($_POST['description'] != '') echo "$_POST[description]"; else if(isset($rs))echo "$rs[description]";?>"><br>
					按鈕:<input type='text' name='icon' value="<?php if($_POST['icon'] != '') echo "$_POST[icon]"; else if(isset($rs))echo "$rs[icon]";?>"><br>
					連結:<input type='text' name='link_src' value="<?php if($_POST['link_src'] != '') echo "$_POST[link_src]"; else if(isset($rs))echo "$rs[link_src]";else echo '#';?>"><br>
					<input type='submit' value='提交'><br>
				</form>
				<?php
				if(isset($check) and $check==0)
				{
					echo "上傳失敗<br>未輸入：";
					if(!isset($_SESSION['img_src']))
						echo "圖片位址 ";
					if(!isset($headers))
						echo "標題 ";
					if(!isset($description))
						echo "敘述 ";
					if(!isset($icon))
						echo "按鈕 ";
					if(!isset($link_src))
						echo "連結";
				}
				if(!isset($check) and isset($_POST['headers']))
					echo "尚未開始輸入";
				?>