


@extends('dash.layout')

@section('title')
    Data-donation
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
    
    .dis{
        max-width: 230px;
        /* max-height: 100px; */
        /* overflow-y: scroll; */
        padding:8px;
        font-size:10px;
        text-align: start;
    }
    .dis-p {
        /* min-width: 400px; */
        max-height: 100px;
        overflow-y: scroll;
        background: #ccc;
        padding:8px;
    }
    
</style>

@endsection

@section('dash-body')

    
    
    <!-- USER DATA-->
    <div class="user-data m-b-30 ">    
        {{-- <div class=" pr-4 pl-4 text-center">
            <h3 class="title-3 p-0 m-0"><i class="zmdi zmdi-account-calendar"></i>Mustafa Sadat</h3>
            <p class=" text-mute" style="font-size:13px">mustafa@gamil.com</p>
        </div> --}}
        <div class="table-responsive p-3 pt-4 text-center" style="font-size:13px">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">image</th>
                      <th scope="col">Name</th>
                      <th scope="col">sponsorship Level</th>
                      <th scope="col">Count</th>
                      <th scope="col">Total Item</th>
                    </tr>
                  </thead>
                  <tbody>

                    @php
                            $total=0;
                    @endphp
                    
                    @foreach ($data as $item)
                        <tr>
                          <td>
                              <img src="{{url('storage/app')}}/{{$item->img}}" alt="" style="height:60px;">
                          </td>
                          <td>{{$item->name}}</td>
                          <td><span class="bold mr-1">$</span>{{$item->sponsorship_level}}</td>
                          <th>2</th>
                          <td class="text-info">@php echo $item->count *$item->sponsorship_level @endphp <span class="bold ml-1">$</span> </td>
                        </tr>

                        @php
                            $total+=$item->count *$item->sponsorship_level;
                        @endphp

                    @endforeach

                  </tbody>
                  <caption class="text-right mt-2 mb-2 mr-3">Total <span class="text-info">{{$item->total_price}}<span class="bold ml-1">$</span></span></caption>
            </table>
        </div>
    </div>

    </div>
</div>
    
<div class="p-1">

</div>


    
@endsection
    