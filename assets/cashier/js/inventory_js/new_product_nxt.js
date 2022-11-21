$(document).ready(function(){
  if($('#ISecommerce').val()== 0){
    $('.ecell,.emargin,.epromotion,.epromotion,.edetails,.etitle,.etag,.edescription,.eabv,.eproof,.egeo').hide();
  }else{
    $('.ecell,.emargin,.epromotion,.epromotion,.edetails,.etitle,.etag,.edescription,.eabv,.eproof,.egeo').show();
  }
   $('#age').hide();
   $('#restict').hide();
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

$('#btnSave_New').click(function(){
  var supplier_price = $('#supplier_price').val();
  var sell_price = $('#store_sell_price').val();
    if($('#product_name').val() == '') {
        $("#name_err").html("Please enter the product name").show();
        return false;
    }
    if($('#nickname').val() == '') {
        $("#nname_err").html("Please enter the product nickname").show();
        return false;
    }
    if($('#category').val() == '--Select Category--'){
        $("#cat_err").html("Please select category").show();
        return false;
    }
    if($('#unit').val() == ''){
        $("#unit_err").html("Please select number of unit").show();
        return false;
    }
    if($('#quantity').val() == '' || $('#quantity').val() == 0){
        $("#qty_err").html("Please enter quantity").show();
        return false;
    }

    if($('#size').val().toLowerCase() != ''){
      var size =$('#size').val().toLowerCase();
      var v = size.split(' ');
      var arr = ['ml', 'oz', 'gallon', 'liter', 'quart'];
      if($.inArray(v[1], arr) !== -1){
          $("#size_err").html("").show();
      }else{
          $("#size_err").html("Supports only oz, ml, liter, gallon, quart format").show();
          return false;
      }
    }

    if($('#store_sell_price').val() == '' || $('#store_sell_price').val() == '0' || $('#store_sell_price').val() == '0.00' || $('#store_sell_price').val() == '00' || $('#store_sell_price').val() == '000' || $('#store_sell_price').val() == '0000'|| $('#store_sell_price').val() == '00000' || $('#store_sell_price').val() == '000000' || $('#store_sell_price').val() == '0000000'){
        $("#store_sell_err").html("Please enter store sell price").show();
        return false;
    }

    if($('#price_off').val() != 0 || $('#price_off').val() != ''){
        if(  parseFloat($('#store_sell_price').val()) < parseFloat($('#price_off').val()) ) {
            $("#price_off_err").html("Please enter less than store sell price").show();
            return false;
        }
    }

    if(parseFloat(supplier_price) >= parseFloat(sell_price)){
        $("#store_sell_err").html("Store sell price is not less than or equal supplier price, please enter correct store sell price").show();
        return false;
    }
    if($('#ecommerce_sell_price').val() != ''){
        if(parseFloat(supplier_price) >= parseFloat($('#ecommerce_sell_price').val()) ){
          $("#ecomm_sell_err").html("E-commerce sell price is not less than or equal supplier price, please enter correct e-commerce sell price").show();
          return false;
        }
    }
    if(supplier_price == '0' || supplier_price == '0.00' || supplier_price == '00' || supplier_price == '000' || supplier_price == '0000'|| supplier_price == '00000' || supplier_price == '000000' || supplier_price == '0000000'){
      $("#price_err").html("Please enter correct supplier price").show();
      return false;
    }

    //Product combo only
    var is_valid = 0;
    var name_Arr = [];
    $('.product_combo').each(function(){
        var id = $(this).attr('data-id');
        var value = $(this).val();
        var unit_combo = $('.combo_unit_'+id).val();
        var combo_price = $('.combo_price_'+id).val();
          if(value == '' && unit_combo !='') {
            is_valid = 1;
            $('#pcombo_err_'+id).html('Please enter product combo name').show();
            return false;
          }else{
            if($('.product_combo').hasClass("duplicate")){
                $('#pcombo_err_'+id).html('Please enter product combo name').show();
                return false;
            }else{
              $('#pcombo_err_'+id).hide();
              $('#dupli_er_'+id).html('').show();
            }
            $('#pcombo_err_'+id).hide();
          }
          if($.inArray(value, name_Arr) >= 0) {
            $('#dupli_er_'+id).html('Duplicate product combo name');
            $('#dupli_er_'+id).show();
            is_valid = 1;
          }else{
            name_Arr.push(value);
            $('#dupli_er_'+id).hide();
          }
          // check price - ST
          if(value != '' && unit_combo == '') {
            is_valid = 1;
            $('#ucomb_err_'+id).html('Please enter units in a combo').show();
            return false;
          }else{
            $('#ucomb_err_'+id).hide();
          }
          // check price - EN
          if(value != '' && combo_price == '') {
            is_valid = 1;
            $('#combo_err_'+id).html('Please enter combo price').show();
            return false;
          }else{
            $('#combo_err_'+id).hide();
          }
    });

    if(is_valid == 1){
      return false;
    }
    //end Product combo only
    var formdata = $('.add-product')[0];
    $.ajax({
        url: base_url + "cashier/insertproduct",
        type:"post",
        data:new FormData(formdata),
        processData:false,
        contentType:false,
        dataType : 'json',
        cache:false,
        beforeSend: function(){
            $("#overlay,.loader").show();
            $('#btnSave_New').attr('disabled', true);
        },
        success: function(data){
          if(data=='success'){
            $("#overlay,.loader").hide();
            swal({
                title: "Success!",
                text: 'Product is added successfully!',
                icon: "success",
                buttons: false,
            });
            if(node_setting == 1){
                data = '{"user_id":25}';
                socket.emit('send_notification',JSON.parse(data));
            }
          }else{
            $("#overlay,.loader").hide();
            if(data.name_err != ''){
                $("#name_err").html(data.name_err).show();
                $("#product_name").focus();
                $('#btnSave_New').attr('disabled', false);
                return false;
            }else{
              $('#btnSave_New').attr('disabled', false);
                swal({
                    title: "Oops!",
                    text: "Something went wrong!",
                    icon: "error",
                    buttons: false,
                    timer: 2000,
                });
            }
          }
          setTimeout( function (){
            window.location = base_url + "cashier/inventory"
          },1600);
        },
    });
    return false;
});

$('.customcardinput').bind('change', function() {
  var supplier_price = $('#supplier_price').val();
  var store_price = $('#store_sell_price').val();
    if($('#product_name').val() == '') {
        $("#name_err").html("Please enter the product name").show();
        return false;
    }else{
        $("#name_err").html("").show();
    }
    if($('#nickname').val() == '') {
        $("#nname_err").html("Please enter the product nickname").show();
        return false;
    }else{
        $("#nname_err").html("").show();
    }
    if($('#category').val() == '--Select Category--'){
        $("#cat_err").html("Please select category").show();
        return false;
    }else{
        $("#cat_err").html("").show();
    }
    if($('#unit').val() == ''){
        $("#unit_err").html("Please select number of unit").show();
        return false;
    }else{
        $("#unit_err").html("").show();
    }
    if($('#quantity').val() == '' || $('#quantity').val() == 0){
        $("#qty_err").html("Please enter quantity").show();
        return false;
    } else{
        $("#qty_err").html("").show();
    }

    if($('#size').val().toLowerCase() != ''){
      var size =$('#size').val().toLowerCase();
      var v = size.split(' ');
      var arr = ['ml', 'oz', 'gallon', 'liter', 'quart'];
      if($.inArray(v[1], arr) !== -1){
          $("#size_err").html("").show();
      }else{
          $("#size_err").html("Supports only oz, ml, liter, gallon, quart format").show();
          return false;
      }
    }

    if($('#store_sell_price').val() == '' || $('#store_sell_price').val() == '0' || $('#store_sell_price').val() == '0.00' || $('#store_sell_price').val() == '00' || $('#store_sell_price').val() == '000' || $('#store_sell_price').val() == '0000'|| $('#store_sell_price').val() == '00000' || $('#store_sell_price').val() == '000000' || $('#store_sell_price').val() == '0000000'){
        $("#store_sell_err").html("Please enter store sell price").show();
        return false;
    }else{
        $("#store_sell_err").html("").show();
    }

    if(supplier_price == '0' || supplier_price == '0.00' || supplier_price == '00' || supplier_price == '000' || supplier_price == '0000'|| supplier_price == '00000' || supplier_price == '000000' || supplier_price == '0000000'){
        $("#price_err").html("Please enter correct supplier price").show();
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
      if(parseFloat(supplier_price) >= parseFloat($('#ecommerce_sell_price').val())){
        $("#ecomm_sell_err").html("E-commerce sell price is not less than or equal supplier price, please enter correct e-commerce sell price").show();
        return false;
      }else{
         $("#ecomm_sell_err").html("").show();
      }
    }

});

$('.custom').bind('change', function() {
    if($('.store_p').val() == ''){
        $("#profit_err").html("Please select profit % in store").show();
        return false;
    }else{
        $("#profit_err").html("").show();
    }

    if($('.ecomm_p').val() == ''){
        $("#ecomm_err").html("Please select profit % in ecommerce").show();
        return false;
    }else{
        $("#ecomm_err").html("").show();
    }
});

if(supplier_price == ''){
    $('#rangeInput').val('0');
    $('#rangeInput').attr('max', 0);
    $('#amount').val('');
    $('#rangeInput2').val('0');
    $('#amount2').val('');
}

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
        $("#ecomm_sell_err").html("E-commerce sell price is not less than or equal supplier price, please enter correct e-commerce sell price").show();
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
  if($(this).val() == '' || $(this).val() == 0){
    $('#store_promotion_price').val('');
    $('#price_off').val('');
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
  if(supplier_price != '' && supplier_price != 0){
    var store_sell_price = supplier_price / (1 - (profit_margin));
    $('#store_sell_price').val(store_sell_price.toFixed(2));
    $("#store_sell_err").html("").show();//added
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
        $("#ecomm_sell_err").html("E-commerce sell price is not less than or equal supplier price, please enter correct e-commerce sell price").show();
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
        var measurements = [];
        $.each(data.sizename, function(index, value) {
           measurements.push(value.name);
        });
        $('#measurement_value').val(measurements);
        var option_list = '';
          $.each(data.sizename, function(index, value){
             option_list += '<option>'+value.name+'</option>';
          });
        $('#sizes').html(option_list);
        if(data.Applicable_CRV == 1 || $('#replicate_CRV').val()== 1){
          $("#CRV").prop("checked", true);
        }else{
          $("#CRV").prop("checked", false );
        }

        if(data.Applicable_Tax == 1 || $('#replicate_Tax').val() == 1){
          $("#TAX").prop("checked", true);
        }else{
          $("#TAX").prop("checked", false );
        }

        // age
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

var x = 1; //Initial field counter is 1

//Once add button is clicked
$(addButton).click(function () {
var randoMI = Math.floor(1000 + Math.random() * 9000);
  //Check maximum number of input fields
  if (x < maxField) {
      x++; //Increment field counter

      var fieldHTML =
          '<input type="hidden" name="combo_row[]" value="'+randoMI+'" ><div class="row"> <div class="col-md-4"> <div class="form-group"> <label class="customcardlabel" for="">Combo Name </label> <input type="text" class="form-control customcardinput product_combo" id="pcombo" data-id="'+randoMI+'" name="product_combo_'+randoMI+'" aria-describedby="" placeholder="Please enter Combo Name"> <span class="errors" id="pcombo_err_'+randoMI+'" style="color:red; font-size:14px"></span><span class="errors" id="dupli_er_'+randoMI+'" style="color:red; font-size:14px"></span></div></div><div class="col-md-4"> <div class="form-group"> <label class="customcardlabel" for="">Units in a Combo </label> <input type="tel" class="form-control customcardinput combo_unit_'+randoMI+'" id="punit" name="combo_unit_'+randoMI+'" aria-describedby="" placeholder="Please enter Units in a Combo" maxlength="2"> <span class="errors" id="ucomb_err_'+randoMI+'" style="color:red; font-size:14px"></span></div></div><div class="col-md-3"> <div class="form-group"> <label class="customcardlabel" for="">Combo Price </label> <div style="position:relative;"> <span class="prefix">$</span> <input type="tel" class="form-control customcardinput use-keyboard-input-num usefloathere combo_price_'+randoMI+'" id="cprice" name="combo_price_'+randoMI+'" aria-describedby="" placeholder="Please enter Combo Price" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" > </div> <span class="errors" id="combo_err_'+randoMI+'" style="color:red; font-size:14px"></span></div></div><div class="col-md-1"> <button type="button" class="btn btn-light apend_button removeNominee">-</button> </div></div>';

      $(wrapper).append(fieldHTML); //Add field html
  }
});

//Once remove button is clicked
$(wrapper).on('click', '.removeNominee', function (e) {
  e.preventDefault();
  $(this).parent().parent().remove(); //Remove field html
  x--; //Decrement field counter
});
});

$("#parent_product").autocomplete({
 source: function(request, response) {
   $.ajax({
     type: 'ajax',
     method: 'post',
     url: base_url + "cashier/Cashier/fetch_product_name",
     dataType: "json",
     data: {searchtxt: request.term},
     success: function(data) {
       response(data);
     }
   });
 },

 select: function( event, ui ) {
   $('#parent_product').val(ui.item.label); // display the selected text
   $('#parent_product_id_select').val(ui.item.value); // save selected id to input
   return false;
 }

});

//only use for replicate product
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
        // alert(prof_margin);
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

$(document).on("click",".product_image_delete",function() {
   swal({
       text: "Are you sure you want to delete this product image?",
       buttons: ["Cancel", true],
       dangerMode: true,
   }).then((willDelete) => {
       if (willDelete) {
         swal({
             title: "Success!",
             text:  "Product Image is deleted successfully!",
             icon: "success",
             buttons: false,
             timer :2200,
         });
         $('#product_hidden_img').val('./uploads/products/_');
         $('#product-img').attr('src', '');

       }
   });
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
