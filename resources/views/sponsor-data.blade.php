


@extends('dash.layout')

@section('title')
    Payment Log-donation
@endsection

@section('dash-css')

<style>
    .table-data-feature{
        justify-content: center !important;
        -webkit-justify-content:center !important;
    }
    
    .table img{
        height:40px;
        border-radius:3px;
    }
</style>

@endsection

@section('dash-body')



        @if (session()->has('sponsor_delete'))
        <div class="alert alert-success alert-dismissible fade show myAlert" >
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('sponsor_delete')}}
        </div>
        @endif



<!-- USER DATA-->
<div class="user-data m-b-30 ">    
    <div class=" d-flex justify-content-between pr-4 pl-4">
        <h3 class="title-3 p-0 m-0"><i class="	fa fa-dollar"></i>Payment Log</h3>
    </div>
    <div class="pl-4 pr-4 d-flex justify-content-end mt-3">
        <form method="post" action="paymentlog">
            @csrf
            <div class="form-header" >
                @if (empty($search))
                            <input class="au-input au-input--xl" type="text" name="search_value" placeholder="Search ..." />
                        @else
                            <input class="au-input au-input--xl" type="text" name="search_value" placeholder="Search ..." / value="{{$search}}">   
                        @endif
                <button class="au-btn--submit bg-success" type="submit">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </form>
    </div>
    
    <div class="table-responsive p-3 pt-4 text-center" style="font-size:13px">
        <table class="table table-striped table-bordered shadow-sm">
            <thead>
                <tr>
                    <th class="max-with:20px !important;">#</th>
                    <th >Sponsor Name</th>
                    <th >Email</th>
                    {{-- <th class="text-info">Total Payments <i class="fa fa-dollar ml-1"></i></th> --}}
                    <th>Date</th>
                    <th>View Details</th>
                    
                </tr>
            </thead>
            <tbody>
                @php
                $count=1;
                @endphp
                
                @foreach ($data as $item)
                <tr >
                    <td >@php echo $count++ @endphp</td>
                    <td >{{$item->username}}</td>
                    <td>{{$item->email}}
                    </td>
                    {{-- <td class="text-info bold" style="font-size:16px" id="total_payments">50<i class="fa fa-dollar ml-1"></i></td> --}}
                    <td>
                        @php
                            $date=date_create($item->created_at);
                            echo date_format($date,"Y/m/d");
                        @endphp
                    </td>
                    
                    <td >
                        <div class="table-data-feature">
                                <button class="item supported sponsor_data_view"   type="button" data-toggle="modal" data-target="#sponsor_data_view"  data-username="{{$item->username}}" data-email="{{$item->email}}" data-created="{{$item->created_at}}">
                                    <i class="fas fa-bar-chart-o text-info" style="font-size:14px m-2;"></i>
                                </button>
                            </form>
                            <button class="item sponsor_data_delete ml-2" type="button" data-toggle="modal" data-target="#sponsor_data_delete"  data-username="{{$item->username}}" data-email="{{$item->email}}" data-created="{{$item->created_at}}" >
                                <i class="zmdi zmdi-delete text-danger"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                @endforeach
                
            </tbody>
        </table>
        <div class="mt-5 mb-3">
            {{ $data->links() }}
        </div>
    </div>
</div>

</div>
</div>

<div class="p-1">
    
</div>

<!-- modal Delete -->
<div class="modal fade" id="sponsor_data_delete" tabindex="-1" role="dialog" aria-labelledby="sponsor_data_delete" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="POST" action="sponsorDelete">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>do you want to delete it? </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="hidden_username" id="hidden_username">
                    <input type="hidden" name="hidden_email" id="hidden_email">
                    <input type="hidden" name="hidden_created" id="hidden_created">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end modal Delete -->




<div class="modal fade" id="sponsor_data_view" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="font-size:12px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Payment By <span class="text-muted">Donor</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="text-center mb-2">
                    <h4 class="text-muted" id="donar_name"></h4>
                    <p class="text-muted" id="donar_email"></p>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-7 mx-auto">
                        <div class="table-responsive mb-3 shadow-sm">
                            <table class="table table-striped text-center table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-info">Total Payments <i class="fa fa-dollar ml-1"></i></th>
                                        <th scope="col">Support History</th>
                                        <th scope="col">Payment Date</th>
                                    </tr>
                                </thead>
                                <tbody  style="color:#69bb4d ">
                                    <td  class="text-info" style="font-size:15px"><span  id="payment"></span><span class="fas fa-gbp ml-1"></span></td>
                                    <td><span   id="supporter"></span><span class="fas   fa-users ml-1"></span></td>
                                    <td id="datepayment"></td>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>

                <div class="text-center mb-2 mt-1">
                    <h4 class="text-muted">Support History </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center table-bordered shadow-sm">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th scope="col">Photo</th>
                              <th scope="col">Name</th>
                              <th scope="col">Age</th>
                              <th scope="col">Place</th>
                              {{-- <th scope="col"  ></th> --}}
                              <th class="text-info" style='font-size:14px;'>Sponsorship Level Price<i class="fa fa-gbp ml-1"></i></th>
                            </tr>
                          </thead>
                          <tbody id="table">
                          </tbody>
                    
                    </table>
                  </div>
    
            </div>
        </div>
    </div>
</div>
<!-- end modal large -->





@endsection


@section('dash-jquery')
<script>
    $('.sponsor_data_delete').click(function(){
        var username=$(this).attr('data-username');
        var email=$(this).attr('data-email');
        var created=$(this).attr('data-created');
        $("#hidden_username").val(username);
        $("#hidden_email").val(email);
        $("#hidden_created").val(created);
    });

    $('.sponsor_data_view').click(function(){
        var username=$(this).attr('data-username');
        var email=$(this).attr('data-email');
        var created=$(this).attr('data-created');
        $url='sponsor_data_view/'+username+'/'+email+'/'+created;
        var count=1;
        $.get($url,function(data){
            console.log(data);
            var total=0;
            $("#table").empty();
            data.forEach(element => {
                $("#table").append("<tr>"+"<td>"+count++ +"</td>"+"<td>"+ "<img src='{{url('storage/app')}}"+"/"+element.img+" ' >"+ "</td>"+"<td>"+element.name+"</td>"+"<td>"+element.age+"</td>"+"<td>"+element.place+"</td>"+"<td class='text-info' style='font-size:15px;'>"+element.sponsorship_level+" £</td>"+"</tr>");
                total+=element.sponsorship_level;
                count;
            });
            $("#payment").empty();
            $("#payment").append('<span class="ml-2">'+total+'<span class="bold ml-1">');
            $("#supporter").empty();
            $("#supporter").text(count);
    
        });

        $("#datepayment").empty();
        $("#datepayment").text(created);


        $("#donar_name").empty();
        $("#donar_name").text(username);
        $("#donar_email").empty();
        $("#donar_email").text(email);
        
        
        
    });


</script>
@endsection