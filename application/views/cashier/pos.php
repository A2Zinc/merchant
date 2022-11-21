<style>
.input_new_config{
    font-size: 93%!important;
    padding-right: 0!important;
}
.reedem_btn{
    font-size:17px;
    margin-top: 4%;
    margin-left: 5%;

}
.blk1{
    max-height:50px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    font-family: "Circular Std Book";
    font-size: 0.833333334vw;
    color: white;
    background: #374862;
    -webkit-box-shadow: 0px 2px 2px rgb(50 50 71 / 6%), 0px 2px 4px rgb(50 50 71 / 6%);
    box-shadow: 0px 2px 2px rgb(50 50 71 / 6%), 0px 2px 4px rgb(50 50 71 / 6%);
    border-radius: 2px;
    text-align: center;
    margin: 0;
    width: 15.0833333333334vw;
    position: relative;
}.flexB3 {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    overflow-y: unset!important;
    width: 100%;
    -webkit-box-pack: space-evenly;
    -ms-flex-pack: space-evenly;
    justify-content: space-evenly;

}
.jan_05 {

    justify-content: flex-start;
    padding-left: 4px;
    margin-bottom: 2px!important;

}
.printSec {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: start;
    color: white;
    height: 203px!important;
    overflow-y: unset!important;
    width: 100%;
}
.jan_05 a{
    width: 19.5%;
}
.cm4 {
    /*font-size: 16px!important;*/
}
@media only screen and (min-width: 1200px){

    .reedem_btn{
    padding-left:1vw;
    margin:2vh 0 0 0 !important;
    }
}
@media only screen and (max-width: 1080px){
    .three{
        width: 26% !important;
    }

}

.priceoverrided {
    background-color: #cccccc !important;
}

</style>
<div class="grid-container">
<script src='<?php echo base_url(); ?>assets/js/dragula.min.js'></script>

    <script>
        dragula([document.querySelector('#testbtn'), document.querySelector('.flexB2')]);
    </script>

    <div class="cusDetails">
        <div class="customerInfo">
            <div class="crow c1">
                <div class="mainButton" style="background: none;">
                    <a class="" style="width:100%;text-align:left;padding-left: 10px;">
                        <p style="color:red;padding-left: .5em; white-space: nowrap;">
                            <?=ucfirst($this->session->userdata['nick_name'])?>
                        </p>
                    </a>
                </div>
                <div class="greyButton one">
                     <a onclick="add_customer()" href="#add_customer_modal"  style="display: contents;" id="add_customer">
                        <div  class="blk">
                            <svg width="100%" height="50%" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.1818 6.23962C11.7891 6.23962 13.0909 4.84351 13.0909 3.11981C13.0909 1.39612 11.7891 0 10.1818 0C8.57455 0 7.27273 1.39612 7.27273 3.11981C7.27273 4.84351 8.57455 6.23962 10.1818 6.23962ZM3.63636 4.67972V2.33986H2.18182V4.67972H0V6.23962H2.18182V8.57948H3.63636V6.23962H5.81818V4.67972H3.63636ZM10.1818 7.79953C8.24 7.79953 4.36364 8.84467 4.36364 10.9193V12.4792H16V10.9193C16 8.84467 12.1236 7.79953 10.1818 7.79953Z" fill="white" />
                            </svg>
                        </div>
                    </a>
                    <a onclick="walk_in_customer()" href="#walk_in_customer_modal"  style="display: contents;" id="walk_customer"><p style="font-size: 17px;" class='textbtn'>Walk-in Customer</p></a>
                </div>
            </div>
            <div class="crow ">
                <div class="cTextBox">
                    <h5 class="pos-head" style="color: white;"></h5>
                    <p class="pos-point fontSetting">Total Points:&emsp;&emsp; <span id="cust_loyalty_points">0</span></p>
                    <p class="pos-point fontSetting">Account Balance: &emsp;&emsp; $<span id="cust_loyalty_amount">0.00</span></p>
                </div>
                <div class="blk1 two " style="margin-top:4%;">
                    <a   href="#pos_redeem_points_modal" rel="modal:open" style="display: contents;" id="walk_customer" data-cust_loyalty_points="" data-cust_loyalty_amount="">
                        <div class="blk three"> <svg width="90%" height="50%" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path d="M8.4375 5.1875H10.3125V6.125H8.4375V5.1875Z" fill="white" />
                                    <path d="M11.25 5.1875H13.125V6.125H11.25V5.1875Z" fill="white" />
                                    <path d="M14.0625 5.1875V6.125H15.0625V7.0625H16V5.1875H14.0625Z" fill="white" />
                                    <path d="M15.0625 8H16V9.875H15.0625V8Z" fill="white" />
                                    <path d="M15.0625 10.8125H16V12.6875H15.0625V10.8125Z" fill="white" />
                                    <path d="M5.625 10.8125H6.5625V12.6875H5.625V10.8125Z" fill="white" />
                                    <path d="M15.0625 14.5625H14.0625V15.5H16V13.625H15.0625V14.5625Z" fill="white" />
                                    <path d="M11.25 14.5625H13.125V15.5H11.25V14.5625Z" fill="white" />
                                    <path d="M8.4375 14.5625H10.3125V15.5H8.4375V14.5625Z" fill="white" />
                                    <path d="M6.5625 13.625H5.625V15.5H7.5V14.5625H6.5625V13.625Z" fill="white" />
                                    <path d="M7.646 5.01808C9.88966 3.0057 9.00263 3.75133 9.95135 2.8413L9.62222 2.51217C8.71035 1.59986 7.22629 1.60077 6.33732 2.49158L5.56885 3.1677C5.6026 3.1982 6.74447 4.20427 7.646 5.01808Z" fill="white" />
                                    <path d="M2.05063 6.2793C1.94516 6.37252 0.654281 7.50755 0.549781 7.61202C0.195 7.96633 0 8.43736 0 8.93724C0 9.97133 0.840906 10.8122 1.875 10.8122C2.90909 10.8122 3.75 9.97133 3.75 8.93724C3.75 8.80545 3.73594 8.67592 3.71056 8.55502L4.16416 8.14739L2.05063 6.2793ZM1.875 9.87474C1.35819 9.87474 0.9375 9.45405 0.9375 8.93724C0.9375 8.5388 1.13587 8.31552 1.38794 8.1572C1.76613 7.92789 2.20003 8.01192 2.47466 8.23383C2.54878 8.32877 2.8125 8.52202 2.8125 8.93724C2.8125 9.45405 2.39181 9.87474 1.875 9.87474Z" fill="white" />
                                    <path d="M4.46566 3.43459L3.71059 2.75616L3.71025 2.75628C3.73619 2.63225 3.75 2.50469 3.75 2.375C3.75 1.34091 2.90909 0.5 1.875 0.5C0.840906 0.5 0 1.34091 0 2.375C0 2.97259 0.280219 3.50444 0.71575 3.84775L0.715156 3.84797L5.625 8.18975V9.875H6.5625V9.00175C6.97822 9.31666 7.47094 9.48359 7.96875 9.48359C8.5675 9.48359 9.16625 9.25563 9.62219 8.80016L9.95131 8.47103C8.37175 6.89147 10.2846 8.66322 4.46566 3.43459ZM1.875 1.4375C2.39181 1.4375 2.8125 1.85819 2.8125 2.375C2.8125 3.22466 1.74938 3.57359 1.21263 3.03737C1.035 2.85978 0.9375 2.62447 0.9375 2.375C0.9375 1.85819 1.35819 1.4375 1.875 1.4375Z" fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </a>
                    <a href="#pos_redeem_points_modal" id="reedem_point_button"><p class="textbtn reedem_btn">Reedem Points</p></a>
                </div>
            </div>
            <div class="table-container">
                <form name="frmItemCart" id="frmItemCart" method="post">
                    <table>
                        <thead style="position: -webkit-sticky; position: sticky; top: -1px;z-index: 1;">
                            <tr class="itemTableOne" style="border-left:none;border-right:none;">
                                <th style='text-align: left;padding-left: 2.5%;' width="45%">Item</th>
                                <th width="25%" style="padding-right:0;">Quantity</th>
                                <th width="20%">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="item_info_section">
                            <input type="hidden" name="exist_product_id" id="exist_product_id">
                            <input type="hidden" name="main_cart_grand_total" id="main_cart_grand_total">
                            <input type="hidden" name="cart_grand_total" id="cart_grand_total">
                            <input type="hidden" name="cart_refund_amount" id="cart_refund_amount" value="0.00">
                            <input type="hidden" name="container_deposit" id="container_deposit">
                            <input type="hidden" name="db_return_balance" id="db_return_balance">
                            <input type="hidden" name="tax_amount" id="tax_amount">
                            <input type="hidden" name="walk_in_customer_name" id="walk_in_customer_name" value="Walk-in Customer">
                            <input type="hidden" name="walk_in_customer_id" id="walk_in_customer_id" value="0">
                            <input type="hidden" name="is_transaction_completed" id="is_transaction_completed" value="0">
                            <input type="hidden" name="exist_coupon" id="exist_coupon" value="">
                            <input type="hidden" name="exist_promotion" id="exist_promotion" value="">
                            <input type="hidden" name="coupon_discount_total" id="coupon_discount_total" value="0">
                            <input type="hidden" name="custom_discount_total" id="custom_discount_total" value="0">
                            <input type="hidden" name="recall_order_id" id="recall_order_id" value="0">
                            <input type="hidden" name="refund_exist_product_id" id="refund_exist_product_id">
                            <input type="hidden" name="is_scan_refund_order" id="is_scan_refund_order" value="0">
                            <input type="hidden" name="is_age_verified" id="is_age_verified" value="0">
                            <input type="hidden" name="barcode_product_before_age_verify" id="barcode_product_before_age_verify" value="">
                            <input type="hidden" name="is_cashback" id="is_cashback" value="0">
                            <input type="hidden" name="cashback_fee" id="cashback_fee" value="0">
                            <input type="hidden" name="cashback_amount" id="pos_cashback_amount" value="0"> <!--prashant change-->
                            <input type="hidden" name="exist_redeem_points" id="exist_redeem_points" value="0">
                            <input type="hidden" name="used_redeem_points" id="used_redeem_points" value="0">
                            <input type="hidden" name="outbound_point_main" id="outbound_point_main" value="0">
                            <input type="hidden" name="outbound_point_amount_main" id="outbound_point_amount_main" value="0">
                            <input type="hidden" name="redeem_points_discount" id="redeem_points_discount" value="0">
                            <input type="hidden" name="cashdrawer_amt" id="cashdrawer_amt" value="">
                            <input type="hidden" name="cashback_note" id="cashback_note" value="">
                            <input type="hidden" name="price_override_click" id="price_override_click" value="0">
                            <!-- partial transaction - ST - ravi - 27-10-2021 -->

                            <input type="hidden" name="partial_transaction_apply" id="partial_transaction_apply" value="0">
                            <input type="hidden" name="partial_transaction_cash_amount" id="partial_transaction_cash_amount" value="0">
                            <input type="hidden" name="partial_transaction_card_amount" id="partial_transaction_card_amount" value="0">

                            <!-- partial transaction - EN - ravi - 27-10-2021 -->


                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="total-con">
            <div class="p1">
                <p>Total Items</p>
                <p id="total_item">0</p>
            </div>
            <div class="p1">
                <p>Subtotal</p>
                <p id="sub_total">$0.00</p>
            </div>
            <div class="p1">
                <p>Tax</p>
                <p id="tax_html">$0.00</p>
            </div>
            <div class="p1 refund_amount_pos" style="display: none;">
                <p>Refund</p>
                <p id="tax_html" class="tax_html">$0.00</p>
            </div>
            <div class="p1">
                <p>Container Deposit</p>
                <p>$<label id="CRV_box">0.00</label></p>
            </div>
            <div class="p1" id="redeem_discount_div" style="display: none;">
                <p>Loyalty Discount</p>
                <p style="color: red;"><span style="color: red;">(-)</span> $<span id="redeem_discount">0.00</span></p>
            </div>
            <div class="p1" id="discount_div" style="display: none;">
                <p>Discount <span id="applied_coupon"></span></p>
                <p style="color: red;"><span style="color: red;">(-)</span> $<span id="coupon_discount">0.00</span></p>
            </div>
            <div class="p1" id="promotion_discount_div" style="display: none;">
                <p style="color: red;">Total Savings <span id="applied_coupon"></span></p>
                <p style="color: red;"><span style="color: red;">(-)</span> $<span id="promotion_coupon_discount">0.00</span></p>
            </div>
            <div class="p1" id="price_override_div" style="display: none;">
                <p style="color: red;">Total Savings <span id="applied_prc_overirde"></span></p>
                <p style="color: red;"><span style="color: red;">(-)</span> $<span id="prc_overirde_discount">0.00</span></p>
            </div>
            <div class="p1 totalColor">  <!-- totalColor class added prashant -->
                <p style="color: black;">Total</p>
                <p style="color: black;" id="grand_total">$0.00</p>
            </div>
            <div class="p1" id="cart_cashback_amount" style="display: none;">
                <p>Cashback Amount</p>
                <p>$<label id="append_cashback_amount">0.00</label></p>
            </div>
            <div class="p1" id="cart_cashback_fee" style="display: none;">
                <p>Cashback Fee</p>
                <p>$<label id="append_cashback_fee">0.00</label></p>
            </div>
            <div class="p1" id="cart_cashback_order_total" style="display: none;">
                <p>Order Total</p>
                <p>$<label id="append_cashback_order_total">0.00</label></p>
            </div>
            <div class="p1" id="transaction_type" style="display: none;">
                <p>Transaction Type</p>
                <p id="transaction_type_html">Cash</p>
            </div>
            <div class="p1" id="transaction_status" style="display: none;">
                <p>Transaction Status</p>
                <p>
                    <font color="green">Success</font>
                </p>
            </div>
            <div class="p1" id="tendered_amt" style="display: none;">
                <p>Amount Tendered</p>
                <p>
                    <font color="green" id="transaction_tendered">$0.00</font>
                </p>
            </div>
            <div class="p1" id="transaction_return_balance" style="display: none;">
                <p>Return Balance</p>
                <p>
                    <font color="green" id="transaction_return_balance_html">$0.00</font>
                </p>
            </div>
            <div class="p1 coupon_details"></div>
        </div>
        <div class="categories">
            <div class="buttonsContainer">
                <!-- <a class="b1 green card_transaction_popup" href="javascript:;" onclick="Card()"> -->
                <a class="b1 green card_transaction_popup" href="javascript:;" >
                    <div>
                        <p>Card</p>
                    </div>
                </a>
                <a class="b1 green" href="#opencalc" id="opencalc_btn" rel="modal:open">
                    <div>
                        <p> Cash</p>
                    </div>
                </a>
                <a class="b1 green" onClick="opendrawer()" style="display: none;" id="opendrawer_btn" >
                    <div>
                        <p>Refund Cash</p>
                    </div>
                </a>
                <a href="#promo" onclick="Coupon()" class="b1 green" id="couponbtn" style="<?php if(empty($this->session->userdata["admindata"]) && $this->data['coupon'] == 0){echo 'pointer-events:none; opacity:0.5;'; }else{ echo '';} ?>">
                    <div>
                        <p> Coupon</p>
                    </div>
                </a>
                <a href="#discount2" class="b1 green" onclick="Discount()" style="<?php if(empty($this->session->userdata["admindata"]) && $this->data['discount_perm'] == 0){echo 'pointer-events:none; opacity:0.5;'; }else{ echo '';} ?>">
                    <div>
                        <p> Discount</p>
                    </div>
                </a>
                <a href="#cash_login" onclick="CashDrop()" class="b1 green" id='cashdroplaunchbtn' style="<?php if(empty($this->session->userdata["admindata"]) && $this->data['cash_drop'] == 0){echo 'pointer-events:none; opacity:0.5;'; }else{ echo '';} ?>">
                    <div class="b1 green">
                        <p> Cash Drop</p>
                    </div>
                </a>
                <a href="javascript:;" id="cb" class="b1 pos_cashback">
                    <div><p>Cashback</p></div>
                </a>
                <button id="price_override" class="b1 price_override" style="<?php if(empty($this->session->userdata["admindata"]) && $this->data['price_override'] == 0){echo 'pointer-events:none; opacity:0.5;border: none!important'; }else{ echo 'border: none!important';} ?>">
                    <div><p> Price Override</p></div>
                </button>
                <a href="javascript:;" class="b1" id="refund_order_button" style="<?php if(empty($this->session->userdata["admindata"]) && $this->data['refund'] == 0){echo 'pointer-events:none; opacity:0.5;'; }else{ echo '';} ?>">
                    <div>
                        <p> Refund</p>
                     </div>
                </a>
                <a href="#payout" id="payout" class="b1"  onclick="Payout();" style="<?php if(empty($this->session->userdata["admindata"]) && $this->data['payout'] == 0){echo 'pointer-events:none; opacity:0.5;'; }else{ echo '';} ?>">
                   <div> Payout</div>
               </a>
                <a href="javascript:;" onclick="KPIClearTransaction();">
                    <div class="b1 green">
                        <p> Clear</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="catCol">
        <div>
            <div class="serachBar">
                <div class="p-name">
                    <input type="text" class="fff input_new_config " autocomplete="off" id="read_barcode_POS" aria-describedby="emailHelp" placeholder="Enter Product Name/ SKU/ Scan Bar Code">
                    <button style="background: transparent !important;padding: 0px;margin: 5px;border-radius: 2px;" class="btn btn-success smbtn" id="keyboard_OPEN">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"width="50px" height="50px" viewBox="0 0 100.000000 100.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                              <path d="M735 900 c-7 -40 -42 -80 -71 -80 -7 0 -37 -5 -66 -11 -50 -11 -108 -53 -108 -78 0 -19 31 -12 60 13 18 14 48 26 81 30 74 10 107 30 130 79 25 55 25 87 0 87 -15 0 -21 -10 -26 -40z"/>
                              <path d="M25 655 l-25 -24 0 -231 0 -231 25 -24 24 -25 451 0 451 0 24 25 25 24 0 231 0 231 -25 24 -24 25 -451 0 -451 0 -24 -25z m155 -135 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0
                                -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m-660 -120 l0 -40 -70 0 -70 0 0 40 0 40 70 0 70 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0
                                40 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m180 0 l0 -40 -70 0 -70 0 0 40 0 40 70 0 70 0 0 -40z m-720 -120 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0 -40 -40
                                0 -40 0 0 40 0 40 40 0 40 0 0 -40z m360 0 l0 -40 -160 0 -160 0 0 40 0 40 160 0 160 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m120 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z"/>
                            </g>
                        </svg>
                    </button>
                    <button type="button" class='zxc read_barcode_POS_submit ' id="barcodeSiubmit" style="width:25%;"><svg width="100%" height="60%" viewBox="0 0 57 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M55.1306 1V16.2436H3.55194L6.91693 12.7688L5.60832 11.4176L0 17.2088L5.60832 23L6.91693 21.6487L3.55194 18.174H57V1H55.1306Z" fill="white" />
                            <path d="M20.775 11H15.891V3.201H20.775V4.631H17.409V6.413H20.456V7.766H17.409V9.57H20.775V11ZM28.9483 11H27.3533L23.8113 5.467V11H22.2933V3.201H24.1853L27.4303 8.36V3.201H28.9483V11ZM36.468 4.642H34.004V11H32.475V4.642H30.011V3.201H36.468V4.642ZM42.4205 11H37.5365V3.201H42.4205V4.631H39.0545V6.413H42.1015V7.766H39.0545V9.57H42.4205V11ZM47.7889 11L46.2599 7.997H45.4679V11H43.9389V3.201H46.9859C47.7339 3.201 48.3352 3.42833 48.7899 3.883C49.2445 4.33767 49.4719 4.90967 49.4719 5.599C49.4719 6.14167 49.3215 6.611 49.0209 7.007C48.7275 7.39567 48.3242 7.66333 47.8109 7.81L49.4829 11H47.7889ZM45.4679 6.688H46.6999C47.0812 6.688 47.3782 6.589 47.5909 6.391C47.8109 6.193 47.9209 5.93267 47.9209 5.61C47.9209 5.28 47.8109 5.016 47.5909 4.818C47.3782 4.62 47.0812 4.521 46.6999 4.521H45.4679V6.688Z" fill="white" />
                        </svg>
                    </button>

                    <a href="#front-login1" rel="modal:open" id="shifOUT" class="shift" style="width: 34.8%;">
                        Shift Out
                    </a>
                    <div class="mainButton" style='padding:5px;margin:5px;white-space:nowrap;margin-left:0;width: 33%;'>
                        <a href="<?=base_url('cashier')?>" class="link">
                            <p>Main Screen </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="catSec">
                <div class="catop">
                    <div class="catNav">
                        <div class="cm" id='firstCategoryTab' data-cus="0">
                            Miscellaneous Products
                        </div>
                        <?php if(!empty($custome_category)){ foreach($custome_category as $cus){?>
                        <div class="cm custom_cat" data-cus="<?=$cus['id']?>">
                            <?=$cus['name']?>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
                <div class="subCat">
                    <p class='abc'>&nbsp;</p>
                    <div class="flexB1">
                        <?php
                        if (!empty($misceleneous_name)) {
                            foreach ($misceleneous_name as $key => $value) { ?>
                                <div class="cm2 misceleneous_item misceleneous_item_<?php echo $value->id; ?>" data-istaxable="<?php echo $value->is_taxable; ?>" data-productprice="<?php echo $value->product_price; ?>" data-auto_id="<?php echo $value->id; ?>" data-productname="<?php echo $value->product_name; ?>"><?php echo $value->product_name; ?></div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="custSec">
            <div class="flexB2">
                <a onclick="epa();" href="#epa"  id="custom_price"  class="cm3" style="<?php if(empty($this->session->userdata["admindata"]) &&  $this->data['custom_price'] == 0){echo 'pointer-events:none;opacity:0.5;'; }else{ echo '';} ?>">
                    <div>Custom Price</div>
                </a>
                <?php for ($i = 0; $i < 19; $i++) { ?>
                <div data-auto_id="<?php print $setting_detail[$i]['customkey_id'] * ($i+1000); ?>" class="cm3 <?=($setting_detail[$i]['customkey_value']) ? 'misceleneous_item' : ''; ?>" data-istaxable="<?=($setting_detail[$i]['is_taxable']) ? $setting_detail[$i]['is_taxable'] : '0'; ?>" data-productprice="<?=($setting_detail[$i]['customkey_value']) ? $setting_detail[$i]['customkey_value'] : ''; ?>" data-productname="<?= ($setting_detail[$i]['customkey_name']) ? $setting_detail[$i]['customkey_name'] : ''; ?>"><?= ($setting_detail[$i]['customkey_name']) ? $setting_detail[$i]['customkey_name'] : 'Custom Key'; ?></div>
                <?php } ?>
            </div>
        </div>
        <div class="printSec">
            <div class="flexB3 jan_05">

                <a href="#customproduct" id="custom_Product" class="cm4"  onclick="CustomProduct();" style="<?php if(empty($this->session->userdata["admindata"]) &&  $this->data['add_custom_product'] == 0){echo 'text-align:center;pointer-events:none;opacity:0.5;'; }else{ echo 'text-align:center';} ?>">
                    <div class="cm4 myBtn" style="font-size: 20px; width: 100%;">Add Custom Product</div>
                </a>

            </div>
            <div class="flexB3">
                <a href="#save-order" id="saveorderbtn" class="cm4" onclick="openModal();" >
                    <div class="cm4 myBtn">Save Order</div>
                </a>
                <a href="javascript:;" id="recall_order_button" class="cm4">
                    <div class="cm4 myBtn">Recall Order</div>
                </a>
                <a href="#lookup" id="productlookup" class="cm4"  onclick="ProductLookup();">
                    <div class="cm4 myBtn"> Product Lookup</div>
                </a>
                <a href="javascript:;" id="no_sales" class="cm4" style="text-align:center">
                    <div class="cm4 myBtn" style="">No Sales</div>
                </a>
                <a href="#myModalg" id="print_receipt_enable" class="cm4 pur" rel="modal:open"  style="<?php if(empty($this->session->userdata["admindata"]) &&  $this->data['print_receipt'] == 0 ){echo 'pointer-events:none; opacity:0.5;'; }else{ echo '';} ?>">
                    <div>Print/View <br> Receipt</div>
                </a>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .remove_coupon{
        background: red;
        color: #fff;
        font-size: 14px;
        padding: 5px 15px;
    }
    .remove_custom_discount{
        background: red;
        color: #fff;
        font-size: 14px;
        padding: 5px 15px;
    }
    .btn-custom-disable {
        cursor: not-allowed;
        pointer-events: none;
        color: #c0c0c0;
        background-color: #ffffff;
        opacity: 0.5;
    }
</style>

<script src="<?php echo base_url(); ?>assets/cashier/sweetalert@2.1.2/sweetalert.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/core/vendor/jquery-3.4.1.min.js"></script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/$VERSION/dragula.min.js'></script> -->
<script src='<?php echo base_url(); ?>assets/js/dragula.min.js'></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/jquery.modal.min.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery.modal.min.css" />
<script type="text/javascript">
    $(document).ready(function() {

        $(".table-container").scrollTop($(".table-container")[0].scrollHeight);
        $("#read_barcode").focus();
        $("#firstCategoryTab").trigger('click');
    });

$(document).ready(function() {

  var $dragging = null;

  $(document.body).on("mousemove", function(e) {

      if ($dragging) {
          $dragging.offset({
              top: e.pageY,
              left: e.pageX
          });
      }
  });

  $(document.body).on("mousedown", ".dragkeeb", function (e) {
      $dragging = $(".keyboard.numone");
        console.log('widg & he',$(window).width() ,$(window).height() )
  });

  $(document.body).on("mouseup", function (e) {
      $dragging = null;
  });
  function doTouch(e) {
    e.preventDefault();
    var touch = e.touches[0];

//     let r  = touch.pageX;
//   let w = touch.pageY;
//   console.log(r,w,"p's are")
console.log('started')
}
function doTouch2(e) {
    e.preventDefault();
    var touch = e.touches[0];

     let r  = touch.pageX;
   let w = touch.pageY;
  console.log(r,w,"p's are")
  console.log('its moving')
    //   $dragging = $(".keyboard.numone");
    // // console.log('e',e)

    // if ($dragging) {
    //       $dragging.offset({
    //           top: touch.pageX,
    //           left: touch.pageY
    //       });
    //   }
}
function doTouch3(e) {
    e.preventDefault();
    var touch = e.touches[0];

//     let r  = touch.pageX;
//   let w = touch.pageY;
//   console.log(r,w,"p's are")
  console.log('ended touch')
}
document.addEventListener('touchstart', function(e) {
    setTimeout(function() {
        // doTouch(e);

    }, 0);
}, false);
const maxMoveLeft = $(window).width();
const maxMoveRight =$(window).height();
$(document).on('touchstart', '.dragkeeb', function(e) {
    e.preventDefault()
//   var xPos = e.originalEvent.touches[0].pageX;
  $dragging = $(".keyboard.numone");

  console.log('widg & he', maxMoveLeft,maxMoveRight )
//   console.log('xPos',xPos)
});
$(document).on('touchmove', '.keyboard.numone', function(e) {
    e.preventDefault()
  var xPos = e.originalEvent.touches[0].pageX;
  var yPos = e.originalEvent.touches[0].pageY;
  let spaceTaken = $(".keyboard.numone")[0].getBoundingClientRect();
//   if(xPos > spaceTaken.left){
//       console.log('goint out left')
//   }
//   if(yPos > spaceTaken.top){
//       console.log('goint out top')
//   }
  $dragging.offset({
              top: yPos ,
              left:xPos
          });
//   console.log('xPos',xPos,yPos)
});
$(document).on('touchend click', '.cancelkeeb', function(e) {
    $dragging = null;
    e.preventDefault()
    $('.keyboard.numone').hide()
    $('.keyboard.numone').addClass("keyboard--hidden");
    $('.modal').removeClass('moveup');


//   var xPos = e.originalEvent.touches[0].pageX;
//   console.log('xPos',xPos)
});
function resetKeebPosition() {
    $('.keyboard.numone').css('top','unset');
    $('.keyboard.numone').css('left','unset');
          console.log('ths ran')
}
$(document).on('touchend click', '.dragkeeb', function(e) {
    $dragging = null;
    e.preventDefault()
    rect =  $('.keyboard.numone')[0].getBoundingClientRect();

    if((rect.x + rect.width)>window.innerWidth || (rect.y + rect.height)>window.innerHeight){
        resetKeebPosition()
    }

    // $('.keyboard.numone').hide()
    // $('.keyboard.numone').addClass("keyboard--hidden");
    // $('.modal').removeClass('moveup');
//   var xPos = e.originalEvent.touches[0].pageX;
//   console.log('xPos',xPos)
});
// document.addEventListener('touchmove', function(e) {doTouch2(e);}, false);
// document.addEventListener('touchend', function(e) {doTouch3(e);}, false);
//   $(document).on('touchstart', function() {
//     detectTap = true;
//     $dragging = $(".keyboard.numone");
//     console.log('touch set')
//     // Detects all touch events
// });
// $(document).on('touchmove', function(e) {
//     detectTap = false;
//     $dragging = $(".keyboard.numone");
//     // console.log('e',e)
//     console.log($dragging.position.top(),$dragging.position.left(),'top and left')
//     if ($dragging) {
//           $dragging.offset({
//               top: $dragging.position.top()+1,
//               left: $dragging.position.left()+1
//           });
//       }
//     console.log('touch move') // Excludes the scroll events from touch events
// });
// $(document).on('click touchend', function(event) {
//     if (event.type == "click") detectTap = true; // Detects click events
//        if (detectTap){
//         $dragging = null;
//           // Here you can write the function or codes you want to execute on tap
//         console.log('touch ended')
//        }
//  });
});

<?php
    if($this->session->userdata['fontsize'] != "")
        $fontsize = $this->session->userdata['fontsize'];
    else
        $fontsize = 14;
?>

$(function(){
    let fontSize = <?php print $fontsize; ?>;
         fontSize = parseInt(fontSize)/10;
        $('.fontSetting').css("font-size","+="+fontSize);


})
</script>
