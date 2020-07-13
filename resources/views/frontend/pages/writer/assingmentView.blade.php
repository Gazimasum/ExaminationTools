@extends('frontend.layouts.master')

@section('content')
  {{-- <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Assingment View</h1>
                           
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
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <div class="row">
                          @include('frontend.pages.writer.partials.sidebar')
                            <div class="col-md-9">
                        <table class="table table-borderless">
                          <table class="table table-borderless" style="width:500px;">
                        <tbody>
                          <tr>
                            <th>Name : </th>
                            <th>{{$assingment->order->assingment->assingment_name}}</th>
                          </tr>
                          <tr>
                            <th>Details : </th>
                            <th>{{$assingment->order->assingment->assingment_details}}</th>
                          </tr>
                            <tr><th>Deadline Date : </th>
                              <th>{{$assingment->order->assingment->deadline_date}}</th>
                            </tr>

                        </tbody>

                        </table>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">

                          </div>
                          @if ($assingment->order->assingment->images!=null)
                          @foreach ($assingment->order->assingment->images as $key => $image)
                              <div class="col-md-4" style="margin-top:10px">
                                <img class="img" src="{!! asset('files/images/'.$image->image) !!}" alt="" width="300px" height="300px" /><br>
                                <a href="{!! asset('files/images/'.$image->image) !!}" class="btn" style="background-color: #0072CE;margin-top:10px">View Image</a>
                              </div>
                          @endforeach
                        @endif
                          @if ($assingment->order->assingment->files!=null)
                          @foreach($assingment->order->assingment->files as $file)
                        {{-- <img src="{!! asset('files/images/'.$image->image) !!}" alt="Visa"/> --}}
                        <div class="col-md-4" style="margin-top:10px">
                           <iframe src="{!! asset('/files/others/'.$file->file) !!}" width="300px" height="300px"></iframe>
                           <a href="{!! asset('/files/others/'.$file->file) !!}" class="btn" style="margin-top:10px;background-color:#0072CE;">View File</a>
                          </div>
                      @endforeach
                    @endif
                        </div>

                  </div>
                </div>
              </div>

            </div>


@endsection
