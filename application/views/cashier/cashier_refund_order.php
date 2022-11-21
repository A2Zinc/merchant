<!-- Modal content -->
<div class="modal-content blue  recallmodal" style="padding: 10px;">
<a href="#close-modal" rel="modal:close" class="refund-close-new"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x x2'></a>
    <div class="mwrapper w-100">
        <button class="recall-btn mbtn refund_tab_button" data-type="custom_product" style="width: 200px;font-size:20px;">Custom Refund</button>
        <button class="cancel-btn mbtn refund_tab_button" data-type="refund_by_product" style="width: 200px;font-size:20px;">Refund By Receipt</button>
        <button class="cancel-btn mbtn refund_tab_button" data-type="refund_history" style="width: 200px;font-size:20px;     float: right;">Refund History</button>
    </div>


    <div class="mwrapper w-100" id="custom_product">

        <div class="recall-title rftitle  d-flex ">
            <div class="m-0 w-100">
                <input type="number" onclick ="handleonfocus()"  id="read_barcode_pos_refund_cp" class='w-auto use-keyboard-input-num ' name="read_barcode_pos_refund_cp" placeholder="UPC/ Scan" style="width: 23.55%;margin: 0;border: 1px solid lightgray;font-size:20px">
            </div>

            <!-- <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x x2'></a>  -->
        </div>
        <div class="recall-con w-100 d-flex">
            <div class="right-recall w-50" style="width:100%;">
                <div class="rcpt-wrapper refundwrap refund_order_detail_append_cp"></div>
                <div class="rcpt-wrapper refundwrap refund_order_detail_scan_append_cp" style="display: none;">
                    <div class="rcpt-main">
                        <table class="rrc w-100">
                            <thead>
                                <tr>
                                    <th style=" border-top-left-radius: 8px;     width: 25%;">
                                        <div class="" style="font-size:20px;"><input type='checkbox' class='master-check refundCheck2 refundCheckAll' style="transform: scale(1.5);
    position: relative;
    left: 10px;
    top: 3px;"/>QTY</div>
                                    </th>
                                    <th style="font-size:20px;">ITEM</th>
                                    <th style=" border-top-right-radius: 8px; font-size:20px;">Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_refund_order_detail_scan_append_cp"></tbody>
                        </table>
                    </div>

                    <div class="total-con coupon-total-con">
                        <div class="p1">
                            <p style="font-size: 18px;" >Total Items</p>
                            <p style="font-size: 18px;" id="refund_total_item"><?php print $total_item; ?></p>
                        </div>
                        <div class="p1">
                            <p style="font-size: 18px;" >Subtotal</p>
                            <p style="font-size: 18px;" id="refund_sub_total">$<?php print $sub_total; ?></p>
                        </div>
                        <div class="p1">
                            <p style="font-size: 18px;">Tax</p>
                            <p style="font-size: 18px;" id="refund_tax_html">$<?php print $tax_amount; ?></p>
                        </div>
                        <div class="p1">
                            <p style="font-size: 18px;" >Container Deposit</p>
                            <p>$<label id="refund_CRV_box" style="font-size: 18px;"><?php print $container_deposit; ?></label></p>
                        </div>
                        <div class="p1">
                            <p style="color: black;font-size:18px;">Total</p>
                            <p style="color: black;font-size:18px;" id="refund_grand_total">$<?php print $grand_total ?></p>
                        </div>
                        <div class="p1 coupon_details"></div>
                    </div>

                    <div class="btn-row-refund w-100 text-center">
                      <!--   <a href="#refund-second2" rel="modal:open"><button class="recall-btn mbtn btn-custom-disable order_refund">Refund</button></a> -->
                        <button class="recall-btn mbtn complete_refund" style="font-size: 20px;width: 200px;">Complete Refund</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mwrapper w-100" id="refund_by_product" style="display: none;">
        <!--  <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a> -->
        <div class="recall-title rftitle  d-flex ">
            <div class="m-0 w-100">
                <label for="rf-date">Date:</label>
                <input type="date" id="rf-date" style=" font-size:20px;" class='w-auto'name="rf-date" max="<?php print date("Y-m-d"); ?>" onkeydown="take(event);" onblur="refund_order_filter(this);" onchange="runthis(this);">
                <input type="text" id="read_barcode_pos_refund" class='w-auto' name="read_barcode_pos_refund" placeholder="UPC/ Scan" style="width: 20%;opacity: 0.5; font-size:20px;" disabled="">
            </div>

            <!-- <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x x2'></a>  -->
        </div>
        <div class="recall-con w-100 d-flex">
            <div class="left-recall w-50">
                <div class="left-wrap newleftwrap">
                    <table class="lrc w-100 refund_order_table">
                        <thead class='sticky-top'>
                            <tr>
                                <th width='10%' style="text-align:left">Id</th>
                                <th width='60%'>Date</th>
                                <th width='60%'>Transaction Type</th>
                                <th width='20%'>No Of Items</th>
                                <th width='10%' style="text-align:left">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($refund_order)) {
                                    foreach ($refund_order as $key => $value) {
                            ?>
                            <tr class='tr refund_order_id' data-order_id="<?php print $value->order_id; ?>" data-auto_order_id="<?php print $value->id; ?>">
                                <td style="text-align:left; "><?php print $value->id; ?></td>
                                <td style="text-align:center; "><?php print $value->date; ?></td>
                                <td style="text-align:center; ">
                                    <?php if($value->is_cash_card==2){
                                        echo "Card";
                                    } else {
                                        echo "Cash";
                                    } ?>
                                </td>
                                <td style="text-align:center; "><?php print ($value->no_of_item - $value->used_qty); ?></td>
                                <!-- <td style="text-align:left"><?php print "$".$value->due_amount; ?></td> -->
                                <td style="text-align:left; "><?php print "$".number_format($value->due_amount, 2, '.', '');; ?></td>
                            </tr>
                            <?php
                                    }
                                } else {
                            ?>
                                <tr class='tr'>
                                    <td colspan="4" style=" font-size:20px;">No Records Found.</td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="right-recall w-50">
                <div class="rcpt-wrapper refundwrap refund_order_detail_append"></div>
                <div class="rcpt-wrapper refundwrap refund_order_detail_scan_append" style="display: none;">
                    <div class="rcpt-main">
                        <table class="rrc w-100">
                            <thead>
                                <tr>
                                    <th style=" border-top-left-radius: 8px; ">
                                        <div class=""><input type='checkbox' class='master-check refundCheck2 refundCheckAll'/>QTY</div>
                                    </th>
                                    <th>ITEM</th>
                                    <th style=" border-top-right-radius: 8px; ">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_refund_order_detail_scan_append"></tbody>
                        </table>
                    </div>

                    <div class="total-con coupon-total-con">
                        <div class="p1">
                            <p style="font-size: 18px;" >Total Items</p>
                            <p style="font-size: 18px;"  id="refund_total_item"><?php print $total_item; ?></p>
                        </div>
                        <div class="p1">
                            <p style="font-size: 18px;" >Subtotal</p>
                            <p style="font-size: 18px;"  id="refund_sub_total">$<?php print $sub_total; ?></p>
                        </div>
                        <div class="p1">
                            <p style="font-size: 18px;" >Tax</p>
                            <p style="font-size: 18px;"  id="refund_tax_html">$<?php print $tax_amount; ?></p>
                        </div>
                        <div class="p1">
                            <p style="font-size: 18px;" >Container Deposit</p>
                            <p>$<label  style="font-size: 18px;" id="refund_CRV_box"><?php print $container_deposit; ?></label></p>
                        </div>
                        <div class="p1">
                            <p style="color: black;">Total</p>
                            <p style="color: black;" id="refund_grand_total">$<?php print $grand_total ?></p>
                        </div>
                        <div class="p1 coupon_details" style="font-size: 18px;"></div>
                    </div>

                    <div class="btn-row-refund w-100 text-center">
                        <?php /* <a href="#refund-second2" rel="modal:open"><button class="recall-btn mbtn btn-custom-disable order_refund">Refund</button></a> */ ?>
                        <a href="javascript:;"><button class="recall-btn mbtn btn-custom-disable order_refund">Refund</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mwrapper w-100" id="refund_history" style="display: none;">
        <!--  <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a> -->
                <style type="text/css">
            #refund_history button.recall-btn.mbtn.order_refund {
                display: none;
            }
            #refund_history .refundCheck, #refund_history input.master-check.refundCheck2.refundCheckAll {
                display: none;
            }
        </style>


        <div class="recall-con w-100 d-flex">
            <div class="left-recall w-50">
                <div class="left-wrap newleftwrap">

                    <table class="lrc w-100 refund_order_table">
                        <thead class='sticky-top'>
                            <tr>
                                <th width='10%' style="text-align:left">Id</th>
                                <th width='60%'>Date</th>
                                <th width='20%'>No Of Items</th>
                                <th width='10%' style="text-align:left">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($refund_order_history)) {
                                    foreach ($refund_order_history as $key => $value) {
                            ?>
                            <tr class='tr refund_order_id' data-order_id="<?php print $value->order_id; ?>" data-auto_order_id="<?php print $value->id; ?>">
                                <td style="text-align:left; "><?php print $value->id; ?></td>
                                <td style="text-align:center; "><?php print $value->date; ?></td>
                                <td style="text-align:center; "><?php print ($value->no_of_item - $value->used_qty); ?></td>
                                <!-- <td style="text-align:left"><?php print "$".$value->due_amount; ?></td> -->
                                <td style="text-align:left; "><?php print "$".number_format($value->due_amount, 2, '.', '');; ?></td>
                            </tr>
                            <?php
                                    }
                                } else {
                            ?>
                                <tr class='tr'>
                                    <td colspan="4" style=" font-size:20px;">No Records Found.</td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="right-recall w-50">
                <div class="rcpt-wrapper refundwrap refund_order_detail_append"></div>
                <div class="rcpt-wrapper refundwrap refund_order_detail_scan_append" style="display: none;">
                    <div class="rcpt-main">
                        <table class="rrc w-100">
                            <thead>
                                <tr>
                                    <th style=" border-top-left-radius: 8px; ">
                                        <div class=""><input type='checkbox' class='master-check refundCheck2 refundCheckAll'/>QTY</div>
                                    </th>
                                    <th>ITEM</th>
                                    <th style=" border-top-right-radius: 8px; ">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_refund_order_detail_scan_append"></tbody>
                        </table>
                    </div>

                    <div class="total-con coupon-total-con">
                        <div class="p1">
                            <p style="font-size: 18px;" >Total Items</p>
                            <p style="font-size: 18px;"  id="refund_total_item"><?php print $total_item; ?></p>
                        </div>
                        <div class="p1">
                            <p style="font-size: 18px;" >Subtotal</p>
                            <p style="font-size: 18px;"  id="refund_sub_total">$<?php print $sub_total; ?></p>
                        </div>
                        <div class="p1">
                            <p style="font-size: 18px;" >Tax</p>
                            <p style="font-size: 18px;"  id="refund_tax_html">$<?php print $tax_amount; ?></p>
                        </div>
                        <div class="p1">
                            <p style="font-size: 18px;" >Container Deposit</p>
                            <p>$<label  style="font-size: 18px;" id="refund_CRV_box"><?php print $container_deposit; ?></label></p>
                        </div>
                        <div class="p1">
                            <p style="color: black;">Total</p>
                            <p style="color: black;" id="refund_grand_total">$<?php print $grand_total ?></p>
                        </div>
                        <div class="p1 coupon_details" style="font-size: 18px;"></div>
                    </div>

                    <div class="btn-row-refund w-100 text-center">
                        <?php /* <a href="#refund-second2" rel="modal:open"><button class="recall-btn mbtn btn-custom-disable order_refund">Refund</button></a> */ ?>
<!--                         <a href="javascript:;"><button class="recall-btn mbtn btn-custom-disable order_refund">Refund</button></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="actions-row d-flex w-100">
       <a href="#close-modal" rel="modal:close" id="recall_order_modal"><button class="cancel-btn mbtn" style="font-size: 20px;">Cancel</button></a>
    </div>
</div>
<script>
    function handleonfocus(){
        Keyboard.init();
        KeyboardNum.open();
    }
    // $('#read_barcode_pos_refund_cp').focus(function() {
    //     // $('#read_barcode_pos_refund_cp').focus();
    //      $('#read_barcode_pos_refund_cp').addClass('use-keyboard-input');
    //     KeyboardNum.open();
    //     // Keyboard.init();
    // });
</script>
