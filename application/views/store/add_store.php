<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!--Add store start -->
<div class="content-wrapper">

    <div class="container-fluid mt20">
               <div class="row">
                 <div class="col-md-12">
                       <div class="customcard">
                            <div class="customcardheader">
                              <div class="row">
                                <div class="col-md-2">
                                  <p>Add Location</p>
                                </div>
                                <div class="col-md-10">
                                  <div id="message"></div>
                                </div>
                              </div>
                          </div>


                          <?php echo form_open_multipart('superadmin/Cstore/store_add',array('class' => 'form-vertical', 'id' => 'validate'))?>
                           <!-- cardheader -->
                           <div class="customcardbody ">
                             <div class="container mb25">
                              <p class="formheader">Store Information</p>
                                 <div class="row">

                                     <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Merchant <span>*</span></label>
                                            <select class="form-control customcardinput" id="merchant_id" required="" name="merchant_id">
                                                <option value="">Select</option>
                                                <?php if(!empty($merchant_list)) {
                                                    foreach($merchant_list as $m_id) { ?>
                                                        <option value="<?php echo $m_id['merchant_id']; ?>"><?php echo $m_id['name']; ?></option>
                                                <?php } } ?>
                                            </select>
                                            <span class="errors" id="merchant_id_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div> -->
                                      <input type="hidden" name="merchant_id" value="<?php  echo $this->session->userdata('merchant_id'); ?>" >
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Store Name <span>*</span></label>
                                            <input class="form-control customcardinput" name="store_name" id="store_name" type="text" placeholder="<?php echo display('store_name') ?>" required="">
                                            <span class="errors" id="store_name_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Business Type <span>*</span></label>
                                            <select class="form-control customcardinput" id="store_category" required="" name="store_category">
                                                <option value="">Select</option>
                                                <?php if(!empty($store_category)) {
                                                    foreach($store_category as $s_cat){ ?>
                                                        <option value="<?php echo $s_cat['id']; ?>"><?php echo $s_cat['category_name']; ?></option>
                                                <?php } } ?>
                                            </select>
                                            <span class="errors" id="store_category_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Email <span>*</span></label>
                                            <input type="text" class="form-control customcardinput" id="store_email" name="store_email" value="" aria-describedby="">
                                            <span class="errors" id="store_email_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Phone Number <span>*</span></label>
                                            <input type="tel" class="form-control customcardinput phoneInput" id="store_contact" name="store_contact" aria-describedby="" value="" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span class="errors" id="store_contact_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Store URL <span>*</span></label>
                                            <input type="tel" class="form-control customcardinput" id="store_url" name="store_url" aria-describedby="" value="">
                                            <span class="errors" id="store_url_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Address</label>
                                            <textarea class="form-control customcardinput" id="store_address_1" name="store_address_1" aria-describedby=""></textarea>
                                            <span class="errors" id="store_address_1_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Street Number</label>
                                            <input type="tel" class="form-control customcardinput" id="store_url" name="street_number" aria-describedby="" value="">
                                            <span class="errors" id="store_address_2_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">City</label>
                                            <input type="tel" class="form-control customcardinput" id="store_url" name="city" aria-describedby="" value="">
                                            <span class="errors" id="store_address_2_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">State</label>
                                            <input type="tel" class="form-control customcardinput" id="store_url" name="state" aria-describedby="" value="">
                                            <span class="errors" id="store_address_2_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Zip Code</label>
                                            <input type="tel" class="form-control customcardinput" id="store_url" name="zip_code" aria-describedby="" value="">
                                            <span class="errors" id="store_address_2_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            
                           </div>
                           <!-- cardbody -->
                           <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('Cstore')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Add</button>
                              </div>
                           </div>
                        <?php echo form_close()?>

                      </div>
             </div>
           </div>
    </div>
</div>
<!-- Update store end -->

<script type="text/javascript">

  $('#btnSave').click(function() {    
    var submition = true;

    if ($('#merchant_id').val() == '') {
        $("#merchant_id_err").html("Please enter Merchant ID").show();
        return false;
    }

    if ($('#store_name').val() == '') {
        $("#store_name_err").html("Please enter Store Name").show();
        return false;
    }

    if ($('#store_category').val() == '') {
        $("#store_category_err").html("Please enter Store Category").show();
        return false;
    }    

    if ($('#store_email').val() == '') {
        $("#store_email_err").html("Please enter Store Email").show();
        return false;
    }

    if ($('#store_contact').val() == '') {
        $("#store_contact_err").html("Please enter Phone Number").show();
        return false;
    }

    if ($('#store_url').val() == '') {
        $("#store_url_err").html("Please enter Store URL").show();
        return false;
    }

    if (submition) {
      $("#validate").submit();
    }
    return false;

  });
</script>