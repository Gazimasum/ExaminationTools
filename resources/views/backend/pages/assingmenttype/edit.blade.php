@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Assingment Type Edit
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Assingment Type Edit</li>
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
                        <h3 class="box-title">Assingment Type Edit</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{!! route('admin.assingmenttype.store',$assingmenttype->id) !!}" method="post" >
                      @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputAssingmentType1">Assingment Type Name</label>
                                <input type="text" name="name" value="{{$assingmenttype->name}}" class="form-control" id="exampleInputAssingmentType1" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPriority1">Priority</label>
                                <input type="number" name="priority" value="{{$assingmenttype->priority}}" class="form-control" id="exampleInputPriority1" placeholder="Priority">
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
