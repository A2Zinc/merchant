$(document).ready(function() {
    var name_state = false;
    $('#supplierNAME').on('blur', function() {
        var supplier_name = $('#supplierNAME').val();
        $.ajax({
            url: base_url + "cashier/Cashier/checkSupplier",
            type: 'post',
            data: {supplier_name: supplier_name},
            success: function(response) {
                console.log(response);
                if (response == 'fail') {
                    name_state = false;
                    $("#fname_err").html("Supplier name already exists").show();
                } else if (response == 'success') {
                    name_state = true;
                    $("#fname_err").html("").show();
                }
            }
        });
    });

    $('#btnSave').on('click', function() {
        var email_id = $('#email').val();
        var email = $('#cemail').val();
        var semail = $('#spemail').val();
        if($('#supplierNAME').val() == '') {
            $("#fname_err").html("Please enter supplier name").show();
            return false;
        }
        if(name_state == false) {
            $("#fname_err").html("Supplier name already exists").show();
            return false;
        }
        if($('#mobile').val() != ''){
            if($('#mobile').val().length != 14) {
                $("#mob_err").html("Please enter correct mobile no.").show();
                return false;
            }
        }
        if(email_id != ''){
            if(ValidateEmail(email_id) == false) {
                $("#email_err").html("Please enter valid email").show();
                return false;
            }
        }
        if($('#supp_category').val() == '') {
            $("#scat_err").html("Please select category").show();
            return false;
        }
        if(email != ''){
            if(ValidateCEmail(email) == false) {
                $("#semail_err").html("Please enter valid email").show();
                return false;
            }
        }
        if($('#cmobile').val() != ''){
            if($('#cmobile').val().length != 14) {
                $("#smob_err").html("Please enter correct representative contact no.").show();
                return false;
            }
        }

        if(semail != ''){
            if(ValidateSPEmail(semail) == false) {
                $("#spemail_err").html("Please enter valid email").show();
                return false;
            }
        }
        if($('#spcontact').val() != ''){
            if($('#spcontact').val().length != 14) {
                $("#spmob_err").html("Please enter correct supervisor contact no.").show();
                return false;
            }
        }

        if (name_state == true) {
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: base_url + "cashier/insert_supplier",
                data: $('.add_supplier').serialize(),
                async: false,
                dataType: 'json',
                beforeSend: function(){
                    $('#btnSave').attr('disabled', true);
                },
                success: function(data) {
                    if(data == 'success'){
                        swal({
                          title: "Success!",
                          text: "Supplier is inserted successfully!",
                          icon: "success",
                          buttons: false,
                        });
                    }
                    setTimeout(function() {
                        window.location = base_url + "cashier/list_supplier"
                    }, 1600);
                },

            });
            return false;
        }
    });
});

$('.customcardinput').bind('change', function() {
    var email_id = $('#email').val();
    var email = $('#cemail').val();
    var semail = $('#spemail').val();
    if ($('#supplierNAME').val() == '') {
        $("#fname_err").html("Please enter supplier name").show();
        return false;
    } else {
        $("#supplierNAME").html("").show();
    }
    if($('#mobile').val() != ''){
        if($('#mobile').val().length != 14) {
            $("#mob_err").html("Please enter correct mobile no.").show();
            return false;
        }else{
            $("#mob_err").html("").show();
        }
    }else{
        $("#mob_err").html("").show();
    }
    if(email_id != ''){
        if(ValidateEmail(email_id) == false){
          $("#email_err").html("Please enter valid email").show();
          return false;
        }else{
          $("#email_err").html("").show();
        }
    }else{
        $("#email_err").html("").show();
    }
    if($('#supp_category').val() == '') {
        $("#scat_err").html("Please select category").show();
        return false;
    }
    if(email != ''){
        if(ValidateCEmail(email) == false) {
            $("#semail_err").html("Please enter valid email").show();
            return false;
        }else{
          $("#semail_err").html("").show();
        }
    }else{
        $("#semail_err").html("").show();
    }

    if($('#cmobile').val() != ''){
        if($('#cmobile').val().length != 14) {
            $("#smob_err").html("Please enter correct representative contact no.").show();
            return false;
        }else{
            $("#smob_err").html("").show();
        }
    }else{
        $("#smob_err").html("").show();
    }

    if(semail != ''){
        if(ValidateSPEmail(semail) == false) {
            $("#spemail_err").html("Please enter valid email").show();
            return false;
        }else{
            $("#spemail_err").html("").show();
        }
    }else{
        $("#spemail_err").html("").show();
    }
    if($('#spcontact').val() != ''){
        if($('#spcontact').val().length != 14) {
            $("#spmob_err").html("Please enter correct supervisor contact no.").show();
            return false;
        }else{
            $("#spmob_err").html("").show();
        }
    }else{
        $("#spmob_err").html("").show();
    }
});


$('#mobile').on('input', function() {
    if (!/^[0-9]+$/.test($("#mobile").val())) {
        $('#mob_err').html('Please enter valid contact no').show();
        return false;
    } else {
        $('#mob_err').html('').show();
    }
});


$('#cname').on('keypress', function() {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        $("#sname_err").html("Only alphabets allowed").show();
        return false;
    } else {
        $("#sname_err").html("").show();

    }
});

$('#spname').on('keypress', function() {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        $("#spname_err").html("Only alphabets allowed").show();
        return false;
    } else {
        $("#spname_err").html("").show();

    }
});

$(document).on('change','.multiselect-option', function(){
    if ($(this).hasClass('active') == false ){
        $("#scat_err").html("Please select category").show();
        return false;
    }else{
      $("#scat_err").html("").show();

    }
});
$(document).on('focus', 'input,textarea', function(){
    if($(this).hasClass('use-keyboard-input')){
        $('body').addClass("fixfixed");
    }

});

$(document).on('blur', 'input,textarea', function(){
    if($(this).hasClass('use-keyboard-input')){
        $('body').removeClass("fixfixed");
    }

});


function ValidateEmail(email_id) {
    // var email_id = $("#email").val();
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!expr.test(email_id)) {
        $('#email_err').html('Please enter valid email').show();
        return false;
    } else {
        $('#email_err').html("").show();
    }
}

function ValidateCEmail(email) {
    // var email_id = $("#email").val();
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!expr.test(email)) {
        $('#semail_err').html('Please enter valid email').show();
        return false;
    } else {
        $('#semail_err').html("").show();
    }
}

function ValidateSPEmail(email) {
    // var email_id = $("#email").val();
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!expr.test(email)) {
        $('#spemail_err').html('Please enter valid email').show();
        return false;
    } else {
        $('#spemail_err').html("").show();
    }
}

$(".phoneInput").on("keyup paste", function(event) {
    // Don't run for backspace key entry, otherwise it bugs out
    if (event.which != 8) {
        // Remove invalid chars from the input
        var input = this.value.replace(/[^0-9\(\)\s\-]/g, "");
        var inputlen = input.length;
        // Get just the numbers in the input
        var numbers = this.value.replace(/\D/g, '');
        var numberslen = numbers.length;
        // Value to store the masked input
        var newval = "";
        // Loop through the existing numbers and apply the mask
        for (var i = 0; i < numberslen; i++) {
            if (i == 0) newval = "(" + numbers[i];
            else if (i == 2) newval += numbers[i] + ") ";
            else if (i == 6) newval += "-" + numbers[i];
            else newval += numbers[i];
        }

        // Re-add the non-digit characters to the end of the input that the user entered and that match the mask.
        if (inputlen >= 1 && numberslen == 0 && input[0] == "(") newval = "(";
        else if (inputlen >= 6 && numberslen == 3 && input[4] == ")" && input[5] == " ") newval += ") ";
        else if (inputlen >= 5 && numberslen == 3 && input[4] == ")") newval += " ";
        else if (inputlen >= 6 && numberslen == 3 && input[5] == " ") newval += " ";
        else if (inputlen >= 10 && numberslen == 6 && input[9] == "-") newval += "-";

        $(this).val(newval.substring(0, 14));

    }
});
