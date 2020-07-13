@extends('frontend.layouts.master')

@section('content')
<style media="screen">
    .w-80{
    width: 80% !important;
  }
  .about-section {

  background-color: #E74D3C;
  border-radius: 5px;
  position: relative;
}
.about-section-title {

    font-size: 1.2rem;
    color: #fff;

    font-weight: 500;
}
</style>
@php
  $page  = App\Models\Page::where('id',2)->first();
@endphp
<div class="intro-section single-cover" id="home-section">
    <div class="slide-1 " data-stellar-background-ratio="0.5" style="background-image: url({!! asset('home-asset/images/about.jpg') !!});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">
                                {{$page->title}}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.partials.messages')
<div class="container" style="padding:30px">
    <div class="row">
        <div class="col-md-8" style="padding:20px">
            <center>
                <h2 class="h2 text-black mb-4">
                    Bhavesh T Darji
                </h2>
                <h5 class="text-black">
                    CEO & CO-FOUNDER
                </h5>
            </center>
            <p style="font-size:22px; text-align: justify;text-justify: inter-word; color:#000">
                Hello and welcome to et. Here we play with words and numbers. I am confident you will find our site easy to use and all the support you are looking for is at your fingertips. However, if you have any questions or concerns, please do not hesitate to let us know.
            </p>
        </div>
        <div class="col-md-4" style="padding:20px">
            <img alt="Image" src="home-asset/images/CEO.png">
            </img>
        </div>
    </div>
</div>
<div class="container justify-content-center">
    <div class="col-md-12">
        <div class="about-section courses-title" id="courses-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-12 align-items-center text-center">
                        <br>
                            {{--
                            <h2 class="section-title">
                                HOW ONLINE ASSIGNMENT WRITING SERVICE WORKS
                            </h2>
                            --}}
                            <h5 class="about-section-title">
                                Our core values are what we stand for, driven by a desire to improve our Services, they are what matter most for us.
                            </h5>
                            <br>
                            </br>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {!! html_entity_decode($page->content, ENT_QUOTES, 'UTF-8') !!} --}}
<div class="container justify-content-center" style="padding-left:30px;padding-right:30px;">
    <div class="row justify-content-center">
        <div class="col-md-7 align-item-center" style="padding:20px">
            <img alt="" src="{!! asset('home-asset/images/about2.png') !!}">
            </img>
        </div>
        <div class="col-md-5 align-items-center" style="padding:20px;margin-top:30px; text-align: justify;text-justify: inter-word;">
            <h2 class="text-black">
                MORE ABOUT US
            </h2>
            <p style="font-size: 22px;color: #000">
                examinationtools.com is a network of highly skilled virtual professionals serving clients across the world. We specialize in supporting students and institutions with their academic progress, assignment, thesis, project, and preparation for the examinations.
                <br>
                    It is our mission to solve your problems, leaving you some peace of mind. Contact us today to see how our services can benefit your unique needs.
                </br>
            </p>
        </div>
    </div>
</div>
@endsection
