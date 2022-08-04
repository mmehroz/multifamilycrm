<div class="modal fade" id="editemailtemplate" aria-hidden="true" aria-labelledby="add-templateLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="add-templateLabel"> Update Template </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
              <form method="Post" action="{{url('/submiteditemailtemplate')}}" class ="user-profile-form" enctype='multipart/form-data'>
              {{ csrf_field() }}
                <div class ="flex">
                    <input type="hidden" name="hidden_type" value="{{$type}}">
                    <input type="hidden" name="hidden_emailtemplate_id" value="{{$data->emailtemplate_id }}">
                 <div>
                    <label>Template Name *</label> 
                    <input type="text" name="emailtemplate_title" required value="{{$data->emailtemplate_title}}">
                 </div>    
                 <div>
                   <label>Subject *</label>
                    <input type="text" name="emailtemplate_subject" required value="{{$data->emailtemplate_subject}}">
                 </div>
              </div> 
              <div class ="flex">
                <div>
                  <label>From Name *</label> 
                  <input type="text" name="emailtemplate_fromname" required value="{{$data->emailtemplate_fromname}}">
                </div>
                <div>
                  <label>From Email *</label>
                  <input type="email" name="emailtemplate_fromemail" required value="{{$data->emailtemplate_fromemail}}">
                </div> 
              </div>
                   <label>Message *</label> 
                   <textarea name="emailtemplate_message" class="form-control" required>{{$data->emailtemplate_message}}</textarea>
                  <!-- <a class="ress-btn att-btn" href="#"> <img src="../assets/images/ico-attachment.svg" alt="plus">Add Attachment</a> -->
                  <div class="user-btns save-btns">
                    <input type="submit" name="Save" value="Save">
                    <a onclick="closemodal()">Cancel</a>
                  </div>
                <form>
            </div>
          </div>
        </div>
      </div>
      <script>
          function closemodal(){
            $('#editemailtemplate').modal('hide');
          }
      </script>