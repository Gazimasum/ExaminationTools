@extends('frontend.layouts.master')

@section('content')
  @php
    $assingment_no = App\Models\Order::where('client_id',$student->id)->count();
    $assingment = App\Models\Order::where('client_id',$student->id)->get();
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
                          <h2> <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">  {{$student->name}}</h2>
                            <br> <h4>  {{$student->email}}</h4>
                          <h4>  {{$student->phone_no}}</h4>
                          <h4>  {{$student->Country['name']}} , {{$student->city}}</h4>
                          <br>
                          <h2>Assingment Request</h2><br>
                            <div class="box-body table-responsive">
                          <table class="table table-hover" id="myTable">
                              <thead>
                            <tr>
                              <th>No</th>
                              <th>Assingment Name</th>
                              <th>Assingment Price</th>
                              <th>Assingment Status</th>
                              <th>Deadline Date</th>
                              <th>Payment</th>
                            </tr>
                          </thead>
                        <tbody>
                          @foreach ($assingment as $key => $a)
                            <tr>

                              <td>{{$key+1}}</td>
                              <td>  <a href="{!! route('student.assingment.view',$a->assingments_id) !!}">{{$a->assingment->assingment_name}}</a></td>

                              <td>{{$a->price}}</td>
                              <td>@if ($a->status==0)
                                Unseen
                              @elseif ($a->status==1)
                                Seen
                              @elseif ($a->status==2)
                                Running
                                @else
                                  Complete
                              @endif</td>
                              <td>{{$a->assingment->deadline_date}}</td>
                              <td>
                                @if ($a->is_paid==0)
                                  Not Paid
                                  @else
                                    Paid
                                @endif
                              </td>

                            </tr>
                          @endforeach
                        </tbody>
                        {{-- <tfoot>
                          <th>Assingment Name</th>

                          <th>Assingment Price</th>
                          <th>Assingment Status</th>
                          <th>Deadline Date</th>
                          <th>Payment</th>
                        </tfoot> --}}
                          </table>
                          </div>
                          </div>
                        </div>
                  </div>
                </div>
              </div>

            </div>


@endsection
