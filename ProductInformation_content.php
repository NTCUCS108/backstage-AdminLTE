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
                <br><br>
                <a href='ProductInformation_edit.php'>
                    <button type="link" pull-right class="btn btn-primary">編輯</button>
                </a>
