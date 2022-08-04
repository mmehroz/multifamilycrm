@extends('layouts.apptheme')
@section('appcontent')
<div class ="page-wrapper user-dashboard-page">
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
    <h4 class="page-title prop-page">Client Dashboard</h4>
        <div class="row">
            <div class="col-xl-7">
                <div class="task-table">
                    <h3>Assigned Tasks</h3>
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
             <a href="{{url('tasklist')}}" class="veiw-all">View All Task  <i class="fa fa-arrow-right" aria-hidden="true"></i></a> 
         </div>
            </div>
         
         
<div class="col-xl-5">
					<div class="task-table">
						<h3>Messages</h3>
						<table class="table message-table">
							<thead>
								
								</thead><tbody>
									<tr>
										<td class="user-name"> Nicci Troiani</td>
										<td> Rachel Mcadams Rebecca Moore Adam Gilchrist Jones Dermot Rachel Mcadams</td>
									</tr>
									<tr>
										<td class="user-name"> Nicci Troiani</td>
										<td> Rachel Mcadams Rebecca Moore Adam Gilchrist Jones Dermot Rachel Mcadams</td>
										</tr><tr>
											<td class="user-name"> Nicci Troiani</td>
											<td> Rachel Mcadams Rebecca Moore Adam Gilchrist Jones Dermot Rachel Mcadams
										</td></tr>
										<tr> </tr>
								</tbody>
						</table> <a href="#" class="veiw-all">View All User  <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div>
	</div>         
         
         
         
    </div>
    <div class="row top-space">
        <div class="col-lg-4">
            <div class="user-dash-numer">
                <div>
                    <h3>Properties</h3>
                    <h1>{{$noofproperty}}</h1> </div>
                <div> <img src="{!! asset('public/assets/images/clientdashboard/ico-openleads.svg') !!}" alt="crass"> </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="user-dash-numer">
                <div>
                    <h3>Brokers</h3>
                    <h1>{{$noofbrokers}}</h1> </div>
                <div> <img src="{!! asset('public/assets/images/clientdashboard/ico-assignedleads.svg') !!}" alt="crass"> </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="user-dash-numer">
                <div>
                    <h3>Investors</h3>
                    <h1>{{$noofbrokers}}</h1> </div>
                <div> <img src="{!! asset('public/assets/images/clientdashboard/ico-brokers.svg') !!}" alt="crass"> </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-4">
            <div class="user-dash-numer">
                        <div>
                            <h3>All Tasks</h3>
                            <h1>{{$noofbrokers}}</h1> </div>
                <div> <img src="{!! asset('public/assets/images/clientdashboard/ico-totalcalls.svg') !!}" alt="crass"> </div>
            </div>
        </div>
    </div><br>
</div>
@endsection