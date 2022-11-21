<div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">
                     <div class="customcard">
                         <div class="customcardheader">
                              <p>Update Coupon</p>
                         </div>
                         <!-- cardheader -->
                         <form action="<?=base_url('Loyalty/update_coupon')?>" method="post" class="update_coupon" autocomplete="off"> 
                         <div class="customcardbody ">
                           <div class="container mb25">
                            
                               <div class="row">
                                   <input type="hidden" name="coupon_id" value="<?= isset($coupondata->coupon_id) ? $coupondata->coupon_id : '' ;?>" class="form-control">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="customcardlabel" for="">Coupon Name *</label>
                                          <input type="text" value="<?= isset($coupondata->coupon_name) ? $coupondata->coupon_name : '' ;?>" name ="coupon_name" class="form-control customcardinput" id="coupon_name" aria-describedby="" readonly>
                                          <span class="errors" id="cname_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Coupon Type *</label>
                                        <select class="form-control customcardinput" required="" name="coupon_type" id="coupon_type">
                                          <option value="1" <?php echo ($coupondata->coupon_type == '1')?'selected':'' ?>>Cart Total Coupon</option>
                                          <option value="3" <?php echo ($coupondata->coupon_type == '3')?'selected':'' ?>>Product Coupon</option>
                                          <option value="8" <?php echo ($coupondata->coupon_type == '8')?'selected':'' ?>>Product Combo Coupon</option>
                                          <option value="9" <?php echo ($coupondata->coupon_type == '9')?'selected':'' ?>>Category Coupon</option>
                                          <option value="10" <?php echo ($coupondata->coupon_type == '10')?'selected':'' ?>>Brand Coupon</option> 
                                        </select>
                                      </div>
                                   </div> 

                                </div> 
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-md-6 product2">
                                           <div class="form-group">
                                              <label class="exampleFormControlSelect1 customcardlabel">Product *</label>
                                              <input type="text" class="form-control customcardinput product_name" name="product_name" id="product_name" value="<?= isset($productdata[0]->product_name) ? $productdata[0]->product_name : '' ;?>" />
                                                      <input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="<?= isset($productdata[0]->product_id) ? $productdata[0]->product_id : '' ;?>" />
                                            </div>
                                      </div> 
                                      <div class="col-md-6 productqty">
                                           <div class="form-group">
                                              <label class="exampleFormControlSelect1 customcardlabel">Product Quantity *</label>
                                              <input type="number" class="form-control customcardinput" name="product_qty" id="product_q"  value="<?= isset($coupondata->product_qty) ? $coupondata->product_qty : '' ;?>" />
                                              <span class="errors" id="qty_err" style="color:red; font-size:14px"></span>
                                            </div>
                                      </div> 
                                      </div>
                                     </div>
                                   <div class="col-md-6 product item-apend">
                                        <div class="row">
                                          <?php $count=0;
                                          if(!empty($productdata)){
                                            foreach ($productdata as $pro){ ?>
                                            <!-- <div class="row prdut"> -->
                                              <?php if($count > 0 ){ ?>
                                                <div class="row prdut">
                                              <?php } ?>
                                              <div class="col-md-11 divPROD">
                                                  <div class="form-group">
                                                      <label class="exampleFormControlSelect1 customcardlabel">Product *</label>
                                                      <input type="text" class="form-control customcardinput product_name" name="product_name" id="<?php echo $pro->product_id; ?>" value="<?= isset($pro->product_name) ? $pro->product_name : '' ;?>" />
                                                      <input type="hidden" class="form-control" name="product_id[]" id="product_id_select<?php echo $pro->product_id; ?>" value="<?= isset($pro->product_id) ? $pro->product_id : '' ;?>" />
                                                      <span class="errors" id="pname_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                              </div>
                                              <?php if($count ==0 ){ ?>
                                                <div class="col-md-1 p-0 m-0 mt-3" id="adBTN">
                                                  <button type="button" class="btn btn-light apend_button add-button" href="javascript:void(0);">+</button>
                                                </div>
                                              <?php }else{ ?>
                                                <div class="col-md-1 p-0 m-0 mt-3"><button type="button" class="btn btn-light apend_button removeNominee" href="javascript:void(0);">-</button></div>
                                              <?php } $count++; ?>
                                              <?php if($count > 0 ){ ?>
                                                </div>
                                              <?php } ?>
                                            <!-- </div> -->
                                            <?php }
                                          }else{ ?>
                                            
                                              <div class="col-md-11 divPROD">
                                                  <div class="form-group">
                                                      <label class="exampleFormControlSelect1 customcardlabel">Product *</label>
                                                      <input type="text" class="form-control customcardinput product_name" name="product_name" id="<?php echo $pro->product_id; ?>" value="<?= isset($pro->product_name) ? $pro->product_name : '' ;?>" />
                                                      <input type="hidden" class="form-control" name="product_id[]" id="product_id_select<?php echo $pro->product_id; ?>" value="<?= isset($pro->product_id) ? $pro->product_id : '' ;?>" />
                                                      <span class="errors" id="pname_err" style="color:red; font-size:14px"></span>
                                                  </div>
                                              </div>
                                              <div class="col-md-1 p-0 m-0 mt-3" id="adBTN">
                                                  <button type="button" class="btn btn-light apend_button add-button" href="javascript:void(0);">+</button>
                                              </div>

                                         <?php  } ?>
                                            
                                        </div>  
                                   
                                   

                                   
                                </div>

                                
                                     <div class="col-md-6 comboAMT">
                                       <div class="form-group">
                                          <label class="exampleFormControlSelect1 customcardlabel">Product Combo Amount *</label>
                                              <div class="position-relative">
                                              <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                <input type="tel" class="form-control customcardinput" name="combo_amount" id="combo_amount" onkeypress="return isNumberKey(this, event);" value="<?= isset($coupondata->combo_amount) ? $coupondata->combo_amount : '' ;?>"/>
                                            </div>
                                            <span class="errors" id="combo_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     </div>
                                

                                <div class="row">

                                    <div class="col-md-6 category">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Category *</label>
                                        <input type="text" class="form-control customcardinput" name="category_name" id="category_name" value="<?= isset($coupondata->category_name) ? $coupondata->category_name : '' ;?>" />
                                        <input type="hidden" class="form-control" name="category_id" id="category_id_select" value="<?= isset($coupondata->category_id) ? $coupondata->category_id : '' ;?>" />
                                        <span class="errors" id="pcat_err" style="color:red; font-size:14px"></span>
                                      </div>
                                      
                                   </div> 
                                    <div class="col-md-6 brand">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Brand *</label>
                                        <input type="text" class="form-control customcardinput" name="brand_name" id="brand_name" value="<?= isset($coupondata->brand_name) ? $coupondata->brand_name : '' ;?>" />
                                        <input type="hidden" class="form-control" name="brand_id" id="brand_id_select" value="<?= isset($coupondata->brand_id) ? $coupondata->brand_id : '' ;?>" />
                                        <span class="errors" id="pbrand_err" style="color:red; font-size:14px"></span>
                                      </div>
                                      
                                   </div>   
                                   
                                   <div class="col-md-6 discountTYPE">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Discount Type *</label>
                                        <select class="form-control customcardinput" name="discount_type" id="discount_type">
                                          <option value="<?=$coupondata->coupon_price_type?>" selected><?php if($coupondata->coupon_price_type == 1){?> Discount Amount <?php }elseif($coupondata->coupon_price_type == 2){?> Discount Percentage <?php } ?> </option>
                                          <?php if($coupondata->coupon_price_type == '1'){?>
                                            <option value="2">Discount Percentage</option>
                                          <?php }elseif($coupondata->coupon_price_type == '2'){?>
                                          <option value="1">Discount Amount</option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                   </div>  
                                      
                                   <div class="col-md-6 damounts">
                                    <div class="form-group">
                                        <label class="customcardlabel">Discount Amount *</label>
                                        <div class="position-relative">
                                          <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                          <input type="text" value="<?= isset($coupondata->coupon_amount) ? $coupondata->coupon_amount : '' ;?>" onkeypress="return isNumberKey(this, event);" name ="discount_amount" class="form-control customcardinput" id="discount_amount" aria-describedby="" placeholder="Enter Discount Amount">
                                        </div>
                                        <span class="errors" id="damt_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   

                                   <div class="col-md-6 dpercentage">
                                    <div class="form-group dper">
                                        <label class="customcardlabel">Discount Percentage *</label>
                                        <input type="text" value="<?= isset($coupondata->discount_percentage) ? $coupondata->discount_percentage : '' ;?>" onkeypress="return isNumberKey(this, event);" name ="discount_percentage" class="form-control customcardinput" id="discount_percentage" aria-describedby="" placeholder="Enter Discount Percentage">
                                        <span class="errors" id="dper_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Conditions</label>
                                        <select class="form-control customcardinput" name="coupon_condition" id="coupon_condition">
                                            <option value="" <?php echo ($coupondata->coupon_condition == '')?'selected':'' ?>>--Select Coupon Type--</option>
                                            <option value="1" <?php echo ($coupondata->coupon_condition == '1')?'selected':'' ?>>Total Greater Than</option>
                                            <option value="2" <?php echo ($coupondata->coupon_condition == '2')?'selected':'' ?>>Total Less Than</option>
                                            <option value="3" <?php echo ($coupondata->coupon_condition == '3')?'selected':'' ?>>Product Greater Than (Only for product coupon type)</option>
                                            <option value="4" <?php echo ($coupondata->coupon_condition == '3')?'selected':'' ?>>Product Less Than (Only for product coupon type)</option>
                                        </select>
                                        <span class="errors" id="con_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                          <label class="customcardlabel">Amount</label>
                                          <div class="position-relative">
                                              <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                              <input class="form-control customcardinput" value="<?= isset($coupondata->coupon_condition_price) ? $coupondata->coupon_condition_price : '' ;?>"  name ="coupon_condition_price" id="coupon_condition_price" type="text"  placeholder="Enter Amount" onkeypress="return isNumberKey(this, event);">
                                          </div>    
                                          <span class="errors" id="amt_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Use Type
                                        </label>
                                        <select class="form-control customcardinput" name="usetype" id="exampleFormControlSelect1">
                                          <option value="<?=$coupondata->usetype?>" selected><?php if($coupondata->usetype == 1){?> Single Use <?php }elseif($coupondata->usetype == 2){?> Multi Use <?php } ?> </option>
                                          <?php if($coupondata->usetype == '1'){?>
                                          <option value="2">Multi Use</option>
                                          <?php }elseif($coupondata->usetype == '2'){?>
                                          <option value="1">Single Use</option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                      
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="customcardlabel" for=" customcardlabel">Auto Apply</label>
                                        <select class="form-control customcardinput" name="autoapply" id="autoapply">
                                            <option value="<?=$coupondata->autoapply?>" selected><?php if($coupondata->autoapply == 1){?> Yes <?php }elseif($coupondata->autoapply == 0){?> No <?php } ?> </option>
                                          <?php if($coupondata->autoapply == '1'){?>
                                          <option value="0">No</option>
                                          <?php }elseif($coupondata->autoapply == '0'){?>
                                          <option value="1">Yes</option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                   </div>
                                  
                              
                               
                                <div class="col-md-6 applyType">
                                  <div class="form-group">
                                   <label class="customcardlabel" for="exampleFormControlSelect1 ">Apply Type </label>
                                      <select class="form-control customcardinput" name="apply_type" id="coupon_apply_type">
                                        <option value="<?=$coupondata->coupon_apply_type?>" selected><?php if($coupondata->coupon_apply_type == 1){?> Exclusive <?php }elseif($coupondata->coupon_apply_type == 0){?> Normal <?php } ?> </option>
                                          <?php if($coupondata->coupon_apply_type == '1'){?>
                                          <option value="0">Normal</option>
                                          <?php }elseif($coupondata->coupon_apply_type == '0'){?>
                                          <option value="1">Exclusive</option>
                                          <?php } ?>
                                      </select>
                                 </div>                                   
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label customcardlabel" for="date-of-birth">Start Date * </label>
                                      <input type="text" name="start_date" class=" form-control inputfile customcardinput inputDate" id="start_date"  value="<?= isset($coupondata->start_date) ? date('m-d-Y',strtotime($coupondata->start_date)) : '' ;?>" style="background: #fff;"/>
                                      <span class="errors" id="start_err" style="color:red; font-size:14px"></span>
                                  </div>    
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label customcardlabel" for="date-of-birth">Expiry Date * </label>
                                    <input type="text" class="form-control inputfile customcardinput inputDate" name="end_date" id="end_date" value="<?= isset($coupondata->end_date) ? date('m-d-Y',strtotime($coupondata->end_date)) : '' ;?>" style="background: #fff;"/>
                                    <span class="errors" id="end_err" style="color:red; font-size:14px"></span>
                                    <span class="errors" id="date_err" style="color:red; font-size:14px"></span>
                                  </div>
                                </div>
                                <div class="col-md-12 coupDetails">
                                  <div class="form-group">
                                    <label class="form-control-label customcardlabel" for="date-of-birth">Coupon Details *</label>
                                    <input type="text" class="form-control inputfile customcardinput" name="coupon_details" id="details" value="<?= isset($coupondata->coupon_details) ? $coupondata->coupon_details : '' ;?>" placeholder="Enter Coupon Details" />
                                    <span class="errors" id="details_err" style="color:red; font-size:14px"></span>
                                  </div>
                                </div>
                                

                           </div>
                           <!-- container -->
                          
                           
                               <!-- container -->
                              
                         </div>
                         <!-- cardbody -->
                         <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('Loyalty/manage_coupon')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Update</button>
                            </div>
                         </div>
                     </div>
                   </form>
               </div>
             </div>
       </div>
<!-- <div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">
                     <div class="customcard">
                         <div class="customcardheader">
                              <p>Add a new coupon</p>
                         </div>
                         <!-- cardheader -->
                         <!-- <div class="customcardbody ">
                           <div class="container mb25">
                            
                               <div class="row">
                                   
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Coupon code</label>
                                        <input type="text" class="form-control customcardinput" id="" aria-describedby="" placeholder="Enter value here">
                                        <small id="emailHelp" class="form-text text-muted">This value will identify the coupon.</small>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel">Value</label>
                                        <input type="email" class="form-control customcardinput" id="" aria-describedby="emailHelp" placeholder="Enter value here">
                                        <small id="emailHelp" class="form-text text-muted">It can be the percentage or the fixed amount.</small>
                                      </div>
                                   </div>
                                   
                                   <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1 customcardlabel">Coupon type</label>
                                        <select class="form-control customcardinput" id="exampleFormControlSelect1">
                                          <option>Enter coupon type</option>
                                          <option>Fixed</option>
                                          <option>Percentage</option>
                                         
                                        </select>
                                      </div>
                                      <small id="emailHelp" class="form-text text-muted">Type of discount coupon.</small>
                                      
                                   </div>
                                   <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1 customcardlabel">Usage limit
                                        </label>
                                        <select class="form-control customcardinput" id="exampleFormControlSelect1">
                                            <option>Enter value here</option>
                                         
                                        </select>
                                      </div>
                                      
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1 customcardlabel">Validity of coupon (In days)</label>
                                        <select class="form-control customcardinput" id="exampleFormControlSelect1">
                                            <option>enter days</option>
                                         
                                        </select>
                                      </div>
                                      <small id="emailHelp" class="form-text text-muted">  After the expiry date, the coupon will no longer be usable.</small>
                                    
                                      <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label customcardlabel checklabel" for="exampleCheck1">Is Active?</label>
                                      </div>
                                </div>
                                   
                               </div>

                               <div class="row">
                                   <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="customcardlabel" for=" customcardlabel">Required Prodcuts</label>
                                      <select  multiple="multiple" class="form-control customcardinput js-example-basic-multiple" id="exampleFormControlSelect">
                                          <option>Selected products</option>
                                          <option>OLD Monk</option>
                                          <option>jack Daneles</option>
                                         
                                       
                                      </select>
                                    </div>
                                       
                                       
                                      
                                   </div>
                                  
                               </div>
                               <div class="row">
                                <div class="col-md-12">
                                 <div class="form-group">
                                   <label class="customcardlabel" for="exampleFormControlSelect1 ">Required Categories</label>
                                   <select style="border: 1px solid #ced4da!important;"  multiple="multiple" class="form-control customcardinput js-example-basic-multiple2" id="exampleFormControlSelect2">
                                       <option>Enter Products</option>
                                       <option>OLD Monk</option>
                                       <option>jack Daneles</option>
                                      
                                    
                                   </select>
                                 </div>
                                    
                                    
                                   
                                </div>
                            </div>
                          
                          <div class="form-group">
                            <label class="customcardlabel" for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                           </div> -->
                           <!-- container -->
                          
                           
                               <!-- container -->
                              
                         <!-- </div> -->
                         <!-- cardbody -->
                         <!--<div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('Ccoupon/manage_coupon')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Add</button>
                            </div>
                         </div>
                     </div>
               </div>
             </div>
       </div> -->


<link rel="stylesheet" href="<?=base_url()?>assets/style/ui@1.11.4/jquery-ui.css">  
<script src="<?=base_url()?>assets/js/jquery@1.10.2/jquery-1.10.2.js"></script>  
<script src="<?=base_url()?>assets/js/ui@1.11.4/jquery-ui.js"></script> 
<link rel="stylesheet" href="<?=base_url()?>assets/flatpickr/flatpickr.min.css">  
<script src="<?=base_url()?>assets/flatpickr/flatpickr.js"></script> 
<script type="text/javascript">
  //only use datepicker 
    $(".inputDate").flatpickr({
        enableTime: false,
        dateFormat: "m-d-Y",
        minDate: "today",  //dateformat using m.d.y
        "locale": {
            "firstDayOfWeek": 1 // set start day of week to Monday
        }
    });
  $(document).ready(function() {

    var addButton = $('.add-button');
    var x = 1; //Initial field counter is 1
    var maxField = 6; 

    $(addButton).click(function () {
       //Check maximum number of input fields
      if (x < maxField) {
    
          var wrapper = $('.item-apend'); //Input field wrapper
          var randoMID = Math.floor(1000 + Math.random() * 9000);
          // var passedArray =  <?php //echo json_encode($productdata) ?>;  
          // for(var i = 1; i < passedArray.length; i++){ 

          var fieldHTML =
          //New input field html 
         '<div class="row prdut"><div class="col-md-11"><div class="form-group"><label class="customcardlabel" for="">Product *</label><input type="text" class="form-control customcardinput product_name" name="product_name" id="'+randoMID+'" value="" /><input type="hidden" class="form-control product_select" name="product_id[]" id="product_id_select'+randoMID+'" value="" /></div></div><div class="col-md-1 p-0 m-0 mt-3"><button type="button" class="btn btn-light apend_button removeNominee" href="javascript:void(0);">-</button></div></div><script>$("#'+randoMID+'").autocomplete({source: function( request, response ) {$.ajax({type: "ajax",method: "post",url: "<?=base_url("Loyalty/fetch_product")?>",dataType: "json",data: {searchtxt: request.term},success: function( data ) {response( data );}});},select: function( event, ui ) {$("#'+randoMID+'").val(ui.item.label);$("#product_id_select'+randoMID+'").val(ui.item.value);return false;}});';
           x++; //Increment field counter
           $(wrapper).append(fieldHTML); //Add field html
          // } //for loop end 
      }
    });

     // $('.product').hide();
     // $('.product2').hide();
     
     // $('.productqty').hide();
     // $('.dpercentage').hide();
     // $('.category').hide();
     // $('.brand').hide();
     // $('.comboAMT').hide();
     // $('.applyType').removeClass('col-md-12');
     // $('.applyType').addClass('col-md-6');

     if($('#coupon_type').val() == '1'){
        $('.product').hide();
        $('.product2').hide();
        $('.productqty').hide();
        $('.discountTYPE').show();
        $('.category').hide();
        $('.brand').hide();
        $('.comboAMT').hide();
        
        if($('#discount_type').val() == 1) {
            $('.dpercentage').hide();
            $('.damounts').show();
        }if($('#discount_type').val() == 2){
          $('.dpercentage').show();
          $('.damounts').hide();
        }
    } 

     if($('#coupon_type').val() == '3'){
          $('#adBTN').hide();
          $('.divPROD').addClass('col-md-12');
          $('.divPROD').removeClass('col-md-11');
          $('.product').hide();
          $('.productqty').show();
          $('.productqty').removeClass('col-md-12');
          $('.productqty').addClass('col-md-6');
          $('.applyType').removeClass('col-md-12');
          $('.applyType').addClass('col-md-6');
          $('.prdut').hide();
          $('.product2').show();
          
          $('.category').hide();//added
          $('.brand').hide(); //added
          $('.comboAMT').hide(); //added
          $('.discountTYPE').show();//added
          //added
          if($('#discount_type').val() == 1) { 
            $('.dpercentage').hide();
            $('.damounts').show();
          }if($('#discount_type').val() == 2){
            $('.dpercentage').show();
            $('.damounts').hide();
          }
     }
     if($('#coupon_type').val() == '8'){
          $('.discountTYPE').hide();
          $('.damounts').hide();
          $('.dpercentage').hide();
          //$('#adBTN').show();
          // $('.divPROD').removeClass('col-md-12');
          // $('.divPROD').addClass('col-md-11');
          $('.productqty').show();
          $('.productqty').removeClass('col-md-6');
          $('.productqty').addClass('col-md-12');
//          $('.coupDetails').removeClass('col-md-12');
//          $('.coupDetails').addClass('col-md-12');
          $('.comboAMT').show();

          $('.product').show();
          $('.applyType').removeClass('col-md-12');
          $('.applyType').addClass('col-md-6');


          $('.category').hide();//added
          $('.brand').hide(); //added
          $('.product2').hide(); //added

     }
     if($('#coupon_type').val() == '9'){
          $('.coupDetails').removeClass('col-md-12');
          $('.coupDetails').addClass('col-md-6');
          $('.category').show();
          
          $('.product').hide();//added
          $('.product2').hide(); //added
          $('.productqty').hide();//aded
          $('.comboAMT').hide();//added
          $('.brand').hide();//added
          
          $('.discountTYPE').show();//added
          
          if($('#discount_type').val() == 1) {
             $('.dpercentage').hide();
             $('.damounts').show();
          }if($('#discount_type').val() == 2){
             $('.dpercentage').show();
             $('.damounts').hide();
          }
      }
       if($('#coupon_type').val() == '10'){
          $('.coupDetails').removeClass('col-md-12');
          $('.coupDetails').addClass('col-md-6');
          $('.brand').show();
          
          $('.product').hide();//added
          $('.product2').hide(); //added
          $('.productqty').hide();//aded
          $('.comboAMT').hide();//added
          $('.category').hide();//added
          $('.discountTYPE').show();//added
          
          if($('#discount_type').val() == 1) {
             $('.dpercentage').hide();
             $('.damounts').show();
          }if($('#discount_type').val() == 2){
             $('.dpercentage').show();
             $('.damounts').hide();
          }
      }

      if($('#coupon_apply_type').val() == '1'){
         $('#autoapply').val(0);
         $('#autoapply').attr('disabled',true);
      }

    $( ".product_name" ).autocomplete({
        source: function( request, response ) {
              //var searchtxt = extractLast(request.term);
          $.ajax({
            type: 'ajax',
            method: 'post',
             url: "<?=base_url("Loyalty/fetch_product")?>",
             dataType: "json",
             data: {
               searchtxt: request.term
             },
             success: function( data ) {
               response( data );
             }
           });
        },
        select: function( event, ui ) {
          $('.product_name').val(ui.item.label); // display the selected text
          $('#product_id_select').val(ui.item.value); // save selected id to input
          return false;
        }
                   
    });


    // $( "#product_name" ).autocomplete({
    //     source: function( request, response ) {
    //           //var searchtxt = extractLast(request.term);
    //       $.ajax({
    //         type: 'ajax',
    //         method: 'post',
    //          url: "<?=base_url("Loyalty/fetch_product")?>",
    //          dataType: "json",
    //          data: {
    //            searchtxt: request.term
    //          },
    //          success: function( data ) {
    //            response( data );
    //          }
    //        });
    //     },
    //     select: function( event, ui ) {
    //       $('#product_name').val(ui.item.label); // display the selected text
    //       $('#product_id_select').val(ui.item.value); // save selected id to input
    //       return false;
    //     }
                   
    // });

    $( "#category_name" ).autocomplete({
        source: function( request, response ) {
              //var searchtxt = extractLast(request.term);
          $.ajax({
            type: 'ajax',
            method: 'post',
             url: "<?=base_url("Loyalty/fetch_category")?>",
             dataType: "json",
             data: {
               searchtxt: request.term
             },
             success: function( data ) {
               response( data );
             }
           });
        },
        select: function( event, ui ) {
          $('#category_name').val(ui.item.label); // display the selected text
          $('#category_id_select').val(ui.item.value); // save selected id to input
          return false;
        }
                   
    });

         $( "#brand_name" ).autocomplete({
        source: function( request, response ) {
              //var searchtxt = extractLast(request.term);
          $.ajax({
            type: 'ajax',
            method: 'post',
             url: "<?=base_url("Loyalty/fetch_brand")?>",
             dataType: "json",
             data: {
               searchtxt: request.term
             },
             success: function( data ) {
               response( data );
             }
           });
        },
        select: function( event, ui ) {
          $('#brand_name').val(ui.item.label); // display the selected text
          $('#brand_id_select').val(ui.item.value); // save selected id to input
          return false;
        }
                   
    });

    //use only combo product
    // $( "#productName" ).autocomplete({
    //     source: function( request, response ) {
    //           //var searchtxt = extractLast(request.term);
    //       $.ajax({
    //         type: 'ajax',
    //         method: 'post',
    //          url: "<?=base_url("Loyalty/fetch_product")?>",
    //          dataType: "json",
    //          data: {
    //            searchtxt: request.term
    //          },
    //          success: function( data ) {
    //            response( data );
    //          }
    //        });
    //     },
    //     select: function( event, ui ) {
    //       $('#productName').val(ui.item.label); // display the selected text
    //       $('#product_id_select').val(ui.item.value); // save selected id to input
    //       return false;
    //     }
                   
    // });
     



  });

  $('#coupon_type').on('change', function() {
    // alert($(this).val());
      // $('.product').hide();
      // $('.productqty').hide();
      // $('.brand').hide();
      // $('.category').hide();
      // $('.comboAMT').hide();
      // $('.product2').hide();
      

      $('.applyType').removeClass('col-md-12');
      $('.applyType').addClass('col-md-6');
      // $('.discountTYPE').show();
      // $('.damounts').show();

      $('.coupDetails').removeClass('col-md-6');
      $('.coupDetails').addClass('col-md-12');

      if($(this).val() == '1'){
        $('.product').hide();
        $('.productqty').hide();
        $('.brand').hide();
        $('.category').hide();
        $('.comboAMT').hide();
        $('.product2').hide();
        $('.discountTYPE').show();
        if($('#discount_type').val() == 1) {
            $('.dpercentage').hide();
            $('.damounts').show();
        }if($('#discount_type').val() == 2){
          $('.dpercentage').show();
          $('.damounts').hide();
        }
    }

      if($(this).val() == '3'){
          $('#adBTN').hide();
          $('.divPROD').removeClass('col-md-11');
          $('.divPROD').addClass('col-md-12');

          $('.productqty').removeClass('col-md-12');
          $('.productqty').addClass('col-md-6');

          $('.discountTYPE').show();
          $('.damounts').show();
          $('.product').show();
          $('.productqty').show();
          $('.prdut').hide();
          $('.product2').show();
          $('.product').hide();
          $('.comboAMT').hide(); //added
          $('.brand').hide();
          $('.category').hide();
          
          if($('#discount_type').val() == 1) {
              $('.dpercentage').hide();
              $('.damounts').show();
          }if($('#discount_type').val() == 2){
            $('.dpercentage').show();
            $('.damounts').hide();
          }
      }
      if($(this).val() == '8'){
          $('#adBTN').show();
          $('.divPROD').removeClass('col-md-12');
          $('.divPROD').addClass('col-md-11');
          $('.comboAMT').show();
          $('.discountTYPE').hide();
          $('.damounts').hide();
          $('.dpercentage').hide();
          $('.prdut').show();
          $('.product2').hide(); //added
          $('.brand').hide();//added
          $('.category').hide(); //added

          

          $('.product').show();
          $('.productqty').show();
          $('.applyType').removeClass('col-md-12');
          $('.applyType').addClass('col-md-6');
          $('.coupDetails').removeClass('col-md-6');
          $('.coupDetails').addClass('col-md-12');
          $('.productqty').removeClass('col-md-6');
          $('.productqty').addClass('col-md-12');


      }

       if($(this).val() == '9'){
          $('.category').show();
         
          $('#brand_name').val('');
          //$('.productqty').show();
          $('.applyType').removeClass('col-md-12');
          $('.applyType').addClass('col-md-6');
          $('.coupDetails').removeClass('col-md-12');
          $('.coupDetails').addClass('col-md-6');
          $('.discountTYPE').show();
          //$('.damounts').show();
          $('.product2').hide(); //added
          $('.product').hide(); //added
          $('.productqty').hide();//added
          $('.comboAMT').hide(); //added
          $('.brand').hide();

          if($('#discount_type').val() == 1) {
              $('.dpercentage').hide();
              $('.damounts').show();
          }if($('#discount_type').val() == 2){
            $('.dpercentage').show();
            $('.damounts').hide();
          }

      }

       if($(this).val() == '10'){
          $('.brand').show();
           $('#category_name').val('');
         // $('.productqty').show();
          $('.applyType').removeClass('col-md-12');
          $('.applyType').addClass('col-md-6');
          $('.coupDetails').removeClass('col-md-12');
          $('.coupDetails').addClass('col-md-6');
          $('.discountTYPE').show();
          
           $('.category').hide();//addded

          if($('#discount_type').val() == 1) {
              $('.dpercentage').hide();
              $('.damounts').show();
          }if($('#discount_type').val() == 2){
            $('.dpercentage').show();
            $('.damounts').hide();
          }
          
          $('.product2').hide(); //added
          $('.product').hide(); //added
          $('.productqty').hide();//added
          $('.comboAMT').hide(); //added
      }

      // 
      
  
  });

  
  

  $('#discount_type').on('change', function() {
      if($(this).val() == '2'){
          $('.dpercentage').show();
          $('.damounts').hide();
      }
      if($(this).val() == '1'){
          $('.dpercentage').hide();
          $('.damounts').show();
      }
  });

  $('#coupon_apply_type').on('change', function() {
      if($(this).val() == '1'){
          $('#autoapply').val(0);
          $('#autoapply').attr('disabled',true);
      }
      if($(this).val() == '0'){
          $('#autoapply').attr('disabled',false);
      }


  });

  $('#coupon_name').on('change', function() {
        var coupon_name = $('#coupon_name').val();
        $.ajax({
            url: '<?=base_url("Loyalty/check_coupon");?>',
            type:'post',
            data:{coupon_name:coupon_name},
            success:function(data){
              console.log(data);
                if(data=='success'){
                    $("#cname_err").html("").show();
                }else{
                     $("#cname_err").html("This Coupon is already exist").show();
                    return false;
                }
            }
        });
    });

  $('#btnSave').on('click', function() {
        if($('#coupon_name').val() == ''){
            $("#cname_err").html("Please enter Coupon Name").show();
            return false;
        }

        if($('#coupon_type').val() == '3'){
          if($('#product_name').val() == ''){
            $("#pname_err").html("Please enter Product Name").show();
            return false;
          }
        }

        if($('#coupon_type').val() == '8'){
          if($('#product_name').val() == ''){
            $("#pname_err").html("Please enter Product Name").show();
            return false;
          }

          if($('#product_q').val() == '' || $('#product_q').val() == '0'){
            $("#qty_err").html("Please enter Product Quantity").show();
            return false;
          }

          if($('#combo_amount').val() == '0'){
            $("#combo_err").html("Please enter Product Combo Amount").show();
            return false; 
          }

        }
        if($('#coupon_type').val() != '8'){
          if($('#discount_type').val() == '1'){
            if($('#discount_amount').val() == ''){
                $("#damt_err").html("Please enter Discount Amount").show();
                return false;
            }
          }
          if($('#discount_type').val() == '2'){
            if($('#discount_percentage').val() == ''){
                $("#dper_err").html("Please enter Discount Percentage").show();
                return false;
            }
          }
        }
        

        if($('#coupon_condition').val() != ''){
          if($('#coupon_condition_price').val() == '0.00'){
              $("#amt_err").html("Please enter Amount").show();
              return false;
          }
        } 

        if($('#coupon_condition_price').val() != '0.00'){
          if($('#coupon_condition').val() == ''){
              $("#con_err").html("Please select Condition").show();
              return false;
              }
        }

        if($('#start_date').val() == ''){
             $("#start_err").html("Please select Start Date").show();
            return false;
        }
        if($('#end_date').val() == ''){
            $("#end_err").html("Please select Expiry Date").show();
            return false;
        }
        if($('#end_date').val() < $('#start_date').val()){
            $("#date_err").html("Expiry Date is less than Start Date, Please Select Correct Date").show();
            return false;
        }  

        if($('#details').val() == ''){
             $("#details_err").html("Please enter Coupon Details").show();
            return false;
        } 

    });


    $('.customcardinput').bind('change', function() {

        if($('#coupon_name').val() == ''){
            $("#cname_err").html("Please enter Coupon Name").show();
            return false;
        }else{
            $("#cname_err").html("").show();
        }
        
        if($('#coupon_type').val() == '3'){
          if($('#product_name').val() == ''){
            $("#pname_err").html("Please enter Product Name").show();
            return false;
          }else{
            $("#pname_err").html("").show();
          }
        }

        if($('#coupon_type').val() == '8'){
          if($('#product_name').val() == ''){
            $("#pname_err").html("Please enter Product Name").show();
            return false;
          }else{
            $("#pname_err").html("").show();
          }

          if($('#product_q').val() == '' || $('#product_q').val() == '0'){
            $("#qty_err").html("Please enter Product Quantity").show();
            return false;
          }else{
            $("#qty_err").html("").show();
          }

          if($('#combo_amount').val() == '0'){
            $("#combo_err").html("Please enter Product Combo Amount").show();
            return false; 
          }
          else{
            $("#combo_err").html("").show();
          }

        }
        if($('#coupon_type').val() != '8'){
          if($('#discount_type').val() == '1'){
              if($('#discount_amount').val() == ''){
                  $("#damt_err").html("Please enter Discount Amount").show();
                  return false;
              }else{
                $("#damt_err").html("").show();
              }
          }
          if($('#discount_type').val() == '2'){
              if($('#discount_percentage').val() == ''){
                  $("#dper_err").html("Please enter Discount Percentage").show();
                  return false;
              }else{
                $("#dper_err").html("").show();
              }
          }
        }

        if($('#coupon_condition').val() != ''){
          if($('#coupon_condition_price').val() == '0.00'){
              $("#amt_err").html("Please enter Amount").show();
              return false;
          }else{
              $("#amt_err").html("").show();
          }
        } 

        if($('#coupon_condition_price').val() != '0.00'){
          if($('#coupon_condition').val() == ''){
              $("#con_err").html("Please select Condition").show();
              return false;
          }else{
              $("#con_err").html("").show();
          }
        }  

        if($('#start_date').val() == ''){
             $("#start_err").html("Please select Start Date").show();
            return false;
        }else{
            $("#start_err").html("").show();
        }
        if($('#end_date').val() == ''){
             $("#end_err").html("Please select Expiry Date").show();
            return false;
        }else{
            $("#end_err").html("").show();
        }
        if($('#end_date').val() < $('#start_date').val()){
            $("#date_err").html("Expiry Date is less than Start Date, Please Select Correct Date").show();
            return false;
        }else{
          $("#date_err").html("").show();
        }
        if($('#details').val() == ''){
             $("#details_err").html("Please enter Coupon Details").show();
            return false;
        }else{
          $("#details_err").html("").show();
        } 
             
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