@extends('layouts.apptheme')
@section('appcontent')
   <div class ="page-wrapper">
    <div class ="dash-url">
        <a href="{{url(url('userlist'))}}"> <span style ="color:#4D525B"> User List  </a> </span> <span style ="color:#A2A2A2">  > Edit User  </span> 
    </div>
    <form method="Post" action="{{url('/submitedituser')}}" class ="user-profile-form" enctype='multipart/form-data'>
    {{ csrf_field() }}
    <input type="hidden" name="hidden_users_id" value="{{$data->users_id}}">
    <section id ="profile-sec">
        <h4 class="page-title">View Profile</h4>
        <div class ="h2-heading-bg">
             <h2>Personal Information</h2>
        </div>
        <div class ="form-sec">
            <div class="user-card">
              <div class="user-avatar">
                    <input type="hidden" name="hidden_users_image" value="{{$data->users_image}}">
                    <div class="status dot dot-lg dot-success"></div><img src="{!! asset('public/userimage/') !!}/{{$data->users_image}}" id ="profile-img" width ='120px'>
              </div>
            </div>
            <div class ="row proff-form-row">
                <div class ="col-lg-4">
                    <label for="">Full Name * </label>   
                    <input type="text" name="users_name" readonly value="{{$data->users_name}}">
                </div>
                <div class ="col-lg-4">
                    <label for="">Last Name </label><br>
                    <input type="text" name="users_lastname" readonly value="{{$data->users_lastname}}">
                </div>
                <div class ="col-lg-4">  
                    <label for="">Role </label>
                    <select id="role" name="role_id" readonly>
                        @foreach($role as $roles)
                        <option @if($data->role_id == $roles->role_id) {{"selected"}} @endif value="{{$roles->role_id}}">{{$roles->role_name}}</option>    
                        @endforeach
                    </select>
                </div>
            </div>
            <div class ="row proff-form-row">
                <div class ="col-lg-4">
                    <label for="">Company Name * </label>     
                    <input type="text" name="users_companyname" readonly value="{{$data->users_companyname}}">
                </div>
                <div class ="col-lg-4">
                    <label for="">Company Address</label>      
                    <input type="text" name="users_companyaddress" readonly value="{{$data->users_companyaddress}}">
                </div>
                <div class ="col-lg-4">
                    <label for="">Website </label><br>
                    <input type="text" name="users_website" readonly value="{{$data->users_website}}">
                </div>
            </div>
        </div>
    </section>
    <div class ="h2-heading-bg m-0">
        <h2>Account Setting</h2>
    </div>
    <div class ="new-rows">
        <div class ="row proff-form-row ">
        <div class ="col-lg-3">
            <label for="">Email * </label>
            <input type="hidden" name="hidden_users_email" readonly value="{{$data->users_email}}">
            <input type="email" name="users_email" value="{{$data->users_email}}">
        </div>
        <div class ="col-lg-3">
            <label for=""> New Password * </label>     
            <input type="password" name="users_password" readonly value="{{$data->users_password}}">
        </div>
        <div class ="col-lg-3">
            <label for="">Confirm Password *</label>      
            <input type="password" name="users_passwordconfirm" readonly value="{{$data->users_password}}">
        </div>
        <div class ="col-lg-3">
            <label for="">Phone * </label>     
            <input type="number" name="users_phone" readonly value="{{$data->users_phone}}">
        </div>
        </div>
    </div>
</form>
</div>
@endsection