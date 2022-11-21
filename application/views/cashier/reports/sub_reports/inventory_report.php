<?php include_once(APPPATH."views/cashier/reports/inc/js_css.php"); ?>

<style>
    /* #inventory-report .dt-buttons {
        display: none !important;
    } */
</style>

<div class="container content dynamic_font_size" id='inventory-report'>
    <div class="row">
        <div class="col-md-12">
            <div class="h3">Inventory Report</div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-3">
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" max="<?php echo date('Y-m-d'); ?>" name="start_date_ir_filter" id="start_date_ir_filter" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>End Date</label>
                <input type="date" max="<?php echo date('Y-m-d'); ?>" name="end_date_ir_filter" id="end_date_ir_filter" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>

        <div class="col-md-1">
            <button class="btn btn-primary btn-dark mt-4 my-2 form-control" id="inventory_report_go" type="button">Go</button>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary btn-dark my-2 mt-4 form-control" id="inventory_report_clear" type="button">Clear Filter</button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary btn-dark mt-4 my-2 form-control" 
            onclick="extendDataTable(tbl_inventory8,'Inventory Report')">Export to Email</button>
        </div>
    </div>

    <div id="inventory_report_append">
        <table class="table table-bordered table-hover" id="tbl_inventory_report">
            <thead class="headsec">
                <tr>
                    <th class="text-white">Product Name</th>
                    <th class="text-white">UPC</th>
                    <th class="text-white">Supplier</th>
                    <th class="text-white">Qty</th>
                    <th class="text-white">Sold Qty</th>
                    <th class="text-white">Price</th>
                    <th class="text-white">Promotion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($InventoryReport)) {
                        foreach ($InventoryReport as $key_ir => $value_ir) {
                ?>
                <tr>
                    <td><?php print $value_ir["product_name"]; ?></td>
                    <td><?php print $value_ir["case_UPC"]; ?></td>
                    <td><?php print $value_ir["supplier"]; ?></td>
                    <td><?php print $value_ir["quantity"]; ?></td>
                    <td><?php print ($value_ir["sold_qty"]) ? $value_ir["sold_qty"] : "-"; ?></td>
                    <td>$<?php print $value_ir["onsale_price"]; ?></td>
                    <td>
                        <?php 
                            if($value_ir["store_promotion_price"] != '0') 
                                print "$".$value_ir["store_promotion_price"];
                            else 
                                print '$0.00';
                        ?>                                            
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>