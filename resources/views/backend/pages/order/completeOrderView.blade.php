@extends('backend.layouts.master')
@section('content')
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Complete Order
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Complete Order View</li>
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
                          <i class="fa fa-file-o"></i> {{$c_order->order->assingment->assingment_name}}
                          <small class="pull-right">Date: {{$c_order->created_at}}</small>
                      </h2>
                  </div><!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                  
                  <div class="col-sm-4 invoice-col">

                     
                        Writer Info
                        <address>
                        <strong>Name : {{$c_order->order->writer->writer['name']}}</strong><br>
                        

                        Phone: {{$c_order->order->writer->writer['phone_no']}}<br/>
                        Email: {{$c_order->order->writer->writer['email']}}
                          </address>
                     
                     
                  </div><!-- /.col -->
                 


              </div><!-- /.row -->

            
              <div class="row">
               
             
               
                  <div class="col-md-6">
                      <p class="lead">Assingment Files</p>
                      <div class="table-responsive">
                          <table class="table">
                              <th style="width:50%">Files:</th>
                             @foreach ($c_order->files as $file)
                        
                          <tr>

                              <td> <iframe src="{!! asset('/files/others/'.$file->file) !!}" width="300px" height="300px"></iframe> <br>
                              <a href="{!! asset('/files/others/'.$file->file) !!}" class="btn btn-primary">Download/View</a>
                              <br><br>                        
                                <form action="{!! route('admin.order.complete.update',$file->id) !!}" class="" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <input id="upload_file" class="form-control" name="file" type="file" accept=".pdf,.doc,.docs,.txt">
                                                <button class="btn btn-primary form-control" name="submit" type="submit">
                                                    Change File
                                                </button>
                                           
                                        </form>
                                      </td>
                            </tr>
                        @endforeach


                          </table>
                      </div>
                  </div><!-- /.col -->
               
              </div><!-- /.row -->

          </section><!-- /.content -->
  </aside><!-- /.right-side -->
<!-- ./wrapper -->

@endsection
