<style>  
  .btn-backWrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    margin-top: 5px;
  }
  .customcardlabel{
    color: #000 !important;
  }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<body class="signback1 ">
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
          <a href="<?=base_url('cashier/promotion')?>">
            <button class="bckbtn btn-backWrapper" id="btnpromotion">
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
  <div class="row mb-3 align-items-center justify-content-between"></div>
  <div class="row mt-4">
    <div class="col-md-9">
      <h5 class="ml-3 mt-3">Add New Promotion</h5>
    </div>
    <div class="col-md-3">
      <button class="save-data" id="btnSave"> Save Promotion
        <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
      </button>
    </div>
  </div>

  <div class="container-fluid mt20 dynamic_font_size">
    <div class="row overflow">
      <div class="col-md-12">
        <div class="customcard">
          <!-- cardheader -->
          <form class="add-promotion" method="post" action="" autocomplete="off">
            <div class="customcardbody ">
              <div class="container mb25 ">
                <div class="row">
                  <div class="col-md-6 ">
                    <div class="form-group ">
                      <label class="customcardlabel" for="">Promotion Name <span style="color:#FF0000;">*</span></label>
                      <input type="text" name="promotion_name" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="promotion_name" aria-describedby="" placeholder="Enter Promotion Name">
                      <span class="errors dynamic_font_size_err" id="cname_err" style="color:red; font-size:14px"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="customcardlabel">Promotion Type <span style="color:#FF0000;">*</span></label>
                      <select class="form-control customcardinput use-keyboard-input dynamic_font_size" required="" name="promotion_type" id="promotion_type">
                        <option>--Select Promotion Type--</option>
                        <option value="8">Product Combo Promotion</option>
                      </select>
                      <span class="errors dynamic_font_size_err" id="ctype_err" style="color:red; font-size:14px"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="exampleFormControlSelect1 customcardlabel">Product <span style="color:#FF0000;">*</span></label>
                      <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" name="product_name" id="product_name" value="" />
                      <span class="errors dynamic_font_size_err" id="pname_err" style="color:red; font-size:14px"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="exampleFormControlSelect1 customcardlabel">Size</label>
                      <select class="form-control select-2-dropdown select_size dynamic_font_size" id="select_size" name="size">
                        <option value="">Select Product Size</option>
                        <?php foreach ($get_all_size as $key => $value) { ?>
                          <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" id="product_seleted_name">
                    </div>
                  </div>
                  <div class="col-md-6 productqty">
                    <div class="form-group">
                      <label class="exampleFormControlSelect1 customcardlabel">Units in a Combo <span style="color:#FF0000;">*</span></label>
                      <input type="number" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" name="product_qty" id="product_q" value="" min="0" />
                      <span class="errors dynamic_font_size_err" id="qty_err" style="color:red; font-size:14px"></span>
                    </div>
                  </div>
                  <div class="col-md-6 comboAMT">
                    <div class="form-group">
                      <label class="exampleFormControlSelect1 customcardlabel">Combo Price <span style="color:#FF0000;">*</span></label>
                      <div class="position-relative">
                        <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                        <input type="tel" class="form-control customcardinput use-keyboard-input-num  usefloathere dynamic_font_size" style="padding-left: 1.5em;" name="combo_amount" id="combo_amount" onkeyup="this.value = get_float_value(this.value)" value="0" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
                      </div>
                      <span class="errors dynamic_font_size_err" id="combo_err" style="color:red; font-size:14px"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="exampleFormControlSelect1 customcardlabel">Use Type <span style="color:#FF0000;">*</span></label>
                      <select class="form-control customcardinput dynamic_font_size" name="usetype" id="exampleFormControlSelect1">
                        <option value="1">Single Use</option>
                        <option value="2">Multi Use</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 coupDetails">
                    <div class="form-group">
                      <label class="form-control-label customcardlabel" for="date-of-birth">Promotion Details </label>
                      <input type="text" class="form-control inputfile customcardinput use-keyboard-input dynamic_font_size" name="promotion_details" id="details" placeholder="Enter Promotion Details" />
                      <span class="errors dynamic_font_size_err" id="details_err" style="color:red; font-size:14px"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label customcardlabel" for="date-of-birth">Start Date <span style="color:#FF0000;">*</span></label>
                      <input type="text" name="start_date" class=" form-control customcardinput inputDate dynamic_font_size" id="start_date" placeholder="mm-dd-yyyy" style="background: #fff;" />
                      <span class="errors dynamic_font_size_err" id="start_err" style="color:red; font-size:14px"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label customcardlabel" for="date-of-birth">Expiry Date <span style="color:#FF0000;">*</span> </label>
                      <input type="text" class="form-control customcardinput inputDate " name="end_date" id="end_date" placeholder="mm-dd-yyyy" style="background: #fff;" />
                      <span class="errors dynamic_font_size_err" id="end_err" style="color:red; font-size:14px"></span>
                      <span class="errors dynamic_font_size_err" id="date_err" style="color:red; font-size:14px"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="checkbox" id="ISreceipt" name="is_receipt_promotion" >
                        &nbsp;&nbsp;<label class="customcardlabel">Do you want to add Receipt Promotion Message ?</label>
                    </div>
                  </div>
                  <div class="col-md-12 receipt1" style="display:none;">
                      <div class="form-group">
                          <label class="form-control-label customcardlabel" >Receipt Promotion</label>
                          <input type="text" name="receipt_promotion" class="use-keyboard-input form-control customcardinput dynamic_font_size" id="receipt_pro" placeholder="Enter Receipt Promotion" />
                          <span class="errors dynamic_font_size_err" id="rcpt_err" style="color:red; font-size:14px"></span>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<style>
  .mergeButtons {
    position: absolute;
    top: 7em;
    left: 1em;

  }

  .mergeButtonsLeft {
    position: absolute;
    top: 7em;
    left: 19em;
  }
</style>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
<!-- <script>
      var jq = $.noConflict();
      jq(document).ready(function(){
        jq('.mobileimg').on('click', function(){
          jq('input[name=module]').val('pos');
          jq('front-login').modal();
        });
      });
</script> -->
<link rel="stylesheet" href="<?= base_url() ?>assets/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/style/ui@1.11.4/jquery-ui.css">
<script src="<?= base_url() ?>assets/js/jquery@1.10.2/jquery-1.10.2.js"></script>
<script src="<?= base_url() ?>assets/js/ui@1.11.4/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/flatpickr/flatpickr.js"></script>
<script src="<?php echo base_url() ?>assets/cashier/js/select2@4.0.8/select2.min.js" defer></script>
<link href="<?php echo base_url() . 'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />
<script src="<?php echo base_url() ?>assets/cashier/js/select2-tab-fix.min.js"></script>

<script src="<?=base_url()?>assets/cashier/js/loyalty_js/add_promotion_js.js"></script>
