


@extends('dash.layout')

@section('title')
    Admin List-donation
@endsection

@section('dash-css')

<style>
    .table-data-feature{
        justify-content: center !important;
        -webkit-justify-content:center !important;
    }
    
    .table img{
        height:60px;
        border-radius:4px;
        max-width:80px;
    }


</style>

@endsection

@section('dash-body')




        @if (session()->has('addAdmin'))
            <div class="alert alert-success alert-dismissible fade show myAlert" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session()->get('addAdmin')}}
            </div>
        @endif
        @if (session()->has('deleteUser'))
            <div class="alert alert-success alert-dismissible fade show myAlert" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session()->get('deleteUser')}}
            </div>
        @endif
        @if (session()->has('updatAdmin'))
            <div class="alert alert-success alert-dismissible fade show myAlert" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session()->get('updatAdmin')}}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show myAlert" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        @if (session()->has('updateErro'))
        <div class="alert alert-danger alert-dismissible fade show myAlert" >
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('updateErro')}}
        </div>
        @endif
        @if (session()->has('errorPassword'))
        <div class="alert alert-danger alert-dismissible fade show myAlert" >
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('errorPassword')}}
        </div>
        @endif
        
        @if (session()->has('updatePassword'))
        <div class="alert alert-success alert-dismissible fade show myAlert" >
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('updatePassword')}}
        </div>
        @endif

        

        

        



<!-- USER DATA-->
<div class="user-data m-b-30 ">    
    <div class=" d-flex justify-content-between pr-4 pl-4">
        <h3 class="title-3 p-0 m-0"><i class="	far fa-users"></i>System Admin</h3>
        <a href="addUser" class="btn btn-success align-self-start" style="font-size: 13px">Add New</a>
    </div>

    <div class="table-responsive p-3 pt-4 text-center" style="font-size:13px">
        <table class="table table-striped table-bordered  shadow-sm" id="demo">
            <thead>
                <tr>
                    <th class="max-with:20px !important;">#</th>
                    <th >Photo</th>
                    <th >Username</th>
                    <th >Email</th>
                    <th>Register Date</th>
                    <th>View Details</th>
                    
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
                            
                            @if (empty(Auth::user()->profile_photo_path))
                                <img src="{{url('public/assets/images/img.jpg')}}" alt="photo">
                            @else
                                <img src="{{url('storage/app')}}/{{$item->profile_photo_path}}" alt="photo">
                            @endif
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            @php
                                $date=date_create($item->created_at);
                                echo date_format($date,"Y/m/d");
                            @endphp
                        <td >
                            <div class="table-data-feature">
                                <button class="item password_update" type="button" data-toggle="modal" data-target="#password_update" data-user-update="{{$item->id}}">
                                    <i class="	fa fa-deaf text-info"></i>
                                </button>
                                <button class="item user_update" type="button" data-toggle="modal" data-target="#user_update" data-user-update="{{$item->id}}">
                                    <i class="zmdi zmdi-edit " style="color:#69bb4d "></i>
                                </button>
                                <button class="item user_delete" type="button" data-toggle="modal" data-target="#user_delete" data-user-delete="{{$item->id}}">
                                    <i class="zmdi zmdi-delete text-danger"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                
                @endforeach
            
            </tbody>
        </table>

        <div class="mt-3 mb-3">
            {{ $data->links() }}
        </div>
    </div>
</div>

</div>
</div>

<div class="p-1">
    
</div>

<!-- modal Delete -->
<div class="modal fade" id="user_delete" tabindex="-1" role="dialog" aria-labelledby="user_delete" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="POST" action="deleteUser">
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
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end modal Delete -->



<!-- modal Update -->
<div class="modal fade" id="user_update" tabindex="-1" role="dialog" aria-labelledby="user_update" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="POST" action="updateadmin" enctype="multipart/form-data">
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
                            <label for="name" class=" form-control-label">User Name :</label>
                            <input type="text" id="modal_name" placeholder="Enter userame .  .  ." class="form-control" name="modal_name" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="modal_email" class=" form-control-label">Email :</label>
                            <input type="text" id="model_email" placeholder="Enter email .  .  ." class="form-control " name="modal_email" value="" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="modal_img" class=" form-control-label">Image :</label>
                            <input type="file" id="modal_img" placeholder="Image" class="form-control" name="modal_img" onChange="UpdatePreview()" >
                            <img src="" alt="img" style="height:130px;" class="mt-2" id="uploadUpdate" >
                            <input type="hidden" value="" name="hidden_img" id="hidden_img">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="modal_hidden" id="modal_hidden" value="">
                    <button  class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end modal Update -->




<!-- modal password -->
<div class="modal fade" id="password_update" tabindex="-1" role="dialog" aria-labelledby="password_update" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="POST" action="updatePassword" >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Update Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="old_password" class=" form-control-label">Current Password :</label>
                            <input type="password" id="old_password" placeholder="Enter Current Password .  .  ." class="form-control" name="old_password" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class=" form-control-label">New Password :</label>
                            <input type="password" id="new_password" placeholder="Enter New Password .  .  ." class="form-control " name="new_password" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_passowrd" class=" form-control-label">Confirm Password :</label>
                            <input type="password" id="confirm_passowrd" placeholder="Enter Confirm Passowrd .  .  ." class="form-control " name="confirm_passowrd" value="" required>
                        </div>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="password_hidden" id="passoword_hidden" value="">
                    <button  class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end modal passowrd -->



 <!-- User Details -->
 <div class="modal fade" id="user_details" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            {{-- ============================================================= --}}
                <div class="table-responsive mb-5 ">
                    <table class="table table-striped text-center table-bordered">
                        <thead>
                            <tr>
                              <th scope="col">Total Pay</th>
                              <th scope="col">Total Draft</th>
                              <th scope="col">Total Support</th>
                              {{-- <th scope="col">Total View</th> --}}
                            </tr>
                          </thead>
                          <tbody  style="color:#69bb4d ">
                              <td ><span  id="balance"></span><span class="fas fa-usd ml-1"></span></td>
                              <td><span   id="draft"></span><span class="fas  fa-bookmark ml-1"></span></td>
                              <td><span   id="supporter"></span><span class="fas   fa-users ml-1"></span></td>
                              {{-- <td id="total_view">40</td> --}}
                          </tbody>
                    </table>
                  </div>

                  {{-- ============================================================= --}}

                  <div class="table-responsive" style="overflow-y:scroll;max-height:360px;">
                    <table class="table table-striped  text-center table-bordered ">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th scope="col">Image</th>
                              <th scope="col">Name</th>
                              <th scope="col">Age</th>
                              <th scope="col"  style='font-size:14px;'>Sponsorship Level Price</th>
                              <th scope="col">Date</th>
                            </tr>
                          </thead>
                          <tbody id="table_modal">
                             
                          </tbody>
                          <caption class="text-right mt-2 mb-2 mr-3 " id="modal_total"> </caption>
                    </table>
                  </div>


            </div>
        </div>
    </div>
</div>
<!-- History Details -->





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
        

    $('.password_update').click(function(){
        var passowrd_id=$(this).attr('data-user-update');
        $("#passoword_hidden").val(passowrd_id);
    });


    $('.user_update').click(function(){
        var user_modal=$(this).attr('data-user-update');
        var modal_update='showUserUpdate/'+user_modal;
        $.get(modal_update,function(data){
            $("#modal_name").val(data[0].name);
            $("#model_email").val(data[0].email);
            $("#modal_hidden").val(data[0].id);
            // $("#model_cover").attr('src',"{{url('storage/app')}}/"+data[0].path_img);
            if(data[0].profile_photo_path==null){
                $("#uploadUpdate").attr('src',"{{url('public/assets/images/img.jpg')}}");
            }else{
                $("#uploadUpdate").attr('src',"{{url('storage/app')}}/"+data[0].profile_photo_path);
            }

            $("#hidden_img").val(data[0].profile_photo_path);
            
        });
    });

    $('.user_details').click(function(){
            var user_detail_id=$(this).attr('user_details');

            var user_url='user_details/'+user_detail_id;
            $.get(user_url,function(data){
                $("#balance").text(data[0]+" ");
                $("#draft").text(data[1]+" ");
                $("#supporter").text(data[2]+" ");
            });

            var user_modal_url='user_modal_url/'+user_detail_id;
            $.get(user_modal_url,function(data){
                var count=1;
                $("#table_modal").empty();
                data.forEach(element => {
                    $("#table_modal").append("<tr>"+"<td>"+count++ +"</td>"+"<td>"+ "<img src='{{url('storage/app')}}"+"/"+element.img+" ' >"+ "</td>"+"<td>"+element.name+"</td>"+"<td>"+element.age+" </td>"+"<td>"+element.sponsorship_level+" $</td>"+"<td>"+element.updated_at+"</td>"+"</tr>");
    
                });

                console.log(data);
    
            });
        })
        


</script>
@endsection