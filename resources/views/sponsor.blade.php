


@extends('master.master')


@section('title')
  Sponsor-donation
@endsection


 
@section('css')
<link href="{{url('public/assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <style>
         .btn-success{
    background-color:#69bb4d !important ;
    border-color:#69bb4d  !important;
}
 .btn-success:hover{
    background-color:#358819  !important;
    border-color:#358819 !important;
}

.p-title h2, th,td,caption{
    font-family:'Cabin','Open Sans', sans-serif !important;
  }
  
    </style>
@endsection

@section('body')
    <div class="container mt-4 mb-5">
         
          <div class="p-title ">
            <h2 id="model_name">Cart</h2>
          </div>
      
        <div class="table-responsive">
            <table class="table table-striped text-center">
                
                <thead>
                    <tr>
                      <th scope="col">Photo</th>
                      <th scope="col">Name</th>
                      {{-- <th scope="col">Age</th> --}}
                      <th scope="col">Place</th>
                      <th scope="col">Sponsorship Level Price</th>
                      <th scope="col">Remove</th>
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
                          <td><span  class="mr-1">£</span>{{$item->sponsorship_level}}</td>
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
                  <caption class="text-right mt-2 mb-2 mr-3">Total :<span class="ml-2">£</span><span class="ml-1">{{$total}}</span></caption>
            </table>
          </div>

          <div class="d-flex justify-content-end">
            <form method="POST" action="checkout">
              @csrf
              <input type="hidden" name="hidden" value="{{$total}}">
              <input type="hidden" name='{{$total}}' value="">
             @if ($total!=0)
              <input type="submit" value="Checkout" class="btn btn-success">
             @else
             <input type="submit" value="Checkout" class="btn btn-success" disabled>
             @endif
            </form>
          </div>
    </div>




     <!-- modal Delete -->
			<div class="modal fade" id="supportedModalDelete" tabindex="-1" role="dialog" aria-labelledby="supportedModalDelete" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<form method="POST" action="delete">
              @csrf
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="smallmodalLabel">Remove</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <h6>Do you want to remove it?</h6>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <input type="hidden" name="hidden_delete" id="hidden_delete">
                      <button type="submit" class="btn btn-danger">Remove</button>
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
        Command: toastr["success"]("Remove Successfully ")
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