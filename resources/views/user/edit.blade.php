@extends('layouts.apptheme')
@section('appcontent')
   <div class ="page-wrapper">
    @if(session('message'))
        <div>
            <p class="alert alert-success" >{{session('message')}}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <div><h4><li>{{ $error }}</li></h4> </div>
            @endforeach
          </ul>
        </div>
    @endif
    <div class ="dash-url">
        <a href="{{url(url('userlist'))}}"> <span style ="color:#4D525B"> User List  </a> </span> <span style ="color:#A2A2A2">  > Edit User  </span> 
    </div>
    <form method="Post" action="{{url('/submitedituser')}}" class ="user-profile-form" enctype='multipart/form-data'>
    {{ csrf_field() }}
    <input type="hidden" name="hidden_users_id" value="{{$data->users_id}}">
    <section id ="profile-sec">
        <h4 class="page-title">Edit User Profile</h4>
        <div class ="h2-heading-bg">
             <h2>Personal Information</h2>
        </div>
        <div class ="form-sec">
            <div class="user-card">
              <div class="user-avatar">
                    <input type="hidden" name="hidden_users_image" value="{{$data->users_image}}">
                    <div class="status dot dot-lg dot-success"></div><img src="{!! asset('public/userimage/') !!}/{{$data->users_image}}" id ="profile-img" width ='120px'>
              </div>
              <div class="user-info">
                  <span class="lead-text proff-para" style="color: black;">Profile Picture *</span>
                  <a href="#"><span class ="deff-parar">image dimension must be min 120px width - 120px height</span></a>
                  <input type="file" class="custom-file-input" id="select_image" name="users_image" onchange="putImage()">
              </div>
            </div>
            <div class ="row proff-form-row">
                <div class ="col-lg-4">
                    <label for="">Full Name * </label>   
                    <input type="text" name="users_name" required value="{{$data->users_name}}">
                </div>
                <div class ="col-lg-4">
                    <label for="">Last Name </label><br>
                    <input type="text" name="users_lastname" required value="{{$data->users_lastname}}">
                </div>
                <div class ="col-lg-4">  
                    <label for="">Role </label>
                    <select id="role" name="role_id" required>
                        @foreach($role as $roles)
                        <option @if($data->role_id == $roles->role_id) {{"selected"}} @endif value="{{$roles->role_id}}">{{$roles->role_name}}</option>    
                        @endforeach
                    </select>
                </div>
            </div>
            <div class ="row proff-form-row">
                <div class ="col-lg-4">
                    <label for="">Company Name * </label>     
                    <input type="text" name="users_companyname" required value="{{$data->users_companyname}}">
                </div>
                <div class ="col-lg-4">
                    <label for="">Company Address</label>      
                    <input type="text" name="users_companyaddress" required value="{{$data->users_companyaddress}}">
                </div>
                <div class ="col-lg-4">
                    <label for="">Website </label><br>
                    <input type="text" name="users_website" required value="{{$data->users_website}}">
                </div>
            </div>
        </div>
    </section>
    <div class ="h2-heading-bg m-0">
        <h2>Property Files</h2>
    </div>
  <div class="form-sec new-filess">
    <p> Upload your .csv file </p>
        <ul id="errors" class="list-unstyled" ></ul>
            <div class="form-group">
                <input type="file" name="uploaded_file" id="files" class="form-control  file-uplooder" accept=".csv" >
                <p class ="position-rell"> or drop your file here </p>
            </div>
            <div class="card-body img-card">
                  <img  class="img-fluid img-thumbnail" id="image" />
            </div>
        @foreach($upload as $uploads)
        <span>Remove <a href="{{url('/deletepropertyupload')}}/{{$uploads->property_token}}"><img src="{!! asset('public/assets/images/remove-02.svg') !!}"  alt="snip"></a></span>
        @endforeach
    </div>
    <div class ="h2-heading-bg m-0">
        <h2>Account Setting</h2>
    </div>
    <div class ="new-rows">
        <div class ="row proff-form-row ">
        <div class ="col-lg-3">
            <label for="">Email * </label>
            <input type="hidden" name="hidden_users_email" required value="{{$data->users_email}}">
            <input type="email" name="users_email" required value="{{$data->users_email}}">
        </div>
        <div class ="col-lg-3">
            <label for=""> New Password * </label>     
            <input type="password" name="users_password" required value="{{$data->users_password}}">
        </div>
        <div class ="col-lg-3">
            <label for="">Confirm Password *</label>      
            <input type="password" name="users_passwordconfirm" required value="{{$data->users_password}}">
        </div>
        <div class ="col-lg-3">
            <label for="">Phone * </label>     
            <input type="number" name="users_phone" required value="{{$data->users_phone}}">
        </div>
        </div>
        <div class ="user-btns">
            <input type="submit" name ="adduser"  value ="Edit User">   <a href="{{url('/userlist')}}">Cancel</a>
        </div>
    </div>
</form>
</div>
<script>
    document.getElementById("select_image").onchange = function () {
        var reader = new FileReader();
        reader.onload = function (e) {
        document.getElementById("profile-img").src = e.target.result;
      };
        reader.readAsDataURL(this.files[0]);
    };
    document.getElementById("files").onchange = function () {
        var reader = new FileReader();
        reader.onload = function (e) {
        document.getElementById("image").src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    };
</script>
@endsection