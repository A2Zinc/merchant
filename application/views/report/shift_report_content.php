<div class="row">
    <div class="col-md-12 body2 p-0">
        <div class="body2">
            <div class="header d-flex justify-content-center mt-5 flex-column">                                        
                <div class="star-row-wrapper d-flex flex-column justify-content-center align-items-center">
                    <div class="stars bold">
                        ************************************************************
                    </div>
                    <div class="row-title">SHIFT REPORT</div>
                    <div class="stars bold">
                        ************************************************************
                    </div>
                </div>
            </div>
        </div>
        <div class="table-container-sr">
            <table class="tableone">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Business Date:</td>
                        <td><?php print date("m/d/Y"); ?></td>
                    </tr>
                    <tr>
                        <td>Requested By:</td>
                        <td><?php print $this->session->userdata["name"]; ?></td>
                    </tr>
                    <tr>
                        <td>Employee Name:</td>
                        <td><?php print $shift_report_ajax[0]["first_name"]." ".$shift_report_ajax[0]["last_name"]; ?></td>
                    </tr>
                    <tr>
                        <td>Print Date:</td>
                        <td style="white-space: break-spaces"><?php print date("m/d/Y"); ?></td>
                    </tr>
                    <tr>
                        <td>Terminal #:</td>
                        <td>Terminal 1</td>
                    </tr>
                    <tr>
                        <td>ADJ PROCEEDS:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>+&emsp; CASH IN DRAWER:</td>
                        <td>$<?php if($shift_report_ajax[0]["tot_cash_in_drawer"] != "") print str_replace(",", "", $shift_report_ajax[0]["tot_cash_in_drawer"]); else print "0.00"; ?></td>
                    </tr>
                    <tr>
                        <td>+&emsp; COIN DISPENSER:</td>
                        <td>$<?php if($shift_report_ajax[0]["tot_coin_dispenser_in"] != "") print str_replace(",", "", $shift_report_ajax[0]["tot_coin_dispenser_in"]); else print "0.00"; ?></td>
                    </tr>
                    <tr>
                        <td>+&emsp; CASH SALES:</td>
                        <td>$
                            <?php
                            if($shift_report_ajax[0]["cash_sales"] != "") {

                                if($shift_report_ajax[0]["redeem_discount_db"] != "")
                                    print str_replace(",", "", $shift_report_ajax[0]["cash_sales"]) + $shift_report_ajax[0]["redeem_discount_db"];
                                else
                                    print str_replace(",", "", $shift_report_ajax[0]["cash_sales"]); 

                            } else {
                                print "0.00"; 
                            }
                            ?>
                                
                        </td>
                    </tr>
                    <tr>
                        <td>+&emsp; NON-CASH SALE:</td>
                        <td>$<?php if($shift_report_ajax[0]["card_sales"] != "") print str_replace(",", "", $shift_report_ajax[0]["card_sales"]); else print "0.00"; ?></td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;CREDIT CARD</td>
                        <td>$
                            <?php if($shift_report_ajax[0]["card_sales_credit"] != "") print str_replace(",", "", $shift_report_ajax[0]["card_sales_credit"]); else print "0.00"; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;DEBIT CARD</td>
                        <td>$
                            <?php if($shift_report_ajax[0]["card_sales_debit"] != "") print str_replace(",", "", $shift_report_ajax[0]["card_sales_debit"]); else print "0.00"; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;EBT</td>
                        <td>$
                            <?php if($shift_report_ajax[0]["card_sales_ebt"] != "") print str_replace(",", "", $shift_report_ajax[0]["card_sales_ebt"]); else print "0.00"; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>-&emsp; LOYALTY DISCOUNT:</td>
                        <td>$<?php if($shift_report_ajax[0]["redeem_discount_db"] != "") print str_replace(",", "", $shift_report_ajax[0]["redeem_discount_db"]); else print "0.00"; ?></td>
                    </tr>
                    <tr>
                        <td>-&emsp; REFUND AMOUNT:</td>
                        <td>$<?php if($shift_report_ajax[0]["refund_amount"] != "") print str_replace(",", "", $shift_report_ajax[0]["refund_amount"]); else print "0.00"; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>        

        <div class="star-row-wrapper d-flex flex-column justify-content-center align-items-center">
            <div class="stars bold">
                ************************************************************
            </div>
            <div class="row-title">PAYOUTS</div>
            <div class="stars bold">
                ************************************************************
            </div>
        </div>
        <div class="table-container-sr">
            <table class="tableone withBorders">
                <thead>
                    <tr>
                        <th>User</th>
                        <th style="text-align:center;">Time</th>
                        <th style="text-align:center;">Amount</th>
                        <th style="text-align:center;">Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $payout_total = 0.00;
                        if(!empty($shift_report_payout_ajax)) {
                            foreach ($shift_report_payout_ajax as $k => $v) {
                                $payout_total = $payout_total + $v["payout_money"];
                    ?>
                    <tr>
                        <td width="50%"><?php print $v["supplier_emp_name"]; ?></td>
                        <td style="text-align:center;"><?php print date("H:i",strtotime($v["created_at"])); ?></td>
                        <td style="text-align:center;">$<?php print $v["payout_money"]; ?></td>
                        <td style="text-align:center;">
                            <?php
                                if($v["type"] == "Vendor") {
                                    print "V";
                                } else if($v["type"] == "Employee") {
                                    print "E";
                                } else {
                                    print "S";
                                }
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
        <br>
        <div class="table-container-sr">
            <table class="tableone">                                        
                <tbody>                                            
                    <tr>
                        <td><strong>TOTAL PAYOUTS:</strong></td>
                        <td><strong>$<?php print number_format($payout_total,2); ?></strong></td>
                    </tr>                                            
                </tbody>
            </table>
        </div>

        <div class="star-row-wrapper d-flex flex-column justify-content-center align-items-center">
            <div class="stars bold">
                ************************************************************
            </div>
            <div class="row-title">CASH DROPS</div>
            <div class="stars bold">
                ************************************************************
            </div>
        </div>
        <div class="table-container-sr">
            <table class="tableone withBorders">
                <thead>
                    <tr>
                        <th>User</th>
                        <th style="text-align:center;">Time</th>
                        <th style="text-align:center;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $cashdrop_total = 0.00;
                        if(!empty($shift_report_cashdrop_ajax)) {
                            foreach ($shift_report_cashdrop_ajax as $kk => $vv) {
                                $cashdrop_total = $cashdrop_total + $vv["cash_amount"];
                    ?>
                    <tr>
                        <td width="50%"><?php if($vv["username"] != "") print $vv["username"]; else print "-"; ?></td>
                        <td style="text-align:center;"><?php print date("H:i",strtotime($vv["datetime"])); ?></td>
                        <td style="text-align:center;">$<?php print $vv["cash_amount"]; ?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <br>
        <div class="table-container-sr">
            <table class="tableone">                                        
                <tbody>                                            
                    <tr>
                        <td><strong>TOTAL CASH DROPS:</strong></td>
                        <td><strong>$<?php print number_format($cashdrop_total,2); ?></strong></td>
                    </tr>                                            
                </tbody>
            </table>
        </div>
        <br>

        <div class="table-container-sr">
            <table class="tableone">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>                                            
                    <tr>
                        <td><strong>REQUIRED CASH:</strong></td>
                        <td>
                            <?php
                            $tot_cash_in_drawer = ($shift_report_ajax[0]["tot_cash_in_drawer"] != "") ? str_replace(",", "", $shift_report_ajax[0]["tot_cash_in_drawer"]) : 0;

                            $tot_coin_dispenser_in = ($shift_report_ajax[0]["tot_coin_dispenser_in"] != "")?str_replace(",", "", $shift_report_ajax[0]["tot_coin_dispenser_in"]): "0.00";

                            $cash_transaction = ($shift_report_ajax[0]["cash_sales"] != "") ? str_replace(",", "", $shift_report_ajax[0]["cash_sales"]) : 0;

                            $card_sales = ($shift_report_ajax[0]["card_sales"] != "") ? str_replace(",", "", $shift_report_ajax[0]["card_sales"]) : "0.00";

                            $refund_amount = ($shift_report_ajax[0]["refund_amount"] != "") ? str_replace(",", "", $shift_report_ajax[0]["refund_amount"]) : "0.00";

                            $required_cash = ($tot_cash_in_drawer + $tot_coin_dispenser_in + $cash_transaction ) - ($payout_total + $cashdrop_total + $refund_amount);
                            print "$".$required_cash;
                            ?>                            
                        </td>
                    </tr>
                    <tr>
                        <td><strong>CLOSED CASH:</strong></td>
                        <td>
                            <?php
                            $tot_cash_out_drawer = ($shift_report_ajax[0]["tot_cash_out_drawer"] != "") ? str_replace(",", "", $shift_report_ajax[0]["tot_cash_out_drawer"]) : 0.00;
                            ?>
                            $<?php print $tot_cash_out_drawer; ?>
                                
                        </td>
                    </tr>
                    <tr>
                        <td><strong>DIFFERENCE:</strong></td>
                        <td>                            
                            <?php                            
                                $diff_value = $required_cash - $tot_cash_out_drawer;
                                $diff_value = abs($diff_value);
                                $diff_value = number_format($diff_value,2);


                                if($required_cash < $tot_cash_out_drawer) {
                                    $html = "<span style='color:green;'> + $".$diff_value."</span>";
                                } else if($required_cash > $tot_cash_out_drawer) {
                                    $html = "<span style='color:red;'> - $".$diff_value."</span>";
                                } else {
                                    $html = "<span style='color:black;'>$".$diff_value."</span>";
                                }
                                print $html;
                            ?>                            
                        </td>
                    </tr>                                            
                </tbody>
            </table>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </div>
</div>