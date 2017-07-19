<div class="row">
<div class="col-md-10">
<div class="box">
          <div class="box-header">
                    <a href="starter_edit.php">
                        <button type="link" pull-right class="btn btn-primary">
                        編輯
                        </button>
                    </a>
          </div>
          <div class="box-body">
                    <h3>
                    <?php
                    for($i=1;$i<=mysql_num_rows($data);$i++)
                    {
                        $rs = mysql_fetch_row($data);
                    ?>
                    <?php echo $rs[0] ?>
                    <?php
                    }
                    ?>
                    </h3>
          </div>
</div>
</div>
</div>