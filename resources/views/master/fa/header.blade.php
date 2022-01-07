<!DOCTYPE html>
<html lang="fa">
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans ">



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
            direction: ltr;
        }
        .btn-success{
            background-color:#69bb4d  ;
            border-color:#69bb4d  ;
            
        }
        .rtl .btn-success{
            font-family: 'NassimFarsi', sans-serif  !important ; 
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

        @media screen and (max-width:768px){
            .custom_ul{
                font-size:12px;
                display: flex !important;
                flex-direction: row
            }
            .rtl .custom_ul{
                font-size: 14px;
            }
            .custom_ul li{
                display: inline;
            }
            .responsive{
                display: flex;
                flex-direction: column;
            }
            .responsive div{
                margin-top:20px;
            }
            .responsive #logo{
                width:90px;
                align-self: center;
                object-fit: contain
            }
        
        }
        @media screen and (max-width:600px){
            .custom_ul{
                font-size:11px;
                margin-left:5px;
                margin-right:5px;
            }
           
        }
        @media screen and (max-width:500px){
            .custom_ul{
                font-size:10px;
            }
            .rtl .custom_ul{
                font-size:12px;
            }
            .custom_ul .nav-item{
                padding-right:6px;
                padding-left:6px;
            }
           
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
  .rtl .upper-title {
      font-size: 15px;
  }
  
  .rtl .upper-title{
    top: 13px;
    left: 15px;
    right: auto;
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
  .rtl .upper-title:after {
    padding-right: 5px;
  }

  .upper-title i.fa {
    display: none;
  }
        
</style>

    @yield('css')
</head>
<body class="rtl">
    
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
                        <img src="{{ __('lang.banner')}}" alt="" id="bannar"  class="mr-4 logo_img ">
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
                        <ul class="toggole--ul" >
        
                            @auth
                            <li class="nav-item p-0 m-0 "  >
                                <a class="nav-link nav-custom   rtl-border" href="{{ __('lang.sponsor_link')}}" > 
                                     {{ __('lang.card')}}
                                     
                                     
                                </a>
                            </li>
                            @endauth
                            
                           @guest
                           <li class="nav-item p-0 m-0"  >
                            <a class="nav-link nav-custom   rtl-border" href="{{url("login")}}" > 
                                {{ __('lang.login')}}
                            </a>
                            </li>
                            <li class="nav-item p-0 m-0"  >
                            
                                <a class="nav-link nav-custom   rtl-border" href="{{url("register")}}" > 
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
                                   <a class="nav-link nav-custom   rtl-border"   href="{{url('/dashboard')}}" > 
                                       {{ __('lang.dashboard')}}
                                   </a>
                               </li>
                           @else
                               <form method="POST" action="{{ route('logout') }}">
                                   @csrf

                                   <li class="nav-item p-0 m-0"  >
                                       <a class="nav-link nav-custom   rtl-border"   href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" > 
                                           {{ __('lang.logout')}}
                                       </a>
                                   </li>
                               </form>
                           @endif
                          

                           
                       @endauth
                        </ul>
                    </ul>

                        <ul class="navbar-nav custom_ul mr-auto" id="main-nav-farsi">

                            @auth
                            @php
                                $admin=Auth::user()->role;
                            @endphp

                            @if ($admin=='admin')
                                <li class="nav-item p-0 m-0 "  >
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
                        <ul class="navbar-nav custom_ul ml-auto " id="main-nav-farsi" >
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
                            <li class="nav-item p-0 m-0"  >
                                <a class="nav-link nav-custom" href="{{url( __('lang.sponsor_link'))}}" > 
                                    {{ __('lang.card')}}
                                     <span class="	fa fa-credit-card ml-2"></span>
                                </a>
                            </li>
                            @endauth
                          
                        </ul>
                </div>
            </nav>
        </section>
    </header>

