@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student
            <small>
                Control panel
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
            <li class="active">
                Student
            </li>
        </ol>
    </section>
    <!-- Main content -->
    @include('backend.partials.messages')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            Data Table of Student
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>
                                        Atssingment Name
                                    </th>
                                    <th>
                                        Atssingment Details
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $o)
                                <tr>
                                    <td>
                                        {{$o->assingment->assingment_name}}
                                    </td>
                                    <td>
                                        {{$o->assingment->assingment_details}}
                                    </td>
                                    <td>
                                        {{$o->student->name}}
                                    </td>
                                    <td>
                                        {{$o->student->email}}
                                    </td>
                                    {{--
                                    <td>
                                        <a class="btn btn-success" href="{!! route('admin.student.deal',$o->student->id,$o->id) !!}">
                                            Deal
                                        </a>
                                    </td>
                                    --}}
                                    <td>
                                        <a class="btn btn-success" href="{{ url('admin/student/deal/'.$o->student->id.'/'.$o->id)}}">
                                            Deal
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                        Atssingment Name
                                    </th>
                                    <th>
                                        Atssingment Details
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</aside>
<!-- /.right-side -->
<!-- ./wrapper -->
{{--
<script type="text/javascript">
    $("#status").click(function(e) {
    e.preventDefault();
  var status       = $("#status").val();
  console.log(status);
});
</script>
--}}
@endsection
