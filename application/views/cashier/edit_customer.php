<style>  
  .customcardlabel{
    color: #000 !important;
  }
  .btn-backWrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    margin-top: 5px;
  }

  .keypad-btn {
    font-size: 20px;
    background-color: lightgray;
    color: black;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    font-weight: 600;
    height: 75px;
  }

  .keypad-btn:active {
    background: gray;
  }
  .keypad-btn2 {
    font-size: 20px;
    background-color: lightgray;
    color: black;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    font-weight: 600;
    height: 75px;
  }

  .keypad-btn2:active {
    background: gray;
  }
  .enterKeypad-btn {
    all: unset;
    background-color: gray;
  }

  .enterKeypad-btn {
    width: auto;
    background: transparent;
    border: none;

    color: black;
    font-weight: 600;
    font-size: 20px;
  }

  #mobileimg{
    padding-left: 10px;
    width: 60px;
    padding-top: 5px;
    height: 55px;
    margin-right: 20px;
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
                  <a href="<?=base_url('cashier/loyalty')?>">
                  <button class="bckbtn btn-backWrapper" id="btncoupon">
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
          <h5 class="ml-3 mt-3" >Edit Customer</h5>
    </div>
    <div class="col-md-3">
         <button class="save-data smbtn" id="btnSave"> Save Information
            <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
         </button>
     </div>
</div>

  <div class="container-fluid mt20 dynamic_font_size">
      <div class="row overflow" >
        <div class="col-md-12">
              <div class="customcard">
                  <!-- cardheader -->
                  <form class="edit-customer" method="post" action="" autocomplete="off">
                  <input type="hidden" name="customer_id" id="customer_id" value="<?=isset($customer_data->customer_id) ? $customer_data->customer_id : '' ;?>" />
                  <div class="customcardbody ">
                    <div class="container mb25 ">
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label customcardlabel" >Customer First Name <span style="color:#FF0000;">*</span></label>
                                <input type="text" name="customer_fname" class="use-keyboard-input form-control customcardinput dynamic_font_size" id="fname" placeholder="First Name" onkeypress="return onlyAlphabets(event,this);" value="<?=isset($customer_data->first_name) ? $customer_data->first_name : '' ;?>" />
                                <span class="errors dynamic_font_size_err" id="fname_err" style="color:red; font-size:14px"></span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label customcardlabel">Customer Last Name <span style="color:#FF0000;">*</span></label>
                                <input type="text" name="customer_lname" class="use-keyboard-input form-control customcardinput dynamic_font_size" id="lname" placeholder="Last Name"  onkeypress="return onlyAlphabets(event,this);" value="<?=isset($customer_data->last_name) ? $customer_data->last_name : '' ;?>"/>
                                <span class="errors dynamic_font_size_err" id="lname_err" style="color:red; font-size:14px"></span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label customcardlabel">Email Address</label>
                              <input type="text" class="use-keyboard-input form-control customcardinput dynamic_font_size" name="customer_email" id="email" placeholder="Email" onkeyup="ValidateEmail();" value="<?=isset($customer_data->customer_email) ? $customer_data->customer_email : '' ;?>" readonly/>
                              <span class="errors dynamic_font_size_err" id="email_err" style="color:red; font-size:14px"></span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label customcardlabel" >Phone Number <span style="color:#FF0000;">*</span></label>
                              <input type="tel" class="use-keyboard-input-num form-control customcardinput phoneInput usemobilehere dynamic_font_size" id="mobile" name="customer_phone" placeholder="Phone number" value="<?=isset($customer_data->customer_mobile) ? $customer_data->customer_mobile : '' ;?>" required maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/>
                              <span class="errors dynamic_font_size_err" id="mob_err" style="color:red; font-size:14px"></span>
                            </div>
                          </div>
                          <div class="col-md-6">
                           <div class="form-group">
                               <label class="customcardlabel" for="">Address Line 1 </label>
                               <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="address1" name="address_1" aria-describedby="" placeholder="Address Line 1" value="<?=isset($customer_data->customer_address_1) ? $customer_data->customer_address_1 : '' ;?>">
                               <span class="errors dynamic_font_size_err" id="add1_err" style="color:red; font-size:14px"></span>
                             </div>
                          </div>
                          <div class="col-md-6">
                           <div class="form-group">
                               <label class="customcardlabel">Address Line 2 </label>
                               <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="address2" name="address_2" aria-describedby="" placeholder="Address Line 2" value="<?=isset($customer_data->customer_address_2) ? $customer_data->customer_address_2 : '' ;?>">
                               <span class="errors dynamic_font_size_err" id="add2_err" style="color:red; font-size:14px"></span>
                             </div>
                          </div>
                          <div class="col-md-6">
                           <div class="form-group">
                               <label class="customcardlabel">Country </label>
                               <select class="form-control customcardinput use-keyboard-input dynamic_font_size" id="country" name="country">
                                 <option>--Select Country--</option>
                                 <?php foreach($country as $c){ ?>
                                     <option value="<?=$c->id?>" <?php if($c->id == $customer_data->country){ echo 'SELECTED'; }?>><?=$c->name?></option>
                                 <?php } ?>
                               </select>
                               <span class="errors dynamic_font_size_err" id="country_err" style="color:red; font-size:14px"></span>
                             </div>
                          </div>
                          <div class="col-md-6">
                           <div class="form-group">
                               <label class="customcardlabel">State </label>
                               <select class="form-control customcardinput use-keyboard-input dynamic_font_size" id="state" name="state">
                                 <?php foreach($states as $c){ ?>
                                     <option value="<?=$c->iso2?>" <?php if($c->iso2 == $customer_data->state){ echo 'SELECTED'; }?>><?=$c->name?></option>
                                 <?php } ?>
                               </select>
                               <span class="errors dynamic_font_size_err" id="state_err" style="color:red; font-size:14px"></span>
                             </div>
                          </div>
                          <div class="col-md-6">
                           <div class="form-group">
                               <label class="customcardlabel">City </label>
                               <select class="form-control customcardinput use-keyboard-input dynamic_font_size" id="city" name="city">
                                 <?php foreach($cities as $c){ ?>
                                     <option value="<?=$c->id?>" <?php if($c->id == $customer_data->city){ echo 'SELECTED'; }?>><?=$c->name?></option>
                                 <?php } ?>
                               </select>
                               <span class="errors dynamic_font_size_err" id="city_err" style="color:red; font-size:14px"></span>
                             </div>
                          </div>
                          <div class="col-md-6">
                           <div class="form-group">
                               <label class="customcardlabel">Zip Code </label>
                               <input type="tel" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" id="zipcode" name="zipcode" maxlength="5" aria-describedby="" placeholder="Zip Code" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?=isset($customer_data->zip) ? $customer_data->zip : '' ;?>">
                               <span class="errors dynamic_font_size_err" id="zip_err" style="color:red; font-size:14px"></span>
                             </div>
                          </div>
                     </div>
                  </div>
              </div>
            </form>
        </div>
      </div>
</div>

<script src="<?=base_url()?>assets/cashier/js/loyalty_js/edit_customer_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
