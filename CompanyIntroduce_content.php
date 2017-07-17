<?php
                for($i=1;$i<=mysql_num_rows($data);$i++)
                {
                    $rs = mysql_fetch_row($data);
                ?>
                <?php echo $rs[0] ?>
                <?php
                }
                ?>
                <br><br>
                <a href="CompanyIntroduce_edit.php">
                    <button type="link" pull-right class="btn btn-primary">
                    編輯
                    </button>
                </a>