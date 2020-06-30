<script type="text/javascript">
$(document).ready( function () {
$('#myTable').DataTable();
} );
//color picker with addon

</script>
<script type="text/javascript">
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>
<script type="text/javascript">
 function loadDoc() {


  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number_header").innerHTML = this.responseText;
     document.getElementById("noti_number_sidebar").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "{!! route('admin.chat.count') !!}", true);
   xhttp.send();

   var shttp = new XMLHttpRequest();
   shttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("s_noti_number_header").innerHTML = this.responseText;
     document.getElementById("s_noti_number_sidebar").innerHTML = this.responseText;
    }
   };
   shttp.open("GET", "{!! route('admin.student.chat.count') !!}", true);
   shttp.send();

   var whttp = new XMLHttpRequest();
   whttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("w_noti_number_header").innerHTML = this.responseText;
     document.getElementById("w_noti_number_sidebar").innerHTML = this.responseText;
    }
   };
   whttp.open("GET", "{!! route('admin.writer.chat.count') !!}", true);
   whttp.send();

 },4000);


 }
 loadDoc();
</script>
        <!-- jQuery 2.0.2 -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="{!! asset('admin-asset/js/jquery-ui-1.10.3.min.js')!!}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{!! asset('admin-asset/js/bootstrap.min.js')!!}" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{!! asset('admin-asset/js/plugins/morris/morris.min.js')!!}" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="{!! asset('admin-asset/js/plugins/sparkline/jquery.sparkline.min.js')!!}" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="{!! asset('admin-asset/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')!!}" type="text/javascript"></script>
        <script src="{!! asset('admin-asset/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')!!}" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="{!! asset('admin-asset/js/plugins/jqueryKnob/jquery.knob.js')!!}" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{!! asset('admin-asset/js/plugins/daterangepicker/daterangepicker.js')!!}" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="{!! asset('admin-asset/js/plugins/datepicker/bootstrap-datepicker.js')!!}" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{!! asset('admin-asset/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')!!}" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="{!! asset('admin-asset/js/plugins/iCheck/icheck.min.js')!!}" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="{!! asset('admin-asset/js/AdminLTE/app.js')!!}" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{!! asset('admin-asset/js/AdminLTE/dashboard.js')!!}" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{!! asset('admin-asset/js/AdminLTE/demo.js')!!}" type="text/javascript"></script>

        <script src="{!! asset('admin-asset/js/plugins/datatables/jquery.dataTables.js')!!}" type="text/javascript"></script>
        <script src="{!! asset('admin-asset/js/plugins/datatables/dataTables.bootstrap.js')!!}" type="text/javascript"></script>

        <!-- CK Editor -->
        <script src="{!! asset('admin-asset/js/plugins/ckeditor/ckeditor.js')!!}" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{!! asset('admin-asset/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')!!}" type="text/javascript"></script>

        <!-- bootstrap color picker -->
        <script src="{!! asset('admin-asset/js/plugins/colorpicker/bootstrap-colorpicker.min.js')!!}" type="text/javascript"></script>
