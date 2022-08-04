@extends('layouts.apptheme')
@section('appcontent')
<div class ="page-wrapper respurses-page brokker-page">
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
<!--<a href="{{url('/dashboard')}}"> <span style ="color:#4D525B"> Dashboard </a>  </span> <span style ="color:#A2A2A2">  > User List </span>-->
</div>



<div class="flex invest-flex broker-flex">
<h4 class="page-title">Brokers</h4>
</div>


<div class ="resources"  >
<div class ="row">
<div class ="col-xl-12">
<div class ="investor-table brokkker-tbl">
    
    


<div class ="flex broker-flexs">
<div class ="fleds">
   <input type="checkbox" class ="brok-check"> <a href="#" class ="ress-btn"> Emailr</a>
</div>


</div>    
    
<div class ="flex-new">
 <div>
 </div>   
 </div>
 <hr class ="line-break" >
  <table id="crm" class="display nowrap" style="width:100%">
    <thead>
      <!--<th scope="col">Image</th>-->
      <td> </td>
      <th scope="col">Added By</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
    </thead>
    <tbody>
    @foreach($data as $val)
      <tr>
        <td>  <input type="checkbox" class ="brok-colcheck"></td>
        <td>{{$val->users_name}}</td>
        <td>{{$val->brooker_firstname}}</td>
        <td>{{$val->brooker_age}}</td>
        <td>{{$val->brooker_email}}</td>
        <td>{{$val->brooker_phonenumber}}</td>
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