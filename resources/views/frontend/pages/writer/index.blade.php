@extends('frontend.layouts.master')
@section('content')
  <!--================ Start Home Banner Area =================-->
    @include('frontend.partials.banner')
  <!--================ End Home Banner Area =================-->

  <style media="screen">
    #home-image{
    border-style: solid;
  border-width: 10px 10px 10px 10px;
  border-color: #ffffff;
  box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.12);
    }
  </style>


  <div class="track-section" style="background-color: #0072CE;color:#fff">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col align-items-center"><br>
            <center><h4>HOW ONLINE ASSIGNMENT WRITING SERVICE WORKS</h4></center>
          </div>
      </div>
    </div>
  </div>

  <div class="site-section courses-title" id="courses-section" style="background-color: #fff;">
    @include('frontend.partials.advertising.top')
    <div class="container">
      {{-- <div class="row mb-5 justify-content-center">
        <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title" style="font-size:29px;">HOW ONLINE ASSIGNMENT WRITING SERVICE WORKS</h2>
        </div>
      </div> --}}
      <div class="row justify-content-center" style="color:#780932">
        <div class="col-md-4" >
          <center><img src="{!! asset('home-asset/images/pdf.png')!!}" height="100px" alt="Image" >
            <h2>1st Step</h2>
            <p>Upload your assignment for a quote. </p>
          </center>
        </div>
        <div class="col-md-4">
          <center><img src="{!! asset('home-asset/images/group.png')!!}" height="100px" alt="Image" >
            <h2>2nd Step</h2>
            <p>Make payment or talk to us for options.  </p>
          </center>
        </div>
        <div class="col-md-4">
          <center><i class="flaticon-users"></i><img src="{!! asset('home-asset/images/user (3).png')!!}" height="100px" alt="Image" >
            <h2>3rd Step</h2>
            <p>Get your work by deadline.. </p>
          </center>
          </div>
      </div>
    </div>
  </div>

  <div class="track-section">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col align-items-center" style="margin-top:14px">
            <center><a href="{!! route('track.order.view') !!}" class="btn btn-warning"> <h4>TRACK YOUR ORDER</h4> </a></center>
          </div>
      </div>
    </div>
  </div>


  <div class="site-section" id="programs-section">
    <div class="container">
      <div class="row mb-4 justify-content-center">
        <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">Our Programs</h2>
          <p class="text-black">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam repellat aut neque! Doloribus sunt non aut reiciendis, vel recusandae obcaecati hic dicta repudiandae in quas quibusdam ullam, illum sed veniam!</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-5 mb-4" data-aos="fade-up" data-aos-delay="100">
          <img src="{!! asset('home-asset/images/home1.png')!!}" alt="Image" class="img-fluid" id="home-image">
        </div>
        <div class="col-lg-5 align-items-center" data-aos="fade-up" data-aos-delay="200" style="margin-top:15px;" >
          <h2 class="text-black mb-4">Tell Us What You Need</h2>
          <p class="mb-4 text-black" style="text-align: justify; text-justify: inter-word; ">
          Visit our website and provide all the details by filling up the order form. If you want customized assignment solutions, you can talk to our support team and mention your requirements.</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-5 mb-4 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
          <img src="{!! asset('home-asset/images/home2.png')!!}" alt="Image" class="img-fluid" id="home-image" >
        </div>
        <div class="col-lg-5 order-2 order-lg-1 align-items-center" data-aos="fade-up" data-aos-delay="200" style="margin-top:15px;">
          <h2 class="text-black mb-4">Pay For Assignment</h2>
          <p class="mb-4 text-black" style="text-align: justify; text-justify: inter-word; ">
            Once you submit the order form, you will receive a quote for your assignment. You can choose to pay for your order via PayPal, debit/credit cards or net banking. Following the completion of the payment, you will get an email or text that will confirm your order.</p>
      </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-5 mb-4" data-aos="fade-up" data-aos-delay="100">
          <img src="{!! asset('home-asset/images/home3.png')!!}" alt="Image" class="img-fluid" id="home-image">
        </div>
        <div class="col-lg-5 align-items-center" data-aos="fade-up" data-aos-delay="200" style="margin-top:15px;">
          <h2 class="text-black mb-4">Receive Completed Solution</h2>
          <p class="mb-4 text-black" style="text-align: justify; text-justify: inter-word; ">
        Our assignment help experts start writing the papers as soon as the payment is done. The writers work fast to complete the task within the deadline. You will receive your assignment in your registered account prior to the submission deadline.</p>
        </div>
      </div>

    </div>
  </div>



@endsection
