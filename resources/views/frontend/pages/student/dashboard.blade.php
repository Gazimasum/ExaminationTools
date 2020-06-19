@extends('frontend.layouts.master')

@section('content')
  <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Student Dashboard</h1>
                            <p data-aos="fade-up" data-aos-delay="100">4 Assingment / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p>
                          </div>
                          @include('frontend.partials.messages')

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
                <div class="container" style="margin-top:20px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row">
                      @include('frontend.pages.student.partials.sidebar')
                          <div class="col-md-9">
                          <h2>  {{$student->name}}</h2>
                          <h2>  {{$student->name}}</h2>
                          <h2>  {{$student->name}}</h2>
                          <h2>  {{$student->name}}</h2>
                          <h2>  {{$student->name}}</h2>
                          <h2>  {{$student->name}}</h2>
                          <h2>  {{$student->name}}</h2>
                          <h2>  {{$student->name}}</h2>
                          <h2>  {{$student->name}}</h2>
                          </div>
                        </div>
                  </div>
                </div>
              </div>

            </div>


@endsection
