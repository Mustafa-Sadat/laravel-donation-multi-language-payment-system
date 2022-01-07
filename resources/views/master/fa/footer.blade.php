



    <footer class="pb-3 pt-4" >
        <div class="container" style="padding-top: 10px">
            <div class="row">
                <div class="col-lg-4 col-mg-4">
                    <h4 class="mb-2 footer-heading">{{ __('lang.tomorrowshope')}}</h4>
                    <hr style="color:white;background-color:rgba(255,255,255,0.2);">
                    <a href="#">
                        <img src="{{url('public/assets/images/logo.png')}}" alt="" style="height:100px">
                    </a>
                    <ul class="mt-5 media media-1 ml-0 pl-0" style="padding:0 !important">
                        <li class="background: #55acee"><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-youtube"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-mg-4">
                    <h4 class="mb-2 footer-heading">{{ __('lang.address')}}</h4>
                    <hr style="color:white;background-color:rgba(255,255,255,0.2);">
                    <ul class="mt-1  ml-0 pl-0 custome" style="padding:0 !important">
                        <li>Donation</li>
                        <li>6 Station Parade</li>
                        <li>South Harrow</li>
                        <li>Harrow</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-mg-4">
                    <h4 class="mb-1 footer-heading">{{ __('lang.newsletter')}}</h4>
                    <hr style="color:white;background-color:rgba(255,255,255,0.2);">
                    <input type="text" name="" id="" class=" mt-3 p-3 footer-input"  placeholder="{{ __('lang.sendEmail')}}"><br>
                    <button class=" mt-4 footer-submit" type="submit" >{{ __('lang.send')}}</button>

                    <div class="">
                        <h5 class="mb-1 footer-heading mt-5 media-1"  style = "font-family:{{ __('lang.font-family')}} !important;">{{ __('lang.privacy')}}</h4>
                        <hr style="color:white;background-color:rgba(255,255,255,0.2);" class="mb-3 media-1">
                        <a href="{{ __('lang.privacy_link')}}" class=" media-1" style="color:#c5c5c5; font-family:{{ __('lang.font-family')}} !important; font-weight:200 !important;text-decoration:none;font-size:17px !important;" >{{ __('lang.privacy')}}</a>
                   </div>

                </div>

                <div class="col-lg-4 col-md-4">
                    <ul class="mt-4 mb-5 media media-2 ml-0 pl-0" style="padding:0 !important;">
                        <li class="background: #55acee"><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-youtube"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                    </ul>
                    <div class="mb-4" >
                        <h5 class="mb-1 footer-heading mt-5  media-2" style = "font-family:{{ __('lang.font-family')}} !important;">{{ __('lang.privacy')}}</h4>
                        <hr style="color:white;background-color:rgba(255,255,255,0.2);" class="mb-3  media-2">
                        <a href="#" class=" media-2"  style="color:#c5c5c5; font-family:{{ __('lang.font-family')}} !important; font-weight:200 !important;text-decoration:none; font-size:17px !important;" >{{ __('lang.privacy')}}</a>
                   </div>
                </div>
            </div>
        </div>
    </footer>
    <div class=" text-white footer-end " >
        <div class="container">
            <div class="bottom-footer">
                <p class="m-0 p-0 pb-2 text-white">{{ __('lang.Copyright')}}</p>
                <a href="#" target="_blank">Powered By Sayed Mustafa</a>
            </div>
        </div>
    </div>
  


  
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        setInterval(() => {
            $(".myAlert").fadeOut('slow');
        }, 5000);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
    
    <script>
    
        $(".toggole-btn").click(function(){
            $(".toggole--ul").toggleClass("add");
        });

        $('.top-btn').click(function(){
            $(".navbar-top-mobile").toggleClass("add");
        });
    </script>

    @yield('jquery')

    
</body>
</html>