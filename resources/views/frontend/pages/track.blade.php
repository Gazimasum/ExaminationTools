@extends('frontend.layouts.master')

@section('content')
<style media="screen">
    .trackOrder-section {
  padding: 2em 0;
  position: relative;
  margin: 30px;
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
<div class="intro-section single-cover" id="home-section">
    <div class="slide-1 " data-stellar-background-ratio="0.5" style="background-color:#fff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-8">
                            <h2 class="text-black">
                                Track an Order
                            </h2>
                            <p class="text-black">
                                Enter the order number you would like to track in the form below.
                            </p>
                            @include('frontend.partials.messages')
                            <form action="{!! route('track.order') !!}" class="form-box" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input class="form-control" name="order_id" placeholder="#I123" required="" type="text" value="">
                                        </input>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn" style="background-color:#0072ce" type="submit">
                                            TRACK
                                        </button>
                                    </div>
                                </div>
                            </form>
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
@endsection
