@extends('layouts.apptheme')
@section('appcontent')
<div class ="page-wrapper inverrr-page proppt-page ">
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
<h4 class="page-title prop-page">Properties <span class="num-count">{{$totalcount}}</span> </h4>
<div class ="investor-table">
    <div class ="flex invest-flex">
    <div>
             <input type="checkbox">
    </div>
    </div>
  <hr class ="investor-divider">
    <table id="crm" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Property Name</th>
                <th>Add On</th>
                <th>Address</th>
                <th>Property Owner</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $val)
                <div class ="bg-color-table">   <tr>
                <td> <div class ="bg-color-table-col"> <input type="checkbox" class ="spacing-check"> </div> </td>
                <td><div class ="bg-color-table-col">   {{$val->property_name}}  </div> </td>
                <td> <div class ="bg-color-table-col"> {{$val->created_at}} </div> </td>
                <td> <div class ="bg-color-table-col">  {{$val->property_address}} </div> </td>
                <td> <div class ="bg-color-table-col">  {{$val->property_ownername}}  </div> </td>
                <td> <div class ="bg-color-table-col">  {{$val->property_ownercontact}}  </div> </td>
                <td class ="text-right-inverstor">
                <a href="{{url('/deleteproperty')}}/{{$val->property_id}}/Property" class =""><img src="{!! asset('public/assets/images/remove-02.svg') !!}" alt="crass"></a>
                <a href="{{url('/editproperty')}}/{{$val->property_id}}/Property" class =""><img src="{!! asset('public/assets/images/edit-02.svg') !!}" alt="crass"></a>
                </td>
             </tr> </div>
            @endforeach
    </table>
    </div>
    </div>
</div>
@endsection