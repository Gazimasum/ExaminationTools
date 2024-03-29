<header class="header">
    <a href="index.html" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        AdminLTE
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-envelope"></i>
                      <span class="label label-success"> <b id="noti_number_header">0</b> </span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header" ><a href="{{ route('admin.student.message') }}">You have <b id="s_noti_number_header">0</b> Student messages</a></li>
                      <li class="header"><a href="{{ route('admin.writer.message') }}">You have <b id="w_noti_number_header">0</b> Writer messages</a></li>
                  </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>Admin <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="{!! asset('admin-asset/img/avatar3.png') !!}" class="img-circle" alt="User Image" />
                            <p>
                                {{Auth::user()->name}}

                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! route('admin.profile.view') !!}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                              {{-- <form class="" action="{!! route('admin.logout') !!}" method="post">
                                @csrf
                                  <button  type="button">Sign out</button>
                              </form> --}}

                              <form class="btn btn-default btn-flat" action="{!! route('admin.logout') !!}" method="post">
                                   @csrf
                                   <input type="submit" value="LogOut" class="btn btn-danger">
                                 </form>

                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
