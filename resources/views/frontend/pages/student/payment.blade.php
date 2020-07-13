@extends('frontend.layouts.master')

@section('content')
@php
  $payment_method = App\Models\Payment_method::find(1)->first();
  $payment_method_paypal = App\Models\Payment_method::where('id',2)->first();
@endphp
{{--   <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Checkout</h1>
                          
                          </div>


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
 --}}
                 <div class="container" style="margin-top:120px;margin-bottom:100px;">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row">
                           @include('frontend.pages.student.partials.sidebar')
                         <div class="col-md-9 align-items-center" style="padding:20px;margin-bottom: 50px">
                            <h2>Checkout</h2>
                            @include('frontend.partials.messages')
                            <form class="form-box" action="{!! route('student.checkout.done',$order->id) !!}" method="post">
                              @csrf
                              <div class="form-group">
                                <label for="name" class="col-md-4 col-form-label">{{$payment_method->name}}</label>
                                <textarea  rows="4" readonly class="form-control" >{{$payment_method->description}}</textarea>
                              </div>
                              <div class="form-group">
                                <label for="price" class="col-md-4 col-form-label ">Price</label>
                                <input type="text" readonly name="" class="form-control" value="{{$order->price}} {{ $order->currency->font_arial }} ({{ $order->currency->code }})">
                              </div>
                              <div class="form-group">
                                <label for="transection_id" class="col-md-4 col-form-label">Transection ID</label>
                                <input type="text"  name="transection_id" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="payment_date" class="col-md-4 col-form-label">Transection Date</label>
                                <input type="date" name="payment_date" class="form-control">
                              </div>
                              <div class="form-group row mb-0">
                                  <div class="col-md-6">
                                      <button type="submit" class="btn" style="background-color:#0072CE">
                                          {{ __('Submit') }}
                                      </button>
                                  </div>
                                @if ($payment_method_paypal->active==1)
                                  <div class="col-md-6">

                                    <a href="#" class="btn btn-warning">Checkout With Paypal</a>
                                  </div>
                                @endif
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>


@endsection
