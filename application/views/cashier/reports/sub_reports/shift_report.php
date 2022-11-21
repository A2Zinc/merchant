<?php include_once(APPPATH."views/cashier/reports/inc/js_css.php"); ?>
<div class="container content dynamic_font_size" id='shift-report'>
    <div class="row">
        <div class="col-md-12 px-4">
            <p class="h4 ">Shift Report</p>
        </div>

        <div class="col-md-12 px-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" max="<?php echo date('Y-m-d'); ?>" name="start_date_sr_filter" id="start_date_sr_filter" class="form-control" value="<?php if(!empty($start_date_filter)){ print $start_date_filter; }else{ echo date('Y-m-d'); } ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" max="<?php echo date('Y-m-d'); ?>" name="end_date_sr_filter" id="end_date_sr_filter" class="form-control" value="<?php if(!empty($end_date_filter)){ print $end_date_filter;  }else{ echo date('Y-m-d'); } ?>">
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-dark my-2 my-sm-0 form-control" id="shift_report_go" type="button">Go</button>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-dark my-2 my-sm-0 form-control" id="shift_report_clear" type="button">Clear Filter</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 shift-header-fix">
            <div class="container table-responsive shift_report_append">
                <form name="shift_report_frm" id="shift_report_frm" method="post">
                    <table class="table table-bordered table-hover" id="tbl_shift_report">
                        <thead class="headsec">
                            <tr>
                                <th class="text-white">Date</th>
                                <th class="text-white">Shift Start Time</th>
                                <th class="text-white">Shift End Time</th>
                                <th class="text-white">Employee</th>
                                <th class="text-white text-center">POS Terminal</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            <?php
                                $shift_arr    = array();
                                $terminal_arr = array();

                                if(!empty($ShiftReport)) {
                                    foreach($ShiftReport as $k_sr => $v_sr) {
                                        $shift_arr[] = $v_sr["id"];
                                        $terminal_arr[] = $v_sr["terminal_id"];
                            ?>
                            <tr class="shift_report_data" data_shift_id="<?php print $v_sr["id"]; ?>" data_terminal_id="<?php print $v_sr["terminal_id"]; ?>">                                
                                <td><?php print date("m/d/Y",strtotime($v_sr["date"])); ?></td>
                                <td><?php print $v_sr["datetime_in"]; ?></td>
                                <td><?php print ($v_sr['shift_in_out']==2)?$v_sr["datetime_out"]:'-'; ?></td>
                                <td><?php print $v_sr["first_name"].' '.$v_sr["last_name"]; ?></td>
                                <td>Terminal 1</td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>                            
                        </tbody>
                    </table>
                    <input type="hidden" name="data_shift_id" value="<?php print implode(",",$shift_arr); ?>">
                    <input type="hidden" name="data_terminal_id" value="<?php print implode(",",$terminal_arr); ?>">
                </form>
            </div>
            <div class="report-con my-4">
                <div class="container shift_report_print_div" style="text-align: center; display: none; margin-top: 20px;">
                    <button type="button" class="btn btn-dark shift_report_print">Print</button>
                </div>
                <!-- <p class="h4">Cash in Drawer Report </p> -->
                <div class="container" id="shift_report_content_append">
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
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Requested By:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Print Date:</td>
                                            <td style="white-space: break-spaces"></td>
                                        </tr>
                                        <tr>
                                            <td>Terminal #:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>ADJ PROCEEDS:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>+&emsp; CASH IN DRAWER:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>+&emsp; COIN DISPENSER:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>+&emsp; CASH SALES:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>+&emsp; NON-CASH SALE</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>&emsp;&emsp;CREDIT CARD</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>&emsp;&emsp; DEBIT CARD</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>&emsp;&emsp; EBT</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>-&emsp; LOYALTY DISCOUNT</td>
                                            <td></td>
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
                                            <th>Time</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="table-container-sr">
                                <table class="tableone">
                                    <tbody>
                                        <tr>
                                            <td><strong>TOTAL PAYOUTS</strong></td>
                                            <td><strong></strong></td>
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
                                            <th>Time</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <br>
                            <div class="table-container-sr">
                                <table class="tableone">
                                    <tbody>
                                        <tr>
                                            <td><strong>TOTAL CASH DROPS</strong></td>
                                            <td><strong></strong></td>
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
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>CLOSED CASH:</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>DIFFERENCE:</strong></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Optional JavaScript -->
                            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>