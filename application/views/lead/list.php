   <link rel="shortcut icon" href="<?php echo base_url() . $this->session->sitefavicon ?>" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/core/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/style/customstyle.css">

  <link href="<?php echo base_url() ?>assets/icon/fontawesome/css/all.css" rel="stylesheet">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/style/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/style/daterangepicker/daterangepicker.css" />
  <link href="<?php echo base_url() ?>assets/core/select2/dist/css/select2.css" rel="stylesheet" />
  <!-- Format javascript date-time -->
  <script src="<?php echo base_url() ?>assets/js/jquery@3.4.1/jquery.min.js"></script>
  <link href="<?php echo base_url() ?>assets/style/bootstrap4-toggle@3.6.1/bootstrap4-toggle.min.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/cashier/sweetalert@2.1.2/sweetalert.min.js"></script>

  <script src="<?php echo base_url() ?>assets/js/bootstrap4-toggle@3.6.1/bootstrap4-toggle.min.js"></script>
 <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/cashier/style/datatable@1.10.22/jquery.dataTables.css"/>
<style type="text/css">
  .customcardbody {
    padding: 15px;
    padding-left: 25px;
    /* height: 100vh; */
    height: calc(200vh - 35vh);
    overflow: auto;
}
</style>

<script src="<?=base_url()?>assets/cashier/js/datatable@1.10.22/jquery.dataTables.js"></script>
<div class="container-fluid mt20">
    <div class="row">
        <div class="col-md-12">
            <div class="customcard">
                <div>
                    <div class="usercardheader">
                        <p>All Leads</p>
                        <a href="<?=base_url('lead/add')?>" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">
                            Add Lead

                            <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z"
                                />
                            </svg>
                        </a>
                    </div>
                      <div class="col-md-12">
                    <?php if($this->session->flashdata('success')){ ?>
                        <div class="alert alert-success alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                          </button>
                          <?php echo $this->session->flashdata('success'); ?>
                          <!--Msg-->
                        </div>
                    <?php }elseif($this->session->flashdata('error')){ ?> 
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
                    <div class="customcardbody">
                        <table class="table table-striped text-center" id="dataTableExample2">
                            <thead>
                                <tr>
                                    <th scope="col">Lead ID.</th>
                                    <th scope="col">Lead Name</th>
                                    <th scope="col">Lead Email</th>
                                    <th scope="col">Lead Address</th>
                                    <th style="text-align: center;" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                            	<?php foreach ($leads as $key => $value) { ?>
                            		<tr>
                            			<td><?php echo $value->lead_id ?></td>
                            			<td><?php echo $value->name ?></td>
                                  <td><?php echo $value->email ?></td>
                            			<td><?php echo $value->address ?></td>
                            			<td>
                                       <a href="<?php echo base_url('superadmin/lead/edit/'.$value->lead_id) ?>" class="btn btn-outline-dark alluserbtn">Edit
                                          <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <g clip-path="url(#clip0)">
                                          <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z"></path>
                                          </g>
                                          <defs>
                                          <clipPath id="clip0">
                                          <rect width="21" height="21" fill="white"></rect>
                                          </clipPath>
                                          </defs>
                                          </svg>
                                      </a>


                                      <button type="button" class="btn btn-outline-dark alluserbtn mmm" data-id="<?php echo $value->lead_id ?>" data-toggle="modal" data-target="#deleteModal">Move to merchant
                                            
                                        </button>
                                      <button type="button" class="btn btn-outline-dark alluserbtn deleteRecord" data-id="<?php echo $value->lead_id ?>" data-toggle="modal" data-target="#deleteModal">Delete
                                            <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z"></path>
                                            </svg>
                                        </button>

                                  </td>
                            		</tr>
                            	<?php } ?> 
                            </tbody>
                        </table>
                        <!-- modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">
    $(document).ready(function(){

    $('body').on('click', '.mmm', function() {
        var lead_id = $(this).data('id');
        $.ajax({
                type: 'POST',
                url: '<?=base_url("superadmin/lead/move_to_merchant/")?>',
                data: {lead_id: lead_id},
                dataType: "json",
                success: function(data) {
                    if(data=="success"){
                         swal('Successfully Moved', '', 'success')
                         window.location.href="<?php echo base_url("superadmin/lead") ?>"                      
                    } else{
                         swal('Not Moved', '', 'info') 
                    }
                    
                }  
            })
      });

    $('body').on('click', '.deleteRecord', function() {
        var delete_id = $(this).data('id');
         
         swal({
              title: "Are you sure?",
              text: "You will not be able to recover this",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              cancelButtonText: "No, cancel plx!",
              closeOnConfirm: false,
              closeOnCancel: false 
            }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url("superadmin/lead/delete")?>',
                data: {lead_id: delete_id},
                dataType: "json",
                success: function(data) {
                    if(data=="success"){
                         swal('Successfully Deleted', '', 'success')
                         window.location.href="<?php echo base_url("superadmin/lead") ?>"                      
                    } else{
                         swal('Not Deleted', '', 'info') 
                    }
                    
                }  
            })
          } else if (result.isDenied) {
            swal('Changes are not saved', '', 'info')
          }
        }) 
         
    });      
    })

    $(document).ready(function() {
      var oTable = $('#dataTableExample2').dataTable();
    });

</script>    