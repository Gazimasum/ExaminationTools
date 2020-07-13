@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Currency Create
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
                Currency Create
            </li>
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
                        <h3 class="box-title">
                            Currency Create
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{!! route('admin.currency.store') !!}" method="post" role="form">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputcurrency1">
                                    Currency Code
                                </label>
                                <input class="form-control" id="exampleInputCurrency1" name="code" placeholder="Enter Code" required="" type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCurrency1">
                                    Currency Name
                                </label>
                                <input class="form-control" id="exampleInputCurrency1" name="name" placeholder="Enter Name" type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCurrency1">
                                    Currency Html Antity
                                </label>
                                <input class="form-control" id="exampleInputCurrency1" name="html_entity" placeholder="Enter Html Antity" type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPriority1">
                                    Currency Font Arial
                                </label>
                                <input class="form-control" id="exampleInputPriority1" name="font_arial" placeholder="Enter Font Arial" type="text">
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
@endsection
