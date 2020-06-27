@extends('backend.layouts.master')
@section('content')
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Student
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Student</li>
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')
      <section class="content">
          <div class="row">
              <div class="col-xs-12">
                  <div class="box">

                      <div class="box-header">
                          <h3 class="box-title">Data Table of Student</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive">
                          <table id="myTable" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Country & City </th>
                                      <th>Email Verified</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($student as $s)
                                  <tr>
                                      <td>{{$s->name}}</td>
                                      <td>{{$s->email}}</td>
                                      <td>{{$s->phone_no}}</td>
                                      <td>{{$s->details->country->name}} , {{$s->details->city}}</td>


                                      <td>
                                        @if ($s->remember_token==null)
                                          Verified
                                          @else
                                            Not Verified
                                        @endif
                                      </td>
                                      <td>
                                      @if ($s->status==0)
                                          <a href="#statusModal{{ $s->id }}" data-toggle="modal" class="btn btn-success">Active</a>

                                        @elseif($s->status==1)

                                        <a href="#statusModal{{ $s->id }}" data-toggle="modal" class="btn btn-danger">Inactive</a>
                                      @else
                                        <a href="#statusModal{{ $s->id }}" data-toggle="modal" class="btn btn-danger">Ban</a>

                                      @endif


                                      <!-- Status Modal -->
                                      <div class="modal fade" id="statusModal{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Are you sure to Change status?</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{!! route('admin.student.status', $s->id) !!}"  method="post">
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
                                        <td>

                                          <a href="{!! route('admin.student.edit',$s->id) !!}" class="btn btn-success">Edit</a>
                                           <a href="#deleteModal{{ $s->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="{!! route('admin.student.delete', $s->id) !!}"  method="post">
                                                      {{ csrf_field() }}
                                                      <button type="submit" class="btn btn-danger">Permanent Delete</button>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country & City </th>

                                    <th>Email Verified</th>
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
<!-- ./wrapper -->

{{-- <script type="text/javascript">

$("#status").click(function(e) {
    e.preventDefault();
  var status       = $("#status").val();
  console.log(status);
});

</script> --}}
@endsection
