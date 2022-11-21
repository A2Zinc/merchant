$(document).ready(function() {
    $('#read_barcode').focus();
});

$(document).ready(function() {
    var oTable = $('#tbl_supplier').dataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "autoWidth": true,
        "bLengthChange": false,
        "responsive": true,
        "scrollY": "400px",
        "scrollCollapse": true,
        "columnDefs": [{
                "searchable": true,
                "orderable": false,
                "targets": [-0, 5],
            },
            {
                "width": "5%",
                "targets": 0
            },
            {
                "width": "10%",
                "targets": 5
            }, {
                "className": "dt-center",
                "targets": [0, -5, -4, -3, -2, -1]
            }
        ],

        "order": [
            [1, 'asc']
        ],
        "ajax": base_url + "cashier/supplierdatalist",
        "initComplete": function(settings, json) {
                $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
                Keyboard.init('full');
                $("#read_barcode").focus();
            },

    });

    jQuery(document).on("focus", "#read_barcode", function(e) {
        $('#tbl_supplier_filter input').val('');
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
                            $('#supplier_name').val(data.products[0].supplier_name);
                            $('#mobile').val(JSON.stringify(data.products[0].mobile));
                            $('#email').val(data.products[0].email);
                            $('#contact_name').val(data.products[0].contact_name);
                            $('#contact_email').val(data.products[0].contact_email);

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
                            }
                        });
                    }
                    $("#read_barcode").val('');
                    $('#tbl_inventory_filter input').focus();
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

  $('#refresh').click(function() {
      $('.delete_checkbox').prop('checked', false); // Unchecks it
  });

$('#delete_all2').click(function() {
    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
        var checkbox_value = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
            $('#suppl_tbl').empty();
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: base_url + "cashier/Cashier/get_supplier_by_id",
                data: { supplier_id : $(this).val()},
                dataType: 'json',
                success: function(data){
                    $('#suppl_tbl').append(data);
                }
          });
        });
        $('#exampleModalCenter78').modal('show');
    } else {
        swal({
            title: "Oops!",
            text: "Select atleast one supplier!",
            icon: "error",
            buttons: false,
            timer:2000,
        });
    }
});

$('.closeBTN').click(function() {
  $('.delete_checkbox').prop('checked', false);
  $('.select_all').removeClass('delete_checkbox');
});

$('#btnSubmits').click(function() {
   var new_supplier = $('.select1').val();
   var new_supplier = $('.select1').children("option:selected");
   if (new_supplier.length > 0) {
       var supplier_value = [];
       $(new_supplier).each(function() {
           supplier_value.push($(this).val());
       });
   }
   var checkbox = $('.delete_checkbox:checked');
   if (checkbox.length > 0) {
       var checkbox_value = [];
       $(checkbox).each(function() {
           checkbox_value.push($(this).val());
       });
   }

    $.ajax({
          type: 'ajax',
          method: 'post',
          url: base_url + "cashier/Cashier/updateSupplierId",
          data: { new_supplier_id: supplier_value, old_supplier_id :checkbox_value},
          dataType: 'json',
          success: function(data){
          $('#exampleModalCenter78').modal('hide');
           swal({
               title: "Success!",
               text: "Supplier is successfully deleted!",
               icon: "success",
               buttons: false,
           });
           setTimeout( function (){
             location.reload();
           },2500);
          }
    });
});

$('.select_all').on('click', function() {
    if(this.checked){
      $(this).val('delete_all');
      $(this).addClass('delete_checkbox');
      $('#delete_all2').addClass('del_all');
      $("input[type='checkbox']").each(function(){
        this.checked = true;
      });
    }else{
      $('#delete_all2').removeClass('del_all');
      $("input[type='checkbox']").each(function(){
        this.checked = false;
      });
    }
});

$(document).on('click','.del_all', function() {
    var checkbox = $('.select_all:checked');
    if($('.select_all').prop("checked") == true){
        if($('.select_all').val() == 'delete_all'){
            $('#exampleModalCenter78').modal('hide');
            swal({
                  text: "Are you sure you want to delete these suppliers ?",
                  buttons: ["Cancel", true],
                  dangerMode: true,
              }).then((willDelete) => {
                  if (willDelete) {
                      $.ajax({
                          url: base_url + "cashier/Cashier/delete_all_suppliers",
                          method: "POST",
                          success: function() {
                              $('.removeRow').fadeOut(1500);
                              location.reload();
                          }
                      })
                  }else{
                      $('.delete_checkbox').prop('checked', false);
                  }
            });
        }
    }
 });
