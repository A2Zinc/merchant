    <?php include_once("inc/js_css.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-rep bg-dark py-3 px-4">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="javascript:;" onclick="javascript: history.back(-1);">Open/Close Balance Diff</a>
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
                <div class="row px-auto">                    
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
                <div class="col-md-12">
                    <div class="">
                        
                        <table class="table table-sm cell-border" id="tbl_inventory" style="width:100%">
                            <thead class="headsec">
                                <tr>
                                    <th class="text-white" width="80%" style="text-align:left !important;">Details</th>
                                    <th class="text-white" width="20%">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!empty($kpi_detail_open_close_bal)) {

                                        foreach ($kpi_detail_open_close_bal as $key => $value) {

                                            if($key == "opening_cash") {
                                ?>
                                            <tr>
                                                <td style="text-align:left !important;"><?php print $value["text"]; ?></td>
                                                <td><?php print $value["amount"]; ?></td>
                                            </tr>
                                <?php
                                            } else if($key == "cash_sales") {

                                                if(!empty($value)) {

                                                    foreach ($value as $key_cash_sales => $value_cash_sales) {
                                ?>
                                            <tr>
                                                <td style="text-align:left !important;"><?php print $value_cash_sales["text"]; ?></td>
                                                <td><?php print $value_cash_sales["amount"]; ?></td>
                                            </tr>
                                <?php

                                                    }
                                                }

                                            } else if($key == "payout") {

                                                if(!empty($value)) {

                                                    foreach ($value as $key_payout => $value_payout) {
                                ?>
                                            <tr>
                                                <td style="text-align:left !important;"><?php print $value_payout["text"]; ?></td>
                                                <td><?php print $value_payout["amount"]; ?></td>
                                            </tr>
                                <?php
                                                    }
                                                }

                                            } else if($key == "refund") {

                                                if(!empty($value)) {

                                                    foreach ($value as $key_refund => $value_refund) {
                                ?>
                                            <tr>
                                                <td style="text-align:left !important;"><?php print $value_refund["text"]; ?></td>
                                                <td><?php print $value_refund["amount"]; ?></td>
                                            </tr>
                                <?php
                                                    }
                                                }
                                            } else if($key == "cash_drop") {

                                                if(!empty($value)) {

                                                    foreach ($value as $key_cash_drop => $value_cash_drop) {
                                ?>
                                            <tr>
                                                <td style="text-align:left !important;"><?php print $value_cash_drop["text"]; ?></td>
                                                <td><?php print $value_cash_drop["amount"]; ?></td>
                                            </tr>
                                <?php
                                                    }
                                                }
                                            } else if($key == "difference") {
                                ?>
                                            <tr>
                                                <td style="text-align:left !important;"><?php print $value["text"]; ?></td>
                                                <td><?php print $value["amount"]; ?></td>
                                            </tr>
                                <?php
                                            }
                                        }
                                    }
                                ?>                                
                            </tbody>
                        </table>                    
                    </div>
                </div>
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

            window.open('<?php print base_url(); ?>cashier/kpi_detail_open_close_bal/'+start_date_filter+'/'+end_date_filter, '_self').focus();
        });

        $(document).on("click","#frmClearFilterBtn",function() {
            $("#overlay,.loader").show();
            var start_date_filter = "";
            var end_date_filter = "";
            window.open('<?php print base_url(); ?>cashier/kpi_detail_open_close_bal/'+start_date_filter+'/'+end_date_filter, '_self').focus();
        });

        var tbl_inventory = $('#tbl_inventory').DataTable({
            "pageLength": 20,
            "autoWidth": true,
            "bLengthChange": false,
            "responsive": true,
            "ordering": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    text: 'Email',
                    action: function () {
                        extendDataTable(tbl_inventory,"Open-Close Balance Diff");
                    }
                }
            ],
        });
    });
</script>