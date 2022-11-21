<?php include_once(APPPATH."views/cashier/reports/inc/js_css.php"); ?>
<!-- ST - Audit Log Report -->
<div class="container content dynamic_font_size" id='audit-log-report'>
    <div class="row">
        <div class="col-md-12">
            <div class="h3">Audit Log Report</div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-3">
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" max="<?php echo date('Y-m-d'); ?>" name="start_date_al_filter" id="start_date_al_filter" class="form-control" value="<?php if(!empty($start_date_filter)){ print $start_date_filter; }else{ echo date('Y-m-d'); } ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>End Date</label>
                <input type="date" max="<?php echo date('Y-m-d'); ?>" name="end_date_al_filter" id="end_date_al_filter" class="form-control" value="<?php if(!empty($end_date_filter)){ print $end_date_filter; }else{ echo date('Y-m-d'); } ?>">
            </div>
        </div>

        <div class="col-md-1">
            <button class="btn btn-primary btn-dark mt-4 my-2 form-control" id="audit_log_report_go" type="button">Go</button>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary btn-dark mt-4 my-2 form-control" id="audit_log_report_clear" type="button">Clear Filter</button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary btn-dark mt-4 my-2 form-control" 
            onclick="extendDataTable(tbl_inventory5,'Audit Log Report')">Export to Email</button>
        </div>
    </div>

    <div class="audit_log_append">
        <table class="table table-bordered table-hover" id="tbl_audit_log" style="width: 100%">
            <thead class="headsec">
                <tr>
                    <th class="text-white">Date</th>
                    <th class="text-white">Module</th>
                    <th class="text-white">Action By</th>
                    <th class="text-white">Action</th>
                    <th class="text-white">Notification</th>

                    <!-- <th class="text-white">User</th> -->

                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($AuditLogReport)) {
                        foreach ($AuditLogReport as $key => $value) {
                ?>
                <tr>
                    <td><?php print date("m/d/Y H:i A",strtotime($value["created_at"])); ?></td>
                    <td><?php print $value["module"]; ?></td>
                    <td><?php print $value["action_by"]; ?></td>
                    <td><?php print $value["action"]; ?></td>
                    <td><?php print $value["notification"]; ?></td>
                    <!-- <td><?php //print $value["customer_name"]; ?></td> -->
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>
<!-- EN - Audit Log Report -->