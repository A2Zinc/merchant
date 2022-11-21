<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<body class="signback1">
    <div class="containermain2">
        <div class="row m">
            <div class="logobar ">
              <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
              <?php }else{?>
                <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
              <?php }?>
            </div>
            <div class="gg">
                <a class='aforback' href="<?= base_url('cashier/list_supplier') ?>"><button class="bckbtn">
                        <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                    </button> </a>
                <div>
                     <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg"></a>
                </div>
                <div class="mainscreen">
                    <a href="<?php echo base_url(); ?>cashier">
                        <p class="maindes">MAIN SCREEN</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <h5 class="mainline ml-3 mt-3" >Supplier Management</h5>
        </div>
    </div>
    <!-- main-content -->
    <div class="container-fluid mt20">
        <div class="row">
            <div class="col-md-12">
                <div class="customcard">
                    <div class="row" style="border-bottom: 1px solid #DBDBDB;">
                        <div class="col-md-9">
                            <div class="customcardheader1">
                                <p style="margin-left:40px;">Add New Supplier</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="customcardheader1" >
                                <button class="save-data" id="btnSave">Save Information
                                    <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
                                </button>
                            </div>
                        </div>
                    </div>

                    <form action="" method="post" class="add_supplier" autocomplete="off">
                        <!-- cardheader -->
                        <div class="customcardbody smbtn dynamic_font_size">
                            <div class="container mb25">
                                <p class="formheader dynamic_font_header2">Company Information</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Supplier Name <span style="color:#FF0000;">*</span></label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input" id="supplierNAME" name="supplier_name" aria-describedby="" placeholder="Enter Supplier Name">
                                            <span class="errors dynamic_font_size_err" id="fname_err" style="color:red; "></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Contact Number </label>
                                            <input type="tel" class="form-control customcardinput phoneInput use-keyboard-input-num usemobilehere" id="mobile" name="mobile" aria-describedby="" placeholder="Enter Contact Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span class="errors dynamic_font_size_err" id="mob_err" style="color:red; "></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Email </label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input" id="email" name="email" aria-describedby="" placeholder="Enter Email" onkeyup="ValidateEmail();">
                                            <span class="errors dynamic_font_size_err" id="email_err" style="color:red; "></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Address </label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input" id="address" name="address" aria-describedby="" placeholder="Enter Supplier Address">
                                            <span class="errors dynamic_font_size_err" id="adrs_err" style="color:red; "></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Supplier Details</label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input" name="details" aria-describedby="" placeholder="Enter Supplier Details">
                                            <span class="errors dynamic_font_size_err" id="deta_err" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Category <span style="color:#FF0000;">*</span></label>
                                            <div>
                                                <select id="supp_category" multiple="multiple" class="form-control customcardinput dynamic_font_size" name="supplier_cat[]">
                                                    <?php
                                                    foreach ($category as $c) { ?>
                                                        <option class="dynamic_font_size" value="<?= $c['category_id'] ?>" <?php if ($c['category_id'] == $product->category_id) {
                                                         echo 'selected';
                                                         } ?>><?= $c['category_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="errors dynamic_font_size_err" id="scat_err" style="color:red; "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container  mb25">
                                <p class="formheader dynamic_font_header2">Representative Information</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Name </label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input" id="cname" name="contact_name" aria-describedby="" placeholder="Representative Name" onkeypress="return onlyAlphabets(event,this);">
                                            <span class="errors" id="sname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Email </label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input" id="cemail" name="contact_email" aria-describedby="" placeholder="Representative Email" onkeyup="ValidateCEmail();">
                                            <span class="errors" id="semail_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="dummyclick" class="customcardlabel ">Contact Number </label>
                                            <input type="tel" class="form-control customcardinput phoneInput use-keyboard-input-num usemobilehere" id="cmobile" name="contact_no" aria-describedby="" placeholder="Representative Contact Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span class="errors" id="smob_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container  mb25">
                                <p class="formheader dynamic_font_header2">Supervisor Information</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Name </label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input" id="spname" name="supervisor_name" aria-describedby="" placeholder="Supervisor Name" onkeypress="return onlyAlphabets(event,this);">
                                            <span class="errors" id="spname_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Email </label>
                                            <input type="text" class="form-control customcardinput use-keyboard-input" id="spemail" name="supervisor_email" aria-describedby="" placeholder="Supervisor Email" onkeyup="ValidateSPEmail();">
                                            <span class="errors" id="spemail_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="dummyclick" class="customcardlabel">Contact Number </label>
                                            <input type="tel" class="form-control customcardinput phoneInput use-keyboard-input-num usemobilehere" id="spcontact" name="supervisor_contact_no" aria-describedby="" placeholder="Supervisor Contact Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span class="errors" id="spmob_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- cardbody -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <style>
        .stylish-input-group .input-group-addon {
            background: white !important;
        }

        .stylish-input-group .form-control {
            /* border-right:0; */
            box-shadow: 0 0 0;
            border-color: #ccc;
        }

        .stylish-input-group button {
            border: 0;
            background: transparent;
        }

        .hummingbird-treeview ul:not(.hummingbird-base) {

            padding-left: 15px;
        }
        .multiselect.dropdown-toggle.custom-select {
            width: 38.5vw;
            height: 60px;
            margin-top: 0.1em;
            cursor: pointer;
        }
        @media screen and (max-width: 1028px) {
            .multiselect.dropdown-toggle.custom-select {
            width: 43.5vw;
        }
}
    </style>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
<script src="<?=base_url()?>assets/cashier/js/inventory_js/add_supplier_js.js"></script>
<link href="<?php echo base_url() ?>/assets/style/hummingbird-treeview.css" rel="stylesheet" type="text/css">
<!-- <script>
    var jq = $.noConflict();
    jq(document).ready(function(){
      jq('.mobileimg').on('click', function(){

        jq('input[name=module]').val('pos');
        jq('front-login').modal();
      });
    });
</script> -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/style/bootstrap.min.css" >
<link rel="stylesheet" href="<?php echo base_url() ?>assets/style/bootstrap-multiselect.css" type="text/css">
<!-- <script type="text/javascript" src="<?php echo base_url() ?>application/views/website/themes/martbd/assets/js/jquery-3.3.1.min.js"></script> -->
<script src="<?php echo base_url() ?>assets/style/bootstrap.bundle.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/core/bootstrap-multiselect.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#supp_category').multiselect();
        $('.multiselect.dropdown-toggle.custom-select').trigger('click');

        $('#dummyclick').trigger('click');
        $('.multiselect.dropdown-toggle.custom-select').blur();
    });
</script>
