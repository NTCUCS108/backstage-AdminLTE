<br>
<div class="row">
            <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <a href='ProductInformation_edit.php'>
                        <button type="link" pull-right class="btn btn-primary">編輯</button>
                    </a>
                </div>
                <div class="box-body">
                    <form>
                            <?php
                            for($i=1;$i<=mysql_num_rows($data);$i++)
                            {
                                $rs = mysql_fetch_row($data);
                            ?>
                            <?php echo $rs[1]; ?><br>
                            <?php
                            }
                            ?>
                    </form>
                </div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="box">
                <div class="box-header">
                    <h4>標題</h4>
                </div>
                <div class="box-body">
                    <p>內容</p>
                </div>
            </div>
            </div>
</div>
               
