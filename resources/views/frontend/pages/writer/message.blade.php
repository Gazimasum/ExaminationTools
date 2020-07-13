@extends('frontend.layouts.master')

@section('content')
{{--   <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Writer Chat</h1>
                            
                          </div>

                            @include('frontend.partials.messages')
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
                          @include('frontend.pages.writer.partials.sidebar')
                          <div class="col-md-9">
                            <h2>Chat</h2>
                              @include('frontend.partials.messages')
                            <ul  class="list-group" id="scroll" style="width: auto; height: 300px; overflow: auto">
                            @foreach ($chat as $c)
                              @if ($c->is_send_by==$writer->id)
                                  <li class="list-group-item list-group-item-success">Me : {{$c->message}}</li>
                              @else
                                  <li class="list-group-item list-group-item-primary">Admin : {{$c->message}}</li>
                              @endif
                              {{-- @if ($c->reply!=null)
                                  @if ($c->is_send_by==$writer->id)
                                    <li class="list-group-item list-group-item-success" >Admin -> {{$c->reply}}</li>
                                  @else
                                    <li class="list-group-item list-group-item-success" >Me -> {{$c->reply}}</li>
                                  @endif
                              @endif --}}


                            @endforeach
                            </ul>
                            <form class="form-box" action="{!! route('writer.message.send') !!}" method="post">
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


@endsection
