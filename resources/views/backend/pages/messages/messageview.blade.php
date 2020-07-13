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
              <div class="row justify-content-center">






                      @if ($data!=null)
                        <div class="col-md-8" style="overflow:auto;max-height:500px;">
                           
                          {{--   <ul class="timeline">
                        @foreach($data as $msg)

                      <li>
                          <i class="fa fa-envelope bg-blue"></i>
                          <div class="timeline-item">
                               <div class="timeline-body"
                               style="background:#ccc; font-weight:bold;
                                border:1px solid #efefef" id="msg{{$msg->id}}">

                              
                               @if ($msg->is_send_by==Auth::id())
                                 <p style="color:#3C8DBC">Admin</p>
                                 @else
                                     @if (Route::is('admin.writer.messageview'))
                                  <p style="color:#3C8DBC">{{$msg->writer->name}}</p>
                                  @else
                                    <p style="color:#3C8DBC">{{$msg->student->name}}</p>
                                  @endif
                               @endif

                                <br>
                                {{$msg->message}}<br>
                                <p style="align:right;"><span class="time"><i class="fa fa-clock-o"></i> {{ date('d, F, Y', strtotime($msg->created_at))}}</span></p>
                              </div>
                            @if ($msg->reply!=null)
                              <div class='timeline-footer'>
                                  @if ($msg->is_send_by==Auth::id())
                                    <p style="color:#3C8DBC">Student</p>
                                    @else
                                     <p style="color:#3C8DBC">Admin</p>
                                  @endif
                                  {{$msg->reply}}<br>
                                <p>  <span class="time"><i class="fa fa-clock-o"></i> {{ date('d, F, Y', strtotime($msg->updated_at))}}</span></p>
                              </div>
                            @endif
                          </div>
                      </li>
                      

                    @endforeach
                  </ul>
 --}}


                  <div class="box box-success">
                      <div class="box-header">
                          <i class="fa fa-comments-o"></i>
                          <h3 class="box-title">Chat</h3>
                          <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                              <div class="btn-group" data-toggle="btn-toggle" >
                                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                              </div>
                          </div>
                      </div>
                      <div class="box-body chat" id="chat-box" >
                           @foreach($data as $msg)
                          <!-- chat item -->
                            @if ($msg->is_send_by==Auth::id())
                           <div class="item">
                              <img src="{{ asset('admin-asset/img/avatar3.png')}}" alt="user image" class="offline"/>
                              <p class="message">
                                  <a href="#" class="name">
                                      <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>{{ $msg->created_at->format('h:i') }}</small>
                                      Admin
                                  </a>
                                 {{$msg->message}}
                              </p>
                          </div><!-- /.item -->

                           @else
                            @if (Route::is('admin.writer.messageview'))

                          <div class="item">
                              <img src="{{ asset('admin-asset/img/avatar.png')}}" alt="user image" class="online"/>
                              <p class="message">
                                  <a href="#" class="name">
                                      <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $msg->created_at->format('h:i') }}</small>
                                      {{$msg->writer->name}}
                                  </a>
                                  {{$msg->message}}
                              </p>
                            
                          </div><!-- /.item -->
                          @else
                          <!-- chat item -->
                          <div class="item">
                              <img src="{{ asset('admin-asset/img/avatar2.png')}}" alt="user image" class="offline"/>
                              <p class="message">
                                  <a href="#" class="name">
                                      <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $msg->created_at->format('h:i') }}</small>
                                      {{$msg->student->name}}
                                  </a>
                                  {{$msg->message}}
                              </p>
                          </div><!-- /.item -->
                          <!-- chat item -->
                          @endif
                               @endif
                           @endforeach
                      </div><!-- /.chat -->
                      <div class="box-footer">
                         @if (Route::is('admin.writer.messageview'))
                            <form role="form" method="post" action="{!! route('admin.writer.message.send',$id) !!}">
                              @else
                                  <form role="form" method="post" action="{!! route('admin.student.message.send',$id) !!}">
                              @endif
                              @csrf
                          <div class="input-group">

                              <input class="form-control" name="message" placeholder="Type message..."/>
                              <div class="input-group-btn">
                                  <button class="btn btn-success"><i class="fa fa-location-arrow"></i></button>
                                   @if (Route::is('admin.writer.messageview'))
                                    @if (App\Models\Order::where('status',0)->first())
                                        <a href="{!! route('admin.writer.deal',$id) !!}"class="btn btn-warning" style="margin-right: 10px;">Deal</a>
                                    @endif
                                    @endif

                              </div>
                             
                          </div>

                        </form>
                      </div>
                  </div>

              </div><!-- /.col -->
                      @endif

                 {{--  <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">General Elements</h3>
                        </div>
                        <div class="box-body">
                          @if (Route::is('admin.writer.messageview'))
                            <form role="form" method="post" action="{!! route('admin.writer.message.send',$id) !!}">
                              @else
                                  <form role="form" method="post" action="{!! route('admin.student.message.send',$id) !!}">
                              @endif
                              @csrf
                             
                                <div class="form-group">
                                    <label>Text</label>
                                    <textarea type="text" cols="8" rows="8" class="form-control" name="message" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                  @if (Route::is('admin.writer.messageview'))
                                    @if (App\Models\Order::where('status',1)->first())
                                        <a href="{!! route('admin.writer.deal',$id) !!}"class="btn btn-warning">Deal</a>
                                    @endif
                                    @endif
                                </div>
                            </form>
                          </div>
                        </div>
                  </div> --}}
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
