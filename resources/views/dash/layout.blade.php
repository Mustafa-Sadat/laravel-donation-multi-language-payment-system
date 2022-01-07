<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="https://example.com/favicon.png"/>
    <!-- Fontfaces CSS-->
    <link href="{{url('public/assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{url('public/assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('public/assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('public/assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('public/assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{url('public/assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('public/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('public/assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{url('public/assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('public/assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{url('public/assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('public/assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('public/assets/css/theme.css')}}" rel="stylesheet" media="all">
    <link rel="icon" type="image/png" href="{{url('public/assets/images/logo.png')}}"/>
    

    <style>
            .pagination > .active > a,
            .pagination > .active > a:focus,
            .pagination > .active > a:hover,
            .pagination > .active > span,
            .pagination > .active > span:focus,
            .pagination > .active > span:hover {
                background-color: #358819  !important;
                border-color: #358819  !important;
            }
    </style>

    @yield('dash-css')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{url('public/assets/images/icon/logo.png')}}" alt="CoolAdmin" style="height:70px;object-fit:contain" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a class="js-arrow" href="{{url('/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
            
                        <li>
                            <a href="{{url('/familylist')}}">
                                <i class="fas fa-copy"></i>Family List</a>
                        </li>
                        <li>
                            <a href="{{url('/paymentlog')}}">
                                <i class="fas fa-chart-bar"></i>Payment Log</a>
                        </li>

                        <li>
                            <a href="{{url('/donors')}}">
                                <i class="fas fa-briefcase"></i>Donors</a>
                            <li>
                        </li>
                       
                            <a href="{{url('/systemadmin')}}">
                                <i class="fas fa-users"></i>System Admin</a>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{url('public/assets/images/icon/logo.png')}}" alt="Cool Admin" style="height:70px;object-fit:contain" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li >
                            <a class="js-arrow" href="{{url('/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('/familylist')}}">
                                <i class="fas fa-copy"></i>Family List</a>
                        </li>
                        <li>
                            <a href="{{url('/paymentlog')}}">
                                <i class="fas fa-chart-bar"></i>Payment Log</a>
                        </li>
                        <li>
                            <a href="{{url('/donors')}}">
                                <i class="fas fa-briefcase"></i>Donors</a>
                        </li>
                        <li>
                            <a href="{{url('/systemadmin')}}">
                                <i class="fas fa-users"></i>System Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->


        

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="form-header" >
                              
                            </div>

                            
                            <div class="header-button ">

                                <div class="noti__item js-item-menu" style="margin-left:80px;">
                                    <i class="zmdi zmdi-home"></i>
                                    <div class="email-dropdown js-dropdown">
                                        <div class="email__item">
                                            <a href="{{url('/')}}">
                                                <div class="image img-cir img-40">
                                                    <img src="{{url('public/assets/images/logo.png')}}" alt="img" />
                                                </div>
                                                <div class="content"  style="width:100%">
                                                    <p>Visit Site</p>
                                                    <span>tomorrowshope.tv/donate</span>
                                                </div>
                                            </a>
                                        </div>
                                       
                                    </div>
                                </div>
                            
                                @php
                                    $not_count=DB::table('notifications')->where('status','unread')->count();
                                @endphp

                                <div class="noti-wrap " >
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                       @if ($not_count!=0)
                                            <span class="quantity">
                                                @php
                                                    echo $not_count;
                                                @endphp
                                            </span>
                                      
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have {{$not_count}} Notifications</p>
                                            </div>
                                            @php
                                                $noti=DB::table('notifications')->where('status','unread')->where('type','donation')->select('notifications.id','users.email','notifications.disc','users.name','notifications.created_at as date')->join('users','users.id','=','notifications.user_id')->orderby('date','desc')->limit(3)->get();
                                            @endphp
                                            @foreach ($noti as $item)
                                                <div class="notifi__item">
                                                        <div class="bg-c2 img-cir img-40 " >
                                                            <i class="zmdi zmdi-account-box"></i>
                                                        </div>
                                                        <a href="paymentlog">
                                                        <div class="content" style="width:100%">
                                                            <p class="text-muted" style="font-size:13px !important">{{$item->disc}}</p>
                                                            <p class="text-muted" style="font-size:11px !important">{{$item->email}}</p>
                                                            <span class="date">
                                                                    @php
                                                                        $date=date_create($item->date);
                                                                        echo date_format($date,"F");
                                                                    @endphp
                                                                {{$item->date}}</span>
                                                        </div>
                                                   </a>
                                                </div>
                                            @endforeach
                                            <div class="notifi__footer">
                                                <a href="paymentlog">All notifications ({{$not_count}})</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                               
                                <div class="account-wrap ml-auto">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            @if (empty(Auth::user()->profile_photo_path))
                                                <img src="{{url('public/assets/images/img.jpg')}}" alt="{{Auth::user()->name}}" style="border-radius: 50%;"/>
                                            @else
                                                <img src="{{asset('storage/app')}}/{{Auth::user()->profile_photo_path}}" alt="John Doe"  style="border-radius: 50%;"/>
                                            @endif
                                            
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        @if (empty(Auth::user()->profile_photo_path))
                                                            <img src="{{url('public/assets/images/img.jpg')}}" alt="{{Auth::user()->name}}" />
                                                        @else
                                                            <img src="{{asset('storage/app')}}/{{Auth::user()->profile_photo_path}}" alt="photo"  style="border-radius: 50%;"/>
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{Auth::user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" >
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

                
    
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                            @yield('dash-body')
                        
                        </div>
                    </div>
                </div>
                

            </div>
        </div>


        

    <!-- Jquery JS-->
    <script src="{{url('public/assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{url('public/assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{url('public/assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{url('public/assets/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{url('public/assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{url('public/assets/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{url('public/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{url('public/assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('public/assets/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{url('public/assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{url('public/assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    {{-- <script src="{{url('public/assets/vendor/chartjs/Chart.bundle.min.js')}}"></script> --}}
    <script src="{{url('public/assets/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{url('public/assets/js/main.js')}}"></script>


    <script src="{{url('public/js/pagination.js')}}"></script>
    @yield('dash-jquery')

    <script>
         setInterval(() => {
            $(".myAlert").fadeOut('slow');
        }, 10000);
        
    </script>

</body>

</html>
<!-- end document-->