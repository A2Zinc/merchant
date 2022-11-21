<div class="col-md-12">
    <div class="h3">Reconciliation Report</div>
</div>    
<div class="col-md-6 my-3">
    <button class="btn btn-dark previous_day reconciliation_report_click" data-type="previous_day" data-date="<?php print $main_dates[0]; ?>"><<< Previous Day </button>
    <button class="btn btn-dark previous_week reconciliation_report_click" data-type="previous_week" data-date="<?php print $main_dates[0]; ?>"><<<< Previous Week </button>
</div>
<div class="col-md-6 text-right  my-3">
    <button class="btn btn-dark next_day reconciliation_report_click" data-type="next_day" data-date="<?php print $main_dates[6]; ?>">Next Day >>></button>
    <button class="btn btn-dark next_week reconciliation_report_click" data-type="next_week" data-date="<?php print $main_dates[6]; ?>">Next Week >>></button>
</div>

<div class="col-md-12 p-0">
    <div class="container table-responsive pt-1">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="bg-green">Cash In Report</th>
                    <?php foreach ($main_dates as $key => $value) { ?>
                    <th><?php print date("D m/d",strtotime($value)); ?></th>
                    <?php } ?>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    if(!empty($reconcillation_report)) {
                        $adj_proceeds = array(0=>'0.00',1=>'0.00',2=>'0.00',3=>'0.00',4=>'0.00',5=>'0.00',6=>'0.00');
                        
                        foreach ($reconcillation_report as $key_rr => $value_rr) {
                        if($key_rr == "opening_cash"){ ?>
                            <tr>
                                <td colspan="9" class="p-0 linertd">
                                    <hr class="row-divider">
                                </td>
                            </tr>
                        <?php }
                        
                            $i=0;
                ?>
                <tr>
                    <td class="bg-green">
                        <?php 
                            if($key_rr == "cash_proceeds" || $key_rr == "card_proceeds" || $key_rr == "cash_sales")
                                print '+ '.$value_rr["label"];
                            else if($key_rr == "crv_sales" || $key_rr == "sales_tax" || $key_rr == "payout" || $key_rr == "cash_drop")
                                print '- '.$value_rr["label"];
                            else if($key_rr == "actual_sales" || $key_rr == "actual_cash" || $key_rr == "net_sales")
                                print '= '.$value_rr["label"];
                            else
                                print $value_rr["label"];
                        ?>
                    </td>

                    <?php foreach ($value_rr["data"] as $value_dt) {

                        if($key_rr != "Status" && $key_rr != "Updated") {

                            if($key_rr == "net_sales" || $key_rr == "cash_proceeds") {
                                $adj_proceeds[$i]+= $value_dt;
                            }
                        }

                        if($key_rr == "Status" && $key_rr == "Updated") {

                            if($key_rr == "net_sales" || $key_rr == "cash_proceeds") {
                                $adj_proceeds[$i]+= $value_dt;
                            }
                        }
                    ?>
                    <td>
                        <div class="closed"><?php print $value_dt; ?></div>
                    </td>
                    <?php
                    $i++;
                    }
                    ?>                                
                </tr>
                <?php 
                        }
                    }
                ?>

                <!-- <tr>
                    <td colspan="9" class="p-0 linertd">
                        <hr class="row-divider">
                    </td>
                </tr>
                <tr>
                    <td class="bg-green">+ Opening Cash</td>
                    <td>$200</td>
                    <td>$100</td>
                    <td>$100</td>
                    <td>$100</td>
                    <td>$100</td>
                    <td>$100</td>
                    <td>$100</td>
                    <td>$100</td>
                </tr>
                <tr>
                    <td class="bg-green">+ Paid Outs</td>
                    <td>$0</td>
                    <td>$0</td>
                    <td>$0</td>
                    <td>$0</td>
                    <td>$0</td>
                    <td>$0</td>
                    <td>$0</td>
                    <td>$0</td>
                </tr>
                <tr>
                    <td class="bg-green">+ Credit Sales</td>
                    <td>-$400</td>
                    <td>-$400</td>
                    <td>-$400</td>
                    <td>-$400</td>
                    <td>-$400</td>
                    <td>-$400</td>
                    <td>-$400</td>
                    <td>-$400</td>
                </tr>
                <tr>
                    <td class="bg-green">+ Other Non Cash Sales</td>
                    <td>-$30</td>
                    <td>-$30</td>
                    <td>-$30</td>
                    <td>-$30</td>
                    <td>-$30</td>
                    <td>-$30</td>
                    <td>-$30</td>
                    <td>-$30</td>
                </tr>
                <tr>
                    <td class="bg-green">= Required Cash</td>
                    <td>$230</td>
                    <td>$330</td>
                    <td>$330</td>
                    <td>$330</td>
                    <td>$330</td>
                    <td>$330</td>
                    <td>$330</td>
                    <td>$330</td>
                </tr> -->
                <!-- <tr>
                    <td colspan="9" class="p-0 linertd">
                        <hr class="row-divider">
                    </td>
                </tr>
                <tr>
                    <td class="bg-green">Banked</td>
                    <td>$300</td>
                    <td>$300</td>
                    <td>$300</td>
                    <td>$300</td>
                    <td>$300</td>
                    <td>$300</td>
                    <td>$300</td>
                    <td>$300</td>
                </tr>
                <tr>
                    <td class="bg-green">+ Closed Cash</td>
                    <td>$200</td>
                    <td>$200</td>
                    <td>$200</td>
                    <td>$200</td>
                    <td>$200</td>
                    <td>$200</td>
                    <td>$200</td>
                    <td>$200</td>
                </tr>
                <tr>
                    <td class="bg-green">= Actual Cash</td>
                    <td>$500</td>
                    <td>$500</td>
                    <td>$500</td>
                    <td>$500</td>
                    <td>$500</td>
                    <td>$500</td>
                    <td>$500</td>
                    <td>$500</td>
                </tr>
                <tr>
                    <td class="bg-green">Difference</td>
                    <td>-$10</td>
                    <td>-$10</td>
                    <td>-$10</td>
                    <td>-$10</td>
                    <td>-$10</td>
                    <td>-$10</td>
                    <td>-$10</td>
                    <td>-$10</td>
                </tr> -->
            </tbody>
        </table>
        <!-- <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="bg-green">All</th>
                    <th>Thu 03/18</th>
                    <th>Fri 03/19</th>
                    <th>Sat 03/20</th>
                    <th>Sun 03/21</th>
                    <th>Mon 03/22</th>
                    <th>Tue 03/23</th>
                    <th>Wed 03/24</th>
                    <th>Total</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-green">Open</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="bg-green">+ Deliveries</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="bg-green">Total Product </td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="bg-green">+ Credits</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="bg-green">Usable Product</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="9" class="p-0 linertd">
                        <hr class="row-divider">
                    </td>
                </tr>
                <tr>
                    <td class="bg-green">- LEFT</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="bg-green">Products Used</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="9" class="p-0 linertd">
                        <hr class="row-divider">
                    </td>
                </tr>
                <tr>
                    <td class="bg-green">Total Sold</td>
                    <td>81.5</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>81.5</td>
                </tr>
                <tr>
                    <td class="bg-green">Adjustments</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="bg-green">= Adj Product Sold</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="9" class="p-0 linertd">
                        <hr class="row-divider">
                    </td>
                </tr>
                <tr>
                    <td class="bg-green">Difference</td>
                    <td>81.5</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>81.5</td>
                </tr>

            </tbody>
        </table> -->
    </div>
</div>