@extends('layouts.apptheme')
@section('appcontent')
<div class ="page-wrapper inverrr-page ">
<h4 class="page-title">Investors</h4>
    
    @if(session('message'))
        <div onclick="copylink()">
            <input type="text" class="alert alert-success" id="link" value="{{session('message')}}" style="width:100%">
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
       <a href="#" class="ress-btn mrgn-right"> Email</a>
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
    function copylink() {
      var copyText = document.getElementById("link");
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */
      navigator.clipboard.writeText(copyText.value);
}
</script>
@endsection