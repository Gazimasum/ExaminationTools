@extends('frontend.layouts.master')

@section('content')
  <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Student Registration</h1>
                            {{-- <p data-aos="fade-up" data-aos-delay="100">4 Lessons / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p> --}}
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
                          <form method="POST" action="{{ route('student.register') }}" class="form-box" aria-label="{{ __('Register') }}">
                              @csrf
                              <center>  <h3 class="h4 text-black mb-6">Student Sign Up</h3></center>
                                @include('frontend.partials.messages')
                              <div class="form-group row">

                                <label for="name" class="col-md-4 col-form-label text-md-right"class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                              </div>
                              </div>

                              <div class="form-group row ">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                  <div class="col-md-6">

                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                      @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror

                              </div>
                              </div>

                              <div class="form-group row ">
                                  <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                    <div class="col-md-6">

                                      <input id="phone_no" type="number" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no">

                                      @error('phone_no')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror

                              </div>
                              </div>

                              <div class="form-group row">
                                  <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country Name') }}</label>

                                      <div class="col-md-6">
                                      {{-- <input id="country_id" type="text" class="form-control @error('country_id') is-invalid @enderror" name="country_id" value="{{ old('country_id') }}" required autocomplete="country_id" autofocus> --}}
                                        <select class="form-control" name="country_id" id="country_id">
                                          <option value="">Select Country</option>
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
                              </div>
                              <div class="form-group row">
                                  <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                  <div class="col-md-6">
                                      <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                      @error('city')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror

                              </div>
                              </div>

                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                    <div class="col-md-6">

                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror

                              </div>
                              </div>

                              <div class="form-group row">
                                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                              </div>
                              </div>

                              <div class="form-group row mb-0">
                                  <div class="col-md-8 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Register') }}
                                      </button>

                              </div>
                              </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>


@endsection
