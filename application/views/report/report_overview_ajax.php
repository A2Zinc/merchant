<?php include_once(APPPATH."views/cashier/reports/inc/js_css.php"); ?>
<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Summary <?php print date("F jS, Y") ?></h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 m-0 py-2">
                            <div class="text-center">
                                Sales <?php print date("m/d/Y",strtotime($start_date)); ?> To <?php print date("m/d/Y",strtotime($end_date)); ?> <br>
                                <div class="h4 text-bold">$<?php if($SalesSummary['SalesToday'] != "") print $SalesSummary['SalesToday']; else print "0.00"; ?></div>

                                <?php if(date("Y-m-d",strtotime($start_date)) == date("Y-m-d") && date("Y-m-d",strtotime($end_date)) == date("Y-m-d")) { ?>
                                vs Yesterday $<?php if($SalesSummary['SalesYesterday'] != "") print $SalesSummary['SalesYesterday']; else print "0.00"; ?><br>
                                vs This Day Last Year $<?php if($SalesSummary['SalesDayLastYear'] != "") print $SalesSummary['SalesDayLastYear']; else print "0.00"; ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4 m-0 py-2">
                            <div class="text-center">
                                Sales This Week <br>
                                <div class="h4 text-bold">$<?php if($SalesSummary['SalesWeek'] != "") print $SalesSummary['SalesWeek']; else print "0.00"; ?></div>
                                vs Last Week $<?php if($SalesSummary['SalesLastWeek'] != "") print $SalesSummary['SalesLastWeek']; else print "0.00"; ?> <br>
                                vs This Week Last Year $<?php if($SalesSummary['SalesThisWeekLastYear'] != "") print $SalesSummary['SalesThisWeekLastYear']; else print "0.00"; ?>
                            </div>
                        </div>
                        <div class="col-md-4 m-0 py-2">
                            <div class="text-center">
                                Sales This Month <br>
                                <div class="h4 text-bold">$<?php if($SalesSummary['SalesMonth'] != "") print $SalesSummary['SalesMonth']; else print "0.00"; ?></div>
                                vs Last Month $<?php if($SalesSummary['SalesLastMonth'] != "") print $SalesSummary['SalesLastMonth']; else print "0.00"; ?> <br>
                                vs This Month Last Year $<?php if($SalesSummary['SalesLastYearMonth'] != "") print $SalesSummary['SalesLastYearMonth']; else print "0.00"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<div class="">
    <div class="row timesheet-header">
        <div class="col-md-6 my-3 bar1">
            <div class="repcard-con card">
                <div class="card-header">Scratcher Sales (Today's)</div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="repcard-con card">
                <div class="card-header">
                    Top <span class="no_of_items">10</span> Selling Items (<span id="top_selling_lbl_type_of_month">This Month</span>)
                    <div style="display: inline-block; margin-left: 10px;">
                        <select class="form-control" name="top_selling_type_of_month" id="top_selling_type_of_month" style="width: 150px;">
                            <option value="this_month">This Month</option>
                            <option value="last_month">Last Month</option>
                            <option value="last_3month">Last 3 Month</option>
                            <option value="last_6month">Last 6 Month</option>
                            <option value="last_9month">Last 9 Month</option>
                        </select>
                    </div>
                    <span style="display:none; font-size: 12px;" id="top_selling_category_name"></span>
                    <div style="float: right;">
                        <!-- <a href="javascript:;" id="top_selling_cats_link" title="Category"><i class="fa fa-tag" aria-hidden="true"></i></a> -->
                        <span class="no_of_items">10</span>
                        <a href="javascript:;" id="top_selling_no_of_items_link" title="No. of Items"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
                    </div>

                    <div id="top_selling_no_of_item_div" class="multiselect" style="display: none; padding-top:10px;">
                        <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm" data-type="no_of_items" id="btnNoOfItemsFilter" style="font-size: 15px; float: right; margin-top: 2px;">Go</button>
                        <input placeholder="No. of Items" type="tel" autofocus="" name="no_of_items_filter" id="no_of_items_filter" class="form-control" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4" style="width: 50%; float: right; margin-right: 10px; margin-bottom: 10px;">
                    </div>

                    <div id="top_selling_cat_div" style="padding-top:10px;">
                        <select class="form-control top_selling_cats_temp" aria-expanded="false" multiple="multiple" name="top_selling_cats[]" id="top_selling_cats">
                            <?php foreach ($category as $c) {?>
                            <option value="<?=$c['category_id']?>" <?php if($c['category_id']==$product['category_id']){echo 'SELECTED';}?> ><?=$c['category_name']?></option>  

                               <?php if(!empty($c['sub_cat'])){
                                  foreach($c['sub_cat'] as $sub_ct1){ ?>
                                    <option value="<?=$sub_ct1['category_id']?>" <?php if($sub_ct1['category_id']==$product['category_id']){echo 'SELECTED';}?> >
                                      <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> 
                                    </option>
                                    <?php if(!empty($sub_ct1['child_cat'])){ 
                                      foreach($sub_ct1['child_cat'] as $sub_ct2){ ?>
                                        <option value="<?=$sub_ct2['category_id']?>" <?php if($sub_ct2['category_id']==$product['category_id']){echo 'SELECTED';}?> ><?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                          <?=$sub_ct2['category_name']?>
                                        </option>
                                      <?php if(!empty($sub_ct2['grand_cat'])){ 
                                        foreach($sub_ct2['grand_cat'] as $grnd_ct){ ?>
                                      <option value="<?=$grnd_ct['category_id']?>" <?php if($grnd_ct['category_id']==$product['category_id']){echo 'SELECTED';}?> >
                                        <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                          <?=$sub_ct2['category_name']?> > <?=$grnd_ct['category_name']?></option>

                                <?php } } } } } }?> 
                                
                        <?php } ?>
                        </select>

                        <!-- <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm" data-type="no_of_items" id="btnCategoryFilter" style="font-size: 15px; float: right; margin-top: 2px;">Go</button> -->
                    </div>
                </div>
                <div class="card-body second-scroller p-0">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark" style="position: -webkit-sticky; position: sticky; top: -1px; z-index: 10;">
                            <tr>
                                <th style="vertical-align: top;">Product</th>
                                <th style="vertical-align: top;">Category</th>
                                <th style="vertical-align: top;">Promotion</th>
                                <th style="vertical-align: top;">Qty <br>Sold</th>
                            </tr>
                        </thead>
                        <tbody id="no_of_items_append">
                        <?php
                            if(!empty($Top10SellingItems)) {
                                foreach ($Top10SellingItems as $key_tsi => $value_tsi) {
                        ?>
                            <tr>
                                <td><a href="javascript:;" id="top_selling_items_detail"><?php print $value_tsi["product_name"]; ?></a></td>
                                <td><?php print $value_tsi["category_name"]; ?></td>
                                <td><?php if($value_tsi["coupon_name"] != "") print $value_tsi["coupon_name"]; else print "-"; ?></td>
                                <td><?php print $value_tsi["sold_qty"]; ?></td>
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
        <div class="col-md-6 my-3 pie2">
            <div class="repcard-con card">
                <div class="card-header">Frequently Sold Categories (This Month)</div>
                <div class="card-body">
                    <canvas id="pie1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3 bar2">
            <div class="repcard-con card">
                <div class="card-header">Payout (Last 7 day's)</div>
                <div class="card-body">
                    <canvas id="bar2"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3 line1">
            <div class="repcard-con card">
                <div class="card-header">Sales And Margin Comparison (Last 7 day's)</div>
                <div class="card-body">

                    <select class="form-select" aria-label="Default select example" name="sales_margin_compare" id="sales_margin_compare">
                        <option value="all">Select Category</option>
                        <?php foreach ($category as $c) {?>
                        <option value="<?=$c['category_id']?>" <?php if($c['category_id']==$product['category_id']){echo 'SELECTED';}?> ><?=$c['category_name']?></option>  

                           <?php if(!empty($c['sub_cat'])){
                              foreach($c['sub_cat'] as $sub_ct1){ ?>
                                <option value="<?=$sub_ct1['category_id']?>" <?php if($sub_ct1['category_id']==$product['category_id']){echo 'SELECTED';}?> >
                                  <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> 
                                </option>
                                <?php if(!empty($sub_ct1['child_cat'])){ 
                                  foreach($sub_ct1['child_cat'] as $sub_ct2){ ?>
                                    <option value="<?=$sub_ct2['category_id']?>" <?php if($sub_ct2['category_id']==$product['category_id']){echo 'SELECTED';}?> ><?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                      <?=$sub_ct2['category_name']?>
                                    </option>
                                  <?php if(!empty($sub_ct2['grand_cat'])){ 
                                    foreach($sub_ct2['grand_cat'] as $grnd_ct){ ?>
                                  <option value="<?=$grnd_ct['category_id']?>" <?php if($grnd_ct['category_id']==$product['category_id']){echo 'SELECTED';}?> >
                                    <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                      <?=$sub_ct2['category_name']?> > <?=$grnd_ct['category_name']?></option>

                            <?php } } } } } }?> 
                            
                    <?php } ?>
                    </select>

                    <canvas id="line1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3 bar3">
            <div class="repcard-con card">
                <div class="card-header">Key Productivity Index (KPI) Summary</div>
                <div class="card-body second-scroller p-0">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>KPI Name</th>
                                <th>Status</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="<?php print base_url()."cashier/kpi_detail_open_close_bal" ?>">Open/Close Balance Diff</a></td>
                                <td>
                                <?php  
                                        if($kpi_opening_closing_diff <= 0)
                                            $color = "green";
                                        else if($kpi_opening_closing_diff <= 20)
                                            $color = "yellow";
                                        else if($kpi_opening_closing_diff > 20)
                                            $color = "red";
                                    ?>                                    
                                    <div class="bg-<?php echo $color; ?> circle"></div>
                                </td>
                            </tr>

                            <tr>
                                <td><a href="<?php print base_url()."cashier/kpi_detail_void_no_sale/1//" ?>">Transaction Void</a></td>
                                <td>
                                    <a href="<?php print base_url()."cashier/kpi_detail_void_no_sale/1//" ?>"><div class="bg-<?php print $kpi_section[2]; ?> circle"></div></a>
                                </td>
                            </tr>

                            <tr>
                                <td><a href="<?php print base_url()."cashier/kpi_detail_void_no_sale/2//" ?>">No Sales</a></td>
                                <td>
                                    <a href="<?php print base_url()."cashier/kpi_detail_void_no_sale/2//" ?>"><div class="bg-<?php print $kpi_section[3]; ?> circle"></div></a>
                                </td>
                            </tr>

                            <tr>
                                
                                    <td><a href="<?php print base_url()."cashier/kpi_price_override_detail/none//" ?>">Price Overrides</a></td>
                                    <td>
                                        <a href="<?php print base_url()."cashier/kpi_price_override_detail/none//" ?>"><div class="bg-<?php print $kpi_section[4]; ?> circle"></div></a>
                                    </td>                                
                            </tr>

                            <tr>
                                <td><a href="<?php print base_url()."cashier/kpi_detail_cash_drops//" ?>">Cash Drops</a></td>
                                <td>
                                    <div class="bg-<?php print $kpi_section[5]; ?> circle"></div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>    
    var ctx = document.getElementById('myChart').getContext('2d');
    var ctx4 = document.getElementById('bar2').getContext('2d');    
    var ctx6 = document.getElementById('line1').getContext('2d');    
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'horizontalBar',

        // The data for our dataset
        data: {
            labels: [<?php if(!empty($ScratcherSales["scratcher_sales_bin_arr"])) print "'".implode("','", $ScratcherSales["scratcher_sales_bin_arr"])."'"; ?>],
            datasets: [{
                label: 'Tickets Sold',
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                data: [<?php if(!empty($ScratcherSales["scratcher_sales_qty_arr"])) print implode(",", $ScratcherSales["scratcher_sales_qty_arr"]);   ?>]
            }]
        },
        options: {
            legend: {
                onClick: (e) => e.stopPropagation()
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var canvasP_ss = document.getElementById("myChart");
    canvasP_ss.onclick = function(e) {
       var slice = chart.getElementAtEvent(e);
       if (!slice.length) return; // return if not clicked on slice
       var label  = slice[0]._model.label;
       switch (label) {
          // add case for each label/slice
            case label:
            var label_temp = label.replace('Bin#','');

            var bin_filter_arr_encoded = 0;
            if(label_temp != "") {
                var label_temp_btoa = window.btoa(label_temp);
                label_temp_btoa = label_temp_btoa.replaceAll('=','_');
                bin_filter_arr_encoded = encodeURIComponent(label_temp_btoa);
            }

            var ssreports_url = bin_filter_arr_encoded;
            var start_date_range = "";
            var end_date_range   = "";

            if(typeof $("#start_date_range").val() != 'undefined' && $("#start_date_range").val() != "" && typeof $("#end_date_range").val() != 'undefined' && $("#end_date_range").val() != "") {
                start_date_range = convertDate($("#start_date_range").val());
                end_date_range = convertDate($("#end_date_range").val());
                ssreports_url = bin_filter_arr_encoded+"/"+start_date_range+"/"+end_date_range;
            }
            window.open('<?php print base_url(); ?>cashier/ssreports/'+ssreports_url,'_self');
            break;
       }
    }

    //bar2
    var bar2 = new Chart(ctx4, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [<?php if(!empty($Payout["suffix_arr"])) print "'".implode("','", $Payout["suffix_arr"])."'"; ?>],
            datasets: [{
                label: 'Vendor Payable',
                backgroundColor: '#207D72',
                borderColor: '#207D72',
                data: [<?php if(!empty($Payout["payout_money_vendor_arr"])) print implode(",", $Payout["payout_money_vendor_arr"]); ?>],
                payout_type: "v" // Vendor
            },
            {
                label: 'Employee Payable',
                backgroundColor: 'skyblue',
                borderColor: 'skyblue',
                data: [<?php if(!empty($Payout["payout_money_employee_arr"])) print implode(",", $Payout["payout_money_employee_arr"]); ?>],
                payout_type: "e" // Employee
            },
            {
                label: 'Scratchers Payout',
                backgroundColor: 'olivegreen',
                borderColor: 'olivegreen',
                data: [<?php if(!empty($Payout["payout_sp_arr"])) print implode(",", $Payout["payout_sp_arr"]); ?>],
                payout_type: "s" // Scratchers
            }
            ],
        },
        options: {
            legend: {
                onClick: (e) => e.stopPropagation()
            },
            scales: {
                xAxes: [{
                ticks: {
                beginAtZero: true
                }
                }]
            }
        }        
    });

    $("#bar2").click(function(event) {

        var activePoints = bar2.getElementsAtEvent(event);
        var activeDataSet = bar2.getDatasetAtEvent(event);

        if (activePoints.length > 0) {

            var clickedDatasetIndex = activeDataSet[0]._datasetIndex;
            var clickedElementIndex = activePoints[0]._index;

            var date_click = bar2.data.labels[clickedElementIndex];
            var payout_type_click = bar2.data.datasets[clickedDatasetIndex].payout_type;
            
            var payout_reports_details_url  = date_click+"/"+payout_type_click;
            var start_date_range            = "";
            var end_date_range              = "";

            if(typeof $("#start_date_range").val() != 'undefined' && $("#start_date_range").val() != "" && typeof $("#end_date_range").val() != 'undefined' && $("#end_date_range").val() != "") {
                start_date_range            = convertDate($("#start_date_range").val());
                end_date_range              = convertDate($("#end_date_range").val());
                payout_reports_details_url  = date_click+"/"+payout_type_click+"/"+start_date_range+"/"+end_date_range;
            }

            window.open('<?php print base_url(); ?>cashier/payout_reports_details/'+payout_reports_details_url,'_self');
        }
    });

    var canvasP = document.getElementById("pie1");
    var ctxP = canvasP.getContext('2d');
    var myPieChart = new Chart(ctxP, {
       type: 'pie',
       data: {
            labels: [<?php if(!empty($FrequentlySoldItems["fs_cat"])) print "'".implode("','", $FrequentlySoldItems["fs_cat"])."'"; ?>],
            datasets: [{
                fill: true,
                backgroundColor: [
                    '#FF843F',
                    'gray', 'pink', '#a991d8'
                ],
                data: [<?php if(!empty($FrequentlySoldItems["fs_stats"])) print implode(",", $FrequentlySoldItems["fs_stats"]); ?>],
                custom_param : [<?php if(!empty($FrequentlySoldItems["fs_cat_id"])) print "'".implode("','", $FrequentlySoldItems["fs_cat_id"])."'"; ?>]
            }]
        },
        options: {
            legend: {
                onClick: (e) => e.stopPropagation()
            }
        }
    });

    $("#pie1").click(function(event) {

        var activePoints = myPieChart.getElementsAtEvent(event);
        var activeDataSet = myPieChart.getDatasetAtEvent(event);

        if (activePoints.length > 0) {

            var clickedDatasetIndex = activeDataSet[0]._datasetIndex;
            var clickedElementIndex = activePoints[0]._index;
            var value = myPieChart.data.datasets[clickedDatasetIndex].custom_param[clickedElementIndex];

            var bin_filter_arr_encoded = 0;
            if(value != "") {

                var label_temp_btoa = window.btoa(value);
                label_temp_btoa = label_temp_btoa.replaceAll('=','_');
                bin_filter_arr_encoded = encodeURIComponent(label_temp_btoa);
            }

            var reports_url      = bin_filter_arr_encoded;
            var start_date_range = "";
            var end_date_range   = "";

            if(typeof $("#start_date_range").val() != 'undefined' && $("#start_date_range").val() != "" && typeof $("#end_date_range").val() != 'undefined' && $("#end_date_range").val() != "") {
                start_date_range = convertDate($("#start_date_range").val());
                end_date_range = convertDate($("#end_date_range").val());
                reports_url = bin_filter_arr_encoded+"/"+start_date_range+"/"+end_date_range;
            }

            window.open('<?php print base_url(); ?>cashier/reports/'+reports_url,'_self');
        }
    });

    //line1
    var line1 = new Chart(ctx6, {
            type: 'line',
            data: {
                labels: [<?php if(!empty($SalesAndMarginComparison["suffix_arr"])) print "'".implode("','", $SalesAndMarginComparison["suffix_arr"])."'"; ?>],
                datasets: [{
                        label: 'Sales', // Name the series
                        data: [<?php if(!empty($SalesAndMarginComparison["payout_money_sales_arr"])) print implode(",", $SalesAndMarginComparison["payout_money_sales_arr"]); ?>], // Specify the data values array
                        fill: false,
                        borderColor: '#2196f3', // Add custom color border (Line)
                        backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                        borderWidth: 1 // Specify bar border width
                    },
                    {
                        label: 'Supplier', // Name the series
                        data: [<?php if(!empty($SalesAndMarginComparison["payout_money_margin_arr"])) print implode(",", $SalesAndMarginComparison["payout_money_margin_arr"]); ?>], // Specify the data values array
                        fill: false,
                        borderColor: '#4CAF50', // Add custom color border (Line)
                        backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
                        borderWidth: 1 // Specify bar border width
                    }
                ]
            },
            options: {
                legend: {
                    onClick: (e) => e.stopPropagation()
                }
            }
        }
    );

    $("#line1").click(function(event) {

        var activePoints = line1.getElementsAtEvent(event);
        var activeDataSet = line1.getDatasetAtEvent(event);
        var sales_margin_compare = 0;
        if($("#sales_margin_compare").val() != "")
            var sales_margin_compare = $("#sales_margin_compare").val();

        if (activePoints.length > 0) {
            var clickedDatasetIndex = activeDataSet[0]._datasetIndex;
            var clickedElementIndex = activePoints[0]._index;
            var value = line1.data.datasets[clickedDatasetIndex].data[clickedElementIndex];
            var valueLable = line1.data.labels[clickedElementIndex];

            var sm_reports_details_url  = sales_margin_compare+"/"+valueLable;
            var start_date_range        = "";
            var end_date_range          = "";

            if(typeof $("#start_date_range").val() != 'undefined' && $("#start_date_range").val() != "" && typeof $("#end_date_range").val() != 'undefined' && $("#end_date_range").val() != "") {
                start_date_range       = convertDate($("#start_date_range").val());
                end_date_range         = convertDate($("#end_date_range").val());
                sm_reports_details_url = sales_margin_compare+"/"+valueLable+"/"+start_date_range+"/"+end_date_range;
            }

            window.open('<?php print base_url(); ?>cashier/sm_reports_details/'+sm_reports_details_url,'_self');
        }
    });

    jQuery(document).on("change", "select[name='sales_margin_compare']", function(e) {
        e.preventDefault();
        var category_id = $(this).val();
        var start_date_range = $("#start_date_range").val();
        var end_date_range = $("#end_date_range").val();

        jQuery.ajax({
            url : base_url+"cashier/chartajax/sales_margin/"+category_id,
            type: "GET",
            dataType : "json",
            async: true,
            data : {
                start_date_range: start_date_range,
                end_date_range: end_date_range
            },
            success:function(data) {

                line1.data.labels = data.suffix_arr.split(","); // data.payout_money_sales_arr;
                line1.data.datasets[0].label = 'Sales';
                line1.data.datasets[0].data = data.payout_money_sales_arr.split(","); // data.payout_money_sales_arr;

                line1.data.datasets[1].label = 'Supplier';
                line1.data.datasets[1].data = data.payout_money_margin_arr.split(",");
                line1.update();
            }
        });
    });

    $('#top_selling_cats').multiselect({
        selectAllValue: 'multiselect-all',
        enableCaseInsensitiveFiltering: true,
        enableFiltering: true,
        maxHeight: '300',
        selectAllText: 'Select All Category',
        includeSelectAllOption: true,
        onChange: function(element, checked) {

            var top_selling_type_of_month = $("#top_selling_type_of_month option:selected").val();
            var brands = $('#top_selling_cats option:selected');
            var selected = [];
            $(brands).each(function(index, brand){
                selected.push($(this).val());
            });

            var no_of_items_filter = $("#no_of_items_filter").val();
            top_selling_items_ajax(top_selling_type_of_month,selected,no_of_items_filter,'category','');
        },
        onSelectAll: function() {

            var top_selling_type_of_month = $("#top_selling_type_of_month option:selected").val();
            var brands = $('#top_selling_cats option:selected');
            var selected = [];
            $(brands).each(function(index, brand){
                selected.push($(this).val());
            });

            var no_of_items_filter = $("#no_of_items_filter").val();
            top_selling_items_ajax(top_selling_type_of_month,selected,no_of_items_filter,'category','');
        }
    });

    jQuery(document).on("change", "select[name='top_selling_type_of_month']", function(e) {

        var top_selling_type_of_month = $(this).val();
        var start_date_range = "";
        var end_date_range   = "";

        if(typeof $("#start_date_range").val() != 'undefined' && $("#start_date_range").val() != "") {
            start_date_range = $("#start_date_range").val();
        }

        if(typeof $("#end_date_range").val() != 'undefined' && $("#end_date_range").val() != "") {
            end_date_range = $("#end_date_range").val();
        }

        var brands = $('#top_selling_cats option:selected');
        var selected = [];
        $(brands).each(function(index, brand){
            selected.push($(this).val());
        });

        var no_of_items_filter = $("#no_of_items_filter").val();
        top_selling_items_ajax(top_selling_type_of_month,selected,no_of_items_filter,'type_of_month','');

    });

    function top_selling_items_ajax(top_selling_type_of_month,category_id,no_of_items_filter,data_type,category_name) {

        var start_date_range = "";
        var end_date_range   = "";

        if(typeof $("#start_date_range").val() != 'undefined' && $("#start_date_range").val() != "") {
            start_date_range = $("#start_date_range").val();
        }

        if(typeof $("#end_date_range").val() != 'undefined' && $("#end_date_range").val() != "") {
            end_date_range = $("#end_date_range").val();
        }

        jQuery.ajax({
            url : base_url+"cashier/reports/top_selling_items",
            type: "POST",
            dataType : "json",
            data : {
                category_id: category_id,
                no_of_items_filter: no_of_items_filter,
                start_date_range: start_date_range,
                end_date_range: end_date_range,
                top_selling_type_of_month: top_selling_type_of_month
            },
            success:function(data) {
                if(data.status == 1) {
                    $("#no_of_items_append").empty();
                    $("#no_of_items_append").append(data.html);

                    if(data_type == "no_of_items") {
                        $(".no_of_items").html(no_of_items_filter);
                    } else if(data_type == "type_of_month") {
                        if(top_selling_type_of_month  == "this_month")
                            $("#top_selling_lbl_type_of_month").html("This Month");
                        else if(top_selling_type_of_month  == "last_month")
                            $("#top_selling_lbl_type_of_month").html("Last Month");
                        else if(top_selling_type_of_month  == "last_3month")
                            $("#top_selling_lbl_type_of_month").html("Last 3 Month");
                        else if(top_selling_type_of_month  == "last_6month")
                            $("#top_selling_lbl_type_of_month").html("Last 6 Month");
                        else if(top_selling_type_of_month  == "last_9month")
                            $("#top_selling_lbl_type_of_month").html("Last 9 Month");

                    }

                    $("#top_selling_no_of_item_div").hide();
                }
            }
        });
    }
</script>