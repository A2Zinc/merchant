$(".inputDate").flatpickr({
    enableTime: false,
    dateFormat: "m-d-Y",
    minDate: "today",  //dateformat using m.d.y
    "locale": {
        "firstDayOfWeek": 1 // set start day of week to Monday
    }
});

var addButton = $('.add-button');
var x = 1; //Initial field counter is 1
var maxField = 6;

$j(addButton).click(function () {
   //Check maximum number of input fields
  if (x < maxField) {
      var wrapper = $j('.item-apend'); //Input field wrapper
      var randoMID = Math.floor(1000 + Math.random() * 9000);
      var fieldHTML =
      //New input field html
     '<div class="row prdut"><div class="col-md-11"><div class="form-group"><label class="customcardlabel" for="">Product *</label><input type="text" class="form-control customcardinput product_name" name="product_name" id="'+randoMID+'" value="" /><input type="hidden" class="form-control product_select" name="product_id[]" id="product_id_select'+randoMID+'" value="" /></div></div><div class="col-md-1 p-0 m-0 mt-3"><button type="button" class="btn btn-light apend_button removeNominee" href="javascript:void(0);">-</button></div></div><script>$("#'+randoMID+'").autocomplete({source: function( request, response ) {$.ajax({type: "ajax",method: "post",url: "'+base_url+'cashier/Cashier/fetch_product",dataType: "json",data: {searchtxt: request.term},success: function( data ) {response( data );}});},select: function( event, ui ) {$("#'+randoMID+'").val(ui.item.label);$("#product_id_select'+randoMID+'").val(ui.item.value);return false;}});';
       x++; //Increment field counter
       $j(wrapper).append(fieldHTML); //Add field html
  }
});

$j('.item-apend').on('click', '.removeNominee', function (e) {
     e.preventDefault();
     $j(this).parent().parent().remove(); //Remove field html
     x--; //Decrement field counter
});

$( "#product_name" ).autocomplete({
    source: function( request, response ) {
      $.ajax({
        type: 'ajax',
        method: 'post',
         url: base_url + "cashier/Cashier/fetch_product",
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
      $('#product_name').val(ui.item.label); // display the selected text
      $('#product_id_select').val(ui.item.value); // save selected id to input
      return false;
    }
});

$( "#category_name" ).autocomplete({
    source: function( request, response ) {
      $.ajax({
         type: 'ajax',
         method: 'post',
         url: base_url + "cashier/Cashier/fetch_category",
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
      $.ajax({
         type: 'ajax',
         method: 'post',
         url: base_url + "cashier/Cashier/fetch_brand",
         dataType: "json",
         data: {searchtxt: request.term},
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

  $(document).ready(function() {
      $('.product,.product1,.category,.brand,.productqty,.dpercentage,.comboAMT').hide();
     var coupon_state = false;
      $j( "#product_name" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
             type: 'ajax',
             method: 'post',
             url: base_url + "cashier/Cashier/fetch_product",
             dataType: "json",
             data: {searchtxt: request.term},
             success: function( data ) {
               response( data );
             }
           });
        },
        select: function( event, ui ) {
          $j('#product_name').val(ui.item.label); // display the selected text
          $j('#product_id_select').val(ui.item.value); // save selected id to input
          return false;
        }
    });
});

$('#coupon_type').on('change', function() {
    $('.product,.product1,.brand,.category,.comboAMT,.productqty,.dpercentage,.prdut').hide();
    $('.discountTYPE,.damount').show();
    $('.applyType').removeClass('col-md-12');
    $('.applyType').addClass('col-md-6');

    if($(this).val() == '3'){
        $('#adBTN,.prdut').hide();
        $('.discountTYPE,.damount,.product,.productqty').show();
        $('.divPROD').removeClass('col-md-11');
        $('.divPROD').addClass('col-md-12');
    }
    if($(this).val() == '8'){
        $('#adBTN,.comboAMT,.product,.productqty,.prdut').show();
        $('.discountTYPE,.damount,.dpercentage').hide();
        $('.divPROD').removeClass('col-md-12');
        $('.divPROD').addClass('col-md-11');
        $('.coupDetails').removeClass('col-md-6');
        $('.coupDetails').addClass('col-md-12');
        $('.applyType').removeClass('col-md-12');
        $('.applyType').addClass('col-md-6');
    }
    if($(this).val() == '9'){
        $('.category').show();
        $('.applyType').removeClass('col-md-12');
        $('.applyType').addClass('col-md-6');
        $('.coupDetails').removeClass('col-md-12');
        $('.coupDetails').addClass('col-md-6');
    }
    if($(this).val() == '10'){
        $('.brand').show();
        $('.applyType').removeClass('col-md-12');
        $('.applyType').addClass('col-md-6');
        $('.coupDetails').removeClass('col-md-12');
        $('.coupDetails').addClass('col-md-6');
    }
});

$('#adBTN').on('click', function() {
    $('.product1').show();
    $('.coupDetails').removeClass('col-md-12');
    $('.coupDetails').addClass('col-md-6');
});

$('#removeBTN').on('click', function() {
    $('.product1').hide();
    $('.coupDetails').removeClass('col-md-6');
    $('.coupDetails').addClass('col-md-12');
});

$('#discount_type').on('change', function() {
    if($(this).val() == '2'){
        $('.dpercentage').show();
        $('.damount').hide();
    }
    if($(this).val() == '1'){
        $('.dpercentage').hide();
        $('.damount').show();
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

var coupon_state = false;
$('#coupon_name').on('blur', function() {
    var coupon_name = $('#coupon_name').val();
    $.ajax({
        url: base_url + "cashier/Cashier/checkCoupon",
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
    if($('#coupon_name').val() == ''){
        $("#cname_err").html("Please enter Coupon Name").show();
        return false;
    }
    if(coupon_state == false){
        $("#cname_err").html("This Coupon Name is already exist").show();
        return false;
    }
    if($('#coupon_type').val() == '--Select Coupon Type--'){
        $("#ctype_err").html("Please Select Coupon Type").show();
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
        $("#combo_err").html("Please enter Combo Price").show();
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
    if($('#coupon_condition').val() != '--Select Condition--'){
      if($('#coupon_condition_price').val() == ''){
          $("#amt_err").html("Please enter Amount").show();
          return false;
      }
    }
    if($('#coupon_condition_price').val() != ''){
      if($('#coupon_condition').val() == '--Select Condition--'){
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
  if(coupon_state == true){
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/add_coupon",
        data: $('.add-coupon').serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#btnSave').attr('disabled', true);
        },
        success: function(data){
          swal({
              title: "Success!",
              text: "Coupon created successfully!",
              icon: "success",
              buttons: false,
          });
          setTimeout( function (){
                window.location = base_url + "cashier/coupon";
          },2300);
        },
    });
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
     if($('#coupon_type').val() == '9'){
      if($('#category_name').val() == ''){
        $("#pname_err").html("Please enter Category Name").show();
        return false;
      }else{
        $("#pcat_err").html("").show();
      }
    }
     if($('#coupon_type').val() == '10'){
      if($('#brand_name').val() == ''){
        $("#pname_err").html("Please enter Brand Name").show();
        return false;
      }else{
        $("#pbrand_err").html("").show();
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
        $("#combo_err").html("Please enter Product Combo Price").show();
        return false;
      }else{
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
