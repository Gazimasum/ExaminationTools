@extends('backend.layouts.master')
@section('content')
  <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Pages Edit
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Pages Edit</li>
          </ol>
      </section>
      <!-- Main content -->
          @include('backend.partials.messages')
      <section class="content">
          <div class="row">
              <div class="col-md-12">

                <div class='box box-info'>
                    <div class='box-header'>
                        <h3 class='box-title'>CK Editor <small>Advanced and full of features</small></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class='box-body pad'>
                        <form action="{!! route('admin.pages.update',$page->id) !!}" method="post">
                          @csrf
                            <textarea id="editor1"  rows="10" cols="80" name="content">
                                {{$page->content}}
                            </textarea>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box -->

                <div class='box'>
                    <div class='box-header'>
                        <h3 class='box-title'>Bootstrap WYSIHTML5 <small>Simple and fast</small></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class='box-body pad'>
                      <form action="{!! route('admin.pages.update',$page->id) !!}" method="post">
                        @csrf
                            <textarea class="textarea" name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$page->content}}</textarea>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
              </div>
          </div>
      </section><!-- /.content -->
  </aside><!-- /.right-side -->

@endsection
