@extends('frontend.layouts.master')

@section('content')
  @php
    $country = App\Models\Country::get();
    $education_level = App\Models\EducationLevel::get();
  @endphp
  <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Writer Profile Update</h1>
                            {{-- <p data-aos="fade-up" data-aos-delay="100">4 Lessons / 12 Week &bullet; 2,193 writers &bullet; <a href="#" class="text-white">6 comments</a></p> --}}
                          </div>


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row">
                           @include('frontend.pages.writer.partials.sidebar')
                          <div class="col-md-9">
                            <form method="POST" action="{{ route('writer.profile.update') }}" class="form-box" aria-label="{{ __('Register') }}">
                                @csrf
                                <center>  <h3 class="h4 text-black mb-6">Profile Update</h3></center>
                                  @include('frontend.partials.messages')

                                    <div class="form-group row ">
                                      <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __(' Phone') }}</label>
                                        <div class="col-md-6">

                                          <input id="phone_no" type="number" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{$writer->phone_no}}" autocomplete="phone_no">

                                          @error('phone_no')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror

                                        </div>
                                  </div>



                                  <div class="form-froup row">
                                      <label for="relation_between" style="color:red" class="col-md-10 col-form-label text-md-center">{{ __('Please give your relative info.') }}</label>
                                  </div>

                                <div class="form-group row ">
                                    <label for="relation_between" class="col-md-4 col-form-label text-md-right">{{ __('Relation Between') }}</label>
                                    <div class="col-md-6">

                                        <input id="relation_between" type="text" class="form-control @error('relation_between') is-invalid @enderror" name="relation_between" value="{{$writer_details->relation_between}}"  autocomplete="relation_between">

                                        @error('relation_between')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                      </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Relative E-Mail Address') }}</label>
                                    <div class="col-md-6">

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="optional_email" value="{{$writer_details->optional_email}}"  autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                      </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Relative Phone') }}</label>
                                      <div class="col-md-6">

                                        <input id="phone_no" type="number" class="form-control @error('phone_no') is-invalid @enderror" name="optional_phone" value="{{$writer_details->optional_phone}}" autocomplete="phone_no">

                                        @error('phone_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                      </div>
                                </div>

                                <div class="form-group row " style="border:2px solid #41464A;padding:20px;border-radius:10px">
                                  <label for="payment_details" style="color:red" class="col-md-10 col-form-label text-md-center">{{ __('Please Give Your Payment Details to get your Paid') }}</label>

                                  <label for="payment_details" class="col-md-4 col-form-label text-md-right">{{ __(' Payment Details') }}</label>
                                    <div class="col-md-6">

                                      <textarea id="payment_details" type="text" class="form-control @error('payment_details') is-invalid @enderror" name="payment_details"  autocomplete="payment_details">{{$writer_details->payment_details}}</textarea>

                                      @error('payment_details')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror

                                    </div>
                              </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
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
