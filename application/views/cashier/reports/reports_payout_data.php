    <?php include_once("inc/js_css.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-rep bg-dark py-3 px-4">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <span class="navbar-brand">Payout</span>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="d-flex justify-content-end btninbig">
                        <button class="bckbtn btn-backWrapper newredwrap reportbackbtn" onclick="goBack();" >
                        <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="" class="gotopos">
                    </button>
                    <img src="<?php echo base_url(); ?>/assets/images/Group 1882.png" alt="" class="mobileimg">
                            <div class="mainscreen">
                                <a href="<?php echo base_url(); ?>cashier">
                                    <p class="maindes">MAIN SCREEN</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container content">

        <h4 class="px-12">Filters</h4>

        <form name="frmDetailsFilter" id="frmDetailsFilter">
            <div class="row px-12">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Payout Reports</label>
                        <select class="form-control" aria-label="Default select example" name="payout_type_filter" id="payout_type_filter">
                            <option value="s" <?php if(!empty($payout_type_filter) && $payout_type_filter == "s") print "selected"; ?>>Scratcher Payable</option>
                            <option value="e" <?php if(!empty($payout_type_filter) && $payout_type_filter == "e") print "selected"; ?>>Employee Payable</option>
                            <option value="v" <?php if(!empty($payout_type_filter) && $payout_type_filter == "v") print "selected"; ?>>Vendor Payable</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" max="<?php echo date('Y-m-d'); ?>" name="start_date_filter" id="start_date_filter" class="form-control" value="<?php if(!empty($start_date_filter)){ print $start_date_filter; }else{ echo date('Y-m-d'); } ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" max="<?php echo date('Y-m-d'); ?>" name="end_date_filter" id="end_date_filter" class="form-control" value="<?php if(!empty($end_date_filter)){ print $end_date_filter; }else{ echo date('Y-m-d'); } ?>">
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-dark my-2 my-sm-0 form-control" id="frmDetailsFilterBtn" type="button">Go</button>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-dark my-sm-0 form-control" id="frmClearFilterBtn" type="button">Clear Filter</button>
                    </div>
                </div>

            </div>
        </form>

        <div class="row">            
                
            <div class="col-md-12" id="scratcher_payout_summary" <?php if(!empty($payout_type_filter) && $payout_type_filter == "s") {} else print 'style="display: none;"';  ?>>
                <div class="container table-responsive py-5">

                    <table class="table table-sm cell-border" id="tbl_scratcher_payout" style="width:100%">
                        <thead class="headsec">
                            <tr>
                                <th class="text-white">Scratcher UPC#</th>
                                <th class="text-white">Scratcher Price</th>
                                <th class="text-white">Payout Amt.</th>
                                <th class="text-white">Payment Type</th>
                                <th class="text-white">Payout Date</th>
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
                                <td><?php print $value_ps["scratcher_upc"]; ?></td>
                                <td>$<?php print $value_ps["onsale_price"]; ?></td>
                                <td>$<?php print $value_ps["cash_out_amt"]; ?></td>
                                <td><?php print $value_ps["payment_type"]; ?></td>                                    
                                <td><?php print date("m/d/Y",strtotime($value_ps["cash_out_date"])); ?></td>
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
                                <td colspan="6">Total Payout:&nbsp;&nbsp;&nbsp;$<?php print $tot_payout; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-12" id="employee_payout_summary" <?php if(!empty($payout_type_filter) && $payout_type_filter == "e") {} else print 'style="display: none;"';  ?>>
                <div class="container table-responsive py-5">
                    <table class="table table-sm cell-border" id="tbl_employee_payout" style="width:100%">
                        <thead class="headsec">
                            <tr>
                                <th class="text-white">Employee Name</th>
                                <th class="text-white">Payout Amt.</th>
                                <th class="text-white">Payment Type</th>
                                <th class="text-white">Notes</th>
                                <th class="text-white">Date</th>
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
                                <td><?php print $value_e["supplier_emp_name"]; ?></td>
                                <td>$<?php print $value_e["payout_money"]; ?></td>
                                <td><?php print $value_e["payment_type"]; ?></td>
                                <td><?php if($value_e["notes"] != "") print $value_e["notes"]; else print "-"; ?></td>
                                <td><?php print date("m/d/Y",strtotime($value_e["created_at"])); ?></td>
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
                                <td colspan="5">Total Payout:&nbsp;&nbsp;&nbsp;$<?php print $tot_payout_e; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-12" id="vendor_payout_summary" <?php if(!empty($payout_type_filter) && $payout_type_filter == "v") {} else print 'style="display: none;"';  ?>>
                <div class="container table-responsive py-5">
                    <table class="table table-sm cell-border" id="tbl_vendor_payout" style="width:100%">
                        <thead class="headsec">
                            <tr>
                                <th class="text-white" width="40%">Vendor Name</th>
                                <th class="text-white" width="20%">Payout Amt.</th>
                                <th class="text-white">Payment Type</th>
                                <th class="text-white">Category</th>
                                <th class="text-white" width="20%">Notes</th>
                                <th class="text-white" width="20%">Date</th>
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
                                <td><?php print $value_v["supplier_emp_name"]; ?></td>
                                <td>$<?php print $value_v["payout_money"]; ?></td>
                                <td><?php print $value_v["payment_type"]; ?></td>
                                <td><?php print $value_v["category_name"]; ?></td>
                                <td><?php if($value_v["notes"] != "") print $value_v["notes"]; else print "-"; ?></td>
                                <td><?php print date("m/d/Y",strtotime($value_v["created_at"])); ?></td>
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
                                <td colspan="6">Total Payout:&nbsp;&nbsp;&nbsp;$<?php print $tot_payout_v; ?></td>
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
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click","#frmDetailsFilterBtn",function() {
            $("#overlay,.loader").show();
            var start_date_filter = "";
            if($("#start_date_filter").val() != "")
                start_date_filter = $("#start_date_filter").val();

            var end_date_filter = "";
            if($("#end_date_filter").val() != "")
                end_date_filter = $("#end_date_filter").val();

            var payout_type_click = $("#payout_type_filter").val();

            window.open('<?php print base_url(); ?>cashier/payout_reports_details/<?php print $date_clicked_filter; ?>/'+payout_type_click+'/'+start_date_filter+'/'+end_date_filter, '_self').focus();
        });

        $(document).on("click","#frmClearFilterBtn",function() {
            $("#overlay,.loader").show();
            var payout_type_click = 's';
            var start_date_filter = "";
            var end_date_filter = "";
            window.open('<?php print base_url(); ?>cashier/payout_reports_details/<?php print $date_clicked_filter; ?>/'+payout_type_click+'/'+start_date_filter+'/'+end_date_filter, '_self').focus();
        });

        $('#top_selling_cats_filter').multiselect({
            selectAllValue: 'multiselect-all',
            enableCaseInsensitiveFiltering: true,
            enableFiltering: true,
            maxHeight: '300',
            selectAllText: 'Select All Category',
            includeSelectAllOption: true,
        });

        var tbl_inventory = $('#tbl_scratcher_payout').DataTable({
            "pageLength": 10,
            "autoWidth": true,
            "bLengthChange": false,
            "responsive": true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    text: 'Email',
                    action: function () {
                        extendDataTable(tbl_inventory);
                    }
                }
            ],
        });

        var tbl_inventory2 = $('#tbl_employee_payout').DataTable({
            "pageLength": 10,
            "autoWidth": true,
            "bLengthChange": false,
            "responsive": true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    text: 'Email',
                    action: function () {
                        extendDataTable(tbl_inventory2);
                    }
                }
            ],
        });

        var tbl_inventory3 = $('#tbl_vendor_payout').DataTable({
            "pageLength": 10,
            "autoWidth": true,
            "bLengthChange": false,
            "responsive": true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    text: 'Email',
                    action: function () {
                        extendDataTable(tbl_inventory3,"Payout");
                    }
                }
            ],
        });
    });
</script>