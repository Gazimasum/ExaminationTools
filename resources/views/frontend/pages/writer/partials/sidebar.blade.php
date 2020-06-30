@php
  $chat = App\Models\Chat::where('writer_id',Auth::id())->first();
@endphp
<div class="col-md-3">
  <div class="sidebar">
    <a class="{{Route::is('writer.dashboard')? 'active' : ''}}" href="{!! route('writer.dashboard') !!}">Dashboard</a>
    <a class="{{Route::is('writer.profile')? 'active' : ''}}" href="{!! route('writer.profile') !!}">Profile</a>
    @if (!empty($chat))
    <a class="{{Route::is('writer.message.view')? 'active' : ''}}" href="{!! route('writer.message.view') !!}">Message <span class="badge badge-primary badge-pill"><b id="noti_number_sidebar">0</b></span></a>
    @endif
  {{-- <a class="{{Route::is('writer.assingment.request.view')? 'active' : ''}}" href="{!! route('writer.assingment.request.view') !!}">Assingment Request</a> --}}
    <a class="{{Route::is('writer.order')? 'active' : ''}}" href="{!! route('writer.order') !!}">Order</a>

  </div>
</div>
