<!-- FastClick -->
        <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <!-- ******CK Editor****** -->
        <script src="bower_components/ckeditor/ckeditor.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        
        <script>
        $(function() {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
        })
        </script>
    
        <script src="http://cdn.ckeditor.com/4.7.1/standard-all/ckeditor.js"></script>

        <!-- new editor -->
<script>
        CKEDITOR.replace( 'editor2', {
            extraPlugins: 'uploadimage,image2',
            height: 300,

            // Upload images to a CKFinder connector (note that the response type is set to JSON).
            uploadUrl: 'http://ntcucsintern/backstage-AdminLTE/img/',

            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: 'http://ntcucsintern/backstage-AdminLTE/img/',
            filebrowserImageBrowseUrl: 'http://ntcucsintern/backstage-AdminLTE/img/',
            filebrowserUploadUrl: 'http://ntcucsintern/backstage-AdminLTE/img/',
            filebrowserImageUploadUrl: 'http://ntcucsintern/backstage-AdminLTE/img/',

            // The following options are not necessary and are used here for presentation purposes only.
            // They configure the Styles drop-down list and widgets to use classes.

            stylesSet: [
                { name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
                { name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
            ],

            // Load the default contents.css file plus customizations for this sample.
            contentsCss: [ CKEDITOR.basePath + 'contents.css', 'http://sdk.ckeditor.com/samples/assets/css/widgetstyles.css' ],

            // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
            // resizer (because image size is controlled by widget styles or the image takes maximum
            // 100% of the editor width).
            image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
            image2_disableResizer: true
        } );
</script>