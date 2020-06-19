@extends('backend.layouts.master')

@section('content')
  {{-- <script>
  $(document).ready(function(){
    @foreach($data as $msg)
    $("#msg{{$msg->id}}").click(function(){
      var mId = $("#mId{{$msg->id}}").val();
      $.ajax({
        type:'get',
        data:'msgId=' + mId,
        url:'{{url('/admin/chat/updateInbox')}}',
        success:function(response){
          console.log(response);
        }
      });
    });
    @endforeach
  });
  </script> --}}
<aside class="right-side">
<section class="content-header">
              <h1>
                  Education Level Edit
                  <small>Preview</small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Forms</a></li>
                  <li class="active">Education Level Edit</li>
              </ol>
          </section>
            @include('backend.partials.messages')

            <section class="content">

      </section>
      </aside>
@endsection
