<br>
<div class="row">
<div class="col-md-10">
<div class="box">
        <div class="box-header" class="col-md-10 col-md-offset-9">
                <a href="CompanyIntroduce_edit.php" class="btn btn-primary">
                    編輯
                </a>
                最後於<?php $rs = mysql_fetch_row($data); echo $rs[1];?>編輯
        </div>
        <div class="box-body">
                <?php echo $rs[0] ?>
        </div>
</div>
</div>
</div>