<?php include_once(APPPATH."views/cashier/reports/inc/js_css.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 px-4">
            <p class="h4 ">Filter</p>
        </div>
        <div class="col-md-12 px-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" max="<?php echo date('Y-m-d'); ?>" name="start_date_ss_filter" id="start_date_ss_filter" class="form-control" value="<?php if(!empty($start_date_filter)){ print $start_date_filter; }else{ echo date('Y-m-d'); } ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" max="<?php echo date('Y-m-d'); ?>" name="end_date_ss_filter" id="end_date_ss_filter" class="form-control" value="<?php if(!empty($end_date_filter)){ print $end_date_filter;  }else{ echo date('Y-m-d'); } ?>">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-dark my-2 my-sm-0 form-control" id="sales_summary_report_go" type="button">Go</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-dark my-2 my-sm-0 form-control" id="sales_summary_report_clear" type="button">Clear Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row content dynamic_font_sizez" id='sales-report'>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <?php
                            $sales_summary_date_heading = date("m/d/Y");
                            if(!empty($start_date_filter) && !empty($end_date_filter)) {
                                $sales_summary_date_heading = date("m/d/Y",strtotime($start_date_filter))." to ".date("m/d/Y",strtotime($end_date_filter));
                            }
                        ?>
                        <div class="h4 col-md-7">Sales Summary <?php print $sales_summary_date_heading; ?></div>
                        <div class="slt-con col-md-5">
                            <label for="">Category Name:</label>
                            <select class="form-control" name="sales_summary_category" id="sales_summary_category" aria-label="Default select example" style="width: 60%;
    display: inline-block;">
                                <option selected>Select One Category</option>
                                <option value="scratcher">Scratcher</option>
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
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="container table-responsive py-4">
                    <table class="table table-bordered table-hover" id="sales_summary_append">
                        <thead class="thead-dark">
                            <tr>
                                <th>Scratcher UPC#</th>
                                <th>Scratcher Name</th>
                                <th>Scratcher Price</th>
                                <th>Qty</th>
                                <th>Sale Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total_sales = 0;
                                $total_qty   = 0;
                                if(!empty($ScratcherSalesSummary)) {
                                    foreach ($ScratcherSalesSummary as $key_sss => $value_sss) {
                            ?>
                            <tr>
                                <td><?php print $value_sss->scratcher_upc; ?></td>
                                <td><?php print $value_sss->scratcher_name; ?></td>
                                <td>$<?php print $value_sss->scratcher_price; ?></td>
                                <td><?php print $value_sss->qty; ?></td>
                                <td><?php print date("m/d/Y",strtotime($value_sss->sale_date)); ?></td>
                            </tr>
                            <?php
                                    $total_sales = $total_sales + $value_sss->scratcher_price;
                                    $total_qty   = $total_qty + $value_sss->qty;
                                    }
                            ?>

                            <tr class="bg-green">
                                <td colspan="2">Total Sales</td>
                                <td>$<?php print $total_sales; ?></td>

                                <td class="bg-salmon">Total Qty</td>
                                <td class="bg-salmon"><?php print $total_qty; ?></td>

                            </tr>
                            <?php
                                } else {
                            ?>
                            <tr><td colspan="5" style="text-align: center !important;">No Records Found.</td></tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="col-md-12 mb-5">
                <div class="container">
                     <div class="card">
                        <?php
                            $sales_breakdown_date_heading = "Daily Sales BreakDown";
                            if(!empty($start_date_filter) && !empty($end_date_filter)) {
                                $sales_breakdown_date_heading = "Sales BreakDown - ".date("m/d/Y",strtotime($start_date_filter))." to ".date("m/d/Y",strtotime($end_date_filter));
                            }
                        ?>
                        <div class="card-header " style="text-align: center !important;"><?php print $sales_breakdown_date_heading; ?></div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="card-body p-3">
                                        <div class="container  p-0">
                                            <!-- <div class="table1-con"> -->
                                                <table class="table mb-0 table-bordered table-hover">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th colspan="3" style="text-align:center;">Sales Breakdown</th>                        
                                                        </tr>
                                                        <tr>
                                                            <th >Description</th>
                                                            <th >Count</th>
                                                            <th >Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                        
                                                        <tr>
                                                            <td>Gross Sales</td>
                                                            <td><?php print $DailySalesBreakDownReport[0]->gross_sales_cnt; ?></td>
                                                            <td>$<?php print number_format($DailySalesBreakDownReport[0]->gross_sales,2); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Net Sales</td>
                                                            <td><?php print $DailySalesBreakDownReport[0]->gross_sales_cnt; ?></td>
                                                            <td>$<?php print number_format($DailySalesBreakDownReport[0]->net_sales,2); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Tax</td>
                                                            <td><?php print $DailySalesBreakDownReport[0]->tax_count; ?></td>
                                                            <td>$<?php print number_format($DailySalesBreakDownReport[0]->total_tax,2); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Container Deposit</td>
                                                            <td><?php print $DailySalesBreakDownReport[0]->container_deposit_count; ?></td>
                                                            <td>$<?php print number_format($DailySalesBreakDownReport[0]->total_container_deposit,2); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Discounts</td>
                                                            <td><?php print $DailySalesBreakDownReport[0]->discount_count; ?></td>
                                                            <td>$<?php print number_format($DailySalesBreakDownReport[0]->total_discount,2); ?></td>
                                                        </tr>                                        
                                                    </tbody>
                                                </table>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-3">
                                     <table class="table table-bordered table-hover" style="width:97%;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th colspan="3" style="text-align:center;">Mode of Payment</th>
                                            </tr>
                                            <tr>
                                                 <th >Description</th>
                                                 <th >Count</th>
                                                 <th >Amount</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cash</td>
                                                <td><?php print $DailySalesBreakDownReport[0]->tot_cash_count; ?></td>
                                                <td>$<?php print number_format($DailySalesBreakDownReport[0]->tot_cash_amount,2); ?></td>
                                            </tr>
                                                <tr>
                                                    <td>Credit/Debit Card</td>
                                                    <td><?php print $DailySalesBreakDownReport[0]->tot_card_count; ?></td>
                                                    <td>$<?php print number_format($DailySalesBreakDownReport[0]->tot_card_amount,2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>EBT</td>
                                                    <td><?php print $DailySalesBreakDownReport[0]->tot_ebt_count; ?></td>
                                                    <td>$<?php print number_format($DailySalesBreakDownReport[0]->tot_ebt_amount,2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="visibility: hidden;">EBT</td>
                                                    <td style="visibility: hidden;"></td>
                                                    <td style="visibility: hidden;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="visibility: hidden;">EBT</td>
                                                    <td style="visibility: hidden;"></td>
                                                    <td style="visibility: hidden;"></td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>  
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="container">
                    <!-- <div class="row"> -->
                        <!-- <div class="col-md-12 text-right"> -->
                            <!-- <div class="slt-con col-md-12"> -->
                                <!-- <label for="">Category Name:</label> 
                                <select class="form-control" name="sales_report_category" id="sales_report_category" aria-label="Default select example" style="width: 30%; display: inline-block;">
                                    <option selected>Select One Category</option>                                    
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
                                </select>                                 -->
                            <!-- </div> -->
                        <!-- </div> -->

                    <!-- </div> -->
                    <div class="row mt-3">
                         
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <?php
                                            $ct_breakdown_date_heading = "Daily Category Type BreakDown";
                                            if(!empty($start_date_filter) && !empty($end_date_filter)) {
                                                $ct_breakdown_date_heading = "Category Type BreakDown - ".date("m/d/Y",strtotime($start_date_filter))." to ".date("m/d/Y",strtotime($end_date_filter));
                                            }
                                        ?>
                                        <div class="card-header"><?php print $ct_breakdown_date_heading; ?></div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Category</th>
                                                        <th>Qty</th>
                                                        <th>Sales</th>
                                                        <th class="text-nowrap">Sales%</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $daily_category_wise_breakdown_lable = array();
                                                    $daily_category_wise_breakdown_value = array();
                                                    $daily_category_wise_breakdown_id    = array();
                                                    if(!empty($DailyCategoryWiseBreakDown)) {

                                                        $cat_arr_qty_cnt2 = array();
                                                        foreach ($DailyCategoryWiseBreakDown as $key_dcb3 => $value_dcb3) {
                                                            if($value_dcb3["category_name"]!=""){
                                                                if(!empty($cat_arr_qty_cnt2[$value_dcb3["category_id"]])) {
                                                                    $cat_arr_qty_cnt2[$value_dcb3["category_id"]] = $cat_arr_qty_cnt2[$value_dcb3["category_id"]] + $value_dcb3["tot_qty"];
                                                                } else {
                                                                    $cat_arr_qty_cnt2[$value_dcb3["category_id"]] = $value_dcb3["tot_qty"];
                                                                }
                                                            }
                                                        }
                                                    }                              

                                                    if(!empty($DailyCategoryWiseBreakDown)) {
                                                        foreach ($DailyCategoryWiseBreakDown as $key_dcb2 => $value_dcb4) {
                                                            if($value_dcb4["category_name"]!=""){
                                                            $daily_category_wise_breakdown_lable[] = get_short_string($value_dcb4["category_name"], 3);

                                                            $per2 = $value_dcb4["tot_qty"] * 100 / array_sum($cat_arr_qty_cnt2);

                                                            $daily_category_wise_breakdown_value[] = number_format($per2,2);

                                                            $daily_category_wise_breakdown_id[] = $value_dcb4["category_id"];
                                                            
                                                    ?>
                                                    <tr>
                                                        <td><?php print ($value_dcb4["category_name"]=='')?'Miscellaneous':$value_dcb4["category_name"]; ?></td>
                                                        <td><?php print $value_dcb4["tot_qty"]; ?></td>
                                                        <td>$<?php print number_format($value_dcb4["sales"],2); ?></td>
                                                        <td><?php print number_format($per2,2); ?>%</td>
                                                    </tr>
                                                    <?php }
                                                            }
                                                        } else {
                                                    ?>
                                                    <tr><td colspan="4">No Records Found.</td></tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <canvas id='pie4'></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card daily_cat_type_breakdown">
                                        <?php
                                        $cat_name = "";
                                        $daily_category_breakdown_lable = array();
                                        $daily_category_breakdown_value = array();
                                        if(!empty($DailyCategoryBreakDown)) {

                                            $cat_arr_qty_cnt = array();
                                            foreach ($DailyCategoryBreakDown as $key_dcb => $value_dcb) {
                                                $cat_name = $value_dcb["category_name"];

                                                if(!empty($cat_arr_qty_cnt[$value_dcb["category_id"]])) {
                                                    $cat_arr_qty_cnt[$value_dcb["category_id"]] = $cat_arr_qty_cnt[$value_dcb["category_id"]] + $value_dcb["tot_qty"];
                                                } else {
                                                    $cat_arr_qty_cnt[$value_dcb["category_id"]] = $value_dcb["tot_qty"];
                                                }
                                            }
                                        }                                        
                                        ?>

                                        <?php                                            
                                            if($cat_name == '')
                                                $cat_name = "Liquor";

                                            $ctr_breakdown_date_heading = "Daily ".$cat_name." Type BreakDown";
                                            if(!empty($start_date_filter) && !empty($end_date_filter)) {
                                                $ctr_breakdown_date_heading =  $cat_name." Type BreakDown <br>".date("m/d/Y",strtotime($start_date_filter))." to ".date("m/d/Y",strtotime($end_date_filter));
                                            }
                                        ?>

                                        <div class="card-header " style="padding:5px 2%;"><span style="max-width:50%;position: absolute;top:2%; font-size: 12px;"><?php print $ctr_breakdown_date_heading; ?></span>
                                            <select class="form-control" name="sales_report_category" id="sales_report_category" aria-label="Default select example" style="width: 50%; display: inline-block;float :right;">
                                                <option selected>Select One Category</option>                                    
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
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Unit Type</th>
                                                        <th>Quantity</th>
                                                        <th>Qty %</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if(!empty($DailyCategoryBreakDown)) {
                                                            foreach ($DailyCategoryBreakDown as $key_dcb2 => $value_dcb2) {

                                                                $daily_category_breakdown_lable[] = get_short_string($value_dcb2["product_name"], 3);

                                                                $per = $value_dcb2["tot_qty"] * 100 / $cat_arr_qty_cnt[$value_dcb2["category_id"]];

                                                                $daily_category_breakdown_value[] = number_format($per,2);
                                                    ?>
                                                    <tr>
                                                        <td><?php print $value_dcb2["product_name"]; ?></td>
                                                        <td><?php print $value_dcb2["tot_qty"]; ?></td>
                                                        <td><?php print number_format($per,2); ?>%</td>

                                                    </tr>
                                                    <?php
                                                            }
                                                        } else {
                                                    ?>
                                                    <tr><td colspan="3">No Records Found.</td></tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <canvas id='pie3'></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var ctx7 = document.getElementById('pie3').getContext('2d');
    //pie3
    var pie3 = new Chart(ctx7, {
        type: 'pie',
        data: {
            labels: [<?php if(!empty($daily_category_breakdown_lable)) print "'".implode("','", $daily_category_breakdown_lable)."'"; ?>],
            datasets: [{
                fill: true,
                backgroundColor: [
                    'skyblue',
                    'olivegreen',
                    '#FF843F',
                    'gray', 
                    'pink', 
                    '#a991d8'
                ],
                data: [<?php if(!empty($daily_category_breakdown_value)) print implode(",", $daily_category_breakdown_value); ?>],

            }]
        },
        options: {
            legend: {
                onClick: (e) => e.stopPropagation()
            }            
        }
    });

    var ctx8 = document.getElementById('pie4').getContext('2d');

    //pie4
    var canvasP4 = document.getElementById("pie4");
    var ctxP4 = canvasP4.getContext('2d');
    var pie4 = new Chart(ctxP4, {       
        type: 'pie',
        data: {
            labels: [<?php if(!empty($daily_category_wise_breakdown_lable)) print "'".implode("','", $daily_category_wise_breakdown_lable)."'"; ?>],
            datasets: [{
                fill: true,
                backgroundColor: [
                    'slategray',
                    'orangeyellow', 
                    'orange', 
                    'darkgreen',
                    'gray', 
                    'pink', 
                    '#a991d8'
                ],
                data: [<?php if(!empty($daily_category_wise_breakdown_value)) print implode(",", $daily_category_wise_breakdown_value); ?>],
                custom_param : [<?php if(!empty($daily_category_wise_breakdown_id)) print "'".implode("','", $daily_category_wise_breakdown_id)."'"; ?>]
            }]
        },
        options: {
            legend: {
                onClick: (e) => e.stopPropagation()
            }            
        }
    });

    $("#pie4").click(function(event) {

        var activePoints = pie4.getElementsAtEvent(event);
        var activeDataSet = pie4.getDatasetAtEvent(event);

        if (activePoints.length > 0) {

            var clickedDatasetIndex = activeDataSet[0]._datasetIndex;
            var clickedElementIndex = activePoints[0]._index;
            var value = pie4.data.datasets[clickedDatasetIndex].custom_param[clickedElementIndex];

            var bin_filter_arr_encoded = 0;
            if(value != "") {
                var label_temp_btoa = window.btoa(value);
                label_temp_btoa = label_temp_btoa.replaceAll('=','_');
                bin_filter_arr_encoded = encodeURIComponent(label_temp_btoa);
            }
            window.open('<?php print base_url(); ?>cashier/cbdreports/'+bin_filter_arr_encoded,'_self');
        }
    });
</script>