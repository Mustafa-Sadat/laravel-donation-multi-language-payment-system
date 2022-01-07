



@extends('master.fa.master')

@section('title')
    اهدا-پرداخت
@endsection

@section('css')



<style>
  /*Profile Card 5*/
  .profile-card-5{
    margin-top:20px;
  }
  .profile-card-5 .btn{
    border-radius:2px;
    text-transform:uppercase;
    font-size:12px;
    padding:7px 20px;
  }
  .profile-card-5 .card-img-block {
    width: 91%;
    margin: 0 auto;
    position: relative;
    top: -20px;
    
  }
  .profile-card-5 .card-img-block img{
    border-radius:2px;
    height:230px;
    object-fit: cover;
    transition: transform .2s linear;
  }
  .profile-card-5 .card-img-block img:hover{
    transform: scale(1.03)
  }
  .profile-card-5 h5 a{
    color:#232323  ;
    font-family: 'Cabin', serif;
    font-weight:600;
    text-decoration: none;
    font-size: 18px;
    line-height: 120%;
    font-weight: bold;
  }
  
  .profile-card-5 h5 a:hover{
    color:#358819  ;
  }
  
  .profile-card-5 p{
    font-weight:200 !important;
    font-size: 13px;
    font-family: 'Open Sans', sans-serif
  }
  .profile-card-5 .btn-success{
    background-color:#69bb4d  ;
    border-color:#69bb4d  ;
    font-weight: 600 !important;
  }
  .profile-card-5 .btn-success:hover{
    background-color:#358819  ;
    border-color:#358819 ;
  }
  

  .p-title h2{
    font-family:'Cabin','Open Sans', sans-serif !important;
    font-weight: 300 !important;
    letter-spacing: 1px;
  }
  
  
  
</style>
@endsection


@section('body')



<section class="mt-4 mb-5">
  <div class="container">
  
    <div class="p-title" style="text-align: right">
      <h2>  {{ __('lang.sponsorships')}}</h2>
      <a href="https://tomorrowshope.tv/" class="upper-title" style="text-align: left">  {{ __('lang.backhome')}}</a>
    </div>
    
    
    <div class="row">
      @foreach ($data as $item)
      <div class="col-log-4 col-md-4 mt-4">
        <div class="card profile-card-5 shadow">
          <div class="card-img-block">
            <a href="{{url('fa/familylist')}}/{{Crypt::encrypt($item->id)}}">
              <img class="card-img-top shadow" src="{{url('storage/app')}}/{{$item->img}}" alt="Card image cap">
            </a>
          </div>
          <div class="card-body pt-0">
            <h5 class="card-title">
              <a href="{{url('fa/familylist')}}/{{Crypt::encrypt($item->id)}}">
                {{$item->name}}
              </a>
            </h5>
            <p class="text-card">
              @php
              $disc=$item->disc;
              $disc=mb_substr($disc,0,180);
              echo $disc . ' ...';
              @endphp
            </p>
            <a href="{{url('fa/familylist')}}/{{Crypt::encrypt($item->id)}}" class="btn btn-success"> {{ __('lang.readmore')}} <span class="fa fa-angle-double-left mr-2"></span></a>
          </div>
        </div>
      </div>
      @endforeach
      
      <div class="mt-5 mb-3">
        {{ $data->links() }}
      </div>
    </div>
  </section>
  @endsection
  
  
  
  
  @section('jquery')
  @if (session()->has('payment-success'))
  <script>
    $(document).ready(function() {
      
      Command: toastr["success"]("Payment successfully")
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "8000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    });
    
  </script>
  @endif
  
  @if (session()->has('paypal-error'))
  <script>
    $(document).ready(function() {
      Command: toastr["error"]("پرداخت شما لغو شده است.")
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "8000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    });
    
  </script>
  @endif
  
  
  @if (session()->has('paypal-success'))
  <script>
    $(document).ready(function() {
      toastr.options.timeOut = 2500; // 1.5s
      Command: toastr["success"]("پرداخت با موفقیت انجام شد")
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "8000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    });
    
  </script>
  @endif
  
  @if (session()->has('paypal-wrong'))
  <script>
    $(document).ready(function() {
      Command: toastr["warning"]("مشکلی پیش آمده.")
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "8000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    });
    
  </script>
  
  @endif
  
  
  {{-- @if (session()->has('login'))
  <script>
    $(document).ready(function() {
      toastr.options.timeOut = 2500; // 1.5s
      Command: toastr["register"]("Register successfully")
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "8000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    });
    
  </script>
  @endif --}}
  {{-- session()->flash('login',"Login Successfully"); --}}
  
  @endsection