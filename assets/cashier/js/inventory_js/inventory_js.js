    $(document).ready(function() {
        var oTable = $('#tbl_inventory').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "autoWidth": true,
            "bLengthChange": false,
            "responsive": true,
            "scrollY": "400px",
            "scrollCollapse": true,
            "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    // "targets": 0,
                    // "targets": [-1,-8]
                   //"targets": [-1,-9]  //16-01-2022
                    "targets": [-1,-10]
                },
                {
                    "className": "dt-center",
                    "targets": [0, -4, -3, -2, -1]
                }
            ],
            "order": [
                [1, 'asc']
            ],
            "ajax": base_url + "cashier/inventorydatalist",
            "initComplete": function(settings, json) {
                $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
                // Keyboard.init('full');
                // $("#read_barcode").focus();
            },
        });

    $("div.dataTables_filter input").keyup( function (e) {
        oTable.fnFilter( this.value );
    });

    $(document).on('click','.keyboard__key',function() {
        oTable.fnFilter($("div.dataTables_filter input").val());
    });

    $(document).on('click','body',function(e) {
        var container = $(".keyboard");
        if (!container.is(e.target) && container.has(e.target).length === 0){
            if (!$("div.dataTables_filter input").is(":focus")) {
                // Keyboard.close();
            }
        } else {
            console.log("Inerrrrr");
        }
    });

    jQuery(document).on("focus", "#read_barcode", function(e) {
        $('#tbl_inventory_filter input').val('');
        oTable.fnFilter('');

    });

    jQuery(document).on("keypress", "#read_barcode", function(e) {
        if (e.which == 13) {
            var barcode = $("#read_barcode").val();
            if (barcode != '') {
                jQuery.ajax({
                    type: "POST",
                    dataType: "json",
                    url: base_url + "cashier/scanUPC",
                    data: {barcode: barcode}
                }).done(function(data) {
                    console.log(data);
                    if (data.success == 'yes') {
                        if (data.products[0].status == 'update') {
                            oTable.fnFilter(barcode);
                            $('#read_barcode').focusout();
                        } else {
                            $('#product_name').val(data.products[0].product_name);
                            $('#nickname').val(data.products[0].product_name);
                            $('#brand').val(JSON.stringify(data.products[0].brand));
                            $('#details').val(data.products[0].description);
                            $('#quantity').val(data.products[0].package_quantity);
                            $('#brand').val(data.products[0].brand);
                            $('#size').val(data.products[0].size);
                            $('#unit').val(data.products[0].unit);
                            $('#details').val(data.products[0].product_details);
                            $('#tilte').val(data.products[0].meta_title);
                            $('#Meta_Key').val(data.products[0].meta_key);
                            $('#Description').val(data.products[0].meta_description);

                            $('#abv').val(data.products[0].abv);
                            $('#proof').val(data.products[0].proof);
                            $('#region').val(data.products[0].region);

                            $('#supplier_price').val(data.products[0].supplier_price);
                            $('#store_sell_price').val(data.products[0].store_sell_price);
                            $('#ecommerce_sell_price').val(data.products[0].ecomm_sell_price);

                            $("#category").val(data.products[0].category_id);
                            $('#producer').val(data.products[0].manufacturer);
                            $('#product-img').attr('src', data.products[0].images[0]);
                            $('#product_hidden_img').val(data.products[0].images[0]);
                            $('#barcode_formats').val(data.products[0].barcode_formats);
                            $('#case_upc').val(data.products[0].barcode_number);
                            $('#barcode_type').val(data.products[0].barcode_type);
                            $('#mpn').val(data.products[0].mpn);
                            $('#barcode_json').val(JSON.stringify(data));
                            $("#upc_form").submit();
                        }
                    } else {
                        swal({
                                title: "Oops!",
                                text: "Product not found!",
                                icon: "warning",
                                buttons: {
                                    catch: {
                                        text: "Add Product",
                                        value: "catch",
                                    },
                                    cancel: "Cancel",
                                },
                            })
                            .then((value) => {
                                switch (value) {
                                    case "catch":
                                        window.location.href = base_url + "cashier/inventoryadd?upc=" + barcode;
                                        break;
                                    default:
                                    //   $("#read_barcode").focus();
                                }
                            });
                    }
                    $("#read_barcode").val('');
                });
            }
        }
    });
});

$('.print_labeles').click(function() {
    if ($(this).is(':checked')) {
        $(this).closest('tr').addClass('removeRow');
    } else {
        $(this).closest('tr').removeClass('removeRow');
    }
});

$('#delete_all2').click(function() {
    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
        var checkbox_value = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
        });
        if(checkbox.length > 1){
         var msg = 'these '+ checkbox.length+ ' products';
         var msg2 = 'Products are';
        }else{
          var msg = 'this '+ checkbox.length+ ' product';
          var msg2 = 'Product is';
        }

        swal({
            text: "Are you sure you want to delete "+msg+"?",
            buttons: ["Cancel", true],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: base_url + "cashier/deleteproduct",
                    method: "POST",
                    data: {
                        checkbox_value: checkbox_value
                    },
                    success: function() {
                      swal({
                          title: "Success!",
                          text: msg2+" deleted successfully!",
                          icon: "success",
                          buttons: false,
                      });
                      setTimeout( function (){
                            location.reload();
                      },2000);
                    }
                })
            }else{
                $('.delete_checkbox').prop('checked', false);
                $('.select_all').prop('checked', false);
            }

        });

    } else {
        swal({
            title: "Oops!",
            text: "Select atleast one product!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
    }
});

$('#refresh').click(function() {
    $('.delete_checkbox').prop('checked', false); // Unchecks it
    location.reload(); //added 10jan
});

$("document").ready(function() {
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
});

$("document").ready(function() {
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

 $('#product_upc_label').on('click',function(){
    var checkbox = $('.print_labeles:checked');
    if (checkbox.length > 0) {
        $('#f1Sub').modal('show');
    }else {
        swal({
            title: "Oops!",
            text: "Select atleast one product!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
    setTimeout( function (){
        },1300);
    }
});


$('#selectLabel').on('click',function(){
    var checkbox = $('.print_labeles:checked');
    var checkbox_value = [];
    $(checkbox).each(function() {
        checkbox_value.push($(this).val());
    });

    var bp_id =  $('#arrw_loop').val();
    if(bp_id == '0'){
    var lbl_id = 1;
    }else{
    var lbl_id = bp_id;
    }
    $.ajax({
        url: base_url + "cashier/print_product_UPC",
        method: "POST",
        dataType: 'json',
        data: {
            checkbox_value: checkbox_value,bp_id:lbl_id,
        },
        success: function(data) {
         var option_list = '';
         $.each(data.data, function(index,value) {
          console.log(value);
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

$('#close_button').on('click',function(){
    $('.print_labeles').prop('checked', false);
});

 $('#close_button1').on('click',function(){
     $('.print_labeles').prop('checked', false);
 });

 $('#close_button2').on('click',function(){
    $('.print_labeles').prop('checked', false);
    $('.delete_checkbox').prop('checked', false);
 });

$('#close_button3').on('click',function(){
    $('.print_labeles').prop('checked', false);
    $('.delete_checkbox').prop('checked', false);
});

$(document).on("click", ".print_lables_pr", function (e) {
    var label_id = $('#label_id').text();
    var number_of_prints = $('#enter_number_of_labels').val();
        if(number_of_prints == ''){
        $("#num_lab_err").html("Please enter number of label").show();
           return false;
        }else if(number_of_prints == 0){
             $("#num_lab_err").html("Please enter number of label").show();
             $("#enter_number_of_labels" ).val(' ');
             $("#enter_number_of_labels" ).focus();
            return false;
        }

        var checkbox1 = $('.delete_checkbox:checked');
        if (checkbox1.length > 0) {
            var checkbox_value1 = [];
            $(checkbox1).each(function() {
                checkbox_value1.push($(this).val());
            });
        doPrintLabels(label_id,checkbox_value1,number_of_prints);
    }
});

$('.inputfile6').bind('change', function() {
    if ($('#enter_number_of_labels').val() == '' || $('#enter_number_of_labels').val() == 0) {
        $("#num_lab_err").html("Please enter number of labels").show();
        return false;
    } else {
        $("#num_lab_err").html("").show();
    }
});

function doPrintLabels(label_id,checkbox_value1,number_of_prints) {
    $.ajax({
      type: "POST",
      url: base_url + "cashier/print_labels",
      dataType: "html",
      async: false,
      data: {
                label_id: label_id, checkbox_value:checkbox_value1,number_of_prints:number_of_prints,
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

$('#bleave6').on('click', function(){
   $('#f1S').modal('hide');
   $('#f1Sub').modal('show');
   $('#enter_number_of_labels').val(' ');
});

jQuery(document).on("keypress", "#replicate_barcode", function(e) {
    if (e.which == 13) {
        var barcode = $("#replicate_barcode").val();
        var product_id = $('#proID').val();
        if (barcode != '') {
            jQuery.ajax({
                type: "POST",
                dataType: "json",
                url: base_url + "cashier/scanUPC",
                data: {barcode: barcode
                }
            }).done(function(data) {

                console.log(data)
                if(data.success == 'no'){
                  var result = '';
                }else{
                  var result = data.products[0].from;
                }
                if(result != 'api' && data.success == 'yes'){
                  swal({
                      title: "Oops!",
                      text: "This UPC already exist!",
                      icon: "error",
                      buttons: false,
                      timer: 2000
                  });
                    location.reload();
                }
                if(result == 'api' || data.success == 'no'){
                  window.location.href = base_url + "cashier/inventoryadd?upc=" + barcode + "&replicate_id=" +product_id;

                  $("#replicate_barcode").val('');
                  $('#tbl_inventory_filter input').focus();
                }
            });
        }
    }
});


jQuery(document).on("click", ".replicate_submit", function (e) {
    var barcode = $("#replicate_barcode").val();
    var product_id = $('#proID').val();
    if(barcode == ''){
        $("#bar_err").html("Please enter UPC or Scan Barcode").show();
        $("#replicate_barcode").focus();
        return false;
    }
    if (barcode != '') {
        jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: base_url + "cashier/scanUPC",
            data: {barcode: barcode
            }
        }).done(function(data) {
            console.log(data)
            if(data.success == 'no'){
              var result = '';
            }else{
              var result = data.products[0].from;
              $("#replicate_product_name").val(data.products[0].product);
            }
            if(result != 'api' && data.success == 'yes'){
              swal({
                  title: "Oops!",
                  text: "This UPC already exist!",
                  icon: "error",
                  buttons: false,
                  timer: 2000
              });
                location.reload();
            }
            if(result == 'api' || data.success == 'no'){
              window.location.href = base_url + "cashier/inventoryadd?upc=" + barcode + "&replicate_id=" +product_id;
              $("#replicate_barcode").val('');
            }
        });
    }
});

$('#replicate_barcode').bind('change', function() {
    if($(this).val() == ''){
      $("#bar_err").html("Please enter UPC or Scan Barcode").show();
      $("#replicate_barcode").focus();
      return false;
    }else{
      $("#bar_err").html("").show();
    }
});

$('.select_all').on('click', function() {
    if(this.checked){
      $("input[type='checkbox']").each(function(){
        this.checked = true;
      });
    }else{
      $("input[type='checkbox']").each(function(){
        this.checked = false;
      });
    }
    // $('.delete_checkbox').attr('checked', this.checked);
});

jQuery(document).on("click", ".replicatePro", function (e) {
    var product_id = $(this).attr('data-id');
    $('#proID').val(product_id);
    $('#replicate_barcode').focus();
    $('#replicate_barcode').val('');
});

jQuery(document).on("click", ".close", function (e) {
    $('#replicate_barcode').blur();
    // $('#read_barcode').focus();
    $('.cancelkeeb').trigger('click');
});

jQuery(document).on("click", ".keyboard__key", function (e) {
    if($(this).text() == 'enter'){
        if($('#read_barcode').val() != ''){
        //   KeyboardNum.close();
          var barcode = $("#read_barcode").val();
          if (barcode != '') {
              jQuery.ajax({
                  type: "POST",
                  dataType: "json",
                  url: base_url + "cashier/scanUPC",
                  data: {barcode: barcode  }
              }).done(function(data) {
                  console.log(data);
                  if (data.success == 'yes') {
                      if (data.products[0].status == 'update') {
                          oTable.fnFilter(barcode);
                      } else {
                          $('#product_name').val(data.products[0].product_name);
                          $('#nickname').val(data.products[0].product_name);
                          $('#brand').val(JSON.stringify(data.products[0].brand));
                          $('#details').val(data.products[0].description);
                          $('#quantity').val(data.products[0].package_quantity);
                          $('#brand').val(data.products[0].brand);
                          $('#size').val(data.products[0].size);
                          $('#unit').val(data.products[0].unit);
                          $('#details').val(data.products[0].product_details);
                          $('#tilte').val(data.products[0].meta_title);
                          $('#Meta_Key').val(data.products[0].meta_key);
                          $('#Description').val(data.products[0].meta_description);
                          $('#abv').val(data.products[0].abv);
                          $('#proof').val(data.products[0].proof);
                          $('#region').val(data.products[0].region);
                          $('#supplier_price').val(data.products[0].supplier_price);
                          $('#store_sell_price').val(data.products[0].store_sell_price);
                          $('#ecommerce_sell_price').val(data.products[0].ecomm_sell_price);
                          $("#category").val(data.products[0].category_id);
                          $('#producer').val(data.products[0].manufacturer);
                          $('#product-img').attr('src', data.products[0].images[0]);
                          $('#product_hidden_img').val(data.products[0].images[0]);
                          $('#barcode_formats').val(data.products[0].barcode_formats);
                          $('#case_upc').val(data.products[0].barcode_number);
                          $('#barcode_type').val(data.products[0].barcode_type);
                          $('#mpn').val(data.products[0].mpn);
                          $('#barcode_json').val(JSON.stringify(data));
                          $("#upc_form").submit();
                      }
                  } else {
                      swal({
                              title: "Oops!",
                              text: "Product not found!",
                              icon: "warning",
                              buttons: {
                                  catch: {
                                      text: "Add Product",
                                      value: "catch",
                                  },
                                  cancel: "Cancel",
                              },
                          })
                          .then((value) => {
                              switch (value) {
                                  case "catch":
                                      window.location.href = base_url + "cashier/inventoryadd?upc=" + barcode;
                                      break;
                                  default:
                                    $("#read_barcode").focus();
                              }
                          });
                  }
                  $("#read_barcode").val('');
              });
          }
        }
    }
});

jQuery(document).on("click", "#keyBoard_on", function (e) {
    // Keyboard.open();
    // $('#read_barcode').focus();
});
//code for outside modal click
document.addEventListener('click',  function (e) {
    if(e.target.className === 'modal'){
        $('#replicate_barcode').blur();
        $('#read_barcode').focus();
        $('.cancelkeeb').trigger('click');
    }
}, false);

$('#reorder_all2').click(function() {
    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
      $('#reorder_level_modal').modal();
      $('#reorderLevel').val('');
      $('#ro_err').html('');
    }else{
        swal({
            title: "Oops!",
            text: "Select atleast one product!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
    }
});

$('.clearReorder').click(function() {
    $('#refresh').trigger('click');
});

$('#reorder_submit').click(function() {
    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
        var checkbox_value = [];
        var qty_inventory = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
            qty_inventory.push($(this).closest('tr').find('td:eq(5)').text());
        });
    }
    if($('#reorderLevel').val() == '' || $('#reorderLevel').val() == 0){
        $('#ro_err').html('Please enter Product Reorder Level').show();
        return false;
    }

    $.ajax({
        url: base_url + "cashier/Cashier/reorder_product",
        method: "POST",
        data: {qty_inventory: qty_inventory, checkbox_value: checkbox_value , reorder_level : $('#reorderLevel').val()},
        beforeSend: function(){
            $("#overlay,.loader").show();
        },
        success: function(data) {
          $("#overlay,.loader").hide();
          $('#reorder_level_modal').modal('hide');
          if(data){
              swal({
                  title: 'Success!',
                  text: "Reorder level updated successfully!",
                  icon: "success",
                  buttons: false,
              });
              setTimeout( function (){
                location.reload();
              },2500);
          }
        }
    });
    return false;
});

$('#reorderLevel').bind('change', function() {
    if ($(this).val() == '' || $(this).val()== 0) {
        $('#ro_err').html('Please enter Product Reorder Level').show();
        return false;
    }else{
        $("#ro_err").html("").show();
    }
});

$(document).ready(function(){
  $('#exampleModalCenter22').on('show', function () {
    $('input:text:visible:first').focus();
  });
});

$(document).on('click','.editable', function(){
  var span_id = $(this).attr('id');
  var upc_no = $(this).closest('tr').find('td:eq(3)').text();
  var id = span_id.slice(9);
  $(this).hide();

  $("#editable_price_"+id).attr('type','tel');
  // $("#editable_price_"+id).focus();
});


$(document).on('blur','.edit_price', function(){
    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
        var checkbox_value = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
        });
    }

    var span_id = $(this).attr('id');
    var id = span_id.slice(15);
    var upc_no = $(this).closest('tr').find('td:eq(3)').text();
    var supplier_price = $(this).closest('tr').find('td:eq(6)').text();
    var old_prc = $('#editable_'+id).text();

    var new_price = $(this).val();
    if (new_price == "" || new_price == 0) {
      $(this).css({"border-color": "red", "border-width": "2px", "border-style": "solid"});
      return false;
    }
    if(parseFloat(supplier_price) >= parseFloat(new_price)){
        $(this).css({"border-color": "red", "border-width": "2px", "border-style": "solid"});
        return false;
    }


    if(checkbox.length > 1){
       var msg = 'these products?';
       var msg2 = 'Products';
    }else{
        var msg = 'this product?';
        var msg2 = 'Product';
    }

    swal({
        text: "Are you sure you want to update retail price for "+msg,
        buttons: ["Cancel", true],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
              type: "ajax",
              method: "post",
              url: base_url + "cashier/update_onsale_price",
              data: {case_UPC : upc_no, onsale_price : new_price, checkbox_value: checkbox_value },
              dataType: "json",
              beforeSend: function(){
                  $("#overlay,.loader").show();
              },
              success: function (data) {
                  $("#overlay,.loader").hide();
                  if(data){
                      swal({
                          title: 'Success!',
                          text: "Retail price updated successfully!",
                          icon: "success",
                          buttons: false,
                          // timer:2000,
                      });

                      setTimeout( function (){
                        location.reload();
                      },2000);
                  }
              }
            })
          }else{
                $("#editable_price_"+id).attr('type','hidden');
                $("#editable_price_"+id).val(old_prc);
                $("#editable_"+id).show();
                $('.delete_checkbox').prop('checked', false);
                $('.select_all').prop('checked', false);
          }
    });
});


$(document).on('click','.editable_supplier', function(){
  var span_id = $(this).attr('id');
  var upc_no = $(this).closest('tr').find('td:eq(3)').text();
  var id = span_id.slice(11);
  $(this).hide();
  $("#editable_sprice_"+id).attr('type','tel');
  // $("#editable_price_"+id).focus();
});


$(document).on('blur','.edit_sprice', function(){
    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
        var checkbox_value = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
        });
    }

    var span_id = $(this).attr('id');
    var id = span_id.slice(16);
    var upc_no = $(this).closest('tr').find('td:eq(3)').text();
    var retail_price = $(this).closest('tr').find('td:eq(7)').text();
    var new_price = $(this).val();
    var old_prc = $('#editable_s_'+id).text();

    if (new_price == "" || new_price == 0) {
      $(this).css({"border-color": "red", "border-width": "2px", "border-style": "solid"});
      return false;
    }
    if(parseFloat(retail_price) <= parseFloat(new_price)){
        $(this).css({"border-color": "red", "border-width": "2px", "border-style": "solid"});
        return false;
    }

    if(checkbox.length > 1){
       var msg = 'these products?';
       var msg2 = 'Products';
    }else{
        var msg = 'this product?';
        var msg2 = 'Product';
    }

      swal({
          text: "Are you sure you want to update supplier price for "+msg,
          buttons: ["Cancel", true],
          dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
              $.ajax({
                type: "ajax",
                method: "post",
                url: base_url + "cashier/update_supplier_price",
                data: {case_UPC : upc_no, supplier_price : new_price, checkbox_value: checkbox_value },
                dataType: "json",
                beforeSend: function(){
                    $("#overlay,.loader").show();
                },
                success: function (data) {
                    $("#overlay,.loader").hide();
                    if(data){
                        swal({
                            title: 'Success!',
                            text: "Supplier price updated successfully!",
                            icon: "success",
                            buttons: false,
                            // timer:2000,
                        });

                        setTimeout( function (){
                          location.reload();
                        },2000);
                    }
                }
              })
            }else{
                  $("#editable_sprice_"+id).attr('type','hidden');
                  $("#editable_sprice_"+id).val(old_prc);
                  $("#editable_s_"+id).show();
                  $('.delete_checkbox').prop('checked', false);
                  $('.select_all').prop('checked', false);
            }
      });
});

$(document).on('click','.editable_promotion', function(){
    var span_id = $(this).attr('id');
    var upc_no = $(this).closest('tr').find('td:eq(3)').text();
    var id = span_id.slice(12);
    $(this).hide();
    $("#editable_sp_price_"+id).attr('type','tel');
  // $("#editable_price_"+id).focus();
});


$(document).on('blur','.edit_sp_price', function(){
    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
        var checkbox_value = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
        });
    }

    var span_id = $(this).attr('id');
    var id = span_id.slice(18);
    var upc_no = $(this).closest('tr').find('td:eq(3)').text();
    var retail_price = $(this).closest('tr').find('td:eq(7)').text();
    var new_price = $(this).val();

    var old_prc = $('#editable_sp_'+id).text();

      if (new_price == "" || new_price == 0) {
        $(this).css({"border-color": "red", "border-width": "2px", "border-style": "solid"});
        return false;
      }
      if(parseFloat(retail_price) <= parseFloat(new_price)){
          $(this).css({"border-color": "red", "border-width": "2px", "border-style": "solid"});
          return false;
      }

      if(checkbox.length > 1){
         var msg = 'these products?';
         var msg2 = 'Products';
      }else{
          var msg = 'this product?';
          var msg2 = 'Product';
      }

      swal({
          text: "Are you sure you want to update store promotion price for "+msg,
          buttons: ["Cancel", true],
          dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
              $.ajax({
                type: "ajax",
                method: "post",
                url: base_url + "cashier/update_store_promotion_price",
                data: {case_UPC : upc_no, store_promotion_price : new_price, checkbox_value: checkbox_value },
                dataType: "json",
                beforeSend: function(){
                    $("#overlay,.loader").show();
                },
                success: function (data) {
                    $("#overlay,.loader").hide();
                    if(data){
                        swal({
                            title: 'Success!',
                            text: "Store promotion price updated successfully!",
                            icon: "success",
                            buttons: false,
                            // timer:2000,
                        });

                        setTimeout( function (){
                          location.reload();
                        },2000);
                    }
                }
              })
            }else{
                  $("#editable_sp_price_"+id).attr('type','hidden');
                  $("#editable_sp_price_"+id).val(old_prc);
                  $("#editable_sp_"+id).show();
                  $('.delete_checkbox').prop('checked', false);
                  $('.select_all').prop('checked', false);
            }
      });
});

$(document).on('click','.editable_qty', function(){
  var span_id = $(this).attr('id');
  var upc_no = $(this).closest('tr').find('td:eq(3)').text();
  var id = span_id.slice(11);
  $(this).hide();
  $("#editable_qty_"+id).attr('type','tel');
});

$(document).on('blur','.edit_qty', function(){
    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
        var checkbox_value = [];
        var qty_inventory = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
        });
    }

    var span_id = $(this).attr('id');
    var id = span_id.slice(13);
    var upc_no = $(this).closest('tr').find('td:eq(3)').text();
    var old_qty = $('#editable_q_'+id).text();
    var new_qty = $(this).val();
    if (new_qty == "" || new_qty == 0) {
      $(this).css({"border-color": "red", "border-width": "2px", "border-style": "solid"});
      return false;
    }

    if(checkbox.length > 1){
     var msg = 'these products?';
     var msg2 = 'Products';
    }else{
      var msg = 'this product?';
      var msg2 = 'Product';
    }

    swal({
        text: "Are you sure you want to update quantity for "+msg,
        buttons: ["Cancel", true],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "ajax",
            method: "post",
            url: base_url + "cashier/update_qty",
            data: {case_UPC : upc_no, quantity : new_qty, checkbox_value: checkbox_value },
            dataType: "json",
            beforeSend: function(){
                $("#overlay,.loader").show();
            },
            success: function (data) {
                $("#overlay,.loader").hide();
                if(data){
                    swal({
                        title: 'Success!',
                        text: msg2+" quantity updated successfully!",
                        icon: "success",
                        buttons: false,
                        // timer:2000,
                    });
                    setTimeout( function (){
                      location.reload();
                    },2000);

                }
              }
            })
        }else{
            $("#editable_qty_"+id).attr('type','hidden');
            $("#editable_qty_"+id).val(old_qty);
            $("#editable_q_"+id).show();
            $('.delete_checkbox').prop('checked', false);
            $('.select_all').prop('checked', false);
        }

    });

});

$(document).on('click','.editable_supplier', function(){
  var span_id = $(this).attr('id');
  var upc_no = $(this).closest('tr').find('td:eq(3)').text();
  var id = span_id.slice(10);
  // $(this).hide();
  $("#edit_supp_"+id).hide();
  $("#sel_supp_"+id).css("display", "block");
  var recent_name = $("#sel_supp_"+id).val();

  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/get_all_supplier",
    data: { recent_name : recent_name },
    dataType: "json",
    success: function (data) {
        console.log(data);
        $("#sel_supp_"+id).html(data);
    },
  });
  return false;
  // get_suppliers(id);
});

$(document).on("change", '.changeSupplier', function () {
    var span_id = $(this).attr('id');
    var upc_no = $(this).closest('tr').find('td:eq(3)').text();
    var id = span_id.slice(9);
    var supplier_name = $(this).val();
    var recent_name = $("#edit_supp_"+id).text();

    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
        var checkbox_value = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
        });
    }

    if(checkbox.length > 1){
       var msg = 'these products?';
       var msg2 = 'Products';
    }else{
        var msg = 'this product?';
        var msg2 = 'Product';
    }

    swal({
        text: "Are you sure you want to update supplier for "+msg,
        buttons: ["Cancel", true],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
              type: "ajax",
              method: "post",
              url: base_url + "cashier/Cashier/update_onchange_supplier",
              data: { case_UPC : upc_no, supplier_name :  supplier_name, checkbox_value: checkbox_value},
              dataType: "json",
              beforeSend: function(){
                  $("#overlay,.loader").show();
              },
              success: function (data) {
                $("#overlay,.loader").hide();
                if(data){
                    swal({
                        title: 'Success!',
                        text: "Supplier updated successfully!",
                        icon: "success",
                        buttons: false,
                        // timer:2000,
                    });
                    setTimeout( function (){
                      location.reload();
                    },2000);

                }

              }
            })
          }else{

              $("#sel_supp_"+id).css("display", "none");
              $("#sel_supp_"+id).val(recent_name);
              // $('#sel_supp_'+id+' option[value="'+recent_name+'"]').prop("selected", true);
              $("#edit_supp_"+id).show();
              $('.delete_checkbox').prop('checked', false);
              $('.select_all').prop('checked', false);
          }
    });
});


$(document).change('.delete_checkbox',function() {
  var checkbox = $('.delete_checkbox:checked');
  if (checkbox.length < 10 ) {
    $('.select_all').prop('checked', false);
  }else{
    $('.select_all').prop('checked', true);
  }
});
