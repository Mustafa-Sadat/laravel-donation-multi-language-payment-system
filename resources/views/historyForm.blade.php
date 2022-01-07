

@extends('dash.layout')

@section('title')
    Add  Family-donation
@endsection

@section('dash-body')



<div class="row">
    <div class="col-lg-8 col-md-8 m-auto">
        <div class="card">
            <form method="POST" action="submitHistory" enctype="multipart/form-data">
                @csrf
                
            <div class="card-header">
                <strong>Add New  Family</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="name" class=" form-control-label">Full Name :</label>
                    <input type="text" id="name" placeholder="Enter name .  .  ." class="form-control @error('name')  is-invalid  @enderror" name="name" value="{{old('name')}}">

                    @error('name')
                         <small class="form-text text-danger" >{{$message}}</small>
                    @enderror
                   
                </div>
                <div class="form-group">
                    <label for="place" class=" form-control-label">Place :</label>
                    <input type="text" id="place" placeholder="Enter place .  .  ." class="form-control @error('place')  is-invalid  @enderror" name="place" value="{{old('place')}}">
                    @error('place')
                            <small class="form-text text-danger" >{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group" >
                    <label for="gender">Select Gender :</label>
                    <select class="form-control  @error('gender')  is-invalid  @enderror" id="gender" style="font-size:13px !important" name="gender"  value="{{old('gender')}}">
                        @if (!empty(old('gender')))
                            @if (old('gender')=='Male')
                                <option disabled >Gender</option>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            @elseif (old('gender')=='Female')
                                <option disabled >Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female" selected>Famel</option>
                                <option value="Other">Other</option>
                            @elseif (old('gender')=='Other')
                                <option disabled >Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other" selected>Other</option>
                            @endif
                        @else
                            <option disabled selected>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        @endif
                    </select>
                    @error('gender')
                            <small class="form-text text-danger" >{{$message}}</small>
                    @enderror


                  </div>

                <div class="form-group">
                    <label for="age" class=" form-control-label">Age :</label>
                    <input type="number" id="age" placeholder="Enter Age .  .  ." class="form-control @error('age')  is-invalid  @enderror" name="age" value="{{old('age')}}">
                    @error('age')
                            <small class="form-text text-danger" >{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group" >
                    <label for="gender">Language :</label>
                    <select class="form-control  @error('language')  is-invalid  @enderror" id="language" style="font-size:13px !important" name="language"  value="{{old('language')}}">
                        @if (!empty(old('language')))
                            @if (old('language')=='Farsi')
                                <option disabled >Language</option>
                                <option value="Farsi" selected>Faris</option>
                                <option value="Pashto">Pashto</option>
                                <option value="English">English</option>
                            @elseif (old('language')=='Pashto')
                                <option disabled >Language</option>
                                <option value="Faris">Faris</option>
                                <option value="Pashto" selected>Famel</option>
                                <option value="English">English</option>
                            @elseif (old('language')=='English')
                                <option disabled >Language</option>
                                <option value="Faris">Farsi</option>
                                <option value="pashto">Pashto</option>
                                <option value="English" selected>English</option>
                            @endif
                        @else
                            <option disabled selected>Language</option>
                            <option value="Farsi">Farsi</option>
                            <option value="Pashto">Pashto</option>
                            <option value="English">English</option>
                        @endif
                    </select>
                    @error('Language')
                            <small class="form-text text-danger" >{{$message}}</small>
                    @enderror


                  </div>

                <div class=" form-group">
                    <label for="disc" class=" form-control-label">Description :</label>
                    <textarea style="color:#666666 !important" name="disc" id="disc" rows="10" placeholder="Enter Content .  .  ." class="form-control @error('disc')  is-invalid  @enderror">{{old('disc')}}</textarea>
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
                <button type="submit" class="btn btn-success btn-md">Add</button>
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
{{-- 
<script src="https://cdn.tiny.cloud/1/rd4khx8rekezt72hdfni6xkrh40cvasbh43ubbl93p3vtvy5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script> --}}
@endsection