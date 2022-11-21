<div class="rcpt-main">
    <table class="rrc w-100">
        <thead>
            <tr>
                <th style=" border-top-left-radius: 8px; ">
                    <div class=""><input type='checkbox' class='master-check refundCheck2 refundCheckAll'/>QTY</div>
                </th>
                <th>ITEM</th>
                <th style=" border-top-right-radius: 8px; ">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total_item        = 0;
                $sub_total         = 0;
                $grand_total       = 0;
                $tax_amount        = 0;
                $container_deposit = 0;
                $discount=           0;
                // echo $order_details[0]->total_reedem_remain;
                // echo $order_details[0]->used_redeem;
                $reedem_discount=    $order_details[0]->total_reedem_remain-$order_details[0]->used_redeem;
                if(!empty($order_details)) {
                    foreach ($order_details as $key => $value) {

                        $discount_discount  =$value->discount_discount;
                        $discount         = $discount + $value->discount*$value->quantity;
                        $total_item         = $total_item + $value->quantity;
                        $grand_total        = $value->total_amount;
                        $tax_amount         = $value->tax_amount;
                        $container_deposit  = $value->container_deposit;
                        $sub_total          = $sub_total+$value->total_price;
                        $case_UPC           = $value->case_UPC;
                        $used_qty           = $value->used_qty;
                        $Applicable_Tax=$value->is_taxable;
            ?>
            <tr <?php if(($value->quantity - $used_qty) == 0 || $value->total_price<0) { ?> style="background: #d2d2d2 !important;" <?php } ?>>
                <td style="text-align:center; width: 60px;">
                    <?php if(($value->quantity - $used_qty) != 0 &&  $value->total_price>0) { ?>
                    <input type='checkbox' id="upc_<?php print $case_UPC; ?>" name="refund_order_id[]" class='refundCheck' value="<?php print $value->order_details_id; ?>" data-rate="<?php print $value->rate; ?>" data-discount-discount="<?php print $value->discount_discount; ?>" data-discount="<?php print $value->discount; ?>"  data-product_name="<?php print $value->product_name; ?>" data-applicable_crv="<?php print $value->Applicable_CRV; ?>" data-applicable_tax="<?php print $Applicable_Tax; ?>" data-size="<?php print $value->size; ?>" data-total_qty="<?php echo $value->quantity ?>" data-order_id="<?php print $value->order_id; ?>" />
                    <input type="hidden" value="<?php echo $value->product_container_deposit ?>" id="crv_amount_<?php print $value->order_details_id; ?>">
                    <select style="width: auto;" class="refund_quantity_input" id="refund_quantity_input_<?php print $value->order_details_id; ?>">
                        <?php for($i=1;$i<=($value->quantity - $used_qty);$i++) { ?>
                        <option value="<?php print $i; ?>" <?php if(($value->quantity - $used_qty) == $i) print "selected"; ?>><?php print $i; ?></option>
                        <?php } ?>
                    </select>
                    <?php } else { ?>
                    -
                    <?php } ?>
                </td>
                <td><?php print $value->product_name; ?></td>
                <td style="text-align:center">$<?php print number_format($value->total_price, 2, '.', ''); ?></td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>        
    </table>
</div>

<div class="total-con coupon-total-con">
    <div class="p1">
        <p style="font-size: 18px;">Total Items</p>
        <p style="font-size: 18px;" id="total_item"><?php print $total_item; ?></p>
    </div>
    <div class="p1">
        <p style="font-size: 18px;">Subtotal</p>
        <p  style="font-size: 18px;" id="sub_total">$<?php print number_format($sub_total, 2, '.', ''); ?></p>
    </div>
    <div class="p1">
        <p style="font-size: 18px;">Tax</p>
        <p style="font-size: 18px;" id="tax_html">$<?php print $tax_amount; ?></p>
    </div>
    <div class="p1">
        <p style="font-size: 18px;" >Container Deposit</p>
        <p>$<label id="CRV_box" style="font-size: 18px;" ><?php print $container_deposit; ?></label></p>
    </div>

    <?php if($discount>0){ ?>
    <div class="p1">
        <p style="font-size: 18px;" >Coupon Discount</p>
        <p>$<label id="c_discount" style="font-size: 18px;" >(-)<?php print number_format($discount,2,'.',''); ?></label></p>
    </div>
    <?php } ?>
    <input type="hidden" id="reedem_discount_remain" name="reedem_discount_remain" value="<?php print number_format($reedem_discount,2,'.',''); ?>" >
    <?php if($order_details[0]->total_reedem_remain>0){ ?> 
    <div class="p1">
        <p style="font-size: 18px;" >Reedem Point Discount</p>
        <p>$<label id="r_discount" style="font-size: 18px;" >(-)<?php print number_format($order_details[0]->total_reedem_remain,2,'.',''); ?></label></p>
    </div>
    <?php } ?>

    <?php if($order_details[0]->discount_discount>0){ ?> 
    <div class="p1">
        <p style="font-size: 18px;" >Custom Discount</p>
        <p>$<label id="r_discount" style="font-size: 18px;" >(-)<?php print number_format($order_details[0]->discount_discount,2,'.',''); ?></label></p>
    </div>
    <?php } ?>

    

    <div class="p1" id="discount_div" style="display: none;">
        <p>Discount <span id="applied_coupon"></span></p>
        <p style="color: red;"><span style="color: red;">(-)</span> $<span id="coupon_discount">0.00</span></p>
    </div>
    <div class="p1">
        <p style="color: black;">Total</p>
        <p style="color: black;" id="grand_total">$<?php
          $grand_total=$tax_amount+$sub_total+ $container_deposit-$discount-$order_details[0]->total_reedem_remain-$order_details[0]->discount_discount;
         print number_format($grand_total, 2, '.', ''); ?></p>
    </div>
    <div class="p1" id="transaction_type" style="display: none;">
        <p>Transaction Type</p>
        <p>Cash</p>
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

<div class="btn-row-refund w-100 text-center">
    <?php /* <a href="#refund-second2" rel="modal:open"><button class="recall-btn mbtn btn-custom-disable order_refund">Refund</button></a> */ ?>
    <a href="javascript:;"><button class="recall-btn mbtn btn-custom-disable order_refund" data-order_id="">Refund</button></a>

    <a  href="javascript:;"><button class="print_receipt_return_pr recall-btn mbtn order_print" data-recall_order_id="<?php echo $order_details[0]->order_id ?>">Print</button></a>
</div>