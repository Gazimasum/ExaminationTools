
<style media="screen">
.nav-item  .nav-link{
    color: #000 !important;
    font-weight: bold;
  }
 .nav-link:hover{
    color: #fff !important;
  }
  a.nav-link.active{
    color: #fff !important;
    border-bottom: 3px solid #fff !important;
  }

.navbar-light{
  background-color: #7971ea !important;
}
.navbar-light .navbar-toggler {
  color: rgb(0, 0, 0);
  border-color: rgb(0, 0, 0);
}
</style>
  <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light" style="">
      <a class="navbar-brand" href="#" style="font-size:30px;font-weight:bold;color:#fff">ExaminationTools</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">

          </ul>
          <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link {{Route::is('index') ? 'active' : '' }}" href="{!! route('index') !!}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{Route::is('service') ? 'active' : '' }}" href="{!! route('service') !!}">Service</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  {{Route::is('about') ? 'active' : '' }}" href="{!! route('about') !!}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{Route::is('contact') ? 'active' : '' }}" href="{!! route('contact') !!}">Contact</a>
            </li>
            @guest
              <li class="nav-item" style="padding-left:20px;padding-right:20px">  <a  class="nav-link btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
               <span style="color:#fff; font-weight:bold;">Choose Your Portal</span>
             </a></li>
           @else
             @if (Auth::guard('web')->check())
             <li class="nav-item dropdown">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">
                 {{ Auth::user()->name }}
                 <span class="caret"></span>
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                 <a class="dropdown-item" href="#"
                 onclick="event.preventDefault();
                 document.getElementById('dashboard-form').submit();">
                   My dashboard
                 </a>
                 <a class="dropdown-item" href="#"
                 onclick="event.preventDefault();
                 document.getElementById('assingment-request-form').submit();">
                   Assingment Request
                 </a>
                 <a class="dropdown-item" href="#"
                 onclick="event.preventDefault();
                 document.getElementById('student-message-form').submit();">
                  Message
                 </a>


                 <a class="dropdown-item" href="#"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">  Logout</a>
               </div>
             </li>
             @else
                 <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="#"
                        onclick="event.preventDefault();
                        document.getElementById('writer-dashboard-form').submit();">
                            My dashboard
                          </a>
                          <a class="dropdown-item" href="#"
                          onclick="event.preventDefault();
                          document.getElementById('writer-message-form').submit();">
                           Message
                          </a>
                          <a class="dropdown-item" href="#"
                          onclick="event.preventDefault();
                          document.getElementById('order-logout-form').submit();">
                              Ordered List
                            </a>
                            <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();
                            document.getElementById('writer-logout-form').submit();">
                            Logout
                           </a>
                      </div>
               </li>
              @endif
            @endguest

          </ul>
      </div>
  </nav>
  {{-- <form id="index-form" action="{{ route('index') }}" method="GET" style="display: none;">
       @csrf
     </form>
  <form id="about-form" action="{{ route('about') }}" method="GET" style="display: none;">
       @csrf
     </form>
  <form id="service-form" action="{{ route('service') }}" method="GET" style="display: none;">
       @csrf
     </form>
  <form id="contact-form" action="{{ route('contact') }}" method="GET" style="display: none;">
       @csrf
     </form> --}}

     <form id="dashboard-form" action="{{ route('student.dashboard') }}" method="GET" style="display: none;">
       @csrf
     </form>
     <form id="writer-dashboard-form" action="{{ route('writer.dashboard') }}" method="GET" style="display: none;">
       @csrf
     </form>
     <form id="student-message-form" action="{{ route('student.message.view') }}" method="GET" style="display: none;">
       @csrf
     </form>
     <form id="writer-message-form" action="{{ route('writer.message.view') }}" method="GET" style="display: none;">
       @csrf
     </form>

     <form id="assingment-request-form" action="{{ route('student.assingment.request.view') }}" method="GET" style="display: none;">
       @csrf
     </form>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
     </form>

     <form id="writer-logout-form" action="{{ route('writer.logout') }}" method="POST" style="display: none;">
       @csrf
     </form>
