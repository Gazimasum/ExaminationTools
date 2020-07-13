@php
  $sliderstyle = App\Models\Style::where('name','slider')->first();
@endphp
<div class="intro-section index-cover" id="home-section">

  <div class="slide-1 " style="background-image: url('home-asset/images/{{$sliderstyle->background_image}}');" data-stellar-background-ratio="0.5">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12" style="margin-top:160px; ">
          @include('frontend.partials.advertising.top')
          <div class="row justify-content-center align-items-center text-center">

            <div class="col-md-12" style="margin-top:70px">
              <h1  data-aos="fade-up" data-aos-delay="100" style="color:#780932 !important">Your Virtual Assistant.</h1><br>

            </div>
              {{-- <div class="mb-4"  data-aos="fade-up" data-aos-delay="200" style="color:#780932 !important"></div> --}}
              <div class="col-md-12">
                @auth ('web')
                  <p class="mb-4" data-aos="fade-up" data-aos-delay="300"><a href="{!! route('student.assingment.request.view') !!}" class="btn py-3 px-5 btn-pill" style="color:#fff !important;background-color:#780932 !important">Request Now</a></p>
                @endauth
                @guest
                  @if (Session::has('Writer'))
                  @else
                  <p class="mb-4" data-aos="fade-up" data-aos-delay="300"><a href="{!! route('student.assingment.request.view') !!}" class="btn py-3 px-5 btn-pill" style="color:#fff !important;background-color:#780932 !important">Request Now</a></p>
                @endif
              @endguest

              </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
