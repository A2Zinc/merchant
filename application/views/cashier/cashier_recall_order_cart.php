<input type="hidden" name="exist_product_id" id="exist_product_id" value="<?php print $order_details[0]->exist_product_id; ?>">
<input type="hidden" name="main_cart_grand_total" id="main_cart_grand_total" value="<?php print $order_details[0]->main_cart_grand_total; ?>">
<input type="hidden" name="cart_grand_total" id="cart_grand_total" value="<?php print $order_details[0]->cart_grand_total; ?>">
<input type="hidden" name="container_deposit" id="container_deposit" value="<?php print $order_details[0]->container_deposit; ?>">
<input type="hidden" name="db_return_balance" id="db_return_balance">
<input type="hidden" name="tax_amount" id="tax_amount" value="<?php print $order_details[0]->tax_amount; ?>">
<input type="hidden" name="walk_in_customer_name" id="walk_in_customer_name" value="<?php print $order_details[0]->walk_in_customer_name; ?>">
<input type="hidden" name="walk_in_customer_id" id="walk_in_customer_id" value="<?php print $order_details[0]->walk_in_customer_id; ?>">
<input type="hidden" name="is_transaction_completed" id="is_transaction_completed" value="0">
<input type="hidden" name="exist_coupon" id="exist_coupon" value="<?php print $order_details[0]->exist_coupon; ?>">
<input type="hidden" name="exist_promotion" id="exist_promotion" value="<?php print $order_details[0]->exist_promotion; ?>">
<input type="hidden" name="coupon_discount_total" id="coupon_discount_total" value="<?php print $order_details[0]->coupon_discount_total; ?>">
<input type="hidden" name="custom_discount_total" id="custom_discount_total" value="<?php print $order_details[0]->custom_discount_total; ?>">
<input type="hidden" name="recall_order_id" id="recall_order_id" value="<?php print $recall_order_id; ?>">

<input type="hidden" name="refund_exist_product_id" id="refund_exist_product_id">
<input type="hidden" name="is_scan_refund_order" id="is_scan_refund_order" value="0"> 
<input type="hidden" name="is_age_verified" id="is_age_verified" value="0">
<input type="hidden" name="barcode_product_before_age_verify" id="barcode_product_before_age_verify" value="">

<input type="hidden" name="is_cashback" id="is_cashback" value="0">
<input type="hidden" name="cashback_fee" id="cashback_fee" value="0">
<!-- <input type="hidden" name="cashback_amount" id="pos_cashback_amount" value="0"> -->
<input type="hidden" name="cashback_amount" id="pos_cashback_amount" value="0"> <!--prashant change-->
<input type="hidden" name="exist_redeem_points" id="exist_redeem_points" value="0">
<input type="hidden" name="used_redeem_points" id="used_redeem_points" value="0">

<input type="hidden" name="outbound_point_main" id="outbound_point_main" value="0">
<input type="hidden" name="outbound_point_amount_main" id="outbound_point_amount_main" value="0">

<input type="hidden" name="redeem_points_discount" id="redeem_points_discount" value="0">
<input type="hidden" name="cashdrawer_amt" id="cashdrawer_amt" value="">
<input type="hidden" name="cashback_note" id="cashback_note" value="">
<input type="hidden" name="cashback_note" id="price_override_click" value="0">


<?php
    if(!empty($product_details)) {
        foreach ($product_details as $key => $value) {
        
        $product_id = isset($value->product_id) ? $value->product_id : 0;
?>
<tr id="product_tr_<?php print $product_id; ?>">
    <td style="text-align: left;padding-left: 7px;"><?php print isset($value->product_name) ? $value->product_name : ""; ?></td>
    <input type="hidden" name="product_id[]" value="<?php print $product_id; ?>">
    <input type="hidden" name="product_name[]" value="<?php print isset($value->product_name) ? $value->product_name : ""; ?>">
    <input type="hidden" name="product_base_rate[]" id="product_base_rate_<?php print $product_id; ?>" value="<?php print isset($value->product_rate) ? $value->product_rate : "0.00"; ?>">
    <input type="hidden" name="product_rate[]" value="<?php print isset($value->product_rate) ? $value->product_rate : "0.00"; ?>">
    <input type="hidden" id="product_price_<?php print $product_id; ?>" name="product_price[]" value="<?php print isset($value->product_price) ? $value->product_price : "0.00"; ?>">
    <input type="hidden" id="product_offer_price_<?php print $product_id; ?>" name="product_offer_price[]" value="<?php print isset($value->product_offer_price) ? $value->product_offer_price : "0.00"; ?>">
    <input type="hidden" id="product_qty_<?php print $product_id; ?>" name="product_qty[]" value="<?php print isset($value->product_qty) ? $value->product_qty : ""; ?>">
    <input type="hidden" id="product_crv_<?php print $product_id; ?>" name="product_crv[]" value="<?php print isset($value->product_crv) ? $value->product_crv : ""; ?>">

    <input type="hidden" id="product_inventory_qty_<?php print $product_id; ?>" name="product_inventory_qty_[]" value="<?php print isset($value->product_inventory_qty) ? $value->product_crv : ""; ?>">

    <input type="hidden" id="product_reorder_level_<?php print $product_id; ?>" name="product_reorder_level_[]" value="<?php print isset($value->product_reorder_level) ? $value->product_crv : ""; ?>">

    <input type="hidden" id="is_product_EBT_<?php print $product_id; ?>" name="is_product_EBT[]" value="1">


    <?php if(isset($value->is_product_crv) && $value->is_product_crv != "undefined") { ?>
        <input type="hidden" id="is_product_crv_<?php print $product_id; ?>" name="is_product_crv[]" data-product_unit="Pack of 12" value="<?php print $value->is_product_crv; ?>">
    <?php } else { ?>
        <input type="hidden" id="is_product_crv_<?php print $product_id; ?>" name="is_product_crv[]" data-product_unit="Pack of 12" value="0">
    <?php } ?>

    <input type="hidden" id="is_product_size_<?php print $product_id; ?>" name="is_product_size[]" value="<?php print isset($value->is_product_size) ? $value->is_product_size : ""; ?>">
   <!--  <input type="hidden" class="is_texable" id="is_texable_<?php print $product_id; ?>" name="is_texable[<?php print $product_id; ?>]" value="<?php print isset($value->is_texable) ? $value->is_texable : ""; ?>"> -->

    <input type="hidden" class="is_texable" id="is_texable_<?php print $product_id; ?>" name="is_texable[]" value="<?php print isset($value->is_texable) ? $value->is_texable : ""; ?>">

    <input type="hidden" name="is_price_override[]" data-proid="2" class="is_price_override" id="is_price_override_<?php print $product_id; ?>" value="<?php print isset($value->is_price_override) ? $value->is_price_override : "0"; ?>">
    <input type="hidden" name="price_override_original[]" id="price_override_original_<?php print $product_id; ?>" value="<?php print isset($value->override_orignal_rate) ? $value->override_orignal_rate : "0.00"; ?>">
    <input type="hidden" name="price_override_new[]" id="price_override_new_<?php print $product_id; ?>" value="<?php print isset($value->product_rate) ? $value->product_rate : "0.00"; ?>">

    <input type="hidden" class="is_scratchable" id="is_scratchable_<?php print $product_id; ?>" name="is_scratchable[]" value="0">
    
    <input type="hidden" class="" id="pos_combo_detail_<?php print $product_id; ?>" name="pos_combo_detail[]" value="">

    <input type="hidden" class="" id="pos_combo_detail_<?php print $product_id; ?>" name="pos_combo_detail[]" value="">

    <td>
        <div class="plusMinusContainer">
            <span class="minus_icon reduced" data-id="<?php print $product_id; ?>" style="position: absolute; cursor: pointer; top: 50%; transform: translateY(-50%); height: -webkit-fill-available; background: red; left: 10%; width: 25%;"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 25" fill="none"><mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="11" width="14" height="3"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 13.5417H5V11.4584H19V13.5417Z" fill="white"></path></mask> <g mask="url(#mask0)"> <rect x="-13" y="-13.5416" width="50" height="52.0833" fill="white"></rect> <mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="-13" y="-14" width="50" height="53"> <rect x="-13" y="-13.5416" width="50" height="52.0833" fill="white"></rect> </mask><g mask="url(#mask1)"></g></g> </svg></span>
            <input type="text" class="quantity_input" onfocus="this.blur()" readonly="readonly" data-org_price="<?php print isset($value->product_rate) ? $value->product_rate : "0.00"; ?>" id="quantity_input_<?php print $product_id; ?>" value="<?php print isset($value->product_qty) ? $value->product_qty : 1; ?>" style="position: absolute;left: 50%;transform: translateX(-50%);width:14%; overflow:visible; border: 0px solid;background:transparent; text-align: center;font-size:1.6vw;margin:0 auto;">
            <span class="plus_icon increase" data-id="<?php print $product_id; ?>" style="position: absolute;cursor: pointer;top: 50%;width: 25%; height: -webkit-fill-available;right: 10%;transform: translateY(-50%);background: green;"><svg xmlns="http://www.w3.org/2000/svg" width="60%" height="-webkit-fill-available;" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="white"></path></svg></span>
        </div>
    </td>
    <td class="rightTextAlign">
        <span class='onsale_price_"+product_id+"'>
        <?php if(isset($value->is_price_override) && $value->is_price_override==1){ ?>
            <strike class='onsale_strike_price_" +product_id +"' style='color:red;'>$<?php  echo $value->product_orignal_price ?></strike><br>
        <?php 
        }  print isset($value->product_price) ? $value->product_price : "0.00"; ?></span></td>
</tr>
<?php
        }
    }
?>
