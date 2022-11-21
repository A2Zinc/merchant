$(".inputDate").flatpickr({
    enableTime: false,
    dateFormat: "m-d-Y",
    minDate: "today",  //dateformat using m.d.y
    "disable": [
        function(date) {
           return (date.getDay() === 0 );  // disable weekends
        }
    ],
    "locale": {
        "firstDayOfWeek": 1 // set start day of week to Monday
    }
});

$(".inputDate1").flatpickr({
    enableTime: false,
    dateFormat: "m-d-Y",
    "locale": {
        "firstDayOfWeek": 1 // set start day of week to Monday
    }
});

$(document).ready(function() {
    $('.first').show();
    $('.second').hide();
    $('#leave_data').show();
    $('#cash_data').hide();
    $('#cash').css('color', 'black')
    $('#leave').css('color', "red")
});

$(document).on('click', '#leave', function() {
   $('#leave_data').show();
   $('#cash_data').hide();
   $(this).find('.pillLine').addClass('activetab');
   $('#cash').find('.pillLine').removeClass('activetab');
   $('#cash').css('color', 'black');
   $(this).css('color', "red");

    var username = $('#hrms_id').val();
    $('#req_status_id').val(username);
    $.ajax({
       type: 'ajax',
       method: 'post',
       url: base_url + "cashier/Cashier/get_leaverequests_on_load",
       data: { hrms_id : username },
       dataType: 'json',
       success: function(data) {
           var trHTML = '';
           $("#tbl_leave").empty();
              if(data == 'Not Found' ){
                  $("#tbl_leave").empty();
                  $('#tbl_tr_leave').hide();
                 trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
              }else{
                  $("#tbl_leave").empty();
                  $('#tbl_tr_leave').hide();
                  $.each(data, function (key,value) {
                     date2 = new Date(value.created_at);
                     newDate=date2.toLocaleDateString();
                     var leave_type=value.leave_type;
                     if(leave_type == null){
                       trHTML +=  '<tr><td style="width: 15%;">'+'Accrued Leave';
                     } else {
                       trHTML +='<tr><td style="width: 15%;">'+leave_type;
                     }
                     var str = value.reason;
                     var result = str.slice(0, 35) + (str.length > 35 ? "..." : "");
                     var str1 = value.deny_reason;
                     var result1 = str1.slice(0, 10) + (str1.length > 10 ? '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'+str1+'</span></a>' : "");

                     trHTML +='</td><td style="width: 12%;">' + value.start_date +
                     '</td><td>' + result +
                     '</td><td style="width: 1%;">';
                     if(value.status == 'Pending' && value.notes !='') {
                       trHTML +='<a href="#" id="info_Required1" data-chat='+value.status+' data-chat-id='+value.id+' data-sender-id='+value.employee_id+'><b>Info Required</b></a>';
                     }else{
                       trHTML += value.status;
                     }
                     trHTML +='</td><td>' + result1 +
                     '</td><td style="text-align:center; width:20%;">'+'<button type="button" class="btn btn-success updateLeave" data-leave_id='+value.id+' ';
                     if(value.status != 'Pending'){
                     trHTML +='disabled';
                             }
                     trHTML +='>Edit</button><button type="button" class="btn btn-danger ml-2 deleteLeave" data-leave_id='+value.id+' ';
                     if(value.status != 'Pending'){
                       trHTML +='disabled';
                     }
                     trHTML +='>Cancel</button>'+
                     '</td></tr>';
              });
          }
           $('#leave_status').append(trHTML);
           trHTML +=" ";
       }
      });
});

$('#cash').on('click', function() {
   $('#leave_data').hide();
   $('#cash_data').show();
   $(this).find('.pillLine').addClass('activetab');
   $('#leave').find('.pillLine').removeClass('activetab');
   $(this).css('color', 'red');
   $('#leave').css('color', "black");
   var username = $('#req_status_id').val();

   $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/get_cashadv_on_load",
      data: { username: username},
      dataType: 'json',
      success: function(data) {
          var trHTML = '';
          console.log(data);
          $("#tbl_cashadv").empty();
          if(data == 'Not Found' ){
            $("#tbl_cashadv").empty();
            $('#tbl_tr_cashadv').hide();
            trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
          }else{
              $("#tbl_cashadv").empty();
              $('#tbl_tr_cashadv').hide();
                $.each(data, function (key,value) {
                    var dt=value.created_at;
                    var first_date = moment(dt).format('MM-DD-YYYY');
                    var str = value.reason;
                    var result = str.slice(0, 25) + (str.length > 25 ? "..." : "");
                    var str1 = value.denied_reason;
                    var result1 = str1.slice(0, 15) + (str1.length > 15 ? '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'+str1+'</span></a>' : "");

                 trHTML +=
                    '<tr><td style="width: 8%;"> $' + value.advance_amount+
                    '</td><td style="width: 12%;">' + first_date +
                    '</td><td style="width: 24%;"> '+ result +
                    '</td><td style="width: 1%;">';
                    if(value.status == 'Pending' && value.notes !='') {
                      trHTML +='<a href="#" id="info_required" data-chat='+value.status+' data-chat-id='+value.id+' data-sender-id='+value.employee_id+' ><b>Info Required</b></a>';
                    }else{
                      trHTML += value.status;
                    }
                    trHTML +='</td><td>' + result1 +
                    '</td><td style="text-align:center;width:20%;">'+'<button type="button" class="btn btn-success updateCash" data-cash_id='+value.id+' ';
                    if(value.status != 'Pending'){
                      trHTML +='disabled';
                    }
                    trHTML +='>Edit</button><button type="button" class="btn btn-danger ml-2 deleteCash" data-cash_id='+value.id+' ';
                    if(value.status != 'Pending'){
                      trHTML +='disabled';
                    }
                    trHTML +='>Cancel</button>'+
                                    '</td></tr>';
                  });
              }
        $('#cash_adv').append(trHTML);
         trHTML +=" ";
      }
     });
});

$('#mul_day').on('click', function() {
   $('.second').show();
   $('.first').hide();
   $('#accrued3').hide();
   $('#accrued4').hide();
   $('#standred3').show();
   $('#standred4').show();
   var leave_type = $('#eleave_type').val();
   var employee_id = $('.hidden_emp').val();
      $.ajax({
           type: 'ajax',
           method: 'post',
           url: base_url + "cashier/Cashier/getRemainingLeaveById",
           data : {employee_id: employee_id, leave_type: leave_type},
           async: false,
           dataType : 'json',
           success : function(data){
              if(data.maximum != ''){
                  var ramin = $('#eremaining_day').val(data.maximum);
              }else{
                 if(data.leave_type == 1 && data.maximum <= 0){
                    $('#eleave_type').val(2);
                    $('#eremaining_day').val($('#remaining_day').val());
                    $('#eleave_'+data.leave_type).css('display', 'none');
                 }else if(data.leave_type == 2 && data.maximum <= 0){
                    $('#eleave_type').val(1);
                    $('#eremaining_day').val($('#remaining_day').val());
                    $('#eleave_'+data.leave_type).css('display', 'none');
                 }else if(data.leave_type == 3 && data.maximum <= 0){
                    $('#eleave_type').val(1);
                    $('#eremaining_day').val($('#remaining_day').val());
                 }
              }
              if(data.maxLeave != ''){
                  var ramin =  $('#eremaining_day').val(data.maxLeave.max_leave);
              }
           }
     });
});

$('#one_day').on('click', function() {
   $('.first').show();
   $('.second').hide();
   var leave_type = $('#leave_type').val();
   var employee_id = $('.hidden_emp').val();

   $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/getRemainingLeaveById",
        data : {employee_id:employee_id, leave_type: leave_type},
        async: false,
        dataType : 'json',
        success : function(data){
           console.log(data.maxLeave);
           if(data.maxLeave.max_leave != '' || data.maxLeave.max_leave != 'undefined'){
               $('#remaining_day').val(data.maxLeave.max_leave);
           }else{
             $('#remaining_day').val(data.maximum);
           }
        }
  });
});

$('.first').on('click', function() {
  var employee_id = $('.hidden_emp').val();
  var leave_type = $('#leave_type').val();
  var start_date = $('#start_date').val();
  var requested_hr = $('#requested_hr').val();
  var remaining_hr = $('#remaining_hr').val();
  var requested_day = $('#requested_day').val();
  var reason = $('#reason').val();
  if(start_date == ''){
    $("#start_err").html("Please select start date").show();
    return false;
  }
  if(leave_type == '0'){
      if(remaining_hr == '' || remaining_hr == 0 || remaining_hr <= 0){
          $("#mhrs_err").html("Please enter requested hours").show();
          return false;
      }
      if(requested_hr == '' || requested_hr == 0 || requested_hr <= 0){
          $("#rhrs_err").html("Please enter requested hours").show();
          return false;
      }
      if(requested_hr > 8){
         $("#rhrs_err").html("Please enter 1 to 8 hours").show();
         return false;
      }
  }
  if(reason == ''){
     $("#notes_err").html("Please enter the reason").show();
     return false;
  }

  $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/insert_leave_request",
      data: {
            employee_id : employee_id, leave_type:leave_type,start_date:start_date,requested_day:requested_day,requested_hr:requested_hr,remaining_hr:remaining_hr,
            reason:reason
          },
      async: false,
      dataType: 'json',
      success: function(data) {
          $('.add-leave')[0].reset();
          $('#request-leave-modal').modal('hide');
          if(node_setting == 1){
            data = '{"user_id":'+employee_id+'}';
            socket.emit('send_notification',JSON.parse(data));
          }
          swal({
              text: "Leave Request Submitted!",
              icon: "success",
              buttons: false,
          });
          setTimeout( function (){
            location.reload();
          },1600);
      },
  });
  return false;
});

$(document).on('click', '#request_leave', function() {
    // $(".pill1").trigger("click");
    $('.add-leave')[0].reset();
    $("#start_err, #notes_err ,#estart_err ,#end_err, #date_err, #enotes_err").html("").show();
    $('#accrued1, #accrued2').hide();
    $('#standred1, #standred2').show();
    var employee_id = $('.hidden_emp').val();
    var leave_type = $('#leave_type').val();
    $.ajax({
         type: 'ajax',
         method: 'post',
         url: base_url + "cashier/Cashier/getRemainingLeaveById",
         data : {employee_id: employee_id, leave_type: leave_type},
         dataType : 'json',
         success : function(data){
           console.log(data);
            if(data.maximum != ''){
                var ramin = $('#remaining_day').val(data.maximum);
            }else{
               if(data.leave_type == 1 && data.maximum <= 0){
                  $('#leave_type').val(2);
                  //$('.pill1').trigger('click');
                  $('#leave_'+data.leave_type).css('display', 'none');
               }else if(data.leave_type == 2 && data.maximum <= 0){
                  $('#leave_type').val(1);
                  $('#leave_'+data.leave_type).css('display', 'none');
               }else if(data.leave_type == 3 && data.maximum <= 0){
                  $('#leave_type').val(1);
                  $('#leave_'+data.leave_type).css('display', 'none');
               }
            }
            if(data.maxLeave != ''){
                var ramin =  $('#remaining_day').val(data.maxLeave.max_leave);
            }
         }
   });
});


$('.second').on('click', function() {
  var employee_id = $('.hidden_emp').val();
  var leave_type = $('#eleave_type').val();
  var start_date = $('#estart_date').val();
  var end_date = $('#end_date').val();
  var requested_hr = $('#erequested_hr').val();
  var remaining_hr = $('#eremaining_hr').val();
  var reason = $('#ereason').val();
  var start = new Date($('#estart_date').val());
  var end = new Date($('#end_date').val());
  var diff = new Date(end - start);
  var sundayCnt = getSundayCountBetweenDates(start, end);
  var days = (diff/1000/60/60/24) + 1;
  var totalDays= (days)-sundayCnt;
  $('#erequested_day').val(totalDays);
  var requested_day = $('#erequested_day').val();


  if(start_date == ''){
    $("#estart_err").html("Please select start date").show();
    return false;
  }
  if(end_date == ''){
    $('#erequested_day').val('');
    $("#end_err").html("Please select end date").show();
    return false;
  }
  if(end_date < start_date){
    $("#date_err").html("End date is less than start date, please select correct date").show();
    return false;
  }
  if(leave_type == '0'){
    if(requested_hr == '' || requested_hr == 0 || requested_hr <= 0){
      if($("#erequested_hr").attr("readonly")==false){
          $("#erhrs_err").html("Please enter requested hours").show();
          return false;
      }
    }
    if(parseInt($("#erequested_hr").val()) > parseInt($("#eremaining_hr").val())){
        $("#days124_err").html("Please select correct dates").show();
        return false;
    }
  }
  if(leave_type != '0'){
    if(totalDays > $('#eremaining_day').val()){
      $("#days124_err").html("Please select correct dates").show();
      return false;
    }
  }
  if(totalDays == 1){
    if(requested_hr > 8){
      $("#erhrs_err").html("Please enter requested hours less than 9 hours").show();
        return false;
    }else{
        $("#erhrs_err").html("").show();
    }
  }
  if(reason == ''){
     $("#enotes_err").html("Please enter thr reason").show();
     return false;
  }
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/insert_leave_request",
      data: {
            employee_id: employee_id, leave_type:leave_type,start_date:start_date,end_date:end_date,requested_day:requested_day,requested_hr:requested_hr,reason:reason
          },
      async: false,
      dataType: 'json',
      success: function(data) {
          $('.add-leave')[0].reset();
          $('#request-leave-modal').modal('hide');
          swal({
              text: "Leave Request Submitted!",
              icon: "success",
              buttons: false,
          });
          setTimeout( function (){
            location.reload();
          },1600);
      },
  });
  return false;
});

$('#leave_type').on('change', function() {
   var leave_type = $(this).val();
   var employee_id = $('.hidden_emp').val();
   if($('#remaining_day').val() >=0){
     $('#leave_err').html("").show();
   }
   if(leave_type == '0'){
       $('#accrued1').show();
       $('#accrued2').show();
       $('#standred1').hide();
       $('#standred2').hide();
       $.ajax({
         type: 'ajax',
         method: 'post',
         url: base_url + "cashier/Cashier/getRemainingHr",
         data : {employee_id : employee_id, leave_type: leave_type},
         async: false,
         dataType : 'json',
         success : function(data){
            console.log(data);
            $('#remaining_hr').val(data.maximum);
            if(data.maximum != ''){
                var ramin = $('#remaining_day').val(data.maximum);
            }
            if(data.maxLeave != ''){
                var ramin =  $('#remaining_day').val(data.maxLeave.max_leave);
            }
         }
    });
   }else{
       $('#accrued1').hide();
       $('#accrued2').hide();
       $('#standred1').show();
       $('#standred2').show();
   }
   $.ajax({
         type: 'ajax',
         method: 'post',
         url: base_url + "cashier/Cashier/getRemainingLeaveById",
         data : {employee_id: employee_id, leave_type: leave_type},
         async: false,
         dataType : 'json',
         success : function(data){
           if(data.maximum != ''){
               var ramin = $('#remaining_day').val(data.maximum);
           }
           if(data.maxLeave != ''){
               var ramin =  $('#remaining_day').val(data.maxLeave.max_leave);
           }
         }
   });
   return false;
});


$('#eleave_type').on('change', function() {
     var leave_type = $(this).val();
     var employee_id = $('.hidden_emp').val();
     if(leave_type == '0'){
         $('#accrued3').show();
         $('#accrued4').show();
         $('#standred3').hide();
         $('#standred4').hide();

         $.ajax({
           type: 'ajax',
           method: 'post',
           url: base_url + "cashier/Cashier/getRemainingHr",
           data : {employee_id: employee_id, leave_type: leave_type},
           async: false,
           dataType : 'json',
           success : function(data){
              $('#eremaining_hr').val(data.maximum);
           }
      });
     }else{
         $('#accrued3').hide();
         $('#accrued4').hide();
         $('#standred3').show();
         $('#standred4').show();
     }
     $.ajax({
           type: 'ajax',
           method: 'post',
           url: base_url + "cashier/Cashier/getRemainingLeaveById",
           data : {employee_id: employee_id, leave_type: leave_type},
           async: false,
           dataType : 'json',
           success : function(data){
             console.log(data);
             if(data.maximum != ''){
                 var ramin = $('#eremaining_day').val(data.maximum);
             }
             if(data.maxLeave != ''){
                 var ramin =  $('#eremaining_day').val(data.maxLeave.max_leave);
             }
           }
     });
     return false;
});

$('.inputFile6').bind('change', function() {
  var leave_type = $('#leave_type').val();
  var start_date = $('#start_date').val();
  var requested_hr = $('#requested_hr').val();
  var remaining_hr = $('#remaining_hr').val();
  var reason = $('#reason').val();
  if(leave_type == '--Select Leave Type--'){
    $("#leave_err").html("Please select leave type").show();
    return false;
  }else{
    $("#leave_err").html("").show();
  }
  if(start_date == ''){
    $("#start_err").html("Please select start date").show();
    return false;
  }else{
    $("#start_err").html("").show();
  }
  if(requested_hr == '' || requested_hr == 0 || requested_hr <= 0){
      $("#rhrs_err").html("Please enter requested hours").show();
      return false;
  }else{
      $("#rhrs_err").html("").show();
  }
  if(requested_hr > 8){
     $("#rhrs_err").html("Please enter 1 to 8 hours").show();
     return false;
  }else{
    $("#rhrs_err").html("").show();
  }
  if(reason == ''){
     $("#notes_err").html("Please enter the reason").show();
     return false;
  }else{
     $("#notes_err").html("").show();
  }
});

$('#reason').bind('change', function() {
  if($(this).val() == ''){
     $("#notes_err").html("Please enter the reason").show();
     return false;
  }else{
     $("#notes_err").html("").show();
  }
});


$('.inputFile7').bind('change', function() {
  var leave_type = $('#eleave_type').val();
  var start_date = $('#estart_date').val();
  var end_date = $('#end_date').val();
  var requested_hr = $('#erequested_hr').val();
  var remaining_hr = $('#eremaining_hr').val();
  var reason = $('#ereason').val();
  var start = new Date($('#estart_date').val());
  var end = new Date($('#end_date').val());
  var diff = new Date(end - start);
  var sundayCnt = getSundayCountBetweenDates(start, end);
  var remain = $('#remain').val();
  var days = (diff/1000/60/60/24) + 1;
  var totalDays= (days)-sundayCnt;
  $('#erequested_day').val(totalDays);
  if(days == 1){
    $("#erequested_hr").attr("readonly",false);
    $("#erequested_hr").attr("max",8);
    $("#days124_err").html("").show();
  }else{
    $("#erequested_hr").attr("readonly",true);
    $("#erequested_hr").val(totalDays * parseInt(8));   //+ 1
  }

  if(leave_type == '--Select Leave Type--'){
    $("#eleave_err").html("Please select leave type").show();
    return false;
  }else{
    $("#eleave_err").html("").show();
  }
  if(start_date == ''){
    $("#estart_err").html("Please select start date").show();
    return false;
  }else{
    $("#estart_err").html("").show();
  }
  if(end_date == ''){
    $('#erequested_day').val('');
    $("#end_err").html("Please select end date").show();
    return false;
  }else{
    $("#end_err").html("").show();
  }
  if(end_date < start_date){
    $("#date_err").html("End date is less than start date, please select correct date").show();
          return false;
  }else{
    $("#date_err").html("").show();
  }

    if(leave_type == '0'){
      if(requested_hr == '' || requested_hr == 0 || requested_hr <= 0){
         if($("#erequested_hr").attr("readonly")==false){
             $("#erhrs_err").html("Please enter requested hours").show();
             return false;
         }
      }else{
          $("#erhrs_err").html("").show();
      }

      if(parseInt($("#erequested_hr").val()) > parseInt($("#eremaining_hr").val())){
          if(days != 1){
              $("#days124_err").html("Please select correct dates").show();
              return false;
          }
      }else{
          $("#days124_err").html("").show();
      }
    }
    if(totalDays == 1){
      if(requested_hr > 8){
        $("#erhrs_err").html("Please enter requested hours less than 9 hours").show();
          return false;
      }else{
          $("#erhrs_err").html("").show();
      }
    }
    if(reason == ''){
       $("#enotes_err").html("Please enter the reason").show();
       return false;
    }else{
       $("#enotes_err").html("").show();
    }
  });

$('#estart_date').on('change', function() {
    var start = new Date($('#estart_date').val());
    var end = new Date($('#end_date').val());
    var diff = new Date(end - start);
    var days = (diff/1000/60/60/24) + 1;
    var sundayCnt = getSundayCountBetweenDates(start, end);
    var totalDays= (days)-sundayCnt;
    if($('#eleave_type').val() != 0){
        if($('#eremaining_day').val() != '' && $('#erequested_day').val() != ''){
          if(totalDays > $('#eremaining_day').val()){
              $("#days124_err").html("Please select correct dates").show();
              return false;
          }else{
              $("#days124_err").html("").show();
          }
        }
    }else{
        if($('#eremaining_hr').val() != '' && $('#erequested_hr').val() != ''){
          var start = new Date($('#estart_date').val());
          var end = new Date($('#end_date').val());
          var diff = new Date(end - start);
          var days = (diff/1000/60/60/24) + 1;
          if(parseInt($("#erequested_hr").val()) > parseInt($("#eremaining_hr").val())){
              if(days != 1){
                  $("#days124_err").html("Please select correct dates").show();
                  return false;
              }
          }
        }
    }
});

$(document).on('change','#end_date',function(){
    var start = new Date($('#estart_date').val());
    var end = new Date($('#end_date').val());
    var diff = new Date(end - start);
    var days = (diff/1000/60/60/24) + 1;
    var sundayCnt = getSundayCountBetweenDates(start, end);
    var totalDays= (days)-sundayCnt;
    if($('#eleave_type').val() != 0){
        if($('#eremaining_day').val() != '' && $('#erequested_day').val() != ''){
          if(totalDays > $('#eremaining_day').val()){
              $("#days124_err").html("Please select correct dates").show();
              return false;
          }else{
              $("#days124_err").html("").show();
          }
        }
    }else{
      if($('#eremaining_hr').val() != '' && $('#erequested_hr').val() != ''){
        var remaining_hr = $('#eremaining_hr').val();
        var requested_hr = $('#erequested_hr').val();
        if(parseInt($("#erequested_hr").val()) > parseInt($("#eremaining_hr").val())){
            $("#erhrs_err").html("").show();
            $("#days124_err").html("Please select correct dates").show();
            return false;
        }else if(remaining_hr < requested_hr){
            $("#days124_err").html("").show();
        }
      }
    }
});

$('#erequested_hr').on('change', function() {
    if($(this).val() == '' || $(this).val() == 0){
      $("#erhrs_err").html("Please enter requested hours").show();
      return false;
    }else{
        if($('#eremaining_hr').val() != '' && $('#erequested_hr').val() != ''){
          var remaining_hr = $('#eremaining_hr').val();
          var requested_hr = $('#erequested_hr').val();
          if(parseInt($("#erequested_hr").val()) > parseInt($("#eremaining_hr").val())){
              $("#erhrs_err").html("").show();
              $("#days124_err").html("Please select correct dates").show();
              return false;
          }else{
              $("#days124_err").html("").show();
          }
        }
    }
});

$(document).on('click', '#request2', function() {
    $('#exampleModalCenter21').modal('hide');
    $('#request_status').modal('show');
    $("#leave").trigger("click");
    $("#type").trigger("change");
});

function getSundayCountBetweenDates(startDate, endDate){
   var totalSundays = 0;
   for (var i = startDate; i <= endDate; i.setDate(i.getDate()+1)){
       if (i.getDay() == 0) totalSundays++;
   }
   return totalSundays;
}

//using saturday sunday
function calc(start,end) {
    var result = getBusinessDateCount(new Date(start), new Date(end));
    return result;
}
//using //using saturday sunday
function getBusinessDateCount (startDate, endDate) {
    var elapsed, daysBeforeFirstSaturday, daysAfterLastSunday;
    var ifThen = function (a, b, c) {
        return a == b ? c : a;
    };

    elapsed = endDate - startDate;
    elapsed /= 86400000;

    daysBeforeFirstSunday = (7 - startDate.getDay()) % 7;
    daysAfterLastSunday = endDate.getDay();

    elapsed -= (daysBeforeFirstSunday + daysAfterLastSunday);
    elapsed = (elapsed / 7) * 5;
    elapsed += ifThen(daysBeforeFirstSunday - 1, -1, 0) + ifThen(daysAfterLastSunday, 6, 5);
    return Math.ceil(elapsed);
}

$('#Close_popup').on('click', function(){
   $('#request-leave-modal').modal('hide');
   $('#exampleModalCenter21').modal('show');
});

$('#Close_popup1').on('click', function(){
   $('#update-request-leave').modal('hide');
   $('#exampleModalCenter21').modal('show');
});

function Getall_leave_bydate(){
  var leave_req_date=$('#leave_date').val();
   $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/get_leaverequests_by_date",
      data: { leave_req_date: leave_req_date},
      dataType: 'json',
      success: function(data) {
        var trHTML = '';
        $("#tbl_leave").empty();
        if(data == 'Not Found' ){
          $("#tbl_leave").empty();
           $('#tbl_tr_leave').hide();
          trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
        }else{
            $("#tbl_leave").empty();
             $('#tbl_tr_leave').hide();
          $.each(data, function (key,value) {
              date2 = new Date(value.created_at);
              newDate=date2.toLocaleDateString();
              var leave_type=value.leave_type;
              if(leave_type == null){
                trHTML +=  '<tr><td style="text-align:center">'+'Accrued Leave';
              } else {
                trHTML +='<tr><td style="text-align:center">'+leave_type;
              }
     trHTML +='</td><td style="text-align:center">' + value.start_date +
              '</td><td style="text-align:center">' + value.reason +
              '</td><td style="text-align:center">' + value.status +
              '</td></tr>';
        });
        }
        $('#leave_status').append(trHTML);
         trHTML +=" ";
      }
     });
}

//rajeshwari code getleave By Date
function Getall_cash_bydate(){
    var cashadv_date=$('#cash_adv_date').val();
     $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_cashadv_by_date",
        data: { cashadv_date: cashadv_date},
        dataType: 'json',
        success: function(data) {
            var trHTML = '';
          $("#tbl_cashadv").empty();
          if(data == 'Not Found' ){
            $("#tbl_cashadv").empty();
             $('#tbl_tr_cashadv').hide();
            trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
          }else{
              $("#tbl_cashadv").empty();
               $('#tbl_tr_cashadv').hide();
            $.each(data, function (key,value) {
                var dt=value.created_at;
                var first_date = moment(dt).format('MM-DD-YYYY');

             trHTML +=
                '<tr><td style="text-align:center"> $' + value.advance_amount+
                '</td><td style="text-align:center">' + value.reason +
                '</td><td style="text-align:center"> '+ first_date +
                '</td><td style="text-align:center">' + value.status +
                '</td></tr>';
          });
          }

          $('#cash_adv').append(trHTML);
           trHTML +=" ";
        }
       });
}

//** Rajeswari Updated on 19th April //
$('#to_date').on('change', function(){
  var to_date = new Date($('#to_date').val());
  var dd = String(to_date.getDate()).padStart(2, '0');
  var mm = String(to_date.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = to_date.getFullYear();
  to_date = yyyy + '-' + mm + '-' + dd;
  var from_date = new Date($('#from_date').val());
  var dd = String(from_date.getDate()).padStart(2, '0');
  var mm = String(from_date.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = from_date.getFullYear();
  from_date = yyyy + '-' + mm + '-' + dd;
      if(to_date != '' && from_date != ''){
          if(to_date < from_date){
              $("#date_errs").html("To date is less than from date, please select correct date").show();
              return false;
          }else{
              $("#date_errs").html("");
          }
      }
       $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_leaverequests_in_dates",
        data: { from_date:from_date,to_date:to_date, username : $('#req_status_id').val()},
        dataType: 'json',
        success: function(data) {
            var trHTML = '';
            console.log(data);
          $("#tbl_leave").empty();
          if(data == 'Not Found' ){
            $("#tbl_leave").empty();
             $('#tbl_tr_leave').hide();
            trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
          }else{
              $("#tbl_leave").empty();
               $('#tbl_tr_leave').hide();
            $.each(data, function (key,value) {
                date2 = new Date(value.created_at);
                newDate=date2.toLocaleDateString();
                var leave_type=value.leave_type;
                if(leave_type == null){
                  trHTML +=  '<tr><td style="width: 15%;">'+'Accrued Leave';
                } else {
                  trHTML +='<tr><td style="width: 15%;">'+leave_type;
                }

                var str = value.reason;
                var result = str.slice(0, 25) + (str.length > 25 ? "..." : "");

                var str1 = value.deny_reason;
                var result1 = str1.slice(0, 10) + (str1.length > 10 ? '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'+str1+'</span></a>' : "");

       trHTML +='</td><td style="width: 12%;">' + value.start_date +
                '</td><td>' + result +
                '</td><td style="width: 1%;">';
                if(value.status == 'Pending' && value.notes !='') {
                  trHTML +='<a href="#" id="info_Required1" data-chat='+value.status+' data-chat-id='+value.id+' data-sender-id='+value.employee_id+'><b>Info Required</b></a>';
                }else{
                  trHTML += value.status;
                }
                trHTML +='</td><td>' + result1 +
                '</td><td style="text-align:center;width: 20%;">'+'<button type="button" class="btn btn-success updateLeave" data-leave_id='+value.id+' ';
                if(value.status != 'Pending'){
                  trHTML +='disabled';
                }
                trHTML +='>Edit</button><button type="button" class="btn btn-danger ml-2 deleteLeave" data-leave_id='+value.id+' ';
                if(value.status != 'Pending'){
                  trHTML +='disabled';
                }
                trHTML +='>Cancel</button>'+
                                '</td></tr>';
                });
          }
          $('#leave_status').append(trHTML);
           trHTML +=" ";
        }
       });
});

$('#from_date').on('change', function(){
    var to_date = new Date($('#to_date').val());
    var dd = String(to_date.getDate()).padStart(2, '0');
    var mm = String(to_date.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = to_date.getFullYear();
    to_date = yyyy + '-' + mm + '-' + dd;
    var from_date = new Date($('#from_date').val());
    var dd = String(from_date.getDate()).padStart(2, '0');
    var mm = String(from_date.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = from_date.getFullYear();
    from_date = yyyy + '-' + mm + '-' + dd;
      if(to_date != '' && from_date != ''){
          if(to_date < from_date){
              $("#date_errs").html("To date is less than from date, please select correct date").show();
              return false;
          }else{
              $("#date_errs").html("");
          }
      }
       $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_leaverequests_in_dates",
        data: { from_date:from_date,to_date:to_date},
        dataType: 'json',
        success: function(data) {
            var trHTML = '';
            // trHTML =" ";
            console.log(data);
          $("#tbl_leave").empty();
          if(data == 'Not Found' )
          {
            //$('#tbl_tr_payout').hide();
            $("#tbl_leave").empty();
             $('#tbl_tr_leave').hide();
            trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
          }
          else
          {
              $("#tbl_leave").empty();
               $('#tbl_tr_leave').hide();
            $.each(data, function (key,value) {
                date2 = new Date(value.created_at);
                newDate=date2.toLocaleDateString();
                var leave_type=value.leave_type;
                if(leave_type == null){
                  trHTML +=  '<tr><td style="width: 15%;">'+'Accrued Leave';
                } else {
                  trHTML +='<tr><td style="width: 15%;">'+leave_type;
                }

                var str = value.reason;
                var result = str.slice(0, 25) + (str.length > 25 ? "..." : "");

                var str1 = value.deny_reason;
                var result1 = str1.slice(0, 10) + (str1.length > 10 ? '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'+str1+'</span></a>' : "");

       trHTML +='</td><td style="width: 12%;">' + value.start_date +
                '</td><td>' + result +
                '</td><td style="width: 1%;">';
                if(value.status == 'Pending' && value.notes !='') {
                  trHTML +='<a href="#" id="info_Required1" data-chat='+value.status+' data-chat-id='+value.id+' data-sender-id='+value.employee_id+'><b>Info Required</b></a>';
                }else{
                  trHTML += value.status;
                }
                trHTML +='</td><td>' + result1 +
                '</td><td style="text-align:center; width: 20%;">'+'<button type="button" class="btn btn-success updateLeave" data-leave_id='+value.id+' ';
                if(value.status != 'Pending'){
                  trHTML +='disabled';
                }
                trHTML +='>Edit</button><button type="button" class="btn btn-danger ml-2 deleteLeave" data-leave_id='+value.id+' ';
                if(value.status != 'Pending'){
                  trHTML +='disabled';
                }
                trHTML +='>Cancel</button>'+
                                '</td></tr>';
                });
          }
          $('#leave_status').append(trHTML);
           trHTML +=" ";
        }
       });
});

function Getall_leave_bytype(){
    $("#tbl_leave").empty();
    var leave_req_type=$('#type').val();
    var to_date=$('#to_date').val();
    var from_date=$('#from_date').val();
    if(leave_req_type === "DateRange"){
        $('#from_to_date').show();
        $('#to_dates').show();
        $('.ttdates').show();
        if(from_date===''){
           $("#from_err").html(" Please Select From Date").show();
           return false;
        }
        if(to_date===''){
           $("#to_err").html(" Please Select To Date").show();
           return false;
        }
        if(to_date != '' && from_date != ''){
            if(to_date < from_date){
                $("#date_errs").html("To date is less than from date, please select correct date").show();
                return false;
            }else{
                $("#date_errs").html("");
            }
        }
    }else{
       $('#from_to_date').hide();
       $('#to_dates').hide();
       $('.ttdates').hide();
       $("#date_errs").html("");
    }

     $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_leaverequests_by_type",
        data: { leave_req_type: leave_req_type,from_date:from_date,to_date:to_date, username : $('#req_status_id').val()},
        dataType: 'json',
        success: function(data) {
            var trHTML = '';
            // trHTML =" ";
            console.log(data);
          $("#tbl_leave").empty();
          if(data == 'Not Found' ){
            $("#tbl_leave").empty();
             $('#tbl_tr_leave').hide();
            trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
          }else{
              $("#tbl_leave").empty();
               $('#tbl_tr_leave').hide();
            $.each(data, function (key,value) {
                date2 = new Date(value.created_at);
                newDate=date2.toLocaleDateString();
                var leave_type=value.leave_type;
                if(leave_type == null){
                  trHTML +=  '<tr><td style="width: 15%;">'+'Accrued Leave';
                } else {
                  trHTML +='<tr><td style="width: 15%;">'+leave_type;
                }
                var str = value.reason;
                var result = str.slice(0, 35) + (str.length > 35 ? "..." : "");
                var str1 = value.deny_reason;
                var result1 = str1.slice(0, 10) + (str1.length > 10 ? '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'+str1+'</span></a>' : "");

                trHTML +='</td><td style="width: 12%;">' + value.start_date +
                '</td><td>' + result +
                '</td><td style="width: 1%;">';
                if(value.status == 'Pending' && value.notes !='') {
                  trHTML +='<a href="#" id="info_Required1" data-chat='+value.status+' data-chat-id='+value.id+' data-sender-id='+value.employee_id+'><b>Info Required</b></a>';
                }else{
                  trHTML += value.status;
                }
                trHTML +='</td><td>' + result1 +
                '</td><td style="text-align:center; width:20%;">'+'<button type="button" class="btn btn-success updateLeave" data-leave_id='+value.id+' ';
                if(value.status != 'Pending'){
                trHTML +='disabled';
                        }
                trHTML +='>Edit</button><button type="button" class="btn btn-danger ml-2 deleteLeave" data-leave_id='+value.id+' ';
                if(value.status != 'Pending'){
                  trHTML +='disabled';
                }
                trHTML +='>Cancel</button>'+
                '</td></tr>';
            });
          }
          $('#leave_status').append(trHTML);
           trHTML +=" ";
        }
       });
}


function Getall_cash_bytype(){
   var cash_req_type=$('#cash_type').val();
    var to_cash_date=$('#to_cash_date').val();
    var from_cash_date=$('#from_cash_date').val();
    if(cash_req_type === "DateRange"){
        $('#from_date_cash').show();
        $('#to_cashs').show();
        $('.ttcashs').show();
        $("#tbl_cashadv").empty();
        if(from_cash_date===''){
        $("#from_cash_err").html(" Please select from date").show();
          return false;
        }
         if(to_cash_date===''){
        $("#to__cash_err").html(" Please select to date").show();
          return false;
        }
        if(to_cash_date != '' && from_cash_date != ''){
            if(to_cash_date < from_cash_date){
                $("#date_cash_errs").html("To date is less than from date, please select correct date").show();
                return false;
            }else{
                $("#date_cash_errs").html("");
            }
        }
    }else{
         $('#from_date_cash').hide();
         $('#to_cashs').hide();
         $('.ttcashs').hide();
         $('#date_cash_errs').html('');
    }

     $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_cashadv_by_type",
        data: { cash_req_type: cash_req_type, username : $('#req_status_id').val()},
        dataType: 'json',
        success: function(data) {
            var trHTML = '';
            // trHTML =" ";
            console.log(data);
          $("#tbl_cashadv").empty();
          if(data == 'Not Found' )
          {
            //$('#tbl_tr_payout').hide();
            $("#tbl_cashadv").empty();
             $('#tbl_tr_cashadv').hide();
            trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
          }
          else
          {
              $("#tbl_cashadv").empty();
               $('#tbl_tr_cashadv').hide();
            $.each(data, function (key,value) {
                var dt=value.created_at;
                var first_date = moment(dt).format('MM-DD-YYYY');
                var str = value.reason;
                var result = str.slice(0, 25) + (str.length > 25 ? "..." : "");

                var str1 = value.denied_reason;
                var result1 = str1.slice(0, 15) + (str1.length > 15 ? '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'+str1+'</span></a>' : "");

             trHTML +=
                '<tr><td style="width: 8%;"> $' + value.advance_amount+
                '</td><td style="width: 12%;">' + first_date +
                '</td><td style="width: 24%;"> '+ result +
                '</td><td style="width: 1%;">';
                if(value.status == 'Pending' && value.notes !='') {
                  trHTML +='<a href="#" id="info_required" data-chat='+value.status+' data-chat-id='+value.id+' data-sender-id='+value.employee_id+' ><b>Info Required</b></a>';
                }else{
                  trHTML += value.status;
                }
                trHTML +='</td><td>' + result1 +
                '</td><td style="text-align:center;width:20%;">'+'<button type="button" class="btn btn-success updateCash" data-cash_id='+value.id+' ';
                if(value.status != 'Pending'){
                  trHTML +='disabled';
                }
                trHTML +='>Edit</button><button type="button" class="btn btn-danger ml-2 deleteCash" data-cash_id='+value.id+' ';
                if(value.status != 'Pending'){
                  trHTML +='disabled';
                }
                trHTML +='>Cancel</button>'+
                                '</td></tr>';
              });
          }
          $('#cash_adv').append(trHTML);
           trHTML +=" ";
        }
       });
}

$('.inputFile11').bind('change', function() {
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    if(from_date == ''){
      $("#from_err").html("Please select from date").show();
      return false;
    }else{
      $("#from_err").html("").show();
    }
    if(to_date == ''){
      $("#to_err").html("Please select to date").show();
      return false;
    }else{
      $("#to_err").html("").show();
    }
 });

$('.inputFile12').bind('change', function() {
    var from_cash_date = $('#from_cash_date').val();
    var to_cash_date = $('#to_cash_date').val();
    if(from_cash_date == ''){
      $("#from_cash_err").html("Please select from date").show();
      return false;
    }else{
      $("#from_cash_err").html("").show();
    }
    if(to_cash_date == ''){
      $("#to_cash_err").html("Please select to date").show();
      return false;
    }else{
      $("#to_cash_err").html("").show();
    }
});

$('#to_cash_date').on('change', function(){
   $("#tbl_cashadv").empty();

   var to_cash_date = new Date($('#to_cash_date').val());
   var dd = String(to_cash_date.getDate()).padStart(2, '0');
   var mm = String(to_cash_date.getMonth() + 1).padStart(2, '0'); //January is 0!
   var yyyy = to_cash_date.getFullYear();
   var to_cash_date = yyyy + '-' + mm + '-' + dd;
   var from_cash_date = new Date($('#from_cash_date').val());
   var dd = String(from_cash_date.getDate()).padStart(2, '0');
   var mm = String(from_cash_date.getMonth() + 1).padStart(2, '0'); //January is 0!
   var yyyy = from_cash_date.getFullYear();
   var from_cash_date = yyyy + '-' + mm + '-' + dd;
    if(to_cash_date != '' && from_cash_date != ''){
        if(to_cash_date < from_cash_date){
            $("#date_cash_errs").html("To date is less than from date, please select correct date").show();
            return false;
        }else{
            $("#date_cash_errs").html("");
        }
    }
     $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/get_cashrequests_in_dates",
      data: { from_cash_date:from_cash_date,to_cash_date:to_cash_date, username : $('#req_status_id').val()},
      dataType: 'json',
      success: function(data) {
          var trHTML = '';
          // trHTML =" ";
          console.log(data);
        $("#tbl_cashadv").empty();
        if(data == 'Not Found' ){
          $("#tbl_cashadv").empty();
           $('#tbl_tr_cashadv').hide();
          trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
        }else{
            $("#tbl_cashadv").empty();
             $('#tbl_tr_cashadv').hide();
          $.each(data, function (key,value) {
              var dt=value.created_at;
              var first_date = moment(dt).format('MM-DD-YYYY');
              var str = value.reason;
              var result = str.slice(0, 25) + (str.length > 25 ? "..." : "");
              var str1 = value.denied_reason;
              var result1 = str1.slice(0, 15) + (str1.length > 15 ? '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'+str1+'</span></a>' : "");

           trHTML +=
              '<tr><td style="width: 8%;"> $' + value.advance_amount+
              '</td><td style="width: 12%;">' + first_date +
              '</td><td style="width: 24%;"> '+ result +
              '</td><td style="width: 1%;">';
              if(value.status == 'Pending' && value.notes !='') {
                trHTML +='<a href="#" id="info_required" data-chat='+value.status+' data-chat-id='+value.id+' data-sender-id='+value.employee_id+'><b>Info Required</b></a>';
              }else{
                trHTML += value.status;
              }
              trHTML +='</td><td>' + result1 +
              '</td><td style="text-align:center;width:20%;">'+'<button type="button" class="btn btn-success updateCash" data-cash_id='+value.id+' ';
              if(value.status != 'Pending'){
                trHTML +='disabled';
              }
              trHTML +='>Edit</button><button type="button" class="btn btn-danger ml-2 deleteCash" data-cash_id='+value.id+' ';
              if(value.status != 'Pending'){
                trHTML +='disabled';
              }
              trHTML +='>Cancel</button>'+
                              '</td></tr>';
              });
        }

        $('#cash_adv').append(trHTML);
         trHTML +=" ";
      }
     });
});

 $('#from_cash_date').on('change', function(){
     $("#tbl_cashadv").empty();
     var to_cash_date = new Date($('#to_cash_date').val());
     var dd = String(to_cash_date.getDate()).padStart(2, '0');
     var mm = String(to_cash_date.getMonth() + 1).padStart(2, '0'); //January is 0!
     var yyyy = to_cash_date.getFullYear();
     var to_cash_date = yyyy + '-' + mm + '-' + dd;
     var from_cash_date = new Date($('#from_cash_date').val());
     var dd = String(from_cash_date.getDate()).padStart(2, '0');
     var mm = String(from_cash_date.getMonth() + 1).padStart(2, '0'); //January is 0!
     var yyyy = from_cash_date.getFullYear();
     var from_cash_date = yyyy + '-' + mm + '-' + dd;
      if(to_cash_date != '' && from_cash_date != ''){
          if(to_cash_date < from_cash_date){
              $("#date_cash_errs").html("To date is less than from date, please select correct date").show();
              return false;
          }else{
              $("#date_cash_errs").html("");
          }
      }
       $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_cashrequests_in_dates",
        data: { from_cash_date:from_cash_date,to_cash_date:to_cash_date, username : $('#req_status_id').val()},
        dataType: 'json',
        success: function(data) {
            var trHTML = '';
            // trHTML =" ";
            console.log(data);
          $("#tbl_cashadv").empty();
          if(data == 'Not Found' ){
            $("#tbl_cashadv").empty();
             $('#tbl_tr_cashadv').hide();
            trHTML += '<tr><td colspan="6">No Data Found</td></tr>';
          }else{
              $("#tbl_cashadv").empty();
               $('#tbl_tr_cashadv').hide();
            $.each(data, function (key,value) {
                var dt=value.created_at;
                var first_date = moment(dt).format('MM-DD-YYYY');
                var str = value.reason;
                var result = str.slice(0, 25) + (str.length > 25 ? "..." : "");
                var str1 = value.denied_reason;
                var result1 = str1.slice(0, 15) + (str1.length > 15 ? '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'+str1+'</span></a>' : "");

             trHTML +=
                '<tr><td style="width: 8%;"> $' + value.advance_amount+
                '</td><td style="width: 12%;">' + first_date +
                '</td><td style="width: 24%;"> '+ result +
                '</td><td style="width: 1%;">';
                if(value.status == 'Pending' && value.notes !='') {
                  trHTML +='<a href="#" id="info_required" data-chat='+value.status+' data-chat-id='+value.id+' data-sender-id='+value.employee_id+'><b>Info Required</b></a>';
                }else{
                  trHTML += value.status;
                }
                trHTML +='</td><td>' + result1 +
                '</td><td style="text-align:center;width:20%;">'+'<button type="button" class="btn btn-success updateCash" data-cash_id='+value.id+' ';
                if(value.status != 'Pending'){
                  trHTML +='disabled';
                }
                trHTML +='>Edit</button><button type="button" class="btn btn-danger ml-2 deleteCash" data-cash_id='+value.id+' ';
                if(value.status != 'Pending'){
                  trHTML +='disabled';
                }
                trHTML +='>Cancel</button>'+
                                '</td></tr>';
                });
          }
          $('#cash_adv').append(trHTML);
           trHTML +=" ";
        }
       });
});

$('#bleave8').on('click', function(){
   $('#request_status').modal('hide');
   $('#exampleModalCenter21').modal('show');
});

// 27-APR-2021
$(document).on('click', '.updateLeave', function(){
    var leave_id = $(this).data('leave_id');
    var employee_id = $('.hidden_emp1').val();
    $('#update-request-leave').modal('show');
    $('#request_status').modal('hide');
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_leave_by_id",
        data: {employee_id: employee_id, leave_id : leave_id},
        dataType: 'json',
        success: function(data) {
          console.log(data);
            $('#lleave_id').val(data.leave_id);
            $('#leave_type1').val(data.leaveType);
            $('#start_date1').val(data.start_date);
            $('#reason1').val(data.reason);
            $('#remaining_day1').val(data.remaining_leaves);
            $('#eleave_type1').val(data.leaveType);
            $('#estart_date1').val(data.start_date);
            $('#end_date1').val(data.end_date);
            $('#ereason1').val(data.reason);
            $('#eremaining_day1').val(data.remaining_leaves);
            $('#erequested_day1').val(data.days_requested);
            if(data.leaveType == '0'){
                $('#accrued11').show();
                $('#accrued12').show();
                $('#standred11').hide();
                $('#standred12').hide();
                $('#remaining_hr1').val(data.remaining_hr);
                $('#requested_hr1').val(data.hours_requested);
                $('#oldrequested_hr1').val(data.hours_requested);
                $('#eremaining_hr1').val(data.remaining_hr);
                $('#erequested_hr1').val(data.hours_requested);
                $('#accrued31').show();
                $('#accrued41').show();
                $('#standred31').hide();
                $('#standred41').hide();
            }else{
                $('#accrued11').hide();
                $('#accrued12').hide();
                $('#standred11').show();
                $('#standred12').show();
                $('#accrued31').hide();
                $('#accrued41').hide();
                $('#standred31').show();
                $('#standred41').show();
            }

            if(data.days_requested == 1){
                $('.p11').addClass('activetab');
                $('.p12').removeClass('activetab');
                $('.pill12').css('color', 'black');
                $('.pill11').css('color', "red");
                $('.first1').show();
                $('.second1').hide();
                $('#vacation-leave').hide();
                $('#oneday-leave').show();
            }else{
                $('.p12').addClass('activetab');
                $('.p11').removeClass('activetab');
                $('.pill11').css('color', 'black');
                $('.pill12').css('color', "red");
                $('.first1').hide();
                $('.second1').show();
                $('#vacation-leave').show();
                $('#oneday-leave').hide();
            }
        },
    });
    return false;
});

$('.pill11').on('click', function() {
  $('.p11').addClass('activetab');
  $('.p12').removeClass('activetab');
  $('.pill12').css('color', 'black');
  $(this).css('color', "red");
  $('#vacation-leave').hide();
  $('#oneday-leave').show();
  $('.first1').show();
  $('.second1').hide();
  var leave_type = $('#leave_type1').val();
  if (leave_type == 0) {
      $('#accrued11').show();
      $('#accrued12').show();
      $('#standred11').hide();
      $('#standred12').hide();
  }else{
      $('#accrued11').hide();
      $('#accrued12').hide();
      $('#standred11').show();
      $('#standred12').show();
  }
})
$('.pill12').on('click', function() {
  $('.p12').addClass('activetab');
  $('.p11').removeClass('activetab');
  $('.pill11').css('color', 'black');
  $(this).css('color', 'red');
  $('#vacation-leave').show();
  $('#oneday-leave').hide();
  $('.first1').hide();
  $('.second1').show();
    var leave_type = $('#eleave_type1').val();
    if (leave_type == '0') {
        $('#accrued31').show();
        $('#accrued41').show();
        $('#standred31').hide();
        $('#standred41').hide();
    }else{
        $('#standred31').show();
        $('#standred41').show();
        $('#accrued31').hide();
        $('#accrued41').hide();
    }
})

$('.first1').on('click', function() {
  var employee_id = $('.hidden_emp1').val();
  var leave_id = $('#lleave_id').val();
  var leave_type = $('#leave_type1').val();
  var start_date = $('#start_date1').val();
  var requested_hr = $('#requested_hr1').val();
  var remaining_hr = $('#remaining_hr1').val();
  var requested_day = $('#requested_day1').val();
  var oldrequested_hr1 = $('#oldrequested_hr1').val();
  var reason = $('#reason1').val();
  if(start_date == ''){
    $("#start_err1").html("Please select Start Date").show();
    return false;
  }
  if(leave_type == '0'){
      if(remaining_hr == '' || remaining_hr == 0 || remaining_hr <= 0){
          $("#mhrs_err1").html("Please enter requested hours").show();
           return false;
      }
      if(requested_hr == '' || requested_hr == 0 || requested_hr <= 0){
          $("#rhrs_err1").html("Please enter requested hours").show();
           return false;
      }
      if(requested_hr > 8){
         $("#rhrs_err1").html("Please enter 1 to 8 Hours").show();
         return false;
      }
  }
  if(reason == ''){
     $("#notes_err1").html("Please enter the reason").show();
     return false;
  }

    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/update_leave_request",
      data: {
            employee_id: employee_id,
            leave_id: leave_id,
            leave_type:leave_type,
            start_date:start_date,
            requested_day:requested_day,
            requested_hr:requested_hr,
            remaining_hr:remaining_hr,
            reason:reason,
            oldrequested_hr1: oldrequested_hr1,
          },
      dataType: 'json',
      success: function(data) {
          console.log(data);
          $('.update-leave')[0].reset();
          $('#update-request-leave').modal('hide');
          swal({
              text: "Leave Request successfully Updated!",
              icon: "success",
              buttons: false,
          });
          setTimeout( function (){
              window.location= base_url + "cashier";
          },1600);
      },
  });
  return false;
});

$('#leave_type1').on('change', function() {
     var leave_type = $(this).val();
     var employee_id = $('.hidden_emp1').val();
     if(leave_type == '0'){
         $('#accrued11').show();
         $('#accrued12').show();
         $('#standred11').hide();
         $('#standred12').hide();

         $.ajax({
           type: 'ajax',
           method: 'post',
           url: base_url + "cashier/Cashier/getRemainingHr",
           data : {employee_id: employee_id, leave_type: leave_type},
           async: false,
           dataType : 'json',
           success : function(data){
              $('#remaining_hr1').val(data.maximum);
              if(data.maximum != ''){
                  var ramin = $('#remaining_day1').val(data.maximum);
              }
              if(data.maxLeave != ''){
                  var ramin =  $('#remaining_day1').val(data.maxLeave.max_leave);
              }
           }
      });
     }else{
           $('#accrued11').hide();
           $('#accrued12').hide();
           $('#standred11').show();
           $('#standred12').show();
     }
     $.ajax({
           type: 'ajax',
           method: 'post',
           url: base_url + "cashier/Cashier/getRemainingLeaveById",
           data : {employee_id : employee_id, leave_type: leave_type},
           async: false,
           dataType : 'json',
           success : function(data){

              if(data.maximum != ''){
                   var ramin = $('#remaining_day1').val(data.maximum);
              }
              if(data.maxLeave != ''){
                 var ramin =  $('#remaining_day1').val(data.maxLeave.max_leave);
              }
           }
     });
     return false;
});

$('.pill12').on('click', function() {
   $('.second1').show();
   $('.first1').hide();
   var leave_type = $('#eleave_type').val();
   var employee_id = $('.hidden_emp1').val();
      $.ajax({
           type: 'ajax',
           method: 'post',
           url: base_url + "cashier/Cashier/getRemainingLeaveById",
           data : {employee_id:employee_id, leave_type: leave_type},
           async: false,
           dataType : 'json',
           success : function(data){
              if(data.maxLeave.max_leave != '' || data.maxLeave.max_leave != 'undefined'){
                  $('#eremaining_day').val(data.maxLeave.max_leave);
              }else{
                $('#eremaining_day').val(data.maximum);
              }
           }
     });
});

$('.inputFile70').bind('change', function() {
  var leave_type = $('#eleave_type1').val();
  var start_date = $('#estart_date1').val();
  var end_date = $('#end_date1').val();
  var requested_hr = $('#erequested_hr1').val();
  var remaining_hr = $('#eremaining_hr1').val();
  var reason = $('#ereason1').val();
  var start = new Date($('#estart_date1').val());
  var end = new Date($('#end_date1').val());
  var diff = new Date(end - start);
  var sundayCnt = getSundayCountBetweenDates(start, end);
  var days = (diff/1000/60/60/24) + 1;
  var totalDays= (days)-sundayCnt;
  $('#erequested_day1').val(totalDays);
  if(days == 1){
    $("#erequested_hr1").attr("readonly",false);
    $("#erequested_hr1").attr("max",8);
  }else{
    $("#erequested_hr1").attr("readonly",true);
    $("#erequested_hr1").val(totalDays * parseInt(8));   //+ 1
  }
  if(end_date < start_date){
    $("#date_err1").html("End date is less than start date, please select correct date").show();
          return false;
  }else{
    $("#date_err1").html("").show();
  }

  if(leave_type == '0'){
    if(requested_hr == '' || requested_hr == 0 || requested_hr <= 0){
        $("#erhrs_err1").html("").show();
        return false;
    }else{
        $("#erhrs_err1").html("").show();
    }
  }
  if(totalDays == 1){
    if(requested_hr > 8){
      $("#erhrs_err1").html("Please enter requested hours less than 9 hours").show();
        return false;
    }else{
        $("#erhrs_err1").html("").show();
    }
  }
  if(reason == ''){
     $("#enotes_err1").html("Please enter the reason").show();
     return false;
  }else{
     $("#enotes_err1").html("").show();
  }
});

$('.second1').on('click', function() {
  var employee_id = $('.hidden_emp1').val();
  var leave_id = $('#lleave_id').val();
  var leave_type = $('#eleave_type1').val();
  var start_date = $('#estart_date1').val();
  var end_date = $('#end_date1').val();
  var requested_hr = $('#erequested_hr1').val();
  var remaining_hr = $('#eremaining_hr1').val();
  var reason = $('#ereason1').val();
  var start = new Date($('#estart_date1').val());
  var end = new Date($('#end_date1').val());
  var diff = new Date(end - start);
  var sundayCnt = getSundayCountBetweenDates(start, end);

  var days = (diff/1000/60/60/24) + 1;
  var totalDays= (days)-sundayCnt;
  $('#erequested_day1').val(totalDays);
  var requested_day = $('#erequested_day1').val();
  if(end_date < start_date){
    $("#date_err1").html("End date is less than start date, please select correct date").show();
    return false;
  }
  if(leave_type == '0'){
    if(requested_hr == '' || requested_hr == 0 || requested_hr <= 0){
      $("#erhrs_err1").html("Please enter requested hours").show();
      return false;
    }

    if(parseInt($("#erequested_hr1").val()) > parseInt($("#eremaining_hr1").val())){
        $("#days1241_err").html("Please select correct dates").show();
        return false;
    }
  }
  if(leave_type != '0'){
    if(totalDays > $('#eremaining_day1').val()){
      $("#days1241_err").html("Please select correct dates").show();
      return false;
    }
  }
  if(totalDays == 1){
    if(requested_hr > 8){
      $("#erhrs_err1").html("Please enter Requested Hours less than 9 hours").show();
        return false;
    }else{
        $("#erhrs_err1").html("").show();
    }
  }
  if(reason == ''){
     $("#enotes_err1").html("Please enter the reason").show();
     return false;
  }

    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/update_leave_request",
      data: {
            employee_id: employee_id,
            leave_id:leave_id,
            leave_type:leave_type,
            start_date:start_date,
            end_date:end_date,
            requested_day:requested_day,
            requested_hr:requested_hr,
            reason:reason
          },
      async: false,
      dataType: 'json',
      success: function(data) {
          $('.update-leave')[0].reset();
          $('#update-request-leave').modal('hide');
          swal({
              text: "Leave Request successfully Updated!",
              icon: "success",
              buttons: false,
          });
          setTimeout( function (){
            window.location= base_url + "cashier";
          },1600);
      },
  });
  return false;
});

$('#eleave_type1').on('change', function() {
     var leave_type = $(this).val();
     var employee_id = $('.hidden_emp1').val();
     if(leave_type == '0'){
         $('#accrued31').show();
         $('#accrued41').show();
         $('#standred31').hide();
         $('#standred41').hide();
         $.ajax({
             type: 'ajax',
             method: 'post',
             url: base_url + "cashier/Cashier/getRemainingHr",
             data : {employee_id: employee_id, leave_type: leave_type},
             async: false,
             dataType : 'json',
             success : function(data){
                $('#eremaining_hr1').val(data.maximum);
             }
        });
     }else{
         $('#accrued31').hide();
         $('#accrued41').hide();
         $('#standred31').show();
         $('#standred41').show();
     }
     $.ajax({
           type: 'ajax',
           method: 'post',
           url: base_url + "cashier/Cashier/getRemainingLeaveById",
           data : {employee_id: employee_id, leave_type: leave_type},
           async: false,
           dataType : 'json',
           success : function(data){
              if(data.maximum != ''){
                   var ramin = $('#eremaining_day1').val(data.maximum);
              }
              if(data.maxLeave != ''){
                 var ramin =  $('#eremaining_day1').val(data.maxLeave.max_leave);
              }
           }
     });
     return false;
});

$('.inputFile60').bind('change', function() {
  var leave_type = $('#leave_type1').val();
  var start_date = $('#start_date1').val();
  var requested_hr = $('#requested_hr1').val();
  var remaining_hr = $('#remaining_hr1').val();
  var reason = $('#reason1').val();

  var start = new Date($('#estart_date1').val());
  var end = new Date($('#end_date1').val());
  var diff = new Date(end - start);
  var sundayCnt = getSundayCountBetweenDates(start, end);
  var days = (diff/1000/60/60/24) + 1;
  var totalDays= (days)-sundayCnt;

  if(leave_type == '--Select Leave Type--'){
    $("#leave_err1").html("Please select leave type").show();
    return false;
  }else{
    $("#leave_err1").html("").show();
  }
  if(start_date == ''){
    $("#start_err1").html("Please select start date").show();
    return false;
  }else{
    $("#start_err1").html("").show();
  }
  if(requested_hr == '' || requested_hr == 0 || requested_hr <= 0){
      $("#rhrs_err1").html("Please enter requested hours").show();
      return false;
  }else{
      $("#rhrs_err1").html("").show();
  }
  if(requested_hr > 8){
     $("#rhrs_err1").html("Please enter 1 to 8 hours").show();
     return false;
  }else{
    $("#rhrs_err1").html("").show();
  }



  if(leave_type == '0'){
    if(requested_hr == '' || requested_hr == 0 || requested_hr <= 0){
       if($("#requested_hr1").attr("readonly")==false){
           $("#rhrs_err1").html("Please enter requested hours").show();
           return false;
       }
    }else{
        $("#rhrs_err1").html("").show();
    }

    if(parseInt($("#requested_hr1").val()) > parseInt($("#requested_hr1").val())){
        if(days != 1){
            $("#days1241_err").html("Please select correct dates").show();
            return false;
        }
    }else{
        $("#days1241_err").html("").show();
    }
  }
  if(totalDays == 1){
    if(requested_hr > 8){
      $("#rhrs_err1").html("Please enter requested hours less than 9 hours").show();
        return false;
    }else{
        $("#rhrs_err1").html("").show();
    }
  }





  if(reason == ''){
     $("#notes_err1").html("Please enter the reason").show();
     return false;
  }else{
     $("#notes_err1").html("").show();
  }
});

$('#estart_date1').on('change', function() {
    var start = new Date($('#estart_date1').val());
    var end = new Date($('#end_date1').val());
    var diff = new Date(end - start);
    var days = (diff/1000/60/60/24) + 1;
    var sundayCnt = getSundayCountBetweenDates(start, end);
    var totalDays= (days)-sundayCnt;
    if($('#leave_type1').val() != 0){
        if($('#eremaining_day1').val() != '' && $('#erequested_day1').val() != ''){
          if(totalDays > $('#eremaining_day1').val()){
              $("#days1241_err").html("Please select correct dates").show();
              return false;
          }else{
              $("#days1241_err").html("").show();
          }
        }
    }else{
        if($('#eremaining_hr1').val() != '' && $('#erequested_hr1').val() != ''){
          var start = new Date($('#estart_date1').val());
          var end = new Date($('#end_date1').val());
          var diff = new Date(end - start);
          var days = (diff/1000/60/60/24) + 1;
          if(parseInt($("#erequested_hr1").val()) > parseInt($("#eremaining_hr1").val())){
              if(days != 1){
                  $("#days1241_err").html("Please select correct dates").show();
                  return false;
              }
          }
        }
    }
});

$(document).on('change','#end_date1',function(){
    var start = new Date($('#estart_date1').val());
    var end = new Date($('#end_date1').val());
    var diff = new Date(end - start);
    var days = (diff/1000/60/60/24) + 1;
    var sundayCnt = getSundayCountBetweenDates(start, end);
    var totalDays= (days)-sundayCnt;
    if($('#leave_type1').val() != 0){
        if($('#eremaining_day1').val() != '' && $('#erequested_day1').val() != ''){
          if(totalDays > $('#eremaining_day1').val()){
              $("#days1241_err").html("Please select correct dates").show();
              return false;
          }else{
              $("#days1241_err").html("").show();
          }
        }
    }else{
      if($('#eremaining_hr1').val() != '' && $('#erequested_hr1').val() != ''){
        var remaining_hr = $('#eremaining_hr1').val();
        var requested_hr = $('#erequested_hr1').val();
        if(parseInt($("#erequested_hr1").val()) > parseInt($("#eremaining_hr1").val())){
            $("#rhrs_err1").html("").show();
            $("#days1241_err").html("Please select correct dates").show();
            return false;
        }else if(remaining_hr < requested_hr){
            $("#days1241_err").html("").show();
        }
      }
    }
});

$('#reason1').bind('change', function() {
    if($(this).val() == ''){
       $("#notes_err1").html("Please enter the reason").show();
       return false;
    }else{
       $("#notes_err1").html("").show();
    }
});

$(document).on('click', '.deleteLeave', function(){
    var leave_id = $(this).data('leave_id');
    $(this).closest('tr').addClass('removeRow');
    swal({
        text: "Are you sure you want to cancel this Leave Request ?",
        buttons: ["Cancel", true],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: base_url + "cashier/Cashier/delete_leave",
                method: "POST",
                data: {leave_id: leave_id},
                success: function() {
                  $('.removeRow').fadeOut(1500);
                    window.location= base_url + "cashier";
                }
            })
        }
    });
});

$(document).on('click', '.deleteCash', function(){
      var cash_id = $(this).data('cash_id');
      $(this).closest('tr').addClass('removeRow');
      swal({
          text: "Are you sure you want to cancel this Cash Advance Request?",
          buttons: ["Cancel", true],
          dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: base_url + "cashier/Cashier/delete_cash",
                  method: "POST",
                  data: {cash_id: cash_id},
                  success: function() {
                    $('.removeRow').fadeOut(1500);
                      window.location= base_url + "cashier";
                  }
              })
          }
      });
  });

  $(document).on('click', '.updateCash', function(){
      var cash_id = $(this).data('cash_id');
      $('#update-request-cash').modal('show');
      $('#request_status').modal('hide');
      $.ajax({
          type: 'ajax',
          method: 'post',
          url: base_url + "cashier/Cashier/get_cashadv_by_id",
          data: {cash_id : cash_id},
          dataType: 'json',
          success: function(data) {
              $('#ccash_id').val(data.id);
              $('#advance_amount1').val(data.advance_amount);
              $('#reasonadv2').val(data.reason);
              $('#selPaycheck1').val(data.paycheck);
          },
      });
      return false;
  });

$('#btnAdv1').on('click', function() {
    var amt = $('#paycheckAMT1').val();
    if ($('#advance_amount1').val() == '' || $('#advance_amount1').val() == 0) {
      $("#amt_err1").html("Please enter the correct amount").show();
      return false;
    }
    if(parseFloat($('#paycheckAMT1').val()) < parseFloat($('#advance_amount1').val())){
        $("#amt_err1").html("Amount entered is exceeding your limit").show();
        return false;
    }
    if ($('#reasonadv2').val() == '') {
      $("#reasonadv_err2").html("Please enter the reason").show();
      return false;
    }
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/update_advancecash",
      data: $('.advance-update-cash').serialize(),
      async: false,
      dataType: 'json',
      success: function(data) {
        $('.advance-update-cash')[0].reset();
        if(data == 'success'){
          swal({
              title: "Success!",
              text: "Cash Advance Request successfully Updated!",
              icon: "success",
              buttons: false,
          });
          $('#update-request-cash').modal('hide');
        }
        setTimeout( function (){
          window.location= base_url + "cashier";
        },1600);
      },
    });
    return false;
});


$('.inputFile51').bind('change', function() {
    var amt = $('#paycheckAMT1').val();
    if ($('#advance_amount1').val() == '' || $('#advance_amount1').val() == 0) {
      $("#amt_err1").html("Please enter the correct amount").show();
      return false;
    } else {
      $("#amt_err1").html("").show();
    }
    if(parseFloat($('#paycheckAMT1').val()) < parseFloat($('#advance_amount1').val())){
        $("#amt_err1").html("Amount entered is exceeding your limit").show();
        return false;
    }else{
         $("#amt_err1").html("").show();
    }
    if ($('#reasonadv2').val() == '') {
      $("#reasonadv_err2").html("Please enter the reason").show();
      return false;
    } else {
      $("#reasonadv_err2").html("").show();
    }
});
  // keyboard drag code start
$(document).ready(function() {
var $dragging = null;

$(document.body).on("mousemove", function(e) {
    if ($dragging) {
        $dragging.offset({
            top: e.pageY,
            left: e.pageX
        });
    }
});

$(document.body).on("mousedown", ".dragkeeb", function (e) {
    $dragging = $(".keyboard.numone");
      console.log('widg & he',$(window).width() ,$(window).height() )
});

$(document).ready(function(){
    var down = false;
    $('#bell').click(function(e){
        var color = $(this).text();
        if(down){
          $('#box').css('height','0px');
          $('#box').css('opacity','0');
          down = false;
        }else{
          $('#box').css('height','auto');
          $('#box').css('opacity','1');
          down = true;
        }
   });
});

$(document).on("click", "#info_required", function () {
    $("#chatDIV").animate({scrollTop:  1500});
    var history = $(this).data('chat');
    $('#chat_first').text(history);
    $('#chat_id').val($(this).data('chat-id'));
    $('#sender_id').val($(this).data('sender-id'));
    $('#request_status').modal('toggle');
    // $('#info_chat_modal').modal();
    $('#additional_info123').focus();
    $('#additional_info123').val('');

    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/get_user_chat_history",
      data: { chat_id : $(this).data('chat-id'), chat_type : 'cash'},
      dataType: 'json',
      success: function(data) {
        console.log(data);
        // $('#chatDIV').html(data);
        $('#info_chat_modal').modal();
        $('#chatDIV').html(data);
      },
    });
    return false;
});

$(document).on("click", "#chat_submit", function () {
      var additional_info = $('#additional_info123').val();
      var chat_id = $('#chat_id').val();
      var leave_id = $('#chat_leave_id').val();
      var sender_id = $('#sender_id').val();
      var chat_type = '';
      var tbl_name = '';
      if(chat_id != ''){
        chat_type = 'cash';
        chat_id = chat_id;
        tbl_name = 'tbl_advance';
      }else if(leave_id != ''){
        chat_type = 'leave';
        chat_id = leave_id;
        tbl_name = 'tbl_emp_leave';
      }
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/insert_chat_history",
        data: {additional_info: additional_info, chat_id : chat_id, chat_type: chat_type, sender_id: sender_id, table_name : tbl_name, chat_person : "user"},
        dataType: 'json',
        success: function(data) {
            console.log(data);
            // $("#chatDIV").animate({scrollTop:  1500});
            // $('#chatDIV').append(data);
            // $('#additional_info123').val('');
            // $('#additional_info123').focus();
            $('#info_chat_modal').modal('toggle');
            $('#request_status').modal('toggle');
        },
      });
      return false;
});

$(document).on("click", "#bleave123", function () {
    $('#info_chat_modal').modal('hide');
    $('#request_status').modal();
});

$(document).on("click", "#info_Required1", function () {
    $('.chat-hist')[0].reset();
    $("#chatDIV").animate({scrollTop:  1000});
    var history = $(this).data('chat');
    $('#chat_first').text(history);
    $('#chat_leave_id').val($(this).data('chat-id'));
    $('#sender_id').val($(this).data('sender-id'));
    $('#request_status').modal('hide');
    $('#additional_info123').focus();

    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/Cashier/get_user_chat_history",
      data: { chat_id : $(this).data('chat-id'), chat_type : 'leave'},
      dataType: 'json',
      success: function(data) {
        console.log(data);
        $('#info_chat_modal').modal();
        $('#chatDIV').html(data);
      },
    });
    return false;
});

$(document.body).on("mouseup", function (e) {
    $dragging = null;
});
function doTouch(e) {
  e.preventDefault();
  var touch = e.touches[0];
console.log('started')
}
function doTouch2(e) {
  e.preventDefault();
  var touch = e.touches[0];
   let r  = touch.pageX;
   let w = touch.pageY;
  console.log(r,w,"p's are")
  console.log('its moving')
}
function doTouch3(e) {
  e.preventDefault();
  var touch = e.touches[0];
}
document.addEventListener('touchstart', function(e) {
  setTimeout(function() {
  }, 0);
}, false);
const maxMoveLeft = $(window).width();
const maxMoveRight =$(window).height();
$(document).on('touchstart', '.dragkeeb', function(e) {
  e.preventDefault()
$dragging = $(".keyboard.numone");

});
$(document).on('touchmove', '.keyboard.numone', function(e) {
  e.preventDefault()
var xPos = e.originalEvent.touches[0].pageX;
var yPos = e.originalEvent.touches[0].pageY;
let spaceTaken = $(".keyboard.numone")[0].getBoundingClientRect();

$dragging.offset({
        top: yPos ,
        left:xPos
    });
});
$(document).on('touchend click', '.cancelkeeb', function(e) {
  $dragging = null;
  e.preventDefault()
  $('.keyboard.numone').hide()
  $('.keyboard.numone').addClass("keyboard--hidden");
  $('.modal').removeClass('moveup');
  $('.modal-dialog').removeClass('moveup');
});

function resetKeebPosition() {
  $('.keyboard.numone').css('top','unset');
  $('.keyboard.numone').css('left','unset');
        console.log('ths ran')
}

$(document).on('touchend click', '.dragkeeb', function(e) {
  $dragging = null;
  e.preventDefault()
  rect =  $('.keyboard.numone')[0].getBoundingClientRect();
  if((rect.x + rect.width)>window.innerWidth || (rect.y + rect.height)>window.innerHeight){
      resetKeebPosition()
  }
});

});
