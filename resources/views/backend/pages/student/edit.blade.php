@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student Edit
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Student Edit</li>
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
                        <h3 class="box-title">Student Edit</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{!! route('admin.student.update',$student->id) !!}" method="post">
                      @csrf
                        <div class="box-body">

                          <div class="form-group">
                              <label for="name">{{ __('Name') }}</label>


                                  <input id="name" type="text" value="{{$student->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror

                          </div>
                          <div class="form-group ">
                              <label for="email">{{ __('E-Mail Address') }}</label>


                                  <input id="email" type="email" value="{{$student->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>


                          <div class="form-group ">
                              <label for="phone_no">{{ __('Phone') }}</label>


                                  <input id="phone_no" type="phone" value="{{$student->phone_no}}" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}"  autocomplete="phone_no">

                                  @error('phone_no')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>


                          <div class="form-group ">
                              <label for="country_id">{{ __('Country Name') }}</label>


                                  {{-- <input id="country_id" type="text" class="form-control @error('country_id') is-invalid @enderror" name="country_id" value="{{ old('country_id') }}" required autocomplete="country_id" autofocus> --}}
                                    <select class="form-control" name="country_id" id="country_id">
                                      <option value="{{$student->details->country->id}}">{{$student->details->country->name}}</option>
                                      @foreach ($country as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                      @endforeach
                                    </select>
                                  @error('country_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>

                          <div class="form-group ">
                              <label for="city">{{ __('City') }}</label>


                                  <input id="city" type="text" value="{{$student->details->city}}" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}"  autocomplete="city" autofocus>

                                  @error('city')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>

                              <div class="form-group" >
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="status" id="status1" value="1" {{$student->status==1 ? 'checked' : ''}} >
                                          Active
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="status" id="status2" value="0" {{$student->status==0 ? 'checked' : ''}}>
                                        Inactive
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="status" id="status2" value="2" {{$student->status==2 ? 'checked' : ''}}>
                                        Ban
                                      </label>
                                  </div>
                                </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div><!-- /.box -->
              </div>
              </div>
            </scction>
          </aside>

@endsection
