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
<a href="{{url('/vadashboard')}}"> <span style ="color:#4D525B"> Dashboard </a>  </span> <span style ="color:#A2A2A2">  > Resources </span>
</div>
<h4 class="page-title">Resources</h4>
<div class ="resources"  >
<div class ="row">
<div class ="col-xl-12">
 
<div class ="table-res table-left">   
 <div class ="flex-new">
 <div>
 <h3>Follow Up Tasks</h3>
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
</div>
</div>
</div>
</div>
    </div>
  </div>
@endsection