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
                                  <p>Add Store</p>
                                </div>
                                <div class="col-md-10">
                                  <div id="message"></div>
                                </div>
                              </div>
                          </div>


                          <?php echo form_open_multipart('',array('class' => 'form-vertical addform', 'id' => 'validate'))?>
                           <!-- cardheader -->
                           <?php if($this->uri->segment(2)=='edit'){
                            ?>
                            <input type="hidden" name="id" value="<?php echo $this->uri->segment(3) ?>">
                           <?php } ?>
                           <div class="customcardbody ">
                             <div class="container mb25">
                              <p class="formheader">User Information</p>
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
  
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">First Name <span>*</span></label>
                                            <?php $value=isset($store_user['first_name'])?$store_user['first_name']:'' ?>
                                            <input type="text" class="form-control customcardinput" id="" value="<?php echo $value ?>" name="storeUsers[first_name]" value="" aria-describedby="">
                                            <span class="errors" id="error_first_name" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Last Name <span>*</span></label>
                                            <?php $value=isset($store_user['last_name'])?$store_user['last_name']:'' ?>
                                            <input type="text" class="form-control customcardinput" id="" value="<?php echo $value ?>" name="storeUsers[last_name]" value="" aria-describedby="">
                                            <span class="errors" id="error_last_name" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Phone <span>*</span></label>
                                            <?php $value=isset($store_user['phone'])?$store_user['phone']:'' ?>
                                            <input type="text" class="form-control customcardinput" id="" value="<?php echo $value ?>" name="storeUsers[phone]" value="" aria-describedby="">
                                            <span class="errors" id="error_phone" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Email <span>*</span></label>
                                            <?php $value=isset($store_user['username'])?$store_user['username']:'' ?>
                                            <input type="text" class="form-control customcardinput" id="" value="<?php echo $value ?>" name="storeUsers[username]" value="" aria-describedby="">
                                            <span class="errors" id="error_username" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Password <span>*</span></label>
                                            <input type="password" class="form-control customcardinput" name="password" value="" aria-describedby="">
                                            <span class="errors" id="error_email_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Confirm Password <span>*</span></label>
                                            <input type="password" class="form-control customcardinput"  name="confirm_password" value="" aria-describedby="">
                                            <span class="errors" id="error_email_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Profile Pic <span>*</span></label>
                                            <input type="file" class="form-control customcardinput"  name="profile_pic" value="" aria-describedby="">
                                            <span class="errors" id="error_email_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                              

                                </div>
                                <p class="formheader">Assign Stores</p>
                                 <div class="row astore">
                                    <?php 

                                    if(isset($assigned_stores) && $assigned_stores!==false){
                                        $assigned_stores=array_column($assigned_stores, 'store_id');
                                    } else{
                                        $assigned_stores=false;
                                    }

                                    foreach ($stores as $key => $value) {
                                            if(is_array($assigned_stores) && in_array($value['store_id'],$assigned_stores)){
                                                $checked='checked';
                                            } else{
                                                $checked='';
                                            }
                                     ?>
                                        <input type='checkbox' <?php echo $checked ?> value="<?php echo $value['store_id'] ?>" name='stores[]'>  
                                           <label><?php echo $value['store_name'] ?></label>
                                        <br>
   
                                        
                                    <?php } ?>
                                    <span class="errors" id="error_email_err" style="color:red; font-size:14px"></span>
                                 </div>

                            </div>
                            
                           </div>
                           <!-- cardbody -->
                           <div class="customcardfooter">
                              <div style="text-align: center;">
                                  <a href="<?=base_url('Cstore')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Save</button>
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

   $('.addform').submit(function(e){
    e.preventDefault();
    $('.errors').html('');
    $.ajax({
                type: 'POST',
                url: window.location.href,
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    if(data.status=="success"){
                         swal(data.msg, '', 'success')
                         document.location.href='<?php  echo base_url("StoreUser/edit/") ?>'+data.user_id                      
                    }
                    else{
                          if(data.errors.field_errors!=undefined){
                              $.each(data.errors.field_errors,function(key,value){
                                $('input[name="'+key+'"]').parent().find('.errors').html(value);
                              })
                          }

                    }
                }  
            })
  
})

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