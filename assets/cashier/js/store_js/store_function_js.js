$('.sli-r').on('click',function(){
    if(currentTemplate>=MaxTemplates){
        return
    }else{
        currentTemplate = currentTemplate + 1;
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

$('.sidebar a').click(function(){
  var id = $(this).attr('id');
  $('.sidebar a').removeClass('active');
  $('.sidebar span').removeClass('active');
  $(this).addClass('active');
  $('.customcard .toggle_div').hide();
  $('#div_'+id).show();
});

$('.sidebar span').click(function(){
  $('.sidebar a').removeClass('active');
  $('.sidebar span').removeClass('active');
  $(this).addClass('active');
});

$("#multi").on("input change",function(){
    $('div,body,input,span,h6,textarea, #pay_date,#custom_msg1,.formheader, .customcardheader p,.customcardlabel,.btn,.table,.w-100, th, td').css("font-size",$(this).val() + "px");
});


jQuery(document).on("click", ".open_popup", function() {
  var id = $(this).attr('id').replace('custom_', '');
  var name = $(this).attr('data-name');
  var value = $(this).attr('data-value');
  var is_taxable = $(this).attr('data-is_taxable');
  $('#customkey_id_val').val(id);
  $('#customkey_name_txt').val(name);
  $('#customkey_value_txt').val(value);
  if (is_taxable == 1) {
    $('#taxBoolean').attr('checked', true);
  }else{
    $('#taxBoolean').attr('checked', false);
  }
  $('#customeKEY').modal();
});

jQuery(document).on("click", ".open_discount_percentage", function() {
 var id = $(this).attr('id').replace('discount_', '');
 var name = $(this).attr('data-name');
 var value = $(this).attr('data-value');
 var subtotal = $(this).attr('data-subtotal');
 $('#discount_id_val').val(id);
 $('#discount_key_name_txt').val(name);
 $('#discount_key_value_txt').val(value);
 $('#min_order_total').val(subtotal);
 $('#discount_percent_key').modal();
});

jQuery(document).on("click", ".open_discount_amount", function() {
 var id = $(this).attr('id').replace('discount_', '');
 var name = $(this).attr('data-name');
 var value = $(this).attr('data-value');
 var subtotal = $(this).attr('data-subtotal');
 $('#discount_id_val').val(id);
 $('#discount_key_name_txt').val(name);
 $('#discount_key_value_txt').val(value);
 $('#min_order_total').val(subtotal);
 $('#discount_percent_key').modal();
});

$('#btnDiscount').click(function(){
    // alert($('#min_order_total').val());
   if($('#discount_key_name_txt').val() == ''){
     $('#kname_err1').html('Please enter discount key name').show();
     return false;
   }
   if($('#discount_key_value_txt').val() == ''){
     $('#kvalue_err1').html('Please enter discount key value').show();
     return false;
   }

   if($('#min_order_total').val() <= 0 || $('#min_order_total').val() == ''){
     $('#min_err').html('Please enter minimum order total amount').show();
     return false;
   }

   $.ajax({
     type: 'ajax',
     method: 'post',
     url: base_url + "cashier/Cashier/update_discount_key_setting",
     data: $('.discount-key').serialize(),
     dataType: 'json',
     beforeSend: function(){
         $("#overlay,.loader").show();
     },
     success: function(data) {
       $("#overlay,.loader").hide();
       $('#discount_percent_key').modal('hide');
       if(data.status == 'update'){
         swal({
           title: "Success!",
           text: "Discount key updated successfully!",
           icon: "success",
           buttons: false,
           timer: 2500
         });
         $("#discount_" + data.id).text(data.name);
         $("#discount_" + data.id).attr('data-name',data.name);
         $("#discount_" + data.id).attr('data-value',data.value);
         $("#discount_" + data.id).attr('data-subtotal',data.subtotal);
       }
       if(data.status == 'insert'){
         swal({
           title: "Success!",
           text: "Discount key inserted successfully!",
           icon: "success",
           buttons: false,
           timer: 2500
         });
         setTimeout( function (){
           window.location = base_url + "cashier/settings?d=discount_percent";
         },2500);
       }
       if(data.status == 'already_exist'){
           swal({
             title: "Oops!",
             text: data.err_name,
             icon: "error",
             buttons: false,
             timer: 2500
           });
        }
      },
   });
  return false;
});

$('.inputFile27').bind('change', function() {
   if($('#discount_key_name_txt').val() == ''){
     $('#kname_err1').html('Please enter discount key name').show();
     return false;
   }else{
     $('#kname_err1').html('').show();
   }
   if($('#discount_key_value_txt').val() == ''){
     $('#kvalue_err1').html('Please enter discount key value').show();
     return false;
   }else{
     $('#kvalue_err1').html('').show();
   }

   if($('#min_order_total').val() <= 0 || $('#min_order_total').val() == ''){
     $('#min_err').html('Please enter minimum order total amount').show();
     return false;
   }else{
     $('#min_err').html('').show();
   }
});

$('.clear_discount').click(function(){
   var discount_id = $(this).attr('id').replace('clear_discount_','');
   swal({
         text: "Are you sure you want to delete this discount key?",
         buttons: ["Cancel", true],
         dangerMode: true,
     }).then((willDelete) => {
       if (willDelete) {
           $.ajax({
               url: base_url + "cashier/Cashier/remove_discount_key",
               method: "POST",
               data: {discount_id: discount_id},
               dataType: 'json',
               success: function(data) {
                 swal({
                     title: "Success!",
                     text: "Discount key deleted successfully!",
                     icon: "success",
                     buttons: false,
                     timer: 2500
                 });
                 if(data.status == 'delete'){
                     $("#discount_" + data.id).text('Discount Key');
                     $("#discount_" + data.id).attr('data-name',data.name);
                     $("#discount_" + data.id).attr('data-value',data.value);
                     $("#discount_" + data.id).attr('data-subtotal',data.subtotal);
                 }
              }
           })
       }
   });
});

$('.clear_amount').click(function(){
  var discount_id = $(this).attr('id').replace('clear_amount_','');
  swal({
        text: "Are you sure you want to delete this discount key?",
        buttons: ["Cancel", true],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: base_url + "cashier/Cashier/remove_discount_key",
                method: "POST",
                data: {discount_id: discount_id},
                dataType: 'json',
                success: function(data) {
                  swal({
                      title: "Success!",
                      text: "Discount key deleted successfully!",
                      icon: "success",
                      buttons: false,
                      timer: 2500
                  });
                  if(data.status == 'delete'){
                      $("#discount_" + data.id).text('Discount Key');
                      $("#discount_" + data.id).attr('data-name',data.name);
                      $("#discount_" + data.id).attr('data-value',data.value);
                  }
               }
            })
        }
    });
});

$(document).on("click", ".by_amount", function() {
  $('#discount_key_type').val(1);
  $('.by_amount').css({"background":"#4caf50","border-color":"#4caf50","color": "#ffffff"});
  $('.by_percentage').css({"background":"#E4E4E4","border-color":"#E4E4E4","color": "#000000"});
  $('.AMOUNT_By,#dollar_symbol').show();
    $('#dis_titile').text('Discount Amount: *');
  $('.PERCENTAGE_By').hide();
});

$(document).on("click", ".by_percentage", function() {
    $('#discount_key_type').val(0);
    $('.by_percentage').css({"background":"#4caf50","border-color":"#4caf50","color": "#ffffff"});
    $('.by_amount').css({"background":"#E4E4E4","border-color":"#E4E4E4","color": "#000000"});
    $('.AMOUNT_By,#dollar_symbol').hide();
    $('#dis_titile').text('Discount %: *');
    $('.PERCENTAGE_By').show();
});
