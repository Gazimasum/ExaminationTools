@extends('frontend.layouts.master')

@section('content')

<div class="intro-section" id="home-section" >

  <div class="slide-1" style="background-image: url('home-asset/images/img_4.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
              <h1 class="text-black"  >Student Portal</h1>
              <p class="mb-4 text-black" >Choose Student Portal If you are a student and if you want to done your assingment by our virtual assistent.</p>
              <p ><a href="{!! route('student.registrationForm') !!}" class="btn py-3 px-5 btn-pill" style="background-color:#0072CE;color: #fff;">Register Now</a></p>

            </div>

            <div class="col-lg-5 ml-auto" >

                      <form method="POST" action="{{ route('login') }}" class="form-box" aria-label="{{ __('Login') }}">
                          @csrf
                            <h3 class="h4 text-black mb-4">Student Sign In</h3>
                          @include('backend.partials.messages')
                    <div class="form-group ">
                        <label for="email" >{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    <div class="form-group ">
                        <label for="password" >{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    <div class="form-group ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group  mb-0">
                        <button type="submit" class="btn" style="background-color:#0072CE;color:#fff;">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn" style="color: #0072CE;" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
