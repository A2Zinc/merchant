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


$('#size').on('input', function() {
  $(this).val($(this).val().replace(/[^a-z0-9./ ]/gi, ''));
});

$('#btnSave').click(function(){
    var sell_price = parseFloat($('#store_sell_price').val());
    if($('#product_name').val() == '') {
        $("#name_err").html("Please enter the Product Name").show();
        return false;
    }
    if($('#nickname').val() == '') {
        $("#nname_err").html("Please enter the Product Nickname").show();
        return false;
    }
    if($('#bin').val() == '') {
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
    if(sell_price == '' || sell_price == '0' || sell_price == '0.00' || sell_price == '00' || sell_price == '000' || sell_price == '0000'|| sell_price == '00000' || sell_price == '000000' || sell_price == '0000000'){
        $("#store_sell_err").html("Please enter Store Sell Price").show();
        return false;
    }
    if($('#scratcher_no_from').val() == '') {
        $("#scratcher_no_from_err").html("Please enter the Scratcher ID From value").show();
        return false;
    }

    var formdata = $('.edit-product')[0];
    $.ajax({
        url: base_url + "cashier/scratcher_inventory_update_product",
        type:"post",
        data:new FormData(formdata),
        processData:false,
        contentType:false,
        dataType : 'json',
        cache:false,
        async:false,
        beforeSend: function(){
            $('#btnSave').attr('disabled', true);
        },
        success: function(data){
            if(data.status=='success'){
              swal({
                  title: "Success!",
                  text: data.message,
                  icon: "success",
                  buttons: false,
                  timer: 3000
              });
            }else if(data.bin_err != ''){
                $("#bin_name_err").html(data.bin_err).show();
                $('#btnSave').attr('disabled', false);
                return false;
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
                      timer: 2500,
                  });
              }
            }
            setTimeout( function (){
              window.location = base_url + "cashier/scratcher_inventory";
            },3000);
        },
    });
    return false;
});

$('.customcardinput').bind('change', function() {
    var sell_price = parseFloat($('#store_sell_price').val());
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
    if($('#bin').val() == '') {
        $("#bin_name_err").html("Please enter BIN").show();
        return false;
    }else{
        $("#bin_name_err").html("").show();
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
    if(sell_price == '' || sell_price == '0' || sell_price == '0.00' || sell_price == '00' || sell_price == '000' || sell_price == '0000'|| sell_price == '00000' || sell_price == '000000' || sell_price == '0000000') {
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

$(document).ready(function() {
    if($('#quantity').val() == 0){
      $('.currentNo').text('Scratcher Current No : ');
    }
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

$(document).on('change', '.change_scratcher_status', function() {
    var status = $(this).val();
    if(status == '0'){
        if($('#available_bin1').val() == ''){
            swal({
                title: "Oops!",
                text: "Sorry, no bin available!",
                icon: "error",
                buttons: false,
                timer: 2000,
            });
            $(this).val($('#hide_scratcher_status').val());
        }
    }
});

$('#quantity').on('change', function(){
    var qty = $(this).val();
    var from_scratcher = parseInt($('#scratcher_no_from').val());
    var calculation = from_scratcher + parseInt(qty) - 1;
    if($('#scratcher_no_from').val() != '' && qty != ''){
      if($('#scratcher_no_from').val() == $('#current_scr_no').val()){
        $('#scratcher_no_to').val(calculation);
      }
      if($('.currentNo').text() == 'NaN'){
        $('.currentNo').text('Scratcher Current No : ');
      }
    }else if(qty == '' || qty == 0){
        $('#scratcher_no_to').val('');
        $('.currentNo').text('Scratcher Current No : ');
    }
});
