<style>
#mobileimg{
    padding-left: 10px;
    width: 60px;
    padding-top: 5px;
    height: 55px;
    margin-right: 20px;
  }
  .bckbtn{
    height:50px;
    width:50px;
    margin-top: 5px;
    margin-right: 5px;
  }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<body class="signback1 dynamic_font_size">

<div class="containermain2">
    <div class="row m">
        <!-- <div class="col-md-8  col-xs-4 col-sm-6"> -->
        <div class="logobar ">
          <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
            <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
          <?php }else{?>
            <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
          <?php }?>
        </div>
        <!-- </div> -->


            <div class="gg">
              <a href="<?=base_url('cashier/coupon')?>">
                <button class="bckbtn btn-backWrapper" id="btncoupon">
                    <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                </button>
              </a>
        <!-- <div class="col-md-1 col-xs-6 col-sm-6"> -->
            <div>
              <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" id="mobileimg" data-toggle="modal" data-target="#exampleModal"></a>
            </div>
        <!-- </div> -->

        <!-- <div class="col-md-3 col-xs-6 col-sm-6"> -->
            <div class="mainscreen">
              <a href="<?php echo base_url(); ?>cashier">
               <p class="maindes">MAIN SCREEN</p>
              </a>

            </div>
        </div>

    </div>
</div>

<!-- main-content -->
<div class="row mb-3 align-items-center justify-content-between">
            <!-- <div class="ml-3">
                <button class="tablinks tabone custbtn mergeButtons" onclick="openCity(event, 'ab')">Customer/Loyalty Management</button>
            </div>
            <div class="">
                <button class="tablinks manbtn mergeButtonsLeft" onclick="openCity(event, 'cd')">Coupon Management</button>
            </div> -->






        </div>


<div class="row mt-4">
    <div class="col-md-9">
          <h5 class="ml-3 mt-3" >Add New Coupon</h5>

     </div>


          <div class="col-md-3">
           <button class="save-data" id="btnSave"> Save Coupon
                <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
           </button>
           </div>


        </div>

        <div class="container-fluid mt20 ">
            <div class="row overflow" >
              <div class="col-md-12">
                    <div class="customcard">

                        <!-- cardheader -->
                        <form class="add-coupon" method="post" action="" autocomplete="off">

                        <div class="customcardbody ">
                          <div class="container mb25 ">
                              <div class="row">

                                   <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="customcardlabel" for="">Coupon Name <span style="color:#FF0000;">*</span></label>
                                          <input type="text" name ="coupon_name" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="coupon_name" aria-describedby="" placeholder="Enter Coupon Name">
                                          <span class="errors dynamic_font_size_err" id="cname_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Coupon Type <span style="color:#FF0000;">*</span></label>
                                        <select class="form-control customcardinput dynamic_font_size" required="" name="coupon_type" id="coupon_type">
                                          <option>--Select Coupon Type--</option>
                                          <option value="1">Cart Total Coupon</option>
                                          <option value="3">Product Coupon</option>
                                          <option value="8">Product Combo Coupon</option>
                                          <option value="9">Category Coupon</option>
                                          <option value="10">Brand Coupon</option>

                                        </select>
                                        <span class="errors dynamic_font_size_err" id="ctype_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-md-6 product item-apend">
                                    <div class="row">
                                      <div class="col-md-11 divPROD">
                                        <div class="form-group">
                                            <label class="exampleFormControlSelect1 customcardlabel">Product <span style="color:#FF0000;">*</span></label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" name="product_name" id="product_name" value="" />
                                            <input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="" />
                                            <span class="errors dynamic_font_size_err" id="pname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-1 p-0 m-0 mt-3" id="adBTN">
                                          <button type="button" class="btn btn-light apend_button add-button" href="javascript:void(0);">+</button>
                                      </div>

                                      </div>


                                   </div>
                                   <div class="col-md-6 productqty">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Product Quantity <span style="color:#FF0000;">*</span></label>
                                        <input type="number" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" name="product_qty" id="product_q" value="" min="0"/>
                                        <span class="errors dynamic_font_size_err" id="qty_err" style="color:red; font-size:14px"></span>
                                      </div>

                                   </div>
                                   <div class="col-md-6 comboAMT">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Combo Price <span style="color:#FF0000;">*</span></label>
                                        <div class="position-relative">
                                            <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                            <input type="tel" class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size" name="combo_amount" id="combo_amount" onkeyup="this.value = get_float_value(this.value)" value="0" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/>
                                         </div>
                                         <span class="errors dynamic_font_size_err" id="combo_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-6 category">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Category <span style="color:#FF0000;">*</span></label>
                                        <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" name="category_name" id="category_name" value="" />
                                        <input type="hidden" class="form-control" name="category_id" id="category_id_select" value="" />
                                        <span class="errors dynamic_font_size_err" id="pcat_err" style="color:red; font-size:14px"></span>
                                      </div>

                                   </div>
                                    <div class="col-md-6 brand">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Brand <span style="color:#FF0000;">*</span></label>
                                        <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" name="brand_name" id="brand_name" value="" />
                                        <input type="hidden" class="form-control" name="brand_id" id="brand_id_select" value="" />
                                        <span class="errors dynamic_font_size_err" id="pbrand_err" style="color:red; font-size:14px"></span>
                                      </div>

                                   </div>



                                   <div class="col-md-6 discountTYPE">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Discount Type <span style="color:#FF0000;">*</span></label>
                                        <select class="form-control customcardinput dynamic_font_size" name="discount_type" id="discount_type">
                                          <option value="1">Discount Amount</option>
                                          <option value="2">Discount Percentage</option>
                                        </select>
                                      </div>
                                   </div>
                                   <div class="col-md-6 damount">
                                    <div class="form-group">
                                        <label class="customcardlabel">Discount Amount <span style="color:#FF0000;">*</span></label>
                                        <div class="position-relative">
                                          <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                          <input type="tel" name ="discount_amount" class="form-control customcardinput use-keyboard-input-num use-float-here dynamic_font_size" style="padding-left: 1.5em;" id="discount_amount" aria-describedby="" placeholder="Enter Discount Amount" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <span class="errors dynamic_font_size_err" id="damt_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6 dpercentage">
                                    <div class="form-group">
                                        <label class="customcardlabel">Discount Percentage <span style="color:#FF0000;">*</span></label>
                                        <input type="text" onkeypress="return isNumberKey(this, event);" name ="discount_percentage" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" id="discount_percentage" aria-describedby="" placeholder="Enter Discount Percentage">
                                        <span class="errors dynamic_font_size_err" id="dper_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>

                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Conditions</label>
                                        <select class="form-control customcardinput dynamic_font_size" name="coupon_condition" id="coupon_condition">
                                            <option >--Select Condition--</option>
                                            <option value="1">Total Greater Than</option>
                                            <option value="3">Product Greater Than (Only for product coupon type)</option>
                                        </select>
                                        <span class="errors dynamic_font_size_err" id="con_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                          <label class="customcardlabel">Amount</label>
                                          <div class="position-relative">
                                            <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                            <input class="form-control customcardinput use-keyboard-input-num usefloathere dynamic_font_size" style="padding-left: 1.5em;" name ="coupon_condition_price" id="coupon_condition_price" type="text" onkeypress="return isNumberKey(this, event);" placeholder="Enter Amount">
                                          </div>

                                          <span class="errors dynamic_font_size_err" id="amt_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Use Type
                                        </label>
                                        <select class="form-control customcardinput dynamic_font_size" name="usetype" id="exampleFormControlSelect1">
                                            <option value="1">Single Use</option>
                                            <option value="2">Multi Use</option>
                                        </select>
                                      </div>

                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="customcardlabel" for=" customcardlabel">Auto Apply</label>
                                        <select class="form-control customcardinput dynamic_font_size" name="autoapply" id="autoapply">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                      </div>
                                   </div>



                                <div class="col-md-6 applyType">
                                  <div class="form-group">
                                   <label class="customcardlabel" for="exampleFormControlSelect1 ">Apply Type </label>
                                      <select class="form-control customcardinput dynamic_font_size" name="apply_type" id="coupon_apply_type">
                                        <option value="0">Normal</option>
                                        <option value="1">Exclusive</option>
                                      </select>
                                 </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label customcardlabel" for="date-of-birth">Start Date <span style="color:#FF0000;">*</span> </label>
                                      <input type="text" name="start_date"  class=" form-control customcardinput inputDate dynamic_font_size" id="start_date"  placeholder="mm-dd-yyyy" style="background: #fff;" />
                                      <span class="errors dynamic_font_size_err" id="start_err" style="color:red; font-size:14px"></span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label customcardlabel" for="date-of-birth">Expiry Date <span style="color:#FF0000;">*</span> </label>
                                    <input type="text" class="form-control customcardinput inputDate dynamic_font_size" name="end_date" id="end_date" placeholder="mm-dd-yyyy" style="background: #fff;" />
                                    <span class="errors dynamic_font_size_err" id="end_err" style="color:red; font-size:14px"></span>
                                    <span class="errors dynamic_font_size_err" id="date_err" style="color:red; font-size:14px"></span>
                                  </div>
                                </div>

                                <div class="col-md-12 coupDetails">
                                  <div class="form-group">
                                    <label class="form-control-label customcardlabel" for="date-of-birth">Coupon Details <span style="color:#FF0000;">*</span></label>
                                    <input type="text" class="form-control inputfile customcardinput use-keyboard-input dynamic_font_size" name="coupon_details" id="details" placeholder="Enter Coupon Details" />
                                    <span class="errors dynamic_font_size_err" id="details_err" style="color:red; font-size:14px"></span>
                                  </div>
                                </div>

                           </div>

                        </div>
                        <!-- cardbody -->
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
              <button type="button" class="close" id="pos_close4" data-dismiss="modal" aria-label="Close" style="font-size: 2.0rem;">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
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
                          <label class="rolllabel" style="font-size: 21px;">Employee ID: <span style="color:#FF0000;">*</span></label> </label>
                        <input type="tel" autofocus="" name="username" id="empid1" class="form-control m customcardinput inputFile11 takeInputLogin" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" style="font-size: 26px;">
                          <span class="errors" id="id2_err" style="color:red; font-size:20px"></span>
                        </div>
                      </div>

                      <div class="col-md-12 ">
                        <div class="form-group">
                          <label class="rolllabel" style="font-size: 21px;">Employee Password: <span style="color:#FF0000;">*</span></label> </label>
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
                        <!-- <div class="col-md-4 m-0 text-center mt-2 mb-2">
                          <div class="keypad-btn backBTN">🠔</div>
                        </div> -->
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
                        <!-- <div class="col-md-4 m-0 text-center mt-2 mb-2">
                          <div class="keypad-btn tabBTN">Tab</div>
                        </div> -->
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
                        <!-- <div class="col-md-4 m-0 text-center">
                          <div class="col-md-12 m-0 p-0 text-center h-100 keypad-btn"> <button type="submit" class="btn btn-primary enterKeypad-btn h-100 w-100" id="btnFront1">Enter</button></div>
                        </div> -->
                        <!-- <div class="col-md-3 m-0">a</div>
                        <div class="col-md-3 m-0">0</div>
                        <div class="col-md-3 m-0">.</div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div style="text-align: center;">
                  <!--<but/ton type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>-->
                  <!-- <button type="submit" class="btn btn-primary customcardfooteraddbtn btn" id="btnFront" style="width: 150px;">Login</button> -->
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>

<style>
    .mergeButtons {
        position: absolute;
        top: 7em;
        left:1em;

    }

    .mergeButtonsLeft {
        position: absolute;
        top: 7em;
        left: 19em;
    }

</style>

<script>
  var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
  var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
</script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
<script src="<?=base_url()?>assets/cashier/js/loyalty_js/add_coupon_js.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/style/ui@1.11.4/jquery-ui.css">
<script src="<?=base_url()?>assets/js/jquery@1.10.2/jquery-1.10.2.js"></script>
<script src="<?=base_url()?>assets/js/ui@1.11.4/jquery-ui.js"></script>
<script src="<?=base_url()?>assets/flatpickr/flatpickr.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery@3.4.1/jquery.min.js"></script> -->
<script>var $j = jQuery.noConflict(true);</script>
<script src="<?=base_url()?>assets/cashier/js/loyalty_js/add_coupon_nxt_js.js"></script>
