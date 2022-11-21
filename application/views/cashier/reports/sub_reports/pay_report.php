<?php include_once(APPPATH."views/cashier/reports/inc/js_css.php"); ?>
<div class="row content dynamic_font_size" id='pay-report'>
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-3 ml-4">
                    <div class="form-group">
                        <label>Payout Reports</label>
                        <select aria-label="Default select example" class="form-control" name="payout_summary_type" id="payout_summary_type">
                            <option value="s">Scratcher Payout Summary</option>
                            <option value="e">Employee Payout Summary</option>
                            <option value="v">Vendor Payout Summary</option>
                            <option value="l">Lotto Payout Summary</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2 pl-0 pr-0">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date_filter" max="<?php echo date('Y-m-d'); ?>" id="start_date_filter" class="form-control" value="<?php if(!empty($start_date_filter)){ print $start_date_filter; }else{ echo date('Y-m-d'); } ?>">
                    </div>
                </div>
                <div class="col-md-2 pl-0 pr-0 ml-3">
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" name="end_date_filter" max="<?php echo date('Y-m-d'); ?>" id="end_date_filter" class="form-control" value="<?php if(!empty($end_date_filter)){ print $end_date_filter; }else{ echo date('Y-m-d'); } ?>">
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-dark my-2 my-sm-0 form-control" id="payout_reports_go" type="button">Go</button>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-dark my-2 my-sm-0 form-control" id="payout_reports_clear" type="button">Clear Filter</button>
                    </div>
                </div>
            </div>

            <div class="col-md-12" id="lotto_payout_summary" style="display: none;">
                <div class="container table-responsive py-5 shift-header-fix" id="tbl_lotto_payout_append">

                    <table class="table table-sm cell-border" id="tbl_lotto_payout" style="width:100%">
                        <thead class="headsec">
                            <tr>
                                <th class="text-white">Payout Date</th>
                                <th class="text-white">Time</th>
                                <th class="text-white">Lotto Name</th>                                
                                <th class="text-white">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($PayoutSummary["LottoPayout"])) {
                                    $tot_payout = 0;
                                    foreach ($PayoutSummary["LottoPayout"] as $key_ps => $value_ps) {
                                        $tot_payout = $tot_payout + $value_ps["payout_amount"];
                            ?>
                            <tr>
                                <td><?php print date("m/d/Y",strtotime($value_ps["cash_out_date"])); ?></td>
                                <td><?php print date("H:i",strtotime($value_ps["cash_out_date"])); ?></td>
                                <td><?php print $value_ps["lotto_name"]; ?></td>
                                <td>$<?php print $value_ps["payout_amount"]; ?></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                    <?php if(!empty($PayoutSummary["LottoPayout"])) { ?>
                    <table class="table table-bordered table-hover" style="width:100%; margin-top: 10px;">
                        <tbody>
                            <tr class="bg-green">
                                <td colspan="6">Total Payout:&nbsp;&nbsp;&nbsp;$<?php print number_format($tot_payout,2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>

                </div>
            </div>

            <div class="col-md-12" id="scratcher_payout_summary">
                <div class="container table-responsive py-5 shift-header-fix" id="tbl_scratcher_payout_append">

                    <table class="table table-sm cell-border" id="tbl_scratcher_payout" style="width:100%">
                        <thead class="headsec">
                            <tr>
                                <th class="text-white">Payout Date</th>
                                <th class="text-white">Scratcher UPC#</th>
                                <th class="text-white">Scratcher Price</th>
                                <th class="text-white">Payout Amt.</th>
                                <th class="text-white">Payment Type</th>
                                <th class="text-white">Payout Store#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($PayoutSummary["ScratcherPayout"])) {
                                    $tot_payout = 0;
                                    foreach ($PayoutSummary["ScratcherPayout"] as $key_ps => $value_ps) {
                                        $tot_payout = $tot_payout + $value_ps["cash_out_amt"];
                            ?>
                            <tr>
                                <td><?php print date("m/d/Y",strtotime($value_ps["cash_out_date"])); ?></td>
                                <td><?php print $value_ps["scratcher_upc"]; ?></td>
                                <td>$<?php print $value_ps["onsale_price"]; ?></td>
                                <td>$<?php print $value_ps["cash_out_amt"]; ?></td>
                                <td><?php print $value_ps["payment_type"]; ?></td>
                                <td>-</td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                    <?php if(!empty($PayoutSummary["ScratcherPayout"])) { ?>
                    <table class="table table-bordered table-hover" style="width:100%; margin-top: 10px;">
                        <tbody>
                            <tr class="bg-green">
                                <td colspan="6">Total Payout:&nbsp;&nbsp;&nbsp;$<?php print number_format($tot_payout,2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>

                </div>
            </div>

            <div class="col-md-12" id="employee_payout_summary" style="display: none;">
                <div class="container table-responsive py-5" id="tbl_employee_payout_append">
                    <table class="table table-sm cell-border" id="tbl_employee_payout" style="width:100%">
                        <thead class="headsec">
                            <tr>
                                <th class="text-white">Date</th>
                                <th class="text-white">Employee Name</th>
                                <th class="text-white">Payout Amt.</th>
                                <th class="text-white">Payment Type</th>
                                <th class="text-white">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($PayoutSummary["EmployeePayout"])) {
                                    $tot_payout_e = 0;
                                    foreach ($PayoutSummary["EmployeePayout"] as $key_e => $value_e) {
                                        $tot_payout_e = $tot_payout_e + $value_e["payout_money"];
                            ?>
                            <tr>
                                <td><?php print date("m/d/Y",strtotime($value_e["created_at"])); ?></td>
                                <td><?php print $value_e["supplier_emp_name"]; ?></td>
                                <td>$<?php print $value_e["payout_money"]; ?></td>
                                <td><?php print $value_e["payment_type"]; ?></td>
                                <td><?php if($value_e["notes"] != "") print $value_e["notes"]; else print "-"; ?></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                    <?php if(!empty($PayoutSummary["EmployeePayout"])) { ?>
                    <table class="table table-bordered table-hover" style="width:100%; margin-top: 10px;">
                        <tbody>
                            <tr class="bg-green">
                                <td colspan="5">Total Payout:&nbsp;&nbsp;&nbsp;$<?php print number_format($tot_payout_e,2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-12" id="vendor_payout_summary" style="display: none;">
                <div class="container table-responsive py-5 shift-header-fix" id="tbl_vendor_payout_append">
                    <table class="table table-sm cell-border" id="tbl_vendor_payout" style="width:100%;">
                        <thead class="headsec">
                            <tr>
                                <th class="text-white">Date</th>
                                <th class="text-white">Vendor Name</th>
                                <th class="text-white">Payout Amt.</th>
                                <th class="text-white">Payment Type</th>
                                <th class="text-white">Category</th>
                                <th class="text-white">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($PayoutSummary["VendorPayout"])) {
                                    $tot_payout_v = 0;
                                    foreach ($PayoutSummary["VendorPayout"] as $key_v => $value_v) {
                                        $tot_payout_v = $tot_payout_v + $value_v["payout_money"];
                            ?>
                            <tr>
                                <td><?php print date("m/d/Y",strtotime($value_v["created_at"])); ?></td>
                                <td><?php print $value_v["supplier_emp_name"]; ?></td>
                                <td>$<?php print $value_v["payout_money"]; ?></td>
                                <td><?php print $value_v["payment_type"]; ?></td>
                                <td><?php print $value_v["category_name"]; ?></td>
                                <td><?php if($value_v["notes"] != "") print $value_v["notes"]; else print "-"; ?></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                    <?php if(!empty($PayoutSummary["VendorPayout"])) { ?>
                    <table class="table table-bordered table-hover" style="width:100%; margin-top: 10px;">
                        <tbody>
                            <tr class="bg-green">
                                <td colspan="6">Total Payout:&nbsp;&nbsp;&nbsp;$<?php print number_format($tot_payout_v,2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-4">
            </div>

        </div>
    </div>
</div>