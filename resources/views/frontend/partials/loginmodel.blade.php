


<!-- Modal -->
<div class="modal fade in" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false" >
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content" style="border-radius:6px; background-color:transparent; border-color:transparent; align-items: center;">
      {{-- <div class="modal-header"> --}}
        <h5 class="modal-title" id="exampleModalLongTitle">Choose Your Portal</h5>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      {{-- </div> --}}
      <div class="modal-body" style="height:335px !important">
      <div class="row"  style="height:335px !important">
        <div class="col-xs-12 col-sm-6 student-login">
          <h3 style="margin-top:60px;color:#fff; font-weight: bold;">Student Portal</h3>
          {{-- <p style="color:#fff">Choose Student Portal If you are a student and if you want to done your assingment by our virtual assistent. </p> --}}
          <a href="{!! route('login') !!}" class="btn" style="background-color:#780932;color:#fff">Login</a>
          <a href="{!! route('student.registrationForm') !!}" class="btn btn-warning" style="color:#fff;">Register</a>
        </div>
        <div class="col-xs-12 col-sm-6 writer-login" >
          <h3 style="margin-top:60px;color:#fff; font-weight: bold;">Writer Portal</h3>
          {{-- <p style="color:#fff">Choose Writer Portal If you are a good Writer and if you want to assist our virtual assistent. </p> --}}
          <a href="{!! route('writer.login') !!}"  class="btn" style="background-color:#780932;color:#fff;">Login</a>
          <a href="{!! route('writer.register') !!}"  class="btn btn-warning" style="color:#fff;">Register</a>
        </div>
      </div>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>

      </div> --}}
    </div>
  </div>
</div>
