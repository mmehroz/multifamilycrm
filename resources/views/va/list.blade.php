@extends('layouts.apptheme')
@section('appcontent')
<div class="page-wrapper va-page">
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
    <div class="taskss-padd">
        <div class="dash-url virtual-space">
            <span style="color:#4D525B"> Resources  </span>  <a href="#"> <span style="color:#A2A2A2">  &gt;  Virtual Assistants </span> </a>
        </div>
        <div class="flex-task virtual-space">
            <h4 class="page-title">Virtual Assistants</h4>  <a class="ress-btn" data-bs-toggle="modal" href="#virtual-assistants" role="button"> <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Add Virtual Assistant</a>
        </div> 
    </div>
    <div class ="row boxes-six">
        @foreach($va as $vas)
        <div class ="col-md-6 col-lg-4  col-xl-2">
            <div class ="assis-bg">
                <a  class ="assis-cross" id="{{$vas->users_id}}~{{$vas->users_name}}" onclick="removeva(this.id)"><img src="{!! asset('public/assets/images/ico-delete.svg') !!}" alt="profile" class ="img-fluid"></a> <br> 
                <a href="#"><img  src="{!! asset('public/userimage/') !!}/{{$vas->users_image}}" alt="profile" class ="img-fluid propfff"> </a> <br>  
                <a  onclick="editva({{$vas->users_id}});" role="button"><img src="{!! asset('public/assets/images/vaico-edit.svg') !!}" alt="profile" class ="img-fluid proff-img"></a>
              <a href="#"> <img  src="{!! asset('public/assets/images/vaico-chat.svg') !!}" alt="profile" class ="img-fluid" > </a> 
                <h3>{{$vas->users_name}}</h3>
                <a href="mailto:{{$vas->users_email}}">{{$vas->users_email}}</a> <br>
                <a href="tel:{{$vas->users_phone}}">{{$vas->users_phone}}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
    <div class="modal fade" id="remove-user" aria-hidden="true" aria-labelledby="add-templateLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-templateLabel"> Remove User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="Post" action="{{url('/removeva')}}" class ="user-profile-form" enctype='multipart/form-data'>
                        {{ csrf_field() }} 
                        <label for="">Are You Sure, You want To Remove?</label>
                        <input type="hidden" name="users_id" id="users_id" value="">
                        <input type="text" name="users_name" id="users_name" value="" class="object-type" readonly>
                        <div class="user-btns save-btns">
                        <input type="submit" name="Save" value="Yes, Remove The User"> <a onclick="closeremovemodal()">Cancel</a> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="virtual-assistants" aria-hidden="true" aria-labelledby="add-templateLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-templateLabel"> Add User </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="Post" action="{{url('/submituser')}}" class ="user-profile-form" enctype='multipart/form-data'>
                        {{ csrf_field() }} 
                        <div class="flex">
                            <input type="hidden" name="role_id" value="3">
                        <div>
                            <label for="">First Name *</label>
                            <input type="text" name="users_name" class="object-type" placeholder="Enter First Name" required>
                        </div>
                        <div>
                             <label for="">Last Name *</label>
                             <input type="text" name="users_lastname" class="object-type" placeholder="Enter Last Name" required>
                        </div>
                        </div>
                        <div class="flex">
                        <div>
                            <label for="">Email</label>
                            <input type="email" name="users_email" class="object-type" placeholder="Enter your email" required>
                        </div>
                        <div>
                            <label for="">Password</label>
                            <input type="password" name="users_password" required>
                        </div>
                        </div>
                        <div class="user-btns save-btns">
                            <input type="submit" name="Save" value="Save"> <a onclick="closemodal()">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id ='modals'></div>
    <script>
    function closemodal(){
      $('#virtual-assistants').modal('hide');
    }
    function closeremovemodal(){
      $('#remove-user').modal('hide');
    }
    function removeva($data){
        const splitdata = $data.split("~");console.log(splitdata);
        document.getElementById('users_id').value = splitdata[0];
        document.getElementById('users_name').value = splitdata[1];
        $('#remove-user').modal('show');
    }
    function editva($id){
    $.get('{{ URL::to("/editva")}}/'+$id,function(data){
    $('#modals').empty().append(data);
    $('#editva').modal('show');
    });
  }
    </script>
@endsection