<style> 
  .customcardlabel{
    color:#000 !important;
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

<body class="signback1 dynamic_font_size">
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
                  <a href="<?=base_url('cashier/coupon')?>">
                  <button class="bckbtn btn-backWrapper" id="btncoupon">
                  <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                </button>
              </a>
                <div>
                  <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" id="mobileimg" data-toggle="modal" data-target="#exampleModal"></a>
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
          <h5 class="ml-3 mt-3" >Edit Coupon</h5>
     </div>
          <div class="col-md-3">
           <button class="save-data" id="btnSave"> Save Coupon
                <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
           </button>
           </div>
        </div>
        <div class="container-fluid mt20">
            <div class="row overflow" >
              <div class="col-md-12">
                    <div class="customcard">
                        <!-- cardheader -->
                        <form class="edit-coupon" method="post" action="" autocomplete="off">
                        <div class="customcardbody ">
                          <div class="container mb25 ">
                              <div class="row">
                                   <input type="hidden" name="coupon_id" value="<?= isset($coupon['coupondata']->coupon_id) ? $coupon['coupondata']->coupon_id : '' ;?>" class="form-control">
                                   <div class="col-md-6">
                                        <div class="form-group couname1">
                                          <label class="customcardlabel" for="">Coupon Name <span style="color:#FF0000;">*</span></label>
                                          <input type="text" value="<?= isset($coupon['coupondata']->coupon_name) ? $coupon['coupondata']->coupon_name : '' ;?>" name ="coupon_name" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="coupon_name" aria-describedby="" >
                                          <span class="errors dynamic_font_size_err" id="cname_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                     <div class="form-group ctype1">
                                        <label class="exampleFormControlSelect1 customcardlabel">Coupon Type <span style="color:#FF0000;">*</span></label>
                                        <select class="form-control customcardinput dynamic_font_size" required="" name="coupon_type" id="coupon_type">
                                          <option value="1" <?php echo ($coupon['coupondata']->coupon_type == '1')?'selected':'' ?>>Cart Total Coupon</option>
                                          <option value="3" <?php echo ($coupon['coupondata']->coupon_type == '3')?'selected':'' ?>>Product Coupon</option>
                                          <option value="8" <?php echo ($coupon['coupondata']->coupon_type == '8')?'selected':'' ?>>Product Combo Coupon</option>
                                          <option value="9" <?php echo ($coupon['coupondata']->coupon_type == '9')?'selected':'' ?>>Category Coupon</option>
                                          <option value="10" <?php echo ($coupon['coupondata']->coupon_type == '10')?'selected':'' ?>>Brand Coupon</option>
                                        </select>
                                      </div>
                                   </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-md-6 product2">
                                           <div class="form-group proCo1">
                                              <label class="exampleFormControlSelect1 customcardlabel">Product <span style="color:#FF0000;">*</span></label>
                                              <input type="text" class="form-control customcardinput product_name use-keyboard-input dynamic_font_size" name="product_name" id="product_name" value="<?= isset($coupon['productdata'][0]->product_name) ? $coupon['productdata'][0]->product_name : '' ;?>" />
                                                      <input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="<?= isset($coupon['productdata'][0]->product_id) ? $coupon['productdata'][0]->product_id : '' ;?>" />
                                            </div>
                                      </div>
                                      <div class="col-md-6 productqty">
                                           <div class="form-group proQT1">
                                              <label class="exampleFormControlSelect1 customcardlabel">Product Quantity <span style="color:#FF0000;">*</span></label>
                                              <input type="number" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" name="product_qty" id="product_q"  value="<?= isset($coupon['coupondata']->product_qty) ? $coupon['coupondata']->product_qty : '' ;?>" />
                                              <span class="errors dynamic_font_size_err" id="qty_err" style="color:red; font-size:14px"></span>
                                            </div>
                                      </div>
                                      </div>
                                     </div>
                                   <div class="col-md-6 product item-apend">
                                        <div class="row">
                                          <?php $count=0;
                                          if(!empty($coupon['productdata'])){
                                            foreach ($coupon['productdata'] as $pro){ ?>
                                              <?php if($count > 0 ){ ?>
                                                <div class="row prdut">
                                              <?php } ?>
                                              <div class="col-md-11 divPROD">
                                                  <div class="form-group">
                                                      <label class="exampleFormControlSelect1 customcardlabel">Product <span style="color:#FF0000;">*</span></label>
                                                      <input type="text" class="form-control customcardinput product_name use-keyboard-input dynamic_font_size" name="product_name" id="<?php echo $pro->product_id; ?>" value="<?= isset($pro->product_name) ? $pro->product_name : '' ;?>" />
                                                      <input type="hidden" class="form-control" name="product_id[]" id="product_id_select<?php echo $pro->product_id; ?>" value="<?= isset($pro->product_id) ? $pro->product_id : '' ;?>" />
                                                      <span class="errors dynamic_font_size_err" id="pname_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                              </div>
                                              <?php if($count ==0 ){ ?>
                                                <div class="col-md-1 p-0 m-0 mt-3" id="adBTN">
                                                  <button type="button" class="btn btn-light apend_button add-button" href="javascript:void(0);">+</button>
                                                </div>
                                              <?php }else{ ?>
                                                <div class="col-md-1 p-0 m-0 mt-3"><button type="button" class="btn btn-light apend_button removeNominee" href="javascript:void(0);">-</button></div>
                                              <?php } $count++; ?>
                                              <?php if($count > 0 ){ ?>
                                                </div>
                                              <?php } ?>
                                            <?php }
                                          }else{ ?>
                                              <div class="col-md-11 divPROD">
                                                  <div class="form-group PROS1">
                                                      <label class="exampleFormControlSelect1 customcardlabel">Product <span style="color:#FF0000;">*</span></label>
                                                      <input type="text" class="form-control customcardinput product_name use-keyboard-input dynamic_font_size" name="product_name" id="<?php echo $pro->product_id; ?>" value="<?= isset($pro->product_name) ? $pro->product_name : '' ;?>" />
                                                      <input type="hidden" class="form-control" name="product_id[]" id="product_id_select<?php echo $pro->product_id; ?>" value="<?= isset($pro->product_id) ? $pro->product_id : '' ;?>" />
                                                      <span class="errors dynamic_font_size_err" id="pname_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                              </div>
                                              <div class="col-md-1 p-0 m-0 mt-3" id="adBTN">
                                                  <button type="button" class="btn btn-light apend_button add-button" href="javascript:void(0);">+</button>
                                              </div>
                                         <?php  } ?>
                                        </div>
                                </div>
                                     <div class="col-md-6 comboAMT" style="margin-left: -15px;">
                                       <div class="form-group COS1" style="width: 103%;">
                                          <label class="exampleFormControlSelect1 customcardlabel">Combo Price <span style="color:#FF0000;">*</span></label>
                                              <div class="position-relative">
                                              <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                <input type="tel" class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size" style="padding-left: 1.5em;" name="combo_amount" id="combo_amount" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?= isset($coupon['coupondata']->combo_amount) ? $coupon['coupondata']->combo_amount : '' ;?>"/>
                                            </div>
                                            <span class="errors dynamic_font_size_err" id="combo_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                <div class="row">
                                    <div class="col-md-6 category">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Category <span style="color:#FF0000;">*</span></label>
                                        <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" name="category_name" id="category_name" value="<?= isset($coupon['coupondata']->category_name) ? $coupon['coupondata']->category_name : '' ;?>" />
                                        <input type="hidden" class="form-control" name="category_id" id="category_id_select" value="<?= isset($coupon['coupondata']->category_id) ? $coupon['coupondata']->category_id : '' ;?>" />
                                        <span class="errors dynamic_font_size_err" id="pcat_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                    <div class="col-md-6 brand">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Brand <span style="color:#FF0000;">*</span></label>
                                        <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" name="brand_name" id="brand_name" value="<?= isset($coupon['coupondata']->brand_name) ? $coupon['coupondata']->brand_name : '' ;?>" />
                                        <input type="hidden" class="form-control" name="brand_id" id="brand_id_select" value="<?= isset($coupon['coupondata']->brand_id) ? $coupon['coupondata']->brand_id : '' ;?>" />
                                        <span class="errors dynamic_font_size_err" id="pbrand_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 discountTYPE">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Discount Type <span style="color:#FF0000;">*</span></label>
                                        <select class="form-control customcardinput dynamic_font_size" name="discount_type" id="discount_type">
                                          <option value="<?=$coupon['coupondata']->coupon_price_type?>" selected><?php if($coupon['coupondata']->coupon_price_type == 1){?> Discount Amount <?php }elseif($coupon['coupondata']->coupon_price_type == 2){?> Discount Percentage <?php } ?> </option>
                                          <?php if($coupon['coupondata']->coupon_price_type == '1'){?>
                                            <option value="2">Discount Percentage</option>
                                          <?php }elseif($coupon['coupondata']->coupon_price_type == '2'){?>
                                          <option value="1">Discount Amount</option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                   </div>
                                   <div class="col-md-6 damounts">
                                    <div class="form-group">
                                        <label class="customcardlabel">Discount Amount <span style="color:#FF0000;">*</span></label>
                                        <div class="position-relative">
                                          <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                          <input class="dynamic_font_size form-control customcardinput" type="tel" value="<?= isset($coupon['coupondata']->coupon_amount) ? $coupon['coupondata']->coupon_amount : '' ;?>" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" name ="discount_amount" class="form-control customcardinput use-keyboard-input-num usefloathere" id="discount_amount" aria-describedby="" placeholder="Enter Discount Amount">
                                        </div>
                                        <span class="errors dynamic_font_size_err" id="damt_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 dpercentage">
                                    <div class="form-group dper">
                                        <label class="customcardlabel">Discount Percentage <span style="color:#FF0000;">*</span></label>
                                        <input type="text" value="<?= isset($coupon['coupondata']->discount_percentage) ? $coupon['coupondata']->discount_percentage : '' ;?>" onkeypress="return isNumberKey(this, event);" name ="discount_percentage" class="form-control customcardinput use-keyboard-input" id="discount_percentage" aria-describedby="" placeholder="Enter Discount Percentage">
                                        <span class="errors dynamic_font_size_err" id="dper_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Conditions</label>
                                        <select class="form-control customcardinput dynamic_font_size" name="coupon_condition" id="coupon_condition">
                                            <option value="" <?php echo ($coupon['coupondata']->coupon_condition == '')?'selected':'' ?>>--Select Coupon Type--</option>
                                            <option value="1" <?php echo ($coupon['coupondata']->coupon_condition == '1')?'selected':'' ?>>Total Greater Than</option>
                                            <option value="3" <?php echo ($coupon['coupondata']->coupon_condition == '3')?'selected':'' ?>>Product Greater Than (Only for product coupon type)</option>
                                        </select>
                                        <span class="errors dynamic_font_size_err" id="con_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                          <label class="customcardlabel">Amount</label>
                                          <div class="position-relative">
                                              <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                              <input class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size" style="padding-left: 1.5em;" value="<?= isset($coupon['coupondata']->coupon_condition_price) ? $coupon['coupondata']->coupon_condition_price : '' ;?>"  name ="coupon_condition_price" id="coupon_condition_price" type="text"  placeholder="Enter Amount" onkeypress="return isNumberKey(this, event);">
                                          </div>
                                          <span class="errors dynamic_font_size_err" id="amt_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Use Type
                                        </label>
                                        <select class="form-control customcardinput dynamic_font_size" name="usetype" id="exampleFormControlSelect1">
                                          <option value="<?=$coupon['coupondata']->usetype?>" selected><?php if($coupon['coupondata']->usetype == 1){?> Single Use <?php }elseif($coupon['coupondata']->usetype == 2){?> Multi Use <?php } ?> </option>
                                          <?php if($coupon['coupondata']->usetype == '1'){?>
                                          <option value="2">Multi Use</option>
                                          <?php }elseif($coupon['coupondata']->usetype == '2'){?>
                                          <option value="1">Single Use</option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="customcardlabel" for=" customcardlabel">Auto Apply</label>
                                        <select class="form-control customcardinput dynamic_font_size" name="autoapply" id="autoapply">
                                            <option value="<?=$coupon['coupondata']->autoapply?>" selected><?php if($coupon['coupondata']->autoapply == 1){?> Yes <?php }elseif($coupon['coupondata']->autoapply == 0){?> No <?php } ?> </option>
                                          <?php if($coupon['coupondata']->autoapply == '1'){?>
                                          <option value="0">No</option>
                                          <?php }elseif($coupon['coupondata']->autoapply == '0'){?>
                                          <option value="1">Yes</option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                   </div>
                                <div class="col-md-6 applyType">
                                  <div class="form-group">
                                   <label class="customcardlabel" for="exampleFormControlSelect1 ">Apply Type </label>
                                      <select class="form-control customcardinput dynamic_font_size" name="apply_type" id="coupon_apply_type">
                                        <option value="<?=$coupon['coupondata']->coupon_apply_type?>" selected><?php if($coupon['coupondata']->coupon_apply_type == 1){?> Exclusive <?php }elseif($coupon['coupondata']->coupon_apply_type == 0){?> Normal <?php } ?> </option>
                                          <?php if($coupon['coupondata']->coupon_apply_type == '1'){?>
                                          <option value="0">Normal</option>
                                          <?php }elseif($coupon['coupondata']->coupon_apply_type == '0'){?>
                                          <option value="1">Exclusive</option>
                                          <?php } ?>
                                      </select>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label customcardlabel" for="date-of-birth">Start Date <span style="color:#FF0000;">*</span> </label>
                                      <input type="text" name="start_date" class=" form-control inputfile customcardinput inputDate dynamic_font_size" id="start_date"  value="<?= isset($coupon['coupondata']->start_date) ? date('m-d-Y',strtotime($coupon['coupondata']->start_date)) : '' ;?>" style="background: #fff;"/>
                                      <span class="errors dynamic_font_size_err" id="start_err" style="color:red; font-size:14px"></span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label customcardlabel" for="date-of-birth">Expiry Date <span style="color:#FF0000;">*</span> </label>
                                    <input type="text" class="form-control inputfile customcardinput inputDate dynamic_font_size" name="end_date" id="end_date" value="<?= isset($coupon['coupondata']->end_date) ? date('m-d-Y',strtotime($coupon['coupondata']->end_date)) : '' ;?>" style="background: #fff;"/>
                                    <span class="errors dynamic_font_size_err" id="end_err" style="color:red; font-size:14px"></span>
                                    <span class="errors dynamic_font_size_err" id="date_err" style="color:red; font-size:14px"></span>
                                  </div>
                                </div>
                                <div class="col-md-12 coupDetails">
                                  <div class="form-group">
                                    <label class="form-control-label customcardlabel" for="date-of-birth">Coupon Details <span style="color:#FF0000;">*</span></label>
                                    <input type="text" class="form-control inputfile customcardinput use-keyboard-input dynamic_font_size" name="coupon_details" id="details" value="<?= isset($coupon['coupondata']->coupon_details) ? $coupon['coupondata']->coupon_details : '' ;?>" placeholder="Enter Coupon Details" />
                                    <span class="errors dynamic_font_size_err" id="details_err" style="color:red; font-size:14px"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
              </div>
            </div>
      </div>

      <!--Prashant create modal-->
<div class="modal front-login1" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title text-center w-100 m-0 custommodaltitle cashcenter" id="exampleModalLongTitle" style="font-size: 1.5rem;">Ring Sales Login</h5>
        <button type="button" class="close" id="pos_close3" data-dismiss="modal" aria-label="Close" style="font-size: 2.0rem;">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <form action="" method="post" class="front_logins" autocomplete="off">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-5 m-0 p-0">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <input type="hidden" name="module" value="">
                    <label class="rolllabel" style="font-size: 21px;">Employee ID: *</label> </label>
                  <input type="tel" autofocus="" name="username" id="empid1" class="form-control customcardinput inputFile11 takeInputLogin" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" style="font-size: 26px;">
                    <span class="errors" id="id2_err" style="color:red; font-size:20px"></span>
                  </div>
                </div>
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="rolllabel" style="font-size: 21px;">Employee Password: *</label> </label>
                    <input type="password" name="password" id="emppwd1" class="form-control customcardinput inputFile11 takeInputLogin" aria-describedby="" maxlength="4" style="font-size: 26px;">
                    <span class="errors" id="pwd2_err" style="color:red; font-size:20px"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-7 m-0 p-0">
                <div class="row m-0 p-0">
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">7</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">8</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">9</div>
                  </div>
                </div>
                <div class="row m-0 p-0">
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">4</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">5</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">6</div>
                  </div>
                </div>
                <div class="row m-0 p-0 mt-2">
                  <div class="col-md-4 m-0">
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mb-3">1</div>
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mt-2 backBTN">🠔</div>
                  </div>
                  <div class="col-md-4 m-0">
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mb-3">2</div>
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mt-2">0</div>
                  </div>
                  <div class="col-md-4 m-0">
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mb-3">3</div>
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn2 mt-2"><button type="submit" class="btn btn-primary enterKeypad-btn h-100 w-100" id="btnFront1">Enter</button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
  var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
</script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
<script src="<?=base_url()?>assets/cashier/js/loyalty_js/edit_coupon_js.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/style/ui@1.11.4/jquery-ui.css">
<script src="<?=base_url()?>assets/js/jquery@1.10.2/jquery-1.10.2.js"></script>
<script src="<?=base_url()?>assets/js/ui@1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/flatpickr/flatpickr.min.css">
<script src="<?=base_url()?>assets/flatpickr/flatpickr.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery@3.4.1/jquery.min.js"></script> -->
<script>var $j = jQuery.noConflict(true);</script>
<script src="<?=base_url()?>assets/cashier/js/loyalty_js/edit_coupon_nxt_js.js"></script>
