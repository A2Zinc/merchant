<div class="rcpt-main" style="border-color: #e8f4ff;">
    <table class="rrc w-100">
        <thead>
            <tr>
                <th style=" border-top-left-radius: 8px; ">QTY</th>
                <th>ITEM</th>
                <th style=" border-top-right-radius: 8px; ">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total_item = 0;
                $sub_total = 0.00;
                if(!empty($product_details)) {
                    foreach ($product_details as $key => $value) {
            ?>
            <tr>
                <td style="text-align:center"><?php print $value->product_qty; ?></td>
                <td><?php print $value->product_name; ?></td>
                <td style="text-align:center; white-space:nowrap;">$ <?php print $value->product_price; ?></td>
            </tr>
            <?php
                    $total_item = $total_item + $value->product_qty;
                    $sub_total = $sub_total + $value->product_price;
                    }
                }
            ?>            
        </tbody>
    </table>
</div>
<div class="total-con coupon-total-con">
    <div class="p1">
        <p>Total Items</p>
        <p id="total_item"><?php print $total_item; ?></p>
    </div>
    <div class="p1">
        <p>Subtotal</p>
        <p id="sub_total">$<?php print $sub_total; ?></p>
    </div>


    <div class="p1">
        <p>Tax</p>
        <p id="tax_html">$<?php print isset($order_details[0]->tax_amount) ? $order_details[0]->tax_amount : "0.00"; ?></p>
    </div>

    <div class="p1">
        <p>Container Deposit</p>
        <p>$<label id="CRV_box"><?php print isset($order_details[0]->container_deposit) ? $order_details[0]->container_deposit : "0.00"; ?></label></p>
    </div>

    <div class="p1" id="discount_div" style="display: none;">
        <p>Discount <span id="applied_coupon"></span></p>
        <p style="color: red;"><span style="color: red;">(-)</span> $<span id="coupon_discount">0.00</span></p>
    </div>

    <div class="p1">
        <p style="color: black;">Total</p>
        <p style="color: black;" id="grand_total">$<?php print isset($order_details[0]->cart_grand_total) ? $order_details[0]->cart_grand_total : "0.00"; ?></p>
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