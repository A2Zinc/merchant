<!-- <span class="close">&times;</span> -->
<div class="mwrapper w-100 recall2modal">
    <!--  <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a> -->
    <div class="recall-title pad1 "> Recall Order</div>
    <div class="recall-con w-100 d-flex"  id="recall_orders">
        <div class="left-recall w-50">
            <label for="rf-date" class='color-black'>Date:</label>
                <input type="date" id="rf-date" class='w-auto' name="rf-date" max="<?php print date("Y-m-d"); ?>" onchange="recall_order_filter(this);" value="<?php echo date("Y-m-d") ?>">
            <div class="left-wrap newleftwrap" id="Recall_table_by_daten">
                <table class="lrc w-100 recall_order_table" id="Recall_table_by_date">
                    <thead>
                        <tr>
                            <th width='10%'>Id</th>
                            <!-- <th width='70%'>Description</th> -->
                            <th width='10%'>Saved Date</th>
                            <th width='10%'>Total Amount</th>
                            <th width='10%'>Action</th>
                        </tr>
                    </thead>
                    <tbody  id="recall_orders">
                        <?php                            
                            if(!empty($recall_order)) {
                                foreach ($recall_order as $key => $value) {
                        ?>
                        <tr class='tr recall_order_id' id="tbl_tr_recall_order" data-recall_order_id="<?php print $value->id; ?>">
                            <td style="text-align:center"><?php print $value->id; ?></td>
                            <!-- <td style="text-align:center"><?php //print $value->order_title; ?></td> -->
                            <td style="text-align:center"><?php print date("m-d-Y",strtotime($value->date_of_save_order)); ?></td>
                            <td style="text-align:center"> $ <?php print $value->main_cart_grand_total; ?></td>
                            <td style="text-align:center"><button class="recall-btn mbtn remove_recall_order" data-recall_order_id="<?php print $value->id; ?>" style="background-color: #d9534f; min-height: 30px; color: #FFF; width: 70px;">Discard</button></td>
                        </tr>
                         <?php
                                    }
                                } else {
                            ?>
                                <tr class='tr'>
                                    <td colspan="4">No Records Found.</td>
                                </tr>
                            <?php
                                }
                           
                        ?>                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="right-recall w-50">
            <div class="rcpt-wrapper product_order_details_append">

            </div>
        </div>
    </div>
</div>
<div class="actions-row d-flex w-100">
    <a href="#close-modal" rel="modal:close" id="recall_order_modal"><button class="cancel-btn mbtn">Cancel</button></a><button class="recall-btn mbtn btn-custom-disable order_recall" data-recall_order_id="">Recall</button>
</div>