<br>
<form name="frontpage" method="post">
<input type="radio" name="frontpage" value="carousel" <?php if($s_rs['homepage_select'] == 'carousel') echo "checked=checked";?>>選擇投影片首頁<br>
<input type="radio" name="frontpage" value="html" <?php if($s_rs['homepage_select'] == 'html') echo "checked=checked";?>>選擇編輯器首頁<br>
<input type="submit" class="btn btn-primary" value="送出">
</form>
<br>
<div class="row">
<div class="col-md-3">
<div class="box">
        <div class="box-header">
        
                <a href="Carousel_edit.php">
                    <button type="link" pull-right class="btn btn-primary">投影片編輯</button>
                </a>
                <br><br>
                <a href="Circle_edit.php">
                    <button type="link" pull-right class="btn btn-primary">圈圈編輯</button>
                </a>
                <br><br>
                <a href="Featurette_edit.php">
                    <button type="link" pull-right class="btn btn-primary">列列編輯</button>
                </a>
        </div>
</div>
</div>
<div class="col-md-7">
<div class="box">
        <div class="box-header">
        
                    <a href="FrontPage_edit.php">
                        <button type="link" pull-right class="btn btn-primary">編輯</button>
                    </a>
            
        </div>
        <div class="box-body">
            <?php
                $editor_homepage = mysql_query("select * from homepage");
                $e_rs = mysql_fetch_assoc($editor_homepage);
                echo "$e_rs[content]";
            ?>
        </div>
</div>
</div>
</div>
