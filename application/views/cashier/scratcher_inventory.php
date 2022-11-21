<style>
@media screen and (min-width: 1024px) {
  #keyBoard_on1 {
    margin-right: 61%;
    height: 46px;
  }
}
@media only screen and (min-width: 1440px) {
  #keyBoard_on1 {
    margin-right: 75%;
    height: 46px;
  }
}
</style>
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
                <a class='aforback' href="<?= base_url('cashier/inventory') ?>">
                    <button class="bckbtn">
                        <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                    </button>
                </a>
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
                <h5 class="">Scratcher Inventory</h5>
            </div>
            <div class="col-md-2 text-right">
                <input type="text" name="read_barcode" id="read_barcode1" placeholder="Scan Barcode" value="" class="use-keyboard-input-num codebar" <?php if(empty($this->session->userdata["admindata"]) && $this->data['add_scratcher'] == 0){echo 'disabled'; }else{ echo '';} ?> oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
            <div class="col-md-2 text-right">
              <button id="keyBoard_on1" class="btn btn-success"><i class="fas fa-keyboard"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="customcard pt-2">
                    <div style="width: 50%;position: absolute;padding-left:.5em;z-index: 500;">
                        <button name="delete_all" id="delete_all2" class="btn btn-danger" <?php if(empty($this->session->userdata["admindata"]) && $this->data['delete_scratcher'] == 0){echo 'disabled'; }else{ echo '';} ?> style="height: 38px;"><i class="fa fa-trash"></i>
                        </button>&nbsp;
                        <button id="refresh" class="btn btn-success" style="height: 38px;">Clear
                        </button>
                        <button id="expire" class="btn btn-danger" style="height: 38px;">Expire
                        </button>
                          <a href="<?php echo base_url(); ?>cashier/scratcherArchive"> <button id="archiveScratcher" class="btn btn-success" style="height: 38px;">Archive
                          </button></a>
                    </div>
                    <div>
                        <div class="">
                            <div class="">
                                <table class="table table-sm cell-border" id="tbl_inventory" style="width:100%">
                                    <thead class="headsec">
                                        <tr>
                                            <th class="text-white"><input type="checkbox" class="select_all delete_checkbox" value="" /></th>
                                            <th class="text-white ">Scratcher Name</th>
                                            <th class="text-white ">UPC</th>
                                            <th class="text-white ">Supplier</th>
                                            <th class="text-white ">Scratcher Value</th>
                                            <th class="text-white ">Bin</th>
                                            <th class="text-white ">Quantity for Inventory</th>
                                            <th class="text-white ">Status</th>
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
    <input type="hidden" value="<?=$bins[0]->id?>" id="available_bins" >
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row">
              <div class="col-md-6  ">
              <label for="" class="customcardlabel">Enter Number of Labels to Print</label> <br>
              <input type="number" name="" class=' form-control w-50'id=""></div>
            </div>
          <div class="row">
          <div class="col-md-12">
              <div class="template-viewcon w-100 p-2">
                <div class="controls-wrappper">
                  <div class="wrapped-content position-relative">
                    <h6 class='mt-2 mb-0'>Select by Tag</h6>
                    <div class="sli-nav d-flex">
                      <div class="sli-chi sc1">Shelf</div>
                      <div class="sli-chi sc2">Scratcher</div>
                    </div>
                    <div class="sli-r position-absolute">
                      <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </div>
                    <div class="sli-l position-absolute"><i class="fa fa-arrow-left" aria-hidden="true"></i></div>
                    <div class="slicon-con">
                      <div class="template" id='bp1'>
                        <div class="w-100 p-3">
                          <div class="first-slabel text-center mx-auto ">
                            <div class="prodname h6 ">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                            <div class="lpc-price h6 bcname">$1.99</div>
                            <div class="lppc-price h6 bcname">$1.00</div>
                            <div class="lpc-barcode position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg">
                              <div class="bar-no position-absolute">012000046445</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="slicon-con">
                      <div class="template" id='bp2'>
                        <div class="w-100 p-3">
                          <div class="first-slabel secT text-center mx-auto ">
                            <div class="prodname h6 ">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                            <div class="lpc-barcode hor position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg">
                              <div class="bar-no position-absolute">012000046445</div>
                            </div>
                            <div class="lpc-price h6 bcname">$1.99</div>
                            <div class="lppc-price h6 bcname">$1.00</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="slicon-con">
                      <div class="template" id='bp3'>
                        <div class="w-100 p-3">
                          <div class="first-slabel threeT text-center mx-auto ">
                            <div class="lpc-barcode  position-relative mb-4"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg">
                              <div class="bar-no position-absolute">012000046445</div>
                            </div>
                            <div class="prodname h6 ">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>
                            <div class="lpc-price h6 bcname  text-right w-75 mx-auto">$1.99</div>
                            <div class="lppc-price  bcname text-right h3 w-75 mx-auto">$1.00</div>
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
        <button type="button" class="btn btn-primary">Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <style>
        /* table {
             display: flex !important;
            flex-flow: column;
            width: 100%;
            height: 70vh;
            overflow: scroll;
            border-collapse: collapse;
        }
        thead {
             flex: 0 0 auto !important;
        }
        tbody {
             flex: 1 1 auto !important;
            display: block;
            overflow-y: auto;
            overflow-x: hidden;
        }
        table tr {
            border-left: 1px solid #F1F1F1;
            border-right: 1px solid #F1F1F1;
            border-top: 1px solid #F1F1F1 !important;
            border-bottom: 1px solid #F1F1F1 !important;
        }
        table td {
            border-left: 1px solid #F1F1F1 !important;
            border-right: 1px solid #F1F1F1 !important;
        }
        tr {
             width: 100%;
            display: table !important;
            table-layout: fixed !important;
        }
        tr:hover {
            background: #F1F1F1;
        }
        thead tr:hover {
            background: #EC4D4D;
        }
        thead th {
            position: sticky !important;
            top: 0;
            color: white;
        } */

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

<script src="<?=base_url()?>assets/cashier/js/inventory_js/scratcher_inventory_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
