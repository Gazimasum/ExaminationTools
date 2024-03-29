@extends('frontend.layouts.master')

@section('content')
  {{-- <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Student Chat</h1>
                            <p data-aos="fade-up" data-aos-delay="100">4 Lessons / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p>
                          </div>


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div> --}}
                {{-- @include('frontend.partials.messages') --}}
                <div class="container" style="margin-top:120px;margin-bottom:100px;">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row">
                          {{-- sidebar --}}
                          @include('frontend.pages.student.partials.sidebar')
                         <div class="col-md-9 align-items-center" style="padding:20px;margin-bottom: 50px">  <h2>Chat</h2>
                            {{-- flash message --}}
                              @include('frontend.partials.messages')
                            <ul class="list-group" id="scroll" style="width: auto; height: 350px; overflow: auto">
                            @foreach ($chat as $c)
                              @if ($c->is_send_by==$student->id)
                                  <li class="list-group-item list-group-item-primary">Me : {{$c->message}}</li>
                              @else
                                  <li class="list-group-item list-group-item-success">Admin : {{$c->message}}</li>
                              @endif

                            @endforeach
                            </ul>

                            <form class="form-box" action="{!! route('student.message.send') !!}" method="post">
                              @csrf
                              <div class="form-group ">
                                  <label for="message" >{{ __('Text a message') }}</label>
                                      <input id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="message" autofocus>
                                      @error('message')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="form-group  mb-0">
                                      <button type="submit" class="btn" style="background-color:#0072CE">
                                          {{ __('Send') }}
                                      </button>
                                  </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>

            </div>

@endsection
