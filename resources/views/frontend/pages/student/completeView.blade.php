@extends('frontend.layouts.master')

@section('content')

               @include('frontend.partials.messages')
                <div class="container" style="margin-top:120px;margin-bottom:100px;">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <div class="row">
                            @include('frontend.pages.student.partials.sidebar')
                           <div class="col-md-9 align-items-center" style="padding:20px;margin-bottom: 50px">
                              <center><h2>Comeplete Assingment View</h2></center>
                        <table class="table table-borderless" style="width:500px;">
                      <tbody>
                        <tr>
                          <th>Name : </th>
                          <th>{{$completeAssingment->order->assingment->assingment_name}}</th>
                        </tr>
                        <tr>
                          <th>Details : </th>
                          <th>{{$completeAssingment->order->assingment->assingment_details}}</th>
                        </tr>
                          {{-- <tr><th>Deadline Date : </th>
                            <th>{{$completeAssingment->order->assingment->deadline_date}}</th>
                          </tr> --}}

                      </tbody>

                        </table>


                        
                          @if ($completeAssingment->files!=null)<div class="row">
                          @foreach($completeAssingment->files as $file)
                        {{-- <img src="{!! asset('files/images/'.$image->image) !!}" alt="Visa"/> --}}
                       
                          <div class="col-md-4" style="margin-top:10px;margin-left:40px ">
                           <iframe src="{!! asset('/files/others/'.$file->file) !!}" width="300px" height="300px"></iframe>
                           <a href="{!! asset('/files/others/'.$file->file) !!}" class="btn" style="background-color: #0072CE;margin-top:10px; color: #fff">View File</a>
                          </div>
                      
                      @endforeach
                       </div>
                    @endif
                        </div>
                        </div>


                  </div>
                </div>
              </div>

            </div>


@endsection
