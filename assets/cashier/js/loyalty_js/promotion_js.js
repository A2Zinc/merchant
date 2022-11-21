$(document).ready(function(){
   $('#tbl_promotion').DataTable({
       "processing": true,
       "pageLength": 10,
       "lengthMenu": [[10,50, 200, 500], [10,50, 200, 500]],
       "deferRender": true,
       "columnDefs": [
                 { "orderable": false, "targets": -1 },
               ],
       "initComplete": function(settings, json) {
       $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
       Keyboard.init('full');}
   });
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
             var msg = 'these Promotions';
             var msg2= "Promotions are";
            }else{
              var msg = 'this Promotion';
              var msg2= "Promotion is";
            }
            swal({
                text: "Are you sure you want to delete "+msg+"?",
                buttons: ["Cancel", true],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: base_url + "cashier/Cashier/delete_promotion",
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
                    $('.select_all').prop('checked', false);
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
$(document).on('click','.keyboard__key', function(){
  var coupon = $('#coupon_search').val();
  $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/fetch_promotion",
      data: {coupon: coupon},
      dataType: 'json',
      success: function(data) {
          var option_list = '';
          $.each(data, function(index, value) {
              option_list += '<tr>' +
                  '<td><input type="checkbox" class="delete_checkbox" value="' + value.coupon_id + '" /></td>' +
                  '<td>' + value.coupon_name + '</td>' +
                  '<td>' + '0' + '</td>' +
                  '<td>' + value.start_date + '</td>' +
                  '<td>' + value.end_date + '</td>' +
                  '<td>' + value.coupon_details + '</td>';
                  if( value.status == 1){
                      option_list += '<td>' + 'Active' + '</td>';
                  }else{
                      option_list += '<td>' + 'Expired' + '</td>';
                  }
                  option_list +='<td><a href="' + base_url + 'cashier/edit_promotion?id=' + value.coupon_id + '"><button type="button" class="btn  btn-style">Edit</button></a></td>' +
                  '</tr>';
          });
          $('#searchdata').html(option_list);
      },
  });
  return false;
});

$('#coupon_search').on('keyup', function() {
    var coupon = $(this).val();
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/fetch_promotion",
        data: {coupon: coupon},
        dataType: 'json',
        success: function(data) {
            var option_list = '';
            $.each(data, function(index, value) {
                option_list += '<tr>' +
                    '<td><input type="checkbox" class="delete_checkbox" value="' + value.coupon_id + '" /></td>' +
                    '<td>' + value.coupon_name + '</td>' +
                    '<td>' + '0' + '</td>' +
                    '<td>' + value.start_date + '</td>' +
                    '<td>' + value.end_date + '</td>' +
                    '<td>' + value.coupon_details + '</td>';
                    if( value.status == 1){
                        option_list += '<td>' + 'Active' + '</td>';
                    }else{
                        option_list += '<td>' + 'Expired' + '</td>';
                    }
                    option_list +='<td><a href="' + base_url + 'cashier/edit_promotion?id=' + value.coupon_id + '"><button type="button" class="btn  btn-style">Edit</button></a></td>' +
                    '</tr>';
            });
            $('#searchdata').html(option_list);
        },
    });
    return false;
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
