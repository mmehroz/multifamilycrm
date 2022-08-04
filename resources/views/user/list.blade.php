@extends('layouts.apptheme')
@section('appcontent')
<div class ="page-wrapper respurses-page">
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
<a href="{{url('/dashboard')}}"> <span style ="color:#4D525B"> Dashboard </a>  </span> <span style ="color:#A2A2A2">  > User List </span>
</div>
<h4 class="page-title">Resources</h4>
<div class ="resources"  >
<div class ="row">
<div class ="col-xl-6">
 <div class ="table-res table-left">   
 <div class ="flex-new">
 <div>
 <h3>Templates </h3>
<p>Email Templates</p>
 </div>
 <div>
<a  class ="ress-btn" data-bs-toggle="modal" href="#add-template" role="button" > <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Add Template</a>
 </div>   
 </div>
<hr class ="line-break" >
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Message</th>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    @foreach($emaildata as $val)
    <tr>
      <td>{{$val->emailtemplate_title}}</td>
      <td>{{$val->emailtemplate_message}}</td>
      <td> <a onclick="editemailtemplate({{$val->emailtemplate_id}});" ><img src="{!! asset('public/assets/images/edit-02.svg') !!}"  alt="snip"></a>
      <a href="{{url('/deleteemailtemplate')}}/{{$val->emailtemplate_id}}/Email"><img src="{!! asset('public/assets/images/remove-02.svg') !!}"  alt="snip"></a> </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
<div class ="col-xl-6">
 <div class ="table-res table-right">   
 <div class ="flex-new">
 <div>
 <h3>User Accounts </h3>
<p>User Controls And Property Uploads</p>
 </div>     
 <div>
<a href="{{url('/adduser')}}" class ="ress-btn"> <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Add New User</a>
 </div>   
 </div>
 <hr class ="line-break" >
<table class="table">
  <thead>
    <th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">Role</th>
    <th scope="col">Action</th>
  </thead>
  <tbody>
  @foreach($data as $val)
    <tr>
      <td class ="res-with"> <img src="{!! asset('public/userimage/') !!}/{{$val->users_image}}" alt="snip" width="40px"> </td>
      <td>{{$val->users_name}}</td>
      <td>{{$val->role_name}}</td>
      <td > <a href="{{url('/edituser')}}/{{$val->users_id}}"><img src="{!! asset('public/assets/images/edit-02.svg') !!}"  alt="snip"></a> </td>
    </tr>
  @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>
<div class="modal fade" id="add-template" aria-hidden="true" aria-labelledby="add-templateLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="add-templateLabel"> Create Template </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
              <form method="Post" action="{{url('/submitemailtemplate')}}" class ="user-profile-form" enctype='multipart/form-data'>
              {{ csrf_field() }}
                <div class ="flex">
                 <div>
                    <label>Template Name *</label> 
                    <input type="text" name="emailtemplate_title" required>
                 </div>    
                 <div>
                   <label>Subject *</label>
                    <input type="text" name="emailtemplate_subject" required>
                 </div>
              </div> 
              <div class ="flex">
                <div>
                  <label>From Name *</label> 
                  <input type="text" name="emailtemplate_fromname" required>
                </div>
                <div>
                  <label>From Email *</label>
                  <input type="email" name="emailtemplate_fromemail" required>
                </div> 
              </div>
                   <label>Message *</label> 
                   <textarea name="emailtemplate_message" class="form-control" required></textarea>
                  <!-- <a class="ress-btn att-btn" href="#"> <img src="../assets/images/ico-attachment.svg" alt="plus">Add Attachment</a> -->
                  <div class="user-btns save-btns">
                    <input type="submit" name="Save" value="Save">   <a onclick="closemodal()">Cancel</a>
                  </div>
                <form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id ='modals'></div>
  <script>
  function editemailtemplate($id){
    $.get('{{ URL::to("/editemailtemplate")}}/'+$id+"/Email",function(data){
    $('#modals').empty().append(data);
    $('#editemailtemplate').modal('show');
    });
  }
   function closemodal(){
      $('#add-template').modal('hide');
    }
  </script>
@endsection