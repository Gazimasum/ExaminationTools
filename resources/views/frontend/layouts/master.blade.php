<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Examinationtools</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
@include('frontend.partials.styles')
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
@php
  $headerstyle = App\Models\Style::where('name','header')->first();
  $footerstyle = App\Models\Style::where('name','footer')->first();
  $sliderstyle = App\Models\Style::where('name','slider')->first();
@endphp
<div class="site-wrap">

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

@include('frontend.partials.header')

@yield('content')

{{-- @if (Route::is('writer.register'))
@else --}}

@include('frontend.partials.loginmodel')
@include('frontend.partials.footer')
{{-- @endif --}}
  {{-- @include('frontend.partials.footer') --}}



</div> <!-- .site-wrap -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  @include('frontend.partials.scripts')
  </body>
</html>
<script type="text/javascript">
$(function()
{
$(".js-example-basic-multiple-limit").select2(
{
  maximumSelectionLength: 2
});
});
</script>
