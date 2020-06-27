@extends('backend.layouts.master')

@section('content')

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
                    <h3 class="box-title">Deal With  </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{!! route('admin.writer.deal.checkout.done',$deal->id) !!}" method="post">
                  @csrf
                    <div class="box-body">
                      <div class="form-group">
                        <input type="text"  value="{{$deal->price}}" readonly>
                      </div>
                        <div class="form-group">
                        <textarea  rows="4" cols="80" readonly>{{$deal->writer->details->payment_details}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="assingment_id">Transection Id </label>
                            <input class="form-control"  type="text" name="transection_id" required>
                        </div>
                        <div class="form-group">
                          <label for="price">Payment Date</label>
                        <input class="form-control" type="date" name="payment_date" required>
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

  @endsection
