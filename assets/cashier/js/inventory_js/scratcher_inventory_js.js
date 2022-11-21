$(document).ready(function() {
    $('#read_barcode1').focus();
});
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
                // "targets": [-1,-8]
                "targets": [-1,-9]
            },
            {
                "className": "dt-center",
                "targets": [0, -5, -4, -3, -2, -1]
            }
        ],
        "order": [
            [1, 'asc']
        ],
        "ajax": base_url + "cashier/scratcher_inventory_data_list",
        "initComplete": function(settings, json) {
            $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
            Keyboard.init('full');
            $("#read_barcode").focus();
        },

    });

    jQuery(document).on("focus", "#read_barcode1", function(e) {
        $('#tbl_inventory_filter input').val('');
        oTable.fnFilter('');
    });

    jQuery(document).on("keypress", "#read_barcode1", function(e) {
        if (e.which == 13) {
            var barcode = $("#read_barcode1").val();
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
                            $('#read_barcode1').focusout();
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
                            //$('#category').val();
                            $("#category").val(data.products[0].category_id);
                            $('#producer').val(data.products[0].manufacturer);
                            $('#product-img').attr('src', data.products[0].images[0]);
                            $('#product_hidden_img').val(data.products[0].images[0]);
                            //hidden value
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
                                text: "Scratcher not found!",
                                icon: "warning",
                                buttons: {
                                    catch: {
                                        text: "Add Scratcher",
                                        value: "catch",
                                    },
                                    cancel: "Cancel",
                                },
                            })
                            .then((value) => {
                                if($('#available_bins').val() == ''){
                                    swal({
                                        title: "Oops!",
                                        text: "Sorry, no bin available!",
                                        icon: "error",
                                        buttons: false,
                                        timer: 2000,
                                    });
                                }else{
                                  switch (value) {
                                      case "catch":
                                          window.location.href = base_url + "cashier/scratcher_inventory_add?upc=" + barcode;
                                          break;
                                      default:
                                  }
                                }
                            });
                    }
                    $("#read_barcode1").val('');
                });
            }
        }
    });
});

$('.delete_checkbox').click(function() {
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
         var msg = 'these scratchers';
         var msg2 = 'Scratchers are';
        }else{
          var msg = 'this scratcher';
          var msg2 = 'Scratcher is';
        }
        swal({
            text: "Are you sure you want to delete "+msg+"?",
            buttons: ["Cancel", true],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: base_url + "cashier/scratcher_inventory_delete_product",
                    method: "POST",
                    data: {
                        checkbox_value: checkbox_value
                    },
                    success: function() {
                        swal({
                            title: "Success!",
                            text: msg2+" successfully deleted!",
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
            }
        });
    } else {
        swal({
            title: "Oops!",
            text: "Select atleast one scratcher!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
    }
});

$('#refresh').click(function() {
    $('.delete_checkbox').prop('checked', false); // Unchecks it
});

$("document").ready(function() {
    let currentTemplate = 1;
    let MaxTemplates = $('.template').length;
    $('.template').hide();
    $('#bp'+currentTemplate).show();
    $('.sli-r').on('click',function(){
        if(currentTemplate>=MaxTemplates){
            return
        }
        else{
        currentTemplate = currentTemplate + 1;
        }
        $('.template').hide();
        $('#bp'+currentTemplate).show();
    });
    $('.sli-l').on('click',function(){
        if(currentTemplate<=1){
            return
        }
        else{
        currentTemplate = currentTemplate - 1;
        }
        $('.template').hide();
        $('#bp'+currentTemplate).show();
    });
    $('.sli-chi').click(function(){
        $('.sli-chi').removeClass('active');
        $(this).addClass('active');
    });
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
});

$('#expire').click(function() {
  var checkbox = $('.delete_checkbox:checked');
  if (checkbox.length > 0) {
      var checkbox_value = [];
      $(checkbox).each(function() {
          checkbox_value.push($(this).val());
      });
      if(checkbox.length > 1){
       var msg = 'these scratchers';
       var msg1 = 'These scratchers';
       var msg2 = 'Scratchers are';
      }else{
        var msg = 'this scratcher';
        var msg1 = 'This scratcher';
        var msg2 = 'Scratcher is';
      }
      swal({
          text: "Are you sure you want to expire "+msg+"?",
          buttons: ["Cancel", true],
          dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
                $.ajax({
                    url: base_url + "cashier/expire_scratcher",
                    method: "POST",
                    data: {checkbox_value: checkbox_value},
                    success: function() {
                      swal({
                          title: "Success!",
                          text: msg2+" successfully expired!",
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
              $('.select_all').attr('checked', '');
          }
      });
  } else {
      swal({
          title: "Oops!",
          text: "Select atleast one scratcher!",
          icon: "error",
          buttons: false,
          timer:2000,
      });
  }
});

jQuery(document).on("click", "#keyBoard_on1", function (e) {
 KeyboardNum.open();
 $('#read_barcode1').focus();
});

jQuery(document).on("click", ".keyboard__key", function (e) {
  if($(this).text() == 'enter'){
      if($('#read_barcode1').val() != ''){
        KeyboardNum.close();
        var barcode = $("#read_barcode1").val();
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
                        $('#read_barcode1').focusout();
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
                        //$('#category').val();
                        $("#category").val(data.products[0].category_id);
                        $('#producer').val(data.products[0].manufacturer);
                        $('#product-img').attr('src', data.products[0].images[0]);
                        $('#product_hidden_img').val(data.products[0].images[0]);
                        //hidden value
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
                            text: "Scratcher not found!",
                            icon: "warning",
                            buttons: {
                                catch: {
                                    text: "Add Scratcher",
                                    value: "catch",
                                },
                                cancel: "Cancel",
                            },
                        })
                        .then((value) => {
                          if($('#available_bins').val() == ''){
                              swal({
                                  title: "Oops!",
                                  text: "Sorry, no bin available!",
                                  icon: "error",
                                  buttons: false,
                                  timer: 2000,
                              });
                          }else{
                                switch (value) {
                                    case "catch":
                                        window.location.href = base_url + "cashier/scratcher_inventory_add?upc=" + barcode;
                                        break;
                                    default:
                                }
                            }
                        });
                }
                $("#read_barcode1").val('');
                $('#tbl_inventory_filter input').focus();
            });
        }
      }
  }
});

$(document).on('change', '.change_scratcher_status', function() {
  var status = $(this).val();
  var scratcher_upc = $(this).closest('tr').find('td:eq(2)').text();
   if(status == '1'){
      var msg = 'expire this scratcher';
      var msg1= 'expired!';
   }else{
     var msg = 'inactivate this scratcher';
     var msg1= 'inactivated!';
   }

  if(status == '0'){
      swal({
          title: "Oops!",
          text: "This scratcher is already active!",
          icon: "error",
          buttons: false,
          timer:2200,
      });
  }else{
      swal({
          text: "Are you sure you want to "+msg+"?",
          buttons: ["Cancel", true],
          dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: base_url + "cashier/change_scratcher_status",
                  method: "POST",
                  data: {scratcher_status: status, case_UPC: scratcher_upc},
                  success: function() {
                    swal({
                        title: "Success!",
                        text: "Scratcher has been successfully "+msg1,
                        icon: "success",
                        buttons: false,
                    });
                    setTimeout( function (){
                          location.reload();
                    },2000);
                  }
              })
          }else{
            $(this).val(0);
          }
      });
  }
});
