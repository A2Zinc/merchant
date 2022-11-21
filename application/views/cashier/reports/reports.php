    <?php include_once("inc/js_css.php"); ?>
    <style>
    * {
      font-family: "Circular Std Book", sans-serif;
    }
    .keypad-btn-btn {
      font-size: 35px;
      background-color: lightgray;
      color: black;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 6px;
      font-weight: 600;
      height: 75px;
    }

    .keypad-btn-btn:active {
      background: gray;
    }
    .keypad-btn-btn2 {
      font-size: 20px;
      background-color: lightgray;
      color: black;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 6px;
      font-weight: 600;
      height: 75px;
    }

    .keypad-btn-btn2:active {
      background: gray;
    }

    .enterkeypad-btn-btn {
      all: unset;
      background-color: gray;
      width: auto;
      background: transparent;
      border: none;
      color: black;
      font-weight: 600;
      font-size: 34px;
    }

    .enterkeypad-btn-btn:hover {
        all: unset;
        background-color: rgb(33, 99, 75);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 2px;
        font-weight: 600;
        height: 55px;
    }

    </style>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
        function goBack(){
            console.log('go back fired')
            $('.content').hide();
        $('.firstContentSection').show();
        $('.nav-item').removeClass('active');
            $('.over').addClass('active');
        }
        $('.gotopos').click(function(){
            window.location.href = '<?php echo base_url(); ?>/cashier/POSTerminal';
        })
    </script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-rep bg-dark py-3 px-4">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <!-- <a class="navbar-brand gotohome" href="#">Reports</a> -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link over" href="#overview" >Overview <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item dropdown dd">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Reports <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                <div class="dropdown-menu l-auto" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" onclick="get_report_ajax('shift-report');" href="#1shift-report">Shift Report</a>
                                    <a class="dropdown-item" onclick="get_report_ajax('sales-report');" href="#sales-report">Sales Report</a>
                                    <a class="dropdown-item" onclick="get_report_ajax('recon-report');" href="#recon-report">Reconciliation Report</a>
                                    <a class="dropdown-item" onclick="get_report_ajax('pay-report');" href="#pay-report">Payout Report </a>
                                    <a class="dropdown-item" onclick="get_report_ajax('timesheet-report');" href="#timesheet-report">Timesheet Report</a>
                                    <a class="dropdown-item" onclick="get_report_ajax('card-transaction-report');" href="#card-transaction-report">Card Transaction Report</a>
                                    <a class="dropdown-item" onclick="get_report_ajax('audit-log-report');" href="#audit-log-report">Audit Log Report</a>
                                    <a class="dropdown-item" onclick="get_report_ajax('scartch-summary');" href="#scartch-summary">Scratcher Sales Report</a>
                                    <a class="dropdown-item" onclick="get_report_ajax('inventory-report');" href="#inventory-report">Inventory Report</a>
                                </div>
                            </li>

                            <!-- <li class="nav-item active">
                                <div class="mainscreen">
                                    <a href="<?php echo base_url(); ?>cashier">
                                        <p class="maindes">MAIN SCREEN</p>
                                    </a>

                                </div>
                            </li> setsrch-->
                            <li class="nav-item active date_range_li" id="date_range_li">
                                <div class="d-flex " style="padding-top: 2px; position: relative; /* margin-left: auto; */ left: calc(15% - 0vw);">
                                    <?php
                                        $tomorrow = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " -0 day");
                                    ?>
                                    <!-- <input class="form-control mr-sm-2" type="text"> -->
                                    <input type="text" name="daterange" value="<?php print date("m/d/Y", $tomorrow)." - ".date("m/d/Y"); ?>" class="form-control mr-sm-2" />
                                    <input type="hidden" name="start_date_range" id="start_date_range">
                                    <input type="hidden" name="end_date_range" id="end_date_range">
                                    <button class="btn btn-primary btn-dark my-2 my-sm-0 select_date_range_btn" type="button">Select Date</button>
                                </div>

                            </li>
                        </ul>
                        <div class="d-flex justify-content-end btninbig">
                        <!-- <button class="bckbtn btn-backWrapper newredwrap reportbackbtn" onclick="goBack();" >
                            <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="" >
                        </button> -->
                        <!-- <a href="<?php echo base_url(); ?>cashier/POSterminal"><img src="<?php echo base_url(); ?>/assets/images/Group 1882.png" alt="" class="mobileimg"></a> -->
                        <div>
                          <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" id="mobileimg" ></a>
                        </div>
                        <div class="mainscreen ml-3">

                                    <a href="<?php echo base_url(); ?>cashier">
                                        <p class="maindes">MAIN SCREEN</p>
                                    </a>

                                </div></div>


                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- <div id="overview"></div> -->
    <div class="container" id="sales_summary_category_process" style="display: none;">
        <div class="row">
            <div class="col-md-12">
                <span>Please wait while we are processing...</span>
            </div>
        </div>
    </div>

    <div class="container over_view_main content firstContentSection overview_append " id="over_view_main">

    </div>

    <div class="row content">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>

    <div class="div_ajax_report" id="div_ajax_report">

    </div>

    <div class="modal front-login1" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header custommodalheader">
            <h5 class="modal-title text-center w-100 m-0 custommodaltitle cashcenter" id="exampleModalLongTitle" style="font-size: 1.5rem;padding-left:35%">Ring Sales Login</h5>
            <button type="button" class="close" id="pos_close" data-dismiss="modal" aria-label="Close" style="font-size: 2.0rem;">
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <form action="" method="post" class="front_logins" autocomplete="off">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-5 m-0 p-0">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <input type="hidden" name="module" value="">
                        <label class="rolllabel" style="font-size: 21px;">Employee ID: *</label> </label>
                      <input type="tel" autofocus name="username" id="empid_12" class="form-control customcardinput inputFile11 takeInputLogin" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" style="font-size: 26px;">
                        <span class="errors" id="id2_err" style="color:red; font-size:20px"></span>
                      </div>
                    </div>

                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label class="rolllabel" style="font-size: 21px;">Employee Password: *</label> </label>
                        <input type="password" name="password" id="emppwd_12" class="form-control customcardinput inputFile11 takeInputLogin" aria-describedby="" maxlength="4" style="font-size: 26px;">
                        <span class="errors" id="pwd2_err" style="color:red; font-size:20px"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7 m-0 p-0">
                    <div class="row m-0 p-0">
                      <div class="col-md-4 m-0 text-center mt-2 mb-2">
                        <div class="keypad-btn-btn">7</div>
                      </div>
                      <div class="col-md-4 m-0 text-center mt-2 mb-2">
                        <div class="keypad-btn-btn">8</div>
                      </div>
                      <div class="col-md-4 m-0 text-center mt-2 mb-2">
                        <div class="keypad-btn-btn">9</div>
                      </div>
                      <!-- <div class="col-md-3 m-0 text-center mt-2 mb-2">
                        <div class="keypad-btn-btn backBTN">🠔</div>
                      </div> -->
                    </div>
                    <div class="row m-0 p-0">
                      <div class="col-md-4 m-0 text-center mt-2 mb-2">
                        <div class="keypad-btn-btn">4</div>
                      </div>
                      <div class="col-md-4 m-0 text-center mt-2 mb-2">
                        <div class="keypad-btn-btn">5</div>
                      </div>
                      <div class="col-md-4 m-0 text-center mt-2 mb-2">
                        <div class="keypad-btn-btn">6</div>
                      </div>
                      <!-- <div class="col-md-4 m-0 text-center mt-2 mb-2">
                        <div class="keypad-btn-btn tabBTN">Tab</div>
                      </div> -->
                    </div>
                    <div class="row m-0 p-0 mt-2">
                      <div class="col-md-4 m-0">
                        <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mb-3">1</div>
                        <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mt-2 backBTN">🠔</div>
                      </div>
                      <div class="col-md-4 m-0">
                        <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mb-3">2</div>
                        <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mt-2">0</div>
                      </div>
                      <div class="col-md-4 m-0">
                        <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn mb-3">3</div>
                        <div class="col-md-12 m-0 p-0 text-center keypad-btn-btn2 mt-2"><button type="submit" class=" enterKeypad-btn-btn h-100 w-100" id="btnFront_12" style="font-size: 175%;
    font-weight: 600;text-align: center;">Enter</button></div>
                      </div>
                      <!-- <div class="col-md-3 m-0 text-center">
                        <div class="col-md-12 m-0 p-0 text-center h-100 keypad-btn-btn"> <button type="submit" class="btn btn-primary enterkeypad-btn-btn h-100 w-100" id="btnFront_12">Enter</button></div>
                      </div> -->
                      <!-- <div class="col-md-3 m-0">a</div>
                      <div class="col-md-3 m-0">0</div>
                      <div class="col-md-3 m-0">.</div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div style="text-align: center;">
                <!--<but/ton type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>-->
                <!-- <button type="submit" class="btn btn-primary customcardfooteraddbtn btn" id="btnFront" style="width: 150px;">Login</button> -->
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>

<style type="text/css">
#overlay{
    position: fixed;
    width: 100%;
    height: 100%;
    background: black url(spinner.gif) center center no-repeat;
    opacity: 0.8;
    z-index: 9999999;
}
.loader {
  display: none;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 999999999;
  width: 50px;
  height: 50px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #ff5c00;
  border-bottom: 16px solid #4494de;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<div class="loader"></div>

<script>

$(document).ready( function(){


  $('#mobileimg').on('click', function() {
      var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
      if(shift_sess == ''){
          swal({
              title: "Oops!",
              text: "Please start shift first",
              icon: "error",
              buttons: false,
              timer :2700,
          });
          setTimeout( function (){
            window.location = '<?=base_url('cashier')?>';
          },2700);
      }else{
          $('#exampleModal').modal();
          setTimeout( function (){
              $('#empid_12').focus();
            },1000);
      }
  });

   $("#empid_12").keyup(function () {
        if ($(this).val().length == 2) {
          $('#emppwd_12').focus();
        }
    });

  $(document).on('keyup','#emppwd_12', function(){
      var pwd = $('#emppwd_12').val();
      if(pwd.length == 4){
        $('#btnFront_12').trigger('click');
      }
  });

  let  idFlag = false
  $(".takeInputLogin").focus(function() {
      currentField = document.activeElement
      // console.log(currentField.value)
  });
  $('.keypad-btn-btn').on('click', function() {
    newCharacter = this.innerHTML;
    // alert(newCharacter)
    // newCharacter = parseInt(newCharacter)
    //added auto tab
    if ($('#empid_12').val().length >= 2  && $(this).hasClass('backBTN') == false ) {
      $('#emppwd_12').focus();
    }
    //
    if ($('#emppwd_12').val().length >= 4 && $(this).hasClass('backBTN') == false && $(this).hasClass('tabBTN') == false) {
        if($('#empid_12').val().length != 2  && $(this).hasClass('backBTN') == false ){
          $('#empid_12').focus();
        }else{
          $('#btnFront_12').trigger('click');
        }
    }

    if ($('#emppwd_12').val().length == 4 ) {
        $('#btnFront_12').trigger('click');
    }

    if (newCharacter === "🠔") {
      currentField.value = currentField.value.substring(0, currentField.value.length - 1);
    }else {
        currentField.value += newCharacter
        if ($('#emppwd_12').val().length == 4 ) {
            $('#btnFront_12').trigger('click');
        }
    }
  });
});
$('#btnFront_12').click(function() {
var username = $('#empid_12').val();
var password = $('#emppwd_12').val();

if(username == ''){
    $("#id2_err").html("Please enter your employee username").show();
    return false;
}
if(password == ''){
    $("#pwd2_err").html("Please enter your employee password").show();
    return false;
}
$.ajax({
    type: 'ajax',
    method: 'post',
    url: '<?php echo base_url("cashier/front_login"); ?>',
    data: {username: username, password: password, module: 'pos'},
    dataType: 'json',
    success: function(data) {
    console.log(data);
    //$('.front_logins')[0].reset();
    if (data.module == 'pos') {
      window.location = '<?php echo base_url("cashier/POSterminal")?>'
    }
    if (data == 'password_fail') {
      $('#empid_12').val(username);
      $('#emppwd_12').val('');
      $('#emppwd_12').focus();
      swal({
          title: "Oops!",
          text: "Password does not match..!",
          icon: "error",
          buttons: false,
          timer : 2500,
      });

    }
    if (data == 'user_not_exist') {
      $('.front_logins')[0].reset();
      $('#empid_12').focus();
      swal({
          title: "Oops!",
          text: "User does not exist..!",
          icon: "error",
          buttons: false,
          timer : 2500,
      });

    }

    if (data == 'not_permission') {
      swal({
          title: "Oops!",
          text: "You don't have the required permission to access this page",
          icon: "error",
          buttons: false,
          timer :2700,
      });

    }

    if (data == 'invalid_login') {
        swal({
            title: "Oops!",
            text: "Please clock in first",
            icon: "error",
            buttons: false,
            timer :2700,
        });
        $(".close").trigger("click");
        setTimeout( function (){
          window.location = '<?=base_url('cashier')?>';
        },1600);
        //$('.front-login1').modal('hide');
        // $('.clock-in-out').modal();
        // $('#empID').focus();
    }
},

});
return false;
});

$('.keypad-btn-btn').on('click', function(){
    var username = $('#empid_12').val();
    var password = $('#emppwd_12').val();

  if(password.length == 4){
      if($('#empid_12').val() == ''){
          $("#id2_err").html("Please enter your employee username").show();
          return false;
      }
      if($('#emppwd_12').val() == ''){
          $("#pwd2_err").html("Please enter your employee password").show();
          return false;
      }

      $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?php echo base_url("cashier/front_login"); ?>',
          data: {username: username, password: password, module: 'pos'},
          dataType: 'json',
          success: function(data) {
          console.log(data);
          if (data.module == 'pos') {
            window.location = '<?php echo base_url("cashier/POSterminal")?>'
          }
          if (data == 'password_fail') {
            $('#empid_12').val(username);
            $('#emppwd_12').val('');
            $('#emppwd_12').focus();
            swal({
                title: "Oops!",
                text: "Password does not match..!",
                icon: "error",
                buttons: false,
                timer : 2500,
            });
          }
          if (data == 'user_not_exist') {
            $('.front_logins')[0].reset();
            $('#empid_12').focus();
            swal({
                title: "Oops!",
                text: "User does not exist..!",
                icon: "error",
                buttons: false,
                timer : 2500,
            });

          }
          if (data == 'not_permission') {
            swal({
                title: "Oops!",
                text: "You don't have the required permission to access this page",
                icon: "error",
                buttons: false,
                timer :2700,
            });
          }

          if (data == 'invalid_login') {
              swal({
                  title: "Oops!",
                  text: "Please clock in first",
                  icon: "error",
                  buttons: false,
                  timer :2700,
              });
              $(".close").trigger("click");
              setTimeout( function (){
                window.location = '<?=base_url('cashier')?>';
              },1600);
              //$('.front-login1').modal('hide');
              // $('.clock-in-out').modal();
              // $('#empID').focus();
            }
      },

      });
      return false;
  }

});





    // var ctx = document.getElementById('myChart').getContext('2d');
    // var ctx4 = document.getElementById('bar2').getContext('2d');
    // var ctx6 = document.getElementById('line1').getContext('2d');

    // var chart = new Chart(ctx, {
    //     // The type of chart we want to create
    //     type: 'horizontalBar',

    //     // The data for our dataset
    //     data: {
    //         labels: [<?php if(!empty($ScratcherSales["scratcher_sales_bin_arr"])) print "'".implode("','", $ScratcherSales["scratcher_sales_bin_arr"])."'"; ?>],
    //         datasets: [{
    //             label: 'Tickets Sold',
    //             backgroundColor: '#007bff',
    //             borderColor: '#007bff',
    //             data: [<?php if(!empty($ScratcherSales["scratcher_sales_qty_arr"])) print implode(",", $ScratcherSales["scratcher_sales_qty_arr"]); ?>]
    //         }]
    //     },
    //     options: {
    //         legend: {
    //             onClick: (e) => e.stopPropagation()
    //         },
    //         scales: {
    //             xAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }]
    //         }
    //     }
    // });

    // var canvasP_ss = document.getElementById("myChart");
    // canvasP_ss.onclick = function(e) {
    //    var slice = chart.getElementAtEvent(e);
    //    if (!slice.length) return; // return if not clicked on slice
    //    var label  = slice[0]._model.label;
    //    switch (label) {
    //       // add case for each label/slice
    //         case label:
    //         var label_temp = label.replace('Bin#','');

    //         var bin_filter_arr_encoded = 0;
    //         if(label_temp != "") {
    //             var label_temp_btoa = window.btoa(label_temp);
    //             label_temp_btoa = label_temp_btoa.replaceAll('=','_');
    //             bin_filter_arr_encoded = encodeURIComponent(label_temp_btoa);
    //         }

    //         console.log('<?php print base_url(); ?>cashier/ssreports/'+bin_filter_arr_encoded);

    //         var ssreports_url = bin_filter_arr_encoded;
    //         var start_date_range = "";
    //         var end_date_range   = "";

    //         if(typeof $("#start_date_range").val() != 'undefined' && $("#start_date_range").val() != "" && typeof $("#end_date_range").val() != 'undefined' && $("#end_date_range").val() != "") {
    //             start_date_range = convertDate($("#start_date_range").val());
    //             end_date_range = convertDate($("#end_date_range").val());
    //             ssreports_url = bin_filter_arr_encoded+"/"+start_date_range+"/"+end_date_range;
    //         }
    //         window.open('<?php print base_url(); ?>cashier/ssreports/'+ssreports_url,'_self');
    //         break;
    //    }
    // }

    // //bar2
    // var bar2 = new Chart(ctx4, {
    //     // The type of chart we want to create
    //     type: 'bar',

    //     // The data for our dataset
    //     data: {
    //         labels: [<?php //$Payout["suffix_arr"] = array_reverse($Payout["suffix_arr"]); if(!empty($Payout["suffix_arr"])) print "'".implode("','", $Payout["suffix_arr"])."'"; ?>],
    //         datasets: [{
    //             label: 'Vendor Payable',
    //             backgroundColor: '#207D72',
    //             borderColor: '#207D72',
    //             data: [<?php //$Payout["payout_money_vendor_arr"] = array_reverse($Payout["payout_money_vendor_arr"]); if(!empty($Payout["payout_money_vendor_arr"])) print implode(",", $Payout["payout_money_vendor_arr"]); ?>],
    //             payout_type: "v" // Vendor
    //         },
    //         {
    //             label: 'Employee Payable',
    //             backgroundColor: 'skyblue',
    //             borderColor: 'skyblue',
    //             data: [<?php //$Payout["payout_money_employee_arr"] = array_reverse($Payout["payout_money_employee_arr"]); if(!empty($Payout["payout_money_employee_arr"])) print implode(",", $Payout["payout_money_employee_arr"]); ?>],
    //             payout_type: "e" // Employee
    //         },
    //         {
    //             label: 'Scratchers Payout',
    //             backgroundColor: 'olivegreen',
    //             borderColor: 'olivegreen',
    //             data: [<?php //$Payout["payout_sp_arr"] = array_reverse($Payout["payout_sp_arr"]); if(!empty($Payout["payout_sp_arr"])) print implode(",", $Payout["payout_sp_arr"]); ?>],
    //             payout_type: "s" // Scratchers
    //         }
    //         ],
    //     },
    //     options: {
    //         legend: {
    //             onClick: (e) => e.stopPropagation()
    //         }
    //     }
    // });

    $("#bar2").click(function(event) {

        var activePoints = bar2.getElementsAtEvent(event);
        var activeDataSet = bar2.getDatasetAtEvent(event);

        if (activePoints.length > 0) {

            var clickedDatasetIndex = activeDataSet[0]._datasetIndex;
            var clickedElementIndex = activePoints[0]._index;

            var date_click = bar2.data.labels[clickedElementIndex];
            var payout_type_click = bar2.data.datasets[clickedDatasetIndex].payout_type;

            window.open('<?php print base_url(); ?>cashier/payout_reports_details/'+date_click+'/'+payout_type_click,'_self');
        }
    });

    // var canvasP = document.getElementById("pie1");
    // var ctxP = canvasP.getContext('2d');
    // var myPieChart = new Chart(ctxP, {
    //    type: 'pie',
    //    data: {
    //         labels: [<?php if(!empty($FrequentlySoldItems["fs_cat"])) print "'".implode("','", $FrequentlySoldItems["fs_cat"])."'"; ?>],
    //         datasets: [{
    //             fill: true,
    //             backgroundColor: [
    //                 '#FF843F',
    //                 'gray', 'pink', '#a991d8'
    //             ],
    //             data: [<?php if(!empty($FrequentlySoldItems["fs_stats"])) print implode(",", $FrequentlySoldItems["fs_stats"]); ?>],
    //             custom_param : [<?php if(!empty($FrequentlySoldItems["fs_cat_id"])) print "'".implode("','", $FrequentlySoldItems["fs_cat_id"])."'"; ?>]
    //         }]
    //     },
    //     options: {
    //         legend: {
    //             onClick: (e) => e.stopPropagation()
    //         }
    //     }
    // });

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
            window.open('<?php print base_url(); ?>cashier/reports/'+bin_filter_arr_encoded,'_self');
        }
    });

    //line1
    // var line1 = new Chart(ctx6, {
    //         type: 'line',
    //         data: {
    //             labels: [<?php //$SalesAndMarginComparison["suffix_arr"] = array_reverse($SalesAndMarginComparison["suffix_arr"]); if(!empty($SalesAndMarginComparison["suffix_arr"])) print "'".implode("','", $SalesAndMarginComparison["suffix_arr"])."'"; ?>],
    //             datasets: [{
    //                     label: 'Sales', // Name the series
    //                     data: [<?php //$SalesAndMarginComparison["payout_money_sales_arr"] = array_reverse($SalesAndMarginComparison["payout_money_sales_arr"]); if(!empty($SalesAndMarginComparison["payout_money_sales_arr"])) print implode(",", $SalesAndMarginComparison["payout_money_sales_arr"]); ?>], // Specify the data values array
    //                     fill: false,
    //                     borderColor: '#2196f3', // Add custom color border (Line)
    //                     backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
    //                     borderWidth: 1 // Specify bar border width
    //                 },
    //                 {
    //                     label: 'Supplier', // Name the series
    //                     data: [<?php //$SalesAndMarginComparison["payout_money_margin_arr"] = array_reverse($SalesAndMarginComparison["payout_money_margin_arr"]); if(!empty($SalesAndMarginComparison["payout_money_margin_arr"])) print implode(",", $SalesAndMarginComparison["payout_money_margin_arr"]); ?>], // Specify the data values array
    //                     fill: false,
    //                     borderColor: '#4CAF50', // Add custom color border (Line)
    //                     backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
    //                     borderWidth: 1 // Specify bar border width
    //                 }
    //             ]
    //         },
    //         options: {
    //             legend: {
    //                 onClick: (e) => e.stopPropagation()
    //             }
    //         }
    //     }
    // );

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
            window.open('<?php print base_url(); ?>cashier/sm_reports_details/'+sales_margin_compare+'/'+valueLable,'_self');
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

    jQuery(document).on("click", "#top_selling_no_of_items_link", function( ) {
        //$("#top_selling_cat_div").hide();
        $("#top_selling_no_of_item_div").show();
    });

    jQuery(document).on("click", "#btnNoOfItemsFilter", function( ) {

        var category_id = new Array();
        $('#top_selling_cats :selected').each(function() {
            category_id.push($(this).val());
        });
        var no_of_items_filter = $("#no_of_items_filter").val();
        if(no_of_items_filter == "") {
            swal({
                title: "Oops!",
                text: "No. of items can not be blank.",
                icon: "error",
                buttons: false,
                timer: 2000,
            });
            return false;
        }

        var top_selling_type_of_month = $("#top_selling_type_of_month option:selected").val();
        top_selling_items_ajax(top_selling_type_of_month,category_id,no_of_items_filter,'no_of_items',"");
    });

    $(document).on("click","#top_selling_items_detail",function() {

        var category_id = new Array();
        $('#top_selling_cats :selected').each(function() {
            category_id.push($(this).val());
        });

        var category_id_encoded = 0;
        if(category_id != "") {
            var label_temp_btoa = window.btoa(category_id);
            label_temp_btoa = label_temp_btoa.replaceAll('=','_');
            category_id_encoded = encodeURIComponent(label_temp_btoa);
        }

        var no_of_items_filter = 0;
        if($("#no_of_items_filter").val() != "")
            no_of_items_filter = $("#no_of_items_filter").val();

        var reports_details_url  = category_id_encoded+"/"+no_of_items_filter;
        var start_date_range        = "";
        var end_date_range          = "";

        if(typeof $("#start_date_range").val() != 'undefined' && $("#start_date_range").val() != "" && typeof $("#end_date_range").val() != 'undefined' && $("#end_date_range").val() != "") {
            start_date_range       = convertDate($("#start_date_range").val());
            end_date_range         = convertDate($("#end_date_range").val());
            reports_details_url    = category_id_encoded+"/"+no_of_items_filter+"/none/"+start_date_range+"/"+end_date_range;
        }

        window.open('<?php print base_url(); ?>cashier/reports_details/'+reports_details_url, '_self').focus();
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
                    }

                    $("#top_selling_no_of_item_div").hide();
                }
            }
        });
    }

    $(document).ready(function() {
        $('.content').hide();
        $('.firstContentSection').show();
        $('.over').on('click',function(){
            $('.content').hide();
            $(".date_range_li").show();
        $('.firstContentSection').show();
        $('.nav-item').removeClass('active');
            $('.over').addClass('active');
        });

        $(".dropdown-menu a").click(function() {
            jQuery.noConflict();
            $(this).closest(".dropdown-menu").prev().dropdown("toggle");
        });
        $('.dropdown-menu .dropdown-item').on('click', function(e) {
            e.preventDefault();
            $('.nav-item').removeClass('active');
            $('.over').removeClass('active');
            $('.dd').addClass('active');
            console.log('this function si fored');
            var dest = $(this).attr('href');

            if(dest == "#shift-report" || dest == "#sales-report" || dest == "#recon-report" || dest == "#pay-report" || dest == "#timesheet-report" || dest == "#card-transaction-report" || dest == "#audit-log-report" || dest == "#scartch-summary") {
                $(".date_range_li").hide();
            }
            $('div.content').hide(); // Hide all content divs
            $(dest).show(); // Show the requested part
            // You can do all of this using addClass / removeClass and use CSS transition (smoother, cleaner);
            return false;
        });

        $('.navlink').on('click', function(e) {
            e.preventDefault();
            console.log('this function si fored');
            var dest = $(this).attr('href');
            $('div.content').hide(); // Hide all content divs
            $(dest).show(); // Show the requested part
            // You can do all of this using addClass / removeClass and use CSS transition (smoother, cleaner);
            return false;
        });

        $('#top_selling_cats').multiselect({

            selectAllValue: 'multiselect-all',
            enableCaseInsensitiveFiltering: true,
            enableFiltering: true,
            maxHeight: '300',
            selectAllText: 'Select All Category',
            includeSelectAllOption: true,
            onChange: function(element, checked) {

                var brands = $('#top_selling_cats option:selected');
                var selected = [];
                $(brands).each(function(index, brand){
                    selected.push($(this).val());
                });

                var no_of_items_filter = $("#no_of_items_filter").val();
                var top_selling_type_of_month = $("#top_selling_type_of_month option:selected").val();
                top_selling_items_ajax(top_selling_type_of_month,selected,no_of_items_filter,'category','');
            },
            onSelectAll: function() {
                var brands = $('#top_selling_cats option:selected');
                var selected = [];
                $(brands).each(function(index, brand){
                    selected.push($(this).val());
                });

                var no_of_items_filter = $("#no_of_items_filter").val();
                var top_selling_type_of_month = $("#top_selling_type_of_month option:selected").val();
                top_selling_items_ajax(top_selling_type_of_month,selected,no_of_items_filter,'category','');
            }
        });

        <?php if($frompage == "sales-report"){ ?>
            get_report_ajax('sales-report');
        <?php }else{ ?>
            load_overview();
        <?php } ?>
        function load_overview() {

            $("#overlay,.loader").show();
            // var daterange     = $("input[name='daterange']").val();
            // var daterange_arr = daterange.split(" - ");
            // $("#start_date_range").val(daterange_arr[0]);
            // $("#end_date_range").val(daterange_arr[1]);

            $.ajax({
                url : base_url+"cashier/overview_report_load",
                type: "POST",
                dataType : "json",
                data : {
                    //daterange: daterange,
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $(".overview_append").empty();
                    $(".overview_append").append(data.html);

                    jQuery('#top_selling_cats').multiselect({

                        selectAllValue: 'multiselect-all',
                        enableCaseInsensitiveFiltering: true,
                        enableFiltering: true,
                        maxHeight: '300',
                        selectAllText: 'Select All Category',
                        includeSelectAllOption: true,
                        onChange: function(element, checked) {
                            var brands = $('#top_selling_cats option:selected');
                            var selected = [];
                            $(brands).each(function(index, brand){
                                selected.push($(this).val());
                            });

                            var no_of_items_filter = $("#no_of_items_filter").val();
                            var top_selling_type_of_month = $("#top_selling_type_of_month option:selected").val();
                            top_selling_items_ajax(top_selling_type_of_month,selected,no_of_items_filter,'category','');
                        },
                        onSelectAll: function() {
                            var brands = $('#top_selling_cats option:selected');
                            var selected = [];
                            $(brands).each(function(index, brand){
                                selected.push($(this).val());
                            });

                            var no_of_items_filter = $("#no_of_items_filter").val();
                            var top_selling_type_of_month = $("#top_selling_type_of_month option:selected").val();
                            top_selling_items_ajax(top_selling_type_of_month,selected,no_of_items_filter,'category','');
                        }
                    });

                    jQuery('#sales_margin_compare').multiselect({
                        selectAllValue: 'multiselect-all',
                        enableCaseInsensitiveFiltering: true,
                        enableFiltering: true,
                        maxHeight: '300',
                        selectAllText: 'Select All Category',
                        includeSelectAllOption: true,
                    });
                }
            });
        }
        ///auto load
        $('.select_date_range_btn').on('click', function(e) {
            $("#overlay,.loader").show();
            var daterange     = $("input[name='daterange']").val();
            var daterange_arr = daterange.split(" - ");
            $("#start_date_range").val(daterange_arr[0]);
            $("#end_date_range").val(daterange_arr[1]);

            $.ajax({
                url : base_url+"cashier/overview_report_ajax",
                type: "POST",
                dataType : "json",
                data : {
                    daterange: daterange,
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $(".overview_append").empty();
                    $(".overview_append").append(data.html);

                    jQuery('#top_selling_cats').multiselect({

                        selectAllValue: 'multiselect-all',
                        enableCaseInsensitiveFiltering: true,
                        enableFiltering: true,
                        maxHeight: '300',
                        selectAllText: 'Select All Category',
                        includeSelectAllOption: true,
                        onChange: function(element, checked) {
                            var brands = $('#top_selling_cats option:selected');
                            var selected = [];
                            $(brands).each(function(index, brand){
                                selected.push($(this).val());
                            });

                            var no_of_items_filter = $("#no_of_items_filter").val();
                            var top_selling_type_of_month = $("#top_selling_type_of_month option:selected").val();
                            top_selling_items_ajax(top_selling_type_of_month,selected,no_of_items_filter,'category','');
                        },
                        onSelectAll: function() {
                            var brands = $('#top_selling_cats option:selected');
                            var selected = [];
                            $(brands).each(function(index, brand){
                                selected.push($(this).val());
                            });

                            var no_of_items_filter = $("#no_of_items_filter").val();
                            var top_selling_type_of_month = $("#top_selling_type_of_month option:selected").val();
                            top_selling_items_ajax(top_selling_type_of_month,no_of_items_filter,selected,no_of_items_filter,'category','');
                        }
                    });

                    jQuery('#sales_margin_compare').multiselect({
                        selectAllValue: 'multiselect-all',
                        enableCaseInsensitiveFiltering: true,
                        enableFiltering: true,
                        maxHeight: '300',
                        selectAllText: 'Select All Category',
                        includeSelectAllOption: true,
                    });
                }
            });
        });

        $('#sales_margin_compare').multiselect({

            selectAllValue: 'multiselect-all',
            enableCaseInsensitiveFiltering: true,
            enableFiltering: true,
            maxHeight: '300',
            selectAllText: 'Select All Category',
            includeSelectAllOption: true,
        });

        $(document).on("click","#payout_reports_go",function() {
            $("#overlay,.loader").show();
            var payout_summary_type = $("select[name='payout_summary_type']").val();
            var start_date_filter   = $("input[name='start_date_filter']").val();
            var end_date_filter     = $("input[name='end_date_filter']").val();

            $.ajax({
                url : base_url+"cashier/reports/payout_reports_go",
                type: "POST",
                dataType : "json",
                data : {
                    payout_summary_type: payout_summary_type,
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    if(payout_summary_type == "s") {

                        $("#scratcher_payout_summary").show();
                        $("#employee_payout_summary,#vendor_payout_summary,#lotto_payout_summary").hide();

                        $("#tbl_scratcher_payout_append").empty();
                        $("#tbl_scratcher_payout_append").append(data.s_html);
                    } else if(payout_summary_type == "e") {

                        $("#employee_payout_summary").show();
                        $("#scratcher_payout_summary,#vendor_payout_summary,#lotto_payout_summary").hide();

                        $("#tbl_employee_payout_append").empty();
                        $("#tbl_employee_payout_append").append(data.e_html);
                    } else if(payout_summary_type == "v") {

                        $("#vendor_payout_summary").show();
                        $("#employee_payout_summary,#scratcher_payout_summary,#lotto_payout_summary").hide();

                        $("#tbl_vendor_payout_append").empty();
                        $("#tbl_vendor_payout_append").append(data.v_html);
                    } else if(payout_summary_type == "l") {

                        $("#lotto_payout_summary").show();
                        $("#employee_payout_summary,#scratcher_payout_summary,#vendor_payout_summary").hide();

                        $("#tbl_lotto_payout_append").empty();
                        $("#tbl_lotto_payout_append").append(data.l_html);
                    }
                }
            });

        });

        $(document).on("click","#card_transaction_go",function() {
            $("#overlay,.loader").show();
            var start_date_filter   = $("input[name='start_date_ct_filter']").val();
            var end_date_filter     = $("input[name='end_date_ct_filter']").val();

            $.ajax({
                url : base_url+"cashier/reports/card_transaction_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $(".card_transaction_append").empty();
                    $(".card_transaction_append").append(data.html);
                }
            });
        });

        $(document).on("click","#card_transaction_clear",function() {
            $("#overlay,.loader").show();
            $("input[name='start_date_ct_filter']").val('');
            $("input[name='end_date_ct_filter']").val('');

            var start_date_filter   = '';
            var end_date_filter     = '';

            $.ajax({
                url : base_url+"cashier/reports/card_transaction_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $(".card_transaction_append").empty();
                    $(".card_transaction_append").append(data.html);
                }
            });
        });

        $(document).on("click","#shift_report_go",function() {
            $("#overlay,.loader").show();
            var start_date_filter   = $("input[name='start_date_sr_filter']").val();
            var end_date_filter     = $("input[name='end_date_sr_filter']").val();

            $.ajax({
                url : base_url+"cashier/reports/shift_report_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $(".shift_report_append").empty();
                    $(".shift_report_append").append(data.html);
                }
            });
        });

        $(document).on("click","#shift_report_clear",function() {
            $("#overlay,.loader").show();
            $("input[name='start_date_sr_filter']").val('');
            $("input[name='end_date_sr_filter']").val('');

            var start_date_filter   = '';
            var end_date_filter     = '';

            $.ajax({
                url : base_url+"cashier/reports/shift_report_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $(".shift_report_append").empty();
                    $(".shift_report_append").append(data.html);
                }
            });
        });

        $(document).on("click","#audit_log_report_go",function() {
            $("#overlay,.loader").show();
            var start_date_filter   = $("input[name='start_date_al_filter']").val();
            var end_date_filter     = $("input[name='end_date_al_filter']").val();

            $.ajax({
                url : base_url+"cashier/reports/audit_log_report_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $(".audit_log_append").empty();
                    $(".audit_log_append").append(data.html);
                }
            });
        });

        $(document).on("click","#audit_log_report_clear",function() {
            $("#overlay,.loader").show();
            $("input[name='start_date_al_filter']").val('');
            $("input[name='end_date_al_filter']").val('');

            var start_date_filter   = '';
            var end_date_filter     = '';

            $.ajax({
                url : base_url+"cashier/reports/audit_log_report_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $(".audit_log_append").empty();
                    $(".audit_log_append").append(data.html);
                }
            });
        });

        $(document).on("click","#scratcher_inventory_summary_go",function() {
            $("#overlay,.loader").show();
            var start_date_filter   = $("input[name='start_date_sis_filter']").val();
            var end_date_filter     = $("input[name='end_date_sis_filter']").val();

            $.ajax({
                url : base_url+"cashier/reports/scratcher_inventory_summary_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $("#scratcher_inventory_summary_append").empty();
                    $("#scratcher_inventory_summary_append").append(data.html);
                }
            });
        });

        $(document).on("click","#scratcher_inventory_summary_clear",function() {
            $("#overlay,.loader").show();
            $("input[name='start_date_sis_filter']").val('');
            $("input[name='end_date_sis_filter']").val('');

            var start_date_filter   = '';
            var end_date_filter     = '';

            $.ajax({
                url : base_url+"cashier/reports/scratcher_inventory_summary_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $("#scratcher_inventory_summary_append").empty();
                    $("#scratcher_inventory_summary_append").append(data.html);
                }
            });
        });

        $(document).on("click","#inventory_report_go",function() {
            $("#overlay,.loader").show();
            var start_date_filter   = $("input[name='start_date_ir_filter']").val();
            var end_date_filter     = $("input[name='end_date_ir_filter']").val();

            $.ajax({
                url : base_url+"cashier/reports/inventory_report_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $("#inventory_report_append").empty();
                    $("#inventory_report_append").append(data.html);
                }
            });
        });

        $(document).on("click","#inventory_report_clear",function() {
            $("#overlay,.loader").show();
            $("input[name='start_date_ir_filter']").val('');
            $("input[name='end_date_ir_filter']").val('');

            var start_date_filter   = '';
            var end_date_filter     = '';

            $.ajax({
                url : base_url+"cashier/reports/inventory_report_go",
                type: "POST",
                dataType : "json",
                data : {
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $("#inventory_report_append").empty();
                    $("#inventory_report_append").append(data.html);
                }
            });
        });

        $(document).on("click","#payout_reports_clear",function() {
            $("#overlay,.loader").show();
            $("select[name='payout_summary_type']").val('s');
            $("input[name='start_date_filter']").val('');
            $("input[name='end_date_filter']").val('');

            var payout_summary_type = 's';
            var start_date_filter   = '';
            var end_date_filter     = '';

            $.ajax({
                url : base_url+"cashier/reports/payout_reports_go",
                type: "POST",
                dataType : "json",
                data : {
                    payout_summary_type: payout_summary_type,
                    start_date_filter: start_date_filter,
                    end_date_filter: end_date_filter
                },
                success:function(data) {
                    $("#overlay,.loader").hide();
                    $("#tbl_employee_payout_append").empty();
                    $("#tbl_vendor_payout_append").empty();
                    $("#tbl_scratcher_payout_append").empty();
                    $("#tbl_lotto_payout_append").empty();
                    $("#lotto_payout_summary").hide();
                    $("#scratcher_payout_summary").show();
                    $("#tbl_scratcher_payout_append").append(data.s_html);
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).on("click",".shift_report_data",function() {
        $("#overlay,.loader").show();
        var data_shift_id    = $(this).attr("data_shift_id");
        var data_terminal_id = $(this).attr("data_terminal_id");

        $.ajax({
            url : base_url+"cashier/reports/shift_report",
            type: "POST",
            dataType : "json",
            data : {
                data_shift_id: data_shift_id,
                data_terminal_id: data_terminal_id
            },
            success:function(data) {
                $("#overlay,.loader").hide();
                $(".shift_report_print_div").show();
                $("#shift_report_content_append").empty();
                $("#shift_report_content_append").append(data.html);
            }
        });
    });

    $(document).on("click",".reconciliation_report_click",function() {
        $("#overlay,.loader").show();
        var btn_type = $(this).attr("data-type");
        var btn_date = $(this).attr("data-date");

        $.ajax({
            url : base_url+"cashier/reconciliation_report_ajax",
            type: "POST",
            dataType : "json",
            data : {
                btn_type: btn_type,
                btn_date: btn_date
            },
            success:function(data) {
                $("#overlay,.loader").hide();
                $(".reconciliation_report_ajax").empty();
                $(".reconciliation_report_ajax").append(data.html);
            }
        });
    });

    $(document).on("click",".timesheet_report_click",function() {
        $("#overlay,.loader").show();
        var btn_type = $(this).attr("data-type");
        var btn_date = $(this).attr("data-date");

        var start_date_filter = "";
        var end_date_filter = "";

        if(typeof $("#start_date_tr_filter").val() != 'undefined' && $("#start_date_tr_filter").val() != "" && typeof $("#end_date_tr_filter").val() != 'undefined' && $("#end_date_tr_filter").val() != "" && btn_type == "filter_go") {

            start_date_filter = $("#start_date_tr_filter").val();
            end_date_filter = $("#end_date_tr_filter").val();
        }

        $.ajax({
            url : base_url+"cashier/timesheet_report_ajax",
            type: "POST",
            dataType : "json",
            data : {
                btn_type: btn_type,
                btn_date: btn_date,
                start_date_filter: start_date_filter,
                end_date_filter: end_date_filter
            },
            success:function(data) {
                $("#overlay,.loader").hide();
                $(".timesheet_report_ajax_new").empty();
                $(".timesheet_report_ajax_new").append(data.html);
            }
        });
    });

    function convertDate(date){
        var datearray = date.split("/");
        var newdate = datearray[2] + '-' + datearray[0] + '-' + datearray[1];
        return newdate;
    }

    $(document).on("change","#start_date_tr_filter",function() {
        $("#end_date_tr_filter").attr("min",$(this).val());
    });

    $(document).on("change","#start_date_tr_filter",function() {
        $("#end_date_tr_filter").attr("min",$(this).val());
    });

    $(document).on("change","#start_date_filter",function() {
        $("#end_date_filter").attr("min",$(this).val());
    });

    $(document).on("change","#start_date_ct_filter",function() {
        $("#end_date_ct_filter").attr("min",$(this).val());
    });

    $(document).on("change","#start_date_al_filter",function() {
        $("#end_date_al_filter").attr("min",$(this).val());
    });

    $(document).on("change","#start_date_sis_filter",function() {
        $("#end_date_sis_filter").attr("min",$(this).val());
    });

    $(document).on("change","#start_date_sr_filter",function() {
        $("#end_date_sr_filter").attr("min",$(this).val());
    });

    $(document).on("change","#start_date_ir_filter",function() {
        $("#end_date_ir_filter").attr("min",$(this).val());
    });

    $(document).on("click",".shift_report_print",function() {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = $("#shift_report_content_append").html();
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    });

    $('.close').click(function() {
        $('#empid').val('');
        $('#emppwd').val('');

         location.reload();
    });

    $(document).on("click","#sales_summary_report_go",function() {
        $("#overlay,.loader").show();
        var start_date_filter   = $("input[name='start_date_ss_filter']").val();
        var end_date_filter     = $("input[name='end_date_ss_filter']").val();

        $.ajax({
            url : base_url+"cashier/sales_report_ajax",
            type: "POST",
            dataType : "html",
            data : {
                start_date_filter: start_date_filter,
                end_date_filter: end_date_filter,
                report_name: 'sales-report'
            },
            success:function(data) {
                $("#overlay,.loader").hide();
                $('#over_view_main').hide();
                $('#div_ajax_report').html(data);
            }
        });
    });

    $(document).on("click","#sales_summary_report_clear",function() {
        $("#overlay,.loader").show();
        $("input[name='start_date_ss_filter']").val('');
        $("input[name='end_date_ss_filter']").val('');

        var start_date_filter   = '';
        var end_date_filter     = '';

        $.ajax({
            url : base_url+"cashier/sales_report_ajax",
            type: "POST",
            dataType : "html",
            data : {
                start_date_filter: start_date_filter,
                end_date_filter: end_date_filter,
                report_name: 'sales-report'
            },
            success:function(data) {
                $("#overlay,.loader").hide();
                $('#over_view_main').hide();
                $('#div_ajax_report').html(data);
            }
        });
    });

//     $(function () {
//     $(".front-login1").on("hidden.bs.modal", function (e) {
//       console.log("Modal hidden");
//       $("#empid").val("");
//       $("#emppwd").val("");
//     });
//   });



</script>
