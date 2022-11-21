$(document).ready(function(){
   $('#vcheckbox').removeClass('sorting_asc');
   $('#vcheckbox').addClass('sorting_disabled');
   $('#tbl_archiveScratcher').DataTable({
       "processing": true,
       "targets": [-1,-9],
       "deferRender": true,
       'aaSorting': [[1, 'asc']],
       "columnDefs": [{
           "searchable": true,
           "orderable": false,
           "targets": [-1,-9]
       }],
       "initComplete": function(settings, json) {
       $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
       Keyboard.init('full');}
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
         var msg2 = 'Scratchers';
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
                            text: msg2+" is successfully deleted!",
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

$('#tbl_archiveScratcher').on('click', '.changeStatus', function() {
    $(this).closest('tr').addClass('removeRows');
    var scratcher_id = $(this).data('id');
    var recent_bin =  $(this).closest('tr').find('td:eq(5)').text();
    swal({
          text: "Are you sure you want to make this scratcher active ?",
          buttons: ["Cancel", true],
          dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
            $('#archive_modal').modal();
            $('#scratcherIDD').val(scratcher_id);
            $('#recentBin').text(recent_bin);
            $('#recentBin').val(recent_bin.substr(-1));
        }
    });
});

$('#activate_scratcher').on('click', function() {
    var scratcher_id = $('#scratcherIDD').val();
    var bin_no = $('#archive_bin').val();
    if(bin_no =='--Select BIN--'){
      $("#bin_name_err1").html("Please select Bin").show();
      return false;
    }
    $.ajax({
        url: base_url + "cashier/Cashier/active_scratcher",
        method: "POST",
        data: {case_UPC: scratcher_id, bin: bin_no},
        success: function() {
          $('.removeRows').fadeOut(1500);
          $('#archive_modal').hide();
            swal({
                title: "Success!",
                text: "Scratcher has been successfully activated!",
                icon: "success",
                buttons: false,
            });
            setTimeout( function (){
                  window.location = base_url + "cashier/scratcher_inventory"
            },2000);
        }
    });
    return false;
});

$('.validate48').bind('change', function() {
    if($('#archive_bin').val() =='--Select BIN--'){
      $("#bin_name_err1").html("Please select Bin").show();
      return false;
    }else{
        $("#bin_name_err1").html("").show();
    }
});

$(document).on('change', '.change_scratcher_status', function() {
    var status = $(this).val();
    var pre = $(this).data('status');
    var scratcher_upc = $(this).closest('tr').find('td:eq(2)').text();
    var qty = $(this).closest('tr').find('td:eq(6)').text();

     if(status == '1'){
        var msg = 'expire this scratcher';
        var msg1= 'expired!';
     }else if(status == '2'){
       var msg = 'inactivate this scratcher';
       var msg1= 'inactivated!';
     }else{
       var msg = 'activate this scratcher';
       var msg1= 'activated!';
     }

    if(status == '2' && pre == '2'){
        swal({
            title: "Oops!",
            text: "This scratcher is already inactive!",
            icon: "error",
            buttons: false,
            timer:2200,
        });
    }else if(status == '1' && pre == '1'){
          swal({
              title: "Oops!",
              text: "This scratcher is already expire!",
              icon: "error",
              buttons: false,
              timer:2200,
          });
    }else if(status == '0' && $('#available_bin').val() == ''){
        swal({
            title: "Oops!",
            text: "Sorry, no bin available!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
        $(this).val(pre);
    }else if(status == '0' && qty == 0){
        swal({
            title: "Oops!",
            text: "Please update, Quantity for inventory!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
        $(this).val(pre);
    }else{
        swal({
            text: "Are you sure you want to "+msg+"?",
            buttons: ["Cancel", true],
            dangerMode: true,
        }).then((willDelete) => {
            $('#old_status').val($(this).data('status'));
            if (willDelete) {
                if(status == '0'){
                    $('#archive_modal').modal();
                    $('#scratcherIDD').val(scratcher_upc);
                }else{

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
                }
            }else{
              $(this).val(pre);
            }
        });
    }
});

$(document).on('click', '.clearBin', function() {
   location.reload();
});
