@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            currency
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
                currency
            </li>
        </ol>
    </section>
    <!-- Main content -->
    @include('backend.partials.messages')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="div" style="padding:20px;">
                    <a class="btn btn-primary" href="{!! route('admin.currency.create') !!}">
                        Create
                    </a>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            Data Table of currency
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>
                                        Code
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Html Antity
                                    </th>
                                    <th>
                                        Font Arial
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currency as $c)
                                <tr>
                                    <td>
                                        {{$c->code}}
                                    </td>
                                    <td>
                                        {{$c->name}}
                                    </td>
                                    <td>
                                        {{$c->html_entity}}
                                    </td>
                                    <td>
                                        {{$c->font_arial}}
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{!! route('admin.currency.edit',$c->id) !!}">
                                            Edit
                                        </a>
                                        <a class="btn btn-danger" data-toggle="modal" href="#deleteModal{{ $c->id }}">
                                            Delete
                                        </a>
                                        <!-- Delete Modal -->
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="deleteModal{{ $c->id }}" role="dialog" tabindex="-1">
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
                                                        <form action="{!! route('admin.currency.delete', $c->id) !!}" method="post">
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
                                        Code
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Html Antity
                                    </th>
                                    <th>
                                        Font Arial
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
@endsection
