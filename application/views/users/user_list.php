<div class=" container-fluid mt20">
          <div class="row">
            <div class="col-md-12">
              <div class="customcard">
                <div >
                  <div class="usercardheader">

                        <div class="col-md-1">
                          <p>All User</p>
                        </div>
                        <div class="col-md-10">
                          <div id="message"></div>
                        </div>
                          <a href="<?=base_url('User')?>" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add

                        <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                        </svg>
                      </a>
                 </div>
                 <div class="customcardbody2 ">
                  <table class="table table-striped" id="user_table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Username</th>
                          <th scope="col">Name</th>
                          <th scope="col">Role</th>
                          <th scope="col">Status</th>
                          <th scope="col">Email</th>
                          <th scope="col">Permissions</th>
                          <th style="text-align: center;" scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; if(!empty($users)){ foreach ($users as $u) { ?>
                        <tr>
                          <!-- <th scope="row"></th> -->
                          <td><?=$i?></td>
                          <td><?=$u['username']?></td>
                          <td><?=$u['first_name']?> <?=$u['last_name']?></td>
                          <td><?=$u['role_name']?></td>
                          <td><span class="badge <?php if($u['status']== 1) { echo 'greenbadge';}else{ echo 'redbadge';} ?>"><?php if($u['status']== 1) { echo 'Active';}else{ echo 'Inactive';} ?></span></td>
                          <td><?=$u['email']?></td>
                          <td><a  href="<?=base_url('User/user_permission?id='.$u['username'])?>" type="button" class="btn btn-outline-dark alluserbtn">Permissions</a></td>
                          <td style="text-align: center;">
                              <a  href="<?=base_url('User/user_view?id='.$u['user_id'])?>" type="button" class="btn btn-outline-dark alluserbtn">View
                                <svg class="eye" width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                </svg>
                                </a>
                              <a href="<?=base_url('User/user_update_form?id='.$u['user_id'])?>" type="button" class="btn btn-outline-dark alluserbtn">Edit
                                <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="21" height="21" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                                </a>
                              <button type="button" class="btn btn-outline-dark alluserbtn deleteRecord" data-id="<?php echo $u['user_id'];?>" data-toggle="modal" data-target="#deleteModal">Delete
                                <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                </svg>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; } } ?>

                      </tbody>
                    </table>
                 </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
         <form class="delete-Banner" method="post" action="">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                   <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="deleteUserId" id="deleteUserId" class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <div style="text-align: center;">
                  <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnDelete">Delete</button>
                </div>

            </div>
          </form>
        </div>
      </div>
    </div>


  <script type="text/javascript">
    $(document).ready(function() {
        $('#user_table').on('click', '.deleteRecord', function() {
            $(this).closest('tr').addClass('removeRow');
            var userId = $(this).data('id');
            $('#deleteModal').modal('show');
            $('#deleteUserId').val(userId);
        });
    // // delete emp record
        $('#btnDelete').on('click', function() {
            var userId = $('#deleteUserId').val();

            $.ajax({
                type: "POST",
                url: "<?=base_url('User/user_delete')?>",
                dataType: "JSON",
                data: {
                    id: userId
                },
                success: function(data) {
                    $("#" + userId).remove();
                    $('#deleteUserId').val("");
                    $('#deleteModal').modal('hide');
                     $('#message').html('');
                    if(data.status=='success'){
                      $('#message').append(
                        '<div class="alert alert-success alert-dismissable">'+
                          '<button type="button" class="close" data-dismiss="alert">'+
                              '<span aria-hidden="true">&times;</span>'+
                              '<span class="sr-only">Close</span>'+
                          '</button>'+
                          data.message+
                        '</div>'
                      );
                  }else{
                      $('#message').append(
                        '<div class="alert alert-danger alert-dismissable">'+
                          '<button type="button" class="close" data-dismiss="alert">'+
                              '<span aria-hidden="true">&times;</span>'+
                              '<span class="sr-only">Close</span>'+
                          '</button>'+
                          data.message+
                        '</div>'
                      );
                  }
                  setTimeout(function () {
                    $('#message').fadeOut('slow');
                    $('.removeRow').fadeOut(1500);
                    location.reload();
                  }, 1600);

                }
            });
            return false;
        });

   });
</script>
