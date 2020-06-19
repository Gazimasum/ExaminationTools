@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Subject Create
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Subject Create</li>
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
                        <h3 class="box-title">Subject Create</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{!! route('admin.subject.store') !!}" method="post">
                      @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputSubject1">Subject Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputSubject1" placeholder="Enter Name" required>
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
