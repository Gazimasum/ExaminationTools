@extends('frontend.layouts.master')

@section('content')
<style media="screen">
    .contact-section {
  padding: 1em 0;
  position: relative;
  background-color: #780932;
}
.about-section-title {
    font-size: 3rem;
    color: #fff;
    /* margin-bottom: 0.5rem; */
    font-weight: 900;
}
.section-para{
  color: #fff;
  font-size: 20px;
}
</style>
@php
    $page  = App\Models\Page::where('id',3)->first();
  @endphp
<div class="intro-section single-cover" id="home-section">
    <div class="slide-1 " data-stellar-background-ratio="0.5" style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">
                                {{$page->name}}
                            </h1>
                            {{--
                            <p data-aos="fade-up" data-aos-delay="100">
                                / 12 Week &bullet; 2,193 students &bullet;
                                <a class="text-white" href="#">
                                    6 comments
                                </a>
                            </p>
                            --}}
                        </div>
                        {{-- @include('frontend.partials.messages') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.partials.messages')
<div class="contact-section courses-title" id="courses-section">
    @include('frontend.partials.advertising.top')
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="">
                {{--
                <h2 class="section-title">
                    HOW ONLINE ASSIGNMENT WRITING SERVICE WORKS
                </h2>
                --}}
                    {{-- {!! html_entity_decode($page->content, ENT_QUOTES, 'UTF-8') !!} --}}
                <h3 class="section-title">
                    Our Address
                </h3>
                <p class="section-para">
                    Mile End Rd, Bethnal Green, London, E1 4NS, United Kingdom
                </p>
                <p class="section-para">
                    order@examinationtools.com
                </p>
                <p class="section-para">
                    info@examinationtools.com
                </p>
            </div>
            <div class="col-lg-4" style="margin-top:30px;">
                <img alt="" src="{!! asset('home-asset/images/payment.png') !!}">
                </img>
            </div>
        </div>
    </div>
</div>
<div class="slide-1" data-stellar-background-ratio="0.5" style="background-image: url({!! asset('home-asset/images/img_4.jpg') !!});">
    @include('frontend.partials.messages')
    <div class="container">
        <div class="row justify-content-center" style="opacity:0.9">
            <div class="col-md-7" style="margin:20px;background-color:#373F55;padding:30px;">
                <h2 class="about-section-title mb-3">
                    Message Us
                </h2>
                {{--
                <p class="mb-5">
                    Natus totam voluptatibus animi aspernatur ducimus quas obcaecati mollitia quibusdam temporibus culpa dolore molestias blanditiis consequuntur sunt nisi.
                </p>
                --}}
                <form action="{!! route('contact.message') !!}" data-aos="fade" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input class="form-control" name="name" placeholder="Full name" required="" type="text">
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input class="form-control" name="subject" placeholder="Subject" required="" type="text">
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input class="form-control" name="email" placeholder="Email" required="" type="email">
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input class="form-control" name="phone" placeholder="Phone" type="number">
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea class="form-control" cols="30" id="" name="message" placeholder="Write your message here." required="" rows="10">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input class="btn py-3 px-5 btn-block btn-pill" style="background-color:#0072CE;color:#fff;" type="submit" value="Send Message">
                            </input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
