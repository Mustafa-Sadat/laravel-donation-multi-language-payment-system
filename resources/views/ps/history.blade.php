@extends('master.fa.master')
@section('title')
توضیحات-پرداخت
@endsection

@section('css')
<style>
  
    .myimg{
        width:100%;
        min-height:200px;
        max-height:450px;
        border-radius:4px;
        object-fit: cover;
    }
    .history-p{
        margin:0;
    }

     .btn-success{
    background-color:#69bb4d !important ;
    border-color:#69bb4d  !important;
    font-family: 'NassimPashto','Open Sans', sans-serif !important;
}
.rtl .btn-success{
    font-family: 'NassimPashto','Open Sans', sans-serif !important;
}
 .btn-success:hover{
    background-color:#358819  !important;
    border-color:#358819 !important;
}

 
.rtl .p-title h2, .rtl .p-title h5{
    font-family: 'NassimPashto','Open Sans', sans-serif !important;
    font-weight: 300 !important;
    letter-spacing: 1px;
  }
  
  .rtl .upper-title{
    font-family: 'NassimPashto','Open Sans', sans-serif !important;
  }
  .rtl .nav-link , .footer-heading , .rtl .footer-input , .rtl .footer-submit , .rtl .footer-end p , .history-p{
    font-family: 'NassimPashto','Open Sans', sans-serif !important;
  }

  .rtl strong , option {
    font-family: 'NassimPashto','Open Sans', sans-serif !important;
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


<section class="py-4 font_pashto">
    <div class="container">
        @foreach ($data as $item)
        <div class="p-title  modal-title mb-3">
            <h2 id="model_name">{{$item->name}}</h2>
            <a href="{{url('/ps')}}" class="upper-title mr-5"> مرستی کولو پاڼی ته تلل‎ </a>
          </div>
          <div class="row pt-3 pb-4">
            <div class="col-md-6 col-lg-6 product_img">
                <img src="{{url('storage/app')}}/{{$item->img}}" class="img-responsive mb-3 myimg" >
            </div>
            <div class="col-md-6 col-lg-6 product_content">
                <p class="history-p"><strong>مکمل نوم :</strong> <span class="mr-2"> <span id="model_place" >{{$item->name}}</span></p>
                <p class="history-p"><strong>ځای :</strong><span class="mr-2"> <span id="model_place" >{{$item->place}}</span></p>
                {{-- <p class="history-p"><strong>جنسبت :</strong><span class="mr-2"> <span id="model_gender">
                    @php
                        $gen=$item->gender;
                        if ($gen=='Male'){
                            echo  "نارینه‎";
                        }elseif($gen=='Female'){
                            echo "ښځینه‎";
                        }elseif($gen=='Other'){
                            echo "غیره";
                        }
                    @endphp
                   
                </span></p> --}}
                {{-- <p class="history-p"><strong>سال :</strong><span class="mr-2"> <span id="model_age"></span>{{$item->age}}</p> --}}
                <p class="history-p pt-1 text-card"> 
                    {{$item->disc}}
                </p>
                
                <hr>
                <form method="POST" action="{{url('ps-add_sponsor')}}" name="sponsorship_level" id="sponsorship_level">
                    @csrf
                    <div class="mb-3">
                        <h6 class="mb-3"><strong>مالی مرستي اندازه :</strong></h6>
                        <select name="select_level" class="custom-select btn-sucess" id="select_level">
                            <option value="50" selected>لومړنی ملاتړ: 50 پونډه</option>
                            <option value="100">کورنئ مصارف ملاتړ: 100 پونډه</option>
                            <option value="150">بشپړ ملاتړ: 150 پونډه</option>
                            <option value="0">نور</option>
                        </select>
                    </div>

                    <div class="form-group mt-5 mb-4 d-none other">
                        <h6 class="mb-3"><strong>د نورو سپانسرشپ اندازه :</strong></h6>
                        <input type="number" class="form-control other_level in-valide" max="10000000" name="other_level" placeholder="خپل د سپانسرشپ مقدار دلته داخل کړئ">
                    </div>

                    <div class="btn-ground">
                        <input type="hidden" name="hidden" value="{{$item->id}}">
                        <input  type="submit" class="btn btn-success" value="مرسته وکړۍ">
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
        Command: toastr["error"]("دا اندازه مالی مرسته مخکی انتخاب شوی ده!")
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
             var value=this.value;

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
                 var other_val=$('.other_level').val(' ');
             }
         });

   });
</script>

@endsection