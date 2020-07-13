@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student View
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
                Student View
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
                            Student View
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="#" method="post" role="form">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">
                                    Name : {{$student->name}}
                                </label>
                            </div>
                            <div class="form-group ">
                                <label for="email">
                                    Email : {{$student->email}}
                                </label>
                            </div>
                            <div class="form-group ">
                                <label for="phone_no">
                                    Phone : {{$student->phone_no}}
                                </label>
                            </div>
                            <div class="form-group ">
                                <label for="country_id">
                                    Country : {{$student->details->country['name']}}
                                </label>
                            </div>
                            <div class="form-group ">
                                <label for="city">
                                    City : {{$student->details->city}}
                                </label>
                            </div>
                            <div class="form-group ">
                                <label for="optional_emial">
                                    Optional Email : {{$student->details->optional_email}}
                                </label>
                            </div>
                            <div class="form-group ">
                                <label for="optional_phone">
                                    Optional Phone : {{$student->details->optional_phone}}
                                </label>
                            </div>
                            <div class="form-group ">
                                <label for="city">
                                    Relation Between : {{$student->details->relation_between}}
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input id="status1" name="status" type="radio" value="1" {{$student-="">
                                            status==1 ? 'checked' : ''}} >
                                          Active
                                        </input>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input id="status2" name="status" type="radio" value="0" {{$student-="">
                                            status==0 ? 'checked' : ''}}>
                                        Inactive
                                        </input>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input id="status2" name="status" type="radio" value="2" {{$student-="">
                                            status==2 ? 'checked' : ''}}>
                                        Ban
                                        </input>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            {{--
                            <button class="btn btn-warning" type="submit">
                                Update
                            </button>
                            --}}
                            <a class="btn btn-warning" href="{!! route('admin.student.edit',$student->id) !!}">
                                Edit
                            </a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</aside>
@endsection
