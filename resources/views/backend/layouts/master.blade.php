<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
      @include('backend.partials.styles')
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
      @include('backend.partials.header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            @include('backend.partials.sidebar')
              {{-- Main Content --}}

              @yield('content')
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

@include('backend.partials.scripts')
    </body>
</html>
