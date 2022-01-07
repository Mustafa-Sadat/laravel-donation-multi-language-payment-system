


@extends('master.fa.master')


@section('title')
       سپانسر-پرداخت
@endsection


 
@section('css')
<link href="{{url('public/assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
<style>
  .btn-success{
background-color:#69bb4d !important ;
border-color:#69bb4d  !important;
}

.rtl .btn-success{
font-family: 'NassimPashto','Open Sans', sans-serif !important;
}
.btn-success:hover{
background-color:#358819  !important;
border-color:#358819 !important;
}





.rtl .upper-title{
font-family: 'NassimPashto','Open Sans', sans-serif !important;
}
.rtl .nav-link , .footer-heading , .rtl .footer-input , .rtl .footer-submit , .rtl .footer-end p{
font-family: 'NassimPashto','Open Sans', sans-serif !important;
}

.rtl .p-title h2, .rtl .p-title h5{
font-family: 'NassimPashto','Open Sans', sans-serif !important;
font-weight: 300 !important;
letter-spacing: 1px;
}

.rtl table th , .rtl table td , caption , {
  font-family: 'NassimPashto','Open Sans', sans-serif !important;
}

.modal h5, .modal h6 , .modal button , .modal p{
  font-family: 'NassimPashto','Open Sans', sans-serif !important;
}



</style>
@endsection

@section('body')
    <div class="container mt-4 mb-5 font_pashto">
         
          <div class="p-title ">
            <h2 id="model_name">کارت</h2>
            <a href="{{url('/ps')}}" class="upper-title mr-5"> مرستی کولو پاڼی ته تلل‎ </a>
          </div>
      
        <div class="table-responsive  pt-3">

            <table class="table table-striped text-center">
                
                <thead>
                    <tr>
                      <th scope="col">انځور</th>
                      <th scope="col">مکمل نوم</th>
                      {{-- <th scope="col">کال</th> --}}
                      <th scope="col">ځای</th>
                      <th scope="col">مالی مرستي اندازه </th>
                      <th scope="col">ړنګول</th>
                    </tr>
                  </thead>
                  <tbody>

                    @php
                            $total=0;
                            $total_id;
                    @endphp
                    
                    @foreach ($data as $item)
                        <tr>
                          <td>
                              <img src="{{url('storage/app')}}/{{$item->img}}" alt="" style="height:60px;border-radius:4px;">
                          </td>
                          <td>{{$item->name}}</td>
                          {{-- <td>{{$item->age}}</td> --}}
                          <td>{{$item->place}}</td>
                          <td ><span style="font-size:20px">{{$item->sponsorship_level}}</span> <span style="font-size:16px"> پوند </span></td>
                          <td class="text-primary">
                            <a href="" class="supported_delete" data-toggle="modal" data-target="#supportedModalDelete" data-delete="{{$item->id}}"> 
                              <span class="fa fa-trash text-danger"></span>
                            </a>
                          </td>
                        </tr>

                        @php
                            $total+=$item->sponsorship_level;
                                                        
                        @endphp

                    @endforeach

                  </tbody>
                  <caption class="text-left mt-2 mb-2 ml-3">مجموعه :<span class="mr-2">{{$total}}</span><span class="mr-1"> پوند</span></caption>

            </table>
          </div>

          <div class="d-flex justify-content-end">
            <form method="POST" action="checkout">
              @csrf
              <input type="hidden" name="hidden" value="{{$total}}">
              <input type="hidden" name='{{$total}}' value="">
             @if ($total!=0)
              <input type="submit" value="بشپړ ی وګوره" class="btn btn-success">
             @else
             <input type="submit" value="Checkout" class="btn btn-success" disabled>
             @endif
            </form>
          </div>
    </div>




     <!-- modal Delete -->
			<div class="modal fade ltr" id="supportedModalDelete" tabindex="-1" role="dialog" aria-labelledby="supportedModalDelete" aria-hidden="true" >
				<div class="modal-dialog modal-sm" role="document">
					<form method="POST" action="deletefarsi">
              @csrf
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title text-right" id="smallmodalLabel">حذف</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <h6 class="text-right">ایا تاسو لرې کول غواړئ ؟</h6>
                  </div>
                  <div class="modal-footer mr-auto">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">لغوه کول</button>
                      <input type="hidden" name="hidden_delete" id="hidden_delete">
                      <button type="submit" class="btn btn-danger">ړنګول</button>
                  </div>
              </div>
          </form>
      </div>
    </div>
    <!-- end modal Delete -->



@endsection

@section('jquery')
    <script>
              $('.supported_delete').click(function(){
                var id=$(this).attr('data-delete');
                $("#hidden_delete").val(id);
            });

    </script>

  @if (session()->has('sponsor_draft'))
  <script>
    $(document).ready(function() {
        toastr.options.timeOut = 2500; // 1.5s
        Command: toastr["success"]("په بریالیتوب سره لیرې کړئ")
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
@endsection