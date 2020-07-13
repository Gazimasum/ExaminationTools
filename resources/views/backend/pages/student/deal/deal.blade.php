@extends('backend.layouts.master')

@section('content')
@php
  $currency = App\Models\Currency::get();
@endphp
{{--
<link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    --}}
    <aside class="right-side">
        <section class="content-header">
            <h1>
                Deal
                <small>
                    Preview
                </small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard">
                        </i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        Forms
                    </a>
                </li>
                <li class="active">
                    Deal
                </li>
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
                            <h3 class="box-title">
                                Deal Create Wtih {{$student->name}}
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{!! route('admin.student.deal.done') !!}" method="post" role="form">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <input name="student_id" required="" type="hidden" value="{{$student->id}}">
                                        <input name="order_id" required="" type="hidden" value="{{$order->id}}">
                                        </input>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="assingment_id">
                                        Assingment
                                    </label>
                                    <select class="form-control" disabled="" id="assingment_id" name="assingment_id" required="">
                                        <option value="{{ $order->assingment->assingments_id }}">
                                            {{ $order->assingment->assingment_name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="assingment_id">
                                        Assingment Details
                                    </label>
                                    <textarea class="form-control" readonly="">
                                        {{ $order->assingment->assingment_details }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="assingment_id">
                                        Currency
                                    </label>
                                    <select class="form-control" id="Currency_id" name="currency_id" required="">
                                        @foreach ($currency as $c)
                                        <option value="{{ $c->id }}">
                                            {{$c->name }} - {{ $c->font_arial }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price" id="price">
                                        Price
                                    </label>
                                    <input class="form-control" name="price" required="" type="number">
                                    </input>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </aside>
    {{--
    <div class="col-md-6">
        <select class="form-control" id="division_id" name="division_id">
            <option value="">
                @lang('home.select_division')
            </option>
            @foreach ($divisions as $division)
            <option value="{{ $division->id }}">
                {{ $division->name }}
            </option>
            @endforeach
        </select>
    </div>
    --}}
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
    </script>
    @endsection
</link>