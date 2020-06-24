@extends('frontend.layouts.master')

@section('content')
  <div class="intro-section single-cover" id="home-section">
                <div class="slide-1 " style="background-image: url({!! asset('home-asset/images/img_2.jpg') !!});" data-stellar-background-ratio="0.5">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="row justify-content-center align-items-center text-center">
                          <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Assingment Request</h1>
                            {{-- <p data-aos="fade-up" data-aos-delay="100">4 Lessons / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p> --}}
                          </div>


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <div class="row">
                            @include('frontend.pages.student.partials.sidebar')
                          <div class="col-md-9" >


                          <form method="POST" action="{{ route('student.assingment.request.post') }}" class="form-box" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Assingment Name') }}</label>

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
                                  <label for="assingmenttype" class="col-md-4 col-form-label text-md-right">{{ __('Select Paper Type') }}</label>

                                  <div class="col-md-6">
                                      {{-- <input id="assingmenttype" type="text" class="form-control @error('assingmenttype') is-invalid @enderror" name="assingmenttype" value="{{ old('assingmenttype') }}" required autocomplete="assingmenttype" autofocus> --}}

                                      <select class="form-control js-example-basic"  name="assingmenttype">
                                        <option value="">Select Paper Type</option>
                                        @foreach ($assingmenttype as $a_t)
                                           <option value="{{$a_t->id}}">{{$a_t->name}}</option>


                                    @endforeach
                                      </select>
                                      @error('assingmenttype')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>




                              <div class="form-group row">
                                  <label for="education_level" class="col-md-4 col-form-label text-md-right">{{ __('Education Level') }}</label>

                                  <div class="col-md-6">
                                        <select class="form-control" name="education_level" id="education_level">
                                          <option value="">Select Education Level</option>
                                          @foreach ($education_level as $e)
                                            <option value="{{ $e->id }}">{{ $e->name }}</option>
                                          @endforeach
                                        </select>
                                      @error('education_level')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Assingment Subject') }}</label>

                                  <div class="col-md-6">
                                      {{-- <input id="subjects" type="text" class="form-control @error('subjects') is-invalid @enderror" name="subjects" value="{{ old('subjects') }}" required autocomplete="subjects" autofocus> --}}

                                      <select class="form-control js-example-basic" name="subject">
                                        <option value="">Select Subject</option>
                                        @foreach ($subject as $s)
                                           <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                      </select>
                                      @error('subjects')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Assingment Details') }}</label>

                                  <div class="col-md-6">
                                      <textarea id="details" type="text" class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}" required >
                                      </textarea>
                                      @error('details')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label for="dvPreview" class="col-md-4 col-form-label text-md-right">{{ __('Preview') }}</label>
                                  <div class="col-md-6">
                              <center>  <div id="dvPreview">
                              </div></center>
                                </div>
                              </div>
                              <div class="form-group row">
                                  <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                  <div class="col-md-6">
                                      <input id="fileupload" type="file" multiple class="form-control @error('images') is-invalid @enderror" name="images[]" value="{{ old('images') }}"  autocomplete="images"  accept="image/*">

                                      @error('images')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="files" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

                                  <div class="col-md-6">
                                      <input id="files" type="file" multiple class="form-control @error('files') is-invalid @enderror" name="files[]" value="{{ old('files') }}"  autocomplete="files" accept=".pdf,.doc,.docs,.txt" >

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
                                      <button type="submit" class="btn btn-primary">
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
window.onload = function () {
    var fileUpload = document.getElementById("fileupload");
    fileUpload.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = document.getElementById("dvPreview");
            dvPreview.innerHTML = "";
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            for (var i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "200";
                        img.width = "200";
                        img.src = e.target.result;
                        dvPreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }
            }
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    }
};
</script>

@endsection
