@extends('frontend.layouts.master')

@section('content')
  @php
    $assingment_no = App\Models\DealWithWriter::where('client_id',$writer->id)->count();
    $order = App\Models\DealWithWriter::where('client_id',$writer->id)->get();
  @endphp
{{--   <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">{{$writer->name}} Dashboard</h1>
                            <p data-aos="fade-up" data-aos-delay="100">{{$assingment_no}} Assingment </p>
                          </div>
                         

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div> --}}
               @include('frontend.partials.messages')
                <div class="container" style="margin-top:120px;margin-bottom:100px;">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row">
                      @include('frontend.pages.writer.partials.sidebar')
                          <div class="col-md-9">

                          <h2>Assingment Order</h2><br>
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

                            </tr>
                          </thead>
                        <tbody>
                          @foreach ($order as $key => $a)
                            <tr>

                              <td>{{$key+1}}</td>
                              <td>  <a href="{!! route('writer.order.view',$a->order->id) !!}" style="color: #0072ce">{{$a->order->assingment['assingment_name']}}</a></td>
                              <td>{{$a->price}} {{ $a->currency->font_arial }}</td>

                              <td>@if ($a->is_paid==0)
                                Not Paid
                              @else
                                Paid
                              @endif</td>
                                <td>{{$a->transection_id}}</td>
                              <td>{{$a->payment_date}}</td>

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
