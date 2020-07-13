@extends('frontend.layouts.master')

@section('content')
  @php
    $country = App\Models\Country::get();
    $education_level = App\Models\EducationLevel::get();
    $subject = App\Models\Subject::get();
  @endphp
<div class="intro-section single-cover" id="home-section">
    <div class="slide-1 " data-stellar-background-ratio="0.5" style="background-image: url({!! asset('home-asset/images/img_3.jpg') !!});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 class="text-black" data-aos="fade-up" data-aos-delay="0">
                                Writer Registration
                            </h1>
                            {{--
                            <p data-aos="fade-up" data-aos-delay="100">
                                4 Lessons / 12 Week &bullet; 2,193 students &bullet;
                                <a class="text-white" href="#">
                                    6 comments
                                </a>
                            </p>
                            --}}
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
                <form action="{{ route('writer.register.submit') }}" aria-label="{{ __('Register') }}" class="form-box" method="POST">
                    @csrf
                    <center>
                        <h2 class="h2 text-black mb-6">
                            Writer Sign Up
                        </h2>
                    </center>
                    @include('frontend.partials.messages')
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="name">
                            {{ __('Name') }}
                        </label>
                        <div class="col-md-6">
                            <input autocomplete="name" autofocus="" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required="" type="text" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="email">
                            {{ __('E-Mail Address') }}
                        </label>
                        <div class="col-md-6">
                            <input autocomplete="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required="" type="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="phone_no">
                            {{ __('Phone') }}
                        </label>
                        <div class="col-md-6">
                            <input autocomplete="phone_no" class="form-control @error('phone_no') is-invalid @enderror" data-inputmask='"mask": "(999) 999-9999"' data-mask="" id="phone_no" name="phone_no" placeholder="(___) _________" required="" type="text" value="{{ old('phone_no') }}">
                                @error('phone_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="country_id">
                            {{ __('Country Name') }}
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" id="country_id" name="country_id" required="">
                                <option value="">
                                    Select Country
                                </option>
                                @foreach ($country as $c)
                                <option value="{{ $c->id }}">
                                    {{ $c->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="city">
                            {{ __('City') }}
                        </label>
                        <div class="col-md-6">
                            <input autocomplete="city" autofocus="" class="form-control @error('city') is-invalid @enderror" id="city" name="city" type="text" value="{{ old('city') }}">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="education_level">
                            {{ __('Education Level') }}
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" id="education_level" name="education_level" required="">
                                <option value="">
                                    Select Education Level
                                </option>
                                @foreach ($education_level as $e)
                                <option value="{{ $e->id }}">
                                    {{ $e->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('education_level')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="subjects">
                            {{ __('Subjects') }}
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" id="framework" multiple="" name="subjects[]" searchable="Search here..">
                                @foreach ($subject as $s)
                                <option style="color: #0072CE" value="{{$s->name}}">
                                    {{$s->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('subjects')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="password">
                            {{ __('Password') }}
                        </label>
                        <div class="col-md-6">
                            <input autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required="" type="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="password-confirm">
                            {{ __('Confirm Password') }}
                        </label>
                        <div class="col-md-6">
                            <input autocomplete="new-password" class="form-control" id="password-confirm" name="password_confirmation" required="" type="password">
                            </input>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button class="btn" style="background-color:#0072CE;color: #fff;" type="submit">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--
--}}
<script type="text/javascript">
    $(document).ready(function() {
 $('#framework').multiselect({
    includeSelectAllOption: true,
  nonSelectedText: 'Select Subjects',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'350px',
  enableClickableOptGroups: true, 
 });
});
</script>
@endsection
