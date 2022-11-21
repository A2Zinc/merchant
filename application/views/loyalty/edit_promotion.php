<div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">
                     <div class="customcard">
                         <div class="customcardheader">
                              <p>Update Promotion</p>
                         </div>
                         <!-- cardheader -->
                         <form action="<?=base_url('Loyalty/update_promotion')?>" method="post" class="update_promotion" autocomplete="off"> 
                         <div class="customcardbody ">
                           <div class="container mb25">
                            
                               <div class="row">
                                   <input type="hidden" name="promotion_id" value="<?= isset($coupondata[0]->coupon_id) ? $coupondata[0]->coupon_id : '' ;?>" class="form-control">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="customcardlabel" for="">Promotion Name *</label>
                                          <input type="text" value="<?= isset($coupondata[0]->coupon_name) ? $coupondata[0]->coupon_name : '' ;?>" name ="promotion_name" class="form-control customcardinput" id="promotion_name" aria-describedby="" readonly>
                                          <span class="errors" id="cname_err" style="color:red; font-size:14px"></span>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="exampleFormControlSelect1 customcardlabel">Promotion Type *</label>
                                        <select class="form-control customcardinput" required="" name="promotion_type" id="promotion_type">
                                          <option value="8" <?php echo ($coupondata[0]->coupon_type == '8')?'selected':'' ?>>Product Combo promotion</option>
                                        </select>
                                      </div>
                                   </div> 
                                    <div class="col-md-6 product2">
                                         <div class="form-group">
                                            <label class="exampleFormControlSelect1 customcardlabel">Product *</label>
                                              <input type="text" class="form-control customcardinput product_name" name="product_name" id="product_name" value="" />
                                              <!-- <input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="<?= isset($productdata[0]->product_id) ? $productdata[0]->product_id : '' ;?>" /> -->
                                              <span class="errors" id="starp_err" style="color:red; font-size:14px"></span>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="exampleFormControlSelect1 customcardlabel">Size</label>

                                            <select class="form-control select-2-dropdown select_size" id="select_size" name="size">
                                                <option value="">Select Product Size</option>
                                              <?php foreach ($get_all_size as $key => $value) { ?>
                                                    <option value="<?php echo $value['name'];?>"><?php echo $value['name'];?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                   </div>
                                    <div class="col-md-12">
                                        <div class="form-group" id="product_seleted_name">
                                          <?php if(!empty($productdata)){
                                            foreach ($productdata as $value) {
                                              
                                           ?>
                                           <div id="added_product_div_<?php echo $value->product_id; ?>"><?php echo $value->product_name; ?><span class="delete_product" style="color: red;margin-left: 10px;" id="<?php echo $value->product_id; ?>">X</span><input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="<?php echo $value->product_id; ?>" /></div>
                                          <?php } } ?>
                                        </div>
                                    </div> 
                                    

                                    <div class="col-md-6 productqty">
                                         <div class="form-group">
                                            <label class="exampleFormControlSelect1 customcardlabel">Product Quantity *</label>
                                            <input type="number" class="form-control customcardinput" name="product_qty" id="product_q"  value="<?= isset($coupondata[0]->product_qty) ? $coupondata[0]->product_qty : '' ;?>" />
                                            <span class="errors" id="qty_err" style="color:red; font-size:14px"></span>
                                          </div>
                                    </div> 
                                    <div class="col-md-6 comboAMT">
                                      <div class="form-group">
                                         <label class="exampleFormControlSelect1 customcardlabel">Product Combo Amount *</label>
                                             <div class="position-relative">
                                             <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                               <input type="tel" class="form-control customcardinput" name="combo_amount" id="combo_amount" onkeypress="return isNumberKey(this, event);" value="<?= isset($coupondata[0]->combo_amount) ? $coupondata[0]->combo_amount : '' ;?>"/>
                                               </div>
                                               <span class="errors" id="combo_err" style="color:red; font-size:14px"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="exampleFormControlSelect1 customcardlabel">Use Type
                                            </label>
                                            <select class="form-control customcardinput" name="usetype" id="exampleFormControlSelect1">
                                              <option value="<?=$coupondata[0]->usetype?>" selected><?php if($coupondata[0]->usetype == 1){?> Single Use <?php }elseif($coupondata[0]->usetype == 2){?> Multi Use <?php } ?> </option>
                                              <?php if($coupondata[0]->usetype == '1'){?>
                                              <option value="2">Multi Use</option>
                                              <?php }elseif($coupondata[0]->usetype == '2'){?>
                                              <option value="1">Single Use</option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                      
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label customcardlabel">Start Date * </label>
                                            <input type="text" name="start_date" class=" form-control inputfile customcardinput inputDate" id="start_date"  value="<?= isset($coupondata[0]->start_date) ? date('m-d-Y',strtotime($coupondata[0]->start_date)) : '' ;?>" style="background: #fff;"/>
                                            <span class="errors" id="start_err" style="color:red; font-size:14px"></span>
                                        </div>    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="form-control-label customcardlabel">Expiry Date * </label>
                                          <input type="text" class="form-control inputfile customcardinput inputDate" name="end_date" id="end_date" value="<?= isset($coupondata[0]->end_date) ? date('m-d-Y',strtotime($coupondata[0]->end_date)) : '' ;?>" style="background: #fff;"/>
                                          <span class="errors" id="end_err" style="color:red; font-size:14px"></span>
                                          <span class="errors" id="date_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 coupDetails">
                                      <div class="form-group">
                                        <label class="form-control-label customcardlabel">Promotion Details *</label>
                                        <input type="text" class="form-control inputfile customcardinput" name="promotion_details" id="details" value="<?= isset($coupondata[0]->coupon_details) ? $coupondata[0]->coupon_details : '' ;?>" placeholder="Enter promotion Details" />
                                        <span class="errors" id="details_err" style="color:red; font-size:14px"></span>
                                      </div>
                                    </div>
                                </div>
                            </div>
                         <!-- cardbody -->
                         <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('Loyalty/manage_promotion')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Update</button>
                            </div>
                         </div>
                     </div>
                   </form>
               </div>
             </div>
       </div>

<link rel="stylesheet" href="<?=base_url()?>assets/flatpickr/flatpickr.min.css">        
<link rel="stylesheet" href="<?=base_url()?>assets/style/ui@1.11.4/jquery-ui.css">  
<script src="<?=base_url()?>assets/js/jquery@1.10.2/jquery-1.10.2.js"></script>  
<script src="<?=base_url()?>assets/js/ui@1.11.4/jquery-ui.js"></script> 
<script src="<?=base_url()?>assets/flatpickr/flatpickr.js"></script>
<script src="<?php echo base_url()?>assets/cashier/js/select2@4.0.8/select2.min.js" defer></script>
<link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />
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
        $('.select-2-dropdown').select2();
    });

    $( "#product_name" ).autocomplete({
        source: function( request, response ) {
              //var searchtxt = extractLast(request.term);
        var size_i = $('#select_size').val();

          $.ajax({
            type: 'ajax',
            method: 'post',
             url: "<?=base_url("Loyalty/fetch_product")?>",
             dataType: "json",
             data: {
               searchtxt: request.term,
               size_i : size_i
             },
             success: function( data ) {
               response( data );
             }
           });
        },
        select: function( event, ui ) {

          $('#product_seleted_name').append('<div id="added_product_div_'+ui.item.value+'">'+ui.item.label+'<span style="color: red;margin-left: 10px;" class="delete_product" id="'+ui.item.value+'">X</span><input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="'+ui.item.value+'" /></div>');
          $('#product_name').val('');
          $('#product_name').focus();
          
          

          // $('#product_name').val(ui.item.label); // display the selected text
          // $('#product_id_select').val(ui.item.value); // save selected id to input
          return false;
        }
                   
    });

    $(document).on('click','.delete_product', function() {
      var id = $(this).attr('id');
      $('#added_product_div_'+id).remove();
    });

    $('#btnSave').on('click', function() {
        if($('#promotion_name').val() == ''){
            $("#cname_err").html("Please enter Promotion Name").show();
            return false;
        }
        if($('#promotion_type').val() == '--Select Promotion Type--'){
            $("#ctype_err").html("Please Select Promotion Type").show();
            return false;
        }

        if($('#promotion_type').val() == '8'){
            if($('#product_name').val() == ''){
              // $("#pname_err").html("Please enter Product Name").show();
              // return false;
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
             $("#details_err").html("Please enter Promotion Details").show();
            return false;
        }  

    });
    
    $('.customcardinput').bind('change', function() {

        if($('#promotion_name').val() == ''){
            $("#cname_err").html("Please enter Promotion Name").show();
            return false;
        }else{
            $("#cname_err").html("").show();
        }
        if($('#promotion_type').val() == '--Select Promotion Type--'){
            $("#ctype_err").html("Please Select Promotion Type").show();
            return false;
        }else{
            $("#ctype_err").html("").show();
        }
        
        if($('#promotion_type').val() == '8'){
            if($('#product_name').val() == ''){
              // $("#pname_err").html("Please enter Product Name").show();
              // return false;
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
             $("#details_err").html("Please enter Promotion Details").show();
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

<script>
  $(document).on("keypress", "#product_name", function(e){

    if(e.which == 13) {
      var case_UPC = $("#product_name").val();
    
      $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?=base_url('Loyalty/get_product_by_barcode')?>',
          data: {case_UPC : case_UPC},
          //async: false,
          dataType: 'json',
          success: function(data){
              console.log(data);
              $('#product_seleted_name').append('<div id="added_product_div_'+data.product_id+'">'+data.product_name+'<span style="color: red;margin-left: 10px;" class="delete_product" id="'+data.product_id+'">X</span><input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="'+data.product_id+'" /></div>');
              $('#product_name').val('');
              $('#product_name').focus();
          },

      });
      return false;

      } 

  });
</script>
