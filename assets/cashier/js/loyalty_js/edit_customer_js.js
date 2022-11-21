$('#country').change(function(){
    var country = $('#country').val();
    if(country != ''){
        $.ajax({
            url: base_url + "cashier/Cashier/fetchState",
            method:"POST",
            data:{country_id:country},
            success:function(data){
                $('#state').html(data);
                $('#city').html('<option value="">--Select City--</option>');
            }
        });
    }else{
        $('#state').html('<option value="">--Select State--</option>');
        $('#city').html('<option value="">--Select City--</option>');
    }
});

$('#state').change(function(){
  var state = $('#state').val();
  if(state != ''){
      $.ajax({
          url: base_url + "cashier/Cashier/fetchCity",
          method:"POST",
          data:{state_id:state},
          success:function(data){
              $('#city').html(data);
          }
      });
  }else{
      $('#city').html('<option value="">--Select City--</option>');
  }
});


$('#btnSave').on('click', function(){
  var email_id = $('#email').val();
  if($('#fname').val() == '') {
      $("#fname_err").html("Please enter customer first name").show();
      return false;
  }
  if($('#lname').val() == '') {
      $("#lname_err").html("Please enter customer last name").show();
      return false;
  }
  if(email_id != ''){
      if(ValidateEmail(email_id) == false){
        $("#email_err").html("Please enter valid email").show();
        return false;
      }
  }
  if($('#mobile').val().length != 14 ){
      $("#mob_err").html("Please enter correct phone no.").show();
      return false;
  }
  if($('#country').val() !='--Select Country--'){
      if($('#state').val()=='--Select State--'){
        $("#state_err").html("Please select state").show();
        return false;
      }
  }
  if($('#state').val()!='--Select State--'){
      if($('#city').val()=='--Select City--'){
        $("#city_err").html("Please select city").show();
        return false;
      }
  }
  if($('#zipcode').val()!='' ){
    if($('#zipcode').val().length != 5){
      $("#zip_err").html("Please enter correct zipcode").show();
      return false;
    }
  }
  $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/update_customer",
        data: $('.edit-customer').serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#btnSave').attr('disabled', true);
        },
        success: function(data){
          if(data == 'success'){
              swal({
                  title: "Success!",
                  text: "Customer updated successfully!",
                  icon: "success",
                  buttons: false,
              });
              setTimeout( function (){
                window.location = base_url + "cashier/loyalty";
              },2500);
          }
        },
    });
    return false;
});

$('.customcardinput').bind('change', function() {
  var email_id = $('#email').val();
  if($('#fname').val() == ''){
      $("#fname_err").html("Please enter customer first name").show();
      return false;
  }else{
      $("#fname_err").html("").show();
  }
  if($('#lname').val() == ''){
     $("#lname_err").html("Please enter customer last name").show();
      return false;
  }else{
      $("#lname_err").html("").show();
  }
  if(email_id != ''){
      if(ValidateEmail(email_id) == false){
        $("#email_err").html("Please enter valid email").show();
        return false;
      }else{
        $("#email_err").html("").show();
      }
  }
  if($('#mobile').val() == ''){
      $("#mob_err").html("Please enter customer phone no.").show();
      return false;
  }else{
      $("#mob_err").html("").show();
  }
  if($('#country').val() !='--Select Country--'){
      if($('#state').val()=='--Select State--'){
        $("#state_err").html("Please select state").show();
        return false;
      }else{
        $("#state_err").html("").show();
      }
  }
  if($('#state').val()!='--Select State--'){
      if($('#city').val()=='--Select City--'){
        $("#city_err").html("Please select city").show();
        return false;
      }else{
        $("#city_err").html("").show();
      }
  }
  if($('#zipcode').val()!='' ){
    if($('#zipcode').val().length != 5){
      $("#zip_err").html("Please enter correct zipcode").show();
      return false;
    }else{
      $("#zip_err").html("").show();
    }
  }
});

$('#fname').on('keypress', function() {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        $("#fname_err").html("Only alphabets allowed").show();
        return false;
    }else{
        $("#fname_err").html("").show();
    }
});

$('#lname').on('keypress', function() {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        $("#lname_err").html("Only alphabets allowed").show();
        return false;
    }else{
        $("#lname_err").html("").show();
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

function ValidateEmail() {
    var email_id = $("#email").val();
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!expr.test(email_id)) {
        $('#email_err').html('Please enter valid email').show();
        return false;
    }else{
        $('#email_err').html("").show();
    }
}

$(".phoneInput").on("keyup paste", function(event) {
  // Don't run for backspace key entry, otherwise it bugs out
  if(event.which != 8){
      // Remove invalid chars from the input
      var input = this.value.replace(/[^0-9\(\)\s\-]/g, "");
      var inputlen = input.length;
      // Get just the numbers in the input
      var numbers = this.value.replace(/\D/g,'');
      var numberslen = numbers.length;
      // Value to store the masked input
      var newval = "";
      // Loop through the existing numbers and apply the mask
      for(var i=0;i<numberslen;i++){
          if(i==0) newval="("+numbers[i];
          else if(i==2) newval+=numbers[i]+") ";
          else if(i==6) newval+="-"+numbers[i];
          else newval+=numbers[i];
      }
      // Re-add the non-digit characters to the end of the input that the user entered and that match the mask.
      if(inputlen>=1&&numberslen==0&&input[0]=="(") newval="(";
      else if(inputlen>=6&&numberslen==3&&input[4]==")"&&input[5]==" ") newval+=") ";
      else if(inputlen>=5&&numberslen==3&&input[4]==")") newval+=" ";
      else if(inputlen>=6&&numberslen==3&&input[5]==" ") newval+=" ";
      else if(inputlen>=10&&numberslen==6&&input[9]=="-") newval+="-";

      $(this).val(newval.substring(0,14));

  }
});
