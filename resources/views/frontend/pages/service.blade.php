@extends('frontend.layouts.master')

@section('content')
  <style media="screen">
  .service-section {
  padding: 1em 0;
  position: relative;
}
.service-section-title {
    font-size: 3rem;
    color: #fff;
    /* margin-bottom: 0.5rem; */
    font-weight: 900;
}
  </style>
  @php
    $page  = App\Models\Page::where('id',1)->first();
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
               <div class="service-section courses-title" id="courses-section">@include('frontend.partials.advertising.top')
                 <div class="container">
                   <div class="row mb-5 justify-content-center">
                     <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                       <h2 class="service-section-title">AREA OF OPERATION</h2>
                     </div>
                   </div>
                 </div>
               </div>
               {{-- {{{$page->content}}} --}}
               {!! html_entity_decode($page->content, ENT_QUOTES, 'UTF-8') !!}

                {{-- <div class="container" style="margin-top:20px; font-size:22px;font-weight:bold;color:#000">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <div class="row">
                          <div class="col-md-4">
                            <ul>
                              <li>Civil</li>
                              <li>Mining</li>
                              <li>Broking</li>
                              <li>Nursing</li>
                              <li>Finance</li>
                              <li>Banking</li>
                              <li>Geology</li>
                              <li>Insurance</li>
                              <li>Chemical</li>
                              <li>Pharmacy</li>
                            </ul>
                          </div>
                          <div class="col-md-4">
                            <ul>
                              <li>Marketing</li>
                              <li>Journalism</li>
                              <li>Accounting</li>
                              <li>Mechanical</li>
                              <li>Digital Media</li>
                              <li>UX/UI Design</li>
                              <li>Biotechnology</li>
                              <li>Interior Design</li>
                              <li>Public Relations</li>
                            </ul>
                          </div>
                          <div class="col-md-4">
                            <ul>
                              <li>Geo-informatics</li>
                              <li>Interactive Media</li>
                              <li>Asset Management</li>
                              <li>Biological Sciences</li>
                              <li>Electrical-Electronics</li>
                              <li>Physics & Astronomy</li>
                              <li>Investment Management</li>
                              <li>Engineering Management</li>
                              <li>Creative & Graphic Design</li>
                              <li>Industrial & Manufacturing</li>
                            </ul>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
                <div class="container" style="margin-top:30px;font-size:22px;font-weight:bold;color:#000">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <div class="row">
                        <div class="col-md-6">
                          <ul>
                            <li>Visual Effects & Animation</li>
                            <li>Geoscience & Oceanography</li>
                            <li>Oil & Petroleum Engineering</li>
                            <li>Web designers and developers</li>
                            <li>Software engineers and designers</li>
                            <li>Medical Physics & Nanotechnology</li>
                            <li>Dev-Op & Cyber Security Professionals</li>
                          </ul>
                        </div>
                          <div class="col-md-6">
                            <ul>
                              <li>Database analysts and data administrators</li>
                              <li>Information systems analysts and consultants</li>
                              <li>Architecture (Urban & Landscape Architects)</li>
                              <li>Medicine (Specialist Physicians) and Dentistry</li>
                              <li>Education (Teachers and Education Counsellors)</li>
                              <li>Hospitality (Accommodation & Restaurant Managers)</li>
                              <li>Computer programmers and interactive media developers</li>
                            </ul>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="service-section courses-title" id="courses-section">
              <div class="container">
                <div class="row mb-5 justify-content-center">
                  <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="service-section-title">OUR SERVICES</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="container" style="margin-top:10px;font-size:18px;font-weight:bold;color:#000">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="100">
                    <div class="row">
                      <div class="col-md-4" style="padding:10px;">
                        <img src="home-asset/images/services-1.jpg" width="360px" height="300px" alt="">
                      </div>
                      <div class="col-md-4" style="padding:10px;">
                          <h3 style="font-weight:bold">ADMINISTRATIVE SUPPORT</h3>
                          <p>Do you find yourself getting stuck doing mundane tasks, day in and day out? Enter examinationtools.com Our dedicated, attentive VA’s will manage your study calendar and many other tasks that come up. Get in touch to learn more.</p>
                      </div>
                      <div class="col-md-4" style="padding:10px;">
                        <img src="home-asset/images/services-2.jpg" width="360px" height="300px"alt="">
                      </div>
                      <div class="col-md-4" style="padding:10px;"><h3 style="font-weight:bold">CUSTOMER SERVICE</h3>
                        <p>Achieving high grade and maintaining takes hard work, but our VA’s are ready to help. From researching and writing articles to help increase your marks, contact us and let us know how we can help.</p>
                      </div>
                      <div class="col-md-4" style="padding:10px;">
                        <img src="home-asset/images/services-3.jpg" width="360px" height="300px" alt="">
                      </div>
                      <div class="col-md-4" style="padding:10px;">
                        <h3 style="font-weight:bold">MARKETING</h3>
                        <p style="font-weight:inherit; ">To earn an outstanding degree takes a lot of time and effort, and our VA’s are here to help. From taking email to answering online inquiries, we’ll make sure you get the professional support and attention.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
        @endsection
