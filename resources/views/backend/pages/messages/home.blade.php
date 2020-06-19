@extends('backend.layouts.master')
@section('content')
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Writer
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Writer</li>
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')
      <section class="content">
          <div class="row">
              <div class="col-xs-12">
                  <div class="box">

                      <div class="box-header">
                          <h3 class="box-title">Data Table of Writer</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive">
                          <table id="myTable" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country & City </th>
                                    <th>Education Level</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($data as $d)
                                  <tr>
                                      <td>{{$d->name}}</td>
                                      <td>{{$d->email}}</td>
                                      <td>{{$d->phone_no}}</td>
                                      <td>{{$d->country->name}} , {{$d->city}}</td>
                                      <td>{{$d->educationlevel()}}</td>
                                      <td>{{$d->subjects}}</td>
                                      <td>  <a class="btn btn-primary" href="{!! route('admin.writer.messageview',$d->id) !!}">Message</a> </td>
                                  </tr>
                                @endforeach


                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country & City </th>
                                    <th>Education Level</th>
                                    <th>Subject</th>
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
