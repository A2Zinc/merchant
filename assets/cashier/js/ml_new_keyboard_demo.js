$(document).ready(function(){
  $('input[type=text],input[type=search],input[type=email],input[type=url],input[type=password],textarea').mlKeyboard({layout: 'en_US'});
  
});
$(document).ready(function(){
 
  $('input[type=tel]').mlkeyboardnum({layout: 'en_US'});
  $('#mlkeyboardnum-backspace').append("<i class='fas fa-backspace' style='font-size:24px'></i>");
  
});

$(document).ready(function(){
  $('#empid').focus(function(){   
    $('#mlKeyboardnum').css('display','none');
  });
});



