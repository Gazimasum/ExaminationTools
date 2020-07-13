@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            currency Edit
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
                currency Edit
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
                            currency Edit
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{!! route('admin.currency.update',$currency->id) !!}" method="post" role="form">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputcurrency1">
                                    Currency Code
                                </label>
                                <input class="form-control" id="exampleInputCurrency1" name="code" value="{{ $currency->code }}" placeholder="Enter Code" required type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCurrency1">
                                    Currency Name
                                </label>
                                <input class="form-control" id="exampleInputCurrency1" name="name" value="{{ $currency->name }}" placeholder="Enter Name"  type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCurrency1">
                                    Currency Html Entity
                                </label>
                                <input class="form-control" id="exampleInputCurrency1" name="html_entity" value="{{ $currency->html_entity }}" placeholder="Enter Html Entity"  type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPriority1">
                                   Currency Font Arial
                                </label>
                                <input class="form-control" id="exampleInputPriority1" name="font_arial" value="{{ $currency->font_arial }}" placeholder="Enter Font Arial" type="text">
                                </input>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button class="btn btn-warning" type="submit">
                                Update
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
