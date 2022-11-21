    <div class=" container-fluid mt20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="customcard">
                            <div>
                                <div class="usercardheader">
                                    <div class="col-md-2">
                                        <p>All Coupons</p>
                                    </div>
                                    <div class="col-md-8">
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
                                    <a href="<?=base_url('Loyalty')?>" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add a coupon   
                                        <svg class="cupon" class="add" width="22" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.41 9.58L10.41 0.58C10.05 0.22 9.55 0 9 0H2C0.9 0 0 0.9 0 2V9C0 9.55 0.22 10.05 0.59 10.42L9.59 19.42C9.95 19.78 10.45 20 11 20C11.55 20 12.05 19.78 12.41 19.41L19.41 12.41C19.78 12.05 20 11.55 20 11C20 10.45 19.77 9.94 19.41 9.58ZM3.5 5C2.67 5 2 4.33 2 3.5C2 2.67 2.67 2 3.5 2C4.33 2 5 2.67 5 3.5C5 4.33 4.33 5 3.5 5ZM15.27 13.27L11 17.54L6.73 13.27C6.28 12.81 6 12.19 6 11.5C6 10.12 7.12 9 8.5 9C9.19 9 9.82 9.28 10.27 9.74L11 10.46L11.73 9.73C12.18 9.28 12.81 9 13.5 9C14.88 9 16 10.12 16 11.5C16 12.19 15.72 12.82 15.27 13.27Z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="customcardbody2 ">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm" id="tbl_coupon">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Coupon Code</th>
                                                    <th>Discount Type</th>
                                                    <th>Discount</th>
                                                    <th>Start Date</th>
                                                    <th>Expiry Date</th>
                                                    <th>Status</th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; if(!empty($coupons)){ foreach ($coupons as $c) { ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$c['coupon_name']?></td>
                                                    <td><?php if($c['coupon_price_type'] == 1){echo 'On Amount';}else{ echo 'Percentage';}?></td>
                                                    <td><?php if($c['coupon_price_type'] == 1){ echo '$ '.$c['coupon_amount']; }else{ echo $c['discount_percentage'].' %';}?></td>
                                                   <td><?=date('m-d-Y',strtotime($c['start_date']))?></td>
                                                   <td><?=date('m-d-Y',strtotime($c['end_date']))?></td>
                                                    <td>
                                                        <?php if($c['status'] == 1){?>
                                                                <button data-id="<?php echo $c['coupon_id'];?>" data-status='0' class="btn btn-rounded deactivate-coupon" data-toggle="tooltip" title="Active"><i class="fa fa-check"></i></button>
                                                            <?php }else{?>
                                                                <button data-id="<?php echo $c['coupon_id'];?>" data-status='1' class="btn btn-rounded deactivate-coupon" data-toggle="tooltip" title="Deactive"><i class="fa fa-close"></i></button>
                                                            <?php }?>     
                                                    </td>
                                                    <td style="text-align: center;">
                                                        
                                                            
                                                        <a href="<?=base_url('Loyalty/edit_coupon?id='.$c['coupon_id'])?>" type="button" class="btn btn-outline-dark alluserbtn">Edit 
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
                                                            
                                                        <button type="button" data-id="<?php echo $c['coupon_id'];?>" class="btn btn-outline-dark alluserbtn deleteRecord">Delete
                                                            <svg class="delete" width="22" height="16"
                                                                viewBox="0 0 14 18" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <!-- tr -->
                                              
                                               <?php $i++; } } ?>
                                               
                                               
                                               



                                            </tbody>
                                        </table>
                                        <!-- modal -->
                                    
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>    

            <!-- <div class=" container-fluid mt20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="customcard">
                            <div>
                                <div class="usercardheader">
                                    <p>All Coupon</p>
                                    <a href="<?=base_url('Ccoupon')?>" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add a coupon   
                                        <svg class="cupon" class="add" width="22" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.41 9.58L10.41 0.58C10.05 0.22 9.55 0 9 0H2C0.9 0 0 0.9 0 2V9C0 9.55 0.22 10.05 0.59 10.42L9.59 19.42C9.95 19.78 10.45 20 11 20C11.55 20 12.05 19.78 12.41 19.41L19.41 12.41C19.78 12.05 20 11.55 20 11C20 10.45 19.77 9.94 19.41 9.58ZM3.5 5C2.67 5 2 4.33 2 3.5C2 2.67 2.67 2 3.5 2C4.33 2 5 2.67 5 3.5C5 4.33 4.33 5 3.5 5ZM15.27 13.27L11 17.54L6.73 13.27C6.28 12.81 6 12.19 6 11.5C6 10.12 7.12 9 8.5 9C9.19 9 9.82 9.28 10.27 9.74L11 10.46L11.73 9.73C12.18 9.28 12.81 9 13.5 9C14.88 9 16 10.12 16 11.5C16 12.19 15.72 12.82 15.27 13.27Z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="customcardbody2 ">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th> #
                                                    </th>
                                                    <th>Coupon type </th>
                                                  
                                                    <th>Value
                                                    </th>
                                                    <th>Expiration date

                                                    </th>
                                                    <th>No of time used

                                                    </th>
                                                    <th>Created on

                                                    </th>
                                                   
                                                   
                                                   
                                                  
                                                   
                                                   
                                                    <th style="text-align: center;">Action</th>

                                                </tr>
                                                 

                                            </thead>
                                            <tbody>
                                                <tr>-->
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                   <!-- <td>HAPPYME25</td>
                                                    <td>Percentage</td>
                                                    <td><b>50% flat off</b></td>
                                                    <td>20 - 08 - 2020</td>
                                                    <td>1, 145</td>
                                                    <td>20 - 06 - 2020</td>
                                                    
                                                    
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                       
                                                        <button   type="button" class="btn btn-outline-dark alluserbtn">Edit 
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
                                                            </button>
                                                        <button type="button"
                                                            class="btn btn-outline-dark alluserbtn">Delete
                                                            <svg class="delete" width="22" height="16"
                                                                viewBox="0 0 14 18" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                                
                                              
                                               
                                               
                                               
                                               



                                             </tbody> 
                                        </table>
                                       
                                    
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div> -->


     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
         <form class="delete-Role" method="post" action="<?php echo base_url('Loyalty/delete_coupon'); ?>">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                   <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="coupon_id" id="delete_id" class="form-control">
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
    $('#tbl_coupon').on('click', '.deleteRecord', function() {
        var delete_id = $(this).data('id');
        $('#delete_id').val(delete_id);
        $('#deleteModal').modal('show');
    });

    $('#tbl_coupon').on('click', '.deactivate-coupon', function() {
        var deactive_id = $(this).data('id');
        var status = $(this).data('status');
        
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?=base_url("Loyalty/change_status")?>',
            data: {deactive_id  : deactive_id,status : status},
            // async: false,
            dataType: 'json',
            success: function(data){
              console.log(data);                 
                location.reload(true);
            },

        });
            return false;

    });        
</script>    