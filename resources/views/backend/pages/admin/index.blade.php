@extends('backend.layouts.master')
@section('content')
  @php
    $admin = Auth::user();
  @endphp
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Profile
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Profile</li>
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')
      <section class="content">
          <div class="row">
              <div class="col-xs-12">
                {{-- <div class="div" style="padding:20px;">
                  <a href="{!! route('admin.advertising.create') !!}" class="btn btn-primary">Create</a>
                </div> --}}
                  <div class="box">

                      <div class="box-header">
                          <h3 class="box-title">Data Table of Profile</h3>

                      </div><!-- /.box-header -->
                      <div class="box-body ">
                          <form class="" action="index.html" method="post">
                            <div class="form-group">
                               <label for="">Name : {{$admin->name}}</label>
                            </div>
                            <div class="form-group">
                               <label for="">Email : {{$admin->email}}</label>
                            </div>
                          </form>
                          <a href="{!! route('admin.profile.change') !!}" class="btn btn-warning">Edit</a>
                      </div><!-- /.box-body -->
                  </div><!-- /.box -->
              </div>
          </div>
      </section><!-- /.content -->
  </aside><!-- /.right-side -->

@endsection
