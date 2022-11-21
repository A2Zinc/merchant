$(document).ready(function() {
    var abv = $('#amount3').val();
    if(abv != ''){
      $('#rangeInput3').val(abv);
    }else{
      $('#rangeInput3').val(0);
    }

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

  $('#btnSave_Edit').click(function(){
    var supplier_price = parseFloat($('#supplier_price').val());
    var sell_price = parseFloat($('#store_sell_price').val());

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
    if(sell_price == '' || sell_price == 0){
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
          $("#ecomm_sell_err").html("E-commerce sell Price is not less than or equal supplier price, please enter correct e-commerce sell price").show();
          return false;
        }
    }

    if(supplier_price == '0' || supplier_price == '0.00' || supplier_price == '00' || supplier_price == '000' || supplier_price == '0000'|| supplier_price == '00000' || supplier_price == '000000' || supplier_price == '0000000'){
      $("#price_err").html("Please enter correct supplier price").show();
      return false;
    }

    if(supplier_price == ''){
        $('#rangeInput').val('0');
        $('#rangeInput').attr('max', 0);
        $('#amount').val('');
        $('#rangeInput2').val('0');
        $('#amount2').val('');
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
    var formdata = $('.edit-product')[0];
    $.ajax({
        url: base_url + "cashier/updateproduct",
        type:"post",
        data:new FormData(formdata),
        processData:false,
        contentType:false,
        dataType : 'json',
        cache:false,
        beforeSend: function(){
            $("#overlay,.loader").show();
            $('#btnSave_Edit').attr('disabled', true);
        },
        success: function(data){
          if(data=='success'){
            $("#overlay,.loader").hide();
            swal({
                title: "Success!",
                text: 'Product is updated successfully!',
                icon: "success",
                buttons: false,
            });
            if(node_setting == 1){
                data = '{"user_id":25}';
                socket.emit('send_notification',JSON.parse(data));
            }
          }else{
            if(data.name_err != ''){
                $("#name_err").html(data.name_err).show();
                $('#btnSave_Edit').attr('disabled', false);
                return false;
            }else{
              $('#btnSave_Edit').attr('disabled', false);
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
  // ST - For delete product image

  $(document).on("click",".product_image_delete",function() {
      var product_id = $(this).data("product_id");
      swal({
          text: "Are you sure you want to delete this product image?",
          buttons: ["Cancel", true],
          dangerMode: true,
          timer: 3800,
      }).then((willDelete) => {
          if (willDelete) {
            $.ajax({
                url: base_url + "cashier/deleteproductimage",
                type:"post",
                data: {product_id: product_id},
                dataType : 'json',
                cache:false,
                async:false,
                success: function(data){
                    if(data.status=='success'){
                      swal({
                          title: "Success!",
                          text:  "Product Image is deleted successfully!",
                          icon: "success",
                          buttons: false,
                          timer :2500,
                      });
                      $(".dynamic").empty();
                    }else{
                      swal({
                          title: "Opps!",
                          text: "Something went wrong!",
                          icon: "error",
                          buttons: false,
                          timer :2500,
                      });
                    }
                },
            });
          }
      });
  });
  // EN - For delete product image

  $('.customcardinput').bind('change', function() {
    var supplier_price = parseFloat($('#supplier_price').val());
    var sell_price = parseFloat($('#store_sell_price').val());
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
      if($('#category').val() == ''){
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
      if($('#quantity').val() == ''){
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

      if(supplier_price == '0' || supplier_price == '0.00' || supplier_price == '00' || supplier_price == '000' || supplier_price == '0000'|| supplier_price == '00000' || supplier_price == '000000' || supplier_price == '0000000'){
          $("#price_err").html("Please enter correct supplier price").show();
          return false;
      }else{
          $("#price_err").html("").show();
      }

      if(sell_price == '' || sell_price == '0' || sell_price == '0.00' || sell_price == '00' || sell_price == '000' || sell_price == '0000'|| sell_price == '00000' || sell_price == '000000' || sell_price == '0000000'){
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

      if(parseFloat(supplier_price) >= parseFloat(sell_price)){
          $("#store_sell_err").html("Store sell price is not less than or equal supplier price, please enter correct store sell price").show();
          return false;
      }else{
          $("#store_sell_err").html("").show();
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
          $("#ecomm_sell_err").html("E-commerce sell price is not less than or equal supplier price, please enter correct e-commerce sell price").show();
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
       // var supplier_price = parseFloat($('#supplier_price').val());
       var ecom_price = $('#ecommerce_sell_price').val();

       var prit_margin = (ecom_price - supplier_price) / ecom_price  * 100;
       $('#rangeInput2').val(prit_margin);
       $('.ecomm_p').val(prit_margin.toFixed(2));
    }
    if($('#ecommerce_sell_price').val() == 0){
       $('#rangeInput2').val('0');
       $('#amount2').val('');
    }
    if($('#store_promotion_price').val() != '' || $('#store_promotion_price').val() != 0){
        var price_off =  $('#store_sell_price').val() - parseFloat($('#store_promotion_price').val());
        var show_val = price_off.toFixed(2);
        $('#price_off').val(show_val);
    }
});

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

  $(document).on('click', '.sc1', function(){
      $('.promot_txt,#offer_text,#offer_text_err,.show_img,.hide_img,#append_print_label13,#append_print_label14,#append_print_label15').hide();
      $('#label_type').val('shelf');
      $('#append_print_label12').show();
      $("#bp1").css({ display: "block" });
      $("#bp2a,#bp2b,#bp3").css({ display: "none" });
      var product_id = $('#product_id').val();
      $.ajax({
         url: base_url + "cashier/Cashier/print_product_in_inventory_edit",
         method: "POST",
         dataType: 'json',
         data: {checkbox_value: product_id,bp_id:1},
         beforeSend: function(){
             $("#overlay,.loader").show();
         },
         success: function(data) {
           $("#overlay,.loader").hide();
           console.log(data.data[0]);
           var option_list = '';

           if(data.card_id == 1){
             option_list += '<div class="slicon-con">'+
               '<div class="template" id="bp1">'+
                 '<div class="w-100 p-3">'+
                     '<div class="first-slabel secT text-center mx-auto " style="width: 64%;">'+
                         '<div class="prodname h6 mx-auto">'+data.data[0].product_name+'</div>'+
                         '<div class="lpc-barcode position-relative mb-1 mr-3"><img src='+base_url+
                         'cashier/Cashier/generateBarcode?case_upc='+data.data[0].case_upc+'&product_name='+data.data[0].product_name+'&price2='+data.data[0].onsale_price+' alt="" class="barimg" style="height: 100px;width: 247px;"> <div class="bar-no position-absolute  mt-1">'+data.data[0].case_upc+'</div></div>';
                         if(data.data[0].store_promotion_price != 0){
                           option_list += '<p class="lpc-price h6 bcname mt-1 ml-3 float-left" style="font-size: 1.6rem;">$'+data.data[0].onsale_price+'</p>'+
                                           '<p class="lppc-price h6 bcname ml-2 mr-2 float-right">$'+data.data[0].store_promotion_price+'</p>';
                         }else{
                           option_list += '<p class="lppc-price h6 bcname ml-2 mr-2" style="font-size: 2.4rem;">$'+data.data[0].onsale_price+'</p>';
                         }
             option_list += '</div>'+
                           '</div>'+
                         '</div>'+
                       '</div>';
           }
           $('#append_print_label12').html(option_list);
         }
     });
  });



  $(document).on('click','.sc3', function(){
      $('').hide();
      $('#label_type').val('special');
      $('#offer_text').val("Special Offer 10% off");
      $('.promot_txt,#offer_text,#offer_text_err,#append_print_label15').show();
      $('.show_img,.hide_img,#append_print_label13,#append_print_label14,#append_print_label12').hide();
      $("#bp1,#bp2a,#bp2b,#bp3").css({ display: "none" });
      $("#bp3").css({ display: "block" });

      var product_id = $('#product_id').val();
      $.ajax({
           url: base_url + "cashier/Cashier/print_product_in_inventory_edit",
           method: "POST",
           dataType: 'json',
           data: {checkbox_value: product_id,bp_id:2},
           beforeSend: function(){
               $("#overlay,.loader").show();
           },
           success: function(data) {
             $("#overlay,.loader").hide();
             console.log(data.data[0]);
             var option_list = '';

             option_list +='<div class="slicon-con">'+
               '<div class="template" id="bp3">'+
                 '<div class="w-100 p-3">'+
                     '<div class="first-slabel text-center mx-auto p-0 ">'+
                           '<div class="d-flex jc-bet">'+
                           '<div class="imgcon-lbl">'+
                           '<img style="max-height: 84px;" src='+base_url+data.data[0].image_thumb+
                           '></div>'+
                               '<div class="w-50 bg-yellow">';
                               if(data.data[0].store_promotion_price != 0){
                                 option_list += '<div class="lppc-price san h6 bcname ">$'+data.data[0].store_promotion_price+'</div>'+
                                          '<div class="lpc-price h6 bcname">$'+data.data[0].onsale_price+'</div>';
                               }else{
                                  option_list += '<div class="lppc-price san h6 bcname">$'+data.data[0].onsale_price+'</div>';
                               }
                             option_list += '</div>'+
                             '</div>'+
                             '<div class="prodname mt-2 mx-auto spl-text" style="font-weight: bold;color: darkred;font-size: 19px;">Special Offer 10% off</div>'+
                           '<div class="prodname h6 mt-3 mx-auto mb-2">'+data.data[0].product_name+'</div>'+

                           '</div>'+
                             '</div>'+
                           '</div>'+
                         '</div>';

                      $('#append_print_label15').html(option_list);
           }

      });
  });

  $('.show_img').on('click',function(){
      $(".sc2").trigger('click');
      $('#label_type').val('product_show');
      $('.promot_txt,#offer_text,#offer_text_err').hide();
      $("#bp2a").css({ display: "block" });
      $("#bp2b,#bp1,#bp3").css({ display: "none" });
  });

  $('.hide_img').on('click',function(){
      $('#label_type').val('product_hide');
      $('.promot_txt,#offer_text,#offer_text_err,#append_print_label13,#append_print_label12,#append_print_label15').hide();
      $('#append_print_label14').show();
      $("#bp2b").css({ display: "block" });
      $("#bp2a,#bp1,#bp3").css({ display: "none" });

      var product_id = $('#product_id').val();
      $.ajax({
           url: base_url + "cashier/Cashier/print_product_in_inventory_edit",
           method: "POST",
           dataType: 'json',
           data: {checkbox_value: product_id,bp_id:2},
           beforeSend: function(){
               $("#overlay,.loader").show();
           },
           success: function(data) {
             $("#overlay,.loader").hide();
             console.log(data.data[0]);
             var option_list = '';

             option_list += '<div class="slicon-con">'+
               '<div class="template" id="bp2b">'+
                 '<div class="w-100 p-3">'+
                     '<div class="first-slabel text-center mx-auto p-0">'+
                         '<div class="">'+
                             '<div class="w-100 text-center mx-auto">';
                             if(data.data[0].store_promotion_price != 0){
                              option_list += '<div class="lppc-price h-auto h6 amg bcname text-center">$'+data.data[0].store_promotion_price+' <sub>+TAX/CRV</sub></div>'+
                                 '<div class="lpc-price h6 bcname">$'+data.data[0].onsale_price+'</div>';
                             }else{
                               option_list += '<div class="lppc-price h-auto h6 amg bcname text-center">$'+data.data[0].onsale_price+'<sub>+TAX/CRV</sub></div>';
                             }
                          option_list += '</div>'+
                         '</div>'+
                         '<div class="prodname h6 mt-3 mx-auto mb-2">'+data.data[0].product_name+'</div>'+
                         '<div class="text-left w-100 color-red bold text-bold upc-lbl">UPC#&emsp;'+data.data[0].case_upc+'</div>'+

                         '<div class="lpc-barcode new text-left  position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"></div>'+
                         '</div>'+
                           '</div>'+
                         '</div>'+
                       '</div>';

                    $('#append_print_label14').html(option_list);
           }
      });
  });

  $(document).on('click', '.sc2', function(){
      $('#label_type').val('product_show');
      $('.promot_txt,#offer_text,#offer_text_err,#append_print_label12,#append_print_label14,#append_print_label15').hide();
      $('.show_img,.hide_img,#append_print_label13').show();
      $("#bp2a").css({ display: "block" });
      $("#bp2b,#bp1,#bp3").css({ display: "none" });
      var product_id = $('#product_id').val();
      $.ajax({
           url: base_url + "cashier/Cashier/print_product_in_inventory_edit",
           method: "POST",
           dataType: 'json',
           data: {checkbox_value: product_id,bp_id:2},
           beforeSend: function(){
               $("#overlay,.loader").show();
           },
           success: function(data) {
             $("#overlay,.loader").hide();
             console.log(data.data[0]);
             var option_list = '';

             option_list += '<div class="slicon-con">'+
               '<div class="template" id="bp2a">'+
                 '<div class="w-100 p-3">'+
                     '<div class="first-slabel text-center mx-auto p-0">'+
                       '<div class="d-flex jc-bet">'+
                           '<div class="imgcon-lbl">'+
                           '<img style="max-height: 84px;" src='+base_url+data.data[0].image_thumb+
                           '></div>'+
                           '<div class="w-50 bg-yellow">';
                           if(data.data[0].store_promotion_price != 0){
                              option_list += '<div class="lppc-price san h6 bcname ">$'+data.data[0].store_promotion_price+'</div>'+
                                          '<div class="lpc-price h6 bcname">$'+data.data[0].onsale_price+'</div>';
                           }else{
                             option_list += '<div class="lppc-price san h6 bcname">$'+data.data[0].onsale_price+'</div>';
                           }
                           option_list += '</div>'+
                           '</div>'+
                         '<div class="prodname h6 mt-3 mx-auto mb-2">'+data.data[0].product_name+'</div>'+
                         '<div class="text-left w-100 color-red bold text-bold upc-lbl">UPC#&emsp;'+data.data[0].case_upc+'</div>'+
                         '<div class="lpc-barcode new text-left position-relative"><img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg"></div>'+
                         '</div>'+
                           '</div>'+
                         '</div>'+
                       '</div>';

                    $('#append_print_label13').html(option_list);
           }
      });
  });

  $(document).on('click', '#plabel3', function(){
      $('.sc1').addClass('active');
      $('.sc2,.sc3').removeClass('active');
      $('#append_print_label12').show();
      $('#label_type').val('shelf');
      $('.promot_txt,#offer_text,#offer_text_err,.show_img,.hide_img,#append_print_label13,#append_print_label14,#append_print_label15').hide();
      $('#label_type').val('shelf');
      $('#f1Special').modal('show');
      var product_id = $('#product_id').val();
      // alert(product_id);
           $.ajax({
              url: base_url + "cashier/Cashier/print_product_in_inventory_edit",
              method: "POST",
              dataType: 'json',
              data: {checkbox_value: product_id,bp_id:1},
              beforeSend: function(){
                  $("#overlay,.loader").show();
              },
              success: function(data) {
                $("#overlay,.loader").hide();
                console.log(data.data[0]);
                var option_list = '';

                if(data.card_id == 1){
                    option_list += '<div class="slicon-con">'+
                      '<div class="template" id="bp1">'+
                        '<div class="w-100 p-3">'+
                            '<div class="first-slabel secT text-center mx-auto " style="width: 64%;">'+
                                '<div class="prodname h6 mx-auto">'+data.data[0].product_name+'</div>'+
                                '<div class="lpc-barcode position-relative mb-1 mr-3"><img src='+base_url+
                                'cashier/Cashier/generateBarcode?case_upc='+data.data[0].case_upc+'&product_name='+data.data[0].product_name+'&price2='+data.data[0].onsale_price+' alt="" class="barimg" style="height: 100px;width: 247px;"> <div class="bar-no position-absolute  mt-1">'+data.data[0].case_upc+'</div></div>';
                                if(data.data[0].store_promotion_price != 0){
                                  option_list += '<p class="lpc-price h6 bcname mt-1 ml-3 float-left" style="font-size: 1.6rem;">$'+data.data[0].onsale_price+'</p>'+
                                                  '<p class="lppc-price h6 bcname ml-2 mr-2 float-right">$'+data.data[0].store_promotion_price+'</p>';
                                }else{
                                  option_list += '<p class="lppc-price h6 bcname ml-2 mr-2" style="font-size: 2.4rem;">$'+data.data[0].onsale_price+'</p>';
                                }
                    option_list += '</div>'+
                                  '</div>'+
                                '</div>'+
                              '</div>';
                }
                $('#append_print_label12').html(option_list);
              }
          });

  });

  $(document).on("change", "#offer_text", function (e) {
      var spl= $(this).val();
      $('.spl-text').text(spl);

  });

  $(document).on("click", "#print_spl_Label", function (e) {
    var label_id = 1;//$('#label_id').text();
    var product_id = $('#product_id').val();
    var label_type = $('#label_type').val();
    var number_of_prints = $('#enter_number_of_special_labels').val();
    var spl_txt = $('#offer_text').val();
        // if(number_of_prints == ''){
        //  $("#num_lab_err11").html("Please enter number of label").show();
        //    return false;
        // }else if(number_of_prints == 0){
        //      $("#num_lab_err11").html("Please enter number of label").show();
        //      $("#enter_number_of_special_labels" ).val(' ');
        //      $("#enter_number_of_special_labels" ).focus();
        //     return false;
        // }
        //
        // if(spl_txt == ''){
        //     $("#offer_text_err").html("Please enter promotion text").show();
        //     return false;
        // }

        doPrintSplLabels(label_id,product_id,number_of_prints,label_type,spl_txt);
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
var randoMI = Math.floor(1000 + Math.random() * 9000);
var fieldHTML =
    '<input type="hidden" name="combo_row[]" value="'+randoMI+'" ><div class="row"> <div class="col-md-4"> <div class="form-group"> <label class="customcardlabel" for="">Combo Name</label> <input type="text" class="form-control customcardinput product_combo" id="pcombo" data-id="'+randoMI+'" name="product_combo_'+randoMI+'" aria-describedby="" placeholder="Please enter Combo Name"> <span class="errors" id="pcombo_err_'+randoMI+'" style="color:red; font-size:14px"></span><span class="errors" id="dupli_er_'+randoMI+'" style="color:red; font-size:14px"></span></div></div><div class="col-md-4"> <div class="form-group"> <label class="customcardlabel" for="">Units in a Combo </label> <input type="text" class="form-control customcardinput combo_unit_'+randoMI+'" id="punit" name="combo_unit_'+randoMI+'" aria-describedby="" placeholder="Please enter Units in a Combo"> <span class="errors" id="ucomb_err_'+randoMI+'" style="color:red; font-size:14px"></span></div></div><div class="col-md-3"> <div class="form-group"> <label class="customcardlabel" for="">Combo Price </label> <div style="position:relative;"> <span class="prefix">$</span><input type="tel" class="form-control customcardinput combo_price_'+randoMI+'" id="cprice" name="combo_price_'+randoMI+'" aria-describedby="" placeholder="Please enter Combo Price" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" ></div> <span class="errors" id="combo_err_'+randoMI+'" style="color:red; font-size:14px"></span></div></div><div class="col-md-1"> <button type="button" class="btn btn-light apend_button removeNominee">-</button> </div></div>'; //New input field html
var x = 1; //Initial field counter is 1

//Once add button is clicked
$(addButton).click(function () {
     $(".clearProductCombo").removeClass("clearProductCombo").addClass("removeNominee");
     //Check maximum number of input fields
      if (x < maxField) {
          x++; //Increment field counter
          $(wrapper).append(fieldHTML); //Add field html
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
});

$(document).ready(function() {
  let currentTemplate = 1;
  let MaxTemplates = $('.template').length;
  $('.template').hide();
  $('#bp'+currentTemplate).show();
  $('.loop_left').hide();
  $('.sli-r').on('click',function(){
      if(currentTemplate>=MaxTemplates){
          return
      }else{
          currentTemplate = currentTemplate + 1;
          $('.template').show();
          $('.sli-r').show();
      }

      if($('.loop_right').attr('data-id') == 3){
          $('.loop_right').hide();
          $('.loop_left').show();
      }else{
          $('.loop_right').show();
          $('.loop_left').show();
      }
      $('.template').hide();
      $('#bp'+currentTemplate).show();

  });
  $('.sli-l').on('click',function(){
      if(currentTemplate<=1){
          return
      }else{
        currentTemplate = currentTemplate - 1;
          $('.sli-l').show();
      }

      if($('.loop_left').attr('data-id') == 1){
          $('.loop_right').show();
          $('.loop_left').hide();
      }else{
          $('.loop_right').show();
          $('.loop_left').show();
      }

      $('.template').hide();
      $('#bp'+currentTemplate).show();
  });
  $('.sli-chi').click(function(){
      $('.sli-chi').removeClass('active');
      $(this).addClass('active');
  });

  if($(".removeNominee").length == 1) {
      $(".removeNominee").removeClass("removeNominee").addClass("clearProductCombo");
  }

});

$(document).on("click",".clearProductCombo",function() {
  $("input[name='product_combo[]'],input[name='combo_unit[]'],input[name='combo_price[]']").val("");
});

 // Rajeswari @Print Lables
$('#plabel1').on('click',function(){
 var product_id = $('#product_id').val();
  $('#f1Sub').modal('show');
});

$('#plabel22').on('click',function(){
 // var product_id = $('#product_id').val();
  $('#print_label_modal').modal('show');

      var product_id = $('#product_id').val();
      var bp_id =  0;//$('#arrw_loop').val();
            if(bp_id == 0){
            var lbl_id = 1;
            }else{
            var lbl_id = bp_id;
            }
           $.ajax({
              url: base_url + "cashier/Cashier/print_product_in_inventory_edit",
              method: "POST",
              dataType: 'json',
              data: {checkbox_value: product_id,bp_id:lbl_id,},
              success: function(data) {
                var option_list = '';
                 $.each(data.data, function(index,value) {
                 var image = value.image_thumb;
                 var price1 = value.store_promotion_price;
                 var price2 = value.onsale_price;
                  var image1=image.substring(2);
                  var no_image1='uploads/products/No_image_available.png';
                  if(data.card_id=='1'){
                  option_list += '<div class="slicon-con">'+
                  '<div class="template">'+
                  '<div class="w-100 p-3">'+
                 '<div class="first-slabel text-center mx-auto p-0 ">'+
                 '<div class="d-flex jc-bet">';
                  if(value.image_thumb== './uploads/products/600px-No_image_available.svg (2).png'){
                   option_list += '<div class="imgcon-lbl">'+
                   '<img style="max-height: 84px;" src='+base_url+no_image1+
                   '>';
                   }else{
                   option_list += '<div class="imgcon-lbl">'+
                   '<img style="max-height: 84px;" src='+base_url+image1+
                    '>';
                   }

                  option_list += '</div><div class="w-50 bg-yellow" style="height:76px;">';
                  if(price1=='0'){
                      option_list += '<div class="lppc-price san h6 bcname" style="font-size: 2.2rem;"> $'+price2+
                       '</div>';
                 }else{
                option_list += '<div class="lppc-price san h6 bcname" style="font-size: 2.2rem;"> $'+
                 price1+
                 '</div>';
                 }
                 if(price1!='0')
                 {
                 option_list += '<div class="lpc-price h6 bcname"> $'+
                 price2+
                 '</div>';
                 }
                 option_list +='</div>'+
                 '</div>'+
                 '<div class="prodname mt-1 mx-auto spl-text" style="font-weight: bold;color: darkred;font-size: 16px;">Special Offer 10% off</div>'+
                  '<div class="prodname mt-3 mx-auto mb-2">'+value.product_name+
                  '</div>'+
                   '<div class="text-left w-100 color-red bold text-bold upc-lbl">'+'UPC#'+value.case_upc+
                   '</div>'+
                    '<div class="lpc-barcode new text-left  position-relative">'+
                    '<img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg">'+
                     '</div>'+
                     '</div>'+
                     '</div>'+'</div>'+'</div>';
                  }

              });
                 $('#append_print_label12').html(option_list);
                  $("#label_id").html(data.card_id);
                 },
            });

});


$(document).ready(function () {
 $('.loop_right').on('click', function(){
      var right_id = $(this).attr('data-id');
      var left_id = $('.loop_left').attr('data-id');
      parseInt(right_id);
      parseInt(left_id);
      if(right_id==1 || right_id<3){
          $('.loop_left').attr('data-id',++left_id);
          $('.loop_right').attr('data-id',++right_id);
      }
      $('#arrw_loop').val(right_id);
 });

  $('.loop_left').on('click', function(){
      var left_id = $(this).attr('data-id');
      var right_id = $('.loop_right').attr('data-id');
      parseInt(right_id);
      parseInt(left_id);
      if(left_id ==1 || left_id == 2 || left_id == 3){
          $('.loop_left').attr('data-id',--left_id);
          $('.loop_right').attr('data-id',--right_id);
      }
      $('#arrw_loop').val(left_id);
   });

   $('#selectLabel').on('click',function(){
        var product_id = $('#product_id').val();
       var bp_id =  $('#arrw_loop').val();
              if(bp_id == '0'){
              var lbl_id = 1;
              }else{
              var lbl_id = bp_id;
              }
             $.ajax({
                url: base_url + "cashier/Cashier/print_product_in_inventory_edit",
                method: "POST",
                dataType: 'json',
                data: {
                    checkbox_value: product_id,bp_id:lbl_id,
                },
                success: function(data) {
                  var option_list = '';
                   $.each(data.data, function(index,value) {
                   var image = value.image_thumb;
                   var price1 = value.store_promotion_price;
                   var price2 = value.onsale_price;
                    var image1=image.substring(2);
                    var no_image1='uploads/products/No_image_available.png';
                    if(data.card_id=='1'){
                    option_list += '<div class="slicon-con">'+
                    '<div class="template" id="bp1">'+
                    '<div class="w-100 p-3">'+
                   '<div class="first-slabel text-center mx-auto p-0 ">'+
                   '<div class="d-flex jc-bet">';
                    if(value.image_thumb== './uploads/products/600px-No_image_available.svg (2).png')
                    {
                     option_list += '<div class="imgcon-lbl">'+
                     '<img  src='+base_url+no_image1+
                     '>';
                     }
                     else
                     {
                     option_list += '<div class="imgcon-lbl">'+
                     '<img  src='+base_url+image1+
                      '>';
                     }

                    option_list += '</div><div class="w-50 bg-yellow">';
                    if(price1=='0')
                    {
                        option_list += '<div class="lppc-price san h6 bcname "> $'+price2+
                         '</div>';
                   }
                   else
                   {
                  option_list += '<div class="lppc-price san h6 bcname "> $'+
                   price1+
                   '</div>';
                   }
                   if(price1!='0')
                   {
                   option_list += '<div class="lpc-price h6 bcname"> $'+
                   price2+
                   '</div>';
                   }
                   option_list +='</div>'+
                   '</div>'+
                    '<div class="prodname h6 mt-3 mx-auto mb-2">'+value.product_name+
                    '</div>'+
                     '<div class="text-left w-100 color-red bold text-bold upc-lbl">'+'UPC#'+value.case_upc+
                     '</div>'+
                      '<div class="lpc-barcode new text-left  position-relative">'+
                      '<img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg">'+
                       '</div>'+
                       '</div>'+
                       '</div>'+'</div>'+'</div>';
                    }
                    else if(data.card_id=='2')
                    {
                        option_list += '<div class="slicon-con">'+
                                       '<div class="template" id="bp2">'+
                                       '<div class="w-100 p-3">'+
                                       '<div class="first-slabel secT text-center mx-auto ">'+
                                       '<div class="prodname h6 mx-auto">'+value.product_name+
                                       '</div>'+
                                       '<div class="lpc-barcode hor position-relative">'+
                                       '<img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg">'+
                                       '<div class="bar-no position-absolute">'+value.case_upc+
                                       '</div>'+
                                       '</div>';
                                       if(price1!='0'){
                                       option_list += '<div class="lpc-price h6 bcname"> $'+price2+
                                        '</div>';
                                         }
                                                    if(price1=='0'){
                                         option_list += '<div class="lppc-price h5 bcname">$'+price2+
                                        '</div>';
                                         }
                     else
                     {
                      option_list += '<div class="lppc-price h5 bcname">$'+price1+
                                        '</div>';
                     }

                                         option_list += '</div>'+
                                         '</div>'+
                                        '</div>'+
                                        '</div>';
                    }
                           else if(data.card_id=='3')
                    {
                        option_list += '<div class="slicon-con">'+
                    '<div class="template" id="bp3">'+
                     '<div class="w-100 p-3">'+
                      '<div class="first-slabel text-center mx-auto p-0 ">'+
                       '<div class="">'+
                      '<div class="w-100 text-center mx-auto">';
                         if(price1=='0'){
                       option_list +='<div class="lppc-price h-auto h6 amg bcname text-center"> $'+
                       price2+'<sub>'+
                        'TAX/CRV'+'</sub>'+
                          '</div>';
                          }
                          else{
                       option_list +='<div class="lppc-price h-auto h6 amg bcname text-center"> $'+
                        price1+'<sub>'+
                        'TAX/CRV'+'</sub>'+
                          '</div>';
                          }
                         if(price1!='0'){
                          option_list +='<div class="lpc-price h6 bcname"> $'+price2+'</div>'+
                      '</div>';
                        }
                  option_list +='</div>'+
                  '<div class="prodname h6 mt-3 mx-auto mb-2">'+
                  value.product_name+'</div>'+
                  '<div class="text-left w-100 color-red bold text-bold upc-lbl black">'+'UPC#&emsp;'+value.case_upc+'</div>'+
                  '<div class="lpc-barcode new text-left  position-relative">'+
                  '<img src="https://miro.medium.com/max/640/0*sL-rFeucrpLyj7fI.png" alt="" class="barimg">'+
                   '</div>'+
                   '</div>'+
                   '</div>'+
                    '</div>'+
                  '</div>';
                    }

                });
                   $('#append_print_label').html(option_list);
                    $("#label_id").html(data.card_id);
                   },
              });
              $('#f1Sub').modal('hide');
              $('#f1S').modal('show');
   });

});

$('#bleave6').on('click', function(){
$('#f1S').modal('hide');
$('#f1Sub').modal('show');
$('#enter_number_of_labels').val(' ');
});


$(document).on("click", ".print_lables_pr", function (e) {
  var label_id = $('#label_id').text();
  var number_of_prints = $('#enter_number_of_labels').val();
      if(number_of_prints == ''){
       $("#num_lab_err").html("Please enter number of label").show();
         return false;
      }
      else if(number_of_prints == 0){
           $("#num_lab_err").html("Please enter number of label").show();
           $("#enter_number_of_labels" ).val(' ');
           $("#enter_number_of_labels" ).focus();
          return false;
      }

     var product_id = $('#product_id').val();
      doPrintLabels(label_id,product_id,number_of_prints);
 });

 $('.inputfile6').bind('change', function() {
    if ($('#enter_number_of_labels').val() == '' || $('#enter_number_of_labels').val() == 0) {
        $("#num_lab_err").html("Please enter number of label").show();
        return false;
    } else {
        $("#num_lab_err").html("").show();
    }
 });

 $('.inputfile16').bind('change', function() {
    if ($('#enter_number_of_special_labels').val() == '' || $('#enter_number_of_special_labels').val() == 0) {
        $("#num_lab_err11").html("Please enter number of label").show();
        return false;
    } else {
        $("#num_lab_err11").html("").show();
    }

    if ($('#enter_number_of_special_labels').val() == '' || $('#enter_number_of_special_labels').val() == 0) {
        $("#offer_text_err").html("Please enter promotion text").show();
        return false;
    } else {
        $("#offer_text_err").html("").show();
    }
 });


 function doPrintLabels(label_id,product_id,number_of_prints) {
     $.ajax({
       type: "POST",
       url: base_url + "cashier/print_labels",
       dataType: "html",
       async: false,
       data: {
                 label_id: label_id, checkbox_value:product_id,number_of_prints:number_of_prints,
           },
       success: function (data) {
         var fileContents1 = data;
         console.log(fileContents1,'fc');
         var printWindow = window.open('', '', 'height=800,width=1200');
         printWindow.document.write('<html>');
         printWindow.document.write(' <link rel="stylesheet"  media="screen"  href="'+base_url+'assets/cashier/style/customstyle.css" />')
         printWindow.document.write(' <link rel="stylesheet" media="print" href="'+base_url+'assets/cashier/style/print-sheet.css" />')
         printWindow.document.write(fileContents1);
         printWindow.document.write('</html>');
       },
     });
}

function doPrintSplLabels(label_id,product_id,number_of_prints,label_type,spl_txt) {
    $.ajax({
      type: "POST",
      url: base_url + "cashier/Cashier/print_special_labels",
      dataType: "html",
      async: false,
      data: {
                label_id: label_id, checkbox_value:product_id,number_of_prints:number_of_prints,label_type:label_type,special_txt:spl_txt,
          },
      success: function (data) {
        var fileContents1 = data;
        console.log(fileContents1,'fc');
        var printWindow = window.open('', '', 'height=800,width=1200');
        printWindow.document.write('<html>');
        printWindow.document.write(' <link rel="stylesheet"  media="screen"  href="'+base_url+'assets/cashier/style/customstyle.css" />')
        printWindow.document.write(' <link rel="stylesheet" media="print" href="'+base_url+'assets/cashier/style/print-sheet.css" />')
        printWindow.document.write(fileContents1);
        printWindow.document.write('</html>');
      },
    });
  }

   $("#parent_product").autocomplete({
     source: function(request, response) {
       $.ajax({
         type: 'ajax',
         method: 'post',
         url: base_url + "cashier/Cashier/fetch_productname",
         dataType: "json",
         data: {searchtxt: request.term, product_id : $('.productIDS').val()},
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
