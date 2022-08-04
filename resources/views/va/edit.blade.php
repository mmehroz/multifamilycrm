<div class="modal fade" id="editva" aria-hidden="true" aria-labelledby="add-templateLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="add-templateLabel"> Update User </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
             <form method="Post" action="{{url('/submitedituser')}}" class ="user-profile-form" enctype='multipart/form-data'>
                  {{ csrf_field() }} 
                  <div class="flex">
                      <input type="hidden" name="role_id" value="3">
                      <input type="hidden" name="hidden_users_id" value="{{$va->users_id}}">
                      <input type="hidden" name="hidden_users_image" value="{{$va->users_image}}">
                  <div>
                      <label for="">First Name *</label>
                      <input type="text" name="users_name" class="object-type" placeholder="Enter First Name" value="{{$va->users_name}}" required>
                  </div>
                  <div>
                       <label for="">Last Name *</label>
                       <input type="text" name="users_lastname" class="object-type" value="{{$va->users_lastname}}" placeholder="Enter Last Name" required>
                  </div>
                  </div>
                  <div class="flex">
                  <div>
                      <label for="">Email</label>
                      <input type="email" name="users_email" class="object-type" value="{{$va->users_email}}" placeholder="Enter your email" required>
                  </div>
                  <div>
                      <label for="">Password</label>
                      <input type="password" name="users_password" value="{{$va->users_password}}" required>
                  </div>
                  </div>
                  <div class="user-btns save-btns">
                      <input type="submit" name="Save" value="Save"> <a onclick="closemodal()">Cancel</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>
          function closemodal(){
            $('#editva').modal('hide');
          }
      </script>