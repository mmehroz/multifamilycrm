<style>
    .broker-upl  .file-uplooder[type=file]:not(:disabled):not([readonly]) {
    width: 100% !important;
}

.broker-upl  .file-uplooder:before {
    width: 148px !important;
    padding: 5px 28px !important;
}




.user-btns.top-mrg {
    margin-top: 0px !important;
}

.broker-upl {
    padding: 0px !important;
}

.form-group {
    margin-bottom: 0px !important;
}

.modal-body {
    padding: 25px 40px !important;
}

.new-filess .file-uplooder:before {
    top: 135px !important;
}



.investor-table div#crm_filter {
    margin-right: 330px !important;
}


a.ress-btn.add-brkrr {
    margin-right: 8px !important;
}

</style>

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
   <input type="checkbox" class ="brok-check"> <a href="#"><img src="http://multifamily.wirelesswavestx.com/public/assets/images/remove-02.svg" alt="crass"></a>
</div>

<div>
    <a href="{{url('/addbroker')}}" class ="ress-btn add-brkrr"> <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Add Broker</a>
    <a data-bs-toggle="modal" class ="ress-btn"  href="#upload-broker" role="button"> <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus">Upload Broker</a>  
 
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
      <th scope="col">Action</th>
    </thead>
    <tbody>
    @foreach($data as $val)
      <tr>
        <!--<td class ="res-with"> <img src="{!! asset('public/brokerimage/') !!}/{{$val->brooker_image}}" alt="snip" width="40px"></td>-->
        <td>  <input type="checkbox" class ="brok-colcheck"></td>
        <td>{{$val->users_name}}</td>
        <td>{{$val->brooker_firstname}}</td>
        <td>{{$val->brooker_age}}</td>
        <td>{{$val->brooker_email}}</td>
        <td>{{$val->brooker_phonenumber}}</td>
        <td> 
        <a href="{{url('/editbroker')}}/{{$val->brooker_id}}"><img src="{!! asset('public/assets/images/edit-02.svg') !!}"  alt="snip"></a>
        <a href="{{url('/deletebroker')}}/{{$val->brooker_id}}" class =""><img src="{!! asset('public/assets/images/remove-02.svg') !!}" alt="crass"></a>
        </td>
      </tr>
    @endforeach
    </tbody>
 </table>
</div>
</div>
</div>
</div>
</div>

	<!-- popup -->
		<div class="modal fade prop-modal" id="upload-broker" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalToggleLabel">Upload Broker </h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
                    <form method="Post" action="{{url('/brokeruploader')}}" class ="user-profile-form" enctype='multipart/form-data'>
                    {{ csrf_field() }}
					<!-- upload-div -->	
                    <div class="form-sec new-filess broker-upl">
                    	<p> Upload your .csv file </p>
                    	<ul id="errors" class="list-unstyled"></ul>
                    	<div class="form-group">
                    		<input type="file" name="uploaded_file" id="files" class="form-control  file-uplooder" accept=".csv">
                    		<p class="position-rell"> or drop your file here </p>
                    	</div>
                    	<div class="card-body img-card"> <img class="img-fluid img-thumbnail" id="image"> </div>
                    </div>
					<!-- upload-div -->
					
                	<div class="user-btns top-mrg">
                        <input type="submit" name="Submit">
                    </div>	
                    </form>
					</div>
				</div>
			</div>
		</div>
		</div>
	<!-- / popup -->  


</div>

@endsection