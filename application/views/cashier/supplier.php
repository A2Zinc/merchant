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
                <a class='aforback' href="<?= base_url('cashier/inventory') ?>"><button class="bckbtn">
                        <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                    </button> </a>
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
    <div class=" container-fluid mt20">
        <div class="row mb-3 align-items-center">
            <div class="col-md-8">
                <h5 class="">Suppliers List</h5>
                <a href="<?= base_url('cashier/add_supplier') ?>"><button type="button" class="btn btn-success add_supplier" <?php if(empty($this->session->userdata["admindata"]) && $this->data['add_supplier'] == 0){echo 'disabled'; }else{ echo '';} ?>>Add Supplier</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="customcard pt-2">
                    <div style="width: 50%;position: absolute;padding-left:.5em;z-index: 500;">
                        <button name="delete_all" id="delete_all2" class="btn btn-danger"  <?php if(empty($this->session->userdata["admindata"]) && $this->data['delete_supplier'] == 0){echo 'disabled'; }else{ echo '';} ?> style="height: 38px;"><i class="fa fa-trash"></i>
                        </button>&nbsp;
                        <button id="refresh" class="btn btn-success" style="height: 38px;">Clear
                        </button>
                    </div>
                    <div>
                        <div class="">
                            <div class="suplier_table">
                                <table class="table table-sm cell-border" id="tbl_supplier" style="width:100%">
                                    <thead class="headsec">
                                        <tr>
                                            <th><input type="checkbox" class="select_all"  value=""/></th>
                                            <th class="text-white ">Supplier Name</th>
                                            <th class="text-white ">Representative Name</th>
                                            <th class="text-white ">Email</th>
                                            <th class="text-white ">Contact Number</th>
                                            <th class="text-white ">Edit</th>
                                        </tr>
                                    </thead>
                                </table>
                                <!-- modal -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div>
        <form action="<?= base_url('cashier/supplieradd') ?>" method="POST" id="upc_form">
            <input type="hidden" name="product_json" id="barcode_json" class="form-control">
        </form>
  </div>

    <!-- Modal1 -->
<div class="modal" id="exampleModalCenter78" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content" >
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle reqcenter" id="exampleModalLongTitle" style="padding-left:25px;">Delete Supplier</h5>
      </div>
      <div class="modal-body modalscroll">
        <table class="table">
          <thead>
              <tr>
                <th style="background: #847d7d !important;color: white !important;">Supplier</th>
                <th style="background: #847d7d !important;color: white !important;">Product Count</th>
                <th style="background: #847d7d !important;color: white !important;">Supplier Name</th>
              </tr>
          </thead>
          <tbody id="suppl_tbl">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <div style="text-align: center;">
          <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn closeBTN">Cancel</button>
          <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSubmits">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/scroller.dataTables.min.css">
<script src="<?php echo base_url(); ?>assets/style/dataTables.scroller.min.js"></script>
<script src="<?=base_url()?>assets/cashier/js/inventory_js/supplier_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
