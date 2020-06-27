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
              <li class="active">Assingment View</li>
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')


          {{-- <div class="pad margin no-print">
              <div class="alert alert-info" style="margin-bottom: 0!important;">
                  <i class="fa fa-info"></i>
                  <b>Note:</b> This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
              </div>
          </div> --}}

          <!-- Main content -->
          <section class="content invoice">
              <!-- title row -->
              <div class="row">
                  <div class="col-xs-12">
                      <h2 class="page-header">
                          <i class="fa fa-file-o"></i> {{$assingment->assingment_name}}
                          <small class="pull-right">Date: {{$assingment->created_at}}</small>
                      </h2>
                  </div><!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                      Student Info
                      <address>
                          <strong>{{$assingment->user->name}}</strong><br>
                        {{$assingment->user->details->country['name']}}<br>
                          {{$assingment->user->details->city}}<br>
                          Phone: {{$assingment->user->phone_no}}<br/>
                          Email: {{$assingment->user->email}}
                      </address>
                  </div><!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                      {{-- To
                      <address>
                          <strong>John Doe</strong><br>
                          795 Folsom Ave, Suite 600<br>
                          San Francisco, CA 94107<br>
                          Phone: (555) 539-1037<br/>
                          Email: john.doe@example.com
                      </address> --}}
                  </div><!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                      <b>Invoice {{$order->order_track_id}}</b><br/>
                      <br/>
                      <b>Order ID:</b> {{$order->id}}<br/>
                      <b>Deadline Date:</b>{{$assingment->deadline_date}}<br/>
                      <b>Status:</b> @if ($order->status==1)
                        Seen
                      @elseif ($order->status==2)
                        Running
                        @else
                          Complete
                      @endif
                  </div><!-- /.col -->
              </div><!-- /.row -->

              <!-- Table row -->
              <div class="row">
                  <div class="col-xs-12 table-responsive">
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>Type</th>
                                  <th>Subject</th>
                                  <th>Education Level</th>
                                  <th>Description</th>

                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>{{$assingment->type->name}}</td>
                                  <td>{{$assingment->subject->name}}</td>
                                  <td>{{$assingment->education_level->name}}</td>
                                  <td>{{$assingment->assingment_details}}</td>

                              </tr>

                          </tbody>
                      </table>
                  </div><!-- /.col -->
              </div><!-- /.row -->

              <div class="row">
                  <!-- accepted payments column -->
                @if ($assingment->images!=null)
                  <div class="col-md-6">
                      <p class="lead">Assingment Images :</p>
                        @foreach($assingment->images as $image)
                      <img src="{!! asset('files/images/'.$image->image) !!}" alt="" /><br><br>

                    @endforeach

                  </div><!-- /.col -->
                @endif
                @if ($assingment->files!=null)
                  <div class="col-md-6">
                      <p class="lead">Assingment Files</p>
                      <div class="table-responsive">
                          <table class="table">
                              <th style="width:50%">Files:</th>
                            @foreach($assingment->files as $file)
                          {{-- <img src="{!! asset('files/images/'.$image->image) !!}" alt="Visa"/> --}}
                          <tr>

                              <td> <iframe src="{!! asset('/files/others/'.$file->file) !!}" width="auto" height="auto"></iframe> </td>
                              <td> <a href="{!! asset('/files/others/'.$file->file) !!}" class="btn btn-primary">Download/View</a> </td>
                            </tr>
                        @endforeach


                          </table>
                      </div>
                  </div><!-- /.col -->
                @endif
              </div><!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                  <div class="col-xs-12">
                      <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                      <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                      <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                  </div>
              </div>
          </section><!-- /.content -->
  </aside><!-- /.right-side -->
<!-- ./wrapper -->

@endsection
