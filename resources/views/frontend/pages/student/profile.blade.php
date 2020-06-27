@extends('frontend.layouts.master')

@section('content')
  <style media="screen">
  .emp-profile{
  padding: 3%;
  margin-top: 3%;
  margin-bottom: 3%;
  border-radius: 0.5rem;
  background: #fff;
}
.profile-img{
  text-align: center;
}
.profile-img img{
  width: 150px;
  height: 150px;
}
.profile-img .file {
  position: relative;
  overflow: hidden;
  margin-top: -20%;
  width: 70%;
  border: none;
  border-radius: 0;
  font-size: 15px;
  background: #212529b8;
}
.profile-img .file input {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.profile-head h5{
  color: #333;
}
.profile-head h6{
  color: #7971ea;
}
.profile-edit-btn{
  border: none;
  border-radius: 1.5rem;
  width: 70%;
  padding: 2%;
  font-weight: 600;
  color: #6c757d;
  cursor: pointer;
}
.proile-rating{
  font-size: 12px;
  color: #818182;
  margin-top: 5%;
}
.proile-rating span{
  color: #495057;
  font-size: 15px;
  font-weight: 600;
}
.profile-head .nav-tabs{
  margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
  font-weight:600;
  border: none;
}
.profile-head .nav-tabs .nav-link.active{
  color: #7971ea !important;
  border: none;
  border-bottom:2px solid #7971ea !important;
}
.profile-head .nav-tabs .nav-link:hover{
  color: #7971ea !important;
  border: none;
  border-bottom:2px solid #7971ea;
}
.profile-work{
  padding: 14%;
  margin-top: -15%;
}
.profile-work p{
  font-size: 12px;
  color: #818182;
  font-weight: 600;
  margin-top: 10%;
}
.profile-work a{
  text-decoration: none;
  color: #495057;
  font-weight: 600;
  font-size: 14px;
}
.profile-work ul{
  list-style: none;
}
.profile-tab label{
  font-weight: 600;
}
.profile-tab p{
  font-weight: 600;
  color: #7971ea;
}
  </style>
  @php
    $assingment_no = App\Models\Order::where('student_id',$student->id)->count();
    $assingment = App\Models\Order::where('student_id',$student->id)->get();
  @endphp
  <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">{{$student->name}} Profile</h1>
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
                         <div class="col-md-7">

                         <div class="profile-head">
                                <h3>
                                    <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:50px">  {{$student->name}}
                                </h3>
                                <h6 style="margin-left:50px;">
                                    Student
                                </h6>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>

                        </ul>
                        </div>

                         </div>

                         </div>
                         <div class="row">
                            <div class="col-md-3">
                                <div class="profile-work">

                                </div>
                            </div>

                    <div class="col-md-7">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$student->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$student->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$student->phone_no}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country</label>
                                            </div>
                                            <div class="col-md-6">
                                                @if (!empty($student_details->country))
                                                  <p>{{$student_details->country['name']}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>City</label>
                                            </div>
                                            <div class="col-md-6">
                                                @if (!empty($student_details->city))
                                                  <p>{{$student_details->city}}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row" >
                                            <div class="col-md-6">
                                                <label>Relation Between</label>
                                            </div>
                                            <div class="col-md-6">
                                              @if (!empty($student_details->relation_between))
                                                <p>{{$student_details->relation_between}}</p>
                                              @endif
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="col-md-6">
                                                <label>Relative Email</label>
                                            </div>
                                            <div class="col-md-6">
                                              @if (!empty($student_details->optional_email))
                                                <p>{{$student_details->optional_email}}</p>
                                              @endif
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="col-md-6">
                                                <label>Relative Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                              @if (!empty($student_details->optional_phone))
                                                <p>{{$student_details->optional_phone}}</p>
                                              @endif
                                            </div>
                                        </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <a href="{!! route('student.profile.edit') !!}" class="btn btn-success">Edit</a>
                    </div>
                       </div>
                 </div>
               </div>
             </div>

           </div>

@endsection
