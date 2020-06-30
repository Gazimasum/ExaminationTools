<script src="{!! asset('home-asset/js/jquery-3.3.1.min.js')!!}"></script>
<script src="{!! asset('home-asset/js/jquery-migrate-3.0.1.min.js')!!}"></script>
<script src="{!! asset('home-asset/js/jquery-ui.js')!!}"></script>
<script src="{!! asset('home-asset/js/popper.min.js')!!}"></script>
<script src="{!! asset('home-asset/js/bootstrap.min.js')!!}"></script>
<script src="{!! asset('home-asset/js/owl.carousel.min.js')!!}"></script>
<script src="{!! asset('home-asset/js/jquery.stellar.min.js')!!}"></script>
<script src="{!! asset('home-asset/js/jquery.countdown.min.js')!!}"></script>
<script src="{!! asset('home-asset/js/bootstrap-datepicker.min.js')!!}"></script>
<script src="{!! asset('home-asset/js/jquery.easing.1.3.js')!!}"></script>
<script src="{!! asset('home-asset/js/aos.js')!!}"></script>
<script src="{!! asset('home-asset/js/jquery.fancybox.min.js')!!}"></script>
<script src="{!! asset('home-asset/js/jquery.sticky.js')!!}"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
{{-- <script src="{!! asset('admin-asset/js/plugins/datatables/jquery.dataTables.js')!!}" type="text/javascript"></script>
<script src="{!! asset('admin-asset/js/plugins/datatables/dataTables.bootstrap.js')!!}" type="text/javascript"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

<script src="{!! asset('home-asset/js/main.js')!!}"></script>
{{-- <script type="text/javascript">
$(function()
{
$(".js-example-basic-multiple-limit").select2(
{
  maximumSelectionLength: 5
});
});
</script> --}}
<script type="text/javascript">
$(document).ready( function () {
  $('#myTable').DataTable();
} );
</script>
<script type="text/javascript">
$(document).ready( function () {
  document.getElementById('scroll').scrollTop =  document.getElementById('scroll').scrollHeight
  } );
</script>
@if (Auth::guard('web')->check())
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
   xhttp.open("GET", "{!! route('student.message.count') !!}", true);
   xhttp.send();

 },5000);


 }
 loadDoc();
</script>
@else
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
     xhttp.open("GET", "{!! route('writer.message.count') !!}", true);
     xhttp.send();

   },4000);


   }
   loadDoc();
  </script>
@endif
