@extends('frontend.layouts.master')

@section('content')
  @php
    $assingment_no = App\Models\Order::where('student_id',$student->id)->count();
    $assingment = App\Models\Order::where('student_id',$student->id)->get();
  @endphp
  {{-- <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">{{$student->name}} Dashboard</h1>
                            <p data-aos="fade-up" data-aos-delay="100">{{$assingment_no}} Assingment </p>
                          </div>
                        

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>  --}}
              
                <div class="container" style="margin-top:120px;margin-bottom:100px;">
                   @include('frontend.partials.messages')
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row justify-content-center">
                      @include('frontend.pages.student.partials.sidebar')
                          <div class="col-md-9 align-items-center" style="padding:20px;margin-bottom: 50px">
                          {{-- <h2> <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">  {{$student->name}}</h2> --}}

                          <h3>Assingment That You Request</h3><br><br>
                            <div class="box-body table-responsive">
                          <table class="table table-hover" id="myTable">
                              <thead>
                            <tr>
                              <th>No</th>
                              <th>Assingment Name</th>
                              <th>Assingment Status</th>
                              <th>Deadline Date</th>
                            </tr>
                          </thead>
                        <tbody>
                          @foreach ($assingment as $key => $a)
                            <tr>

                              <td>{{$key+1}}</td>
                              <td >  <a href="{!! route('student.assingment.view',$a->assingment->slug) !!}" style="color: #0072ce">{{$a->assingment->assingment_name}}</a></td>

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
