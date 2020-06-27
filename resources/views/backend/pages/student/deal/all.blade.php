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
                                    <th>Student Name</th>
                                      <th>Atssingment Name</th>

                                      <th>Order ID</th>
                                      <th>Price</th>
                                      <th>Paid</th>
                                      <th>Transection Id</th>
                                      <th>Payment Date</th>

                                      <th>Change Action</th>

                                    <td> Paid Inovice</a> </td>

                                  </tr>
                              </thead>
                              <tbody>

                                  @foreach ($deal as $d)
                                    <tr>
                                        <td>{{$d->student->name}}</td>
                                        <td>{{$d->order->assingment['assingment_name']}}</td>
                                        <td>{{$d->order->order_track_id}}</td>
                                        <td>{{$d->price}}</td>
                                        <td>@if ($d->is_paid==1)
                                          Paid
                                          @else
                                          Not Paid
                                        @endif</td>
                                        <td>{{$d->transection_id}}</td>
                                        <td>{{$d->payment_date}}</td>
                                        <td> <a href="{!! route('admin.student.deal.action',$d->id) !!}" class="btn btn-primary">
                                          @if ($d->is_paid==1)
                                            Paid
                                            @else
                                              Not Paid
                                          @endif
                                        </a></td>
                                            <td> @if ($d->is_paid==1)
                                      <a href="{!! route('admin.student.paid.inovice',$d->id) !!}">Paid Inovice</a>
                                    @endif</td>
                                    </tr>
                                  @endforeach



                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th>Student Name</th>
                                      <th>Atssingment Name</th>

                                      <th>Order ID</th>
                                      <th>Price</th>
                                      <th>Paid</th>
                                      <th>Transection Id</th>
                                      <th>Payment Date</th>
                                      <th>Change Action</th>
                                      <th>Paid Inovice</th>
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
