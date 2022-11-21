$(document).ready(function() {
  var abv = $('#amount3').val();
  if(abv != ''){
    $('#rangeInput3').val(abv);
  }else{
    $('#rangeInput3').val(0);
  }
  if($('#ISecommerce').val()== 0){
    $('.ecell,.emargin,.epromotion,.epromotion,.edetails,.etitle,.etag,.edescription,.eabv,.eproof,.egeo').hide();
  }else{
    $('.ecell,.emargin,.epromotion,.epromotion,.edetails,.etitle,.etag,.edescription,.eabv,.eproof,.egeo').show();
  }
  $('.select-2-dropdown').select2();
});

$('#ISecommerce').change(function() {
     if(this.checked) {
      $('#ISecommerce').val(1);
      $('.ecell,.emargin,.epromotion,.epromotion,.edetails,.etitle,.etag,.edescription,.eabv,.eproof,.egeo').show();
    }else{
      $('#ISecommerce').val(0);
      $('.ecell,.emargin,.epromotion,.epromotion,.edetails,.etitle,.etag,.edescription,.eabv,.eproof,.egeo').hide();
    }
 });

$('#size').on('input', function() {
  $(this).val($(this).val().replace(/[^a-z0-9./ ]/gi, ''));
});

$('#btnSave_Custom').click(function(){
   var supplier_price = parseFloat($('#supplier_price').val());
   var sell_price = parseFloat($('#store_sell_price').val());

  if($('#product_name').val() == '') {
      $("#name_err").html("Please enter the Product Name").show();
      return false;
  }
  if($('#nickname').val() == '') {
      $("#nname_err").html("Please enter the Product Nickname").show();
      return false;
  }
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
  if($('#size').val().toLowerCase() != ''){
    var size=$('#size').val().toLowerCase();
        if(!(size.indexOf(' ml') > -1 || size.indexOf(' oz') > -1|| size.indexOf(' liter') > -1)){
      $("#size_err").html("Supports only oz, ml, liter format").show();
      return false;
    }else{
        $("#size_err").html("").show();
    }
  }
  if(sell_price == '' || sell_price == '0' || sell_price == '0.00' || sell_price == '00' || sell_price == '000' || sell_price == '0000'|| sell_price == '00000' || sell_price == '000000' || sell_price == '0000000'){
      $("#store_sell_err").html("Please enter Store Sell Price").show();
      return false;
  }
  if(parseFloat(supplier_price) >= parseFloat(sell_price)){
      $("#store_sell_err").html("Store sell Price is not less than or equal supplier price, Please enter correct Store Sell price").show();
      return false;
  }
  if($('#price_off').val() != 0 || $('#price_off').val() != ''){
      if(  parseFloat($('#store_sell_price').val()) < parseFloat($('#price_off').val()) ) {
          $("#price_off_err").html("Please enter less than store sell price").show();
          return false;
      }
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
  if(supplier_price == ''){
      $('#rangeInput').val('0');
      $('#rangeInput').attr('max', 0);
      $('#amount').val('');
      $('#rangeInput2').val('0');
      $('#amount2').val('');
  }
  var formdata = $('.edit-product')[0];
  $.ajax({
      url: base_url + "cashier/Cashier/update_custom_product",
      type:"post",
      data:new FormData(formdata),
      processData:false,
      contentType:false,
      dataType : 'json',
      cache:false,
      // async:false,
      beforeSend: function(){
          $('#btnSave_Custom').attr('disabled', true);
          $("#overlay,.loader").show();
      },
      success: function(data){
        if(data.status=='success'){
          $("#overlay,.loader").hide();
          swal({
              title: "Success!",
              text: 'Custom product updated successfully!',
              icon: "success",
              buttons: false,
          });
        }else{
          if(data.name_err != ''){
              $("#name_err").html(data.name_err).show();
              $('#btnSave_Custom').attr('disabled', false);
              return false;
          }else{
              $('#btnSave_Custom').attr('disabled', false);
              swal({
                  title: "Oops!",
                  text: "Something went wrong!",
                  icon: "error",
                  buttons: false,
              });
          }
        }
        setTimeout( function (){
          window.location = base_url + "cashier/CustomProduct_list";
        },1600);

      },
  });
  return false;
});
    // ST - For delete product image
$(document).on("click",".product_image_delete",function() {
    var product_id = $(this).data("product_id");
    if (!confirm("Are you sure you want to delete image?"))
        return false;
    $.ajax({
        url: base_url + "cashier/deleteproductimage",
        type:"post",
        data: {
            product_id: product_id
        },
        dataType : 'json',
        cache:false,
        async:false,
        success: function(data){
            if(data.status=='success'){
              swal("Success!", data.message, "success");
              $(".dynamic").empty();
            }else{
              swal("Opps!", 'Something went wrong', "error");
            }
        },
    });
});
// EN - For delete product image

$(document).on('focus', 'input,textarea', function(){
    if($(this).hasClass('use-keyboard-input')){
        $('body').addClass("fixfixed");
    }

});

$(document).on('blur', 'input,textarea', function(){
    if($(this).hasClass('use-keyboard-input')){
        $('body').removeClass("fixfixed");
    }

});

$('.customcardinput').bind('change', function() {
  var supplier_price = parseFloat($('#supplier_price').val());
  var sell_price = parseFloat($('#store_sell_price').val());
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
    if($('#category').val() == ''){
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
    if($('#quantity').val() == ''){
        $("#qty_err").html("Please enter Quantity").show();
        return false;
    } else{
        $("#qty_err").html("").show();
    }
    if($('#size').val().toLowerCase() != ''){
      var size=$('#size').val().toLowerCase();
          if(!(size.indexOf(' ml') > -1 || size.indexOf(' oz') > -1|| size.indexOf(' liter') > -1)){
        $("#size_err").html("Supports only oz, ml, liter format").show();
        return false;
      }else{
          $("#size_err").html("").show();
      }
    }
    if(supplier_price == '0' || supplier_price == '0.00' || supplier_price == '00' || supplier_price == '000' || supplier_price == '0000'|| supplier_price == '00000' || supplier_price == '000000' || supplier_price == '0000000'){
        $("#price_err").html("Please enter correct Supplier Price").show();
        return false;
    }else{
        $("#price_err").html("").show();
    }
    if(sell_price == '' || sell_price == '0' || sell_price == '0.00' || sell_price == '00' || sell_price == '000' || sell_price == '0000'|| sell_price == '00000' || sell_price == '000000' || sell_price == '0000000'){
        $("#store_sell_err").html("Please enter Store Sell Price").show();
        return false;
    }else{
        $("#store_sell_err").html("").show();
    }
    if(supplier_price == 0){
        $("#price_err").html("Please enter correct Supplier Price").show();
        return false;
    }else{
        $("#price_err").html("").show();
    }
    if($('#price_off').val() != 0 || $('#price_off').val() != ''){
        if(  parseFloat($('#store_sell_price').val()) < parseFloat($('#price_off').val()) ) {
            $("#price_off_err").html("Please enter less than store sell price").show();
            return false;
        }else{
            $("#price_off_err").html("").show();
        }
    }
    if($('#ecommerce_sell_price').val() != ''){
      if(supplier_price >= $('#ecommerce_sell_price').val()){
        $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, Please enter correct E-commerce Sell price").show();
        return false;
      }else{
         $("#ecomm_sell_err").html("").show();
      }
    }
});

$(document).ready(function() {
  var supplier_price = $('#supplier_price').val();
    if(supplier_price == ''){
        $('#rangeInput').val('0');
        $('#amount').val('');
        $('#rangeInput2').val('0');
        $('#amount2').val('');
    }else{
      //store profit margin calculate
       var sto_price = $('#store_sell_price').val() ;  //change  /100 addtional
       var prof_margin = (sto_price - supplier_price) / sto_price  * 100;
       $('#rangeInput').val(prof_margin);
       $('.store_p').val(prof_margin.toFixed(2));

      //ecommerce profit margin calculate
       var ecom_price = $('#ecommerce_sell_price').val();
       var prit_margin = (ecom_price - supplier_price) / ecom_price  * 100;
       $('#rangeInput2').val(prit_margin);
       $('.ecomm_p').val(prit_margin.toFixed(2));
    }

    if($('#ecommerce_sell_price').val() == 0){
       $('#rangeInput2').val('0');
       $('#amount2').val('');
    }
});

//price off calculate
$('#price_off').on('change', function() {
    if($(this).val() != 0 || $(this).val() != '' || $('#store_sell_price').val() != 0 || $('#store_sell_price').val() != ''){
      var price_off= parseFloat($(this).val());
      var store_price = parseFloat($('#store_sell_price').val());
      if(store_price < price_off) {
          $("#price_off_err").html("Please enter less than store sell price").show();
          $('#store_promotion_price').val('');
          return false;
      }else{
          $("#price_off_err").html("").show();
          var promotion_price =  store_price - price_off;
          var show_val = promotion_price.toFixed(2);
          if(show_val != 'NaN'){
            $('#store_promotion_price').val(show_val);
          }else{
            $('#store_promotion_price').val('');
          }
      }
    }
});
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

        if($('#price_off').val() != '' && $('#price_off').val() != 0){
            var promotion_price =  $('#store_sell_price').val() - parseFloat($('#price_off').val());
            var show_val = promotion_price.toFixed(2);
            if(show_val == 'NaN'){
              $('#store_promotion_price').val('');
            }else if(show_val < 0){
                $('#store_promotion_price').val('');
                $("#price_off_err").html("Please enter less than store sell price").show();
                return false;
            }else{
              $("#price_off_err").html("").show();
              $('#store_promotion_price').val(show_val);
            }
        }
    }else{
      var supplierPrice = (store_price) * ( 1 - profit_margin / 100);
      $('#supplier_price').val(supplierPrice.toFixed(2));
      $('#rangeInput').val(parseFloat(profit_margin));
      $("#price_err").html("").show(); //added
    }
});

//ecommerce sell price calculate
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
        var store_price = parseFloat($('#store_sell_price').val());
        var store_price = $('#store_sell_price').val();
        var profit_margi = (store_price - supplierPrice) / store_price  * 100;
        var profit_margi = (store_price - supplierPrice) / store_price  * 100;
        $('#rangeInput').val(profit_margi);
          $('#rangeInput').val(profit_margi);
        $('.store_p').val(profit_margi.toFixed(2));
          $('.store_p').val(profit_margi.toFixed(2));
        }
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
   if(ecomm_price == ''){
      var ecomm = supplier_price / (1 - ecommmargin / 100);
      $('#ecommerce_sell_price').val(ecomm.toFixed(2));
      $('#rangeInput2').val(ecommmargin);
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
     if(supplier_price == NaN || supplier_price == '0.00'){
      var supplier_price = (store_price) * ( 1 - profit_margin / 100);
      $('#supplier_price').val(supplier_price.toFixed(2));
      $("#price_err").html("").show(); //added
      $("#store_sell_err").html("").show(); //added
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

    if($('#price_off').val() != '' && $('#price_off').val() != 0){
        var promotion_price =  $('#store_sell_price').val() - parseFloat($('#price_off').val());
        var show_val = promotion_price.toFixed(2);
        if(show_val == 'NaN'){
          $('#store_promotion_price').val('');
        }else if(show_val < 0){
            $('#store_promotion_price').val('');
            $("#price_off_err").html("Please enter less than store sell price").show();
            return false;
        }else{
          $("#price_off_err").html("").show();
          $('#store_promotion_price').val(show_val);
        }
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
  if(supplier_price != '' && supplier_price != '0.00' && supplier_price != '0' && supplier_price != '00' && supplier_price != '000' && supplier_price != '0000' && supplier_price != '00000' && supplier_price != '000000' && supplier_price != '0000000'){
    var store_sell_price = supplier_price / (1 - (profit_margin));
    $('#store_sell_price').val(store_sell_price.toFixed(2));
    $("#store_sell_err").html("").show();

    if($('#price_off').val() != '' && $('#price_off').val() != 0){
        var promotion_price =  $('#store_sell_price').val() - parseFloat($('#price_off').val());
        var show_val = promotion_price.toFixed(2);
        if(show_val == 'NaN'){
          $('#store_promotion_price').val('');
        }else if(show_val < 0){
            $('#store_promotion_price').val('');
            $("#price_off_err").html("Please enter less than store sell price").show();
            return false;
        }else{
          $("#price_off_err").html("").show();
          $('#store_promotion_price').val(show_val);
        }
    }
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

$('#amount').change(function(event) {
    var result = $('#amount').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
    $('#amount').val(result);
});

$('#amount2').change(function(event) {
    var result = $('#amount2').val().replace(/\b(\d+)(\d{2})\b/, '$1.$2');
    $('#amount2').val(result);
});
  $(document).ready(function() {
      var category_id = $('#category').val();
      $.ajax({
         type: "POST",
         url: base_url + "cashier/Cashier/fetch_size_type",
         data : {category_id : category_id},
         dataType : 'json',
         success : function(data){
            if(data.age_restrict == 0){
              $('#age').hide();
              $('#restict').hide();
            }else if(data.age_restrict == 1){
              $('#age').show();
              $('#restict').show();
            }
         },
       });

  });

$('#product_name').keyup(function() {
  $(".select2-selection--single").css("height", "60px");
});

// ic items item number
$(document).ready(function () {
    var maxField = 6; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.item-apend'); //Input field wrapper
    var fieldHTML =
       '<div class="row"> <div class="col-md-4"> <div class="form-group"> <label class="customcardlabel " for="">Combo Name</label> <input type="text" class="form-control customcardinput " id="pcombo" name="product_combo[]" aria-describedby="" placeholder="Please enter Combo Name"> <span class="errors" id="pcombo_err" style="color:red; font-size:14px"></span></div></div><div class="col-md-4"> <div class="form-group"> <label class="customcardlabel" for="">Units in a Combo </label> <input type="text" class="form-control customcardinput" id="punit" name="combo_unit[]" aria-describedby="" placeholder="Please enter Units in a Combo"> <span class="errors" id="ucomb_err" style="color:red; font-size:14px"></span></div></div><div class="col-md-3"> <div class="form-group"> <label class="customcardlabel" for="">Combo Price </label> <div style="position:relative;"> <span class="prefix">$</span><input type="tel" class="form-control customcardinput" id="cprice" name="combo_price[]" aria-describedby="" placeholder="Please enter Combo Price" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" > </div> <span class="errors" id="combo_err" style="color:red; font-size:14px"></span></div></div><div class="col-md-1"> <button type="button" class="btn btn-light apend_button removeNominee">-</button> </div></div>'; //New input field html
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function () {
       //Check maximum number of input fields
       $(".clearProductCombo").removeClass("clearProductCombo").addClass("removeNominee");  //31july
       if (x < maxField) {
           x++; //Increment field counter
           $(wrapper).append(fieldHTML); //Add field html
           $('#pcombo').click;
       }
    });

//Once remove button is clicked
$(wrapper).on('click', '.removeNominee', function (e) {
     e.preventDefault();
     $(this).parent().parent().remove(); //Remove field html
     x--; //Decrement field counter

     var removeNominee = 0;
     $(".removeNominee").each(function(i) {
           removeNominee++;
     });
     if(removeNominee == 1) {
       $(".removeNominee").removeClass("removeNominee").addClass("clearProductCombo");
       removeNominee = 0;
     }
});

if($(".removeNominee").length == 1) {
   $(".removeNominee").removeClass("removeNominee").addClass("clearProductCombo");
}

});

$(document).on("click",".clearProductCombo",function() {
 $("input[name='product_combo[]'],input[name='combo_unit[]'],input[name='combo_price[]']").val("");
});

$(document).on('click','.numonekey', function(){
   if($('#price_off').val() != 0 || $('#price_off').val() != '' || $('#store_sell_price').val() != 0 || $('#store_sell_price').val() != ''){
       var price_off= parseFloat($('#price_off').val());
       var store_price = parseFloat($('#store_sell_price').val());
       if(store_price < price_off) {
           $("#price_off_err").html("Please enter less than store sell price").show();
           $('#store_promotion_price').val('');
           return false;
       }else{
           $("#price_off_err").html("").show();
           var promotion_price =  store_price - price_off;
           var show_val = promotion_price.toFixed(2);
           if(show_val != 'NaN'){
             $('#store_promotion_price').val(show_val);
           }else{
             $('#store_promotion_price').val('');
           }
       }
   }
});
