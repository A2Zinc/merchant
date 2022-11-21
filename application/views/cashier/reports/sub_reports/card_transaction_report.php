<?php include_once(APPPATH."views/cashier/reports/inc/js_css.php"); ?>
<!-- ST - Card Transaction Report -->
<div class="container content dynamic_font_size" id='card-transaction-report'>
    <div class="row timesheet_report_ajax">
        <div class="col-md-12">
            <div class="h3">Card Transaction Report</div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-3">
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" max="<?php echo date('Y-m-d'); ?>" name="start_date_ct_filter" max="<?php echo date('Y-m-d'); ?>" id="start_date_ct_filter" class="form-control" value="<?php if(!empty($start_date_filter)){ print $start_date_filter; }else{ echo date('Y-m-d'); } ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>End Date</label>
                <input type="date" max="<?php echo date('Y-m-d'); ?>" name="end_date_ct_filter" id="end_date_ct_filter" class="form-control" value="<?php if(!empty($end_date_filter)){ print $end_date_filter; }else{ echo date('Y-m-d'); } ?>">
            </div>
        </div>

        <div class="col-md-1">
            <button class="btn btn-primary btn-dark my-2 mt-4 form-control" id="card_transaction_go" type="button">Go</button>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary btn-dark my-2 mt-4 form-control" id="card_transaction_clear" type="button">Clear Filter</button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary btn-dark mt-4 my-2 form-control" 
            onclick="extendDataTable(tbl_inventory4,'Card Transaction Report')">Export to Email</button>
        </div>
    </div>

    <div class="card_transaction_append shift-header-fix">
        <table class="table table-bordered table-hover" id="tbl_card_transaction" style="width: 100%">
            <thead class="headsec">
                <tr>
                    <th class="text-white">Order ID</th>
                    <th class="text-white">Customer Name</th>
                    <th class="text-white">Retref</th>
                    <th class="text-white">Amount</th>
                    <th class="text-white">Card Type</th>
                    <th class="text-white">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($CardTransactionReport)) {
                        foreach ($CardTransactionReport as $key_ct => $value_ct) {
                            $card_response = json_decode($value_ct['card_response']);
                            $emvTagData = json_decode($card_response->emvTagData);
                ?>
                <tr>
                    <td><?php print $value_ct['order_id']; ?></td>
                    <td><?php print $value_ct['customer_name']; ?></td>
                    <td><?php print !empty($card_response->retref) ? $card_response->retref : "-"; ?></td>
                    <td>$<?php print !empty($card_response->amount) ? $card_response->amount : "0.00"; ?></td>
                    <td><?php print !empty($emvTagData->{'Network Label'}) ? $emvTagData->{'Network Label'} : "-"; ?></td>
                    <td><?php print date("m/d/Y H:i A",strtotime($value_ct['order_date'])); ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>
<!-- EN - Card Transaction Report -->