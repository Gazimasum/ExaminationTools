@extends('backend.layouts.master')
@section('content')
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Advertising
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Advertising</li>
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')
      <section class="content">
          <div class="row">
              <div class="col-xs-12">
                {{-- <div class="div" style="padding:20px;">
                  <a href="{!! route('admin.advertising.create') !!}" class="btn btn-primary">Create</a>
                </div> --}}
                  <div class="box">

                      <div class="box-header">
                          <h3 class="box-title">Data Table of Advertising</h3>

                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive">
                          <table id="myTable" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Slug</th>
                                    <th>Provider Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($advertising as $a)
                                  <tr>
                                      <td>{{$a->id}}</td>
                                      <td>{{$a->slug}}</td>
                                      <td>{{$a->provider_code}}</td>
                                      <td>@if ($a->status==0)
                                      <button type="button" class="btn btn-success" name="button">Active</button>
                                        @else
                                          <button type="button" class="btn btn-danger" name="button">Inactive</button>
                                      @endif</td>
                                      <td>
                                        <a href="{!! route('admin.advertising.edit',$a->id) !!}" class="btn btn-success">Edit</a>
                                      </td>
                                  </tr>
                                @endforeach


                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th>ID</th>
                                    <th>Slug</th>
                                    <th>Provider Name</th>
                                    <th>Status</th>
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
