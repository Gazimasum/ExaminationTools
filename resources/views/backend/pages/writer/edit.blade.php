@extends('backend.layouts.master')
@section('content')
  @php
    $education_level = App\Models\EducationLevel::get();
    $country = App\Models\Country::get();
    $subject = App\Models\Subject::get();
  @endphp
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Subject Edit
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Subject Edit</li>
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
                        <h3 class="box-title">Subject Edit</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{!! route('admin.writer.update',$writer->id) !!}" method="post">
                      @csrf
                        <div class="box-body">

                          <div class="form-group">
                              <label for="name">{{ __('Name') }}</label>


                                  <input id="name" type="text" value="{{$writer->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror

                          </div>
                          <div class="form-group ">
                              <label for="email">{{ __('E-Mail Address') }}</label>


                                  <input id="email" type="email" value="{{$writer->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>


                          <div class="form-group ">
                              <label for="phone_no">{{ __('Phone') }}</label>


                                  <input id="phone_no" type="phone" value="{{$writer->phone_no}}" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}"  autocomplete="phone_no">

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
                                      <option value="{{$writer->details->country->id}}">{{$writer->details->country->name}}</option>
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


                                  <input id="city" type="text" value="{{$writer->details->city}}" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}"  autocomplete="city" autofocus>

                                  @error('city')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>


                          <div class="form-group ">
                              <label for="education_level">{{ __('Education Level') }}</label>


                                    <select class="form-control" name="education_level" id="education_level">
                                      <option value="{{$writer->details->educationlevel->id}}">{{$writer->details->educationlevel->name}}</option>


                                      @foreach ($education_level as $e)
                                        <option value="{{ $e->id }}">{{ $e->name }}</option>
                                      @endforeach
                                    </select>
                                  @error('education_level')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>


                          <div class="form-group ">
                              <label for="subjects">{{ __('Subjects') }}</label>


                                  {{-- <input id="subjects" type="text" class="form-control @error('subjects') is-invalid @enderror" name="subjects" value="{{ old('subjects') }}" required autocomplete="subjects" autofocus> --}}
                                  <textarea class="form-control" name="subjects" rows="2" cols="80" readonly>{{$writer->details->subjects}}</textarea><br>

                                      <label>Select Multiple</label>
                                      <select multiple class="form-control" name="subjects[]">
                                    {{-- <option value="{{$writer->subjects}}"></option> --}}
                                    @foreach ($subject as $s)
                                       <option value="{{$s->name}}">{{$s->name}}</option>

                                @endforeach
                                </select>
                                  @error('subjects')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
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
