$(document).ready( function(){
    let  idFlag = false
    $(".takeInputLogin").focus(function() {
        currentField = document.activeElement
    });

    $('.keypad-btn-btn').on('click', function() {
        newCharacter = this.innerHTML;
      //added auto tab
        if ($('#empid_12').val().length >= 2  && $(this).hasClass('backBTN') == false ) {
          $('#emppwd_12').focus();
        }
        if ($('#emppwd_12').val().length >= 4 && $(this).hasClass('backBTN') == false && $(this).hasClass('tabBTN') == false) {
            if($('#empid_12').val().length != 2  && $(this).hasClass('backBTN') == false ){
              $('#empid_12').focus();
            }else{
              $('#btnFront_12').trigger('click');
            }
        }
        if ($('#emppwd_12').val().length == 4 ) {
            $('#btnFront_12').trigger('click');
        }
        if (newCharacter === "🠔") {
          currentField.value = currentField.value.substring(0, currentField.value.length - 1);
        }else {
            currentField.value += newCharacter
            if ($('#emppwd_12').val().length == 4 ) {
                $('#btnFront_12').trigger('click');
            }
        }
    });
});

$('#btnFront_12').click(function() {
    var username = $('#empid_12').val();
    var password = $('#emppwd_12').val();
    if(username == ''){
        $("#id2_err").html("Please enter your employee username").show();
        return false;
    }
    if(password == ''){
        $("#pwd2_err").html("Please enter your employee password").show();
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
              $('#empid_12').val(username);
              $('#emppwd_12').val('');
              $('#emppwd_12').focus();
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
              $('#empid_12').focus();
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
                swal({
                    title: "Oops!",
                    text: "Please clock in first!",
                    icon: "error",
                    buttons: false,
                    timer :2700,
                });
                $(".close").trigger("click");
                setTimeout( function (){
                  window.location = base_url + "cashier";
                },1600);
            }
        },
        });
    return false;
});

$('.keypad-btn-btn').on('click', function(){
    var username = $('#empid_12').val();
    var password = $('#emppwd_12').val();
    if(password.length == 4){
        if($('#empid_12').val() == ''){
            $("#id2_err").html("Please enter your employee username").show();
            return false;
        }
        if($('#emppwd_12').val() == ''){
            $("#pwd2_err").html("Please enter your employee password").show();
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
                  $('#empid_12').val(username);
                  $('#emppwd_12').val('');
                  $('#emppwd_12').focus();
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
                  $('#empid_12').focus();
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
                  swal({
                      title: "Oops!",
                      text: "Please clock in first!",
                      icon: "error",
                      buttons: false,
                      timer :2700,
                  });
                  $(".close").trigger("click");
                  setTimeout( function (){
                    window.location = base_url + "cashier";
                  },1600);
                }
            },

       });
      return false;
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

$('#emppwd_12').on('keyup',function(){
    var username = $('#empid_12').val();
    var password = $('#emppwd_12').val();

    if(password.length == 4){
      if($('#empid_12').val() == ''){
          $("#id2_err").html("Please enter your employee username").show();
          return false;
      }
      if($('#emppwd_12').val() == ''){
          $("#pwd2_err").html("Please enter your employee password").show();
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
            $('#empid_12').val(username);
            $('#emppwd_12').val('');
            $('#emppwd_12').focus();
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
            $('#empid_12').focus();
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
              swal({
                  title: "Oops!",
                  text: "Please clock in first!",
                  icon: "error",
                  buttons: false,
                  timer :2700,
              });
              $(".close").trigger("click");
              setTimeout( function (){
                window.location = base_url + "cashier";
              },1600);
            }
       },

      });
      return false;
    }
});

$('.keypad-btn-btn').on('click', function() {
    if($('#empid_12').val() == ''){
        $('#empid_12').focus();
        $("#id2_err").html("").show();
        return false;
    }else {
      $("#id2_err").html("").show();
    }
    if($('#emppwd_12').val() == ''){
        $("#pwd2_err").html("Please enter your employee password").show();
        return false;s
    }else {
      $("#pwd2_err").html("").show();
    }
});

$(document).on('click', '#mobileimg', function() {
      if($('#is_admin').val() == 1 || admin != ''){
        window.location = base_url + "cashier/POSterminal";
      }else{
        if(shift_sess == ''){
          $("#pos_close12").trigger("click");
            swal({
                title: "Oops!",
                text: "Please start shift first!",
                icon: "error",
                buttons: false,
                timer :2700,
            });
        }else{
            $("#exampleModal").modal();
            $('.front_logins')[0].reset();
            $('#empid_12').focus();
            $("#pwd2_err").html("").show();
            $("#id2_err").html("").show();
        }
    }
});

// auto tab
$("#empid_12").keyup(function () {
  if ($(this).val().length == 2) {
    $('#emppwd_12').focus();
  }
});
//auto tab
$("#emppwd_12").keyup(function () {
  if ($(this).val().length == 4 ) {
    $('#btnFront_12').trigger('click');
  }
});
