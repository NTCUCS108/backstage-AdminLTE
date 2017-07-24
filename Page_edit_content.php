           <div class="row">
                    <div class="col-md-10">
                        <div class="box box-info">
                            <div class="box-header">
                                <h3><class="box-little">HTML語法文字編輯器
                                    <small>HTML editor </small>                   
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <form method="post">
								頁面名稱：<input type='text' name='name' value=<?php echo "$rs[name]";?>><?php if($error == 1) echo "有重複頁面名稱，請重新輸入";?>
                                父頁面：<select name="parent" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="fa fa-caret-down"></span>
                                <ul class="dropdown-menu">
                                  <option value="首頁" <?php if($rs['parent'] == "首頁") echo "selected=selected";?>>首頁</option>
                                  <option value="公司簡介" <?php if($rs['parent'] == "公司簡介") echo "selected=selected";?>>公司簡介</option>
                                  <option value="產品資訊" <?php if($rs['parent'] == "產品資訊") echo "selected=selected";?>>產品資訊</option>
                                  <option value="連絡方式" <?php if($rs['parent'] == "連絡方式") echo "selected=selected";?>>連絡方式</option>
                                  <option value="留言板" <?php if($rs['parent'] == "留言板") echo "selected=selected";?>>留言板</option>
                                  <option value="更多" <?php if($rs['parent'] == "更多") echo "selected=selected";?>>更多</option>
                                  <option value="測試" <?php if($rs['parent'] == "測試") echo "selected=selected";?>>測試</option>
                                </ul>
                                </select>
                                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                    <?php
									if(isset($_POST[editor1]))
										echo "$_POST[editor1]";
									else
									{
										$tmp=mysql_query("select * from page_data where name = '$rs[name]'");
                                        $display = mysql_fetch_assoc($tmp);
										echo "$display[content]";
									}
                                    ?>

                                    <script type="text/javascript">
                                        var content = Document.getElementById('editor1').value;
                                    </script>
                                    </textarea>

                                    <div class="row">
                                    <div class="col-md-8 col-md-offset-2">

                                    <!-- ***Store Button*** -->
                                    <div class="pull-left">
                                         <button type="submit" class="btn btn-success" class="pull-left">儲存編輯</button>
                                    </div>
                                    <div class="pull-right">    
                                        <button type="link" class="btn btn-flat" class="pull-right">取消編輯</button>
                                    </div>

                                    </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
            </div>
			