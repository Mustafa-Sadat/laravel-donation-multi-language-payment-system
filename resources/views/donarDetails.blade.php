


@extends('dash.layout')

@section('title')
    Donors Details-donation
@endsection

@section('dash-css')

<style>
    .table-data-feature{
        justify-content: center !important;
        -webkit-justify-content:center !important;
    }
    
    .table img{
        height:60px;
        border-radius:2px;
    }
    
    
    
    .firstinfo {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .content {
        position: relative;
        animation: animatop 0.9s cubic-bezier(0.425, 1.14, 0.47, 1.125) forwards;
    }
    
    .card {
        /* width: 500px;
        min-height: 100px; */
        padding: 20px;
        border-radius: 3px;
        background-color: white;
        /* box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2); */
        position: relative;
        overflow: hidden;
    }
    
    .card:after {
        content: '';
        display: block;
        width: 190px;
        height: 300px;
        position: absolute;
        animation: rotatemagic 0.75s cubic-bezier(0.425, 1.04, 0.47, 1.105) 1s both;
        background:#69bb4d ;
    }
    
    
    
    
    .firstinfo {
        flex-direction: row;
        z-index: 2;
        position: relative;
        
    }
    
    
    .firstinfo .profileinfo {
        padding: 0px 20px;
    }
    

    
    .firstinfo .profileinfo h3 {
        font-size: 1.3em;
    }
    
   
    
    .text-null{
        padding:0 30px;
    }

    @media screen and (max-width:768px){
        .text-null{
        padding:0 5px;
    }
    }
    @keyframes animatop {
        0% {
            opacity: 0;
            bottom: -500px;
        }
        100% {
            opacity: 1;
            bottom: 0px;
        }
    }
    
    @keyframes animainfos {
        0% {
            bottom: 10px;
        }
        100% {
            bottom: -42px;
        }
    }
    
    @keyframes rotatemagic {
        0% {
            opacity: 0;
            transform: rotate(0deg);
            top: -24px;
            left: -253px;
        }
        100% {
            transform: rotate(-30deg);
            top: -24px;
            left: -78px;
        }
    }
    
</style>

@endsection

@section('dash-body')


<!-- USER DATA-->
<div class="user-data m-b-30 ">   
    
    <div class="pl-4 pr-4 my-3">
        <div class="content">
           <div class="row">
            <div class="col-lg-7 col-md-9 mx-auto">
                <div class="card  mx-auto shadow-sm">
                    <div class="firstinfo">
                        <p class="text-null"></p>
                        <div class="profileinfo">
                            <h3><span class="bold text-dark mr-1">Name : </span>{{$user[0]->name}}</h3>
                            <h6 class="text-muted " >Donor</h6>
                            <p class="bio"><span class="bold text-dark mr-1">Email : </span>{{$user[0]->email}}</p>
                            <p><span class="bold text-dark mr-1">Register Date : </span>
                                @php
                                    $date=date_create($user[0]->created_at);
                                    echo date_format($date,"Y/m/d");
                                @endphp    
                            </p>
                        </div>
                    </div>
                </div>
               </div>
           </div>
        </div>
    </div>
    
    
    <div class="container">
        {{-- ============================================================= --}}
        <div class="row">
            <div class="col-lg-8 col-md-8 mx-auto">
                <div class="table-responsive mb-5 shadow-sm">
                    <table class="table table-striped text-center table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-info">Total Payments</span><span class="fas fa-gbp ml-1"></th>
                                <th scope="col">Save To Cart</th>
                                <th scope="col">Support History</th>
                                {{-- <th scope="col">Total View</th> --}}
                            </tr>
                        </thead>
                        <tbody  style="color:#69bb4d ">
                            <td class="text-info"><span  id="balance">{{$data[0]}}</span><span class="fas fa-gbp ml-1"></span></td>
                            <td><span   id="draft">{{$data[1]}}</span><span class="fas  fa-bookmark ml-1"></span></td>
                            <td><span   id="supporter">{{$data[2]}}</span><span class="fas  fa-users ml-1"></span></td>
                            {{-- <td id="total_view">40</td> --}}
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        {{-- ============================================================= --}}
    </div>
    
    <h4 class="text-center">Support History</h4>
    
    <div class="table-responsive p-3 pt-4 text-center  shadow-sm" style="font-size:13px">
        <table class="table table-striped text-center table-bordered">
            
            <thead>
                <tr>
                    <th>#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Place</th>
                    <th scope="col" class="text-info"  style='font-size:14px;'>Sponsorship Level Price</span><span class="fas fa-gbp ml-1"></th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody id="table">
                @php
                    $count=1;
                @endphp
               @foreach ($history as $item)
                    <tr>
                        <td>{{$count++ }}</td>
                        <td>
                            <img src="{{url('storage/app')}}/{{$item->img}}" alt="">
                        </td>
                        <td>{{$item->supported_name}}</td>
                        <td>{{$item->age}}</td>
                        <td>{{$item->place}}</td>
                        <td class="text-info">{{$item->sponsorship_level}} </span><span class="fas fa-gbp ml-1"></td>
                        <td>
                            @php
                                $date=date_create($item->data);
                                echo date_format($date,"Y/m/d");
                            @endphp
                        </td>
                    </tr>
               @endforeach
            </tbody>
            {{-- <caption class="text-right mt-2 mb-2 mr-3 " id="modal_total"> </caption> --}}
        </table>
        <div class="mt-5 mb-3">
            {{ $history->links() }}
        </div>
    </div>
    
</div>

</div>
</div>



<div class="p-1">
    
</div>


@endsection


@section('dash-jquery')
<script>
    $('.user_delete').click(function(){
        var user_id=$(this).attr('data-user-delete');
        $("#hidden_id").val(user_id);
    });
    
    function UpdatePreview(){
        $('#uploadUpdate').attr('src', URL.createObjectURL(event.target.files[0]));
    };
    
    
</script>
@endsection