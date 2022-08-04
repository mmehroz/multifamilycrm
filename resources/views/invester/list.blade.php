@extends('layouts.apptheme')
@section('appcontent')
<style>
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

input#link {
    padding: 0px;
}
</style>
<div class ="page-wrapper inverrr-page ">
<h4 class="page-title">Investors</h4>
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
<div class ="investor-table">
    <div class ="flex invest-flex">
    <div>
       <input type="checkbox">   <a href="#"><img src="{!! asset('public/assets/images/remove-02.svg') !!}" alt="crass"></a>
   </div>
        <div>
            <a href="{{url('/addinvester')}}" class="ress-btn mrgn-right"> <img src="{!! asset('public/assets/images/ico-add.svg') !!}" alt="plus"> Add</a>
            <a  class="ress-btn"  href="{{url('/generateinvesterlink')}}" role="button"> Generate Link</a>
        </div>
    </div>
  <hr class ="investor-divider">
    <table id="crm" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
                <th>SMS Alert</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $val)
            <tr>
                <td><input type="checkbox"></td>
                <td>{{$val->investerinfo_fname}}</td>
                <td>{{$val->investerinfo_email}}</td>
                <td>{{$val->investerinfo_phone}}</td>
                <td>{{$val->investerinfo_addressone}}</td>
                <td>{{$val->investerinfo_city}}</td>
                <td>{{$val->investerinfo_canwesendsms}}</td>
                <td class ="text-right-inverstor">
                <a href="{{url('/editinvester')}}/{{$val->investerinfo_id}}" class =""><img src="{!! asset('public/assets/images/edit-02.svg') !!}" alt="crass"></a>
                <a href="{{url('/deleteinvester')}}/{{$val->investerinfo_id}}" class =""><img src="{!! asset('public/assets/images/remove-02.svg') !!}" alt="crass"></a>  
                </td>
             </tr>
            @endforeach
    </table>
    </div>
        <div class="modal fade" id="add-link" aria-hidden="true" aria-labelledby="add-linkLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add-linkLabel">Add</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="email" name="State" class="object-type" id="" placeholder ="Enter Your Email">
                        <input type="submit" class ="" value ="Send Link">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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