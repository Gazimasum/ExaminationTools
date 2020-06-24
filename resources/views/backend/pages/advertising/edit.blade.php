@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Advertising Edit
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Advertising Edit</li>
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
                        <h3 class="box-title">Advertising Edit</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{!! route('admin.advertising.update',$advertising->id) !!}"  method="post">
                      @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputAdvertising1">Provider Name</label>
                                <input type="text" name="provider_code" class="form-control" value="{{$advertising->provider_code}}" id="exampleInputAdvertising1" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAdvertising1">Tracking Code (Large Format)</label>
                                <textarea type="text" name="tracking_code_large" class="form-control"  id="exampleInputAdvertising1" placeholder="Enter the Code" >{{$advertising->tracking_code_large}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAdvertising1">Tracking Code (Tablet Format)</label>
                                <textarea type="text" name="tracking_code_medium" class="form-control"  id="exampleInputAdvertising1" placeholder="Enter the Code" >{{$advertising->tracking_code_medium}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAdvertising1">Tracking Code (Phone Format)</label>
                                <textarea type="text" name="tracking_code_small" class="form-control"  id="exampleInputAdvertising1" placeholder="Enter the Code" >{{$advertising->tracking_code_small}}</textarea>
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
