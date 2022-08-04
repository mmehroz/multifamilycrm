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
        <a href="{{url(url('brokerlist'))}}"> <span style ="color:#4D525B"> Broker List  </a> </span> <span style ="color:#A2A2A2">  > Add Broker  </span> 
    </div>
    <form method="Post" action="{{url('/submitbroker')}}" class ="user-profile-form" enctype='multipart/form-data'>
    {{ csrf_field() }}
    <section id ="profile-sec">
        <h4 class="page-title">Add Broker Profile</h4>
        <div class ="h2-heading-bg">
             <h2>Personal Information</h2>
        </div>
        <div class ="form-sec">
            <div class="user-card">
              <div class="user-avatar">
                    <div class="status dot dot-lg dot-success"></div><img src="{!! asset('public/assets/images/pic-profilee.png') !!}" id ="profile-img" width ='120px'>
              </div>
              <div class="user-info">
                  <span class="lead-text proff-para" style="color: black;">Profile Picture *</span>
                  <a href="#"><span class ="deff-parar">Image dimension must be min 120px width - 120px height</span></a>
                  <input type="file" class="custom-file-input" id="select_image" name="brooker_image" onchange="putImage()">
              </div>
            </div>
            <div class ="row proff-form-row">
                <div class ="col-lg-4">
                    <label for="">Full Name * </label>   
                    <input type="text" name="brooker_firstname">
                </div>
                <div class ="col-lg-4">
                    <label for="">Last Name </label>      <br>
                    <input type="text" name="brooker_lastname">
                </div>
                <div class ="col-lg-4">  
                    <label for="">Age </label>
                     <input type="number" name="brooker_age">
                </div>
            </div>
            <div class ="row proff-form-row">
                <div class ="col-lg-6">
                    <label for="">Email </label>     
                    <input type="text" name="brooker_email" class="" id="" >
                </div>
                <div class ="col-lg-6">
                    <label for="">Phone Number</label>      
                    <input type="text" name="brooker_phonenumber" class="" id="" >
                </div>
            </div>
        <div class ="user-btns">
            <input type="submit" name ="Submit">
            <a href="{{url('/brokerlist')}}">Cancel</a>
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