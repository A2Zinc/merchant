<div class=" container-fluid mt20">
          <div class="row">
            <div class="col-md-12">
              <div class="customcard">
                <div >
                  <div class="usercardheader">
                      
                        <div class="col-md-3">
                          <p>All Suppliers</p>
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
                          <a href="<?=base_url('Cproduct/add_supplier')?>" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add Supplier
                          
                        <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                        </svg>
      
                      </a>
                 </div>
                 <div class="customcardbody2 ">
                  <table class="table table-striped" id="tbl_supplier">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <!-- <th scope="col">Contact No</th>
                          <th scope="col">Address</th> -->
                          <th style="text-align: center;" scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; if(!empty($supplier)){ foreach ($supplier as $s) { ?>
                        <tr>
                          <!-- <th scope="row"></th> -->
                          <td><?=$i?></td>
                          <td><?=$s['supplier_name']?></td>
                          <td><?=$s['email']?></td>
                         <!--  <td><?=$s['mobile']?></td>
                          <td><?=$s['address']?></td> -->
                          <td style="text-align: center;">
                              <a href="<?=base_url('Cproduct/edit_supplier?id='.$s['supplier_id'])?>" type="button" class="btn btn-outline-dark alluserbtn">Edit 
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
                              <button type="button" class="btn btn-outline-dark alluserbtn deleteRecord" data-id="<?php echo $s['supplier_id'];?>" data-toggle="modal" data-target="#deleteModal">Delete 
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
         <form class="delete-Role" method="post" action="<?php echo base_url('Cproduct/delete_supplier'); ?>">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                   <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="supplier_id" id="delete_id" class="form-control">
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
    $('#tbl_supplier').on('click', '.deleteRecord', function() {
        var delete_id = $(this).data('id');
        $('#delete_id').val(delete_id);
        $('#deleteModal').modal('show');
    });

   
</script>     