<div class=" container-fluid mt20">
  <div class="row">
    <div class="col-md-12">
      <div class="customcard">
        <div>
            <div class="usercardheader">
                <p class="text-nowrap">Filter</p>
                <div class="col-md-1"></div>
                <div class="col-md-10"></div>
            </div>
            
            <form action="<?= base_url('Cterminal/manage_store_terminal') ?>" method="get" id="list_terminal" name="list_terminal">
                <div class="table-responsive">                
                    <div class="container mb25" style="max-width: 100%;margin-top: 20px;">                  
                         <div class="row">
                           <!--  <div class="col-md-3">
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
                            </div> -->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Store</label>
                                    <select class="form-control" id="store_id" name="store_id">
                                        <option value="">Select Location</option>
                                        <?php                                        
                                            if(!empty($store_list)) {
                                                foreach ($store_list as $key_s => $value_s) {
                                        ?>
                                                <option value="<?php print $value_s["store_id"]; ?>" <?php if($value_s["store_id"] == $filter_store_id) print "selected"; ?>><?php print $value_s["store_name"]; ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>&nbsp;</label>
                                    <div style="margin-top: 3px;">
                                        <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm">Search</button>&nbsp;&nbsp;
                                        <a href="javascript:;" class="btn btn-outline-dark btn-sm customfootercancelbtn" onclick="window.location.href='<?= base_url('Cterminal/manage_store_terminal') ?>'">Clear</a>
                                    </div>
                            </div>
                        </div>
                    </div>     
                </div>

                
            </form>
          
        </div>
      </div>
    </div>
  </div>
</div>

<div class=" container-fluid mt20">
  <div class="row">
    <div class="col-md-12">
      <div class="customcard">
        <div>
          <div class="usercardheader">
            <p class="text-nowrap">All Terminal</p>

            <div class="col-md-1"></div>
            <div class="col-md-10"></div>
          </div>
         <!--  <a href="<?= base_url('Cterminal/add_store_terminal') ?>" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add</a> -->
          <div class="" style="margin:20px;">

            <div class="col-md-12">
                <div id="message"></div>
              <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <?php echo $this->session->flashdata('success'); ?>
                  <!--Msg-->
                </div>
              <?php } elseif ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <?php echo $this->session->flashdata('error'); ?>
                  <!--Msg-->
                </div>
              <?php } ?>
            </div>

            <div class="table-responsive">
              <table class="table table-striped table-sm" id="store_terminal_table">
                <thead>
                    <tr>
                        <th>Terminal ID</th>
                        <th>Merchant</th>
                        <th>Store Name</th>
                        <th>Mac Address</th>
                        <th>Status</th>
                        <th>Added on</th>
                        <th style="text-align: center !important; display: none;">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  if (!empty($terminals)) {
                    foreach ($terminals as $terminal) { ?>
                      <tr>
                        <td style="display:none;"><input type="hidden" name="" value="<?php print $terminal['id']; ?>"></td>
                        <td><?php print $terminal['terminal_id']; ?></td>
                        <td><?php print $terminal['merchant_name']; ?></td>                        
                        <td><?php print $terminal['store_name']; ?></td>
                        <td><?php print $terminal['mac_address']; ?></td>
                        
                        <td><?php if ($terminal['is_deleted'] == '0') { ?><span class="badge greenbadge">Active</span><?php } else { ?><span class="badge redbadge">Deleted</span><?php } ?></td>
                        <td><?= date('M d,Y', strtotime($terminal['created_at'])) ?></td>

                        <td style="text-align: center; display: none;">                          
                          <a href="<?= base_url('Cterminal/edit_store_terminal?terminalid=' . $terminal['id']) ?>" type="button" class="btn btn-outline-dark alluserbtn">Edit
                            <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                                <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                                <clipPath id="clip0">
                                  <rect width="21" height="21" fill="white" />
                                </clipPath>
                              </defs>
                            </svg>
                          </a>
                          <button type="button" class="btn btn-outline-dark alluserbtn deleteRecord" data-id="<?= $terminal['id'] ?>" data-toggle="modal" data-target="#deleteModal">Delete
                            <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                            </svg>
                          </button>

                        </td>
                      </tr>
                  <?php }
                  } ?>

                </tbody>
              </table>
              <!-- modal -->

            </div>

          </div>
          <div class="dataTables_paginate paging_simple_numbers d-flex justify-content-center pagiMarks align-items-center" id="dataTableExample4_paginate">
            <?php echo $links; ?>
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
    #store_terminal_table th{
        text-align: left !important;
    }
</style>
    <script type="text/javascript">
      $(document).ready(function() {

        $('#store_terminal_table').DataTable({
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

        $('#store_terminal_table').on('click', '.deleteRecord', function() {
          var userId = $(this).data('id');

          $('#deleteUserId').val(userId);
          $('#deleteModal').modal('show');

        });
        $('#btnDelete').on('click', function() {
          var userId = $('#deleteUserId').val();


          $.ajax({
            type: "POST",
            url: "<?= base_url('Cterminal/delete_store_terminal') ?>",
            dataType: "JSON",
            data: {
              terminalid: userId
            },
            success: function(data) {
              //$("#" + userId).remove();

              //$('#deleteModal').modal('hide');
              $('#message').html('');
              if (data.status == 'success') {
                $('#message').append(
                  '<div class="alert alert-success alert-dismissable">' +
                  '<button type="button" class="close" data-dismiss="alert">' +
                  '<span aria-hidden="true">&times;</span>' +
                  '<span class="sr-only">Close</span>' +
                  '</button>' +
                  data.message +
                  '</div>'
                );
              } else {
                $('#message').append(
                  '<div class="alert alert-danger alert-dismissable">' +
                  '<button type="button" class="close" data-dismiss="alert">' +
                  '<span aria-hidden="true">&times;</span>' +
                  '<span class="sr-only">Close</span>' +
                  '</button>' +
                  data.message +
                  '</div>'
                );
              }
              setTimeout(function() {
                $('#message').fadeOut('slow');
                window.location.reload();
              }, 2000);

            }
          });
          return false;
        });

      });
    </script>