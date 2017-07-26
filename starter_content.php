<div class="row">
<div class="col-md-10">
<div class="box">
          <div class="box-header">
                    <a href="starter_edit.php">
                        <button type="link" pull-right class="btn btn-primary">
                        編輯
                        </button>
                    </a>
                    最後於<?php $rs = mysql_fetch_row($data); echo $rs[1];?>編輯
          </div>
          <div class="box-body">
                    <h3>
                    <?php echo $rs[0] ?>
                    </h3>
          </div>
</div>
</div>
</div>