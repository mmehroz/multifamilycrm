@extends('layouts.apptheme')
@section('appcontent')
<div class ="page-wrapper">
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
    @if(session()->get('email'))
    <div class ="dash-url">
        <a href="{{URL('/investerlist')}}"> <span style ="color:#4D525B">Invester List </span> <span style ="color:#A2A2A2">  > Edit Invester  </span> </a>
    </div>
    @endif
    <section id ="profile-sec">
        <form method="Post" action="{{url('/submiteditinvester')}}" class ="user-profile-form">
            {{ csrf_field() }}
            <div class ="h2-heading-bg">
            <h2>Personal Information</h2>
            </div>
            <input type="hidden" name="investerinfo_id" value="{{$data->investerinfo_id}}">
            <div class ="form-sec">
                <div class ="row proff-form-row">
                    <div class ="col-lg-3">
                        <label for="">First Name * </label>   
                        <input type="text" name="investerinfo_fname" value="{{$data->investerinfo_fname}}">
                    </div>
                    <div class ="col-lg-3">
                        <label for="">Last Name * </label>     
                        <input type="text" name="investerinfo_lname" value="{{$data->investerinfo_lname}}">
                    </div>
                    <div class ="col-lg-3">
                        <label for="">Email</label>      
                        <input type="email" name="investerinfo_email" value="{{$data->investerinfo_email}}" required>
                    </div>
                    <div class ="col-lg-3">
                        <label for="">Phone </label><br>
                        <input type="number" name="investerinfo_phone"  value="{{$data->investerinfo_phone}}">
                    </div>
                </div>
                <div class ="row  col-streets">
                    <div class ="col">
                        <label for="">Street Address 1 * </label>   
                        <input type="text" name="investerinfo_addressone" value="{{$data->investerinfo_addressone}}">
                    </div>
                    <div class ="col">
                        <label for="">Street Address 2 * </label>     
                        <input type="text" name="investerinfo_addresstwo"  value="{{$data->investerinfo_addresstwo}}">
                    </div>
                    <div class ="col">
                        <label for="">City *</label>      
                        <input type="text" name="investerinfo_city" value="{{$data->investerinfo_city}}">
                    </div>
                    <div class ="col">
                        <label for="">State * </label>  <br>
                        <input type="text" name="investerinfo_state" value="{{$data->investerinfo_state}}">
                    </div>
                    <div class ="col-md-2">
                        <label for="">postal Code * </label>  <br> 
                        <input type="text" name="investerinfo_postal" value="{{$data->investerinfo_postal}}">
                    </div>
                </div>
                <div class ="row  col-streets">
                    <div class ="col">
                        <label for="">Can we send you SMS (text) message</label>   
                        <input type="radio" id="Yes1" name="investerinfo_canwesendsms" @if($data->investerinfo_canwesendsms == "Yes") {{"checked"}} @endif value="Yes" class ="radio-invest">
                        <label for="Yes1"> Yes</label>  &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" id="No1" name="investerinfo_canwesendsms" @if($data->investerinfo_canwesendsms == "No") {{"checked"}} @endif value="No" class ="radio-invest">
                        <label for="No1"> No</label>
                    </div>
                </div>
            </div>
            <div class ="h2-heading-bg m-0">
                <h2>Investment Objectives</h2>
            </div>
            <div class ="new-rows investor-formsec">
                <p class ="radio-notifay"> What are your investment goals? * </p>
                <input type="checkbox" id="cash" name="investerobj_goals" @if($data->investerobj_goals == "goal1") {{"checked"}} @endif value="goal1"> <label for="cash"> Cash Flow </label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="capital" name="investerobj_goals" @if($data->investerobj_goals == "goal2") {{"checked"}} @endif value="goal2"> <label for="capital"> Capital Appreciation </label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="term" name="investerobj_goals" @if($data->investerobj_goals == "goal3") {{"checked"}} @endif value="goal3"> <label for="term"> Long term hold </label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="short" name="investerobj_goals" @if($data->investerobj_goals == "goal4") {{"checked"}} @endif value="goal4"> <label for="short">Short term hold </label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="investments" name="investerobj_goals" @if($data->investerobj_goals == "goal5") {{"checked"}} @endif value="goal5"> <label for="investments">Tax qualified investments</label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="exchange" name="investerobj_goals" @if($data->investerobj_goals == "goal6") {{"checked"}} @endif value="goal6"> <label for="exchange">1031 exchange opportunities</label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <div class ="flex">
                <p class ="radio-notifay">What is your investment timeline? *</p>
                </div>
                <input type="radio" id="22" name="investerobj_timeline" @if($data->investerobj_timeline == "timeline1") {{"checked"}} @endif value="timeline1">
                <label for="22"> Less than 2 years</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="3" name="investerobj_timeline" @if($data->investerobj_timeline == "timeline2") {{"checked"}} @endif value="timeline2">
                <label for="3"> 3-7 years</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="7+" name="investerobj_timeline" @if($data->investerobj_timeline == "timeline3") {{"checked"}} @endif value="timeline3">
                <label for="7+"> 7+ years</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <div class ="flex">
                <p class ="radio-notifay">When would you like to invest in your first multifamily property? *</p>
                </div>
                <input type="radio" id="12" name="investerobj_invest" @if($data->investerobj_invest == "invest1") {{"checked"}} @endif value="invest1">
                <label for="12"> Within the next 12 months</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="36" name="investerobj_invest" @if($data->investerobj_invest == "invest1") {{"checked"}} @endif value="invest2" value="invest2">
                <label for="36">Within the next 36 months</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="opportunity" name="investerobj_invest" @if($data->investerobj_invest == "invest1") {{"checked"}} @endif value="invest3" value="invest3">
                <label for="opportunity">Depends upon the opportunity</label>&nbsp; &nbsp; &nbsp; &nbsp; <br>
                <label>How much capital would you like to allocate for your first multifamily real estate investment (min $50,000)? *</label><br>
                <input type="text" name="investerobj_firstcapital" value="{{$data->investerobj_firstcapital}}" class="object-type"  > <br>
                <label>How much capital would you have available to invest over the next two years</label><br>
                <input type="text" name="investerobj_twoyearcapital" value="{{$data->investerobj_twoyearcapital}}" class="object-type"  > <br>
                <label>What additional information should we know about you personally, your history, and your investment goals? *</label><br>
                <input type="text" name="investerobj_additionalinfo" value="{{$data->investerobj_additionalinfo}}" class="object-type"  > <br>
                <label>Describe your previous real estate investment, other investment and investment evaluation experience? *</label><br>
                <input type="text" name="investerobj_evaluation" value="{{$data->investerobj_evaluation}}" class="object-type"  > <br>
            </div>
            <div class ="h2-heading-bg m-0">
                <h2>Accredited Investor Questions</h2>
            </div>
        <div class ="new-rows">
            <div class ="flex">
                <div>
                    <label>If you are an individual, what is your principal place of residence? *</label><br>
                    <input type="text" name="investerquestion_principalresidence" value="{{$data->investerquestion_principalresidence}}" class="object-type"  >
                </div>    
                <div>
                    <label>If you are investing as a business, where is your principal place of business? *</label><br>
                    <input type="text" name="investerquestion_principalbussiness" value="{{$data->investerquestion_principalbussiness}}" class="object-type"  > <br>
                </div>
            </div>

        <div class ="flex">
            <div>
                <label>Educational background (level, degrees completed):</label><br>
                <input type="text" name="investerquestion_education" value="{{$data->investerquestion_education}}" class="object-type"  > 
        </div>    
            <div>
                <label>Net worth, partner, capital or total assets</label><br>
                <input type="radio" id="$5,000" name="investerquestion_networth" @if($data->investerquestion_networth == "net1") {{"checked"}} @endif value="net1">
                <label for="$5,000"> $5,000,000 or more</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="1-5" name="investerquestion_networth" @if($data->investerquestion_networth == "net2") {{"checked"}} @endif value="net2">
                <label for="1-5">$1,000,000 - $5,000,000</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="$1" name="investerquestion_networth" @if($data->investerquestion_networth == "net3") {{"checked"}} @endif value="net3">
                <label for="$1">Less than $1,000,000</label>&nbsp; &nbsp; &nbsp; &nbsp;
            </div>
        </div>
        <div class ="flex">
            <div>
                <p>For individual or married persons only - Gross income for each of the last 2 years *</p>   
                <input type="radio" id="one" name="investerquestion_incomelasttwoyear" @if($data->investerquestion_incomelasttwoyear == "il1") {{"checked"}} @endif value="il1">
                <label for="one"> $300,000 or more</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="two" name="investerquestion_incomelasttwoyear" @if($data->investerquestion_incomelasttwoyear == "il2") {{"checked"}} @endif value="il2">
                <label for="two">$200,000 - $300,000</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="three" name="investerquestion_incomelasttwoyear" @if($data->investerquestion_incomelasttwoyear == "il3") {{"checked"}} @endif value="il3">
                <label for="three">Less than $200,000</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="N/A" name="investerquestion_incomelasttwoyear" @if($data->investerquestion_incomelasttwoyear == "N/A") {{"checked"}} @endif value="N/A">
                <label for="N/A">N/A</label>&nbsp; &nbsp; &nbsp; &nbsp;

            </div>
            <div>
                <p>Is this income amount combined with that of your spouse? *</p>
                <input type="radio" id="yes1" name="investerquestion_incomewithspouse" @if($data->investerquestion_incomewithspouse == "Yes") {{"checked"}} @endif value="Yes">
                <label for="yes1"> Yes</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="no" name="investerquestion_incomewithspouse" @if($data->investerquestion_incomewithspouse == "No") {{"checked"}} @endif value="No">
                <label for="no">No</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="N/A1" name="investerquestion_incomewithspouse" @if($data->investerquestion_incomewithspouse == "N/A") {{"checked"}} @endif value="N/A">
                <label for="N/A1">N/A</label>&nbsp; &nbsp; &nbsp; &nbsp;
            </div>
        </div>
            <div>
                <p>Do you expect to reach the same level of income in the current year? *</p>
                <input type="radio" id="yes22" name="investerquestion_levelofincome" @if($data->investerquestion_levelofincome == "Yes") {{"checked"}} @endif value="Yes">
                <label for="yes22"> Yes</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="no12" name="investerquestion_levelofincome" @if($data->investerquestion_levelofincome == "No") {{"checked"}} @endif value="No">
                <label for="no12">No</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="N/A2" name="investerquestion_levelofincome" @if($data->investerquestion_levelofincome == "N/A") {{"checked"}} @endif value="N/A">
                <label for="N/A2">N/A</label>&nbsp; &nbsp; &nbsp; &nbsp; 
            </div>
                <h3>In connection with my investment activities, I ulilize the services of he following attorney, accountant or other advisor to assist me in analyzing investment opportunities:</h3>
            <div class ="flex">
                <div>
                    <label>1. Name and title of advisor: *</label><br>
                    <input type="text" name="investerotherinfo_advisortitle" value="{{$data->investerotherinfo_advisortitle}}" class="object-type"  >
                </div>    
                <div>
                    <label>2. Advisor business address: *</label><br>
                    <input type="text" name="investerotherinfo_advisorbussiness" value="{{$data->investerotherinfo_advisorbussiness}}" class="object-type"  > <br>
                </div>
            </div>


            <div class ="flex">
                <div>
                    <label>1. Age: *</label><br>
                    <input type="text" name="investerotherinfo_age" value="{{$data->investerotherinfo_age}}" class="object-type"  >
                </div>    
                <div>
                    <label>2. Marital status: *</label><br>
                    <input type="radio" id="single" name="investerotherinfo_maritalstatus" @if($data->investerotherinfo_maritalstatus == "single") {{"checked"}} @endif value="single">
                    <label for="single"> Single</label>&nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="radio" id="married" name="investerotherinfo_maritalstatus" @if($data->investerotherinfo_maritalstatus == "married") {{"checked"}} @endif value="married">
                    <label for="married">No</label>&nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="radio" id="divorced" name="investerotherinfo_maritalstatus" @if($data->investerotherinfo_maritalstatus == "divorced") {{"checked"}} @endif value="divorced">
                    <label for="divorced">Divorced</label>&nbsp; &nbsp; &nbsp; &nbsp; 
                </div>    
                <div>
                    <label>3. Number of dependents:</label><br>
                    <input type="text" name="investerotherinfo_numberofdependent" value="{{$data->investerotherinfo_numberofdependent}}" class="object-type"  >
                </div>    
            </div>
            <div class ="flex">
                <div>
                    <label>I am an “accredited investor” as defined in Rule 501(a) of Securities and Exchange Commission Regulation D. (Please initial) *</label><br>
                    <input type="text" name="investerotherinfo_rulea" value="{{$data->investerotherinfo_rulea}}" class="object-type"  >
                </div>      
            </div>
            <div class ="flex">
                <div>
                    <label>I have adequate means of providing my current needs, and possible personal contingencies, and have no need for liquidity in an investment in the Company. (Please initial) *</label><br>
                    <input type="text" name="investerotherinfo_adequate" value="{{$data->investerotherinfo_adequate}}" class="object-type"  >
                </div>      
            </div>
            <div class ="flex">
                <div>
                    <label>I, together with my advisors, have specific knowledge and experience in related financial and business matters so as to be capable of evaluating the relative economic and operational merits and risks of an investment in the stock. (Please initial) *</label><br>
                    <input type="text" name="investerotherinfo_withadvisor" value="{{$data->investerotherinfo_withadvisor}}" class="object-type"  >
                </div>      
            </div>
            <div class ="flex">
                <div>
                    <label>Considering your past financial and investment experience as well as your involvement in previous projects offered by the Company, do you consider yourself a "sophisticated investor"? *</label><br>
                    <input type="radio" id="yes33" name="investerotherinfo_sophisticated" @if($data->investerotherinfo_sophisticated == "yes33") {{"checked"}} @endif value="yes33">
                    <label for="yes33"> Yes</label>&nbsp; &nbsp; &nbsp; &nbsp;

                    <input type="radio" id="no33" name="investerotherinfo_sophisticated" @if($data->investerotherinfo_sophisticated == "no33") {{"checked"}} @endif value="no33">
                    <label for="no33">No</label>&nbsp; &nbsp; &nbsp; &nbsp;
                </div> 
            </div>   
            <div class ="flex">
                <div>
                    <label>By Clicking the Submit button you are certifying that you have answered the foregoing questions to the best of your knowledge and that the answers are complete and accurate. (Please initial) *</label><br>
                    <input type="text" name="investerotherinfo_certifying" value="{{$data->investerotherinfo_certifying}}" class="object-type"  >
                </div> 
            </div>
        <div class ="user-btns">
            <input type="submit" name ="Submit">
            <a href="{{url('/investerlist')}}">Cancel</a>
        </div> 
    @if(session()->get('role_id') == 2)
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
                    <input  type="button" class="comment-btn" value="Submit" onclick="submitcommentinvester({{$data->investerinfo_id}})">
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
    @endif
</div>
</form>
</section>
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
            <input type="submit" class="add-btn" onclick="submitassigntask({{$data->investerinfo_id}})" id="refresh">
        </div>
    </div>
  </div>
</div>
</div>
<script>
    $( document ).ready(function() {
        document.getElementById('commentinvester_text').focus();
    });
    function submitcommentinvester($id){
        var comment = document.getElementById('commentinvester_text').value;
        if (comment == "") {
            alert("Enter Comment To Save");
        }else{
        $.get('{{ URL::to("/submitcommentinvester")}}/'+$id+'/'+comment,function(data){
        $('#showcomments').empty().append(data);
        document.getElementById('commentinvester_text').value = "";
        document.getElementById('commentinvester_text').focus();
        });
        }
    }
    function submitassigntask($id){
        var assigntask_name = document.getElementById('assigntask_name').value;
        var assigntask_to = document.getElementById('assigntask_to').value;
        var assigntask_at = document.getElementById('assigntask_at').value;
        $.get('{{ URL::to("/submitassigntask")}}/'+$id+'/'+assigntask_name+'/'+assigntask_to+'/'+assigntask_at,function(data){
        $('#showtask').empty().append(data);
            document.getElementById('assigntask_name').value = "";
            $('#exampleModalToggle').modal('hide');
        });
    }
</script>
@endsection