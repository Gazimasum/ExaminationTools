@extends('backend.layouts.master')
@section('content')
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Assingment
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Assingment</li>
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')
      <section class="content">
          <div class="row">
              <div class="col-xs-12">
                  <div class="box">

                      <div class="box-header">
                          <h3 class="box-title">Data Table of Assingment Request</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive">
                          <table id="myTable" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>Student </th>
                                      <th>Assingment Name</th>
                                      <th>Assingment Subject</th>
                                      <th>Assingment Type</th>
                                      <th>Education Level</th>

                                      <th>DeadLine Date</th>
                                      <th>Status</th>
                                      <th>Action</th>

                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($order as $a)
                                  <tr>
                                      <td>{{$a->user->name}}</td>
                                      <td>{{$a->assingment->assingment_name}}</td>
                                      <td>{{$a->assingmentSubject()}}</td>
                                      <td>{{$a->assingmentType()}}</td>
                                      <td>{{$a->assingmentLevel()}}</td>

                                      <td>{{$a->assingment->deadline_date}}</td>
                                      <td>
                                        @if ($a->status==0)
                                          <a href="#" class="btn btn-warning">Unseen</a>
                                        @elseif ($a->status==1)

                                          <a href="#" class="btn btn-warning">Seen</a>

                                      @elseif ($a->status==2)

                                          <a href="#" class="btn btn-warning">Running</a>

                                      @else
                                        <a href="#" class="btn btn-warning">Complete</a>


                                        @endif
                                      </td>
                                      <td>

                                          <a href="{!! route('admin.assingment.view',$a->assingment->id) !!}"class="btn btn-success">View</a>

                                      </td>
                                      {{-- <td>
                                      @if ($a->status==0)
                                          <a href="#statusModal{{ $a->id }}" data-toggle="modal" class="btn btn-success">Active</a>

                                          @else

                                        <a href="#statusModal{{ $a->id }}" data-toggle="modal" class="btn btn-danger">Inactive</a>

                                      @endif


                                      <!-- Status Modal -->
                                      <div class="modal fade" id="statusModal{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Are you sure to Change status?</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{!! route('admin.writer.status', $a->id) !!}"  method="post">
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

                                        </td> --}}

                                  </tr>
                                @endforeach


                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th>Student </th>
                                    <th>Assingment Name</th>
                                    <th>Assingment Subject</th>
                                    <th>Assingment Type</th>
                                    <th>Education Level</th>
                                    <th>DeadLine Date</th>
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
