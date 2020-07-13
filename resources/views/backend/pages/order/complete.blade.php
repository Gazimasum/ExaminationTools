@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Assingment
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
                Assingment
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
                            Data Table of Assingment Complete
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>
                                        Writer
                                    </th>
                                    <th>
                                        Assingment Name
                                    </th>
                                    
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $a)
                                <tr>
                                    <td>
                                        {{$a->order->deal->writer->name}} , {{$a->order->deal->writer->email}}<br>
                                        {{$a->order->deal->writer->phone_no}}
                                    </td>
                                    <td>
                                        {{$a->order->assingment->assingment_name}}
                                    </td>
                                   
                                    <td>
                                        <a class="btn btn-success" href="{!! route('admin.order.complete.view',$a->order->id) !!}">
                                            View
                                        </a>
                                    </td>
                                    {{--
                                    <td>
                                        @if ($a->status==0)
                                        <a class="btn btn-success" data-toggle="modal" href="#statusModal{{ $a->id }}">
                                            Active
                                        </a>
                                        @else
                                        <a class="btn btn-danger" data-toggle="modal" href="#statusModal{{ $a->id }}">
                                            Inactive
                                        </a>
                                        @endif
                                        <!-- Status Modal -->
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="statusModal{{ $a->id }}" role="dialog" tabindex="-1">
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
                                                        <form action="{!! route('admin.writer.status', $a->id) !!}" method="post">
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
                                    --}}
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                        Writer
                                    </th>
                                    <th>
                                        Assingment Name
                                    </th>
                                   
                                    <th>
                                        Status
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

@endsection
