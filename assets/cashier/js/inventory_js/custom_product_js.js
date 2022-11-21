$(document).ready(function() {
    $('#read_barcode').focus();
});
$(document).ready(function() {
     var oTable = $('#tbl_CustomProducts').dataTable({
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
              "targets": [-0, 6],
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
      "ajax": base_url + "cashier/Cashier/customproductslist",
      "initComplete": function(settings, json) {
          $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
          Keyboard.init('full');}
    });

    jQuery(document).on("focus", "#read_barcode", function(e) {
        $('#tbl_CustomProducts_filter input').val('');
        oTable.fnFilter('');
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
        if (checkbox.length > 1) {
            var msg = 'these custom products';
            var msg2 = 'Custom products';
        } else {
            var msg = 'this custom product';
            var msg2 = 'Custom product';
        }
        swal({
            text: "Are you sure you want to delete "+msg+"?",
            buttons: ["Cancel", true],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: base_url + "cashier/Cashier/delete_custom_product",
                    method: "POST",
                    data: {
                        checkbox_value: checkbox_value
                    },
                    success: function() {
                        swal({
                            title: "Success!",
                            text: msg2+" is deleted successfully!",
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
            text: "Select atleast one product!",
            icon: "error",
            buttons: false,
            timer:2000,
        });
    }
});

$('#refresh').click(function() {
    $('.delete_checkbox').prop('checked', false); // Unchecks it
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
