@php
  $chat = App\Models\Chat::where('writer_id',Auth::id())->first();
@endphp
<div class="col-md-3">
  <div class="sidebar">
    <a class="{{Route::is('writer.dashboard')? 'active' : ''}}" href="{!! route('writer.dashboard') !!}">Dashboard</a>
  {{-- <a class="{{Route::is('writer.assingment.request.view')? 'active' : ''}}" href="{!! route('writer.assingment.request.view') !!}">Assingment Request</a> --}}
    <a href="#contact">Order</a>
    @if (!empty($chat))

    <a href="{!! route('writer.message.view') !!}">Message</a>

    @endif
  </div>
</div>
