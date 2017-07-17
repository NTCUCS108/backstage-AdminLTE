<div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">HTML語法文字編輯器
                                    <small>HTML editor</small>
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <form>
                                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                           這是我試著輸入的地方
                                           也是我把資料庫的資料抓出來放的地方
                                    <script type="text/javascript">
                                    var content = Document.getElementById('editor1').value;
                                    </script>
                                    </textarea>
                                    <!-- ***Store Button*** -->
                                    <div class="pull-right">
                                        <button type="link" pull-right class="btn btn-flat">取消編輯</button>
                                    </div>
                                    <!-- ***Store Button*** -->
                                    <div class="pull-left">
                                        <button type="submit" pull-left class="btn btn-primary">儲存編輯</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->