<!-- Modal content -->
<div class="modal-content blue recallmodal">

    <div class="mwrapper w-100" id="">
        <!--  <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a> -->
        <div class="recall-title rftitle pad1 d-flex "> 
            <div class="m-0 w-100">  
                <label for="rf-date">Date:</label>
                <input type="date" id="rf-date" class='w-auto'name="rf-date" max="<?php print date("Y-m-d"); ?>" onchange="refund_order_filter_previous_transaction(this);">                
            </div>
            <a href="#close-modal" rel="modal:close" class="close_previous_transaction"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x x2'></a> 
        </div>
        <div class="recall-con w-100 d-flex">
            <div class="left-recall w-100">
                <div class="left-wrap newleftwrap">
                    <table class="lrc w-100 refund_order_table_previous_transaction">
                        <thead class='sticky-top'>
                            <tr>
                                <th width='10%' style="text-align:left;font-size: 15px;">Id</th>
                                <th width='50%' style="font-size: 15px;">Date</th>
                                <th width='20%' style="font-size: 15px;">No Of Items</th>
                                <th width='10%' style="text-align:left;font-size: 15px;">Amount</th>
                                <th width='10%' style="text-align:left;font-size: 15px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($refund_order)) {
                                    foreach ($refund_order as $key => $value) {                                
                            ?>
                            <tr class='tr refund_order_id' data-order_id="<?php print $value->order_id; ?>" data-auto_order_id="<?php print $value->id; ?>">
                                <td style="text-align:left;font-size: 15px;"><?php print $value->id; ?></td>
                                <td style="text-align:center;font-size: 15px;"><?php print $value->date; ?></td>
                                <td style="text-align:center;font-size: 15px;"><?php print ($value->no_of_item - $value->used_qty); ?></td>
                                <td style="text-align:left;font-size: 15px;"><?php print "$".$value->due_amount; ?></td>
                                <td style="text-align:left;font-size: 15px;"><button class="recall-btn mbtn print_receipt_pr" data-recall_order_id="<?php print $value->order_id; ?>" style="background-color: #16c783; min-height: 30px; color: #FFF; width: 70px;">Print</button>
                                    <button class="recall-btn mbtn view_receipt_pr" data-recall_order_id="<?php print $value->order_id; ?>" style="background-color: #16c783; min-height: 30px; color: #FFF; width: 70px;">View</button></td>
                            </tr>
                            <?php
                                    }
                                } else {
                            ?>
                                <tr class='tr'>
                                    <td colspan="5" style="font-size: 15px;">No Records Found.</td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>
    <div class="actions-row d-flex w-100">
       <a href="#close-modal" rel="modal:close" id="recall_order_modal"><button class="cancel-btn mbtn" style="font-size: 20px;">Cancel</button></a>
       <a href="javascript:;" id="refund_previous_transaction_close" style="margin-left: 120px;"><button class="cancel-btn mbtn" style="background-color: red; font-size: 35px;">🠔</button></a>
    </div>
</div>