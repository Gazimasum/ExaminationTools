@extends('backend.layouts.master')

@section('content')
@php
  $currency = App\Models\Currency::get();
@endphp
{{-- <link href="{{ asset('public/css/style.css') }}" rel="stylesheet"> --}}
<aside class="right-side">
<section class="content-header">
    <h1>
        Deal With Writer
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
                    <h3 class="box-title">Deal With {{$writer->name}} </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{!! route('admin.writer.deal.done') !!}" method="post">
                  @csrf
                    <div class="box-body">
                        <div class="form-group">

                          <input type="hidden" name="client_id" value="{{$writer->id}}" required>
                        </div>
                        <div class="form-group">
                            <label for="assingment_id">Assingment </label>
                            <select class="form-control" name="assingment_id" id="assingment_id" required>

                              @foreach ($assingment as $a)
                                <option value="{{ $a->assingments_id }}">{{ $a->assingment->assingment_name }}</option>
                              @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="assingment_id">Currency </label>
                            <select class="form-control" name="currency_id" id="Currency_id" required >
                                @foreach ($currency as $c)
                                  <option value="{{ $c->id }}" >{{$c->name }} - {{ $c->font_arial }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="price" id="price">Price</label>
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


 <script>

    $("#Currency_id").change(function(){
        var Currency_id = $("#Currency_id").val();
        // Send an ajax request to server with this division
        console.log(Currency_id);
        $("#price").html("");
        var option = "";
        var url = "{{ url('admin/') }}";
        $.get( url+"/currency/"+Currency_id, function( data ) {

            data = JSON.parse(data);
            // data.forEach( function(element) {
              option =  data;
            // });
            console.log(data);
          // $("#price").html(data);
          document.getElementById("price").innerHTML = 'Price ('+data.code+'-'+data.font_arial+')';

        });
    })

  </script>  @endsection
