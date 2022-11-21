<style>

.grid-container {
  display: grid; /* This is a (hacky) way to make the .grid element size to fit its content */
  overflow: auto;
  height: 300px;
  width: 100%;
  margin-top: 10px;
}
.grid {
  display: flex;
  flex-wrap: nowrap;
}
.grid-col {
  width: 150px;
  min-width: 150px;
}

.grid-item--header {
  height: 50px;
  min-height: 50px;
  position: sticky;
  position: -webkit-sticky;
  background: white;
  top: 0;
}

.grid-col--fixed-left {
  position: sticky;
  left: 0;
  z-index: 9998;
  background: white;
}
.grid-col--fixed-right {
  position: sticky;
  right: 0;
  z-index: 9998;
  background: white;
}

.grid-item {
  height: 50px;
  text-align: center;
  padding: 11px;
 }

.grid-item:nth-child(2n+1) {
    background: #fff;
}
a.mtab {
    padding: 13px !important;
    display: inline-block;
}
a.dr.active {
    color: red !important;
}
input#edit-timesheet-manager {
    background: #EC4D4D;
    border: 0;
    width: 200px;
    margin-bottom: 15px;
    color: #fff;
    padding: 10px;
    margin-left: 13px;
}
.report.ctab input {
    display: inline-block;
    width: auto;
}
a.mtab.active {
  background: blue;
}

.tooltips:hover .tooltipstext {
    visibility: visible;
    opacity: 1;
    z-index: 9999;
}
  .mslcon{
      height: auto;
      width: 50px;
  }
  .card {
    padding-bottom: 1.25em;
    border-radius: 9px;
  }

  .utext {
    letter-spacing: 0.15px;

    color: #626262;
    font-size: 14px;
  }

  .rText {
    font-size: 17px;
    letter-spacing: 0.15px;
    font-weight: 600;
    color: #000000;

  }

  .reasonText {
    letter-spacing: 0.15px;
    font-size: 14px;
    color: #636363;

  }

  .search-bar {
    background: #FFFFFF;
    border: 1px solid #BDBDBD;
    box-sizing: border-box;
    border-radius: 44px;
    width: 100%;
    min-height: 44px;
    text-align: center;
    display: flex;
    align-items: center;
    padding: 0 1em;
    justify-content: space-between;
  }

  .filter-tabs {
    background: #FFFFFF;
    border: 1px solid #A1A1A1;
    box-sizing: border-box;
    border-radius: 44px;
    max-height: 44px;
    height: 100%;
    width: 100%;
  }

  .tab {
    display: flex;
    align-items: center;
    border: 1px solid #A1A1A1;
    height: 100%;
    width: 100%;
    justify-content: center;
    border-top: 0;
    border-bottom: 0;
    padding: 0 .5em;
  }

  .tab.one {
    border-top: 0;
    border-bottom: 0;
    border-left: 0;
  }

  .tab.two {
    border-top: 0;
    border-bottom: 0;
    border-right: 0;
  }

  .req-amt {
    text-align: right;
    letter-spacing: 0.15px;
    font-size: 20px;
    color: #D62127;
    margin: 0;

  }

  .reqModalTitle {
    background: #EC4D4D;
    text-align: center !important;
    color: white
  }

  .leaveHeader {
    background: #EC4D4D;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  hr.activetab {
    background: red;
    border: 2px solid red;
    transition: all 500ms;
  }

  .pr-2 {
    padding-right: .5em !important;
  }

  .paybackText {
    font-weight: 600;
  }

  .paybackText2 {
    font-size: 14px;


    /* identical to box height, or 179% */

    letter-spacing: 0.15px;

    color: #636363;
  }

  .modal-footer {
    justify-content: center;
  }

  .subbtn-modal {
    background: #000000;
    border: 1px solid #000000;
    border-radius: 2px;
    color: white;
    height: 32px;
    width: 110px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .close-modal {
    border: 1px solid #000000;
    border-radius: 2px;
    color: black;
    background-color: transparent;
    height: 32px;
    width: 110px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .keypad-btn {
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
.clki{
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
.clki:active {
    background: gray;
  }
  .keypad-btn:active {
    background: gray;
  }
  .keypad-btn2 {
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

  .keypad-btn2:active {
    background: gray;
  }
  .enterKeypad-btn {
    all: unset;
    background-color: gray;
  }

  .enterKeypad-btn {
    width: auto;
    background: transparent;
    border: none;

    color: black;
    font-weight: 600;
    font-size: 35px;
  }

  .bckbtn.btn-backWrapper.newredwrap{
    background: darkred;
    position: absolute;
    right: 2%;
    top: 50%;
    transform: translateY(-50%);
  }
  .position-relative{
    position: relative!important;
  }
  .modal-xl {
      width: 90%;
      max-width:1200px;
  }
  .timesheetreport tr td {
    width: 23px !important;
    border: 0;
}

.timesheetreport input {
    width: 60px !important;
    border: 1px solid #d4d4d4;
    text-align: center;
}
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

/*notification css */

#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-right: 0px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  right: 10%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
table.table.datatable.timesheetreport_edit {
        text-align: center;
    }
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

</style>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css"> -->

<div class="loader"></div>
<div class="modal" id="exampleModalCenter11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
            <div class="modal-header custommodalheader position-relative">
        <h5 class="modal-title custommodaltitle text-center w-100" id="exampleModalLongTitle" style="font-size: 22px;">Cash Advance Request</h5>
      </div>
      <?php
          $store = $this->Cashier_model->get_store_name();
          $paychecks = $this->Cashier_model->get_all_paychecks();
          $paycheck_amt = $this->Cashier_model->get_fontsize();
      ?>
      <form action="" method="post" autocomplete="off" class="advance-cash">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <input type="hidden" name="paycheck_amt" id="paycheckAMT" value="<?=$paycheck_amt->paycheck_amount?>" >
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel"  style="font-size: 19px;">Enter Amount * <span class="text-secondary" style="font-size:13px;">(Max amount allowed is $<?=$paycheck_amt->paycheck_amount?>)</span></label>
                  <div class="position-relative">
                      <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                    <input  style="font-size: 20px;" type="tel" name="advance_amount" class="form-control customcardinput inputFile5 use-keyboard-input-num" id="advance_amount" aria-describedby="" placeholder="Enter Amount" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
                  <span class="errors" id="amt_err" style="color:red; font-size:16px;"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel"  style="font-size: 19px;">Reason for Advance: *</label>
                  <input  style="font-size: 20px;" type="text" name="reason" class="form-control customcardinput inputFile5 use-keyboard-input" id="reasonadv1" aria-describedby="" placeholder="Enter your Reason">
                  <span class="errors" id="reasonadv_err" style="color:red; font-size:16px;"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <?php $store = $this->Cashier_model->get_store_name();?>
                  <p class="auth p-0 m-0" style="font-size: 16px;">I authorize <?=$store[0]->name?> to deduct my advance from *</p>
                  <select  style="font-size: 20px;" class="form-control customcardinput inputFile5 mt-2" name="paycheck" id="selPaycheck">
                    <option>--Select Paycheck--</option>
                    <?php foreach($paychecks as $p){?>
                      <option value="<?=$p['value']?>"><?php if($p['value'] == 1){ echo 'Next Paycheck';}else{ echo $p['paycheck']; } ?></option>
                    <?php } ?>
                  </select>
                  <span class="errors" id="rdo_err" style="color:red; font-size:16px;"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
          <button  style="font-size: 20px;" type="button" data-dismiss="modal"  id="cash_close" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
            <button style="font-size: 20px;" type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnAdv">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- prashant request -->
<div class="modal" id="exampleModalCenter99" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader position-relative">
        <h5 class="modal-title custommodaltitle mx-auto" id="exampleModalLongTitle mlauto " style="font-size: 22px;"> Requests</h5>
            <button class="bckbtn btn-backWrapper newredwrap" id="bleave3" data-dismiss="modal" >
                  <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
            </button>
      </div>
      <div class="modal-body modalscroll">
        <div class="container m-0 p-0">
          <div class="row m-0 p-0" >
              <div class="col-md-3 m-0 text-center" id="REQleave">
                  <div class="hrms-tile" id="request_leave" style="width:200px;height: 143px;">
                    <div class="hr-tile-img"><img src="<?php echo base_url(); ?>assets/images/calendar-with-day-off 1.png" alt=""  style="margin-top: 8px;"/></div>
                    <p class="m-0 hrms-text" style="font-size: 20px;">Leave Request</p>
                  </div>
                </div>
              <div class="col-md-3 text-center " style="margin-left:118px;" id="CASHreq">
                <div class="hrms-tile" id="request_leave2" style="width:200px;">
                  <div class="hr-tile-img"> <img src="<?php echo base_url(); ?>assets/images/money 4.png" alt="" class=""></div>
                  <p class="m-0 hrms-text" style="font-size: 20px;">Cash Advance Request</p>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div style="text-align: center;"></div>
      </div>
    </div>
  </div>
</div>
<!-- end request -->

<!-- prashant request -->
<div class="modal" id="exampleModalCenter98" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader position-relative">
        <h5 class="modal-title custommodaltitle mx-auto" id="exampleModalLongTitle mlauto " style="font-size: 22px;">View Requests</h5>
          <button class="bckbtn btn-backWrapper newredwrap" id="bleave1" >
              <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
          </button>
           <input type="hidden" name="Role_id" id="roles_id" value="">
      </div>
      <div class="modal-body modalscroll">
        <div class="container m-0 p-0">
          <div class="row m-0 p-0" >
              <input type="hidden" id="hrms_app" value="">
              <div class="col-md-3 m-0 text-center" id="leaveAPP">
                  <div class="hrms-tile" style="width:200px;height: 143px;">
                    <div class="hr-tile-img"><img src="<?php echo base_url(); ?>assets/images/calendar-with-day-off 1.png" alt=""  style="margin-top: 8px;"/></div>
                    <p class="m-0 hrms-text" style="font-size: 20px;">Leave Requests</p>
                  </div>
                </div>
              <div class="col-md-3 text-center" style="margin-left:118px;" id="cashAPP">
                <div class="hrms-tile"style="width:200px;">
                  <div class="hr-tile-img"> <img src="<?php echo base_url(); ?>assets/images/money 4.png" alt="" class=""></div>
                  <p class="m-0 hrms-text" style="font-size: 20px;">Cash Advance Requests</p>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div style="text-align: center;"></div>
      </div>
    </div>
  </div>
</div>
<!-- end request -->


<!-- Modal1 -->
<div class="modal" id="exampleModalCenter9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle reqcenter" id="exampleModalLongTitle">Request Leave</h5>
      </div>
      <div class="modal-body modalscroll">
        <div class="container">
          <div class="row">
            <div class="col-md-12 ">
              <div class="form-group">
                <label class="rolllabel">Choose type: * </label>
                <select class="form-control customselect " id="exampleFormControlSelect1">
                  <option>Select leave type</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="form-group">
                <label class="rolllabel">Start Date: **</label> </label>
                <div class="input-group date" data-date-format="mm.dd.yyyy">
                  <input type="text" class="form-control" placeholder="mm.dd.yyyy" id="dp1"> </div> <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="form-group">
                  <label class="rolllabel">End Date: *</label>
                    <div class="input-group date" data-date-format="mm.dd.yyyy">
                      <input type="text" class="form-control" placeholder="mm.dd.yyyy" id="dp1">
                    </div>
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="form-group">
                <label class="rolllabel">Reason for leaveee:</label> </label>
                <input type="text" class="form-control customcardinput use-keyboard-input" id="" aria-describedby="" placeholder="Please enter your reason for leave here">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div style="text-align: center;">
          <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
          <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<!-- Moda21 OLD-->
<!-- Moda21 OLD-->
<div class="modal" id="exampleModalCenter21" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modalcenter1 " role="document">
    <div class="modal-content" >
      <div class="modal-header custommodalheader position-relative">
        <input type="hidden" name="hrms_id" id="hrms_id" value="<?=isset($_GET['leaveID']) ? $_GET['leaveID'] : '' ;?>">
        <h5 class="modal-title custommodaltitle mx-auto" id="exampleModalLongTitle mlauto " style="font-size: 22px;"> HRMS</h5>
                <button type="button" class="close position-absolute" style="right: 2%; top:10%;font-size: 2.0rem;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body ">
        <div class="container m-0 p-0">
          <div class="row m-0 p-0 d-flex jc-bet ai-center">
          <div class="mslcon">
            <!-- <img src="<?php echo base_url(); ?>assets/images/chevron-left.png" alt="" class="img-fluid "> -->
          </div>
        <div class="lp m-0" id="view_request">
          <img src="<?php echo base_url(); ?>assets/images/calendar-with-day-off 1.png" alt="" class="img-fluid lpimg01" style="padding-top: 1em;">
          <p class="llp20 mt-3" style="padding-top: .3em;font-size:20px;">View Requests</p>
        </div>
        <div class="lp2" id="request1" >
          <img src="<?php echo base_url(); ?>assets/images/calendar-with-day-off 1 (1).png" alt="" class="img-fluid lpimg01" style="margin-top: 32px;">
          <p class="llp" style="font-size:20px;">New Request</p>
        </div>
        <div class="lp2" id="request2" >
          <img src="<?php echo base_url(); ?>assets/images/calendar-with-day-off 1 (1).png" alt="" class="img-fluid lpimg01" style="margin-top: 32px;">
          <p class="llp" style="font-size:20px;">Request Status</p>
        </div>
        <div class="mslcon">
          <!-- <img src="<?php echo base_url(); ?>assets/images/chevron-left (1).png" alt="" class="img-fluid "> -->
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<div id="cashdrop3" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Modal content -->
    <div class="modal-content blue autoheight cdmdl" style='padding: 1.5em; width: 400px;
    margin: 94px auto;' >
    <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x' style='top:0;left:0;'></a>
        <div class="cashdrop-con w-100">
            <div class="cdTopWrap">
                <div class="cd-inputcon">
                      <label> Under Construction <a id="shift_terminal_button" href="#">Back to End Shift</a></label>
                    <label for="cdinput" class="text-nowrap labelset" style="    font-weight: 600;">Cash Drop Amount</label>
                    <div class="position-relative">
                        <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;font-size: 20px">$</span>
                        <input  style="font-size: 20px;" type="tel" class='cashdrop-input' id="cdinput" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">

                    </div>
                    <span class="errors" id="drop_err" style="color:red; font-size:14px;"></span>
                    <a href='#cashdrop2' rel='modal:open' class="bigbtnforcd cdk" id="cash_Drop" style="margin-top: 1em; font-size:30px;transition:all 500ms;padding: .3em 1.2em;
    margin: 1em 0;">Enter</a>
                </div>
                <div class="popup-keypad-con">
                    <div class="cd-keypad-con">
                        <div class="cd-krow d-flex">
                            <div class="cd-keys cdk drop_pay">7</div>
                            <div class="cd-keys cdk drop_pay">8</div>
                            <div class="cd-keys cdk drop_pay">9</div>
                        </div>
                        <div class="cd-krow d-flex">
                            <div class="cd-keys cdk drop_pay">4</div>
                            <div class="cd-keys cdk drop_pay">5</div>
                            <div class="cd-keys cdk drop_pay">6</div>
                        </div>
                        <div class="cd-krow-col d-flex max-spread">
                            <div class="cdkey-col-wrap d-flex">
                                <div class="cd-krow d-flex">
                                    <div class="cd-keys cdk drop_pay">1</div>
                                    <div class="cd-keys cdk drop_pay">2</div>
                                    <div class="cd-keys cdk drop_pay">3</div>
                                </div>
                                <div class="cd-krow d-flex">
                                    <div class="cd-keys cdk drop_pay">.</div>
                                    <div class="cd-keys cdk drop_pay">0</div>
                                    <div class="cd-keys cdk drop_pay">🠔</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

</div>
<!-- modal4 -->

<!-- Modal5-->
<div class="modal " id="exampleModalCenter15" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modalcenter mainmodel " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle cardcenter" id="exampleModalLongTitle" style="width: auto;margin: 0 auto;">Timesheet</h5>
      </div>
      <div class="tabs">
        <div class="container">
          <a class="mtab active" data-tab="timesheet" id="timesheetID">Timesheet </a>
          <a class="mtab" data-tab="report" id="reportID">Report</a>
        </div>
      </div>
      <div class="modal-body bg_1  report ctab" style="display: none;">
          <div class="container">
              <div class="table-responsive timesheetreport"></div>
          </div>
          <div class="table-responsive" id="TimeCARD_manager"></div>
      </div>
      <form class="save_week_timesheet_form timesheet ctab" >
      <?php
          $main_datess['n_date'] = $this->Cashier_model->get_dates();
          foreach ($main_datess['n_date'] as $key => $value) {
            $datess_date = $this->Cashier_model->getdata_by_id($value['date']);
          }
      ?>
      <div class="modal-body bg_1">
        <div class="container">
          <div class="row">
            <div class="table-responsive">
              <table class="table datatable timesheetreport_edit" style="margin-bottom: 26px"></table>
          </div>
          </div>
          <div class="row"></div>
          <div class="row timedes" style="display: none;">
            <div class="col-md-2 emp1">
              <p><span class="text-secondary">Employee ID: </span><span id="empID" class="ts_empid"></span></p>
            </div>
            <div class="col-md-4 emp1">
              <input type="hidden" name="user_id" value="<?php echo $this->session->userdata['username'] ?>">
              <p> <span class="text-secondary">Employee Name: </span><span id="lastName"><?=$this->session->userdata('name'); ?></span></p>
            </div>
            <div class="col-md-3 emp1">
              <p><span class="text-secondary">Timecard ID: </span><span id="timecardID"><?=$datess_date[0]['timecard_ID'];?></span></p>
            </div>
            <div class="col-md-3 emp1">
              <p><span class="text-secondary"><span class="text-secondary">Total Hours:</span> <span id="totalTime"></span> Hours</p>
            </div>
          </div>
          <br>
          <br>
          <div class="row" style="display: none;">
            <div class=" ml-5 parttime">
              <div class="tablecard ">
                <hr>
                <div class="table-responsive" id="TimeCARD">
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
      <div class="modal-footer bg_last">
        <div style="text-align: center;">
          <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
        </div>
        <div style="text-align: center;" style='display: none;'>
          <button type="button"  class="btn btn-outline-dark btn-sm approvebutton">Approve</button>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- shift in modal start -->
<div class="modal " id="shift-in" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modalcenter1 " role="document">
    <?php $shiftdat = $this->Cashier_model->get_skip_shift();?>
    <div class="modal-content">
      <div class="modal-header custommodalheader ">
        <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle mlauto " style="font-size: 22px; padding-left: 42%;"><?php if(empty($this->session->userdata['shiftdata']) || $shiftdat == 1){ echo 'Start Shift'; }elseif(!empty($this->session->userdata['shiftdata']) && $shiftdat == 0){ echo 'End Shift';}?></h5>
        <?php if(empty($this->session->userdata['shiftdata'])){?>
        <button style="font-size: 20px;height:40px;" type="button" id='scilogin_forced' class="btn btn-primary customcardfooteraddbtn">Skip</button>
       <?php } ?>
      </div>
      <form action="" method="post" class="shift_terminal" autocomplete="off">
       <input type="hidden" class="hidden_shift_user" name="username" value="">
      <div class="modal-body ">
        <div class="container m-0 p-0">
          <div class="row m-0 p-0">
            <div class="col-md-12"><div class="cdalert"></div></div>
            <div class="col-md-6">
              <label for="" class="" style="font-size: 20px!important;color:black;">Cash in Drawer <span class="customcardlabel">*</span></label>
              <div style="position:relative;">
              <span style="position:absolute;font-size: 20px;top: 50%;left: 5px;transform: translateY(-50%);">$</span>
              <input type="tel" name="cash_in_drawer" id="cash_in_drawer" value="" class="form-control usefloathere use-keyboard-input-num validateShift" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="font-size: 20px!important;padding-left:20px" />
            </div>
            <span class="errors" id="cash_d_err" style="color:red; font-size:14px"></span>
            </div>
            <div class="col-md-6">
              <label for="" class="" style="font-size: 20px!important;color:black;">Coin Dispenser <span class="customcardlabel">*</span></label>
            <div style="position:relative;">
              <span style="position:absolute;font-size: 20px;top: 50%;left: 5px;transform: translateY(-50%);">$</span>
              <input type="tel" name="coin_dispenser" id="coin_dispenser" value="" class="form-control usefloathere use-keyboard-input-num validateShift" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="font-size: 20px!important;padding-left:20px;"/>
            </div>
            <span class="errors" id="coin_d_err" style="color:red; font-size:14px"></span>
            </div>
            <div class="col-md-12 mt-3" style="max-height: 385px;overflow: scroll;">
            <label class="" style="font-size: 20px!important;color:black;">Scratcher Inventory <span class="customcardlabel">*</span></label>
            <table class="table w-100">
              <thead class='custommodalheader'>
                <tr>
                  <th class="text-left color-white" style="font-size: 20px;"> Bin#</th>
                  <th class='color-white' style="font-size: 20px;">Last Scratcher No</th>
                </tr>
              </thead>
              <?php $bins1 = $this->Cashier_model->get_all_active_bins();?>
              <tbody id="sbins"></tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <div style="text-align: center;">
            <button style="font-size: 20px;height:40px;" type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
            <button style="font-size: 20px;height:40px;" type="submit" id='scilogin' class="btn btn-primary customcardfooteraddbtn"><?php if(empty($this->session->userdata['shiftdata']) || $shiftdat == 1){ echo 'Start Shift'; }elseif(!empty($this->session->userdata['shiftdata']) && $shiftdat == 0){ echo 'End Shift';}?></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
     </div>
   </form>
    </div>
  </div>
</div>
<!-- shift in modal end -->
<!--Prashant create modal-->
<div class="modal front-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title text-center w-100 m-0 custommodaltitle cashcenter" id="exampleModalLongTitle" style="font-size: 1.5rem;">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 2.0rem;">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <form action="" method="post" class="front_login" autocomplete="off">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-5 m-0 p-0">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <input type="hidden" name="module" value="">
                    <label class="rolllabel" style="font-size: 21px;">Employee ID: *</label> </label>
                  <input type="tel" autofocus="" name="username" id="empid" class="form-control customcardinput inputFile11 takeInputLogin" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" style="font-size: 26px;">
                    <span class="errors" id="id1_err" style="color:red; font-size:20px"></span>
                  </div>
                </div>
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="rolllabel" style="font-size: 21px;">Employee Password: *</label> </label>
                    <input type="password" name="password" id="emppwd" class="form-control customcardinput inputFile11 takeInputLogin" aria-describedby="" maxlength="4">
                    <span class="errors" id="pwd1_err" style="color:red; font-size:20px"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-7 m-0 p-0">
                <div class="row m-0 p-0">
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">7</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">8</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">9</div>
                  </div>
                </div>
                <div class="row m-0 p-0">
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">4</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">5</div>
                  </div>
                  <div class="col-md-4 m-0 text-center mt-2 mb-2">
                    <div class="keypad-btn">6</div>
                  </div>
                </div>
                <div class="row m-0 p-0 mt-2">
                  <div class="col-md-4 m-0">
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mb-3">1</div>
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mt-2 backBTN">🠔</div>
                  </div>
                  <div class="col-md-4 m-0">
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mb-3">2</div>
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mt-2">0</div>
                  </div>
                  <div class="col-md-4 m-0">
                    <div class="col-md-12 m-0 p-0 text-center keypad-btn mb-3">3</div>
                     <div class="col-md-12 m-0 p-0 text-center keypad-btn2 mt-2"><button type="submit" class="btn btn-primary enterKeypad-btn h-100 w-100" id="btnFront">Enter</button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;"></div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- prashant request -->
<div class="modal" id="clock_shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <input type="hidden" class="hidden_username" name="username" value="">
    <?php $shiftdat = $this->Cashier_model->get_skip_shift(); ?>
    <div class="modal-content">
        <div class="modal-header custommodalheader position-relative">
          <h5 class="modal-title custommodaltitle mx-auto" id="exampleModalLongTitle mlauto " style="font-size: 22px;padding-left: 95px;"><span id="docUser2">Clock Out</span><span id="docUser45">/<?php
               if(empty($this->session->userdata['shiftdata']) || $shiftdat == 1){
                 echo 'Start Shift';
               }elseif(!empty($this->session->userdata['shiftdata']) && $shiftdat == 0){
                echo 'End Shift';
              }
          ?></span>
        </h5>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 2.0rem;">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body modalscroll">
        <div class="container m-0 p-0">
          <div class="row m-0 p-0" >
              <div class="col-md-3 m-0 text-center" id="clock_in">
                  <div class="hrms-tile dynamic_btn"  style="width:200px;height: 143px;">
                    <div class="hr-tile-img"><img src="<?php echo base_url(); ?>assets/images/92-926310.png" alt=""  style="margin-top: 6px;height: 40px;width: 56px;"/></div>
                    <p class="m-0 hrms-text" style="font-size: 20px;" id="docUser1">Clock Out</p>
                  </div>
              </div>
              <div class="col-md-3 text-center " style="margin-left:118px;" id="shift_in">
                <div class="hrms-tile" style="width:200px;">
                  <div class="hr-tile-img"> <img src="<?php echo base_url(); ?>assets/images/money 4.png" alt="" class=""></div>
                  <p class="m-0 hrms-text" style="font-size: 20px;"><?php if(empty($this->session->userdata['shiftdata']) || $shiftdat == 1){ echo 'Start Shift'; }elseif(!empty($this->session->userdata['shiftdata']) && $shiftdat == 0){ echo 'End Shift';}?></p>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div style="text-align: center;"></div>
      </div>
    </div>
  </div>
</div>
<!-- end request -->
<div id="snackbar">Notification..</div>
</body>

<style type="text/css">
  /* override bootstrap active state */
  button.btn-default:active {
    background-color: #FFF;
    -webkit-box-shadow: none;
    box-shadow: none;
  }

  button.btn-default:active:hover {
    background-color: #3276B1;
  }

  /* override Bootstrap excessive button padding */
  button.ui-keyboard-button.btn {
    padding: 1px 6px;
  }

  /* Bootswatch Darkly input is too bright */
  .ui-keyboard-input.light,
  .ui-keyboard-preview.light {
    color: #222;
    background: #ddd;
  }

  .ui-keyboard-input.dark,
  .ui-keyboard-preview.dark {
    color: #ddd;
    background: #222;
  }
</style>



<!-- <script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script> -->
<!-- <script src="<?=base_url()?>assets/cashier/js/main_js/common_footer.php"></script> -->

<script>
  var base_url = "<?php echo base_url(); ?>";

  $(document).on('click','body',function(e) {

var container = $("#mlKeyboard");
if (!container.is(e.target) && container.has(e.target).length === 0)
{
    if (!$("input").is(":focus")) {
        console.log("Outerrrrr");
        // Keyboard.close();
        // Keyboard.close();
    }
} else {
    console.log("Inerrrrr");
}
});


  $(document).ready(function(){
        $.noConflict();
        // $('#tbl_inventory').DataTable({
        //     "lengthMenu": [[50, 200, 500, 1000], [50, 200, 500, 1000]]
        // });
        // $('#read_barcode').focus();
          // Keyboard.close();
  });


  function pageRedirect() {
    window.location.href = "dashboard.html";
  }

  $('.pill1').on('click', function() {
    $('.p1').addClass('activetab')
    $('.p2').removeClass('activetab')
    $('.pill2').css('color', 'black')
    $('.pill1').css('color', "red")
    $('#vacation-leave-form').hide()
    $('#oneday-leave-form').show()
  })
  $('.pill2').on('click', function() {
    $('.p2').addClass('activetab')
    $('.p1').removeClass('activetab')
    $('.pill1').css('color', 'black')
    $('.pill2').css('color', "red")
    $('#vacation-leave-form').show()
    $('#oneday-leave-form').hide()
  })

  function setModalContent() {
    $(".pill1").trigger("click");
    $('#vacation-leave-form').hide()
  }
  setModalContent()
</script>

<script>
  var slider = document.getElementById("myRange");
  var output = document.getElementById("percent");
  output.value = slider.value + "%"; // Display the default slider value
  // Update the current slider value (each time you drag the slider handle)
  slider.oninput = function() {
    output.value = this.value + "%";
  }

  function ab() {
    output.value = document.getElementById("percent").value;
  }

  var slider2 = document.getElementById("myRange2");
  var output2 = document.getElementById("percent2");
  output2.value = slider2.value + "%"; // Display the default slider value
  // Update the current slider value (each time you drag the slider handle)
  slider2.oninput = function() {
    output2.value = this.value + "%";
  }


  function get_float_value(num) {

    var rex = /(^\d{2})|(\d{1,3})(?=\d{1,3}|$)/g,
      val = num.toString().replace(/^0+|\.|,/g, ""),
      res;

    if (val.length) {
      //if (val.length && val.length > 2) {
      res = Array.prototype.reduce.call(val, (p, c) => c + p) // reverse the pure numbers string
        .match(rex) // get groups in array
        .reduce((p, c, i) => i - 1 ? p + c : p + "." + c); // insert (.) and (,) accordingly
      res += /\.|,/.test(res) ? "" : ".0"; // test if res has (.) or (,) in it
      num = Array.prototype.reduce.call(res, (p, c) => c + p); // reverse the string and display
      return num;
    } else {
      return num;
    }

  }
</script>
<script>
  $(".toggle-password").click(function() {

    $(this).toggleClass("fas fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });


//reuest leave
  $(document).on('click', '#request_leave', function() {
    $('#request-leave-modal').modal('show');
    $('#exampleModalCenter21').modal('hide');
    });

//cash advance
  $(document).on('click', '#request_leave2', function() {
    $('#exampleModalCenter11').modal('show');
    $('#exampleModalCenter21').modal('hide');

  });

  $(document).on('click', '#view_request', function() {
      $('#exampleModalCenter21').modal('hide');
      $('#exampleModalCenter98').modal('show');
      var hrms_id = $('#hrms_id').val();
      $('#hrms_app').val(hrms_id);
      var Role_id = $('#roles_id').val();

      get_permission(Role_id,hrms_id);


      // $.ajax({
      //   type: 'ajax',
      //   method: 'post',
      //   url: '<?=base_url("cashier/Cashier/get_permission_ajax_new")?>',
      //   data: {Role_id : Role_id, username: hrms_id},
      //   // async: false,
      //   dataType: 'json',
      //   success: function(data) {
      //     // console.log(data);
      //       if(data.role_permission.hrms_rights.indexOf('A') != -1){
      //           $("#leaveAPP").css("display", "");
      //           $("#leaveAPP").css("padding-left", "28%");
      //       }else if(data.user_permission.hrms_rights.indexOf('A') != -1){
      //           $("#leaveAPP").css("display", "");
      //           $("#leaveAPP").css("padding-left", "28%");
      //       }else{
      //           $("#leaveAPP").css("display", "none");
      //           // $("#leaveAPP").css("padding-left", "28%");
      //           // $("#leaveAPP").css("pointer-events", "none");
      //           // $("#leaveAPP").css("opacity", "0.5");
      //           // $('#leaveAPP').addClass('hoverClose');
      //       }
      //
      //       if(data.role_permission.hrms_rights.indexOf('B') != -1){
      //           $("#cashAPP").css("display", "");
      //           $("#leaveAPP").css("padding-left", "");
      //       }else if(data.user_permission.hrms_rights.indexOf('B') != -1){
      //           $("#cashAPP").css("display", "");
      //           $("#leaveAPP").css("padding-left", "");
      //       }else{
      //           $("#cashAPP").css("display", "none");
      //           // $("#cashAPP").css("pointer-events", "none");
      //           // $("#cashAPP").css("opacity", "0.5");
      //           // $('#cashAPP').addClass('hoverClose');
      //       }
      //
      //
      //   },
      //
      // });
      // return false;

    });


    $(document).on('click', '#request1', function() {
      $('#exampleModalCenter21').modal('hide');
      $('#exampleModalCenter99').modal('show');

      var Role_id = $('#roles_id').val();
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?=base_url("cashier/Cashier/get_permission_ajax_new")?>',
        data: {Role_id : Role_id},
        // async: false,
        dataType: 'json',
        success: function(data) {
          // console.log(data);
            if(data.role_permission.hrms_rights.indexOf('C') != -1){
                $("#REQleave").css("display", "");
            }else if(data.user_permission.hrms_rights.indexOf('C') != -1){
                $("#leaveAPP").css("display", "");
            }else{
                $("#REQleave").css("pointer-events", "none");
                $("#REQleave").css("opacity", "0.5");
                $('#REQleave').addClass('hoverClose');
            }

            if(data.role_permission.hrms_rights.indexOf('D') != -1){
                $("#CASHreq").css("display", "");
            }else if(data.user_permission.hrms_rights.indexOf('D') != -1){
                $("#leaveAPP").css("display", "");
            }else{
              $("#CASHreq").css("pointer-events", "none");
              $("#CASHreq").css("opacity", "0.5");
              $('#CASHreq').addClass('hoverClose');

            }

        },

      });
      // return false;

    });


  // $(document).on('click', '.timecard', function() {
  //   $('#exampleModalCenter15').modal('hide');
  //   var sesName = '<?php echo $this->session->userdata["userdata"]["loginEmp"] ?>';
  //   if(sesName == 1){
  //       $('#exampleModalCenter15').modal('show');
  //   }else{
  //     $('#exampleModalCenter12').modal('show');
  //   }

  // });






  $("#one").on('click', function() {
    console.log('432');
    var $el = $('.qs');

    //   console.log($el.length)

    //   for(let i=0;i<$el.length;i++){

    //     let x = $el[i].childNodes[0].nodeValue;
    //      console.log(`${x}`);
    //   console.log(typeof(x));
    //   let y= parseInt(x)
    // //    let  $input =;
    //     $el.html( `<input style="width:30%" id='test'/>` );
    //     $('#test')
    //   }

    //   $input.focus();
    //   var save = function(){
    //     $el.text($input.val());
    //     $input.replaceWith( $el );
    //   };
    $el.attr('contenteditable', 'true');
    //   $el.focus();
    if ($el.attr('contenteditable') == 'true') {
      // do this
      $el.css('border', '1px solid #C6C6C6');
      $el.css('background', '#F7F7F7');
      $el.css('text-align', ' center');
      $el.css('width', ' 65%');
      $('#saveinfo').css('background', 'black');
      $('#saveinfo').css('color', 'white');
    } else {
      $el.css('border', 'none')
    }
    var save = function() {
      $el.css('border', 'none');
      $el.css('background', 'white');
      $el.attr('contenteditable', 'false');

      $('#saveinfo').css('background', '#C4C4C4;');
    };
    $el.one('blur', save);
    //   console.log($el.text());
    //   $input.one('blur', save);

  });
  $("#two").on('click', function() {
    console.log('432');
    var $el = $('.sp');
    $el.attr('contenteditable', 'true');
    //   $el.focus();
    if ($el.attr('contenteditable') == 'true') {
      // do this
      $el.css('border', '1px solid #C6C6C6');
      $el.css('background', '#F7F7F7');
      $el.css('text-align', ' center');
      $el.css('width', ' 65%');
      $('#saveinfo').css('background', 'black');
      $('#saveinfo').css('color', 'white');
    } else {
      $el.css('border', 'none')
    }
    var save = function() {
      $el.css('border', 'none');
      $el.css('background', 'white');

      $el.attr('contenteditable', 'false');

      $('#saveinfo').css('background', '#C4C4C4;');
    };
    $el.one('blur', save);
    //   $el.one('blur', save);
    //   var $input = $('<input style="width:30%"/>').val( $el.text() );
    //   console.log($input);
    //   $el.replaceWith( $input );
    //   $input.focus();
    //   var save = function(){
    //     $el.text($input.val());
    //     $input.replaceWith( $el );
    //   };

    //   $input.one('blur', save);

  });
  $("#three").on('click', function() {
    console.log('432');
    var $el = $('.sp2');
    $el.attr('contenteditable', 'true');
    $el.focus();
    if ($el.attr('contenteditable') == 'true') {
      // do this
      $el.css('border', '1px solid #C6C6C6');
      $el.css('background', '#F7F7F7');
      $el.css('text-align', ' center');
      $el.css('width', ' 65%');
      $('#saveinfo').css('background', 'black');
      $('#saveinfo').css('color', 'white');
    } else {
      $el.css('border', 'none')
    }
    var save = function() {
      $el.css('border', 'none');
      $el.css('background', 'white');

      $el.attr('contenteditable', 'false');

      $('#saveinfo').css('background', '#C4C4C4;');
    };
    $el.one('blur', save);
    //   var $input = $('<input style="width:30%"/>').val( $el.text() );
    //   $el.replaceWith( $input );
    //   $input.focus();
    //   var save = function(){
    //     $el.text($input.val());
    //     $input.replaceWith( $el );
    //   };

    //   $input.one('blur', save);

  });
  $("#four").on('click', function() {
    console.log('432');
    var $el = $('.op');
    $el.attr('contenteditable', 'true');
    //   $el.focus();
    if ($el.attr('contenteditable') == 'true') {
      // do this
      $el.css('border', '1px solid #C6C6C6');
      $el.css('background', '#F7F7F7');
      $el.css('text-align', ' center');
      $el.css('width', ' 65%');
      $('#saveinfo').css('background', 'black');
      $('#saveinfo').css('color', 'white');
    } else {
      $el.css('border', 'none')


      $('#saveinfo').css('background', '#C4C4C4;');
    }
    var save = function() {
      $el.css('border', 'none');
      $el.css('background', 'white');

      $el.attr('contenteditable', 'false');

      $('#saveinfo').css('background', '#C4C4C4;');
    };
    $el.one('blur', save);
  });

  function openCity(evt, cityName) {
    if (cityName == 'ab') {
      $('#ab').show();
      $('#cd').hide();
      $('#cdb > button').hide();
      $('#cdb > a').hide();
      $('#Custsearchbtn').show();
      $('.custbtn').css('background', '#EC4D4D')
      $('.manbtn').css('background', '#E4E4E4')
      $('.custbtn').css('color', 'white')
      $('.manbtn').css('color', 'black')
      $('#cdb ').css('display', 'none');
      // $('#cdb').toggle();
      //  $('#ab').css('display','block');
      //  $('#cd').css('display','none');
      //  $('#cdb').css('display','none');
      //  $('#Custsearchbtn').css('display','flex');
      //  if(document.getElementbyId(#custumsearchbtn).style.displayy=='none')
      $('#ef').hide();
      $('#efg > button').hide();
      $('#efg > a').hide();
      $('#efg ').css('display', 'none');
      $('.manbtn2').css('background', '#E4E4E4');
      $('.manbtn2').css('color', 'black');
    } else if(cityName == 'cd'){
      $('#ab').hide();
      $('#cd').show();
      $('#cdb > button').show();
      $('#cdb > a').show();
      $('#cdb ').css('display', 'flex');
      $('#Custsearchbtn').hide()
      $('.manbtn').css('color', 'white')
      $('.custbtn').css('color', 'black')
      $('.custbtn').css('background', '#E4E4E4')
      $('.manbtn').css('background', '#EC4D4D')
      //  $('#ab').css('display','none');
      // $('#cd').css('display','block');
      // $('#cdb').css('display','block');
      // $('#Custsearchbtn').css('display','none');
      $('#ef').hide();
      $('#efg > button').hide();
      $('#efg > a').hide();
      $('#efg ').css('display', 'none');
      $('.manbtn2').css('background', '#E4E4E4');
      $('.manbtn2').css('color', 'black');

    }else{
        $('#ab').hide();
        $('#cd').hide();
        $('#Custsearchbtn').hide()
        $('#cdb > button').hide();
        $('#cdb > a').hide();
        $('#cdb ').css('display', 'none');

        $('#ef').show();
        $('#efg > button').show();
        $('#efg > a').show();
        $('#efg ').css('display', 'flex');
        $('.tabone').css('background', '#E4E4E4');
        $('.manbtn').css('background', '#E4E4E4');
        $('.manbtn2').css('background', '#EC4D4D');
        $('.manbtn2').css('color', 'white');
        $('.manbtn').css('color', 'black');
        $('.custbtn').css('color', 'black');
    }


    // // var i, tabcontent, tablinks;
    // // tabcontent = document.getElementsByClassName("tabcontent");
    // // for (i = 0; i < tabcontent.length; i++) {
    // //   tabcontent[i].style.display = "none";
    // // }
    // // tablinks = document.getElementsByClassName("tablinks");
    // // for (i = 0; i < tablinks.length; i++) {
    // //   tablinks[i].className = tablinks[i].className.replace(" active", "");
    // // }
    // // document.getElementById(cityName).style.display = "block";
    // // evt.currentTarget.className += " active";




  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
    if($('#is_admin').val() == 1 ){
        if(shift_sess != ''){
          $('#show_admin,.show_admin').hide();
          $('#show_shift,.show_shift').show();
        }else{
          $('#show_admin,.show_admin').show();
          $('#show_shift,.show_shift').hide();
        }

    }else if ($('#is_admin').val() == 0) {
        if(shift_sess != ''){
          $('#show_admin,.show_admin').hide();
          $('#show_shift,.show_shift').show();
        }else{
          $('#show_admin,.show_admin').hide();
          $('#show_shift,.show_shift').hide();
        }
    }
    let isShiftInOpen = false;
    // $('#scilogin').on('click',function(){
    //   if($('.logout').css('display') === 'block') {
    //        $('#exampleModalCenter12').modal();
    //   }
    //   else{setTimeout(() => {
    //      location.reload();
    //   }, 0);}
    //
    // })

    var d = '<?php echo $this->input->get('d') ?>';
    if (d == 'leave') {
        $('#exampleModalCenter21').modal();
    }

  });

  $('#clock_in').click(function() {
      var username = $('.hidden_username').val();

      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url("cashier/Cashier/employee_new_login"); ?>',
        data: {username : username },
        // async: false,
        dataType: 'json',
        success: function(data) {
          console.log(data);
            if(data.status == 'login'){
              swal({
                  title: data.fname+" "+data.lname,
                  text: "Clocked in successfully!",
                  icon: "success",
                  buttons: false,
                  //timer: 3000,
              });
              $('#clock_shift').modal('hide');
              setTimeout( function (){
                 location.reload();
              },2500);

            }
            if(data.status == 'logout'){
              swal({
                  title: data.fname+" "+data.lname,
                  text: "Clocked out successfully!",
                  icon: "success",
                  buttons: false,
                  //timer: 2700,
              });
              $('#clock_shift').modal('hide');
              setTimeout( function (){
                 location.reload();
              },2500);
            }

            if(data.status == 'admin_logout_first'){
              swal({
                  title: "Oops!",
                  text: "Admin clocked out first",
                  icon: "success",
                  buttons: false,
                  timer: 2500,
              });
              $('#clock_shift').modal('hide');
              // setTimeout( function (){
              //    location.reload();
              // },2500);

            }

        },

      });
      return false;

  });

  $('body').on('click','.edit-ts',function(e){
    e.preventDefault();
    var user_id = '<?php echo $this->session->userdata["username"]?>';
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?= base_url("cashier/Cashier/getEmpTimecardBydate") ?>',
      data: {
        user_id: user_id,
        start_date: $(this).data('sd'),
        end_date: $(this).data('ed')
      },
      dataType: 'json',
      success: function(data) {
        // console.log(data);
         $('.ts_empid').html(data.userdetails.user_id);
        $("#TimeCARD").html(data.html);
        //$('lasttimesheet').html(data.last_timesheet);
      }
    });
  })

 $('body').on('click','.edit-manager-ts',function(e){
    e.preventDefault();
    var user_id = '<?php echo $this->session->userdata["username"]?>';
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?= base_url("cashier/Cashier/getEmpTimecardById") ?>',
      data: {
        id: $(this).data('id'),
      },
      success: function(data) {
        // console.log(data);
         $("#TimeCARD_manager").html(data);
        //$('lasttimesheet').html(data.last_timesheet);
      }
    });
  })

 $('body').on('click','.approvebutton',function(e){
    e.preventDefault();
    $.ajax({
      type: 'ajax',
      method: 'post',
      dataType: 'json',
      url: '<?php echo base_url().'cashier/Cashier/approve_timesheet_form_manager' ?>',
      data: {start_date: '2021-10-16',end_date:'2021-10-31'},
      success: function(data) {
        if(data=="success"){
          swal({
                  title: 'Success!',
                  text: "Timesheet submitted successfully!",
                  icon: "success",
                  buttons: false,
                  timer: 2500,
              });
              timesheetreport(2);
        }
        // console.log(data);
        //$('lasttimesheet').html(data.last_timesheet);
      }
    });
  })

    function timesheetreport(request=1){
    //timesheet by akil
    $.ajax({
      type: "POST",
      data: {request:request},
      url: "<?php echo site_url('cashier/timesheetreport') ?>",
      success:function(result){
        if(request==1){
          $('.approvebutton').hide();
        } else{
          $('.approvebutton').show();
        }
        $('.timesheetreport').html(result)
      }
    })

  }

  function timesheetreport_by_user(){
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('cashier/timesheetreport_by_user') ?>",
      success:function(result){
         $('.approvebutton').hide();
        $('.timesheetreport_edit').html(result)
      }
    })

  }
  $('.timecard').on('click', function() {
  //  get_current_timecard();
  });

  function get_current_timecard(){
    return;
    var user_id = '<?php echo $this->session->userdata["userdata"]["user_id"]?>';
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?= base_url("cashier/Cashier/getEmpTimecardBydate") ?>',
      data: {
        user_id: user_id
      },
      dataType: 'json',
      success: function(data) {
        // console.log(data);
         $('.ts_empid').html(data.userdetails.user_id);
        $("#TimeCARD").html(data.html);
        //$('lasttimesheet').html(data.last_timesheet);
      }
    });
}
</script>
<script type="text/javascript">
  $('#category').on('change', function() {
    var category_id = $('#category').val();

    $.ajax({
      type: "POST",
      url: '<?= base_url("cashier/Cashier/fetch_size_type") ?>',
      data: {
        category_id: category_id
      },
      dataType: 'json',
      success: function(data) {
        //console.log(data);
        var measurements = [];
        $.each(data.sizename, function(index, value) {
           measurements.push(value.name);
        });

        $('#measurement_value').val(measurements);

        var option_list = '';
        if(data.is_last_size != ''){
            $('.size12').val(data.is_last_size);
        }
        $.each(data.sizename, function(index, value) {
          //console.log(value.name);
          option_list += '<option>' + value.name + '</option>';
        });
        $('#sizes').html(option_list);


        //crv
        if (data.Applicable_CRV == 1) {
          $("#CRV").prop("checked", true);
        } else {
          $("#CRV").prop("checked", false);
        }

        // tax

        if (data.Applicable_Tax == 1) {
          $("#TAX").prop("checked", true);
        } else {
          $("#TAX").prop("checked", false);
        }

        if (data.age_restrict == 0) {
          $('#age').hide();
          $('#restict').hide();
        } else if (data.age_restrict == 1) {
          $('#age').show();
          $('#restict').show();
        }
      },
    });

  });

  $('#category').change(function() {
      var category_id = $(this).val();
      // alert(category_id);
      $.ajax({
          type: "POST",
          url: '<?=base_url("cashier/Cashier/fetch_supplier")?>',
          data: {category_id: category_id},
          dataType : 'json',
          success : function(data){
            console.log(data);
            var option_list = '';
              $.each(data, function(index, value){
                  //console.log(value.name);
                 option_list += '<option>'+value.supplier_name+'</option>';
              });

            $('#suppliers').html(option_list);
         },
       });

  });

</script>
<script type="text/javascript">
    //advance cash
  $('#btnAdv').on('click', function() {
    var amt = $('#paycheckAMT').val();

    if ($('#advance_amount').val() == '' || $('#advance_amount').val() < 1) {
      $("#amt_err").html("Please enter at least $1 or more").show();
      return false;
    }
    if(parseFloat($('#paycheckAMT').val()) < parseFloat($('#advance_amount').val())){
        $("#amt_err").html("Amount entered is exceeding your limit").show();
        return false;
    }
    if ($('#reasonadv1').val() == '') {
      $("#reasonadv_err").html("Please enter the reason").show();
      return false;
    }
    // if($("input[name='paycheck']:checked"). val()){
    //     $("#rdo_err").html("").show();
    // }else if(!($('#flexRadioDefault1:checked').val() || $('#flexRadioDefault2:checked').val())){
    //     $("#rdo_err").html("Please select Paycheck").show();
    //     return false;
    // }
    if ($('#selPaycheck').val() == '--Select Paycheck--') {
        $("#rdo_err").html("Please select paycheck").show();
        return false;
    }
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?= base_url("cashier/Cashier/insert_advancecash") ?>',
      data: $('.advance-cash').serialize(),
      async: false,
      dataType: 'json',
      success: function(data) {
        console.log(data);
        $('.advance-cash')[0].reset();
        if(data == 'success'){
          swal({
              title: "Success!",
              text: "Cash advance request submitted!",
              icon: "success",
              buttons: false,
          });
          $('#exampleModalCenter11').modal('hide');
          if(node_setting == 1){
            data = '{"user_id":25}';
            socket.emit('send_notification',JSON.parse(data));
          }
        }
        setTimeout( function (){
          location.reload();
        },1600);

      },

    });
    return false;


  });

  $('.inputFile5').bind('change', function() {
    var today = new Date().getFullYear() + '-' + ("0" + (new Date().getMonth() + 1)).slice(-2) + '-' + ("0" + new Date().getDate()).slice(-2);
    var amt = $('#paycheckAMT').val();
    if ($('#advance_amount').val() == '' || $('#advance_amount').val() < 1) {
      $("#amt_err").html("Please enter the correct amount").show();
      return false;
    } else {
      $("#amt_err").html("").show();
    }
    if(parseFloat($('#paycheckAMT').val()) < parseFloat($('#advance_amount').val())){
        $("#amt_err").html("Amount entered is exceeding your limit").show();
        return false;
    }else{
         $("#amt_err").html("").show();
    }
    if ($('#reasonadv1').val() == '') {
      $("#reasonadv_err").html("Please enter the reason").show();
      return false;
    } else {
      $("#reasonadv_err").html("").show();
    }
    // if(!($('#flexRadioDefault1:checked').val() || $('#flexRadioDefault2:checked').val())){
    //     $("#rdo_err").html("Please select Paycheck").show();
    //     return false;
    // }else {
    //   $("#rdo_err").html("").show();
    // }

    if ($('#selPaycheck').val() == '--Select Paycheck--') {
        $("#rdo_err").html("Please select paycheck").show();
        return false;
    }else{
        $("#rdo_err").html("").show();
    }

  });

</script>
<script type="text/javascript">
  $('.couponM').on('click', function() {
    window.location = '<?= base_url("cashier/loyalty") ?>?d=l';
  });
</script>
<script type="text/javascript">
  function isNumberKey(txt, evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode == 46) {
      //Check if the text already contains the . character
      if (txt.value.indexOf('.') === -1) {
        return true;
      } else {
        return false;
      }
    } else {
      if (charCode > 31 &&
        (charCode < 48 || charCode > 57))
        return false;
    }
    return true;
  }
</script>
<script>
    $(document).ready( function(){

        $('.mtab').click(function(){
          $('.mtab').removeClass('active');
          $(this).addClass('active');
          $('.ctab').hide();
          var tab=$(this).data('tab');
          $("."+tab).show()
          if($(this).data('tab')=='report'){
            timesheetreport();
          } else{
              get_current_timecard();
              timesheetreport_by_user();
          }
        })




        let  idFlag = false
        $(".takeInputLogin").focus(function() {
            currentField = document.activeElement
            // console.log(currentField.value)
        });
        $("#empID").focus(function() {
             currentField2 = document.activeElement
            // console.log(currentField.value)
        });
        $("#empPWD").focus(function() {
             currentField2 = document.activeElement
            // console.log(currentField.value)
        });
        $('.keypad-btn').on('click', function() {
          if(!$(this).hasClass("clki")){
          newCharacter = this.innerHTML;
          // alert(newCharacter)
          // newCharacter = parseInt(newCharacter)
          // added auto tab
          if ($('#empid').val().length >= 2  && $(this).hasClass('backBTN') == false ) {
            $('#emppwd').focus();
            $('#mlkeyboard').css('display','none');
          }

          if ($('#emppwd').val().length >= 4 && $(this).hasClass('backBTN') == false && $(this).hasClass('tabBTN') == false) {
            if($('#empid').val().length != 2  && $(this).hasClass('backBTN') == false ){
              $('#empid').focus();
              $('#mlkeyboardnum').css('display','none');
            }
            // else{
            //   $('#btnFront').trigger('click'); //10july
            // }

          }

          if (newCharacter === "🠔") {
            currentField.value = currentField.value.substring(0, currentField.value.length - 1);
          } else if (newCharacter.length > 5) {
//            alert('222')
          } else if (newCharacter === "Tab") {
            if(idFlag == false){
            $('#emppwd').focus();
            $('#mlkeyboard').css('display','none');
            idFlag = true
            }
            else{
              $('#emppwd').blur();
              $('#empid').focus();
              $('#mlkeyboardnum').css('display','none');
              idFlag = false;
            }
          } else {
            currentField.value += newCharacter
              // if ($('#emppwd').val().length == 4 ) {  10july
              //   $('#btnFront').trigger('click');
              // }
          }
        } });
        // $('.clki').on('click', function() {
        //   newCharacter2 = this.innerHTML;
        //
        //   if (newCharacter2 === "🠔") {
        //     currentField2.value = currentField2.value.substring(0, currentField2.value.length - 1);
        //   }  else {
        //     currentField2.value += newCharacter2
        //     if ($('#empID').val().length >= 2 ) {
        //       $('#empID').blur();
        //         $('#empPWD').focus();
        //       }
        //       if ($('#empPWD').val().length == 4 ) {
        //         $('#btnLogin').trigger('click');
        //       }
        //   }
        // })
    });


    // $(document).click(function(e) {
    //     if (!$(e.target).closest('.front-login').length) {
    //           $('.front_login')[0].reset();
    //           $('#id1_err').html('').show();
    //           $('#pwd1_err').html('').show();
    //           // $('#pwd2_err').html('').show(); 17APR
    //     }
    // });

    $('#btnFront').click(function() {
        if($('#empid').val() == ''){
            $("#id1_err").html("Please enter your Employee Username").show();
            return false;
        }
        if($('#emppwd').val() == ''){
            $("#pwd1_err").html("Please enter your Employee Password").show();
            return false;
        }
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url("cashier/front_login"); ?>',
            data: $('.front_login').serialize(),
            dataType: 'json',
            success: function(data) {
            console.log(data);
            var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';

            $('.hidden_username').val($('#empid').val() );
            $('.hidden_shift_user').val($('#empid').val() );
            $('.hidden_emp').val($('#empid').val() );
            $('.hidden_emp1').val($('#empid').val() );

            var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
            if(admin != ''){
                if(shift_sess != ''){
                  $('#show_admin,.show_admin').hide();
                  $('#show_shift,.show_shift').show();
                }else{
                  $('#show_admin,.show_admin').show();
                  $('#show_shift,.show_shift').hide();
                }
                $('#is_admin').val(1);
            }else{
                if(shift_sess != '' && data.Role_id == 1){
                  $('#show_admin,.show_admin').hide();
                  $('#show_shift,.show_shift').show();
                }else if(shift_sess != '' && data.Role_id != 1){
                  $('#show_admin,.show_admin').hide();
                  $('#show_shift,.show_shift').show();
                }else if(data.Role_id == 1){
                  $('#show_admin,.show_admin').show();
                  $('#show_shift,.show_shift').hide();
                }else{
                  $('#show_admin,.show_admin').hide();
                  $('#show_shift,.show_shift').hide();
                }
                $('#is_admin').val(data.Role_id);
            }


            if (data == 'password_fail') {
                $('#emppwd').val('');
                $('#emppwd').focus();
                swal({
                    title: "Oops!",
                    text: "Password does not match!",
                    icon: "error",
                    buttons: false,
                    timer :2500,
                });
            }
            if (data == 'user_not_exist') {
                $('.front_login')[0].reset();
                $('#empid').focus();
                swal({
                    title: "Oops!",
                    text: "User does not exist!",
                    icon: "error",
                    buttons: false,
                    timer :2500,
                });
            }
            if (data == 'not_permission') {
                swal({
                    title: "Oops!",
                    text: "You don't have the required permission to access this page!",
                    icon: "error",
                    buttons: false,
                    timer :2700,
                });
                $('.front-login').modal('hide');
            }

            if (data == 'clock_first') {
                swal({
                    title: "Oops!",
                    text: "Please clock in first!",
                    icon: "error",
                    buttons: false,
                    timer :2700,
                });

                if(shift_sess != ''){
                  $('#show_admin,.show_admin').hide();
                  $('#show_shift,.show_shift').show();
                }else{
                  $('#show_admin,.show_admin').hide();
                  $('#show_shift,.show_shift').hide();
                }
               $('.front-login').modal('hide');
            }

            if (data.status == 'invalid_login') {
                $('.front-login').modal('hide');
                if (data.module == 'inventory'  && data.clock_status == '1' ) {
                  window.location = '<?php echo base_url("cashier/inventory")?>'
                }else if (data.module == 'reports' && data.clock_status == '1') {
                  window.location = '<?= base_url("cashier/reports") ?>';
                }else if (data.module == 'loyalty' && data.clock_status == '1') {
                  window.location = '<?php echo base_url("cashier/loyalty")?>'
                }else if (data.module == 'store' && data.clock_status == '1') {
                  window.location = '<?php echo base_url("cashier/settings")?>'
                }else if (data.module == 'e_order' && data.clock_status == '1') {
                  window.location = '<?php echo base_url("cashier/eorder")?>'
                }else if (data.module == 'pos' && data.clock_status == '1') {
                  window.location = '<?php echo base_url("cashier/POSterminal")?>'
                }else if (data.module == 'market_place') {
                  $('.front-login').modal('hide');
                }else if (data.module == 'help' ) {
                  $('.front-login').modal('hide');
                }else if (data.module == 'submit_timecard' && data.clock_status == '1') {
                  $('#exampleModalCenter15').modal();
                  get_permission(data.Role_id,$('#empid').val());
                }else if (data.module == 'hrms' && data.clock_status == '1') {
                    $('#hrms_id').val($('#empid').val());
                    $('#roles_id').val(data.Role_id);
                    $('#exampleModalCenter21').modal();
                    get_permission(data.Role_id,$('#empid').val());
                }else if (data.module == 'clock'){
                      if(data.clock_status == '0' ){
                          swal({
                              title: data.name,
                              text: "Clocked in successfully!",
                              icon: "success",
                              buttons: false,
                              timer: 2700,
                          });
                          if(shift_sess == $('#empid').val() || shift_sess == ''){
                              $('#clock_shift').modal();
                              $('#docUser1').text('Clock Out');
                              $('#docUser2').text('Clock Out');
                          }

                     }else if(data.clock_status == '1' && shift_sess != ''){
                         $('#clock_shift').modal();
                         $('#docUser1').text('Clock Out');
                         $('#docUser2').text('Clock Out');
                     }
                }else if (data.module != 'clock' && data.clock_status == '0'){
                    swal({
                        title: "Oops!",
                        text: "Please clock in first!",
                        icon: "error",
                        buttons: false,
                        timer :2700,
                    });
                    $('#is_admin').val(0);
                    if(shift_sess != ''){
                      $('#show_admin,.show_admin').hide();
                      $('#show_shift,.show_shift').show();
                    }else{
                      $('#show_admin,.show_admin').hide();
                      $('#show_shift,.show_shift').hide();
                    }
                }
            }else if(data.status == 'forget_clockout'){
                $('.front-login').modal('hide');
                swal({
                    title: data.name,
                    text: "Clocked in successfully!",
                    icon: "success",
                    buttons: false,
                    timer: 2700,
                });
                if(shift_sess == $('#empid').val() || shift_sess == ''){
                    $('#clock_shift').modal();
                    $('#docUser1').text('Clock Out');
                    $('#docUser2').text('Clock Out');
                }
            }else {
                if(data.clock_perm == 1){
                    $('.front-login').modal('hide');
                    if(data.status == 'auto_clockout'){
                          if(data.Role_id == 1){
                            $('#is_admin').val(0);

                              if(shift_sess != ''){
                                $('#show_admin,.show_admin').hide();
                                $('#show_shift,.show_shift').show();
                              }else{
                                $('#show_admin,.show_admin').hide();
                                $('#show_shift,.show_shift').hide();
                              }

                          }
                          swal({
                              title: data.fname+" "+data.lname,
                              text: "Clocked out successfully!",
                              icon: "success",
                              buttons: false,
                              timer: 2700,
                          });
                    }else{
                        $('#clock_shift').modal();
                        $('#docUser1').text('Clock Out');
                        $('#docUser2').text('Clock Out');
                    }
                }
            }

            },

          });
          return false;
    });

  //new login changes

  $(document).on('click','.keypad-btn', function(){
      var pwd = $('#emppwd').val();
      if(pwd.length == 4){
          if($('#empid').val() == ''){
              $("#id1_err").html("Please enter your Employee Username").show();
              return false;
          }
          if($('#emppwd').val() == ''){
              $("#pwd1_err").html("Please enter your Employee Password").show();
              return false;
          }

          $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo base_url("cashier/front_login"); ?>',
              data: $('.front_login').serialize(),
              dataType: 'json',
              success: function(data) {
              console.log(data);
  //            location.reload();
              var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
              $('.hidden_username').val($('#empid').val() );
              $('.hidden_shift_user').val($('#empid').val() );
              $('.hidden_emp').val($('#empid').val() );
              $('.hidden_emp1').val($('#empid').val() );

              var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
              if(admin != ''){
                  if(shift_sess != ''){

                    $('#show_admin,.show_admin').hide();
                    $('#show_shift,.show_shift').show();
                  }else{

                    $('#show_admin,.show_admin').show();
                    $('#show_shift,.show_shift').hide();
                  }
                  $('#is_admin').val(1);
              }else{
                  if(shift_sess != '' && data.Role_id == 1){
                    $('#show_admin,.show_admin').hide();
                    $('#show_shift,.show_shift').show();
                  }else if(shift_sess != '' && data.Role_id != 1){
                    $('#show_admin,.show_admin').hide();
                    $('#show_shift,.show_shift').show();
                  }else if(data.Role_id == 1){
                    $('#show_admin,.show_admin').show();
                    $('#show_shift,.show_shift').hide();
                  }else{
                    $('#show_admin,.show_admin').hide();
                    $('#show_shift,.show_shift').hide();
                  }
                  $('#is_admin').val(data.Role_id);
              }

              if (data == 'password_fail') {
                $('#emppwd').val('');
                $('#emppwd').focus();
                $('#mlkeyboard').css('display','none');
                swal({
                    title: "Oops!",
                    text: "Password does not match!",
                    icon: "error",
                    buttons: false,
                    timer :2500,
                });
              }
              if (data == 'user_not_exist') {
                $('.front_login')[0].reset();
                $('#empid').focus();
                $('#mlkeyboardnum').css('display','none');
                swal({
                    title: "Oops!",
                    text: "User does not exist!",
                    icon: "error",
                    buttons: false,
                    timer :2500,
                });
              }
              if (data == 'not_permission') {
                swal({
                    title: "Oops!",
                    text: "You don't have the required permission to access this page!",
                    icon: "error",
                    buttons: false,
                    timer :2700,
                });
                $('.front-login').modal('hide');
              }

              if (data == 'clock_first') {
                  swal({
                      title: "Oops!",
                      text: "Please clock in first!",
                      icon: "error",
                      buttons: false,
                      timer :2700,
                  });

                  if(shift_sess != ''){
                    $('#show_admin,.show_admin').hide();
                    $('#show_shift,.show_shift').show();
                  }else{
                    $('#show_admin,.show_admin').hide();
                    $('#show_shift,.show_shift').hide();
                  }
                 $('.front-login').modal('hide');
              }

              if (data.status == 'invalid_login') {
                $('.front-login').modal('hide');
                if (data.module == 'inventory'  && data.clock_status == '1' ) {
                  window.location = '<?php echo base_url("cashier/inventory")?>'
                }else if (data.module == 'reports' && data.clock_status == '1') {
                  window.location = '<?= base_url("cashier/reports") ?>';
                }else if (data.module == 'loyalty' && data.clock_status == '1') {
                  window.location = '<?php echo base_url("cashier/loyalty")?>'
                }else if (data.module == 'store' && data.clock_status == '1') {
                  window.location = '<?php echo base_url("cashier/settings")?>'
                }else if (data.module == 'e_order' && data.clock_status == '1') {
                  window.location = '<?php echo base_url("cashier/eorder")?>'
                }else if (data.module == 'pos' && data.clock_status == '1') {
                  window.location = '<?php echo base_url("cashier/POSterminal")?>'
                }else if (data.module == 'market_place') {
                  $('.front-login').modal('hide');
                }else if (data.module == 'help' ) {
                  $('.front-login').modal('hide');
                }else if (data.module == 'submit_timecard' && data.clock_status == '1') {
                  $('#exampleModalCenter15').modal();
                  get_permission(data.Role_id,$('#empid').val());
                }else if (data.module == 'hrms' && data.clock_status == '1') {
                    $('#hrms_id').val($('#empid').val());
                    $('#roles_id').val(data.Role_id);
                    $('#exampleModalCenter21').modal();
                    get_permission(data.Role_id,$('#empid').val());
                }else if (data.module == 'clock'){
                      if(data.clock_status == '0' ){
                          swal({
                              title: data.name,
                              text: "Clocked in successfully!",
                              icon: "success",
                              buttons: false,
                              timer: 2700,
                          });
                          if(shift_sess == $('#empid').val() || shift_sess == ''){
                              $('#clock_shift').modal();
                              $('#docUser1').text('Clock Out');
                              $('#docUser2').text('Clock Out');
                          }

                     }else if(data.clock_status == '1' && shift_sess != ''){
                         $('#clock_shift').modal();
                         $('#docUser1').text('Clock Out');
                         $('#docUser2').text('Clock Out');
                     }
                }else if (data.module != 'clock' && data.clock_status == '0'){
                    swal({
                        title: "Oops!",
                        text: "Please clock in first!",
                        icon: "error",
                        buttons: false,
                        timer :2700,
                    });
                    $('#is_admin').val(0);
                      if(shift_sess != ''){
                        $('#show_admin,.show_admin').hide();
                        $('#show_shift,.show_shift').show();
                      }else{
                        $('#show_admin,.show_admin').hide();
                        $('#show_shift,.show_shift').hide();
                      }
                }
              }else if(data.status == 'forget_clockout'){
                  $('.front-login').modal('hide');
                  swal({
                      title: data.name,
                      text: "Clocked in successfully!",
                      icon: "success",
                      buttons: false,
                      timer: 2700,
                  });
                  if(shift_sess == $('#empid').val() || shift_sess == ''){
                      $('#clock_shift').modal();
                      $('#docUser1').text('Clock Out');
                      $('#docUser2').text('Clock Out');
                  }
              }else {
                if(data.clock_perm == 1){
                    $('.front-login').modal('hide');
                    if(data.status == 'auto_clockout'){
                        if(data.Role_id == 1){
                          $('#is_admin').val(0);
                          if(shift_sess != ''){
                            $('#show_admin,.show_admin').hide();
                            $('#show_shift,.show_shift').show();
                          }else{
                            $('#show_admin,.show_admin').hide();
                            $('#show_shift,.show_shift').hide();
                          }
                        }
                        swal({
                            title: data.fname+" "+data.lname,
                            text: "Clocked out successfully!",
                            icon: "success",
                            buttons: false,
                            timer: 2700,
                        });
                    }else{
                        $('#clock_shift').modal();
                        $('#docUser1').text('Clock Out');
                        $('#docUser2').text('Clock Out');
                    }
                }
              }

          },

          });
          return false;
      }

  });

  $(document).on('keyup','#emppwd', function(){
        var pwd = $('#emppwd').val();
        if(pwd.length == 4){
          if($('#empid').val() == ''){
              $("#id1_err").html("Please enter your Employee Username").show();
              return false;
          }
          if($('#emppwd').val() == ''){
              $("#pwd1_err").html("Please enter your Employee Password").show();
              return false;
          }
          $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo base_url("cashier/front_login"); ?>',
              data: $('.front_login').serialize(),
              dataType: 'json',
              success: function(data) {
                console.log(data);
                get_current_timecard();
                timesheetreport_by_user();

                var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
                $('.hidden_username').val($('#empid').val() );
                $('.hidden_shift_user').val($('#empid').val() );
                $('.hidden_emp').val($('#empid').val() );
                $('.hidden_emp1').val($('#empid').val() );

                var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
                if(admin != ''){
                    if(shift_sess != ''){
                      $('#show_admin,.show_admin').hide();
                      $('#show_shift,.show_shift').show();
                    }else{
                      $('#show_admin,.show_admin').show();
                      $('#show_shift,.show_shift').hide();
                    }
                    $('#is_admin').val(1);
                }else{
                    if(shift_sess != '' && data.Role_id == 1){
                      $('#show_admin,.show_admin').hide();
                      $('#show_shift,.show_shift').show();
                    }else if(shift_sess != '' && data.Role_id != 1){
                      $('#show_admin,.show_admin').hide();
                      $('#show_shift,.show_shift').show();
                    }else if(data.Role_id == 1){
                      $('#show_admin,.show_admin').show();
                      $('#show_shift,.show_shift').hide();
                    }else{
                      $('#show_admin,.show_admin').hide();
                      $('#show_shift,.show_shift').hide();
                    }
                    $('#is_admin').val(data.Role_id);
                }

                if (data == 'password_fail') {
                    $('#emppwd').val('');
                    $('#emppwd').focus();
                    $('#mlkeyboard').css('display','none');
                    swal({
                        title: "Oops!",
                        text: "Password does not match!",
                        icon: "error",
                        buttons: false,
                        timer :2500,
                    });
                }
                if (data == 'user_not_exist') {
                    $('.front_login')[0].reset();
                    $('#empid').focus();
                    swal({
                        title: "Oops!",
                        text: "User does not exist!",
                        icon: "error",
                        buttons: false,
                        timer :2500,
                    });
                }
                if (data == 'not_permission') {
                    swal({
                        title: "Oops!",
                        text: "You don't have the required permission to access this page!",
                        icon: "error",
                        buttons: false,
                        timer :2700,
                    });
                    $('.front-login').modal('hide');
                }

                if (data == 'clock_first') {
                    swal({
                        title: "Oops!",
                        text: "Please clock in first!",
                        icon: "error",
                        buttons: false,
                        timer :2700,
                    });

                    if(shift_sess != ''){
                      $('#show_admin,.show_admin').hide();
                      $('#show_shift,.show_shift').show();
                    }else{
                      $('#show_admin,.show_admin').hide();
                      $('#show_shift,.show_shift').hide();
                    }
                   $('.front-login').modal('hide');
                }

                if (data.status == 'invalid_login') {
                    $('.front-login').modal('hide');
                    if (data.module == 'inventory'  && data.clock_status == '1' ) {
                      window.location = '<?php echo base_url("cashier/inventory")?>'
                    }else if (data.module == 'reports' && data.clock_status == '1') {
                      window.location = '<?= base_url("cashier/reports") ?>';
                    }else if (data.module == 'loyalty' && data.clock_status == '1') {
                      window.location = '<?php echo base_url("cashier/loyalty")?>'
                    }else if (data.module == 'store' && data.clock_status == '1') {
                      window.location = '<?php echo base_url("cashier/settings")?>'
                    }else if (data.module == 'e_order' && data.clock_status == '1') {
                      window.location = '<?php echo base_url("cashier/eorder")?>'
                    }else if (data.module == 'pos' && data.clock_status == '1') {
                      window.location = '<?php echo base_url("cashier/POSterminal")?>'
                    }else if (data.module == 'market_place') {
                      $('.front-login').modal('hide');
                    }else if (data.module == 'help' ) {
                      $('.front-login').modal('hide');
                    }else if (data.module == 'submit_timecard' && data.clock_status == '1') {
                      $('#exampleModalCenter15').modal();
                      get_permission(data.Role_id,$('#empid').val());
                    }else if (data.module == 'hrms' && data.clock_status == '1') {
                        $('#hrms_id').val($('#empid').val());
                        $('#roles_id').val(data.Role_id);
                        $('#exampleModalCenter21').modal();
                        get_permission(data.Role_id,$('#empid').val());
                    }else if (data.module == 'clock'){
                          if(data.clock_status == '0' ){
                              swal({
                                  title: data.name,
                                  text: "Clocked in successfully!",
                                  icon: "success",
                                  buttons: false,
                                  timer: 2700,
                              });
                              if(shift_sess == $('#empid').val() || shift_sess == ''){
                                  $('#clock_shift').modal();
                                  $('#docUser1').text('Clock Out');
                                  $('#docUser2').text('Clock Out');
                              }

                         }else if(data.clock_status == '1' && shift_sess != ''){
                             $('#clock_shift').modal();
                             $('#docUser1').text('Clock Out');
                             $('#docUser2').text('Clock Out');
                         }
                    }else if (data.module != 'clock' && data.clock_status == '0'){
                        swal({
                            title: "Oops!",
                            text: "Please clock in first!",
                            icon: "error",
                            buttons: false,
                            timer :2700,
                        });
                        $('#is_admin').val(0);
                        if(shift_sess != ''){
                          $('#show_admin,.show_admin').hide();
                          $('#show_shift,.show_shift').show();
                        }else{
                          $('#show_admin,.show_admin').hide();
                          $('#show_shift,.show_shift').hide();
                        }
                    }
                }else if(data.status == 'forget_clockout'){
                    $('.front-login').modal('hide');
                    swal({
                        title: data.name,
                        text: "Clocked in successfully!",
                        icon: "success",
                        buttons: false,
                        timer: 2700,
                    });
                    if(shift_sess == $('#empid').val() || shift_sess == ''){
                        $('#clock_shift').modal();
                        $('#docUser1').text('Clock Out');
                        $('#docUser2').text('Clock Out');
                    }
                }else {
                    if(data.clock_perm == 1){
                        $('.front-login').modal('hide');
                        if(data.status == 'auto_clockout'){
                            if(data.Role_id == 1){
                              $('#is_admin').val(0);
                              if(shift_sess != ''){
                                $('#show_admin,.show_admin').hide();
                                $('#show_shift,.show_shift').show();
                              }else{
                                $('#show_admin,.show_admin').hide();
                                $('#show_shift,.show_shift').hide();
                              }
                            }
                            swal({
                                title: data.fname+" "+data.lname,
                                text: "Clocked out successfully!",
                                icon: "success",
                                buttons: false,
                                timer: 2700,
                            });
                        }else{
                            $('#clock_shift').modal();
                            $('#docUser1').text('Clock Out');
                            $('#docUser2').text('Clock Out');
                        }
                    }
                }

                },

                });
                return false;
         }

    });

    $('.hrms_one').click(function() {
      var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
      if($('#is_admin').val() == 1 ){
            $('#hrms_id').val($('#empid').val());
            $('#roles_id').val(1);
            $('#exampleModalCenter21').modal();
            get_permission(1,$('#empid').val());  //admin role_id == 1
      }else{
            $('input[name=module]').val('hrms');
            $('.front-login').modal();
            $('.front_login')[0].reset();
            $('#empid').focus();
            $('#mlkeyboardnum').css('display','none');
            $('#id1_err').html('').show();
            $('#pwd1_err').html('').show();

            $('.cashcenter').text('HRMS Login');
        }
    });

    $('.e_order_one').click(function() {
      var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
      if($('#is_admin').val() == 1){
          window.location = '<?php echo base_url("cashier/eorder")?>'
      }else{
          $('input[name=module]').val('e_order');
          $('.front-login').modal();
          $('.front_login')[0].reset();
          $('#empid').focus();          
          $('#mlkeyboardnum').css('display','none');
          $('#id1_err').html('').show();

          $('.cashcenter').text('E-Order Login');
       }
    });

    $('.inventory_one').click(function() {
          var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
          // alert(admin);
          if($('#is_admin').val() == 1){
              window.location = '<?php echo base_url("cashier/inventory")?>';
          }else{
              $('input[name=module]').val('inventory');
              $('.front-login').modal();
              $('.front_login')[0].reset();
              $('#empid').focus();
              $('#mlkeyboardnum').css('display','none');
              $('#id1_err').html('').show();
              $('#pwd1_err').html('').show();
              $('.cashcenter').text('Inventory Login');
          }

    });

    $('.posterminal_one,.mobileimg').click(function() {
        var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
        var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
        if($('#is_admin').val() == 1 && shift_sess != ''){
            window.location = '<?php echo base_url("cashier/POSterminal")?>'
        }else{
          if(shift_sess == ''){
              swal({
                  title: "Oops!",
                  text: "Please start shift first!",
                  icon: "error",
                  buttons: false,
                  timer :2700,
              });
          }else{
            $('input[name=module]').val('pos');
            $('.front-login').modal();
            $('.front_login')[0].reset();
            $('#empid').focus();
            $('#mlkeyboardnum').css('display','none');
            $('#id1_err').html('').show();
            $('#pwd1_err').html('').show();
          }

          $('.cashcenter').text('Ring Sales Login');
        }

    });

    $('.loyalty_one').click(function() {
      var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
      if($('#is_admin').val() == 1){
          window.location = '<?php echo base_url("cashier/loyalty")?>';
      }else{
          $('input[name=module]').val('loyalty');
          $('.front-login').modal();
          $('.front_login')[0].reset();
          $('#empid').focus();
          $('#mlkeyboardnum').css('display','none');
          $('#id1_err').html('').show();
          $('#pwd1_err').html('').show();
          $('.cashcenter').text('Customers / Loyalty Login');
      }

    });

    $('.store_one').click(function() {
      var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
        if($('#is_admin').val() == 1 ){
            window.location = '<?php echo base_url("cashier/settings")?>'
        }else{
          $('input[name=module]').val('store');
          $('.front-login').modal();
          $('.front_login')[0].reset();
          $('#empid').focus();
          $('#mlkeyboardnum').css('display','none');
          $('#id1_err').html('').show();
          $('#pwd1_err').html('').show();

          $('.cashcenter').text('POS Settings Login');
      }

    });
    $('body').on('change','#cdaterange',function(e  ){
      e.preventDefault();
      timesheetreport($(this).val());
    })
    // $('body').on('change','.edit_time',function(e) {
    //   e.preventDefault();
    //     $.ajax({
    //       type: 'ajax',
    //       method: 'post',
    //       url: '<?php echo base_url("cashier/Cashier/edit_time"); ?>',
    //       data: {id: $(this).data('id'),custom_hours: $(this).val()},
    //       dataType: 'json',
    //       success: function(result) {
    //         timesheetreport();
    //       }
    //     })
    // });

    // $('body').on('change','.insert_time',function(e) {
    //   e.preventDefault();
    //     $.ajax({
    //       type: 'ajax',
    //       method: 'post',
    //       url: '<?php echo base_url("cashier/Cashier/save_new_time"); ?>',
    //       data: {start_date: $(this).data('sd'),username: $(this).data('username'),custom_hours: $(this).val()},
    //       dataType: 'json',
    //       success: function(result) {
    //         timesheetreport();
    //       }
    //     })
    // });

    $('body').on('change','.grid-item input',function(e){
      var username=$(this).parent().attr('class');
      username=username.split('-');
      $('button[data-un="'+username[2].trim()+'"]').click();
    })
    $('body').on('click','.edit-timesheet-manager',function(e) {
      e.preventDefault();
      var r=$(this).data('r');
      var editdata=[],insertdata=[];
      var i=0;
       $('.user-'+$(this).data('un')+ ' .edit_time').each(function(){
          editdata[i++]={ 'id': $(this).data('id'), 'custom_hours': $(this).val() }
       })
       var i=0;
       $('.user-'+$(this).data('un')+ ' .insert_time').each(function(){
          insertdata[i++]={ 'sd': $(this).data('sd'), 'custom_hours': $(this).val() }
       })
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?php echo base_url("cashier/Cashier/save_week_timesheet_form_manager"); ?>',
          data: {username: $(this).data('un'),editdata: editdata, insertdata: insertdata },
          dataType: 'json',
          success: function(result) {
          console.log(result);
            if(result.trim() == 'success'){
              swal({
                  title: 'Success!',
                  text: "Timesheet submitted successfully!",
                  icon: "success",
                  buttons: false,
                  timer: 2500,
              });
              timesheetreport(r);
              $('#TimeCARD_manager').html('');
            }
          }
        })

    })


    $('body').on('click','.save_week_timesheet',function() {
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?php echo base_url("cashier/save_week_timesheet"); ?>',
          data: $('.save_week_timesheet_form').serialize(),
          dataType: 'json',
          success: function(result) {
          console.log(result);
            if(result.trim() == 'success'){
              swal({
                  title: 'Success!',
                  text: "Timesheet submited successfully!",
                  icon: "success",
                  buttons: false,
                  //timer: 2500,
              });
              get_current_timecard();
              timesheetreport_by_user();
            }
          }
        })

    })




    $('.timecard_one').click(function() {
      var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
        if($('#is_admin').val() == 1 ){
            $('#exampleModalCenter15').modal();
            get_permission(1,$('#empid').val());  //admin role_id = 1;
        }else{
            $('input[name=module]').val('submit_timecard');
            $('.front-login').modal();
            $('.front_login')[0].reset();
            $('#empid').focus();
            $('#mlkeyboardnum').css('display','none');
            $('#id1_err').html('').show();
            $('#pwd1_err').html('').show();

            $('.cashcenter').text('Timecard Login');
        }

    });

    $('.clock_one').click(function() {
        $('input[name=module]').val('clock');
        $('.front-login').modal();
        $('.front_login')[0].reset();
        $('#empid').focus();
        $('#mlkeyboardnum').css('display','none');
        $('#id1_err').html('').show();
        $('#pwd1_err').html('').show();

        $('.cashcenter').text('Clock In / Clock Out Login');

    });

    $('.marketplace_one').click(function() {
        var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
        if($('#is_admin').val() == 1 ){
            window.location = '<?= base_url("cashier") ?>';
        }else{
          $('input[name=module]').val('market_place');
          $('.front-login').modal();
          $('.front_login')[0].reset();
          $('#empid').focus();
          $('#mlkeyboardnum').css('display','none');
          $('#id1_err').html('').show();
          $('#pwd1_err').html('').show();
          $('.cashcenter').text('Market Place Login');
        }
    });

    $('.report_one').click(function() {
      var admin = '<?php echo $this->session->userdata["admindata"]["username"] ?>';
        if($('#is_admin').val() == 1){
            window.location = '<?= base_url("cashier/reports") ?>';
        }else{
            $('input[name=module]').val('reports');
            $('.front-login').modal();
            $('.front_login')[0].reset();
            $('#empid').focus();
            $('#mlkeyboardnum').css('display','none');
            $('#id1_err').html('').show();
            $('#pwd1_err').html('').show();

            $('.cashcenter').text('Reports Login');
        }
    });

    $('.help_one').click(function() {
        // $('input[name=module]').val('help');
        // $('.front-login').modal();
        $('.front_login')[0].reset();
        $('#empid').focus();
        $('#mlkeyboardnum').css('display','none');
        $('#id1_err').html('').show();
        $('#pwd1_err').html('').show();
    });



    $('.inputFile11').bind('change', function() {
      if($('#empid').val() == ''){
          $("#id1_err").html("Please enter your Employee Username").show();
          return false;
      }else {
        $("#id1_err").html("").show();
      }
      if($('#emppwd').val() == ''){
          $("#pwd1_err").html("Please enter your Employee Password").show();
          return false;
      }else {
        $("#pwd1_err").html("").show();
      }

    });

    $('.keypad-btn').on('click', function() {
      if($('#empid').val() == ''){
          $('#empid').focus();
          $('#mlkeyboardnum').css('display','none');
          $("#id1_err").html("").show();
          return false;
      }else {
        $("#id1_err").html("").show();
      }
      if($('#emppwd').val() == ''){
          $("#pwd1_err").html("Please enter your Employee Password").show();
          return false;s
      }else {
        $("#pwd1_err").html("").show();
      }

    });


    // //use only pos button on header
    // $('.mobileimg').on('click', function(){
    //   $('input[name=module]').val('pos');
    //   $('.front-login').modal();
    //   $('.front_login')[0].reset();
    //   $('#empid').focus();

    //   $('#id1_err').html('').show();
    //   $('#pwd1_err').html('').show();

    // });

    $('#request1').on('click', function(){
      $('#exampleModalCenter21').modal('hide');
      $('#exampleModalCenter99').modal();
    });


    $(document).on('click', '#request_leave', function() {
       $('#request-leave-modal').modal('show');
       $('#exampleModalCenter99').modal('hide');
    });

    $(document).on('click', '#request_leave2', function() {
      $('.advance-cash')[0].reset();
      $("#amt_err, #reasonadv_err, #rdo_err").html("").show();

      $('#exampleModalCenter11').modal('show');
      $('#exampleModalCenter99').modal('hide');
    });

    $(document).on('click', '#view_request', function() {
      $('#exampleModalCenter21').modal('hide');
      $('#exampleModalCenter98').modal('show');
    });

    $(document).on('click', '#leaveAPP', function() {
      var id = $('#hrms_app').val();
      window.location= '<?= base_url("cashier/leaves?hrms_id=") ?>'+id;
    });

    $(document).on('click', '#cashAPP', function() {
      var id = $('#hrms_app').val();
      window.location= '<?= base_url("cashier/cashAdv?hrms_id=") ?>'+id;

    });


    //clock out chnages
    // $("#empID").keyup(function () {
    //     if ($(this).val().length == 2) {
    //       $('#empPWD').focus();
    //     }
    // });
    //
    // $(document).click('.clock-in-out',function() {
    //   if($("#empID").val() == ''){
    //     $('#empID').focus();
    //   }
    // });

    // $(document).click(function(e) {
    //     if (!$(e.target).closest('.clock-in-out').length) {
    //         $('.emp-login')[0].reset();
    //         $('#id_err').html('').show();
    //         $('#pwd_err').html('').show();
    //     }
    // });
    //end
</script>

<script type="text/javascript">
    $('#bleave1').on('click', function(){
         $('#exampleModalCenter98').modal('hide');
         $('#exampleModalCenter21').modal('show');
       });
      $('#bleave2').on('click', function(){
         $('#exampleModalCenter21').modal('hide');
        });
        $('#bleave3').on('click', function(){
         $('#exampleModalCenter99').modal('hide');
         $('#exampleModalCenter21').modal('show');
       });
      $('#cash_close').on('click', function(){
         $('#exampleModalCenter11').modal('hide');
         $('#exampleModalCenter21').modal('show');
      });

      $('#cash_close1').on('click', function(){
         $('#update-request-cash').modal('hide');
         $('#exampleModalCenter21').modal('show');
      });

</script>
<script>
// auto tab
    $("#empid").keyup(function () {
        if ($(this).val().length == 2) {
          $('#emppwd').focus();
          $('#mlkeyboard').css('display','none');
          
        }
    });
  //auto tab  //10july
    // $("#emppwd").keyup(function () {
    //     if ($(this).val().length == 4 ) {
    //       $('#btnFront').trigger('click');
    //     }
    // });

    // check online offline connection

  var intervalId = window.setInterval(function(){
    doOnlineCheck();
  }, 5000);

function doOnlineCheck() {

  var ifConnected = window.navigator.onLine;
  if (ifConnected) {
    console.log('Connection available');
  } else {
    console.log('Connection not available');
  }
}

$('#scilogin').click(function() {
    var username = $('.hidden_shift_user').val();

    if($('#cash_in_drawer').val() == ''){
        $("#cash_d_err").html("Please enter Cash In Drawer").show();
        return false;
    }
    if($('#coin_dispenser').val() == ''){
        $("#coin_d_err").html("Please enter Coin Dispenser").show();
        return false;
    }

    var is_valid = 0;
    $('.bin_data').each(function(){
        var id = $(this).attr('data-id');
        var value = $(this).val();
          if(value == '') {
            is_valid = 1;
            $('#bin_err_'+id).html('Please enter Bin '+id+' Last Scratcher No')
            $('#bin_err_'+id).show();
            return false;
          }else{
              $('#bin_err_'+id).hide();
          }
    });

    if(is_valid == 1){
      return false;
    }
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url("cashier/shift_terminal"); ?>',
        data: $('.shift_terminal').serialize() + "&username="+username,
        dataType: 'json',
        success: function(data) {
        console.log(data);
          if(data == 'start_shift'){
            swal({
                title: 'Success!',
                text: "Shift started successfully!",
                icon: "success",
                buttons: false,
                //timer: 2500,
            });
            $('.shift_terminal')[0].reset();
            $('#shift-in').modal('hide');

            if(node_setting == 1){
              //alert(socket.id);
              data = '{"socketId":"'+socket.id+'","user_id":'+username+'}';
              socket.emit('user_connect',JSON.parse(data));
            }
            //return false;
            setTimeout( function (){
              window.location = '<?=base_url('cashier')?>';
            },2500);
          }
          if(data == 'end_shift'){
            swal({
                title: 'Success!',
                text: "Shift ended successfully!",
                icon: "success",
                buttons: false,
                //timer: 2500,
            });
            if(node_setting == 1){
              data = '{"socketId":"'+socket.id+'","user_id":'+username+'}';
              socket.emit('user_disconnect',JSON.parse(data));
            }
            $('.shift_terminal')[0].reset();
            $('#shift-in').modal('hide');
            setTimeout( function (){
              window.location = '<?=base_url('cashier')?>';
            },2500);
          }



        },

    });
    return false;
});

$('.validateShift').bind('change', function() {
    if($('#cash_in_drawer').val() == ''){
        $("#cash_d_err").html("Please enter Cash In Drawer").show();
        return false;
    }else{
        $("#cash_d_err").html("").show();
    }
    if($('#coin_dispenser').val() == ''){
        $("#coin_d_err").html("Please enter Coin Dispenser").show();
        return false;
    }else{
        $("#coin_d_err").html("").show();
    }
});

$('#shift_in').click(function() {
    $('#clock_shift').modal('hide');
    $('#shift-in').modal();
    // $('#empID').focus();
    var username = $('.hidden_username').val();
    var sessName = '<?php echo $this->session->userdata["shiftdata"]["shiftLogin"] ?>';

    var shift = '';
    if(sessName == ''){
      shift = 2;
    }else{
      shift = 1;
    }

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url("cashier/Cashier/get_current_shift_data"); ?>',
        data: {username : username, shift: shift},
        dataType: 'json',
        success: function(data) {
          $('.cdalert').html('');
          console.log(data.bin_data);
          if(data == 'already_shift_in'){
              swal({
                  title: 'Oops!',
                  text: "Please end shift from other terminal to start shift here!",
                  icon: "error",
                  buttons: false,
                  timer: 2700,
              });
              $('#shift-in').modal('hide');
          }else if(data == 'shift_start'){
              swal({
                title: 'Success!',
                text: "Shift started successfully!",
                icon: "success",
                buttons: false,
                //timer: 2500,
              });
              $('.shift_terminal')[0].reset();
              $('#shift-in').modal('hide');
              setTimeout( function (){
                window.location = '<?=base_url('cashier')?>';
              },2500);
          }else{
              if(data.coin_dispenser==null || data.coin_dispenser==undefined){
                coin_dispenser=0;
              } else{
                coin_dispenser=data.coin_dispenser;
              }
              if(data.cash_in_drawer <= 0){
                $('#cash_in_drawer').val(0.00);
              }else{
                $('#cash_in_drawer').val(data.cash_in_drawer);
              }

              $('#coin_dispenser').val(coin_dispenser);
              var sessName = '<?php echo isset($this->session->userdata["shiftdata"]["shift_id"])?$this->session->userdata["shiftdata"]["shift_id"]:"" ?>';
              if(sessName!='' && data.cash_drop!=undefined && parseInt(data.cash_drop)>0){
                 $('.cdalert').html('<span class="errors" id="cash_d_err" style="color:red; font-size: 20px!important;">First you need to do <a id="cashdrop3_button" style="text-decoration: underline;">cash drop</a> of $'+data.cash_drop+'</span><br><br>');
              }


              if(data.bin_data == ''){
                $('#sbins').show();
              }else if(data.bin_data != null){
                var list = '',i;
                for(var i=0; i< data.bin_count; i++) {
                   list +='<tr><td class="text-left" style="font-size: 20px;">Bin '+data.bin_data[i].bin+'</td><td ><input type="number" data-id="'+data.bin_data[i].bin+'" name="bin_data[]"  id="bin_data_'+data.bin_data[i].bin+'" class="form-control w-25 use-keyboard-input-num validateShift bin_data" style="font-size: 20px;" min="1" value="'+data.bin_data[i].scracher_current_no+'" /><span class="errors" id="bin_err_'+data.bin_data[i].bin+'" style="color:red; font-size:17px;"></span></td></tr>';
                   $('#sbins').html(list);
                }

                // $('#sbins').html(list);
              }

          }




        }
    });
    return false;
});

$('body').on('click','#cashdrop3_button',function(e){
  e.preventDefault();
  $('#shift-in').modal('hide');
  $('#cashdrop3').modal();
})

$('body').on('click','#shift_terminal_button',function(e){
  e.preventDefault();
  $('#shift-in').modal();
  $('#cashdrop3').modal('hide');
})

$('#scilogin_forced').click(function() {
    var username = $('.hidden_shift_user').val();

    if($('#cash_in_drawer').val() == ''){
        $("#cash_d_err").html("Please enter Cash In Drawer").show();
        return false;
    }
    if($('#coin_dispenser').val() == ''){
        $("#coin_d_err").html("Please enter Coin Dispenser").show();
        return false;
    }

    var is_valid = 0;
    $('.bin_data').each(function(){
        var id = $(this).attr('data-id');
        var value = $(this).val();
          if(value == '') {
            is_valid = 1;
            $('#bin_err_'+id).html('Please enter Bin '+id+' Last Scratcher No')
            $('#bin_err_'+id).show();
            return false;
          }else{
              $('#bin_err_'+id).hide();
          }
    });

    if(is_valid == 1){
      return false;
    }
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url("cashier/shift_terminal"); ?>',
        data: $('.shift_terminal').serialize() + "&username="+username+"&shift_speed=1",
        dataType: 'json',
        success: function(data) {
        console.log(data);
          if(data == 'start_shift'){
            swal({
                title: 'Success!',
                text: "Shift started successfully!",
                icon: "success",
                buttons: false,
                //timer: 2500,
            });
            $('.shift_terminal')[0].reset();
            $('#shift-in').modal('hide');
            setTimeout( function (){
              window.location = '<?=base_url('cashier')?>';
            },2500);
          }
          if(data == 'end_shift'){
            swal({
                title: 'Success!',
                text: "Shift ended successfully!",
                icon: "success",
                buttons: false,
                //timer: 2500,
            });
            $('.shift_terminal')[0].reset();
            $('#shift-in').modal('hide');
            setTimeout( function (){
              window.location = '<?=base_url('cashier')?>';
            },2500);
          }

        },

    });
    return false;
});


//inside-outside alert



$(document).on('click','#bell',function(){

  var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url("cashier/user_notification"); ?>',
        data: {user_id : shift_sess},
        dataType: 'json',
        success: function(data) {
            if(data == '' ){
                $('#box').html('No Records Found');
            }else{
                $('#box').html(data);
                $('#notifications_count').html('');

            }
        }
    });
});

if(node_setting == 1){
  socket.on('receive_notification',(data) =>{
    //alert('receive_notification');
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url("cashier/get_user_notification_count_ajax"); ?>',
        //data: {user_id : shift_sess},
        dataType: 'json',
        success: function(data) {
            if(data.count > 0 && data.notification != ''){
              $('#notifications_count').html(data.count);
              new Notify ({
                status: 'success',
                title: 'Notification',
                text: data.notification,
                effect: 'fade',
                speed: 300,
                customClass: '',
                customIcon: '',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 5000,
                gap: 20,
                distance: 20,
                type: 1,
                position: 'right bottom'
              })
            }
        }
    });
});
}


function get_permission(Role_id,username){
  var Role_id = Role_id;
  var username = username;

  $.ajax({
    type: 'ajax',
    method: 'post',
    url: '<?=base_url("cashier/Cashier/get_permission_ajax_new")?>',
    data: {Role_id : Role_id, username : username},
    // async: false,
    dataType: 'json',
    success: function(data) {
      console.log(data);

        //timesheet button permissions
        if(data.role_permission.submit_timecard_rights.indexOf('A') != -1){
            $("#timesheetID").css("display", "");
        }else if(data.user_permission.submit_timecard_rights.indexOf('A') != -1){
            $("#timesheetID").css("display", "");
        }else{
            $("#timesheetID").css("pointer-events", "none");
            $("#timesheetID").css("opacity", "0.5");
            // $('#timesheetID').addClass('hoverClose');
        }

        //report button permissions
        if(data.role_permission.submit_timecard_rights.indexOf('B') != -1){
            $("#reportID").css("display", "");
        }else if(data.user_permission.submit_timecard_rights.indexOf('B') != -1){
            $("#reportID").css("display", "");
        }else{
          $("#reportID").css("pointer-events", "none");
          $("#reportID").css("opacity", "0.5");
          // $('#reportID').addClass('hoverClose');
        }

        //view request button permissions
        if(data.role_permission.hrms_rights.indexOf('A') != -1 ){
            $("#view_request").css("display", "");
        }else if(data.user_permission.hrms_rights.indexOf('A') != -1){
            $("#view_request").css("display", "");
        }else if(data.role_permission.hrms_rights.indexOf('B') != -1){
            $("#view_request").css("display", "");
        }else if(data.user_permission.hrms_rights.indexOf('B') != -1){
            $("#view_request").css("display", "");
        }else{
            $("#view_request").css("display", "none");
        }

        //view leave request button permissions
        if(data.role_permission.hrms_rights.indexOf('A') != -1){
            $("#leaveAPP").css("display", "");
            $("#leaveAPP").css("padding-left", "28%");
        }else if(data.user_permission.hrms_rights.indexOf('A') != -1){
            $("#leaveAPP").css("display", "");
            $("#leaveAPP").css("padding-left", "28%");
        }else{
            $("#leaveAPP").css("display", "none");
        }

        //view cash advance request button permissions
        if(data.role_permission.hrms_rights.indexOf('B') != -1){
            $("#cashAPP").css("display", "");
            $("#leaveAPP").css("padding-left", "");
        }else if(data.user_permission.hrms_rights.indexOf('B') != -1){
            $("#cashAPP").css("display", "");
            $("#leaveAPP").css("padding-left", "");
        }else{
            $("#cashAPP").css("display", "none");
        }



    },

  });
  // return false;
}

$(document).on('click','.keyboard__key--wide',function(){
    var cash_in_drawer =$("#cash_in_drawer").val();
    var coin_dispenser =$("#coin_dispenser").val();
    if(cash_in_drawer == 0 || cash_in_drawer == ''){
      $("#cash_in_drawer").val(0);
    }

    if(coin_dispenser == 0 || coin_dispenser == ''){
      $("#coin_dispenser").val(0);
    }

});


</script>
