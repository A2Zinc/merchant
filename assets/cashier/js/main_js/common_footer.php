<script>
  var base_url = "<?php echo base_url(); ?>";
  var d = '<?php echo $this->input->get('d') ?>';
  var user_id = '<?php echo $this->session->userdata["username"]?>';
  var timecard_user_id = '<?php echo $this->session->userdata["userdata"]["user_id"]?>';
  var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
  var sessName = '<?php echo $this->session->userdata["shiftdata"]["shiftLogin"] ?>';
  var sessionID = '<?php echo isset($this->session->userdata["shiftdata"]["shift_id"])?$this->session->userdata["shiftdata"]["shift_id"]:"" ?>';

$(document).on('click','body',function(e) {
  var container = $(".keyboard");
  if (!container.is(e.target) && container.has(e.target).length === 0){
      if (!$("input").is(":focus")) {
          console.log("Outerrrrr");
          Keyboard.close();
          KeyboardNum.close();
      }
  } else {
      console.log("Inerrrrr");
  }
});

$(document).ready(function(){
  $.noConflict();
  $('#read_barcode').focus();
  KeyboardNum.close();
});

function pageRedirect() {
  window.location.href = "dashboard.html";
}

$('.pill1').on('click', function() {
  $('.p1').addClass('activetab')
  $('.p2').removeClass('activetab')
  $('.pill2').css('color', 'black')
  $('.pill1').css('color', "red")
  $('#vacation-leave-form').hide()
  $('#oneday-leave-form').show()
});

$('.pill2').on('click', function() {
  $('.p2').addClass('activetab')
  $('.p1').removeClass('activetab')
  $('.pill1').css('color', 'black')
  $('.pill2').css('color', "red")
  $('#vacation-leave-form').show()
  $('#oneday-leave-form').hide()
});

function setModalContent() {
  $(".pill1").trigger("click");
  $('#vacation-leave-form').hide()
}
setModalContent()

var slider = document.getElementById("myRange");
var output = document.getElementById("percent");
output.value = slider.value + "%"; // Display the default slider value
// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.value = this.value + "%";
}

function ab() {
  output.value = document.getElementById("percent").value;
}

var slider2 = document.getElementById("myRange2");
var output2 = document.getElementById("percent2");
output2.value = slider2.value + "%"; // Display the default slider value
// Update the current slider value (each time you drag the slider handle)
slider2.oninput = function() {
  output2.value = this.value + "%";
}

function get_float_value(num) {
  var rex = /(^\d{2})|(\d{1,3})(?=\d{1,3}|$)/g,
    val = num.toString().replace(/^0+|\.|,/g, ""),
    res;
  if (val.length) {
    //if (val.length && val.length > 2) {
    res = Array.prototype.reduce.call(val, (p, c) => c + p) // reverse the pure numbers string
      .match(rex) // get groups in array
      .reduce((p, c, i) => i - 1 ? p + c : p + "." + c); // insert (.) and (,) accordingly
    res += /\.|,/.test(res) ? "" : ".0"; // test if res has (.) or (,) in it
    num = Array.prototype.reduce.call(res, (p, c) => c + p); // reverse the string and display
    return num;
  } else {
    return num;
  }
}

$(".toggle-password").click(function() {
    $(this).toggleClass("fas fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});
//reuest leave
$(document).on('click', '#request_leave', function() {
    $('#request-leave-modal').modal('show');
    $('#exampleModalCenter21').modal('hide');
});

//cash advance
$(document).on('click', '#request_leave2', function() {
    $('#exampleModalCenter11').modal('show');
    $('#exampleModalCenter21').modal('hide');
});

$(document).on('click', '#view_request', function() {
    $('#exampleModalCenter21').modal('hide');
    $('#exampleModalCenter98').modal('show');
    var hrms_id = $('#hrms_id').val();
    $('#hrms_app').val(hrms_id);
    var Role_id = $('#roles_id').val();
    get_permission(Role_id,hrms_id);
});

$(document).on('click', '#request1', function() {
  $('#exampleModalCenter21').modal('hide');
  $('#exampleModalCenter99').modal('show');
  var Role_id = $('#roles_id').val();
  $.ajax({
    type: 'ajax',
    method: 'post',
    url: base_url + "cashier/Cashier/get_permission_ajax_new",
    data: {Role_id : Role_id},
    dataType: 'json',
    success: function(data) {
        if(data.role_permission.hrms_rights.indexOf('C') != -1){
            $("#REQleave").css("display", "");
        }else if(data.user_permission.hrms_rights.indexOf('C') != -1){
            $("#leaveAPP").css("display", "");
        }else{
            $("#REQleave").css("pointer-events", "none");
            $("#REQleave").css("opacity", "0.5");
            $('#REQleave').addClass('hoverClose');
        }

        if(data.role_permission.hrms_rights.indexOf('D') != -1){
            $("#CASHreq").css("display", "");
        }else if(data.user_permission.hrms_rights.indexOf('D') != -1){
            $("#leaveAPP").css("display", "");
        }else{
          $("#CASHreq").css("pointer-events", "none");
          $("#CASHreq").css("opacity", "0.5");
          $('#CASHreq').addClass('hoverClose');
        }
    },
  });
});

$("#one").on('click', function() {
  var $el = $('.qs');
  $el.attr('contenteditable', 'true');
  if ($el.attr('contenteditable') == 'true') {
    $el.css('border', '1px solid #C6C6C6');
    $el.css('background', '#F7F7F7');
    $el.css('text-align', ' center');
    $el.css('width', ' 65%');
    $('#saveinfo').css('background', 'black');
    $('#saveinfo').css('color', 'white');
  } else {
    $el.css('border', 'none')
  }
  var save = function() {
    $el.css('border', 'none');
    $el.css('background', 'white');
    $el.attr('contenteditable', 'false');
    $('#saveinfo').css('background', '#C4C4C4;');
  };
  $el.one('blur', save);
});

$("#two").on('click', function() {
  var $el = $('.sp');
  $el.attr('contenteditable', 'true');
  if ($el.attr('contenteditable') == 'true') {
    $el.css('border', '1px solid #C6C6C6');
    $el.css('background', '#F7F7F7');
    $el.css('text-align', ' center');
    $el.css('width', ' 65%');
    $('#saveinfo').css('background', 'black');
    $('#saveinfo').css('color', 'white');
  } else {
    $el.css('border', 'none')
  }
  var save = function() {
    $el.css('border', 'none');
    $el.css('background', 'white');

    $el.attr('contenteditable', 'false');

    $('#saveinfo').css('background', '#C4C4C4;');
  };
  $el.one('blur', save);
});

$("#three").on('click', function() {
    var $el = $('.sp2');
    $el.attr('contenteditable', 'true');
    $el.focus();
    if ($el.attr('contenteditable') == 'true') {
      $el.css('border', '1px solid #C6C6C6');
      $el.css('background', '#F7F7F7');
      $el.css('text-align', ' center');
      $el.css('width', ' 65%');
      $('#saveinfo').css('background', 'black');
      $('#saveinfo').css('color', 'white');
    } else {
      $el.css('border', 'none')
    }
    var save = function() {
      $el.css('border', 'none');
      $el.css('background', 'white');

      $el.attr('contenteditable', 'false');

      $('#saveinfo').css('background', '#C4C4C4;');
    };
    $el.one('blur', save);
});

$("#four").on('click', function() {
    var $el = $('.op');
    $el.attr('contenteditable', 'true');
    if ($el.attr('contenteditable') == 'true') {
      $el.css('border', '1px solid #C6C6C6');
      $el.css('background', '#F7F7F7');
      $el.css('text-align', ' center');
      $el.css('width', ' 65%');
      $('#saveinfo').css('background', 'black');
      $('#saveinfo').css('color', 'white');
    } else {
      $el.css('border', 'none')
      $('#saveinfo').css('background', '#C4C4C4;');
    }
    var save = function() {
      $el.css('border', 'none');
      $el.css('background', 'white');
      $el.attr('contenteditable', 'false');
      $('#saveinfo').css('background', '#C4C4C4;');
    };
    $el.one('blur', save);
});

function openCity(evt, cityName) {
  if (cityName == 'ab') {
    $('#ab').show();
    $('#cd').hide();
    $('#cdb > button').hide();
    $('#cdb > a').hide();
    $('#Custsearchbtn').show();
    $('.custbtn').css('background', '#EC4D4D')
    $('.manbtn').css('background', '#E4E4E4')
    $('.custbtn').css('color', 'white')
    $('.manbtn').css('color', 'black')
    $('#cdb ').css('display', 'none');
    $('#ef').hide();
    $('#efg > button').hide();
    $('#efg > a').hide();
    $('#efg ').css('display', 'none');
    $('.manbtn2').css('background', '#E4E4E4');
    $('.manbtn2').css('color', 'black');
  } else if(cityName == 'cd'){
    $('#ab').hide();
    $('#cd').show();
    $('#cdb > button').show();
    $('#cdb > a').show();
    $('#cdb ').css('display', 'flex');
    $('#Custsearchbtn').hide()
    $('.manbtn').css('color', 'white')
    $('.custbtn').css('color', 'black')
    $('.custbtn').css('background', '#E4E4E4')
    $('.manbtn').css('background', '#EC4D4D')
    $('#ef').hide();
    $('#efg > button').hide();
    $('#efg > a').hide();
    $('#efg ').css('display', 'none');
    $('.manbtn2').css('background', '#E4E4E4');
    $('.manbtn2').css('color', 'black');
  }else{
      $('#ab').hide();
      $('#cd').hide();
      $('#Custsearchbtn').hide()
      $('#cdb > button').hide();
      $('#cdb > a').hide();
      $('#cdb ').css('display', 'none');
      $('#ef').show();
      $('#efg > button').show();
      $('#efg > a').show();
      $('#efg ').css('display', 'flex');
      $('.tabone').css('background', '#E4E4E4');
      $('.manbtn').css('background', '#E4E4E4');
      $('.manbtn2').css('background', '#EC4D4D');
      $('.manbtn2').css('color', 'white');
      $('.manbtn').css('color', 'black');
      $('.custbtn').css('color', 'black');
  }
}

$(document).ready(function() {
    let isShiftInOpen = false;
    if (d == 'leave') {
        $('#exampleModalCenter21').modal();
    }
});

$('#clock_in').click(function() {
    var username = $('.hidden_username').val();
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/employee_new_login",
      data: {username : username },
      dataType: 'json',
      success: function(data) {
        console.log(data);
          if(data.status == 'login'){
            swal({
                title: data.fname+" "+data.lname,
                text: "Clocked in successfully..!",
                icon: "success",
                buttons: false,
            });
            $('#clock_shift').modal('hide');
            setTimeout( function (){
               location.reload();
            },2500);

          }
          if(data.status == 'logout'){
            swal({
                title: data.fname+" "+data.lname,
                text: "Clocked out successfully..!",
                icon: "success",
                buttons: false,
            });
            $('#clock_shift').modal('hide');
            setTimeout( function (){
               location.reload();
            },2500);
          }
      },
    });
    return false;
});

$('body').on('click','.edit-ts',function(e){
  e.preventDefault();
  // var user_id = '<?php echo $this->session->userdata["username"]?>';
  $.ajax({
    type: 'ajax',
    method: 'post',
    url: base_url + "cashier/Cashier/getEmpTimecardBydate",
    data: {
      user_id: user_id,
      start_date: $(this).data('sd'),
      end_date: $(this).data('ed')
    },
    dataType: 'json',
    success: function(data) {
       $('.ts_empid').html(data.userdetails.user_id);
      $("#TimeCARD").html(data.html);
    }
  });
})

$('body').on('click','.edit-manager-ts',function(e){
  e.preventDefault();
  // var user_id = '<?php echo $this->session->userdata["username"]?>';
  $.ajax({
    type: 'ajax',
    method: 'post',
    url: base_url + "cashier/Cashier/getEmpTimecardById",
    data: {
      id: $(this).data('id'),
    },
    success: function(data) {
       $("#TimeCARD_manager").html(data);
    }
  });
})

function timesheetreport(request=1){
    $.ajax({
      type: "POST",
      data: {request:request},
      url: base_url + "cashier/timesheetreport",
      success:function(result){
        $('.timesheetreport').html(result)
      }
    })
}

function timesheetreport_by_user(){
  $.ajax({
    type: "POST",
    url: base_url + "cashier/timesheetreport_by_user",
    success:function(result){
      $('.timesheetreport_edit').html(result)
    }
  })
}

function get_current_timecard(){
  return;
  // var timecard_user_id = '<?php echo $this->session->userdata["userdata"]["user_id"]?>';
  $.ajax({
    type: 'ajax',
    method: 'post',
    url: base_url + "cashier/Cashier/getEmpTimecardBydate",
    data: {user_id: timecard_user_id},
    dataType: 'json',
    success: function(data) {
       $('.ts_empid').html(data.userdetails.user_id);
       $("#TimeCARD").html(data.html);
    }
  });
}

$('#category').on('change', function() {
  var category_id = $('#category').val();
  $.ajax({
    type: "POST",
    url: base_url + "cashier/Cashier/fetch_size_type",
    data: {category_id: category_id},
    dataType: 'json',
    success: function(data) {
      var measurements = [];
      $.each(data.sizename, function(index, value) {
         measurements.push(value.name);
      });

      $('#measurement_value').val(measurements);

      var option_list = '';
      if(data.is_last_size != ''){
          $('.size12').val(data.is_last_size);
      }
      $.each(data.sizename, function(index, value) {
        option_list += '<option>' + value.name + '</option>';
      });
      $('#sizes').html(option_list);
      //crv
      if (data.Applicable_CRV == 1) {
        $("#CRV").prop("checked", true);
      } else {
        $("#CRV").prop("checked", false);
      }
      // tax
      if (data.Applicable_Tax == 1) {
        $("#TAX").prop("checked", true);
      } else {
        $("#TAX").prop("checked", false);
      }
      if (data.age_restrict == 0) {
        $('#age').hide();
        $('#restict').hide();
      } else if (data.age_restrict == 1) {
        $('#age').show();
        $('#restict').show();
      }
    },
  });
});

$('#category').change(function() {
    var category_id = $(this).val();
    $.ajax({
        type: "POST",
        url: base_url + "cashier/Cashier/fetch_supplier",
        data: {category_id: category_id},
        dataType : 'json',
        success : function(data){
          console.log(data);
          var option_list = '';
            $.each(data, function(index, value){
               option_list += '<option>'+value.supplier_name+'</option>';
            });
          $('#suppliers').html(option_list);
       },
     });
});

//advance cash
$('#btnAdv').on('click', function() {
  var amt = $('#paycheckAMT').val();
  if ($('#advance_amount').val() == '' || $('#advance_amount').val() == 0) {
    $("#amt_err").html("Please enter the correct amount").show();
    return false;
  }
  if(parseFloat($('#paycheckAMT').val()) < parseFloat($('#advance_amount').val())){
      $("#amt_err").html("Amount entered is exceeding your limit").show();
      return false;
  }
  if ($('#reasonadv1').val() == '') {
    $("#reasonadv_err").html("Please enter the reason").show();
    return false;
  }
  if ($('#selPaycheck').val() == '--Select Paycheck--') {
      $("#rdo_err").html("Please select paycheck").show();
      return false;
  }
  $.ajax({
    type: 'ajax',
    method: 'post',
    url: base_url + "cashier/Cashier/insert_advancecash",
    data: $('.advance-cash').serialize(),
    async: false,
    dataType: 'json',
    success: function(data) {
      console.log(data);
      $('.advance-cash')[0].reset();
      if(data == 'success'){
        swal({
            title: "Success!",
            text: "Cash advance request submitted!",
            icon: "success",
            buttons: false,
        });
        $('#exampleModalCenter11').modal('hide');
        if(node_setting == 1){
          data = '{"user_id":25}';
          socket.emit('send_notification',JSON.parse(data));
        }
      }
      setTimeout( function (){
        location.reload();
      },1600);

    },
  });
  return false;
});

$('.inputFile5').bind('change', function() {
  var today = new Date().getFullYear() + '-' + ("0" + (new Date().getMonth() + 1)).slice(-2) + '-' + ("0" + new Date().getDate()).slice(-2);
  var amt = $('#paycheckAMT').val();
  if ($('#advance_amount').val() == '' || $('#advance_amount').val() == 0) {
    $("#amt_err").html("Please enter the correct amount").show();
    return false;
  } else {
    $("#amt_err").html("").show();
  }
  if(parseFloat($('#paycheckAMT').val()) < parseFloat($('#advance_amount').val())){
      $("#amt_err").html("Amount entered is exceeding your limit").show();
      return false;
  }else{
       $("#amt_err").html("").show();
  }
  if ($('#reasonadv1').val() == '') {
    $("#reasonadv_err").html("Please enter the reason").show();
    return false;
  } else {
    $("#reasonadv_err").html("").show();
  }
  if ($('#selPaycheck').val() == '--Select Paycheck--') {
      $("#rdo_err").html("Please select paycheck").show();
      return false;
  }else{
      $("#rdo_err").html("").show();
  }
});

$('.couponM').on('click', function() {
  window.location = base_url + "cashier/loyalty?d=l";
});

function isNumberKey(txt, evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode == 46) {
    //Check if the text already contains the . character
    if (txt.value.indexOf('.') === -1) {
      return true;
    } else {
      return false;
    }
  } else {
    if (charCode > 31 &&
      (charCode < 48 || charCode > 57))
      return false;
  }
  return true;
}

$(document).ready( function(){
    $('.mtab').click(function(){
      $('.mtab').removeClass('active');
      $(this).addClass('active');
      $('.ctab').hide();
      var tab=$(this).data('tab');
      $("."+tab).show()
      if($(this).data('tab')=='report'){
        timesheetreport();
      } else{
          get_current_timecard();
          timesheetreport_by_user();
      }
    })
    let  idFlag = false
    $(".takeInputLogin").focus(function() {
        currentField = document.activeElement
    });
    $("#empID").focus(function() {
         currentField2 = document.activeElement
    });
    $("#empPWD").focus(function() {
         currentField2 = document.activeElement
    });
    $('.keypad-btn').on('click', function() {
      if(!$(this).hasClass("clki")){
      newCharacter = this.innerHTML;
      if ($('#empid').val().length >= 2  && $(this).hasClass('backBTN') == false ) {
        $('#emppwd').focus();
      }
      if ($('#emppwd').val().length >= 4 && $(this).hasClass('backBTN') == false && $(this).hasClass('tabBTN') == false) {
        if($('#empid').val().length != 2  && $(this).hasClass('backBTN') == false ){
          $('#empid').focus();
        }
      }

      if (newCharacter === "🠔") {
        currentField.value = currentField.value.substring(0, currentField.value.length - 1);
      } else if (newCharacter.length > 5) {
//            alert('222')
      } else if (newCharacter === "Tab") {
        if(idFlag == false){
        $('#emppwd').focus();
        idFlag = true
        }
        else{
          $('#emppwd').blur();
          $('#empid').focus();
          idFlag = false;
        }
      } else {
        currentField.value += newCharacter
      }
    } });
});

$('#btnFront').click(function() {
    if($('#empid').val() == ''){
        $("#id1_err").html("Please enter your Employee Username").show();
        return false;
    }
    if($('#emppwd').val() == ''){
        $("#pwd1_err").html("Please enter your Employee Password").show();
        return false;
    }
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/front_login",
        data: $('.front_login').serialize(),
        dataType: 'json',
        success: function(data) {
        // var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
        $('.hidden_username').val($('#empid').val() );
        $('.hidden_shift_user').val($('#empid').val() );
        $('.hidden_emp').val($('#empid').val() );
        $('.hidden_emp1').val($('#empid').val() );

        if (data.module == 'inventory') {
          $('.front-login').modal('hide');
          window.location = base_url + "cashier/inventory";
        }
        if (data.module == 'hrms') {
          $('#hrms_id').val($('#empid').val());
          $('#roles_id').val(data.Role_id);
          $('.front-login').modal('hide');
          $('#exampleModalCenter21').modal();
          get_permission(data.Role_id,$('#empid').val());
        }
        if (data.module == 'e_order') {
          $('.front-login').modal('hide');
          window.location = base_url + "cashier/eorder";
        }
        if (data.module == 'pos') {
          $('.front-login').modal('hide');
          window.location = base_url + "cashier/POSterminal";
        }
        if (data.module == 'loyalty') {
          $('.front-login').modal('hide');
          window.location = base_url + "cashier/loyalty";
        }
        if (data.module == 'store') {
          $('.front-login').modal('hide');
          window.location = base_url + "cashier/settings";
        }
        if (data.module == 'submit_timecard') {
          $('.front-login').modal('hide');
          $('#exampleModalCenter15').modal()
          get_permission(data.Role_id,$('#empid').val());
        }

        if (data.module == 'clock') {
          $('.front-login').modal('hide');
          if(data.clock_perm == 1){
              if(data.status == 'auto_clockout'){
                  swal({
                      title: data.fname+" "+data.lname,
                      text: "Clocked out successfully..!",
                      icon: "success",
                      buttons: false,
                      timer: 2700,
                  });
              }else{
                  $('#clock_shift').modal();
                  $('#docUser1').text('Clock Out');
                  $('#docUser2').text('Clock Out');
              }
          }else if(data.clock_perm == 0){
              $('#docUser1').text('Clock In');
              $('#docUser2').text('Clock In');
          }
          if(shift_sess != $('#empid').val()){
            $("#shift_in").css("pointer-events", "none");
            $("#shift_in").css("opacity", "0.5");
          }else{
            $("#shift_in").css("pointer-events", "");
            $("#shift_in").css("opacity", "");
          }
          if(shift_sess == ''){
            $("#shift_in").css("pointer-events", "");
            $("#shift_in").css("opacity", "");
          }
        }
        if (data.module == 'market_place') {
          $('.front-login').modal('hide');
        }
        if (data.module == 'reports') {
          $('.front-login').modal('hide');
          window.location = base_url + "cashier/reports";
        }
        if (data.module == 'help') {
          $('.front-login').modal('hide');
        }
        if (data == 'password_fail') {
          $('#emppwd').val('');
          $('#emppwd').focus();
          swal({
              title: "Oops!",
              text: "Password does not match..!",
              icon: "error",
              buttons: false,
              timer :2500,
          });
        }
        if (data == 'user_not_exist') {
          $('.front_login')[0].reset();
          $('#empid').focus();
          swal({
              title: "Oops!",
              text: "User does not exist..!",
              icon: "error",
              buttons: false,
              timer :2500,
          });
        }
        if (data == 'not_permission') {
          swal({
              title: "Oops!",
              text: "You don't have the required permission to access this page",
              icon: "error",
              buttons: false,
              timer :2700,
          });
          $('.front-login').modal('hide');
        }

        if (data.status == 'invalid_login') {
          if(shift_sess == ''){
              $('#clock_shift').modal();
              $('#docUser1').text('Clock Out');
              $('#docUser2').text('Clock Out');
          }
          swal({
              title: data.name,
              text: "Clocked in successfully..!",
              icon: "success",
              buttons: false,
              timer: 2700,
          });
          $('.front-login').modal('hide');
          if(shift_sess != $('#empid').val()){
            $("#shift_in").css("pointer-events", "none");
            $("#shift_in").css("opacity", "0.5");
          }else{
            $("#shift_in").css("pointer-events", "");
            $("#shift_in").css("opacity", "");
          }
          if(shift_sess == ''){
            $("#shift_in").css("pointer-events", "");
            $("#shift_in").css("opacity", "");
          }
        }
    },
  });
    return false;
});

  //new login changes
$(document).on('click','.keypad-btn', function(){
    var pwd = $('#emppwd').val();
    if(pwd.length == 4){
        if($('#empid').val() == ''){
            $("#id1_err").html("Please enter your Employee Username").show();
            return false;
        }
        if($('#emppwd').val() == ''){
            $("#pwd1_err").html("Please enter your Employee Password").show();
            return false;
        }

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: base_url + "cashier/Cashier/front_login",
            data: $('.front_login').serialize(),
            dataType: 'json',
            success: function(data) {
            // var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
            $('.hidden_username').val($('#empid').val() );
            $('.hidden_shift_user').val($('#empid').val() );
            $('.hidden_emp').val($('#empid').val() );
            $('.hidden_emp1').val($('#empid').val() );
            if (data.module == 'inventory') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/inventory";
            }
            if (data.module == 'hrms') {
              $('#hrms_id').val($('#empid').val());
              $('#roles_id').val(data.Role_id);
              $('.front-login').modal('hide');
              $('#exampleModalCenter21').modal();
              get_permission(data.Role_id,$('#empid').val());
            }
            if (data.module == 'e_order') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/eorder";
            }
            if (data.module == 'pos') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/POSterminal";
            }
            if (data.module == 'loyalty') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/loyalty";
            }
            if (data.module == 'store') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/settings";
            }
            if (data.module == 'submit_timecard') {
              $('.front-login').modal('hide');
              $('#exampleModalCenter15').modal();
              get_permission(data.Role_id,$('#empid').val());
            }
            if (data.module == 'clock') {
              $('.front-login').modal('hide');
              if(data.clock_perm == 1){
                  if(data.status == 'auto_clockout'){
                      swal({
                          title: data.fname+" "+data.lname,
                          text: "Clocked out successfully..!",
                          icon: "success",
                          buttons: false,
                          timer: 2700,
                      });
                  }else{
                      $('#clock_shift').modal();
                      $('#docUser1').text('Clock Out');
                      $('#docUser2').text('Clock Out');
                  }
              }else if(data.clock_perm == 0){
                  $('#docUser1').text('Clock In');
                  $('#docUser2').text('Clock In');
              }
              if(shift_sess != $('#empid').val()){
                $("#shift_in").css("pointer-events", "none");
                $("#shift_in").css("opacity", "0.5");
              }else{
                $("#shift_in").css("pointer-events", "");
                $("#shift_in").css("opacity", "");
              }
              if(shift_sess == ''){
                $("#shift_in").css("pointer-events", "");
                $("#shift_in").css("opacity", "");
              }
            }
            if (data.module == 'market_place') {
              $('.front-login').modal('hide');
            }
            if (data.module == 'reports') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/reports";
            }
            if (data.module == 'help') {
              $('.front-login').modal('hide');
            }
            if (data == 'password_fail') {
              $('#emppwd').val('');
              $('#emppwd').focus();
              swal({
                  title: "Oops!",
                  text: "Password does not match..!",
                  icon: "error",
                  buttons: false,
                  timer :2500,
              });
            }
            if (data == 'user_not_exist') {
              $('.front_login')[0].reset();
              $('#empid').focus();
              swal({
                  title: "Oops!",
                  text: "User does not exist..!",
                  icon: "error",
                  buttons: false,
                  timer :2500,
              });
            }
            if (data == 'not_permission') {
              swal({
                  title: "Oops!",
                  text: "You don't have the required permission to access this page",
                  icon: "error",
                  buttons: false,
                  timer :2700,
              });
              $('.front-login').modal('hide');
            }
            if (data.status == 'invalid_login') {
              if(shift_sess == ''){
                  $('#clock_shift').modal();
                  $('#docUser1').text('Clock Out');
                  $('#docUser2').text('Clock Out');
              }
              swal({
                  title: data.name,
                  text: "Clocked in successfully..!",
                  icon: "success",
                  buttons: false,
                  timer: 2700,
              });
              $('.front-login').modal('hide');
            }
          },
        });
        return false;
    }
});

$(document).on('keyup','#emppwd', function(){
    var pwd = $('#emppwd').val();
    if(pwd.length == 4){
      if($('#empid').val() == ''){
          $("#id1_err").html("Please enter your Employee Username").show();
          return false;
      }
      if($('#emppwd').val() == ''){
          $("#pwd1_err").html("Please enter your Employee Password").show();
          return false;
      }
      $.ajax({
          type: 'ajax',
          method: 'post',
          url: base_url + "cashier/Cashier/front_login",
          data: $('.front_login').serialize(),
          dataType: 'json',
          success: function(data) {
            get_current_timecard();
            timesheetreport_by_user();
            // var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
            $('.hidden_username').val($('#empid').val() );
            $('.hidden_shift_user').val($('#empid').val() );
            $('.hidden_emp').val($('#empid').val() );
            $('.hidden_emp1').val($('#empid').val() );

            if (data.module == 'inventory') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/inventory";
            }
            if (data.module == 'hrms') {
              $('#hrms_id').val($('#empid').val());
              $('#roles_id').val(data.Role_id);
              $('.front-login').modal('hide');
              $('#exampleModalCenter21').modal();
              get_permission(data.Role_id,$('#empid').val());
            }
            if (data.module == 'e_order') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/eorder";
            }
            if (data.module == 'pos') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/POSterminal";
            }
            if (data.module == 'loyalty') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/loyalty";
            }
            if (data.module == 'store') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/settings";
            }
            if (data.module == 'submit_timecard') {
              $('.front-login').modal('hide');
              $('#exampleModalCenter15').modal();
              get_permission(data.Role_id,$('#empid').val());
            }
            if (data.module == 'clock') {
                $('.front-login').modal('hide');
                if(data.clock_perm == 1){
                    if(data.status == 'auto_clockout'){
                        swal({
                            title: data.fname+" "+data.lname,
                            text: "Clocked out successfully..!",
                            icon: "success",
                            buttons: false,
                            timer: 2700,
                        });
                    }else{
                        $('#clock_shift').modal();
                        $('#docUser1').text('Clock Out');
                        $('#docUser2').text('Clock Out');
                    }
                }else if(data.clock_perm == 0){
                    $('#docUser1').text('Clock In');
                    $('#docUser2').text('Clock In');
                }
                if(shift_sess != $('#empid').val()){
                  $("#shift_in").css("pointer-events", "none");
                  $("#shift_in").css("opacity", "0.5");
                }else{
                  $("#shift_in").css("pointer-events", "");
                  $("#shift_in").css("opacity", "");
                }
                if(shift_sess == ''){
                  $("#shift_in").css("pointer-events", "");
                  $("#shift_in").css("opacity", "");
                }
            }
            if (data.module == 'market_place') {
              $('.front-login').modal('hide');
            }
            if (data.module == 'reports') {
              $('.front-login').modal('hide');
              window.location = base_url + "cashier/reports";
            }
            if (data.module == 'help') {
              $('.front-login').modal('hide');
            }
            if (data == 'password_fail') {
              $('#emppwd').val('');
              $('#emppwd').focus();
              swal({
                  title: "Oops!",
                  text: "Password does not match..!",
                  icon: "error",
                  buttons: false,
                  timer :2500,
              });
            }
            if (data == 'user_not_exist') {
              $('.front_login')[0].reset();
              $('#empid').focus();
              swal({
                  title: "Oops!",
                  text: "User does not exist..!",
                  icon: "error",
                  buttons: false,
                  timer :2500,
              });
            }
            if (data == 'not_permission') {
              swal({
                  title: "Oops!",
                  text: "You don't have the required permission to access this page",
                  icon: "error",
                  buttons: false,
                  timer :2700,
              });
              $('.front-login').modal('hide');
            }

            if (data.status == 'invalid_login') {
              if(shift_sess == ''){
                  $('#clock_shift').modal();
                  $('#docUser1').text('Clock Out');
                  $('#docUser2').text('Clock Out');
              }
              swal({
                  title: data.name,
                  text: "Clocked in successfully..!",
                  icon: "success",
                  buttons: false,
                  timer: 2700,
              });
              $('.front-login').modal('hide');
            }
          },
      });
      return false;
   }
});

$('.hrms_one').click(function() {
    $('input[name=module]').val('hrms');
    $('.front-login').modal();
    $('.front_login')[0].reset();
    $('#empid').focus();
    $('#id1_err').html('').show();
    $('#pwd1_err').html('').show();
    $('.cashcenter').text('HRMS Login');
});

$('.e_order_one').click(function() {
      $('input[name=module]').val('e_order');
      $('.front-login').modal();
      $('.front_login')[0].reset();
      $('#empid').focus();
      $('#id1_err').html('').show();
      $('.cashcenter').text('E-Order Login');
});

$('.inventory_one').click(function() {
      $('input[name=module]').val('inventory');
      $('.front-login').modal();
      $('.front_login')[0].reset();
      $('#empid').focus();
      $('#id1_err').html('').show();
      $('#pwd1_err').html('').show();
      $('.cashcenter').text('Inventory Login');
});

$('.posterminal_one,.mobileimg').click(function() {
    // var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
    if(shift_sess == ''){
        swal({
            title: "Oops!",
            text: "Please start shift first",
            icon: "error",
            buttons: false,
            timer :2700,
        });
    }else{
      $('input[name=module]').val('pos');
      $('.front-login').modal();
      $('.front_login')[0].reset();
      $('#empid').focus();
      $('#id1_err').html('').show();
      $('#pwd1_err').html('').show();
    }
    $('.cashcenter').text('Ring Sales Login');
});

$('.loyalty_one').click(function() {
      $('input[name=module]').val('loyalty');
      $('.front-login').modal();
      $('.front_login')[0].reset();
      $('#empid').focus();
      $('#id1_err').html('').show();
      $('#pwd1_err').html('').show();
      $('.cashcenter').text('Customers / Loyalty Login');
});

$('.store_one').click(function() {
    $('input[name=module]').val('store');
    $('.front-login').modal();
    $('.front_login')[0].reset();
    $('#empid').focus();
    $('#id1_err').html('').show();
    $('#pwd1_err').html('').show();
    $('.cashcenter').text('POS Settings Login');
});

$('body').on('change','#cdaterange',function(e  ){
  e.preventDefault();
  timesheetreport($(this).val());
})

$('body').on('click','.edit-timesheet-manager',function(e) {
  e.preventDefault();
  var r=$(this).data('r');
  var editdata=[],insertdata=[];
  var i=0;
   $('.user-'+$(this).data('un')+ ' .edit_time').each(function(){
      editdata[i++]={ 'id': $(this).data('id'), 'custom_hours': $(this).val() }
   })
   var i=0;
   $('.user-'+$(this).data('un')+ ' .insert_time').each(function(){
      insertdata[i++]={ 'sd': $(this).data('sd'), 'custom_hours': $(this).val() }
   })
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/save_week_timesheet_form_manager",
      data: {username: $(this).data('un'),editdata: editdata, insertdata: insertdata },
      dataType: 'json',
      success: function(result) {
      console.log(result);
        if(result.trim() == 'success'){
          swal({
              title: 'Success!',
              text: "Timesheet submited successfully..!",
              icon: "success",
              buttons: false,
              timer: 2500,
          });
          timesheetreport(r);
          $('#TimeCARD_manager').html('');
        }
      }
    });
});

$('body').on('click','.save_week_timesheet',function() {
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/save_week_timesheet",
      data: $('.save_week_timesheet_form').serialize(),
      dataType: 'json',
      success: function(result) {
      console.log(result);
        if(result.trim() == 'success'){
          swal({
              title: 'Success!',
              text: "Timesheet submited successfully..!",
              icon: "success",
              buttons: false,
          });
          get_current_timecard();
          timesheetreport_by_user();
        }
      }
    });
});

$('.timecard_one').click(function() {
    $('input[name=module]').val('submit_timecard');
    $('.front-login').modal();
    $('.front_login')[0].reset();
    $('#empid').focus();
    $('#id1_err').html('').show();
    $('#pwd1_err').html('').show();
    $('.cashcenter').text('Timecard Login');
});

$('.clock_one').click(function() {
    $('input[name=module]').val('clock');
    $('.front-login').modal();
    $('.front_login')[0].reset();
    $('#empid').focus();
    $('#id1_err').html('').show();
    $('#pwd1_err').html('').show();
    $('.cashcenter').text('Clock In / Clock Out Login');
});

$('.marketplace_one').click(function() {
    $('input[name=module]').val('market_place');
    $('.front-login').modal();
    $('.front_login')[0].reset();
    $('#empid').focus();
    $('#id1_err').html('').show();
    $('#pwd1_err').html('').show();
    $('.cashcenter').text('Market Place Login');
});

$('.report_one').click(function() {
      $('input[name=module]').val('reports');
      $('.front-login').modal();
      $('.front_login')[0].reset();
      $('#empid').focus();
      $('#id1_err').html('').show();
      $('#pwd1_err').html('').show();
      $('.cashcenter').text('Reports Login');
});

$('.help_one').click(function() {
    $('.front_login')[0].reset();
    $('#empid').focus();
    $('#id1_err').html('').show();
    $('#pwd1_err').html('').show();
});

$('.inputFile11').bind('change', function() {
  if($('#empid').val() == ''){
      $("#id1_err").html("Please enter your Employee Username").show();
      return false;
  }else {
    $("#id1_err").html("").show();
  }
  if($('#emppwd').val() == ''){
      $("#pwd1_err").html("Please enter your Employee Password").show();
      return false;
  }else {
    $("#pwd1_err").html("").show();
  }
});

$('.keypad-btn').on('click', function() {
  if($('#empid').val() == ''){
      $('#empid').focus();
      $("#id1_err").html("").show();
      return false;
  }else {
    $("#id1_err").html("").show();
  }
  if($('#emppwd').val() == ''){
      $("#pwd1_err").html("Please enter your Employee Password").show();
      return false;s
  }else {
    $("#pwd1_err").html("").show();
  }
});

$('#request1').on('click', function(){
  $('#exampleModalCenter21').modal('hide');
  $('#exampleModalCenter99').modal();
});

$(document).on('click', '#request_leave', function() {
   $('#request-leave-modal').modal('show');
   $('#exampleModalCenter99').modal('hide');
});

$(document).on('click', '#request_leave2', function() {
  $('.advance-cash')[0].reset();
  $("#amt_err, #reasonadv_err, #rdo_err").html("").show();
  $('#exampleModalCenter11').modal('show');
  $('#exampleModalCenter99').modal('hide');
});

$(document).on('click', '#view_request', function() {
  $('#exampleModalCenter21').modal('hide');
  $('#exampleModalCenter98').modal('show');
});

$(document).on('click', '#leaveAPP', function() {
  var id = $('#hrms_app').val();
  window.location= base_url + "cashier/leaves?hrms_id="+id;
});

$(document).on('click', '#cashAPP', function() {
  var id = $('#hrms_app').val();
  window.location= base_url + "cashier/cashAdv?hrms_id="+id;
});

$('#bleave1').on('click', function(){
   $('#exampleModalCenter98').modal('hide');
   $('#exampleModalCenter21').modal('show');
});

$('#bleave2').on('click', function(){
   $('#exampleModalCenter21').modal('hide');
});

$('#bleave3').on('click', function(){
   $('#exampleModalCenter99').modal('hide');
   $('#exampleModalCenter21').modal('show');
});

$('#cash_close').on('click', function(){
   $('#exampleModalCenter11').modal('hide');
   $('#exampleModalCenter21').modal('show');
});

$('#cash_close1').on('click', function(){
   $('#update-request-cash').modal('hide');
   $('#exampleModalCenter21').modal('show');
});
// auto tab
$("#empid").keyup(function () {
    if ($(this).val().length == 2) {
      $('#emppwd').focus();
    }
});
// check online offline connection
var intervalId = window.setInterval(function(){
  doOnlineCheck();
}, 5000);

function doOnlineCheck() {
  var ifConnected = window.navigator.onLine;
  if (ifConnected) {
    console.log('Connection available');
  } else {
    console.log('Connection not available');
  }
}

$('#scilogin').click(function() {
    var username = $('.hidden_shift_user').val();
    if($('#cash_in_drawer').val() == ''){
        $("#cash_d_err").html("Please enter Cash In Drawer").show();
        return false;
    }
    if($('#coin_dispenser').val() == ''){
        $("#coin_d_err").html("Please enter Coin Dispenser").show();
        return false;
    }
    var is_valid = 0;
    $('.bin_data').each(function(){
        var id = $(this).attr('data-id');
        var value = $(this).val();
          if(value == '') {
            is_valid = 1;
            $('#bin_err_'+id).html('Please enter Bin '+id+' Last Scratcher No')
            $('#bin_err_'+id).show();
            return false;
          }else{
              $('#bin_err_'+id).hide();
          }
    });
    if(is_valid == 1){
      return false;
    }
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/shift_terminal",
        data: $('.shift_terminal').serialize() + "&username="+username,
        dataType: 'json',
        success: function(data) {
        console.log(data);
          if(data == 'start_shift'){
            swal({
                title: 'Success!',
                text: "Shift started successfully...!",
                icon: "success",
                buttons: false,
            });
            $('.shift_terminal')[0].reset();
            $('#shift-in').modal('hide');

            if(node_setting == 1){
              data = '{"socketId":"'+socket.id+'","user_id":'+username+'}';
              socket.emit('user_connect',JSON.parse(data));
            }
            setTimeout( function (){
              window.location = base_url + "cashier";
            },2500);
          }
          if(data == 'end_shift'){
            swal({
                title: 'Success!',
                text: "Shift ended successfully...!",
                icon: "success",
                buttons: false,
            });
            if(node_setting == 1){
              data = '{"socketId":"'+socket.id+'","user_id":'+username+'}';
              socket.emit('user_disconnect',JSON.parse(data));
            }
            $('.shift_terminal')[0].reset();
            $('#shift-in').modal('hide');
            setTimeout( function (){
              window.location = base_url + "cashier";
            },2500);
          }
        },
    });
    return false;
});

$('.validateShift').bind('change', function() {
    if($('#cash_in_drawer').val() == ''){
        $("#cash_d_err").html("Please enter Cash In Drawer").show();
        return false;
    }else{
        $("#cash_d_err").html("").show();
    }
    if($('#coin_dispenser').val() == ''){
        $("#coin_d_err").html("Please enter Coin Dispenser").show();
        return false;
    }else{
        $("#coin_d_err").html("").show();
    }
});

$('#shift_in').click(function() {
    $('#clock_shift').modal('hide');
    $('#shift-in').modal();
    var username = $('.hidden_username').val();
    // var sessName = '<?php echo $this->session->userdata["shiftdata"]["shiftLogin"] ?>';
    var shift = '';
    if(sessName == ''){
      shift = 2;
    }else{
      shift = 1;
    }

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_current_shift_data",
        data: {username : username, shift: shift},
        dataType: 'json',
        success: function(data) {
          $('.cdalert').html('');
          if(data == 'already_shift_in'){
              swal({
                  title: 'Oops!',
                  text: "Please end shift from other terminal to start shift here",
                  icon: "error",
                  buttons: false,
                  timer: 2700,
              });
              $('#shift-in').modal('hide');
          }else if(data == 'shift_start'){
              swal({
                title: 'Success!',
                text: "Shift started successfully...!",
                icon: "success",
                buttons: false,
              });
              $('.shift_terminal')[0].reset();
              $('#shift-in').modal('hide');
              setTimeout( function (){
                window.location = base_url + "cashier";
              },2500);
          }else{
              if(data.coin_dispenser==null || data.coin_dispenser==undefined){
                coin_dispenser=0;
              } else{
                coin_dispenser=data.coin_dispenser;
              }
              if(data.cash_in_drawer <= 0){
                $('#cash_in_drawer').val(0.00);
              }else{
                $('#cash_in_drawer').val(data.cash_in_drawer);
              }
              $('#coin_dispenser').val(coin_dispenser);
              // var sessionName = '<?php echo isset($this->session->userdata["shiftdata"]["shift_id"])?$this->session->userdata["shiftdata"]["shift_id"]:"" ?>';
              if(sessionID!='' && data.cash_drop!=undefined && parseInt(data.cash_drop)>0){
                 $('.cdalert').html('<span class="errors" id="cash_d_err" style="color:red; font-size: 20px!important;">First you need to do <a id="cashdrop3_button" style="text-decoration: underline;">cash drop</a> of $'+data.cash_drop+'</span><br><br>');
              }
              if(data.bin_data == ''){
                $('#sbins').show();
              }else if(data.bin_data != null){
                var list = '',i;
                for(var i=0; i< data.bin_count; i++) {
                   list +='<tr><td class="text-left" style="font-size: 20px;">Bin '+data.bin_data[i].bin+'</td><td ><input type="number" data-id="'+data.bin_data[i].bin+'" name="bin_data[]"  id="bin_data_'+data.bin_data[i].bin+'" class="form-control w-25 use-keyboard-input-num validateShift bin_data" style="font-size: 20px;" min="1" value="'+data.bin_data[i].scracher_current_no+'" /><span class="errors" id="bin_err_'+data.bin_data[i].bin+'" style="color:red; font-size:17px;"></span></td></tr>';
                   $('#sbins').html(list);
                }
              }
          }
        }
    });
    return false;
});

$('body').on('click','#cashdrop3_button',function(e){
  e.preventDefault();
  $('#shift-in').modal('hide');
  $('#cashdrop3').modal();
})

$('body').on('click','#shift_terminal_button',function(e){
  e.preventDefault();
  $('#shift-in').modal();
  $('#cashdrop3').modal('hide');
})

$('#scilogin_forced').click(function() {
    var username = $('.hidden_shift_user').val();
    if($('#cash_in_drawer').val() == ''){
        $("#cash_d_err").html("Please enter Cash In Drawer").show();
        return false;
    }
    if($('#coin_dispenser').val() == ''){
        $("#coin_d_err").html("Please enter Coin Dispenser").show();
        return false;
    }
    var is_valid = 0;
    $('.bin_data').each(function(){
        var id = $(this).attr('data-id');
        var value = $(this).val();
          if(value == '') {
            is_valid = 1;
            $('#bin_err_'+id).html('Please enter Bin '+id+' Last Scratcher No')
            $('#bin_err_'+id).show();
            return false;
          }else{
              $('#bin_err_'+id).hide();
          }
    });
    if(is_valid == 1){
      return false;
    }
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/shift_terminal",
        data: $('.shift_terminal').serialize() + "&username="+username+"&shift_speed=1",
        dataType: 'json',
        success: function(data) {
        console.log(data);
          if(data == 'start_shift'){
            swal({
                title: 'Success!',
                text: "Shift started successfully...!",
                icon: "success",
                buttons: false,
            });
            $('.shift_terminal')[0].reset();
            $('#shift-in').modal('hide');
            setTimeout( function (){
              window.location = base_url + "cashier";
            },2500);
          }
          if(data == 'end_shift'){
            swal({
                title: 'Success!',
                text: "Shift ended successfully...!",
                icon: "success",
                buttons: false,
            });
            $('.shift_terminal')[0].reset();
            $('#shift-in').modal('hide');
            setTimeout( function (){
              window.location = base_url + "cashier";
            },2500);
          }
        },
    });
    return false;
});

//inside-outside alert
$(document).on('click','#bell',function(){
  // var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/user_notification",
        data: {user_id : shift_sess},
        dataType: 'json',
        success: function(data) {
            if(data == '' ){
                $('#box').html('No Records Found');
            }else{
                $('#box').html(data);
                $('#notifications_count').html('');
            }
        }
    });
});

if(node_setting == 1){
  socket.on('receive_notification',(data) =>{
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/get_user_notification_count_ajax",
        dataType: 'json',
        success: function(data) {
            if(data.count > 0 && data.notification != ''){
              $('#notifications_count').html(data.count);
              new Notify ({
                status: 'success',
                title: 'Notification',
                text: data.notification,
                effect: 'fade',
                speed: 300,
                customClass: '',
                customIcon: '',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 5000,
                gap: 20,
                distance: 20,
                type: 1,
                position: 'right bottom'
              })
            }
        }
    });
});
}


function get_permission(Role_id,username){
  var Role_id = Role_id;
  var username = username;
  $.ajax({
    type: 'ajax',
    method: 'post',
    url: base_url + "cashier/Cashier/get_permission_ajax_new",
    data: {Role_id : Role_id, username : username},
    dataType: 'json',
    success: function(data) {
        //timesheet button permissions
        if(data.role_permission.submit_timecard_rights.indexOf('A') != -1){
            $("#timesheetID").css("display", "");
        }else if(data.user_permission.submit_timecard_rights.indexOf('A') != -1){
            $("#timesheetID").css("display", "");
        }else{
            $("#timesheetID").css("pointer-events", "none");
            $("#timesheetID").css("opacity", "0.5");
        }
        //report button permissions
        if(data.role_permission.submit_timecard_rights.indexOf('B') != -1){
            $("#reportID").css("display", "");
        }else if(data.user_permission.submit_timecard_rights.indexOf('B') != -1){
            $("#reportID").css("display", "");
        }else{
          $("#reportID").css("pointer-events", "none");
          $("#reportID").css("opacity", "0.5");
        }
        //view request button permissions
        if(data.role_permission.hrms_rights.indexOf('A') != -1 ){
            $("#view_request").css("display", "");
            $('.modalcenter1').addClass('modal-xl');
        }else if(data.user_permission.hrms_rights.indexOf('A') != -1){
            $("#view_request").css("display", "");
            $('.modalcenter1').addClass('modal-xl');
        }else if(data.role_permission.hrms_rights.indexOf('B') != -1){
            $("#view_request").css("display", "");
            $('.modalcenter1').addClass('modal-xl');
        }else if(data.user_permission.hrms_rights.indexOf('B') != -1){
            $("#view_request").css("display", "");
            $('.modalcenter1').removeClass('modal-xl');
        }else{
            $("#view_request").css("display", "none");
            $('.modalcenter1').removeClass('modal-xl');
        }

        //view leave request button permissions
        if(data.role_permission.hrms_rights.indexOf('A') != -1){
            $("#leaveAPP").css("display", "");
            $("#leaveAPP").css("padding-left", "28%");
        }else if(data.user_permission.hrms_rights.indexOf('A') != -1){
            $("#leaveAPP").css("display", "");
            $("#leaveAPP").css("padding-left", "28%");
        }else{
            $("#leaveAPP").css("display", "none");
        }

        //view cash advance request button permissions
        if(data.role_permission.hrms_rights.indexOf('B') != -1){
            $("#cashAPP").css("display", "");
            $("#leaveAPP").css("padding-left", "");
        }else if(data.user_permission.hrms_rights.indexOf('B') != -1){
            $("#cashAPP").css("display", "");
            $("#leaveAPP").css("padding-left", "");
        }else{
            $("#cashAPP").css("display", "none");
        }
    },
  });
}

$(document).on('click','.keyboard__key--wide',function(){
    var cash_in_drawer =$("#cash_in_drawer").val();
    var coin_dispenser =$("#coin_dispenser").val();
    if(cash_in_drawer == 0 || cash_in_drawer == ''){
      $("#cash_in_drawer").val(0);
    }
    if(coin_dispenser == 0 || coin_dispenser == ''){
      $("#coin_dispenser").val(0);
    }
});

</script>
