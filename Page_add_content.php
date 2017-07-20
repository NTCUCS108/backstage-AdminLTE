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
								頁面名稱：<input type='text' name='name'><?php if($error == 1) echo "有重複頁面名稱，請重新輸入";?>
                                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                    <?php
                                    echo "$_POST[editor1]";
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
			