

@extends('dash.layout')

@section('title')
    Family Details-donation
@endsection

@section('dash-css')

<style>
    .table-data-feature{
        justify-content: center !important;
        -webkit-justify-content:center !important;
    }
    
    .custome-img{
        height:50px;
        width:50px;
        border-radius:50%;
    }


/* ==========================================================================
   Credit Card Payment Section
   ========================================================================== */
.credit-card{
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.card-holder {
  /* margin: 2em 0; */
}

.img-box {    
 display: flex;
 justify-content: center;
 justify-items: center;
 align-items:center;
}
.img-box img {
 height:200px;
 width:200px;
 border-radius:50%;

}
.card-box {
  padding: 1em 1em;
  border-radius: 1px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  text-align: justify;
}
.bg-news {
  background: -webkit-linear-gradient(50deg, #69bb4d  28%, #ffffff 28%);
  background: -o-linear-gradient(50deg, #69bb4d  28%, #ffffff 28%);
  background: -moz-linear-gradient(50deg, #69bb4d  28%, #ffffff 28%);
  background: linear-gradient(50deg, #69bb4d  28%, #ffffff 28%);
}



@media (max-width: 768px) {
	.firstinfo{
        text-align: center;
        margin-top:10px;
        margin-bottom:10px;
        background: #ffffff
    }
}
    
    
</style>

@endsection

@section('dash-body')

    

    
    <!-- USER DATA-->
    <div class="user-data m-b-30 ">  
        
        
        <section class="credit-card">
            <div class="container">
               <div class="card-holder mb-5">
                 <div class="card-box bg-news">
                  <div class="row">
                   <div class="col-lg-4 img-box">
                    <div >
                      <img src="{{url('storage/app')}}/{{$data[0]->img}}" class="img-fluid" />
                    </div>
                   </div>
                   <div class="col-lg-8 firstinfo p-3">
                        <div class="">
                            <h5 class="text-muted mb-2"><span class="bold text-dark mr-1">Full Name : </span>{{$data[0]->name}}</h5>
                            <h6 class="text-muted mb-2"><span class="bold text-dark mr-1">Place : </span>{{$data[0]->place}}</h6>
                            <h6 class="text-muted mb-2"><span class="bold text-dark mr-1">Gender : </span>{{$data[0]->gender}}</h6>
                            <h6 class="text-muted mb-2"><span class="bold text-dark mr-1">Language : </span>{{$data[0]->language}}</h6>
                            <h6 class="text-muted mb-2"><span class="bold text-dark mr-1">Age : </span>{{$data[0]->age}}</h6>
                            <p style="font-size:13px" class="text-muted mb-2">
                                {{$data[0]->disc}}
                            </p>
                            <h6 class="text-muted mb-2"><span class="bold text-dark mr-1">Date : </span>
                                @php
                                    $date=date_create($data[0]->created_at);
                                    echo date_format($date,"Y/m/d");
                                @endphp
                            </h6>

                         </div>
                   </div><!--/col-lg-6 --> 
             
                  </div><!--/row -->
                 </div><!--/card-box -->
               </div><!--/card-holder -->		 
               
            </div><!--/container -->
           </section>


           <div class="container">
            {{-- ============================================================= --}}
            <div class="row">
                <div class="col-lg-8 col-md-8 mx-auto">
                    <div class="table-responsive mb-5 shadow-sm">
                        <table class="table table-striped text-center table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-info">Total Sponsors</span><span class="fas fa-gbp ml-1"></th>
                                    <th scope="col">Save To Cart</th>
                                    <th scope="col">Total Supporters</th>
                                    {{-- <th scope="col">Total View</th> --}}
                                </tr>
                            </thead>
                            <tbody  style="color:#69bb4d ">
                                <td class="text-info"><span  id="balance">{{$balance[0]}}</span><span class="fas fa-gbp ml-1"></span></td>
                                <td><span   id="draft">{{$balance[1]}}</span><span class="fas  fa-bookmark ml-1"></span></td>
                                <td><span   id="supporter">{{$balance[2]}}</span><span class="fas   fa-users ml-1"></span></td>
                                {{-- <td id="total_view">40</td> --}}
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            {{-- ============================================================= --}}
        </div>

        
        <div class="container">
            <h3 class="text-center">Supporters</h3>
            <div class="table-responsive pt-4 text-center" style="font-size:13px">
                
                <table class="table table-striped  text-center table-bordered shadow-sm">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th scope="col">Sponsor Name</th>
                          <th scope="col">Email</th>
                          <th scope="col"  style='font-size:14px;' class="text-info">Sponsorship Level Price </span><span class="fas fa-gbp ml-1"></th>
                          <th scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody id="table_modal">
                          @php
                              $num=1;
                          @endphp
                           @foreach ($sponsor as $item)
                            <tr>
                                <td>{{$num++ }}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td class="text-info" style="font-size:15px">{{$item->sponsorship_level}} </span><span class="fas fa-gbp ml-1"></td>
                                <td>
                                    @php
                                        $date=date_create($item->updated_at);
                                        echo date_format($date,"Y/m/d");
                                    @endphp
                                </td>
                            </tr>
                           @endforeach
                      </tbody>
                      <caption class="text-right mt-2 mb-2 mr-3 " id="modal_total"> </caption>
                </table>
                <div class="mb-3">
                    {{ $sponsor->links() }}
                </div>
            </div>
            
        </div>

    </div>
</div>
    
<div class="p-1">

</div>


    @endsection
    
