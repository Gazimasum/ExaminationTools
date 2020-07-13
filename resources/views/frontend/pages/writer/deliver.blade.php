@extends('frontend.layouts.master')

@section('content')
{{-- <div class="intro-section single-cover" id="home-section">
    <div class="slide-1 " data-stellar-background-ratio="0.5" style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">
                                Writer Dashboard
                            </h1>
                           
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
                        {{--
                        <h2>
                            <img class="img rounded-circle" src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" style="width:40px">
                                {{$writer->name}}
                            </img>
                        </h2>
                        --}}
                        <h3>
                            Assingment Deliver
                        </h3>
                        <br>
                            @include('frontend.partials.messages')
                            <form action="{{ route('writer.order.deliver',$assingment->order->id) }}" aria-label="Deliver" class="form-box" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="name">
                                        Name
                                    </label>
                                    <div class="col-md-6">
                                        <h4>
                                            {{ $assingment->order->assingment['assingment_name'] }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="name">
                                        Details
                                    </label>
                                    <div class="col-md-6">
                                        <h4>
                                            {{ $assingment->order->assingment['assingment_details'] }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="name">
                                        File
                                    </label>
                                    <div class="col-md-6">
                                        <input accept=".pdf,.doc,.docs,.txt" multiple="" name="files[]" required type="file">
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button class="btn" style="background-color:#0072CE" type="submit">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
