<style>
    .customcardheader1{
      border:none;
      padding-left: 0px;
    }    
    .multiselect.dropdown-toggle.custom-select{
        width: 100%;
        height: 60px;
    margin-top: 0.1em;
    }
    .multiselect-native-select > .btn-group{
        width: 100%;
    }
    .dropdown-menu.show{
        width: 100%;
    }
    .customcardlabel{
        color:#000 !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cashier/style/ml_new_keyboard_demo.css">

<body class="signback1 dynamic_font_size">
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
                <div style="margin:0.5em auto">
               <a href="<?=base_url('cashier/list_supplier')?>"><button class="bckbtn">
                <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="" >
                </button> </a>
               </div>
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
        <div class="col-md-12">
            <h5 class="mainline ml-3 mt-3" >Supplier Management</h5>
         </div>
    </div>
            <div class="container-fluid mt20">
                <div class="row overflow" >
                  <div class="col-md-12">
                      <div class="customcard">
                        <div class="row" style="border-bottom: 1px solid #DBDBDB;">
                            <div class="col-md-9">
                                <div class="customcardheader1">
                                    <p style="margin-left:40px;"> Update Supplier</p>
                                </div>
                            </div>
                        <div class="col-md-3">
                            <div class="customcardheader1" >
                                <button class="save-data smbtn" id="btnSave">Save Information
                                <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
                                </button>
                            </div>
                        </div>
                    </div>
                       <form class="edit-supplier" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                           <!-- cardheader -->
                           <div class="customcardbody">
                             <div class="container mb25">
                              <p class="formheader dynamic_font_header2">Company Information</p>
                                 <div class="row">
                                     <input type="hidden" class="form-control" id="supplier_id" name="supplier_id" value="<?= isset($supplier['supplier_id']) ? $supplier['supplier_id'] : '' ;?>">
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel" for="">Supplier Name <span style="color:#FF0000;">*</span></label>
                                          <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="suppName" name="supplier_name" aria-describedby="" value="<?= isset($supplier['supplier_name']) ? $supplier['supplier_name'] : '' ;?>" placeholder="Enter Supplier Name">
                                          <span class="errors dynamic_font_size_err" id="fname_err" style="color:red; "></span>
                                        </div>
                                        <input type="hidden" id="original_name" name="original_name" value="<?=$supplier['supplier_name']?>">
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Contact Number </label>
                                          <input type="tel" class="form-control customcardinput phoneInput use-keyboard-input-num usemobilehere dynamic_font_size" id="mobile" name="mobile" aria-describedby="" value="<?= isset($supplier['mobile']) ? $supplier['mobile'] : '' ;?>"  placeholder="Enter Contact Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                          <span class="errors dynamic_font_size_err" id="mob_err" style="color:red;"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="customcardlabel">Email </label>
                                          <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="email" name="email" aria-describedby="" placeholder="Enter Email" onkeyup="ValidateEmail();" value="<?= isset($supplier['email']) ? $supplier['email'] : '' ;?>">
                                          <span class="errors dynamic_font_size_err" id="email_err" style="color:red;"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Address </label>
                                              <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="address" name="address" aria-describedby="" placeholder="Enter Supplier Address" value="<?= isset($supplier['address']) ? $supplier['address'] : '' ;?>">
                                              <span class="errors dynamic_font_size_err" id="adrs_err" style="color:red;"></span>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Supplier Details</label>
                                              <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" name="details" aria-describedby="" placeholder="Enter Supplier Details" value="<?= isset($supplier['details']) ? $supplier['details'] : '' ;?>">
                                              <span class="errors dynamic_font_size_err" id="deta_err" style="color:red;"></span>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="customcardlabel">Category <span style="color:#FF0000;">*</span></label>
                                              <div>
                                                  <select id="supp_category" multiple="multiple" class="form-control customcardinput dynamic_font_size" name="supplier_cat[]">
                                                      <?php foreach ($category as $c) {?>
                                                      <option class="dynamic_font_size" value="<?=$c['category_id']?>" <?php if(in_array($c['category_id'],explode(',',$supplier['supplier_category']))){echo 'selected';}?>>
                                                            <?=$c['category_name']?></option>
                                                      <?php } ?>
                                                  </select>
                                                  <span class="errors dynamic_font_size_err" id="scat_err" style="color:red;"></span>
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
                                              <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="cname" name="contact_name" aria-describedby="" placeholder="Representative Name" value="<?= isset($supplier['contact_name']) ? $supplier['contact_name'] : '' ;?>" onkeypress="return onlyAlphabets(event,this);">
                                              <span class="errors dynamic_font_size_err" id="sname_err" style="color:red;"></span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="customcardlabel">Email </label>
                                              <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="cemail" name="contact_email" aria-describedby="" value="<?= isset($supplier['contact_email']) ? $supplier['contact_email'] : '' ;?>" placeholder="Representative Email" onkeyup="ValidateCEmail();">
                                              <span class="errors dynamic_font_size_err" id="semail_err" style="color:red;"></span>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label id='dummyclick' class="customcardlabel">Contact Number </label>
                                                <input type="tel" class="form-control customcardinput phoneInput use-keyboard-input-num usemobilehere dynamic_font_size" id="cmobile" name="contact_no" aria-describedby=""   value="<?= isset($supplier['contact_no']) ? $supplier['contact_no'] : '' ;?>" placeholder="Representative Contact Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="errors dynamic_font_size_err" id="smob_err" style="color:red;"></span>
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
                                                 <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="spname" name="supervisor_name" aria-describedby="" placeholder="Supervisor Name" onkeypress="return onlyAlphabets(event,this);" value="<?= isset($supplier['supervisor_name']) ? $supplier['supervisor_name'] : '' ;?>">
                                                 <span class="errors dynamic_font_size_err" id="spname_err" style="color:red;"></span>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-group">
                                                 <label class="customcardlabel">Email </label>
                                                 <input type="text" class="form-control customcardinput use-keyboard-input dynamic_font_size" id="spemail" name="supervisor_email" aria-describedby="" placeholder="Supervisor Email" onkeyup="ValidateSPEmail();" value="<?= isset($supplier['supervisor_email']) ? $supplier['supervisor_email'] : '' ;?>">
                                                 <span class="errors dynamic_font_size_err" id="spemail_err" style="color:red;"></span>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-group">
                                                 <label id="dummyclick" class="customcardlabel">Contact Number </label>
                                                 <input type="tel" class="form-control customcardinput phoneInput use-keyboard-input-num usemobilehere dynamic_font_size" id="spcontact" name="supervisor_contact_no" aria-describedby="" placeholder="Supervisor Contact Number" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?= isset($supplier['supervisor_contact_no']) ? $supplier['supervisor_contact_no'] : '' ;?>">
                                                 <span class="errors dynamic_font_size_err" id="spmob_err" style="color:red;"></span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                           </div>
                        </form>
                 </div>
               </div>
         </div>
    </div>

<link href="<?php echo base_url() ?>assets/style/hummingbird-treeview.css" rel="stylesheet" type="text/css">
<style>
.stylish-input-group .input-group-addon{
    background: white !important;
}
.stylish-input-group .form-control{
    box-shadow:0 0 0;
    border-color:#ccc;
}
.stylish-input-group button{
    border:0;
    background:transparent;
}
.hummingbird-treeview ul:not(.hummingbird-base) {

    padding-left: 15px;
}

</style>
<script src="<?=base_url()?>assets/cashier/js/inventory_js/edit_supplier_js.js"></script>
<script src="<?=base_url()?>assets/cashier/js/ml_new_keyboard_demo.js"></script>
<!-- <script>
    var jq = $.noConflict();
    jq(document).ready(function(){
      jq('.mobileimg').on('click', function(){

        jq('input[name=module]').val('pos');
        jq('front-login').modal();
      });   
    });
</script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/style/bootstrap-multiselect.css" type="text/css">
  <!-- <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/core/bootstrap-multiselect.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#supp_category').multiselect();
        $('.multiselect.dropdown-toggle.custom-select').trigger('click');
        $('#dummyclick').trigger('click');
        $('.multiselect.dropdown-toggle.custom-select').blur();
    });
</script>
