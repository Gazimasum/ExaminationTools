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
<script type="text/javascript">
$(function()
{
$(".js-example-basic-multiple-limit").select2(
{
  maximumSelectionLength: 2
});
});
</script>
<script type="text/javascript">
$(document).ready( function () {
  $('#myTable').DataTable();
} );
</script>
