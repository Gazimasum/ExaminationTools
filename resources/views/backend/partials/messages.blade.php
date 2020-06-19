@if ($errors->any())
      <div class="row  justify-content-center" style="margin-top:20px;padding-left:10px">
        <div class="col-md-8">
          <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>Alert!</b>
              @foreach ($errors->all() as $error)
                {{$error}}
              @endforeach
        </div>
    </div>
  </div>
  @endif
@if (Session::has('sticky_error'))
  <div class="row  justify-content-center" style="margin-top:20px;padding-left:10px">
    <div class="col-md-8">
      <div class="alert alert-danger alert-dismissable">
          <i class="fa fa-info"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <b>Alert!</b> {{ Session::get('sticky_error') }}
      </div>
    </div>
  </div>
@endif

  @if (Session::has('success'))
    <div class="row  justify-content-center" style="margin-top:20px;padding-left:10px">
      <div class="col-md-8">
      {{-- <div class="alert alert-warning alert-dismissable">
          <i class="fa fa-warning"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <b>Alert!</b> Warning alert preview. This alert is dismissable.
      </div> --}}
      <div class="alert alert-success alert-dismissable">
          <i class="fa fa-check"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <b>Success!</b> {{ Session::get('success') }}
      </div>
    </div>
  </div>
@endif

@if (Session::has('warning'))
  <div class="row  justify-content-center" style="margin-top:20px;padding-left:10px">
    <div class="col-md-8">
    <div class="alert alert-warning alert-dismissable">
        <i class="fa fa-warning"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Info!</b> {{ Session::get('warning') }}
    </div>
    {{-- <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Alert!</b>
    </div> --}}
  </div>
</div>
@endif

{{-- @if ($errors->any())
  <div class="container">
    <div class="row justify-content-center">

        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <ul>
            @foreach ($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </ul>
        </div>

    </div>
  </div>
@endif

@if (Session::has('success'))
  <div class="container">
    <div class="row justify-content-center">

        <div class="alert alert-success mt-1">
          <p>{{ Session::get('success') }}</p>
        </div>

    </div>
  </div>
@endif

@if (Session::has('sticky_error'))
  <div class="container mt-1">
    <div class="row justify-content-center">

        <div class="alert alert-danger">
          <p>{{ Session::get('sticky_error') }}</p>
        </div>

    </div>
  </div>
@endif --}}
