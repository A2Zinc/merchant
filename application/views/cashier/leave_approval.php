<style>
.fix-header{
    height:600px;
    overflow:auto;
}
/* Chat containers */
.container-chat {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

/* Darker chat container */
.chat-darker {
  border-color: #ccc;
  background-color: #ddd;
}

/* Clear floats */
.container-chat::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container-chat img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
  margin-top: 2%;
}

/* Style the right image */
.container-chat img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
  margin-top: 2%;
}

/* Style time text */
.time-right {
  float: right;
  color: #bf1c1c;
}

/* Style time text */
.time-left {
  float: left;
  color: #bf1c1c;
}

.ScrollStyle1
{
    max-height: 290px;
    overflow-y: scroll;
}
    @import url("https://fonts.cdnfonts.com/css/circular-std-book");

    * {
        font-family: "Circular Std Book";
    }

    .mainScreenButton {
        width: 205px;
        height: 54px;
        left: 1191px;
        top: 13px;

        background: radial-gradient(155.14% 152.5% at 50% -52.5%,
                #838383 0%,
                #363636 100%);
        border-radius: 48px;
        text-align: center;
        letter-spacing: 4px;
        text-transform: uppercase;

        color: #ffffff;
    }

    body {
        width: 100%;
        height: 100%;
        background: #f1f1f1;
    }

/*    img {
        width: 100%;
        height: 100%;
    }*/

    .logo-con {
        width: 200px;

        padding: 0.5em;
        padding-left: 2em;
        min-height: 60px;
    }

    .header {
        background: #ffffff;
    }

    .text-left {
        text-align: left;
    }

    .bell-icon {
        height: 16px;
        width: 20px;
        /* margin-right: 15px; */
    }

    .chat-icon {
        height: 33px;
        width: 33px;
        margin-left: 10px;
    }

    .user-avatar>img {
        min-height: 40px;
        min-width: 40px;
    }

    .card-headerRow {
        padding-right: 1.25em;
        padding-left: 1.25em;
    }

    .w-95 {
        width: 95%;
    }

    .ml-8 {
        margin-left: 8px !important;

    }

    .btn-greenDate {
        background: #D9FDE7;
        border: 1px solid rgba(11, 170, 74, 0.4);
        box-sizing: border-box;
        border-radius: 8px;
        font-size: 14px;
    }

    .btn-redDate {
        background: #FFD6D6;
        border: 1px solid rgba(228, 0, 0, 0.4);
        box-sizing: border-box;
        border-radius: 8px;
        font-size: 14px;
    }

    .btn-whiteDate {
        background: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0.4);
        box-sizing: border-box;
        border-radius: 8px;
        font-size: 14px;
    }

    .btn-green {
        background: #41C105;
        border-radius: 5px;
        border: 1px solid rgba(11, 170, 74, 0.4);
        box-sizing: border-box;
        color: white;
        font-size: 14px;
    }

    .btn-red {
        background: #FFD6D6;
        background: #EA1919;
        border-radius: 5px;
        color: white;
        border: 1px solid transparent;
        font-size: 14px;
    }

    .btn-yellow {
        background: #ffc107;
        border-radius: 5px;
        border: 1px solid rgba(11, 170, 74, 0.4);
        box-sizing: border-box;
        /* color: white; */
        font-size: 14px;
    }

    .btn-white {
        background: #FFFFFF;
        border: 1px solid #8D8D8D;
        box-sizing: border-box;
        border-radius: 5px;
        color: #8D8D8D;
        font-size: 14px;
    }

    .reasonText {
        max-height: 62px;
        overflow-y: auto;
        line-height: 22px;
        min-height: 60px;
    }

    ::-webkit-scrollbar {
        width: 5px;
        font-size: 14px;
    }

    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: rgb(165, 165, 165);
        border-radius: 10px;

    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgb(54, 56, 58);
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
        letter-spacing: 0.15px;

color: #BDBDBD;
    }

    .tab {
        display: flex;
        align-items: center;
        margin-right: 10px;
        height: 100%;
        width: 100%;
        justify-content: center;
        text-align: center;
        border-top: 0;
        border-bottom: 0;
        padding: 0 .6em;
        font-weight: 600;
        color: #A1A1A1;
background: #EBEBEB;
font-weight: 450;
border-radius: 22px
    }
.tab.active{
    /* background: #3D5AF1 !important; */
    /* border: 1px solid #3D5AF1 !important; */
    color:white;
}
    .tab.one {
        border-top: 0;
        border-bottom: 0;
        border-left: 0;
        border-right: #A1A1A1;
        padding-left: .5em;
    }

    .tab.two {
     margin-right: 0;
    }



    .filter-tabs {

        box-sizing: border-box;
        border-radius: 4px;
        box-sizing: border-box;
        max-height: 44px;
        height: 100%;
        width: 100%;
    }

    .modal-content.deny-con {
        border-radius: 45px;
        /*background: #F4F4F4;*/
        background: white;
        padding: 20px;
        padding-top: 0;
    }

    .modal-content.deny-con2 {
        border-radius: 45px;
        background: #F4F4F4;
        padding: 20px;
        padding-top: 0;
    }

    .modal-body {
        background: #FFFFFF;
        border-radius: 27px;
    }

    .chat-message {
        background: #F5F5F5;
        border: 1px solid #E1E1E1;
        box-sizing: border-box;
        border-radius: 30px;
        min-height: 46px;
        padding: 0 12px;

    }

    .chat-svg {
        width: 46px;
        height: 46px;
    }

    .w-90 {
        width: 90%;
    }
    .right-mssg{
        background: #3D5AF1;
        border-radius: 16px 2px 16px 16px;
        padding: 14px;
        color:white
    }
    .left-mssg{
        background: #EFEFF1;
        border-radius: 2px 16px 16px 16px;
        padding: 14px;
        color:black
    }
    .info-sec{
        background: #F2F5F8;
        min-height: 6.3em;
        align-items: center;
    }
    .what-leave{
        letter-spacing: 0.15px;

color: #3D5AF0;
    }
    .howmanydays{
        letter-spacing: 0.15px;

color: #8E8E8E;
    }
.sd-text-green.howmanydays{
    text-align: center;
letter-spacing: 0.15px;

color: #0BAA4A;
}
.sd-text-red.howmanydays{
    letter-spacing: 0.15px;

color: #E40000;
}
.reqhrs{
    width: 167px;
height: 47px;
background: #FFFFFF;
border: 3px solid #FFCC17;
border-radius: 23.5px;
color:black
}
.happy-con{
    width: 20px;
    height: 20px;
    z-index: 3;
    top: 10px;
    left: 10px;
}
.clippy-con{
    width: 20px;
    height: 20px;
    z-index: 3;
    top: 10px;
    right: calc(10% + 10px);
}
.denyHeader {
    background: transparent!important;
    border-bottom: none;
  }
 .btn-close{ box-sizing: content-box;
    width: 1em;
    height: 1em;
    padding: .25em .25em;
    color: #000;
    background:transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
    border: 0;
    border-radius: .25rem;
    opacity: .5;}
    .modal-header .btn-close {
    padding: .5rem .5rem;
    margin: -.5rem -.5rem -.5rem auto;
}
.denybtn {
    background: #EA1919!important;
    border-radius: 34px!important;
}

.btn-backWrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  margin-top: 5px;
}



</style>


<body class="">


    <div class="containermain2">
        <div class="row m">
            <!-- <div class="col-md-8  col-xs-4 col-sm-6"> -->
            <div class="logobar ">
              <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
              <?php }else{?>
                <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
              <?php }?>
            </div>
            <!-- </div> -->


            <div class="gg">
                <a>
                    <button class="bckbtn btn-backWrapper" id="bleave">
                        <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                    </button>
                </a>
                <!-- <div class="col-md-1 col-xs-6 col-sm-6"> -->
                <div>
                    <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg"></a>
                </div>
                <!-- </div> -->

                <!-- <div class="col-md-3 col-xs-6 col-sm-6"> -->
                <div class="mainscreen">
                    <a href="<?php echo base_url(); ?>cashier">
                        <p class="maindes">MAIN SCREEN</p>
                    </a>

                </div>
            </div>

        </div>
    </div>

    <!-- main-content -->



<!--    <div class=" container-fluid mt20">



    </div>-->
    <div class="container-fluid m-auto p-0">
        <div class="container main-con m-0 p-0 mx-auto">
            <div class="row m-0 p-0 mt-3">
                <div class="col-4 ">
                    <p class="titleText text-left ">
                    <h3><strong>Leave Requests</strong></h3>
                    </p>
                </div>
<!--                <div class="col-4 align-items-center d-flex">
                    <div class="search-bar">
                        <p class="m-0 " contenteditable="true" id="leave_search">search bar goes here</p>
                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.65234 16.625C13.5183 16.625 16.6523 13.491 16.6523 9.625C16.6523 5.75901 13.5183 2.625 9.65234 2.625C5.78635 2.625 2.65234 5.75901 2.65234 9.625C2.65234 13.491 5.78635 16.625 9.65234 16.625Z"
                                stroke="#979797" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.4039 18.3751L14.5977 14.5688" stroke="#979797" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                </div>-->
<div class="input-group searchbtn " id='Custsearchbtn'>
  <input type="hidden" id="hidden_userid12" value="<?=$_GET['hrms_id']?>" name="hidden_userid">
                <input type="text" class="form-control use-keyboard-input" placeholder="Search Employee" style="border-radius: 44px;" id="leave_search">
                <img src="<?php echo base_url(); ?>assets/images/search.png" alt="" style="position: absolute;right: 15px;top: 10px;">
            </div>
<!-- <div class="search-bar " id='Custsearchbtn'>
                <input type="text" class="form-control" placeholder="Search Cutomer" style="border-radius: 44px;" id="customer_search">
                <img src="<?php echo base_url(); ?>assets/images/search.png" alt="" style="position: absolute;right: 15px;top: 10px;">
            </div>-->
                <div class=" col-4 align-items-center">
                    <div class="filter-tabs d-flex justify-content-between align-items-center pt-0 pb-0 ">
                        <div class="tab active" data-category="All" id="all" style="background:#3D5AF1; color:black; border: 1px solid #3D5AF1;">All </div>
                        <div class="tab" data-category="Approved" id="appr" style="background:#41C105; color:black; border: 1px solid #41C105;">Approved</div>
                        <div class="tab" data-category="Pending" id="pend" style="background:#ffc107; color:black; border: 1px solid #ffc107;">Pending</div>
                        <div class="tab two" data-category="Denied" id="den" style="background:#EA1919; color:black; border: 1px solid #EA1919;">Denied</div>
                        <input type="hidden" value="All" id="tab_id">
                    </div>
                </div>

            </div>
            <div class="row m-0 p-0 dynamic_font_size">
                <div class="col-12 m-0 p-0 mx-auto">
                    <div class="container m-0 p-0 fix-header">
                        <div class="row m-0 mp-0" id="searchdata">
                            <?php if(!empty($leavedata)) { foreach ($leavedata as $leave) { ?>
                             <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  mt-3 text-center">
                                <div class="card">
                                    <div class="card-headerRow d-flex flex-row justify-content-between  pt-3 pb-2">
                                        <div class="user-con d-flex align-items-center">
                                            <div class="user-text text-left" style='padding-left:1em'>
                                             <div id='emp_id'></div>
                                          <div id='prod-id'></div>
                                           <div id='sell-id'></div>
                                                <?php echo $leave['first_name']; ?> <?php echo $leave['last_name']; ?>

                                                <p class="utext p-0 m-0 ">
                                                    Employee ID <?php echo $leave['employee_id']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="notif-con d-flex align-items-center justify-content-between">
                                            <div class="bell-icon d-flex align-items-center justify-content-end ">
                                                <svg width="100%" height="100%" viewBox="0 0 16 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8 20C9.1 20 10 19.1 10 18H6C6 19.1 6.9 20 8 20ZM14 14V9C14 5.93 12.37 3.36 9.5 2.68V2C9.5 1.17 8.83 0.5 8 0.5C7.17 0.5 6.5 1.17 6.5 2V2.68C3.64 3.36 2 5.92 2 9V14L0 16V17H16V16L14 14ZM12 15H4V9C4 6.52 5.51 4.5 8 4.5C10.49 4.5 12 6.52 12 9V15Z"
                                                        fill="#676565" />
                                                </svg>
                                            </div>


                                        </div>
                                    </div>
                                    <hr class='mx-auto mt-1 w-95'>
                                    <div
                                        class="buttons-row info-sec  row p-3 m-0 pt-1 pb-1 card-headerRow d-flex justify-content-around flex-row">
                                        <div class="col-12 p-0 m-0  mt-3 rowlike-info d-flex justify-content-center align-items-center">
                                            <div class="what-leave p-2 pt-0 pb-0"><?php if(!empty($leave['leave_type'])){ echo $leave['leave_type'];}else{ echo 'Accrued Leave';}?></div>
                                            <?php $now = time(); // or your date as well
                                             $your_date=$leave['created_at'];
                                            $your_date_n = strtotime($your_date);
                                            $datediff = $now - $your_date_n;
                                            $req_ago= round($datediff / (60 * 60 * 24)); ?>
                                            <div class="howmanydays">
                                                <?php if($req_ago == 0) { echo 'Today'; }elseif($req_ago == 1){ echo 'Yesterday';}else{echo $req_ago.' days ago';}?>
                                            </div>
                                        </div>
                                        <div class="col-<?php if($leave['days_requested'] > 1) { echo '4';}else{ echo '6';}?> p-0 m-0 mt-3  mb-3">
                                            <div class="sd-label howmanydays">Start Date</div>
                                            <div class="sd-text-green howmanydays"><?php echo $leave['start_date']; ?></div>
                                        </div>

                                        <?php if($leave['days_requested'] > 1) { ?>
                                        <div class="col-4 p-0 m-0 mt-3  mb-3">
                                            <div class="sd-label howmanydays">End Date</div>
                                            <div class="sd-text-red howmanydays"><?php echo $leave['end_date']; ?></div>
                                        </div>
                                        <?php } ?>
                                        <?php if(!empty($leave['leave_type'])){ ?>
                                            <div class="col-<?php if($leave['days_requested'] > 1) { echo '4';}else{ echo '6';}?> p-0 mt-3 mb-3">
                                            <div class="sd-label howmanydays">Total Days</div>
                                            <div class="thrs "><?php echo $leave['days_requested']; ?></div>
                                        </div>
                                        <?php }else{?>
                                        <div class="col-<?php if($leave['days_requested'] > 1) { echo '4';}else{ echo '6';}?> p-0 mt-3 mb-3">
                                           <div class="sd-label howmanydays">Total Hours</div>
                                           <div class="thrs "><?php echo $leave['hours_requested']; ?></div>
                                        </div>
                                        <?php } ?>

                                    </div>

                                    <?php if($leave['status']=='Denied'){ ?>
                                    <div class="reason card-headerRow">
                                        <p class="rText text-left mb-1 mt-3 dynamic_font_size">Deny Reason:</p>
                                        <p class="reasonText text-left dynamic_font_size_err"><?php echo $leave['deny_reason']; ?></p>
                                    </div>
                                    <?php } else { ?>
                                    <div class="reason card-headerRow">
                                        <p class="rText text-left mb-1 mt-3 dynamic_font_size"> Reason:</p>
                                        <p class="reasonText text-left dynamic_font_size_err"><?php echo $leave['reason']; ?></p>
                                    </div>
                                    <?php } ?>

                                    <div class="reason card-headerRow">
                                        <p class="rText text-left mb-1 mt-3 dynamic_font_size"> Chat:</p>
                                       <p class="reasonText dynamic_font_size_err text-left not_<?php echo $leave['id']; ?>"><?php echo $leave['notes']; ?></p>
                                    </div>

                           <div id='row-hide<?=$leave['id']?>' class="buttons-row m-0 row card-headerRow" <?php if($leave['status'] != "Pending"){ ?> style="display:none;" <?php }?>>
                    <div class="col-4 p-0 apd">
                      <!-- data-bs-toggle="modal" data-bs-target="#request-leave-modal" -->
                      <button data-id="<?=$leave['id']?>" data-employee_id="<?=$leave['employee_id']?>" class='approved d-flex btn-green  mx-auto w-95 align-items-center p-2 justify-content-center'>
                        <p class='text-nowrap  mb-0'>Approve</p>
                      </button>
                    </div>
                       <div class="col-4 p-0 apd">
                        <button data-id="<?=$leave['id']?>" emp_fname="<?php echo $leave['first_name']; ?>" emp_lname="<?php echo $leave['last_name']; ?>" emp_id="<?php echo $leave['employee_id']; ?>" data-chat="<?php echo $leave['notes']; ?>" data-sender-id="<?=$_GET['hrms_id']?>" class='addinfo d-flex mx-auto w-95 m-0 btn-yellow p-2 align-items-center justify-content-center' data-bs-toggle="modal" data-bs-target="#chat-modal">
                            <p class='text-nowrap  mb-0'>Chat</p>
                        </button>
                    </div>

                    <div class="col-4 p-0 m-0 apd">
                      <button data-id="<?=$leave['id']?>" emp_fname="<?php echo $leave['first_name']; ?>" emp_lname="<?php echo $leave['last_name']; ?>" emp_id="<?php echo $leave['employee_id']; ?>" data-bs-toggle="modal" data-bs-target="#deny-leave-modal" class='denied_req d-flex mx-auto w-95 m-0 btn-red p-2 align-items-center justify-content-center'>
                        <p class='text-nowrap  mb-0'>Deny</p>
                      </button>
                    </div>

                  </div>


                  <div class="row m-0 p-0" id="approved_<?=$leave['id']?>" <?php if($leave['status'] != "Approved"){ ?> style="display:none;" <?php }?>>
                    <div class="accepted col-12 p-0 m-0"> <button
                        class='d-flex mx-auto w-95 m-0 btn-greenDate p-2 align-items-center justify-content-center'>
                            <p class='text-nowrap  mb-0' style='color:green'> ✔ Approved</p>
                      </button></div>
                  </div>
                  <div class="row m-0 p-0" id="denied_<?=$leave['id']?>" <?php if($leave['status'] != "Denied"){ ?> style="display:none;" <?php }?>>
                    <div class="denied col-12 p-0 m-0">
                      <button class='d-flex mx-auto w-95 m-0 btn-redDate p-2 align-items-center justify-content-center'>
                        <p class='text-nowrap  mb-0' style='color:red'> ✖ Denied</p>
                      </button>
                    </div>
                  </div>
                 </div>
                            </div>
                            <?php  }} ?>
                            </div>
                         </div>
                   </div>
            </div>
        </div>
    </div>
 </div>
<!--chat modal2 -->
<div class="modal fade" id="chat-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content deny-con" style="border-radius: 8px;">
              <div class="card-headerRow d-flex flex-row justify-content-between  align-items-center pt-3 pb-2">
                <div class="user-con d-flex align-items-center">
                    <div class="user-text text-left " id='em_id2'>
                        <div class="user-text text-left" >
                            <!-- <p class="modal-title" id="empfull"></p> -->
                            <h2 class="" style="color:#D62127;font-size: 24px;align:center;"><b>Chat</b> <!--<span id="empl2_id"></span>--></h2>
                             <!-- <p class="modal-title custommodaltitle" id="exampleModalLongTitle" style="padding-left: 29%;">Chat</p> -->
                        </div>
                    </div>
                    <hr>
                </div>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-dey"></button>
               </div>
               <div class="modal-body pt-0">
                 <div id="chatDIV" class="ScrollStyle1"></div>
                    <div class="col-12 m-0 p-0">
                        <!-- <label for="" class="mb-2">Chat:</label> -->
                         <!-- <input type="textarea" class="form-control  use-keyboard-input" id="infow1" name="notes" rows="2" placeholder="enter here..." style="font-size: 20px;"/> -->
                         <textarea class="form-control  use-keyboard-input" id="info1" name="notes" rows="2" placeholder="enter here..." style="font-size: 20px;">
                        </textarea>
                          <span class="errors" id="info_err" style="color:red; font-size:14px"></span>
                    </div>
                </div>
                <div class="modal-footer pb-0 d-flex justify-content-end">
                    <input type="hidden" name="sender_id" id="sender_id">
                    <input type="hidden" name="leave_id" id="LEAVEID" value="">
                    <button id="btn_info" type="button" class="btn subbtn-modal denybtn">Submit</button>
                </div>
            </div>
        </div>
    </div>

 <div class="modal fade" id="deny-leave-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content deny-con">
       <div class="card-headerRow d-flex flex-row justify-content-between  align-items-center pt-3 pb-2">
              <div class="user-con d-flex align-items-center">

                <div class="user-text text-left " id='em_id' style='padding-left:1em'>
                <div class="user-text text-left " style='margin-left:-1em;'>


                    <p class="modal-title"></p>
                  <p class="utext p-0 m-0">
                    Employee ID <span class="empl_id"></span>
                   </p>
                </div>
              </div>

            <hr>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-deny"></button>
        </div>

        <div class="modal-body pt-0">
        <div class="modal-body p-0 pt-0">
          <div class="col-12 m-0 p-0">
            <label for="" class="mb-3">Reason for Denial : </label>
             <textarea class="form-control inputFile20" id="LeaveReason" rows="3"></textarea>
              <span class="errors" id="leave_err" style="color:red; font-size:14px"></span>
              </div>

        </div>
        <div class="modal-footer pb-0 d-flex justify-content-end">
            <button id="btn_deny" type="button" class="btn subbtn-modal denybtn">Submit</button>
        </div>

    </div>
  </div>


  <script>
      var jq = $.noConflict();
      jq(document).ready(function(){
        jq('.mobileimg').on('click', function(){

          jq('input[name=module]').val('pos');
          jq('front-login').modal();
        });
      });
  </script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
  <script>
      $(document).on('click', '.tab', function(){
      var status = $(this).data('category');
      if(status=='All'){
           var tab_id=$('#tab_id').val("All");
           $('#appr').removeClass('active');
           $('#all').addClass('active');
           $('#pend').removeClass('active');
           $('#den').removeClass('active');
            $('#leave_search').val("");
      }
      if(status=='Approved'){
          var tab_id=$('#tab_id').val("Approved");

           $('#appr').addClass('active');
           $('#all').removeClass('active');
           $('#pend').removeClass('active');
           $('#den').removeClass('active');
           $('#leave_search').val("");


      }
      if(status=='Pending'){
          var tab_id=$('#tab_id').val("Pending");
          $('#appr').removeClass('active');
          $('#all').removeClass('active');
          $('#pend').addClass('active');
          $('#den').removeClass('active');
           $('#leave_search').val("");
      }
      if(status=='Denied'){
          var tab_id=$('#tab_id').val("Denied");
           $('#appr').removeClass('active');
          $('#all').removeClass('active');
          $('#pend').removeClass('active');
          $('#den').addClass('active');
           $('#leave_search').val("");
      }
    $.ajax({
         type: 'ajax',
         method: 'post',
         url : '<?=base_url("cashier/cashier/filter_emp_leave_by_status")?>',
         data : {status : status},
         dataType : 'json',
         success : function(data){
             //console.log(data);
             var option_list = '';
             if(data=='')
             {
                 //alert(data); exit;
                 option_list='No Record found';
                 $('#searchdata').html(option_list);
             }
               $.each(data, function(index, value) {
                     option_list += '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  mt-3 text-center" >'+
                                '<div class="card">'+
                                    '<div class="card-headerRow d-flex flex-row justify-content-between  pt-3 pb-2">'+
                                        '<div class="user-con d-flex align-items-center">'+
                                            '<div class="user-text text-left" style="padding-left:1em">'+value.first_name +' '+value.last_name +
                                              '<p class="utext p-0 m-0 ">' +
                                                   ' Employee ID : ' +value.employee_id +
                                                '</p>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="notif-con d-flex align-items-center justify-content-between">'+
                                            '<div class="bell-icon d-flex align-items-center justify-content-end ">'+
                                                '<svg width="100%" height="100%" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                                                    '<path d="M8 20C9.1 20 10 19.1 10 18H6C6 19.1 6.9 20 8 20ZM14 14V9C14 5.93 12.37 3.36 9.5 2.68V2C9.5 1.17 8.83 0.5 8 0.5C7.17 0.5 6.5 1.17 6.5 2V2.68C3.64 3.36 2 5.92 2 9V14L0 16V17H16V16L14 14ZM12 15H4V9C4 6.52 5.51 4.5 8 4.5C10.49 4.5 12 6.52 12 9V15Z"  fill="#676565" />'+
                                                '</svg>'+
                                            '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<hr class="mx-auto mt-1 w-95">';

                                            date1 = new Date();
                                       date2 = new Date(value.created_at);
                                      var time_difference = Math.abs(date2.getTime() - date1.getTime());
                                      var days_difference = Math.round(time_difference / (1000 * 60 * 60 * 24));
                                        option_list+=  '<div class="buttons-row info-sec  row p-3 m-0 pt-1 pb-1 card-headerRow d-flex justify-content-around flex-row">'+
                                     '<div class="col-12 p-0 m-0  mt-3 rowlike-info d-flex justify-content-center align-items-center">';
                                      if(value.leave_type == null){
                                         option_list+= '<div class="what-leave p-2 pt-0 pb-0"> Accrued Leave </div>';
                                      }else{
                                         option_list+= '<div class="what-leave p-2 pt-0 pb-0">'+value.leave_type+'</div>';
                                      }
                                     if(days_difference == '0'){
                                       option_list+=  '<div class="howmanydays">'+'Today'+ '</div>';
                                     }else if(days_difference == '1'){
                                       option_list+=  '<div class="howmanydays">'+'Yesterday'+'</div>';
                                     }else{
                                       option_list+=  '<div class="howmanydays">'+days_difference+' days ago'+ '</div>';
                                     }
                                     option_list+=  '</div>'+

                                      '<div class="col-4 p-0 m-0 mt-3  mb-3">'+
                                      '<div class="sd-label howmanydays">'+'Start Date'+'</div>'+
                                      '<div class="sd-text-green howmanydays">'+value.start_date+'</div>'+
                                      '</div>';
                                      if(value.days_requested > '1'){
                                        option_list+='<div class="col-4 p-0 m-0 mt-3  mb-3">'+
                                           '<div class="sd-label howmanydays">'+'End Date'+'</div>'+
                                           '<div class="sd-text-red howmanydays">'+value.end_date+'</div>'+
                                       '</div>';
                                      }
                                      if(value.leave_type == null){
                                      option_list+= '<div class="col-4 p-0 mt-3 mb-3">'+
                                           '<div class="sd-label howmanydays">'+'Total Hours'+'</div>'+
                                           '<div class="thrs ">'+value.hours_requested+'</div>'+
                                        '</div>'+


                                    '</div>';

                                     }else{
                                       option_list+= '<div class="col-4 p-0 mt-3 mb-3">'+
                                           '<div class="sd-label howmanydays">'+'Total Days'+'</div>'+
                                           '<div class="thrs ">'+value.days_requested+'</div>'+
                                        '</div>'+


                                    '</div>';
                                    }
                                          if(value.status == 'Denied'){
                                      option_list+=  '<div class="reason card-headerRow">'+
                                      '<p class="rText text-left mb-1 mt-3">'+
                                       'Deny Reason :'+
                                        '</p>'+
                                        '<p class="reasonText text-left">'+value.deny_reason+
                                        '</p>'+
                                    '</div>';
                                   } else {
                                         option_list+=  '<div class="reason card-headerRow">'+
                                      '<p class="rText text-left mb-1 mt-3">'+
                                       'Reason :'+
                                        '</p>'+
                                        '<p class="reasonText text-left">'+value.reason+
                                        '</p>'+
                                    '</div>';
                                   }

                                   //prashant
                                   option_list+= '<div class="reason card-headerRow">'+
                                      ' <p class="rText text-left mb-1 mt-3"> Chat:</p>'+
                                      '<p class="reasonText text-left not_'+value.id+'"'+value.notes+
                                       '<p class="reasonText text-left">'+value.notes+'</p>'+
                                   '</div>';

                           /**** @Rajeswari **/
                            option_list+= '<div id="row-hide'+value.id+
                          '" class="buttons-row m-0 row card-headerRow"';
                         if(value.status != 'Pending'){
                             option_list+= 'style="display:none;"';
                          }
                           option_list+='>'+
                    '<div class="col-4 p-0 apd">'+
                      '<button data-id="'+value.id+
                     '" data-employee_id="'+value.employee_id+
                    '" class="approved d-flex btn-green  mx-auto w-95 align-items-center p-2 justify-content-center">'+
                       ' <p class="text-nowrap  mb-0">Approve</p>'+
                      '</button>'+
                    '</div>'+
                       '<div class="col-4 p-0 apd">'+
                        '<button data-id="'+value.id+
                        '" emp_fname="'+value.first_name+
                        '" emp_lname="'+value.last_name+
                        '" emp_id="'+value.employee_id+
                        '" data-chat="'+value.notes+
                        '" data-sender-id="'+<?=$_GET['hrms_id']?>+
                        '" class="addinfo d-flex mx-auto w-95 m-0 btn-yellow p-2 align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#chat-modal">'+
                        '<p class="text-nowrap  mb-0">Chat</p>'+
                        '</button>'+
                    '</div>'+
                    '<div class="col-4 p-0 m-0 apd">'+
                     '<button data-id="'+value.id+
                     '" emp_fname="'+value.first_name+
                     '" emp_lname="'+value.last_name+
                     '" emp_id="'+value.employee_id+
                     '" data-bs-toggle="modal" data-bs-target="#deny-leave-modal" class="denied_req d-flex mx-auto w-95 m-0 btn-red p-2 align-items-center justify-content-center">'+
                      '<p class="text-nowrap  mb-0">Deny</p>'+
                      '</button>'+
                    '</div>'+
                     '</div>'+
                     '<div  id="approved_'+value.id+
                    '" class="row m-0 p-0"';
                         if(value.status != 'Approved'){
                             option_list+= ' style="display:none;"';
                          }
                    option_list+= '>'+
                    '<div class="accepted col-12 p-0 m-0">'+
                    '<button class="d-flex mx-auto w-95 m-0 btn-greenDate p-2 align-items-center justify-content-center">'+
                     '<p class="text-nowrap  mb-0" style="color:green"> ✔ Approved</p>'+
                      '</button></div>'+
                  '</div>';
                 option_list+= '<div id="denied_'+value.id+
                  '" class="row m-0 p-0"';
                      if(value.status != "Denied"){
                             option_list+= 'style="display:none;"';
                          }
                    option_list+= '>'+
                    '<div class="denied col-12 p-0 m-0">'+
                    '<button class="d-flex mx-auto w-95 m-0 btn-redDate p-2 align-items-center justify-content-center">'+
                     '<p class="text-nowrap  mb-0" style="color:red"> ✖ Denied</p>'+
                      '</button>'+
                    '</div>'+
                  '</div>';
                option_list+= '</div>'+
             '</div>'+
              '</div>'+
              '</div>';
               });
                    $('#searchdata').html(option_list);
                },

            });
            return false;
});
    $(document).on('click','.approved',function(){
      //$(".approved").on('cclick', function () {
          // alert("adas"); exit;
          var leave_id = $(this).data('id');
          var employee_id = $(this).data('employee_id');
         // alert(employee_id); exit;
         $.ajax({
         type: 'ajax',
         method: 'post',
         url : '<?=base_url("cashier/cashier/change_status")?>',
         data : {employee_id : employee_id, leave_id : leave_id, status : 'Approved', status_no: '2'},
         dataType : 'json',
         success : function(data){
            console.log(data);
            //location.reload();
            if(data){
             $("#row-hide"+leave_id).css("display", "none");
            //$('#app_'+leave_id).css("display", "");
            $('#approved_'+leave_id).css("display", "");

              if(node_setting == 1){
                data = '{"user_id":25}';
                socket.emit('send_notification',JSON.parse(data));
              }

               }
           }

       });

      });

    $('#leave_search').on('keyup', function() {
            //alert("dad"); exit;
             var tab_id = $('#tab_id').val();
            var customer = $(this).val();
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url("cashier/cashier/fetch_emp") ?>',
                data: {
                    customer: customer,tab_id:tab_id,
                },
                //async: false,
                dataType: 'json',
                success: function(data) {
                     var option_list = '';
                     if(data=='')
                     {

                          option_list='No Record found';
                          $('#searchdata').html(option_list);
                      }
                       $.each(data, function(index, value) {
                             option_list += '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  mt-3 text-center" >'+
                                '<div class="card">'+
                                    '<div class="card-headerRow d-flex flex-row justify-content-between  pt-3 pb-2">'+
                                        '<div class="user-con d-flex align-items-center">'+
                                            '<div class="user-text text-left" style="padding-left:1em">'+value.first_name +' '+value.last_name +
                                              '<p class="utext p-0 m-0 ">' +
                                                   ' Employee ID : ' +value.employee_id +
                                                '</p>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="notif-con d-flex align-items-center justify-content-between">'+
                                            '<div class="bell-icon d-flex align-items-center justify-content-end ">'+
                                                '<svg width="100%" height="100%" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                                                    '<path d="M8 20C9.1 20 10 19.1 10 18H6C6 19.1 6.9 20 8 20ZM14 14V9C14 5.93 12.37 3.36 9.5 2.68V2C9.5 1.17 8.83 0.5 8 0.5C7.17 0.5 6.5 1.17 6.5 2V2.68C3.64 3.36 2 5.92 2 9V14L0 16V17H16V16L14 14ZM12 15H4V9C4 6.52 5.51 4.5 8 4.5C10.49 4.5 12 6.52 12 9V15Z"  fill="#676565" />'+
                                                '</svg>'+
                                            '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '<hr class="mx-auto mt-1 w-95">';

                                            date1 = new Date();
                                       date2 = new Date(value.created_at);
                                      var time_difference = Math.abs(date2.getTime() - date1.getTime());
                                      var days_difference = Math.round(time_difference / (1000 * 60 * 60 * 24));
                                        option_list+=  '<div class="buttons-row info-sec  row p-3 m-0 pt-1 pb-1 card-headerRow d-flex justify-content-around flex-row">'+
                                     '<div class="col-12 p-0 m-0  mt-3 rowlike-info d-flex justify-content-center align-items-center">';
                                      if(value.leave_type == null){
                                         option_list+= '<div class="what-leave p-2 pt-0 pb-0"> Accrued Leave </div>';
                                      }else{
                                         option_list+= '<div class="what-leave p-2 pt-0 pb-0">'+value.leave_type+'</div>';
                                      }
                                     if(days_difference == '0'){
                                       option_list+=  '<div class="howmanydays">'+'Today'+ '</div>';
                                     }else if(days_difference == '1'){
                                       option_list+=  '<div class="howmanydays">'+'Yesterday'+'</div>';
                                     }else{
                                       option_list+=  '<div class="howmanydays">'+days_difference+' days ago'+ '</div>';
                                     }
                                     option_list+=  '</div>'+

                                      '<div class="col-4 p-0 m-0 mt-3  mb-3">'+
                                      '<div class="sd-label howmanydays">'+'Start Date'+'</div>'+
                                      '<div class="sd-text-green howmanydays">'+value.start_date+'</div>'+
                                      '</div>';
                                      if(value.days_requested > '1'){
                                        option_list+='<div class="col-4 p-0 m-0 mt-3  mb-3">'+
                                           '<div class="sd-label howmanydays">'+'End Date'+'</div>'+
                                           '<div class="sd-text-red howmanydays">'+value.end_date+'</div>'+
                                       '</div>';
                                      }
                                      if(value.leave_type == null){
                                      option_list+= '<div class="col-4 p-0 mt-3 mb-3">'+
                                           '<div class="sd-label howmanydays">'+'Total Hours'+'</div>'+
                                           '<div class="thrs ">'+value.hours_requested+'</div>'+
                                        '</div>'+


                                    '</div>';

                                     }else{
                                       option_list+= '<div class="col-4 p-0 mt-3 mb-3">'+
                                           '<div class="sd-label howmanydays">'+'Total Days'+'</div>'+
                                           '<div class="thrs ">'+value.days_requested+'</div>'+
                                        '</div>'+


                                    '</div>';
                                    }
                                          if(value.status == 'Denied'){
                                      option_list+=  '<div class="reason card-headerRow">'+
                                      '<p class="rText text-left mb-1 mt-3">'+
                                       'Deny Reason :'+
                                        '</p>'+
                                        '<p class="reasonText text-left">'+value.deny_reason+
                                        '</p>'+
                                    '</div>';
                                   } else {
                                         option_list+=  '<div class="reason card-headerRow">'+
                                      '<p class="rText text-left mb-1 mt-3">'+
                                       'Reason :'+
                                        '</p>'+
                                        '<p class="reasonText text-left">'+value.reason+
                                        '</p>'+
                                    '</div>';
                                   }

                                   //prashant
                                   option_list+= '<div class="reason card-headerRow">'+
                                      ' <p class="rText text-left mb-1 mt-3"> Chat:</p>'+
                                      '<p class="reasonText text-left not_'+value.id+'"'+value.notes+
                                       '<p class="reasonText text-left">'+value.notes+'</p>'+
                                   '</div>';

                        /**** @Rajeswari **/
                            option_list+= '<div id="row-hide'+value.id+
                          '" class="buttons-row m-0 row card-headerRow"';
                         if(value.status != 'Pending'){
                             option_list+= 'style="display:none;"';
                          }
                           option_list+='>'+
                    '<div class="col-4 p-0 apd">'+
                      '<button data-id="'+value.id+
                     '" data-employee_id="'+value.employee_id+
                    '" class="approved d-flex btn-green  mx-auto w-95 align-items-center p-2 justify-content-center">'+
                       ' <p class="text-nowrap  mb-0">Approve</p>'+
                      '</button>'+
                    '</div>'+
                       '<div class="col-4 p-0 apd">'+
                        '<button data-id="'+value.id+
                        '" emp_fname="'+value.first_name+
                        '" emp_lname="'+value.last_name+
                        '" emp_id="'+value.employee_id+
                        '" data-chat="'+value.notes+
                        '" data-sender-id="'+<?=$_GET['hrms_id']?>+
                        '" class="addinfo d-flex mx-auto w-95 m-0 btn-yellow p-2 align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#chat-modal">'+
                        '<p class="text-nowrap  mb-0">Chat</p>'+
                        '</button>'+
                    '</div>'+
                    '<div class="col-4 p-0 m-0 apd">'+
                     '<button data-id="'+value.id+
                     '" emp_fname="'+value.first_name+
                     '" emp_lname="'+value.last_name+
                     '" emp_id="'+value.employee_id+
                     '" data-bs-toggle="modal" data-bs-target="#deny-leave-modal" class="denied_req d-flex mx-auto w-95 m-0 btn-red p-2 align-items-center justify-content-center">'+
                      '<p class="text-nowrap  mb-0">Deny</p>'+
                      '</button>'+
                    '</div>'+
                     '</div>'+
                     '<div  id="approved_'+value.id+
                    '" class="row m-0 p-0"';
                         if(value.status != 'Approved'){
                             option_list+= ' style="display:none;"';
                          }
                    option_list+= '>'+
                    '<div class="accepted col-12 p-0 m-0">'+
                    '<button class="d-flex mx-auto w-95 m-0 btn-greenDate p-2 align-items-center justify-content-center">'+
                     '<p class="text-nowrap  mb-0" style="color:green"> ✔ Approved</p>'+
                      '</button></div>'+
                      '</div>';
                      option_list+= '<div id="denied_'+value.id+
                      '" class="row m-0 p-0"';
                      if(value.status != "Denied"){
                             option_list+= 'style="display:none;"';
                          }
                    option_list+= '>'+
                    '<div class="denied col-12 p-0 m-0">'+
                    '<button class="d-flex mx-auto w-95 m-0 btn-redDate p-2 align-items-center justify-content-center">'+
                     '<p class="text-nowrap  mb-0" style="color:red"> ✖ Denied</p>'+
                      '</button>'+
                   '</div>'+
                  '</div>';
                  option_list+= '</div>'+
             '</div>'+
              '</div>'+
              '</div>';
               });


                    $('#searchdata').html(option_list);
                },

            });
            return false;


        });
    // $('.inputFile20').bind('change', function() {
    //     if ($('#LeaveReason').val() == '') {
    //       $("#leave_err").html("Please enter Leave Deny Reason").show();
    //         return false;
    //     } else {
    //         $("#leave_err").html("").show();
    //     }
    // });

    $(document).on('click','.denied_req',function(){
     //$(".denied").on('click', function () {
     //alert("dasd"); exit;
       var leave_id = $(this).data('id');
       //alert(leave_id); exit;
       $('#LeaveReason').val('');
         var emp_fname = $(this).attr('emp_fname');
         var emp_lname = $(this).attr('emp_lname');
         var emp_id = $(this).attr('emp_id');
         $(".modal .modal-title").html(emp_fname+' '+emp_lname);
      $(".modal .empl_id").html(emp_id);
          $('#btn_deny').click(function() {
           var LeaveReason=$('#LeaveReason').val();
            // if (LeaveReason == '') {
            // $("#leave_err").html("Please enter Leave Denial Reason").show();
            // return false;
            // }
          $.ajax({
         type: 'ajax',
         method: 'post',
         url : '<?=base_url("cashier/cashier/deny_leave")?>',
         data : {employee_id : emp_id, leave_id : leave_id, status : 'Denied', reason : LeaveReason , status_no : '3'},
         dataType : 'json',
        success : function(data){
         console.log(data);
        // console.log(data);
             $("#close-deny").trigger("click");
             $("#row-hide"+leave_id).css("display", "none");
             $('#denied_'+leave_id).css("display", "");

                 if(node_setting == 1){
                    data = '{"user_id":25}';
                    socket.emit('send_notification',JSON.parse(data));
                 }

             }


           });
         });
    });

    $(document).on('click','.addinfo',function(){
    // $('.addinfo').on('click', function(){
          var leave_id = $(this).data('id');
          var emp_fname = $(this).attr('emp_fname');
          var emp_lname = $(this).attr('emp_lname');
          var emp_id = $(this).attr('emp_id');

          $('#empfull').text(emp_fname+' '+emp_lname);
          $('#empl2_id').text(emp_id);
          $('#LEAVEID').val(leave_id);
          $('#info1').val('');

          $('.infos').focus();

          $("#chatDIV").animate({scrollTop:  1500});
          var history = $(this).data('chat');
          $('#chat_first').text(history);
          $('#sender_id').val($(this).data('sender-id'));

          $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?= base_url("cashier/Cashier/get_user_chat_history") ?>',
            data: { chat_id : leave_id, chat_type : 'leave'},
            // async: false,
            dataType: 'json',
            success: function(data) {
              console.log(data);
              $('#chatDIV').html(data);
            },

          });
          return false;

    });

    //$('#btn_info').on('click', function(){
    $(document).on('click','#btn_info',function(){
      var leave_id = $('#LEAVEID').val();
      var info = $('#info1').val();
      var emp_id = $('#empl2_id').text();
      if(info == ''){
        $('#info_err').html('Please enter Info').show();
        return false;
      }
      var sender_id = $('#sender_id').val();

      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?= base_url("cashier/Cashier/insert_chat_history") ?>',
        data: {additional_info: info, chat_id : leave_id, chat_type: 'leave', sender_id: sender_id, table_name : 'tbl_emp_leave', chat_person : 'manager'},
        // async: false,
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            // $("#chatDIV").animate({scrollTop:  1500});
            // $('#chatDIV').append(data);
            // $('#info1').val('');
            // $('#info1').focus();
            $(".not_"+leave_id).text(info);
            $('#close-dey').trigger('click');
        },

      });
      return false;

    });


    $('.infos').bind('change', function() {
      if($('#info1').val() == ''){
        $('#info_err').html('Please enter Info').show();
        return false;
      }else{
          $('#info_err').html('').show();
      }
    });
    </script>
      <!--prashant added below code  -->
<script type="text/javascript">
    $('#bleave').on('click', function(){
        var username = $('#hidden_userid12').val();
        window.location = '<?=base_url('cashier?leaveID=')?>'+username;
    });
</script>
