@extends('frontend.layouts.master')

@section('content')
<div class="intro-section single-cover" id="home-section">
    <div class="slide-1 " data-stellar-background-ratio="0.5" style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 class="text-black" data-aos="fade-up" data-aos-delay="0">
                                Order Track {{$order->order_trace_id}}
                            </h1>
                            {{--
                            <p data-aos="fade-up" data-aos-delay="100">
                                {{$order->assingment->created_at}} / 12 Week &bullet; 2,193 students &bullet;
                                <a class="text-white" href="#">
                                    6 comments
                                </a>
                            </p>
                            --}}
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
                    <h1>
                        {{$order->assingment->assingment_name}}
                    </h1>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>
                                    Assingment Name
                                </th>
                                <th>
                                    Assingment Details
                                </th>
                                <th>
                                    Assingment Status
                                </th>
                                <th>
                                    Deadline Date
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    {{$order->assingment->assingment_name}}
                                </td>
                                <td>
                                    {{$order->assingment->assingment_details}}
                                </td>
                                <td>
                                    @if ($order->status==0)
                                Unseen
                              @elseif ($order->status==1)
                                Seen
                              @elseif ($order->stats==2)
                                Running
                                @else
                                  Complete
                              @endif
                                </td>
                                <td>
                                    {{$order->assingment->deadline_date}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
