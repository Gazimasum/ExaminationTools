@extends('frontend.layouts.master')

@section('content')
  <div class="container" style="margin-top:120px;margin-bottom:200px;">
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
                              <th>Assingment Details</th>
                              <th> Status</th>
                             
                            </tr>
                          </thead>
                        <tbody>
                          @foreach ($completeAssingment as $key => $a)
                            <tr>

                              <td>{{$key+1}}</td>
                              <td >  <a href="{!! route('student.assingment.view',$a->order->assingment->slug) !!}" style="color: #0072ce">{{$a->order->assingment->assingment_name}}</a></td>

                                <td>{{ $a->order->assingment->assingment_details }}</td>
                             
                                <td><a href="{{ route('student.order.complete.view',$a->id) }}" class="btn btn-warning">View</a></td>
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