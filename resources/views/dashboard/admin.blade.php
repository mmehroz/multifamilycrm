
@extends('layouts.apptheme')
@section('appcontent')
<div class ="page-wrapper dashboard-page new-dashh">
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
    <h4 class="page-title prop-page">Admin Dashboard</h4>
    <div class="investor-table properties-table">
        <div class="flex-new">
            <div>
                <h3>Properties</h3> 
            </div>
            <!--<div>-->
            <!--<a class="ress-btn" data-bs-toggle="modal" href="#add-template" role="button"> <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Upload Property</a>-->
            <!--</div>-->
        </div>
    <table id="crm" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Property Name</th>
                <th>Add On</th>
                <th>Address</th>
                <th>Property Owner</th>
                <th>Contact Number</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($property as $val)
            <tr>
                <td><input type="checkbox"></td>
                <td>{{$val->property_name}}</td>
                <td>{{$val->created_at}}</td>
                <td>{{$val->property_address}}</td>
                <td>{{$val->property_ownername}}</td>
                <td>{{$val->property_ownercontact}}</td>
                <td class ="text-right-inverstor">
                <a href="{{url('/editproperty')}}/{{$val->property_id}}/Dashboard" class =""><img src="{!! asset('public/assets/images/edit-02.svg') !!}" alt="crass"></a>
                <a href="{{url('/deleteproperty')}}/{{$val->property_id}}/Dashboard" class =""><img src="{!! asset('public/assets/images/remove-02.svg') !!}" alt="crass"></a> 
                </td>
             </tr>
            @endforeach
    </table>
             
                <a href="{{url('propertylist')}}" target="_blank" class="veiw-all top-table">View All Properties  <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div>
            <div class="resources">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="table-res table-left top-space">
                            <div class="flex-new">
                                <div>
                                    <h3>Brokers</h3>
                                </div>
                                
                                <!--<div>-->
                                <!--    <a class="ress-btn" data-bs-toggle="modal" href="#add-template" role="button"> <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Add Broker </a>-->
                                <!--</div>-->
                            </div>
                            <!--<hr class="line-break">-->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!--<th scope="col">Image</th>-->
                                        <th scope="col">Added By</th>
                                        <th scope="col">Broker</th>
                                         <th scope="col">Email</th>
                                        <!--<th scope="col">Age</th>-->
                                        <th scope="col">Phone</th>
                                       
                                        <!--<th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($broker as $brokers)
                                    <tr>
                                        <!--<td class ="res-with"> <img src="{!! asset('public/brokerimage/') !!}/{{$brokers->brooker_image}}" alt="snip" width="40px"></td>-->
                                        <td>{{$brokers->users_name}}</td>
                                        <td>{{$brokers->brooker_firstname}}</td>
                                         <td>{{$brokers->brooker_email}}</td>
                                        <!--<td>{{$brokers->brooker_age}}</td>-->
                                         <td>{{$brokers->brooker_phonenumber}}</td> 
                                    
                                     <!--   <td class ="text-right-inverstor">-->
                                     <!--  <a href="#" class =""><img src="{!! asset('public/assets/images/edit-02.svg') !!}" alt="crass"></a>-->
                                     <!--<a href="#" class =""><img src="{!! asset('public/assets/images/remove-02.svg') !!}" alt="crass"></a>  -->
                                     <!--  </td>-->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> <a href="{{url('/brokerlist')}}" target="_blank" class="veiw-all">View All Brokers  <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div>
                        <div class="table-res table-left top-space">
                            <div class="flex-new">
                                <div>
                                    <h3>Investor </h3> </div>
                            </div>
                            <!--<hr class="line-break">-->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Added by</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <!--<th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invester as $investers)
                                    <tr>
                                        <td>{{$investers->users_name}}</td>
                                        <td>{{$investers->investerinfo_fname}}</td>
                                        <td>{{$investers->investerinfo_email}}</td>
                                        <td>{{$investers->investerinfo_phone}}</td>
                                        <!--<td class ="text-right-inverstor">-->
                                        <!--  <a href="#" class =""><img src="{!! asset('public/assets/images/edit-02.svg') !!}" alt="crass"></a>-->
                                        <!--  <a href="#" class =""><img src="{!! asset('public/assets/images/remove-02.svg') !!}" alt="crass"></a>  -->
                                        <!--</td>-->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> <a href="{{url('/investerlist')}}" target="_blank" class="veiw-all">View All Investor  <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div>
                        <div class="table-res table-left top-space">
                            <div class="flex-new">
                                <div>
                                    <h3>Email Templates</h3>
                                </div>
                            </div>
                            <!--<hr class="line-break">-->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Message</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($email as $emails)
                                    <tr>
                                      <td>{{$emails->emailtemplate_title}}</td>
                                      <td>{{$emails->emailtemplate_message}}</td>
                                      <td>
                                      <a onclick="editemailtemplate({{$emails->emailtemplate_id}});"><img src="{!! asset('public/assets/images/edit-02.svg') !!}" alt="crass"></a>
                                      <a href="{{url('/deleteemailtemplate')}}/{{$emails->emailtemplate_id}}/Dashboard" class =""><img src="{!! asset('public/assets/images/remove-02.svg') !!}" alt="crass"></a>  </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> <a href="{{url('/adminresources')}}" target="_blank" class="veiw-all">View All Template  <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="table-res table-right dashboard-user">
                            <div class="flex-new">
                                <div>
                                    <h3>User Accounts</h3>
                                </div>
                             </div>
                            <!--<hr class="line-break">-->
                     <div class ="scroll-table">        
                            <table class="table">
                                <thead> 
                                    <th>Image</th>
                                    <th>Name</th> 
                                    <th>Role</th> 
                                    <th></th>
                                </thead>
                                <tbody>
                                @foreach($user as $users)
                                <tr>
                                   <td class ="res-with"> <img src="{!! asset('public/userimage/') !!}/{{$users->users_image}}" alt="snip" width="40px"> </td>
                                   <td>{{$users->users_name}}</td>
                                   <td>{{$users->role_name}}</td>
                                   <td>  <a href="{{url('/edituser')}}/{{$users->users_id}}" class =""><img src="{!! asset('public/assets/images/edit-02.svg') !!}" alt="crass"></a> </td> 
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>        
                            
                            
                            <a href="{{url('/adminresources')}}" target="_blank" class="veiw-all">View All User  <i class="fa fa-arrow-right" aria-hidden="true"></i></a>  
                        </div>
                    </div>
                </div>
            </div>  
</div>
  <div id ='modals'></div>
    <script>
    function editemailtemplate($id){
        $.get('{{ URL::to("/editemailtemplate")}}/'+$id+"/Dashboard",function(data){
        $('#modals').empty().append(data);
        $('#editemailtemplate').modal('show');
        });
    }
    function closemodal(){
          $('#add-template').modal('hide');
    }
  </script>
@endsection





