$(document).ready(function(){
   $('#tbl_promotion_archive').DataTable({
       "processing": true,
       "pageLength": 10,
       "lengthMenu": [[10,50, 200, 500], [10,50, 200, 500]],
       "targets": [0,-6],
       "deferRender": true,
       "columnDefs": [
                 { "orderable": false, "targets": -1 },
               ],
       "initComplete": function(settings, json) {
       $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
       Keyboard.init('full');}
   });
});

$(".inputDate").flatpickr({
    enableTime: false,
    dateFormat: "m-d-Y",
    minDate: "today", //dateformat using m.d.y
    "locale": {
      "firstDayOfWeek": 1 // set start day of week to Monday
    }
});

$('.inactive_table').on('click', '.changeStatus', function() {
    $('#start_date').val('');
    $(this).closest('tr').addClass('removeRows');
    var coupon_id = $(this).data('id');
    var expiry_date = $(this).data('expiry');
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = mm + '-' + dd + '-' + yyyy;

    swal({
          text: "Are you sure you want to make this promotion active ?",
          buttons: ["Cancel", true],
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
              $('#expiry_date_modal').modal();
              $('#couponIDD').val(coupon_id);
              if(expiry_date >= today){
                $('#start_date').val(expiry_date);
                $('#start_date').removeClass('active');
              }
          }
      });
});

$('#activate_promotion').on('click', function() {
    var today = new Date($('#start_date').val());
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var expiry_date = yyyy + '-' + mm + '-' + dd;
    var coupon_id = $('#couponIDD').val();

    if($('#start_date').val() ==''){
      $("#expiry_err").html("Please select New Expiry Date").show();
      return false;
    }
    $.ajax({
        url: base_url + "cashier/Cashier/activate_promotion",
        method: "POST",
        data: {end_date: expiry_date, coupon_id: coupon_id},
        success: function() {
             window.location = base_url + "cashier/promotion";
        }
    });
    return false;
});

$('.validate43').bind('change', function() {
    if($('#start_date').val() == ''){
        $("#expiry_err").html("Please select New Expiry Date").show();
        return false;
    }else{
        $("#expiry_err").html("").show();
    }
});

$(document).ready(function() {
    $('.delete_checkbox').click(function() {
        if ($(this).is(':checked')) {
            $(this).closest('tr').addClass('removeRow');
        } else {
            $(this).closest('tr').removeClass('removeRow');
        }
    });

    $('.delete_checkbox1').click(function() {
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
               var msg = 'these promotions';
               var msg2= "Promotions are";
            }else{
                var msg = 'this promotion';
                var msg2= "Promotion is";
            }
            swal({
                text: "Are you sure you want to delete "+msg+"?",
                buttons: ["Cancel", true],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: base_url + "cashier/Cashier/delete_promotion_permanently",
                        method: "POST",
                        data: {checkbox_value: checkbox_value},
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
                text: "Select atleast one record!",
                icon: "error",
                buttons: false,
                timer: 2000,
            });
        }
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

$('.delete_checkbox').on('click',function(){
    if($('.delete_checkbox:checked').length == $('.delete_checkbox').length){
        $('.select_all').prop('checked',true);
    }else{
        $('.select_all').prop('checked',false);
    }
});
