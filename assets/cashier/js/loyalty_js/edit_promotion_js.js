$(".inputDate").flatpickr({
  enableTime: false,
  dateFormat: "m-d-Y",
  minDate: "today", //dateformat using m.d.y
  "locale": {
    "firstDayOfWeek": 1 // set start day of week to Monday
  }
});

$(document).ready(function() {
  $('.select-2-dropdown').select2();
});

$("#product_name").autocomplete({
  source: function(request, response) {
    var size_i = $('#select_size').val();
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/fetch_product",
      dataType: "json",
      data: {
        searchtxt: request.term,
        size_i: size_i
      },
      success: function(data) {
        response(data);
      }
    });
  },
  select: function(event, ui) {
    $('#product_seleted_name').append('<div id="added_product_div_' + ui.item.value + '">' + ui.item.label + '<span style="color: red;margin-left: 10px;" class="delete_product" id="' + ui.item.value + '">X</span><input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="' + ui.item.value + '" /></div>');
    $('#product_name').val('');
    $('#product_name').focus();
    return false;
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

$(document).on('click', '.delete_product', function() {
  var id = $(this).attr('id');
  $('#added_product_div_' + id).remove();
});

var coupon_state = false;
$('#promotion_name').on('blur', function() {
    var coupon_name = $('#promotion_name').val();
    var coupon_id = $('#promotionID').val();
    $.ajax({
        url: base_url + "cashier/Cashier/checkExistPromotion",
        type:'post',
        data:{coupon_name:coupon_name, coupon_id : coupon_id},
        success:function(response){
          if (response == 'fail' ) {
            $('#promotion_name').addClass('couponerr');
            coupon_state = false;
            $("#cname_err").html("This Promotion Name is already exist").show();
          }else if (response == 'success') {
            coupon_state = true;
            $('#promotion_name').removeClass('couponerr');
            $("#cname_err").html("").show();
          }
        }
    });
});

$('#btnSave').on('click', function() {
    if ($('#promotion_name').val() == '') {
      $("#cname_err").html("Please enter Promotion Name").show();
      return false;
    }
    if ($('#promotion_type').val() == '--Select Promotion Type--') {
      $("#ctype_err").html("Please Select Promotion Type").show();
      return false;
    }
    if ($('#promotion_type').val() == '8') {
      if ($('#product_q').val() == '' || $('#product_q').val() == '0') {
        $("#qty_err").html("Please enter Units in a Combo").show();
        return false;
      }
      if ($('#combo_amount').val() == '0') {
         $("#combo_err").html("Please enter Combo Price").show();
        return false;
      }
    }

    if ($('#start_date').val() == '') {
      $("#start_err").html("Please select Start Date").show();
      return false;
    }
    if ($('#end_date').val() == '') {
      $("#end_err").html("Please select Expiry Date").show();
      return false;
    }
    if ($('#end_date').val() < $('#start_date').val()) {
      $("#date_err").html("Expiry Date is less than Start Date, Please Select Correct Date").show();
      return false;
    }
    if($('#ISreceipt').prop("checked") == true){
        if($('#receipt_pro').val() == ''){
          $("#rcpt_err").html("Please enter Receipt Promotion").show();
          return false;
        }
    }
    if($('#promotion_name').hasClass('couponerr') == false ){
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: base_url + "cashier/update_promotion",
          data: $('.edit-promotion').serialize(),
          async: false,
          dataType: 'json',
          beforeSend: function(){
              $('#btnSave').attr('disabled', true);
          },
          success: function(data) {
            if (data == 'success') {
              swal({
                title: "Success!",
                text: "Promotion edited successfully!",
                icon: "success",
                buttons: false,
              });
              setTimeout(function() {
                window.location = base_url + "cashier/promotion";
              }, 2300);
            }
          },
        });
      return false;
    }
});

$('.customcardinput').bind('change', function() {
    if ($('#promotion_name').val() == '') {
      $("#cname_err").html("Please enter Promotion Name").show();
      return false;
    } else {
      $("#cname_err").html("").show();
    }
    if ($('#promotion_type').val() == '--Select Promotion Type--') {
      $("#ctype_err").html("Please Select Promotion Type").show();
      return false;
    } else {
      $("#ctype_err").html("").show();
    }

    if ($('#promotion_type').val() == '8') {
      if ($('#product_q').val() == '' || $('#product_q').val() == '0') {
        $("#qty_err").html("Please enter Units in a Combo").show();
        return false;
      } else {
        $("#qty_err").html("").show();
      }
      if ($('#combo_amount').val() == '0') {
        $("#combo_err").html("Please enter Combo Price").show();
        return false;
      } else {
        $("#combo_err").html("").show();
      }
    }

    if ($('#start_date').val() == '') {
      $("#start_err").html("Please select Start Date").show();
      return false;
    } else {
      $("#start_err").html("").show();
    }
    if ($('#end_date').val() == '') {
      $("#end_err").html("Please select Expiry Date").show();
      return false;
    } else {
      $("#end_err").html("").show();
    }
    if ($('#end_date').val() < $('#start_date').val()) {
      $("#date_err").html("Expiry Date is less than Start Date, Please Select Correct Date").show();
      return false;
    } else {
      $("#date_err").html("").show();
    }
    if($('#ISreceipt').prop("checked") == true){
        if($('#receipt_pro').val() == ''){
          $("#rcpt_err").html("Please enter Receipt Promotion").show();
          return false;
        }else {
          $("#rcpt_err").html("").show();
        }
    }
});

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

$(document).on("keypress", "#product_name", function(e) {
  if (e.which == 13) {
    var case_UPC = $("#product_name").val();
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/get_product_by_barcode",
      data: {case_UPC: case_UPC},
      dataType: 'json',
      success: function(data) {
        $('#product_seleted_name').append('<div id="added_product_div_' + data.product_id + '">' + data.product_name + '<span style="color: red;margin-left: 10px;" class="delete_product" id="' + data.product_id + '">X</span><input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="' + data.product_id + '" /></div>');
        $('#product_name').val('');
        $('#product_name').focus();
      },
    });
    return false;
  }
});

$('#ISreceipt').change(function() {
   if(this.checked) {
    $('#ISreceipt').val(1);
    $('.receipt1').show();
    $('#receipt_pro').val($('#hidden_rcpt').val());
  }else{
    $('#ISreceipt').val(0);
    $('.receipt1').hide();
    $('#receipt_pro').val('');
  }
});

$(document).ready(function() {
   if($('#ISreceipt').prop("checked") == true){
     $('#ISreceipt').val(1);
     $('.receipt1').show();
   }else{
     $('#ISreceipt').val(0);
     $('.receipt1').hide();
   }
});
