<br>
<div class="row">
<div class="col-md-10">
<div class="box">
            <div class="box-header" class="col-md-10 col-md-offset-9">
				<div class="pull-left">
                <a href="Page_edit.php?name=<?php echo "$rs[name]";?>">
                    <button type="link"  class="btn btn-primary" class="pull-left">
                    編輯
                    </button>
                </a>
				</div>
				<div class="pull-right">
                <a href="Page_delete.php?name=<?php echo "$rs[name]";?>">
                    <button type="link" class="btn" class="pull-right">
                    刪除
                    </button>
                </a>
				</div>
            </div>
            <div class="box-body">    

                <?php echo "$rs[content]"; ?>
            </div>
</div>
</div>
</div>         