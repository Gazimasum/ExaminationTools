
  <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container-fluid">
      <div class="d-flex align-items-center">
        <div class="site-logo mr-auto w-25"><a href="index.html">OneSchool</a></div>

        <div class="mx-auto text-center">
          <nav class="site-navigation position-relative text-right" role="navigation">
            <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
              <li><a href="{!! route('index') !!}" class="nav-link {{Route::is('index') ? 'active': ''}}"
                onclick="event.preventDefault();
                document.getElementById('index-form').submit();">Home</a></li>


                  <li><a href="#courses-section" class="nav-link">Courses</a></li>

            @guest
              <li><a href="{!! route('login') !!}" class="nav-link">Login</a></li>
              <li><a href="{!! route('student.registrationForm') !!}" class="nav-link">Register</a></li>
              @else
                  @if(Auth::guard('web')->check())
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px"> --}}
                    {{ Auth::user()->name }}
                    <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{!! route('student.dashboard') !!}"
                    onclick="event.preventDefault();
                    document.getElementById('dashboard-form').submit();">
                      My dashboard
                    </a>

                    <a class="dropdown-item" href="{!! route('student.assingment.request.view') !!}"
                    onclick="event.preventDefault();
                    document.getElementById('assingment-request-form').submit();">
                      Assingment Request
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">  Logout</a>


                  @elseif(Auth::guard('writer')->check())
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px"> --}}
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item" href="{!! route('writer.dashboard') !!}">
                        My dashboard
                      </a>
                    <a class="dropdown-item" href="#">
                      Ordered List
                    </a>
                    <a class="dropdown-item" href="{{ route('writer.logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('writer-logout-form').submit();">
                    Logout
                  </a>
                        @endif

                </div>
              </li>
            @endguest
            </ul>
          </nav>
        </div>

        <div class="ml-auto w-25">
          <nav class="site-navigation position-relative text-right" role="navigation">
            <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
              @guest
                <li class="cta"><a href="{!! route('writer.login') !!}" class="nav-link"><span>Join</span></a></li>
              @endguest
            </ul>
          </nav>
          <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
        </div>
      </div>
    </div>



    <form id="index-form" action="{{ route('index') }}" method="GET" style="display: none;">
      @csrf
    </form>

    <form id="dashboard-form" action="{{ route('student.dashboard') }}" method="GET" style="display: none;">
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
  </header>
