<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="CRM" />
    <meta name="viewport" content="CRM"/>
    <meta name="keywords" content="Multi Family CRM"/>
    <meta name="description"content="Multi Family CRM"/>
    <meta name="robots" content="noindex,nofollow" />
    <title>Multi Family CRM</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('public/assets/images/favicon.png') !!}"/>
    <link href="{!! asset('public/assets/libs/flot/css/float-chart.css') !!}" rel="stylesheet" />
    <link href="{!! asset('public/assets/dist/css/style.min.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="{!! asset('public/assets/libs/jquery/dist/jquery.min.js') !!}"></script>
  </head>
  <body>
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
    <section id ="profile-sec">
        <form method="Post" action="{{url('/submitlinkinvester')}}" class ="user-profile-form">
            {{ csrf_field() }}
            <input type="hidden" name="hdn_token" value="{{$token}}">
            <div class ="h2-heading-bg">
            <h2>Personal Information</h2>
            </div>
            <div class ="form-sec">
                <div class ="row proff-form-row">
                    <div class ="col-lg-3">
                        <label for="">First Name * </label>   
                        <input type="text" name="investerinfo_fname" class="" id="" >
                    </div>
                    <div class ="col-lg-3">
                        <label for="">Last Name * </label>     
                        <input type="text" name="investerinfo_lname" class="" id="" >
                    </div>
                    <div class ="col-lg-3">
                        <label for="">Email</label>      
                        <input type="email" name="investerinfo_email" class="" id="" required>
                    </div>
                    <div class ="col-lg-3">
                        <label for="">Phone </label>      <br>
                        <input type="number" name="investerinfo_phone" class="" id="" >
                    </div>
                </div>
                <div class ="row  col-streets">
                    <div class ="col">
                        <label for="">Street Address 1 * </label>   
                        <input type="text" name="investerinfo_addressone" class="" id="" >
                    </div>
                    <div class ="col">
                        <label for="">Street Address 2 * </label>     
                        <input type="text" name="investerinfo_addresstwo" class="" id="" >
                    </div>
                    <div class ="col">
                        <label for="">City *</label>      
                        <input type="text" name="investerinfo_city" class="" id="" >
                    </div>
                    <div class ="col">
                        <label for="">State * </label>  <br>
                        <input type="text" name="investerinfo_state" class="" id="" >
                    </div>
                    <div class ="col-md-2">
                        <label for="">postal Code * </label>  <br> 
                        <input type="text" name="investerinfo_postal" class="" id="" >
                    </div>
                </div>
                <div class ="row  col-streets">
                    <div class ="col">
                        <label for="">Can we send you SMS (text) message</label>   
                        <input type="radio" id="Yes1" name="investerinfo_canwesendsms" value="Yes" class ="radio-invest">
                        <label for="Yes1"> Yes</label>  &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" id="No1" name="investerinfo_canwesendsms" value="No" class ="radio-invest">
                        <label for="No1"> No</label>
                    </div>
                </div>
            </div>
            <div class ="h2-heading-bg m-0">
                <h2>Investment Objectives</h2>
            </div>
            <div class ="new-rows investor-formsec">
                <p class ="radio-notifay"> What are your investment goals? * </p>
                <input type="checkbox" id="cash" name="investerobj_goals" value="goal1"> <label for="cash"> Cash Flow </label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="capital" name="investerobj_goals" value="goal2"> <label for="capital"> Capital Appreciation </label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="term" name="investerobj_goals" value="goal3"> <label for="term"> Long term hold </label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="short" name="investerobj_goals" value="goal4"> <label for="short">Short term hold </label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="investments" name="investerobj_goals" value="goal5"> <label for="investments">Tax qualified investments</label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="checkbox" id="exchange" name="investerobj_goals" value="goal6"> <label for="exchange">1031 exchange opportunities</label>   &nbsp; &nbsp; &nbsp; &nbsp;
                <div class ="">
                <p class ="radio-notifay">What is your investment timeline? *</p>
                </div>
                <input type="radio" id="22" name="investerobj_timeline" value="timeline1">
                <label for="22"> Less than 2 years</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="3" name="investerobj_timeline" value="timeline2">
                <label for="3"> 3-7 years</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="7+" name="investerobj_timeline" value="timeline3">
                <label for="7+"> 7+ years</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <div class ="">
                <p class ="radio-notifay">When would you like to invest in your first multifamily property? *</p>
                </div>
                <input type="radio" id="12" name="investerobj_invest" value="invest1">
                <label for="12"> Within the next 12 months</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="36" name="investerobj_invest" value="invest2">
                <label for="36">Within the next 36 months</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="opportunity" name="investerobj_invest" value="invest3">
                <label for="opportunity">Depends upon the opportunity</label>&nbsp; &nbsp; &nbsp; &nbsp; <br>
                <label>How much capital would you like to allocate for your first multifamily real estate investment (min $50,000)? *</label><br>
                <input type="text" name="investerobj_firstcapital" class="object-type" id="" > <br>
                <label>How much capital would you have available to invest over the next two years</label><br>
                <input type="text" name="investerobj_twoyearcapital" class="object-type" id="" > <br>
                <label>What additional information should we know about you personally, your history, and your investment goals? *</label><br>
                <input type="text" name="investerobj_additionalinfo" class="object-type" id="" > <br>
                <label>Describe your previous real estate investment, other investment and investment evaluation experience? *</label><br>
                <input type="text" name="investerobj_evaluation" class="object-type" id="" > <br>
            </div>
            <div class ="h2-heading-bg m-0">
                <h2>Accredited Investor Questions</h2>
            </div>
        <div class ="new-rows">
            <div class ="">
                <div>
                    <label>If you are an individual, what is your principal place of residence? *</label><br>
                    <input type="text" name="investerquestion_principalresidence" class="object-type" id="" >
                </div>    
                <div>
                    <label>If you are investing as a business, where is your principal place of business? *</label><br>
                    <input type="text" name="investerquestion_principalbussiness" class="object-type" id="" > <br>
                </div>
            </div>

        <div class ="">
            <div>
                <label>Educational background (level, degrees completed):</label><br>
                <input type="text" name="investerquestion_education" class="object-type" id="" > 
        </div>    
            <div>
                <label>Net worth, partner, capital or total assets</label><br>
                <input type="radio" id="$5,000" name="investerquestion_networth" value="net1">
                <label for="$5,000"> $5,000,000 or more</label>&nbsp; &nbsp; &nbsp; &nbsp;

                <input type="radio" id="1-5" name="investerquestion_networth" value="net2">
                <label for="1-5">$1,000,000 - $5,000,000</label>&nbsp; &nbsp; &nbsp; &nbsp;

                <input type="radio" id="$1" name="investerquestion_networth" value="net3">
                <label for="$1">Less than $1,000,000</label>&nbsp; &nbsp; &nbsp; &nbsp;
            </div>
        </div>
        <div class ="">
            <div>
                <p>For individual or married persons only - Gross income for each of the last 2 years *</p>   
                <input type="radio" id="one" name="investerquestion_incomelasttwoyear" value="il1">
                <label for="one"> $300,000 or more</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="two" name="investerquestion_incomelasttwoyear" value="il2">
                <label for="two">$200,000 - $300,000</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="three" name="investerquestion_incomelasttwoyear" value="il3">
                <label for="three">Less than $200,000</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="N/A" name="investerquestion_incomelasttwoyear" value="N/A">
                <label for="N/A">N/A</label>&nbsp; &nbsp; &nbsp; &nbsp;

            </div>
            <div>
                <p>Is this income amount combined with that of your spouse? *</p>
                <input type="radio" id="yes1" name="investerquestion_incomewithspouse" value="Yes">
                <label for="yes1"> Yes</label>&nbsp; &nbsp; &nbsp; &nbsp;

                <input type="radio" id="no" name="investerquestion_incomewithspouse" value="No">
                <label for="no">No</label>&nbsp; &nbsp; &nbsp; &nbsp;

                <input type="radio" id="N/A1" name="investerquestion_incomewithspouse" value="N/A">
                <label for="N/A1">N/A</label>&nbsp; &nbsp; &nbsp; &nbsp;
            </div>
        </div>
            <div>
                <p>Do you expect to reach the same level of income in the current year? *</p>
                <input type="radio" id="yes22" name="investerquestion_levelofincome" value="Yes">
                <label for="yes22"> Yes</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="no12" name="investerquestion_levelofincome" value="No">
                <label for="no12">No</label>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" id="N/A2" name="investerquestion_levelofincome" value="N/A">
                <label for="N/A2">N/A</label>&nbsp; &nbsp; &nbsp; &nbsp; 
            </div>
                <h3>In connection with my investment activities, I ulilize the services of he following attorney, accountant or other advisor to assist me in analyzing investment opportunities:</h3>
            <div class ="">
                <div>
                    <label>1. Name and title of advisor: *</label><br>
                    <input type="text" name="investerotherinfo_advisortitle" class="object-type" id="" >
                </div>    
                <div>
                    <label>2. Advisor business address: *</label><br>
                    <input type="text" name="investerotherinfo_advisorbussiness" class="object-type" id="" > <br>
                </div>
            </div>


                <div>
                    <label>1. Age: *</label><br>
                    <input type="text" name="investerotherinfo_age" class="object-type" id="" >
                </div>    
                <div>
                    <label>2. Marital status: *</label><br>
                    <input type="radio" id="single" name="investerotherinfo_maritalstatus" value="single">
                    <label for="single"> Single</label>&nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="radio" id="married" name="investerotherinfo_maritalstatus" value="married">
                    <label for="married">No</label>&nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="radio" id="divorced" name="investerotherinfo_maritalstatus" value="divorced">
                    <label for="divorced">Divorced</label>&nbsp; &nbsp; &nbsp; &nbsp; 
                </div>    
                <div>
                    <label>3. Number of dependents:</label><br>
                    <input type="text" name="investerotherinfo_numberofdependent" class="object-type" id="" >
                </div>    
            </div>
            <div class ="flex">
                <div>
                    <label>I am an “accredited investor” as defined in Rule 501(a) of Securities and Exchange Commission Regulation D. (Please initial) *</label><br>
                    <input type="text" name="investerotherinfo_rulea" class="object-type" id="" >
                </div>      
            </div>
            <div class ="flex">
                <div>
                    <label>I have adequate means of providing my current needs, and possible personal contingencies, and have no need for liquidity in an investment in the Company. (Please initial) *</label><br>
                    <input type="text" name="investerotherinfo_adequate" class="object-type" id="" >
                </div>      
            </div>
            <div class ="flex">
                <div>
                    <label>I, together with my advisors, have specific knowledge and experience in related financial and business matters so as to be capable of evaluating the relative economic and operational merits and risks of an investment in the stock. (Please initial) *</label><br>
                    <input type="text" name="investerotherinfo_withadvisor" class="object-type" id="" >
                </div>      
            </div>
            <div class ="flex">
                <div>
                    <label>Considering your past financial and investment experience as well as your involvement in previous projects offered by the Company, do you consider yourself a "sophisticated investor"? *</label><br>
                    <input type="radio" id="yes33" name="investerotherinfo_sophisticated" value="yes33">
                    <label for="yes33"> Yes</label>&nbsp; &nbsp; &nbsp; &nbsp;

                    <input type="radio" id="no33" name="investerotherinfo_sophisticated" value="no33">
                    <label for="no33">No</label>&nbsp; &nbsp; &nbsp; &nbsp;
                </div> 
            </div>   
            <div class ="flex">
                <div>
                    <label>By Clicking the Submit button you are certifying that you have answered the foregoing questions to the best of your knowledge and that the answers are complete and accurate. (Please initial) *</label><br>
                    <input type="text" name="investerotherinfo_certifying" class="object-type" id="" >
                </div> 
            </div>
    <div class ="user-btns">
        <input type="submit" name ="Submit">
        <a href="{{url('/investerlist')}}">Cancel</a>
    </div> 
</div>
</form>
</section>
</div>
 </body>
   <footer>
    <p>copyright © <?php echo(date('Y'));?> All Rights Reserved</p>
    <script src="{!! asset('public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') !!}"></script>
    <script src="{!! asset('public/assets/extra-libs/sparkline/sparkline.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/waves.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/sidebarmenu.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/custom.min.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/excanvas.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.pie.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.time.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.stack.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.crosshair.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/pages/chart/chart-page-init.js') !!}"></script> 
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
   </footer> 
</html>
<!-- footer end -->
<script>
$(document).ready(function() {
  var table = $('#crm').DataTable( {
      rowReorder: {
          selector: 'td:nth-child(2)'
      },
      responsive: true
  });
});
</script>