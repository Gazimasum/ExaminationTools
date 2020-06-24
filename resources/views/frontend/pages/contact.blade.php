@extends('frontend.layouts.master')

@section('content')
  <style media="screen">
  .contact-section {
  padding: 1em 0;
  position: relative;
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
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">{{$page->name}}</h1>
                            {{-- <p data-aos="fade-up" data-aos-delay="100"> / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p> --}}
                          </div>
                          {{-- @include('frontend.partials.messages') --}}

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
               @include('frontend.partials.messages')




            <div class="contact-section courses-title" id="courses-section">@include('frontend.partials.advertising.top')
              <div class="container">
                <div class="row mb-5 justify-content-center">
                  <div class="col-lg-7" data-aos="fade-up" data-aos-delay="">
                    {{-- <h2 class="section-title">HOW ONLINE ASSIGNMENT WRITING SERVICE WORKS</h2> --}}
                    {!! html_entity_decode($page->content, ENT_QUOTES, 'UTF-8') !!}

                    {{-- <h3 class="section-title text-center">
                      Our Address
                  </h3>
                  <p class="section-para">Mile End Rd, Bethnal Green, London, E1 4NS, United Kingdom</p>
                    <p class="section-para">order@examinationtools.com</p>
                    <p class="section-para">info@examinationtools.com</p> --}}

                  </div>
                </div>
              </div>
            </div>
            <div class="site-section bg-light" id="contact-section">
              @include('frontend.partials.messages')
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-7">
                    <h2 class="section-title mb-3">Message Us</h2>
                    {{-- <p class="mb-5">Natus totam voluptatibus animi aspernatur ducimus quas obcaecati mollitia quibusdam temporibus culpa dolore molestias blanditiis consequuntur sunt nisi.</p> --}}

                    <form method="post" action="{!! route('contact.message') !!}" data-aos="fade">
                      @csrf
                      <div class="form-group row">
                        <div class="col-md-12">
                          <input type="text" class="form-control" placeholder="Full name" name="name" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-12">
                          <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-12">
                          <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-12">
                          <input type="number" class="form-control" placeholder="Phone" name="phone" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-12">
                          <textarea class="form-control" id="" cols="30" rows="10" placeholder="Write your message here." name="message" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-6">

                          <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Send Message">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>


@endsection
