<div class=" container-fluid mt20">
    <div class="row">
        <div class="col-md-12">
            <div class="customcard">
                <div>
                    <div class="usercardheader">
                    <div class="col-md-2">
                        <p>Advances Issued</p>
                    </div>
                    <div class="col-md-10">
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
                    </div>
                    <div class="customcardbody2 ">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="tbl_advance">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Email </th>
                                        <th>Contact No.</th>
                                        <th>Amount</th>
                                        <th style="text-align: center;">Action</th>

                                    </tr>
                                    <!-- tr -->
                                    
                                </thead>
                                <tbody>
                                    <?php if(!empty($advance)) { foreach ($advance as $a){?>            
                                    <tr>
                                        <!-- <th scope="row"></th> -->
                                        <td><?=$a['first_name']?> <?=$a['last_name']?></td>
                                        <td><?=$a['email']?></td>
                                        <td><?=$a['phone_no']?></td>
                                        <td><b>$  <?=$a['advance_amount']?></b></td>
                                        <td style="text-align: center;">
                                            <button data-toggle="modal" data-target="#exampleModalCenter1"
                                                type="button" class="btn btn-outline-dark alluserbtn">View
                                                <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                </svg>
                                            </button>
                                            <button type="button"class="btn btn-outline-dark alluserbtn">Print

                                                <svg class="print" width="22" height="16"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19 8H5C3.34 8 2 9.34 2 11V17H6V21H18V17H22V11C22 9.34 20.66 8 19 8ZM16 19H8V14H16V19ZM19 12C18.45 12 18 11.55 18 11C18 10.45 18.45 10 19 10C19.55 10 20 10.45 20 11C20 11.55 19.55 12 19 12ZM18 3H6V7H18V3Z" />
                                                </svg>

                                            </button>
                                            <button type="button" data-id="<?php echo $a['id'];?>" class="btn btn-outline-dark alluserbtn deleteRecord">Delete
                                                <svg class="delete" width="22" height="16"
                                                    viewBox="0 0 14 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } } ?>

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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custommodalheader">
                <h5 class="modal-title custommodaltitle"
                    id="exampleModalLongTitle mlauto">Sales Details</h5>
          
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="df">
                                <div>
                                    <h1 class="vname">INV# (POS-123)</h1>
                                    <p class="vc">Contact Name & Add: <span>KANE
                                            SKAIKRU</span>
                                    </p>
                                    <p class="vc">221 B, Baker Steet, London,
                                        GHB1 67N
                                    </p>
                                    <p class="vc">Phone Number: <span>+1 987 679
                                            0533</span> </p>
                                </div>
                                <div class="ml-auto mt-5">
                                    <div>
                                        <p class="vc"> Date: <span>19 Aug
                                                2020</span> </p>
                                        <p class="vc"> Status: <span class="badge greenbadge">Paid</span> </p>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#
                                            </th>
                                            <th>Product Name </th>
                                            <th>Qty
                                            </th>
                                            <th>Unit Price
                                            </th>
                                            <th>Tax

                                            </th>
                                            <th>Discount

                                            </th>
                                            <th>Price incl. Tax
                                            </th>
                                            <th>Total

                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- <th scope="row"></th> -->
                                            <td>1</td>
                                            <td>Jack Daniels</td>
                                            <td>6</td>



                                            <td>$40</td>
                                            <td>$12.50</td>
                                            <td>$0.00</td>
                                            <td>$412.50</td>
                                            <td>$2475.50</td>

                                        </tr>
                                        <!-- tr -->
                                        



                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                  
                    <div class="row">
                      
                        <div class="col-md-6">
                            <p class="vc mt-4  ">Payment Information  </p>
                            <div class="df selldiv">
                                <p class="pc">Paid via card</p>
                                <p class="pm ml-auto">$ 2,0475.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div style="text-align: center;">
                    <button type="button" data-dismiss="modal"
                        class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                    <button type="button"
                        class="btn btn-primary customcardfooteraddbtn btn-sm">Print</button>
                </div>

            </div>
        </div>
    </div>
</div>  

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
         <form class="delete-Role" method="post" action="<?php echo base_url('Hrms/delete_advance_cash'); ?>">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                  <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="cash_id" id="delete_id" class="form-control">
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

<script>
    $('#tbl_advance').on('click', '.deleteRecord', function() {
        var delete_id = $(this).data('id');
        $('#delete_id').val(delete_id);
        $('#deleteModal').modal('show');
    });
    
</script>