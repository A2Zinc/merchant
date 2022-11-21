<body>
    <div id="overlay" style="display: none;"></div>
    <section class="customsection">
        <div>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div>
                        <div class="table-responsive-sm summery_table">
                            <input type="hidden" name="is_transaction_completed" id="is_transaction_completed" value="0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">qty</th>
                                        <th>items</th>
                                        <th style="text-align: center;">amount</th>
                                    </tr>
                                </thead>
                                <tbody id="customer_append_product">
                                    <!-- <tr>
                                        <td class="item-holder">
                                            <div class="item-number"></div>
                                            <div class="item-qty">x</div>
                                            <div class="item-name">JAMESON Irish Whiskey</div>
                                        </td>
                                        <td class="text-center">$1,000</td>
                                    </tr> -->
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- total -->
                    <div class="lf-div">
                        <ul class="custom_ui">

                            <li class="dotBorder"> Total Items<span id="cart_total_item" class="label"></span> </li>

                            <li class="dotBorder"> Sub Total<span id="cart_sub_total" class="label"></span> </li>

                            <li class="dotBorder"> Tax <span id="cart_tax" class="label"></span> </li>

                            <li class="dotBorder"> Container Deposit <span id="cart_crv" class="label"></span> </li>

                            <li id="cart_discount_tr" class="dotBorder" > Discount <span id="cart_discount" class="label"></span> </li>

                            <li id="redeem_points_discount_tr" class="dotBorder" style="display: none;"> Loyalty Discount <span id="redeem_points_discount" class="label"></span> </li>

                            <li class="totalli"><b> Total <span id="cart_grand_total" class="label"></span></b> </li>

                            <li id="cart_cash_back_tr" class="totalli" style="display: none;"> Cashback <span class="label" id="cart_cash_back" ></span> </li>

                            <li id="cart_cash_back_fee_tr" style="display: none;" class="totalli"><b> Cashback fee <span id="cart_cash_back_fee" class="label"></span></b> </li>


                            <li id="transaction_type_tr" style="display: none;" class="totalli"><b> Transaction Type <span id="transaction_type" class="label"></span></b> </li>

                            <li id="transaction_status_tr" style="display: none;" class="totalli"><b> Transaction Status <span id="transaction_status" class="label"></span></b> </li>

                            <li id="amount_tendered_tr" style="display: none;" class="totalli"><b> Amount Tendered <span id="amount_tendered" class="label"></span></b> </li>

                            <li id="return_balance_tr" style="display: none;" class="totalli"><b> Return Balance <span id="return_balance" class="label"></span></b> </li>

                        </ul>
                        <div>
                            <button data-toggle="modal" style="display: none;" id="checkout_btn" data-target="#exampleModal" type="button" class="btn  checkoutbtn btn-lg btn-block">Check Out</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 right-section" id="customer_main">
                    <div>
                        <div class="promotion">
                            <div id="demo" class="carousel slide" data-ride="carousel">

                                <!-- Indicators -->
                                <!-- <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                </ul> -->

                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?php echo base_url(); ?>assets/customers/images/promotion_2.png" alt="" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?php echo base_url(); ?>assets/customers/images/promotion_2.png" alt="" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?php echo base_url(); ?>assets/customers/images/promotion_2.png" alt="" />
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!-- register -->
                    <div class="rg-div screensaver">
                        <div style="display: flex;flex-direction: row;margin-top: 10px;">
                            <h1 class="new-cust">Are You A New Customer ??</h1>
                            <!-- <button type="button"  class=" btn reg-btn">Register Now</button> -->
                            <button type="button" id="new_register" class="btn  reg-btn ">Register Now</button>

                        </div>
                        <div style="display: inline-block;
                            flex-direction: row;
                            margin-top: 10px;
                            width: 100%;
                            padding-right: 30px;">
                            <button style="float:right;" type="button" id="login_popup" class="btn  reg-btn ">Login</button>
                        </div>
                        <p class="offers">Register & get exciting offers</p>
                        <p style="font-size:16px;line-height:24px;font-weight:500;color: #616161;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                </div>
                <div class="col-md-8 right-section" id="customer_new" style="display:none;">
                  <div class="formHeader">
                    <h2>Enroll As A New Customer</h2>
                  </div>
                  <div class="formDiv">
                    <div class="promotion">
                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group">

                            <label class="formlabel" for="exampleInputEmail1">Customers’ First Name: <span>*</span></label>
                            <input type="text" class="form-control form-control-lg use-keyboard-input" id="customer_first_name" 
                            aria-describedby="emailHelp">
                            <span class="errors" id="cfname_err" style="color:red; font-size:16px;margin-right: 10%;"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="formlabel" for="exampleInputEmail1">Customers’ Last Name: <span>*</span></label>
                            <input type="text" class="form-control form-control-lg use-keyboard-input" id="customer_last_name" aria-describedby="emailHelp">
                            <span class="errors" id="clname_err" style="color:red; font-size:16px;margin-right: 10%;"></span>
                          </div>
                        </div>
                        <!--  -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="formlabel" for="exampleInputEmail1">Customers’ E-mail: <span>*</span></label>
                            <input type="email" class="form-control form-control-lg use-keyboard-input" onkeyup="ValidateCustomerEmail(this.value);"  id="customer_email_new" aria-describedby="emailHelp">
                            <span class="errors" id="cemail_err" style="color:red; font-size:16px;margin-right: 10%;"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="formlabel" for="exampleInputEmail1">Enter Your Phone Number: <span>*</span></label>
                            <input type="text" class="form-control form-control-lg phoneInput use-keyboard-input use-keyboard-input-num usemobilehere" id="customer_mobile" aria-describedby="emailHelp">
                            <span class="errors" id="cmobile_err" style="color:red; font-size:16px;margin-right: 44%;"></span>

                          </div>
                          <!--  -->


                        </div>
                        <!-- btn -->
                        <div class="form-btn">
                          <button type="button" id="pos_customer_signup" class="btn btn-danger btn-lg pad-btn">Save</button>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- slider -->
                  <div class=" ">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                      <!-- Indicators -->
                      <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                      </ul>

                      <!-- The slideshow -->
                      <div class="carousel-inner">
                        <div class="carousel-item active quater-height">
                          <img src="<?php echo base_url(); ?>assets/customers/images/promotion_2.png" alt="" />
                        </div>
                        <div class="carousel-item quater-height">
                          <img class="" src="<?php echo base_url(); ?>assets/customers/images/promotion_2.png" alt="" />
                        </div>
                        <div class="carousel-item quater-height">
                          <img class="" src="<?php echo base_url(); ?>assets/customers/images/promotion_2.png" alt="" />
                        </div>
                      </div>

                      <!-- Left and right controls -->
                      <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 right-section" id="customer_existing" style="display:none;">
                  <div class="formHeader">
                    <h2>Customer Information</h2>
                  </div>
                  <div class="formDiv">
                    <div class="promotion">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="formlabel" for="exampleInputEmail1">Customers’ E-mail: <span>*</span></label>
                            <input disabled="true" value="" type="email" class="form-control use-keyboard-input form-control-lg" id="customer_email" aria-describedby="emailHelp">

                          </div>
                          <!--  -->
                          <div class="form-group">
                            <label class="formlabel" for="exampleInputname">Customers’ Name: <span>*</span></label>
                            <input disabled="true" value="John Doe" type="text" class="form-control form-control-lg use-keyboard-input" id="customer_name" aria-describedby="emailHelp">

                          </div>
                          <!--  -->
                          <div class="form-group">
                            <label class="formlabel" for="exampleInputEmail1">Enter Your Phone Number: <span>*</span></label>
                            <input disabled="true" value="98076542" type="text" class="form-control form-control-lg use-keyboard-input-num usemobilehere  phoneInput" id="customer_phone" aria-describedby="emailHelp">

                          </div>
                        </div>
                        <!--  -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="formlabel" for="exampleInputEmail1">Total Points: <span>*</span></label>
                            <input disabled="true" value="" type="text" class="form-control form-control-lg" id="total_point" aria-describedby="emailHelp">

                          </div>
                          <!--  -->
                          <div class="form-group">
                            <label class="formlabel" for="exampleInputEmail1">Amount Balance: <span>*</span></label>
                            <input disabled="true" value="" type="text" class="form-control form-control-lg" id="acount_balance" aria-describedby="emailHelp">

                          </div>




                        </div>
                        <!-- btn -->
                        <div class="form-btn">
                            <input type="hidden" value="0" name="customer_id" id="customer_id">
                          <button type="button" id="edit_customer" class="btn btn-danger btn-lg pad-btn">Edit</button>
                          <button type="button" id="save_customer" style="display:none;" class="btn btn-danger btn-lg pad-btn">Save</button>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- slider -->
                  <div class=" ">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                      <!-- Indicators -->
                      <!-- <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                      </ul> -->

                      <!-- The slideshow -->
                      <div class="carousel-inner">
                        <div class="carousel-item half-height active">
                          <img src="<?php echo base_url(); ?>assets/customers/images/promotion_2.png" alt="" />
                        </div>
                        <div class="carousel-item half-height">
                          <img src="<?php echo base_url(); ?>assets/customers/images/promotion_2.png" alt="" />
                        </div>
                        <div class="carousel-item half-height">
                          <img src="<?php echo base_url(); ?>assets/customers/images/promotion_2.png" alt="" />
                        </div>
                      </div>

                      <!-- Left and right controls -->
                      <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </a>
                    </div>
                  </div>
                </div>
            </div>

        </div>
    </section>
<div class="loader"></div>

    <!-- payment modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document">
            <div class="modal-content modalpadding">

                <div class="modal-body modalpadding">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center mt-5">
                        <h4>Enter Payment Method</h4>
                    </div>
                    <div class="mt-3">
                        <button type="button" id="cash_checkout" class="btn  checkoutbtn btn-lg btn-block">Cash</button>
                    </div>
                    <div class="mt-3">
                        <button type="button" id="card_checkout" class="btn  checkoutbtn btn-lg btn-block">Card</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- card payment modal -->
    <div class="modal fade" id="cardpaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document">
            <div class="modal-content modalpadding">

                <div class="modal-body modalpadding">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center mt-5">
                        <h4>Select card type</h4>
                    </div>
                    <div class="mt-3">
                        <button type="button" id="credit_debit_checkout" class="btn  checkoutbtn btn-lg btn-block">Credit/Debit</button>
                    </div>
                    <div class="mt-3">
                        <button type="button" id="EBT_checkout" class="btn  checkoutbtn btn-lg btn-block">EBT</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Mobile Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document">
            <div class="modal-content modalpadding">

                <div class="modal-body modalpadding">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center mt-4">
                        <h4>Enter Mobile Number</h4>
                    </div>
                    <div class="mt-5">
                        <input placeholder="Mobile number" class="form-control form-control-lg phoneInput use-keyboard-input-num phoneInput usemobilehere" id="customer_mobile_no" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">

                    </div>
                    <div class="mt-3">
                        <button id="searchMobileNumber" data-toggle="modal" type="button" class="btn search_mobile_number checkoutbtn btn-lg btn-block">Search</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


