@extends('backend.layouts.master')
@section('content')
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Pages
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Pages View</li>
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')
      <section class="content">
          <div class="row">
              <div class="col-xs-12">

                  <div class="box">

                      <div class="box-header">
                          <h3 class="box-title">Data Table of Pages </h3>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive">
                          <table id="myTable" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Page Name</th>
                                    <th>Page Title</th>
                                    <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($pages as $key => $p)
                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->title}}</td>
                                    <td> <a href="{!! route('admin.pages.show',$p->id) !!}" class="btn btn-success">Edit</a> </td>
                                  </tr>
                                @endforeach


                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>No</th>
                                  <th>Page Name</th>
                                  <th>Page Title</th>
                                  <th>Action</th>
                                </tr>
                              </tfoot>
                          </table>
                      </div><!-- /.box-body -->
                  </div><!-- /.box -->
              </div>
          </div>
      </section><!-- /.content -->
  </aside><!-- /.right-side -->

@endsection
