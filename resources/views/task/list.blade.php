@extends('layouts.apptheme')
@section('appcontent')
<div class ="page-wrapper tsks-list">
    <div class="main-flex">
  
        <div class ="flex invest-flex">
            <div>
                <h4 class="page-title prop-page">Tasks</h4>
            </div>
    
            
            <div>
               <a class="ress-btn" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Create Task</a>
            </div> 
        </div>
    </div>
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
<div class ="investor-table">
    <hr class ="investor-divider">
    <table id="crm" class="display nowrap" style="width:100%">
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
    </div>
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Add Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="assigntask_name" id="assigntask_name" class="object-type" placeholder ="Enter Task Name">
                     <select id="task_type" name="task_type" required 
    style="margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    border: 1px solid #E4E7EC;
    outline: none;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
    /* line-height: 50px; */
    padding-left: 17px;
    color: #333;
    margin: 0px 0px;
    height: 40px;
    margin-top: 20px;">
                        <option value="">Select Type</option>
                        <option value="I">Invester</option>    
                        <option value="P">Property</option>    
                    </select>
                     <select id="assigntask_to" name="assigntask_to">
                        <option value="">Select Assignee</option>
                        @foreach($va as $vas)
                        <option value="{{$vas->users_id}}">{{$vas->users_name}}</option>    
                        @endforeach 
                    </select>
                    <input type="date" id="assigntask_at" name="assigntask_at" required value="<?php echo(date('Y-m-d'))?>">
                     <select id="invester" name="invester" style="display:none" 
                     style="margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    border: 1px solid #E4E7EC;
    outline: none;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
    /* line-height: 50px; */
    padding-left: 17px;
    color: #333;
    margin: 0px 0px;
    height: 40px;
    margin-top: 20px;">
                        <option value="">Select Invester</option>
                        @foreach($invester as $investers)
                        <option value="{{$investers->investerinfo_id }}">{{$investers->investerinfo_fname}}</option>    
                        @endforeach 
                    </select>
                    <select id="property" name="property" style="display: none;" 
                    style="margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    border: 1px solid #E4E7EC;
    outline: none;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
    /* line-height: 50px; */
    padding-left: 17px;
    color: #333;
    margin: 0px 0px;
    height: 40px;
    margin-top: 20px;">
                        <option value="">Select Property</option>
                        @foreach($property as $propertys)
                        <option value="{{$propertys->property_id}}">{{$propertys->property_name}}</option>    
                        @endforeach 
                    </select>
                    <input type="submit" class="add-btn" onclick="submittask()" id="refresh">
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#task_type').on('change', function() {
          if ( this.value == 'I')
          {
            $("#invester").show();
            $("#property").hide();
          } else if ( this.value == 'P')
          {
            $("#property").show();
            $("#invester").hide();
          }
          else
          {
            $("#property").hide();
            $("#invester").hide();
          }
          });
    });
    function submittask(){
    var assigntask_name = document.getElementById('assigntask_name').value;
    if (assigntask_name == "") {
            alert("Enter Task Title To Save");
    }else{
      var type = document.getElementById('task_type').value;
      if (type == "I") {
        var task_for = document.getElementById('invester').value;
      }else{
        var task_for = document.getElementById('property').value;
      }
      var task_type = document.getElementById('task_type').value;
      var assigntask_to = document.getElementById('assigntask_to').value;
      var assigntask_at = document.getElementById('assigntask_at').value;
      $.get('{{ URL::to("/submittask")}}/'+assigntask_name+'/'+assigntask_to+'/'+assigntask_at+'/'+task_type+'/'+task_for, function(data){
      $('#showtask').empty().append(data);
          document.getElementById('assigntask_name').value = "";
          $('#exampleModalToggle').modal('hide');
      });
    }
  }
</script>
@endsection