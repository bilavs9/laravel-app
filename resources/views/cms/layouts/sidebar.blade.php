@section('sidebar')
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Laravel Admin!</span></a>
                </div>

                <div class="clearfix"></div>


                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{url('uploads/images/users/'.Auth::user()->image)}}" width="400px" height="60px" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{Auth::user()->user_name}}</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li class="active"><a><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>


                        </ul>
                    </div>

                    <div class="menu_section">
                        <h3>Development</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-picture-o" aria-hidden="true"></i>Gallery <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('add_gallery')}}">Add Gallery</a></li>
                                    <li><a href="{{route('show_gallery')}}">Show Gallery</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-newspaper-o"></i>News <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('add_news')}}">Add news</a></li>
                                    <li><a href="{{route('show_news')}}">Show news</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bars"></i>Menu <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('add_menu')}}">Add menu</a></li>
                                    <li><a href="{{route('show_menu')}}">Show menu</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-calendar-minus-o"></i>Notices <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('add_notices')}}">Add notices</a></li>
                                    <li><a href="{{route('notices')}}">Show notices</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>


                    <div class="menu_section">
                        <h3>Management</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-users"></i>Users <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('add_user')}}">Add users</a></li>
                                    <li><a href="{{route('users')}}">Show users</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>



                </div>
                <!-- /sidebar menu -->


            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{url('uploads/images/users/'.Auth::user()->image)}}" alt="">{{Auth::user()->user_name}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li><a href="javascript:;"><span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a href="{{Route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
@endsection