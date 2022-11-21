<link rel="stylesheet" href="<?php print base_url(); ?>assets/report/css/Chart.min.css" />
<link rel="stylesheet" href="<?php print base_url(); ?>assets/report/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php print base_url(); ?>assets/report/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/report/css/daterangepicker.css" />
<link  rel="stylesheet" src="<?php echo base_url(); ?>assets/cashier/bootstrap-datepicker/bootstrap-datepicker.css"></link>
<link rel="stylesheet" href="<?php print base_url(); ?>assets/style/bootstrap-multiselect.css" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/cashier/style/datatable@1.10.22/jquery.dataTables.css"/>

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets/cashier/js/jquery-3.5.1.min.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/bootstrap.min.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/moment.min.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/daterangepicker.min.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/jquery.dataTables.min.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/dataTables.buttons.min.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/buttons.html5.min.js"></script>
<script src="<?php print base_url(); ?>assets/core/bootstrap-multiselect.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/jszip.min.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/pdfmake.min.js"></script>
<script src="<?php print base_url(); ?>assets/report/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/cashier/sweetalert@2.1.2/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/cashier/js/KeyboardPOS.js"></script>
<script src="<?php echo base_url(); ?>assets/cashier/js/cashier.js"></script>

<style>
    .moveup {
    bottom: 0em !important;
    }
    .open {
        all: unset;
    }

    .dropdown-toggle::after {
        all: unset;
    }

    .l-auto {
        left: auto;
    }

    #wrapper {
        overflow-x: hidden;
    }

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
        width: 15rem;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
    }

    .card {
        padding-bottom: 0 !Important;
    }

    .setsrch {
        position: absolute;
        right: 1em;
    }

    .bg-rep.bg-dark {
        background-color: #EC4D4D !important;
    }

    @media only screen and (max-width : 991px) {
        /* Styles here */
        .setsrch {
            position: relative;
            right: 0;
        }
    }
    @media only screen and (min-width : 1024px) {
        /* Styles here */
        .btninbig{
            justify-content: flex-end!important;
            position: absolute;
            right: 1em;
            align-items: center;
        }
    }
    .bg-green {
        background-color: lightgreen;
    }

    .table1-con {
        max-height: 200px;
        overflow: scroll;
    }

    .circle {
        border-radius: 50%;
        height: 15px;
        width: 15px;
        margin: 0 auto;
    }

    .bg-orange {
        background: orange;
    }

    .bg-red {
        background: red;
    }

    .bg-black {
        background: black;
    }

    .second-scroller {
        max-height: 245px;
        overflow: scroll;
    }

    .row-divider {
        margin: 0;
        color: black;
        opacity: 1;
        background: black;
    }

    .linertd {
        padding: 0 !important;
        vertical-align: middle;
        height: 1px;
    }
    .w-46{
        width: 44%;
    }
    .daterangepicker {
        transform: scale(1.3);
        top: 7em!important;
    }
</style>

<style>
    #body2 {
        max-width: 80mm;
        margin: 0 auto;
    }

    * {
        font-size: 100%;
    }

    .body2 {
        max-width: 80mm;
        margin: 0 auto;
    }

    .src {
        filter: grayscale(1);
        width: 60%;
        margin: 0 auto;
    }

    .header {
        width: 100%;
        max-width: 80mm;
    }

    .stars {
        overflow: hidden;
        width: 100%;
    }

    .lines {
        width: 87%;
    }

    .right-col>p {
        text-align: left;
    }

    td:last-child {
        text-align: left;
    }

    td:nth-child(2) {
        text-align: left;
    }

    td:nth-child(3) {
        text-align: left;
    }

    .tq {
        text-align: left;
        font-weight: 600;
        font-size: 179%;
    }

    th {
        font-weight: 500;
    }

    .bold {
        font-weight: 900;
    }

    .bold-2 {
        font-weight: 600;
    }

    .bold-3 {
        font-weight: 500;
    }

    .titleText {
        font-size: 150%;
    }

    p {
        margin-bottom: 0.5em;
    }

    table {
        width: 100%;
    }

    thead>th:nth-child(1) {
        text-align: left;
    }

    th:last-child {
        text-align: left;
    }

    tr>td {
        text-align: left; !important;
        height: 30px;
    }

    tr>td:last-child {
        text-align: left; !important;
    }

    .text-center {
        text-align: left !important;
    }

    .quant {
        position: absolute;
    }

    @font-face {
        font-family: "Latin Mono";
        src: url("<?php print base_url() . '/assets/cashier/font/lmmonolt10-bold.otf'; ?>") format("opentype");
    }

    #body2 * {
        font-family: "Arial Narrow";
    }

    .product {
        /*text-decoration: underline;*/
    }

    .foot-text {
        font-size: 140%;
    }

    .left-col>p {
        margin-bottom: 0;
    }

    .right-col>p {
        margin-bottom: 0;
    }

    .textcon {
        max-width: 80mm;
    }

    .img-bar {
        max-width: 80mm;
    }

    .imp {
        word-wrap: break-word !important;
    }

    .w-56 {
        width: 56%;
    }

    .p-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .p-wrapper2 {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .row-title {
        font-weight: 600;
        font-size: 120%;
        text-align: center;
    }

    .tableone tr>td.text-center:last-child {
        text-align: center !important;
    }

    .withBorders>tbody>tr>td {
        border: 1px solid black !important;
    }

    .withBorders>thead>tr>th {
        border: 1px solid black !important;
    }
</style>

<style type="text/css">
    .timesheet-header{
        height: 350px !important;
        overflow: auto;
    }
    .sticky-header{
        position: sticky;
        top:-5px;
        z-index: 99!important;
        background: #EC4D4D;
    }
    .dt-buttons{
        position: absolute;
    }
    #table_inventory {

        margin: 0 auto;
        width: 100%;
        clear: both;
        border-collapse: collapse;
        table-layout: fixed;
        word-wrap: break-word;
    }

    table tr {
        border-left: 1px solid #F1F1F1;
        border-right: 1px solid #F1F1F1;
        border-top: 1px solid #F1F1F1;
        border-bottom: 1px solid #F1F1F1;
    }

    #table_inventory table>tr:hover {
        background: #F1F1F1 !important;
    }

    #table_inventory>thead>tr>th {

        color: white;
    }

    #table_inventory table>thead>tr:hover {
        background: #EC4D4D !important;
    }
    
    th.dt-center,
    td.dt-center {
        text-align: left;
    }

    .mobileimg{
        all:unset;
        margin-left:10px ;
        margin-right:10px ;
    }
    .bckbtn.btn-backWrapper.newredwrap.reportbackbtn{
        position: unset;
        right: unset;
        top: unset;
        transform: unset;
        background: darkred;
    }
    #tbl_timesheet_report_wrapper{
        height: 300px;
        overflow: auto;
    }
</style>

<style>
    .multiselect.dropdown-toggle.custom-select{
        width: 100%;
        max-height: 60px;
        margin-top: 0.1em;
    }
    .multiselect-native-select > .btn-group{
        width: 100%;
    }
    .dropdown-menu.show{
        width: 500;
        top: 40px;
        /* left: 50px; */
    }
    .multiselect-container {
        overflow-y: scroll;            
        height: 300px;
    }
    #top_selling_cats_filter ~  .btn-group >  .multiselect.dropdown-toggle.custom-select {
        max-height: unset;
        height: max-content;
    }
    #bin_filter ~  .btn-group >  .multiselect.dropdown-toggle.custom-select {
        max-height: unset;
        height: max-content;
    }
    #top_selling_cats ~  .btn-group >  .multiselect.dropdown-toggle.custom-select { 
        max-height: unset;
        height: max-content;
    }
    .mobileimg{
        all:unset;
        margin-left:10px ;
        margin-right:10px ;
    }
    .bckbtn.btn-backWrapper.newredwrap.reportbackbtn{
        position: unset;
        right: unset;
        top: unset;
        transform: unset;
        background: darkred;
    }
    .dropdown-menu .l-auto .show{
        width: 200px;
    }

    .buttons-pdf {
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
        padding: 8px;
        border-radius: 6px;
        margin-bottom: 10px;
    }
    .header-fix{
        max-height: 75%;
    }
    .header-fix-recon{
        max-height: 56%;
    }
    .header-fix-recon th{
        position: sticky;
        top: -4px;
    }
    .shift-header-fix{
        /* height: 420px; */
        overflow: auto;
    }
</style>

<script>
    function goBack(fromPage=''){

        if(fromPage != "")
            window.location.href = '<?php echo base_url(); ?>/cashier/reports?frompage='+fromPage;
        else
            window.location.href = '<?php echo base_url(); ?>/cashier/reports';
    }
    $('.gotopos').click(function(){
        window.location.href = '<?php echo base_url(); ?>/cashier/POSTerminal';
    })

    function CsvEscape(value) {        
        // return value.replaceAll(',','","');
        return '\"'+value+'\"';
    }

    function extendDataTable(datatable_obj,report_type="",store_name='',store_address='',store_daterange='') {

        var data = datatable_obj.buttons.exportData({
            "stripHtml": true,
            "columns": ':visible',
            "modifier": {
                "selected": true
            }
        });

        var rowsArray = data.body;
        var theadItem = data.header;
        
        var csv_data = "";
        var csv_data_comma = "";

        // Set Store name
        if(store_name != "") {
            csv_data += "Store Name,"+store_name+"###";
            csv_data += "Store Address,"+CsvEscape(store_address)+"###";
            csv_data += "Date Range,"+store_daterange+"\r\n\r\n###";
        }

        var innerRowItem = '<html><head></head><body><table cellspacing="5" style="background-color: #ffffff; border: 1px solid #F1F1F1;"><thead style="background: #EC4D4D;color: white;">';

        innerRowItem += '<tr>' ;

        for( var j=0, jien=theadItem.length ; j<jien ; j++ ) {
            innerRowItem += '<th>';
            innerRowItem +=  theadItem[j];
            innerRowItem += '</th>';

            csv_data += csv_data_comma+theadItem[j];
            csv_data_comma = ",";
        };

        csv_data += csv_data_comma+"###";

        innerRowItem += '</tr></thead><tbody style="background: #E7E9EB;color: #000000;">';  
        
        var is_data_empty = 0;
        for ( var h=0, hen=rowsArray.length ; h<hen ; h++ ) {
            var innerRowsArray = rowsArray[h];
            innerRowItem += '<tr style="background: #FFFFFF;">';
            csv_data_comma = "";
            var temp;
            for ( var i=0, ien=innerRowsArray.length ; i<ien ; i++ ) {

                temp = CsvEscape(innerRowsArray[i]);

                is_data_empty = 1;
                innerRowItem += '<td>';
                innerRowItem += innerRowsArray[i].replaceAll("&","###");
                innerRowItem += '</td>';
                csv_data += csv_data_comma+temp.replaceAll("&","###");
                csv_data_comma = ",";
            };

            // csv_data = "\"" + csv_data.replaceAll("\"", "\"\"") + "\"";
            // csv_data = CsvEscape(csv_data);            

            innerRowItem += '</tr>';
            csv_data += csv_data_comma+"###";
        };   

        innerRowItem += '</tbody></table></body></html>';

        if(is_data_empty == 0) {

            swal({
                  title: "Warning!",
                  text: "Data not available for mail.",
                  icon: "error",
                  buttons: false,
                  timer: 2700
            });
            return false;
        } else {
            sendemail_model(innerRowItem,csv_data,report_type);
        }
    }

    function sendemail_model(htmlData,csv_data,report_type) {

        localStorage.setItem('email_content',htmlData);
        localStorage.setItem('csv_content',csv_data);
        localStorage.setItem('report_type',report_type);

        jQuery.noConflict();
        jQuery("#email_report_modal").modal('show');
    }

    // Send email when click button on the modal
    $(document).on("click",".send_email",function(e) {
        $("#overlay,.loader").show();
        var to_email          = $("#to_email").val();
        var cc_email          = $("#cc_email").val();
        var email_type_hidden = $("#email_type_hidden").val(); // 0 - means all report / 1 - only for shift report

        if(to_email == "") {

            swal({
                  title: "Warning!",
                  text: "To email can not be blank.",
                  icon: "error",
                  buttons: false,
                  timer: 2700
            });
            $("#overlay,.loader").hide();
            return false;            
        }

        if(cc_email == "") {

            swal({
                  title: "Warning!",
                  text: "CC email can not be blank.",
                  icon: "error",
                  buttons: false,
                  timer: 2700
            });
            $("#overlay,.loader").hide();
            return false;            
        }

        var htmlData    = localStorage.getItem('email_content');
        var csvData     = localStorage.getItem('csv_content');
        var report_type = localStorage.getItem('report_type');

        if(email_type_hidden == 1) {

            var form=$("#shift_report_frm");
            $.ajax({
                url: base_url+"cashier/reports/shift_report_export_email",
                type: "POST",
                dataType: "text",
                data:form.serialize()+"&report_type="+report_type+"&to_email="+to_email+"&cc_email="+cc_email,
                success:function(data) {
                    $("#overlay,.loader").hide();

                    localStorage.setItem('email_content','');
                    localStorage.setItem('csv_content','');
                    localStorage.setItem('report_type','');
                    
                    swal({
                          title: "Success!",
                          text: "Email sent successfully.",
                          icon: "success",
                          buttons: false,
                          timer: 2700
                    });

                    $("#email_type_hidden").val(0);
                    jQuery.noConflict();
                    $("#email_report_modal").modal('hide');
                }
            });
            e.stopImmediatePropagation();
            return false;

        } else {

            $.ajax({
                url: base_url+"cashier/reports/sendemail",
                type: "POST",
                dataType: "text",
                data: "emailbody=" + htmlData,
                data: "emailbody="+htmlData+"&report_type="+report_type+"&csv_data="+csvData+"&to_email="+to_email+"&cc_email="+cc_email,
                success:function(data) {
                    $("#overlay,.loader").hide();
                    localStorage.setItem('email_content','');
                    localStorage.setItem('csv_content','');
                    localStorage.setItem('report_type','');
                    swal({
                          title: "Success!",
                          text: "Email sent successfully.",
                          icon: "success",
                          buttons: false,
                          timer: 2700
                    });
                    jQuery.noConflict();
                    $("#email_report_modal").modal('hide');
                }
            });
            e.stopImmediatePropagation();
            return false;
        }
    });

    function get_report_ajax(report_name) {
        $('.date_range_li').hide();
        var main_url = "";
        if(report_name == 'shift-report') {
            main_url=base_url+"cashier/shift_reports_ajax";
        } else if(report_name == 'sales-report') {
            main_url=base_url+"cashier/sales_report_ajax";
        } else if(report_name == 'recon-report') {
            main_url=base_url+"cashier/recon_report_ajax";
        } else if(report_name == 'pay-report') {
            main_url=base_url+"cashier/pay_report_ajax";
        } else if(report_name == 'timesheet-report') {
            main_url=base_url+"cashier/timesheet_report_menu_ajax";
        } else if(report_name == 'card-transaction-report') {
            main_url=base_url+"cashier/card_transaction_report_ajax";
        } else if(report_name == 'audit-log-report') {
            main_url=base_url+"cashier/audit_log_report_ajax";
        } else if(report_name == 'scartch-summary') {
            main_url=base_url+"cashier/scartch_summary_report_ajax";
        } else if(report_name == 'inventory-report') {
            main_url=base_url+"cashier/inventory_report_ajax";
        }

        $("#overlay,.loader").show();
        $.ajax({
            url: main_url,
            type: "POST",
            dataType: "html",
            data: "report_name=" + report_name,
            success:function(data){
                $("#overlay,.loader").hide();
                $('#over_view_main').hide();
                $('#div_ajax_report').html(data);
            }
        });
    }
    
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
                        extendDataTable(tbl_inventory,"Scratcher Payout Summary");
                    }
                }
            ],
            "initComplete":function(settings, json) {
            $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
            Keyboard.init('full');
            }
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
                        extendDataTable(tbl_inventory2,"Employee Payout Summary");
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
                        extendDataTable(tbl_inventory3,"Vendor Payout Summary");
                    }
                }
            ],
        });

        var tbl_inventory4 = $('#tbl_card_transaction').DataTable({
            "pageLength": 10,
            "autoWidth": true,
            "bLengthChange": false,
            // "responsive": true,
            "scrollX": true,
            "scrollY": "46vh",
            "scrollCollapse": true,
            // dom: 'Bfrtip',
            // buttons: [
            //     {
            //         extend: 'pdf',
            //         text: 'Email',
            //         action: function () {
            //             extendDataTable(tbl_inventory4,"Card Transaction Report");
            //         }
            //     }
            // ],
            "initComplete":function(settings, json) {
                $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
                Keyboard.init('full');
            }
        });

        var tbl_inventory5 = $('#tbl_audit_log').DataTable({
            "pageLength": 10,
            "autoWidth": true,
            "bLengthChange": false,
            // "responsive": true,
            "fixedHeader": true,
            "scrollX": true,
            "scrollY": "46vh",
            "scrollCollapse": true,
            // dom: 'Bfrtip',
            // buttons: [
            //     {
            //         extend: 'pdf',
            //         text: 'Email',
            //         action: function () {
            //             extendDataTable(tbl_inventory5,"Audit Log Report");
            //         }
            //     }
            // ],
            "initComplete":function(settings, json) {
                $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
                Keyboard.init('full');
            }
        });

        var tbl_inventory6 = $('#tbl_scratcher_inventory_summary').DataTable({
            "pageLength": 10,
            "autoWidth": true,
            "bLengthChange": false,
            // "responsive": true,
            "fixedHeader": true,
            "scrollX": true,
            "scrollY": "46vh",
            "scrollCollapse": true,
            // dom: 'Bfrtip',
            // buttons: [
            //     {
            //         extend: 'pdf',
            //         text: 'Email',
            //         action: function () {
            //             extendDataTable(tbl_inventory6,"Scratcher Sales Report");
            //         }
            //     }
            // ],
            "initComplete":function(settings, json) {
                $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
                Keyboard.init('full');
            }
        });

        var tbl_inventory7 = $('#tbl_shift_report').DataTable({
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
                        exportCSVShiftReport(tbl_inventory7,"Shift Report");
                        // extendDataTable(tbl_inventory7,"Shift Report");
                    }
                }
            ],
            "initComplete":function(settings, json) {
            $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
            Keyboard.init('full');
            }
        });

        // Inventory Report Datatable
        var tbl_inventory8 = $('#tbl_inventory_report').DataTable({
            "pageLength": 10,
            "autoWidth": true,
            "bLengthChange": false,
            // "responsive": true,
            fixedHeader: true,
            "scrollX": true,
            "scrollY": "46vh",
            "scrollCollapse": true,

            // Incase you need a button INTEGRATED to the table that exports data, uncomment below block.
            // dom: 'Bfrtip',
            // buttons: [
            //     {
            //         extend: 'pdf',
            //         text: 'Email',
            //         action: function () {
            //             extendDataTable(tbl_inventory8,"Inventory Report");
            //         }
            //     }
            // ],
            "initComplete":function(settings, json) {
                $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
                Keyboard.init('full');
                }
            }); 
        
        $(document).on('click', 'body', function(e) {
            var container = $(".keyboard");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if (!$("input").is(":focus")) {
                    KeyboardNum.close()
                    Keyboard.close()
                }
            } else {
                console.log("Inside click");
            }
        });

        function exportCSVShiftReport(datatable_obj,report_type="") {

            var data = datatable_obj.buttons.exportData({
                "stripHtml": true,
                "columns": ':visible',
                "modifier": {
                    "selected": true
                }
            });

            var rowsArray = data.body;
            
            var is_data_empty = 0;
            for ( var h=0, hen=rowsArray.length ; h<hen ; h++ ) {
                var innerRowsArray = rowsArray[h];
                for ( var i=0, ien=innerRowsArray.length ; i<ien ; i++ ) {                
                    is_data_empty = 1;
                };
            };

            if(is_data_empty == 0) {

                swal({
                      title: "Warning!",
                      text: "Data not available for mail.",
                      icon: "error",
                      buttons: false,
                      timer: 2700
                });
                return false;
            } else {

                localStorage.setItem('email_content',"");
                localStorage.setItem('csv_content',"");
                localStorage.setItem('report_type',report_type);
                
                jQuery.noConflict();
                $("#email_report_modal").modal('show');
                $("#email_type_hidden").val(1);
            }
        }
</script>

<!-- ST - Modal for Email -->
<div class="modal fade email_report_modal" id="email_report_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="email_type_hidden" id="email_type_hidden" value="0">
                <?php
                    $mail_settings = $this->Cashier_model->get_mail_settings();
                ?>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">To:</label>
                    <input type="text" class="form-control use-keyboard-input" name="to_email" id="to_email" value="<?php print $mail_settings["to_email"]; ?>">
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">CC:</label>
                    <input type="text" class="form-control use-keyboard-input" name="cc_email" id="cc_email" value="<?php print $mail_settings["to_cc_email"]; ?>">
                    <i>(You can add multiple email using comma(,) separeted)</i>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-dark my-sm-0 form-control" data-dismiss="modal" style="width:100px;">Close</button>
                <button type="button" class="btn btn-primary btn-dark my-sm-0 form-control send_email" style="width:150px;">Send message</button>
            </div>
        </div>
    </div>
</div>
<!-- EN - Modal for Email -->