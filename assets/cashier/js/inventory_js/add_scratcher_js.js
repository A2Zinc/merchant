$('#size').on('input', function() {
    $(this).val($(this).val().replace(/[^a-z0-9./ ]/gi, ''));
});

$('#btnSave').click(function(){
    var sell_price = $('#store_sell_price').val();
    if($('#product_name').val() == '') {
        $("#name_err").html("Please enter the Scratcher Name").show();
        return false;
    }
    if($('#nickname').val() == '') {
        $("#nname_err").html("Please enter the Scratcher Nickname").show();
        return false;
    }
    if($('#bin').val() == '' || $('#bin').val() == '--Select BIN--') {
        $("#bin_name_err").html("Please enter BIN").show();
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
    if($('#store_sell_price').val() == '' || $('#store_sell_price').val() == '0' || $('#store_sell_price').val() == '0.00' || $('#store_sell_price').val() == '00' || $('#store_sell_price').val() == '000' || $('#store_sell_price').val() == '0000'|| $('#store_sell_price').val() == '00000' || $('#store_sell_price').val() == '000000' || $('#store_sell_price').val() == '0000000'){
        $("#store_sell_err").html("Please enter Store Sell Price").show();
        return false;
    }
    if($('#scratcher_no_from').val() == '') {
        $("#scratcher_no_from_err").html("Please enter the Scratcher ID From value").show();
        return false;
    }

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/scratcher_inventory_insert_product",
        data: $('.add-product').serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#btnSave').attr('disabled', true);
        },
        success: function(data){
            if(data == 'success'){
                swal({
                    title:"Success!",
                    text: "Scratcher is added successfully!",
                    icon: "success",
                    buttons: false,
                })
                setTimeout( function (){
                  window.location = base_url + "cashier/scratcher_inventory";
                },3000);
            }else{
              if(data.name_err != ''){
                  $("#name_err").html(data.name_err).show();
                  $('#btnSave').attr('disabled', false);
                  return false;
              }else{
                  $('#btnSave').attr('disabled', false);
                  swal({
                      title: "Oops!",
                      text: "Someting went wrong!",
                      icon: "error",
                      buttons: false,
                      timer: 2200,
                  });
              }
            }
        },
    });
    return false;
});

$('.customcardinput').bind('change', function() {
    var store_price = $('#store_sell_price').val();
    if($('#product_name').val() == '') {
        $("#name_err").html("Please enter the Scratcher Name").show();
        return false;
    }else{
        $("#name_err").html("").show();
    }
    if($('#nickname').val() == '') {
        $("#nname_err").html("Please enter the Scratcher Nickname").show();
        return false;
    }else{
        $("#nname_err").html("").show();
    }
    if($('#bin').val() == '' || $('#bin').val() == '--Select BIN--') {
        $("#bin_name_err").html("Please enter BIN").show();
        return false;
    }else{
        $("#bin_name_err").html("").show();
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
    if($('#store_sell_price').val() == '' || $('#store_sell_price').val() == '0' || $('#store_sell_price').val() == '0.00' || $('#store_sell_price').val() == '00' || $('#store_sell_price').val() == '000' || $('#store_sell_price').val() == '0000'|| $('#store_sell_price').val() == '00000' || $('#store_sell_price').val() == '000000' || $('#store_sell_price').val() == '0000000'){
        $("#store_sell_err").html("Please enter Store Sell Price").show();
        return false;
    }else{
        $("#store_sell_err").html("").show();
    }

    if($('#scratcher_no_from').val() == '') {
        $("#scratcher_no_from_err").html("Please enter the Scratcher ID From value").show();
        return false;
    } else {
        $("#scratcher_no_from_err").html("").show();
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


$(document).ready(function() {
    var category_id = $('#category').val();
    $.ajax({
       type: "POST",
       url: base_url + "cashier/Cashier/fetch_size_type",
       data : {category_id : category_id},
       dataType : 'json',
       success : function(data) {
          //crv
          if(data.Applicable_CRV == 1){
            $("#CRV").prop("checked", true);
          }else{
            $("#CRV").prop("checked", false );
          }
          // tax
          if(data.Applicable_Tax == 1){
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

 $('#quantity').on('change', function(){
   var qty = $(this).val();
   var from_scratcher = parseInt($('#scratcher_no_from').val());
   var calculation = from_scratcher + parseInt(qty) - 1;

   alert(qty);
   if($('#scratcher_no_from').val() != '' && qty != ''){
     $('#scratcher_no_to').val(calculation);
     if($('.currentNo').text() == 'NaN'){
       $('.currentNo').text('Scratcher Current No : ');
     }else{
       $('.currentNo').text('Scratcher Current No : '+from_scratcher);
     }
   }else if(qty == ''){
       $('#scratcher_no_to').val('');
   }
 });

 $('#scratcher_no_from').on('change', function(){
     var from_scratcher = parseInt($(this).val());
     var qty = $('#quantity').val();
     var calculation = from_scratcher + parseInt(qty) - 1;
     if($('#scratcher_no_from').val() != ''){
       $('#scratcher_no_to').val(calculation);
       if($('.currentNo').text() == 'NaN'){
         $('.currentNo').text('Scratcher Current No : ');
       }else{
         $('.currentNo').text('Scratcher Current No : '+from_scratcher);
       }
     }
 });
