

@extends('dash.layout')

@section('title')
    Add User-donation
@endsection

@section('dash-css')

    <style>
  
    </style>
@endsection

@section('dash-body')



<div class="row">
    <div class="col-lg-8 col-md-8 m-auto">
        <div class="card">
            <form method="POST" action="submitUser" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <strong>Add New User</strong>
                </div>
                <div class="card-body card-block">

                    <div class="form-group">
                        <label for="name" class=" form-control-label">User Name :</label>
                        <input type="text" id="name" placeholder="Enter username .  .  ." class="form-control @error('name')  is-invalid  @enderror" name="name" value="{{old('name')}}">
                        @error('name')
                            <small class="form-text text-danger" >{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class=" form-control-label">Email :</label>
                        <input type="text" id="email" placeholder="Enter email .  .  ." class="form-control @error('email')  is-invalid  @enderror" name="email" value="{{old('email')}}">
                        @error('email')
                            <small class="form-text text-danger" >{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class=" form-control-label">Password :</label>
                        <input type="text" id="password" placeholder="Enter password .  .  ." class="form-control @error('password')  is-invalid  @enderror" name="password" value="{{old('password')}}">
                        @error('password')
                            <small class="form-text text-danger" >{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirm" class=" form-control-label">Password Confirm :</label>
                        <input type="text" id="confirm" placeholder="Enter confirm password .  .  ." class="form-control @error('confirm')  is-invalid  @enderror" name="confirm" value="{{old('confirm')}}">
                        @error('confirm')
                            <small class="form-text text-danger" >{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img" class=" form-control-label">Image :</label>
                        <input type="file" id="img" placeholder="Image" class="form-control @error('img')  is-invalid  @enderror" name="img" onChange="UpdatePreview()" value="{{old('img')}}">
                        <img src="" alt="" style="height:130px;" class="mt-2" id="upload">
                        @error('img')
                            <small class="form-text text-danger" >{{$message}}</small>
                        @enderror
                    </div>

                    
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-md">Add User</button>
                </div>

            </form>
        </div>
    </div>
    
    
</div>


@endsection
@section('dash-jquery')

    <script>
         function UpdatePreview(){
            $('#upload').attr('src', URL.createObjectURL(event.target.files[0]));
        };
        
    </script>

@endsection