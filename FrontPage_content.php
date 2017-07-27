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

                <a href="Slide.php">
                    <button type="link" pull-right class="btn btn-primary">投影片編輯</button>
                </a>
                <?php
                    $slide_edit_time = mysql_query("select * from slide order by recent_edit_time desc limit 0,1");
                    $s_rs = mysql_fetch_assoc($slide_edit_time);
                ?>
                <br>
                最後於<?php echo $s_rs['recent_edit_time'];?>編輯
                <br><br>
                <a href="Circle.php">
                    <button type="link" pull-right class="btn btn-primary">圈圈編輯</button>
                </a>
                <?php
                    $circle_edit_time = mysql_query("select * from circle order by recent_edit_time desc limit 0,1");
                    $c_rs = mysql_fetch_assoc($circle_edit_time);
                ?>
                <br>
                最後於<?php echo $c_rs['recent_edit_time'];?>編輯
                <br><br>
                <a href="Featurette.php">
                    <button type="link" pull-right class="btn btn-primary">列列編輯</button>
                </a>
                <?php
                    $row_edit_time = mysql_query("select * from featurette order by recent_edit_time desc limit 0,1");
                    $r_rs = mysql_fetch_assoc($row_edit_time);
                ?>
                <br>
                最後於<?php echo $r_rs['recent_edit_time'];?>編輯
        </div>
</div>
</div>
<div class="col-md-7">
<div class="box">
<?php
    $editor_homepage = mysql_query("select * from homepage");
    $e_rs = mysql_fetch_assoc($editor_homepage);
?>
        <div class="box-header">

                    <a href="FrontPage_edit.php">
                        <button type="link" pull-right class="btn btn-primary">編輯</button>
                    </a>
                    最後於<?php echo $e_rs['recent_edit_time'];?>編輯
        </div>
        <div class="box-body">
            <?php

                echo "$e_rs[content]";
            ?>
        </div>
</div>
</div>
</div>
