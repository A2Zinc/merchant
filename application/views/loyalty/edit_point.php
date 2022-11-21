<div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">
                     <div class="customcard">
                         <div class="customcardheader">
                              <p>Update Point</p>
                         </div>
                         <!-- cardheader -->
                         <form action="<?=base_url('LoyaltyPoint/update_point')?>" method="post" class="update_point" autocomplete="off"> 
                         <div class="customcardbody ">
                           <div class="container mb25">
                            
                               <div class="row">
                                   <input type="hidden" name="point_id" value="<?= isset($pointdata['point_id']) ? $pointdata['point_id'] : '' ;?>" class="form-control">
                                   <div class="col-md-12">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Point Type *</label>
                                        <select class="form-control customcardinput" required="" name="point_type" id="point_type" disabled="true">
                                          <option>--Select Point Type--</option>
                                          <option value="1" <?php echo ($pointdata['point_type'] == '1')?'selected':''?>>New Register</option>
                                         
                                          <option value="2" <?php echo ($pointdata['point_type'] == '2')?'selected':''?>>By Value </option>
                                         
                                        </select>
                                         <input type="hidden" name="point_type_ini" id="point_type_ini" value="<?=$pointdata['point_type']?>" class="form-control">
                                        <span class="errors" id="ptype_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>  
                                   <div class="col-md-6 point">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Point *</label>
                                        <input type="text" class="form-control customcardinput" name="point" id="point" value="<?=$pointdata['point']?>" onkeypress="return isNumberKey(this, event);"/>
                                       
                                        <span class="errors" id="point_err" style="color:red; font-size:14px"></span>
                                      </div>
                                      
                                   </div> 
                                   <div class="col-md-6 pamount">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Amount *</label>
                                        <input type="text" class="form-control customcardinput" name="point_amount" id="point_amount" value="<?=$pointdata['point_amount']?>" onkeypress="return isNumberKey(this, event);"/>
                                        <span class="errors" id="pamt_err" style="color:red; font-size:14px"></span>
                                      </div>
                                      
                                   </div> 
                                   </div>  
                                  
                           </div>
                                

                           </div>
                           <!-- container -->
                          
                           
                               <!-- container -->
                              
                         </div>
                         <!-- cardbody -->
                         <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('LoyaltyPoint/manage_point')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
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
<script type="text/javascript">
  $(document).ready(function() {
     $('.point').hide();
     $('.pamount').hide();
     //alert($('#point_type_ini').val());

     if( $('#point_type_ini').val() == '1')
     {
         $('.point').show();
     
     }else if( $('#point_type_ini').val() == '2')
     {
       $('.point').show();
      $('.pamount').show();
     }
    


  });

  $('#point_type').on('change', function() {
     $('.point').hide();
     $('.pamount').hide();
     
      if($(this).val() == '1'){
          $('.point').show();
        
          $('#point_amount').val('');
         
      }
      if($(this).val() == '2'){
          $('.point').show();
          $('.pamount').show();
         
      }
  });
 


  $('#point_name').on('blur', function() {
      var point_name = $('#point_name').val();
      $.ajax({
          url: '<?=base_url("Loyalty/check_coupon");?>',
          type:'post',
          data:{coupon_name:coupon_name},
          success:function(response){
              if (response == 'fail' ) {
                coupon_state = false;
                $("#cname_err").html("This Coupon Name is already exist").show();
              }else if (response == 'success') {
                coupon_state = true;
                $("#cname_err").html("").show();
              }
          }
      });
  });

  $('#btnSave').on('click', function() {
        var today = new Date().getFullYear()+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+("0"+new Date().getDate()).slice(-2);
        
        if($('#point_type').val() == '--Select Point Type--'){
            $("#ptype_err").html("Please select point type").show();
            return false;
        }
        
      
        if($('#point_type').val() == '1'){
          if($('#point').val() == ''){
            $("#point_err").html("Please enter Point").show();
            return false;
          }
        }

        if($('#point_type').val() == '2'){
          if($('#point').val() == ''){
            $("#point_err").html("Please enter Point").show();
            return false;
          }

          if($('#point_amount').val() == ''){
                $("#pamt_err").html("Please enter Amount").show();
                return false;
            }
         

        }

       

    });


    $('.customcardinput').bind('change', function() {
      var today = new Date().getFullYear()+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+("0"+new Date().getDate()).slice(-2);

        if($('#coupon_name').val() == ''){
            $("#cname_err").html("Please enter Coupon Name").show();
            return false;
        }else{
            $("#cname_err").html("").show();
        }
        if($('#coupon_type').val() == '--Select Coupon Type--'){
            $("#ctype_err").html("Please Select Coupon Type").show();
            return false;
        }else{
            $("#ctype_err").html("").show();
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

        }

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

        if($('#coupon_condition').val() != '--Select Condition--'){
          if($('#coupon_condition_price').val() == ''){
              $("#amt_err").html("Please enter Amount").show();
              return false;
          }else{
              $("#amt_err").html("").show();
          }
        } 

        if($('#coupon_condition_price').val() != ''){
          if($('#coupon_condition').val() == '--Select Condition--'){
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
        if($('#start_date').val() < today){
          $("#start_err").html("Start Date is less than Today Date, Please Select Correct Start Date").show();
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
        if($('#end_date').val() < today){
          $("#end_err").html("Expiry Date is less than Today Date, Please Select Correct Expiry Date").show();
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