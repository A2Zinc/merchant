$(document).ready(function(){
    $('#tbl_loyalty').DataTable({
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

$('#customer_search').on('keyup', function() {
    var customer = $(this).val();
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/fetch_customer",
        data: {customer: customer},
        dataType: 'json',
        success: function(data) {
            console.log(data);
            var option_list = '';
            $.each(data, function(index, value) {
                option_list += '<tr>' +
                    '<td><input type="checkbox" class="delete_checkbox1" value="' + value.customer_id + '" /></td>' +
                    '<td>' + value.first_name + ' ' + value.last_name + '</td>' +
                    '<td>' + '0' + '</td>' +
                    '<td>' + '$0.00' + '</td>' +
                    '<td>' + value.customer_email + '</td>' +
                    '<td>' + value.customer_mobile + '</td>' +
                    '<td><a href="' + base_url + 'cashier/edit_customer?id=' + value.customer_id + '"><button type="button" class="btn  btn-style">Edit</button></a></td>' +
                    '</tr>';
            });
            $('#searchdata').html(option_list);
        },
    });
    return false;
});

$(document).ready(function() {
     $('.delete_checkbox1').click(function() {
        if ($(this).is(':checked')) {
            $(this).closest('tr').addClass('removeRow');
        } else {
            $(this).closest('tr').removeClass('removeRow');
        }
     });

     $('#delete_all').click(function() {
        var checkbox = $('.delete_checkbox1:checked');
        if (checkbox.length > 0) {
            var checkbox_value = [];
            $(checkbox).each(function() {
                checkbox_value.push($(this).val());
            });
            if(checkbox.length > 1){
             var msg = 'these customers';
             var msg2 = 'Customers';
            }else{
              var msg = 'this customer';
              var msg2 = 'Customer';
            }
            swal({
                text: "Are you sure you want to delete "+msg+"?",
                buttons: ["Cancel", true],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: base_url + "cashier/Cashier/delete_customer",
                        method: "POST",
                        data: {checkbox_value: checkbox_value},
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
                    $('.delete_checkbox1').prop('checked', false);
                    $('.select_all').prop('checked', false);
                }
            });
        } else {
            swal({
                title: "Oops!",
                text: "Select atleast one record",
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

$('.delete_checkbox1').on('click',function(){
    if($('.delete_checkbox1:checked').length == $('.delete_checkbox1').length){
        $('.select_all').prop('checked',true);
    }else{
        $('.select_all').prop('checked',false);
    }
});
