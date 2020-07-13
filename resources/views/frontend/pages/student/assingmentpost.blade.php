@extends('frontend.layouts.master')

@section('content')
 {{--  <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Assingment Request</h1>
                          
                          </div>


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div> --}}
                 <div class="container" style="margin-top:120px;margin-bottom:100px;">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row justify-content-center">
                            @include('frontend.pages.student.partials.sidebar')
                          <div class="col-md-9 align-items-center" style="padding:20px;margin-bottom: 50px">
                            <center><h2>Assingment Request</h2></center>
                            @include('frontend.partials.messages')
                          <form method="POST" action="{{ route('student.assingment.request.post') }}" class="form-box" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Subject Name') }}</label>

                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >

                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Assingment Details') }}</label>

                                  <div class="col-md-6">
                                      <textarea id="details" type="text" class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}" required ></textarea>
                                      @error('details')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                {{-- <label for="dvPreview" class="col-md-4 col-form-label text-md-right">{{ __('Preview') }}</label> --}}
                                  <div class="col-md-10 align-self-end">
                              <center>  <div id="image_preview">
                              </div></center>
                                </div>
                              </div>
                              <div class="form-group row">
                                  <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                  <div class="col-md-6">
                                      <input id="upload_file" type="file" multiple class="form-control @error('images') is-invalid @enderror" name="images[]" value="{{ old('images') }}"  autocomplete="images"  accept="image/*" onchange="preview_image();">

                                      @error('images')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                {{-- <label for="dvPreview" class="col-md-4 col-form-label text-md-right">{{ __('Preview') }}</label> --}}
                                  <div class="col-md-10 align-self-end">
                              <center>  <div id="pdf_preview">
                              </div></center>
                                </div>
                              </div>
                              <div class="form-group row">
                                  <label for="files" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

                                  <div class="col-md-6">
                                      <input id="files" type="file" multiple class="form-control @error('files') is-invalid @enderror" name="files[]" value="{{ old('files') }}"  autocomplete="files" accept=".pdf,.doc,.docs,.txt" onchange="preview_pdf();">

                                      @error('files')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="deadline_date" class="col-md-4 col-form-label text-md-right">{{ __('Deadline Date') }}</label>

                                  <div class="col-md-6">
                                      <input id="deadline_date" type="date" class="form-control @error('deadline_date') is-invalid @enderror" name="deadline_date" value="{{ old('deadline_date') }}" required autocomplete="deadline_date">

                                      @error('deadline_date')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>


                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn" style="background-color:#0072CE">
                                          {{ __('Submit') }}
                                      </button>
                                  </div>
                              </div>
                    </form>
                  </div>
                  </div>
                  </div>
                </div>
              </div>

            </div>

<script language="javascript" type="text/javascript">
function preview_image()
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' height='150px' width='150px'>");
 }
}
function preview_pdf()
{
 var total_file=document.getElementById("files").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#pdf_preview').append("<iframe src='"+URL.createObjectURL(event.target.files[i])+"' height='200px' width='200px'>");
 }
}
</script>

@endsection
