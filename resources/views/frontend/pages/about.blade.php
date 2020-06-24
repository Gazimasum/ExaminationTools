@extends('frontend.layouts.master')

@section('content')
<style media="screen">
  .w-80{
    width: 80% !important;
  }
  .about-section {
  padding: 1em 0;
  position: relative;
}
.about-section-title {
    font-size: 2rem;
    color: #fff;
    /* margin-bottom: 0.5rem; */
    font-weight: 500;
}
</style>
@php
  $page  = App\Models\Page::where('id',2)->first();
@endphp
  <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">{{$page->title}}</h1>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               @include('frontend.partials.messages')
            <div class="about-section courses-title" id="courses-section">@include('frontend.partials.advertising.top')
              <div class="container">
                <div class="row mb-5 justify-content-center">
                  <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                    {{-- <h2 class="section-title">HOW ONLINE ASSIGNMENT WRITING SERVICE WORKS</h2> --}}
                    <h2 class="about-section-title">Our core values are what we stand for, driven by a desire to improve our Services, they are what matter most for us.</h2>
                  </div>
                </div>
              </div>
            </div>
               {!! html_entity_decode($page->content, ENT_QUOTES, 'UTF-8') !!}
               {{-- <div class="site-section">
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mb-5">
                  <div class="mb-5">
                    <h3 class="text-black">MORE ABOUT US</h3>
                    <p>examinationtools.com is a network of highly skilled virtual professionals serving clients across the world. We specialize in supporting students and institutions with their academic progress, assignment, thesis, project, and preparation for the examinations.</p>

                    <div class="row mb-4">
                      <div class="col-md-6">
                        <img src="home-asset/images/img_1.jpg" alt="Image" class="img-fluid rounded">
                      </div>
                      <div class="col-md-6">
                        <img src="home-asset/images/img_2.jpg" alt="Image" class="img-fluid rounded">
                      </div>
                    </div>
                    <p>It is our mission to solve your problems, leaving you some peace of mind. Contact us today to see how our services can benefit your unique needs.</p>
                  </div>
                </div>
                <div class="col-lg-4 pl-lg-5">
                  <div class="mb-5 text-center border rounded course-instructor">
                    <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">CEO & CO-FOUNDER</h3>
                    <div class="mb-4 text-center">
                      <img src="home-asset/images/CEO.png" alt="Image" class="w-80 rounded-circle mb-6">
                      <h3 class="h5 text-black mb-4">Bhavesh T Darji</h3>
                      <p>Hello and welcome to et. Here we play with words and numbers. I am confident you will find our site easy to use and all the support you are looking for is at your fingertips. However, if you have any questions or concerns, please do not hesitate to let us know.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

@endsection
