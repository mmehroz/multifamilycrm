@extends('layouts.apptheme')
@section('appcontent')
<div class="page-wrapper prop-name-page">
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
          </ul>Studio Effective Rent/Unit
                            
        </div>
    @endif
    <div class="dash-url"> <span style="color:#4D525B"> Property </span>
        <a href="#"> <span style="color:#A2A2A2">  &gt; Details  </span> </a>
    </div>
    <div class="flex prop-name-flex">
        <h4 class="page-title ">{{$data->property_name}}</h4>
        <div class="">
            <select id="role" name="role">
                <option value="sub admin">No Contact Made</option>
                <option value="sub admin">Contact Made</option>
                <option value="sub admin">Info Received</option>
                <option value="sub admin">Offer Made</option>
            </select>
        </div>
    </div>
    <a href="#" class="ress-btn prop-btns"> <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"></a>
    <div class="row">
        <div class="col-xl-9 left-div">
            <h3 class="prop-name-h3">Property Details</h3>
            <div class="flex">
                <table class="table prop-name-table">
                    <thead> </thead>
                    <tbody>
                        <tbody>
                            <tr class="bg-light">
                                <td>Property Address</td>
                                <td>{{$data->property_address}}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{$data->property_city}}</td>
                                <tr class="bg-light">
                                    <td>State</td>
                                    <td>{{$data->property_state}}</td>
                                </tr>
                                <tr>
                                    <td>Zip</td>
                                    <td>{{$data->property_zip}}</td>
                                </tr>
                        </tbody>
                </table>
                <table class="table prop-name-table">
                    <thead> </thead>
                    <tbody>
                        <tbody>
                            <tr class="bg-light">
                                <td>Number Of Units</td>
                                <td>{{$data->property_noofunit}}</td>
                            </tr>
                            <tr>
                                <td>Building Class</td>
                                <td>{{$data->property_class}}</td>
                            </tr>
                            <tr class="bg-light">
                                <td>Year Built</td>
                                <td>{{$data->property_yearbuilt}}</td>
                            </tr>
                            <tr>
                                <td>Year Renovated</td>
                                <td>{{$data->property_yearrenovated}}</td>
                            </tr>
                        </tbody>
                </table>
            </div>
            <h3 class="prop-name-h3 ">Property Specs And Price</h3>
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-unitsf1.svg') !!}" alt="icon">
                        <p>Avg Unit SF
                            <br> <b> {{$data->property_unitsf}}</b> </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-asksf.svg') !!}" alt="icon">
                        <p>Avg Asking/SF
                            <br> <b>{{$data->property_askingsf}}</b> </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-unitsf1.svg') !!}" alt="icon">
                        <p>Avg Asking/Unit
                            <br> <b>{{$data->property_askingunit}}</b> </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-saleprice.svg') !!}" alt="icon">
                        <p>For Sale Price
                            <br> <b>{{$data->property_forsaleprice}}</b> </p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-caprate.svg') !!}" alt="icon">
                        <p>Cap Rate
                            <br> <b>{{$data->property_caprate}}</b> </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-vacancy.svg') !!}" alt="icon">
                        <p>Vacancy %
                            <br> <b>{{$data->property_vacancy}}</b> </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-saleprice.svg') !!}" alt="icon">
                        <p>$Price/Unit
                            <br> <b>{{$data->property_spriceunit}}</b> </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-saleprice.svg') !!}" alt="icon">
                        <p>Studio Effective Rent/Unit
                            <br> <b>{{$data->property_studiorentunit}}</b> </p>
                    </div>
                </div>
            </div>
            <div class="num-of">
                <div class="row ">
                    <div class="col-md-4 ">
                        <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-unitsfnn.svg') !!}" alt="icon">
                            <p>Number Of 1 Bedrooms Units
                                <br> <b> {{$data->property_noofonebed}}</b> </p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="prop-img-icon">
                            <p>Number Of 2 Bedrooms Units
                                <br> <b> {{$data->property_nooftwobed}}</b> </p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="prop-img-icon"> </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 ">
                        <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-unitsfnn.svg') !!}" alt="icon">
                            <p>Number Of 3 Bedrooms Units
                                <br> <b> {{$data->property_noofthreebed}}</b> </p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="prop-img-icon">
                            <p>Number Of 4 Bedrooms Units
                                <br> <b> {{$data->property_nooffourbed}}</b> </p>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 ">
                        <div class="prop-img-icon"> <img src="{!! asset('public/assets/images/ico-unitsfnn.svg') !!}" alt="icon">
                            <p>Number Of 1 Bedrooms Rent Units
                                <br> <b> {{$data->property_onebedrentunit}}</b> </p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="prop-img-icon">
                            <p>Number Of 2 Bedrooms Asking Units
                                <br> <b> {{$data->property_twobedaskingrentunit}}</b> </p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="prop-img-icon">
                            <p>Number Of 3 Bedrooms Asking Units
                                <br> <b> {{$data->property_threebedaskingrentunit}}</b> </p>
                        </div>
                    </div>
                </div>
            </div>
    
        <div class="flex prop-name-flex">
            <h3 class="prop-name-h3">Location & Nearby</h3>
            <a class="ress-btn" href="#"> <img src="{!! asset('public/assets/images/ico-streetview.svg') !!}" alt="plus">Street View</a>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d99030.03232470197!2d-84.61044107224544!3d39.136319092299615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x884051b1de3821f9%3A0x69fb7e8be4c09317!2sCincinnati%2C%20OH%2C%20USA!5e0!3m2!1sen!2s!4v1646060421272!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
     <!-- task and comment -->
    <div class="tabs-comment">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Comments</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Assign Task</button>
          </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show comment-panel" id="home" role="tabpanel" aria-labelledby="home-tab">
               <div class="overflow-scrool" id="showcomments">     
                @foreach($comment as $comments)
                <p id="showcomment{{$comments->commentinvester_id}}" class="commet-pp ">{{$comments->commentinvester_text}}  <span class="comment-datetime"> {{$comments->created_at}}</span>  </p> 
                @endforeach
                </div>  
                <div class="comment-bottum">
                    <input type="text" name="commentinvester_text" id="commentinvester_text" class="comment-field" placeholder="Type your comment..." id="">
                    <input  type="button" class="comment-btn" value="Submit" onclick="submitcommentproperty({{$data->property_id}})">
                </div>   
            </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
            <div class="comment-bo">
                <a class="add-btn" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Add</a>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-xl-3 right-div">
        <div class="right-prop-name">
            <div class="new-tab-content">
                <h3 class="prop-name-h3 prop-new-h3">Owner Details</h3>
                <p> QC PROPERTIES LTD
                    <br> P.O.Box 46314
                    <br> Cincinnati, OH 45246
                    <br> <i class="fa fa-user" aria-hidden="true"></i> Christopher Jones
                    <br> <i class="fa fa-phone" aria-hidden="true"></i> 5132588549 </p>
                <h3 class="prop-name-h3 prop-new-h3">Property Manager</h3>
                <p> <i class="fa fa-user" aria-hidden="true"></i> QC PROPERTIES LTD
                    <br> <i class="fa fa-phone" aria-hidden="true"></i> 5132588549 </p>
                <h3 class="prop-name-h3 prop-new-h3">Recorded Owner Details</h3>
                <p> QC PROPERTIES LTD
                    <br> P.O.Box 46314
                    <br> Cincinnati, OH 45246
                    <br> <i class="fa fa-user" aria-hidden="true"></i> Christopher Jones
                    <br> <i class="fa fa-phone" aria-hidden="true"></i> 5132588549 </p>
                <h3 class="prop-name-h3 prop-new-h3">Sale Company Details</h3>
                <p> Cushman & Wakefield
                    <br> <i class="fa fa-user" aria-hidden="true"></i> Donald Murphy
                    <br> <i class="fa fa-phone" aria-hidden="true"></i> 5134214884 </p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Add</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" name="assigntask_name" id="assigntask_name" class="object-type" required placeholder ="Enter Task Name">
            <select id="assigntask_to" name="assigntask_to">
                <option value="">Select Assignee</option>
                @foreach($va as $vas)
                <option value="{{$vas->users_id}}">{{$vas->users_name}}</option>    
                @endforeach 
            </select>
            <input type="date" id="assigntask_at" name="assigntask_at" required value="<?php echo(date('Y-m-d'))?>">
            <input type="submit" class="add-btn" onclick="submitpropertyassigntask({{$data->property_id}})" id="refresh">
        </div>
    </div>
  </div>
</div>
</div>
<script>
    function submitcommentproperty($id){
        var comment = document.getElementById('commentinvester_text').value;
        if (comment == "") {
            alert("Enter Comment To Save");
        }else{
        $.get('{{ URL::to("/submitcommentproperty")}}/'+$id+'/'+comment,function(data){
        $('#showcomments').empty().append(data);
        document.getElementById('commentinvester_text').value = "";
        document.getElementById('commentinvester_text').focus();
        });
        }
    }
    function submitpropertyassigntask($id){
        var assigntask_name = document.getElementById('assigntask_name').value;
        var assigntask_to = document.getElementById('assigntask_to').value;
        var assigntask_at = document.getElementById('assigntask_at').value;
        $.get('{{ URL::to("/submitpropertyassigntask")}}/'+$id+'/'+assigntask_name+'/'+assigntask_to+'/'+assigntask_at,function(data){
        $('#showtask').empty().append(data);
            document.getElementById('assigntask_name').value = "";
            $('#exampleModalToggle').modal('hide');
        });
    }
</script>
@endsection