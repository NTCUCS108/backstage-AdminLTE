                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-edit"></i>管理者後台</a></li>
                    <li class="active">後台主頁</li>
                </ol>
<h1>
                ※親愛的管理者您好，歡迎來到精德實業網站後台管理主頁※
                </h1>
                <br>
                
                <img width="500" border="200" src="img/ginder.jpg"></img>
                
                    <br>
                    <br>
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

                    <br><br>
                    <a href="starter_edit.php">
                        <button type="link" pull-right class="btn btn-primary">
                        編輯
                        </button>
                    </a>
                    <small></small>

