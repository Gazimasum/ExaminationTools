@extends('frontend.layouts.master')

@section('content')

<div class="intro-section" id="home-section">

  <div class="slide-1" style="background-image: url('home-asset/images/hero_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
              <h1  data-aos="fade-up" data-aos-delay="100">Writer Portal</h1>
              <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Choose Writer Portal If you are a good Writer and if you want to assist our virtual assistent. </p>
              <p data-aos="fade-up" data-aos-delay="300"><a href="{!! route('writer.register') !!}" class="btn btn-primary py-3 px-5 btn-pill">Join Now</a></p>

            </div>

            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">

              <form method="POST" action="{{ route('writer.login.submit') }}" class="form-box" aria-label="{{ __('Login') }}">

                  @csrf
                    <h3 class="h4 text-black mb-4">Writer Sign In</h3>
                  @include('frontend.partials.messages')
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

                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('writer.password.request') }}">
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
