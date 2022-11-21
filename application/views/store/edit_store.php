<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!--Update store start -->
<div class="content-wrapper">

    <div class="container-fluid mt20">
               <div class="row">
                 <div class="col-md-12">
                       <div class="customcard">
                            <div class="customcardheader">
                              <div class="row">
                                <div class="col-md-2">
                                  <p>Update Store</p>
                                </div>
                                <div class="col-md-10">
                                  <div id="message"></div>
                                </div>
                              </div>
                          </div>


                          <?php echo form_open_multipart('superadmin/Cstore/store_update/{store_id}',array('class' => 'form-vertical', 'id' => 'validate'))?>
                           <!-- cardheader -->
                           <div class="customcardbody ">
                             <div class="container mb25">
                              <p class="formheader">Store Information</p>
                                 <div class="row">

                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Merchant <span>*</span></label>
                                            <select class="form-control customcardinput" id="merchant_id" required="" name="merchant_id">
                                                <option value="">Select</option>
                                                <?php if(!empty($merchant_list)) {
                                                    foreach($merchant_list as $m_id) { ?>
                                                        <option value="<?php echo $m_id['id']; ?>" <?php if(!empty($db_merchant_id) && $db_merchant_id == $m_id['id']) print "selected='selected'"; ?>><?php echo $m_id['name']; ?></option>
                                                <?php } } ?>
                                            </select>
                                            <span class="errors" id="merchant_id_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>

                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Store Name <span>*</span></label>
                                            <input class="form-control customcardinput" name="store_name" id="store_name" type="text" placeholder="<?php echo display('store_name') ?>" required="" value="<?php print $store_name; ?>">
                                            <span class="errors" id="store_name_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Store Category <span>*</span></label>
                                            <select class="form-control customcardinput" id="store_category" required="" name="store_category">
                                                <option value="">Select</option>
                                                <?php if(!empty($store_category)) {
                                                    foreach($store_category as $s_cat){ ?>
                                                        <option value="<?php echo $s_cat['id']; ?>" 
                                                            <?php if(!empty($db_store_category) && $db_store_category == $s_cat['id']) print "selected='selected'"; ?>><?php echo $s_cat['category_name']; ?></option>
                                                <?php } } ?>
                                            </select>
                                            <span class="errors" id="store_category_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Email <span>*</span></label>
                                            <input type="text" class="form-control customcardinput" id="store_email" name="store_email" value="<?php print $store_email; ?>" aria-describedby="">
                                            <span class="errors" id="store_email_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Phone Number <span>*</span></label>
                                            <input type="tel" class="form-control customcardinput phoneInput" id="store_contact" name="store_contact" aria-describedby=""  value="<?php print $store_contact; ?>"  maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            <span class="errors" id="store_contact_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Store URL <span>*</span></label>
                                            <input type="tel" class="form-control customcardinput" id="store_url" name="store_url" aria-describedby=""  value="<?php print $store_url; ?>">
                                            <span class="errors" id="store_url_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Address 1</label>
                                            <textarea class="form-control customcardinput" id="store_address_1" name="store_address_1" aria-describedby=""><?php print $store_address_1; ?></textarea>
                                            <span class="errors" id="store_address_1_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                     
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Address 2 </label>
                                            <textarea class="form-control customcardinput" id="store_address_2" name="store_address_2" aria-describedby=""><?php print $store_address_2; ?></textarea>
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
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Update</button>
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