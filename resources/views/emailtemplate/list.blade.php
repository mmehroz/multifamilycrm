@extends('layouts.apptheme')
@section('appcontent')
<div class ="page-wrapper ">
    <div class="main-flex">
        <h4 class="page-title prop-page">Email Templates</h4>
    </div>
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
    <hr class ="investor-divider">
    <table id="crm" class="display nowrap" style="width:100%">
          <thead>
            <tr>
              <th>Title</th>
              <th>Subject</th>
              <th>From Name</th>
              <th>From Email</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody id="showtask">
            @foreach($emailtemplate as $emailtemplates)
            <tr onclick="editemailtemplate({{$emailtemplates->emailtemplate_id}})">
              <td>{{$emailtemplates->emailtemplate_title}}</td>
              <td>{{$emailtemplates->emailtemplate_subject}}</td>
              <td>{{$emailtemplates->emailtemplate_fromname}}</td>
              <td>{{$emailtemplates->emailtemplate_fromemail}}</td>
              <td>{{$emailtemplates->emailtemplate_message}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>
<div id ='modals'></div>
  <script>
      function editemailtemplate($id){
        $.get('{{ URL::to("/editemailtemplate")}}/'+$id,function(data){
        $('#modals').empty().append(data);
        $('#editemailtemplate').modal('show');
        });
      }
       function closemodal(){
          $('#add-template').modal('hide');
        }
  </script>
@endsection