@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Writer View
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Writer View</li>
        </ol>
    </section>
      @include('backend.partials.messages')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
          <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Writer View</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="#" method="post">
                      @csrf
                        <div class="box-body">

                          <div class="form-group">
                              <label for="name"> Name : {{$writer->name}}</label>

                          </div>
                          <div class="form-group ">
                              <label for="email"> Email : {{$writer->email}}</label>
                            </div>

                          <div class="form-group ">
                              <label for="phone_no"> Phone : {{$writer->phone_no}}</label>
                            </div>
                          <div class="form-group ">
                              <label for="country_id"> Country : {{$writer->details->country['name']}}</label>
                              </div>
                              <div class="form-group ">
                                  <label for="city"> City : {{$writer->details->city}}</label>
                              </div>
                          <div class="form-group ">
                              <label for="country_id"> Education Level : {{$writer->details->educationlevel['name']}}</label>
                              </div>

                          <div class="form-group ">
                              <label for="subjects"> Subject : {{$writer->details->subjects}}</label>
                              </div>

                          <div class="form-group ">
                              <label for="optional_emial"> Optional Email : {{$writer->details->optional_email}}</label>
                              </div>
                          <div class="form-group ">
                              <label for="optional_phone"> Optional Phone : {{$writer->details->optional_phone}}</label>
                              </div>
                          <div class="form-group ">
                              <label for="city"> Relation Between : {{$writer->details->relation_between}}</label>
                              </div>

                              <div class="form-group" >
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="status" id="status1" value="1" {{$writer->status==1 ? 'checked' : ''}} >
                                          Active
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="status" id="status2" value="0" {{$writer->status==0 ? 'checked' : ''}}>
                                        Inactive
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="status" id="status2" value="2" {{$writer->status==2 ? 'checked' : ''}}>
                                        Ban
                                      </label>
                                  </div>
                                </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <a href="{!! route('admin.writer.edit',$writer->id) !!}" class="btn btn-warning"> Edit </a>
                        </div>
                    </form>
                </div><!-- /.box -->
              </div>
              </div>
            </scction>
          </aside>

@endsection
