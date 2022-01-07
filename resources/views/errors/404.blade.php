@extends('master.master')

@section('css')
    <style>
        .big-message-block {
    display: block;
    padding: 110px 0;
    padding-top: 110px;
    padding-right: 0px;
    padding-bottom: 110px;
    padding-left: 0px;
    text-align: center;
    color:#3b3b3b;
    
}
.big-message-block h1 {
    font-size: 54px;
    font-weight: bold;

}
h3 {
    font-size: 20px;
}
    </style>
@endsection

@section('body')

<section class="mt-4 mb-5">
    <div class="container">
    
      <div class="p-title">
        <h2 style="background-color: #358819;">Error 404</h2>
        <a href="{{url('/')}}" class="upper-title">BACK TO HOMEPAGE</a>
      </div>

      <div class="big-message-block">
        <h1>Error 404</h1>
        <h3>Page Not Found</h3>
        <p>No worries, page just doesn't exist.<br/>Please navigate to <a href="{{url('/')}}"><strong>homepage</strong></a> or any other existing page.</p>
    </div>

    </div>
</section>
@endsection