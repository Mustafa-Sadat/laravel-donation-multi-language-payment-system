@extends('master.master')
@section('title')
    Details-donation
@endsection

@section('css')
<style>
  
   
    .history-p{
        margin:0;
        font-family: 'Cabin','Open Sans', sans-serif !important;
    }

     .btn-success{
    background-color:#69bb4d !important ;
    border-color:#69bb4d  !important;
}
 .btn-success:hover{
    background-color:#358819  !important;
    border-color:#358819 !important;
}

.product_content strong , .product_content span{
    font-family: 'Cabin','Open Sans', sans-serif !important;
}

.myimg{
        width:100%;
        min-height:200px;
        max-height:450px;
        border-radius:4px;
        object-fit: cover;
    }

::placeholder { 
  opacity: .6 !important; /* Firefox */
}

.invalid{
    border-color:red !important;
}


</style>
@endsection

@section('body')


<section class="py-4">
    <div class="container">
        @foreach ($data as $item)
        <div class="p-title  modal-title mb-3">
            <h2 id="model_name">{{$item->name}}</h2>
            <a href="{{url('/')}}" class="upper-title">BACK TO DONATE</a>
          </div>
        <div class="row pt-3 pb-4">
            <div class="col-md-6 col-lg-6 product_img">
                <img src="{{url('storage/app')}}/{{$item->img}}" class="img-responsive mb-3 myimg" >
            </div>
            <div class="col-md-6 col-lg-6 product_content">
                <p class="history-p"><strong>Full Name :</strong> <span class="mr-2"> <span id="model_place" >{{$item->name}}</span></p>
                <p class="history-p"><strong>Place :</strong><span class="mr-2"> <span id="model_place" >{{$item->place}}</span></p>
                {{-- <p class="history-p"><strong>Gender :</strong><span class="mr-2"> <span id="model_gender">{{$item->gender}}</span></p>
                <p class="history-p"><strong>Age :</strong><span class="mr-2"> <span id="model_age"></span>{{$item->age}}</p> --}}
                <p class="history-p pt-1 text-card"> 
                    {{$item->disc}}
                </p>
                
                <hr>
                <form method="POST" action="{{url('add_sponsor')}}" name="sponsorship_level" id="sponsorship_level">
                    @csrf
                    <div class="mb-3">
                        <h6 class="mb-3"><strong>Sponsorship Level :</strong></h6>
                        <select name="select_level" class="custom-select btn-sucess" id="select_level">
                            <option value="50" selected>Basic Support: £ 50</option>
                            <option value="100">Household Support: £ 100</option>
                            <option value="150">Full Support: £ 150</option>
                            <option value="">Other</option>
                        </select>
                    </div>

                    <div class="form-group mt-5 mb-4 d-none other">
                        <h6 class="mb-3"><strong>Other Sponsorship amount  :</strong></h6>
                        <input type="number" class="form-control other_level in-valide" max="10000000" name="other_level" placeholder="Enter your sponsorship amount here">
                    </div>

                    <div class="btn-ground">
                        <input type="hidden" name="hidden" value="{{$item->id}}">
                        <input  type="submit" class="btn btn-success" value="Sponsor Now">
                    </div>
                </form>
            </div>
        </div>
        @endforeach
        
    </div>
</section>

@endsection

@section('jquery')
    
@if (session()->has('sponsorship_level'))
  <script>
    $(document).ready(function() {
        Command: toastr["error"]("This sponsorship level is selected already!")
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

  <script>
       $(document).ready(function(){
            $('#select_level').change(function(){
                // var value=this.value;
                var value=$('#select_level').val();

                if(value == 0){
                    $('.other').removeClass('d-none');
                    
                    $("#sponsorship_level").submit(function(e){
                        var other_val=$('.other_level').val();
                        if(other_val==0){
                            e.preventDefault();
                            $('.other_level').addClass('invalid');
                         }
                         
                    });  

                     $('.other_level').keypress(function(){
                        $('.other_level').removeClass('invalid');
                    });

                }else{
                    $('.other').addClass('d-none');
                    $('.other_level').removeClass('invalid');
                    var other_val=$('.other_level').val('');
 
                }
            });

      });
  </script>
  
@endsection