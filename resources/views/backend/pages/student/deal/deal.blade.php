@extends('backend.layouts.master')

@section('content')

{{-- <link href="{{ asset('public/css/style.css') }}" rel="stylesheet"> --}}
<aside class="right-side">
<section class="content-header">
    <h1>
        Deal
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Deal</li>
    </ol>
</section>
  @include('backend.partials.messages')

  <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Deal Create Wtih {{$student->name}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{!! route('admin.student.deal.done') !!}" method="post">
                  @csrf
                    <div class="box-body">
                        <div class="form-group">
                          <input type="hidden" name="student_id" value="{{$student->id}}" required>
                          <input type="hidden" name="order_id" value="{{$order->id}}" required>
                        </div>
                        <div class="form-group">
                            <label for="assingment_id">Assingment </label>
                            <select class="form-control" name="assingment_id" id="assingment_id" required disabled>
                                <option value="{{ $order->assingment->assingments_id }}">{{ $order->assingment->assingment_name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="assingment_id">Assingment Details</label>
                            <textarea  rows="8" cols="80" readonly>{{ $order->assingment->assingment_details }}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="price">Price</label>
                        <input class="form-control" type="number" name="price" required>
                        </div>


                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div><!-- /.box -->
          </div>
          </div>
  </section>
  </aside>


  {{-- <div class="col-md-6">
    <select class="form-control" name="division_id" id="division_id">
      <option value="">@lang('home.select_division')</option>
      @foreach ($divisions as $division)
        <option value="{{ $division->id }}">{{ $division->name }}</option>
      @endforeach
    </select>
  </div> --}}
  {{-- <script>

    $("#assingment_id").change(function(){
        var assingment_id = $("#assingment_id").val();
        // Send an ajax request to server with this division
        console.log(assingment_id);
        $("#order_details").html("");
        var option = "";
        var url = "{{ url('admin/') }}";
        $.get( url+"get-order/"+assingment_id, function( data ) {

            data = JSON.parse(data);
            // data.forEach( function(element) {
              option =  data.id + data.status ;
            // });

          $("#order_details").html(option);

        });
    })

  </script> --}}
  @endsection
