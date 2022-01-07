<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{url('public/assets/images/logo.png')}}"/>
    
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{url('public/css/style.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <link href="{{url('public/assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
     <!-- Jquery JS-->
     <script src="{{url('public/assets/vendor/jquery-3.2.1.min.js')}}"></script>
     <!-- Bootstrap JS-->
     <script src="{{url('public/assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
     <script src="{{url('public/assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <link href="{{url('public/assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin|'Open Sans'|sans-serif">
    <link href='https://fonts.googleapis.com/css?family=Open Sans Condensed:400' rel='stylesheet'>



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

        .navbar{
            text-transform: uppercase;
        }
        .btn-success{
            background-color:#69bb4d  ;
            border-color:#69bb4d  ;
        }
        .btn-success:hover{
            background-color:#358819  ;
            border-color:#358819 ;
        }


            .responsive{
                    display: flex;
                    flex-direction: row;
                justify-content:space-between;

            }
            .responsive #logo{
               margin-right:20px;
               height:90px;
            }

            .responsive #bannar{
                height:90px !important;
                object-fit: contain;
                width:100%;
            }


        
  
  
  
  .upper-title.active {
    color: #358819 ;
    text-decoration: underline;
  }
  
  .upper-title{
    position: absolute;
    top: 13px;
    right: 15px;
    color: #aaa;
    font-weight: normal !important;
    font-size: 11px;
    line-height: 11px;
    text-transform: uppercase;
    text-decoration: none !important;
  }
  
  .upper-title:hover {
    color: #358819;
  }
  
  .upper-title:after {
    display: inline-block;
    content: '\f0ca';
    font-family: "FontAwesome";
    padding-left: 5px;
  }
  .upper-title i.fa {
    display: none;
  }

  .nav-link , .footer-heading ,  .footer-input , .footer-submit ,  .footer-end p, .custome li{
    font-family: 'Cabin','Open Sans', sans-serif !important;
  }

        
</style>

    @yield('css')
</head>
<body>
    
    <header>
        <section>
            <nav class="navbar navbar-expand-sm top-nav p-0 m-0">
                <div class="container" style="position: relative;display:block !important;">
                    <!-- Links -->
                    <ul class="navbar-nav p-0 m-0 top-nab-btn">
                        <li class="nav-item top-btn">
                            <a class="nav-link">
                                <span class="fa fa-bars mr-1"></span> TOGGOLE MENU
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav p-0 m-0 navbar-top-mobile">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}" style="font-weight: 200 !important; font-family:'Open Sans', sans-serif !important">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/fa')}}" style="font-weight: 200 !important; font-family:'Open Sans', sans-serif !important">فارسی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/ps')}}" style="font-weight: 200 !important; font-family:'Open Sans', sans-serif !important">پښتو</a>
                        </li>
                    </ul>
                </div>
            <nav>
        </section>
        <section style="">
            <div class="container ">
                <div class="pt-5 mb-5 pl-4  responsive">
                    <a href="#">
                        <img src="{{url('public/assets/images/logo.png')}}" alt=""  id="logo">
                    </a>
                    <div >
                        <img src="https://tomorrowshope.tv/wp-content/uploads/2021/04/banner.gif" alt="" id="bannar"  class="mr-4 logo_img ">
                    </div>
                </div>
            </div>
        </section>
        <section class="header">
            <nav class="navbar navbar-expand-md custom-nav p-0 m-0">
                <div class="container custom-flex">
                    <ul class="navbar-nav custom_ul mr-auto toggole" >
                        <li class="nav-item p-0 m-0 toggole-btn"  >
                            <a class="nav-link nav-custom" > 
                                 <span class="fa fa-bars mr-2"></span> TOGGOLE MENU
                            </a>
                        </li>
                        <ul class="toggole--ul">
                            @auth
                            <li class="nav-item p-0 m-0"  >
                                <a class="nav-link nav-custom" href="{{url('sponsor')}}" > 
                                     {{ __('lang.card')}}
                                </a>
                            </li>
                            @endauth
                            
                           @guest
                           <li class="nav-item p-0 m-0"  >
                            <a class="nav-link nav-custom" href="{{url("login")}}" > 
                                {{ __('lang.login')}}
                            </a>
                            </li>
                            <li class="nav-item p-0 m-0"  >
                            
                                <a class="nav-link nav-custom" href="{{url("register")}}" > 
                                    {{ __('lang.register')}}
                                </a>
                            </li>
                           @endguest

                           @auth
                           @php
                               $admin=Auth::user()->role;
                           @endphp

                           @if ($admin=='admin')
                               <li class="nav-item p-0 m-0"  >
                                   <a class="nav-link nav-custom"   href="{{url('/dashboard')}}" > 
                                       {{ __('lang.dashboard')}}
                                   </a>
                               </li>
                           @else
                               <form method="POST" action="{{ route('logout') }}">
                                   @csrf

                                   <li class="nav-item p-0 m-0"  >
                                       <a class="nav-link nav-custom "   href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" > 
                                           {{ __('lang.logout')}}
                                       </a>
                                   </li>
                               </form>
                           @endif
                          

                           
                       @endauth
                        </ul>
                    </ul>




                        <ul class="navbar-nav custom_ul mr-auto main-nav" >
                           
                            @auth
                            <li class="nav-item p-0 m-0"  >
                                <a class="nav-link nav-custom" href="{{url('sponsor')}}" > 
                                     <span class="	fa fa-credit-card mr-2"></span> {{ __('lang.card')}}
                                </a>
                            </li>
                            @endauth
                            {{-- <li class="nav-item p-0 m-0"  >
                                <a class="nav-link nav-custom nav-custom" href="#" style="padding:15px"> 
                                     Donate
                                </a>
                            </li> --}}
                           @guest
                           <li class="nav-item p-0 m-0"  >
                            <a class="nav-link nav-custom" href="{{url("login")}}" > 
                                {{ __('lang.login')}}
                            </a>
                        </li>
                        <li class="nav-item p-0 m-0"  >
                        
                            <a class="nav-link nav-custom" href="{{url("register")}}" > 
                                {{ __('lang.register')}}
                            </a>
                        </li>
                           @endguest


                        </ul>
                        <ul class="navbar-nav custom_ul ml-auto main-nav" >

                            @auth
                                @php
                                    $admin=Auth::user()->role;
                                @endphp

                                @if ($admin=='admin')
                                    <li class="nav-item p-0 m-0"  >
                                        <a class="nav-link nav-custom"   href="{{url('/dashboard')}}" > 
                                            {{ __('lang.dashboard')}}
                                        </a>
                                    </li>
                                @else
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <li class="nav-item p-0 m-0"  >
                                            <a class="nav-link nav-custom "   href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" > 
                                                {{ __('lang.logout')}}
                                            </a>
                                        </li>
                                    </form>
                                @endif
                               

                                
                            @endauth

                        </ul>
                </div>
            </nav>


        </section>
    </header>

