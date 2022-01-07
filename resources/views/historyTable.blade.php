

@extends('dash.layout')

@section('title')
    Family List-donation
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

    
    
    
    @if (session()->has('supporteds'))
        <div class="alert alert-success alert-dismissible fade show myAlert" >
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('supporteds')}}
        </div>
    @endif

    @if (session()->has('supporteds_update'))
        <div class="alert alert-success alert-dismissible fade show myAlert" >
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('supporteds_update')}}
        </div>
    @endif

    @if (session()->has('supporteds_delete'))
        <div class="alert alert-success alert-dismissible fade show myAlert" >
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('supporteds_delete')}}
        </div>
    @endif


    

    
    
    <!-- USER DATA-->
    <div class="user-data m-b-30 ">    
        <div class=" d-flex justify-content-between pr-4 pl-4">
            <h3 class="title-3 p-0 m-0 mb-3"><i class="zmdi zmdi-account-calendar "></i>Family List</h3>
            <a href="addhistory" class="btn btn-success align-self-start" style="font-size: 13px">Add New</a>
        </div>
        <div class="pl-4 pr-4 d-flex justify-content-end mt-3">
            <div class="mr-auto mb-3">
                <form method="POST" action="familylist">
               <div class="row">
                    @csrf
                   <div class="col-md-6">
                    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                        
                        @if($lang=="Farsi")
                        <select class="js-select2" name="lang">
                            <option value="" >Language  ({{$langAll}}) </option>
                            <option value="Farsi" selected>Farsi  ({{$langFarsi}})</option>
                            <option value="Pashto" >Pashto  ({{$langPashto}})</option>
                            <option value="English" >English  ({{$langEnglish}})</option>
                        </select>
                        @elseif($lang=="Pashto")
                        <select class="js-select2" name="lang">
                            <option value="" >Language  ({{$langAll}}) </option>
                            <option value="Farsi">Farsi  ({{$langFarsi}})</option>
                            <option value="Pashto" selected>Pashto  ({{$langPashto}})</option>
                            <option value="English" >English  ({{$langEnglish}})</option>
                        </select>
                        @elseif($lang=="English")
                        <select class="js-select2" name="lang">
                            <option value="" >Language  ({{$langAll}}) </option>
                            <option value="Farsi">Farsi  ({{$langFarsi}})</option>
                            <option value="Pashto">Pashto  ({{$langPashto}})</option>
                            <option value="English" selected>English  ({{$langEnglish}})</option>
                        </select>
                        @else
                            <select class="js-select2" name="lang">
                                <option value="" selected>Language  ({{$langAll}}) </option>
                                <option value="Farsi">Farsi  ({{$langFarsi}})</option>
                                <option value="Pashto">Pashto  ({{$langPashto}})</option>
                                <option value="English">English  ({{$langEnglish}})</option>
                            </select>
                        @endif
                        <div class="dropDownSelect2"></div>
                    </div>
                   </div>
                   <div class="col-md-6">
                    <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                        <button type="submit" class="btn btn-success align-self-center" style="font-size: 13px">Select</button>
                    </div>
                   </div>
                  
               
               </div>
            </form>
            </div>

            <form method="POST" action="familylist">
                @csrf
                <div class="form-header" >
                    @if (empty($search))
                        <input class="au-input au-input--xl" type="text" name="search_value" placeholder="Search ... " />
                    @else
                        <input class="au-input au-input--xl" type="text" name="search_value" placeholder="Search ... " / value="{{$search}}">   
                    @endif
                    <button class="au-btn--submit bg-success" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </div>
            </form>
            
        </div>
        

        <div class="table-responsive p-4 pt-2 text-center" style="font-size:13px">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="max-with:20px !important;">#</th>
                        <th >Photo</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Place</th>
                        <th>Language</th>
                        <th >settings</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count=1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td >@php echo $count++ @endphp</td>
                        <td>
                            <img src="{{asset('storage/app')}}/{{$item->img}}" alt="person" class="custome-img">
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->age}}</td>
                        <td>
                            @if ($item->gender=='Female')
                                <span style="color:#09b83e;">{{$item->gender}}</span>
                            @elseif($item->gender=='Male')
                                 <span style="color:#0084ff;">{{$item->gender}}</span>
                            @else
                                <span >{{$item->gender}}</span>
                            @endif
                        </td>
                        <td>{{$item->place}}</td>
                        <td>{{$item->language}}</td>
                        <td >
                            <div class="table-data-feature">
                                <a class="item supported" href="historydetails/{{$item->id}}">
                                    <i class="fas fa-bar-chart-o text-info"></i>
                                </a>
                                @if ($item->language=='Pashto')
                                    <a class="item supported" href="{{url('ps/familylist')}}/{{Crypt::encrypt($item->id)}}">
                                        <i class="zmdi zmdi-eye text-primary"></i>
                                    </a>
                                @elseif($item->language=='Farsi')
                                    <a class="item supported" href="{{url('fa/familylist')}}/{{Crypt::encrypt($item->id)}}">
                                        <i class="zmdi zmdi-eye text-primary"></i>
                                    </a>
                                @else
                                    <a class="item supported" href="{{url('familylist')}}/{{Crypt::encrypt($item->id)}}">
                                        <i class="zmdi zmdi-eye text-primary"></i>
                                    </a>
                                @endif
                               
                                <button class="item supported" type="button" data-toggle="modal" data-target="#supportedModal" data-update="{{$item->id}}">
                                    <i class="zmdi zmdi-edit " style="color:#69bb4d "></i>
                                </button>
                                <button class="item supported_delete" type="button" data-toggle="modal" data-target="#supportedModalDelete" data-delete="{{$item->id}}">
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


     <!-- modal Update -->
			<div class="modal fade" id="supportedModal" tabindex="-1" role="dialog" aria-labelledby="supportedModal" aria-hidden="true">
				<div class="modal-dialog modal-md" role="document">
                    <form method="POST" action="supportedUpdate" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="name" class=" form-control-label">Full Name :</label>
                                        <input type="text" id="model_name" placeholder="Enter name .  .  ." class="form-control " name="model_name" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="place" class=" form-control-label">Place :</label>
                                        <input type="text" id="model_place" placeholder="Enter place .  .  ." class="form-control" name="model_place" required>
                                    </div>
                                    <div class="form-group" >
                                        <label for="gender">Select Gender :</label>
                                        <select class="form-control" id="model_gender" style="font-size:13px !important" name="model_gender" >
                                                <option disabled selected>Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                        </select>
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="age" class=" form-control-label">Age :</label>
                                        <input type="number" id="model_age" placeholder="Enter Age .  .  ." class="form-control" name="model_age" required>
                                    </div>

                                    <div class="form-group" >
                                        <label for="gender">Language :</label>
                                        <select class="form-control" id="model_language" style="font-size:13px !important" name="model_language" >
                                                <option disabled selected>Language</option>
                                                <option value="Farsi">Farsi</option>
                                                <option value="Pashto">Pashto</option>
                                                <option value="English">English</option>
                                        </select>
                                    </div>

                                    <div class=" form-group">
                                        <label for="disc" class=" form-control-label">Description :</label>
                                        <textarea style="color:#666666 !important" name="model_disc" id="model_disc" rows="10" placeholder="Enter Content .  .  ." class="form-control" required></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="img" class=" form-control-label">Photo :</label>
                                        <input type="file" id="img_file" placeholder="Image" class="form-control" name="img_file" onChange="UpdatePreview()" onChange="UpdatePreview()" >
                                        <input type="hidden" id="modal_hidden_img" name="modal_hidden_img">
                                        <img src="http://127.0.0.1:8000/assets/images/icon/avatar-01.jpg" alt="" style="height:130px;" class="mt-2" id="model_img" name="model_img">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="hidden" name="hidden" id="hidden">
                                <button  class="btn btn-success" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
			<!-- end modal Update -->

            <!-- modal Delete -->
			<div class="modal fade" id="supportedModalDelete" tabindex="-1" role="dialog" aria-labelledby="supportedModalDelete" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<form method="POST" action="supportedDelete">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Do you want to delete it?</h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="hidden" name="hidden_delete" id="hidden_delete">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
			<!-- end modal Delete -->



    
    
    
    @endsection
    
    @section('dash-jquery')

    <script>

        function UpdatePreview(){
            $('#model_img').attr('src', URL.createObjectURL(event.target.files[0]));
        };
        
        $('.supported').click(function(){
            var id=$(this).attr('data-update');
            var url='model/'+id;
            $.get(url,function(data){
                $("#model_name").val(data[0].name);
                $("#model_place").val(data[0].place);
                $("#model_gender").val(data[0].gender);
                $("#model_age").val(data[0].age);

                $("#model_language").val(data[0].language);
                
                $("#model_disc").text(data[0].disc);
                $("#hidden").val(data[0].id);
                // $("#model_cover").attr('src',"{{url('storage/app')}}/"+data[0].path_img);
                $("#model_img").attr('src',"{{url('storage/app')}}/"+data[0].img);
                $("#img_file").attr('file',data[0].img);
                $("#modal_hidden_img").val(data[0].img);
                
            })
            
        });

        $('.supported_delete').click(function(){
            var id=$(this).attr('data-delete');
            $("#hidden_delete").val(id);
        });

        $('.history_details').click(function(){
            var history_id=$(this).attr('history_details');

            var history_url='history_details/'+history_id;
            $.get(history_url,function(data){
                $("#balance").text(data[0]+" ");
                $("#draft").text(data[1]+" ");
                $("#sponsor").text(data[2]+" ");
               
            });

            var history_modal_url='history_modal_url/'+history_id;
            $.get(history_modal_url,function(data){
                var count=1;
                var total=0;
                $("#table_modal").empty();
                data.forEach(element => {
                    $("#table_modal").append("<tr>"+"<td>"+count++ +"</td>"+"<td>"+element.name+"</td>"+"<td>"+element.email+"</td>"+"<td>"+element.sponsorship_level+" $</td>"+"<td>"+element.updated_at+"</td>"+"</tr>");
    
                });
    
            });
        })
        
    </script>
    @endsection