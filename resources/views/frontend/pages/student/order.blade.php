@extends('frontend.layouts.master')

@section('content')
  @php
    $assingment_no = App\Models\Order::where('student_id',$student->id)->count();
    $order = App\Models\DealWithStudent::where('student_id',$student->id)->get();
  @endphp
  <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">{{$student->name}} Dashboard</h1>
                            <p data-aos="fade-up" data-aos-delay="100">{{$assingment_no}} Assingment </p>
                          </div>
                          {{-- @include('frontend.partials.messages') --}}

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
               @include('frontend.partials.messages')
                <div class="container" style="margin-top:20px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row">
                      @include('frontend.pages.student.partials.sidebar')
                          <div class="col-md-9">

                          <h2 style=" margin-top:20px">Assingment Order</h2><br>
                            <div class="box-body table-responsive">
                          <table class="table table-hover" id="myTable">
                              <thead>
                            <tr>
                              <th>No</th>
                              <th> Name</th>
                              <th> Price</th>
                              <th> Status</th>
                              <th>Transection Id</th>
                              <th>Payment Date</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                        <tbody>
                          @foreach ($order as $key => $a)
                            <tr>

                              <td>{{$key+1}}</td>
                              <td>  <a href="{!! route('student.assingment.view',$a->order->assingment->slug) !!}">{{$a->order->assingment['assingment_name']}}</a></td>
                              <td>{{$a->price}}</td>

                              <td>@if ($a->is_paid==0)
                                Not Paid
                              @else
                                Paid
                              @endif</td>
                                <td>{{$a->transection_id}}</td>
                              <td>{{$a->payment_date}}</td>
                              <td>
                                @if ($a->is_paid==0)
                                  <a class="btn btn-warning" href="{!! route('student.checkout',$a->id) !!}">Checkout</a>
                                  @else
                                    <a class="btn btn-warning" href="{!! route('student.checkout.inovice',$a->id) !!}">Inovice</a>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                          </table>
                          </div>
                          </div>
                        </div>
                  </div>
                </div>
              </div>

            </div>


@endsection
