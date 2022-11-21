<style>
  @media screen
  and (min-device-width: 800px)
  and (max-device-width: 1100px)
   {
    .print-rct{
    min-width: 300px !important;
    max-width: 400px !important;
  }
}
.fix-header{
  height: calc(100vh - 48vh);
  overflow:auto;
  padding-left: 25px;
}
.print-rct{
    min-width: 300px !important;
    max-width: 400px !important;
  }
    .fixfixed{
        margin-top: calc(775px - 925px);
    }
 .stars {
      overflow: hidden;
      width: 100%;
    }

    .lines {
      width: 87%;
    }

    .right-col>p {
      text-align: right;
    }

    /* td:last-child {
      text-align: right;
    } */

    /* td:nth-child(2) {
      text-align: center;
    } */

    /* td:nth-child(3) {
      text-align: center;
    } */

    .tq {
      text-align: center;
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
      text-align: right;
    }

    .quant {
      position: absolute;
    }

    @font-face {
      font-family: "Latin Mono";
      src: url("<?php print base_url() . '/assets/cashier/font/lmmonolt10-bold.otf'; ?>") format("opentype");
    }

    * {
       /* font-family: 'Arial Narrow' */
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
.customcardlabel{
    color:#000 !important;

}
.custmssgdrop{

    background-color: transparent;
    color: black;
    outline: 0;
    box-shadow: none;
    border-radius: 2px;

}
  .clear_key, .clear_discount,.clear_amount {
    position: absolute;
    right: 3%;
    top: 1%;
    color: #1b254b;
    font-size: 120%;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    z-index: 10;
  }

.dropdown.open > .dropdown-menu{
    display:block;
    background: white;
    border: 1px solid gray;
    border-radius: 1px;
}
  .select2{
    /* width : 335px!important; */
    width : 100%!important;

  }
  .select2-container--default .select2-selection--single{
    max-height: 60px !important;
  }

  /*permisson bellow*/
  ul, #myUL {
    list-style-type: none;
  }

  #myUL {
    margin: 0;
    padding: 0;
  }

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

/* .caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;

} */

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */
  transform: rotate(90deg);
}


.nested {
  display: none;
}

.active1 {
  display: block;
}
/* permission end */
/* add roles */
ul, #myUL1 {
  list-style-type: none;
}

#myUL1 {
  margin: 0;
  padding: 0;
}

.caret1 {
cursor: pointer;
-webkit-user-select: none; /* Safari 3.1+ */
-moz-user-select: none; /* Firefox 2+ */
-ms-user-select: none; /* IE 10+ */
user-select: none;
}

.caret1::before {
content: "\25B6";
color: black;
display: inline-block;
margin-right: 6px;

}

.caret-down1::before {
-ms-transform: rotate(90deg); /* IE 9 */
-webkit-transform: rotate(90deg); /* Safari */
transform: rotate(90deg);
}


.nested1 {
display: none;
}

.active2 {
display: block;
}
/* end add roles */

/* update roles */
ul, #myUL2 {
  list-style-type: none;
}

#myUL2 {
  margin: 0;
  padding: 0;
}

.caret2 {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret2::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;

}

.caret3 {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret3::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;

}

.caret-down2::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */
  transform: rotate(90deg);
}

.caret-down3::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */
  transform: rotate(90deg);
}

.nested2 {
  display: none;
}

.active3 {
  display: block;
}
.dropdown-toggle::after {
    display: unset;
     position: unset;
    top: unset;
    right: unset;
    transform: unset;

    top: 15px;
    position: relative;

}

.dro

.dropdown.ctdrop.open {
    all:unset;
    padding-left: 0!important;
    position: relative!important;
    top: 0!important;
}

/* end roles */

.moveup{
  bottom: 8em;
}

.modal .modal-content{
overflow:hidden;
}
.modal-body{
overflow-y:scroll; /* to get scrollbar only for y axis*/
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::after {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 2px;
  position: relative;
    /* left: 123px; */
transform: rotate(180deg);
font-size: 10px;
    top: -1px;
    stroke: black;
}

.caret-down::after {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}
/********** * ravi-style-css ***********/
.parad_dec p {
    font-size: 16px;
    line-height: 30px;
}
.parad_dec ul li {
    line-height: 30px;
    font-size: 15px;
}
.parad_dec ul {
    padding: 0px 0px 0px 15px;
}
/********** * ravi-style-css ***********/
</style>

<STYLE type="text/css">
.firstHead{
    /* font-family: 'f3'; */
    font-family: "Circular Std Book" ;
    margin-bottom: 0;
    width: 100%;
    table-layout: fixed;
}
.texttopsetter{
    position: absolute;
    top:2%;
}
.firstHead > tbody > tr > td{
/* text-align: center; */
border: 2px solid black;
font-size:12px ;
line-height: 18px;
vertical-align: middle;
position: relative;
}
.horline{
    height: 1px;
    width: 100%;
    border-color: black;
    opacity: 1;
    margin: 0!important;
}
.d-hidden{
    visibility: hidden;
}
.area-w4{
    width: 100%;
    background: lightblue;
}
.input{
    /* width: calc(100% + 16px); */
    background: lightblue;
    outline: 0;
    border: 0;
    width: 90%;
    /* margin: -8px; */
}
.setip{
    position: relative;
    top: 6px;
}
.novm{
    vertical-align:initial!important;
}
.vnone{
    vertical-align:unset!important;
}
.lh-lg-2{
    line-height: 3em;
}
.vabot{
    vertical-align:bottom!important;
}
.bbset{
    border-bottom: 1px solid black;
}
.vatop{
    vertical-align:top!important;
}
.fakecol{
    border: 1px solid black;
}
.s1{
    font-size: 15px;
    font-weight: 600;
}
p{
    font-size: 14px;
}
.small-text-w4{
    font-size: 11px;
}
.pl-2{
    padding-left: 10px;
}
.mtt{
    margin-top: 1em!important;
}
.lh-2{
    line-height: 1.2em;
}
.lh4-w4{
    line-height: 1.5em;
}
.bt{
    border-top: 0!important;
}
.br{
    border-right: 0!important;
}
.bl{
    border-left: 0!important;
}
.bb{
    border-bottom: 0!important;
}
.ml-3{
    margin-left: 2.3em;
}
.ml-1{
    margin-left: 1em;
}

.big{
    font-size: 30px;
    font-weight: 800;
    text-align: right;
     margin-left:.5em;
    font-family: 'f1';
}
.w-4title{
    font-size:25px ;
    font-weight: 600;
}
.w-subt{
    font-size:16px ;
    font-weight: 600;
    font-size: 11px;

}
.w-subt.light{
    font-weight: 300;
}
.line{
    width: 100%;
    border: 1px solid black;
    background-color: black;
    color: black;
    opacity: 1;
}
.insFont{
    font-size: calc(.4rem + .6vw);
}
.bb{
    border-bottom: 0;
}
.firstHead > tbody > tr > td > label{
margin: 0;

}
.firstHead > tbody > tr > td > div > label{
margin: 0;

}
.input2{
    width: 90%;
    /* height: 20px; */
    background: lightblue;
    outline: 0;
    border: 0;

}
.fw4-sub{
    font-size: 15px!important;
}
.boldnum{
    font-weight: 700;
}
.fw4-sub > p{
    font-size: 15px;
}
.step-border{
    border-bottom: 1px solid black;
    padding-bottom: .5em;
    padding-left: 0;
    padding-right: 0;
}
@font-face {
  font-family: 'f1';
  src: url('../assets/font/helvetica/Helvetica-Neu-Bold.ttf');
  }
  @font-face {
  font-family: 'f2';
  src: url('../assets/font/helvetica/HelveticaNeue.ttf');
  }
  @font-face {
  font-family: 'f3';
  src: url('../assets/font/helvetica/HelveticaNeueLt.ttf');
  }
    .w-98{
        width: 98%;
    margin: 0 auto;
    }
    </STYLE>

    <style type="text/css">

      /* custom key */
      .flexB2 {
          display: inline-flex;
          flex-wrap: wrap;
        }
        .modal-xl {
          width: 90%;
          max-width:1200px;
      }


        .cm3 {
          color: white;
          height: 11.1vh;
          width: 18%;
          padding: 2em;
          display: flex;
          justify-content: center;
          align-items: center;
          font-size: 15px;

          border-radius: 8px;
          /* margin: 1% auto; */
          margin-right: 1%;
          margin-top: 1%;
          white-space: nowrap;

          background: linear-gradient(112.8deg, #eb8d1c 0%, #ffba67 135.75%);
          outline: none;
          border: transparent;

        }

        .cm3:active {
          background: linear-gradient(180deg, #1b254b 0%, rgba(27, 37, 75, 0) 100%);
          background: linear-gradient(0deg, #ff5c00 0%, #ff9900 100%);
        }
      /* The side navigation menu */
    .sidebar {
      margin: 0;
      padding: 0;
      width:220px;
      background-color: #f1f1f1;
      position: fixed;
      max-height:600px;
      overflow-Y: scroll;
    }

    /* Sidebar links */
    .sidebar a,.sidebar span {
      display: block;
      color: black;
      padding: 15px;
      text-decoration: none;
    }

    /* Active/current link */
    .sidebar a.active,.sidebar button.active {
      background-color: #4CAF50;
      color: white;
    }


    /* Links on mouse-over */
    .sidebar a:hover:not(.active) {
      background-color: #555;
      color: white;
    }
    .sidebar a.active, .sidebar button.active,.sidebar span.active{
    background-color: #4CAF50;
        color: white;
    }

    .dropdown-container {
      display: none;
      //background-color: #262626;
      padding-left: 8px;
    }
    .sidenav a, .dropdown-btn {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      //font-size: 20px;
      color: #818181;
      display: block;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
      outline: none;
    }

    /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
    div.content {
      margin-left: 200px;
      padding: 1px 16px;
      height: 1000px;
    }

    /* On screens that are less than 700px wide, make the sidebar into a topbar */
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {float: left;}
      div.content {margin-left: 0;}
    }

    /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }
    </style>
    <style type="text/css">
      .duplicate{
        border-color: red;
        /* color: white; */
      }
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<script>
var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {

    this.classList.toggle("caret-down");
  });
}
</script>
<script src="<?=base_url() ?>assets/cashier/js/jq-signature.min.js"></script>
<script >
 function updateTextInput(val) {
        console.log('asdasdds');
          document.getElementById('demo').innerHTML=val;
        }

        $(function(){
            $('.ctdrop').on('click',function(){
                $('dropdown-menu').css('display','block');
            })
        })

</script>
<script>
    $('.dropdown-item').on('click',function(){

          console.log('testing this one right her');


      });
     function setDropMssg(v){
         let w = v.children;
         console.log('object',v,)
     $('.custmssgdrop').html(v);

     };
</script>
<script>$(function(){
    $('.x').on('click', function(){
        $('#custom_product_name').val('');
        $('#product_upc').val('');
        $('#custom_product_price').val('');
        $('#custom_product_name').val('');
        $('#product_lookup_description').val('');

        KeyboardNum.close()
        Keyboard.close()
    });

});
</script>

<body class="signback1">
  <div class="loader"></div>
    <div class="containermain2">
        <div class="row m">
              <div class="logobar ">
                <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                  <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
                <?php }else{?>
                  <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
                <?php }?>
              </div>
              <input type="hidden" id="get_id" value="<?=$this->input->get('d')?>">
              <input type="hidden" id="get_role_id" value="<?php echo $this->session->userdata["role_id"]?>">
                <div class="gg">
                <div>
                  <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg "></a>
                </div>
                <div class="mainscreen">
                  <a href="<?php echo base_url(); ?>cashier">
                   <p class="maindes">MAIN SCREEN</p>
                  </a>
                </div>
            </div>
        </div>
    </div>

    <!-- main-content -->
    <div class="row mt-4">
        <div class="col-md-9 pr-0">
          <h5 class="mainline ml-3 mt-3" >Pos Settings</h5>
        </div>
    </div>

    <div class="container-fluid mt20 dynamic_font_size">
          <div class="row overflow" >
            <div class="col-md-3">
                  <div class="customcard">
                    <div class="sidebar">
                      <a href="#news" id="store_setting_intro" class="active">About Settings</a>
                      <!-- general settings -->
                      <span class="dropdown-btn caret">General Settings
                        <!-- <i class="fa fa-caret-down" style="float: right;"></i> -->
                      </span>
                      <div class="dropdown-container">
                        <a href="#contact" id="card_transaction">Card Processor Settings</a>
                        <a href="#contact" id="ccard">Credit Card Fees</a>
                        <a href="#contact" id="date_timezone">Date / Time Settings</a>

                        <a href="#" id="font_settings">Font Size Settings</a>
                        <a href="#mailSettings" id="mail_settings">Mail Settings</a>
                        <a href="#notifiSettings" id="notify_settings">Notification Settings</a>
                        <?php if(empty($this->session->userdata["admindata"]) && $this->data['general_settings'] == 1){ ?>
                        <a href="#contact" id="general">Store Information</a>
                        <?php } ?>
                        <a href="#" id="node_settings">Service Settings</a>
                        <?php if(empty($this->session->userdata["admindata"]) && $this->data['tax_settings'] == 1){ ?>
                        <a href="#contact" id="tax">Tax Settings</a>
                        <?php } ?>
                      </div>
                      <!-- general settings -->
                      <span class="dropdown-btn caret">HRMS
                        <!-- <i class="fa fa-caret-down" style="float: right;"></i> -->
                      </span>
                      <div class="dropdown-container">
                        <?php if(empty($this->session->userdata["admindata"]) && $this->data['cash_advance_settings'] == 1){ ?>
                        <a href="#news" id="cashadv_settings">Cash Advance Settings</a>
                        <?php } ?>
                        <?php if(empty($this->session->userdata["admindata"]) && $this->data['employees'] == 1){ ?>
                        <a href="#user" id="user">Employees</a>
                        <?php } ?>
                        <?php if(empty($this->session->userdata["admindata"]) && $this->data['payroll_settings'] == 1){ ?>
                        <a href="#" id="system_settings">Payroll Settings</a>
                        <?php } ?>
                        <?php if(empty($this->session->userdata["admindata"]) && $this->data['roles'] == 1){ ?>
                        <a href="#contact" id="roles">Roles</a>
                        <?php } ?>
                        <a href="#contact" id="report_scheduler">Shift Scheduler</a>
                        <a href="#contact" id="shift_settings">Shift Settings</a>
                      </div>
                      <!-- general settings -->
                      <?php if(empty($this->session->userdata["admindata"]) && $this->data['label_editor'] == 1){ ?>
                      <a href="#labelEditor" id="editor">Label Editor</a>
                      <?php } ?>
                      <span class="dropdown-btn caret">Loyalty Settings
                        <!-- <i class="fa fa-caret-down" style="float: right;"></i> -->
                      </span>
                      <div class="dropdown-container">
                        <a href="#news" id="intake_point">Earning Point</a>
                        <a href="#news" id="outbound_point">Redemption Point</a>
                      </div>

                      <span class="dropdown-btn caret">Ring Sales Settings
                        <!-- <i class="fa fa-caret-down" style="float: right;"></i> -->
                      </span>
                      <div class="dropdown-container">
                          <a href="#news" id="cashreg_settings">Cash Register Settings</a>


                          <?php if(empty($this->session->userdata["admindata"]) && $this->data['discount_setting'] == 1){ ?>
                          <a href="#contact" id="discount_setting">Discount Settings</a>
                          <?php } ?>
                          <span class="dropdown-btn caret">Inventory Settings
                            <!-- <i class="fa fa-caret-down" style="float: right;"></i> -->
                          </span>
                          <div class="dropdown-container">

                            <?php if(empty($this->session->userdata["admindata"]) && $this->data['custom_Key_setting'] == 1){ ?>
                              <a href="#news" id="key">Custom Key Settings</a>
                            <?php } ?>

                            <?php if(empty($this->session->userdata["admindata"]) && $this->data['pos_categories'] == 1){ ?>
                            <a href="#contact" id="pos">Custom Category Settings</a>
                            <?php } ?>
                            <!-- <a href="#contact" id="miscellaneous_product">Miscellaneous Products</a> -->
                            <a href="#contact" id="scratcher_settings">Scratchers Setting</a>
                          </div>

                          <a href="#contact" id="receipt_settings">Receipt Settings</a>

                          </div>

                          <a href="#mailtemplates" id="template">Reporting Scheduler</a>
                      </div>
                  </div>
            </div>
            <div class="col-md-9 pl-0">
                  <div class="customcard">
                    <div class="toggle_div" id="div_store_setting_intro">
                        <div class="customcardbody">
                            <div class="col-md-12">
                                <div class="form-group">
                                 <!-- <textarea id="mytextarea" class="form-control dynamic_font_size" name="about_store" rows="15"><?=$fontsize->about_store?></textarea> -->
                                  <div class="para-list-dece-02">
                                     <div class="parad_dec"><p class="p1"><b>1. Reporting Scheduler :</b> This setting is used to schedule automated mailers to send various reports. User can select which report to send at what time and also the period for which report needs to be sent.</p></div>
                                     <div class="parad_dec">
                                        <p class="pp2"><b>2. General Settings :</b> These are the general settings for the store including the below:</p>
                                        <ul class="ul_1">
                                          <li>a) Card Processor Settings: Used to select and manage card processor (bolt/clover)</li>
                                          <li>b) Date/Time Settings: Used to define time zone and date/time formats for the POS system </li>
                                          <li>c) Font Size Settings: Used to change the font size of the POS system </li>
                                          <li>d) Mail Settings: Used to configure SMTP mail id to send out mails/reports</li>
                                          <li>e) Notification Settings: Used to decide the modules for which notifications should be sent. User can check/uncheck the modules as per the need and notifications will only be sent for the selected modules </li>
                                          <li>f) Store Information: This is general information about the store like name, address, phone number, etc. </li>
                                          <li>g) Tax Settings: Used to define the tax percentage.</li>
                                        </ul>
                                      </div>
                                    <div class="parad_dec"><p class="pp3"><b>3. HRMS :</b> Contains all the information pertaining to employees</p>
                                      <ul class="ul_2">
                                        <li>a) Employees: Used to add new employees, edit existing employees and define their permissions </li>
                                        <li>b) Roles: Used to create and manage new roles </li>
                                        <li>c) Shift Settings: Gives the ability to end shift for a particular employee in case the employee fails to do so on time </li>
                                        <li>d) Payroll Settings: Used to define the pay period and pay day for the employees </li>
                                        <li>e) Cash Advance Settings: Used to define maximum amount that can be given as cash advance to an employee and the number of paychecks to deduct that amount from </li>
                                        <li>f) Label Editor: Used to define templates to create product labels </li>
                                      </ul>
                                    </div>
                                    <div class="parad_dec">
                                      <p class="pp4"><b>4. Loyalty Settings :</b> Contains customer loyalty settings</p>
                                        <ul class="ul_3">
                                          <li>a) Earning Point: Used to define how many points a customer earns based on a scenario, for e.g., based on new registration or based on the amount he spends on a particular transaction </li>
                                          <li>b) Redemption Point: Used to define how much can a customer redeem in $ amount based on the loyalty points accumulated by him </li>
                                        </ul>
                                    </div>
                                    <div class="parad_dec">
                                      <p class="p5"><b>5. Ring Sales Settings :</b> Contains all settings for the main Ring Sales</p>
                                      <ul class="ul_4">
                                        <li>a) Cash Register Settings: Used to define the start cash in drawer, cash drop threshold value and the cashback fee</li>
                                        <li>b) Discount Settings: Used to define different discounts that can be applied (percentage wise and dollar amount wise)</li>
                                        <li>c) Inventory Settings: Includes settings for creating custom keys, custom categories and scratcher bin settings</li>
                                        <li>d) Receipt Settings: Includes all settings for the transaction receipt, like custom messages that would appear on the receipt, promotion messages on the receipt, etc.</li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <!-- <?php if($this->session->userdata('role_id') == 4){?>
                        <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnAbout">Save</button>
                            </div>
                        </div>
                      <?php } ?> -->
                    </div>
                     <div class="toggle_div" id="div_store_setting_sync">
                        <div class="customcardbody">
                            <div class="col-md-12">
                               <div class="form-group">
                                 <a href="#" id='runsync'>Sync Now</a>
                               </div>
                            </div>
                        </div>
                        <?php if($this->session->userdata('role_id') == 4){?>
                        <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnAbout">Save</button>
                            </div>
                        </div>
                      <?php } ?>
                    </div>

                    <div class="toggle_div" id="div_template" style="display: none;">

                      <?php $this->load->view('cashier/mail_templates_form') ?>
                    </div>

                    <div class="toggle_div" id="div_key" style="display:none;">
                        <div class="flexB2 ">

                          <?php for ($i = 0; $i < 19; $i++) { ?>
                             <div class="m-2" style="width:18%;display:flex;position:relative;">
                            <button style="white-space: normal;word-wrap: break-word!important;" type="button" data-name="<?= ($custom_key[$i]['customkey_name']) ? $custom_key[$i]['customkey_name'] : ''; ?>" data-value="<?= ($custom_key[$i]['customkey_value']) ? $custom_key[$i]['customkey_value'] : ''; ?>" data-is_taxable="<?= ($custom_key[$i]['is_taxable']) ? $custom_key[$i]['is_taxable'] : ''; ?>" id="custom_<?= $custom_key[$i]['customkey_id'] ?>" class="cm3 w-100 open_popup" data-target="#myModal" value=""><?= ($custom_key[$i]['customkey_name']) ? $custom_key[$i]['customkey_name'] : 'Custom Key'; ?>

                            </button>

                            <span class="clear_key" id="clear_<?= $custom_key[$i]['customkey_id'] ?>">x</span>
                          </div>

                          <?php } ?>
                        </div>
                      </div>
                      <div class="toggle_div" id="div_user" style="display: none;">
                        <div class=" container-fluid EMPLOYEE">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="customcard">
                                        <div >
                                          <div class="customcardheader d-flex align-items-center" style="display:flex;align:center;">
                                                <p  class="w-100 dynamic_font_header1">All Employees</p>
                                                <button type="button" class="btn btn-outline-dark alluserbtn dynamic_font_size" id="Archive" >Archive
                                                </button>
                                                <button type="button" class="btn btn-outline-dark alluserbtn adduserbtn position-relative dynamic_font_size" style='top:0!important;right:0!important;' id="addEMP">Add
                                                  <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                                  </svg>
                                              </button>
                                         </div>
                                         <div class="customcardbody2 ">
                                          <table class="table table-striped" id="user_table">
                                              <thead>
                                                <tr class="thead_bold">

                                                  <!-- <th scope="col">User Id</th> -->
                                                  <th scope="col" class="dynamic_font_size" style="color:#000;font-weight:bold;">Employee ID</th>
                                                  <th scope="col" class="dynamic_font_size" style="color:#000;font-weight:bold;">Name</th>
                                                  <th scope="col" class="dynamic_font_size" style="color:#000;font-weight:bold;">Role</th>
                                                  <th scope="col" class="dynamic_font_size" style="color:#000;font-weight:bold;">Email</th>
                                                  <th scope="col" class="dynamic_font_size" style="color:#000;font-weight:bold;">Permissions</th>
                                                  <th class="dynamic_font_size" style="text-align: start;color:#000;font-weight:bold;" scope="col" >Action</th>

                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php if(!empty($users)){ foreach ($users as $u) { ?>
                                                <tr>
                                                  <!-- <th scope="row"></th> -->
                                                  <td class="dynamic_font_size text-center"><?=$u['username']?></td>
                                                  <td class="dynamic_font_size text-center"><?=$u['first_name']?> <?=$u['last_name']?></td>
                                                  <td class="dynamic_font_size text-center"><?=$u['role_name']?></td>
                                                  <td class="dynamic_font_size text-center"><?=$u['email']?></td>
                                                  <?php $manager = $this->session->userdata('role_id'); ?>
                                                  <td class="dynamic_font_size text-center"><button type="button" data-id="<?=$u['username']?>" data-name="<?=$u['first_name']?> <?=$u['last_name']?>" data-role="<?=$u['role_name']?>" class="btn alluserbtn btn-sm Permissions dynamic_font_size" <?php if($manager != 4){ echo 'disabled';}else{ echo '';} ?>>Permissions</button> </td>
                                                   <td class="dynamic_font_size" style="text-align: center;padding: 0px !important;white-space:nowrap;">
                                                      <button type="button" style="padding: 5px 10px 12px 10px;    margin: 0px;" data-id="<?php echo $u['user_id'];?>" class="btn btn-outline-dark alluserbtn EDIT_EMP ">
                                                        <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0)">
                                                        <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                        </g>
                                                        <defs>
                                                        <clipPath id="clip0">
                                                        <rect width="21" height="21" fill="white"/>
                                                        </clipPath>
                                                        </defs>
                                                        </svg>
                                                      </button>
                                                      <button type="button" style="padding: 5px 10px 12px 10px;display: inline;margin: 0px;" class="btn btn-outline-dark alluserbtn deleteRecord " data-id="<?php echo $u['user_id'];?>">
                                                        <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                        </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php } } ?>

                                              </tbody>
                                            </table>
                                         </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                        </div>
                        <div class=" container-fluid Archive" style="display:none;">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="customcard">
                                        <div >
                                          <div class="customcardheader">
                                                <p >Inactive Employees</p>
                                                <button type="button" class="adduserbtn bckbtn btn-backWrapper " id="BACK2" style="max-height:38px;"><img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                                                </button>
                                         </div>
                                         <div class="customcardbody2 ">
                                          <table class="table table-striped" id="inactive_table">
                                              <thead>
                                                <tr>
                                                  <!-- <th scope="col">#</th> -->
                                                  <th class="dynamic_font_size" scope="col" style="color:#000;font-weight:bold;">Employee ID</th>
                                                  <th class="dynamic_font_size" scope="col" style="color:#000;font-weight:bold;">Name</th>
                                                  <th class="dynamic_font_size" scope="col" style="color:#000;font-weight:bold;">Role</th>
                                                  <th class="dynamic_font_size" scope="col" style="color:#000;font-weight:bold;">Email</th>
                                                  <th class="dynamic_font_size" scope="col" style="color:#000;font-weight:bold;">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php if(!empty($inactive)){ foreach ($inactive as $u) { ?>
                                                <tr>
                                                  <!-- <td><?=$i?></td> -->
                                                  <td class="dynamic_font_size text-center"><?=$u['username']?></td>
                                                  <td class="dynamic_font_size text-center"><?=$u['first_name']?> <?=$u['last_name']?></td>
                                                  <td class="dynamic_font_size text-center"><?=$u['role_name']?></td>
                                                  <td class="dynamic_font_size text-center"><?=$u['email']?></td>
                                                  <td class="dynamic_font_size text-center">
                                                      <button type="button" class="btn btn-outline-dark alluserbtn changeStatus dynamic_font_size" data-id="<?php echo $u['user_id'];?>">Activate
                                                      </button>
                                                  </td>
                                                </tr>
                                                <?php } } ?>

                                              </tbody>
                                            </table>
                                         </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                        </div>
                        <form action="" method="post" class="add_user" autocomplete="off" style="display:none;">
                           <!-- cardheader -->
                           <div class="customcardheader">
                                           <p class="dynamic_font_header1">Add New Employee </p>

                                         <button type="button" class="adduserbtn bckbtn btn-backWrapper" id="BACK" style="max-height:38px;"><img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                                                </button>
                                  </div>
                                   <div class="customcardbody ">
                                     <div class="container mb25">

                                          <!-- hidden filed w4form data -->
                                      <input type="hidden" name="w4hiden_add" id="w4hiden_add" value="0">
                                      <input type="hidden" name="firstname" id="w4fname" value="">
                                      <input type="hidden" name="lastname" id="w4lname" value="">
                                      <input type="hidden" name="address" id="w4laddress" value="">
                                      <input type="hidden" name="zip" id="w4zip" value="">
                                      <input type="hidden" name="security_no" id="w4securityno" value="">
                                      <input type="hidden" name="filling_condition" id="w4filling" value="">
                                      <input type="hidden" name="other_income" id="w4other_income" value="">
                                      <input type="hidden" name="deductions" id="w4deductions" value="">
                                      <input type="hidden" name="extra_withholding" id="w4extra_withholding" value="">
                                      <input type="hidden" name="employee_sign" class="emp_sign" value="">
                                      <input type="hidden" name="signature_date" id="w4sign_date" value="">
                                      <input type="hidden" name="name_with_address" id="w4namadd" value="">
                                      <input type="hidden" name="employment_date" id="w4empDate" value="">
                                      <input type="hidden" name="EIN" id="w4EIN" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_1" id="multiple_jobs_worksheet_1" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_2a" id="multiple_jobs_worksheet_2a" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_2b" id="multiple_jobs_worksheet_2b" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_2c" id="multiple_jobs_worksheet_2c" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_3" id="multiple_jobs_worksheet_3" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_4" id="multiple_jobs_worksheet_4" value="">
                                      <input type="hidden" name="deductions_worksheet_1" id="deductions_worksheet_1" value="">
                                      <input type="hidden" name="deductions_worksheet_2" id="deductions_worksheet_2" value="">
                                      <input type="hidden" name="deductions_worksheet_3" id="deductions_worksheet_3" value="">
                                      <input type="hidden" name="deductions_worksheet_4" id="deductions_worksheet_4" value="">
                                      <input type="hidden" name="deductions_worksheet_5" id="deductions_worksheet_5" value="">

                                      <input type="hidden" name="multiple_jobs_or_spouse_works" id="step2_val" value="">
                                      <input type="hidden" name="total_amount" id="total_amount" value="">

                                      <input type="hidden" name="step3a" id="step3a" value="">
                                      <input type="hidden" name="step3b" id="step3b" value="">
                                      <!-- end w4form data -->

                                      <!-- start i9 form data -->
                                        <input type="hidden" name="i9hiden_add" id="i9hiden_add" value="0">
                                        <input type="hidden" name="firstname" id="ni9form1" value="">
                                        <input type="hidden" name="lastname" id="ni9form2" value="">
                                        <input type="hidden" name="middle_initial" id="ni9form3" value="">
                                        <input type="hidden" name="nickname" id="ni9form4" value="">
                                        <input type="hidden" name="address" id="ni9form5" value="">
                                        <input type="hidden" name="apartment_no" id="ni9form6" value="">
                                        <input type="hidden" name="city" id="ni9form7" value="">
                                        <input type="hidden" name="state" id="ni9form8" value="">
                                        <input type="hidden" name="zipcode" id="ni9form9" value="">
                                        <input type="hidden" name="dob12" id="ni9form10" value="">
                                        <input type="hidden" name="social_security_no" id="ni9form11" value="">
                                        <input type="hidden" name="email" id="ni9form12" value="">
                                        <input type="hidden" name="contact_no" id="ni9form13" value="">
                                        <input type="hidden" name="imprisonment" id="ni9form14" value="">
                                        <input type="hidden" name="USCIS_no" id="ni9form15" value="">
                                        <input type="hidden" name="expiration_date" id="ni9form16" value="">
                                        <input type="hidden" name="i_94_admission_no" id="ni9form17" value="">
                                        <input type="hidden" name="foreign_passport_no" id="ni9form18" value="">
                                        <input type="hidden" name="country_of_issuance" id="ni9form19" value="">
                                        <input type="hidden" name="employee_signature" id="ni9form20" value="">
                                        <input type="hidden" name="signature_date" id="ni9form21" value="">
                                        <input type="hidden" name="translator_check" id="ni9form22" value="">
                                        <input type="hidden" name="translator_sign" id="ni9form23" value="">
                                        <input type="hidden" name="translator_sign_date" id="ni9form24" value="">
                                        <input type="hidden" name="translator_firstname" id="ni9form25" value="">
                                        <input type="hidden" name="translator_lastname" id="ni9form26" value="">
                                        <input type="hidden" name="translator_address" id="ni9form27" value="">
                                        <input type="hidden" name="translator_city" id="ni9form28" value="">
                                        <input type="hidden" name="translator_state" id="ni9form29" value="">
                                        <input type="hidden" name="translator_zipcode" id="ni9form30" value="">
                                        <input type="hidden" name="citizenship_immigration" id="ni9form31" value="">
                                        <input type="hidden" name="doc_title_1" id="ni9form32" value="">
                                        <input type="hidden" name="doc_title_2" id="ni9form33" value="">
                                        <input type="hidden" name="doc_title_3" id="ni9form34" value="">
                                        <input type="hidden" name="doc_title_4" id="ni9form35" value="">
                                        <input type="hidden" name="doc_title_5" id="ni9form36" value="">
                                        <input type="hidden" name="issuing_authority_1" id="ni9form37" value="">
                                        <input type="hidden" name="issuing_authority_2" id="ni9form38" value="">
                                        <input type="hidden" name="issuing_authority_3" id="ni9form39" value="">
                                        <input type="hidden" name="issuing_authority_4" id="ni9form40" value="">
                                        <input type="hidden" name="issuing_authority_5" id="ni9form41" value="">
                                        <input type="hidden" name="doc_number_1" id="ni9form42" value="">
                                        <input type="hidden" name="doc_number_2" id="ni9form43" value="">
                                        <input type="hidden" name="doc_number_3" id="ni9form44" value="">
                                        <input type="hidden" name="doc_number_4" id="ni9form45" value="">
                                        <input type="hidden" name="doc_number_5" id="ni9form46" value="">
                                        <input type="hidden" name="doc_expiry_1" id="ni9form47" value="">
                                        <input type="hidden" name="doc_expiry_2" id="ni9form48" value="">
                                        <input type="hidden" name="doc_expiry_3" id="ni9form49" value="">
                                        <input type="hidden" name="doc_expiry_4" id="ni9form50" value="">
                                        <input type="hidden" name="doc_expiry_5" id="ni9form51" value="">
                                        <input type="hidden" name="re_hire_date" id="ni9form52" value="">
                                        <input type="hidden" name="doc_title_6" id="ni9form53" value="">
                                        <input type="hidden" name="doc_no_6" id="ni9form54" value="">
                                        <input type="hidden" name="doc_expiry_6" id="ni9form55" value="">
                                        <input type="hidden" name="authorized_sign" id="ni9form56" value="">
                                        <input type="hidden" name="authorized_sign_date" id="ni9form57" value="">
                                        <input type="hidden" name="authorized_title" id="ni9form58" value="">
                                        <input type="hidden" name="authorized_firstname" id="ni9form59" value="">
                                        <input type="hidden" name="authorized_lastname" id="ni9form60" value="">
                                        <input type="hidden" name="emp_organization" id="ni9form61" value="">
                                        <input type="hidden" name="organization_addres" id="ni9form62" value="">
                                        <input type="hidden" name="organization_city" id="ni9form63" value="">
                                        <input type="hidden" name="organization_state" id="ni9form64" value="">
                                        <input type="hidden" name="organization_zipcode" id="ni9form65" value="">
                                      <!-- end i9form data -->

                                         <div class="row">

                                             <div class="col-md-4">
                                              <div class="form-group">
                                                  <label class="customcardlabel" for="">First Name <span style="color:#FF0000;">*</span></label>
                                                  <input type="text" class="form-control customcardinput use-keyboard-input" id="fname" name="first_name" aria-describedby="" placeholder="Please enter your First Name"  onkeypress="return onlyAlphabets(event,this);">
                                                  <span class="errors dynamic_font_size_err" id="fname_err" style="color:red;"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Last Name <span style="color:#FF0000;">*</span></label>
                                                  <input type="text" class="form-control customcardinput use-keyboard-input" id="lname" name="last_name" aria-describedby="" placeholder="Please enter your Last Name"  onkeypress="return onlyAlphabets(event,this);">
                                                  <span class="errors dynamic_font_size_err" id="lname_err" style="color:red;"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Nick Name </label>
                                                  <input type="text" class="form-control customcardinput use-keyboard-input" id="nname" name="nick_name" aria-describedby="" placeholder="Please enter your Nick Name"  onkeypress="return onlyAlphabets(event,this);">
                                                  <span class="errors dynamic_font_size_err" id="nick_err" style="color:red;"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Phone Number <span style="color:#FF0000;">*</span></label>
                                                  <input type="tel" class="form-control customcardinput phoneInput use-keyboard-input-num usemobilehere" id="mobile" name="phone_no" aria-describedby=""  placeholder="Please enter your Phone Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                  <span class="errors dynamic_font_size_err" id="mob_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Email <span style="color:#FF0000;">*</span></label>
                                                  <input type="text" class="form-control customcardinput use-keyboard-input" id="email" name="email" aria-describedby="" placeholder="Please enter your Email" onkeyup="ValidateEmail();">
                                                  <span class="errors dynamic_font_size_err" id="email_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel" for="">Address <span style="color:#FF0000;">*</span></label>
                                                  <input type="text" class="form-control customcardinput use-keyboard-input" id="w4addf" name="w4address" aria-describedby="" placeholder="Please enter Address">
                                                  <span class="errors dynamic_font_size_err" id="w4addf_err" style="color:red; font-size:14px"></span>

                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">City or town, state, and ZIP code <span style="color:#FF0000;">*</span></label>
                                                  <input type="text" class="form-control customcardinput use-keyboard-input" id="address_more" name="address-more" aria-describedby="" placeholder="Please enter City or town, state, and ZIP code">
                                                  <span class="errors dynamic_font_size_err" id="address_more_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- container -->
                                     <div class="container  mb25">
                                      <p class="formheader dynamic_font_header2">Login & Role</p>
                                         <div class="row">

                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel" for="">Employee ID <span style="color:#FF0000;">*</span></label>
                                                  <label class=" text-secondary" style="font-size:10px;">(Numeric field only)</label>
                                                  <input type="tel" class="form-control customcardinput use-keyboard-input-num" id="user_name" name="username" aria-describedby="" placeholder="Please enter Employee ID" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" >
                                                  <span class="errors" id="uname_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Role <span style="color:#FF0000;">*</span></label>
                                                  <select class="form-control customcardinput dynamic_font_size" id="role" name="role">
                                                    <option>-- Select --</option>
                                                    <?php foreach($front_role as $userrole){ ?>
                                                      <option value="<?=$userrole['id']?>"><?=$userrole['role_name']?></option>
                                                    <?php } ?>
                                                  </select>
                                                 <span class="errors dynamic_font_size_err" id="role_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Password <span style="color:#FF0000;">*</span></label>
                                                  <label class=" text-secondary" style="font-size:10px;">(Numeric field only)</label>
                                                  <input type="password" class="form-control customcardinput use-keyboard-input-num" id="password" name="password" aria-describedby="" placeholder="Please enter your Password" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
                                                  <span class="errors dynamic_font_size_err" id="pass_err" style="color:red;"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Confirm Password <span style="color:#FF0000;">*</span></label>
                                                  <label class=" text-secondary" style="font-size:10px;">(Numeric field only)</label>
                                                  <input type="password" class="form-control customcardinput use-keyboard-input-num" id="cnf_password" name="cnf_password" aria-describedby="" placeholder="Please re-enter your Password" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
                                                  <span class="errors" id="cpass_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                         </div>
                                     </div>
                                      <!-- container -->
                                      <div class="container  mb25">
                                          <p class="formheader dynamic_font_header2">More Information</p>
                                             <div class="row">

                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel" for="">Date of Birth</label>
                                                      <input type="date" class="form-control customcardinput dynamic_font_size" id="dob" name="dob" aria-describedby="" placeholder="mm-dd-yyyy" style="background: #fff;">
                                                      <span class="errors dynamic_font_size_err" id="dob_err" style="color:red; "></span>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Gender <span style="color:#FF0000;">*</span></label>
                                                      <select class="form-control customcardinput dynamic_font_size" id="gender" name="gender" >
                                                        <option value="0">-- Select --</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                      </select>
                                                      <span class="errors dynamic_font_size_err" id="gen_err" style="color:red; "></span>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Martial Status</label>
                                                      <select class="form-control customcardinput dynamic_font_size" id="marital" name="marital_status">
                                                        <option value="0">-- Choose Option --</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="divorced">Divorced</option>
                                                        <option value="separated">Separated</option>
                                                        <option value="widowed">Widowed</option>
                                                      </select>
                                                      <span class="errors dynamic_font_size_err" id="marital_err" style="color:red;"></span>
                                                    </div>
                                                 </div>

                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Emergency Contact Person</label>
                                                      <input type="text" class="form-control customcardinput use-keyboard-input" id="gurdian_name" name="gurdian_name" aria-describedby="" placeholder="Please enter Emergency Contact Person"  onkeypress="return onlyAlphabets(event,this);">
                                                      <span class="errors" id="gurn_err" style="color:red;"></span>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label class="customcardlabel">Emergency Contact Number</label>
                                                    <input type="tel" class="form-control customcardinput phoneInput use-keyboard-input-num" id="gurdian_phone" name="gurdian_phone" aria-describedby="" placeholder="Please enter Emergency Contact Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                    <span class="errors" id="gurph_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Relationship</label>
                                                      <input type="text" class="form-control customcardinput use-keyboard-input" id="per_address" name="relationship" aria-describedby="" placeholder="Please enter your Relationship" onkeypress="return onlyAlphabets(event,this);">
                                                      <span class="errors" id="padrs_err" style="color:red; font-size:14px"></span>
                                                    </div>
                                                 </div>
                                             </div>
                                         </div>

                                 <div class="container  mb25">
                                  <p class="formheader dynamic_font_header2">W-4 Form</p>
                                     <button type="button" class="btn btn-success btn-sm w4Form dynamic_font_size">W-4 Form</button>
                                 </div>
                                 <div class="container  mb25">
                                    <p class="formheader dynamic_font_header2 ">I-9 Form</p>
                                    <button type="button" class="btn btn-success btn-sm i9Form dynamic_font_size">I-9 Form</button>
                                </div>
                           </div>
                           <!-- cardbody -->
                           <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('cashier/settings?d=employee')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnUser">Save</button>
                              </div>
                           </div>
                        </form>
                        <form action="" method="post" class="update_user" autocomplete="off" style="display:none;">
                                   <!-- cardheader -->
                                   <div class="customcardheader">
                                        <p class="dynamic_font_header2">Update Employee</p>
                                        <button type="button" class="adduserbtn bckbtn btn-backWrapper" id="BACK1" style="max-height:38px;"><img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                                        <!-- <button type="button" class="btn btn-outline-dark alluserbtn adduserbtn" id="BACK1" style="display:none;">Back123 -->
                                         </button>
                                  </div>
                                   <div class="customcardbody ">
                                     <div class="container mb25">
                                      <!-- <p class="formheader">Basic Information </p> -->
                                      <input type="hidden" name="w4hiden_submit" id="w4hiden_submit" value="0">
                                      <input type="hidden" name="firstname" id="w4Firstname" value="">
                                      <input type="hidden" name="lastname" id="w4Lastname" value="">
                                      <input type="hidden" name="address" id="ew4laddress" value="">
                                      <input type="hidden" name="zip" id="ew4zip" value="">
                                      <input type="hidden" name="security_no" id="ew4securityno" value="">
                                      <input type="hidden" name="filling_condition" id="ew4filling" value="">
                                      <input type="hidden" name="other_income" id="ew4other_income" value="">
                                      <input type="hidden" name="deductions" id="ew4deductions" value="">
                                      <input type="hidden" name="extra_withholding" id="ew4extra_withholding" value="">
                                      <input type="hidden" name="employee_sign" class="emp_sign" value="">
                                      <input type="hidden" name="signature_date" id="ew4sign_date" value="">
                                      <input type="hidden" name="name_with_address" id="ew4namadd" value="">
                                      <input type="hidden" name="employment_date" id="ew4empDate" value="">
                                      <input type="hidden" name="EIN" id="ew4EIN" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_1" id="emultiple_jobs_worksheet_1" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_2a" id="emultiple_jobs_worksheet_2a" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_2b" id="emultiple_jobs_worksheet_2b" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_2c" id="emultiple_jobs_worksheet_2c" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_3" id="emultiple_jobs_worksheet_3" value="">
                                      <input type="hidden" name="multiple_jobs_worksheet_4" id="emultiple_jobs_worksheet_4" value="">
                                      <input type="hidden" name="deductions_worksheet_1" id="edeductions_worksheet_1" value="">
                                      <input type="hidden" name="deductions_worksheet_2" id="edeductions_worksheet_2" value="">
                                      <input type="hidden" name="deductions_worksheet_3" id="edeductions_worksheet_3" value="">
                                      <input type="hidden" name="deductions_worksheet_4" id="edeductions_worksheet_4" value="">
                                      <input type="hidden" name="deductions_worksheet_5" id="edeductions_worksheet_5" value="">

                                      <input type="hidden" name="multiple_jobs_or_spouse_works" id="estep2_val" value="">
                                      <input type="hidden" name="total_amount" id="etotal_amount" value="">
                                      <input type="hidden" name="step3a" id="estep3a" value="">
                                      <input type="hidden" name="step3b" id="estep3b" value="">

                                      <!-- i9form hidden fileds -->
                                      <input type="hidden" name="i9hiden_submit" id="i9hiden_submit" value="0">
                                      <input type="hidden" name="firstname" id="i9form1" value="">
                                      <input type="hidden" name="lastname" id="i9form2" value="">
                                      <input type="hidden" name="middle_initial" id="i9form3" value="">
                                      <input type="hidden" name="nickname" id="i9form4" value="">
                                      <input type="hidden" name="address" id="i9form5" value="">
                                      <input type="hidden" name="apartment_no" id="i9form6" value="">
                                      <input type="hidden" name="city" id="i9form7" value="">
                                      <input type="hidden" name="state" id="i9form8" value="">
                                      <input type="hidden" name="zipcode" id="i9form9" value="">
                                      <input type="hidden" name="dob12" id="i9form10" value="">
                                      <input type="hidden" name="social_security_no" id="i9form11" value="">
                                      <input type="hidden" name="email" id="i9form12" value="">
                                      <input type="hidden" name="contact_no" id="i9form13" value="">


                                      <input type="hidden" name="imprisonment" id="i9form14" value="">
                                      <input type="hidden" name="USCIS_no" id="i9form15" value="">
                                      <input type="hidden" name="expiration_date" id="i9form16" value="">
                                      <input type="hidden" name="i_94_admission_no" id="i9form17" value="">
                                      <input type="hidden" name="foreign_passport_no" id="i9form18" value="">
                                      <input type="hidden" name="country_of_issuance" id="i9form19" value="">
                                      <input type="hidden" name="employee_signature" id="i9form20" value="">
                                      <input type="hidden" name="signature_date" id="i9form21" value="">
                                      <input type="hidden" name="translator_check" id="i9form22" value="">
                                      <input type="hidden" name="translator_sign" id="i9form23" value="">
                                      <input type="hidden" name="translator_sign_date" id="i9form24" value="">
                                      <input type="hidden" name="translator_firstname" id="i9form25" value="">
                                      <input type="hidden" name="translator_lastname" id="i9form26" value="">
                                      <input type="hidden" name="translator_address" id="i9form27" value="">
                                      <input type="hidden" name="translator_city" id="i9form28" value="">
                                      <input type="hidden" name="translator_state" id="i9form29" value="">
                                      <input type="hidden" name="translator_zipcode" id="i9form30" value="">
                                      <input type="hidden" name="citizenship_immigration" id="i9form31" value="">
                                      <input type="hidden" name="doc_title_1" id="i9form32" value="">
                                      <input type="hidden" name="doc_title_2" id="i9form33" value="">
                                      <input type="hidden" name="doc_title_3" id="i9form34" value="">
                                      <input type="hidden" name="doc_title_4" id="i9form35" value="">
                                      <input type="hidden" name="doc_title_5" id="i9form36" value="">
                                      <input type="hidden" name="issuing_authority_1" id="i9form37" value="">
                                      <input type="hidden" name="issuing_authority_2" id="i9form38" value="">
                                      <input type="hidden" name="issuing_authority_3" id="i9form39" value="">
                                      <input type="hidden" name="issuing_authority_4" id="i9form40" value="">
                                      <input type="hidden" name="issuing_authority_5" id="i9form41" value="">
                                      <input type="hidden" name="doc_number_1" id="i9form42" value="">
                                      <input type="hidden" name="doc_number_2" id="i9form43" value="">
                                      <input type="hidden" name="doc_number_3" id="i9form44" value="">
                                      <input type="hidden" name="doc_number_4" id="i9form45" value="">
                                      <input type="hidden" name="doc_number_5" id="i9form46" value="">
                                      <input type="hidden" name="doc_expiry_1" id="i9form47" value="">
                                      <input type="hidden" name="doc_expiry_2" id="i9form48" value="">
                                      <input type="hidden" name="doc_expiry_3" id="i9form49" value="">
                                      <input type="hidden" name="doc_expiry_4" id="i9form50" value="">
                                      <input type="hidden" name="doc_expiry_5" id="i9form51" value="">
                                      <input type="hidden" name="re_hire_date" id="i9form52" value="">
                                      <input type="hidden" name="doc_title_6" id="i9form53" value="">
                                      <input type="hidden" name="doc_no_6" id="i9form54" value="">
                                      <input type="hidden" name="doc_expiry_6" id="i9form55" value="">
                                      <input type="hidden" name="authorized_sign" id="i9form56" value="">
                                      <input type="hidden" name="authorized_sign_date" id="i9form57" value="">
                                      <input type="hidden" name="authorized_title" id="i9form58" value="">
                                      <input type="hidden" name="authorized_firstname" id="i9form59" value="">
                                      <input type="hidden" name="authorized_lastname" id="i9form60" value="">
                                      <input type="hidden" name="emp_organization" id="i9form61" value="">
                                      <input type="hidden" name="organization_addres" id="i9form62" value="">
                                      <input type="hidden" name="organization_city" id="i9form63" value="">
                                      <input type="hidden" name="organization_state" id="i9form64" value="">
                                      <input type="hidden" name="organization_zipcode" id="i9form65" value="">
                                      <!-- end hidden fileds -->


                                         <div class="row">

                                             <div class="col-md-4">
                                              <div class="form-group">
                                                  <label class="customcardlabel" for="">First Name <span style="color:#FF0000;">*</span></label>
                                                  <input type="text" class="form-control customcardinput inputdat use-keyboard-input dynamic_font_size" id="efname" name="first_name" aria-describedby=""  onkeypress="return onlyAlphabets(event,this);">
                                                  <span class="errors dynamic_font_size_err" id="efname_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Last Name <span style="color:#FF0000;">*</span></label>
                                                  <input type="text" class="form-control customcardinput inputdat use-keyboard-input dynamic_font_size" id="elname" name="last_name" aria-describedby=""  onkeypress="return onlyAlphabets(event,this);">
                                                  <span class="errors dynamic_font_size_err" id="elname_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Nick Name </label>
                                                  <input type="text" class="form-control customcardinput inputdat use-keyboard-input dynamic_font_size" id="enname" name="nick_name" aria-describedby=""  onkeypress="return onlyAlphabets(event,this);">
                                                  <span class="errors dynamic_font_size_err" id="enick_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Phone Number <span style="color:#FF0000;">*</span></label>
                                                  <input type="tel" class="form-control customcardinput phoneInput inputdat use-keyboard-input-num usemobilehere dynamic_font_size" id="emobile" name="phone_no" aria-describedby="" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                  <span class="errors dynamic_font_size_err" id="emob_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Email <span style="color:#FF0000;">*</span></label>
                                                  <input type="text" class="form-control customcardinput inputdat use-keyboard-input dynamic_font_size" id="eemail" name="email" aria-describedby="" onkeyup="ValidateEmail1();">
                                                  <span class="errors dynamic_font_size_err" id="eemail_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                               <input type="hidden" id="oemail" name="original_email" value="">
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel" for="">Address <span style="color:#FF0000;">*</span></label>
                                                  <input type="text" class="form-control customcardinput inputdat use-keyboard-input dynamic_font_size" id="ew4addf" name="w4address" aria-describedby="">
                                                  <span class="errors dynamic_font_size_err" id="ew4addf_err" style="color:red; font-size:14px"></span>

                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">City or town, state, and ZIP code <span>*</span></label>
                                                  <input type="text" class="form-control customcardinput inputdat use-keyboard-input dynamic_font_size" id="eaddress_more" name="address-more" aria-describedby="" placeholder="Please enter City or town, state, and ZIP code">
                                                  <span class="errors dynamic_font_size_err" id="eaddress_more_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- container -->
                                     <div class="container  mb25">
                                      <p class="formheader dynamic_font_header2">Login & Role</p>
                                         <div class="row">

                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel" for="">Employee ID</label>
                                                  <input type="text" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" id="euser_name" name="username" aria-describedby="" readonly>
                                                  <span class="errors dynamic_font_size_err" id="euname_err" style="color:red; font-size:14px"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="customcardlabel">Role</label>
                                                  <select class="form-control customcardinput inputdat dynamic_font_size" id="erole" name="role">
                                                    <?php foreach($front_role as $userrole){ ?>
                                                      <option value="<?=$userrole['id']?>"><?=$userrole['role_name']?></option>
                                                    <?php } ?>
                                                  </select>
                                                </div>
                                             </div>
                                         </div>
                                     </div>
                                      <!-- container -->
                                      <div class="container  mb25">
                                          <p class="formheader dynamic_font_header2">More Information</p>
                                             <div class="row">

                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel" for="">Date of Birth</label>
                                                      <input type="date" class="form-control customcardinput dynamic_font_size" id="edob" name="dob" aria-describedby="" style="background: #fff;" placeholder="mm-dd-yyyy">
                                                      <span class="errors dynamic_font_size_err" id="edob_err" style="color:red; font-size:14px"></span>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Gender</label>
                                                      <select class="form-control customcardinput dynamic_font_size" id="egender" name="gender" >
                                                        <option value="0">-- Select --</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                      </select>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                        <label class="customcardlabel">Marital Status</label>
                                                        <select class="form-control customcardinput dynamic_font_size" id="emarital" name="marital_status">
                                                            <option value="0">-- Choose Option --</option>
                                                            <option value="single">Single</option>
                                                            <option value="married">Married</option>
                                                            <option value="divorced">Divorced</option>
                                                            <option value="separated">Separated</option>
                                                            <option value="widowed">Widowed</option>
                                                        </select>
                                                    </div>
                                                 </div>

                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Emergency Contact Person</label>
                                                      <input type="text" class="form-control customcardinput inputdat use-keyboard-input dynamic_font_size" id="egurdian_name" name="gurdian_name" aria-describedby="" onkeypress="return onlyAlphabets(event,this);" placeholder="Please enter Emergency Contact Person">
                                                      <span class="errors dynamic_font_size_err" id="egurn_err" style="color:red; font-size:14px"></span>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label class="customcardlabel">Emergency Contact Number</label>
                                                    <input type="tel" class="form-control customcardinput phoneInput inputdat use-keyboard-input-num dynamic_font_size" id="egurdian_phone" name="gurdian_phone" aria-describedby="" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Please enter Emergency Contact Number">
                                                    <span class="errors dynamic_font_size_err" id="egurph_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="customcardlabel">Relationship</label>
                                                      <input type="text" class="form-control customcardinput inputdat use-keyboard-input dynamic_font_size" id="eper_address" name="relationship" aria-describedby="" onkeypress="return onlyAlphabets(event,this);" placeholder="Please enter your Relationship">
                                                      <span class="errors dynamic_font_size_err" id="epadrs_err" style="color:red; font-size:14px"></span>
                                                    </div>
                                                 </div>

                                             </div>
                                         </div>
                                         <!-- container -->
                                         <!-- container -->
                                         <div class="container  mb25">
                                          <p class="formheader dynamic_font_header2">Reset Password</p>
                                             <div class="row">

                                               <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="customcardlabel">New Password </label>
                                                    <label class=" text-secondary" style="font-size:10px;">(Numeric field only)</label>
                                                    <input type="password" class="form-control customcardinput inputdat use-keyboard-input-num dynamic_font_size" id="epassword" name="password" aria-describedby="" placeholder="Please enter your New Password" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
                                                    <span class="errors dynamic_font_size_err" id="epass_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                               </div>
                                               <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="customcardlabel">Confirm New Password </label>
                                                    <label class=" text-secondary" style="font-size:10px;">(Numeric field only)</label>
                                                    <input type="password" class="form-control customcardinput inputdat use-keyboard-input-num" id="ecnf_password" name="cnf_password" aria-describedby="" placeholder="Please re-enter your New Password" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
                                                    <span class="errors dynamic_font_size_err" id="ecpass_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                               </div>
                                             </div>
                                         </div>
                                         <!-- container -->
                                         <div class="container  mb25">
                                         <p class="formheader">W-4 Form</p>
                                            <button type="button" class="btn btn-success btn-sm w4Form1">W-4 Form</button>
                                        </div>
                                        <div class="container  mb25">
                                            <p class="formheader">I-9 Form</p>
                                            <button type="button" class="btn btn-success btn-sm i9Form1">I-9 Form</button>
                                        </div>
                                   </div>
                                   <!-- cardbody -->
                                   <input type="hidden" name="user_id" id="user_id" class="form-control">

                                   <!-- cardbody -->
                                   <div class="customcardfooter">
                                      <div style="text-align: center;">
                                          <a href="<?=base_url('cashier/settings?d=employee')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                          <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Save</button>
                                      </div>
                                   </div>
                                </form>
                          <form action="" method="post" class="user_perm" style="display:none;">
                                   <div class="customcardheader">
                                         <p>Update Permissions <span id="permission_name"></span></p>
                                   </div>
                                   <input type="hidden" name="user_id" value="" id="perm_id">
                            <div class="customcardbody ">
                              <!-- container -->
                              <div class="container  mb25">
                                 <ul id="myUL">
                                     <li><span class="caret2"><label class="customcardlabel">Ring Sales</label></span>
                                             <input type="checkbox" class="pos_check ml-3" name="all" id="POS1">
                                             <label class="customcardlabel mr-2">All</label>
                                         <ul class="nested2 ml-5" id="emp_POS">
                                             <!-- <li><input type="checkbox" class="check" name="pos_rights[]" value="A" id="pos1">
                                             <label class="customcardlabel mr-2">Shift Report</label></li> -->
                                             <li><input type="checkbox" class="check" name="pos_rights[]" value="B" id="pos2">
                                             <label class="customcardlabel mr-2">Custom Price</label></li>
                                             <li><input type="checkbox" class="check" name="pos_rights[]" value="C" id="pos3">
                                             <label class="customcardlabel mr-2">Print Receipt</label></li>
                                             <li><input type="checkbox" class="check" name="pos_rights[]" value="D" id="pos4">
                                             <label class="customcardlabel mr-2">Coupon</label></li>
                                             <li><input type="checkbox" class="check" name="pos_rights[]" value="E" id="pos5">
                                             <label class="customcardlabel mr-2">Cash Drop</label></li>
                                             <li><input type="checkbox" class="check" name="pos_rights[]" value="F" id="pos6">
                                             <label class="customcardlabel mr-2">Refund</label></li>
                                             <li><input type="checkbox" class="check" name="pos_rights[]" value="G" id="pos7">
                                             <label class="customcardlabel mr-2">Payout</label></li>
                                             <li><input type="checkbox" class="check" name="pos_rights[]" value="H" id="pos8">
                                             <label class="customcardlabel">Add Custom Product</label></li>
                                             <li><input type="checkbox" class="check" name="pos_rights[]" value="I" id="pos9">
                                             <label class="customcardlabel">Price Override</label></li>
                                             <li><input type="checkbox" class="check" name="pos_rights[]" value="J" id="pos10">
                                             <label class="customcardlabel">Discount</label></li>

                                         </ul>
                                     </li>
                                 </ul>
                                 <ul id="myUL">
                                     <li><span class="caret2 "><label class="customcardlabel">Reports</label></span>
                                             <input type="checkbox" class="report_check ml-3" name="all" id="REPORTS1">
                                             <label class="customcardlabel mr-2">All</label>
                                         <ul class="nested2 ml-5" id="REPORTS">
                                             <li><input type="checkbox" class="check1" name="reports_rights[]" value="A" id="ret1">
                                             <label class="customcardlabel mr-2">Shift Report</label></li>
                                             <li><input type="checkbox" class="check1" name="reports_rights[]" value="B" id="ret2">
                                             <label class="customcardlabel mr-2">Sales Report</label></li>
                                             <li><input type="checkbox" class="check1" name="reports_rights[]" value="C" id="ret3">
                                             <label class="customcardlabel mr-2">Reconciliation Report</label></li>
                                             <li><input type="checkbox" class="check1" name="reports_rights[]" value="D" id="ret4">
                                             <label class="customcardlabel">Payout Report</label></li>
                                             <li><input type="checkbox" class="check1" name="reports_rights[]" value="E" id="ret5">
                                             <label class="customcardlabel mr-2">Timesheet Report</label></li>
                                             <li><input type="checkbox" class="check1" name="reports_rights[]" value="F" id="ret6">
                                             <label class="customcardlabel mr-2">Card Transaction Report</label></li>
                                             <li><input type="checkbox" class="check1" name="reports_rights[]" value="G" id="ret7">
                                             <label class="customcardlabel">Audit Log Report</label></li>
                                             <li><input type="checkbox" class="check1" name="reports_rights[]" value="H" id="ret8">
                                             <label class="customcardlabel mr-2">Scratcher Sales Report</label></li>
                                             <li><input type="checkbox" class="check1" name="reports_rights[]" value="I" id="ret9">
                                             <label class="customcardlabel">Inventory Report</label></li>


                                         </ul>
                                     </li>
                                 </ul>
                                 <ul id="myUL">
                                     <li><span class="caret2"><label class="customcardlabel">Inventory</label></span>
                                             <input type="checkbox" class="inventory_check ml-3" name="all" id="INVENTORY1">
                                             <label class="customcardlabel mr-2">All</label>
                                             <ul class="nested2 ml-5" id="INVENTORY">
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="A" id="inv1">
                                                 <label class="customcardlabel mr-2">Add Product</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="B" id="inv2">
                                                 <label class="customcardlabel mr-2">Update Product</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="C" id="inv3">
                                                 <label class="customcardlabel">Delete Product</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="D" id="inv4">
                                                 <label class="customcardlabel mr-2">Add Supplier</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="E" id="inv5">
                                                 <label class="customcardlabel mr-2">Update Supplier</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="F" id="inv6">
                                                 <label class="customcardlabel">Delete Supplier</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="G" id="inv7">
                                                 <label class="customcardlabel mr-2">Add Scratcher</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="H" id="inv8">
                                                 <label class="customcardlabel mr-2">Update Scratcher</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="I" id="inv9">
                                                 <label class="customcardlabel">Delete Scratcher</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="J" id="inv10">
                                                 <label class="customcardlabel mr-2">Update Custom Product</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="K" id="inv11">
                                                 <label class="customcardlabel mr-2">Delete Custom Product</label></li>
                                                 <li><input type="checkbox" class="check2" name="inventory_rights[]" value="L" id="inv12">
                                                 <label class="customcardlabel">Product-Upc Label</label></li>
                                         </ul>
                                     </li>
                                 </ul>
                                 <ul id="myUL">
                                     <li><span class="caret2"><label class="customcardlabel">Customer/Loyalty</label></span>
                                         <input type="checkbox" class="loyalty_check ml-3" name="all" id="LOYALTY1">
                                         <label class="customcardlabel mr-2">All</label>
                                         <ul class="nested2 ml-5" id="LOYALTY">
                                             <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="A" id="loy1">
                                             <label class="customcardlabel mr-2">Add Customer</label></li>
                                             <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="B" id="loy2">
                                             <label class="customcardlabel mr-2">Update Customer</label></li>
                                             <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="C" id="loy3">
                                             <label class="customcardlabel mr-2">Delete Customer</label></li>
                                             <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="D" id="loy4">
                                             <label class="customcardlabel mr-2">Create Coupon</label></li>
                                             <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="E" id="loy5">
                                             <label class="customcardlabel mr-2">Edit Coupon</label></li>
                                             <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="F" id="loy6">
                                             <label class="customcardlabel mr-2">Delete Coupon</label></li>
                                             <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="G" id="loy7">
                                             <label class="customcardlabel mr-2">Create Promotion</label></li>
                                             <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="H" id="loy8">
                                             <label class="customcardlabel mr-2">Edit Promotion</label></li>
                                             <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="I" id="loy9">
                                             <label class="customcardlabel">Delete Promotion</label></li>
                                         </ul>
                                     </li>
                                 </ul>
                                 <ul id="myUL">
                                     <li><span class="caret2"><label class="customcardlabel">POS Settings</label></span>
                                         <input type="checkbox" class="coupon_check ml-3" name="all" id="COUPON1">
                                         <label class="customcardlabel mr-2">All</label>
                                         <ul class="nested2 ml-5" id="COUPON">
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="A" id="sto1">
                                             <label class="customcardlabel mr-2">Custom Key Settings</label></li>
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="B" id="sto2">
                                             <label class="customcardlabel mr-2">Employees</label></li>
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="C" id="sto3">
                                             <label class="customcardlabel mr-2">General Settings</label></li>
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="D" id="sto4">
                                             <label class="customcardlabel">Label Editor</label></li>
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="E" id="sto5">
                                             <label class="customcardlabel">POS Categories</label></li>
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="F" id="sto6">
                                             <label class="customcardlabel">Roles</label></li>
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="G" id="sto7">
                                             <label class="customcardlabel">Payroll Settings</label></li>
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="H" id="sto8">
                                             <label class="customcardlabel">Tax Settings</label></li>
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="I" id="sto9">
                                             <label class="customcardlabel">Cash Advance Settings</label></li>
                                             <li><input type="checkbox" class="check4" name="store_rights[]" value="J" id="sto10">
                                             <label class="customcardlabel">Discount Settings</label></li>
                                         </ul>
                                     </li>
                                 </ul>
                                 <ul id="myUL">
                                     <li><span class="caret2"><label class="customcardlabel">HRMS</label></span>
                                         <input type="checkbox" class="hrms_check ml-3" name="all" id="HRMS1">
                                         <label class="customcardlabel mr-2">All</label>
                                         <ul class="nested2 ml-5" id="HRMS">
                                             <li><input type="checkbox" class="check5" name="hrms_rights[]" value="A" id="hrm1">
                                             <label class="customcardlabel mr-2">View Leave Requests</label></li>
                                             <li><input type="checkbox" class="check5" name="hrms_rights[]" value="B" id="hrm2">
                                             <label class="customcardlabel mr-2">View Cash Advance Requests</label></li>
                                             <li><input type="checkbox" class="check5" name="hrms_rights[]" value="C" id="hrm3">
                                             <label class="customcardlabel">New Leave Request</label></li>
                                             <li><input type="checkbox" class="check5" name="hrms_rights[]" value="D" id="hrm4">
                                             <label class="customcardlabel">New Cash Advance Request</label></li>
                                         </ul>
                                     </li>
                                 </ul>


                                 <ul id="myUL">
                                     <li><span class="caret2"><label class="customcardlabel">Submit Timecard</label></span>
                                         <input type="checkbox" class="timecard_check ml-3" name="all" id="TIMECARD1">
                                         <label class="customcardlabel mr-2">All</label>
                                         <ul class="nested2 ml-5" id="TIMECARD">
                                             <li><input type="checkbox" class="check6" name="submit_timecard_rights[]" value="A" id="tim1">
                                             <label class="customcardlabel mr-2">Timesheet</label></li>
                                             <li><input type="checkbox" class="check6" name="submit_timecard_rights[]" value="B" id="tim2">
                                             <label class="customcardlabel mr-2">Report</label></li>
                                             <!-- <li><input type="checkbox" class="check" name="hrms_rights[]" value="3">
                                             <label class="customcardlabel">Cash Advance Request</label></li> -->
                                         </ul>
                                     </li>
                                 </ul>
                                 <ul id="myUL">
                                     <li><span class="caret2"><label class="customcardlabel">E-Order</label></span>
                                         <input type="checkbox" class="eorder-check ml-3" name="e_order_rights" value="A" id="erd1">
                                         <label class="customcardlabel mr-2">All</label>
          <!--                                <ul class="nested ml-5 active">
                                             <input type="checkbox" class="check" name="hrms_rights[]" value="1">
                                             <label class="customcardlabel mr-2">Leave Approved</label>
                                             <input type="checkbox" class="check" name="hrms_rights[]" value="2">
                                             <label class="customcardlabel mr-2">Request Leave</label>
                                             <input type="checkbox" class="check" name="hrms_rights[]" value="3">
                                             <label class="customcardlabel">Cash Advance Request</label>
                                         </ul>                            -->
                                     </li>
                                 </ul>
                                 <ul id="myUL">
                                     <li><span class="caret2"><label class="customcardlabel">Market Place</label></span>
                                         <input type="checkbox" class="market-check ml-3" name="market_place_rights" value="A" id="mar1">
                                         <label class="customcardlabel mr-2">All</label>
          <!--                                <ul class="nested ml-5 active">
                                             <input type="checkbox" class="check" name="hrms_rights[]" value="1">
                                             <label class="customcardlabel mr-2">Leave Approved</label>
                                             <input type="checkbox" class="check" name="hrms_rights[]" value="2">
                                             <label class="customcardlabel mr-2">Request Leave</label>
                                             <input type="checkbox" class="check" name="hrms_rights[]" value="3">
                                             <label class="customcardlabel">Cash Advance Request</label>
                                         </ul>                            -->
                                     </li>
                                 </ul>
                                </div>

                            </div>
                            <!-- cardbody -->
                            <div class="customcardfooter">
                               <div style="text-align: center;">
                                   <a href="<?=base_url('cashier/settings?d=employee')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                   <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnPermission">Save</button>
                               </div>
                            </div>
                       </form>

                      </div>

                      <div class="toggle_div" id="div_report_scheduler" style="display: none;">
                        <div class=" container-fluid ROLES1">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="customcard">
                                        <div >
                                          <div class="customcardheader d-flex align-items-center" style="display:flex;align:center;">
                                                <p  class="w-100 dynamic_font_header1">Shift Scheduler</p>
                                         </div>
                                         <div class="customcardbody2" id="report_scheduler_append">
                                           <?php echo $report_scheduler_data['TimesheetReport']['html']; ?>
                                         </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                        </div>
                      </div>

                      <div class="toggle_div" id="div_shift_settings" style="display: none;">
                        <div class=" container-fluid ROLES1">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="customcard">
                                        <div >
                                          <div class="customcardheader d-flex align-items-center" style="display:flex;align:center;">
                                                <p  class="w-100 dynamic_font_header1">Shifts</p>
                                         </div>
                                         <div class="customcardbody2 ">
                                           <table class="table table-striped" id="tbl_shift">
                                               <thead>
                                                 <tr>
                                                   <th class="dynamic_font_size" scope="col" style="color:#000;font-weight:bold;">Employee Name</th>
                                                   <th class="dynamic_font_size" scope="col" style="color:#000;font-weight:bold;">Employee ID</th>
                                                   <th class="dynamic_font_size" scope="col" style="color:#000;font-weight:bold;">Date</th>
                                                   <th class="dynamic_font_size" scope="col" style="text-align: start;color:#000;font-weight:bold;" >Action</th>
                                                 </tr>
                                               </thead>
                                               <tbody>
                                                 <?php $i=1; if(!empty($shift_user)){ foreach($shift_user as $s){
                                                    $cash_drawer = $this->Cashier_model->cash_drower_by_cashier($s['id']);
                                                  ?>
                                                 <tr>
                                                     <td class="dynamic_font_size"><?=$s['first_name']?> <?=$s['last_name']?></td>
                                                      <td class="dynamic_font_size"><?=$s['username']?></td>
                                                      <td class="dynamic_font_size"><?= date('m-d-Y',strtotime($s['date']));?></td>
                                                      <td style="text-align: start; ">
                                                         <button data-id="<?php echo $s['username'];?>" data-cash_in_drawer="<?php echo $cash_drawer['cash_in_drawer'];?>"
                                                           data-coin_dispenser="<?php echo $s['coin_dispenser_in'];?>"
                                                           data-bin_data='<?php echo $s["bin_data_in"];?>' data-shift_id="<?php echo $s['id'];?>"
                                                           data-terminal_id="<?php echo $s['terminal_id'];?>" data-shift_in_out="<?php echo $s['shift_in_out'];?>"
                                                           data-defer_shift="<?php echo $s['defer_shift'];?>" data-shift_date="<?php echo $s['date'];?>" type="button" class="btn btn-outline-dark btnShift dynamic_font_size" >Logout Shift</button>
                                                      </td>
                                                 </tr>
                                               <?php } } ?>
                                               </tbody>
                                             </table>
                                         </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                        </div>
                      </div>

                      <div class="toggle_div" id="div_intake_point" style="display: none;">
                        <div class=" container-fluid POINTS1">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="customcard">
                                        <div >
                                          <div class="customcardheader d-flex align-items-center" style="display:flex;align:center;">
                                                <p  class="w-100 dynamic_font_header1">Earning Point</p>
                                         </div>
                                         <div class="customcardbody2 ">
                                           <table class="table table-striped" id="tbl_point">
                                             <thead>
                                                 <tr >
                                                     <th class="dynamic_font_size" style="color:#000;font-weight:bold;">#</th>
                                                     <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Point Type</th>
                                                     <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Amount</th>
                                                     <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Point</th>
                                                     <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Created Date</th>
                                                     <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Status</th>
                                                     <th class="dynamic_font_size" style="text-align: start;color:#000;font-weight:bold;">Action</th>
                                                 </tr>
                                             </thead>
                                               <tbody>
                                                 <?php $i=1; if(!empty($points)){ foreach ($points as $p) { ?>
                                                   <td class="dynamic_font_size"><?=$i?></td>
                                                   <td class="dynamic_font_size"><?php if($p['point_type']==1)echo 'New Customer';
                                                               else
                                                               echo 'By Value';    ?></td>
                                                   <td class="dynamic_font_size"><?=$p['point_amount']?></td>
                                                   <td class="dynamic_font_size"><?=$p['point']?></td>
                                                   <td class="dynamic_font_size"><?=date('d-m-Y',strtotime($p['created_date']))?></td>

                                                   <td class="dynamic_font_size">
                                                       <?php if($p['status'] == 1){?>
                                                          <button data-id="<?php echo $p['point_id'];?>" data-status='0' class="btn btn-rounded deactivate-point dynamic_font_size" data-toggle="tooltip" title="Active">Active</button>
                                                       <?php }else{?>
                                                          <button data-id="<?php echo $p['point_id'];?>" data-status='1' class="btn btn-rounded deactivate-point dynamic_font_size" data-toggle="tooltip" title="Deactive">Deactive</button>
                                                        <?php }?>
                                                   </td>
                                                   <td class="dynamic_font_size" style="text-align: start;">

                                                           <button type="button" class="btn btn-outline-dark alluserbtn EDIT_POINT dynamic_font_size" data-id="<?php echo $p['point_id'];?>" data-point_type="<?php echo $p['point_type'];?>" data-point_value="<?php echo $p['point'];?>" data-point_amount="<?php echo $p['point_amount'];?>" >Edit
                                                             <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                             <g clip-path="url(#clip0)">
                                                             <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                             </g>
                                                             <defs>
                                                             <clipPath id="clip0">
                                                             <rect width="21" height="21" fill="white"/>
                                                             </clipPath>
                                                             </defs>
                                                             </svg>
                                                           </button>
                                                     <!--
                                                       <button type="button" data-id="<?php echo $p['point_id'];?>" class="btn btn-outline-dark alluserbtn deleteRecord">Delete
                                                           <svg class="delete" width="22" height="16"
                                                               viewBox="0 0 14 18" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                                                               <path
                                                                   d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                           </svg>
                                                       </button> -->
                                                   </td>
                                               </tr>
                                               <!-- tr -->

                                              <?php $i++; } } ?>
                                               </tbody>
                                             </table>
                                         </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                        </div>

                        <form action="" method="post" class="update_point" autocomplete="off" style="display:none;">
                           <!-- cardheader -->
                           <div class="customcardheader">
                                           <p class="dynamic_font_header1">Update Point</p>
                                           <button type="button" class="adduserbtn bckbtn btn-backWrapper" id="BACK66" style="max-height:38px;"><img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                                                </button>
                                  </div>

                                  <div class="customcardbody ">
                                    <div class="container mb25">

                                        <div class="row">
                                            <input type="hidden" name="point_id" id="point_id" value="<?= isset($pointdata['point_id']) ? $pointdata['point_id'] : '' ;?>" class="form-control">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                 <label class="exampleFormControlSelect1 customcardlabel">Point Type <span style="color:#FF0000;">*</span></label>
                                                 <input class="form-control customcardinput" required="" name="point_type" id="point_type" value="" readonly>

                                                 <!-- <select class="form-control customcardinput" required="" name="point_type" id="point_type" disabled="true">
                                                   <option>--Select Point Type--</option>
                                                   <option value="1" <?php echo ($pointdata['point_type'] == '1')?'selected':''?>>New Customer</option>
                                                   <option value="2" <?php echo ($pointdata['point_type'] == '2')?'selected':''?>>By Value </option>
                                                 </select> -->
                                                  <input type="hidden" name="point_type_ini" id="point_type_ini" value="<?=$pointdata['point_type']?>" class="form-control">
                                                 <span class="errors" id="ptype_err" style="color:red; font-size:14px"></span>
                                               </div>
                                            </div>

                                            <div class="col-md-6 pamount">
                                                 <div class="form-group">
                                                     <label class="customcardlabel">Amount <span style="color:#FF0000;">*</span></label>
                                                     <div class="position-relative">
                                                         <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                       <input type="tel" name="point_amount" class="form-control customcardinput validate1 use-keyboard-input-num" id="point_amount" aria-describedby="" placeholder="Enter Amount" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  maxlength="10"  value="<?=$pointdata['point_amount']?>">
                                                     </div>
                                                     <p class="errors" id="pamt_err" style="color:red; font-size:14px;margin-bottom:0;"></p>
                                                   </div>
                                            </div>

                                            <div class="col-md-6 point">
                                              <div class="form-group">
                                                 <label class="exampleFormControlSelect1 customcardlabel">Point <span style="color:#FF0000;">*</span></label>
                                                 <input type="text" class="form-control customcardinput use-keyboard-input-num" name="point" id="point" value="<?=$pointdata['point']?>" onkeypress="return isNumberKey(this, event);"/>

                                                 <span class="errors" id="point_err" style="color:red; font-size:14px"></span>
                                               </div>

                                            </div>
                                        </div>
                                    </div>

                              </div>



                           <!-- cardbody -->
                           <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('cashier/settings?d=point')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnPoint">Save</button>
                              </div>
                           </div>
                        </form>
                      </div>

                      <div class="toggle_div" id="div_outbound_point" style="display: none;">
                      <form action="" method="post" class="out_point" autocomplete="off">
                         <!-- cardheader -->
                         <div class="customcardheader">
                                    <p class="dynamic_font_header1">Redemption Point</p>
                                </div>

                                <div class="customcardbody ">
                                  <div class="container mb25">
                                      <input type="hidden" name='point_id' value="<?=$loyalty[0]['point_id']?>">
                                      <div class="row">
                                          <div class="col-md-6 point">
                                            <div class="form-group">
                                               <label class="exampleFormControlSelect1 custom_label dynamic_font_size" style="color: #000 !important;">Point <span style="color:#FF0000;">*</span></label>
                                               <input type="text" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" name="point" id="out_point" value="<?=$loyalty[0]['point']?>" onkeypress="return isNumberKey(this, event);"/>

                                               <span class="errors dynamic_font_size_err" id="point_err1" style="color:red;"></span>
                                             </div>

                                          </div>

                                          <div class="col-md-6 pamount">
                                               <div class="form-group">
                                                   <label class="custom_label dynamic_font_size" style="color:#000 !important;">Amount <span style="color:#FF0000;">*</span></label>
                                                   <div class="position-relative">
                                                       <span class="position-absolute dynamic_font_size" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                     <input type="tel" name="point_amount" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" id="out_point_amount" aria-describedby="" placeholder="Enter Amount" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  maxlength="10"  value="<?=$loyalty[0]['point_amount']?>">
                                                   </div>
                                                   <p class="errors dynamic_font_size_err" id="pamt_err1" style="color:red; font-size:14px;margin-bottom:0;"></p>
                                                 </div>
                                          </div>
                                      </div>

                                  </div>
                                  </div>
                         <!-- cardbody -->
                         <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btn_outbound">Save</button>
                            </div>
                         </div>
                      </form>
                  </div>


                  <div class="toggle_div" id="div_miscellaneous_product" style="display: none;">
                    <div class=" container-fluid POINTS9">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="customcard">
                                    <div >
                                      <div class="customcardheader d-flex align-items-center" style="display:flex;align:center;">
                                            <p  class="w-100 dynamic_font_header1">Miscellaneous Products</p>
                                            <button type="button" class="btn btn-outline-dark alluserbtn adduserbtn position-relative dynamic_font_size" style='top:0!important;right:67!important;' id="addMisceleneous">Add
                                              <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                              </svg>
                                           </button>

                                           <button type="button" class="adduserbtn bckbtn btn-backWrapper" id="BACK44" style="max-height:38px;"><img src="http://localhost/POS/a2zpos-web/assets/images/Vector (11).png" alt="">
                                            </button>
                                     </div>

                                     <div class="customcardbody2 ">
                                       <table class="table table-striped" id="tbl_miscellaneous">
                                         <thead>
                                             <tr >
                                                 <th class="dynamic_font_size" style="color:#000;font-weight:bold;">#</th>
                                                 <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Product Name</th>
                                                 <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Price</th>
                                                 <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Date</th>
                                                 <th class="dynamic_font_size" style="text-align: start;color:#000;font-weight:bold;">Action</th>
                                             </tr>
                                         </thead>
                                           <tbody>
                                             <?php $i=1; if(!empty($miscellaneous)){ foreach ($miscellaneous as $m) { ?>
                                              <tr>
                                               <td class="dynamic_font_size"><?=$i?></td>
                                               <td class="dynamic_font_size"><?=$m['product_name']?></td>
                                               <td class="dynamic_font_size"><?='$ '.$m['product_price']?></td>

                                               <td class="dynamic_font_size"><?=date('m-d-Y',strtotime($m['created_date']))?></td>
                                               <td class="dynamic_font_size" style="text-align: start;">
                                                       <button type="button" class="btn btn-outline-dark alluserbtn EDIT_MIS dynamic_font_size" id="editMislenius" data-id="<?php echo $m['id'];?>" >Edit
                                                         <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <g clip-path="url(#clip0)">
                                                         <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                         </g>
                                                         <defs>
                                                         <clipPath id="clip0">
                                                         <rect width="21" height="21" fill="white"/>
                                                         </clipPath>
                                                         </defs>
                                                         </svg>
                                                       </button>

                                                   <button type="button" data-id="<?php echo $m['id'];?>" class="btn btn-outline-dark alluserbtn deleteRecord dynamic_font_size">Delete
                                                       <svg class="delete" width="22" height="16"
                                                           viewBox="0 0 14 18" fill="none"
                                                           xmlns="http://www.w3.org/2000/svg">
                                                           <path
                                                               d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                       </svg>
                                                   </button>
                                               </td>
                                           </tr>
                                           <!-- tr -->

                                          <?php $i++; } } ?>
                                           </tbody>
                                         </table>
                                     </div>

                                    </div>
                                  </div>
                                </div>

                              </div>
                    </div>


                  </div>

                  <div class="toggle_div" id="div_custom_cat_product" style="display: none;">
                    <div class=" container-fluid POINTS9">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="customcard">
                                    <div >
                                      <div class="customcardheader d-flex align-items-center" style="display:flex;align:center;">
                                            <p  class="w-100 dynamic_font_header1" >Custom Category Products <span class="cat_cust_name"></span></p>
                                            <button type="button" class="btn btn-outline-dark alluserbtn adduserbtn position-relative dynamic_font_size" style='top:0!important;right:67!important;' id="addCustomCatProduct">Add
                                              <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                              </svg>
                                           </button>

                                           <button type="button" class="adduserbtn bckbtn btn-backWrapper" id="BACK45" style="max-height:38px;"><img src="http://localhost/POS/a2zpos-web/assets/images/Vector (11).png" alt="">
                                            </button>
                                     </div>
                                     <input type="hidden" id="hide_custom_cat_id" value="">
                                     <input type="hidden" id="hide_custom_cat" value="">
                                     <div class="customcardbody2 ">
                                       <table class="table table-striped" id="tbl_custom_cat_product">
                                         <thead>
                                             <tr>

                                                 <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Product Name</th>
                                                 <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Price</th>
                                                 <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Container Deposit</th>
                                                 <th class="dynamic_font_size" style="color:#000;font-weight:bold;">Taxable</th>
                                                 <th class="dynamic_font_size" style="color:#000;font-weight:bold;">EBT</th>
                                                 <th class="dynamic_font_size" style="text-align: start;color:#000;font-weight:bold;">Action</th>
                                             </tr>
                                         </thead>
                                           <tbody id="upos"></tbody>
                                         </table>
                                     </div>

                                    </div>
                                  </div>
                                </div>

                              </div>
                    </div>


                  </div>

                      <div class="toggle_div" id="div_roles" style="display: none;">
                        <div class=" container-fluid ROLES1">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="customcard">
                                        <div >
                                          <div class="customcardheader d-flex align-items-center" style="display:flex;align:center;">
                                                <p  class="w-100 dynamic_font_header1">All Roles</p>
                                                <button type="button" class="btn btn-outline-dark alluserbtn adduserbtn position-relative dynamic_font_size" style='top:0!important;right:0!important;' id="add_roles">Add
                                                  <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                                  </svg>
                                               </button>
                                         </div>
                                         <div class="customcardbody2 ">
                                           <table class="table table-striped" id="tbl_role">
                                               <thead>
                                                 <tr>
                                                   <th scope="col" class="dynamic_font_size" style="color:#000;font-weight:bold;">Roles</th>
                                                   <th class="dynamic_font_size" style="text-align: start;color:#000;font-weight:bold;" scope="col">Action</th>
                                                 </tr>
                                               </thead>
                                               <tbody>
                                                 <?php $i=1; if(!empty($front_role)){ foreach($front_role as $r){?>
                                                 <tr>
                                                   <td class="dynamic_font_size"><?=$r['role_name']?></td>

                                                   <td  style="text-align: start;">

                                                       <button type="button" class="btn btn-outline-dark alluserbtn EDIT_ROLE dynamic_font_size" data-id="<?php echo $r['id'];?>">Edit
                                                         <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <g clip-path="url(#clip0)">
                                                         <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                         </g>
                                                         <defs>
                                                         <clipPath id="clip0">
                                                         <rect width="21" height="21" fill="white"/>
                                                         </clipPath>
                                                         </defs>
                                                         </svg>
                                                       </button>

                                                       <button data-id="<?php echo $r['id'];?>" data-name="<?=$r['role_name']?>" type="button" class="btn btn-outline-dark alluserbtn deleteRecord dynamic_font_size" >Delete
                                                         <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                         </svg>
                                                         </button>
                                                     </td>
                                                 </tr>
                                                 <?php } } ?>


                                               </tbody>
                                             </table>
                                         </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                        </div>

                        <form action="" method="post" class="add_role" autocomplete="off" style="display:none;">
                           <!-- cardheader -->
                           <div class="customcardheader">
                                           <p>Add New Role</p>
                                           <button type="button" class="adduserbtn bckbtn btn-backWrapper" id="BACK6" style="max-height:38px;"><img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                                                </button>
                                  </div>

                                  <div class="customcardbody ">
                                    <div class="container mb25">
               <!--                      <p class="formheader">Basic Information</p>-->
                                        <div class="row">
                                           <div class="col-md-12">
                                               <div class="form-group">
                                                 <label class="customcardlabel" for="">Role</label>
                                                 <input type="text" class="form-control customcardinput use-keyboard-input" id="rolename" name="role_name" aria-describedby="" placeholder="Please enter Role Name" >
                                                 <span class="errors" id="rolename_err" style="color:red; font-size:14px"></span>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                    <!-- container -->
                                    <div class="container  mb25">
                                     <p class="formheader dynamic_font_size">Permissions</p>
                                       <ul id="myUL1">
                                           <li><span class="caret1"><label class="customcardlabel">Ring Sales</label></span>
                                                   <input type="checkbox" class="pos_check ml-3" name="all">
                                                   <label class="customcardlabel mr-2">All</label>
                                               <ul class="nested1 ml-5" id="POS_add">
                                                   <!-- <li><input type="checkbox" class="check" name="pos_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Shift Report</label></li> -->
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Custom Price</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="C">
                                                   <label class="customcardlabel mr-2">Print Receipt</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="D">
                                                   <label class="customcardlabel mr-2">Coupon</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="E">
                                                   <label class="customcardlabel mr-2">Cash Drop</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="F">
                                                   <label class="customcardlabel mr-2">Refund</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="G">
                                                   <label class="customcardlabel mr-2">Payout</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="H">
                                                   <label class="customcardlabel mr-2">Add Custom Product</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="I">
                                                   <label class="customcardlabel">Price Override</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="J">
                                                   <label class="customcardlabel">Discount</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL1">
                                           <li><span class="caret1"><label class="customcardlabel">Reports</label></span>
                                                   <input type="checkbox" class="report_check ml-3" name="all">
                                                   <label class="customcardlabel mr-2">All</label>
                                               <ul class="nested1 ml-5" id="REPORTS_add">
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Shift Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Sales Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="C">
                                                   <label class="customcardlabel mr-2">Reconciliation Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="D">
                                                   <label class="customcardlabel">Payout Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="E">
                                                   <label class="customcardlabel mr-2">Timesheet Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="F">
                                                   <label class="customcardlabel mr-2">Card Transaction Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="G">
                                                   <label class="customcardlabel">Audit Log Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="H">
                                                   <label class="customcardlabel">Scratcher Sales Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="I">
                                                   <label class="customcardlabel">Inventory Report</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL1">
                                           <li><span class="caret1"><label class="customcardlabel">Inventory</label></span>
                                                   <input type="checkbox" class="inventory_check ml-3" name="all">
                                                   <label class="customcardlabel mr-2">All</label>
                                               <ul class="nested1 ml-5" id="INVENTORY_add">
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Add Product</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Update Product</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="C">
                                                   <label class="customcardlabel">Delete Product</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="D">
                                                   <label class="customcardlabel mr-2">Add Supplier</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="E">
                                                   <label class="customcardlabel mr-2">Update Supplier</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="F">
                                                   <label class="customcardlabel">Delete Supplier</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="G">
                                                   <label class="customcardlabel mr-2">Add Scratcher</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="H">
                                                   <label class="customcardlabel mr-2">Update Scratcher</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="I">
                                                   <label class="customcardlabel">Delete Scratcher</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="J">
                                                   <label class="customcardlabel mr-2">Update Custom Product</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="K">
                                                   <label class="customcardlabel mr-2">Delete Custom Product</label></li>
                                                   <li><input type="checkbox" class="check2" name="inventory_rights[]" value="L">
                                                   <label class="customcardlabel">Product-Upc Label</label></li>
                                               </ul>
                                           </li>
                                       </ul>

                                       <ul id="myUL1">
                                           <li><span class="caret1"><label class="customcardlabel">Customer/Loyalty</label></span>
                                               <input type="checkbox" class="loyalty_check ml-3" name="all">
                                               <label class="customcardlabel mr-2">All</label>
                                               <ul class="nested1 ml-5" id="LOYALTY_add">
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Add Customer</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Update Customer</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="C">
                                                   <label class="customcardlabel mr-2">Delete Customer</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="D">
                                                   <label class="customcardlabel mr-2">Create Coupon</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="E">
                                                   <label class="customcardlabel mr-2">Edit Coupon</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="F">
                                                   <label class="customcardlabel mr-2">Delete Coupon</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="G">
                                                   <label class="customcardlabel mr-2">Create Promotion</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="H">
                                                   <label class="customcardlabel mr-2">Edit Promotion</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="I">
                                                   <label class="customcardlabel">Delete Promotion</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL1">
                                           <li><span class="caret1"><label class="customcardlabel">Store Function</label></span>
                                               <input type="checkbox" class="coupon_check ml-3" name="all">
                                               <label class="customcardlabel mr-2">All</label>
                                               <ul class="nested1 ml-5" id="COUPON_add">
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Custom Key Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Employees</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="C">
                                                   <label class="customcardlabel mr-2">General Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="D">
                                                   <label class="customcardlabel">Label Editor</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="E">
                                                   <label class="customcardlabel">Roles</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="F">
                                                   <label class="customcardlabel">POS Categories</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="G">
                                                   <label class="customcardlabel">Payroll Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="H">
                                                   <label class="customcardlabel">Tax Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="I">
                                                   <label class="customcardlabel">Cash Advance Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="J">
                                                   <label class="customcardlabel">Discount Settings</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL1">
                                           <li><span class="caret1"><label class="customcardlabel">HRMS</label></span>
                                               <input type="checkbox" class="hrms_check ml-3" name="all">
                                               <label class="customcardlabel mr-2">All</label>
                                               <ul class="nested1 ml-5" id="HRMS_add">
                                                   <li><input type="checkbox" class="check5" name="hrms_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">View Leave Requests</label></li>
                                                   <li><input type="checkbox" class="check5" name="hrms_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">View Cash Advance Requests</label></li>
                                                   <li><input type="checkbox" class="check5" name="hrms_rights[]" value="C">
                                                   <label class="customcardlabel">New Leave Request</label></li>
                                                   <li><input type="checkbox" class="check5" name="hrms_rights[]" value="D">
                                                   <label class="customcardlabel">New Cash Advance Request</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL1">
                                           <li><span class="caret1"><label class="customcardlabel">Submit Timecard</label></span>
                                               <input type="checkbox" class="timecard_check ml-3" name="all">
                                               <label class="customcardlabel mr-2">All</label>
                                               <ul class="nested1 ml-5" id="TIMECARD_add">
                                                   <li><input type="checkbox" class="check6" name="submit_timecard_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Timesheet</label></li>
                                                   <li><input type="checkbox" class="check6" name="submit_timecard_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Report</label></li>
                                                   <!-- <li><input type="checkbox" class="check" name="submit_timecard_rights[]" value="C">
                                                   <label class="customcardlabel">Cash Advance Request</label></li> -->
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL1">
                                           <li><span class="caret1"><label class="customcardlabel">E-Order</label></span>
                                               <input type="checkbox" class="eorder-check ml-3" name="e_order_rights" value="A">
                                               <label class="customcardlabel mr-2">All</label>
               <!--                                <ul class="nested ml-5">
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Leave Approved</label>
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Request Leave</label>
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="C">
                                                   <label class="customcardlabel">Cash Advance Request</label>
                                               </ul>                            -->
                                           </li>
                                       </ul>
                                       <ul id="myUL1">
                                           <li><span class="caret1"><label class="customcardlabel">Market Place</label></span>
                                               <input type="checkbox" class="market-check ml-3" name="market_place_rights" value="A">
                                               <label class="customcardlabel mr-2">All</label>
               <!--                                <ul class="nested ml-5">
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Leave Approved</label>
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Request Leave</label>
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="C">
                                                   <label class="customcardlabel">Cash Advance Request</label>
                                               </ul>                            -->
                                           </li>
                                       </ul>
                                       <span class="errors" id="check_err" style="color:red; font-size:14px"></span>
                                      </div>

                                  </div>



                           <!-- cardbody -->
                           <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('cashier/settings?d=role')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btnRole">Save</button>
                              </div>
                           </div>
                        </form>
                        <form action="" method="post" class="update_role" autocomplete="off" style="display:none;">
                                   <!-- cardheader -->
                                   <div class="customcardheader">
                                        <p>Update Role</p>
                                        <button type="button" class="adduserbtn bckbtn btn-backWrapper" id="BACK7" style="max-height:38px;"><img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                                                </button>
                                  </div>
                                  <input type="hidden" name="Role_id" value="" id="RoleID">
                                  <div class="customcardbody ">
                                    <div class="container mb25">
               <!--                      <p class="formheader">Basic Information</p>-->
                                        <div class="row">
                                           <div class="col-md-12">
                                               <div class="form-group">
                                                 <label class="customcardlabel" for="">Role</label>
                                                 <input type="text" class="form-control customcardinput use-keyboard-input" id="editrole" name="role_name" value="" aria-describedby="" readonly >
                                                 <span class="errors" id="erole_err" style="color:red; font-size:14px"></span>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                    <!-- container -->
                                   <div class="container  mb25">
                                     <p class="formheader">Permissions</p>
                                       <ul id="myUL">
                                           <li><span class="caret2"><label class="customcardlabel">Ring Sales</label></span>
                                                   <input type="checkbox" class="pos_check ml-3" name="all" id="POS2">
                                                   <label class="customcardlabel mr-2">All</label>
                                                   <!-- remove active3c insidenested2lass -->
                                               <ul class="nested2 ml-5 " id="POS">
                                                   <!-- <li><input type="checkbox" class="check" name="pos_rights[]" value="A" id="posA">
                                                   <label class="customcardlabel mr-2">Shift Report</label></li> -->
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="B" id="posB">
                                                   <label class="customcardlabel mr-2">Custom Price</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="C" id="posC">
                                                   <label class="customcardlabel mr-2">Print Receipt</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="D" id="posD">
                                                   <label class="customcardlabel mr-2">Coupon</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="E" id="posE">
                                                   <label class="customcardlabel mr-2">Cash Drop</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="F" id="posF">
                                                   <label class="customcardlabel">Refund</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="G" id="posG">
                                                   <label class="customcardlabel">Payout</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="H" id="posH">
                                                   <label class="customcardlabel">Add Custom Product</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="I" id="posI">
                                                   <label class="customcardlabel">Price Override</label></li>
                                                   <li><input type="checkbox" class="check" name="pos_rights[]" value="J" id="posJ">
                                                   <label class="customcardlabel">Discount</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL">
                                           <li><span class="caret2"><label class="customcardlabel">Reports</label></span>
                                                   <input type="checkbox" class="report_check ml-3" name="all" id="REPORTS2">
                                                   <label class="customcardlabel mr-2">All</label>
                                                    <!-- remove active3c insidenested2lass -->
                                               <ul class="nested2 ml-5 " id="REPORTS">
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="A" id="retA">
                                                   <label class="customcardlabel mr-2">Shift Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="B" id="retB">
                                                   <label class="customcardlabel mr-2">Sales Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="C" id="retC">
                                                   <label class="customcardlabel mr-2">Reconciliation Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="D" id="retD">
                                                   <label class="customcardlabel mr-2">Payout Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="E" id="retE">
                                                   <label class="customcardlabel mr-2">Timesheet Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="F" id="retF">
                                                   <label class="customcardlabel">Card Transaction Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="G" id="retG">
                                                   <label class="customcardlabel mr-2">Audit Log Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="H" id="retH">
                                                   <label class="customcardlabel">Scratcher Sales Report</label></li>
                                                   <li><input type="checkbox" class="check1" name="reports_rights[]" value="I" id="retI">
                                                   <label class="customcardlabel">Inventory Report</label></li>
                                               </ul>
                                           </li>
                                       </ul>

                                       <ul id="myUL">
                                           <li><span class="caret2"><label class="customcardlabel">Inventory</label></span>
                                                   <input type="checkbox" class="inventory_check ml-3" name="all" id="INVENTORY2">
                                                   <label class="customcardlabel mr-2">All</label>
                                                    <!-- remove active3c insidenested2lass -->
                                                   <ul class="nested2 ml-5 " id="INVENTORY">
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="A" id="invA">
                                                       <label class="customcardlabel mr-2">Add Product</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="B" id="invB">
                                                       <label class="customcardlabel mr-2">Update Product</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="C" id="invC">
                                                       <label class="customcardlabel">Delete Product</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="D" id="invD">
                                                       <label class="customcardlabel mr-2">Add Supplier</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="E" id="invE">
                                                       <label class="customcardlabel mr-2">Update Supplier</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="F" id="invF">
                                                       <label class="customcardlabel">Delete Supplier</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="G" id="invG">
                                                       <label class="customcardlabel mr-2">Add Scratcher</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="H" id="invH">
                                                       <label class="customcardlabel mr-2">Update Scratcher</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="I" id="invI">
                                                       <label class="customcardlabel">Delete Scratcher</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="J" id="invJ">
                                                       <label class="customcardlabel mr-2">Update Custom Product</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="K" id="invK">
                                                       <label class="customcardlabel mr-2">Delete Custom Product</label></li>
                                                       <li><input type="checkbox" class="check2" name="inventory_rights[]" value="L" id="invL">
                                                       <label class="customcardlabel">Product-Upc Label</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL">
                                           <li><span class="caret2"><label class="customcardlabel">Customer/Loyalty</label></span>
                                               <input type="checkbox" class="loyalty_check ml-3" name="all" id="LOYALTY2">
                                               <label class="customcardlabel mr-2">All</label>
                                                <!-- remove active3c insidenested2lass -->
                                               <ul class="nested2 ml-5 " id="LOYALTY">
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="A" id="loyA">
                                                   <label class="customcardlabel mr-2">Add Customer</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="B" id="loyB">
                                                   <label class="customcardlabel mr-2">Update Customer</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="C" id="loyC">
                                                   <label class="customcardlabel mr-2">Delete Customer</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="D" id="loyD">
                                                   <label class="customcardlabel mr-2">Create Coupon</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="E" id="loyE">
                                                   <label class="customcardlabel mr-2">Edit Coupon</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="F" id="loyF">
                                                   <label class="customcardlabel mr-2">Delete Coupon</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="G" id="loyG">
                                                   <label class="customcardlabel mr-2">Create Promotion</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="H" id="loyH">
                                                   <label class="customcardlabel mr-2">Edit Promotion</label></li>
                                                   <li><input type="checkbox" class="check3" name="loyalty_rights[]" value="I" id="loyI">
                                                   <label class="customcardlabel">Delete Promotion</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL">
                                           <li><span class="caret2"><label class="customcardlabel">POS Settings</label></span>
                                               <input type="checkbox" class="coupon_check ml-3" name="all" id="COUPON2">
                                               <label class="customcardlabel mr-2">All</label>
                                                <!-- remove active3c insidenested2lass -->
                                               <ul class="nested2 ml-5" id="COUPON">
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="A" id="stoA">
                                                   <label class="customcardlabel mr-2">Custom Key Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="B" id="stoB">
                                                   <label class="customcardlabel mr-2">Employees</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="C" id="stoC">
                                                   <label class="customcardlabel mr-2">General Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="D" id="stoD">
                                                   <label class="customcardlabel">Label Editor</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="E" id="stoE">
                                                   <label class="customcardlabel">POS Categories</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="F" id="stoF">
                                                   <label class="customcardlabel">Roles</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="G" id="stoG">
                                                   <label class="customcardlabel">Payroll Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="H" id="stoH">
                                                   <label class="customcardlabel">Tax Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="I" id="stoI">
                                                   <label class="customcardlabel">Cash Advance Settings</label></li>
                                                   <li><input type="checkbox" class="check4" name="store_rights[]" value="J" id="stoJ">
                                                   <label class="customcardlabel">Discount Settings</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL">
                                           <li><span class="caret2"><label class="customcardlabel">HRMS</label></span>
                                               <input type="checkbox" class="hrms_check ml-3" name="all" id="HRMS2">
                                               <label class="customcardlabel mr-2">All</label>
                                                <!-- remove active3c insidenested2lass -->
                                               <ul class="nested2 ml-5" id="HRMS">
                                                   <li><input type="checkbox" class="check5" name="hrms_rights[]" value="A" id="hrmA">
                                                   <label class="customcardlabel mr-2">View Leave Requests</label></li>
                                                   <li><input type="checkbox" class="check5" name="hrms_rights[]" value="B" id="hrmB">
                                                   <label class="customcardlabel mr-2">View Cash Advance Requests</label></li>
                                                   <li><input type="checkbox" class="check5" name="hrms_rights[]" value="C" id="hrmC">
                                                   <label class="customcardlabel">New Leave Request</label></li>
                                                   <li><input type="checkbox" class="check5" name="hrms_rights[]" value="D" id="hrmD">
                                                   <label class="customcardlabel">New Cash Advance Request</label></li>
                                               </ul>
                                           </li>
                                       </ul>
                                       <ul id="myUL">
                                           <li><span class="caret2"><label class="customcardlabel">Submit Timecard</label></span>
                                               <input type="checkbox" class="timecard_check ml-3" name="all" id="TIMECARD2">
                                               <label class="customcardlabel mr-2">All</label>
                                                <!-- remove active3c insidenested2lass -->
                                               <ul class="nested2 ml-5" id="TIMECARD">
                                                   <li><input type="checkbox" class="check6" name="submit_timecard_rights[]" value="A" id="timA">
                                                   <label class="customcardlabel mr-2">Timesheet</label></li>
                                                   <li><input type="checkbox" class="check6" name="submit_timecard_rights[]" value="B" id="timB">
                                                   <label class="customcardlabel mr-2">Report</label></li>
                                                   <!-- <li><input type="checkbox" class="check" name="hrms_rights[]" value="C">
                                                   <label class="customcardlabel">Cash Advance Request</label></li> -->
                                               </ul>
                                           </li>
                                       </ul>
                                       <?php $arr2 = isset($roledata[0]->e_order_rights) ? explode(',',$roledata[0]->e_order_rights) : ''; ?>
                                       <ul id="myUL">
                                           <li><span class="caret2"><label class="customcardlabel">E-Order</label></span>
                                               <input type="checkbox" class="eorder-check ml-3" name="e_order_rights" value="A" id="erdA">
                                               <label class="customcardlabel mr-2">All</label>
               <!--                                <ul class="nested ml-5 active">
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Leave Approved</label>
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Request Leave</label>
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="C">
                                                   <label class="customcardlabel">Cash Advance Request</label>
                                               </ul>                            -->
                                           </li>
                                       </ul>
                                       <ul id="myUL">
                                           <li><span class="caret2"><label class="customcardlabel">Market Place</label></span>
                                               <input type="checkbox" class="market-check ml-3" name="market_place_rights" value="A" id="marA">
                                               <label class="customcardlabel mr-2">All</label>
               <!--                                <ul class="nested ml-5 active">
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="A">
                                                   <label class="customcardlabel mr-2">Leave Approved</label>
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="B">
                                                   <label class="customcardlabel mr-2">Request Leave</label>
                                                   <input type="checkbox" class="check" name="hrms_rights[]" value="C">
                                                   <label class="customcardlabel">Cash Advance Request</label>
                                               </ul>                            -->
                                           </li>
                                       </ul>
                                      </div>

                                  </div>

                                   <!-- cardbody -->
                                   <div class="customcardfooter">
                                      <div style="text-align: center;">
                                          <a href="<?=base_url('cashier/settings?d=role')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                          <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnUpdateRole">Save</button>
                                      </div>
                                   </div>
                                </form>


                      </div>

                      <div class="toggle_div" id="div_node_settings" style="display: none;">

                        <div class="customcardbody ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="formheader dynamic_font_header1" style="color:#2d7f61;">Node Setting</p>
                                        <div class="form-group row">
                                            <label for="pay_date" class="col-sm-3 col-form-label custom_label dynamic_font_size">Node Service <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <select name="node_status" class="form-control dynamic_font_size" id="node_status">
                                                    <option value="1" class="" <?php echo ($fontsize->node_status == 1) ? "selected" : ""; ?>>Active</option>
                                                    <option value="0" class="" <?php echo ($fontsize->node_status == 0) ? "selected" : ""; ?>>Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                          <!-- <button type="submit" class="btn btn-primary customcardfooteraddbtn mt-3" id="btnFont">Submit</button> -->
                                    </div>
                                </div>

                        </div>
                        <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btnNode">Save</button>
                              </div>
                        </div>

                      </div>

                      <div class="toggle_div" id="div_font_settings" style="display: none;">
                        <form action="" method="post" class="add_fontsize" autocomplete="off">
                          <div class="customcardbody ">

                                  <div class="row">
                                      <div class="col-md-12">
                                          <p class="formheader" style="font-size:18px;color:#2d7f61;">Font Size</p>
                                          <div class="row" style='padding-left: 15px;padding-bottom:15px;'>
                                            <span >10&nbsp;&nbsp;</span>
                                            <input id="multi" name="font_size" class="multi-range" type="range" min="10" max="20" value="<?=$fontsize->font_size?>" onchange="updateTextInput(this.value);" />
                                            <span>&nbsp;&nbsp;&nbsp;</span>  <span id="demo"><?=$fontsize->font_size?></span>
                                        </div>
                                      </div>
                                  </div>

                          </div>
                          <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnFont">Save</button>
                              </div>
                          </div>
                          </form>
                      </div>

                      <div class="toggle_div" id="div_system_settings" style="display: none;">
                        <form action="" method="post" class="add_payroll" autocomplete="off">
                          <div class="customcardbody ">

                                  <div class="row">
                                      <div class="col-md-12">
                                          <!-- <label>Font Size</label> <br> -->
                                          <p class="formheader customcardheader dynamic_font_header1" style="color:#2d7f61;">Payroll Settings</p>
                                          <div class="form-group row">
                                              <label for="pay_period" class="col-sm-3 col-form-label custom_label dynamic_font_size">Pay Period<i class="text-danger">*</i></label>
                                              <div class="col-sm-6">

                                                  <input type="radio" name="pay_period" value="1" <?php echo ($setting_detail['pay_period'] == 1) ? "checked" : ""; ?> /> Weekly
                                                  <input type="radio" name="pay_period" class="ml-2" value="2" <?php echo ($setting_detail['pay_period'] == 2) ? "checked" : ""; ?> /> Bi-Weekly
                                                  <input type="radio" name="pay_period" class="ml-2" value="3" <?php echo ($setting_detail['pay_period'] == 3) ? "checked" : ""; ?> /> Twice-a-month
                                                  <input type="radio" name="pay_period" class="ml-2" value="4" <?php echo ($setting_detail['pay_period'] == 4) ? "checked" : ""; ?> /> Monthly

                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="pay_date" class="col-sm-3 col-form-label custom_label dynamic_font_size">Pay Day<i class="text-danger">*</i></label>
                                              <div class="col-sm-6">
                                                  <select name="pay_date" class="form-control dynamic_font_size" id="pay_date">
                                                      <option value="" class="weeksmonths" >--Select--</option>
                                                      <option value="1" class="weeks" <?php echo ($setting_detail['pay_date'] == '1') ? "selected" : ""; ?>>Same Day</option>
                                                      <option value="2" class="weeks" <?php echo ($setting_detail['pay_date'] == '2') ? "selected" : ""; ?>>Next Day</option>
                                                      <option value="3" class="weeks" <?php echo ($setting_detail['pay_date'] == '3') ? "selected" : ""; ?>>Next Business Day</option>
                                                      <option value="4" class="months" <?php echo ($setting_detail['pay_date'] == '4') ? "selected" : ""; ?>>Last Working Day</option>
                                                      <option value="5" class="months" <?php echo ($setting_detail['pay_date'] == '5') ? "selected" : ""; ?>>Last Business Day</option>
                                                      <option value="6" class="months" <?php echo ($setting_detail['pay_date'] == '6') ? "selected" : ""; ?>>Last Calendar Day</option>
                                                      <option value="7" class="months" <?php echo ($setting_detail['pay_date'] == '7') ? "selected" : ""; ?>>First Working Day of Next Month</option>
                                                      <option value="8" class="months" <?php echo ($setting_detail['pay_date'] == '8') ? "selected" : ""; ?>>First Business Day of Next Month</option>
                                                      <option value="9" class="months" <?php echo ($setting_detail['pay_date'] == '9') ? "selected" : ""; ?>>First Calendar Day of Next Month</option>
                                                  </select>
                                                  <span class="errors dynamic_font_size_err" id="paydt_err" style="color:red;"></span>
                                              </div>
                                          </div>
                                            <!-- <button type="submit" class="btn btn-primary customcardfooteraddbtn mt-3" id="btnFont">Submit</button> -->
                                      </div>
                                  </div>

                          </div>
                          <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btnPayroll">Save</button>
                              </div>
                          </div>
                          </form>
                      </div>

                      <div class="toggle_div" id="div_cashadv_settings" style="display: none;">
                          <form action="" method="post" class="add_fontsize" autocomplete="off">
                          <div class="customcardbody ">

                                  <div class="row">
                                      <div class="col-md-12">
                                          <p class="formheader customcardheader dynamic_font_header1" style="color:#2d7f61;">Cash Advance Settings</p>
                                          <div class="row">
                                              <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label class="custom_label dynamic_font_size" style="color:#000 !important;">Max amount for Cash Advance <span style="color:#FF0000;">*</span></label>
                                                       <div class="position-relative">
                                                           <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                         <input type="tel" name="paycheck_amount" class="form-control customcardinput usefloathere use-keyboard-input-num dynamic_font_size" id="paycheck_amount" aria-describedby="" placeholder="Enter Amount" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?=$fontsize->paycheck_amount?>" maxlength="6" style="padding-left:0.9em;">
                                                       </div>
                                                       <p class="errors dynamic_font_size_err" id="payamt_err" style="color:red;margin-bottom:0;"></p>
                                                     </div>
                                              </div>
                                              <div class="col-md-6" style="display: flex;flex-direction: column;justify-content: space-between;">
                                               <div class="form-group">
                                                   <label class="custom_label dynamic_font_size" for="exampleFormControlSelect1" >Max % of paycheck for Cash Advance</label>
                                                   <label class=" text-secondary dynamic_font_size_err" >(In %)</label>
                                                       <div class="probar mt-2">
                                                              <input id="rangeInput" type="range" min="0" max="99" oninput="amount.value=rangeInput.value" class="scr" value="0" />
                                                              <input id="amount" onClick="this.select();" type="tel" value="" min="0" class="pronum maxpaycheck use-keyboard-input-num" max="99" maxlength="2" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput.value=amount.value" />
                                                              <span class="prefix2">%</span>
                                                       </div>
                                                   </div>
                                                  <p class="errors dynamic_font_size_err" id="profit_err" style="color:red; font-size:14px;margin-bottom:0;"></p>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label  class="custom_label customcardlabel dynamic_font_size" style="color:#000 !important;">Max no. of paychecks to deduct Cash Advance amount <span style="color:#FF0000;">*</span></label>
                                                       <input type="tel" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" id="paychecks" name="paychecks" aria-describedby="" placeholder="Enter Number of Paycheck"maxlength="2" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?=$fontsize->no_of_paychecks?>">
                                                       <span class="errors dynamic_font_size_err" id="pay_err" style="color:red;"></span>
                                                   </div>
                                              </div>
                                          </div>
                                            <!-- <button type="submit" class="btn btn-primary customcardfooteraddbtn mt-3" id="btncashADV">Save</button> -->
                                      </div>
                                  </div>

                          </div>
                          <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn dynamic_font_size" id="btncashADV">Save</button>
                                </div>
                          </div>
                          </form>
                      </div>

                      <div class="toggle_div" id="div_cashreg_settings" style="display: none;">
                          <form action="" method="post" class="add_cashreg" autocomplete="off">
                          <div class="customcardbody ">

                                  <div class="row">
                                      <div class="col-md-12">
                                          <p class="formheader customcardheader dynamic_font_header1"style="color:#2d7f61;">Cash Register Settings</p>
                                          <div class="row">
                                              <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label class="custom_label dynamic_font_size" style="color:#000 !important;">Start Cash <span style="color:#FF0000;">*</span></label>
                                                       <div class="position-relative">
                                                           <span class="position-absolute dynamic_font_size" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                         <input type="tel" name="start_cash" class="form-control customcardinput validate1 use-keyboard-input-num dynamic_font_size" id="start_cash" aria-describedby="" placeholder="Enter Amount" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  maxlength="10"  value="<?=$fontsize->start_cash?>">
                                                       </div>
                                                       <p class="errors dynamic_font_size_err" id="start_err" style="color:red; font-size:14px;margin-bottom:0;"></p>
                                                     </div>
                                              </div>
                                              <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label class="custom_label dynamic_font_size" style="color:#000 !important;">Cash Drop Threshold Value <span style="color:#FF0000;">*</span></label>
                                                       <div class="position-relative">
                                                           <span class="position-absolute dynamic_font_size" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                         <input type="tel" name="cash_register" class="form-control customcardinput validate1 use-keyboard-input-num dynamic_font_size" id="cash_register" aria-describedby="" placeholder="Enter Amount" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?=$fontsize->cash_register?>" maxlength="10">

                                                       </div>
                                                       <p class="errors dynamic_font_size_err" id="cash_reg_err" style="color:red;margin-bottom:0;"></p>
                                                     </div>
                                              </div>
                                              <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label class="custom_label dynamic_font_size" style="color:#000 !important;">Cashback Fee <span style="color:#FF0000;">*</span></label>
                                                       <div class="position-relative">
                                                           <span class="position-absolute dynamic_font_size" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                         <input type="tel" name="cashback_fee" class="form-control customcardinput validate1 use-keyboard-input-num dynamic_font_size" id="cashback_fee" aria-describedby="" placeholder="Enter Amount" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?=$fontsize->cashback_fee?>" maxlength="10">
                                                       </div>
                                                       <p class="errors dynamic_font_size_err" id="cash_back_err" style="color:red; font-size:14px;margin-bottom:0;"></p>
                                                     </div>
                                              </div>
                                              <!-- <div class="col-md-6" style="display: flex;flex-direction: column;justify-content: space-between;">
                                               <div class="form-group">
                                                   <label for="exampleFormControlSelect1" style="color: red;">Max % of paycheck for Cash Advance</label>
                                                   <label class=" text-secondary" style="font-size:10px;">(In %)</label>
                                                       <div class="probar">
                                                              <input id="rangeInput" type="range" min="0" max="99" oninput="amount.value=rangeInput.value" class="scr" value="0" />
                                                              <input id="amount" onClick="this.select();" type="tel" value="" min="0" class="pronum maxpaycheck" max="99" maxlength="2" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="padding-top:0px; border:0px;"oninput="rangeInput.value=amount.value" />
                                                              <span class="prefix2">%</span>
                                                       </div>
                                                   </div>
                                                  <p class="errors" id="profit_err" style="color:red; font-size:14px;margin-bottom:0;"></p>
                                              </div> -->
                                          </div>

                                            <!-- <button type="submit" class="btn btn-primary customcardfooteraddbtn mt-3" id="btncashReg">Submit</button> -->
                                      </div>
                                  </div>

                          </div>
                          <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn dynamic_font_size" id="btncashReg">Save</button>
                                </div>
                          </div>
                          </form>
                      </div>

                      <div class="toggle_div" id="div_scratcher_settings" style="display: none;">
                          <div class="customcardheader d-flex align-items-center" style="display:flex;align:center;">
                                <p  class="w-100 dynamic_font_header1">Scratcher Settings</p>
                                  <!-- <button type="button" class="btn btn-outline-dark alluserbtn" id="Archive1">Archive</button> -->
                         </div>
                           <form action="" method="post" class="add_cashreg" autocomplete="off">
                          <div class="customcardbody ">


                                  <div class="row">
                                      <div class="col-md-12">
                                          <!-- <p class="formheader">Scratcher Settings</p> -->
                                          <div class="row">
                                              <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label class="custom_label dynamic_font_size" style="color:#000 !important;">No. of Scratcher Bins<span style="color:#FF0000;">*</span></label>
                                                       <input type="tel" class="form-control customcardinput use-keyboard-input-num dynamic_font_size" id="bins1" name="bins" aria-describedby="" placeholder="Enter Number of Paycheck" maxlength="2" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?=COUNT($bins)?>">
                                                       <span class="errors dynamic_font_size_err" id="scratcher_err" style="color:red; font-size:14px"></span>
                                                   </div>
                                              </div>
                                          </div>
                                            <!-- <button type="submit" class="btn btn-primary customcardfooteraddbtn mt-3" id="btnScratcher">Submit</button> -->
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn dynamic_font_size" id="btnScratcher">Save</button>
                                </div>
                          </div>
                      </div>

                      <div class=" container-fluid Archive1" style="display:none;">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="customcard">
                                      <div >
                                        <div class="customcardheader">
                                              <p>Inactive Bins</p>
                                              <button type="button" class="btn btn-outline-dark alluserbtn adduserbtn" id="BACK22" style="display:none;">Back
                                              </button>
                                       </div>
                                       <div class="customcardbody2 ">
                                        <table class="table table-striped" id="inactive_table">
                                            <thead>
                                              <tr>
                                                <!-- <th scope="col">#</th> -->
                                                <th scope="col">Username</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php if(!empty($inactive)){ foreach ($inactive as $u) { ?>
                                              <tr>
                                                <!-- <td><?=$i?></td> -->
                                                <td><?=$u['username']?></td>
                                                <td><?=$u['first_name']?> <?=$u['last_name']?></td>
                                                <td><?=$u['role_name']?></td>
                                                <td><?=$u['email']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-dark alluserbtn changeStatus" data-id="<?php echo $u['user_id'];?>">Activate
                                                    </button>
                                                </td>
                                              </tr>
                                              <?php } } ?>

                                            </tbody>
                                          </table>
                                       </div>

                                      </div>
                                    </div>
                                  </div>

                                </div>
                      </div>


                      <div class="toggle_div" id="div_receipt_settings" style="display: none;">
                        <div class="">
                            <form action="" method="post" class="add_receipt" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="formheader customcardheader dynamic_font_header1" style="color:#2d7f61;">Receipt Promotions</p>
                                        <div class="customcardbody ">
                                        <table class="table table-striped" id="rcpt_table">
                                            <thead>
                                              <tr>
                                                <th class="dynamic_font_header2" scope="col" style="color:#000;font-weight:bold;">Receipt Promotion Message</th>
                                                <th class="dynamic_font_header2" scope="col" style="color:#000;font-weight:bold;text-align:start">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php if(!empty($receipt)){ foreach ($receipt as $r) { ?>
                                              <tr>
                                                <td class="dynamic_font_size"><?=$r['receipt_promotion']?></td>
                                                <td style="text-align:start">
                                                    <button type="button" class="btn btn-outline-dark alluserbtn delRcptPro dynamic_font_size" data-id="<?php echo $r['coupon_id'];?>" >Delete
                                                    </button>
                                                </td>
                                              </tr>
                                              <?php } } ?>
                                            </tbody>
                                          </table>
                                        <hr>
                                        <p class="formheader dynamic_font_header2" style="color:#000;font-weight:bold;padding-left:10px;">Custom Receipt Message</p>
                                        <div class="row" style='padding-left: 15px; padding-right: 20px;'>
                                        <div class="col-md-6">
                                        <input name="custom_msg" id="custom_msg1" class="form-control use-keyboard-input dynamic_font_size" type="text" placeholder="Enter custom receipt message" value="<?=$fontsize->custom_msg?>"/>
                                        </div>

                                        <div class="col-md-12">
                                        <div class="dropdown ctdrop my-4">
                                            <button style="width: 49%;" class="btn btn-secondary dropdown-toggle custmssgdrop dynamic_font_size" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--Select Custom Message--</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:49%;">
                                            <?php $msg= $this->Cashier_model->get_custom_msg();?>
                                            <?php foreach ($msg as $m){ ?>
                                            <a class="dropdown-item d-flex msgdrop dynamic_font_size" id='<?=$m['custom_receipt_msg']?>' href="#" onclick="setDropMssg(this.id)">

                                                <div name="custom_receipt_msg" value="<?=$m['custom_receipt_msg']?>"><?=$m['custom_receipt_msg']?></div>
                                            &nbsp;&nbsp;
                                                <button type="button" style="border: 0px outset #aaa;border-radius: 0px;outline:0;background:transparent;color:red;position:relative;z-index:500;" class="delmsg btn-danger">X</button>
                                            </a>
                                          <?php } ?>

                                            </div>
                                        </div></div>
                                        </div>
                                          <button type="button" class="btn btn-outline-dark mt-3 dynamic_font_size"  id="previewReciept" >Preview</button>
                                          <button type="submit" class="btn btn-primary customcardfooteraddbtn mt-3 pl-3 ml-2 pr-3 dynamic_font_size" id="btnReceipt">Submit</button>


                                        </div>
                                        </div>
                                </div>
                            </form>
                        </div>

                      </div>
                      <div class="toggle_div" id="div_tax" style="display: none;">
                        <form action="" method="post" class="add_tax" autocomplete="off">
                        <div class="customcardbody ">

                          <div class="row">
                            <div class=" d-flex align-items-center text-center" style="padding-left:1em;white-space:nowrap;padding-right:.5em;justify-content:center;">
                              <label class="custom_label dynamic_font_size" for="">Tax : </label>
                            </div>
                            <div class="col-md-2 p-0">
                              <input type="tel" class="form-control inputfiles use-keyboard-input-num dynamic_font_size" id="tax_other" name="tax_setting_others" onkeyup="this.value = get_float_value(this.value)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $tax->tax_setting_others; ?>">
                              <span class="errors dynamic_font_size_err" id="tax_err" style="color:red; font-size:14px"></span>
                              <span class="prefix2">%</span>
                            </div>

                          </div>
                          <!-- <div style="margin-top: 2%;padding-left:4.5em;">
                            <button type="submit" class="btn btn-primary customcardfooteraddbtn " id="btnTax">Save</button>
                          </div> -->

                        </div>
                        <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnTax">Save</button>
                              </div>
                        </div>
                        </form>
                      </div>

                      <div class="toggle_div" id="div_ccard" style="display: none;">
                        <form action="" method="post" class="add_ccard" autocomplete="off">
                        <div class="customcardbody ">


                          <div class="row">
                            <div class=" d-flex align-items-center text-center" style="padding-left:1em;white-space:nowrap;padding-right:.5em;justify-content:center;">
                              <label class="custom_label dynamic_font_size" for="">Fee type : </label>
                            </div>
                            <div class="col-md-5 p-0">
                               <input type="radio" name="credit_card_fees_type" value="0" <?php echo ($fontsize->credit_card_fees_type == 0)  ? "checked" : ""; ?> /> Amount
                               <input type="radio" name="credit_card_fees_type" value="1" <?php echo ($fontsize->credit_card_fees_type == 1) ? "checked" : ""; ?> /> percentage
                            </div>
                          </div>
                          <div class="row">
                            <div class=" d-flex align-items-center text-center" style="padding-left:1em;white-space:nowrap;padding-right:.5em;justify-content:center;">
                              <label class="custom_label dynamic_font_size" for="">Credit Card Fees : </label>
                            </div>
                            <div class="col-md-5 p-0">
                              <label id="credit_card_fees_type_sign" class="col-md-1" style="float: left;font-size: 20px;margin-right: 10px;"><?php echo ($fontsize->credit_card_fees_type == 0) ? "$" : "%"; ?></label>
                              <input type="tel" class="form-control inputfiles use-keyboard-input-num dynamic_font_size col-md-5" id="ccard_fees" name="credit_card_fees" onkeyup="this.value = get_float_value(this.value)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $fontsize->credit_card_fees; ?>">
                              <span class="errors dynamic_ccard_err" id="card_err" style="color:red; font-size:14px"></span>
                            </div>
                          </div>
                          <!-- <div style="margin-top: 2%;padding-left:4.5em;">
                            <button type="submit" class="btn btn-primary customcardfooteraddbtn " id="btnTax">Save</button>
                          </div> -->

                        </div>
                        <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnCard">Save</button>
                              </div>
                        </div>
                        </form>
                      </div>

                      <div class="toggle_div" id="div_editor" style="display: none;">
                        <div class="customcardbody ">
                            <!-- <form action="" method="post" class="" autocomplete="off"> -->
                                <div class="container p-0">
                                    <div class="row">
                                        <div class="customcardheader p-3 w-100">
                                            <p class="dynamic_font_header1">Label Editor</p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="template-viewcon w-100 p-2">
                                                <div class="controls-wrappper">
                                                  <input type='hidden' id="lbl_id" value="">
                                                  <div class="wrapped-content position-relative">
                                                    <h6 class='mt-2 mb-0 dynamic_font_size'>Select by Tag</h6>
                                                        <div class="sli-nav d-flex">
                                                            <div class="sli-chi sc1 dynamic_font_size active" id ='shelf_lbls'>
                                                             Shelf
                                                            </div>
                                                            <div class="sli-chi sc2 dynamic_font_size" id = 'pro_lbls'>
                                                             Product
                                                            </div>
                                                            <div class="sli-chi sc3 dynamic_font_size" id ='all_lbls'>
                                                             Special
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary show_img">Image</button>
                                                        <button class="btn btn-secondary hide_img">No Image</button>
                                                        <div class="slicon-con">
                                                            <div class="template all_lbls shelf_lbls" id='bp1' >
                                                                    <div class="w-100 p-3">
                                                                    <div class="first-slabel text-center mx-auto p-0 " >
                                                                            <div class="d-flex jc-bet">
                                                                                <div class="imgcon-lbl" id="imglbl"><img src="<?=base_url('./uploads/products/012000046445_012000046445_52212056-1.jpg')?>" alt="" id="editor_img"></div>
                                                                                <div class="w-50 bg-yellow">
                                                                                <div class="lppc-price san h6 bcname ">$1.00</div>
                                                                                <div class="lpc-price h6 bcname">$1.99</div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="prodname h6 mt-3 mx-auto mb-2">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>

                                                                            <div class="text-left w-100 color-red bold text-bold upc-lbl bar-no">UPC#&emsp;012000046445</div>
                                                                            <div class="lpc-barcode new text-left  position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg">
                                                                             <!-- <div class="bar-no position-absolute">012000046445</div> -->
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="slicon-con">
                                                            <div class="template" id='bp2'>
                                                            <div class="w-100 p-3">
                                                                        <div class="first-slabel secT text-center mx-auto ">

                                                                            <div class="prodname h6 mx-auto">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>

                                                                            <div class="lpc-barcode position-relative mb-3"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"> <div class="bar-no position-absolute mt-1">012000046445</div></div>
                                                                            <!-- <div class="lpc-price h6 bcname mt-2">$1.99</div>
                                                                            <div class="lppc-price h6 bcname">$1.00</div> -->

                                                                            <p class="lpc-price h6 bcname mt-2 float-left ml-3">$1.99</p>
                                                                            <p class="lppc-price h6 bcname float-right mr-3">$1.00</p>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="slicon-con">
                                                          <div class="template all_lbls" id='bp3'>
                                                            <div class="w-100 p-3">
                                                            <div class="first-slabel text-center mx-auto p-0 ">
                                                                            <div class="">
                                                                                <div class="w-100 text-center mx-auto">
                                                                                    <div class="lppc-price h-auto h6 amg bcname text-center">
                                                                                        $1.00 <sub>+TAX/CRV</sub>
                                                                                    </div>
                                                                                    <div class="lpc-price h6 bcname">$1.99</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="prodname h6 mt-3 mx-auto mb-2">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>

                                                                            <div class="text-left w-100 color-red bold text-bold upc-lbl black  bar-no">UPC#&emsp;012000046445</div>
                                                                            <div class="lpc-barcode new text-left  position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg">
                                                                             <!-- <div class="bar-no position-absolute">012000046445</div> -->
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="slicon-con">
                                                        <div class="template all_lbls shelf_lbls" id='bp4'>
                                                                <div class="w-100 p-3">
                                                                <div class="first-slabel text-center mx-auto p-0 " >
                                                                        <div class="d-flex jc-bet">
                                                                            <div class="imgcon-lbl" id="imglbl"><img src="<?=base_url('./uploads/products/012000046445_012000046445_52212056-1.jpg')?>" alt="" id="editor_img"></div>
                                                                            <div class="w-50 bg-yellow">
                                                                            <div class="lppc-price san h6 bcname ">$1.00</div>
                                                                            <div class="lpc-price h6 bcname">$1.99</div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="mt-2 mx-auto spl-text" style="font-size: 170% !important; font-weight: bold; color: darkred;">Special Offer 10% off, <br> Limited Time... Hurry Up!</div>
                                                                        <div class="prodname h6 mt-3 mx-auto mb-2">Pure Leaf Unsweetened Green Tea, 18.5 Fl. Oz.</div>

                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <form class="lbl_editor" action="" method="post">
                                    <div class="row">

                                            <div class="col-md-6">
                                              <label for="" class="custom_label dynamic_font_size">Height <span>(in inches)</span></label>
                                              <input type="tel" name="label_height" id="1a" class="customecardinput form-control validlable use-keyboard-input-num dynamic_font_size" onkeypress="return isNumberKey(this, event);">
                                              <span class="errors dynamic_font_size_err" id="height_err" style="color:red; "></span>
                                            </div>
                                            <div class="col-md-6">
                                              <label for="" class="custom_label dynamic_font_size">Width <span>(in inches)</span></label>
                                              <input type="tel" name="label_width" id="2a" class="customecardinput form-control validlable use-keyboard-input-num dynamic_font_size" onkeypress="return isNumberKey(this, event);">
                                              <span class="errors dynamic_font_size_err" id="width_err" style="color:red; "></span>
                                            </div>
                                            <!-- <div class="col-md-6 mt-3">
                                              <label for="" class="custom_label dynamic_font_size">Font Size</label>
                                               <input type="text" name="label_font_size" id="3a" class="customecardinput form-control validlable use-keyboard-input dynamic_font_size">
                                               <span class="errors dynamic_font_size_err" id="fsize_err" style="color:red; font-size:14px"></span>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                 <label class="custom_label dynamic_font_size" for="">Image</label>
                                                 <select class="form-control validlable dynamic_font_size" id="4a" name="label_image">
                                                     <option value="1">Show</option>
                                                     <option value="0">Hide</option>
                                                 </select>
                                                 <span class="errors dynamic_font_size_err" id="limg_err" style="color:red; font-size:14px"></span>
                                            </div> -->
                                        </div>
                                      </form>
                                </div>

                                </div>
                                <!-- </form> -->
                        </div>

                        <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btnLabel">Save</button>
                              </div>
                        </div>
                    </div>

                    <div class="toggle_div" id="div_discount_setting" style="display:none;">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="customcard">
                                <div >
                                  <div class="customcardheader">
                                        <p>Discount Settings</p>

                                  </div>
                                 <div class="customcardbody ">
                                   <div class="row mb-3 align-items-center">
                                         <div class="col-md-8 mb-2" >
                                             <button class="by_percentage" style="background: #4caf50;border-color: #4caf50; color: #ffffff;border-radius: 0;height: 42px;width: 183px;outline: none; font-size:18px;" >Discount By Percent</button>
                                             <button class="by_amount" style="background: #E4E4E4;border-color: #E4E4E4; color: #000000;border-radius: 0;height: 42px;width: 183px;outline: none; font-size:18px;">Discount By Amount</button>
                                         </div>
                                             <div class="flexB2 PERCENTAGE_By">
                                               <?php for ($i = 0; $i < 12; $i++) { ?>
                                                  <div class="m-2" style="width:18%;display:flex;position:relative;">
                                                 <button style="white-space: normal;word-wrap: break-word!important;" type="button" data-name="<?= ($discount_by_percent[$i]['discount_title']) ? $discount_by_percent[$i]['discount_title'] : ''; ?>" data-value="<?= ($discount_by_percent[$i]['discount_value']) ? $discount_by_percent[$i]['discount_value'] : ''; ?>" data-subtotal="<?= ($discount_by_percent[$i]['subtotal_amount']) ? $discount_by_percent[$i]['subtotal_amount'] : ''; ?>" id="discount_<?= $discount_by_percent[$i]['id'] ?>" class="cm3 w-100 open_discount_percentage" data-target="#discount_percent_key" value=""><?= ($discount_by_percent[$i]['discount_title']) ? $discount_by_percent[$i]['discount_title'] : 'Discount Key'; ?>
                                                 </button>
                                                 <span class="clear_discount" id="clear_discount_<?= $discount_by_percent[$i]['id'] ?>">x</span>
                                               </div>
                                               <?php } ?>
                                             </div>

                                             <div class="flexB2 AMOUNT_By" style="display:none;">
                                               <?php for ($i = 0; $i < 12; $i++) { ?>
                                                  <div class="m-2" style="width:18%;display:flex;position:relative;">
                                                 <button style="white-space: normal;word-wrap: break-word!important;" type="button" data-name="<?= ($discount_by_amount[$i]['discount_title']) ? $discount_by_amount[$i]['discount_title'] : ''; ?>" data-value="<?= ($discount_by_amount[$i]['discount_value']) ? $discount_by_amount[$i]['discount_value'] : ''; ?>" data-subtotal="<?= ($discount_by_amount[$i]['subtotal_amount']) ? $discount_by_amount[$i]['subtotal_amount'] : ''; ?>" id="discount_<?= $discount_by_amount[$i]['id'] ?>" class="cm3 w-100 open_discount_amount" data-target="#discount_percent_key" value=""><?= ($discount_by_amount[$i]['discount_title']) ? $discount_by_amount[$i]['discount_title'] : 'Discount Key'; ?>
                                                 </button>
                                                 <span class="clear_amount" id="clear_amount_<?= $discount_by_amount[$i]['id'] ?>">x</span>
                                               </div>
                                               <?php } ?>
                                             </div>

                                   </div>
                                 </div>

                                </div>
                              </div>
                            </div>

                          </div>
                    </div>

                    <div class="toggle_div" id="div_mail_settings" style="display: none;">
                      <form action="" method="post" class="mail_settings" autocomplete="off">
                      <div class="">
                        <div class="col-sm-32">
                          <p class="formheader dynamic_font_header1 pt-4 ml-4" style="color:#2d7f61;">Mail Settings</p>
                              <div class="panel panel-bd lobidrag customcardbody">
                                  <div class="panel-body">
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">To Email</label>
                                          <div class="col-sm-6">
                                              <input type="text" id="id_email_to" tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $mail_set['to_email'] ?>" name="to_email" />
                                              <span class="errors dynamic_font_size_err" id="" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Cc</label>
                                          <div class="col-sm-6">
                                              <input type="text" id="id_Cc" tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $mail_set['to_cc_email'] ?>" name="to_cc_email" />
                                              <span class="errors dynamic_font_size_err" id="" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">From Email</label>
                                          <div class="col-sm-6">
                                              <input type="text" tabindex="3" id="id_from" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $mail_set['from_email'] ?>" name="from_email"/>
                                              <span class="errors dynamic_font_size_err" id="" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">From Name</label>
                                          <div class="col-sm-6">
                                              <input type="text" id="id_from_name" tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $mail_set['from_name'] ?>" name="from_name" />
                                              <span class="errors dynamic_font_size_err" id="" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">SMTP Host</label>
                                          <div class="col-sm-6">
                                              <input type="text" id="id_smtp_host" tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $mail_set['smtp_host'] ?>" name="smtp_host" />
                                              <span class="errors dynamic_font_size_err" id="" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">SMTP Port</label>
                                          <div class="col-sm-6">
                                              <input type="text" id="id_smtp_port" tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $mail_set['smtp_port'] ?>" name="smtp_port"/>
                                              <span class="errors dynamic_font_size_err" id="" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">SMTP Authentication</label>
                                          <div class="col-sm-6">
                                            <select class="form-control dynamic_font_size" id="smtp_authentication" name="smtp_authentication">
                                              <option value="1" id="id_option1"<?php echo ($mail_set['smtp_authentication'] == '1')?'selected':'' ?>>Yes</option>
                                              <option value="0" id="id_option2"<?php echo ($mail_set['smtp_authentication'] == '0')?'selected':'' ?>>No</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="language" class="col-sm-3 col-form-label custom_label dynamic_font_size">SMTP Username</label>
                                          <div class="col-sm-6">
                                              <input type="text" tabindex="3" id="id_smtp_username" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" name="smtp_username" value="<?= $mail_set['smtp_username'] ?>"/>
                                              <span class="errors dynamic_font_size_err" id="card_transaction_terminal_hsn_no_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="secret_key" class="col-sm-3 col-form-label custom_label dynamic_font_size dynamic_font_size">SMTP Password </label>
                                          <div class="col-sm-6">
                                              <input tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" name="smtp_password" id="id_smtp_password" type="password" value="<?=$mail_set['smtp_password']?>">
                                              <span class="errors dynamic_font_size_err" id="card_transaction_username_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                        </div>

                      </div>
                      <div class="customcardfooter">
                          <div style="text-align: center;">
                              <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                              <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btnMail">Save</button>
                          </div>
                      </div>
                      </form>

                    </div>

                    <div class="toggle_div" id="div_notify_settings" style="display: none;">
                        <form action="" method="post" class="store_notification" >
                           <div class="customcardheader">
                                 <p class="dynamic_font_header1">Notification Settings</p>
                           </div>

                              <div class="customcardbody ">
                                <!-- container -->
                                <div class="container  mb25">
                                  <ul id="myUL">
                                      <li><span class="caret2"><label class="customcardlabel">Ring Sales</label></span>
                                              <input type="checkbox" class="pos_check ml-3" name="all" id="POS22">
                                              <label class="customcardlabel mr-2">All</label>
                                              <!-- remove active3c insidenested2lass -->
                                          <ul class="nested2 ml-5 " id="POS23">
                                              <!-- <li><input type="checkbox" class="check" name="pos_rights[]" value="A" id="posA">
                                              <label class="customcardlabel mr-2">Shift Report</label></li> -->
                                              <li><input type="checkbox" class="check7" name="pos_notification[]" value="A" id="notification_pos1">
                                              <label class="customcardlabel mr-2 dynamic_font_size">Cash Drop</label></li>
                                              <li><input type="checkbox" class="check7" name="pos_notification[]" value="B" id="notification_pos2">
                                              <label class="customcardlabel mr-2 dynamic_font_size">Payout</label></li>
                                          </ul>
                                      </li>
                                  </ul>
                                  <ul id="myUL">
                                      <li><span class="caret2"><label class="customcardlabel">Inventory</label></span>
                                              <input type="checkbox" class="inventory_check ml-3" name="all" id="INVENTORY22">
                                              <label class="customcardlabel mr-2">All</label>
                                               <!-- remove active3c insidenested2lass -->
                                              <ul class="nested2 ml-5 " id="INVENTORY23">
                                                <li><input type="checkbox" class="check8" name="inventory_notification[]" value="A" id="notification_inv1">
                                                <label class="customcardlabel mr-2 dynamic_font_size">Add Product</label></li>
                                                <li><input type="checkbox" class="check8" name="inventory_notification[]" value="B" id="notification_inv2">
                                                <label class="customcardlabel mr-2 dynamic_font_size">Update Product</label></li>
                                          </ul>
                                      </li>
                                  </ul>
                                  <ul id="myUL">
                                      <li><span class="caret2"><label class="customcardlabel">POS Settings</label></span>
                                          <input type="checkbox" class="coupon_check ml-3" name="all" id="COUPON22">
                                          <label class="customcardlabel mr-2">All</label>
                                           <!-- remove active3c insidenested2lass -->
                                          <ul class="nested2 ml-5" id="COUPON23">
                                            <li><input type="checkbox" class="check7" name="pos_notification[]" value="A" id="notification_pos1">
                                            <label class="customcardlabel mr-2 dynamic_font_size">Cash Drop</label></li>
                                            <li><input type="checkbox" class="check7" name="pos_notification[]" value="B" id="notification_pos2">
                                            <label class="customcardlabel mr-2 dynamic_font_size">Payout</label></li>
                                          </ul>
                                      </li>
                                  </ul>
                                  </div>
                              </div>
                              <!-- cardbody -->
                              <div class="customcardfooter">
                                 <div style="text-align: center;">
                                     <a href="<?=base_url('cashier/settings?d=notification')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                     <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnNotify">Save</button>
                                 </div>
                              </div>
                         </form>
                    </div>

                    <div class="toggle_div" id="div_card_transaction" style="display: none;">
                      <form action="" method="post" class="card_transaction" autocomplete="off">
                      <div class="smbtn">
                        <div class="col-sm-32">

                              <div class="panel panel-bd lobidrag ">
                                  <div class="panel-body">

                                        <p class="formheader dynamic_font_header1 ml-3 pt-3" style="color:#2d7f61;">Card Payment Method</p>
                                        <div class="form-group row">
                                            <!-- <label for="pay_date" class="col-sm-3 col-form-label custom_label">Card Payment Method</label> -->
                                            <div class="col-sm-3 ml-3">
                                                <select name="active_transaction_type" class="form-control dynamic_font_size " id="active_transaction_type">
                                                    <option value="1" class="dynamic_font_size" <?php echo ($card_transaction['active_transaction_type'] == 1) ? "selected" : ""; ?>>Bolt</option>
                                                    <option value="2" class="dynamic_font_size" <?php echo ($card_transaction['active_transaction_type'] == 2) ? "selected" : ""; ?>>Clover</option>
                                                </select>
                                            </div>
                                        </div>
                                          <!-- <button type="submit" class="btn btn-primary customcardfooteraddbtn mt-3" id="btnFont">Submit</button> -->

                                          <hr>


                                    <div class="bolt_div" style="<?php if($card_transaction['active_transaction_type'] == 2){ echo 'display: none'; }?>">
                                      <p class="formheader dynamic_font_header2 ml-3" style="font-size:18px;color:#2d7f61;">Card Processing Settings</p>
                                      <div class="fix-header">
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size" >App URL</label>
                                          <div class="col-sm-6">
                                              <input type="url" id="card_transaction_api_url" tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $card_transaction['card_transaction_api_url'] ?>" name="card_transaction_api_url" />
                                              <span class="errors dynamic_font_size_err" id="card_transaction_api_url_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Api UAT URL</label>
                                          <div class="col-sm-6">
                                              <input type="url" tabindex="3" id="card_transaction_uat_api_url" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $card_transaction['card_transaction_uat_api_url'] ?>" name="card_transaction_uat_api_url"/>
                                              <span class="errors" id="card_transaction_uat_api_url_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Api Key</label>
                                          <div class="col-sm-6">
                                              <input type="url" id="card_transaction_api_key" tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $card_transaction['card_transaction_api_key'] ?>" name="card_transaction_api_key" />
                                              <span class="errors dynamic_font_size_err" id="card_transaction_api_key_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Authentication Key</label>
                                          <div class="col-sm-6">
                                              <input type="url" id="card_transaction_auth_key" tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $card_transaction['card_transaction_auth_key'] ?>" name="card_transaction_auth_key" />
                                              <span class="errors dynamic_font_size_err" id="card_transaction_auth_key_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Merchant ID</label>
                                          <div class="col-sm-6">
                                              <input type="url" id="card_transaction_merchant_id" tabindex="3" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $card_transaction['card_transaction_merchant_id'] ?>" name="card_transaction_merchant_id"/>
                                              <span class="errors dynamic_font_size_err" id="card_transaction_merchant_id_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Associate Merchant ID </label>
                                          <div class="col-sm-6">
                                              <input type="url" tabindex="3" id="card_transaction_assoc_merchant_id" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $card_transaction['card_transaction_assoc_merchant_id'] ?>" name="card_transaction_assoc_merchant_id" />
                                              <span class="errors dynamic_font_size_err" id="card_transaction_assoc_merchant_id_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="language" class="col-sm-3 col-form-label custom_label dynamic_font_size">Terminal HSN Number </label>
                                          <div class="col-sm-6">
                                              <input type="text" tabindex="2" id="card_transaction_terminal_hsn_no" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" name="card_transaction_terminal_hsn_no" value="<?= $card_transaction['card_transaction_terminal_hsn_no'] ?>"/>
                                              <span class="errors dynamic_font_size_err" id="card_transaction_terminal_hsn_no_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="secret_key" class="col-sm-3 col-form-label custom_label dynamic_font_size">Username </label>
                                          <div class="col-sm-6">
                                              <input class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" name="card_transaction_username" id="card_transaction_username" type="text" value="<?=$card_transaction['card_transaction_username']?>">
                                              <span class="errors dynamic_font_size_err" id="card_transaction_username_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Password </label>
                                          <div class="col-sm-6">
                                              <input type="text" tabindex="2" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" name="card_transaction_password" value="<?=$card_transaction['card_transaction_password']?>" id="card_transaction_password"/>
                                              <span class="errors dynamic_font_size_err" id="card_transaction_password_err" style="color:red; font-size:14px"></span>
                                          </div>
                                      </div>
                                      </div>
                                    </div>
                                      <div class="clover_div" style="<?php if($card_transaction['active_transaction_type'] == 1){ echo 'display: none'; }?>">
                                      <p class="formheader dynamic_font_size" style="font-size:18px;color:#2d7f61;">Clover Card Processing Settings</p>

                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size" >Clover App Secret</label>
                                          <div class="col-sm-6">
                                              <input type="url" id="CLOVER_APP_SECRET" tabindex="3" class="form-control inputFile use-keyboard-input dynamic_font_size" value="<?= $card_transaction['CLOVER_APP_SECRET'] ?>" name="CLOVER_APP_SECRET" />
                                              <span class="errors dynamic_font_size_err" id="CLOVER_APP_SECRET_err" style="color:red; font-size:14px"></span>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Clover App ID</label>
                                          <div class="col-sm-6">
                                              <input type="url" tabindex="3" id="CLOVER_APP_ID" class="form-control inputFile use-keyboard-input validate99 dynamic_font_size" value="<?= $card_transaction['CLOVER_APP_ID'] ?>" name="CLOVER_APP_ID"/>
                                              <span class="errors dynamic_font_size_err" id="CLOVER_APP_ID_err" style="color:red; font-size:14px"></span>
                                          </div>
                                        </div>

                                      <?php if($card_transaction['CLOVER_ACCESS_TOKEN']=='' || $card_transaction['CLOVER_MERCHANT_ID']==''){ ?>
                                        <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Clover</label>
                                          <div class="col-sm-6">
                                            <a class="btn btn-primary dynamic_font_size" style="" href='https://sandbox.dev.clover.com/oauth/authorize?client_id=K3MZQ4J2EFMAR&redirect_uri=<?php echo base_url().''; ?>cashier/settings#contact'>Connect</a>
                                          </div>
                                        </div>
                                       <!-- <p style="width: 100%;color: red;"> </p> -->


                                    <?php }else{ ?>

                                        <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label" >Clover App access token</label>
                                          <div class="col-sm-6">
                                              <input type="url" id="CLOVER_ACCESS_TOKEN" tabindex="3" readonly="" class="form-control inputFile  " value="<?= $card_transaction['CLOVER_ACCESS_TOKEN'] ?>" name="CLOVER_ACCESS_TOKEN" />
                                              <span class="errors" id="CLOVER_APP_SECRET_err" style="color:red; font-size:14px"></span>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label">Clover App merchant ID</label>
                                          <div class="col-sm-6">
                                              <input type="url" tabindex="3" id="CLOVER_MERCHANT_ID" class="form-control inputFile  validate99" value="<?= $card_transaction['CLOVER_MERCHANT_ID'] ?>" readonly name="CLOVER_MERCHANT_ID"/>
                                              <span class="errors" id="CLOVER_APP_ID_err" style="color:red; font-size:14px"></span>
                                          </div>
                                        </div>

                                    <?php } ?>
                                  </div>
                                  </div>

                              </div>
                        </div>

                      </div>
                      <div class="customcardfooter">
                          <div style="text-align: center;">
                              <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                              <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm smbtn dynamic_font_size" id="btnTranscation">Save</button>
                          </div>
                      </div>
                      </form>
                    </div>

                    <div class="toggle_div" id="div_clover_card_transaction" style="display: none;">

                    </div>

                    <div class="toggle_div" id="div_date_timezone" style="display: none;">
                      <form action="" method="post" class="date_timezone" autocomplete="off">
                      <div class="customcardbody">
                        <div class="col-sm-32">
                          <!-- <p class="formheader">Card Processor Settings</p> -->
                              <div class="panel panel-bd lobidrag">
                                  <div class="panel-body">
                                      <div class="form-group row">
                                          <label for="language" class="col-sm-3 col-form-label custom_label dynamic_font_size">Timezone</label>
                                          <div class="col-sm-6">
                                            <select class="form-control dynamic_font_size" id="timezone" name="timezone">
                                              <option value="<?=TIMEZONE[0]?>" <?php echo ($fontsize->timezone == 'America/New_York')?'selected':'' ?>>America/New_York (UTC−05:00)</option>
                                              <option value="<?=TIMEZONE[1]?>" <?php echo ($fontsize->timezone == 'America/Chicago')?'selected':'' ?>>America/Chicago (UTC−06:00)</option>
                                              <option value="<?=TIMEZONE[2]?>" <?php echo ($fontsize->timezone == 'America/Denver')?'selected':'' ?>>America/Denver (UTC−07:00)</option>
                                              <option value="<?=TIMEZONE[3]?>" <?php echo ($fontsize->timezone == 'America/Phoenix')?'selected':'' ?>>America/Phoenix (UTC−07:00)</option>
                                              <option value="<?=TIMEZONE[4]?>" <?php echo ($fontsize->timezone == 'America/Los_Angeles')?'selected':'' ?>>America/Los_Angeles (UTC−08:00)</option>
                                              <option value="<?=TIMEZONE[5]?>" <?php echo ($fontsize->timezone == 'America/Anchorage')?'selected':'' ?>>America/Anchorage (UTC−09:00)</option>
                                              <option value="<?=TIMEZONE[6]?>" <?php echo ($fontsize->timezone == 'America/Adak')?'selected':'' ?>>America/Adak (UTC−10:00)</option>
                                              <option value="<?=TIMEZONE[7]?>" <?php echo ($fontsize->timezone == 'Pacific/Honolulu')?'selected':'' ?>>Pacific/Honolulu (UTC−10:00)</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="" class="col-sm-3 col-form-label custom_label dynamic_font_size">Date Format</label>
                                          <div class="col-sm-6">
                                            <select class="form-control dynamic_font_size" name="date_format">
                                                <?php foreach(DATEFORMAT as $f){ ?>
                                                <option value="<?=$f?>" <?php if($fontsize->date_format == $f){ echo 'selected';} ?>><?=strtolower($f)?></option>
                                              <?php } ?>
                                            </select>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Time Format</label>
                                          <div class="col-sm-6">
                                            <select class="form-control validlable dynamic_font_size" name="time_format">
                                                <?php foreach(TIMEFORMAT as $f){ ?>
                                                <option value="<?=$f?>" <?php if($fontsize->time_format == $f){ echo 'selected';} ?>><?=$f?></option>
                                              <?php } ?>
                                            </select>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                        </div>

                      </div>
                      <div class="customcardfooter">
                          <div style="text-align: center;">
                              <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                              <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btnTimezone">Save</button>
                          </div>
                      </div>
                      </form>

                    </div>


                      <div class="toggle_div" id="div_general" style="display: none;">
                        <form action="" method="post" class="gen_setting" enctype="multipart/form-data">
                        <div class="">
                          <div class="col-sm-32">
                            <p class="formheader dynamic_font_header1 ml-3 pt-3" style="color:#2d7f61;">General Settings</p>
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-body customcardbody">

                                        <div class="form-group row">
                                            <label for="logo" class="col-sm-3 col-form-label custom_label dynamic_font_size">Logo </label>
                                            <div class="col-sm-6">
                                                <input class="form-control dynamic_font_size" name="logo" id="logo" type="file">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="logo" class="col-sm-3 col-form-label custom_label"></label>
                                            <div class="col-sm-6">
                                                 <img src="<?php echo base_url() . $setting_detail['logo']; ?>" class="img img-responsive" height="100" width="100">
                                                <input name="old_logo" type="hidden" value="<?= $setting_detail['logo'] ?>">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="favicon" class="col-sm-3 col-form-label">Favicon</label>
                                            <div class="col-sm-6">
                                            </div>
                                        </div> -->
                                        <input class="form-control" name="favicon" id="favicon" type="hidden">

                                        <!-- <div class="form-group row">
                                            <label for="favicon" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-6">
                                                 <img src="<?php echo base_url() . $setting_detail['favicon']; ?>" class="img img-responsive" height="50" width="50">
                                                <input name="old_favicon" type="hidden" value="<?= $setting_detail['favicon'] ?>">
                                            </div>
                                        </div> -->



                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Name <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <input type="text" tabindex="2" class="form-control inputFile use-keyboard-input dynamic_font_size" name="name" value="<?= $setting_detail['name'] ?>" placeholder="Name" id="gen_name" />
                                                <span class="errors dynamic_font_size_err" id="nm_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Phone Number<i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <input type="tel" tabindex="3" class="form-control phoneInput inputFile use-keyboard-input-num usemobilehere dynamic_font_size" id="gen_mobile" name="mobile_no" value="<?= $setting_detail['mobile'] ?>" placeholder="Mobile No" required maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/>
                                                <span class="errors dynamic_font_size_err" id="mb_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Address<i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control input-description inputFile use-keyboard-input dynamic_font_size" tabindex="1" id="gen_address" name="address" placeholder="Address" required><?= $setting_detail['address'] ?></textarea>
                                                <span class="errors dynamic_font_size_err" id="adr_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Email <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <input type="email" tabindex="3" id="gen_email" class="form-control inputFile use-keyboard-input dynamic_font_size" value="<?= $setting_detail['email'] ?>" name="email" placeholder="Email" required />
                                                <span class="errors dynamic_font_size_err" id="em_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size">Website </label>
                                            <div class="col-sm-6">
                                                <input type="url" tabindex="3" id="gen_url" class="form-control inputFile use-keyboard-input dynamic_font_size" value="<?= $setting_detail['website'] ?>" name="website" placeholder="Website" required />
                                                <span class="errors dynamic_font_size_err" id="ur_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size"><?php echo "App URL" ?> </label>
                                            <div class="col-sm-6">
                                                <input type="url" id="gen_app" tabindex="3" class="form-control inputFile use-keyboard-input dynamic_font_size" value="<?= $setting_detail['apps_url'] ?>" name="apps_url" placeholder="<?php echo display('website') ?>" />
                                                <span class="errors dynamic_font_size_err" id="app_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size"><?php echo "Instagram URL" ?> </label>
                                            <div class="col-sm-6">
                                                <input type="url" id="gen_insta" tabindex="3" class="form-control inputFile use-keyboard-input dynamic_font_size" value="<?= $setting_detail['instagram_url'] ?>" name="instagram_url" placeholder="Instagram URL" />
                                                <span class="errors dynamic_font_size_err" id="insta_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size"><?php echo "Twitter URL" ?> </label>
                                            <div class="col-sm-6">
                                                <input type="url" id="gen_twt" tabindex="3" class="form-control inputFile use-keyboard-input dynamic_font_size" value="<?= $setting_detail['twitter_url'] ?>" name="twitter_url" placeholder="Twitter URL" />
                                                <span class="errors dynamic_font_size_err" id="twt_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size"><?php echo "Facebook URL" ?></label>
                                            <div class="col-sm-6">
                                                <input type="url" tabindex="3" id="gen_fb" class="form-control inputFile use-keyboard-input dynamic_font_size" value="<?= $setting_detail['facebook_url'] ?>" name="facebook_url" placeholder="<?php echo "Facebook URL" ?>" />
                                                <span class="errors dynamic_font_size_err" id="fb_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="language" class="col-sm-3 col-form-label custom_label dynamic_font_size">Language </label>
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $setting_detail['language'] ?>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="secret_key" class="col-sm-3 col-form-label custom_label dynamic_font_size">Secret Key</label>
                                            <div class="col-sm-6">
                                                <input class="form-control inputFile use-keyboard-input dynamic_font_size" name="secret_key" id="secret_key" type="text" placeholder="Secret Key" value="<?= $setting_detail['secret_key'] ?>">
                                                <span class="errors dynamic_font_size_err" id="scr_err" style="color:red; font-size:14px"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size"><?php echo "Meta Title" ?></label>
                                            <div class="col-sm-6">
                                                <input type="text" tabindex="2" class="form-control inputFile use-keyboard-input dynamic_font_size" name="Meta_Title" value="<?= $setting_detail['Meta_Title'] ?>" placeholder="<?php echo "Meta Title" ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size"><?php echo "Meta Key" ?></label>
                                            <div class="col-sm-6">
                                                <input type="text" tabindex="2" class="form-control inputFile use-keyboard-input dynamic_font_size" name="Meta_Key" value="<?= $setting_detail['Meta_Key'] ?>" placeholder="<?php echo "Meta Key" ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label custom_label dynamic_font_size"><?php echo "Meta Description"?></label>
                                            <div class="col-sm-6">
                                                <input type="text" tabindex="2" class="form-control inputFile use-keyboard-input dynamic_font_size" name="Meta_Desc" value="<?= $setting_detail['Meta_Desc'] ?>" placeholder="<?php echo "Meta Description" ?>" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                          </div>

                        </div>
                        <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('cashier/settings')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btnGeneral">Save</button>
                            </div>
                        </div>
                        </form>

                      </div>




                      <!-- POS -->
                      <div class="toggle_div" id="div_pos" style="display: none;">
                        <div class=" container-fluid CATPOS">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="customcard">
                                        <div >
                                          <div class="customcardheader d-flex align-items-center" style="display:flex;align:center;">
                                                <p  class="w-100 dynamic_font_header1">All Category</p>
                                                <!-- <button type="button" class="btn btn-outline-dark alluserbtn" id="Archive" >Archive
                                                </button> -->
                                                <button type="button" class="btn btn-outline-dark alluserbtn adduserbtn position-relative dynamic_font_size" style='top:0!important;right:0!important;' id="addCATS">Add
                                                  <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                                  </svg>
                                              </button>
                                         </div>
                                         <div class="customcardbody2 ">
                                          <table class="table table-striped" id="cat_table">
                                              <thead>
                                                <tr>
                                                  <!-- <th scope="col">#</th> -->
                                                  <th class="dynamic_font_size" scope="col" style="color:#000;font-weight:bold;">Category Name</th>
                                                  <!-- <th scope="col">Product Name</th> -->
                                                  <th class="dynamic_font_size" style="color:#000;font-weight:bold;text-align: start;" scope="col">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td class="dynamic_font_size">Miscellaneous Products</td>
                                                  <td style="">
                                                    <button type="button" data-id="<?php echo $cus['id']; ?>" class="btn btn-outline-dark alluserbtn miscellaneousRecord dynamic_font_size">Products
                                                      <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0)">
                                                          <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                        </g>
                                                        <defs>
                                                          <clipPath id="clip0">
                                                            <rect width="21" height="21" fill="white" />
                                                          </clipPath>
                                                        </defs>
                                                      </svg>
                                                    </button>
                                                    <button type="button"  class="btn btn-outline-dark alluserbtn editRecord dynamic_font_size" disabled>Edit
                                                      <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0)">
                                                          <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                        </g>
                                                        <defs>
                                                          <clipPath id="clip0">
                                                            <rect width="21" height="21" fill="white" />
                                                          </clipPath>
                                                        </defs>
                                                      </svg>
                                                    </button>


                                                    <button type="button" class="btn btn-outline-dark alluserbtn deleteRecord dynamic_font_size" disabled>Delete
                                                      <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                      </svg>
                                                    </button>
                                                  </td>
                                                </tr>
                                                <?php $i= 1; foreach ($custome_category as $cus) { ?>
                                                  <tr>
                                                    <td class="dynamic_font_size"><?= $cus['name']?></td>
                                                    <td style="">
                                                      <button type="button" data-id="<?php echo $cus['id']; ?>" data-catname="<?=$cus['name']?>" class="btn btn-outline-dark alluserbtn productRecord dynamic_font_size" data-toggle="modal" data-target="#editModal">Products
                                                        <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                          <g clip-path="url(#clip0)">
                                                            <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                          </g>
                                                          <defs>
                                                            <clipPath id="clip0">
                                                              <rect width="21" height="21" fill="white" />
                                                            </clipPath>
                                                          </defs>
                                                        </svg>
                                                      </button>
                                                      <button type="button" data-id="<?php echo $cus['id']; ?>" class="btn btn-outline-dark alluserbtn editRecord dynamic_font_size" data-toggle="modal" data-target="#editModal">Edit
                                                        <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                          <g clip-path="url(#clip0)">
                                                            <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                          </g>
                                                          <defs>
                                                            <clipPath id="clip0">
                                                              <rect width="21" height="21" fill="white" />
                                                            </clipPath>
                                                          </defs>
                                                        </svg>
                                                      </button>


                                                      <button type="button" data-id="<?php echo $cus['id']; ?>" class="btn btn-outline-dark alluserbtn deleteRecord dynamic_font_size">Delete
                                                        <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                        </svg>
                                                      </button>
                                                    </td>
                                                  </tr>

                                                <?php $i++;}  ?>

                                              </tbody>
                                            </table>
                                         </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                        </div>



                        <!-- <div class="customcardbody addCAT" style="display:none;"> -->
                        <form action="" method="post" class="addCAT" autocomplete="off" style="display:none;">
                           <!-- cardheader -->
                           <div class="customcardheader">
                                           <p class="dynamic_font_header1">Add Custom Category</p>
                                         <button type="button" class="btn btn-outline-dark alluserbtn adduserbtn" id="BACK4" style="display:none;">Back
                                         </button>
                                  </div>
                                   <div class="customcardbody ">
                                     <div class="container ">
                                      <!-- <p class="formheader">Basic Information</p> -->

                                      <div class="row">
                                         <div class="col-md-6">
                                             <div class="form-group">
                                                 <label class="customcardlabel" for="">Categories</label>
                                                 <select class="form-control select-2-dropdown customcardinput inpt" id="category" name="category_id" style="">
                                                   <option>--Select Category--</option>

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
                                                             <option value="<?=$grnd_ct['category_id']?>" <?php if($grnd_ct['category_id']==$product->category_id){echo 'SELECTED';}?> >
                                                               <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                                                 <?=$sub_ct2['category_name']?> > <?=$grnd_ct['category_name']?></option>

                                                       <?php } } } } } }?>

                                                   <?php } ?>
                                                   <option value="0" >Undefined</option>

                                                </select>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-group">
                                                 <label class="customcardlabel" for=""> OR Custom Category</label>
                                                 <input type="text" class="form-control customcardinput inpt  use-keyboard-input" id="custm" name="custom_category" aria-describedby="" placeholder="Please enter Custom Category Name" maxlength="25">
                                                  <span class="errors" id="ctm_err" style="color:red; font-size:14px; display: block;margin: 10px 3px;"></span>
                                             </div>
                                         </div>
                                       </div>
                                     </div>
                                    </div>
                                    <div class="customcardfooter">
                                       <div style="text-align: center;">
                                           <a href="<?=base_url('cashier/settings?d=category')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Cancel</a>
                                           <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btnCategory">Save</button>
                                       </div>
                                    </div>

                        </form>
                        <!-- </div> -->
                        <form action="" method="post" class="editCAT" autocomplete="off" style="display:none;">
                           <!-- cardheader -->
                           <div class="customcardheader">
                                           <p class="dynamic_font_header1">Update Custom Category </p>
                                         <button type="button" class="btn btn-outline-dark alluserbtn adduserbtn" id="BACK4" style="display:none;">Back
                                         </button>
                                  </div>
                                   <div class="customcardbody ">
                                     <div class="container CATDIV">
                                          <div class="row">
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label class="customcardlabel" for="">Categories</label>
                                                       <select class="form-control select-2-dropdown customcardinput inpt" id="ecategory" name="category_id" style="">
                                                         <option>--Select Category--</option>

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
                                                                   <option value="<?=$grnd_ct['category_id']?>" <?php if($grnd_ct['category_id']==$product->category_id){echo 'SELECTED';}?> >
                                                                     <?=$c['category_name']?> > <?=$sub_ct1['category_name']?> >
                                                                       <?=$sub_ct2['category_name']?> > <?=$grnd_ct['category_name']?></option>

                                                             <?php } } } } } }?>

                                                         <?php } ?>
                                                         <option value="0" >Undefined</option>

                                                      </select>
                                                   </div>
                                               </div>
                                               <input type="hidden" name="cat_id" value="" id="catID">
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label class="customcardlabel" for=""> OR     Custom Category</label>
                                                       <input type="text" class="form-control customcardinput inptdata use-keyboard-input dynamic_font_size" id="ecustm" name="custom_category" aria-describedby="" placeholder="Please enter Custom Category Name" maxlength="25">
                                                       <span class="errors dynamic_font_size_err" id="ectr_err" style="color:red;"></span>
                                                   </div>
                                               </div>
                                            </div>
                                         </div>

                                     </div>
                                      <!-- container -->
                                       <div class="customcardfooter">
                                         <div style="text-align: center;">
                                             <a href="<?=base_url('cashier/settings?d=category')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                             <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnCategoryUpdate">Save</button>
                                         </div>
                                      </div>
                                    </div>
                           <!-- cardbody -->
                        </form>
                      </div>
                      <!-- POS -->
                  </div>
            </div>
          </div>
    </div>


<!--custome key modal-->
<div class="modal" id="customeKEY" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle" style="margin-left: 180px;">Custom Key</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
      </div>
      <form action="" method="post" autocomplete="off" class="custom-key">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="hidden" value="" id="customkey_id_val" name="customkey_id"/>
                  <label class="rolllabel">Custom Key Name: *</label>
                  <input type="text" class="form-control customcardinput inputFile21 use-keyboard-input" id="customkey_name_txt" aria-describedby="" name="customkey_name" value="" placeholder="Enter Custom Key Name" maxlength="20">
                  <span class="errors" id="kname_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Custom Key Value: *</label>
                  <input type="text" name="customkey_value" class="form-control customcardinput inputFile21 use-keyboard-input-num usefloathere" id="customkey_value_txt" aria-describedby="" placeholder="Enter Custom Key Value" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                  <span class="errors" id="kvalue_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="checkbox" id="taxBoolean" name="taxable">
                  <label class="rolllabel"> Taxable ?</label>
                  <span class="errors" id="rdo_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnPrice">Submit</button>
          </div>

        </div>

      </form>
    </div>
  </div>
</div>


<div class="modal" id="add_custom_cate_pro_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle" style="margin-left: 107px;">Add Custom Category Product</h5>
      </div>
      <form action="" method="post" autocomplete="off" class="add_custom_cat_pro">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Custom Category:</label>
                  <input type="hidden" id="custom_cat_id" name="cat_id" value="">
                  <input type="text" class="form-control customcardinput" id="custom_cat_name" aria-describedby="" name="custom_cat_name" value="" readonly>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Product Name: *</label>
                  <input type="text" class="form-control customcardinput inputFile28 use-keyboard-input" id="product_name_txt" aria-describedby="" name="product_name_txt" value="" placeholder="Enter Product Name" maxlength="20">
                  <span class="errors" id="product_name_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Price: *</label>
                  <div class="position-relative">
                     <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                     <input type="text" name="product_price" class="form-control customcardinput inputFile28 use-keyboard-input-num usefloathere" id="product_price" aria-describedby="" placeholder="Enter Price" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                 </div>
                  <span class="errors" id="product_prc_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="checkbox" id="is_crv" name="is_crv" >
                  <label class="rolllabel"> Container Deposit ?</label>
                  <span class="errors" id="is_crv_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 percentDiv" style="margin-top: -13px;">
                <div class="form-group">

                  <select class="form-control customcardinput dynamic_font_size inputFile28" id="percent" name="percent">
                    <option value="0">-- Select --</option>
                    <option value="5">5 cent</option>
                    <option value="10">10 cent</option>
                  </select>
                  <span class="errors" id="percent_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="checkbox" id="is_tax" name="is_tax">
                  <label class="rolllabel"> Taxable ?</label>
                  <span class="errors" id="is_tax_err" style="color:red; font-size:14px"></span>
                </div>
              </div>

              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="checkbox" id="is_ebt" name="is_ebt ">
                  <label class="rolllabel"> EBT ?</label>
                  <span class="errors" id="is_ebt_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnCatCustomPro">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" id="update_custom_cate_pro_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle" style="margin-left: 107px;">Update Custom Category Product</h5>
      </div>
      <form action="" method="post" autocomplete="off" class="update_custom_cat_pro">
        <div class="modal-body modalscroll">
          <div class="container">
            <input type="hidden" id="cust_pro_id" value="" name="id">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Custom Category:</label>
                  <input type="text" class="form-control customcardinput" id="edit_custom_cat_name" aria-describedby="" name="custom_cat_name" value="" readonly>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Product Name: *</label>
                  <input type="text" class="form-control customcardinput inputFile28 use-keyboard-input" id="edit_product_name_txt" aria-describedby="" name="product_name_txt" value="" placeholder="Enter Product Name" maxlength="20">
                  <span class="errors" id="edit_product_name_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Price: *</label>
                  <div class="position-relative">
                     <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                     <input type="text" name="product_price" class="form-control customcardinput inputFile28 use-keyboard-input-num usefloathere" id="edit_product_price" aria-describedby="" placeholder="Enter Price" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                 </div>
                  <span class="errors" id="edit_product_prc_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="checkbox" id="edit_is_crv" name="is_crv" >
                  <label class="rolllabel"> Container Deposit ?</label>
                  <span class="errors" id="edit_is_crv_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 percentDiv1" style="margin-top: -13px;">
                <div class="form-group">
                  <select class="form-control customcardinput dynamic_font_size inputFile28" id="edit_percent" name="percent">
                    <option value="0">-- Select --</option>
                    <option value="5">5 cent</option>
                    <option value="10">10 cent</option>
                  </select>
                  <span class="errors" id="edit_percent_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="checkbox" id="edit_is_tax" name="is_tax">
                  <label class="rolllabel"> Taxable ?</label>
                  <span class="errors" id="edit_is_tax_err" style="color:red; font-size:14px"></span>
                </div>
              </div>

              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="checkbox" id="edit_is_ebt" name="is_ebt">
                  <label class="rolllabel"> EBT ?</label>
                  <span class="errors" id="edit_is_ebt_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnUpdateCatCustomPro">Submit</button>
          </div>

        </div>

      </form>
    </div>
  </div>
</div>

<div class="modal" id="edit_miscellaneous" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle" style="margin-left: 168px;">Update Product</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
      </div>
      <form action="" method="post" autocomplete="off" class="update_miscellaneous">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="hidden" value="" id="mis_product_id" name="id"/>
                  <input type="hidden" value="" id="original_miscellaneous" name="original_miscellaneous"/>
                  <label class="rolllabel">Product Name: *</label>
                  <input type="text" class="form-control customcardinput inputFile65 use-keyboard-input" id="mis_name" aria-describedby="" name="product_name" >
                  <span class="errors" id="mis_name_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Price: *</label>
                  <div class="position-relative">
                      <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                      <input type="tel" name="product_price" class="form-control customcardinput inputFile65 use-keyboard-input-num usefloathere" id="mis_price" aria-describedby="" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
                  <span class="errors" id="mis_price_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="checkbox" id="tax_miscellaneous" name="is_taxable" value="">
                  <label class="rolllabel"> Taxable ?</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnMiscellaneous">Submit</button>
          </div>

        </div>

      </form>
    </div>
  </div>
</div>


<div class="modal" id="add_miscellaneous" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle" style="margin-left: 168px;">Add Product</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
      </div>
      <form action="" method="post" autocomplete="off" class="add_Mis_Pro">
        <div class="modal-body modalscroll ">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel dynamic_font_size">Product Name: *</label>
                  <input type="text" class="form-control customcardinput inputFile64 use-keyboard-input dynamic_font_size" id="add_mis_name" aria-describedby="" name="product_name" placeholder="Enter product name">
                  <span class="errors dynamic_font_size_err" id="mis_name1_err" style="color:red;"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel dynamic_font_size">Price: *</label>
                  <div class="position-relative">
                      <span class="position-absolute dynamic_font_size" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                      <input type="tel" name="product_price" class="form-control customcardinput inputFile64 use-keyboard-input-num usefloathere dynamic_font_size" id="add_mis_price" aria-describedby="" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter product price">
                  </div>
                  <span class="errors dynamic_font_size_err" id="mis_price1_err" style="color:red;"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="checkbox" id="add_tax_miscellaneous" name="is_taxable" value="0">
                  <label class="rolllabel dynamic_font_size"> Taxable ?</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn dynamic_font_size">Close</button>
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm dynamic_font_size" id="btnAddMiscellaneous">Submit</button>
          </div>

        </div>

      </form>
    </div>
  </div>
</div>

<!--custome key modal-->
<div class="modal" id="discount_percent_key" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle" style="margin-left: 180px;">Discount Key</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
      </div>
      <form action="" method="post" autocomplete="off" class="discount-key">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <input type="hidden" value="" id="discount_id_val" name="discount_id"/>
                  <input type="hidden" value="" id="discount_key_type" name="discount_key_type" value="0"/>
                  <label class="rolllabel">Discount Key Name: *</label>
                  <input type="text" class="form-control customcardinput inputFile27 use-keyboard-input" id="discount_key_name_txt" aria-describedby="" name="discount_key_name" value="" placeholder="Enter discount key name" maxlength="20">
                  <span class="errors" id="kname_err1" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel" id="dis_titile">Discount Key Value: *</label>
                  <div class="position-relative">
                      <span class="position-absolute" id="dollar_symbol" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                      <input type="text" name="discount_key_value" class="form-control customcardinput inputFile27 use-keyboard-input-num usefloathere" id="discount_key_value_txt" aria-describedby="" placeholder="Enter discount key value" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
                  <span class="errors" id="kvalue_err1" style="color:red; font-size:14px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="rolllabel">Minimum Order Total Amount:</label>
                    <div class="position-relative">
                        <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                        <input type="text" name="subtotal_amount" class="form-control customcardinput inputFile27 use-keyboard-input-num usefloathere" id="min_order_total" aria-describedby="" placeholder="Enter minimum order total amount" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <span class="errors" id="min_err" style="color:red; font-size:14px"></span>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
            <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
            <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnDiscount">Submit</button>
          </div>

        </div>

      </form>
    </div>
  </div>
</div>

<!-- reciept -->
<div class="modal" id="mssg_preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl print-rct">
    <div class="modal-content" >
    <div class="header d-flex justify-content-center mt-5 flex-column">
    <!-- <img src="<?php print base_url() . '/assets/cashier/images/c.png'; ?>" alt="" class="src" /> -->

    <div class="textcon mx-auto d-flex flex-column">
      <!-- <div class="titleText text-center bold-2">CAMPUS LIQUOR</div> -->
      <p class="left bold-3  mt-0 mb-0  mx-auto text-wrap">
        5425 El Cajon Blvd.,


      </p>
      <p class="m-0 mx-auto">
        San Diego, CA 92115
      </p>
      <?php $order_no= $getPOSReceiptData["order_no"];?>
      <div class="subText text-center bold-3">STORE ID : 5670690</div>
      <img src="<?php print base_url() . '/assets/cashier/images/bar.svg'; ?>" class="w-50 mx-auto img-bar" style="max-width: 35mm;" />

      <div class="stars bold">
        ************************************************************
      </div>
    </div>
  </div>
    <div class="d-flex justify-content-between mr-auto ml-auto">
     <div class="wrap-address d-flex ">
      <p class="middle bold-3 text-nowrap bold">ORDER NO:</p>
      <p class="middle w-100  text-wrap">
        ORD093456
      </p>
    </div>
    <div class="top-wrap d-flex w-50 justify-content-end">
      <div class="wrap-address ml-2 d-flex  text-end">
        <p class="middle bold-3 text-nowrap bold">DATE & TIME:</p>

        <p class="middle w-100">22:22:22</p>


      </div>

    </div>
  </div>
  <!-- <div class="d-flex justify-content-between">
</div> -->
<div class="stars bold" style="margin-left: 11.5%;">
        ***************************************
</div>
  <div class="table-con  mr-auto ml-auto">
    <table>
      <thead>
        <!-- <th style='width: 15%;'>SL.NO</th> -->
        <th>QTY.</th>
        <!-- <th style='width: 7%;'> </th> -->
        <th class="text-left">ITEMS</th>

        <th>PRICE</th>
      </thead>
      <tbody>

            <tr>
              <td class="quant">22</td>
              <td>
                  <div class="p-wrapper">


                    <p class='product m-0'>lorium


                    </p>

                  </div>

              </td>
              <td>
                  <div class="p-wrapper">
                    <p class='product m-0'><span class="bold"></span>$
                         </p>
                        </div>
                     </td>
              </tr>
              <tr></tr>
              <tr></tr>


      <br>

        <tr></tr>
      </tbody>
    </table>
    <p class="total-items m-0 mt-3">Total Items : </p>
    <div class="stars lines w-100">
      ---------------------------------------------------------------------
    </div>
    <div class="total-con d-flex justify-content-between">
      <div class="left-col d-flex flex-column">
        <p>Subtotal</p>
        <p>Tax</p>
        <p>Container Deposit</p>


            <p>Loyalty Discount</p>



        <p>Cashback Amount</p>
        <p>Cashback Fee</p>


        <p>Total</p>
        <p class="mt-3 mb-3 text-nowrap" style="display: none;">Card **** **** 1523</p>
        <p class="mt-2">Cash</p>
        <p>Change</p>
      </div>

      <div class="right-col d-flex flex-column text-right">
        <p>$4</p>
        <p>$2</p>
        <p>$20</p>

            <p>$123</p>



        <p>$111</p>
        <p>$10</p>


        <p>$2000</p>
        <p class="mt-3 mb-3" style="display: none;">$400.00</p>
        <p style="margin-top:.5em">$200</p>
        <p>$12</p>
      </div>
    </div>
  </div>
  <div class="stars bold" style="margin-left: 11.5%;">
          ***************************************
  </div>

 <div class="  mr-auto ml-auto">
 <p class="text-center foot-text">Your Total Savings on This Order</p>
  <p class="amt text-center foot-text">$12</p>

    <?php if(!empty($receipt)){ foreach ($receipt as $r) { ?>

    <p style="margin-left: 1%;"><?=$r['receipt_promotion']?></p>

  <?php } }?>
  <p class="tq mb-0 showhere">Thank You</p>
  <br>
 </div>





    </div>
  </div>
</div>


<!-- Delete role-->
<div class="modal" id="delete-role-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content" >
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle reqcenter" id="exampleModalLongTitle" style="padding-left:25px;">Delete Role</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> -->
      </div>
      <div class="modal-body modalscroll">
        <table class="table">
          <thead>
              <tr style="background: #847d7d !important;color: red !important;">
                <th style="color: white;">Role</th>
                <th style="color: white;">Employee Count</th>
                <th style="color: white;">Roles</th>
              </tr>
          </thead>
          <tbody id="role_tbl">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <div style="text-align: center;">
          <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
          <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btndeleteRole">Delete</button>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- i9from  -->
<div class="modal" id="i9-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content ">
                <div class="modal-body pt-0 mt-5">
                    <div class="container">
                        <div class="row m-0 p-0">
                            <div class="d-flex w-100 jc-bet ai-fend mb-3">
                                <div class="formlogo-con">
                                    <img class='i9formlogo' src="<?php echo base_url(); ?>assets/cashier/images/homie.png" alt="">
                                </div>
                                <div class="i9head">
                                    <p class="m-0 i9lgtext i9headfont text-center i9bold">Employment Eligibility Verification</p>
                                    <p class="m-0 i9lgtext i9headfont text-center i9bold"> Department of Homeland Security</p>
                                    <p class="m-0  i9headfont text-center lightfonts"> U.S. Citizenship and Immigration Services</p>
                                </div>
                                <div class="i9head lh55">
                                    <p class="m-0 i9lgtext i9headfont text-center i9bold">USCIS</p>
                                    <p class="m-0 i9lgtext i9headfont text-center i9bold">Form I-9</p>
                                    <p class="m-0  i9headfont text-center lightfonts"> OMB No. 1615-0047 <br> Expires 10/31/2022</p>
                                    <!-- <p class="m-0  i9headfont text-center lightfonts">Expires 10/31/2022</p> -->
                                </div>
                            </div>
                            <hr class="line m-0">
                            <hr class="line m-0">
                            <hr class="line m-0">
                            <hr class="line m-0">
                            <hr class="line mt-1 mb-0">
                        </div>
                        <div class="row mt-1 m-0 p-0">
                            <p class="dftext m-0 i9bold">
                                ►START HERE: Read instructions carefully before completing this form. The instructions must be available, either in paper or electronically,
                                during completion of this form. Employers are liable for errors in the completion of this form.
                            </p>
                            <p class="dftext mt-1 mb-0">
                                <strong> ANTI-DISCRIMINATION NOTICE:</strong> It is illegal to discriminate against work-authorized individuals. Employers <strong>CANNOT</strong> specify which document(s) an
                                employee may present to establish employment authorization and identity. The refusal to hire or continue to employ an individual because the
                                documentation presented has a future expiration date may also constitute illegal discrimination.
                            </p>
                            <table class="table i9formTable mb-0 bb">
                                <tbody>
                                    <tr class="grayarea">
                                        <td class="p-1" colspan="100%">
                                            <p class="m-0 p-0 i9mdtext  "><b>Section 1. Employee Information and Attestation</b> <em>(Employees must complete and sign Section 1 of Form I-9 no later
                                                    than the <b>first day of employment</b>, but not before accepting a job offer.)</em></p>
                                        </td>
                                    </tr>
                                    <tr class="i9formrow bb">
                                        <td width='35%' class="p-1 bb">
                                            <div class="allcon">
                                            Last Name (Family Name)
                                            <input type="text" name="" id="i9lname" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                            </div>


                                        </td>
                                        <td width='25%' class="p-1 bb">First Name (Given Name) <input type="text" name="" id="i9fname" class="i9input" onkeypress="return onlyAlphabets(event,this);"/></td>
                                        <td width='15%' class="p-1 bb">Middle Initial <input type="text" name="" id="i9mname" class="i9input" onkeypress="return onlyAlphabets(event,this);"/></td>
                                        <td width='25%' class="p-1 bb">Other Last Names Used (if any) <input type="text" name="" id="i9oname" class="i9input" onkeypress="return onlyAlphabets(event,this);"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table bb i9formTable mb-0">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td width='40%' class="p-1 bt bb">Address (Street Number and Name) <input type="text" name="" id="i9address" class="i9input"/></td>
                                        <td width='15%' class="p-1 bt bb">Apt. Number <input type="text" name="" id="i9apt_no" class="i9input"/></td>
                                        <td width='25%' class="p-1 bt bb">City or Town <input type="text" name="" id="i9city" class="i9input"/></td>
                                        <td width='7%' class="p-1 bt bb">State <input type="text" name="" id="i9state" class="i9input"/></td>
                                        <td width='13%' class="p-1 bt bb">ZIP Code <input type="text" name="" id="i9zipcode" class="i9input"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table i9formTable">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td width='22%' class="p-1 bt bb">Date of Birth (mm/dd/yyyy) <input type="date" name="" id="i9dob" class="i9input"/></td>
                                        <td width='22%' class="p-1 bt bb">U.S. Social Security Number <input type="text" name="" id="security_no" class="i9input" maxlength="11"/></td>
                                        <td width='28%' class="p-1 bt bb">Employee's E-mail Address <input type="text" name="" id="i9email" class="i9input"/></td>
                                        <td width='28%' class="p-1 bt bb">Employee's Telephone Number <input type="tel" name="" id="i9phone" class="i9input phoneInput" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14"/></td>

                                    </tr>
                                </tbody>
                            </table>
                            <p class="dftext m-0 i9bold">
                                <strong>I am aware that federal law provides for imprisonment and/or fines for false statements or use of false documents in
                                    connection with the completion of this form.</strong>
                            </p>
                            <p class="dftext m-0 i9bold">
                                <strong>I attest, under penalty of perjury, that I am (check one of the following boxes):</strong>
                            </p>
                            <table class="table mb-0 i9formTable">
                                <tbody>
                                    <tr class="i9formrow bt bb">
                                        <td class="p-2 bt bb">
                                            <div class="m-0 p-0 d-flex  ai-center"><input class="mr-2" type="checkbox" name="" id="imprisonment_1">1. A citizen of the United States
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="i9formrow  bb">
                                        <td class="p-2 bt bb">
                                            <div class="m-0 p-0 d-flex  ai-center"><input class="mr-2" type="checkbox" name="" id="imprisonment_2">
                                                2. A noncitizen national of the United States</div>
                                        </td>
                                    </tr>
                                    <tr class="i9formrow  ">
                                        <td class="p-2 bt bb">
                                            <div class="m-0 p-0 d-flex  ai-center"><input class="mr-2" type="checkbox" name="" id="imprisonment_3">
                                                3. A lawful permanent resident <em>(Alien Registration Number/USCIS Number):</em><input type="number" name="" id="USCIS" class="i9input w-25 bbyes"/></div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table class="table i9formTable">
                                <tbody>

                                <tr class="i9formrow bt bb">
                                        <td class="p-2 bt bb">
                                            <div class="m-0 p-0 d-flex  ai-start"><input class="mr-2  mt-1" type="checkbox" name="" id="imprisonment_4">
                                                4. An alien authorized to work until  (expiration date, if applicable, mm/dd/yyyy):<input type="date" name="" id="imprisonment_date" class="i9input w-25 bbyes"/>

                                              <br>
                                            </div>
                                            <p class="m-0 p-2 pdt-0 pdb-0">
                                                Some aliens may write "N/A" in the expiration date field. <em>(See Intructions)</em>
                                            </p>
                                            <p class="m-0 p-2 pdt-0 pdb-0"><em>Aliens authorized to work must provide only one of the following document numbers to complete Form I-9:
                                                An Alien Registration Number/USCIS Number OR Form I-94 Admission Number OR Foreign Passport Number.</em></p>
                                        <p class="m-0 p-2 pdt-0 pdb-0">1. Alien Registration Number/USCIS Number:<input type="number" name="" id="USCIS_no" class="i9input w-25 bbyes"/></p>
                                        <p class="m-0 text-center w-100"><b>OR</b></p>
                                          <p class="m-0 p-2 pdt-0 pdb-0">2. Form I-94 Admission Number::<input type="number" name="" id="i9admission" class="i9input w-25 bbyes"/></p>
                                         <p class="m-0 text-center w-100"><b>OR</b></p>
                                          <p class="m-0 p-2 pdt-0 pdb-0">3. Foreign Passport Number:<input type="text" name="" id="passport_no" class="i9input w-25 bbyes"/></p>
                                          <p class="m-0 p-2 pdt-0 pdb-0">&nbsp;Country of Issuance:<input type="text" name="" id="country_nm" class="i9input w-25 bbyes"/></p>
                                    </td>
                                        <td class="p-2 bt bb vabot " width='25%'>
                                           <div class="add-infoi9 firstqr w-100">QR Code - Section 1 <br>
Do Not Write In This Space</div>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table mb-2 mt-2 i9formTable">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td width='50%' class="p-1 bt bb">Signature Of Employee
                                          <div class='js-signature'   data-width="auto"   data-height="60"></div>
                                          <button class="savesign h sign1">save</button>
                                          <button class="clearcanvas h">clear</button>
                                          <img id="sign_emp_image" src="" alt="" />
                                        </td>
                                        <td width='50%' class="p-1 bt bb">Today's Date (mm/dd/yyyy)
                                        <input type="date" name="" id="signature_date1" class="i9input"/>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <table class="table i9formTable mb-0 ">
                                <tbody>
                                    <tr class="grayarea">
                                        <td class="p-1" colspan="100%">
                                            <p class="m-0 p-0 i9mdtext  "><b>Preparer and/or Translator Certification (check one):</b></p>
                                             <div class="d-flex ai-center"><input type="checkbox" name="" id="translator1" class="mr-2" />I did not use a preparer or translator.<input type="checkbox" name="" id="translator2" class="mr-2 ml-4" />A preparer(s) and/or translator(s) assisted the employee in completing Section 1.</div>
                                            <p class="m-0 w-100 text-nowrap"> <em>(Fields below must be completed and signed when preparers and/or translators assist an employee in completing Section 1.)</em></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="dftext m-0 i9bold">
                                <strong>I attest, under penalty of perjury, that I have assisted in the completion of Section 1 of this form and that to the best of my
                                    knowledge the information is true and correct.</strong>
                            </p>
                            <table class="table mb-0 mt-1 i9formTable">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td width='75%' class="p-1 bt bb">Signature of Preparer or Translator
                                        <div class='js-signature'   data-width="auto"   data-height="60"></div>
                                        <button class="savesign h sign2">save</button>
                                        <button class="clearcanvas h">clear</button>
                                        <img id="sign_trans_image" src="" alt="" />
                                        </td>
                                        <td width='25%' class="p-1 bt bb">Today's Date (mm/dd/yyyy)
                                        <input type="date" name="" id="signature_date2" class="i9input"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table mb-0 m-0 bt i9formTable">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td width='50%' class="p-1 bt bb">Last Name (Family Name)
                                        <input type="text" name="" id="i9lname2" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                        <td width='50%' class="p-1 bt bb">First Name (Given Name)
                                        <input type="text" name="" id="i9fname2" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table mb-1 m-0 i9formTable bt">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td width='45%' class="p-1 bt bb">Address (Street Number and Name)
                                        <input type="text" name="" id="translator_addr" class="i9input"/>
                                        </td>
                                        <td width='30%' class="p-1 bt bb">City or Town
                                        <input type="text" name="" id="translator_city" class="i9input"/>
                                        </td>
                                        <td width='10%' class="p-1 bt bb">State
                                        <input type="text" name="" id="translator_state" class="i9input"/>
                                        </td>
                                        <td width='20%' class="p-1 bt bb">ZIP Code
                                        <input type="text" name="" id="translator_zip" class="i9input"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex w-100 mb-3 mt-3">
                                <p class="text-center m-0 w-100">Employer Completes Next Page</p>
                            </div>
                            <hr class="line m-0">
                            <div class="w-100 d-flex ai-center jc-bet mt-3">
                                <p class="m-0">Form I-9 10/21/2019</p>
                                <p class="m-0">Page 1 of 3</p>
                            </div>
                            <hr class="pagedivider">
                        </div>
                        <div class="row m-0 p-0">
                            <div class="d-flex w-100 jc-bet ai-fend mb-3">
                                <div class="formlogo-con">
                                    <img class='i9formlogo' src="<?php echo base_url(); ?>assets/cashier/images/homie.png" alt="">
                                </div>
                                <div class="i9head">
                                    <p class="m-0 i9lgtext i9headfont text-center i9bold">Employment Eligibility Verification</p>
                                    <p class="m-0 i9lgtext i9headfont text-center i9bold"> Department of Homeland Security</p>
                                    <p class="m-0  i9headfont text-center lightfonts"> U.S. Citizenship and Immigration Services</p>
                                </div>
                                <div class="i9head lh55">
                                    <p class="m-0 i9lgtext i9headfont text-center i9bold">USCIS</p>
                                    <p class="m-0 i9lgtext i9headfont text-center i9bold">Form I-9</p>
                                    <p class="m-0  i9headfont text-center lightfonts"> OMB No. 1615-0047 <br> Expires 10/31/2022</p>
                                    <!-- <p class="m-0  i9headfont text-center lightfonts">Expires 10/31/2022</p> -->
                                </div>
                            </div>
                            <hr class="line m-0">
                            <hr class="line m-0">
                            <hr class="line m-0">
                            <hr class="line m-0">
                        </div>
                        <div class="row mt-1 m-0 p-0">
                        <table class="table i9formTable mb-0 bb">
                                <tbody>
                                    <tr class="grayarea">
                                        <td class="p-1" colspan="100%">
                                            <p class="m-0 p-0 i9mdtext  "><b>Section 2. Employer or Authorized Representative Review and Verification</b> <br>
                                             <em>(Employers or their authorized representative must complete and sign Section 2 within 3 business days of the employee's first day of employment. You
must physically examine one document from List A OR a combination of one document from List B and one document from List C as listed on the "Lists
of Acceptable Documents.")</em></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table class="table mb-1 m-0 i9formTable doubleb ">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td width='22%' class="p-1 bt bb"><b>Employee Info from Section 1</b></td>
                                        <td width='22%' class="p-1 bt bb vatop">Last Name (Family Name)
                                        <input type="text" name="" id="i9lname3" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                        <td width='22%' class="p-1 bt bb vatop">First Name (Given Name)
                                        <input type="text" name="" id="i9fname3" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                        <td width='7%' class="p-1 bt bb vatop">M.I.
                                        <input type="text" name="" id="i9mname3" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                        <td width='25%' class="p-1 bt bb vatop">Citizenship/Immigration Status
                                        <input type="text" name="" id="citizen_country" class="i9input"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table mb-1 m-0 bb bt br bl i9formTable  ">
                                <tbody>

                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1  br bl bt bb i9bold text-center">List A <br>
Identity and Employment Authorization</td>
                                        <td width='5%' class="p-1  br bl bt bb vatop i9bold text-center">OR</td>
                                        <td width='30%' class="p-1  br bl bt bb vatop i9bold text-center">List B <br> Identity</td>
                                        <td width='5%' class="p-1  br bl bt bb vatop i9bold text-center">AND</td>
                                        <td width='30%' class="p-1  br bl bt bb vatop i9bold text-center">List C <br>Employment Authorization</td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Document Title
                                               <input type="text" name="" id="doc_title_1" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb vatop grayarea"></td>
                                        <td width='30%' class="p-1  br vatop ">Document Title
                                               <input type="text" name="" id="doc_title_4" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1   vatop br bl"></td>
                                        <td width='30%' class="p-1 bl  vatop ">Document Title
                                               <input type="text" name="" id="doc_title_5" class="i9input"/>
                                        </td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Issuing Authority
                                               <input type="text" name="" id="issuing_authority_1" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb bt vatop grayarea"></td>
                                        <td width='30%' class="p-1  br vatop ">Issuing Authority
                                               <input type="text" name="" id="issuing_authority_4" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1   vatop br bl"></td>
                                        <td width='30%' class="p-1 bl  vatop ">Issuing Authority
                                               <input type="text" name="" id="issuing_authority_5" class="i9input"/>
                                        </td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Document Number
                                               <input type="text" name="" id="doc_number_1" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb bt vatop grayarea"></td>
                                        <td width='30%' class="p-1  br vatop ">Document Number
                                               <input type="text" name="" id="doc_number_4" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1   vatop br bl"></td>
                                        <td width='30%' class="p-1 bl  vatop ">Document Number
                                               <input type="text" name="" id="doc_number_5" class="i9input"/>
                                        </td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Expiration Date (if any) (mm/dd/yyyy)
                                               <input type="date" name="" id="doc_expiry_1" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1  bt vatop grayarea"></td>
                                        <td width='30%' class="p-1  br vatop ">Expiration Date (if any) (mm/dd/yyyy)
                                               <input type="date" name="" id="doc_expiry_4" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1   vatop br bl"></td>
                                        <td width='30%' class="p-1 bl  vatop ">Expiration Date (if any) (mm/dd/yyyy)
                                               <input type="date" name="" id="doc_expiry_5" class="i9input"/>
                                        </td>
                                    </tr>
                                   <tr class='bb bt'>
                                   <td colspan='1' class='p-0 bb bt'> <hr class='line m-0'></td>
                                   <td width='5%' class="p-0 bb  bt vatop grayarea"></td>
                                       <td colspan='3' class='p-0 bb bt'> <hr class='line m-0'></td>
                                   </tr>
                                   <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Document Title
                                        <input type="text" name="" id="doc_title_2" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb bt novm grayarea"></td>
                                        <td colspan="3" rowspan='9' class="p-1   vatop ">
                                            <div class="add-qr d-flex jc-bet">
                                            <div class="add-infoi9">Additional Information</div>
                                            <div class="qri9">QR Code - Sections 2 & 3 <br>
Do Not Write In This Space</div>
                                        </div></td>

                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Issuing Authority
                                        <input type="text" name="" id="issuing_authority_2" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb bt vatop grayarea"></td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Document Number
                                        <input type="text" name="" id="doc_number_2" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb bt vatop grayarea"></td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Expiration Date (if any) (mm/dd/yyyy)
                                        <input type="date" name="" id="doc_expiry_2" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb bt vatop grayarea"></td>
                                    </tr>
                                    <tr class='bb bt'>
                                   <td colspan='1' class='p-0 bb'> <hr class='line m-0'></td>
                                   <td width='5%' class="p-0 bb  bt vatop grayarea"></td>

                                   </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Document Title
                                        <input type="text" name="" id="doc_title_3" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb bt vatop grayarea"></td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Issuing Authority
                                        <input type="text" name="" id="issuing_authority_3" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb bt vatop grayarea"></td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Document Number
                                        <input type="text" name="" id="doc_number_3" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1 bb bt vatop grayarea"></td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   ">Expiration Date (if any) (mm/dd/yyyy)
                                        <input type="date" name="" id="doc_expiry_3" class="i9input"/>
                                        </td>
                                        <td width='5%' class="p-1  bt vatop grayarea"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="dftext m-0 i9bold">
                                <strong>Certification: I attest, under penalty of perjury, that (1) I have examined the document(s) presented by the above-named employee,
(2) the above-listed document(s) appear to be genuine and to relate to the employee named, and (3) to the best of my knowledge the
employee is authorized to work in the United States. <br>
The employee's first day of employment (mm/dd/yyyy): <input type="text" name="" id="" class="i9input w-25 bbyes"/>(See instructions for exemptions)
</strong>
                            </p>
                            <table class="table mb-0 m-0 i9formTable  ">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td  class="p-1 bt bb" width='37%'>Signature of Employer or Authorized Representative
                                          <div class='js-signature'   data-width="auto"   data-height="60"></div>
                                          <button class="savesign h sign3">save</button>
                                          <button class="clearcanvas h">clear</button>
                                          <img id="authorized_sign" src="" alt="" />
                                        </td>
                                        <td  class="p-1 bt bb vatop">Today's Date (mm/dd/yyyy)
                                        <input type="date" name="" id="authorized_sign_date" class="i9input"/>
                                        </td>
                                        <td  class="p-1 bt bb vatop">Title of Employer or Authorized Representative
                                        <input type="text" name="" id="authorized_title" class="i9input"/>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <table class="table mb-0 m-0 i9formTable  ">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td  class="p-1 bt bb">Last Name of Employer or Authorized Representative
                                        <input type="text" name="" id="i9lname4" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                        <td  class="p-1 bt bb vatop">First Name of Employer or Authorized Representative
                                        <input type="text" name="" id="i9fname4" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                        <td  class="p-1 bt bb vatop">Employer's Business or Organization Name
                                        <input type="text" name="" id="emp_organization" class="i9input"/>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <table class="table mb-0 m-0 i9formTable  ">
                                <tbody>

                                    <tr class="i9formrow bt bb">
                                        <td width='55%'  class="p-1 bt bb">Employer's Business or Organization Address (Street Number and Name)
                                        <input type="text" name="" id="organization_addres" class="i9input"/>
                                        </td>
                                        <td  class="p-1 bt bb vatop">City or Town
                                        <input type="text" name="" id="organization_city" class="i9input"/>
                                        </td>
                                        <td  class="p-1 bt bb vatop">State
                                        <input type="text" name="" id="organization_state" class="i9input"/>
                                        </td>
                                        <td  class="p-1 bt bb vatop">ZIP Code
                                        <input type="text" name="" id="organization_zipcode" class="i9input"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table i9formTable mb-0 ">
                                <tbody>
                                    <tr class="grayarea i9formrow bt">
                                        <td class="p-1" colspan="100%">
                                            <p class="m-0 p-0 i9mdtext  "><b>Section 3. Reverification and Rehires</b>
                                             <em>(To be completed and signed by employer or authorized representative.)
of Acceptable Documents.")</em></p>
                                        </td>
                                    </tr>
                                    <tr class="grayarea bt i9formrow">
                                        <td class="p-1" width="70%">
                                            <p class="m-0 p-0   ">A. New Name
                                             <em>(If applicable)</em></p>
                                        </td>
                                        <td class="p-1" width="30%">
                                            <p class="m-0 p-0   ">B. Date of Rehire
                                             <em>(If applicable)</em></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table class="table mb-0 m-0 i9formTable  ">
                                <tbody>

                                <tr class="i9formrow bt bb">
                                        <td   class="p-1 bt bb">Last Name (Family Name)
                                        <input type="text" name="" id="i9lname5" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                        <td  class="p-1 bt bb vatop">First Name (Given Name)
                                        <input type="text" name="" id="i9fname5" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                        <td  class="p-1  bb vatop">Middle Initial
                                        <input type="text" name="" id="i9mname5" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>
                                        <td width='30%' class="p-1  bb vatop">Date (mm/dd/yyyy)
                                        <input type="date" name="" id="re_hire_date" class="i9input"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table i9formTable mb-0 ">
                                <tbody>
                                    <tr class="grayarea i9formrow bt">
                                        <td class="p-1" colspan="100%">
                                            <p class="m-0 p-0   ">C. If the employee's previous grant of employment authorization has expired, provide the information for the document or receipt that establishes
continuing employment authorization in the space provided below.</em></p>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                            <table class="table mb-0 m-0 i9formTable  ">
                                <tbody>

                                <tr class="i9formrow bt bb">
                                        <td   class="p-1 bt bb">Document Title
                                        <input type="text" name="" id="doc_title_6" class="i9input"/>
                                        </td>
                                        <td  class="p-1 bt bb vatop">Document Number
                                        <input type="number" name="" id="doc_no_6" class="i9input"/>
                                        </td>
                                        <td  class="p-1  bb vatop">Expiration Date (if any) (mm/dd/yyyy)
                                        <input type="date" name="" id="doc_expiry_6" class="i9input"/>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <p class="dftext m-0 i9bold">
                                <strong>I attest, under penalty of perjury, that to the best of my knowledge, this employee is authorized to work in the United States, and if
the employee presented document(s), the document(s) I have examined appear to be genuine and to relate to the individual.
</strong>
                            </p>
                            <table class="table mb-0 m-0 i9formTable  ">
                                <tbody>

                                <tr class="i9formrow bt bb">
                                    <td   class="p-1 bt bb" width='37%'>Signature of Employer or Authorized Representative
                                        <div class='js-signature'   data-width="auto"   data-height="60"></div>
                                        <button class="savesign h">save</button>
                                        <button class="clearcanvas h">clear</button>
                                        <img id="authorized_sign1" src="" alt="" />
                                    </td>
                                        <td  class="p-1 bt bb vatop">Today's Date (mm/dd/yyyy)
                                        <input type="date" name="" id="authorized_sign_date1" class="i9input"/>
                                        </td>
                                        <td  class="p-1  bb vatop">Name of Employer or Authorized Representative
                                        <input type="text" name="" id="i9rname" class="i9input" onkeypress="return onlyAlphabets(event,this);"/>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <hr class="line m-0 mt-5">
                            <div class="w-100 d-flex ai-center jc-bet mt-3">
                                <p class="m-0">Form I-9 10/21/2019</p>
                                <p class="m-0">Page 2 of 3</p>
                            </div>
                            <hr class="pagedivider">
                            <hr class="line m-0">
                            <hr class="line m-0">
                            <hr class="line m-0">
                            <hr class="line m-0">
                            <hr class="line mt-1 mb-0">
                            <p class="m-0 text-center i9bold i9lgtext w-100">LISTS OF ACCEPTABLE DOCUMENTS <br>All documents must be UNEXPIRED</p>

                            <p class="m-0 text-center  i9mdtext mt-4">Employees may present one selection from List A
or a combination of one selection from List B and one selection from List C.</p>
<table class="table mb-1 m-0 bb bt br bl i9formTable  ">
                                <tbody>

                                    <tr class="i9formrow bb">
                                        <td width='30%'class="p-1  br bl bt bb i9bold text-center">List A <br>
                                        Documents that Establish
Both Identity and
Employment Authorization</td>
                                        <td width='5%' class="p-1  br bl bt bb  i9bold text-center grayarea vabot">OR</td>
                                        <td width='30%' class="p-1  br bl bt bb vatop i9bold text-center">List B <br> Documents that Establish
Identity</td>
                                        <td width='5%' class="p-1  br bl bt bb  i9bold text-center vabot">AND</td>
                                        <td width='30%' class="p-1  br bl bt bb vatop i9bold text-center">List C <br>Documents that Establish
Employment Authorization</td>
                                    </tr>
                                    <tr class="i9formrow bt bb br bl">
                                        <td width='30%'class="p-1   vatop">

                                            <div class="brow1">1. U.S. Passport or U.S. Passport Card</div>

                                            <div class="brow1">2. Permanent Resident Card or Alien
                                            Registration Receipt Card (Form I-551)</div>
                                            <div class="brow1">3. Foreign passport that contains a
                                            temporary I-551 stamp or temporary
                                            I-551 printed notation on a machinereadable
                                            immigrant visa</div>
                                            <div class="brow1">4. Employment Authorization Document
that contains a photograph (Form
I-766)</div>
                                            <div class="brow1 ">
                                            5. For a nonimmigrant alien authorized
to work for a specific employer
because of his or her status: <br>
<strong>a</strong>Foreign passport; and <br>
<strong>b</strong>Form I-94 or Form I-94A that has
the following: <br>
(1) The same name as the passport;
and<br>
(2) An endorsement of the alien's
nonimmigrant status as long as
that period of endorsement has
not yet expired and the
proposed employment is not in
conflict with any restrictions or
limitations identified on the form.
                                            </div>
                                            <div class="brow1 bb">
                                            6. Passport from the Federated States
of Micronesia (FSM) or the Republic
of the Marshall Islands (RMI) with
Form I-94 or Form I-94A indicating
nonimmigrant admission under the
Compact of Free Association Between
the United States and the FSM or RMI
                                            </div>

                                        </td>
                                        <td width='5%' class="p-1 bb vatop grayarea"></td>
                                        <td width='30%' class="p-1  br vatop " rowspan='3'><div class="brow1">1. Driver's license or ID card issued by a
                                            State or outlying possession of the
                                            United States provided it contains a
                                            photograph or information such as
                                            name, date of birth, gender, height, eye
                                            color, and address</div>
                                        <div class="brow1">
                                           2. ID card issued by federal, state or local
                                            government agencies or entities,
                                            provided it contains a photograph or
                                            information such as name, date of birth,
                                            gender, height, eye color, and addres
                                        </div>
                                        <div class="brow1">
                                        3. School ID card with a photograph
                                        </div>
                                        <div class="brow1">4. Voter's registration card</div>
                                        <div class="brow1">5. U.S. Military card or draft record</div>
                                        <div class="brow1">6. Military dependent's ID card</div>
                                        <div class="brow1">7. U.S. Coast Guard Merchant Mariner
Card</div>
                                        <div class="brow1">8. Native American tribal document</div>
                                        <div class="brow1">9. Driver's license issued by a Canadian
government authority</div>
                                        <div class="brow1 text-center i9bold">For persons under age 18 who are
unable to present a document
listed above:</div>
                                        <div class="brow1">10. School record or report card</div>
                                        <div class="brow1">11. Clinic, doctor, or hospital record</div>
                                        <div class="brow1 bb">12. Day-care or nursery school record</div>
                                        </td>
                                        <!-- <td width='5%' class="p-1   vatop br bl"></td> -->
                                        <td width='30%' class="p-1   vatop " colspan="2" rowspan='3'><div class="brow1"> 1. A Social Security Account Number
                                            card, unless the card includes one of
                                            the following restrictions: <br>(1) NOT VALID FOR EMPLOYMENT<br>2) VALID FOR WORK ONLY WITH
                                            INS AUTHORIZATION<br>
                                            (3) VALID FOR WORK ONLY WITH
                                            DHS AUTHORIZATION
                                        </div>
                                        <div class="brow1">2. Certification of report of birth issued
by the Department of State (Forms
DS-1350, FS-545, FS-240)</div>
<div class="brow1">
3. Original or certified copy of birth
certificate issued by a State,
county, municipal authority, or
territory of the United States
bearing an official seal
</div>
<div class="brow1">4. Native American tribal document</div>
<div class="brow1">5. U.S. Citizen ID Card (Form I-197)</div>
<div class="brow1">6. Identification Card for Use of
Resident Citizen in the United
States (Form I-179)</div>
<div class="brow1 bb">7. Employment authorization
document issued by the
Department of Homeland Security</div>
                                        </td>
                                    </tr>
                                </tbody>
                                                    </table>
<p class="m-0 text-center i9bold i9lgtext w-100">Examples of many of these documents appear in the Handbook for Employers (M-274).</p>
<p class="m-0 text-center i9bold i9lgtext w-100 mt-5">Refer to the instructions for more information about acceptable receipts.</p>
<hr class="line m-0 mt-5">
                            <div class="w-100 d-flex ai-center jc-bet mt-3">
                                <p class="m-0">Form I-9 10/21/2019</p>
                                <p class="m-0">Page 3 of 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn subbtn-modal denybtn i9FormUpdate" id="ni9formAdd" data-dismiss="modal">Submit</button>
                        <button  type="button" class="thisone btn subbtn-modal denybtn i9close" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- i9 form end -->
<!-- W4 Form -->
<div class="modal" id="w4-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content ">
                <div class="modal-body pt-0 mt-5">
                 <div class="container">
                   <div class="row m-0 p-0">
                       <table class="table firstHead">
                           <tbody>
                               <tr>
                                   <td width='22.6666666667%' class='bl bt p-0'>
                                       <p class="m-0 p-0 lh-2 mtt text-nowrap">Form<span class="big ">W-4</span><br>
                                    (Rev. December 2020)<br>
                                    Department of the Treasury<br>
                                    Internal Revenue Service
                                </p></td>
                                   <td width='66.6666666667%' class="text-center bt">
                                       <p class="m-0 p-0 text-center mb-2  w-4title  ">
                                           Employee’s Withholding Certificate
                                        </p>
                                           <p class="m-0 w-subt">▶Complete Form W-4 so that your employer can withhold the correct federal income tax from your pay.<br>
                                          ▶ Give Form W-4 to your employer. <br>
                                         ▶ Your withholding is subject to review by the IRS.

                                </p>
                                   </td>
                                   <td width='16.6666666667%' class=' br bt'>
                                       <p class="m-0 p-0 w-sut light text-center">OMB No. 1545-0074</p>
                                       <hr class='line mt-1 mb-1'>
                                       <p class="m-0 p-0 pt-2 big text-center">
                                           2021
                                       </p>
                                   </td>
                               </tr>
                           </tbody>
                       </table>
                       <table class="table firstHead">
                        <tbody>
                            <tr>
                                <td width='12%' rowspan='4' class='bl novm '>
                                    <p class="m-0 p-0 lh-2 s1">Step 1:
                                        Enter
                                        Personal
                                        Information
                             </p></td>
                                <td width='34%' class=" p-1 text-left pb-0">
                                    <p class="m-0 p-0 ">(a) First name and middle initial</p>
                                    <input class="input names " id='m-fname' type="text" onkeypress="return onlyAlphabets(event,this);">
                                </td>
                                <td width='34%' class="p-1 text-left pb-0">
                                    <p class="m-0 p-0 ">Last Name</p>
                                    <input class="input  names "  id='m-lname' type="text" onkeypress="return onlyAlphabets(event,this);">
                                </td>
                                <td width='20%' class=' text-left br pb-0 p-1'>
                                <p class='m-0 p-0 text-nowrap'><b>(b) Social security number</b></p>

                                <input class="number" type="text" id="security_number" maxlength="11">
                                </td>
                            </tr>
                            <tr>

                                <td width='34%' colspan='2' class='p-1  vabot'>
                                    <p class="m-0 p-0">Address</p>
                                    <input id='m-address' pattern="^[a-zA-Z0-9_.-]*$"  class="input " type="text">
                                </td>

                                <td width='20%' class='novm br p-1' style="line-height: 1em;" rowspan="2">
                                    ▶<b> Does your name match the
                                    name on your social security
                                    card?</b> If not, to ensure you get
                                    credit for your earnings, contact
                                    SSA at 800-772-1213 or go to
                                    <em>www.ssa.gov.</em>
                                </td>
                            </tr>
                            <tr>

                                <td width='34%' colspan='2' class='p-1 vabot'>
                                    <p class="m-0 p-0 ">City or town, state, and ZIP code</p>
                                    <input class="input " type="text" id='m-zip'>
                                </td>


                            </tr>
                            <tr>

                                <td colspan="3" class="br p-1">
                                    <div class="checkcon ">
                                       <strong>(c)</strong>  <input  type="checkbox" name="filling_condition" value="1" id="fill_1"> <label for="" class="w-subt"><b>Single</b> or Married filing separately</label><br>
                                      <input type="checkbox" class='ml-3' name="filling_condition" value="2" id="fill_2"> <label for="" class="w-subt">Married filing jointly or Qualifying widow(er)</label><br>
                                  <div class="m-0 d-flex">    <input type="checkbox" class='ml-3 mr-1' name="filling_condition" value="3" id="fill_3"> <label for="" class="w-subt">Head of household (Check only if you’re unmarried and pay more than half the costs of keeping up a home for yourself and a qualifying individual.)</label></div>
                                  </div>
                                </td>


                            </tr>
                            <tr>

                                <td colspan="4" class="br bl">
                                   <p class="m-0"><strong>Complete Steps 2–4 ONLY if they apply to you; otherwise,<strong>skip</strong> to Step 5.</strong> See page 2 for more information on each step, who can
                                    claim exemption from withholding, when to use the estimator at www.irs.gov/W4App, and privacy.</p>
                                </td>


                            </tr>
                            <tr>

                                <td colspan="4" class="br bl bb">

                                    <div class="d-flex">
                                        <div class="w4left lh-2 s1">Step 2: <br>
                                            Multiple Jobs <br>
                                            or Spouse <br>
                                            Works</div>
                                            <div class="w4right pl-2" ><p style="font-size:14px; float:left !important;margin-left:10px;">Complete this step if you (1) hold more than one job at a time, or (2) are married filing jointly and your spouse
                                            also works. The correct amount of </p><p style="font-size:14px; float:left !important;margin-left:10px;">withholding depends on income earned from all of these jobs.</p><br>
                                            <p style="font-size:14px; float:left !important;margin-left:10px;">Do <b>only one</b> of the following. </p><br>
                                            <p style="font-size:14px; float:left !important;margin-left:10px;"><strong> (a) </strong> Use the estimator at www.irs.gov/W4App for most accurate withholding for this step (and Steps 3–4); <b>or</b></p></p> <br>
                                            <p style="font-size:14px; float:left !important;margin-left:10px;"><strong> (b) </strong> Use the Multiple Jobs Worksheet on page 3 and enter the result in Step 4(c) below for roughly accurate withholding; <b>or</b></p> <br>
                                            <p style="font-size:14px; float:left !important;margin-left:10px;"><strong> (c) </strong> If there are only two jobs total, you may check this box. Do the same on Form W-4 for the other job. This option </p><br>
                                            <p style="font-size:13px; float:left !important;margin-left:10px;">is accurate for jobs with similar pay; otherwise, more tax than necessary may be withheld . . . . . ▶ <input type="checkbox" id="step2" name="step2" value="1"></p><br> <br>
                                            <p style="font-size:13px; float:left !important;margin-left:10px;"><strong>TIP:</strong> To be accurate, submit a 2021 Form W-4 for all other jobs. If you (or your spouse) have self-employment</p>
                                            <p style="font-size:13px; float:left !important;margin-left:10px;">income, including as an independent contractor, use the estimator.</p></div>
                                    </div>
                                   <p class="m-0 mt-2"> <p style="font-size:13px; float:left !important;margin-left:10px;"><strong>Complete Steps 3–4(b) on Form W-4 for <b>only ONE</b> of these jobs.</strong> Leave those steps blank for the other jobs. (Your withholding will be most accurate </p><p style="font-size:13px; float:left !important;margin-left:10px;">if you complete Steps 3–4(b) on the Form W-4 for the highest paying job.)</p>
                                </td>


                            </tr>

                        </tbody>
                    </table>
                    <table class='firstHead'>
                        <tbody>
                            <tr>
                                <td class=" bl br vatop" width='16%'>

                                    <div class="w4left lh-2 s1 mt-3">Step 3:<br />
                                        Claim<br />
                                        Dependents
                                </td>
                                <td  class="br bl vabot" colspan="2">

                                   <P class="m-0  ">If your total income will be $200,000 or less ($400,000 or less if married filing jointly):
                                    <p class="m-0 p-2 pt-0 pb-0">  Multiply the number of qualifying children under age 17 by $2,000
                                    ▶ <input type="text" id="qufy_childern" name="qufy_childern" class="input2" style='width:16%;' onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></p>
                                    <p class="m-0  p-2 pt-0 pb-0">Multiply the number of other dependents by $500 . . . . . . . . . . . . .
                                    ▶  <input type="text" id="ot_dependents" name="ot_dependents" class="input2 " style='width:16%;' onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></p>

                                     </P>
                                     <p class="m-0">Add the amounts above and enter the total here....................................</p>
                                </td>
                                <td  width='30px' class='p-0 vabot text-center' >

                                   <b>3</b>
                                </td>

                                <td width='16%' class=" br vabot">

                                 <label>$</label>   <input type="text" class="input" name="total_amt" id="total_amt" value="" readonly onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </td>
                            </tr>
                            <tr>
                                <td rowspan="3" class=" bl br vatop" width='16%'>

                                    <div class="w4left lh-2 s1 mt-3">Step 4:<br />
                                        Claim<br />
                                        Dependents
                                </td>
                                <td  class="br bl pt-2  vabot bb" colspan="2">

                                   <P class="m-0  "><b>(a)
                                    Other income (not from jobs)</b>. If you want tax withheld for other income you expect
                                    this year that won’t have withholding, enter the amount of other income here. This may
                                    include interest, dividends, and retirement income . . . . . . . . . . . .
                                    </P>
                                </td>
                                <td  width='50px' class='p-0 vabot text-center' >
                                <b>4(a)</b>

                                </td>

                                <td  class=" br vabot">

                                <label>$</label>   <input class='input2' id="oincome" name="other_income" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </td>
                            </tr>
                            <tr>

                                <td  class="br bl bt pt-2 pb-2 vabot bb" colspan="2">

                                   <P class="m-0  "><b>(b)
                                    Deductions</b>. If you expect to claim deductions other than the standard deduction <br>
                                    and want to reduce your withholding, use the Deductions Worksheet on page 3 and <br>
                                    enter the result here . . . . . . . . . . . . . . . . . . . . .
                                    </P>
                                </td>
                                <td  width='50px' class='p-0 vabot text-center' >
                                   <b>4(b)</b>

                                </td>

                                <td  class=" br vabot">

                                <label>$</label>   <input class='input2' id="Deductions" name="Deductions" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </td>
                            </tr>
                            <tr>

                                <td  class="br bl bt pt-2 pb-2  vabot bb" colspan="2">

                                   <P class="m-0  "><b>(c) Extra withholding</b>. Enter any additional tax you want withheld each <b>pay period .</b>
                                    </P>
                                </td>
                                <td  width='50px' class='p-0 vabot text-center' >
                                <b>4(c)</b>

                                </td>

                                <td  class=" br vabot">

                                  <label>$</label>  <input class='input2' id="withholding" name="withholding" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </td>
                            </tr>
                            <tr>
                                <td class=" bl vatop" width='16%'>

                                    <div class="w4left lh-2 s1 mt-3">Step 5:<br />
                                        Sign<br />
                                        Here
                                </td>
                                <td  class="br bl  p-2 bb" colspan="4">

                                   <P class="m-0  ">Under penalties of perjury, I declare that this certificate, to the best of my knowledge and belief, is true, correct, and complete. <br>

                                    </P>
                                    <p class="m-0 mt-3">
                                      <!-- prashant -->
                                      <div id="viewSign" style="display:none;">
                                          <img id="uploaded_image" src="" alt="" />
                                      </div><br/>
                                      <!--prashant end  -->
                                    <div class="m-0 d-flex align-items-end w-100">
                                    <div class="m-0 w-50">
                                    <div class='js-signature'></div>
                                    <button class="savesign">save</button>
                                    <button class="clearcanvas">clear</button>

                                    ▶ <hr class="line m-0 w-75">
                                    Employee’s signature (This form is not valid unless you sign it.)
                                      </div>
                                      <div class="m-0 w-50">
                                      ▶ <input type="date" name="sign_date" id="sign_date"/>
                                     <hr class="line m-0 w-75">
                                        <!-- <div class='date-canva'></div> -->
                                        <!-- <input type="date"/>
                                        <button class="savesign2">save</button>
                                        <button class="clearcanvas2">clear</button> -->


                                    Date
                                      </div>


                                    </div>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                    <table class="firstHead">
                        <tbody>
                            <tr>
                                <td class=" bl vatop" width='16%'>

                                    <div class="w4left lh-2 s1 mt-3">Employers<br />
                                        Only
                                </td>
                                <td  class="br bl p-1 pb-0 vabot " colspan="2">

                                   <P class="m-0  ">Employer’s name and address <br>

                                    </P>
                                    <textarea name="name_with_address" id="name_with_address" rows="3" class="area-w4 "></textarea>
                                </td>
                                <td    class='p-0 vabot ' >
                                  <div class="d-flex justify-content-between flex-column h-100">
                                      <p class="m-0 pt-0 pb-0 p-2">First date of employment</p>
                                      <input class=' mt-4' type="date" name="employment_date" id="employment_date">

                                  </div>

                                </td>

                                <td    class=" br vabot ">

                                    <div class="d-flex justify-content-between flex-column h-100">
                                        <p class="m-0 pt-0 pb-0 p-2">Employer identification
                                            number (EIN)</p>
                                         <input class='input2 mt-2' type="number" name="EIN" id="EIN" min="0">

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex w-100 justify-content-between pt-3 mb-5">
                        <p class="m-0"><strong>For Privacy Act aand PaperWork Reduction Act Notice, see page 3</strong></p>
                        <p class="m-0"> Cat.No. 10220Q</p>
                        <p class="m-0">Form <strong>W-4</strong>(2021)</p>
                    </div>
                    <div class="d-flex w-100 justify-content-between pt-3 mb-5 bbset">

                        <p class="m-0">Form W-4 (2021)</p>
                        <p class="m-0">Page <strong>2</strong></p>
                    </div>
             <div class="container">
                 <div class="row m-0 p-0">

                         <div class="col-md-6 m-0 p-0 insFont"><h4 class=' bold'><strong>General Instructions</strong></h4>
                            <h5 class=' bold'> <strong>Future Developments </strong></h5>
                            For the latest information about developments related to<br />
                            Form W-4, such as legislation enacted after it was published,<br />
                            go to www.irs.gov/FormW4.
                           <h5 class="bold mt-2"> <strong>Purpose of Form</strong></h5>
                            Complete Form W-4 so that your employer can withhold the<br />
                            correct federal income tax from your pay. If too little is<br />
                            withheld, you will generally owe tax when you file your tax<br />
                            return and may owe a penalty. If too much is withheld, you<br />
                            will generally be due a refund. Complete a new Form W-4<br />
                            when changes to your personal or financial situation would<br />
                            change the entries on the form. For more information on<br />
                            withholding and when you must furnish a new Form W-4,<br />
                            see Pub. 505, Tax Withholding and Estimated Tax.<br />
                            <strong>Exemption from withholding.</strong> You may claim exemption<br />
                            from withholding for 2021 if you meet both of the following<br />
                            conditions: you had no federal income tax liability in 2020<br />
                            <strong>and</strong> you expect to have no federal income tax liability in<br />
                            2021. You had no federal income tax liability in 2020 if (1)<br />
                            your total tax on line 24 on your 2020 Form 1040 or 1040-SR<br />
                            is zero (or less than the sum of lines 27, 28, 29, and 30), or<br />
                            (2) you were not required to file a return because your<br />
                            income was below the filing threshold for your correct filing<br />
                            status. If you claim exemption, you will have no income tax<br />
                            withheld from your paycheck and may owe taxes and<br />
                            penalties when you file your 2021 tax return. To claim<br />
                            exemption from withholding, certify that you meet both of<br />
                            the conditions above by writing “Exempt” on Form W-4 in<br />
                            the space below Step 4(c). Then, complete Steps 1(a), 1(b),<br />
                            and 5. Do not complete any other steps. You will need to<br />
                            submit a new Form W-4 by February 15, 2022.<br />
                            <strong>Your privacy</strong>. If you prefer to limit information provided in<br />
                            Steps 2 through 4, use the online estimator, which will also<br />
                            increase accuracy.<br />
                            As an alternative to the estimator: if you have concerns<br />
                            with Step 2(c), you may choose Step 2(b); if you have<br />
                            concerns with Step 4(a), you may enter an additional amount<br />
                            you want withheld per pay period in Step 4(c). If this is the<br />
                            only job in your household, you may instead check the box<br />
                            in Step 2(c), which will increase your withholding and<br />
                            significantly reduce your paycheck (often by thousands of<br />
                            dollars over the year).<br />
                            <strong>When to use the estimator</strong>. Consider using the estimator at<br />
                            www.irs.gov/W4App if you:<br />
                            1. Expect to work only part of the year;<br />
                            2. Have dividend or capital gain income, or are subject to<br />
                            additional taxes, such as Additional Medicare Tax;<br />
                            3. Have self-employment income (see below); or<br />
                            4. Prefer the most accurate withholding for multiple job<br />
                            situations.<br />
                            <strong>Self-employment</strong>. Generally, you will owe both income and<br />
                            self-employment taxes on any self-employment income you<br />
                            receive separate from the wages you receive as an<br />
                            employee. If you want to pay these taxes through<br />
                            withholding from your wages, use the estimator at<br />
                            www.irs.gov/W4App to figure the amount to have withheld.<br />
                            <strong>Nonresident alien</strong>. If you’re a nonresident alien, see Notice<br />
                            1392, Supplemental Form W-4 Instructions for Nonresident<br />
                            Aliens, before completing this form.</div>
                         <div class="col-md-6 m-0 p-0 insFont"><h4 class="bold"><strong>Specific</strong> Instructions</h4>
                            <strong>Step 1(c)</strong>. Check your anticipated filing status. This will<br />
                            determine the standard deduction and tax rates used to<br />
                            compute your withholding.<br />
                            <strong>Step 2</strong>. Use this step if you (1) have more than one job at the<br />
                            same time, or (2) are married filing jointly and you and your<br />
                            spouse both work.<br />
                            Option <strong>(a)</strong> most accurately calculates the additional tax<br />
                            you need to have withheld, while option <strong> (b)</strong> does so with a<br />
                            little less accuracy.<br />
                            If you (and your spouse) have a total of only two jobs, you<br />
                            may instead check the box in option <strong> (c)</strong>. The box must also<br />
                            be checked on the Form W-4 for the other job. If the box is<br />
                            checked, the standard deduction and tax brackets will be<br />
                            cut in half for each job to calculate withholding. This option<br />
                            is roughly accurate for jobs with similar pay; otherwise, more<br />
                            tax than necessary may be withheld, and this extra amount<br />
                            will be larger the greater the difference in pay is between the<br />
                            two jobs.<br />
                            &#9888;

                            <em><strong>Multiple jobs</strong>. Complete Steps 3 through 4(b) on only<br />
                            one Form W-4. Withholding will be most accurate if<br />
                            you do this on the Form W-4 for the highest paying job.</em><br />
                            <strong>Step 3</strong>. This step provides instructions for determining the<br />
                            amount of the child tax credit and the credit for other<br />
                            dependents that you may be able to claim when you file your<br />
                            tax return. To qualify for the child tax credit, the child must<br />
                            be under age 17 as of December 31, must be your<br />
                            dependent who generally lives with you for more than half<br />
                            the year, and must have the required social security number.<br />
                            You may be able to claim a credit for other dependents for<br />
                            whom a child tax credit can’t be claimed, such as an older<br />
                            child or a qualifying relative. For additional eligibility<br />
                            requirements for these credits, see Pub. 972, Child Tax<br />
                            Credit and Credit for Other Dependents. You can also<br />
                            include <strong>other tax credits</strong> in this step, such as education tax<br />
                            credits and the foreign tax credit. To do so, add an estimate<br />
                            of the amount for the year to your credits for dependents<br />
                            and enter the total amount in Step 3. Including these credits<br />
                            will increase your paycheck and reduce the amount of any<br />
                            refund you may receive when you file your tax return.<br />
                            <strong>Step 4 (optional).</strong><br />
                            <strong><em>Step 4(a).</em></strong> Enter in this step the total of your other<br />
                            estimated income for the year, if any. You shouldn’t include<br />
                            income from any jobs or self-employment. If you complete<br />
                            Step 4(a), you likely won’t have to make estimated tax<br />
                            payments for that income. If you prefer to pay estimated tax<br />
                            rather than having tax on other income withheld from your<br />
                            paycheck, see Form 1040-ES, Estimated Tax for Individuals.<br />
                            <strong><em> Step 4(b).</em></strong> Enter in this step the amount from the Deductions<br />
                            Worksheet, line 5, if you expect to claim deductions other than<br />
                            the basic standard deduction on your 2021 tax return and<br />
                            want to reduce your withholding to account for these<br />
                            deductions. This includes both itemized deductions and other<br />
                            deductions such as for student loan interest and IRAs.<br />
                            <strong><em>Step 4(c).</em></strong> Enter in this step any additional tax you want<br />
                            withheld from your pay <strong> each pay period,</strong> including any<br />
                            amounts from the Multiple Jobs Worksheet, line 4. Entering an<br />
                            amount here will reduce your paycheck and will either increase<br />
                            your refund or reduce any amount of tax that you owe.</div>

                 </div>
             </div>
             <div class="d-flex w-98 justify-content-between pt-3 mb-2 bbset">

                <p class="m-0">Form W-4 (2021)</p>
                <p class="m-0">Page <strong>2</strong></p>
            </div>
            <div class="container p-2 pt-0 pb-0"style=>

                <div class="row m-0 p-0">

                    <div class="m-0 text-center w-100 p-2 d-flex "> <P class="m-0 w-100"> <strong>Step 2(b)-Multiple Jobs Worksheet</strong>(Keep for your records.)</P>
                    <div style='font-size:20px;'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></div>
                    <!-- <p class="m-0 text-center step-border w-100"> <strong>Step 2(b)-Multiple Jobs Worksheet</strong><em>( Keep for your records )</em></p> -->

                </div>
                <hr class='mb-2 horline'>
                <div class="row m-0 mt-3  p-0">
                    <p class="m-0 text-left">If you choose the option in Step 2(b) on Form W-4, complete this worksheet (which calculates the total extra tax for all jobs) on <b>only ONE</b>
                        Form W-4. Withholding will be most accurate if you complete the worksheet and enter the result on the Form W-4 for the highest paying job.</p>
                    </div>
                <div class="row m-0 mt-3  p-0 mb-3">
                    <p class="m-0 text-left"><b>Note</b>: If more than one job has annual wages of more than $120,000 or there are more than three jobs, see Pub. 505 for additional <br>
                        tables; or, you can use the online withholding estimator at www.irs.gov/W4App</p>
                </div>
                <table class="firstHead w-100 mt-3">
                    <tr>
                        <td  class=" bl  br bb bt  boldnum fw4-sub vatop" width='50px'>
                            1
                        </td>
                        <td  class="br bl bt vabot fw4-sub bb" colspan="2">

                           <P class="m-0  "><strong>Two jobs</strong> If you have two jobs or you’re married filing jointly and you and your spouse each have one
                            job, find the amount from the appropriate table on page 4. Using the “Higher Paying Job” row and the
                            “Lower Paying Job” column, find the value at the intersection of the two household salaries and enter
                            that value on line 1. Then, <strong>skip</strong> to line 3
                            </P>
                        </td>
                        <td  width='50px' class='p-0 br bb fw4-sub boldnum bl bt vabot text-center' >

                            1
                        </td>

                        <td  class=" br vabot bl bb bt fw4-sub">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="jobs_worksheet_1" name="jobs_worksheet_1" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>
                    <tr>
                        <td  class=" bl pt-2 br bb bt vatop boldnum fw4-sub" width='50px'>
                            2
                        </td>
                        <td  class="br bl bt pt-2 vabot bb fw4-sub " colspan="2">

                           <P class="m-0 "><b>Three jobs</b>. If you and/or your spouse have three jobs at the same time, complete lines 2a, 2b, and
                            2c below. Otherwise, <strong>skip</strong> to line 3
                            </P>

                                <p class="m-0 p-2">
                                    <strong>a&ensp;</strong>Find the amount from the appropriate table on page 4 using the annual wages from the highest
                                    paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
                                    in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries
                                    and enter that value on line 2a . . .
                                </p>
                        </td>
                        <td  width='50px' class='fw4-sub boldnum p-0 br bb bl bt vabot text-center' >

                            2a
                        </td>

                        <td  class=" br vabot bl bb bt fw4-sub">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="jobs_worksheet_2a" name="jobs_worksheet_2a" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>
                    <tr>
                        <td  class=" bl  br bb bt vatop" width='50px'>

                        </td>
                        <td  class="br bl bt fw4-sub vabot bb" colspan="2">

                            <p class="m-0 p-2"> <strong>b&ensp;</strong> Add the annual wages of the two highest paying jobs from line 2a together and use the total as the
                                wages in the “Higher Paying Job” row and use the annual wages for your third job in the “Lower
                                Paying Job” column to find the amount from the appropriate table on page 4 and enter this amount
                                on line 2b . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
                        </td>
                        <td  width='50px' class='boldnum fw4-sub p-0 br pb-2 bb bl bt vabot text-center' >

                            2b
                        </td>

                        <td  class=" br vabot bl pb-2 bb bt fw4-sub">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="jobs_worksheet_2b" id="jobs_worksheet_2b" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>
                    <tr>
                        <td  class=" bl  br bb bt vatop" width='50px'>

                        </td>
                        <td  class="br bl bt fw4-sub  bb" colspan="2">

                            <p class="m-0 p-2"> <strong>c&ensp;</strong> Add the amounts from lines 2a and 2b and enter the result on line 2c </p>
                        </td>
                        <td  width='50px' class='p-0 pb-2 vabot br bb bl bt fw4-sub boldnum text-center' >

                            2c
                        </td>

                        <td  class=" br pb-2 vabot bl bb bt fw4-sub">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="jobs_worksheet_2c" id="jobs_worksheet_2c" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>

                    <tr>
                        <td  class=" bl pt-2 br bb bt vatop fw4-sub boldnum" width='50px'>
                            3
                        </td>
                        <td  class="br bl pt-2 bt vabot bb fw4-sub" colspan="2">

                           <P class="m-0  ">Enter the number of pay periods per year for the highest paying job. For example, if that job pays
                            weekly, enter 52; if it pays every other week, enter 26; if it pays monthly, enter 12, etc. . . . . .
                            </P>

                        </td>
                        <td  width='50px' class='p-0 br bb bl bt fw4-sub boldnum vabot text-center' >

                          3
                        </td>

                        <td  class=" br vabot bl bb bt fw4-sub">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="jobs_worksheet_3" name="jobs_worksheet_3" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>
                    <tr>
                        <td  class=" bl pt-2  br bb bt vatop fw4-sub boldnum" width='50px'>
                            4
                        </td>
                        <td  class="br bl pt-2 bt vabot bb fw4-sub" colspan="2">

                           <P class="m-0  "><b>Divide</b> the annual amount on line 1 or line 2c by the number of pay periods on line 3. Enter this
                            amount here and in <strong>Step 4(c)</strong> of Form W-4 for the highest paying job (along with any other additional <br>
                            amount you want withheld) . . . . . . . . . . . . . . . . . . . . . . . . .
                            </P>

                        </td>
                        <td  width='50px' class='p-0 br bb bl fw4-sub boldnum bt vabot text-center' >

                         4
                        </td>

                        <td  class=" br vabot bl bb bt fw4-sub ">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="jobs_worksheet_4" name="jobs_worksheet_4" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>
                </table>
                <div class="container m-0 p-0">
                <div class="row m-0 p-0 mt-3  mb-3">
                    <hr class='mb-2 horline'>
                    <div class="m-0 text-center w-100 p-2 d-flex "> <P class="m-0 w-100"> <b>Step 4(b)—Deductions Worksheet </b>(Keep for your records.)</P>
                    <div style='font-size:20px;'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></div>
                    </div>

                <hr class='mb-0 mt-2 horline'>
                </div>
                </div>
                <table class="firstHead w-100 mt-2">
                    <tr>
                        <td  class=" bl  br bb bt vatop fw4-sub boldnum" width='50px'>
                            1
                        </td>
                        <td  class="br bl bt vabot bb fw4-sub" colspan="2">

                           <P class="m-0  ">Enter an estimate of your 2021 itemized deductions (from Schedule A (Form 1040)). Such deductions
                            may include qualifying home mortgage interest, charitable contributions, state and local taxes (up to
                            $10,000), <br> and medical expenses   in excess of 7.5% of your income . . . . . . . . . . . .
                            </P>
                        </td>
                        <td  width='50px' class='p-0 br bb bl bt vabot fw4-sub boldnum text-center' >

                            1
                        </td>

                        <td  class=" br vabot bl bb bt ">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="deduct_worksheet_1" name="deduct_worksheet_1" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>

                    <tr>
                        <td  class=" bl  br bb bt vatop pt-2 fw4-sub boldnum" width='50px'>
                              2
                        </td>
                        <td  class="br bl bt pt-2  bb fw4-sub" colspan="2">

                            <p class="m-0">Enter: { <br> • $25,100 if you’re married filing jointly or qualifying widow(er) <br>
                                • $18,800 if you’re head of household <br>
                                • $12,550 if you’re single or married filing separately } . . . . . . . .</p>
                        </td>
                        <td  width='50px' class='p-0 br bb bl bt vabot text-center fw4-sub boldnum' >

                            2
                        </td>

                        <td  class=" br vabot bl bb bt ">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="deduct_worksheet_2" name="deduct_worksheet_2" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>
                    <tr>
                        <td  class=" bl pt-2  br bb bt vatop fw4-sub boldnum" width='50px'>
                              3
                        </td>
                        <td  class="br bl bt pt-2 bb fw4-sub" colspan="2">

                            <p class="m-0">If line 1 is greater than line 2, subtract line 2 from line 1 and enter the result here. If line 2 is greater
                                than line 1, enter “-0-” . . . .</p>
                        </td>
                        <td  width='50px' class='p-0 br bb bl bt fw4-sub vabot boldnum text-center' >

                            3
                        </td>

                        <td  class=" br  bl bb bt  vabot">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="deduct_worksheet_3" name="deduct_worksheet_3" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>

                    <tr>
                        <td  class=" bl pt-2 br bb bt vatop fw4-sub boldnum" width='50px'>
                           4
                        </td>
                        <td  class="br bl pt-2 bt vabot bb fw4-sub" colspan="2">

                           <P class="m-0  ">Enter an estimate of your student loan interest, deductible IRA contributions, and certain other
                            adjustments (from Part II of Schedule 1 (Form 1040)).  See Pub. 505 for more information . . . .</P>

                        </td>
                        <td  width='50px' class=' fw4-sub boldnum p-0 br bb bl bt vabot text-center' >

                          4
                        </td>

                        <td  class=" br vabot bl bb bt ">

                            <div class="m-0 p-0 d-flex"><label for="">$</label> <input class='input2' id="deduct_worksheet_4" name="deduct_worksheet_4" type="text" onClick="this.select();" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>
                    <tr class='lh4-w4'>
                        <td  class=" bl  br  bt vabot boldnum fw4-sub " width='50px'>
                            5
                        </td>
                        <td  class="br bl bt vabot pt-2  fw4-sub" colspan="2">

                           <P class="m-0  "><b>Add </b>lines 3 and 4. Enter the result here and in <b> Step 4(b) </b>of Form W-4
                            </P>

                        </td>
                        <td  width='50px' class=' fw4-sub boldnum p-0 br  bl bt vabot text-center' >

                         5
                        </td>

                        <td  class=" br vabot bl  bt fw4-sub ">

                           <div class="m-0 p-0 d-flex align-items-center"><label for="">$</label> <input class='input2' type="text" onClick="this.select();" id="deduct_worksheet_5" name="deduct_worksheet_5" onkeyup="this.value = get_float_value(this.value)" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/> </div>
                                                            </td>
                    </tr>
                </table>
                <hr>
                <div class="row m-0 p-0 pr-2">
                    <div class="col-md-6 m-0 p-2 small-text-w4">
                        <p class='m-0'><strong>Privacy Act and Paperwork Reduction Act Notice</strong>. We ask for the information
                        on this form to carry out the Internal Revenue laws of the United States. Internal
                        Revenue Code sections 3402(f)(2) and 6109 and their regulations require you to
                        provide this information; your employer uses it to determine your federal income
                        tax withholding. Failure to provide a properly completed form will result in your
                        being treated as a single person with no other entries on the form; providing
                        fraudulent information may subject you to penalties. Routine uses of this
                        information include giving it to the Department of Justice for civil and criminal
                        litigation; to cities, states, the District of Columbia, and U.S. commonwealths and
                        possessions for use in administering their tax laws; and to the Department of
                        Health and Human Services for use in the National Directory of New Hires. We
                        may also disclose this information to other countries under a tax treaty, to federal
                        and state agencies to enforce federal nontax criminal laws, or to federal law
                        enforcement and intelligence agencies to combat terrorism</p></div>
                    <div class="col-md-6 m-0 p-2 small-text-w4">
                        <p> You are not required to provide the information requested on a form that is
                        subject to the Paperwork Reduction Act unless the form displays a valid OMB
                        control number. Books or records relating to a form or its instructions must be
                        retained as long as their contents may become material in the administration of
                        any Internal Revenue law. Generally, tax returns and return information are
                        confidential, as required by Code section 6103.
                        The average time and expenses required to complete and file this form will vary
                        depending on individual circumstances. For estimated averages, see the
                        instructions for your income tax return.
                        If you have suggestions for making this form simpler, we would be happy to hear
                        from you. See the instructions for your income tax return.</p></div>
                </div>
                <!-- lastpage -->


<DIV id="id1_1 w-100" style="width: 100%;">
    <TABLE cellpadding=0 cellspacing=0 class="t0">
    <TR>
        <TD colspan=3 class="tr0 td0"><P class="p0 ft0">Form <NOBR>W-4</NOBR> (2021)</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr0 td2"><P class="p2 ft0">Page <SPAN class="ft2">4</SPAN></P></TD>
    </TR>
    <TR>
        <TD class="tr1 td3"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td4"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td5"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD colspan=6 class="tr1 td6"><P class="p3 ft3">Married Filing Jointly or Qualifying Widow(er)</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td2"><P class="p1 ft1">&nbsp;</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr2 td7"><P class="p0 ft4">Higher Paying Job</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD colspan=6 class="tr3 td6"><P class="p4 ft5">Lower Paying Job Annual Taxable Wage & Salary</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td2"><P class="p1 ft1">&nbsp;</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr4 td7"><P class="p5 ft6">Annual Taxable</P></TD>
        <TD class="tr4 td8"><P class="p6 ft7">$0 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$10,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$20,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$30,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$40,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$50,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$60,000 -</P></TD>
        <TD class="tr4 td8"><P class="p7 ft8">$70,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$80,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$90,000 -</P></TD>
        <TD class="tr4 td8"><P class="p8 ft0">$100,000 -</P></TD>
        <TD class="tr4 td9"><P class="p8 ft0">$110,000 -</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr5 td7"><P class="p9 ft4">Wage & Salary</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">9,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">19,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">29,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">39,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">49,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">59,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">69,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">79,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">89,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">99,999</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">109,999</P></TD>
        <TD class="tr5 td9"><P class="p10 ft9">120,000</P></TD>
    </TR>
    <TR>
        <TD class="tr6 td3"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td4"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td10"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td2"><P class="p1 ft10">&nbsp;</P></TD>
    </TR>
    <TR>
        <TD class="tr5 td12"><P class="p2 ft9">$0</P></TD>
        <TD class="tr5 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr5 td14"><P class="p7 ft9">9,999</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$0</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$190</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$850</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$890</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,100</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,870</P></TD>
        <TD class="tr5 td9"><P class="p10 ft9">$1,870</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$10,000</P></TD>
        <TD class="tr3 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td14"><P class="p7 ft9">19,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">190</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">1,190</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">1,890</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,090</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,300</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,300</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,070</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">4,070</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$20,000</P></TD>
        <TD class="tr3 td4"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td10"><P class="p7 ft9">29,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">850</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">1,890</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,750</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,950</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,080</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,080</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,080</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,160</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,160</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,160</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,930</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">5,930</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$30,000</P></TD>
        <TD class="tr1 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr1 td14"><P class="p7 ft9">39,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">890</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,090</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,950</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">3,150</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">3,280</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">3,280</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">3,360</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">4,360</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,360</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,360</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">7,130</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">7,130</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$40,000</P></TD>
        <TD class="tr3 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td14"><P class="p7 ft9">49,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">1,020</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,080</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,280</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,410</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">5,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">6,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,260</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">8,260</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$50,000</P></TD>
        <TD class="tr3 td4"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td10"><P class="p7 ft9">59,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">1,020</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,080</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,280</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,490</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,490</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,490</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">6,490</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">7,490</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">8,490</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">9,260</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">9,260</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$60,000</P></TD>
        <TD class="tr1 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr1 td14"><P class="p7 ft9">69,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">1,020</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">3,080</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">3,360</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">4,490</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,490</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,490</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">7,490</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">8,490</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">9,490</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">10,260</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">10,260</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$70,000</P></TD>
        <TD class="tr3 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td14"><P class="p7 ft9">79,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">1,020</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,160</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,360</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">5,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">6,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">10,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">11,260</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">11,260</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$80,000</P></TD>
        <TD class="tr3 td4"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td10"><P class="p7 ft9">99,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">1,020</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,150</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,010</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">6,210</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">7,340</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">8,340</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">9,340</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">10,340</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">11,340</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">12,340</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">13,260</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">13,460</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$100,000</P></TD>
        <TD colspan=2 class="tr1 td8"><P class="p7 ft9">- 149,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">1,870</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">4,070</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,930</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">7,130</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">8,260</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">9,320</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">10,520</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">11,720</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">12,920</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">14,120</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">15,090</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">15,290</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$150,000</P></TD>
        <TD colspan=2 class="tr3 td8"><P class="p7 ft9">- 239,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,440</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">6,500</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,900</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,230</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">10,430</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">11,630</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">12,830</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">14,030</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">15,230</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">16,190</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">16,400</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$240,000</P></TD>
        <TD colspan=2 class="tr3 td11"><P class="p7 ft9">- 259,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,440</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">6,500</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">7,900</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">9,230</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">10,430</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">11,630</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">12,830</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">14,030</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">15,270</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">17,040</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">18,040</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$260,000</P></TD>
        <TD colspan=2 class="tr1 td8"><P class="p7 ft9">- 279,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">4,440</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,500</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">7,900</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">9,230</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">10,430</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">11,630</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">12,870</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">14,870</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">16,870</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">18,640</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">19,640</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$280,000</P></TD>
        <TD colspan=2 class="tr3 td8"><P class="p7 ft9">- 299,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,440</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">6,500</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,900</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,230</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">10,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">12,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">14,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">16,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">18,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">20,240</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">21,240</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$300,000</P></TD>
        <TD colspan=2 class="tr3 td11"><P class="p7 ft9">- 319,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,440</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">6,500</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">7,940</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">10,070</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">12,070</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">14,070</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">16,070</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">18,070</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">20,070</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">21,840</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">22,840</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$320,000</P></TD>
        <TD colspan=2 class="tr1 td8"><P class="p7 ft9">- 364,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,720</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,920</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">8,780</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">10,980</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">13,110</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">15,110</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">17,110</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">19,110</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">21,190</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">23,490</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">25,560</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">26,860</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$365,000</P></TD>
        <TD colspan=2 class="tr3 td8"><P class="p7 ft9">- 524,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,970</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">6,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,630</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">12,130</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">14,560</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">16,860</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">19,160</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">21,460</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">23,760</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">26,060</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">28,130</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">29,430</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr2 td15"><P class="p0 ft9">$525,000 and over</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">3,140</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">6,840</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">10,200</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">12,900</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">15,530</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">18,030</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">20,530</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">23,030</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">25,530</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">28,030</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">30,300</P></TD>
        <TD class="tr2 td2"><P class="p10 ft9">31,800</P></TD>
    </TR>
    <!-- <TR>
        <TD class="tr1 td3"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td4"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td5"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft11">Single or</P></TD>
        <TD class="tr1 td1"><P class="p11 ft3 text-left">Married</P></TD>
        <TD class="tr1 td1"><P class="p12 ft3 p-0 text-left">Filing</P></TD>
        <TD class="tr1 td1"><P class="p2 ft12" style='font-size:12px !important;font-weight: 700;line-height: 15px;'>Separately</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td2"><P class="p1 ft1">&nbsp;</P></TD>
    </TR> -->
    <TR>
        <TD class="tr1 td3"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td4"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td5"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD colspan=6 class="tr1 td6"><P class="p3 ft3 text-center">Single or Married Filing Seperately</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td2"><P class="p1 ft1">&nbsp;</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr2 td7"><P class="p6 ft4">Higher Paying Job</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD colspan=6 class="tr3 td6"><P class="p4 ft5">Lower Paying Job Annual Taxable Wage & Salary</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td2"><P class="p1 ft1">&nbsp;</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr4 td7"><P class="p5 ft6">Annual Taxable</P></TD>
        <TD class="tr4 td8"><P class="p6 ft7">$0 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$10,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$20,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$30,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$40,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$50,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$60,000 -</P></TD>
        <TD class="tr4 td8"><P class="p7 ft8">$70,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$80,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$90,000 -</P></TD>
        <TD class="tr4 td8"><P class="p8 ft0">$100,000 -</P></TD>
        <TD class="tr4 td9"><P class="p8 ft0">$110,000 -</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr5 td7"><P class="p9 ft4">Wage & Salary</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">9,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">19,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">29,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">39,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">49,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">59,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">69,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">79,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">89,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">99,999</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">109,999</P></TD>
        <TD class="tr5 td9"><P class="p10 ft9">120,000</P></TD>
    </TR>
    <TR>
        <TD class="tr6 td3"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td4"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td10"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td2"><P class="p1 ft10">&nbsp;</P></TD>
    </TR>
    <TR>
        <TD class="tr5 td12"><P class="p2 ft9">$0</P></TD>
        <TD class="tr5 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr5 td14"><P class="p7 ft9">9,999</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$440</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$940</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,410</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,870</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,870</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,870</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,870</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$2,030</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$2,040</P></TD>
        <TD class="tr5 td9"><P class="p10 ft9">$2,040</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$10,000</P></TD>
        <TD class="tr3 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td14"><P class="p7 ft9">19,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">940</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">1,540</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">1,620</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,020</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,020</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,640</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,840</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,840</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">3,840</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$20,000</P></TD>
        <TD class="tr3 td4"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td10"><P class="p7 ft9">29,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">1,020</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">1,620</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,100</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,100</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,100</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,550</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,550</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,720</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,920</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,120</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,120</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">5,120</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$30,000</P></TD>
        <TD class="tr1 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr1 td14"><P class="p7 ft9">39,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">1,020</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,020</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">3,100</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">4,100</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,100</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,550</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,720</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,920</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,120</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,320</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,320</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">6,320</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$40,000</P></TD>
        <TD class="tr3 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td14"><P class="p7 ft9">59,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">1,870</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,550</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">5,550</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">6,690</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,340</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,540</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,740</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,940</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,140</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,150</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">8,150</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$60,000</P></TD>
        <TD class="tr3 td4"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td10"><P class="p7 ft9">79,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">1,870</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,470</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,690</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,890</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">7,090</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">7,740</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">7,940</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">8,140</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">8,340</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">8,540</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">9,190</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">9,990</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$80,000</P></TD>
        <TD class="tr1 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr1 td14"><P class="p7 ft9">99,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,000</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">3,810</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,090</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,290</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">7,490</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">8,140</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">8,340</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">8,540</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">9,390</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">10,390</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">11,190</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">11,990</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$100,000</P></TD>
        <TD colspan=2 class="tr3 td8"><P class="p7 ft9">- 124,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,840</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">5,120</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">6,320</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,520</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,360</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,360</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">10,360</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">11,360</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">12,360</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">13,410</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">14,510</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$125,000</P></TD>
        <TD colspan=2 class="tr3 td11"><P class="p7 ft9">- 149,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,840</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,120</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">6,910</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">8,910</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">10,360</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">11,360</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">12,450</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">13,750</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">15,050</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">16,160</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">17,260</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$150,000</P></TD>
        <TD colspan=2 class="tr1 td8"><P class="p7 ft9">- 174,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">4,830</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,910</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">8,910</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">10,910</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">12,600</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">13,900</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">15,200</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">16,500</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">17,800</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">18,910</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">20,010</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$175,000</P></TD>
        <TD colspan=2 class="tr3 td8"><P class="p7 ft9">- 199,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,720</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">5,320</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,490</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,790</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">12,090</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">13,850</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">15,150</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">16,450</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">17,750</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">19,050</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">20,150</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">21,250</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$200,000</P></TD>
        <TD colspan=2 class="tr3 td11"><P class="p7 ft9">- 249,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,970</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,880</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">8,260</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">10,560</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">12,860</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">14,620</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">15,920</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">17,220</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">18,520</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">19,820</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">20,930</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">22,030</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$250,000</P></TD>
        <TD colspan=2 class="tr1 td8"><P class="p7 ft9">- 399,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,970</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,880</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">8,260</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">10,560</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">12,860</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">14,620</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">15,920</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">17,220</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">18,520</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">19,820</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">20,930</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">22,030</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$400,000</P></TD>
        <TD colspan=2 class="tr3 td8"><P class="p7 ft9">- 449,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,970</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">5,880</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,260</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">10,560</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">12,860</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">14,620</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">15,920</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">17,220</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">18,520</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">19,910</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">21,220</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">22,520</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr2 td15"><P class="p0 ft9">$450,000 and over</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">3,140</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">6,250</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">8,830</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">11,330</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">13,830</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">15,790</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">17,290</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">18,790</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">20,290</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">21,790</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">23,100</P></TD>
        <TD class="tr2 td2"><P class="p10 ft9">24,400</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td3"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td4"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td5"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p13 ft11 p-0">Head of</P></TD>
        <TD class="tr1 td1"><P class="p2 ft12" style='font-size:12px !important;font-weight: 700;line-height: 15px;'>Household</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr1 td2"><P class="p1 ft1">&nbsp;</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr2 td7"><P class="p6 ft4">Higher Paying Job</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD colspan=6 class="tr3 td6"><P class="p4 ft5">Lower Paying Job Annual Taxable Wage & Salary</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
        <TD class="tr3 td2"><P class="p1 ft1">&nbsp;</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr4 td7"><P class="p5 ft6">Annual Taxable</P></TD>
        <TD class="tr4 td8"><P class="p6 ft7">$0 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$10,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$20,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$30,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$40,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$50,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$60,000 -</P></TD>
        <TD class="tr4 td8"><P class="p7 ft8">$70,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$80,000 -</P></TD>
        <TD class="tr4 td8"><P class="p6 ft8">$90,000 -</P></TD>
        <TD class="tr4 td8"><P class="p8 ft0">$100,000 -</P></TD>
        <TD class="tr4 td9"><P class="p8 ft0">$110,000 -</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr5 td7"><P class="p9 ft4">Wage & Salary</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">9,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">19,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">29,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">39,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">49,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">59,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">69,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">79,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">89,999</P></TD>
        <TD class="tr5 td8"><P class="p6 ft0">99,999</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">109,999</P></TD>
        <TD class="tr5 td9"><P class="p10 ft9">120,000</P></TD>
    </TR>
    <TR>
        <TD class="tr6 td3"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td4"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td10"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td11"><P class="p1 ft10">&nbsp;</P></TD>
        <TD class="tr6 td2"><P class="p1 ft10">&nbsp;</P></TD>
    </TR>
    <TR>
        <TD class="tr5 td12"><P class="p2 ft9">$0</P></TD>
        <TD class="tr5 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr5 td14"><P class="p7 ft9">9,999</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$0</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$820</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$930</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,020</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,420</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,870</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,870</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$1,910</P></TD>
        <TD class="tr5 td8"><P class="p10 ft9">$2,040</P></TD>
        <TD class="tr5 td9"><P class="p10 ft9">$2,040</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$10,000</P></TD>
        <TD class="tr3 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td14"><P class="p7 ft9">19,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">820</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">1,900</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,130</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,620</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,620</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,070</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,110</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,310</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,440</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">4,440</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$20,000</P></TD>
        <TD class="tr3 td4"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td10"><P class="p7 ft9">29,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">930</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,130</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,360</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,450</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,850</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">3,850</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,850</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,340</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,540</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,740</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,870</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">5,870</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$30,000</P></TD>
        <TD class="tr1 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr1 td14"><P class="p7 ft9">39,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">1,020</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,220</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,450</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,940</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">3,940</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">4,940</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,980</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,630</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,830</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">7,030</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">7,160</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">7,160</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$40,000</P></TD>
        <TD class="tr3 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td14"><P class="p7 ft9">59,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">1,020</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">3,700</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,790</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">5,800</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,000</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,200</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,850</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,050</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,250</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,380</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">9,380</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$60,000</P></TD>
        <TD class="tr3 td4"><P class="p2 ft9">-</P></TD>
        <TD class="tr3 td10"><P class="p7 ft9">79,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">1,870</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,070</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,310</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">6,600</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">7,800</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">9,000</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">10,200</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">10,850</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">11,050</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">11,250</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">11,520</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">12,320</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$80,000</P></TD>
        <TD class="tr1 td13"><P class="p2 ft9">-</P></TD>
        <TD class="tr1 td14"><P class="p7 ft9">99,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">1,880</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">4,280</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">5,710</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">7,000</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">8,200</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">9,400</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">10,600</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">11,250</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">11,590</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">12,590</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">13,520</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">14,320</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$100,000</P></TD>
        <TD colspan=2 class="tr3 td8"><P class="p7 ft9">- 124,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">4,440</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">5,870</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">7,160</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,360</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,560</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">11,240</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">12,690</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">13,690</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">14,690</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">15,670</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">16,770</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$125,000</P></TD>
        <TD colspan=2 class="tr3 td11"><P class="p7 ft9">- 149,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">4,440</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">5,870</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">7,240</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">9,240</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">11,240</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">13,240</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">14,690</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">15,890</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">17,190</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">18,420</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">19,520</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$150,000</P></TD>
        <TD colspan=2 class="tr1 td8"><P class="p7 ft9">- 174,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,040</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">4,920</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">7,150</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">9,240</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">11,240</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">13,290</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">15,590</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">17,340</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">18,640</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">19,940</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">21,170</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">22,270</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$175,000</P></TD>
        <TD colspan=2 class="tr3 td8"><P class="p7 ft9">- 199,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,720</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">5,920</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">8,150</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">10,440</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">12,740</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">15,040</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">17,340</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">19,090</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">20,390</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">21,690</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">22,920</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">24,020</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td3"><P class="p2 ft9">$200,000</P></TD>
        <TD colspan=2 class="tr3 td11"><P class="p7 ft9">- 249,999</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">2,970</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">6,470</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">9,000</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">11,390</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">13,690</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">15,990</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">18,290</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">20,040</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">21,340</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">22,640</P></TD>
        <TD class="tr3 td11"><P class="p10 ft9">23,880</P></TD>
        <TD class="tr3 td2"><P class="p10 ft9">24,980</P></TD>
    </TR>
    <TR>
        <TD class="tr1 td12"><P class="p2 ft9">$250,000</P></TD>
        <TD colspan=2 class="tr1 td8"><P class="p7 ft9">- 349,999</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">2,970</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">6,470</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">9,000</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">11,390</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">13,690</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">15,990</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">18,290</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">20,040</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">21,340</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">22,640</P></TD>
        <TD class="tr1 td8"><P class="p10 ft9">23,880</P></TD>
        <TD class="tr1 td9"><P class="p10 ft9">24,980</P></TD>
    </TR>
    <TR>
        <TD class="tr3 td12"><P class="p2 ft9">$350,000</P></TD>
        <TD colspan=2 class="tr3 td8"><P class="p7 ft9">- 449,999</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">2,970</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">6,470</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">9,000</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">11,390</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">13,690</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">15,990</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">18,290</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">20,040</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">21,340</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">22,640</P></TD>
        <TD class="tr3 td8"><P class="p10 ft9">23,900</P></TD>
        <TD class="tr3 td9"><P class="p10 ft9">25,200</P></TD>
    </TR>
    <TR>
        <TD colspan=3 class="tr2 td15"><P class="p0 ft9">$450,000 and over</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">3,140</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">6,840</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">9,570</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">12,160</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">14,660</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">17,160</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">19,660</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">21,610</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">23,110</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">24,610</P></TD>
        <TD class="tr2 td11"><P class="p10 ft9">26,050</P></TD>
        <TD class="tr2 td2"><P class="p10 ft9">27,350</P></TD>
    </TR>
    </TABLE>
    </DIV>
    <!-- lastpage -->
            </div>
                   </div>
                </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn subbtn-modal updateW4" id="w4FormAdd" data-bs-dismiss="modal">Submit</button>
              <button id="deny-row" type="button" class="thisone btn subbtn-modal" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

<STYLE type="text/css">

        body {margin-top: 0px;margin-left: 0px;}

        #page_1 {position:relative; overflow: hidden;margin: 46px 0px 12px 47px;padding: 0px;border: none;width: 769px;}
        #page_1 #id1_1 {border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 721px;overflow: hidden;}
        #page_1 #id1_2 {border:none;margin: 9px 0px 0px 225px;padding: 0px;border:none;width: 544px;overflow: hidden;}





        .ft0{font: 10px 'Arial';line-height: 12px;}
        .ft1{font: 1px 'Arial';line-height: 1px;}
        .ft2{font: bold 13px 'Arial';line-height: 16px;}
        .ft3{font: bold 13px 'Arial';line-height: 15px;}
        .ft4{font: bold 11px 'Arial';line-height: 12px;}
        .ft5{font: bold 11px 'Arial';line-height: 14px;text-align: center!important;}
        .ft6{font: bold 11px 'Arial';line-height: 13px;}
        .ft7{font: 10px 'Arial';line-height: 13px;}
        .ft8{font: 10px 'Arial';line-height: 13px;}
        .ft9{font: 10px 'Arial';line-height: 14px;text-align: center;}
        .ft10{font: 1px 'Arial';line-height: 3px;}
        .ft11{font: bold 12px 'Arial';line-height: 15px;}
        .ft12{font: bold 9px 'Arial';line-height: 11px;}
        .ft13{font: 8px 'Calibri';line-height: 10px;}

        .p0{text-align: left;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p1{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p2{text-align: right;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p3{text-align: right;padding-right: 10px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p4{text-align: right;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p5{text-align: left;padding-left: 8px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p6{text-align: center;padding-right: 1px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p7{text-align: right;padding-right: 3px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p8{text-align: right;padding-right: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p9{text-align: center;padding-right: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p10{text-align: right;padding-right: 8px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p11{text-align: right;padding-right: 1px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p12{text-align: right;padding-right: 11px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p13{text-align: right;padding-right: 7px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p14{text-align: left;margin-top: 0px;margin-bottom: 0px;}

        .td0{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 98px;vertical-align: bottom;}
        .td1{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 52px;vertical-align: bottom;}
        .td2{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 51px;vertical-align: bottom;}
        .td3{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 46px;vertical-align: bottom;}
        .td4{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;}
        .td5{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 45px;vertical-align: bottom;}
        .td6{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 312px;vertical-align: bottom;}
        .td7{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 97px;vertical-align: bottom;}
        .td8{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 51px;vertical-align: bottom;}
        .td9{padding: 0px;margin: 0px;width: 51px;vertical-align: bottom;}
        .td10{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 44px;vertical-align: bottom;}
        .td11{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 51px;vertical-align: bottom;}
        .td12{padding: 0px;margin: 0px;width: 46px;vertical-align: bottom;}
        .td13{padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;}
        .td14{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 44px;vertical-align: bottom;}
        .td15{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 97px;vertical-align: bottom;}

        .tr0{height: 18px;}
        .tr1{height: 15px;}
        .tr2{height: 17px;}
        .tr3{height: 16px;}
        .tr4{height: 13px;}
        .tr5{height: 14px;}
        .tr6{height: 3px;}

        .t0{width: 100%;font: 11px 'Arial';}

        </STYLE>


<!--Modal Container End   ---->
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/flatpickr/flatpickr.min.css">
<script src="<?=base_url()?>assets/flatpickr/flatpickr.js"></script>
<script src="<?php echo base_url()?>assets/cashier/js/select2@4.0.8/select2.min.js" defer></script>
<link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<script type="text/javascript">

  let currentTemplate = 1;
  let MaxTemplates = $('.template').length;

  $(document).ready(function() {
    $('#discount_key_type').val(0);
    $('#dis_titile').text('Discount %: *');
    $('#dollar_symbol').hide();
    $('.template').hide();
    $('#bp'+currentTemplate).show();
    $('.loop_left').hide();
    <?php if($clover_config_request == 1){ ?>
        swal({
               title: "Success!",
               text: "Clover setup is successfully completed !!",
               icon: "success",
               buttons: false,
               timer: 2500
             });
    <?php }
    if($clover_config_request == 2){ ?>
        swal({
               title: "Error!",
               text: "Error on clover setup . Please try again !!",
               icon: "error",
               buttons: false,
               timer: 2500
             });
    <?php } ?>
});

</script>



<script src="<?=base_url()?>assets/cashier/js/store_js/store_function_js.js"></script>

<script src="https://code.jquery.com/jquery-2.1.4.min.js" integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw=" crossorigin="anonymous"></script>
<script src="<?=base_url() ?>assets/cashier/js/jq-signature.min.js"></script>

<script src="<?=base_url()?>assets/cashier/js/store_js/store_function_nxt_js.js"></script>

<script type="text/javascript">

    jQuery(document).on("change","input[name='credit_card_fees_type']",function() {
        var type = $(this).val();
        if(type==0)
            $('#credit_card_fees_type_sign').html('$');
        else
            $('#credit_card_fees_type_sign').html('%');

    });

    jQuery(document).on("blur",".save_scheduler",function() {

        var shift_start_time = 0;
        var shift_end_time = 0;

        if ($(this).hasClass("shift_start_time")) {

            shift_end_time   = $(this).parent().parent().find('.shift_end_time').val();
            shift_start_time = $(this).val();
        }

        if ($(this).hasClass("shift_end_time")) {

            shift_start_time = $(this).parent().parent().find(".shift_start_time").val();
            shift_end_time = $(this).val();
        }

        var shift_id   = $(this).data("shift_id");
        var date       = $(this).data("date");
        var userid     = $(this).data("userid");
        var start_date = $(this).data("start_date");
        var end_date   = $(this).data("end_date");

        console.log("shift_start_time: "+ shift_start_time + " =====> shift_end_time: " +shift_end_time);

        if(shift_start_time == "" || shift_end_time == "") {
            return false;
        }

        if(shift_start_time > shift_end_time) {

            swal({
              title: "Oops!",
              text: "End Time must be greater than Start Time",
              icon: "error",
              buttons: false,
              timer: 1600,
            });
            return false;
        }

        var obj = $(this);
        var shift_scheduler_frm = $(this).closest('form').serialize();
        $.ajax({
            type: "ajax",
            method: "post",
            url: base_url + "cashier/Cashier/set_shift_schedule",
            data: shift_scheduler_frm,
            dataType: "json",
            beforeSend: function () {
              $("#overlay,.loader").show();
            },
            success: function (data) {
                $("#overlay,.loader").hide();
                if(data.status == 1) {

                    obj.parent().parent().find(".tot_hrs").html(data.tot_hrs);

                    swal({
                        title: "Success!",
                        text: data.message,
                        icon: "success",
                        buttons: false,
                        timer: 1600,
                    });

                } else {

                    swal({
                      title: "Oops!",
                      text: data.message,
                      icon: "error",
                      buttons: false,
                      timer: 1600,
                    });
                }
            },
        });
        return false;
    });

    $(document).on("click",".week_timesheet_report_click",function() {
        $("#overlay,.loader").show();
        var btn_type = $(this).attr("data-type");
        var btn_date = $(this).attr("data-date");

        var start_date_filter = "";
        var end_date_filter = "";

        $.ajax({
            url : base_url+"cashier/report_scheduler_ajax",
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
                $("#report_scheduler_append").empty();
                $("#report_scheduler_append").append(data.html);
            }
        });
    });

    $(document).on("click",".copy_week_timesheet_report",function() {

        swal({
              title: "Are you sure?",
              text: "Current week data will be lost and copied from previous week data",
              icon: "warning",
              buttons: {
                catch: {
                  text: "Confirm",
                  value: "catch",
                },
                cancel: "Cancel",
              },
        })
        .then((value) => {
          switch (value) {

            case "catch":
                $("#overlay,.loader").show();
                var btn_date    = $(this).attr("data-date");
                var start_date  = $(this).attr("data-start_date");
                var end_date    = $(this).attr("data-end_date");

                $.ajax({
                    url : base_url+"cashier/copy_report_scheduler_ajax",
                    type: "POST",
                    dataType : "json",
                    data : {
                        btn_date:   btn_date,
                        start_date: start_date,
                        end_date:   end_date
                    },
                    success:function(data) {
                        $("#overlay,.loader").hide();

                        if(data.status == 1) {
                            $("#report_scheduler_append").empty();
                            $("#report_scheduler_append").append(data.html);
                        }

                        swal({
                            title: "Success!",
                            text: "Shift Scheduler copied successfully",
                            icon: "success",
                            buttons: false,
                            timer: 1600,
                        });
                    }
                });

              break;

            default:
            }
        });
    });
</script>
