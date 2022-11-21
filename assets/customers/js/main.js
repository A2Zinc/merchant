if( node_setting == 1){
	var socket,strokes = [],currentStroke = null;
	socket = io.connect("http://localhost:3000");
	socket.on('set_customer_cart_data',(data) => {
		$('#checkout_btn').show();
	  console.log(" From client cart set: "+ data);
	  //alert(data);
	  var cart_total_item = 0;
	  //var data = '{"product_details" :[{"product_name":"CC fee","qty":1,"price":0.5},{"product_name":"Plastic bag","qty":1,"price":10}],"sub_total" :10.50,"crv" :0,"tax" :0.78,"coupon_discount" :0.00,"cash_back" :0.00,"cart_total" ';
	  	arr = $.parseJSON(data); //convert to javascript array
	  	console.log('arr->'+arr);
		$.each(arr,function(key,value){
		    if(key == 'product_details'){
		    	$('#customer_append_product').html('');
		    	var count = 1;
		    	
				$.each(value,function(index,value_product){
			    	//alert(value_product.product_name);
			    	price = parseFloat(value_product.price);
			    	price = value_product.price.toFixed(2);
			    	cart_total_item = cart_total_item + value_product.qty;
			    	var tr_row ='<tr><td class="text-left" style="padding-left: .75rem !important;">'+value_product.qty+'</td><td class="text-left" style="padding-left: .75rem !important;"><div class="item-name">'+value_product.product_name+'</div></td><td class="text-center">$'+price+'</td></tr>';
						$('#customer_append_product').append(tr_row);
			     	//var tr_row ='<tr> <td style="text-align: left;"><span style="padding:padding:0px 5px 0px 20px;">'+value_product.qty+'</span> X&nbsp;&nbsp;'+value_product.product_name+'</td><td style="width:10%;text-align:right;padding-right: 15px !important;">$'+price+'</td></tr>';
			     	
			     	count++;
				});
			}
		});

		var sub_total = parseFloat(arr.sub_total);
		var crv = parseFloat(arr.crv);
		var tax = parseFloat(arr.tax);
		var coupon_discount = parseFloat(arr.coupon_discount);
		var redeem_points_discount = parseFloat(arr.redeem_points_discount);
		var cash_back = parseFloat(arr.cash_back);
		var cash_back_fee = parseFloat(arr.cash_back_fee);
		var cart_total = parseFloat(arr.cart_total);

		//alert(cart_total_item);
		$('#cart_total_item').html(cart_total_item);
		$('#cart_sub_total').html('$'+sub_total.toFixed(2));
		$('#cart_crv').html('$'+crv.toFixed(2));
		$('#cart_tax').html('$'+tax.toFixed(2));
		$('#cart_discount').html('<span style="color:red;">(-) $'+coupon_discount.toFixed(2)+'</span>');
		$('#redeem_points_discount').html('<span style="color:red;">(-) $'+redeem_points_discount.toFixed(2)+'</span>');
		$('#cart_grand_total').html('$'+cart_total.toFixed(2));
		//alert(cash_back);


		if(coupon_discount != 0){
			$('#cart_discount_tr').show();
		}else{
			$('#cart_discount_tr').hide();
		}

		if(redeem_points_discount != 0){
			$('#redeem_points_discount_tr').show();
		}else{
			$('#redeem_points_discount_tr').hide();
		}

		if(cash_back != 0){
			$('#cart_cash_back_tr').show();
			$('#cart_cash_back_fee_tr').show();
			$('#cart_cash_back').html('$'+cash_back.toFixed(2));
			$('#cart_cash_back_fee').html('$'+cash_back_fee.toFixed(2));
		}else{
			$('#cart_cash_back_tr').hide();
			$('#cart_cash_back_fee_tr').hide();
		}

		$('#transaction_type_tr').hide();
	  $('#transaction_status_tr').hide();
	  $('#amount_tendered_tr').hide();
	  $('#return_balance_tr').hide();

		console.log('sub_total->'+sub_total);
		console.log('crv->'+crv);
		console.log('tax->'+tax);
		console.log('coupon_discount->'+coupon_discount);
		console.log('cash_back->'+cash_back);
		console.log('cart_total->'+cart_total);
	});

	socket.on('complete_transaction_customer',(obj) =>{
		//$('#exampleModal .close').trigger('click');

	  const data = JSON.parse(obj);

	  $('#transaction_type').html(data.transaction_type);
	  $('#transaction_status').html(data.transaction_status);
	  $('#amount_tendered').html('$'+data.amount_tendered.toFixed(2));
	  $('#return_balance').html('$'+data.return_balance.toFixed(2));

		$('#transaction_type_tr').show();
	  $('#transaction_status_tr').show();
	  $('#amount_tendered_tr').show();
	  $('#return_balance_tr').show();

		$('#checkout_btn').hide();
		$('#is_transaction_completed').val(1);
		$("#exampleModal").modal('hide');
		hide_loader();
	});

	socket.on('card_complete_transaction_customer',(obj) =>{
		//$('#exampleModal .close').trigger('click');

	  const data = JSON.parse(obj);

	  if(data.transaction_status=='fail'){
	  	//$('#checkout_btn').hide();
			$('#is_transaction_completed').val(0);
			$("#exampleModal").modal('hide');	
			hide_loader();
			swal({
	      title: "Error!",
	      text: "Card transaction is declined",
	      icon: "error",
	      buttons: false,
	      timer: 2700
			})

	  }else{

	  	$('#transaction_type').html(data.transaction_type);
		  $('#transaction_status').html(data.transaction_status);
		  $('#amount_tendered').html('$'+data.amount_tendered.toFixed(2));
		  $('#return_balance').html('$'+data.return_balance.toFixed(2));

			$('#transaction_type_tr').show();
		  $('#transaction_status_tr').show();
		  $('#amount_tendered_tr').show();
		  $('#return_balance_tr').show();

			$('#checkout_btn').hide();
			$('#is_transaction_completed').val(1);
			$("#exampleModal").modal('hide');
			hide_loader();

	  }

	  $("#cardpaymentModal").modal('hide');
	});

	socket.on('ebt_transaction_customer',(obj) =>{
		//$('#exampleModal .close').trigger('click');
	  const data = JSON.parse(obj);
	  if(data.transaction_status=='fail'){
	  	//$('#checkout_btn').hide();
			$('#is_transaction_completed').val(0);
			$("#exampleModal").modal('hide');	
			hide_loader();
			swal({
	          title: "Warning!",
	          text: "EBT Transaction Declined",
	          icon: "warning",
	          buttons: false,
	          timer: 2700
	    });

	  }else{

	  	$('#transaction_type').html(data.transaction_type);
		  $('#transaction_status').html('Success');
		  $('#amount_tendered').html('$'+data.amount_tendered.toFixed(2));
		  $('#return_balance').html('$'+data.return_balance.toFixed(2));

			$('#transaction_type_tr').show();
		  $('#transaction_status_tr').show();
		  // $('#amount_tendered_tr').show();
		  // $('#return_balance_tr').show();

			$('#checkout_btn').hide();
			$('#is_transaction_completed').val(1);
			$("#exampleModal").modal('hide');
			hide_loader();

	  }

	  $("#cardpaymentModal").modal('hide');
	});

	socket.on('clear_customer_screen',(data) =>{
		clear_customer_screen();
		window.location.reload();
	});

	socket.on('refresh_customer_screen',(data) =>{
			window.location.reload();
	});
}

function hide_loader() {
	$('#overlay,.loader').hide();
}

function clear_customer_screen() {
	$('#checkout_btn').hide();
	$('#cart_sub_total').html('');
	$('#cart_crv').html('');
	$('#cart_tax').html('');
	$('#cart_discount').html('');
	$('#redeem_points_discount').html('');
	$('#cart_grand_total').html('');
	$('#customer_append_product').html('');
	$('#cart_total_item').html('');
	$('#before_login').show();
  $('#after_login').hide();
  $('#invalid_number').hide();
  $('#valid_number').hide();
  $("#customer_mobile_no").val('');

  $('#cart_discount_tr').hide();
  $('#cart_cash_back_tr').hide();
	$('#cart_cash_back_fee_tr').hide();

  $('#transaction_type_tr').hide();
  $('#transaction_status_tr').hide();
  $('#amount_tendered_tr').hide();
  $('#return_balance_tr').hide();

}

function formatPhoneNumber(phoneNumberString) {

  var cleaned = ('' + phoneNumberString).replace(/\D/g, '');
  var match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
  if (match) {
    return '(' + match[1] + ') ' + match[2] + '-' + match[3];
  }
  return null;
}

jQuery(document).on("click", "#login_popup", function (event) {
		$("#myModal").modal('show');
});

jQuery(document).on("keyup", ".phoneInput", function (event) {
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

$(document).on("click", "#cash_checkout", function (e) {
	$('#overlay,.loader').show();
	var rowCount = $('#customer_append_product tr').length;
	if(rowCount == 0 ){
		swal({
                  title: "Error!",
                  text: "'There are no product on your cart'",
                  icon: "error",
                  buttons: false,
                  timer: 2700
		})
		$('#overlay,.loader').hide();
	}else{
		if(node_setting == 1){
			socket.emit('cash_transaction_server');
		}
	}
});

$(document).on("click", "#card_checkout", function (e) {

	$("#exampleModal").modal('hide');
	$("#cardpaymentModal").modal('show');
});

$(document).on("click", "#credit_debit_checkout", function (e) {
	$('#overlay,.loader').show();
	var rowCount = $('#customer_append_product tr').length;
	if(rowCount == 0 ){
		swal({
                  title: "Error!",
                  text: "'There are no product on your cart'",
                  icon: "error",
                  buttons: false,
                  timer: 2700
		})
		$('#overlay,.loader').hide();
	}else{
		if(node_setting == 1){
			socket.emit('credit_card_transaction_server');
		}
	}
});

$(document).on("click", "#EBT_checkout", function (e) {
	$('#overlay,.loader').show();
	var rowCount = $('#customer_append_product tr').length;
	if(rowCount == 0 ){
		swal({
                  title: "Error!",
                  text: "'There are no product on your cart'",
                  icon: "error",
                  buttons: false,
                  timer: 2700
		})
		$('#overlay,.loader').hide();
	}else{
		if(node_setting == 1){
			socket.emit('ebt_transaction_from_client');
		}
	}
});

$(document).on("click", ".search_mobile_number", function (e) {
  var customer_mobile_no = $("#customer_mobile_no").val();
  if(customer_mobile_no == ''){
  	swal({
        title: "error!",
        text: "Please enter mobile number !!",
        icon: "error",
        buttons: false,
        timer: 2000
    });
		$('#overlay,.loader').hide();
		return false;
  }
  $('#overlay,.loader').show();
  $.ajax({
    type: "POST",
    url: base_url + "cashier/getcustomerByPhone",
    dataType: "json",
    
    data: {
      customer_mobile_no: customer_mobile_no,
    },
    success: function (data) {
    	$('#overlay,.loader').hide();
      if (data.status == "success") {

      	$('.right-section').hide();
        $('#customer_existing').show();
        $("#customer_id").val(data.data.customer_id);
      	$("#customer_name").val(data.data.first_name);
      	//$("#customer_detail_name").html(data.data.customer_name);
      	$("#customer_email").val(data.data.customer_email);
      	$("#customer_phone").val(data.data.customer_mobile);
      	//$("#customer_address").html(data.data.customer_address_1+' , '+data.data.customer_address_2);
      	$("#total_point").val(data.data.exist_tot_redeem_point);
      	$("#acount_balance").val(data.account_balance);

      	$("#myModal").modal('hide');
      	$('.right-section').hide();
        $('#customer_existing').show();
        if(node_setting == 1){
      		socket.emit('search_customer_server',data);
      	}
      }else{
      		swal({
              title: "error!",
              text: "Number is not registered !!",
              icon: "error",
              buttons: false,
              timer: 2000
          });
      		$('#overlay,.loader').hide();
      }
      // $("#opencalc .opencalc_close img").click();
      // return false;
    },
  });
});

jQuery(document).on("click", "#edit_customer", function (event) {
		$(this).hide();
		$('#customer_email').prop("disabled", false);
		$('#customer_name').prop("disabled", false);
		$('#customer_phone').prop("disabled", false);
		$('#customer_email').focus();
		$('#save_customer').show();
});

jQuery(document).on("click", "#save_customer", function (event) {
		

  var customer_email = $("#customer_email").val();
  var customer_name = $("#customer_name").val();
  var customer_phone = $("#customer_phone").val();
  var customer_id = $("#customer_id").val();
  $('#overlay,.loader').show();
  $.ajax({
    type: "POST",
    url: base_url + "customer/update_customer",
    data: {
      customer_email: customer_email,
      customer_name: customer_name,
      customer_phone: customer_phone,
      customer_id: customer_id,
    },
    success: function (data) {
    	
      if (data == "success") {
      	swal({
              title: "Success!",
              text: "Details updated successfully..!",
              icon: "success",
              buttons: false,
              timer: 2000
          });

      	$('#customer_email').attr('disabled',true);
      	$('#customer_name').attr('disabled',true);
      	$('#customer_phone').attr('disabled',true);
      	$('#save_customer').hide();
				$('#edit_customer').show();
				$('#overlay,.loader').hide();
      }else{
      	swal({
              title: "error!",
              text: "error on update customer..!",
              icon: "error",
              buttons: false,
              timer: 2000
          });
      	$('#overlay,.loader').hide();
      	//$(this).hide();
				//$('#edit_customer').show();
      }

    },
  });
});

jQuery(document).on('click', '#pos_customer_signup', function() {

    var customer_fname = $('#customer_first_name').val();
    var customer_lname = $('#customer_last_name').val();
    var customer_mobile = $("#customer_mobile").val();
    var customer_email = $("#customer_email_new").val();

    if(customer_fname == ''){
      $("#cfname_err").html("Please enter first name").show();
      $("#cfname_err").css("margin-bottom", "-11px");
      return false;
    }else{
    	$("#cfname_err").html("").show();
      $("#cfname_err").css("margin-bottom", "-11px");
    }

    if(customer_lname == ''){
      $("#clname_err").html("Please enter last name").show();
      $("#clname_err").css("margin-bottom", "-11px");
      return false;
    }else{
    	$("#clname_err").html("").show();
      $("#clname_err").css("margin-bottom", "-11px");
    }


    if(customer_email == ''){
      $("#cemail_err").html("Please enter email").show();
      $("#cemail_err").css("margin-bottom", "-11px");
      return false;
    }else{
    	$("#cemail_err").html("").show();
      $("#cemail_err").css("margin-bottom", "-11px");
    }

    if(customer_email != ''){
        if(ValidateCustomerEmail(customer_email) == false){
          $("#cemail_err").html("Please enter valid email").show();
          $("#cemail_err").css("margin-bottom", "-11px");
          return false;
        }
    }else{
    		$("#cemail_err").html("").show();
        $("#cemail_err").css("margin-bottom", "-11px");
    }

    if(customer_mobile == ''){
      $("#cmobile_err").html("Please enter mobile number").show();
      $("#cmobile_err").css("margin-bottom", "-11px");
      return false;
    }else{
    	$("#cmobile_err").html("").show();
      $("#cmobile_err").css("margin-bottom", "-11px");
    }

    if(customer_mobile.length != 14){
      $("#cmobile_err").html("Please enter correct mobile number").show();
      $("#cmobile_err").css("margin-bottom", "-11px");
      return false;
    }else{
    	$("#cmobile_err").html("").show();
      $("#cmobile_err").css("margin-bottom", "-11px");
    }

    
    $('#overlay,.loader').show();
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: base_url + "cashier/customer_signup",
      data: {customer_fname: customer_fname, customer_lname: customer_lname, customer_mobile:customer_mobile, customer_email: customer_email},
      dataType: 'json',
      beforeSend: function(){
          $("#overlay,.loader").show();
      },
      success: function(data) {
        $("#overlay,.loader").hide();
        if (data.status == "success") {
          var customer_name = data.data.customer_name;
          var customer_id = data.data.customer_id;
          var tot_redeem_point = data.data.tot_redeem_point;
          var account_balance = data.account_balance;
          var db_point_amount = data.data.db_point_amount;
          var db_point = data.data.db_point;

          swal({
              title: "Success!",
              text: "Registration Successful!",
              icon: "success",
              buttons: false,
              timer: 2000
          });

          $("#customer_mobile_no").val(customer_mobile);
          $(".search_mobile_number").trigger('click');
          $('#customer_main,#customer_new').hide();
          //$('#customer_existing').show();

        }else{
            if(data.mobile_err != ''){

            	swal({
                  title: "Error!",
                  text: "Mobile number is already registered.",
                  icon: "error",
                  buttons: false,
                  timer: 2700
							})

                // $("#cmobile_err").html("This mobile number is already exist").show();
                // $("#cmobile_err").css("margin-bottom", "-11px");
                // $("#cmobile_err").css("margin-right", "33%");
                return false;
            }else{
                swal({
                    title: "Oops!",
                    text: "Someting went wrong",
                    icon: "error",
                    buttons: false,
                    timer: 2500,
                });
            }
        }
      },
    });
    return false;
});

function ValidateCustomerEmail(email_id) {
    // var email_id = $("#email").val();

    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!expr.test(email_id)) {

        $('#cemail_err').html('Please enter valid email').show();
        return false;
    }else{
        $('#cemail_err').html("").show();
    }
}