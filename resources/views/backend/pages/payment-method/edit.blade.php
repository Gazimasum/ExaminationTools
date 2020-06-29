@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payment Method Edit
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Payment Method Edit</li>
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
                        <h3 class="box-title">Payment Method Edit</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{!! route('admin.payment_method.update',$payment_method->id) !!}" method="post">
                      @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPaymentMethod1">Payment Method Name</label>
                                <input type="text" name="name" value="{{$payment_method->name}}" class="form-control" id="exampleInputPaymentMethod1" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPriority1">Description</label>
                                <textarea type="text" name="description" value="{{$payment_method->description}}" class="form-control" id="exampleInputPriority1" rows="5" placeholder="Description">{{$payment_method->description}}</textarea>
                            </div>
                            <div class="form-group" >
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="active" id="active1" value="1" {{$payment_method->active==1 ? 'checked' : ''}} >
                                        Active
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="active" id="active2" value="0" {{$payment_method->active==0 ? 'checked' : ''}}>
                                      Inactive
                                    </label>
                                </div>
                              </div>


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

@endsection
