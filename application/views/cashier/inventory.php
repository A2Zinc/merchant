<!-- <script src="<?php echo base_url(); ?>assets/cashier/js/KeyboardPOS.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<style>  
.moveup {
  bottom: 8em;
}

@media screen and (min-width: 1024px) {
  #keyBoard_on {
    margin-right: 61%;
    height: 46px;
  }
}
@media only screen and (min-width: 1440px) {
  #keyBoard_on {
    margin-right: 75%;
    height: 46px;
  }
}

.fa-edit{
  color: #ec4d4d;
  padding-left: 10px;
}

/* Clearable text inputs */
/* .clearable{
  position: relative;
  display: inline-block;
}
.clearable input[type=text]{
  padding-right: 24px;
  width: 100%;
  box-sizing: border-box;
}*/
.clearable__clear{
   /* display: none;  */
  position: absolute;
  right: 3px;
  top: 7px;
  padding: 0 8px;
  font-style: normal;
  font-size: 1.6em;
  user-select: none;
  cursor: pointer;
} 

</style>
<body class="signback1" id="wrapper">
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
        <div class="row mb-3 align-items-end">
            <div class="col-md-8">
                <h5 class="">Inventory Management</h5>
                <a href="<?=base_url('cashier/list_supplier')?>"><button type="button" class="btn btn-success add_supplier">Suppliers List</button></a>&nbsp;
                <a href="<?=base_url('cashier/CustomProduct_list')?>">
                    <button id="refresh1" class="btn btn-success" style="height: 38px;">List Custom Products</button>
                </a>&nbsp;
                <a href="<?=base_url('cashier/scratcher_inventory')?>">
                    <button id="refresh2" class="btn btn-success" style="height: 38px;">Scratcher Inventory</button>
                </a>
            </div>
            <div class="col-md-2 text-right">
                <input type="text" name="read_barcode" id="read_barcode"  placeholder="Scan Barcode" value="" class="use-keyboard-input-num codebar" <?php if(empty($this->session->userdata["admindata"]) && $this->data['add_product'] == 0){echo 'disabled'; }else{ echo '';} ?> oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
            <div class="col-md-2 text-right">
              <button id="keyBoard_on" class="btn btn-success smbtn"><i class="fas fa-keyboard"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="customcard pt-2">
                    <div style="width: 50%;position: absolute;padding-left:.5em;z-index: 500;">
                        <button name="delete_all" id="delete_all2" class="product_UPC btn btn-danger" <?php if(empty($this->session->userdata["admindata"]) && $this->data['delete_product'] == 0){echo 'disabled'; }else{ echo '';} ?>  style="height: 38px;"><i class="fa fa-trash"></i></button>&nbsp;
                        <button id="refresh" class="btn btn-success" style="height: 38px;">Clear</button>
                        <button type="button" <?php if(empty($this->session->userdata["admindata"]) && $this->data['product_upc_label'] == 0){echo 'disabled'; }else{ echo '';} ?> class="btn btn-success"  id="product_upc_label" data-target="">Product - UPC Label</button>
                        <button name="reorder_all" id="reorder_all2" class="btn btn-success" style="height: 38px;">Reorder Level</button>
                    </div>
                    <div>
                        <div class="">
                            <div class="">
                                <table class="table table-sm cell-border" id="tbl_inventory" style="width:100%">
                                    <thead class="headsec">
                                        <tr>
                                            <th class="text-white"><input type="checkbox" class="select_all" value="delete_all" /></th>
                                            <th class="text-white ">Images</th>
                                            <th class="text-white ">Product Name</th>
                                            <th class="text-white ">UPC</th>
                                            <th class="text-white ">Supplier</th>
                                            <th class="text-white ">Quantity       </th>
                                            <th class="text-white ">Supplier Price</th>
                                            <th class="text-white ">Retail Price</th>
                                            <th class="text-white ">Promotion </th>
                                            <th class="text-white ">Action</th>
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
    <div>
        <form action="<?= base_url('cashier/inventoryadd') ?>" method="POST" id="upc_form">
            <input type="hidden" name="product_json" id="barcode_json" class="form-control">
        </form>
    </div>
</body>

<div class="modal" tabindex="-1" id='f1S' role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Print Labels</h5>
          <div class="d-flex">
               <div class="back-button"></div>
               <button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row"></div>
          <div class="row">
          <div class="col-md-3 mt-4 ">
              <h6 class='mt-2 mb-0'>Number of Label</h6>
              <input type="tel"  name="" class="use-keyboard-input-num form-control w-100 inputfile6 " id="enter_number_of_labels" value="1" required maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
              <span class="errors" id="num_lab_err" style="color:red; font-size:14px"></span>
              <h6 class='mt-2 mb-0'>Select by Tag</h6>
              <div class="sli-nav d-flex">
                  <div class="sli-chi sc1">Shelf</div>
                  <div class="sli-chi sc2 active">Product</div>
                  <div class="sli-chi sc1">Both</div>
              </div>
          </div>
          <div class="col-md-9">
              <div class="template-viewcon w-100 p-2 scrollForLabel" >
                <div class="controls-wrappper">
                  <div class="wrapped-content position-relative" id='append_print_label'>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary print_lables_pr">Print</button>
        <button type="button" class="btn btn-primary" id="bleave6">Back</button>
        <button type="button" id="close_button1" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

<div id="label_id" style="display:none;"></div>
<div id="check_ids" style="display:none;"></div>

<!-- sublabel -->
<div class="modal" tabindex="-1" id='f1Sub' role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Print Labels</h5>
          <button type="button" id="close_button2" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
          <div class="col-md-12">
              <div class="template-viewcon w-100 p-2">
                <div class="controls-wrappper">
                  <div class="wrapped-content position-relative">
                    <div class="sli-r position-absolute">
                      <i class="fa fa-arrow-right loop_right" aria-hidden="true" data-id="1"></i></div>
                      <input type="hidden" name="loop" value="1" id="arrw_loop">
                      <div class="sli-l position-absolute">
                      <i class="fa fa-arrow-left loop_left" aria-hidden="true" data-id="1"></i></div>
                      <div class="slicon-con">
                      <div class="template" id='bp1'>
                        <div class="w-100 p-3">
                            <div class="first-slabel text-center mx-auto p-0 ">
                                <div class="d-flex jc-bet">
                                    <div class="imgcon-lbl"><img src="<?=base_url('./uploads/products/012000046445_012000046445_52212056-1.jpg')?>" alt=""></div>
                                        <div class="w-50 bg-yellow">
                                        <div class="lppc-price san h6 bcname ">$3.00</div>
                                        <div class="lpc-price h6 bcname">$1.99</div>
                                    </div>
                                </div>
                                <div class="prodname h6 mt-3 mx-auto mb-2">Pureee Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                                <div class="text-left w-100 color-red bold text-bold upc-lbl">UPC#&emsp;012000046445</div>
                                <div class="lpc-barcode new text-left  position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"></div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="slicon-con">
                      <div class="template" id='bp2'>
                        <div class="w-100 p-3">
                            <div class="first-slabel secT text-center mx-auto ">
                                <div class="prodname h6 mx-auto">Pure Leafff Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                                <div class="lpc-barcode hor position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"> <div class="bar-no position-absolute">012000046445</div></div>
                                <div class="lpc-price h6 bcname">$1.99</div>
                                <div class="lppc-price h6 bcname">$1.00</div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="slicon-con">
                      <div class="template" id='bp3'>
                        <div class="w-100 p-3">
                            <div class="first-slabel text-center mx-auto p-0 ">
                                  <div class="">
                                      <div class="w-100 text-center mx-auto">
                                          <div class="lppc-price h-auto h6 amg bcname text-center">
                                              $1.00 <sub>+TAX/CRV</sub>
                                          </div>
                                          <div class="lpc-price h6 bcname">$1.99</div>
                                      </div>
                                  </div>
                                  <div class="prodname h6 mt-3 mx-auto mb-2">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                                  <div class="text-left w-100 color-red bold text-bold upc-lbl black">UPC#&emsp;012000046445</div>
                                  <div class="lpc-barcode new text-left  position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='selectLabel'>Next</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_button3">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- sublabel -->

<div class="modal" id="exampleModalCenter22" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document" style="max-width: 350px;">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle text-center w-100" id="exampleModalLabel" style="font-size:21px; padding-left:5%;">Scan New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 0.5rem;">
              <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="product_id" id="proID" value="">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                  <div class="form-group">
                    <input type="tel" name="read_barcode" id="replicate_barcode" placeholder="Enter UPC / Scan Barcode" value="" class="use-keyboard-input-num codebar w-100 h-100" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" style="font-size:20px;" maxlength="25">
                    <span class="errors" id="bar_err" style="color:red; font-size:14px"></span>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button id="copyinventortsubmit" style="font-size: 20px;height:40px" type="button" class="btn btn-primary customcardfooteraddbtn btn-sm replicate_submit smbtn">Submit</button>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- end modal -->

<div class="modal" id="reorder_level_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle" style="padding-left: 29%;">Product Reorder Level</h5>
        <button type="button" class="close clearReorder" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <form action="" method="post" autocomplete="off" class="custom-key">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="text" class="form-control customcardinput inputFile27 use-keyboard-input-num" id="reorderLevel" aria-describedby="" name="reorder_level" placeholder="Enter Product Reorder Level" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                  <span class="errors" id="ro_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="reorder_submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

    <style>
        .scrollForLabel{
            max-height: 500px;
            overflow: scroll;
        }
        .product-select {
            background-color: #cfd4da;
        }

        #table_inventory {
            margin: 0 auto;
            width: 100%;
            clear: both;
            border-collapse: collapse;
            table-layout: fixed;
            word-wrap: break-word;
        }

        table tr {
            border-left: 1px solid #F1F1F1;
            border-right: 1px solid #F1F1F1;
            border-top: 1px solid #F1F1F1;
            border-bottom: 1px solid #F1F1F1;
        }

        #table_inventory table>tr:hover {
            background: #F1F1F1 !important;
        }

        #table_inventory>thead>tr>th {
            color: white;
        }

        #table_inventory table>thead>tr:hover {
            background: #EC4D4D !important;
        }

        /* #tbl_inventory>tbody {
            width: 100%;
        }
        #tbl_inventory>tbody>tr>td {
            width: 5% !important;
        } */
        th.dt-center,
        td.dt-center {
            text-align: center;
        }
        /*.swal-text {
            padding: 17px;
            display: block;
            margin: 20px;
            text-align: center;
            color: #61534e;
            font-size: 19px;
            font-weight: bold;
        }*/
    </style>
<script src="<?=base_url()?>assets/cashier/js/inventory_js/inventory_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
