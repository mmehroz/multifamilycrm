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