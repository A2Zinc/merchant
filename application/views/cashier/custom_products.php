<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<body class="signback1">
 <div class="containermain2">
        <div class="row m">
            <div class="logobar ">
              <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
              <?php }else{?>
                <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
              <?php }?>
            </div>
             <div class="gg">
                <div style="margin:0.5em auto">
                    <a href="<?=base_url('cashier/inventory')?>"><button class="bckbtn">
                    <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="" >
                    </button> </a>
               </div>
            <div>
            <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg"></a>
            </div>
            <div class="mainscreen">
            <a href="<?php echo base_url(); ?>cashier">
            <p class="maindes">MAIN SCREEN</p>
            </a>
            </div>
            </div>
           </div>
    </div>
    <!-- main-content -->
    <div class="container-fluid mt20">
    <div class="row mb-3 align-items-center">
            <div class="col-md-8">
                  <h5 class="">Custom Products</h5>
            </div>
       </div>
      <div class="row">
            <div class="col-md-12">
                <div class="customcard pt-2">
                    <div style="width: 50%;position: absolute;padding-left:.5em;z-index: 500;">
                        <button name="delete_all" id="delete_all2" class="btn btn-danger"  <?php if(empty($this->session->userdata["admindata"]) && $this->data['delete_custom_product'] == 0){echo 'disabled'; }else{ echo '';} ?> style="height: 38px;"><i class="fa fa-trash"></i>
                        </button>&nbsp;
                        <button id="refresh" class="btn btn-success" style="height: 38px;">Clear
                        </button>
                    </div>
                    <div>
                        <div class="">
                            <div class="">
                                <table class="table table-sm cell-border" id="tbl_CustomProducts" style="width:100%">
                                    <thead class="headsec">
                                        <tr>
                                          <th class="text-white"><input type="checkbox" class="select_all delete_checkbox" value="delete_all" /></th>
                                          <th class="text-white" id="lottery_name">Product UPC</th>
                                            <th class="text-white">Name</th>
                                            <th class="text-white">Price</th>
                                            <th class="text-white">Container Deposit</th>
                                            <th class="text-white">Tax</th>
                                             <th class="text-white">Edit</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div>
        <form action="<?= base_url('cashier/lotteryadd') ?>" method="POST" id="upc_form">
            <input type="hidden" name="product_json" id="barcode_json" class="form-control">
        </form>
    </div>


<div class="modal clock-in-out" id="lottery_id_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle cashcenter" id="exampleModalLongTitle">Add Lottery Number</h5>
      </div>
      <form action="" method="post" class="emp-login">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Lottery Name:  <p class="modal-title1"></p></label>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Lottery Number: *</label> </label>
                  <input type="tel" name="lottery_unique_id"  id="lottery_unique_id" class="form-control customcardinput modal-title inputFile8" id="empID" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="15">
                  <span class="errors" id="lottery_id_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnLottery">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?=base_url()?>assets/cashier/js/inventory_js/custom_product_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
