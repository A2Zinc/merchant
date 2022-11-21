    <?php include_once("inc/js_css.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">

                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-rep bg-dark py-3 px-4">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <span class="navbar-brand">Scratcher Sales</span>
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
                        <label>Bin#</label>
                        <select class="form-control" aria-label="Default select example" multiple="multiple" name="bin_filter[]" id="bin_filter">
                            <?php
                                if(!empty($scratcher_sales["scratcher_sales_bin_arr"])) {
                                    foreach ($scratcher_sales["scratcher_sales_bin_arr"] as $key => $value) {
                                        $bin_option_value = str_replace("Bin#","",$value);
                            ?>
                                    <option value="<?php print $bin_option_value; ?>" <?php if(!empty($bin_id_arr_return) && in_array($bin_option_value,$bin_id_arr_return)) {echo 'SELECTED';}?>><?php print $value; ?></option>
                            <?php
                                    }
                                }
                            ?>
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
            <div class="col-md-12">
                <div class="">
                    
                    <table class="table table-sm cell-border" id="tbl_inventory" style="width:100%;">
                        <thead class="headsec">
                            <tr>
                                <th class="text-white">Scratcher Name</th>
                                <th class="text-white">Bin#</th>
                                <th class="text-white">Date</th>
                                <th class="text-white">Quantity Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($report_data["product_details"])) {
                                    foreach ($report_data["product_details"] as $key => $value) {
                            ?>
                            <tr>
                                <td><?php print $value["product_name"]; ?></td>
                                <td><?php print $value["bin"]; ?></td>
                                <td><?php print date("m/d/Y", strtotime($value["order_date"])); ?></td>
                                <td><?php print $value["quantity"]; ?></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click","#frmDetailsFilterBtn",function() {
            $("#overlay,.loader").show();
            var bin_filter_arr = new Array();
            $('#bin_filter :selected').each(function() {
                bin_filter_arr.push($(this).val().replace(/\s+/g, ''));
            });

            var bin_filter_arr_encoded = 0;
            if(bin_filter_arr != "") {
                var label_temp_btoa = window.btoa(bin_filter_arr);
                label_temp_btoa = label_temp_btoa.replaceAll('=','_');
                bin_filter_arr_encoded = encodeURIComponent(label_temp_btoa);
            }

            var start_date_filter = "";
            if($("#start_date_filter").val() != "")
                start_date_filter = $("#start_date_filter").val()

            var end_date_filter = "";
            if($("#end_date_filter").val() != "")
                end_date_filter = $("#end_date_filter").val()

            var product_name        = $("#product_name_filter").val();
            window.open('<?php print base_url(); ?>cashier/ssreports/'+bin_filter_arr_encoded+'/'+start_date_filter+'/'+end_date_filter, '_self').focus();
        });

        $(document).on("click","#frmClearFilterBtn",function() {
            $("#overlay,.loader").show();
            var bin_filter_arr_encoded = 0;
            var start_date_filter = "";
            var end_date_filter = "";
            window.open('<?php print base_url(); ?>cashier/ssreports/'+bin_filter_arr_encoded+'/'+start_date_filter+'/'+end_date_filter, '_self').focus();
        });        

        $('#bin_filter').multiselect({
            selectAllValue: 'multiselect-all',
            enableCaseInsensitiveFiltering: true,
            enableFiltering: true,
            maxHeight: '300',
            selectAllText: 'Select All Bin',
            includeSelectAllOption: true,
        });

        var tbl_inventory = $('#tbl_inventory').DataTable({
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
                        extendDataTable(tbl_inventory,"Scratcher Sales");
                    }
                }
            ],
        });
    });
</script>