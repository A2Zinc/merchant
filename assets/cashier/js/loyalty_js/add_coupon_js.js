$(document).ready( function(){
    let  idFlag = false
    $(".takeInputLogin").focus(function() {
        currentField = document.activeElement
    });
    $('.keypad-btn').on('click', function() {
      newCharacter = this.innerHTML;
      if ($('#empid1').val().length >= 2  && $(this).hasClass('backBTN') == false ) {
        $('#emppwd1').focus();
      }
      if ($('#emppwd1').val().length >= 4 && $(this).hasClass('backBTN') == false && $(this).hasClass('tabBTN') == false) {
          if($('#empid1').val().length != 2  && $(this).hasClass('backBTN') == false ){
            $('#empid1').focus();
          }else{
            $('#btnFront1').trigger('click');
          }
      }
      if (newCharacter === "🠔") {
        currentField.value = currentField.value.substring(0, currentField.value.length - 1);
      } else if (newCharacter.length > 5) {
//            alert('222')
      } else if (newCharacter === "Tab") {
        if(idFlag == false){
        $('#emppwd1').focus();
        idFlag = true
        }
        else{
          $('#emppwd1').blur();
          $('#empid1').focus();
          idFlag = false;
        }
      } else {
          currentField.value += newCharacter
          if ($('#emppwd1').val().length == 4 ) {
            $('#btnFront1').trigger('click');
          }
      }
    });
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

$('#btnFront1').click(function() {
  var username = $('#empid1').val();
  var password = $('#emppwd1').val();
  if(username == ''){
      $("#id2_err").html("Please enter your Employee Username").show();
      return false;
  }
  if(password == ''){
      $("#pwd2_err").html("Please enter your Employee Password").show();
      return false;
  }
  $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/front_login",
      data: {username: username, password: password, module: 'pos'},
      dataType: 'json',
      success: function(data) {
      console.log(data);
      if (data.module == 'pos') {
        window.location = base_url + "cashier/POSterminal"
      }
      if (data == 'password_fail') {
        $('#empid1').val(username);
        $('#emppwd1').val('');
        $('#emppwd1').focus();
        swal({
            title: "Oops!",
            text: "Password does not match!",
            icon: "error",
            buttons: false,
            timer : 2500,
        });
      }
      if (data == 'user_not_exist') {
        $('.front_logins')[0].reset();
        $('#empid1').focus();
        swal({
            title: "Oops!",
            text: "User does not exist!",
            icon: "error",
            buttons: false,
            timer : 2500,
        });
      }
      if (data == 'not_permission') {
        swal({
            title: "Oops!",
            text: "You don't have the required permission to access this page!",
            icon: "error",
            buttons: false,
            timer :2700,
        });
      }
      if (data == 'invalid_login') {
        $('.front_logins')[0].reset();
        $('#empid1').focus();
        swal({
            title: "Oops!",
            text: "Invalid login!",
            icon: "error",
            buttons: false,
            timer :2700,
        });
      }
    },
  });
  return false;
});

$('.keypad-btn').on('click', function(){
    var username = $('#empid1').val();
    var password = $('#emppwd1').val();
    if(password.length == 4){
      if($('#empid1').val() == ''){
          $("#id2_err").html("Please enter your Employee Username").show();
          return false;
      }
      if($('#emppwd1').val() == ''){
          $("#pwd2_err").html("Please enter your Employee Password").show();
          return false;
      }
      $.ajax({
          type: 'ajax',
          method: 'post',
          url: base_url + "cashier/front_login",
          data: {username: username, password: password, module: 'pos'},
          dataType: 'json',
          success: function(data) {
          console.log(data);
          if (data.module == 'pos') {
            window.location = base_url + "cashier/POSterminal"
          }
          if (data == 'password_fail') {
            $('#empid1').val(username);
            $('#emppwd1').val('');
            $('#emppwd1').focus();
            swal({
                title: "Oops!",
                text: "Password does not match!",
                icon: "error",
                buttons: false,
                timer : 2500,
            });
          }
          if (data == 'user_not_exist') {
            $('.front_logins')[0].reset();
            $('#empid1').focus();
            swal({
                title: "Oops!",
                text: "User does not exist!",
                icon: "error",
                buttons: false,
                timer : 2500,
            });
          }
          if (data == 'not_permission') {
            swal({
                title: "Oops!",
                text: "You don't have the required permission to access this page!",
                icon: "error",
                buttons: false,
                timer :2700,
            });
          }
          if (data == 'invalid_login') {
            $('.front_logins')[0].reset();
            $('#empid1').focus();
            swal({
                title: "Oops!",
                text: "Invalid login!",
                icon: "error",
                buttons: false,
                timer :2700,
            });
          }
      },
      });
      return false;
  }
});

$('#emppwd1').on('keyup',function(){
  var username = $('#empid1').val();
  var password = $('#emppwd1').val();
  if(password.length == 4){
    if($('#empid1').val() == ''){
        $("#id2_err").html("Please enter your Employee Username").show();
        return false;
    }
    if($('#emppwd1').val() == ''){
        $("#pwd2_err").html("Please enter your Employee Password").show();
        return false;
    }
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/front_login",
        data: {username: username, password: password, module: 'pos'},
        dataType: 'json',
        success: function(data) {
        if (data.module == 'pos') {
          window.location = base_url + "cashier/POSterminal"
        }
        if (data == 'password_fail') {
          $('#empid1').val(username);
          $('#emppwd1').val('');
          $('#emppwd1').focus();
          swal({
              title: "Oops!",
              text: "Password does not match!",
              icon: "error",
              buttons: false,
              timer : 2500,
          });
        }
        if (data == 'user_not_exist') {
          $('.front_logins')[0].reset();
          $('#empid1').focus();
          swal({
              title: "Oops!",
              text: "User does not exist!",
              icon: "error",
              buttons: false,
              timer : 2500,
          });
        }
        if (data == 'not_permission') {
          swal({
              title: "Oops!",
              text: "You don't have the required permission to access this page!",
              icon: "error",
              buttons: false,
              timer :2700,
          });
        }
        if (data == 'invalid_login') {
          $('.front_logins')[0].reset();
          $('#empid1').focus();
          swal({
              title: "Oops!",
              text: "Invalid login!",
              icon: "error",
              buttons: false,
              timer :2700,
          });
        }
    },
    });
    return false;
  }
});

$('.keypad-btn').on('click', function() {
  if($('#empid1').val() == ''){
      $('#empid1').focus();
      $("#id2_err").html("").show();
      return false;
  }else {
    $("#id2_err").html("").show();
  }
  if($('#emppwd1').val() == ''){
      $("#pwd2_err").html("Please enter your Employee Password").show();
      return false;s
  }else {
    $("#pwd2_err").html("").show();
  }
});


$(document).on('click', '#mobileimg', function() {
    if($('#is_admin').val() == 1 || admin != ''){
        $("#pos_close4").trigger("click");
      window.location = base_url + "cashier/POSterminal";
    }else{
        if(shift_sess == ''){
          $("#pos_close4").trigger("click");
            swal({
                title: "Oops!",
                text: "Please start shift first!",
                icon: "error",
                buttons: false,
                timer :2700,
            });
        }else{
            $('.front_logins')[0].reset();
            $('#empid1').focus();
            $("#pwd2_err").html("").show();
            $("#id2_err").html("").show();
        }
    }
});

// auto tab
$("#empid1").keyup(function () {
    if ($(this).val().length == 2) {
      $('#emppwd1').focus();
    }
});
//auto tab
$("#emppwd1").keyup(function () {
    if ($(this).val().length == 4 ) {
      $('#btnFront1').trigger('click');
    }
});
