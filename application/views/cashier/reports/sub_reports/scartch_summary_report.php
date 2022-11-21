<?php include_once(APPPATH."views/cashier/reports/inc/js_css.php"); ?>
<div class="container content dynamic_font_size" id='scartch-summary'>
    
    <div class="row">
        <div class="col-md-12">
            <div class="h3">Scratcher Sales Report <?php print date("m/d/Y"); ?></div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-3">
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date("Y-m-d"); ?>" name="start_date_sis_filter" id="start_date_sis_filter" class="form-control" >
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>End Date</label>
                <input type="date" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date("Y-m-d"); ?>" name="end_date_sis_filter" id="end_date_sis_filter" class="form-control" >
            </div>
        </div>

        <div class="col-md-1">
            <button class="btn btn-primary btn-dark my-2 mt-4 form-control" id="scratcher_inventory_summary_go" type="button">Go</button>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary btn-dark my-2 mt-4 form-control" id="scratcher_inventory_summary_clear" type="button">Clear Filter</button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary btn-dark mt-4 my-2 form-control" 
            onclick="extendDataTable(tbl_inventory6,'Scratcher Sales Report')">Export to Email</button>
        </div>

    </div>


    <div id="scratcher_inventory_summary_append">
        <table class="table table-bordered table-hover" id="tbl_scratcher_inventory_summary" style="width:100%">
            <thead class="headsec">
                <tr>
                    <th class="text-white">Store ID</th>
                    <th class="text-white">Scratcher UPC</th>
                    <th class="text-white">Scratcher Name</th>
                    <th class="text-white">Bin ID</th>
                    <th class="text-white">Qty Sold</th>
                    <th class="text-white">Current Qty</th>
                    <th class="text-white">Current Scratcher ID</th>
                    <!-- Store ID, Scratcher UPC, Scratcher Name, Bin ID, Qty Sold, Current Qty, Current Scratcher ID -->
                    <!-- <th class="text-white">Store ID</th>
                    <th class="text-white">Bin ID#</th>
                    <th class="text-white">Scratcher Price</th>
                    <th class="text-white">Total Qty</th>
                    <th class="text-white">Sold Qty</th>
                    <th class="text-white">Remaining Qty</th>
                    <th class="text-white">Current Scratcher ID</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($ScratcherInventory)) {
                        foreach ($ScratcherInventory as $key_si => $value_si) {

                            $tot_qty    = $value_si["qty"];
                            $sold_qty   = $value_si["sold_qty"];
                            $remain_qty = $tot_qty - $sold_qty;
                            $scracher_current_no   = $value_si["scracher_current_no"];

                ?>
                <tr>
                    <td><?php print $value_si["store_id"]; ?></td>
                    <td><?php print $value_si["scratcher_upc"]; ?></td>
                    <td><?php print $value_si["scratcher_name"]; ?></td>
                    <td><?php print $value_si["bin_id"]; ?></td>
                    <td><?php if($sold_qty != "") print $sold_qty; else print "-"; ?></td>
                    <td><?php if($remain_qty != "") print $remain_qty; else print "-"; ?></td>
                    <td><?php if($scracher_current_no != "") print $scracher_current_no; else print "-"; ?></td>



                    <?php /* <td>$<?php print $value_si["scratcher_price"]; ?></td>
                    <td><?php print $tot_qty; ?></td>
                    <td><?php if($sold_qty != "") print $sold_qty; else print "-"; ?></td>
                    <td><?php if($remain_qty != "") print $remain_qty; else print "-"; ?></td>
                    <td><?php print $value_si["scratcher_upc"]; ?></td> */ ?>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>