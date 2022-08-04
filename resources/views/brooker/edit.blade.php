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
        <a href="{{url(url('brokerlist'))}}"> <span style ="color:#4D525B"> Broker List  </a> </span> <span style ="color:#A2A2A2">  > Edit Broker  </span> 
    </div>
    <form method="Post" action="{{url('/submiteditbroker')}}" class ="user-profile-form" enctype='multipart/form-data'>
    {{ csrf_field() }}
    <input type="hidden" name="hidden_brooker_id" value="{{$data->brooker_id}}">
    <input type="hidden" name="hidden_brooker_email" value="{{$data->brooker_email}}">
    <section id ="profile-sec">
        <h4 class="page-title">Edit Broker Profile</h4>
        <div class ="h2-heading-bg">
             <h2>Personal Information</h2>
        </div>
        <div class ="form-sec">
            <div class="user-card">
              <div class="user-avatar">
                    <input type="hidden" name="hidden_brooker_image" value="{{$data->brooker_image}}">
                    <div class="status dot dot-lg dot-success"></div><img src="{!! asset('public/brokerimage/') !!}/{{$data->brooker_image}}" id ="profile-img" width ='120px'>
              </div>
              <div class="user-info">
                  <span class="lead-text proff-para" style="color: black;">Profile Picture *</span>
                  <a href="#"><span class ="deff-parar">image dimension must be min 120px width - 120px height</span></a>
                  <input type="file" class="custom-file-input" id="select_image" name="brooker_image" onchange="putImage()">
              </div>
            </div>
            <div class ="row proff-form-row">
                <div class ="col-lg-4">
                    <label for="">Full Name </label>   
                    <input type="text" name="brooker_firstname" required value="{{$data->brooker_firstname}}">
                </div>
                <div class ="col-lg-4">
                    <label for="">Last Name </label><br>
                    <input type="text" name="brooker_lastname" required value="{{$data->brooker_lastname}}">
                </div>
                <div class ="col-lg-4">  
                    <label for="">Age </label>
                    <input type="number" name="brooker_age" required value="{{$data->brooker_age}}">
                </div>
            </div>
            <div class ="row proff-form-row">
                <div class ="col-lg-6">
                    <label for="">Email </label>     
                    <input type="text" name="brooker_email" required value="{{$data->brooker_email}}">
                </div>
                <div class ="col-lg-6">
                    <label for="">Phone Number </label>      
                    <input type="text" name="brooker_phonenumber" required value="{{$data->brooker_phonenumber}}">
                </div>
            </div>
            <div class ="user-btns">
                <input type="submit" name ="adduser"  value ="Edit User">   <a href="{{url('/brokerlist')}}">Cancel</a>
            </div>
        </div>
    </section>
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
</script>
@endsection