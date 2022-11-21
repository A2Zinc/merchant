<style>
   .customcardheader1{
      border:none;
      padding-left: 0px;
    }    
.customcardlabel{
    color:#000 !important;
}
label{
    color:#000 !important;
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
                                <p style="margin-left:40px;">Update Scratcher (UPC #<?php echo $product['case_upc'];?>)</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="customcardheader1" >
                                <button class="save-data" id="btnSave">Save Information
                                    <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- cardheader -->
                    <form class="edit-product" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                    <div class="customcardbody dynamic_font_size">
                        <div class="container mb25 ">
                            <div class="row">
                                <input type="hidden" class="form-control scratcherID" name="product_id" value="<?= isset($product['product_id']) ? $product['product_id'] : '' ;?>">
                                <input type="hidden" class="form-control" id="case_upc" name="case_upc" value="<?= isset($product['case_upc']) ? $product['case_upc'] : '' ;?>">
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                        <label class="customcardlabel" for="">Scratcher Name <span style="color:#FF0000;">*</span></label>
                                        <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="product_name" aria-describedby="" plceholder="Please enter Scratcher Name" name="product_name" value="<?= isset($product['product_name']) ? $product['product_name'] : '' ;?>">
                                        <span class="errors dynamic_font_size_err" id="name_err" style="color:red; font-size:14px"></span>
                                    </div>
                                    <input type="hidden" name="original_name" value="<?=isset($product['product_name']) ? $product['product_name'] : '' ;?>">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="customcardlabel">Scratcher Nickname <span style="color:#FF0000;">*</span></label>
                                        <input type="text" onClick="this.select();" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="nickname"  aria-describedby="" plceholder="Please enter Scratcher Nickname" name="product_nickname" value="<?= isset($product['short_name']) ? $product['short_name'] : '' ;?>">
                                        <span class="errors dynamic_font_size_err" id="nname_err" style="color:red; font-size:14px"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="customcardlabel">BIN # <span style="color:#FF0000;">*</span></label>
                                        <select  style="font-size: 1rem;    margin: 0!important;" class="form-control customcardinput inputFile5 mt-2 dynamic_font_size" name="bin" id="bin">
                                          <?php if($bins[0]->id == ''){ ?>
                                            <option value="<?=$product['bin']?>"><?='Bin '.$product['bin']?></option>
                                          <?php }else{ ?>
                                            <?php if($product['is_archive_scratcher'] == 0){ ?>
                                              <option value="<?=$product['bin']?>" ><?='Bin '.$product['bin']?></option>
                                            <?php }else{
                                              $available = $this->Cashier_model->check_bin_availability($product['bin']);
                                                if($available == 1){ ?>
                                                  <option value="<?=$product['bin']?>" ><?='Bin '.$product['bin']?></option>
                                              <?php  }  }?>
                                            <?php  } ?>
                                          <?php foreach($bins as $b){?>
                                            <option value="<?=$b->value?>" <?php if($product['bin'] == $b->value ){ echo 'selected';}?> ><?=$b->bins?></option>
                                          <?php }  ?>
                                        </select>
                                        <span class="errors dynamic_font_size_err" id="bin_name_err" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="customcardlabel">Units in a Package <span style="color:#FF0000;">*</span></label>
                                        <input list="units" onClick="this.select();" name="unit" id="unit" class="form-control customcardinput use-keyboard-input dynamic_font_size" value="<?= isset($product['unit']) ? $product['unit'] : '' ;?>" placeholder="-- Select Unit --">
                                        <datalist id="units">
                                            <?php foreach($units as $u) { ?>
                                            <option value="<?=$u['unit_name']?>"><?=$u['unit_name']?></option>
                                            <?php } ?>
                                        </datalist>
                                        <span class="errors dynamic_font_size_err" id="unit_err" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="customcardlabel">Quantity for Inventory <span style="color:#FF0000;">*</span></label>
                                        <input type="number" onClick="this.select();" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" min="1" id="quantity" aria-describedby="" name="quantity" value="<?= isset($product['quantity']) ? $product['quantity'] : '' ;?>" placeholder="Enter Quantity">
                                        <span class="errors dynamic_font_size_err" id="qty_err" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="customcardlabel">Supplier</label>
                                        <input list="suppliers" onClick="this.select();" name="supplier" id="supplier" class="form-control customcardinput dynamic_font_size" placeholder="-- Select Supplier --" value="<?= isset($product['supplier']) ? $product['supplier'] : '' ;?>" value="California State Lottery" readonly="readonly">
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
                                        <div style="position:relative;">
                                            <span class="prefix">$</span>
                                            <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="dynamic_font_size form-control customcardinput use-keyboard-input-num usefloathere pl-3" id="store_sell_price" aria-describedby="" name="store_sell_price" min="0.01" maxlength="7" placeholder="Please enter Store Sell Price" value="<?= isset($product['store_sell_price']) ? number_format($product['store_sell_price'],2) : '' ;?>" >
                                        </div>
                                         <span class="errors dynamic_font_size_err" id="store_sell_err" style="color:red; "></span>
                                    </div>
                                </div>
                                <input type="hidden" value="<?=$product['is_archive_scratcher']?>" id="archive_st"  name="archive_st">
                                <input type="hidden" value="<?=$bins[0]->id?>" id="available_bin1" >
                                <input type="hidden" value="<?=$product['scratcher_status']?>" id="hide_scratcher_status">
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="customcardlabel">Scratcher Status </label>
                                            <select class="form-control customcardinput change_scratcher_status dynamic_font_size" name="scratcher_status">
                                              <option value="0" <?php if($product['scratcher_status'] == 0){ echo 'selected';}?>>Active</option>
                                              <option value="2" <?php if($product['scratcher_status'] == 2){ echo 'selected';}?>>Inactive</option>
                                              <option value="1" <?php if($product['scratcher_status'] == 1){ echo 'selected';}?>>Expired</option>
                                            </select>
                                            <span class="errors dynamic_font_size_err" id="store_sell_err" style="color:red; "></span>
                                    </div>
                                </div>
                                <div class="container">
                                    <p class="formheader dynamic_font_header2"> Scratcher Validation ID :</p>
                                    <div class="item-apend mt-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                    <label class="customcardlabel" for="scratcher_no_from">From <span style="color:#FF0000;">*</span></label>
                                                    <input type="tel" class="form-control customcardinput dynamic_font_size" id="scratcher_no_from" name="scratcher_no_from" value="<?= isset($product['scratcher_no_from']) ? $product['scratcher_no_from'] : '' ;?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" readonly>
                                                    <span class="errors dynamic_font_size_err" id="scratcher_no_from_err" style="color:red; "></span>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                    <label class="customcardlabel" for="scratcher_no_to">To <span style="color:#FF0000;">*</span></label>
                                                    <input type="tel" class="form-control customcardinput dynamic_font_size" id="scratcher_no_to" name="scratcher_no_to" value="<?= isset($product['scratcher_no_to']) ? $product['scratcher_no_to'] : '' ;?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" readonly>
                                                    <span class="errors dynamic_font_size_err" id="scratcher_no_to_err" style="color:red;"></span>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container  mb25">
                                    <input type="hidden" id="current_scr_no" value="<?= isset($product['scracher_current_no']) ? $product['scracher_current_no'] : '' ;?>">
                                    <p class="formheader currentNo dynamic_font_header2"> Scratcher Current No : <?= isset($product['scracher_current_no']) ? $product['scracher_current_no'] : '' ;?></p>
                                </div>

                            </div>
                        </div>
                    <!-- cardbody -->
                    </form>
            </div>
        </div>
    </div>
    </div>
</body>

<script src="<?php echo base_url()?>assets/cashier/js/select2@4.0.8/select2.min.js" defer></script>
<link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />

<script src="<?=base_url()?>assets/cashier/js/inventory_js/edit_scratcher_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>