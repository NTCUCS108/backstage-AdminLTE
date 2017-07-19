<br>
<div class="row">
<div class="col-md-10">
<div class="box">
        <div class="box-header" class="col-md-10 col-md-offset-9">
                <a href="CompanyIntroduce_edit.php" class="btn btn-primary">
                    編輯
                </a>
        </div>
        <div class="box-body">
            <?php
                for($i=1;$i<=mysql_num_rows($data);$i++)
                {
                    $rs = mysql_fetch_row($data);
                ?>
                <?php echo $rs[0] ?>
            <?php
            }
            ?>
        </div>
</div>
</div>
</div>