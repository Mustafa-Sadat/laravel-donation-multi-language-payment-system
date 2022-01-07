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
}
 .btn-success:hover{
    background-color:#358819  !important;
    border-color:#358819 !important;
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
            <a href="{{url('/fa')}}" class="upper-title mr-5"> بازگشت به صفحه اهدا</a>
          </div>
          <div class="row pt-3 pb-4">
            <div class="col-md-6 col-lg-6 product_img">
                <img src="{{url('storage/app')}}/{{$item->img}}" class="img-responsive mb-3 myimg" >
            </div>
            <div class="col-md-6 col-lg-6 product_content">
                <p class="history-p"><strong>نام مکمل :</strong> <span class="mr-2"> <span id="model_place" >{{$item->name}}</span></p>
                <p class="history-p"><strong>مکان :</strong><span class="mr-2"> <span id="model_place" >{{$item->place}}</span></p>
                {{-- <p class="history-p"><strong>جنسبت :</strong><span class="mr-2"> <span id="model_gender">
                    @php
                        $gen=$item->gender;
                        if ($gen=='Male'){
                            echo  "مرد";
                        }elseif($gen=='Female'){
                            echo "زن";
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
                <form method="POST" action="{{url('fa-add_sponsor')}}" name="sponsorship_level" id="sponsorship_level">
                    @csrf
                    <div class="mb-3">
                        <h6 class="mb-3"><strong>مقدار حمایت مالی :</strong></h6>
                        <select name="select_level" class="custom-select btn-sucess" id="select_level">
                            <option value="50" selected>حمایت ابتدایی: 50 پوند</option>
                            <option value="100">حمایت مصارف خانه: 100 پوند</option>
                            <option value="150">حمایت کامل: 150 پوند</option>
                            <option value="0">سایر</option>
                        </select>
                    </div>

                    <div class="form-group mt-5 mb-4 d-none other">
                        <h6 class="mb-3"><strong>سایر مبلغ حمایت مالی  :</strong></h6>
                        <input type="number" class="form-control other_level in-valide" max="10000000" name="other_level" placeholder="مبلغ حمایت مالی خود را اینجا وارد کنید">
                    </div>

                    <div class="btn-ground">
                        <input type="hidden" name="hidden" value="{{$item->id}}">
                        <input  type="submit" class="btn btn-success" value="اسپانسر کن">
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
        Command: toastr["error"]("این مقدار حمایت مالی  قبلاً انتخاب شده است!")
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