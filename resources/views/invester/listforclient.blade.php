@extends('layouts.apptheme')
@section('appcontent')
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap');
*{
  font-family: 'Work Sans';
  margin: 0px;
  padding: 0px;
}
.upper-buttons{
  margin-left: 10px;
}
i.fa-solid.fa-circle-plus {
  margin-top: 16px;
  margin-right: 16px;
}
.fa-trash:before {
  content: "\f1f8";
  margin-right: 12px;
}
.upper-note {
  margin-top: 16px;
}
input#upper-checkbox {
  margin-right: 23px;
  margin-top: 17px;
  margin-left: 12px;
}
.note {
  margin-top: 16px;
}
tr.hide-table-padding td {
    padding: 0;
  }
  .expand-button {
      position: relative;
  }
  .accordion-toggle .expand-button:after
  {
    position: absolute;
    left:.75rem;
    top: 50%;
    transform: translate(0, -50%);
    content: '-';
  }
  .accordion-toggle.collapsed .expand-button:after
  {
    content: '+';
  }
  thead tr{
    background-color: white;
    border-bottom: none;
  }
  tr{
      text-align: left;
      background-color: #F9F9F9;
      border: none;
     
  }
table.table {
    border-collapse: separate;
    border-spacing: 0 5px;
    border: none;
}
th{
  color: #5A5A5A;
  font-weight: 500;
  font-size: 13px;
}
h6 {
  color: black;
}
.info-heading h6{
  margin-bottom: 20px;
}
  td p
{
    margin-bottom: 0 !important;
    font-size: 13px;
    font-weight: 600;
    color: #000000;
    margin-right: 10px;
}
.table td{
 
  color: #5A5A5A;

}
.name{
  font-weight: 500;
  color: #5A5A5A;
} 
.button-container{
  display: flex;
}
button.info-button{
  margin: 10px;
}
.info-description {
  display: flex;
}

.info-para input{ 
}

 .info-para p{
   font-weight: 500;
  color: #979797;
}

.note p{
  color: #979797;
}

.info-para {
  background-color: rgb(255, 255, 255);
  padding: 15px 70px 15px 15px;
  border: 1px;
  border-radius: 10px;
  margin-left: 28px;
  width:100%;
}

button.info-button {
  border: 1px #E28132 solid;
  color: #E28132;
  font-weight: 500;
  background-color: #FFEAD9;
  border-radius: 10px;
  font-size: 12px;
  padding: 6px 25px 5px 26px;
}
.accordion-toggle td {
  padding: 15px 20px 15px 20px !important;
}
.table-responsive .accordion-toggle {
    cursor: pointer;
}
i.fa-solid.fa-trash {
    cursor: pointer;
}
.container {
    max-width: 1350px;
}
i.fa-solid.fa-circle-plus {
    cursor: pointer;
}
.accordion-toggle.collapsed .expand-button:after {
    color: #E28132;
}
.accordion-toggle .expand-button:after {
    color: #E28132;
}
.spce-cls {padding-left: 15px !important;}
.spce-cls i {
    padding-right: 12px;
}
.spce-cls {padding-top: 10px !important;padding-bottom: 9px !important;}
button.info-button {
    padding-top: 7px !important;
    padding-bottom: 7px !important;
    border-radius: 5px !important;
}
.accordion-toggle td {
    line-height: 30px;
}
.table-responsive {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
}
.page-wrapper.inverrr-page.proppt-page tr {
    border: 0px solid #e4e7ec00 !important;
}
.investor-check-box {
    margin-top: 12px;
}
.investor-check-box {
    margin-top: 12px;
} 
 table.table th { 
    color: #5A5A5A !important;
    line-height: 50px;
}
tr.top-tr td {
    border-top: 0px !important;
    border-bottom: 1px solid #00000012;
}

a:hover {
    text-decoration: unset;
}

#navbarDropdown {
    align-items: center;
    display: flex;
}

a#\32 {
    margin-top: 12px;
}
.invest-flex {
    align-items: revert;
    justify-content: right;
    margin-right: 136px;
    margin-bottom: 24px;
}


a:hover {
    color: #E28132;
}


div#generate-link .modal-body {
    margin-top: 15px;
}


.copy-class {
    position: absolute;
    top: 32px;
    right: 33px; 
    background: #fff;
    padding-left: 8px;
}
</style>
<body>
<div class ="page-wrapper inverrr-page proppt-page userinver-blade ">
    @if(session('investerlink'))
         <div class="modal fade prop-modal" id="generate-link" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalToggleLabel">Click To Copy Link </h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
	                     <div onclick="copylink()">
				            <input type="text" class="alert" id="link" value="{{session()->get('investerlink')}}" style="width:100%"> <i class="fa fa-copy copy-class" aria-hidden="true"></i> 
	                    </div>
					 </div>
				</div>
			</div>
		</div>
    @endif
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
    <div class ="flex invest-flex">
    <div>
        <a href="{{url('/addinvester')}}" class="ress-btn mrgn-right"> <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Add</a>
        <a  class="ress-btn"  href="{{url('/generateinvesterlink')}}" role="button"><img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus">  Generate Link</a>
    </div>
    </div>
<div class="container">
<div class="table-responsive">
  <table class="table">
    <thead> 
        <div class="upper-buttons">
        <tr class ="top-tr">
            <td colspan="10" style="background: #fff;">
                <div class="button-container">
                    <input type="checkbox"  id ="upper-checkbox" name ="checkbox" id="checkbox" >
                    <i class="fas fa-trash" style="color: #E28132; font-size: 15px; margin-top: 17px;"></i>
                    <div class="sms-button">
                       <button type="submit" class="info-button">Email</button>
                   </div>
                  <div>
                     <button type="submit" class="info-button">Assign Task</button>
                  </div>
              </div>
            </td>
        </tr>
    </div>
      <tr>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">State Postal Code</th>
        <th scope="col">SMS Alert</th>
        <th scope="col"></th>
     </tr>  
    </thead>
    <tbody>
    @foreach($data as $val)
    
    
    <tr class="accordion-toggle collapsed";>
        <td><input type="checkbox"  id ="checkbox" name ="checkbox" id="checkbox" class ="investor-check-box">
        <td onclick="window.location='{{url('/editinvester')}}/{{$val->investerinfo_id}}';"><p class="name">{{$val->investerinfo_fname}}</p></td>
        <td onclick="window.location='{{url('/editinvester')}}/{{$val->investerinfo_id}}';"><p>{{$val->investerinfo_email}}</p></td>
        <td onclick="window.location='{{url('/editinvester')}}/{{$val->investerinfo_id}}';"><p>{{$val->investerinfo_phone}}</p></td>
        <td onclick="window.location='{{url('/editinvester')}}/{{$val->investerinfo_id}}';"><p>{{$val->investerinfo_addressone}}</p></td>
        <td onclick="window.location='{{url('/editinvester')}}/{{$val->investerinfo_id}}';"><p>{{$val->investerinfo_city}}</p></td>
        <td onclick="window.location='{{url('/editinvester')}}/{{$val->investerinfo_id}}';"><p>{{$val->investerinfo_state}} {{$val->investerinfo_postal}}</p></td>
        <td onclick="window.location='{{url('/editinvester')}}/{{$val->investerinfo_id}}';"><p>{{$val->investerinfo_canwesendsms}}</p></td>
        <td class="expand-button" class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{$val->investerinfo_id}}"></td>
    </tr>
    
    <tr class="hide-table-padding">
        <td colspan="10">
            <div id="collapse{{$val->investerinfo_id}}" class="collapse in p-3">
                <div class="row"> 
                    <div class="button-container">
                        <div class="sms-button">
                            <button type="submit" class="info-button spce-cls"> <i class="fas fa-paper-plane" aria-hidden="true"></i>  Send SMS</button>
                        </div>
                        <div>
                            <button type="submit" class="info-button spce-cls"> <i class="fa fa-envelope" aria-hidden="true"></i>   Send Email</button>
                        </div>
                    </div>
                </div>
                <div class="info-heading">
                     <h6>Address: {{$val->investerinfo_addressone}}</h6>
                </div>
                <div class="info-description">
                    <div class="note"><p>Note</p></div>
                        <i class="fa-solid fa-circle-plus" style="color: #E28132; font-size: 20px;" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{$val->investerinfo_id}}"></i> 
                        <div class="info-para"><p></p></div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>   
</div>
</body>


</html>
<div>
<script>
    $(document).ready(function(){
        $("#generate-link").modal('show');
    });
    function copylink() {
      var copyText = document.getElementById("link");
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */
      navigator.clipboard.writeText(copyText.value);
    }
</script>
@endsection
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>