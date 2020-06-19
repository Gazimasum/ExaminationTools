@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Country Create
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Country Create</li>
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
                        <h3 class="box-title">Country Create</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{!! route('admin.country.store') !!}"  method="post">
                      @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputCountry1">Country Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputCountry1" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPriority1">Priority</label>
                                <input type="number" name="priority" class="form-control" id="exampleInputPriority1" placeholder="Priority">
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->
              </div>
              </div>
            </scction>
          </aside>

@endsection
