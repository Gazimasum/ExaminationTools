@extends('backend.layouts.master')

@section('content')
  <script>
  $(document).ready(function(){
  @if ($data!=null)
  @foreach($data as $msg)
  $("#msg{{$msg->id}}").click(function(){
    var mId = $("#mId{{$msg->id}}").val();
    $.ajax({
      type:'get',
      data:'msgId=' + mId,
      url:'{{url('/admin/writer/updateInbox')}}',
      success:function(response){
        console.log(response);
      }
    });
  });
  @endforeach
  @endif
  });
  </script>
<aside class="right-side">
<section class="content-header">
              <h1>
                  @if (Route::is('admin.writer.messageview'))
                  Writer Message
                  @else
                    Student Message
                  @endif
                  <small>Preview</small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Message</a></li>
                  <li class="active">Inbox</li>
              </ol>
          </section>
            @include('backend.partials.messages')

            <section class="content">
              <!-- row -->
              <div class="row">

                          <!-- timeline time label -->
                          {{-- <li class="time-label">
                              <span class="bg-red">
                                  <script>document.write(new Date().getFullYear()/new Date().getDate());</script>
                              </span>
                          </li> --}}
                          <!-- /.timeline-label -->
                          <!-- timeline item -->
                      @if ($data!=null)
                        <div class="col-md-6" style="overflow:scroll;max-height:400px;">
                            <!-- The time line -->
                            <ul class="timeline">
                        @foreach($data as $msg)
                            {{-- <input type="hidden" value="{{$msg->id}}" id="mId{{$msg->id}}"> --}}
                            @php
                            if ($msg->is_send_by==Auth::id()) {
                              $sender = Auth::user()->name;

                            }else {
                              $sender = DB::table('freelancers')->where('id',$msg->is_send_by)->first()->name ;
                            }

                            @endphp
                      <li>
                          <i class="fa fa-envelope bg-blue"></i>
                          <div class="timeline-item">

                              {{-- <h3 class="timeline-header"><a href="#" data-toggle="collapse"
                              data-target="#d{{$msg->id}}">Support Team</a> sent you and email</h3> --}}


                               <div class="timeline-body"
                               style="background:#ccc; font-weight:bold;
                                border:1px solid #efefef" id="msg{{$msg->id}}">

                               {{-- <div class="timeline-body"> --}}

                                <p style="color:#3C8DBC">{{$sender}}</p>
                                <br>
                                {{$msg->message}}<br>
                                <p style="align:right;"><span class="time"><i class="fa fa-clock-o"></i> {{ date('d, F, Y', strtotime($msg->created_at))}}</span></p>
                              </div>
                            @if ($msg->reply!=null)
                              <div class='timeline-footer'>
                                  {{-- <a class="btn btn-primary btn-xs">Read more</a>
                                  <a class="btn btn-danger btn-xs">Delete</a> --}}
                                  {{$msg->reply}}<br>
                                <p>  <span class="time"><i class="fa fa-clock-o"></i> {{ date('d, F, Y', strtotime($msg->updated_at))}}</span></p>
                              </div>
                            @endif
                          </div>
                      </li>
                      <!-- END timeline item -->

                    @endforeach
                  </ul>


              </div><!-- /.col -->
                      @endif

                  <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">General Elements</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                          @if (Route::is('admin.writer.messageview'))
                            <form role="form" method="post" action="{!! route('admin.writer.message.send',$id) !!}">
                              @else
                                  <form role="form" method="post" action="{!! route('admin.student.message.send',$id) !!}">
                              @endif
                              @csrf
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Text</label>
                                    <textarea type="text" cols="8" rows="8" class="form-control" name="message" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                    @if (App\Models\Order::where('status',1)->first())
                                        <a href="{!! route('admin.writer.deal',$id) !!}"class="btn btn-warning">Deal</a>
                                    @endif

                                </div>
                            </form>
                          </div>
                        </div>
                  </div>
              </div><!-- /.row -->
      </section>
      </aside>
@endsection




                {{-- @foreach($data as $msg)
                      <input type="hidden" value="{{$msg->id}}" id="mId{{$msg->id}}">
                       <a href="#" data-toggle="collapse"
                       data-target="#d{{$msg->id}}">

                       @if($msg->status=="1")
                        <div class="col-md-12 inboxRow"
                        style="background:#ccc; font-weight:bold;
                         border:1px solid #efefef" id="msg{{$msg->id}}">
                        @else
                        <div class="col-md-12 inboxRow">
                         @endif

                          <div class="col-md-3">
                              <input type="checkbox">
                          </div>

                          <div class="col-md-3">
                              <p>Admin</p>
                          </div>

                          <div class="col-md-3">
                              <p>{{$msg->subject}}</p>
                          </div>

                          <div class="col-md-3">
                              <p>{{$msg->updated_at }}</p>
                          </div>

                        </div>
                      </a>
                        <div class="collapse container" id="d{{$msg->id}}">

                            <div class="inner_msg">
                              <p>{{$msg->message}}<p>
                              </div>

                        </div>



                @endforeach --}}
