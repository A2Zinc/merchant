<div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">

                     <div class="customcard">
                         <div class="customcardheader">
                              <p><?php echo $title ?></p>
                         </div>
                         <!-- cardheader -->
                        <form action="<?=base_url('Cproduct/insert_product')?>" method="post" class="save-merchant" enctype="multipart/form-data" autocomplete="off"> 
                          <div class="">
                              <div class=" mb25 " style="padding: 15px">
                                  <div class="row">
                                   <div class="col-md-12"><br><br></div>

                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Merchant Name*</label>
                                           <input type="text" onClick="this.select();" required="" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[name]" value="<?php echo isset($merchant->name)?$merchant->name:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Merchant Email*</label>
                                           <input type="email" onClick="this.select();" required="" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[email]" value="<?php echo isset($merchant->email)?$merchant->email:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Merchant Address*</label>
                                           <input type="text" onClick="this.select();" required="" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[address]" value="<?php echo isset($merchant->address)?$merchant->address:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                       <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">City</label>
                                           <input type="text" onClick="this.select();" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[city]" value="<?php echo isset($merchant->city)?$merchant->city:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">State</label>
                                           <input type="text" onClick="this.select();" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[state]" value="<?php echo isset($merchant->state)?$merchant->state:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">EIN No.</label>
                                           <input type="text" onClick="this.select();" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[tin]" value="<?php echo isset($merchant->tin)?$merchant->tin:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Mobile</label>
                                           <input type="text" onClick="this.select();" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[mobile_no]" value="<?php echo isset($merchant->mobile_no)?$merchant->mobile_no:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Company Name </label>
                                           <input type="text" onClick="this.select();" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[company_name]" value="<?php echo isset($merchant->company_name)?$merchant->company_name:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>
                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Industry Type</label>
                                           <input type="text" onClick="this.select();" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[industry_type]" value="<?php echo isset($merchant->industry_type)?$merchant->industry_type:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Number of Stores </label>
                                           <input type="number" onClick="this.select();" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[no_of_store]" value="<?php echo isset($merchant->no_of_store)?$merchant->no_of_store:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">Number of Terminals </label>
                                           <input type="number" onClick="this.select();" class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[no_of_terminal]" value="<?php echo isset($merchant->no_of_terminal)?$merchant->no_of_terminal:'' ?>" plceholder="Please enter Product Name">
                                          <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                                         </div>
                                      </div>

                                      <div class="col-md-4 ">
                                       <div class="form-group ">
                                           <label class="customcardlabel" for="">License Key </label>
                                          <?php if($this->uri->segment(2)=='add'){ ?>
                                            <input type="text" readonly=""  class="form-control customcardinput"  aria-describedby="" name="merchant[license_key]" value="<?php  echo date('ymdhis').rand(10000,999999)  ?>" plceholder="Please enter Product Name">
                                            <?php   } else { ?>  
                                           <input type="text" disabled=""  class="form-control customcardinput" id="product_name" aria-describedby="" name="merchant[license_key]" value="<?php echo isset($merchant->license_key)?$merchant->license_key:'' ?>" plceholder="Please enter Product Name">
                                            <?php  } ?>
                                          
                                         </div>
                                      </div>

                                     
                                    
                                    
                                     
                                       
                                          

                                        </div>
                            <div style="text-align: center;">
                                <a href='<?=base_url('Cproduct/manage_product')?>' type="button" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary custom_save_merchant btn-sm" id="btnSave">Save</button>
                            </div>
                                      
                                        
                                        </div>
                 

                               
                            </div>
                            <!-- cardbody -->
                            </form>                          

                          <table class="table table-striped" id="tbl_terminal">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="2">Terminals</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" >Terminal ID</th>
                                                <th>Mac Adress</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(!empty($terminals)){
                                            foreach ($terminals as $key => $terminal) { ?>
                                            <tr>
                                                <td><?php echo $terminal->terminal_id ?></td>
                                                <td><?php echo $terminal->mac_address ?></td>
                                                <td><button class='delete_terminal'>Delete</button></td>
                                            </tr>

                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                   
                         
                     </div>

               </div>
             </div>
       </div>

<script src="<?php echo base_url().'assets/cashier/js/jquery.min.js'; ?>"></script>

<script src="<?php echo base_url().'assets/cashier/js/select2.min.js'; ?>"></script>
<link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />
<script>


$('body').on('click','.add_terminal',function(e){
    e.preventDefault();
    $(this).parent().append('<button class="delete_terminal">-</button>');
    $(this).parent().parent().find('.mac_address').attr('required','required');
    $('#tbl_terminal').append('<tr> \
        <td><input type="text" placeholder="Terminal MAC address" class="form-control terminal_mac" name="add_terminal[mac_address][]"></td> \
        <td><button class="add_terminal">+</button></td>\
    </tr>')
    $(this).remove();
})
$('body').on('click','.delete_terminal',function(e){
    e.preventDefault();
    $(this).parent().parent().addClass('hide');
     $(this).parent().parent().find('.terminal_id').attr('name','delete_terminal[terminal_id][]');
    $(this).parent().parent().find('.mac_address').attr('name','delete_terminal[mac_address][]');
})

$('.save-merchant').submit(function(e){
    e.preventDefault();
    <?php if($this->uri->segment(2)=='add'){ ?>
    $.ajax({
                type: 'POST',
                url: '<?=base_url("merchant/save")?>',
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    if(data=="success"){
                         swal('Added Successfully', '', 'success')
                         window.location.href="<?php echo base_url("merchant") ?>"                      
                    }
                    else{
                          swal('Error', '', 'info')

                    }
                }  
            })
    <?php } else{ ?>
    $.ajax({
                type: 'POST',
                url: '<?=base_url("merchant/update/".$this->uri->segment(3))?>',
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    if(data=="success"){
                         swal('Updated Successfully', '', 'success');
                        window.location.href="<?php echo base_url("merchant") ?>"                     
                    } else{
                      swal('Error', '', 'info')
                    }
                    
                }  
            })
    <?php } ?>
})
    
$('input[type="file"]').each(function(){
  // Refs
  var $file = $(this),
      $label = $file.next('label'),
      $labelText = $label.find('span'),
      labelDefault = $labelText.text();

  // When a new file is selected
  $file.on('change', function(event){
    var fileName = $file.val().split( '\\' ).pop(),
        tmppath = URL.createObjectURL(event.target.files[0]);
    //Check successfully selection
    if( fileName ){
      $label
        .addClass('file-ok')
        .css('background-image', 'url(' + tmppath + ')');
      $labelText.text(fileName);
    }else{
      $label.removeClass('file-ok');
      $labelText.text(labelDefault);
    }
  });

// End loop of file input elements
});
</script>
<style type="text/css">
  /*** CUSTOM FILE INPUT STYE ***/
.wrap-custom-file {
  position: relative;
  display: inline-block;
  width: 200px;
  height: 150px;
  margin: 0 0.5rem 1rem;
  text-align: center;
}
.wrap-custom-file input[type="file"] {
  position: absolute;
  top: 0;
  left: 0;
  width: 2px;
  height: 2px;
  overflow: hidden;
  opacity: 0;
}
.wrap-custom-file label {
  z-index: 1;
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  overflow: hidden;
  padding: 0 0.5rem;
  cursor: pointer;
  background-color: #fff;
  border-radius: 4px;
  -webkit-transition: -webkit-transform 0.4s;
  transition: -webkit-transform 0.4s;
  transition: transform 0.4s;
  transition: transform 0.4s, -webkit-transform 0.4s;
}
.wrap-custom-file label span {
  display: block;
  margin-top: 2rem;
  font-size: 1.4rem;
  color: #777;
  -webkit-transition: color 0.4s;
  transition: color 0.4s;
}
.wrap-custom-file label .fa {
  position: absolute;
  bottom: 1rem;
  left: 50%;
  -webkit-transform: translatex(-50%);
  transform: translatex(-50%);
  font-size: 1.5rem;
  color: lightcoral;
  -webkit-transition: color 0.4s;
  transition: color 0.4s;
}
.wrap-custom-file label:hover {
  -webkit-transform: translateY(-1rem);
  transform: translateY(-1rem);
}
.wrap-custom-file label:hover span, .wrap-custom-file label:hover .fa {
  color: #333;
}
.wrap-custom-file label.file-ok {
  background-size: cover;
  background-position: center;
}
.wrap-custom-file label.file-ok span {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 0.3rem;
  font-size: 1.1rem;
  color: #000;
  background-color: rgba(255, 255, 255, 0.7);
}
.wrap-custom-file label.file-ok .fa {
  display: none;
}
</style>
<script>
    // $('#product_name').on('change', function() {
    //     var product_name = $('#product_name').val();
    //     $.ajax({
    //         url: '<?=base_url("Cproduct/check_product");?>',
    //         type:'post',
    //         data:{product_name:product_name},
    //         success:function(data){
    //           console.log(data);
    //             if(data=='success'){
    //                 $("#name_err").html("").show();
    //             }else{
    //                  $("#name_err").html("This Product is aleready exist").show();
    //                 return false;
    //             }
    //         }
    //     });
    // });

</script>  


<script type="text/javascript">

    $(document).ready(function(){

      // var upc_state = false;


      // $('#UPC').on('blur', function(){
      //     var case_UPC = $('#UPC').val();
      //     alert(case_UPC);
      //     $.ajax({
      //         url: '<?=base_url("Cproduct/check_product_upc");?>',
      //         type: 'post',
      //         data: {case_UPC: case_UPC},
      //         success: function(response){
      //             if (response == 'fail' ) {
      //               upc_state = false;
      //               $("#upc_err").html("This Product UPC is already exist").show();
      //             }else if (response == 'success') {
      //               upc_state = true;
      //               $("#upc_err").html("").show();
      //             }
      //         }
      //     });
      // });

      if($('#ISecommerce').val()== 0){
        $('.ecell').hide();
        $('.emargin').hide();
        $('.epromotion').hide();
        $('.edetails').hide();
        $('.etitle').hide();
        $('.etag').hide();
        $('.edescription').hide();
        $('.eabv').hide();
        $('.eproof').hide();
        $('.egeo').hide();


      }else{
          $('.ecell').show();
          $('.emargin').show();
          $('.epromotion').show();
          $('.edetails').show();
          $('.etitle').show();
          $('.etag').show();
          $('.edescription').show();
          $('.eabv').show();
          $('.eproof').show();
         $('.egeo').show();
      }
     
       $('#age').hide();
       $('#restict').hide();
       
       $('.select-2-dropdown').select2();



  $('#btnSave').click(function(){

      var supplier_price = $('#supplier_price').val();
      var sell_price = $('#store_sell_price').val();
        if($('#product_name').val() == '') {
            $("#name_err").html("Please enter the Product Name").show();
            return false;
        }
        if($('#nickname').val() == '') {
            $("#nname_err").html("Please enter the Product Nickname").show();
            return false;
        }
        if($('#UPC').val() == '') {
            $("#upc_err").html("Please enter the Product UPC").show();
            return false;
        }
        // if(upc_state == false){
        //       $("#upc_err").html("This Product UPC is already exist").show();
        //       return false;
        // }
        if($('#category').val() == '--Select Category--'){
            $("#cat_err").html("Please select Category").show();
            return false;
        }
        if($('#unit').val() == ''){
            $("#unit_err").html("Please select number of Unit").show();
            return false;
        }
        if($('#quantity').val() == '' || $('#quantity').val() == 0){
            $("#qty_err").html("Please enter Quantity").show();
            return false;
        }
        // if($('#size').val() == '') {
        //     $("#size_err").html("Please select the Product Size").show();
        //     return false;
        // }
        if($('#size').val() != ''){
          if(!($('#size').val().indexOf(' ml') > -1 || $('#size').val().indexOf(' oz') > -1 || $('#size').val().indexOf(' liter') > -1)){
            $("#size_err").html("only support oz, ml, liter format. (ex. 100 ml)").show();
            return false;
          }
        }
      // if(!($('#size').val().indexOf(' ml') > -1 || $('#size').val().indexOf(' oz') > -1 || $('#size').val().indexOf(' liter') > -1)){
      //     $("#size_err").html("only support oz, ml, liter format. (ex. 100 ml)").show();
      //     return false;
      // }
      if($('#store_sell_price').val() == '' || $('#store_sell_price').val() == '0' || $('#store_sell_price').val() == '0.00' || $('#store_sell_price').val() == '00' || $('#store_sell_price').val() == '000' || $('#store_sell_price').val() == '0000'|| $('#store_sell_price').val() == '00000' || $('#store_sell_price').val() == '000000' || $('#store_sell_price').val() == '0000000'){
          $("#store_sell_err").html("Please enter Store Sell Price").show();
          return false;

      }
      if(parseFloat(supplier_price) >= parseFloat(sell_price)){
          $("#store_sell_err").html("Store sell Price is not less than or equal supplier price, Please enter correct Store Sell price").show();
          return false;
      }

      if($('#ecommerce_sell_price').val() != ''){
          if(parseFloat(supplier_price) >= parseFloat($('#ecommerce_sell_price').val()) ){
            $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, Please enter correct E-commerce Sell price").show();
            return false;
          }
      }

      if(supplier_price == '0' || supplier_price == '0.00' || supplier_price == '00' || supplier_price == '000' || supplier_price == '0000'|| supplier_price == '00000' || supplier_price == '000000' || supplier_price == '0000000'){
        $("#price_err").html("Please enter correct Supplier Price").show();
        return false;
      }
        //$('.add-product').submit();
        
        if($('.add-product').submit()){
          swal("Success!", 'Product is Successfully Inserted', "success");
        }
    });


    });

    $('#ISecommerce').change(function() {
       if(this.checked) {
        $('#ISecommerce').val(1);
        $('.ecell').show();
        $('.emargin').show();
        $('.epromotion').show();
        $('.edetails').show();
         $('.etitle').show();
         $('.etag').show();
         $('.edescription').show();
         $('.eabv').show();
         $('.eproof').show();
         $('.egeo').show();
      }else{
        $('#ISecommerce').val(0);
        $('.ecell').hide();
        $('.emargin').hide();
        $('.epromotion').hide();
        $('.edetails').hide();
        $('.etitle').hide();
        $('.etag').hide();
        $('.edescription').hide();
        $('.eabv').hide();
        $('.eproof').hide();
         $('.egeo').hide();
      }
   });

    $('#size').on('input', function() {
      $(this).val($(this).val().replace(/[^a-z0-9./ ]/gi, ''));
    }); 


    
</script>    
<script>
    $('.customcardinput').bind('change', function() {
      var supplier_price = $('#supplier_price').val(); 
      var store_price = $('#store_sell_price').val();
        if($('#product_name').val() == '') {
            $("#name_err").html("Please enter the Product Name").show();
            return false;
        }else{
            $("#name_err").html("").show();
        }
        if($('#nickname').val() == '') {
            $("#nname_err").html("Please enter the Product Nickname").show();
            return false;
        }else{
            $("#nname_err").html("").show();
        }
        if($('#UPC').val() == '') {
            $("#upc_err").html("Please enter the Product UPC").show();
            return false;
        }else{
            $("#upc_err").html("").show();    
        }
        if($('#category').val() == '--Select Category--'){
            $("#cat_err").html("Please select Category").show();
            return false;
        }else{
            $("#cat_err").html("").show();
        }
        if($('#unit').val() == ''){
            $("#unit_err").html("Please select number of Unit").show();
            return false;
        }else{
            $("#unit_err").html("").show();
        } 
        if($('#quantity').val() == '' || $('#quantity').val() == 0){
            $("#qty_err").html("Please enter Quantity").show();
            return false;
        } else{
            $("#qty_err").html("").show();
        }
        // if($('#size').val() == '') {
        //     $("#size_err").html("Please select Product Size").show();
        //     return false;
        // }else{
        //     $("#size_err").html("").show();
        // }
        // if(!($('#size').val().indexOf(' ml') > -1 || $('#size').val().indexOf(' oz') > -1 || $('#size').val().indexOf(' liter') > -1)){
        //   $("#size_err").html("only support oz, ml, liter format. (ex. 100 ml)").show();
        //   return false;
        // }else{
        //     $("#size_err").html("").show();
        // }
        if($('#size').val() != ''){
          if(!($('#size').val().indexOf(' ml') > -1 || $('#size').val().indexOf(' oz') > -1 || $('#size').val().indexOf(' liter') > -1)){
            $("#size_err").html("only support oz, ml, liter format. (ex. 100 ml)").show();
            return false;
          }else{
              $("#size_err").html("").show();
          }
        }
        
        
        
       if($('#store_sell_price').val() == '' || $('#store_sell_price').val() == '0' || $('#store_sell_price').val() == '0.00' || $('#store_sell_price').val() == '00' || $('#store_sell_price').val() == '000' || $('#store_sell_price').val() == '0000'|| $('#store_sell_price').val() == '00000' || $('#store_sell_price').val() == '000000' || $('#store_sell_price').val() == '0000000'){
            $("#store_sell_err").html("Please enter Store Sell Price").show();
            return false;
        }else{
            $("#store_sell_err").html("").show();
        }

        if(supplier_price == '0' || supplier_price == '0.00' || supplier_price == '00' || supplier_price == '000' || supplier_price == '0000'|| supplier_price == '00000' || supplier_price == '000000' || supplier_price == '0000000'){
            $("#price_err").html("Please enter correct Supplier Price").show();
            return false;
        }else{
            $("#price_err").html("").show();
        }  

        
        if($('#ecommerce_sell_price').val() != ''){
          if(parseFloat(supplier_price) >= parseFloat($('#ecommerce_sell_price').val())){
            $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, Please enter correct E-commerce Sell price").show();
            return false;
          }else{
             $("#ecomm_sell_err").html("").show();
          }
        }
        
    });

    $('.custom').bind('change', function() {
      if($('.store_p').val() == ''){
            $("#profit_err").html("Please select Profit % in Store").show();
            return false;
        }else{
            $("#profit_err").html("").show();
        }  

        if($('.ecomm_p').val() == ''){
            $("#ecomm_err").html("Please select Profit % in Ecommerce").show();
            return false;
        }else{
            $("#ecomm_err").html("").show();
        }  
    });

    // $('#supplier_price').on('change', function() {
    //   var supplier_price = $('#supplier_price').val();  

        if(supplier_price == ''){
          $('#rangeInput').val('0');
          $('#rangeInput').attr('max', 0);
          $('#amount').val('');
          $('#rangeInput2').val('0');
          $('#amount2').val('');
        }
        
    //  });
</script>    
<script type="text/javascript">
    
    //store sell price calculate
  $('.store_p').on('change', function() {

      var supplier_price = $('#supplier_price').val();   
      var store_price = ($('#store_sell_price').val()); 
      var profit = parseFloat($('.store_p').val() /100); 
      if(profit < 1){
          var profit_margin = profit * 100 ;
       }else{
          var profit_margin = profit;
      }
      if(supplier_price != '' && supplier_price != '0.00' && supplier_price != '0' && supplier_price != '00' && supplier_price != '000' && supplier_price != '0000' && supplier_price != '00000' && supplier_price != '000000' && supplier_price != '0000000'){
        var store_sell_price = supplier_price / (1 - (profit_margin / 100));
        $('#store_sell_price').val(store_sell_price.toFixed(2));
        $('#rangeInput').val(parseFloat(profit_margin));
        $("#store_sell_err").html("").show();
      }else{
        var supplierPrice = (store_price) * ( 1 - profit_margin / 100);
        $('#supplier_price').val(supplierPrice.toFixed(2));
        $('#rangeInput').val(parseFloat(profit_margin));
        $("#price_err").html("").show(); //added
      }

    });

  // //ecommerce sell price calculate
    $('.ecomm_p').on('change', function() {
      var supplier_price = $('#supplier_price').val();   
      var ecomm_price = $('#ecommerce_sell_price').val(); 
      var profit = parseFloat($('.ecomm_p').val() /100); 

        if(profit < 1){
          var profit_margin = profit * 100 ;
        }else{
          var profit_margin = profit;
        }

        if(supplier_price != ''){
          var ecomm_sell_price = parseFloat(supplier_price) / (1 - (profit_margin / 100));
          $('#ecommerce_sell_price').val(ecomm_sell_price.toFixed(2));
          $('#rangeInput2').val(profit_margin);
      }else{
          var supplierPrice = (ecomm_price) * ( 1 - profit_margin / 100);
          $('#supplier_price').val(supplierPrice.toFixed(2));
          $('#rangeInput2').val(profit_margin);

          // only for calculate margin profit

          if(ecomm_price !=''){
          $('#rangeInput').val(profit_margi);
            var store_price = $('#store_sell_price').val();  
          $('.store_p').val(profit_margi.toFixed(2));
            var profit_margi = (store_price - supplierPrice) / store_price  * 100;  
            $('#rangeInput').val(profit_margi);
            $('.store_p').val(profit_margi.toFixed(2));
          }
      }

     //added
      if(ecomm_price != ''){
          if(parseFloat(supplier_price) >= parseFloat(ecomm_price)){
            $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, Please enter correct E-commerce Sell price").show();
            return false;
          }else{
             $("#ecomm_sell_err").html("").show();
          }
      }

     
      
    });

//change
    $('#supplier_price').on('change', function() {
      //store use only
     var storemargin =parseFloat($('.store_p').val());
     var supplier_price = $('#supplier_price').val() ; 

     var store_price = $('#store_sell_price').val() ;  //change  /100 addtional
 
     
      if(store_price == '' || store_price == '0.00'){
      var store = supplier_price / (1 - storemargin / 100);
      $('#store_sell_price').val(store.toFixed(2));
      $('#rangeInput').val(storemargin);
      $("#store_sell_err").html("").show(); //added

     }else{
      var store_price1 = $('#store_sell_price').val(); 
      profit_margin1 = (store_price1 - supplier_price) / store_price1  * 100; 
      $('.store_p').val(profit_margin1.toFixed(2));
      $('#rangeInput').val(profit_margin1);
     }

     //ecommmerce use only
     var ecomm_price = $('#ecommerce_sell_price').val(); 
     var ecommmargin = parseFloat($('.ecomm_p').val());

     // var profit_margi = (ecomm_price1 - sup_price1) / ecomm_price1  * 100;  
     

     if(ecomm_price == '' || ecomm_price == '0.00'){
      var ecomm = supplier_price / (1 - ecommmargin / 100);
      $('#ecommerce_sell_price').val(ecomm.toFixed(2));
      $('#rangeInput2').val(ecommmargin);
      $("#ecomm_sell_err").html("").show();

     }else{
      var ecomm_price1 =$('#ecommerce_sell_price').val(); 
      profit_margin2 = (ecomm_price1 - supplier_price) / ecomm_price1  * 100; 
      $('.ecomm_p').val(profit_margin2.toFixed(2));
      $('#rangeInput2').val(profit_margin2);
     }

      if($('#amount').val() == '-Infinity'){
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#amount').val() == 'NaN'){
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#supplier_price').val() == ''){
          $('#rangeInput').val('0');
          $('#amount').val('0');
      }

      if($('#store_sell_price').val() == 'NaN'){
          $('#store_sell_price').val('');
      }
      if($('#ecommerce_sell_price').val() == 'NaN'){
          $('#ecommerce_sell_price').val('');
      }

      if( $('#amount').val() < 0) {
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#store_sell_price').val() == ''){
          $('#store_sell_price').val('');
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

     // //  //// ecommm use

      if($('#amount2').val() == '-Infinity'){
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }

      if($('#amount2').val() == 'NaN'){
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }

      if($('#supplier_price').val() == ''){
          $('#rangeInput2').val('0');
          $('#amount2').val('0');
      }

      if( $('#amount2').val() < 0) {
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }

      if($('#ecommerce_sell_price').val() == ''){
         $('#ecommerce_sell_price').val('');
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }


       
    });


    //store profit margin calculate

  $('#store_sell_price').on('change', function() {

    var supplier_price = $('#supplier_price').val();   
    var store_price = $('#store_sell_price').val();
    var profit_margin = parseFloat($('.store_p').val() ); 

    //alert(profit_margin);
    if(supplier_price == NaN || supplier_price == '0.00'){
      var supplier_price = (store_price) * ( 1 - profit_margin / 100);
      $('#supplier_price').val(supplier_price.toFixed(2));
      $("#price_err").html("").show(); //added
    }else{
      var profit_margi = (store_price - supplier_price) / store_price  * 100;  
        $('#rangeInput').val(profit_margi);
        $('.store_p').val(profit_margi.toFixed(2));
    }

      if($('#amount').val() == '-Infinity'){
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#amount').val() == 'NaN'){
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if( $('#amount').val() < 0) {
          $('#rangeInput').val('0');
          $('#amount').val('');
      }

      if($('#supplier_price').val() == ''){
         $('#rangeInput').val('0');
         $('#amount').val('');
      }
       
    });

  // //ecommerce profit margin calculate

    $('#ecommerce_sell_price').on('change', function() {

      var supplier_price = $('#supplier_price').val();   
      var ecomm_price = $('#ecommerce_sell_price').val();
      var pro_margin = parseFloat($('.ecomm_p').val() ); 

      if(supplier_price == NaN || supplier_price == '0.00'){
        var supplier_price = (ecomm_price) * ( 1 - pro_margin / 100);
        $('#supplier_price').val(supplier_price.toFixed(2)); 
      }else{
        var profit_margi = (ecomm_price - supplier_price) / ecomm_price  * 100;  

        $('#rangeInput2').val(profit_margi);
        $('.ecomm_p').val(profit_margi.toFixed(2));
      }

      if($('#amount2').val() == '-Infinity'){
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }
      if($('#amount2').val() == 'NaN'){
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }


      if( $('#amount2').val() < 0) {
          $('#rangeInput2').val('0');
          $('#amount2').val('');
      }

      // if( parseFloat($('#ecommerce_sell_price').val()) < parseFloat($('#supplier_price').val() )) {
      //     $('#rangeInput2').val('0');
      //     $('#amount2').val('');
      // }

      if($('#supplier_price').val() == ''){
         $('#rangeInput2').val('0');
         $('#amount2').val('');
      }
       
    });



  //   //range input 1
    $('#rangeInput').on('change', function() {

      var supplier_price = $('#supplier_price').val();   
      var store_price = $('#store_sell_price').val(); 
      var profit_margin = parseFloat($('.store_p').val() /100); 
      //alert(profit_margin);
      if(supplier_price != '' && supplier_price != '0.00' && supplier_price != '0' && supplier_price != '00' && supplier_price != '000' && supplier_price != '0000' && supplier_price != '00000' && supplier_price != '000000' && supplier_price != '0000000'){
        var store_sell_price = supplier_price / (1 - (profit_margin));
        $('#store_sell_price').val(store_sell_price.toFixed(2));
        $("#store_sell_err").html("").show();//added
      }else{
        var supplierPrice = (store_price) * ( 1 - profit_margin);
        $('#supplier_price').val(supplierPrice.toFixed(2));
        $("#price_err").html("").show(); //added
      }
       
    });


     //range input 2
    $('#rangeInput2').on('change', function() {
     var supplier_price = $('#supplier_price').val();  
     var ecomm_price = $('#ecommerce_sell_price').val();  
     var profit_mar = parseFloat($('.ecomm_p').val() /100);  //change  /100 addtional

      if(supplier_price != ''){
        var ecomm_sell_price = supplier_price / (1 - (profit_mar));
        $('#ecommerce_sell_price').val(ecomm_sell_price.toFixed(2));
      }else{
        var supplier_Price = (ecomm_price) * ( 1 - profit_mar);
        $('#supplier_price').val(supplier_Price.toFixed(2));
      }

      if(ecomm_price != ''){
          if(parseFloat(supplier_price) >= parseFloat(ecomm_price)){
            $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, Please enter correct E-commerce Sell price").show();
            return false;
          }else{
             $("#ecomm_sell_err").html("").show();
          }
      }
       
    });
   
</script>

<script type="text/javascript">

   // $('#supplier_price').change(function(event) {
  //       //var result = $('#supplier_price').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
  //       //$('#supplier_price').val(result);
  //   });

    // $('#store_sell_price').change(function(event) {
    //     var result = $('#store_sell_price').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
    //     $('#store_sell_price').val(result);
    // });

    // $('#ecommerce_sell_price').change(function(event) {
    //     var result = $('#ecommerce_sell_price').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
    //     $('#ecommerce_sell_price').val(result);
    // });
      
    // $('#store_promotion_price').change(function(event) {
    //     var result = $('#store_promotion_price').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
    //     $('#store_promotion_price').val(result);
    // });

    // $('#ecommerce_promotion_price').change(function(event) {
    //     var result = $('#ecommerce_promotion_price').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
    //     $('#ecommerce_promotion_price').val(result);
    // });
  
    $('#amount').change(function(event) {
        var result = $('#amount').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
        $('#amount').val(result);
    });

    $('#amount2').change(function(event) {
        var result = $('#amount2').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
        $('#amount2').val(result);
    });
   
    // $('.store_p').on('change', function() {

    //     if($('#supplier_price').val() == ''){
    //          //calculate supplier price
    //       var store_price2 = parseFloat($('#store_sell_price').val() );  
    //       var storemargin =parseFloat($('.store_p').val());

    //       var supplierPrice = (store_price2) * ( 1 - storemargin / 100);
    //       $('#supplier_price').val(supplierPrice.toFixed(2));
    //       $('#rangeInput').val(storemargin);

    //     }
    //     if($('#store_sell_price').val() == ''){
    //       //calculate store sell price (Retail price)
    //         var supplier_price = parseFloat($('#supplier_price').val());   
    //         var storemarg =parseFloat($('.store_p').val());

    //         var store_pri = supplier_price / (1 - storemarg / 100);
    //         $('#store_sell_price').val(store_pri.toFixed(2));
    //         $('#rangeInput').val(storemarg);
    //     }
       
       
    // });


    // $('#rangeInput').on('change', function() {
    //     if($('#supplier_price').val() == ''){
    //          //calculate supplier price
    //       var store_price2 = parseFloat($('#store_sell_price').val() );  
    //       var storemargin =parseFloat($('.store_p').val());

    //       var supplierPrice = (store_price2) * ( 1 - storemargin / 100);
    //       $('#supplier_price').val(supplierPrice.toFixed(2));
          

    //     }
    //     if($('#store_sell_price').val() == ''){
    //       //calculate store sell price (Retail price)
    //         var supplier_price = parseFloat($('#supplier_price').val());   
    //         var storemarg =parseFloat($('.store_p').val());

    //         var store_pri = supplier_price / (1 - storemarg / 100);
    //         $('#store_sell_price').val(store_pri.toFixed(2));
           
    //     }
       
    // });

      // calculate wholeseller price

    // $('#amount').change(function(event) {
    //      var store_price2 = parseFloat($('#store_sell_price').val() );  
    //      var storemargin =parseFloat($('.store_p').val());

    //      var supplierPrice = (store_price2) * ( 1 - storemargin / 100);
    //      alert(supplierPrice);
         
    //      $('#supplier_price').val(supplierPrice.toFixed(2));
    //      $('#rangeInput').val(storemargin);

    // });
</script>
  
<script>
  var slider = document.getElementById("myRange");
  var output = document.getElementById("percent");
  output.value = slider.value + "%"; // Display the default slider value
  // Update the current slider value (each time you drag the slider handle)
  slider.oninput = function() {
    output.value = this.value + "%";
  }

  function ab() {
    output.value = document.getElementById("percent").value;
  }

  var slider2 = document.getElementById("myRange2");
  var output2 = document.getElementById("percent2");
  output2.value = slider2.value + "%"; // Display the default slider value
  // Update the current slider value (each time you drag the slider handle)
  slider2.oninput = function() {
    output2.value = this.value + "%";
  }


  function get_float_value(num) {

    var rex = /(^\d{2})|(\d{1,3})(?=\d{1,3}|$)/g,
      val = num.toString().replace(/^0+|\.|,/g, ""),
      res;

    if (val.length) {
      //if (val.length && val.length > 2) {
      res = Array.prototype.reduce.call(val, (p, c) => c + p) // reverse the pure numbers string
        .match(rex) // get groups in array
        .reduce((p, c, i) => i - 1 ? p + c : p + "." + c); // insert (.) and (,) accordingly
      res += /\.|,/.test(res) ? "" : ".0"; // test if res has (.) or (,) in it
      num = Array.prototype.reduce.call(res, (p, c) => c + p); // reverse the string and display
      return num;
    } else {
      return num;
    }

  }
</script>
<style type="text/css">
    button {
            width: 27px;
            margin-right: 10px;
    }
    button#btnSave {
    width: 129px;
}
</style>