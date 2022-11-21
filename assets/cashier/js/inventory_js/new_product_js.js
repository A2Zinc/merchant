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
        $("#pos_close").trigger("click");
      window.location = base_url + "cashier/POSterminal";
    }else{
        if(shift_sess == ''){
          $("#pos_close").trigger("click");
            swal({
                title: "Oops!",
                text: "Please start shift first!",
                icon: "error",
                buttons: false,
                timer :2700,
            });

        }else{
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

$("document").ready(function() {
    let currentTemplate = 1;
    let MaxTemplates = $('.template').length;
    $('.template').hide();
    $('#bp'+currentTemplate).show();
    $('.loop_left').hide();
    $('.sli-r').on('click',function(){
        if(currentTemplate>=MaxTemplates){
          return
        }else{
            currentTemplate = currentTemplate + 1;
            $('.sli-r').show();
        }
        $('.template').hide();
        $('#bp'+currentTemplate).show();

        if(currentTemplate == 3){
          $('#bp3').addClass('activate');
        }else{
          $('#bp3').removeClass('activate');
        }
        if($("#bp3").hasClass("activate") == true){
            $('.loop_right').hide();
            $('.loop_left').show();
        }else{
            $('.loop_right').show();
            $('.loop_left').show();
        }
    });
    $('.sli-l').on('click',function(){
        if(currentTemplate<=1){
          return
        }else{
            currentTemplate = currentTemplate - 1;
            $('.sli-l').show();
        }
        if(currentTemplate == 1){
          $('#bp1').addClass('activate');
        }else{
          $('#bp1').removeClass('activate');
        }
        if($("#bp1").hasClass("activate") == true){
            $('.loop_left').hide();
            $('.loop_right').show();
        }else{
            $('.loop_right').show();
            $('.loop_left').show();
        }
        $('.template').hide();
        $('#bp'+currentTemplate).show();
    });
    $('.sli-chi').click(function(){
        $('.sli-chi').removeClass('active');
        $(this).addClass('active');
    });
    if($(".removeNominee").length == 1) {
        $(".removeNominee").removeClass("removeNominee").addClass("clearProductCombo");
    }
  });

// <link rel="stylesheet" href="<?=base_url()?>assets/style/ui@1.11.4/jquery-ui.css">
// <script src="<?=base_url()?>assets/js/jquery@1.10.2/jquery-1.10.2.js"></script>
// <script src="<?=base_url()?>assets/js/ui@1.11.4/jquery-ui.js"></script>
//
// <script src="<?php echo base_url()?>assets/cashier/js/select2@4.0.8/select2.min.js" defer></script>
// <link href="<?php echo base_url().'assets/cashier/style/select2.min.css'; ?>" rel="stylesheet" />
// <script src="<?php echo base_url() ?>assets/cashier/js/select2-tab-fix.min.js"></script>
