<div class=" container-fluid mt20">
  <div class="row">
    <div class="col-md-12">
      <div class="customcard">
        <div>
            <div class="usercardheader" style="display: none;">
                <p class="text-nowrap">Filter</p>
                <div class="col-md-1"></div>
                <div class="col-md-10"></div>
            </div>
            
            <form action="<?= base_url('Cstore') ?>" style='display: none;' method="get" id="list_store" name="list_store">
                <div class="table-responsive">                
                    <div class="container mb25" style="max-width: 100%; margin-top: 20px;">                  
                         <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Merchant</label>
                                    <select class="form-control" id="merchant_id" name="merchant_id">
                                        <option value="">Select</option>
                                        <?php                                        
                                            if(!empty($merchant_list)) {
                                                foreach ($merchant_list as $key_m => $value_m) {
                                        ?>
                                                <option value="<?php print $value_m["id"]; ?>" <?php if($value_m["id"] == $filter_merchant_id) print "selected"; ?>><?php print $value_m["name"]; ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>  
                            <div class="col-sm-3">
                                <label>&nbsp;</label>
                                <div style="margin-top: 3px;">
                                    <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm">Search</button>&nbsp;&nbsp;
                                    <a href="javascript:;" class="btn btn-outline-dark btn-sm customfootercancelbtn" onclick="window.location.href='<?= base_url('Cstore') ?>'">Clear</a>
                                </div>
                            </div>                          
                        </div>
                    </div>     
                </div>

                <!-- <div class="customcardfooter">
                    <div style="text-align: center;">                  
                        <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm">Search</button>
                        <a href="javascript:;" class="btn btn-outline-dark btn-sm customfootercancelbtn" onclick="window.location.href='<?= base_url('Cterminal/manage_store_terminal') ?>'">Clear</a>
                    </div>
                </div> -->
            </form>
          
        </div>
      </div>
    </div>
  </div>
</div>


<div class=" container-fluid mt20">
          <div class="row">
          	<div class="col-sm-12">
          		<!-- Alert Message -->
	    <?php
	        $message = $this->session->userdata('message');
	        if (isset($message)) {
	    ?>
	    <div class="alert alert-info alert-dismissable">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <?php echo $message ?>                    
	    </div>
	    <?php 
	        $this->session->unset_userdata('message');
	        }
	        $error_message = $this->session->userdata('error_message');
	        if (isset($error_message)) {
	    ?>
	    <div class="alert alert-danger alert-dismissable">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <?php echo $error_message ?>                    
	    </div>
	    <?php 
	        $this->session->unset_userdata('error_message');
	        }
	    ?>
          	</div>
            <div class="col-md-12">
              <div class="customcard">
                <div >
                  <div class="usercardheader">

                        <div class="col-md-1">
                          <p style="width: 200px;">All Locations</p>
                        </div>
                        <div class="col-md-10">
                          <div id="message"></div>
                        </div>
                 </div>
                 <!-- <a href="<?= base_url('superadmin/Cstore/store_add_form') ?>" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add</a> -->
                 <div class="" style="margin:20px;">
                  <table class="table table-striped datatable " id="user_table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Store Name</th>
                          <th scope="col">Merchant</th>
                          <th scope="col">Email</th>
                          <th scope="col">Contact</th>                          
                          <?php /* <th scope="col">Status</th> */ ?>
                          <th style="text-align: center !important; display: none;" scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;
						if ($store_list) {
							foreach ($store_list as $store) {
						?>
                        <tr>
                          <!-- <th scope="row"></th> -->
                          <td><?=$i?></td>
                          <td><?php echo $store['store_name']?></td>
                          <td><?php echo $store['merchant_name']?></td>
                          <td><?php echo $store['store_email']?></td>
                          <td><?php echo $store['store_contact']?></td>                          
                            
                          <?php /*
                          <td><?php //if($store['default_status']== 1) { echo 'active';}else{ echo 'redbadge';} ?>

                            <form action="<?php echo base_url('Cstore/update_status/'.$store['store_id'])?>" method="post">
								<select class="form-control" id="default_status" name="default_status" style="width: 60%;float: left;">
                                   	<option value=""></option>
                                    <option value="1" <?php if ($store['default_status'] == '1'){echo "selected";}?>>Active</option>
                                    <option value="0" <?php if ($store['default_status'] == '0'){echo "selected";}?>>Deactive</option>
                                </select>

                                <input type="submit" class="btn btn-success" value="<?php echo display('update') ?>" style="position: absolute;margin-left: 5px;"/>
							</form>
                          </td> */ ?>

                          <td style="text-align: center; display: none;">
                              <!-- <a  href="<?=base_url('User/user_view?id='.$u['user_id'])?>" type="button" class="btn btn-outline-dark alluserbtn">View
                                <svg class="eye" width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                </svg>
                                </a> -->
                              <a href="<?php echo base_url().'superadmin/Cstore/store_update_form/'.$store['store_id']; ?>" type="button" class="btn btn-outline-dark alluserbtn">Edit
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

                                <a href="<?php echo base_url('adminlogin/switch_to_store?username='.$store['store_email'].'&user_db_session='.$store['store_db']) ?>" type="button" class="btn btn-outline-dark alluserbtn">Switch to
                                
                                </a>

                                
                              <button type="button" class="btn btn-outline-dark alluserbtn deleteRecord" data-id="<?php echo $store['store_id'];?>" data-toggle="modal" data-target="#deleteModal">Delete
                                <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                </svg>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; } } else { ?>
                            <tr>
                                <td colspan="6">No Records Found.</td>
                            </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                 </div>
                 <div class="dataTables_paginate paging_simple_numbers d-flex justify-content-center pagiMarks align-items-center" id="dataTableExample4_paginate">
                    <?php echo $links; ?>
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

<script src="https://cdn.jsdelivr.net/npm/jqdoublescroll@1.0.0/jquery.doubleScroll.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/datatable@1.10.22/jquery.dataTables.css"/>
<script src="<?php echo base_url(); ?>assets/cashier/js/datatable@1.10.22/jquery.dataTables.js"></script>
<style type="text/css">
    #user_table th{
        text-align: left !important;
    }
</style>
<script type="text/javascript">
  $(document).ready(function() {

    $('#user_table').DataTable({
    });


    $('.pagiMarks > strong').css({
      'color': 'white',
      'border-radius': '50%',
      'width': ' 20px',
      'height': 'auto', //for inactive pagination
      'background': '#2d7f61',
      'margin': '1%',
      'display': 'flex',
      'justify-content': 'center',
      'align-items': 'center',

    });

    $('.pagiMarks > a').each(function() {
          let ref = this;

          let isNumber = parseInt(this.innerHTML)

          if (isNumber >= 1) {
            $(ref).css({
              'color': 'white',
              'border-radius': '50%',
              'width': ' 20px', //for active pagination
              'height': 'auto',
              'background': 'grey',
              'margin': '1%',
              'display': 'flex',
              'justify-content': 'center',
              'align-items': 'center'

            });
          }
        });
        //$('.table-responsive').doubleScroll();
    });    
</script>

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
                url: "<?php echo base_url('superadmin/Cstore/store_delete/')?>"+userId,
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