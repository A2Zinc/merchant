//only use datepicker
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
        // } //for loop end
    }
  });

  $j('.item-apend').on('click', '.removeNominee', function (e) {
     e.preventDefault();
     $j(this).parent().parent().remove(); //Remove field html
     x--; //Decrement field counter
  });

$( ".product_name" ).autocomplete({
  source: function( request, response ) {
        //var searchtxt = extractLast(request.term);
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
    $('.product_name').val(ui.item.label); // display the selected text
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
         data: {
           searchtxt: request.term
         },
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
  //single product use only
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

$(document).ready(function() {
   if($('#coupon_type').val() == '1'){
      $('.couname1').css('margin-left', '-14px'); //added
      $('.ctype1').css('margin-right', '-15px'); //added
      $('.product,.product2,.productqty,.category,.brand,.comboAMT').hide();
      $('.discountTYPE').show();
      if($('#discount_type').val() == 1) {
          $('.dpercentage').hide();
          $('.damounts').show();
      }if($('#discount_type').val() == 2){
        $('.dpercentage').show();
        $('.damounts').hide();
      }
  }
   if($('#coupon_type').val() == '3'){
        $('#adBTN,.product,.prdut,.category,.brand,.comboAMT').hide();
        $('.divPROD').addClass('col-md-12');
        $('.divPROD').removeClass('col-md-11');
        $('.productqty,.product2,.discountTYPE').show();
        $('.productqty').removeClass('col-md-12');
        $('.productqty').addClass('col-md-6');
        $('.applyType').removeClass('col-md-12');
        $('.applyType').addClass('col-md-6');
        //added
        if($('#discount_type').val() == 1) {
          $('.dpercentage').hide();
          $('.damounts').show();
        }if($('#discount_type').val() == 2){
          $('.dpercentage').show();
          $('.damounts').hide();
        }
   }
   if($('#coupon_type').val() == '8'){
        $('.discountTYPE,.damounts,.dpercentage,.category,.brand,.product2').hide();
        $('.productqty,.comboAMT,.product').show();
        $('.productqty').removeClass('col-md-6');
        $('.productqty').addClass('col-md-12');
        $('.applyType').removeClass('col-md-12');
        $('.applyType').addClass('col-md-6');
   }
   if($('#coupon_type').val() == '9'){
        $('.couname1').css('margin-left', '-14px'); //added
        $('.ctype1').css('margin-right', '-15px'); //added
        $('.coupDetails').removeClass('col-md-12');
        $('.coupDetails').addClass('col-md-6');
        $('.category,.discountTYPE').show();
        $('.product..product2,.productqty,.comboAMT,.brand').hide();//added
        if($('#discount_type').val() == 1) {
           $('.dpercentage').hide();
           $('.damounts').show();
        }if($('#discount_type').val() == 2){
           $('.dpercentage').show();
           $('.damounts').hide();
        }
    }
     if($('#coupon_type').val() == '10'){
        $('.couname1').css('margin-left', '-14px'); //added
        $('.ctype1').css('margin-right', '-15px'); //added
        $('.coupDetails').removeClass('col-md-12');
        $('.coupDetails').addClass('col-md-6');
        $('.brand,.discountTYPE').show();
        $('.product,.product2,.productqty,.comboAMT,.category').hide();//added

        if($('#discount_type').val() == 1) {
           $('.dpercentage').hide();
           $('.damounts').show();
        }if($('#discount_type').val() == 2){
           $('.dpercentage').show();
           $('.damounts').hide();
        }
    }
    if($('#coupon_apply_type').val() == '1'){
       $('#autoapply').val(0);
       $('#autoapply').attr('disabled',true);
    }

  $j( ".product_name" ).autocomplete({
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
        $j('.product_name').val(ui.item.label); // display the selected text
        $j('#product_id_select').val(ui.item.value); // save selected id to input
        return false;
      }
  });
});

$('#coupon_type').on('change', function() {
    $('.applyType').removeClass('col-md-12');
    $('.applyType').addClass('col-md-6');
    $('.coupDetails').removeClass('col-md-6');
    $('.coupDetails').addClass('col-md-12');
    if($(this).val() == '1'){
      $('.product,.productqty,.brand,.category,.comboAMT,.product2').hide();
      $('.discountTYPE').show();
      if($('#discount_type').val() == 1) {
          $('.dpercentage').hide();
          $('.damounts').show();
      }if($('#discount_type').val() == 2){
        $('.dpercentage').show();
        $('.damounts').hide();
      }
  }
    if($(this).val() == '3'){
        $('#adBTN,.prdut,.product,.comboAMT,.brand,.category').hide();
        $('.divPROD').removeClass('col-md-11');
        $('.divPROD').addClass('col-md-12');
        $('.productqty').removeClass('col-md-12');
        $('.productqty').addClass('col-md-6');
        $('.discountTYPE,.damounts,.product,.productqty,.product2').show();
        if($('#discount_type').val() == 1) {
            $('.dpercentage').hide();
            $('.damounts').show();
        }if($('#discount_type').val() == 2){
          $('.dpercentage').show();
          $('.damounts').hide();
        }
    }
    if($(this).val() == '8'){
        $('#adBTN,.comboAMT,.prdut,.product,.productqty').show();
        $('.divPROD').removeClass('col-md-12');
        $('.divPROD').addClass('col-md-11');
        $('.discountTYPE,.damounts,.dpercentage,.product2,.brand,.category').hide();
        $('.applyType').removeClass('col-md-12');
        $('.applyType').addClass('col-md-6');
        $('.coupDetails').removeClass('col-md-6');
        $('.coupDetails').addClass('col-md-12');
        $('.productqty').removeClass('col-md-6');
        $('.productqty').addClass('col-md-12');
    }
     if($(this).val() == '9'){
        $('.category,.discountTYPE').show();
        $('#brand_name').val('');
        $('.applyType').removeClass('col-md-12');
        $('.applyType').addClass('col-md-6');
        $('.coupDetails').removeClass('col-md-12');
        $('.coupDetails').addClass('col-md-6');
        $('.product2,.product,.productqty,.comboAMT,.brand').hide(); //added
        if($('#discount_type').val() == 1) {
            $('.dpercentage').hide();
            $('.damounts').show();
        }if($('#discount_type').val() == 2){
          $('.dpercentage').show();
          $('.damounts').hide();
        }
    }
     if($(this).val() == '10'){
        $('.brand,.discountTYPE').show();
        $('#category_name').val('');
        $('.applyType').removeClass('col-md-12');
        $('.applyType').addClass('col-md-6');
        $('.coupDetails').removeClass('col-md-12');
        $('.coupDetails').addClass('col-md-6');
        $('.category,.product2,.product,.productqty,.comboAMT').hide();//addded
        if($('#discount_type').val() == 1) {
            $('.dpercentage').hide();
            $('.damounts').show();
        }if($('#discount_type').val() == 2){
          $('.dpercentage').show();
          $('.damounts').hide();
        }
    }
});

$('#discount_type').on('change', function() {
    if($(this).val() == '2'){
        $('.dpercentage').show();
        $('.damounts').hide();
    }
    if($(this).val() == '1'){
        $('.dpercentage').hide();
        $('.damounts').show();
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
    var coupon_id = $('#couponID').val();
    $.ajax({
        url: base_url + "cashier/Cashier/checkExistCoupon",
        type:'post',
        data:{coupon_name:coupon_name, coupon_id : coupon_id},
        success:function(response){
          if (response == 'fail' ) {
            $('#coupon_name').addClass('couponerr');
            coupon_state = false;
            $("#cname_err").html("This Coupon Name is already exist").show();
          }else if (response == 'success') {
            coupon_state = true;
            $('#coupon_name').removeClass('couponerr');
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
    if($('#coupon_condition').val() != ''){
      if($('#coupon_condition_price').val() == '0.00'){
          $("#amt_err").html("Please enter Amount").show();
          return false;
      }
    }
    if($('#coupon_condition_price').val() != '0.00'){
      if($('#coupon_condition').val() == ''){
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
    if($('#coupon_name').hasClass('couponerr') == false ){
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: base_url + "cashier/update_coupon",
            data: $('.edit-coupon').serialize(),
            dataType: 'json',
            beforeSend: function(){
                $('#btnSave').attr('disabled', true);
            },
            success: function(data){
              swal({
                  title: "Success!",
                  text: "Coupon edited successfully!",
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
      if($('#combo_amount').val() == '0'){
        $("#combo_err").html("Please enter Combo Price").show();
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
    if($('#coupon_condition').val() != ''){
      if($('#coupon_condition_price').val() == '0.00'){
          $("#amt_err").html("Please enter Amount").show();
          return false;
      }else{
          $("#amt_err").html("").show();
      }
    }
    if($('#coupon_condition_price').val() != '0.00'){
      if($('#coupon_condition').val() == ''){
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
