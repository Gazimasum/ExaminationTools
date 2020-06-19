@extends('backend.layouts.master')

@section('content')
<?php
$users = DB::table('users')->get();


?>
{{-- <link href="{{ asset('public/css/style.css') }}" rel="stylesheet"> --}}
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
