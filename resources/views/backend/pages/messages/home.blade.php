@extends('backend.layouts.master')
@section('content')
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
            @if (Route::is('admin.writer.message'))
              Writer
              @else
                Student
              @endif
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

              @if (Route::is('admin.writer.message'))
                  <li class="active">Writer</li>
                @else
                  <li class="active">Student</li>
                @endif
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')
      <section class="content">
          <div class="row">
              <div class="col-xs-12">
                  <div class="box">

                      <div class="box-header">
                        @if (Route::is('admin.writer.message'))
                              <h3 class="box-title">Data Table of Writer</h3>
                          @else
                            <h3 class="box-title">Data Table of Student</h3>
                          @endif


                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive">
                          <table id="myTable" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country & City </th>
                                     @if (Route::is('admin.writer.message'))
                                    <th>Education Level</th>
                                    <th>Subject</th>@endif
                                    <th>Message</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($data as $d)
                                  <tr>
                                      <td>
                                        @if (Route::is('admin.writer.message'))
                                          <a href="{!! route('admin.writer.view',$d->id) !!}">  {{$d->name}}</a>
                                          @else
                                            <a href="{!! route('admin.student.view',$d->id) !!}">  {{$d->name}}</a>
                                          @endif
                                        </td>
                                      <td>{{$d->email}}</td>
                                      <td>{{$d->phone_no}}</td>
                                      <td>{{$d->details->country->name}} , {{$d->details->city}}</td>
                                      @if (Route::is('admin.writer.message'))
                                        <td>{{$d->details->educationlevel->name}}</td>
                                      <td>{{$d->details->subjects}}</td>
                                      <td>  <a class="btn btn-primary" href="{!! route('admin.writer.messageview',$d->id) !!}">Message</a>
                                        @if (App\Models\Order::where('status',1)->first())
                                            <a href="{!! route('admin.writer.deal',$d->id) !!}"class="btn btn-warning">Deal</a>
                                        @endif
                                      </td>
                                      @else
                                          <td>  <a class="btn btn-primary" href="{!! route('admin.student.messageview',$d->id) !!}">Message</a> </td>
                                       @endif
                                  </tr>
                                @endforeach


                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country & City </th>
                                       @if (Route::is('admin.writer.message'))
                                    <th>Education Level</th>
                                    <th>Subject</th>@endif
                                    <th>Message</th>
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
