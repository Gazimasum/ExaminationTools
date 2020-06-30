@php
  $chat = App\Models\Chat::where('user_id',Auth::id())->first();
@endphp
<div class="col-md-3">
  <div class="sidebar">

    <a class="{{Route::is('student.dashboard')? 'active' : ''}}" href="{!! route('student.dashboard') !!}">Dashboard</a>
    <a class="{{Route::is('student.profile')? 'active' : ''}}" href="{!! route('student.profile') !!}">Profile</a>
    @if (!empty($chat))
    <a href="{!! route('student.message.view') !!}">Message <span class="badge badge-primary badge-pill"><b id="noti_number_sidebar">0</b></span></a>
    @endif
    <a class="{{Route::is('student.assingment.request.view')? 'active' : ''}}" href="{!! route('student.assingment.request.view') !!}">Assingment Request</a>
    <a class="{{Route::is('student.order')? 'active' : ''}}" href="{!! route('student.order') !!}">Deal <span class="badge badge-primary badge-pill"><b>{{App\Models\DealWithStudent::newStdDeal()}}</b></span></a>

  </div>
</div>
