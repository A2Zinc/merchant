<?php    
    $daily_category_breakdown_lable = array();
    $daily_category_breakdown_value = array();
    if(!empty($DailyCategoryBreakDown)) {

        $cat_arr_qty_cnt = array();
        foreach ($DailyCategoryBreakDown as $key_dcb => $value_dcb) {            

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
<div class="card-header" style="padding:5px 2%;"><span style="max-width:50%;position: absolute;top:2%; font-size: 12px;"><?php print $ctr_breakdown_date_heading; ?></span>
    <select class="form-control" name="sales_report_category" id="sales_report_category" aria-label="Default select example" style="width: 50%; display: inline-block;float :right;">
        <option selected>Select One Category</option>                                    
        <?php foreach ($category as $c) {?>
            <option value="<?=$c['category_id']?>" <?php if($c['category_id']==$sales_report_category){echo 'SELECTED';}?> ><?=$c['category_name']?></option>

            <?php if(!empty($c['sub_cat'])){
                foreach($c['sub_cat'] as $sub_ct1){ ?>
                    <option value="<?=$sub_ct1['category_id']?>" <?php if($sub_ct1['category_id']==$sales_report_category){echo 'SELECTED';}?> >
                    <?=$c['category_name']?> > <?=$sub_ct1['category_name']?>
                    </option>
                    <?php if(!empty($sub_ct1['child_cat'])){
                    foreach($sub_ct1['child_cat'] as $sub_ct2){ ?>
                        <option value="<?=$sub_ct2['category_id']?>" <?php if($sub_ct2['category_id']==$sales_report_category){echo 'SELECTED';}?> ><?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                        <?=$sub_ct2['category_name']?>
                        </option>
                    <?php if(!empty($sub_ct2['grand_cat'])){
                        foreach($sub_ct2['grand_cat'] as $grnd_ct){ ?>
                    <option value="<?=$grnd_ct['category_id']?>" <?php if($grnd_ct['category_id']==$sales_report_category){echo 'SELECTED';}?> >
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
            <?php } ?>
        </tbody>
    </table>
    <canvas id='pie3'></canvas>
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
</script>