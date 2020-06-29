@extends('backend.layouts.master')
@section('content')
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Payment Method
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="{!! route('admin.index') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Payment Method</li>
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')
      <section class="content">
          <div class="row">
              <div class="col-xs-12">
                  <div class="box">
                    <div class="div" style="padding:20px;">
                      <a href="{!! route('admin.subject.create') !!}" class="btn btn-primary">Create</a>
                    </div>
                      <div class="box-header">
                          <h3 class="box-title">Data Table of Payment Method</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive">
                          <table id="myTable" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($payment_method as $p)
                                  <tr>
                                      <td>{{$p->name}}</td>
                                      <td>{{$p->description}}</td>
                                      <td> @if ($p->active==0)
                                          <a href="#statusModal{{ $p->id }}" data-toggle="modal" class="btn btn-success">Active</a>
                                          @else
                                              <a href="#statusModal{{ $p->id }}" data-toggle="modal" class="btn btn-danger">Inactive</a>
                                      @endif</td>

                                      <td>

                                        <a href="{!! route('admin.payment_method.edit',$p->id) !!}" class="btn btn-success">Edit</a>


                                          <!-- Status Modal -->
                                          <div class="modal fade" id="statusModal{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Are sure to change The Status?</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <form action="{!! route('admin.payment_method.status', $p->id) !!}"  method="post">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                  </form>

                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
                                    <th>Name</th>
                                    <th>Description</th>
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
