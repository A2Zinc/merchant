<style>
.customcardlabel{
    color:#000 !important;
}
.customcardheader1{
      border:none;
      padding-left: 0px;
}
.fixfixed{
        margin-top: calc(780px - 925px);
}
</style>

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
                  <a href="<?=base_url('cashier/scratcher_inventory')?>"><button class="bckbtn">
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
    <div class="row mt-4">
        <div class="col-md-12">
              <h5 class="mainline ml-3 mt-3" >Scratcher Inventory</h5>
         </div>
            </div>
            <div class="container-fluid mt20">
                <div class="row overflow" >
                    <div class="col-md-12">
                        <div class="customcard">
                            <div class="row" style="border-bottom: 1px solid #DBDBDB;">
                                <div class="col-md-9">
                                    <div class="customcardheader1">
                                        <p style="margin-left:40px;"> Add New Scratcher (UPC #<?php if(!empty($product->barcode_number)){ echo $product->barcode_number; }else{ echo $_GET['upc'];}?>)</p>
                                    </div>
                                </div>
                            <div class="col-md-3 ">
                                <div class="customcardheader1" >
                                    <button type="button" class="save-data" id="btnSave">Save Information
                                        <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
                                    </button>
                                </div>
                            </div>
                        </div>
                            <!-- cardheader -->
                            <form class="add-product" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                            <div class="customcardbody ">
                              <div class="container mb25 ">
                                  <div class="row">
                                        <input type="hidden" class="form-control" id="barcode_formats" name="barcode_formats" value="<?=$product->barcode_formats?>">
                                        <input type="hidden" class="form-control" id="case_upc" name="case_upc" value="<?=$product->barcode_number?>">
                                        <input type="hidden" class="form-control" id="barcode_type" name="barcode_type" value="<?=$product->barcode_type?>">
                                        <input type="hidden" class="form-control" id="mpn" name="mpn" value="<?=$product->mpn?>">
                                        <input type="hidden" class="form-control" id="status" name="status" value="<?=$product->status?>">
                                        <input type="hidden" class="form-control" id="from" name="from" value="<?=$product->from?>">
                                        <input type="hidden" class="form-control" id="barcode_json" name="barcode_json" value="<?=json_decode($barcodejson);?>">
                                        <input type="hidden" class="form-control" id="UPC" name="upc" value="<?=$_GET['upc']?>">
                                        <div class="col-md-4 ">
                                            <div class="form-group ">
                                                <label class="customcardlabel" for="">Scratcher Name <span style="color:#FF0000;">*</span></label>
                                                <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="product_name" aria-describedby="" name="product_name" value="<?= isset($product->product_name) ? $product->product_name : '' ;?>" plceholder="Please enter Scratcher Name">
                                                <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="customcardlabel">Scratcher Nickname <span style="color:#FF0000;">*</span></label>
                                                <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input" id="nickname"  aria-describedby="" plceholder="Please enter Scratcher Nickname" name="product_nickname" value="<?= isset($product->product_name) ? $product->product_name : '' ;?>">
                                                <span class="errors" id="nname_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="customcardlabel">BIN #<span style="color:#FF0000;">*</span></label>
                                                <select  style="font-size: 14px; margin: 0!important;" class="form-control customcardinput inputFile5 mt-2" name="bin" id="bin">
                                                  <option style="font-size: 14px;">--Select BIN--</option>
                                                  <?php foreach($bins as $b){?>
                                                    <option value="<?=$b->value?>"><?=$b->bins?></option>
                                                  <?php } ?>
                                                </select>
                                                <span class="errors" id="bin_name_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="customcardlabel">Units in a Package <span style="color:#FF0000;">*</span></label>
                                                <input list="units" value="<?=$units[0]['unit_name']?>" onClick="this.select();" name="unit" id="unit" class="form-control customcardinput use-keyboard-input" placeholder="-- Select Unit --">
                                                <datalist id="units">
                                                    <?php foreach($units as $u) { ?>
                                                      <option value="<?=$u['unit_name']?>"><?=$u['unit_name']?></option>
                                                    <?php } ?>
                                                </datalist>
                                                <span class="errors" id="unit_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="customcardlabel">Quantity for Inventory <span style="color:#FF0000;">*</span></label>
                                                <input type="number" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num" id="quantity" min="1" aria-describedby="" placeholder="Enter Quantity" name="quantity" value="<?= isset($product->package_quantity) ? $product->package_quantity : '' ;?>">
                                                <span class="errors" id="qty_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="customcardlabel">Supplier</label>
                                                <input list="suppliers" onClick="this.select();" name="supplier" id="supplier"  class="form-control customcardinput use" placeholder="-- Select Supplier --" value="California State Lottery" readonly="readonly">
                                                <datalist id="suppliers">
                                                    <?php foreach($supplier as $s) { ?>
                                                        <option value="<?=$s['supplier_name']?>"></option>
                                                    <?php } ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="customcardlabel">Scratcher Value <span style="color:#FF0000;">*</span></label>
                                                <div style="position:relative;margin-left: 0.3em;">
                                                <span class="prefix">$</span>
                                                <input type="tel" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num usefloathere pl-3" id="store_sell_price" onkeyup="this.value = get_float_value(this.value)" aria-describedby="" name="store_sell_price" min="0.01" maxlength="7" placeholder="Please enter Store Sell Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" ></div>
                                                <span class="errors" id="store_sell_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?=$bins[0]->id?>" id="available_bin2" >
                                        <div class="col-md-6">
                                           <div class="form-group">
                                                <label class="customcardlabel">Scratcher Status </label>
                                                    <select class="form-control customcardinput change_scratcher_status" name="scratcher_status">
                                                      <option value="0">Active</option>
                                                      <option value="2">Inactive</option>
                                                    </select>
                                                    <span class="errors" id="store_sell_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <p class="formheader"> Scratcher Validation ID :</p>
                                            <div class="item-apend mt-4">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                            <label class="customcardlabel" for="scratcher_no_from">From<span style="color:#FF0000;">*</span></label>
                                                            <input type="tel" class="form-control customcardinput use-keyboard-input-num" id="scratcher_no_from" name="scratcher_no_from" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                            <span class="errors" id="scratcher_no_from_err" style="color:red; font-size:14px"></span>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                            <label class="customcardlabel" for="scratcher_no_to">To<span style="color:#FF0000;">*</span></label>
                                                            <input type="tel" class="form-control customcardinput" id="scratcher_no_to" name="scratcher_no_to" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" readonly>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container  mb25">
                                            <p class="formheader currentNo"> Scratcher Current No : <?= isset($product['scracher_current_no']) ? $product['scracher_current_no'] : '' ;?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                  </div>
                </div>
          </div>

<script src="<?php echo base_url()?>assets/cashier/js/select2@4.0.8/select2.min.js" defer></script>
<link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />

<script src="<?=base_url()?>assets/cashier/js/inventory_js/add_scratcher_js.js"></script>
