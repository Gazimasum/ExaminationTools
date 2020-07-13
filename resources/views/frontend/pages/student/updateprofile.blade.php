@extends('frontend.layouts.master')

@section('content')

{{--   <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Student Profile Update</h1>
                            
                          </div>


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div> --}}

                <div class="container" style="margin-bottom:100px;margin-top: 150px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row">
                           @include('frontend.pages.student.partials.sidebar')
                          <div class="col-md-9 align-items-center" style="padding:20px;margin-bottom: 50px">
                             <center>  <h2>Profile Update</h2></center>
                            <form method="POST" action="{{ route('student.profile.update') }}" class="form-box" aria-label="{{ __('Register') }}">
                                @csrf
                               
                                  @include('frontend.partials.messages')


                                  <div class="form-group row">
                                      <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                      <div class="col-md-6">
                                          <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$student_details->city}}"  autocomplete="city" autofocus>

                                          @error('city')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror

                                        </div>
                                  </div>

                                  <div class="form-group row ">
                                      <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __(' Phone') }}</label>
                                        <div class="col-md-6">

                                          <input id="phone_no" type="number" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{$student->phone_no}}" autocomplete="phone_no">

                                          @error('phone_no')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror

                                        </div>
                                  </div>
                                  <div class="form-froup row">
                                      <label for="relation_between" style="color:red" class="col-md-10 col-form-label text-md-center">{{ __('Update optional Email and Phone that We can Contact with You if Your email or phone are not found.Please mention what relation between the person which email or phone is used.') }}</label>
                                  </div>

                                <div class="form-group row ">
                                    <label for="relation_between" class="col-md-4 col-form-label text-md-right">{{ __('Relation Between') }}</label>
                                    <div class="col-md-6">

                                        <input id="relation_between" type="text" class="form-control @error('relation_between') is-invalid @enderror" name="relation_between" value="{{$student_details->relation_between}}"  autocomplete="relation_between">

                                        @error('relation_between')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                      </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Optional E-Mail Address') }}</label>
                                    <div class="col-md-6">

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="optional_email" value="{{$student_details->optional_email}}"  autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                      </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Optional Phone') }}</label>
                                      <div class="col-md-6">

                                        <input id="phone_no" type="number" class="form-control @error('phone_no') is-invalid @enderror" name="optional_phone_no" value="{{$student_details->optional_phone}}" autocomplete="phone_no">

                                        @error('phone_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                      </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn" style="background-color:#0072CE">
                                            {{ __('Update') }}
                                        </button>

                                </div>
                                </div>
                            </form>
                          </div>
                        </div>
                  </div>
                </div>
              </div>

            </div>


@endsection
