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
<a href="{{url('/dashboard')}}"> <span style ="color:#4D525B"> Dashboard </a>  </span> <span style ="color:#A2A2A2">  > Resources </span>
</div>
<h4 class="page-title">Resources</h4>
<div class ="resources"  >
<div class ="row">
<div class ="col-xl-6">
 <div class ="table-res table-left">   
 <div class ="flex-new">
 <div>
 <h3>Email Templates</h3>
 </div>
 <div>
<a  class ="ress-btn" data-bs-toggle="modal" href="#add-template" role="button" > <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Create Template</a>
 </div>   
 </div>
<hr class ="line-break" >
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    @foreach($emailtemplate as $emailtemplates)
    <tr>
      <td>{{$emailtemplates->emailtemplate_title}}</td>
      <td>{{$emailtemplates->emailtemplate_message}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{url('emailtemplatelist')}}" class="veiw-all">View All Email Template <i class="fa fa-arrow-right" aria-hidden="true"></i></a> 
</div>
<div class ="table-res table-left">   
 <div class ="flex-new">
 <div>
 <h3>Follow Up Tasks</h3>
</div>
 <div>
<a class="ress-btn" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Create Task</a>
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
  <table class="table">
          <thead>
            <tr>
              <th>Task Name</th>
              <th>Assign To</th>
              <th>Assign At</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="showtask">
            @foreach($task as $tasks)
            <tr>
              <td>{{$tasks->assigntask_name}}</td>
              <td>{{$tasks->users_name}}</td>
              <td>{{$tasks->assigntask_at}}</td>
              @if($tasks->taskstatus_id == 1)
              <td> <img src="{!! asset('public/assets/images/ico-todo.svg') !!}" style="width: 15px;" alt="snip"> {{$tasks->taskstatus_name}}</td>
              @elseif($tasks->taskstatus_id == 2)
              <td> <i class="fa fa-minus-circle" aria-hidden="true"  style="color: #333;"></i> {{$tasks->taskstatus_name}}</td>
              @else
              <td> <img src="{!! asset('public/assets/images/ico-done.svg') !!}" style="width: 15px;" alt="snip"> {{$tasks->taskstatus_name}}</td>
              @endif
            </tr>
            @endforeach
        </tbody>
  </table>
  <a href="{{url('tasklist')}}" class="veiw-all">View All Task <i class="fa fa-arrow-right" aria-hidden="true"></i></a> 
</div>
</div>
<div class ="col-xl-6">
 <div class ="table-res table-right">   
 <div class ="flex-new">
 <div>
 <h3>Virtual Assistants</h3>
 </div>     
 </div>
 <hr class ="line-break" >
<table class="table">
  <thead>
    <th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">Role</th>
  </thead>
  <tbody>
  @foreach($va as $vas)
    <tr>
      <td class ="res-with"> <img src="{!! asset('public/userimage/') !!}/{{$vas->users_image}}" alt="snip" width="40px"> </td>
      <td>{{$vas->users_name}}</td>
      <td>{{$vas->role_name}}</td>
    </tr>
  @endforeach
    </tbody>
</table>
<a href="{{url('valist')}}" class="veiw-all">View All VA's <i class="fa fa-arrow-right" aria-hidden="true"></i></a> 
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
       <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Add Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="assigntask_name" id="assigntask_name" class="object-type" placeholder ="Enter Task Title">
                   <select id="assigntask_to" name="assigntask_to">
                        <option value="">Select Assignee</option>
                        @foreach($va as $vas)
                        <option value="{{$vas->users_id}}">{{$vas->users_name}}</option>    
                        @endforeach 
                    </select>
                    <input type="date" id="assigntask_at" name="assigntask_at" required value="<?php echo(date('Y-m-d'))?>">
                    <input type="submit" class="add-btn" onclick="submittask()" id="refresh">
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <script>
  function submittask(){
    var assigntask_name = document.getElementById('assigntask_name').value;
    if (assigntask_name == "") {
            alert("Enter Task Title To Save");
    }else{
      var assigntask_to = document.getElementById('assigntask_to').value;
      var assigntask_at = document.getElementById('assigntask_at').value;
      $.get('{{ URL::to("/submittask")}}/'+assigntask_name+'/'+assigntask_to+'/'+assigntask_at, function(data){
      $('#showtask').empty().append(data);
          document.getElementById('assigntask_name').value = "";
          $('#exampleModalToggle').modal('hide');
      });
    }
  }
   function closemodal(){
      $('#add-template').modal('hide');
    }
  </script>
@endsection