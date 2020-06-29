@extends('frontend.layouts.master')

@section('content')
  <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Assingment View</h1>
                            {{-- <p data-aos="fade-up" data-aos-delay="100"> / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p> --}}
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
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <div class="row">
                            @include('frontend.pages.student.partials.sidebar')
                            <div class="col-md-9">
                        <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <th> Name : {{$assingment->assingment_name}}</th>
                        </tr>
                          <tr><th> Type Name: {{$assingment->type->name}}</th></tr>
                          <tr><th> Subject Name : {{$assingment->subject->name}}</th></tr>
                          <tr><th> Education Level : {{$assingment->education_level->name}}</th></tr>
                          <tr><th> Deadline Date : {{$assingment->deadline_date}}</th></tr>
                        </tr>

                      </tbody>

                        </table>


                          @if ($assingment->images!=null)
                          @foreach ($assingment->images as $key => $image)
                              <div class="col-md-4" style="margin-top:10px">
                                <img class="img" src="{!! asset('files/images/'.$image->image) !!}" alt="" width="300px" height="300px" /><br>
                                <a href="{!! asset('files/images/'.$image->image) !!}" class="btn btn-primary" style="margin-top:10px">View Image</a>
                              </div>
                          @endforeach
                        @endif
                          @if ($assingment->files!=null)
                          @foreach($assingment->files as $file)
                        {{-- <img src="{!! asset('files/images/'.$image->image) !!}" alt="Visa"/> --}}
                        <div class="col-md-4" style="margin-top:10px">
                           <iframe src="{!! asset('/files/others/'.$file->file) !!}" width="300px" height="300px"></iframe>
                           <a href="{!! asset('/files/others/'.$file->file) !!}" class="btn btn-primary" style="margin-top:10px;">View File</a>
                          </div>
                      @endforeach
                    @endif
                        </div>
                        </div>


                        {{-- @if ($assingment->files!=null)
                        <div class="row">
                          <div class="col-md-4">
                              <p class="lead">Assingment Files</p>
                              <div class="table-responsive">
                                  <table class="table">
                                      <th style="width:50%">Files:</th>
                                    @foreach($assingment->files as $file)

                                  <tr>

                                      <td> <iframe src="{!! asset('/files/others/'.$file->file) !!}" width="auto" height="auto"></iframe> </td>
                                      <td> <a href="{!! asset('/files/others/'.$file->file) !!}" class="btn btn-primary">Download/View</a> </td>
                                    </tr>
                                @endforeach


                                  </table>
                              </div>
                          </div>
                        </div>
                        @endif --}}
                  </div>
                </div>
              </div>

            </div>


@endsection
