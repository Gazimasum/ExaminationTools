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
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Country & City
                                    </th>
                                    <th>
                                        Email Verified
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $s)
                                <tr>
                                    <td>
                                        <a href="{!! route('admin.student.view',$s->id) !!}">
                                            {{$s->name}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$s->email}}
                                    </td>
                                    <td>
                                        {{$s->phone_no}}
                                    </td>
                                    <td>
                                        {{$s->details->country->name}}
                                    </td>
                                    <td>
                                        @if ($s->remember_token==null)
                                          Verified
                                          @else
                                            Not Verified
                                        @endif
                                    </td>
                                    <td>
                                        @if ($s->status==0)
                                        <a class="btn btn-success" data-toggle="modal" href="#statusModal{{ $s->id }}">
                                            Active
                                        </a>
                                        @elseif($s->status==1)
                                        <a class="btn btn-danger" data-toggle="modal" href="#statusModal{{ $s->id }}">
                                            Inactive
                                        </a>
                                        @else
                                        <a class="btn btn-danger" data-toggle="modal" href="#statusModal{{ $s->id }}">
                                            Ban
                                        </a>
                                        @endif
                                        <!-- Status Modal -->
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="statusModal{{ $s->id }}" role="dialog" tabindex="-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Are you sure to Change status?
                                                        </h5>
                                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                            <span aria-hidden="true">
                                                                ×
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{!! route('admin.student.status', $s->id) !!}" method="post">
                                                            {{ csrf_field() }}
                                                            <button class="btn btn-danger" type="submit">
                                                                Yes
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{!! route('admin.student.edit',$s->id) !!}">
                                            Edit
                                        </a>
                                        <a class="btn btn-danger" data-toggle="modal" href="#deleteModal{{ $s->id }}">
                                            Delete
                                        </a>
                                        <!-- Delete Modal -->
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="deleteModal{{ $s->id }}" role="dialog" tabindex="-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Are sure to delete?
                                                        </h5>
                                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                            <span aria-hidden="true">
                                                                ×
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{!! route('admin.student.delete', $s->id) !!}" method="post">
                                                            {{ csrf_field() }}
                                                            <button class="btn btn-danger" type="submit">
                                                                Permanent Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Country & City
                                    </th>
                                    <th>
                                        Email Verified
                                    </th>
                                    <th>
                                        Status
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
