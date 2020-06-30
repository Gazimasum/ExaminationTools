@extends('backend.layouts.master')
@section('content')
  @php
    $education_level = App\Models\EducationLevel::get();

  @endphp
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Style Edit
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Style Edit</li>
        </ol>
    </section>
      @include('backend.partials.messages')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
          <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Style Edit</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{!! route('admin.style.update',$style->id) !!}" method="post">
                      @csrf
                        <div class="box-body">

                          <div class="form-group">
                              <label for="name">{{ __('Name') }}</label>
                                  <input id="name" type="text" readonly value="{{$style->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                          </div>
                          <div class="form-group">
                            <img src="{!! asset('home-asset/images/'.$style->background_image) !!}"  width="300px" height="300px" alt="">
                              <label for="image">{{ __('Background Image') }}</label>
                                  <input id="image" type="file" name="image" class="form-control">
                          </div>

                          <!-- Color Picker -->
                          <div class="form-group">
                              <label>Background Color picker :</label>
                              <div class="input-group my-colorpicker2">
                                  <input type="text" name="background_color" value="{{$style->background_color}}" class="form-control"/>
                                  <div class="input-group-addon">
                                      <i></i>
                                  </div>
                              </div><!-- /.input group -->
                          </div><!-- /.form group -->

                          <!-- Color Picker -->
                          <div class="form-group">
                              <label>Font Color picker :</label>
                              <div class="input-group my-colorpicker2">
                                  <input type="text" name="color" value="{{$style->color}}" class="form-control"/>
                                  <div class="input-group-addon">
                                      <i></i>
                                  </div>
                              </div><!-- /.input group -->
                          </div><!-- /.form group -->




                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div><!-- /.box -->
              </div>
              </div>
            </scction>
          </aside>

<script type="text/javascript">
  $(function() {
  $(".my-colorpicker2").colorpicker();
});
</script>
@endsection
