<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {{--
                <img class="img-circle" src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}">
                    --}}
                    <img alt="User Image" class="img-circle" src="{!! asset('admin-asset/img/avatar3.png') !!}"/>
                </img>
            </div>
            <div class="pull-left info">
                <p>
                    Hello, Jane
                </p>
                <a href="#">
                    <i class="fa fa-circle text-success">
                    </i>
                    Online
                </a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" class="sidebar-form" method="get">
            <div class="input-group">
                <input class="form-control" name="q" placeholder="Search..." type="text"/>
                <span class="input-group-btn">
                    <button class="btn btn-flat" id="search-btn" name="seach" type="submit">
                        <i class="fa fa-search">
                        </i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{!! route('admin.index') !!}">
                    <i class="fa fa-dashboard">
                    </i>
                    <span>
                        Dashboard
                    </span>
                </a>
            </li>
            {{--
            <li>
                <a href="pages/widgets.html">
                    <i class="fa fa-th">
                    </i>
                    <span>
                        Widgets
                    </span>
                    <small class="badge pull-right bg-green">
                        new
                    </small>
                </a>
            </li>
            --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file">
                    </i>
                    <span>
                        Assingment
                    </span>
                    <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('admin.assingment.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            View Assingment
                            <small class="badge pull-right bg-red">
                                {{App\Models\Order::newOrder()}}
                            </small>
                        </a>
                    </li>
                    {{--
                    <li>
                        <a href="#">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Manage Assingment
                        </a>
                    </li>
                    --}}
                    <li>
                        <a href="{!! route('admin.assingment.complete') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Complete Assingment
                            <small class="badge pull-right bg-green">
                                {{App\Models\CompleteAssingment::completeCount()}}
                            </small>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit">
                    </i>
                    <span>
                        Writer
                    </span>
                    <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('admin.writer.request') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Writer Request
                            <small class="badge pull-right bg-green">
                                {{App\Models\Freelancer::writerReq()}}
                            </small>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('admin.writer.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Manage Writer
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('admin.writer.message') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Writer Message
                            <small class="badge pull-right bg-green">
                                <b id="w_noti_number_sidebar">
                                    0
                                </b>
                            </small>
                        </a>
                    </li>
                    {{--
                    <li>
                        <a href="pages/UI/buttons.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Buttons
                        </a>
                    </li>
                    <li>
                        <a href="pages/UI/sliders.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Sliders
                        </a>
                    </li>
                    <li>
                        <a href="pages/UI/timeline.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Timeline
                        </a>
                    </li>
                    --}}
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user">
                    </i>
                    <span>
                        Student
                    </span>
                    <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('admin.student.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Manage Student
                        </a>
                    </li>
                    {{--
                    <li>
                        <a href="{!! route('admin.student.request') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Student Request
                            <small class="badge pull-right bg-red">
                                {{App\Models\Freelancer::studentRequest()}}
                            </small>
                        </a>
                    </li>
                    --}}
                    <li>
                        <a href="{!! route('admin.student.message') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Student Message
                            <small class="badge pull-right bg-green">
                                <b id="s_noti_number_sidebar">
                                    0
                                </b>
                            </small>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-thumbs-up">
                    </i>
                    <span>
                        Deal With Student
                    </span>
                    <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('admin.student.deal.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            New Deal
                            <small class="badge pull-right bg-green">
                                {{App\Models\DealWithStudent::newDeal()}}
                            </small>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('admin.student.deal.all') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            All Deal
                        </a>
                    </li>
                    {{--
                    <li>
                        <a href="pages/tables/data.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Data tables
                        </a>
                    </li>
                    --}}
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-thumbs-o-up">
                    </i>
                    <span>
                        Deal With Writer
                    </span>
                    <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('admin.writer.deal.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            New Deal
                            <small class="badge pull-right bg-green">
                                {{App\Models\DealWithWriter::newDeal()}}
                            </small>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('admin.writer.deal.all') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            All Deal
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase">
                    </i>
                    <span>
                        Order
                    </span>
                    <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('admin.order.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            View Order
                        </a>
                        <a href="{!! route('admin.order.complete') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Complete Order 
                             <small class="badge pull-right bg-green">
                             {{App\Models\CompleteAssingment::completeCount()}}
                        </small>
                        </a>
                    </li>
                    {{--
                    <li>
                        <a href="pages/tables/data.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Data tables
                        </a>
                    </li>
                    --}}
                </ul>
            </li>
            @if (Auth::user()->isSuperAdmin())
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog">
                    </i>
                    <span>
                        General
                    </span>
                    <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('admin.country.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Country
                        </a>
                    </li> 
                    <li>
                        <a href="{!! route('admin.currency.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Currency
                        </a>
                    </li>
                    {{--
                    <li>
                        <a href="{!! route('admin.educationlevel.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Education Level
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('admin.subject.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Subject
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('admin.assingmenttype.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Assingment Type
                        </a>
                    </li>
                    --}}
                    <li>
                        <a href="{!! route('admin.advertising.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Advertising
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('admin.payment_method.index') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Payment Method
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user">
                    </i>
                    <span>
                        Admin
                    </span>
                    <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('adminregisterview') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Register
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('admin.view') !!}">
                            <i class="fa fa-angle-double-right">
                            </i>
                            View
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{!! route('admin.pages.index') !!}">
                    <i class="fa fa-edit">
                    </i>
                    <span>
                        Pages
                    </span>
                </a>
            </li>
            <li>
                <a href="{!! route('admin.style') !!}">
                    <i class="fa fa-edit">
                    </i>
                    <span>
                        Style
                    </span>
                </a>
            </li>
             <li>
                <a href="{{ route('admin.mailbox.index') }}">
                    <i class="fa fa-envelope">
                    </i>
                    <span>
                        Mailbox
                    </span>
                    <small class="badge pull-right bg-yellow">
                        12
                    </small>
                </a>
            </li>
            @endif
            {{--
            <li>
                <a href="pages/calendar.html">
                    <i class="fa fa-calendar">
                    </i>
                    <span>
                        Calendar
                    </span>
                    <small class="badge pull-right bg-red">
                        3
                    </small>
                </a>
            </li>
            --}}
            {{--
           
            --}}
            {{--
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder">
                    </i>
                    <span>
                        Examples
                    </span>
                    <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="pages/examples/invoice.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Invoice
                        </a>
                    </li>
                    <li>
                        <a href="pages/examples/login.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="pages/examples/register.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Register
                        </a>
                    </li>
                    <li>
                        <a href="pages/examples/lockscreen.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Lockscreen
                        </a>
                    </li>
                    <li>
                        <a href="pages/examples/404.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            404 Error
                        </a>
                    </li>
                    <li>
                        <a href="pages/examples/500.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            500 Error
                        </a>
                    </li>
                    <li>
                        <a href="pages/examples/blank.html">
                            <i class="fa fa-angle-double-right">
                            </i>
                            Blank Page
                        </a>
                    </li>
                </ul>
            </li>
            --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
