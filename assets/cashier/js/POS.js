// <!--  -->
/**

 * @author Ravi Sanchaniya

 */
var loyality=0;
jQuery(document).ready(function () {
  //prashant added 3aug get_current_cash_drawer_amt()
  get_current_cash_drawer_amt();

  jQuery("#read_barcode_POS").focus();
  $('#read_barcode_POS').removeClass('use-keyboard-input');

  let isModalOpen = $.modal.isActive();
  $("#saveorderbtn").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  $("#refundlaunchbtn").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  $("#walk_customer").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#customer_mobile_no").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });
  /** Code starts on 8th-march @rajeswari **/
  $("#custom_price").on("click", function () {
    $("#misceleneous_name_change").prop('selectedIndex',0);
    $("#misceleneous_name").val('Miscellaneous');

    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      // $('#product_lookup_description').focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  $("#shifOUT").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#shift_out_user").focus();
      $(".pos-shift-logout")[0].reset();
      $("#shift_out1_err, #shift_out2_err").html("").show();

      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".arn").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });
  /** end prashant Code **/
  /** Code starts on 22-feb @rajeswari **/

  $("#productlookup").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#product_lookup_description").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  /** Code Ends on 22-feb @rajeswari **/



  $("#custom_Product").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#custom_product_name").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });
  /** Code Ends on march-8th @rajeswari **/

  $("#refund_order_button").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 800);

    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  /** Code starts on 25-feb @rajeswari **/
  $("#payout").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#payout_vendor").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  /** Code starts on 25-feb @rajeswari **/
  $("#cashdroplaunchbtn").on("click", function () {
    isModalOpen = $.modal.isActive();
    //alert(isModalOpen);
    setTimeout(function () {
      $("#payout_vendor").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });
  /** Code Ends on 25-feb @rajeswari **/

  $("#couponbtn").on("click", function () {
    isModalOpen = $.modal.isActive();
    //alert(isModalOpen);
    setTimeout(function () {
      $("#PROMO_code").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  $(".card_transaction_popup").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#card_transaction_modal").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  $(".pos_cashback").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#pos_cashback_modal #cashback_amount").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  $("#reedem_point_button").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#redeem_points_input").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  jQuery(document).on("click", "#keyboard_OPEN", function (e) {
      $('#read_barcode_POS').focus();
      $('#read_barcode_POS').addClass('use-keyboard-input');
      Keyboard.open();
  });

  jQuery(document).on("click", ".keyboard__key", function () {
    $('#read_barcode_POS').autocomplete("search");
  });

  $("#add_customer").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#customer_first_name").focus();
      $("#customer_first_name").val('');
      $("#customer_last_name").val('');
      $("#customer_mobile").val('');
      $("#customer_email").val('');

      $("#cfname_err").hide();
      $("#clname_err").hide();
      $("#cmobile_err").hide();
      $("#cemail_err").hide();

      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });


  $("a[href='#walk_in_customer_modal']").on("click", function () {
    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#customer_mobile_no").focus();
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

/* price over ride - ST */
jQuery(document).on("click", "#price_override", function (e){
    $('#price_override_click').val(1);
    var option_list = '';
    var exist_product_id = $("#exist_product_id").val();
    var is_transaction_completed = $("#is_transaction_completed").val();

    if (exist_product_id == "" || is_transaction_completed == 1) {
      setTimeout(function () {
        $('.x').trigger('click');
      }, 1);
      swal({
          title: "Oops!",
          text: "There are no product in your Cart",
          icon: "error",
          buttons: false,
          timer: 2000,
        });
    }else{
        $("#price_override").css('background','red');
        $("input[name='product_price[]']").each(function (e) {
            var product_id_arr = $(this).attr("id").split("product_price_");
            var product_id = product_id_arr[1];
            var product_name = $('#product_cart_name_'+product_id).val();
            option_list += '<option value="'+ product_id +'">' + product_name + '</option>';

        });
        $('.over_product').html(option_list);
     }
});

jQuery(document).on("click", ".table_row", function (e){
  var id = $(this).attr('id').replace('table_row_','');
    if($('#price_override_click').val() == 1){
      var exist_product_id = $("#exist_product_id").val();
      var is_transaction_completed = $("#is_transaction_completed").val();
      if (exist_product_id == "" || is_transaction_completed == 1) {
        swal({
            title: "Oops!",
            text: "There are no products in your cart",
            icon: "error",
            buttons: false,
            timer: 2000,
          });
      }else{
          $('.over_product').val(id);
          $('.over_product').attr('disabled','disabled');

          var price_override_original_temp = parseFloat($('#price_override_original_'+id).val());
          price_override_original_temp = price_override_original_temp.toFixed(2);
          //console.log(price_override_original_temp);
          $('#price_override_price_base').val(price_override_original_temp);

          $('#priceOverride').modal();
          isModalOpen = $.modal.isActive();
            setTimeout(function () {
            isModalOpen = $.modal.isActive();
            $("#price_override_price").focus();
            $("#price_override_price").val('');
            $("#price_over_price_err").html("").show("");

            //console.log(isModalOpen, $.modal.isActive());
          }, 100);
          $(".x").on("click", function () {
            jQuery("#read_barcode_POS").focus();
            $('#read_barcode_POS').removeClass('use-keyboard-input');
          });
          //console.log(isModalOpen, $.modal.isActive());
          $('#price_override_click').val(0);
          $("#price_override").css('background','#7894be');
      }
    }
});

jQuery(document).on('click', '#submit_price_override', function() {

      var product_id = $('.over_product').val();
      var select_price = $('#price_override_price').val();
      var original_price = $("#price_override_original_" + product_id).val();
      if(select_price == 0 || select_price == ''){
          $("#price_over_price_err").html("Please enter price").show();
          return false;
      }

      /*if(parseFloat(select_price) > parseFloat(original_price)){
        $("#price_over_price_err").html("Please enter less than base price").show();
        return false;
      }*/

      $("#product_rate_" + product_id).val(select_price);
      $("#product_base_rate_" + product_id).val(select_price);

      var pro_qty = $("#product_qty_" + product_id).val();
      var final_price = pro_qty * select_price;

      final_price = parseFloat(final_price);
      var final_price = final_price.toFixed(2);

      var strike_org_price = parseFloat(original_price * pro_qty);


      var org_price = strike_org_price.toFixed(2);

      if (org_price != final_price) {

        $(".onsale_price_" + product_id).parent().html("<span class='onsale_price_"+product_id+"'><strike class='onsale_strike_price_" +product_id +"' style='color:red;'>$" +org_price +"</strike><br>$<span class='onsale_price_" +product_id +"'>"+final_price +"</span></span>");

      }else{
        $(".onsale_price_" + product_id).html(final_price);
      }

      $("#product_price_" + product_id).val(final_price);
      $("#product_offer_price_" + product_id).val(final_price);
      $('#quantity_input_'+ product_id).attr('data-org_price',final_price);


     var item_info = '';
     item_info += '<input type="hidden" name="is_price_override[]" data-proid="'+product_id+'" class="is_price_override" id="is_price_override_'+product_id+'" value="1">';
     item_info += '<input type="hidden" name="price_override_original[]" id="price_override_original_'+product_id+'" value="'+org_price+'">';
     item_info += '<input type="hidden" name="price_override_new[]" id="price_override_new_'+product_id+'" value="'+final_price+'">';
     item_info += '<input type="hidden" name="mainbase_org[]" id="mainbase_org_'+product_id+'" value="'+original_price+'">';

     $('#is_price_override_'+ product_id).val(1);
     $('#price_override_new_'+ product_id).val(select_price);

     calculatePOSTotal();

      $('.x').trigger('click');
      $('#price_override_click').val(0);
});

jQuery(document).on("change", ".over_product", function (e){
 //$('').on('change', function() {
    $("#price_override_price").focus();
});

jQuery(document).on("change", "#price_override_price", function (e){
 //$('').bind('change', function() {
    var product_id = $('.over_product').val();
    var select_price = $('#price_override_price').val();
    var original_price = $("#product_rate_" + product_id).val();
    if(select_price == 0 || select_price == ''){
        $("#price_over_price_err").html("Please enter price").show();
        return false;
    }else{
        $("#price_over_price_err").html("").show();
    }

    /*if(parseFloat(select_price) > parseFloat(original_price)){
      $("#price_over_price_err").html("Please enter less than base price").show();
      return false;
    }else{
      $("#price_over_price_err").html("").show();
    }*/
});
/* price over ride - EN */

  $("a[href='#pos_redeem_points_modal']").on("click", function () {
    if ($("#walk_in_customer_id").val() == "0") {
      swal({
        title: "Warning!",
        text: "Please login to redeem points.",
        icon: "warning",
        buttons: false,
        timer: 2700,
      });
      return false;
    }

    var exist_product_id = $("#exist_product_id").val();
    var is_transaction_completed = $("#is_transaction_completed").val();

    if (exist_product_id == "" || is_transaction_completed == 1) {
      $("#overlay").hide();
      $(".loader").hide();

      swal({
        icon: "warning",
        title: "Oops!",
        text: "There are no Products in your Cart",
        icon: "warning",
        buttons: false,
        dangerMode: false,
        timer: 2000,
      });

      return false;
    }

    var cust_loyalty_points = $(this).attr("data-cust_loyalty_points");
    var cust_loyalty_amount = $(this).attr("data-cust_loyalty_amount");

    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      $("#redeem_points_input").focus();
      $("#read_barcode_POS").blur();

      isModalOpen = $.modal.isActive();
      $("#pos_redeem_points_modal").modal({
        escapeClose: false,
        clickClose: false,
        showClose: false,
      });

      $("#pos_redeem_points_modal #total_points_append").html(
        cust_loyalty_points
      );
      $("#pos_redeem_points_modal #total_points_input").val(
        cust_loyalty_points
      );
      $("#pos_redeem_points_modal #account_balance_append").html(
        cust_loyalty_amount
      );

      //console.log(isModalOpen, $.modal.isActive());
    }, 100);
    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      jQuery("#redeem_points_input").val("");
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());
  });

  document
    .getElementById("read_barcode_POS")
    .addEventListener("blur", function (e) {
      setTimeout(function () {
        if (!isModalOpen) {
          e.target.focus();
        }
      }, 0);
    });

  jQuery(document).on("click", ".read_barcode_POS_submit", function (e) {
    $(function () {
      var e = $.Event("keypress");
      e.which = 13;
      $("#read_barcode_POS").trigger(e);
    });
  });

  jQuery(document).on("keypress", "#read_barcode_POS", function (e) {
    // if(e.which == 13) {
    // alert('You pressed enter!');
    // }

    $(".plusMinusContainer")
      .find(".minus_icon")
      .removeClass("btn-custom-disable");
    $(".plusMinusContainer")
      .find(".plus_icon")
      .removeClass("btn-custom-disable");

    var myObj = $(this);
    var barcode = $(this).val();

    // alert(base_url);
    // $(".table-container").scrollTop($(".table-container")[0].scrollHeight);
    // $(".table-container").scrollTop($(".table-container")[0].scrollHeight);
    // var out = document.getElementsByClassName("table-container");
    // var isScrolledToBottom =
    //   out.scrollHeight - out.clientHeight <= out.scrollTop + 1;
    // if (isScrolledToBottom) out.scrollTop = out.scrollHeight - out.clientHeight;
    if (barcode != "" && e.which == 13) {
      //barcode = barcode.padStart(8, '0');
      // alert(barcode);
      // return false;

      jQuery
        .ajax({
          type: "POST",
          dataType: "json",
          url: base_url + "cashier/scanUPC_POS",
          data: { barcode: barcode },
        })
        .done(function (data) {
          //console.log(data);
          //start prasant code
          var pro_id = data.product_id;
          var qty = parseInt(data.quantity) - 1;
          var quantity = parseInt($("#quantity_input_" + pro_id).val());

          var product_ord_qty = parseInt(quantity) + 1;

          var alert_qty = data.quantity - product_ord_qty;

          var product_order_qty = parseInt(quantity) + 1;

          var dat_reord = parseInt(data.quantity) - product_order_qty;
          //alert(alert_qty);
          if (quantity > qty || data.quantity == 0) {
            if(data.is_scratchable == 0){
                if (dat_reord >= -2) {
                  swal({
                    title: "Warning!",
                    text: "Product quantity limit exceeded12",
                    icon: "warning",
                    buttons: false,
                    timer: 2700,
                  });
                }
            }else if(data.is_scratchable == 1){
                if (alert_qty >= -1) {
                    swal({
                        title: "Warning!",
                        text: "Product quantity limit exceeded",
                        icon: "warning",
                        buttons: false,
                        timer: 2700
                    })
                    $('#read_barcode_POS').val('');
                    $('.increase').css('pointer-events','none');
                    return false;
                }
            }

          } else if (dat_reord < data.reorder_level) {
            swal({
              title: "Warning!",
              text:
                "Quantity of " +
                data.product_name +
                " has reached its threshold reorder level, Please place a new order",
              icon: "warning",
              buttons: false,
              timer: 3000,
            });
          }

          //end prasant code

          if (data.status == 0) {
            swal({
              title: "Oops!",
              text: "Item not found.",
              icon: "warning",
              buttons: {
                catch: {
                  text: "New Product",
                  value: "catch",
                },
                custom: {
                  text: "Custom Product",
                  value: "custom",
                },
                cancel: "Cancel",

                //defeat: true,
              },
            }).then((value) => {
              switch (value) {
                case "catch":
                  window.location.href =
                    base_url + "cashier/inventoryadd?upc=" + barcode;
                  break;

                case "custom":
                  swal.close();

                  $("#epa").modal();
                  break;

                default:
              }
            });

            if ($("#exist_product_id").val()) {
              $(".swal-button--catch").prop("disabled", true);
            }

            myObj.val("");

            return false;
          } else {
            // ST - Age Restricted
            //console.log("parent_category_id: " + data.parent_category_id);
            var exist_category_id_arr = data.liquor_tobacco_category.split(",");
            if (
              (jQuery.inArray(data.category_id, exist_category_id_arr) !== -1 ||
                jQuery.inArray(
                  data.parent_category_id,
                  exist_category_id_arr
                ) !== -1) &&
              $("#is_age_verified").val() == 0
            ) {
              // Exist Popup will show

              $("#age-verify-modal").modal("show");
              $("#barcode_product_before_age_verify").val(barcode);
              $("#is_age_verify_custom_product").val(0);
            } else {
              var is_promotion = 0;
              var main_price = data.onsale_price;
              main_price = parseFloat(main_price);
              main_price = main_price.toFixed(2);

              if (
                data.onsale_price != data.store_promotion_price &&
                data.store_promotion_price != 0 &&
                data.store_promotion_price != null
              ) {
                data.onsale_price = data.store_promotion_price;
                is_promotion = 1;
              }

              if ($("#is_transaction_completed").val() == 1) {
                clearTransaction();
              }

              if (typeof data.pos_coupon_details.coupon_name != "undefined") {
                $(".coupon_details")
                  .html(
                    '<p style="color:red;">' +
                      data.pos_coupon_details.coupon_name +
                      " - " +
                      data.pos_coupon_details.coupon_details +
                      "</p>"
                  )
                  .show();
                setTimeout(function () {
                  $(".coupon_details").hide();
                }, 5000);
              }

              var exist_product_id_arr = $("#exist_product_id")
                .val()
                .split(",");

                if(data.unit != null) {
                    data.unit = data.unit.replace("Pack of", "");
                    data.unit = data.unit.replace("PACK OF", "");
                    data.unit = data.unit.replace(" ", "");
                }

              if (jQuery.inArray(data.product_id, exist_product_id_arr) !== -1) {
                // Exist

                var product_id = data.product_id;
                var quantity = $("#quantity_input_" + product_id).val();
                var existing_crv = $("#product_crv_" + product_id).val();

                var org_price = $("#quantity_input_" + product_id).attr(
                  "data-org_price"
                );
                quantity++;
                $("#quantity_input_" + product_id).val(quantity);

                // count combo functinality - ST
                var product_combo_value = $(
                  "#pos_combo_detail_" + product_id
                ).val();
                var found_combo = 0;
                var new_sale_price = 0.0;
                if (product_combo_value) {
                  var product_combo_value_arr = JSON.parse(product_combo_value);
                  $.each(product_combo_value_arr, function (key, value) {
                    //console.log(value.combo_unit + ": " + quantity);
                    ////console.log("modular : " + modular );
                    if (
                      quantity >= value.combo_unit &&
                      value.combo_unit != "" &&
                      value.combo_unit != 0
                    ) {
                      var combo_count = quantity / value.combo_unit;
                      //console.log("combo_count: " + combo_count);
                      combo_count = Math.floor(combo_count);
                      //console.log("combo_count ceil: " + combo_count);
                      var remain_product =
                        quantity - combo_count * value.combo_unit;
                      //console.log("remain_product : " + remain_product);
                      var combo_price = combo_count * value.combo_price;
                      var remain_price = remain_product * org_price;

                      new_sale_price = combo_price + remain_price;
                      new_sale_price = parseFloat(new_sale_price);
                      found_combo = 1;
                      return false;
                    }
                  });
                  //console.log("new_sale_price : " + new_sale_price);
                } else {
                  var new_sale_price =
                    parseFloat(org_price) * parseFloat(quantity);
                }

                if (found_combo == 0) {
                  var new_sale_price =
                    parseFloat(org_price) * parseFloat(quantity);
                }
                // count combo functinality - EN

                //  var new_sale_price = parseFloat(org_price) * parseFloat(quantity);

                if (is_promotion == 1) {
                  var main_price =
                    parseFloat(main_price) * parseFloat(quantity);
                  $(".onsale_strike_price_" + product_id).html(
                    main_price.toFixed(2)
                  );
                }

                $(".onsale_price_" + product_id).html(
                  new_sale_price.toFixed(2)
                );
                $("#product_price_" + product_id).val(
                  new_sale_price.toFixed(2)
                );
                $("#product_qty_" + product_id).val(quantity);

                //ST - add crv if applicable
                var crv_oz = 0;
                var crv_rate = 0;
                var crv_price = 0;
                if (data.Applicable_CRV == 1) {

                  // data.unit = data.unit.replace("Pack of", "");
                  // data.unit = data.unit.replace("PACK OF", "");
                  // data.unit = data.unit.replace(" ", "");

                  var str2 = "oz";
                  var str3 = "liter";
                  var str4 = "ml";
                  var str5 = "gallon";
                  var str6 = "quart";

                  //if (data.size.indexOf(str2) != -1) {

                  var data_size = data.size;
                  data_size = data_size.toLowerCase();
                  data.size = data_size;

                  if (
                    data.size.indexOf(str2) != -1 ||
                    data.size.indexOf(str3) != -1 ||
                    data.size.indexOf(str4) != -1 ||
                    data.size.indexOf(str5) != -1 ||
                    data.size.indexOf(str6) != -1
                  ) {
                    // if oz
                    //crv_oz = parseFloat(data.size);
                    if (data.size.indexOf(str2) != -1) {
                      //alert('oz');
                      data.size = data.size.replace("oz", "");
                      data.size = data.size.replace("liter", "");
                      data.size = data.size.replace("ml", "");
                      data.size = data.size.replace(" ", "");
                      crv_oz = parseFloat(data.size);
                      if (crv_oz > 23.9) {
                        if (data.unit > 0) {
                          crv_price = 0.1 * quantity * data.unit;
                        } else {
                          crv_price = 0.1 * quantity;
                        }
                      } else {
                        if (data.unit > 0) {
                          crv_price = 0.05 * quantity * data.unit;
                        } else {
                          crv_price = 0.05 * quantity;
                        }
                      }
                    }
                    // if liter
                    if (
                      data.size.indexOf(str3) != -1 ||
                      data.size.indexOf(str5) != -1 ||
                      data.size.indexOf(str6) != -1
                    ) {
                      //alert('littr');
                      data.size = data.size.replace("oz", "");
                      data.size = data.size.replace("liter", "");
                      data.size = data.size.replace("ml", "");
                      data.size = data.size.replace("gallon", "");
                      data.size = data.size.replace("quart", "");
                      data.size = data.size.replace(" ", "");
                      if (data.unit > 0) {
                        crv_price = 0.1 * quantity * data.unit;
                      } else {
                        crv_price = 0.1 * quantity;
                      }
                    }
                    // if ml
                    if (data.size.indexOf(str4) != -1) {
                      //alert('ml');
                      data.size = data.size.replace("oz", "");
                      data.size = data.size.replace("liter", "");
                      data.size = data.size.replace("ml", "");
                      data.size = data.size.replace(" ", "");
                      crv_oz = parseFloat(data.size);
                      crv_oz = crv_oz * 0.03;
                      //console.log("crv_oz ml =>".crv_oz);
                      if (crv_oz > 23.9) {
                        if (data.unit > 0) {
                          crv_price = 0.1 * quantity * data.unit;
                        } else {
                          crv_price = 0.1 * quantity;
                        }
                      } else {
                        if (data.unit > 0) {
                          crv_price = 0.05 * quantity * data.unit;
                        } else {
                          crv_price = 0.05 * quantity;
                        }
                      }
                    }
                  }
                }

                $("#product_crv_" + product_id).val(parseFloat(crv_price));

                //EN - add crv if applicable

                // ST - For Calculate Total
                calculatePOSTotal();
                auto_apply_promotion();
                calculatePOSTotal();
                // EN - For Calculate Total
              } else {
                //ST - add crv if applicable
                var crv_oz = 0;
                var crv_rate = 0;
                var crv_price = 0;
                var size_org = data.size;
                if (data.Applicable_CRV == 1) {
                  var str2 = "oz";
                  var str3 = "liter";
                  var str4 = "ml";
                  var str5 = "gallon";
                  var str6 = "quart";

                  var data_size = data.size;
                  data_size = data_size.toLowerCase();
                  data.size = data_size;

                  if (
                    data.size.indexOf(str2) != -1 ||
                    data.size.indexOf(str3) != -1 ||
                    data.size.indexOf(str4) != -1 ||
                    data.size.indexOf(str5) != -1 ||
                    data.size.indexOf(str6) != -1
                  ) {
                    // if oz
                    $("#product_crv_" + product_id).val(parseFloat(data.size));

                    if (data.size.indexOf(str2) != -1) {
                      data.size = data.size.replace("oz", "");
                      data.size = data.size.replace("liter", "");
                      data.size = data.size.replace("ml", "");
                      data.size = data.size.replace(" ", "");
                      crv_oz = parseFloat(data.size);
                      if (crv_oz > 23.9) {
                        if (data.unit > 0) {
                          crv_price = 0.1 * data.unit;
                        } else {
                          crv_price = 0.1;
                        }
                      } else {
                        if (data.unit > 0) {
                          crv_price = 0.05 * data.unit;
                        } else {
                          crv_price = 0.05;
                        }
                      }
                    }
                    // if liter
                    if (
                      data.size.indexOf(str3) != -1 ||
                      data.size.indexOf(str5) != -1 ||
                      data.size.indexOf(str6) != -1
                    ) {
                      data.size = data.size.replace("oz", "");
                      data.size = data.size.replace("liter", "");
                      data.size = data.size.replace("ml", "");
                      data.size = data.size.replace("gallon", "");
                      data.size = data.size.replace("quart", "");
                      data.size = data.size.replace(" ", "");
                      if (data.unit > 0) {
                        crv_price = 0.1 * data.unit;
                      } else {
                        crv_price = 0.1;
                      }
                    }
                    // if ml
                    if (data.size.indexOf(str4) != -1) {
                      data.size = data.size.replace("oz", "");
                      data.size = data.size.replace("liter", "");
                      data.size = data.size.replace("ml", "");
                      data.size = data.size.replace(" ", "");
                      crv_oz = parseFloat(data.size);
                      crv_oz = crv_oz * 0.03;
                      //console.log("crv_oz ml =>" + crv_oz);
                      if (crv_oz > 23.9) {
                        if (data.unit > 0) {
                          crv_price = 0.1 * data.unit;
                        } else {
                          crv_price = 0.1;
                        }
                      } else {
                        if (data.unit > 0) {
                          crv_price = 0.05 * data.unit;
                        } else {
                          crv_price = 0.05;
                        }
                      }
                    }
                  }
                }
                //EN - add crv if applicable

                print_product(
                  data,
                  crv_price,
                  main_price,
                  size_org,
                  is_promotion
                );

                if ($("#exist_product_id").val() == "") {
                  $("#exist_product_id").val(data.product_id);
                } else {
                  var exist_product_id = $("#exist_product_id").val();
                  $("#exist_product_id").val(
                    exist_product_id + "," + data.product_id
                  );
                }
                auto_apply_promotion();
                calculatePOSTotal();
              }
            }
            myObj.val("");
          }
        });
    }
    jQuery("#read_barcode_POS").focus();
    $('#read_barcode_POS').removeClass('use-keyboard-input');
    $(".table-container").scrollTop($(".table-container")[0].scrollHeight);
  });

  jQuery(document).on("change", "#misceleneous_name_change", function () {
    if ($("#is_transaction_completed").val() == 1) {
      clearTransaction();
    }

    var price = jQuery(this).val();
    var name = jQuery("#misceleneous_name_change option:selected").text();
    var tax = jQuery("#misceleneous_name_change option:selected").data("tax");


    //alert(auto_id);
    // alert(name);
    if (price != "") {
      jQuery(".easy-numpad-output-container .secondDollarSign").css(
        "visibility",
        "visible"
      );
      jQuery("#easy-numpad-output").html(price);
      jQuery("#misceleneous_name").val(name);

      if (tax == 1) $("#taxBoolean").prop("checked", true);
      else $("#taxBoolean").prop("checked", false);
    } else {
      jQuery(".easy-numpad-output-container .secondDollarSign").css(
        "visibility",
        "hidden"
      );
      jQuery("#easy-numpad-output").html("");
      jQuery("#misceleneous_name").val("Miscellaneous");
      $("#taxBoolean").prop("checked", false);
    }
  });

  jQuery(document).on("click", ".custom_price_save", function () {
    if ($("#is_transaction_completed").val() == 1) {
      clearTransaction();
    }

    var misceleneous_name = jQuery("#misceleneous_name").val();
    var auto_id = jQuery("#misceleneous_name_change option:selected").data("auto_id");
    var tax = 0;

    if (document.getElementById("taxBoolean").checked) {
      tax = 1;
    }

    var custom_price_value = get_float_value(
      jQuery("#easy-numpad-output").html()
    );

    if(auto_id != ''){
      var product_id = auto_id;
    }else{
      var product_id = Math.floor(Math.random() * 100 + 1);
    }

    var is_cart_exist = 0;
    $("input[name='product_price[]']").each(function (e) {
      var product_id_arr = $(this).attr("id").split("product_price_");
      var product_id_exist = product_id_arr[1];
      if(product_id_exist == auto_id){
        $('#product_base_rate_' + auto_id).val(custom_price_value);
        $('#product_rate_' + auto_id).val(custom_price_value);
        $('#product_qty_'+auto_id).val(custom_price_value);
        $('#price_override_original_' + auto_id).val(custom_price_value);
        $('#price_override_new_' + auto_id).val(custom_price_value);

        $('#table_row_' + auto_id).html(misceleneous_name);
        $('#product_cart_name_' + auto_id).val(misceleneous_name);

        $('.misceleneous_item_'+ auto_id).html(misceleneous_name);
        $('.misceleneous_item_'+ auto_id).attr('data-productname',misceleneous_name);


        $('#product_tr_'+auto_id+' .increase').trigger('click');
        is_cart_exist = 1;

        $.ajax({
          type: "POST",
          url: base_url + "cashier/addmisceleneous_name",
          dataType: "json",
          async: false,
          data: {
            misceleneous_name: misceleneous_name,
            custom_price_value: custom_price_value,
            tax: tax,
            auto_id :auto_id,
          },
          success: function (data) {
            //alert(data.message);
            // $("#opencalc .opencalc_close img").click();
            // return false;
          },
        });

        return false;
      }
    });

    if(is_cart_exist == 1){
      return false;
    }
    //

    if (custom_price_value.split(" ").join("") == "") {
      //alert("Price can not be blank.");
      swal({
        title: "Oops!",
        text: "Price can not be blank.",
        icon: "error",
        buttons: false,
        dangerMode: true,
      });
      return false;
    }

    if (misceleneous_name == "") {
      swal({
        title: "Oops!",
        text: "Name can not be blank.",
        icon: "error",
        buttons: false,
        dangerMode: true,
      });
      return false;
    }

    $.ajax({
      type: "POST",
      url: base_url + "cashier/addmisceleneous_name",
      dataType: "json",
      //async: false,
      data: {
        misceleneous_name: misceleneous_name,
        custom_price_value: custom_price_value,
        tax: tax,
        auto_id : auto_id,
      },
      success: function (data) {
        //alert(auto_id);

      },
    });

    if(auto_id != ''){
      $('.misceleneous_item_'+ auto_id).html(misceleneous_name);
      $('.misceleneous_item_'+ auto_id).attr('data-productname',misceleneous_name);
      jQuery("#misceleneous_name_change option:selected").html(misceleneous_name);
      jQuery("#misceleneous_name_change option:selected").attr('data-name',misceleneous_name);
    }

    custom_price_value = parseFloat(custom_price_value);
    custom_price_value = custom_price_value.toFixed(2);

    var item_info = "";
    item_info += '<tr id="product_tr_' + product_id + '">';
    item_info +=
      '<td class="table_row" id="table_row_' + product_id + '" style="text-align: left;padding-left: 7px;">' +
      misceleneous_name +
      "</td>";
    item_info +=
      '<input type="hidden" name="product_id[]" value="' + product_id + '">';
    item_info +=
      '<input type="hidden" name="product_name[]" id="product_cart_name_'+product_id+'"  value="' +
      misceleneous_name +
      '">';


      item_info +=
    '<input type="hidden" id="product_row_total_' +
    product_id +
    '"  name="product_row_total[]" value="' +
    custom_price_value +
    '">';

    item_info +=
      '<input type="hidden" name="product_base_rate[]" id="product_base_rate_' +
      product_id +
      '" value="' +
      custom_price_value +
      '">';

    item_info +=
      '<input type="hidden" name="product_rate[]" id="product_rate_' +
      product_id +
      '"  value="' +
      custom_price_value +
      '">';
    item_info +=
      '<input type="hidden" id="product_price_' +
      product_id +
      '" name="product_price[]" value="' +
      custom_price_value +
      '">';

    item_info +=
      '<input type="hidden" id="product_offer_price_' +
      product_id +
      '" name="product_offer_price[]" value="' +
      custom_price_value +
      '">';

    item_info +=
      '<input type="hidden" id="product_qty_' +
      product_id +
      '" name="product_qty[]" value="1">';

    item_info +=
      '<input type="hidden" id="product_crv_' +
      product_id +
      '" name="product_crv[]" value="0">';

    item_info +=
      '<input type="hidden" id="is_product_crv_' +
      product_id +
      '" name="is_product_crv[]" data-product_unit="0" value="0">';

   item_info +=
    '<input type="hidden" id="is_product_EBT_' +product_id +'" name="is_product_EBT[]" value="1">';


    item_info +=
      '<input type="hidden" id="is_product_size_' +
      product_id +
      '" name="is_product_size[]" value="0">';

    item_info +=
      '<input type="hidden" class="is_texable" id="is_texable_' +
      product_id +
      '" name="is_texable[]" value="' +
      tax +
      '">';

    item_info +=
        '<input type="hidden" name="is_price_override[]" data-proid="'+product_id+'" class="is_price_override" id="is_price_override_'+product_id+'" value="0">';

    item_info +=
      '<input type="hidden" name="price_override_original[]" id="price_override_original_'+product_id+'" value="' +
      custom_price_value +
      '">';

    item_info +=
      '<input type="hidden" name="price_override_new[]" id="price_override_new_'+product_id+'" value="' +
      custom_price_value +
      '">';

    item_info +=
      '<input type="hidden" class="" id="pos_combo_detail_' +
      product_id +
      '" name="pos_combo_detail[]" value="">';

    item_info += "<td>";
    item_info +=
      '<div class="plusMinusContainer"><span class="minus_icon reduced" data-id="' +
      product_id +
      '"  style="position: absolute; cursor: pointer; top: 50%;    transform: translateY(-50%);    height: -webkit-fill-available;    background: red;    left: 10%;    width: 25%;"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 25" fill="none"><mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="11" width="14" height="3"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 13.5417H5V11.4584H19V13.5417Z" fill="white"/></mask> <g mask="url(#mask0)"> <rect x="-13" y="-13.5416" width="50" height="52.0833" fill="white"/> <mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="-13" y="-14" width="50" height="53"> <rect x="-13" y="-13.5416" width="50" height="52.0833" fill="white"/> </mask><g mask="url(#mask1)"></g></g> </svg></span>';
    item_info +=
      '<input type="text" class="quantity_input"  onfocus="this.blur()" readonly="readonly" data-org_price="' +
      custom_price_value +
      '" id="quantity_input_' +
      product_id +
      '" value="1" readonly style="position: absolute;left: 50%;transform: translateX(-50%);width:14%; overflow:visible; border: 0px solid;background: transparent; text-align: center; font-size: 1.6vw;  margin: 0 auto;">';
    item_info +=
      '<span class="plus_icon increase" data-id="' +
      product_id +
      '" style="position: absolute;cursor: pointer;top: 50%;width: 25%; height: -webkit-fill-available;right: 10%;transform: translateY(-50%);background: green;"><svg xmlns="http://www.w3.org/2000/svg" width="60%" height="-webkit-fill-available;" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="white"/></svg></span>';
    item_info += "</td>";

    item_info +=
      '<td class="rightTextAlign">$<span class="onsale_price_' +
      product_id +
      '">' +
      custom_price_value +
      "</span></div> </td>";
    item_info += "</tr>";

    //remove code
    //<span data-productid='" + product_id + "' class='remove_tr'>X</span>

    if ($("#exist_product_id").val() == "") {
      $("#exist_product_id").val(product_id);
    } else {
      var exist_product_id = $("#exist_product_id").val();
      $("#exist_product_id").val(exist_product_id + "," + product_id);
    }

    $(".item_info_section").append(item_info);
    $(".table-container").scrollTop($(".table-container")[0].scrollHeight);
    jQuery("#read_barcode_POS").focus();
    $('#read_barcode_POS').removeClass('use-keyboard-input');
    // ST - For Calculate Total
    calculatePOSTotal();
    // EN - For Calculate Total

    jQuery("#easy-numpad-output").html("");
    jQuery("#misceleneous_name").val("Miscellaneous");

    $("#epa img").click();

    jQuery("#read_barcode_POS").focus();
    $('#read_barcode_POS').removeClass('use-keyboard-input');
  });

  Array.prototype.remove = function () {
    var what,
      a = arguments,
      L = a.length,
      ax;
    while (L && this.length) {
      what = a[--L];
      while ((ax = this.indexOf(what)) !== -1) {
        this.splice(ax, 1);
      }
    }
    return this;
  };

  jQuery(document).on("click", ".remove_tr", function () {
    var product_id = $(this).data("productid");

    //3S346QHZ,JZ6VEFVS

    var exist_product_id_arr = $("#exist_product_id").val().split(",");
    exist_product_id_arr.remove(product_id);
    jQuery("#exist_product_id").val(exist_product_id_arr.join(","));
    jQuery("#product_tr_" + product_id).remove();
    calculatePOSTotal();
  });

  jQuery(document).on("click", ".misceleneous_item", function () {
    var auto_id = $(this).attr("data-auto_id");

    isModalOpen = $.modal.isActive();
    setTimeout(function () {
      isModalOpen = $.modal.isActive();
      //console.log(isModalOpen, $.modal.isActive());
    }, 800);

    $(".x").on("click", function () {
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    });
    //console.log(isModalOpen, $.modal.isActive());

    if ($("#is_transaction_completed").val() == 1) {
      clearTransaction();
    }

    var product_id = auto_id; // Math.floor(Math.random() * 100 + 1);
    var misceleneous_name = jQuery(this).attr("data-productname");
    var custom_price_value = jQuery(this).attr("data-productprice");
    var istaxable = jQuery(this).attr("data-istaxable");
    // var product_id          = $(this).attr("data-product_id");
    var age_restricted = $(this).attr("data-age_restricted");
    var data_crv = $(this).attr("data-crv");
    var data_percent = $(this).attr("data-percent");
    var cent = 0;
    var crv_size = "";
    if (data_percent == 5) {
      cent = 0.05;
      crv_size = "2 oz";
    } else if (data_percent == 10) {
      cent = 0.1;
      crv_size = "25 oz";
    }

    var custom_category_setting_details_auto_id = $(this).attr(
      "data-custom_category_setting_details_auto_id"
    );
    //console.log("In");
    if (
      typeof age_restricted != "undefined" &&
      age_restricted == 1 &&
      $("#is_age_verified").val() == 0
    ) {
      // Exist Popup will show

      $("#age-verify-modal").modal("show");
      $("#no_of_misceleneous_item").val(
        custom_category_setting_details_auto_id
      );
      $("#is_age_verify_custom_product").val(1);
    } else {
      //console.log("product_id: " + product_id);
      //console.log("exist_product_id: " + $("#exist_product_id").val());
      var exist_product_id_arr = $("#exist_product_id").val().split(",");
      if (jQuery.inArray(product_id, exist_product_id_arr) !== -1) {
        // Exist
        //console.log("Exist...");
        $(".increase[data-id=" + product_id + "]").trigger("click");
      } else {
        //console.log("Not Exist...");
        var product_id = auto_id; //Math.floor(Math.random() * 100 + 1);
        $(this).attr("data-product_id", product_id);

        if ($("#exist_product_id").val() == "") {
          $("#exist_product_id").val(product_id);
        } else {
          var exist_product_id = $("#exist_product_id").val();
          $("#exist_product_id").val(exist_product_id + "," + product_id);
        }

        //var custom_price_value = get_float_value(custom_price_value);

        if (custom_price_value.split(" ").join("") == "") {
          swal({
            title: "Oops!",
            text: "Price can not be blank.",
            icon: "error",
            buttons: false,
            dangerMode: true,
          });
          return false;
        }

        if (misceleneous_name == "") {
          swal({
            title: "Oops!",
            text: "Name can not be blank.",
            icon: "error",
            buttons: false,
            dangerMode: true,
          });
          return false;
        }

        custom_price_value = parseFloat(custom_price_value);
        custom_price_value = custom_price_value.toFixed(2);

        var item_info = "";
        item_info += '<tr id="product_tr_' + product_id + '">';
        item_info +=
          '<td class="table_row" id="table_row_' + product_id + '" style="text-align: left;padding-left: 7px;">' +
          misceleneous_name +
          "</td>";
        item_info +=
          '<input type="hidden" name="product_id[]" value="' +
          product_id +
          '">';
        item_info +=
          '<input type="hidden" name="product_name[]" id="product_cart_name_'+
          product_id +'" value="' +misceleneous_name +'">';

         item_info +='<input type="hidden" id="product_row_total_' +product_id +'"  name="product_row_total[]" value="' +
          custom_price_value +'">';

        item_info +=
          '<input type="hidden" name="product_base_rate[]" id="product_base_rate_' +
          product_id +
          '" value="' +
          custom_price_value +
          '">';

        item_info +=
          '<input type="hidden" name="product_rate[]" id="product_rate_' +
          product_id +
          '" value="' +
          custom_price_value +
          '">';
        item_info +=
          '<input type="hidden" id="product_price_' +
          product_id +
          '" name="product_price[]" value="' +
          custom_price_value +
          '">';

        item_info +=
          '<input type="hidden" id="product_offer_price_' +
          product_id +
          '" name="product_offer_price[]" value="' +
          custom_price_value +
          '">';

        item_info +=
          '<input type="hidden" id="product_qty_' +
          product_id +
          '" name="product_qty[]" value="1">';

        item_info +=
          '<input type="hidden" id="product_crv_' +
          product_id +
          '" name="product_crv[]" value="' +
          cent +
          '">';

        item_info +=
          '<input type="hidden" id="is_product_crv_' +
          product_id +
          '" name="is_product_crv[]" data-product_unit="1" value="' +
          data_crv +
          '">';

          item_info +=
    '<input type="hidden" id="is_product_EBT_' +
    product_id +
    '" name="is_product_EBT[]" value="0">';


        item_info +=
          '<input type="hidden" id="is_product_size_' +
          product_id +
          '" name="is_product_size[]" value="' +
          crv_size +
          '">';

        item_info +=
          '<input type="hidden" class="is_texable" id="is_texable_' +
          product_id +
          '" name="is_texable[]" value="' +
          istaxable +
          '">';

       item_info +=
          '<input type="hidden" name="is_price_override[]" data-proid="'+product_id+'" class="is_price_override" id="is_price_override_'+product_id+'" value="0">';

       item_info +=
        '<input type="hidden" name="price_override_original[]" id="price_override_original_'+product_id+'" value="' +
        custom_price_value +
        '">';

       item_info +=
        '<input type="hidden" name="price_override_new[]" id="price_override_new_'+product_id+'" value="' +
        custom_price_value +
        '">';



        item_info +=
          '<input type="hidden" class="" id="pos_combo_detail_' +
          product_id +
          '" name="pos_combo_detail[]" value="">';

        /*item_info += "<td>";
            item_info +=
              '<input type="checkbox" style="height:20px;width:20px" class="is_texable" id="is_texable_' +
              product_id +
              '" name="is_texable[]" value="1">';
            item_info += "</td>";*/

        item_info += "<td>";
        item_info +=
          '<div class="plusMinusContainer"><span class="minus_icon reduced" data-id="' +
          product_id +
          '" style="position: absolute; cursor: pointer; top: 50%;    transform: translateY(-50%);    height: -webkit-fill-available;    background: red;    left: 10%;    width: 25%;"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 25" fill="none"><mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="11" width="14" height="3"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 13.5417H5V11.4584H19V13.5417Z" fill="white"/></mask> <g mask="url(#mask0)"> <rect x="-13" y="-13.5416" width="50" height="52.0833" fill="white"/> <mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="-13" y="-14" width="50" height="53"> <rect x="-13" y="-13.5416" width="50" height="52.0833" fill="white"/> </mask><g mask="url(#mask1)"></g></g> </svg></span>';
        item_info +=
          '<input type="text" class="quantity_input" onfocus="this.blur()" readonly="readonly" data-org_price="' +
          custom_price_value +
          '" id="quantity_input_' +
          product_id +
          '" value="1" readonly style="position: absolute;left: 50%;transform: translateX(-50%);width:14%; overflow:visible; border: 0px solid;background: transparent; text-align: center; font-size: 1.6vw;font-size: 1.6vw;  margin: 0 auto;">';
        item_info +=
          '<span class="plus_icon increase" data-id="' +
          product_id +
          '" style="position: absolute;cursor: pointer;top: 50%;width: 25%; height: -webkit-fill-available;right: 10%;transform: translateY(-50%);background: green;"><svg xmlns="http://www.w3.org/2000/svg" width="60%" height="100%" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="white"/></svg></span>';
        item_info += "</td>";

        item_info +=
          '<td class="rightTextAlign">$<span class="onsale_price_' +
          product_id +
          '">' +
          custom_price_value +
          "</span></div></td>";
        item_info += "</tr>";

        $(".item_info_section").append(item_info);
        $(".table-container").scrollTop($(".table-container")[0].scrollHeight);
      }

      // ST - For Calculate Total
      calculatePOSTotal();
      // EN - For Calculate Total

      // jQuery("#easy-numpad-output").html("");
      // jQuery("#misceleneous_name").val("");

      $("#epa img").click();
      jQuery("#read_barcode_POS").focus();
      $('#read_barcode_POS').removeClass('use-keyboard-input');
    }
  });

  jQuery(document).on("click", ".reduced", function () {
    var product_id = $(this).attr("data-id");
    var quantity = $("#quantity_input_" + product_id).val();
    //var org_price = $("#quantity_input_" + product_id).attr("data-org_price");
    var org_price = $("#price_override_original_" + product_id).val();


    var Applicable_CRV = $("#is_product_crv_" + product_id).val();
    var is_product_size = $("#is_product_size_" + product_id).val();
    var product_unit = $("#is_product_crv_" + product_id).attr(
      "data-product_unit"
    );

    if (quantity > 1) {
      quantity--;
      $("#quantity_input_" + product_id).val(quantity);

      var offer_price = $("#product_offer_price_" + product_id).val();

      var main_base_price = $("#product_base_rate_" + product_id).val();
      var main_price = parseFloat(main_base_price) * parseFloat(quantity);
      if (main_base_price != org_price) {
        $(".onsale_strike_price_" + product_id).html(main_price.toFixed(2));
      }

      // count combo functinality - ST
      var product_combo_value = $("#pos_combo_detail_" + product_id).val();
      var found_combo = 0;
      var new_sale_price = 0.0;
      if (product_combo_value) {
        var product_combo_value_arr = JSON.parse(product_combo_value);
        $.each(product_combo_value_arr, function (key, value) {
          //console.log(value.combo_unit + ": " + quantity);
          // if(value.combo_unit == quantity){
          //   new_sale_price = parseFloat(value.combo_price);
          //   found_combo = 1 ;
          //   return false;
          // }

          if (
            quantity >= value.combo_unit &&
            value.combo_unit != "" &&
            value.combo_unit != 0
          ) {
            var combo_count = quantity / value.combo_unit;
            //console.log("combo_count: " + combo_count);
            combo_count = Math.floor(combo_count);
            //console.log("combo_count ceil: " + combo_count);
            var remain_product = quantity - combo_count * value.combo_unit;
            //console.log("remain_product : " + remain_product);
            var combo_price = combo_count * value.combo_price;
            var remain_price = remain_product * org_price;

            new_sale_price = combo_price + remain_price;
            new_sale_price = parseFloat(new_sale_price);
            found_combo = 1;

            org_price = new_sale_price;

            return false;
          }
        });
      } else {
        var new_sale_price = parseFloat(org_price) * parseFloat(quantity);
      }

      if (found_combo == 0) {
        var new_sale_price = parseFloat(org_price) * parseFloat(quantity);
        org_price = new_sale_price.toFixed(2);
      }
      // count combo functinality - EN

      // apply combo - ST
      // add strick value
      var main_base_price = $("#product_base_rate_" + product_id).val();
      var main_price = parseFloat(main_base_price) * parseFloat(quantity);
      //var promotion_price = parseFloat(org_price) * parseFloat(quantity);
      org_price = parseFloat(org_price);
      org_price = org_price.toFixed(2);

      main_price = parseFloat(main_price);
      main_price = main_price.toFixed(2);

      // alert(main_price);
      // alert(org_price);
      if (main_price != org_price) {
        $(".onsale_price_" + product_id).parent().html("<span class='onsale_price_"+product_id+"'><strike class='onsale_strike_price_" +product_id +"' style='color:red;'>$" +main_price +"</strike><br>$<span class='onsale_price_" +product_id +"'>"+org_price +"</span></span>");
        $("#product_row_total_" + product_id).val(new_sale_price.toFixed(2));
        $("#product_price_" + product_id).val(org_price);
      }else{
        $(".onsale_price_" + product_id).html(new_sale_price.toFixed(2));
        $("#product_row_total_" + product_id).val(new_sale_price.toFixed(2));
        $("#product_price_" + product_id).val(main_price);
        $("#product_offer_price_" + product_id).val(main_price);
        $('#quantity_input_' + product_id).attr('data-org_price',main_price);
      }
      // apply combo - EN

      //prashant added for price priceOverride
       var is_price_override = $('#is_price_override_'+product_id).val();
      if(is_price_override == 1){
        var price_override_new = parseFloat($("#price_override_new_" + product_id).val()) * quantity;
        var mainbase_org = parseFloat($("#price_override_original_" + product_id).val()) * quantity;
        //alert(mainbase_org+'->'+price_override_new);
        price_override_new  = price_override_new.toFixed(2);
        mainbase_org        = mainbase_org.toFixed(2);
        if (mainbase_org != price_override_new) {
          // $(".onsale_strike_price_" + product_id).html(mainbase_org.toFixed(2));
          $(".onsale_price_" + product_id).parent().html("<span class='onsale_price_"+product_id+"'><strike class='onsale_strike_price_" +product_id +"' style='color:red;'>$" +mainbase_org +"</strike><br>$<span class='onsale_price_" +product_id +"'>"+price_override_new +"</span></span>");
          $("#product_price_" + product_id).val(price_override_new);
          $("#product_offer_price_" + product_id).val(price_override_new);
          $('#quantity_input_' + product_id).attr('data-org_price',price_override_new);
          $("#product_row_total_" + product_id).val(price_override_new.toFixed(2));

        }else{
          var base_price =parseFloat($("#price_override_new_" + product_id).val());
          $(".onsale_price_" + product_id).html(new_sale_price.toFixed(2));

          $("#product_row_total_" + product_id).val(mainbase_org.toFixed(2));
          $("#product_price_" + product_id).val(main_price.toFixed(2));
          $("#product_offer_price_" + product_id).val(main_price.toFixed(2));
          $('#quantity_input_' + product_id).attr('data-org_price',main_price.toFixed(2));
        }
        //prashant end code
      }
      //prashant end code

      //$(".onsale_price_" + product_id).html(new_sale_price.toFixed(2));

      $("#product_qty_" + product_id).val(quantity);



      var crv_oz = 0;
      var crv_rate = 0;
      var crv_price = 0;
      if (Applicable_CRV == 1) {
        var str2 = "oz";
        var str3 = "liter";
        var str4 = "ml";
        var str5 = "gallon";
        var str6 = "quart";

        if (
          is_product_size.indexOf(str2) != -1 ||
          is_product_size.indexOf(str3) != -1 ||
          is_product_size.indexOf(str4) != -1 ||
          is_product_size.indexOf(str5) != -1 ||
          is_product_size.indexOf(str6) != -1
        ) {
          // if oz
          //crv_oz = parseFloat(is_product_size);
          if (is_product_size.indexOf(str2) != -1) {
            //alert('oz');
            is_product_size = is_product_size.replace("oz", "");
            is_product_size = is_product_size.replace("liter", "");
            is_product_size = is_product_size.replace("ml", "");
            is_product_size = is_product_size.replace(" ", "");
            crv_oz = parseFloat(is_product_size);
            if (crv_oz > 23.9) {
              if (product_unit > 0) {
                crv_price = 0.1 * quantity * product_unit;
              } else {
                crv_price = 0.1 * quantity;
              }
            } else {
              if (product_unit > 0) {
                crv_price = 0.05 * quantity * product_unit;
              } else {
                crv_price = 0.05 * quantity;
              }
            }
          }
          // if liter
          if (
            is_product_size.indexOf(str3) != -1 ||
            is_product_size.indexOf(str5) != -1 ||
            is_product_size.indexOf(str6) != -1
          ) {
            //alert('littr');
            is_product_size = is_product_size.replace("oz", "");
            is_product_size = is_product_size.replace("liter", "");
            is_product_size = is_product_size.replace("ml", "");
            is_product_size = is_product_size.replace("gallon", "");
            is_product_size = is_product_size.replace("quart", "");
            is_product_size = is_product_size.replace(" ", "");
            if (product_unit > 0) {
              crv_price = 0.1 * quantity * product_unit;
            } else {
              crv_price = 0.1 * quantity;
            }
          }
          // if ml
          if (is_product_size.indexOf(str4) != -1) {
            //alert('ml');
            is_product_size = is_product_size.replace("oz", "");
            is_product_size = is_product_size.replace("liter", "");
            is_product_size = is_product_size.replace("ml", "");
            is_product_size = is_product_size.replace(" ", "");
            crv_oz = parseFloat(is_product_size);
            crv_oz = crv_oz * 0.03;
            //console.log("crv_oz ml =>".crv_oz);
            if (crv_oz > 23.9) {
              if (product_unit > 0) {
                crv_price = 0.1 * quantity * product_unit;
              } else {
                crv_price = 0.1 * quantity;
              }
            } else {
              if (product_unit > 0) {
                crv_price = 0.05 * quantity * product_unit;
              } else {
                crv_price = 0.05 * quantity;
              }
            }
          }
        }
      }

      $("#product_crv_" + product_id).val(parseFloat(crv_price));
      
      //calculatePOSTotal();
      auto_apply_promotion();
      calculatePOSTotal();
    } else {
      swal({
        title: "Are you sure you want to Delete this Product?",
        //text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          $("#product_tr_" + product_id).remove();
          var exist_product_id_arr = $("#exist_product_id").val().split(",");
          exist_product_id_arr.remove(product_id);
          jQuery("#exist_product_id").val(exist_product_id_arr.join(","));
          //auto_apply_promotion();
          //calculatePOSTotal();
          auto_apply_promotion();
          calculatePOSTotal();
        }
      });

    }

    
  });

  jQuery(document).on("click", ".increase", function () {
    var product_id = $(this).attr("data-id");
    //var org_price = $("#quantity_input_" + product_id).attr("data-org_price");
    var org_price = $("#price_override_original_" + product_id).val();
    var quantity = $("#quantity_input_" + product_id).val();
    quantity++;
    $("#quantity_input_" + product_id).val(quantity);

    var offer_price = $("#product_offer_price_" + product_id).val();

    // count combo functinality - ST
    var product_combo_value = $("#pos_combo_detail_" + product_id).val();
    var found_combo = 0;
    var new_sale_price = 0.0;
    if (product_combo_value) {
      var product_combo_value_arr = JSON.parse(product_combo_value);
      $.each(product_combo_value_arr, function (key, value) {
        //console.log(value.combo_unit + ": " + quantity);
        ////console.log("modular : " + modular );
        if (
          quantity >= value.combo_unit &&
          value.combo_unit != "" &&
          value.combo_unit != 0
        ) {
          var combo_count = quantity / value.combo_unit;
          //console.log("combo_count: " + combo_count);
          combo_count = Math.floor(combo_count);
          //console.log("combo_count ceil: " + combo_count);
          var remain_product = quantity - combo_count * value.combo_unit;
          //console.log("remain_product : " + remain_product);
          var combo_price = combo_count * value.combo_price;
          var remain_price = remain_product * org_price;

          new_sale_price = combo_price + remain_price;
          new_sale_price = parseFloat(new_sale_price);
          found_combo = 1;

          org_price = new_sale_price;

          return false;
        }
      });
      //console.log("new_sale_price : " + new_sale_price);
    } else {
      var new_sale_price = parseFloat(org_price) * parseFloat(quantity);
    }

    if (found_combo == 0) {
      var new_sale_price = parseFloat(org_price) * parseFloat(quantity);
      org_price = new_sale_price.toFixed(2);
    }
    // count combo functinality - EN

    // var new_sale_price = parseFloat(org_price) * parseFloat(quantity);

    // add strick value
    var main_base_price = $("#product_base_rate_" + product_id).val();
    var main_price = parseFloat(main_base_price) * parseFloat(quantity);
    //var promotion_price = parseFloat(org_price) * parseFloat(quantity);
    org_price = parseFloat(org_price);
    org_price = org_price.toFixed(2);

    main_price = parseFloat(main_price);
    main_price = main_price.toFixed(2);

    // alert(main_price);
    // alert(org_price);
    if (main_price != org_price) {
      $(".onsale_price_" + product_id).parent().html("<span class='onsale_price_"+product_id+"'><strike class='onsale_strike_price_" +product_id +"' style='color:red;'>$" +main_price +"</strike><br>$<span class='onsale_price_" +product_id +"'>"+org_price +"</span></span>");
      $("#product_row_total_" + product_id).val(new_sale_price.toFixed(2));
      $("#product_price_" + product_id).val(org_price);
    }else{
      $(".onsale_price_" + product_id).html(new_sale_price.toFixed(2));
      $("#product_row_total_" + product_id).val(new_sale_price.toFixed(2));
      $("#product_price_" + product_id).val(main_price);
      $("#product_offer_price_" + product_id).val(main_price);
      $('#quantity_input_' + product_id).attr('data-org_price',main_price);
    }

    //prashant added for price priceOverride
    var is_price_override = $('#is_price_override_'+product_id).val();
    if(is_price_override == 1){
      var price_override_new = parseFloat($("#price_override_new_" + product_id).val()) * quantity;
      var mainbase_org = parseFloat($("#price_override_original_" + product_id).val()) * quantity;
      //alert(mainbase_org+'->'+price_override_new);
      price_override_new  = price_override_new.toFixed(2);
      mainbase_org        = mainbase_org.toFixed(2);
      if (mainbase_org != price_override_new) {
        // $(".onsale_strike_price_" + product_id).html(mainbase_org.toFixed(2));
        $(".onsale_price_" + product_id).parent().html("<span class='onsale_price_"+product_id+"'><strike class='onsale_strike_price_" +product_id +"' style='color:red;'>$" +mainbase_org +"</strike><br>$<span class='onsale_price_" +product_id +"'>"+price_override_new +"</span></span>");
        $("#product_price_" + product_id).val(price_override_new);
        $("#product_offer_price_" + product_id).val(price_override_new);
        $('#quantity_input_' + product_id).attr('data-org_price',price_override_new);
        $("#product_row_total_" + product_id).val(price_override_new.toFixed(2));

      }else{
        var base_price =parseFloat($("#price_override_new_" + product_id).val());
        $(".onsale_price_" + product_id).html(new_sale_price.toFixed(2));

        $("#product_row_total_" + product_id).val(mainbase_org.toFixed(2));
        $("#product_price_" + product_id).val(main_price.toFixed(2));
        $("#product_offer_price_" + product_id).val(main_price.toFixed(2));
        $('#quantity_input_' + product_id).attr('data-org_price',main_price.toFixed(2));
      }
      //prashant end code
    }


    //$("#product_price_" + product_id).val(new_sale_price.toFixed(2));


    //$("#product_offer_price_" + product_id).val();




    $("#product_qty_" + product_id).val(quantity);
    var Applicable_CRV = $("#is_product_crv_" + product_id).val();
    var is_product_size = $("#is_product_size_" + product_id).val();
    var product_unit = $("#is_product_crv_" + product_id).attr(
      "data-product_unit"
    );

    var crv_oz = 0;
    var crv_rate = 0;
    var crv_price = 0;
    if (Applicable_CRV == 1) {
      var str2 = "oz";
      var str3 = "liter";
      var str4 = "ml";
      var str5 = "gallon";
      var str6 = "quart";

      if (
        is_product_size.indexOf(str2) != -1 ||
        is_product_size.indexOf(str3) != -1 ||
        is_product_size.indexOf(str4) != -1 ||
        is_product_size.indexOf(str5) != -1 ||
        is_product_size.indexOf(str6) != -1
      ) {
        // if oz
        //crv_oz = parseFloat(is_product_size);
        if (is_product_size.indexOf(str2) != -1) {
          //alert('oz');
          is_product_size = is_product_size.replace("oz", "");
          is_product_size = is_product_size.replace("liter", "");
          is_product_size = is_product_size.replace("ml", "");
          is_product_size = is_product_size.replace(" ", "");
          crv_oz = parseFloat(is_product_size);
          if (crv_oz > 23.9) {
            if (product_unit > 0) {
              crv_price = 0.1 * quantity * product_unit;
            } else {
              crv_price = 0.1 * quantity;
            }
          } else {
            if (product_unit > 0) {
              crv_price = 0.05 * quantity * product_unit;
            } else {
              crv_price = 0.05 * quantity;
            }
          }
        }
        // if liter
        if (
          is_product_size.indexOf(str3) != -1 ||
          is_product_size.indexOf(str5) != -1 ||
          is_product_size.indexOf(str6) != -1
        ) {
          //alert('littr');
          is_product_size = is_product_size.replace("oz", "");
          is_product_size = is_product_size.replace("liter", "");
          is_product_size = is_product_size.replace("ml", "");
          is_product_size = is_product_size.replace("gallon", "");
          is_product_size = is_product_size.replace("quart", "");
          is_product_size = is_product_size.replace(" ", "");
          if (product_unit > 0) {
            crv_price = 0.1 * quantity * product_unit;
          } else {
            crv_price = 0.1 * quantity;
          }
        }
        // if ml
        if (is_product_size.indexOf(str4) != -1) {
          //alert('ml');
          is_product_size = is_product_size.replace("oz", "");
          is_product_size = is_product_size.replace("liter", "");
          is_product_size = is_product_size.replace("ml", "");
          is_product_size = is_product_size.replace(" ", "");
          crv_oz = parseFloat(is_product_size);
          crv_oz = crv_oz * 0.03;
          //console.log("crv_oz ml =>".crv_oz);
          if (crv_oz > 23.9) {
            if (product_unit > 0) {
              crv_price = 0.1 * quantity * product_unit;
            } else {
              crv_price = 0.1 * quantity;
            }
          } else {
            if (product_unit > 0) {
              crv_price = 0.05 * quantity * product_unit;
            } else {
              crv_price = 0.05 * quantity;
            }
          }
        }
      }

    }

    $("#product_crv_" + product_id).val(parseFloat(crv_price));
    calculatePOSTotal();
    auto_apply_promotion();
    calculatePOSTotal();
    
  });

  // cash transaction
  jQuery(document).on("click", "#del2", function (e) {
    e.preventDefault();

    $("#overlay,.loader").show();
    $("#is_cashback,#cashback_fee,#cashback_amount").val(0);
    var return_bal = $("#return_balance_html").html();
    var optxt = $("#optxt").html();

    if (optxt == "") {
      $("#overlay,.loader").hide();
      //alert("Please enter amount");
      swal({
        title: "Oops!",
        text: "Please enter amount",
        icon: "error",
        buttons: false,
        timer: 2200,
      });
      return false;
    }

    if (parseFloat(return_bal) < 0) {

      //check for partial transaction - ST - ravi - 27-10-21 
      // alert(optxt);
      // alert(return_bal);
      $("#overlay,.loader").hide();
      $('#partial_transaction_apply').val(1);
      $('#partial_transaction_cash_amount').val(optxt);
      $('#partial_transaction_card_amount').val(Math.abs(return_bal));
      $(".opencalc_close img").click();
      $("div.jquery-modal").remove();
      $("#card_transaction_modal").modal("show");
      return false;
      //check for partial transaction - EN - ravi - 27-10-21 

      
      swal({
        title: "Oops!",
        text: "Tendered cash is less than billed amount",
        icon: "error",
        buttons: false,
        timer: 2200,
      });
      return false;
    }

    $("#db_return_balance").val(parseFloat(return_bal));
    var data = $("#frmItemCart").serializeArray();
    $.ajax({
      type: "POST",
      url: base_url + "cashier/POSterminalCheckout",
      dataType: "json",
      data: data,
      success: function (data) {
        //alert(data.message);
        $("#overlay,.loader").hide();
        if (data.notify == "Limit Exceed") {
          swal({
            title: "Oops!",
            text: "You have exceeded the limit allowed for Cash Register. Please do a mandatory Cash Drop",
            icon: "error",
            buttons: false,
            timer: 3000,
          });
          // $("#cashdroplaunchbtn").trigger("click") ;
          setTimeout(function () {
            $("#cashdrop").modal();
            $("#cdinput").val(data.cash_drop_amt.toFixed(2));
          }, 3500);
        }

        $(".opencalc_close img").click();
        $("div.jquery-modal").remove();

        $(
          "#transaction_type,#transaction_status,#transaction_return_balance,#tendered_amt"
        ).show();
        $("#transaction_return_balance_html").html("$" + return_bal);

        // $("#notify_status").show();
        // $("#notify_html").html(data.notify);

        var return_balance_html = parseFloat($("#return_balance_html").html());
        var grand_total = parseFloat($("#cart_grand_total").val());
        var transaction_tendered = return_balance_html + grand_total;
        $("#transaction_tendered").html("$" + transaction_tendered.toFixed(2));

        $("#is_transaction_completed").val("1");
        $("#is_age_verified").val("0");
        $("#barcode_product_before_age_verify").val("");
        $("#age_verify_date").val("");

        var previous_order = localStorage.getItem("current_order");
        var current_order = data.order_id;
        localStorage.setItem("previous_order", previous_order);
        localStorage.setItem("current_order", current_order);

        $(".print_current_transaction").attr("data-order_id", current_order);
        $(".print_previous_transaction").attr("data-order_id", previous_order);

        $("#print_receipt_enable").removeAttr("style");

        $(".plusMinusContainer")
          .find(".minus_icon")
          .addClass("btn-custom-disable");
        $(".plusMinusContainer")
          .find(".plus_icon")
          .addClass("btn-custom-disable");
        $(".total-con").scrollTop($(".total-con")[0].scrollHeight);

        $("#transaction_type_html").html("Cash");

        $(".print_current_transaction").css("pointer-events", "");

        $("#cart_cashback_amount,#cart_cashback_fee,#cart_cashback_order_total").hide();

        if(node_setting == 1){
          var product_array = new Array();
          json_string = '{"transaction_type":"cash","transaction_status":"Success","return_balance":'+return_bal+',"amount_tendered":'+transaction_tendered.toFixed(2)+'}';
          product_array.push(json_string);
          socket.emit('complete_client_transaction',product_array);
        }

        // $("#print_receipt_enable").trigger("click");
        // doPrintReceipt(data.order_id);

        //window.open(base_url + "cashier/pos_rcpt/"+data.order_id,'_blank');
        //return false;
      },
    });
    document.getElementById("optxt").innerHTML = "";
  });


  

  // card transaction
  jQuery(document).on("click", "#card_transaction", function (e) {
    e.preventDefault();
    $("#overlay").show();
    $(".loader").show();
    //return false;

    var exist_product_id = $("#exist_product_id").val();

    if (exist_product_id == "") {
      $("#overlay").hide();
      $(".loader").hide();

      swal({
        icon: "warning",
        title: "Oops!",
        text: "There are no Products in your Cart",
        icon: "warning",
        buttons: false,
        dangerMode: false,
        timer: 2000,
      });

      return false;
    }

    var data = $("#frmItemCart").serializeArray();
    $.ajax({
      type: "POST",
      url: base_url + "cashier/POSterminalCheckoutCard",
      dataType: "json",
      async: true,
      data: data,
      beforeSend: function () {
        $("#overlay").show();
        $(".loader").show();
      },
      success: function (data) {

        if(data.status != 1 && node_setting == 1){
          var product_array = new Array();
          json_string = '{"transaction_type":"card","transaction_status":"fail","return_balance":"0.00","amount_tendered":0.00}';
          product_array.push(json_string);
          socket.emit('card_transaction_from_client',product_array);
        }

        if (data.status == 1) {
          $("#overlay").hide();
          $(".loader").hide();

          $(".opencalc_close img").click();
          $("div.jquery-modal").remove();

          var return_bal = 0.0;
          $("#transaction_type,#transaction_status").show();
          $("#transaction_return_balance_html").html(
            "$" + return_bal.toFixed(2)
          );

          var return_balance_html = parseFloat(
            $("#return_balance_html").html()
          );
          var grand_total = parseFloat($("#cart_grand_total").val());
          var transaction_tendered = return_balance_html + grand_total;
          transaction_tendered = 0.0;
          $("#transaction_tendered").html(
            "$" + transaction_tendered.toFixed(2)
          );

          $("#is_transaction_completed").val("1");
          $("#is_age_verified").val("0");
          $("#barcode_product_before_age_verify").val("");
          $("#age_verify_date").val("");

          var previous_order = localStorage.getItem("current_order");
          var current_order = data.order_id;
          localStorage.setItem("previous_order", previous_order);
          localStorage.setItem("current_order", current_order);

          $(".print_current_transaction").attr("data-order_id", current_order);
          $(".print_previous_transaction").attr(
            "data-order_id",
            previous_order
          );

          $("#print_receipt_enable").removeAttr("style");

          $(".plusMinusContainer")
            .find(".minus_icon")
            .addClass("btn-custom-disable");
          $(".plusMinusContainer")
            .find(".plus_icon")
            .addClass("btn-custom-disable");
          $(".total-con").scrollTop($(".total-con")[0].scrollHeight);

          $("#transaction_type_html").html("Card");

          $(".print_current_transaction").css("pointer-events", "");
          jQuery("a[href='#close-modal'] img").trigger("click");
          swal({
            title: "Success!",
            text: "Transaction successfully..!",
            icon: "success",
            buttons: false,
            timer: 2000,
          });

          if(node_setting == 1){
            var product_array = new Array();
            json_string = '{"transaction_type":"card","transaction_status":"success","return_balance":"0.00","amount_tendered":'+transaction_tendered.toFixed(2)+'}';
            product_array.push(json_string);
            socket.emit('card_transaction_from_client',product_array);
          }

        } else if (data.status == 0) {
          $("#overlay").hide();
          $(".loader").hide();

          swal({
            title: "Oops!",
            text: "There are no Products in your Cart !!",
            icon: "error",
            buttons: false,
            dangerMode: true,
            timer: 2000,
          });
          return false;
        } else if (data.status == 2) {
          $("#overlay").hide();
          $(".loader").hide();

          swal({
            title: "Oops!",
            text: "Server Is Not Ready !!",
            icon: "error",
            buttons: false,
            dangerMode: true,
            timer: 2000,
          });
          return false;
        } else if (data.status == 3) {
          $("#overlay").hide();
          $(".loader").hide();
          swal({
            title: "Oops!",
            text: "Could not connect to server !!.",
            icon: "error",
            buttons: false,
            dangerMode: true,
            timer: 2000,
          });
        } else if (data.status == 4) {
          $("#overlay").hide();
          $(".loader").hide();
          swal({
            title: "Transaction Fail !! Retry For Transaction ?",
            text: "",
            icon: "warning",
            buttons: {
              catch: {
                text: "Retry",
                value: "catch",
              },
              cancel: "Cancel",
            },
          }).then((value) => {
            switch (value) {
              case "catch":
                retryCardTransaction();
                break;

              default:
            }
          });
        } else if (data.status == 5) {
          $("#overlay").hide();
          $(".loader").hide();
          swal({
            title: "Oops!",
            text: "Transaction Declined.",
            icon: "error",
            buttons: false,
            dangerMode: true,
            timer: 2000,
          });
          return false;
        } else if (data.status == 6) {
          $("#overlay").hide();
          $(".loader").hide();
          swal({
            title: "Oops!",
            text: "Transaction Failed.",
            icon: "error",
            buttons: false,
            dangerMode: true,
            timer: 3000,
          });
          return false;
        } else if (data.status == 7) {
          $("#overlay").hide();
          $(".loader").hide();
        } else if (data.status == 8 || data.status == 9) {

          // 8 - Dynamic error message / 9 - Cannot connect to your Clover device

          $("#overlay").hide();
          $(".loader").hide();
          swal({
            title: "Oops!",
            text: data.message,
            icon: "error",
            buttons: false,
            dangerMode: true,
            timer: 3000,
          });
          return false;
        }
      },
    });
    document.getElementById("optxt").innerHTML = "";
  });

  // jQuery(document).on("click", ".is_texable", function (e) {
  //   calculatePOSTotal();
  // });
});

function retryCardTransaction() {
  var data = $("#frmItemCart").serializeArray();
  $.ajax({
    type: "POST",
    url: base_url + "cashier/POSterminalCheckoutCardAuth",
    dataType: "json",
    async: true,
    data: data,
    beforeSend: function () {
      $("#overlay").show();
      $(".loader").show();
    },
    success: function (data) {
      if (data.status == 1) {
        $("#overlay").hide();
        $(".loader").hide();

        $(".opencalc_close img").click();
        $("div.jquery-modal").remove();

        $(
          "#transaction_type,#transaction_status,#transaction_return_balance,#tendered_amt"
        ).show();
        $("#transaction_return_balance_html").html("$" + return_bal);

        var return_balance_html = parseFloat($("#return_balance_html").html());
        var grand_total = parseFloat($("#cart_grand_total").val());
        var transaction_tendered = return_balance_html + grand_total;
        $("#transaction_tendered").html("$" + transaction_tendered.toFixed(2));

        $("#is_transaction_completed").val("1");
        $("#is_age_verified").val("0");
        $("#barcode_product_before_age_verify").val("");
        $("#age_verify_date").val("");

        var previous_order = localStorage.getItem("current_order");
        var current_order = data.order_id;
        localStorage.setItem("previous_order", previous_order);
        localStorage.setItem("current_order", current_order);

        $(".print_current_transaction").attr("data-order_id", current_order);
        $(".print_previous_transaction").attr("data-order_id", previous_order);

        $("#print_receipt_enable").removeAttr("style");

        $(".plusMinusContainer")
          .find(".minus_icon")
          .addClass("btn-custom-disable");
        $(".plusMinusContainer")
          .find(".plus_icon")
          .addClass("btn-custom-disable");
        $(".total-con").scrollTop($(".total-con")[0].scrollHeight);

        $(".print_current_transaction").css("pointer-events", "");

        swal({
          title: "Success!",
          text: "Transaction successfully..!",
          icon: "success",
          buttons: false,
          timer: 2000,
        });
      } else if (data.status == 0) {
        $("#overlay").hide();
        $(".loader").hide();

        swal({
          title: "Oops!",
          text: "There are no Products in your Cart !!",
          icon: "error",
          buttons: false,
          dangerMode: true,
          timer: 2000,
        });
        return false;
      } else if (data.status == 2) {
        $("#overlay").hide();
        $(".loader").hide();

        swal({
          title: "Oops!",
          text: "Server Is Not Ready !!",
          icon: "error",
          buttons: false,
          dangerMode: true,
          timer: 2000,
        });
        return false;
      } else if (data.status == 3) {
        $("#overlay").hide();
        $(".loader").hide();
        swal({
          title: "Oops!",
          text: "Could not connect to server !!.",
          icon: "error",
          buttons: false,
          dangerMode: true,
          timer: 2000,
        });
      } else if (data.status == 4) {
        $("#overlay").hide();
        $(".loader").hide();
        swal({
          title: "Transaction Fail !! Retry For Transaction ?",
          text: "",
          icon: "warning",
          buttons: {
            catch: {
              text: "Retry",
              value: "catch",
            },
            cancel: "Cancel",
          },
        }).then((value) => {
          switch (value) {
            case "catch":
              retryCardTransaction();
              break;

            default:
          }
        });
      } else if (data.status == 5) {
        $("#overlay").hide();
        $(".loader").hide();
        swal({
          title: "Oops!",
          text: "Transaction Declined.",
          icon: "error",
          buttons: false,
          dangerMode: true,
          timer: 2000,
        });
        return false;
      } else if (data.status == 6) {
        $("#overlay").hide();
        $(".loader").hide();
        swal({
          title: "Oops!",
          text: "Transaction Failed.",
          icon: "error",
          buttons: false,
          dangerMode: true,
          timer: 2000,
        });
        return false;
      } else if (data.status == 7) {
        $("#overlay").hide();
        $(".loader").hide();
      }
    },
  });
}

jQuery(document).on("click", ".print_receipt", function (e) {
  e.preventDefault();
  var print_type = $(this).attr("data-print_type");
  var order_id = $(this).attr("data-order_id");
  $(".jquery-modal").removeClass("blocker");
  $(".jquery-modal").removeClass("current");
  clearTransaction();
  doPrintReceipt(order_id);
});

function doPrintReceipt(ord_id) {
  // $.addPanels(base_url + "cashier/pos_rcpt/"+ord_id);
  $(".print_receipt_modal_close").trigger("click");

  $.ajax({
    type: "POST",
    url: base_url + "cashier/pos_rcpt/" + ord_id,
    dataType: "html",
    async: false,
    success: function (data) {
      // $("#print_receipt_enable").css("pointer-events","none");
      var fileContents = data;

      var popupWinindow = window.open(
        "",
        "_blank",
        "width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no"
      );
      popupWinindow.document.open();
      popupWinindow.document.write(fileContents);
      popupWinindow.document.close();
    },
  });
}

function checkValidNumber(ent) {
  var val = window.event ? ent.keyCode : ent.which;
  //alert(val);
  if (val < 48 && val != "46" && val != 13)
    // Allow Enter Key
    window.event ? (ent.keyCode = 0) : (ent.which = 0);

  if (val > 57) return false;

  return true;
}

function promotion_calculation() {
  var exist_product_id = $("#exist_product_id").val();
  var qty = [];

  $("input[name='product_qty[]']").each(function (e) {
    qty.push($(this).val());
  });

  jQuery
    .ajax({
      type: "POST",
      async: false,
      dataType: "json",

      url: base_url + "cashier/promotion_calculation",

      data: { exist_product_id: exist_product_id, qty_txt: qty.join(",") },
    })
    .done(function (response) {
      //console.log(response);

      // promotion code  ST - Ravi
      var discount = 0.0;
      var promo_name = "";
      // alert(response.status);
      if (response.status == 1) {
        discount = response.coupon_amount.amount;
        promo_name = response.coupon_amount.promo_name;
        discount_pre = $("#coupon_discount_total").val();
        discount = discount + discount_pre;
        discount = parseFloat(discount);
        discount = discount.toFixed(2);
        $("#coupon_discount_total").val(discount);

        var eixsting_promotion = $("#exist_promotion").val();
        if (eixsting_promotion == "") {
          $("#exist_promotion").val(promo_name);
        } else {
          var eixsting_promotion_ar = eixsting_promotion.split(",");
          eixsting_promotion_ar.push(promo_name);
          eixsting_promotion = eixsting_promotion_ar.join(",");
          $("#exist_promotion").val(eixsting_promotion);
        }
      }
      // promotion code  ST - Ravi
    });
}

function calculatePOSTotal() {
  var sub_total = 0.0;
  var taxable_total = 0.0;
  var crv = 0.0;
  var base_price = 0.0;


  var product_array = new Array();
  var json_string = '';
  var response_string = '';
  //var pro_array = new Array();
  var redeem_points_discount = $("#redeem_points_discount").val();

  product_array.splice(0, product_array.length)

  $("input[name='product_price[]']").each(function (e) {
    var product_id_arr = $(this).attr("id").split("product_price_");
    var product_id = product_id_arr[1];

    var pro_crv = $("#product_crv_" + product_id).val();
    crv += parseFloat(pro_crv);

    var price = $(this).val();
    var offer_price = $("#product_offer_price_" + product_id).val();

    var pro_base_price = $("#product_base_rate_" + product_id).val();
    var pro_qty = $("#product_qty_" + product_id).val();

    var final_base_price = pro_base_price * pro_qty;

    base_price = parseFloat(base_price) + parseFloat(final_base_price);

    sub_total = parseFloat(sub_total) + parseFloat($(this).val());

    if (jQuery("#is_texable_" + product_id).val() == 1) {
      taxable_total = parseFloat(taxable_total) + parseFloat($(this).val());
    }

    /* create product array for customer screen */
    var product_name = $("#product_cart_name_" + product_id).val();
    //pro_array = new Array(product_name,pro_qty,final_base_price);

    json_string = '{"product_name":"'+product_name+'","qty":'+pro_qty+',"price":'+final_base_price+'}';
    //alert(json_string);
    product_array.push(json_string);

  });

  response_string += '{"product_details" :['+product_array+']';

  //customer_product_array.push(product_string);
  //var customer_product_array = new Array(product_string);

  var sub_total_disp = sub_total.toFixed(2);
  var sub_total_taxable_disp = taxable_total;
  crv = parseFloat(crv);

  $("#sub_total").html("$" + sub_total_disp);
  response_string += ',"sub_total" :'+sub_total_disp;
  //customer_product_array.push({'sub_total':sub_total_disp});

  var tax = 7.75;
  var tax_calculate = (sub_total_taxable_disp * tax) / 100;
  tax_calculate = tax_calculate.toFixed(2);

  var grand_total =
    parseFloat(sub_total_disp) + parseFloat(tax_calculate) + parseFloat(crv);

  //console.log("sub_total_disp: " + sub_total_disp);
  //console.log("tax_calculate: " + tax_calculate);
  //console.log("crv: " + crv);

  var grand_total_disp = grand_total.toFixed(2);
  console.log("line no 2749 ->"+grand_total_disp);
  $("#tax_html").html("$" + parseFloat(tax_calculate).toFixed(2));
  $("#tax_amount").val(parseFloat(tax_calculate).toFixed(2));
  $("#CRV_box").html(parseFloat(crv).toFixed(2));
  $("#container_deposit").val(parseFloat(crv).toFixed(2));

  //customer_product_array.push({'crv':crv });
  //customer_product_array.push({'tax':tax_calculate });

  response_string += ',"crv" :'+crv;
  response_string += ',"tax" :'+tax_calculate;

  // display promotion price discount
  base_price = parseFloat(base_price);
  base_price = base_price.toFixed(2);
  sub_total = sub_total.toFixed(2);

  //console.log("base_price : " + base_price);
  //console.log("sub_total : " + sub_total);

  pro_discount = 0.00;
  if (base_price != sub_total) {
    pro_discount = base_price - sub_total;

    pro_discount = parseFloat(pro_discount);
    pro_discount = pro_discount.toFixed(2);
    $("#promotion_coupon_discount").html(pro_discount);
    $("#promotion_discount_div").show();
    response_string += ',"coupon_discount" :'+pro_discount;
  } else {
    $("#promotion_discount_div").hide();
    response_string += ',"coupon_discount" :0.00';
  }

  // priceride code start
     var total_savings = 0.0;
     var override_discount = 0.0;

     $("input[name='is_price_override[]']").each(function (e) {
         var temp_product_id = $(this).attr('data-proid');
         var override_original = parseFloat($("#price_override_original_"+ temp_product_id).val());
         var override_new = parseFloat($("#price_override_new_"+ temp_product_id).val());
         var quantity = $("#product_qty_"+ temp_product_id).val();

         //alert(override_original+'->'+override_new);         
         // override_discount += (override_original - override_new) * quantity;

         var check_po = override_original - override_new;

         if(check_po != 0) {
            $("#product_tr_"+temp_product_id).addClass("priceoverrided");
         } else {
            $("#product_tr_"+temp_product_id).removeClass("priceoverrided");
         }
         //override_discount += override_discount ;
     });


     total_savings = parseFloat(total_savings) + parseFloat(override_discount);
     ////console.log('increase-> main base '+main_base_price+' -> '+org_price);
     override_discount = override_discount.toFixed(2);

     if (override_discount > 0) {
      //console.log('override_discount ->' + override_discount);
      //console.log('pro_discount ->' + pro_discount);

      var final_disc_amount = parseFloat(pro_discount) + parseFloat(override_discount);

      final_disc_amount = parseFloat(final_disc_amount);
      final_disc_amount = final_disc_amount.toFixed(2);
      //console.log('final_disc_amount ->' + final_disc_amount);
      $("#promotion_coupon_discount").html(final_disc_amount);
      $("#promotion_discount_div").show();

       // $("#prc_overirde_discount").html(override_discount);
       // $("#price_override_div").show();
     }else if(pro_discount != 0.00){
      //console.log('else override_discount ->' + override_discount);
      //console.log('else pro_discount ->' + pro_discount);
      $("#promotion_coupon_discount").html(pro_discount);
      $("#promotion_discount_div").show();
     }else{
        $("#promotion_discount_div").hide();
       //$("#prc_overirde_discount").html(0.00);
       //$("#price_override_div").hide();
     }
  // priceride code over




  //discount calculation - ST - Ravi
  var coupon_discount_total = $("#coupon_discount_total").val();
  var custom_discount_total = $("#custom_discount_total").val();

  final_discount = parseFloat(coupon_discount_total) + parseFloat(custom_discount_total);
  final_discount = parseFloat(final_discount);
  if(final_discount > 0.00){
    $('#discount_div').show();
    $('#coupon_discount').html(final_discount.toFixed(2));
  }else{
    $('#discount_div').hide();
    $('#coupon_discount').html('0.00');
  }
  //discount calculation - ET - Ravi


  // custom discount calculation - ST - Ravi
  // var custom_discount_total = $("#custom_discount_total").val();
  // if(custom_discount_total > 0.00){
  //   $('#discount_div').show();
  //   $('#coupon_discount').html(custom_discount_total);
  // }
  // custom discount calculation - ET - Ravi


  // ST - For Redeem point calculation
var  loyality_v2=Math.abs(loyality);
//alert(loyality);
  if(loyality<0){

    console.log("line no 2869 ->"+grand_total_disp);

    if(grand_total_disp<0){
      if(grand_total_disp<loyality){
         $('#redeem_return').html(Math.abs(loyality)+".00");
        redeem_points_discount=0;
      } else if(grand_total_disp>=loyality){
        var redeem_total_refund=Math.abs(grand_total_disp);
        redeem_points_discount=Math.abs(loyality)-redeem_total_refund;
        $('#redeem_return').html(Math.abs(loyality)+".00");
      }
    }
    else {
          $('#redeem_return').html(Math.abs(loyality)+".00");
          redeem_points_discount=loyality_v2;
    }

  }

  
  // ST - For Discount calculation
  var coupon_discount_total = $("#coupon_discount_total").val();
  grand_total_disp = grand_total_disp - coupon_discount_total;
  grand_total_disp = grand_total_disp.toFixed(2);
  // EN - For Discount calculation


  console.log("line no 2897 ->"+grand_total_disp);

  // ST - For custom Discount calculation
  var custom_discount_total = $("#custom_discount_total").val();
  grand_total_disp = grand_total_disp - custom_discount_total;
  grand_total_disp = grand_total_disp.toFixed(2);
  // EN - For custom Discount calculation

  console.log("line no 2900 ->"+grand_total_disp);

  loyality_v2=isNaN(loyality_v2)?0:loyality_v2;
  grand_total_disp = parseFloat(grand_total_disp)+parseFloat(loyality_v2) - parseFloat(redeem_points_discount);
  var coupon_discount_return;

  console.log("line no 2906 ->"+grand_total_disp);

  coupon_discount_return=$('#coupon_discount_return').val();
   if(coupon_discount_return!=undefined){
    grand_total_disp = grand_total_disp - coupon_discount_return;
   }

   console.log("line no 2913 ->"+grand_total_disp);

    var discount_discount_return;
  discount_discount_return=$('#discount_discount_return').val();
   if(discount_discount_return!=undefined){
    grand_total_disp = grand_total_disp - discount_discount_return;
   } 

   console.log("line no 2921 ->"+grand_total_disp);

  grand_total_disp = grand_total_disp.toFixed(2);

  console.log("line no 2925 ->"+grand_total_disp);

  redeem_points_discount=parseFloat(redeem_points_discount).toFixed(2);
  $("#redeem_points_discount").val(redeem_points_discount);
  $("#redeem_discount").html(redeem_points_discount);

  if(redeem_points_discount != 0)
    response_string += ',"redeem_points_discount" :'+redeem_points_discount;
  else
    response_string += ',"redeem_points_discount" :0';
  // EN - For Redeem point calculation

  //console.log("is_cashback: " + $(".item_info_section #is_cashback").val());
  if ($(".item_info_section #is_cashback").val() == 1) {
    var cashback_fee = $(".item_info_section #cashback_fee").val();
    var cashback_amount = $(".item_info_section #pos_cashback_amount").val();

    //console.log("cashback_fee: " + cashback_fee + "cashback_amount: " + cashback_amount);

    var disp_grand_tot =
      parseFloat(grand_total_disp) +
      parseFloat(cashback_fee) +
      parseFloat(cashback_amount);
    disp_grand_tot = disp_grand_tot.toFixed(2);

    //console.log("grand_total: " + disp_grand_tot);

    $("#grand_total").html("$" + disp_grand_tot);
    //customer_product_array.push({'cash_back':cashback_fee });
    response_string += ',"cash_back" :'+cashback_amount;
    response_string += ',"cash_back_fee" :'+cashback_fee;
  } else {
    $("#grand_total").html("$" + grand_total_disp);
    //customer_product_array.push({'cash_back':0.00 });
    response_string += ',"cash_back" :0.00';
  }


  //customer_product_array.push({'cart_total':grand_total_disp });
  response_string += ',"cart_total" :'+grand_total_disp+'}';

  //console.log('customer_product_array client->'+response_string);

  $("#cart_grand_total").val(grand_total_disp);

  $("#main_cart_grand_total").val(grand_total_disp);
  //Calculate_coupon();
  // product count - ST
  var total_product = 0;
  $("input[name='product_qty[]']").each(function (e) {
    total_product += parseInt($(this).val());
  });
  //total_product = total_product.toFixed(2);
  $("#total_item").html(total_product);
  // product count - EN

  // prashant added this below if condition
  if (grand_total_disp < 0) {
    $("#grand_total").css("color", "red");
    $(".totalColor").find("p").css("color", "red");
  } else {
    $("#grand_total").css("color", "black");
    $(".totalColor").find("p").css("color", "black");
  }

  jQuery("#read_barcode_POS").focus();
  $('#read_barcode_POS').removeClass('use-keyboard-input');

  /* call customer screen */
  if(node_setting == 1){
    send_customer_cart_data(response_string);
  }
  show_cash_button();
}
function sendWalkin(mobileNum) {
  var customer_mobile_no = mobileNum;
  //console.log(customer_mobile_no, "cmo enter");
  $.ajax({
    type: "POST",
    url: base_url + "cashier/getcustomerByPhone",
    dataType: "json",
    async: false,
    data: {
      customer_mobile_no: customer_mobile_no,
    },
    success: function (data) {
      if (data.status == "success") {
        var customer_name = data.data.customer_name;
        var customer_id = data.data.customer_id;
        var tot_redeem_point = data.data.tot_redeem_point;
        var account_balance = data.account_balance;
        var db_point_amount = data.data.db_point_amount;
        var db_point = data.data.db_point;

        $(".pos-head").html(customer_name);
        $(".pos-head").css("color", "#000");
        $("#walk_in_customer_name").val(customer_name);
        $("#walk_in_customer_id").val(customer_id);
        $("#customer_mobile_no").val("");
        $("#cust_loyalty_points").html(tot_redeem_point);
        $("#cust_loyalty_amount").html(account_balance);

        $("#outbound_point_main").val(db_point);
        $("#outbound_point_amount_main").val(db_point_amount);

        $("a[href='#pos_redeem_points_modal']").attr(
          "data-cust_loyalty_points",
          tot_redeem_point
        );
        $("a[href='#pos_redeem_points_modal']").attr(
          "data-cust_loyalty_amount",
          account_balance
        );

        jQuery("a[href='#close-modal'] img").trigger("click");
      } else if (data.status == "fail") {
        swal({
          title: "Oops!",
          text: "Mobile Number. not registered, please register..!",
          icon: "error",
          buttons: false,
          timer: 2500,
        });
        $(".walk_in_customer_modal_close").trigger("click");
        $("#read_barcode_POS").focus();
        $('#read_barcode_POS').removeClass('use-keyboard-input');
      }
      // $("#opencalc .opencalc_close img").click();
      // return false;
    },
  });
}
jQuery(document).on("click", "#walkinsubmit", function (e) {
  // alert("test send");
  var customer_mobile_no = $("#customer_mobile_no").val();
  //console.log(customer_mobile_no, "cmo onclick");
  $.ajax({
    type: "POST",
    url: base_url + "cashier/getcustomerByPhone",
    dataType: "json",
    async: false,
    data: {
      customer_mobile_no: customer_mobile_no,
    },
    success: function (data) {
      if (data.status == "success") {
        var customer_name = data.data.customer_name;
        var customer_id = data.data.customer_id;
        var tot_redeem_point = data.data.tot_redeem_point;
        var account_balance = data.account_balance;
        var db_point_amount = data.data.db_point_amount;
        var db_point = data.data.db_point;

        $(".pos-head").html(customer_name);
        $(".pos-head").css("color", "#000");
        $("#walk_in_customer_name").val(customer_name);
        $("#walk_in_customer_id").val(customer_id);
        $("#customer_mobile_no").val("");
        $("#cust_loyalty_points").html(tot_redeem_point);
        $("#cust_loyalty_amount").html(account_balance);

        $("#outbound_point_main").val(db_point);
        $("#outbound_point_amount_main").val(db_point_amount);

        $("a[href='#pos_redeem_points_modal']").attr(
          "data-cust_loyalty_points",
          tot_redeem_point
        );
        $("a[href='#pos_redeem_points_modal']").attr(
          "data-cust_loyalty_amount",
          account_balance
        );

        jQuery("a[href='#close-modal'] img").trigger("click");
      } else if (data.status == "fail") {
        swal({
          title: "Oops!",
          text: "Mobile Number not registered, Please Register",
          icon: "error",
          buttons: false,
          timer: 2500,
        });
        $(".walk_in_customer_modal_close").trigger("click");
        $("#read_barcode_POS").focus();
        $('#read_barcode_POS').removeClass('use-keyboard-input');
      }
      // $("#opencalc .opencalc_close img").click();
      // return false;
    },
  });
});

jQuery(document).on("click", "a[href='#walk_in_customer_modal']", function (e) {
  $("#customer_mobile_no").val("");
  $("#customer_mobile_no").focus();
});

function formatPhoneNumber(phoneNumberString) {
  var cleaned = ("" + phoneNumberString).replace(/\D/g, "");
  var match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
  if (match) {
    return "(" + match[1] + ") " + match[2] + "-" + match[3];
  }
  return null;
}

jQuery(document).on("keyup", ".phoneInput", function (event) {
  // Don't run for backspace key entry, otherwise it bugs out
  if (event.which != 8) {
    // Remove invalid chars from the input
    var input = this.value.replace(/[^0-9\(\)\s\-]/g, "");
    var inputlen = input.length;
    // Get just the numbers in the input
    var numbers = this.value.replace(/\D/g, "");
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
    else if (
      inputlen >= 6 &&
      numberslen == 3 &&
      input[4] == ")" &&
      input[5] == " "
    )
      newval += ") ";
    else if (inputlen >= 5 && numberslen == 3 && input[4] == ")") newval += " ";
    else if (inputlen >= 6 && numberslen == 3 && input[5] == " ") newval += " ";
    else if (inputlen >= 10 && numberslen == 6 && input[9] == "-")
      newval += "-";

    $(this).val(newval.substring(0, 14));
  }
});

function clearTransaction() {
  $(".plusMinusContainer")
    .find(".minus_icon")
    .removeClass("btn-custom-disable");
  $(".plusMinusContainer").find(".plus_icon").removeClass("btn-custom-disable");
  $(".item_info_section tr").remove();
  $(
    "#exist_product_id,#cart_grand_total,#container_deposit,#db_return_balance,#tax_amount"
  ).val("");
  $(
    "#walk_in_customer_id,#is_transaction_completed,#cashback_fee,#cashback_amount"
  ).val("0");
  $("#walk_in_customer_name").val("Walk-in Customer");
  $(
    "#sub_total,#tax_html,#grand_total,#transaction_return_balance_html,#transaction_tendered"
  ).html("$0.00");
  $(
    "#CRV_box,#redeem_discount,#cust_loyalty_amount,#append_cashback_amount,#append_cashback_fee,#coupon_discount"
  ).html("0.00");
  $("#total_item,#cust_loyalty_points").html("0");
  $(
    "#transaction_type,#transaction_status,#transaction_return_balance,#tendered_amt,#redeem_discount_div,#cart_cashback_amount,#cart_cashback_fee,#discount_div"
  ).hide();

  $("#walk_in_customer_name").val("Walk-in Customer");
  $("#walk_in_customer_id").val("0");
  $(
    "#walk_in_customer_id,#is_cashback,#cashback_fee,#cashback_amount,#exist_redeem_points,#used_redeem_points,#outbound_point_main,#outbound_point_amount_main,#redeem_points_discount,#coupon_discount_total"
  ).val(0);

  $("#exist_coupon").val("");  
  $("#applied_coupon").empty();

  // partial transaction clear //
    $('#partial_transaction_apply').val(0);
    $('#partial_transaction_cash_amount').val(0);
    $('#partial_transaction_card_amount').val(0);
  // partial transaction clear //


  //prashant added
  $("#promotion_discount_div,#discount_div").hide();
  jQuery("#read_barcode_POS").focus();
  $('#read_barcode_POS').removeClass('use-keyboard-input');
}

$(document).on("click", "#btnCouponApply", function () {
  //$('#btnCouponApply').on('click', function() {
  var coupon_code = $(this).data("id");
  $.ajax({
    type: "ajax",
    method: "post",
    url: '<?=base_url("")?>',
    data: { coupon_code: coupon_code },
    //async: false,
    dataType: "json",
    success: function (data) {
      //console.log(data);
      //alert("coupon added");
    },
  });
  return false;
});

$(document).on("click", "#btnCouponRemove", function () {
  //$('#btnCouponRemove').on('click', function() {
  var coupon_code = $(this).data("id");

  swal({
    title: "Are you sure you want to Delete this Coupon Code? ",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type: "ajax",
        method: "post",
        url: '<?=base_url("")?>',
        data: { coupon_code: coupon_code },
        //async: false,
        dataType: "json",
        success: function (data) {
          //console.log(data);
          //alert("coupon added");
        },
      });
      return false;
    }
  });
});

$(document).on("click", "#recall_order_button", function () {
  $.ajax({
    type: "POST",
    url: base_url + "cashier/get_recall_order",
    dataType: "json",
    async: true,
    cache: false,
    data: {},
    success: function (data) {
      if (data.status == "success") {
        $("#recall-order").modal();
        $("#recall-order .recallmodal").empty().html(data.html);
      }
    },
  });
});

$(document).on("click", ".order_recall", function () {
  var product_id = $("#exist_product_id").val();
  if (product_id != "") {
    swal({
      title:
        "You have existing products in your cart, Are you sure you want to recall this order?",
      text: "",
      icon: "warning",
      buttons: {
        catch: {
          text: "Yes",
          value: "catch",
        },
        cancel: "Cancel",
      },
    }).then((value) => {
      switch (value) {
        case "catch":
          // ST - For Recall Order
          var recall_order_id = $(this).attr("data-recall_order_id");
          clearTransaction();
          order_recall_func(recall_order_id);
          // EN - For Recall Order
          break;

        default:
          $("#recall_order_modal").trigger("click");
      }
    });
  } else {
    // ST - For Recall Order
    var recall_order_id = $(this).attr("data-recall_order_id");
    clearTransaction();
    order_recall_func(recall_order_id);
    // EN - For Recall Order
  }
});

function order_recall_func(recall_order_id) {
  $.ajax({
    type: "POST",
    url: base_url + "cashier/order_recall_cart",
    dataType: "json",
    async: false,
    data: {
      recall_order_id: recall_order_id,
    },
    success: function (data) {
      if (data.status == "success") {
        $(".item_info_section").empty().html(data.html);
        $("#recall_order_modal").trigger("click");

        var product_id_arr = [];
        $(".misceleneous_item").each(function (i) {
          product_id_arr.push($(this).attr("data-productname"));
        });

        if (data.product_details.length > 0) {
          for (var i = 0; i < data.product_details.length; i++) {
            if (
              $.inArray(
                data.product_details[i]["product_name"],
                product_id_arr
              ) != "-1"
            ) {
              $(
                ".misceleneous_item[data-productname='" +
                  data.product_details[i]["product_name"] +
                  "']"
              ).attr("data-product_id", data.product_details[i]["product_id"]);
            }
          }
        }
        calculatePOSTotal();
      } else {
        alert(data.message);
      }
    },
  });
}

$(document).on("click", ".remove_recall_order", function () {
  var recall_order_id = $(this).attr("data-recall_order_id");

  swal({
    title: "Are you sure you want to discard this order?",
    text: "",
    icon: "warning",
    buttons: {
      catch: {
        text: "Ok",
        value: "catch",
      },
      cancel: "Cancel",
    },
  }).then((value) => {
    switch (value) {
      case "catch":
        remove_recall_order_func(recall_order_id);
        break;

      default:
        swal.close();
    }
  });
});

function remove_recall_order_func(recall_order_id) {
  $.ajax({
    type: "POST",
    url: base_url + "cashier/remove_recall_order",
    dataType: "json",
    async: false,
    data: {
      recall_order_id: recall_order_id,
    },
    success: function (data) {
      if (data.status == "success") {
        swal({
          title: "Success!",
          text: "Order discarded successfully..!",
          icon: "success",
          buttons: false,
          timer: 2000,
        }).then(() => {
          $("tr[data-recall_order_id='" + recall_order_id + "']").remove();
          $(".product_order_details_append").empty();
          $(".order_recall").addClass("btn-custom-disable");
          $(".order_recall").attr("data-recall_order_id", 0);
        });
      }
    },
  });
}
$("#rf-date").on("blur", function () {
  var date = $("#rf-date").val();
});
function take(event) {
  if (event.keyCode === 13) {
    //console.log("gp nopw");
    $("#rf-date").focus();
    $("#rf-date").blur();
    setTimeout(function () {
      $("#rf-date").focus();
    }, 900);
  }
}
function runthis(obj) {}
$("#rf-date").on("change", function () {
  var date = $("#rf-date").val();
});
$(document).on("click", "#refund_order_button", function () {
  refund_order_button_func("");
});

function refund_order_filter(obj) {
  var date_filter = obj.value;
  refund_order_button_func(date_filter);
}

function refund_order_button_func(dt) {
  $.ajax({
    type: "POST",
    url: base_url + "cashier/get_refund_order",
    dataType: "json",
    async: true,
    cache: false,
    data: {
      dt: dt,
    },
    success: function (data) {
      if (data.status == "success") {
        $("#refund").modal();
        $("#refund .recallmodal").empty().html(data.html);
        $("#rf-date").val(dt);

        if (dt != "") {
          $("#refund_by_product").fadeIn("slow");
          $("#custom_product").hide();
          $("button[data-type='refund_by_product']").addClass("recall-btn");
          $("button[data-type='custom_product']").removeClass("recall-btn");
        }

        if (dt == "") {
          setTimeout(function () {
            $("#read_barcode_pos_refund_cp").focus();

            $("#tbody_refund_order_detail_scan_append").empty();
            $("#refund_exist_product_id").val("");
            $("#is_scan_refund_order").val(0);
          }, 800);
        }
      }
    },
  });
}

/* Rajeswari @Recall order Date Change start Here */
function recall_order_filter(obj) {
  var date_filter = obj.value;
  recall_order_button_func(date_filter);
}

function recall_order_button_func(dt) {
  $.ajax({
    type: "POST",
    url: base_url + "cashier/get_recall_order",
    dataType: "json",
    async: true,
    cache: false,
    data: {
      dt: dt,
    },
    success: function (data) {
      if (data.status == "success") {
        $("#recall-order").modal();
        $("#recall-order .recallmodal").empty().html(data.html);
        $("#rf-date").val(dt);
        if (dt != "") {
          $("#recall_custom_product").fadeIn("slow");
        }
      }
    },
  });
}
/* Rajeswari @Recall order Date Change Ends Here */

$(document).on("click", ".recall_order_table tr", function () {
  var recall_order_id = $(this).attr("data-recall_order_id");
  $(".recall_order_table tr").removeClass("clicked");
  $(this).addClass("clicked");
  $(".order_recall").removeClass("btn-custom-disable");
  $(".order_recall").attr("data-recall_order_id", recall_order_id);

  $.ajax({
    type: "POST",
    url: base_url + "cashier/get_recall_order_detail",
    dataType: "json",
    async: false,
    data: {
      recall_order_id: recall_order_id,
    },
    success: function (data) {
      if (data.status == "success") {
        $(".product_order_details_append").empty();
        $(".product_order_details_append").html(data.html);
      }
    },
  });
});

$(document).on("click", ".refund_order_table tr", function () {
  var order_id = $(this).attr("data-order_id");
  var auto_order_id = $(this).attr("data-auto_order_id");

  $(".refund_order_table tr").removeClass("clicked");
  $(this).addClass("clicked");
  $("#tbody_refund_order_detail_scan_append").empty();
  $("#refund_exist_product_id").val("");
  $("#is_scan_refund_order").val(0);

  $("#read_barcode_pos_refund").css("opacity", 1); // 0.05
  $("#read_barcode_pos_refund").prop("disabled", false);

  $.ajax({
    type: "POST",
    url: base_url + "cashier/get_refund_order_detail",
    dataType: "json",
    async: false,
    data: {
      order_id: order_id,
    },
    success: function (data) {
      if (data.status == "success") {
        $(".refund_order_detail_scan_append").hide();
        $(".refund_order_detail_append").show();

        $(".refund_order_detail_append").empty();
        $(".refund_order_detail_append").html(data.html);

        $(".order_refund").attr("data-order_id", auto_order_id);
      }
    },
  });
});

$(document).on("click", ".refundCheckAll", function () {
  $(".refundCheck").prop("checked", this.checked);
  if (this.checked) {
    if ($("input[name='refund_order_id[]']").length > 0)
      $(".order_refund").removeClass("btn-custom-disable");
  } else {
    $(".order_refund").addClass("btn-custom-disable");
  }
});

$(document).on("click", ".refundCheck", function () {
  $(".order_refund").removeClass("btn-custom-disable");

  var refund_order_check = 0;
  $("input[name='refund_order_id[]']:checked").each(function () {
    refund_order_check = 1;
  });

  if (refund_order_check == 0)
    $(".order_refund").addClass("btn-custom-disable");
});

$(document).on("click", ".order_refund", function () {
  var receipt_no = $(this).attr("data-order_id");
  $("#receipt_no").html(receipt_no);
  refundCalc();
});

function refundCalc(is_scan_refund_order=0) {
  var html;
  var total_item_refund = 0;
  var sub_total_refund = 0;
  var grand_total_refund = 0;
  var tax_html_refund = 0;
  var CRV_box_refund = 0.0;
  var applicable_crv = 0;
  var size;
  var applicable_tax = 0;
  var tax = 7.75;
  var order_id;
  var total_discount = 0;
  var total_discount_discount=0;
  var refund_div_container=is_scan_refund_order==0?"refund_by_product":"custom_product";
  $("#"+refund_div_container+" input[name='refund_order_id[]']:checked").each(
    function () {
      var qty = $("#refund_quantity_input_" + $(this).val()).val();
      var product_name = $(this).attr("data-product_name");
      var crv_price = parseFloat($("#crv_amount_" + $(this).val()).val());
      var total_qty = $(this).attr("data-total_qty");
      var product_rate = $(this).attr("data-rate");
      var tot = parseFloat($(this).attr("data-rate") * qty);
      
      total_discount =
        parseFloat(total_discount) +
        parseFloat($(this).attr("data-discount") * qty);

      total_discount_discount =
        parseFloat(total_discount_discount) +
        parseFloat($(this).attr("data-discount-discount") * qty); 
      // reedem_total =
      //   parseFloat(reedem_total) +
      //   parseFloat($(this).attr("data-reedem_discount") * qty);

      total_item_refund = parseInt(total_item_refund) + parseInt(qty);
      sub_total_refund = parseFloat(sub_total_refund) + parseFloat(tot);
      applicable_crv = $(this).attr("data-applicable_crv");
      size = $(this).attr("data-size");
      applicable_tax = $(this).attr("data-applicable_tax");
      order_id = $(this).attr("data-order_id");
      var crv_oz = 0;
      var crv_rate = 0;
      //        var crv_price = 0;
      var crv_price_per = (crv_price * qty) / total_qty;
      CRV_box_refund = parseFloat(CRV_box_refund) + crv_price_per;
      // if (applicable_crv == 1) {

      //     var str2 = "oz";
      //     var str3 = "liter";
      //     if (size.indexOf(str2) != -1  || size.indexOf(str3) != -1) {
      //       size = size.replace("oz", "");
      //       size = size.replace("liter", "");
      //       size = size.replace(" ", "");

      //       crv_oz = parseFloat(size);
      //       if (crv_oz >= 23.90) {
      //         crv_price = 0.1 * qty;
      //       } else {
      //         crv_price = 0.05 * qty;
      //       }
      //     }

      //     CRV_box_refund = CRV_box_refund + crv_price
      // }

      html += "<tr>";
      html += '<td style="text-align:center">' + qty + "</td>";
      html += "<td>" + product_name + "</td>";
      html += '<td style="text-align:center">$' + tot.toFixed(2);
      +"</td>";
      html +=
        '<input type="hidden" name="order_details_id[]" value="' +
        $(this).val() +
        '">';
      html +=
        '<input type="hidden" name="order_details_qty[]" value="' + qty + '">';
      html +=
        '<input type="hidden" name="refund_product_name[]" value="' +
        product_name +
        '">';
      html +=
        '<input type="hidden" name="refund_product_rate[]" value="' +
        product_rate +
        '">';
      html +=
        '<input type="hidden" name="refund_total_price[]" value="' + tot + '">';
      html +=
        '<input type="hidden" name="crv_total_amount[]" value="' +
        crv_price_per +
        '">';

      html += "</tr>";

      if (applicable_tax == 1) {
        tax_html_refund += (tot * tax) / 100;
      }
    }
  );
grand_total_refund = sub_total_refund + tax_html_refund + CRV_box_refund;
var reedem_total = parseFloat($('#reedem_discount_remain').val());
if(grand_total_refund<=reedem_total){
  reedem_total=grand_total_refund;
}
if(grand_total_refund<=total_discount_discount){
  total_discount_discount=grand_total_refund;
}
if(is_scan_refund_order==0){
    $("#refund-second2").modal();
    $("#refund_popup_html").empty();
  }
  $("#refund_popup_html").html(html);
  if (total_discount > 0) {
    $("#discount_total_on_popup").show();
    $("#discount_total_on_popup_val").html(total_discount.toFixed(2));
  }

  if (total_discount_discount > 0) {
    $("#total_discount_discount_on_popup").show();
    $("#total_discount_discount_on_popup_val").html(total_discount_discount.toFixed(2));
  }

  if (reedem_total > 0) {
    $("#reedem_total_on_popup").show();
    $("#reedem_total_on_popup_val").html("(-)$"+reedem_total.toFixed(2));
  } else{
    $("#reedem_total_on_popup").hide();
    $("#reedem_total_on_popup_val").html("(-)$0");
  }
//  grand_total_refund = grand_total_refund - reedem_total - total_discount;
 if(reedem_total==undefined || reedem_total==null || reedem_total==''){
  reedem_total=0;
 }
  grand_total_refund = grand_total_refund - reedem_total -total_discount-total_discount_discount;
  $("#total_item_refund").html(total_item_refund);
  $("#sub_total_refund").html("$" + sub_total_refund.toFixed(2));
  $("#grand_total_refund").html("$" + grand_total_refund.toFixed(2));
  $("#tax_html_refund").html("$" + tax_html_refund.toFixed(2));
  $("#CRV_box_refund").html(CRV_box_refund.toFixed(2));

  $("#order_id_refund").val(order_id);
  $("#tax_amount_refund").val(tax_html_refund.toFixed(2));
  $("#container_deposit_refund").val(CRV_box_refund.toFixed(2));
  $("#total_amount_refund").val(grand_total_refund.toFixed(2));
  $("#refund_reedeem_amount").val(reedem_total.toFixed(2));
  $("#refund_discount_amount").val(total_discount.toFixed(2));
  $("#refund_discount_discount_amount").val(total_discount_discount.toFixed(2));
}

function show_cash_button(){
    $('#opencalc_btn').show();
    $('#opendrawer_btn').hide();
}
function show_refund_button(){
    $('#opencalc_btn').hide();
    $('#opendrawer_btn').show();
}


$(document).on("click", ".complete_refund", function () {
  var is_scan_refund_order = $("#is_scan_refund_order").val();
  var data = $("#refund_order_form").serializeArray();
  data.push({ name: "is_scan_refund_order", value: is_scan_refund_order });

  $.ajax({
    type: "POST",
    url: base_url + "cashier/complete_refund_order",
    dataType: "json",
    async: false,
    data: data,
    success: function (data) {
      if (data.status == "success") {
        clearTransaction();
        swal({
          title: "Success!",
          text: "Order Refunded Successfully..!",
          icon: "success",
          buttons: false,
          timer: 3000,
        }).then(() => {
          var total_rate = 0;
          var total_discount = 0.0;
          var total_reedem = 0.0;
          var total_discount_discount=0.0;

          total_discount -=parseFloat(data.refund_discount_amount)
          total_reedem -=parseFloat(data.refund_reedeem_amount)
          total_discount_discount -=parseFloat(data.total_discount_discount)

          for ($i = 0; $i < data.ajax_data.length; $i++) {
            var rate = 0 - parseFloat(data.ajax_data[$i].rate);
            //total_rate+=rate;
            //alert(data.ajax_data[$i].quantity+":"+rate);

            // total_discount -=
            //   parseFloat(data.ajax_data[$i].discount) *
            //   parseFloat(data.ajax_data[$i].quantity);
            // total_reedem -=
            //   parseFloat(data.ajax_data[$i].reedem_discount) *
            //   parseFloat(data.ajax_data[$i].quantity);
            if (data.ajax_data[$i].is_taxable == "1") {
              total_rate +=
                parseFloat(data.ajax_data[$i].quantity) * rate +
                parseFloat(data.ajax_data[$i].quantity) * rate * 0.0775;
            } else {
              total_rate += parseFloat(data.ajax_data[$i].quantity) * rate;
            }

            var data2 = {
              product_id: data.ajax_data[$i].product_id,
              product_name: data.ajax_data[$i].product_name,
              onsale_price: rate,
              Applicable_CRV: "0",
              price: rate,
              Applicable_Tax:
                data.ajax_data[$i].is_taxable == "1" ? "0.0775" : "0",
              pos_combo_details: "No details",
              qty: data.ajax_data[$i].quantity,
            };
            var crv_total_amount = 0 - data.ajax_data[$i].container_deposit;
            print_product(data2, crv_total_amount, rate, "l", "0", 1);
            
          }

          //location.reload();
          if (parseFloat(total_discount) < 0) {
            $("#discount_div").after('<div class="p1" id="discount_return_div" style="">\
                <p>Coupon Discount Amount</p>\
                <input type="hidden" id="coupon_discount_return">\
                <p style="color: red;"><span style="color: red;"></span> (+)$<span id="discount_return"></span></p>\
            </div>');
            $('#discount_return').html(total_discount);
            $("#coupon_discount_return").val(total_discount);

            } else{
              $("#discount_return_div").remove();
            }

            if (parseFloat(total_discount_discount) < 0) {
            $("#discount_div").after('<div class="p1" id="discount_discount_div" style="">\
                <p>Custom Discount Amount</p>\
                <input type="hidden" id="discount_discount_return">\
                <p style="color: red;"><span style="color: red;"></span> $<span id="discount_discount_return_label"></span></p>\
            </div>');
            $('#discount_discount_return_label').html(total_discount_discount);
            $("#discount_discount_return").val(total_discount_discount);

            } else{
              $("#discount_discount_div").remove();
            }

            
          

          if (parseFloat(total_reedem) < 0) {
            var total_reedem_var=0.00;
            total_reedem_var=Math.abs(total_reedem).toFixed(2).toString();
            $("#redeem_discount_div").show();
            $("#redeem_discount_div").after('<div class="p1" id="redeem_return_div" style="">\
                <p>Loyalty Refund</p>\
                <p style="color: red;"><span style="color: red;"></span> (+)$<span id="redeem_return"></span></p>\
            </div>');
            $('#redeem_return').html(total_reedem_var);
            $("#redeem_discount").html(0);
            $("#redeem_points_discount").val(0);
          } else{
            $("#redeem_return_div").remove();
          }

          // if (parseFloat(total_discount) < 0) {
          //   var total_discount_var=0.00;
          //   total_discount_var=Math.abs(total_discount).toFixed(2).toString();
          //   $("#discount_div").after('<div class="p1" id="discount_return_div" style="">\
          //       <p>Loyalty Refund</p>\
          //       <p style="color: red;"><span style="color: red;"></span> (+)$<span id="discount_return"></span></p>\
          //   </div>');
          //   $('#discount_return').html(total_discount_var);
          // } else{
          //   $("#redeem_return_div").remove();
          // }


          loyality=parseFloat(total_reedem);

          $(".refund_amount_pos .tax_html").parent().show();
          $(".refund_amount_pos .tax_html").html("$" + total_rate.toFixed(2));
          // $('.refund_amount_pos .tax_html').html('$'+data.total_amount_refund);
          // $('#cart_refund_amount').val(data.total_amount_refund);
          $("#refund-second2 .close-modal").click();
          $("#refund .close-modal").click();
          calculatePOSTotal();
          show_refund_button();
        });
      } else {
        swal({
          title: "Error!",
          text: "Order Not Refunded..! " + data.refund_data.error,
          icon: "error",
          buttons: false,
          timer: 3000,
        });
      }
    },
  });
});

$(document).on("keypress", "#read_barcode_pos_refund", function (e) {
  if (e.which == 13) {
    var read_barcode_pos_refund = $(this).val();
    if (read_barcode_pos_refund != "" && e.which == 13) {
      $.ajax({
        type: "POST",
        url: base_url + "cashier/get_refund_order_using_barcode",
        dataType: "json",
        async: true,
        cache: false,
        data: {
          read_barcode_pos_refund: read_barcode_pos_refund,
          barcode_type: "non_custom_product",
        },
        success: function (data) {
          if (data.status == 1) {
            $("#upc_" + data.upc).prop("checked", true);
            $(".order_refund").removeClass("btn-custom-disable");
          } else if (data.status == 0) {
            swal({
              title: "Oops!",
              text: "Item not found.",
              icon: "warning",
              buttons: false,
              timer: 2000,
            });
          }
        },
      });

      /*** $.ajax({
                type: "POST",
                url: base_url + "cashier/get_refund_order_using_barcode",
                dataType: "json",
                async: true,
                cache: false,
                data: {
                    read_barcode_pos_refund: read_barcode_pos_refund
                },
                success: function (data) {

                    if (data.status == 1) {

                        $("#is_scan_refund_order").val(1);
                        /////////////////////////////
                        var is_promotion = 0;
                        var main_price = data.onsale_price;
                        main_price = parseFloat(main_price);
                        main_price = main_price.toFixed(2);

                        if(data.onsale_price != data.store_promotion_price && data.store_promotion_price != 0){
                          data.onsale_price = data.store_promotion_price;
                          is_promotion = 1;
                        }

                        var exist_product_id_arr = $("#refund_exist_product_id").val().split(",");
                        if (jQuery.inArray(data.product_id, exist_product_id_arr) !== -1) {
                          // Exist

                          var product_id = data.product_id;
                          var quantity = $("#refund_quantity_input_" + product_id).val();
                          var existing_crv = $("#refund_product_crv_" + product_id).val();
                          var org_price = $("#refund_quantity_input_" + product_id).attr("data-org_price");
                          quantity++;
                          $("#refund_quantity_input_" + product_id).val(quantity);
                          var new_sale_price = parseFloat(org_price) * parseFloat(quantity);

                          $(".refund_onsale_price_" + product_id).html(new_sale_price.toFixed(2));
                          $("#refund_product_price_" + product_id).val(new_sale_price.toFixed(2));
                          $("#refund_product_qty_" + product_id).val(quantity);

                          //ST - add crv if applicable
                          var crv_oz = 0;
                          var crv_rate = 0;
                          var crv_price = 0;
                          if (data.Applicable_CRV == 1) {
                            var str2 = "oz";
                            var str3 = "liter";
                            var str4 = "ml";
                            //if (data.size.indexOf(str2) != -1) {
                            if (data.size.indexOf(str2) != -1  || data.size.indexOf(str3) != -1 || data.size.indexOf(str4) != -1) {
                              data.size = data.size.replace("oz", "");
                              data.size = data.size.replace("liter", "");
                              data.size = data.size.replace("ml", "");
                              data.size = data.size.replace(" ", "");

                              crv_oz = parseFloat(data.size);
                              if (crv_oz > 23.90) {
                                if(data.unit > 0) {
                                    crv_price = 0.10 * quantity * data.unit;
                                } else {
                                    crv_price = 0.10 * quantity;
                                }

                              } else {

                                if(data.unit > 0) {
                                    crv_price = 0.05 * quantity * data.unit;
                                } else {
                                    crv_price = 0.05 * quantity;
                                }

                              }
                            }
                          }
                          $("#refund_product_crv_" + product_id).val(parseFloat(crv_price));
                          //EN - add crv if applicable

                          // ST - For Calculate Total
                          calculatePOSTotalScan();
                          // EN - For Calculate Total

                        } else {
                          //ST - add crv if applicable
                          var crv_oz = 0;
                          var crv_rate = 0;
                          var crv_price = 0;
                          var size_org = data.size;
                          if (data.Applicable_CRV == 1) {
                            var str2 = "oz";
                            var str3 = 'liter';
                            var str4 = "ml";
                            if (data.size.indexOf(str2) != -1  || data.size.indexOf(str3) != -1 || data.size.indexOf(str4) != -1) {
                              data.size = data.size.replace("oz", "");
                              data.size = data.size.replace("liter", "");
                              data.size = data.size.replace("ml", "");
                              data.size = data.size.replace(" ", "");
                              $("#refund_product_crv_" + product_id).val(parseFloat(data.size));
                              crv_oz = parseFloat(data.size);
                              if (crv_oz > 23.90) {
                                if(data.unit > 0) {
                                    crv_price = 0.1 * data.unit;
                                } else {
                                    crv_price = 0.1;
                                }
                              } else {
                                if(data.unit > 0) {
                                    crv_price = 0.05 * data.unit;
                                } else {
                                    crv_price = 0.05;
                                }
                              }
                            }
                          }
                          //EN - add crv if applicable

                            data.onsale_price = parseFloat(data.onsale_price);
                            data.onsale_price = data.onsale_price.toFixed(2);



                            var item_info = '';
                            item_info += '<tr id="refund_product_tr_'+data.product_id+'">';
                                item_info += '<td style="text-align:center">';
                                    item_info += '<input type="checkbox" name="refund_order_id[]" class="refundCheck" value="'+data.product_id+'" data-rate="'+data.onsale_price+'" data-product_name="'+data.product_name+'" data-applicable_crv="'+data.Applicable_CRV+'" data-applicable_tax="'+data.Applicable_Tax+'" data-size="'+size_org+'" data-order_id="'+data.product_id+'" />';

                                    item_info += '<div class="scan-value-button scan_decrease" id="scan_decrease" data-id="'+data.product_id+'">-</div>';
                                    item_info += '<input type="number" class="quantity_input scan_quantity_input" data-org_price="' +data.onsale_price +'" id="refund_quantity_input_'+data.product_id +'" value="1" style="width:unset;">';
                                    item_info += '<div class="scan-value-button scan_increase" id="scan_increase" data-id="'+data.product_id+'">+</div>';

                                item_info += '</td>';
                                item_info += '<td>'+data.product_name+'</td>';
                                item_info += '<td style="text-align:center">$<span class="refund_onsale_price_'+data.product_id+'">'+data.onsale_price+'</span></td>';

                            item_info += '<input type="hidden" name="refund_product_id[]" value="' +data.product_id+'">';
                            item_info += '<input type="hidden" name="refund_product_name[]" value="'+data.product_name+'">';
                            item_info += '<input type="hidden" id="refund_product_base_rate_' +data.product_id+'" name="refund_product_base_rate[]" value="'+main_price +'">';
                            item_info += '<input type="hidden" name="refund_product_rate[]" value="' +data.onsale_price+'">';
                            item_info += '<input type="hidden" id="refund_product_price_' +data.product_id+'" name="refund_product_price[]" value="' +data.onsale_price +'">';
                            item_info += '<input type="hidden" id="refund_product_offer_price_'+data.product_id+'" name="refund_product_offer_price[]" value="'+data.price +'">';
                            item_info += '<input type="hidden" id="refund_product_qty_'+data.product_id+'" name="refund_product_qty[]" value="1">';
                            item_info += '<input type="hidden" id="refund_product_crv_' +data.product_id+'" name="refund_product_crv[]" value="'+parseFloat(crv_price)+'">';
                            item_info += '<input type="hidden" id="refund_is_product_crv_'+data.product_id+'" name="refund_is_product_crv[]" data-product_unit="'+data.unit+'" value="'+data.Applicable_CRV +'">';
                            item_info += '<input type="hidden" id="refund_is_product_size_' +data.product_id+'" name="refund_is_product_size[]" value="'+size_org+'">';
                            item_info += '<input type="hidden" class="is_texable" id="refund_is_texable_' +data.product_id+'" name="refund_is_texable[]" value="'+data.Applicable_Tax+'">';

                            item_info += '</tr>';

                          if ($("#refund_exist_product_id").val() == "") {
                            $("#refund_exist_product_id").val(data.product_id);
                          } else {
                            var refund_exist_product_id = $("#refund_exist_product_id").val();
                            $("#refund_exist_product_id").val(
                              refund_exist_product_id + "," + data.product_id
                            );
                          }
                        }
                        /////////////////////////////

                        $(".refund_order_detail_scan_append").show();
                        $(".refund_order_detail_append").hide();

                        //console.log(item_info);

                        if (typeof item_info != "undefined") {
                            $("#tbody_refund_order_detail_scan_append").append(item_info);
                        }
                        $("#read_barcode_pos_refund").val("");

                        // ST - For Calculate Total
                          calculatePOSTotalScan();
                        // EN - For Calculate Total

                    } else if(data.status == 0) {
                        swal({
                            title: "Oops!",
                            text: "Item not found.",
                            icon: "warning",
                            buttons: false,
                            timer: 2000,
                        });
                    }
                },
            }); ***/
    }
  }
});

$(document).on("keypress", "#read_barcode_pos_refund_cp", function (e) {
  if (e.which == 13) {
    var read_barcode_pos_refund = $(this).val();
    if (read_barcode_pos_refund != "" && e.which == 13) {
      $.ajax({
        type: "POST",
        url: base_url + "cashier/get_refund_order_using_barcode",
        dataType: "json",
        async: true,
        cache: false,
        data: {
          read_barcode_pos_refund: read_barcode_pos_refund,
          barcode_type: "custom_product",
        },
        success: function (data) {
          if (data.status == 1) {
            $("#is_scan_refund_order").val(1);
            /////////////////////////////
            var is_promotion = 0;
            var main_price = data.onsale_price;
            main_price = parseFloat(main_price);
            main_price = main_price.toFixed(2);

            if (
              data.onsale_price != data.store_promotion_price &&
              data.store_promotion_price != 0 &&
              data.store_promotion_price != null
            ) {
              data.onsale_price = data.store_promotion_price;
              is_promotion = 1;
            }

            var exist_product_id_arr = $("#refund_exist_product_id")
              .val()
              .split(",");
            if (jQuery.inArray(data.product_id, exist_product_id_arr) !== -1) {
              // Exist

              var product_id = data.product_id;
              var quantity = $("#refund_quantity_input_" + product_id).val();
              var existing_crv = $("#refund_product_crv_" + product_id).val();
              var org_price = $("#refund_quantity_input_" + product_id).attr(
                "data-org_price"
              );
              quantity++;
              $("#refund_quantity_input_" + product_id).val(quantity);
              var new_sale_price = parseFloat(org_price) * parseFloat(quantity);

              $(".refund_onsale_price_" + product_id).html(
                new_sale_price.toFixed(2)
              );
              $("#refund_product_price_" + product_id).val(
                new_sale_price.toFixed(2)
              );
              $("#refund_product_qty_" + product_id).val(quantity);

              //ST - add crv if applicable
              var crv_oz = 0;
              var crv_rate = 0;
              var crv_price = 0;
              if (data.Applicable_CRV == 1) {
                var str2 = "oz";
                var str3 = "liter";
                var str4 = "ml";
                //if (data.size.indexOf(str2) != -1) {
                if (
                  data.size.indexOf(str2) != -1 ||
                  data.size.indexOf(str3) != -1 ||
                  data.size.indexOf(str4) != -1
                ) {
                  data.size = data.size.replace("oz", "");
                  data.size = data.size.replace("liter", "");
                  data.size = data.size.replace("ml", "");
                  data.size = data.size.replace(" ", "");

                  crv_oz = parseFloat(data.size);
                  if (crv_oz > 23.99) {
                    if (data.unit > 0) {
                      crv_price = 0.1 * quantity * data.unit;
                    } else {
                      crv_price = 0.1 * quantity;
                    }
                  } else {
                    if (data.unit > 0) {
                      crv_price = 0.05 * quantity * data.unit;
                    } else {
                      crv_price = 0.05 * quantity;
                    }
                  }
                }
              }
              $("#refund_product_crv_" + product_id).val(parseFloat(crv_price));
              //EN - add crv if applicable

              // ST - For Calculate Total
              calculatePOSTotalScan();
              // EN - For Calculate Total
            } else {
              //ST - add crv if applicable
              var crv_oz = 0;
              var crv_rate = 0;
              var crv_price = 0;
              var size_org = data.size;
              if (data.Applicable_CRV == 1) {
                var str2 = "oz";
                var str3 = "liter";
                var str4 = "ml";
                if (
                  data.size.indexOf(str2) != -1 ||
                  data.size.indexOf(str3) != -1 ||
                  data.size.indexOf(str4) != -1
                ) {
                  data.size = data.size.replace("oz", "");
                  data.size = data.size.replace("liter", "");
                  data.size = data.size.replace("ml", "");
                  data.size = data.size.replace(" ", "");
                  $("#refund_product_crv_" + product_id).val(
                    parseFloat(data.size)
                  );
                  crv_oz = parseFloat(data.size);
                  if (crv_oz > 23.99) {
                    if (data.unit > 0) {
                      crv_price = 0.1 * data.unit;
                    } else {
                      crv_price = 0.1;
                    }
                  } else {
                    if (data.unit > 0) {
                      crv_price = 0.05 * data.unit;
                    } else {
                      crv_price = 0.05;
                    }
                  }
                }
              }
              //EN - add crv if applicable

              data.onsale_price = parseFloat(data.onsale_price);
              data.onsale_price = data.onsale_price.toFixed(2);

              var item_info = "";
              item_info +=
                '<tr id="refund_product_tr_' + data.product_id + '">';
              item_info +=
                '<td style="text-align:center;display:flex;align-items:center;">';
              item_info +=
                '<input type="checkbox" name="refund_order_id[]" class="refundCheck mr-1" value="' +
                data.product_id +
                '" data-rate="' +
                data.onsale_price +
                '" data-product_name="' +
                data.product_name +
                '" data-applicable_crv="' +
                data.Applicable_CRV +
                '" data-applicable_tax="' +
                data.Applicable_Tax +
                '" data-size="' +
                size_org +
                '" data-order_id="' +
                data.product_id +

                '" data-total_qty="' +
                "1" +

                '" />';
              // item_info += '<input type="text" class="quantity_input scan_quantity_input" data-org_price="' +data.onsale_price +'" id="refund_quantity_input_'+data.product_id +'" value="1" style="width:unset; border: none !important;" readonly="readonly">';


              item_info +=
                '<div class="scan-value-button scan_decrease" id="scan_decrease" data-id="' +
                data.product_id +
                '">-</div>';

              item_info +=
                '<input  type="hidden" value="'+crv_price+'" id="crv_amount_' +
                data.product_id +
                '">';

              item_info +=
                '<input type="number" class="quantity_input scan_quantity_input" data-org_price="' +
                data.onsale_price +
                '" id="refund_quantity_input_' +
                data.product_id +
                '" value="1" style="width:unset;font-size:18px;">';
              item_info +=
                '<div class="scan-value-button scan_increase" id="scan_increase" data-id="' +
                data.product_id +
                '">+</div>';

              item_info += "</td>";
              item_info +=
                '<td style="font-size:19px;">' + data.product_name + "</td>";
              item_info +=
                '<td style="text-align:center;font-size:19px;">$<span class="refund_onsale_price_' +
                data.product_id +
                '">' +
                data.onsale_price +
                "</span></td>";

              item_info +=
                '<input type="hidden" name="refund_product_id[]" value="' +
                data.product_id +
                '">';
              item_info +=
                '<input type="hidden" name="refund_product_name[]" value="' +
                data.product_name +
                '">';
              item_info +=
                '<input type="hidden" id="refund_product_base_rate_' +
                data.product_id +
                '" name="refund_product_base_rate[]" value="' +
                main_price +
                '">';
              item_info +=
                '<input type="hidden" name="refund_product_rate[]" value="' +
                data.onsale_price +
                '">';
              item_info +=
                '<input type="hidden" id="refund_product_price_' +
                data.product_id +
                '" name="refund_product_price[]" value="' +
                data.onsale_price +
                '">';
              item_info +=
                '<input type="hidden" id="refund_product_offer_price_' +
                data.product_id +
                '" name="refund_product_offer_price[]" value="' +
                data.price +
                '">';
              item_info +=
                '<input type="hidden" id="refund_product_qty_' +
                data.product_id +
                '" name="refund_product_qty[]" value="1">';
              item_info +=
                '<input type="hidden" id="refund_product_crv_' +
                data.product_id +
                '" name="refund_product_crv[]" value="' +
                parseFloat(crv_price) +
                '">';
              item_info +=
                '<input type="hidden" id="refund_is_product_crv_' +
                data.product_id +
                '" name="refund_is_product_crv[]" data-product_unit="' +
                data.unit +
                '" value="' +
                data.Applicable_CRV +
                '">';
              item_info +=
                '<input type="hidden" id="refund_is_product_size_' +
                data.product_id +
                '" name="refund_is_product_size[]" value="' +
                size_org +
                '">';
              item_info +=
                '<input type="hidden" class="is_texable" id="refund_is_texable_' +
                data.product_id +
                '" name="refund_is_texable[]" value="' +
                data.Applicable_Tax +
                '">';

              item_info += "</tr>";

              if ($("#refund_exist_product_id").val() == "") {
                $("#refund_exist_product_id").val(data.product_id);
              } else {
                var refund_exist_product_id = $(
                  "#refund_exist_product_id"
                ).val();
                $("#refund_exist_product_id").val(
                  refund_exist_product_id + "," + data.product_id
                );
              }
            }
            /////////////////////////////

            $(".refund_order_detail_scan_append_cp").show();
            $(".refund_order_detail_append_cp").hide();

            //console.log(item_info);

            if (typeof item_info != "undefined") {
              $("#tbody_refund_order_detail_scan_append_cp").append(item_info);
            }
            $("#read_barcode_pos_refund_cp").val("");

            $(
              "input[name='refund_order_id[]'][data-order_id='" +
                data.product_id +
                "']"
            ).prop("checked", true);
            $(".order_refund").removeClass("btn-custom-disable");

            // ST - For Calculate Total
            calculatePOSTotalScan();
            // EN - For Calculate Total
            refundCalc(1);
          } else if (data.status == 0) {
            swal({
              title: "Oops!",
              text: "Item not found.",
              icon: "warning",
              buttons: false,
              timer: 2000,
            });
          }
        },
      });
    }
  }
});

function calculatePOSTotalScan() {
  var sub_total = 0.0;
  var taxable_total = 0.0;
  var crv = 0.0;
  $("input[name='refund_product_price[]']").each(function (e) {
    var product_id_arr = $(this).attr("id").split("refund_product_price_");
    var product_id = product_id_arr[1];

    var pro_crv = $("#refund_product_crv_" + product_id).val();
    crv += parseFloat(pro_crv);

    var price = $(this).val();
    var offer_price = $("#refund_product_offer_price_" + product_id).val();

    sub_total = parseFloat(sub_total) + parseFloat($(this).val());

    if (jQuery("#refund_is_texable_" + product_id).val() == 1) {
      taxable_total = parseFloat(taxable_total) + parseFloat($(this).val());
    }
  });

  var sub_total_disp = sub_total.toFixed(2);
  var sub_total_taxable_disp = taxable_total.toFixed(2);
  crv = parseFloat(crv);

  $("#refund_sub_total").html("$" + sub_total_disp);

  var tax = 7.75;
  var tax_calculate = (sub_total_taxable_disp * tax) / 100;
  var grand_total =
    parseFloat(sub_total_disp) + parseFloat(tax_calculate) + parseFloat(crv);

  var grand_total_disp = grand_total.toFixed(2);
  $("#refund_tax_html").html("$" + parseFloat(tax_calculate).toFixed(2));
  $("#refund_tax_amount").val(parseFloat(tax_calculate).toFixed(2));
  $("#refund_CRV_box").html(parseFloat(crv).toFixed(2));
  $("#refund_container_deposit").val(parseFloat(crv).toFixed(2));

  $("#refund_grand_total").html("$" + grand_total_disp);
  $("#refund_cart_grand_total").val(grand_total_disp);

  $("#refund_main_cart_grand_total").val(grand_total_disp);
  //Calculate_coupon();
  // product count - ST
  var total_product = 0;
  $("input[name='refund_product_qty[]']").each(function (e) {
    total_product += parseInt($(this).val());
  });
  $("#refund_total_item").html(total_product);
  // product count - EN
}

$(document).on("click", ".scan_decrease", function () {
  var product_id = $(this).attr("data-id");
  var quantity = $("#refund_quantity_input_" + product_id).val();
  var org_price = $("#refund_quantity_input_" + product_id).attr(
    "data-org_price"
  );

  var Applicable_CRV = $("#refund_is_product_crv_" + product_id).val();
  var is_product_size = $("#refund_is_product_size_" + product_id).val();
  var product_unit = $("#refund_is_product_crv_" + product_id).attr(
    "data-product_unit"
  );

  if (quantity > 1) {
    quantity--;
    $("#refund_quantity_input_" + product_id).val(quantity);
    var offer_price = $("#product_offer_price_" + product_id).val();
    var main_base_price = $("#product_base_rate_" + product_id).val();
    var main_price = parseFloat(main_base_price) * parseFloat(quantity);
    var new_sale_price = parseFloat(org_price) * parseFloat(quantity);

    $(".refund_onsale_price_" + product_id).html(new_sale_price.toFixed(2));
    $("#refund_product_price_" + product_id).val(new_sale_price.toFixed(2));
    $("#refund_product_qty_" + product_id).val(quantity);

    var crv_oz = 0;
    var crv_rate = 0;
    var crv_price = 0;
    if (Applicable_CRV == 1) {
      var str2 = "oz";
      var str3 = "liter";
      var str4 = "ml";
      if (
        is_product_size.indexOf(str2) != -1 ||
        is_product_size.indexOf(str3) != -1 ||
        is_product_size.indexOf(str4) != -1
      ) {
        is_product_size = is_product_size.replace("oz", "");
        is_product_size = is_product_size.replace("liter", "");
        is_product_size = is_product_size.replace("ml", "");
        is_product_size = is_product_size.replace(" ", "");

        crv_oz = parseFloat(is_product_size);
        if (crv_oz > 23.99) {
          if (product_unit > 0) {
            crv_price = 0.1 * quantity * product_unit;
          } else {
            crv_price = 0.1 * quantity;
          }
        } else {
          if (product_unit > 0) {
            crv_price = 0.05 * quantity * product_unit;
          } else {
            crv_price = 0.05 * quantity;
          }
        }
      }
    }
    $("#refund_product_crv_" + product_id).val(parseFloat(crv_price));
    calculatePOSTotalScan();

    $(".order_refund").removeClass("btn-custom-disable");
    $(this)
      .parent()
      .find($("input[name='refund_order_id[]']"))
      .prop("checked", true);
  } else {
    swal({
      title: "Are you sure you want to Delete this Product?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $("#refund_product_tr_" + product_id).remove();
        var exist_product_id_arr = $("#refund_exist_product_id")
          .val()
          .split(",");
        exist_product_id_arr.remove(product_id);
        jQuery("#refund_exist_product_id").val(exist_product_id_arr.join(","));
        calculatePOSTotalScan();
        $(".order_refund").addClass("btn-custom-disable");
      }
    });
  }
});

$(document).on("click", ".scan_increase", function () {
  $(".order_refund").removeClass("btn-custom-disable");
  $(this)
    .parent()
    .find($("input[name='refund_order_id[]']"))
    .prop("checked", true);

  var product_id = $(this).attr("data-id");
  var org_price = $("#refund_quantity_input_" + product_id).attr(
    "data-org_price"
  );
  var quantity = $("#refund_quantity_input_" + product_id).val();
  quantity++;
  $("#refund_quantity_input_" + product_id).val(quantity);

  var offer_price = $("#refund_product_offer_price_" + product_id).val();
  var new_sale_price = parseFloat(org_price) * parseFloat(quantity);

  // add strick value
  var main_base_price = $("#refund_product_base_rate_" + product_id).val();
  var main_price = parseFloat(main_base_price) * parseFloat(quantity);
  if (main_base_price != org_price) {
    $(".refund_onsale_strike_price_" + product_id).html(main_price.toFixed(2));
  }

  $(".refund_onsale_price_" + product_id).html(new_sale_price.toFixed(2));
  $("#refund_product_price_" + product_id).val(new_sale_price.toFixed(2));
  $("#refund_product_offer_price_" + product_id).val(new_sale_price.toFixed(2));

  $("#refund_product_qty_" + product_id).val(quantity);
  var Applicable_CRV = $("#refund_is_product_crv_" + product_id).val();
  var is_product_size = $("#refund_is_product_size_" + product_id).val();
  var product_unit = $("#refund_is_product_crv_" + product_id).attr(
    "data-product_unit"
  );

  var crv_oz = 0;
  var crv_rate = 0;
  var crv_price = 0;
  if (Applicable_CRV == 1) {
    var str2 = "oz";
    var str3 = "liter";
    var str4 = "ml";
    if (
      is_product_size.indexOf(str2) != -1 ||
      is_product_size.indexOf(str3) != -1 ||
      is_product_size.indexOf(str4) != -1
    ) {
      is_product_size = is_product_size.replace("oz", "");
      is_product_size = is_product_size.replace("liter", "");
      is_product_size = is_product_size.replace("ml", "");
      is_product_size = is_product_size.replace(" ", "");

      crv_oz = parseFloat(is_product_size);
      if (crv_oz > 23.99) {
        if (product_unit > 0) {
          crv_price = 0.1 * quantity * product_unit;
        } else {
          crv_price = 0.1 * quantity;
        }
      } else {
        if (product_unit > 0) {
          crv_price = 0.05 * quantity * product_unit;
        } else {
          crv_price = 0.05 * quantity;
        }
      }
    }
  }
  $("#refund_product_crv_" + product_id).val(parseFloat(crv_price));
  calculatePOSTotalScan();
});

$(document).on("click", "#back_to_refund_page", function () {
  $("#refund").modal();
});

$(document).on("click", "#age_verify_button", function () {
  var userinput = $("#age_verify_date").val();
  var is_age_verify_custom_product = $("#is_age_verify_custom_product").val();

  var dob = new Date(userinput);
  if (userinput == null || userinput == "") {
    swal({
      title: "Oops!",
      text: "**Choose a date please!",
      icon: "error",
      buttons: false,
      dangerMode: true,
      timer: 2500,
    });
    return false;
  } else {
    //calculate month difference from current date in time
    var month_diff = Date.now() - dob.getTime();

    //convert the calculated difference in date format
    var age_dt = new Date(month_diff);

    //extract year from date
    var year = age_dt.getUTCFullYear();

    //now calculate the age of the user
    var age = Math.abs(year - 1970);

    if (age >= 21) {
      //console.log("Age verified");
      $("#is_age_verified").val(1);

      if (is_age_verify_custom_product == 1) {
        // Custom Product
        $("#age-verify-modal-close").trigger("click");
        var custom_category_setting_details_auto_id = $(
          "#no_of_misceleneous_item"
        ).val();
        $(
          ".misceleneous_item[data-custom_category_setting_details_auto_id='" +
            custom_category_setting_details_auto_id +
            "']"
        ).trigger("click");
      } else {
        // Scan Product
        $("#age-verify-modal-close").trigger("click");
        $("#read_barcode_POS").val(
          $("#barcode_product_before_age_verify").val()
        );
        $(".read_barcode_POS_submit").trigger("click");
      }
    } else {
      swal({
        title: "Oops!",
        text: "You are not eligible to buy this product.",
        icon: "error",
        dangerMode: true,
        buttons: false,
        timer: 2500,
      });
    }
  }
});

$(document).on("click", ".refund_tab_button", function () {
  var type = $(this).attr("data-type");

  $("#refund_exist_product_id").val("");
  $("#is_scan_refund_order").val(0);

  if (type == "custom_product") {
    $("#custom_product").fadeIn("slow");
    $("#refund_by_product").hide();
    $("#refund_history").hide();

    $("button[data-type='custom_product']").addClass("recall-btn");
    $("button[data-type='refund_by_product']").removeClass("recall-btn");
    $("button[data-type='refund_history']").removeClass("recall-btn");

    $("#tbody_refund_order_detail_scan_append_cp").empty();
    $(".refund_order_detail_append_cp").empty();
    $(".refund_order_detail_append_cp").show();
    $(".refund_order_detail_scan_append_cp").hide();
  } else if (type == "refund_by_product") {
    $("#refund_by_product").fadeIn("slow");
    $("#custom_product").hide();
    $("#refund_history").hide();

    $("button[data-type='refund_by_product']").addClass("recall-btn");
    $("button[data-type='custom_product']").removeClass("recall-btn");
    $("button[data-type='refund_history']").removeClass("recall-btn");

    $("#tbody_refund_order_detail_scan_append").empty();
    $(".refund_order_detail_append").empty();
    $(".refund_order_detail_append").show();
    $(".refund_order_detail_scan_append").hide();

    $(".refund_order_id").removeClass("clicked");

    $("#read_barcode_pos_refund").css("opacity", 0.5);
    $("#read_barcode_pos_refund").prop("disabled", true);
  } else if (type == "refund_history") {
    $("#refund_history").fadeIn("slow");
    $("#refund_by_product").hide();
    $("#custom_product").hide();

    $("button[data-type='refund_by_product']").removeClass("recall-btn");
    $("button[data-type='custom_product']").removeClass("recall-btn");
    $("button[data-type='refund_history']").addClass("recall-btn");

    $("#tbody_refund_order_detail_scan_append").empty();
    $(".refund_order_detail_append").empty();
    $(".refund_order_detail_append").show();
    $(".refund_order_detail_scan_append").hide();

    $(".refund_order_id").removeClass("clicked");

    $("#read_barcode_pos_refund").css("opacity", 0.5);
    $("#read_barcode_pos_refund").prop("disabled", true);
  }
});

$(document).on("change", ".refund_quantity_input", function () {
  $(this)
    .parent()
    .find($("input[name='refund_order_id[]']"))
    .prop("checked", true);
  $(".order_refund").removeClass("btn-custom-disable");
});

$(document).on("click", "#age_verify_ok_button", function () {
  $("#is_age_verified").val(1);
  var is_age_verify_custom_product = $("#is_age_verify_custom_product").val();
  if (is_age_verify_custom_product == 1) {
    // Custom Product
    $("#age-verify-modal-close").trigger("click");
    var custom_category_setting_details_auto_id = $(
      "#no_of_misceleneous_item"
    ).val();
    $(
      ".misceleneous_item[data-custom_category_setting_details_auto_id='" +
        custom_category_setting_details_auto_id +
        "']"
    ).trigger("click");
  } else {
    // Scan Product
    $("#age-verify-modal-close").trigger("click");
    $("#read_barcode_POS").val($("#barcode_product_before_age_verify").val());
    $(".read_barcode_POS_submit").trigger("click");
  }
});

jQuery(document).on("click",".print_receipt_previous_transaction",function (e) {
    e.preventDefault();
    var dt;
    $.ajax({
      type: "POST",
      url: base_url + "cashier/get_refund_order_previous_transaction",
      dataType: "json",
      async: true,
      cache: false,
      data: {
        dt: dt,
      },
      success: function (data) {
        if (data.status == "success") {
          $("#refund_previous_transaction").modal();
          $("#refund_previous_transaction .recallmodal").empty();
          $("#refund_previous_transaction .recallmodal").html(data.html);
          $("#rf-date").val(dt);

          if (dt != "") {
            $("#refund_by_product").fadeIn("slow");
            $("#custom_product").hide();
            $("button[data-type='refund_by_product']").addClass("recall-btn");
            $("button[data-type='custom_product']").removeClass("recall-btn");
          }

          if (dt == "") {
            setTimeout(function () {
              $("#read_barcode_pos_refund_cp").focus();

              $("#tbody_refund_order_detail_scan_append").empty();
              $("#refund_exist_product_id").val("");
              $("#is_scan_refund_order").val(0);
            }, 800);
          }
        }
      },
    });
  }
);

// view receipt

$(document).on("click", ".view_receipt_pr", function (e) {
    
    var order_id = $(this).attr("data-recall_order_id");
    $.ajax({
        type: "POST",
        url: base_url + "cashier/pos_rcpt_view/" + order_id,
        dataType: "html",
        async: false,
        success: function (data) {
            // $("#print_receipt_enable").css("pointer-events","none");
            var fileContents = data;

            $("#myModalg_print_view").modal();
            $("#myModalg_print_view .modal_print_data").empty();
            $("#myModalg_print_view .modal_print_data").html(fileContents);

            // $("#myModalg_print_view").modal();
            // $('.view_receipt_html').empty();
            // $('.view_receipt_html').html(fileContents);
            // var popupWinindow = window.open(
            //   "",
            //   "_blank",
            //   "width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no"
            // );
            // popupWinindow.document.open();
            // popupWinindow.document.write(fileContents);
            // popupWinindow.document.close();
        },
    });
    // $("#myModalg_print_view").modal('show');
    // viewPrintReceiptTransaction(order_id);

});

$(document).on("click", ".modal_print_data_close", function () {
    $("#myModalg_print_view .modal_print_data").empty();
    $(".print_receipt_previous_transaction").trigger("click");
    $("#myModalg_print_view").modal("hide");
});

function viewPrintReceiptTransaction(ord_id) {
  // $.addPanels(base_url + "cashier/pos_rcpt/"+ord_id);
  //jQuery(".close_previous_transaction")[0].click();
  //$(".print_receipt_modal_close").trigger("click");

  $.ajax({
    type: "POST",
    url: base_url + "cashier/pos_rcpt_view/" + ord_id,
    dataType: "html",
    async: false,
    success: function (data) {
      // $("#print_receipt_enable").css("pointer-events","none");
      var fileContents = data;
      $("#myModalg_print_view").modal();
      // $('.view_receipt_html').empty();
      // $('.view_receipt_html').html(fileContents);
      // var popupWinindow = window.open(
      //   "",
      //   "_blank",
      //   "width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no"
      // );
      // popupWinindow.document.open();
      // popupWinindow.document.write(fileContents);
      // popupWinindow.document.close();
    },
  });
}



$(document).on("click", ".print_receipt_pr", function (e) {
  var order_id = $(this).attr("data-recall_order_id");
  doPrintReceiptPreviousTransaction(order_id);
});

function doPrintReceiptPreviousTransaction(ord_id) {
  // $.addPanels(base_url + "cashier/pos_rcpt/"+ord_id);
  jQuery(".close_previous_transaction")[0].click();
  $(".print_receipt_modal_close").trigger("click");

  $.ajax({
    type: "POST",
    url: base_url + "cashier/pos_rcpt/" + ord_id,
    dataType: "html",
    async: false,
    success: function (data) {
      // $("#print_receipt_enable").css("pointer-events","none");
      var fileContents = data;

      var popupWinindow = window.open(
        "",
        "_blank",
        "width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no"
      );
      popupWinindow.document.open();
      popupWinindow.document.write(fileContents);
      // popupWinindow.document.close();
    },
  });
}


$(document).on("click", ".print_receipt_return_pr", function (e) {
  var order_id = $(this).attr("data-recall_order_id");
  doPrintReceiptRefundTransaction(order_id);
});
function doPrintReceiptRefundTransaction(ord_id) {
  // $.addPanels(base_url + "cashier/pos_rcpt/"+ord_id);

  $.ajax({
    type: "POST",
    url: base_url + "cashier/Cashier/return_rcpt/" + ord_id,
    dataType: "html",
    async: false,
    success: function (data) {
      // $("#print_receipt_enable").css("pointer-events","none");
      var fileContents = data;

      var popupWinindow = window.open(
        "",
        "_blank",
        "width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no"
      );
      popupWinindow.document.open();
      popupWinindow.document.write(fileContents);
      popupWinindow.document.close();
    },
  });
}

$(document).on("click", "#refund_previous_transaction_close", function () {
  $("#recall_order_modal").trigger("click");
  $("#print_receipt_enable").trigger("click");
});

$(document).on(
  "click",
  ".refund_order_table_previous_transaction tr",
  function () {
    $(".refund_order_table_previous_transaction tr").removeClass("clicked");
    $(this).addClass("clicked");
  }
);

function refund_order_filter_previous_transaction(obj) {
  var date_filter = obj.value;
  refund_order_filter_previous_transaction_func(date_filter);
}

function refund_order_filter_previous_transaction_func(dt) {
  $.ajax({
    type: "POST",
    url: base_url + "cashier/get_refund_order_previous_transaction",
    dataType: "json",
    async: true,
    cache: false,
    data: {
      dt: dt,
    },
    success: function (data) {
      if (data.status == "success") {
        $("#refund_previous_transaction").modal();
        $("#refund_previous_transaction .recallmodal").empty().html(data.html);
        $("#rf-date").val(dt);

        if (dt != "") {
          $("#refund_by_product").fadeIn("slow");
          $("#custom_product").hide();
          $("button[data-type='refund_by_product']").addClass("recall-btn");
          $("button[data-type='custom_product']").removeClass("recall-btn");
        }

        if (dt == "") {
          setTimeout(function () {
            $("#read_barcode_pos_refund_cp").focus();

            $("#tbody_refund_order_detail_scan_append").empty();
            $("#refund_exist_product_id").val("");
            $("#is_scan_refund_order").val(0);
          }, 800);
        }
      }
    },
  });
}
function print_product(
  data,
  crv_price,
  main_price,
  size_org,
  is_promotion,
  show_quantity = 0
) {
  var applicable_Tax = 0;
  if (
    data.Applicable_Tax == 0 ||
    data.Applicable_Tax == "undefined" ||
    data.Applicable_Tax == ""
  ) {
    applicable_Tax = 0;
  } else {
    applicable_Tax = 1;
  }

  var applicable_Tax = 0;
  if (
    data.Applicable_Tax == 0 ||
    data.Applicable_Tax == "undefined" ||
    data.Applicable_Tax == ""
  ) {
    applicable_Tax = 0;
  } else {
    applicable_Tax = 1;
  }


  var is_EBT = 0;
  if (
    data.is_EBT == 0 ||
    data.is_EBT == "undefined" ||
    data.is_EBT == ""
  ) {
    is_EBT = 0;
  } else {
    is_EBT = 1;
  }

  var is_EBT = data.is_EBT;

  var item_info = "";
  item_info += "<tr id='product_tr_" + data.product_id + "'>";
  item_info +=
    '<td class="table_row" id="table_row_' + data.product_id + '" style="text-align: left;padding-left: 7px;">' +
    data.product_name +
    "</td>";
  item_info +=
    '<input type="hidden" name="product_id[]" value="' + data.product_id + '">';

  item_info +=
    '<input type="hidden" id="product_cart_name_' +
    data.product_id +
    '"  name="product_name[]" value="' +
    data.product_name +
    '">';

    item_info +=
    '<input type="hidden" id="product_row_total_' +
    data.product_id +
    '"  name="product_row_total[]" value="' +
    main_price +
    '">';

  item_info +=
    '<input type="hidden" id="product_base_rate_' +
    data.product_id +
    '" name="product_base_rate[]" value="' +
    main_price +
    '">';

  item_info +=
    '<input type="hidden" name="product_rate[]" id="product_rate_' +
    data.product_id +
    '" value="' +
    data.onsale_price +
    '">';

  if (data.qty !== undefined) {
    var qty = data.qty;
  } else {
    var qty = 1;
  }
  var onsale_price = data.onsale_price * qty;
  item_info +=
    '<input type="hidden" id="product_price_' +
    data.product_id +
    '" name="product_price[]" value="' +
    onsale_price +
    '">';

  var offprice = data.price * qty;
  item_info +=
    '<input type="hidden" id="product_offer_price_' +
    data.product_id +
    '" name="product_offer_price[]" value="' +
    offprice +
    '">';

  item_info +=
    '<input type="hidden" id="product_qty_' +
    data.product_id +
    '" name="product_qty[]" value="' +
    qty +
    '">';
  //prashant code start
  item_info +=
      '<input type="hidden" id="product_inventory_qty_' +
      data.product_id +
      '" name="product_inventory_qty_[]" value="' +
      data.quantity +
      '">';

  item_info +=
      '<input type="hidden" id="product_reorder_level_' +
      data.product_id +
      '" name="product_reorder_level_[]" value="' +
      data.reorder_level +
      '">';
  //prashant code end
  item_info +=
    '<input type="hidden" id="product_crv_' +
    data.product_id +
    '" name="product_crv[]" value="' +
    parseFloat(crv_price) +
    '">';

  item_info +=
    '<input type="hidden" id="is_product_crv_' +
    data.product_id +
    '" name="is_product_crv[]" data-product_unit="' +
    data.unit +
    '" value="' +
    data.Applicable_CRV +
    '">';


    item_info +=
    '<input type="hidden" id="is_product_EBT_' +
    data.product_id +
    '" name="is_product_EBT[]" value="' +
    data.is_EBT +
    '">';

    

  item_info +=
    '<input type="hidden" id="is_product_size_' +
    data.product_id +
    '" name="is_product_size[]" value="' +
    size_org +
    '">';

  item_info +=
    '<input type="hidden" name="is_price_override[]" data-proid="'+data.product_id+'" class="is_price_override" id="is_price_override_'+data.product_id+'" value="0">';

  item_info +=
    '<input type="hidden" name="price_override_original[]" id="price_override_original_'+data.product_id+'" value="' +
    onsale_price +
    '">';

  item_info +=
    '<input type="hidden" name="price_override_new[]" id="price_override_new_'+data.product_id+'" value="' +
    onsale_price +
    '">';


  if (data.is_scratchable == 1) {
    item_info +=
      '<input type="hidden" class="is_texable" id="is_texable_' +
      data.product_id +
      '" name="is_texable[]" value="0">';
    //prashant code start
    item_info +=
      '<input type="hidden" class="is_scratchable" id="is_scratchable_' +
      data.product_id +
      '" name="is_scratchable[]" value="1">';
    //prashant code end


  } else {
    if (applicable_Tax == 0) {
      item_info +=
        '<input type="hidden" class="is_texable" id="is_texable_' +
        data.product_id +
        '" name="is_texable[]" value="0">';

    } else {
       item_info +=
          '<input type="hidden" class="is_texable" id="is_texable_' +
          data.product_id +
          '" name="is_texable[]" value="1">';
    }

    //prashant code start
    item_info +=
      '<input type="hidden" class="is_scratchable" id="is_scratchable_' +
      data.product_id +
      '" name="is_scratchable[]" value="0">';
    //prashant code end
  }

  item_info +=
    "<input type='hidden' class='' id='pos_combo_detail_" +
    data.product_id +
    "' name='pos_combo_detail[]' value='" +
    data.pos_combo_details +
    "'>";

  item_info += "<td>";

  var btn_disabled = "";
  if (show_quantity == 1) {
    btn_disabled = "z-index:-1;";
  }
  item_info +=
    '<div class="plusMinusContainer "><span class="minus_icon reduced" data-id="' +
    data.product_id +
    '" style="' +
    btn_disabled +
    ' position: absolute; cursor: pointer; top: 50%;    transform: translateY(-50%);    height: -webkit-fill-available;    background: red;    left: 10%;    width: 25%;"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 25" fill="none"><mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="11" width="14" height="3"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 13.5417H5V11.4584H19V13.5417Z" fill="white"/></mask> <g mask="url(#mask0)"> <rect x="-13" y="-13.5416" width="50" height="52.0833" fill="white"/> <mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="-13" y="-14" width="50" height="53"> <rect x="-13" y="-13.5416" width="50" height="52.0833" fill="white"/> </mask><g mask="url(#mask1)"></g></g> </svg></span>';

  item_info +=
    '<input type="text" class="quantity_input" onfocus="this.blur()" readonly="readonly" data-org_price="' +
    data.onsale_price +
    '" id="quantity_input_' +
    data.product_id +
    '" value="' +
    qty +
    '"" readonly style="position: absolute;left: 50%;transform: translateX(-50%);width:14%; overflow:visible; border: 0px solid;background:transparent; text-align: center;font-size:1.6vw;margin:0 auto;">';

  item_info +=
    '<span class="plus_icon increase ' +
    btn_disabled +
    '" data-id="' +
    data.product_id +
    '" style="' +
    btn_disabled +
    ' position: absolute;cursor: pointer;top: 50%;width: 25%; height: -webkit-fill-available;right: 10%;transform: translateY(-50%);background: green;"><svg xmlns="http://www.w3.org/2000/svg" width="60%" height="-webkit-fill-available;" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="white"/></svg></span>';

  item_info += "</div></td>";

  var price_strike = "";
  if (is_promotion == 1) {
    price_strike =
      "<strike class='onsale_strike_price_" +
      data.product_id +
      "'  style='color:red;'>$" +
      main_price +
      "</strike><br>";
  }

  var onsalr_price = qty * data.onsale_price;
  onsalr_price = parseFloat(onsalr_price);
  onsalr_price = onsalr_price.toFixed(2);

  item_info +=
    '<td class="rightTextAlign">' +
    price_strike +
    '$<span class="onsale_price_' +
    data.product_id +
    '">' +
    onsalr_price +
    "</span></td>";
  item_info += "</tr>";

  //remove row
  //<span data-productid='" + data.product_id + "' class='remove_tr'>X</span>

  $(".item_info_section").append(item_info);
  $(".table-container").scrollTop($(".table-container")[0].scrollHeight);
  // ST - For Calculate Total
  calculatePOSTotal();
  // auto_apply_promotion();
  // calculatePOSTotal();
  // EN - For Calculate Total
}

/*** ST - For POS Cashback *******/
$(document).on("click", ".pos_cashback", function () {
  $("#pos_cashback_modal #cashback_amount").focus();
  $("#pos_cashback_modal #cashback_amount").val("");
  $("#pos_cashback_modal #cashback_amount_err").hide();

  var exist_product_id = $("#exist_product_id").val();
  var is_transaction_completed = $("#is_transaction_completed").val();

  if (exist_product_id == "" || is_transaction_completed == 1) {
    $("#overlay").hide();
    $(".loader").hide();

    swal({
      icon: "warning",
      title: "Oops!",
      text: "There are no Products in your Cart",
      icon: "warning",
      buttons: false,
      dangerMode: false,
      timer: 2000,
    });

    return false;
  }
  $("#pos_cashback_modal #cashback_order_amount").html(
    $("#main_cart_grand_total").val()
  );
  // $("#cart_cashback_amount,#cart_cashback_fee,#cart_cashback_order_total").show();
  $("#cart_cashback_amount,#cart_cashback_fee").show();
  $("#is_cashback,#cashback_fee,#cashback_amount").val(0);

  $("#pos_cashback_modal").modal("show");
  $("#pos_cashback_modal").modal({
    escapeClose: false,
    clickClose: false,
    showClose: false,
  });
});

jQuery(document).on("keypress", "#cashback_amount", function (e) {
  //e.which = 13;

  if (e.which == 13) {
    $("#pos_cashback_insert").trigger("click");
    $("#pos_cashback_modal img").trigger("click");
  }
});

jQuery(document).on("keypress", "#redeem_points_input", function (e) {
  //e.which = 13;

  if (e.which == 13) {
    $("#submit_redeem_points").trigger("click");
    $("#pos_redeem_points_modal img").trigger("click");
  }
});

$(document).on("click", "#pos_cashback_insert", function () {
  $(".item_info_section #is_cashback").val(1);
  var coupon_discount_total = $("#coupon_discount_total").val();
  var redeem_points_discount = $("#redeem_points_discount").val();
  var main_cart_grand_total = $("#main_cart_grand_total").val();

  //console.log("coupon_discount_total: " +coupon_discount_total +" - redeem_points_discount: " +redeem_points_discount +"- main_cart_grand_total" +main_cart_grand_total);

  main_cart_grand_total =
    parseFloat(main_cart_grand_total) -
    (parseFloat(coupon_discount_total) + parseFloat(redeem_points_discount));

  var cashback_amount = $("#pos_cashback_modal #cashback_amount").val();
  var cashback_fee = $("#pos_cashback_modal #pop_cashback_fee").val();

  if (cashback_amount == "") {
    $("#cashback_amount").focus();
    $("#cashback_amount_err").html("Please Enter Cashback Amount").show();
    return false;
  }

  //prashant  csg more > cash back
  var cash_drawer_amt = $("#cashdrawer_amt").val();

  if (parseFloat(cashback_amount) > parseFloat(cash_drawer_amt)) {
    $("#pos_cashback_modal img").trigger("click"); //need
    swal({
      title: "Oops!",
      text: "Insufficient cash in cash drawer ($ " + cashback_amount + ")",
      icon: "error",
      buttons: false,
      timer: 3000,
    });
    // $("#pos_cashback_modal img").trigger("click"); //need
    // $("#cashBackNoteModal").modal("show");
    // $("#append_cashback_amount123").val(cashback_amount);
    // $("#append_cashback_fee123").val(cashback_fee);
  } else {
    $("#cart_cashback_amount,#cart_cashback_fee").show();
    $("#append_cashback_amount").html(cashback_amount);
    $("#append_cashback_fee").html(cashback_fee);

    var cashback_order_total =
      parseFloat(main_cart_grand_total) +
      parseFloat(cashback_amount) +
      parseFloat(cashback_fee);
    cashback_order_total = cashback_order_total.toFixed(2);

    // $("#append_cashback_order_total").html(cashback_order_total);
    $("#grand_total").html("$" + cashback_order_total);

    $(".item_info_section #cashback_fee").val(cashback_fee);
    $(".item_info_section #pos_cashback_amount").val(cashback_amount);

    $("#pos_cashback_modal img").trigger("click"); //need

    $(".total-con").scrollTop($(".total-con")[0].scrollHeight);

    $("#read_barcode_POS").focus();
    $('#read_barcode_POS').removeClass('use-keyboard-input');
    $(".close_cashback").trigger("click");
  }

  // $("#cart_cashback_amount,#cart_cashback_fee,#cart_cashback_order_total").show();
});
/*** EN - For POS Cashback *******/

$(document).on(
  "click",
  "#submit_redeem_points,#all_redeem_points",
  function () {
    var submit_id = $(this).attr("id");

    var cust_loyalty_points = $('a[href="#pos_redeem_points_modal"]').attr(
      "data-cust_loyalty_points"
    );
    var cust_loyalty_amount = $('a[href="#pos_redeem_points_modal"]').attr(
      "data-cust_loyalty_amount"
    );
    var outbound_point_amount_main = $("#outbound_point_amount_main").val();
    var total_points_input = parseInt(
      $("#pos_redeem_points_modal #total_points_input").val()
    );
    var redeem_points_input = parseInt(
      $("#pos_redeem_points_modal #redeem_points_input").val()
    );
    var main_cart_grand_total = $("#main_cart_grand_total").val();
    var final_amount = 0.0;

    var container_deposit = $("#container_deposit").val();
    var tax_amount = $("#tax_amount").val();

    main_cart_grand_total =
      parseFloat(main_cart_grand_total) -
      (parseFloat(container_deposit) + parseFloat(tax_amount));

    if (submit_id == "submit_redeem_points") {
      if (isNaN(redeem_points_input)) {
        swal({
          title: "Warning!",
          text: "Please enter Redeem Amount.",
          icon: "warning",
          buttons: false,
          timer: 2700,
        });
        return false;
      }

      final_amount = redeem_points_input;
    } else if (submit_id == "all_redeem_points") {
      final_amount = cust_loyalty_amount;
    }

    if (final_amount > main_cart_grand_total) {
      swal({
        title: "Warning!",
        text: "Redeem amount is more than existing order amount.",
        icon: "warning",
        buttons: false,
        timer: 2700,
      });
      return false;
    }

    if (final_amount > cust_loyalty_amount) {
      swal({
        title: "Warning!",
        text: "Can not Redeem amount more than existing loyalty balance.",
        icon: "warning",
        buttons: false,
        timer: 2700,
      });
      return false;
    }

    if (final_amount < outbound_point_amount_main) {
      swal({
        title: "Warning!",
        text: "Minimum redeem amount is Insufficient.",
        icon: "warning",
        buttons: false,
        timer: 2700,
      });
      return false;
    }

    redeem_points_discount = parseFloat(final_amount);
    redeem_points_discount = redeem_points_discount.toFixed(2);

    var outbound_point_main = $("#outbound_point_main").val();
    var outbound_point_amount_main = $("#outbound_point_amount_main").val();
    var redeem_points_discount_pt =
      (redeem_points_input * outbound_point_main) / outbound_point_amount_main;
    redeem_points_discount_pt = Math.floor(redeem_points_discount_pt);

    // form hidden
    $("#exist_redeem_points").val(total_points_input);
    $("#used_redeem_points").val(redeem_points_discount_pt);

    $("#redeem_points_discount").val(redeem_points_discount);
    $("#redeem_discount").html(redeem_points_discount);
    $("#redeem_discount_div").show();
    calculatePOSTotal();

    $("a[href='#close-modal'] img").trigger("click");
  }
);

/*** ST - For Card Transaction Button *******/
$(document).on("click", ".card_transaction_popup", function (e) {

  clear_partial();

  e.preventDefault();
  var exist_product_id = $("#exist_product_id").val();

  if (exist_product_id == "") {
    $("#overlay").hide();
    $(".loader").hide();

    swal({
      icon: "warning",
      title: "Oops!",
      text: "There are no Products in your Cart",
      icon: "warning",
      buttons: false,
      dangerMode: false,
      timer: 2000,
    });

    return false;
  }
  $("#card_transaction_modal").modal("show");
});

$(document).on("click", "#card_transaction_ebt_payment", function (e) {
  e.preventDefault();
  var have_EBT = 0 ;
  $("input[name='product_price[]']").each(function (e){
    var product_id_arr = $(this).attr("id").split("product_price_");
    var product_id = product_id_arr[1];
    var price = $(this).val();
    var EBT_status = $('#is_product_EBT_'+product_id).val();
      if(EBT_status == 1){
        have_EBT = 1 ;
      }    
  });

  // alert(have_EBT);
  // return false;

  if(have_EBT == 1){
    swal({
      title: "Oops!",
      text: "You have cart product with alcohol",
      icon: "error",
      buttons: false,
      timer: 3000,
    });
    return false;
  }

  $("#card_transaction_ebt_payment_modal").modal("show");
});

$(document).on("click", "#card_transaction_ebt_declined", function () {
  if(node_setting == 1){
    var product_array = new Array();
    json_string = '{"transaction_type":"ebt","transaction_status":"fail","return_balance":0.00,"amount_tendered":0.00}';
    product_array.push(json_string);
    socket.emit('ebt_client_transaction',product_array);
  }
  swal({
    title: "Warning!",
    text: "EBT Transaction Declined",
    icon: "warning",
    buttons: false,
    timer: 2700,
  });
  jQuery("a[href='#close-modal'] img").trigger("click");
});

// ebt transaction
jQuery(document).on("click", "#card_transaction_ebt", function (e) {
  e.preventDefault();

  $("#overlay").show();
  $(".loader").show();

  $("#is_cashback,#cashback_fee,#cashback_amount").val(0);
  var data = $("#frmItemCart").serializeArray();

  //check cart product for EBT applicable - ST - 10-11-21


  // 0  = can sale on ebt 
  // 1  = can not sale on ebt 

  var partial_apply = $('#partial_transaction_apply').val();
  var partial_card_amount = $('#partial_transaction_card_amount').val();
  var partial_cash_amount = $('#partial_transaction_cash_amount').val();

  var is_found_EBT = 0;
  var EBT_amount = 0;
  $("input[name='product_price[]']").each(function (e){
    var product_id_arr = $(this).attr("id").split("product_price_");
    var product_id = product_id_arr[1];
    var price = $(this).val();
    var EBT_status = $('#is_product_EBT_'+product_id).val();
      if(EBT_status == 0){
        is_found_EBT = 1 ;
        EBT_amount += parseFloat(price);
      }

      
  });


  // if(is_found_EBT == 1 && partial_apply == 0){
  //   $("#overlay").hide();
  //   $(".loader").hide();
  //   swal({
  //     title: "Oops!",
  //     text: "You have cart product with alcohol",
  //     icon: "error",
  //     buttons: false,
  //     timer: 3000,
  //   });
  
  //   return false;
  // }
  
  partial_cash_amount = parseFloat(partial_cash_amount);

  if(partial_apply == 1 && is_found_EBT == 1){
if(partial_cash_amount <= EBT_amount ){
    //if(EBT_amount <= partial_cash_amount){

      $("#overlay").hide();
      $(".loader").hide();
      swal({
        title: "Oops!",
        text: "card amount have product with alcohol",
        icon: "error",
        buttons: false,
        timer: 3000,
      });
    
      return false;
    }
    
  }


  //check cart product for EBT applicable - ET - 10-11-21

  //check partial - 10-11-21




  //check partial over 10-11-21

  $.ajax({
    type: "POST",
    url: base_url + "cashier/POSterminalCheckoutCardEBT",
    dataType: "json",
    async: true,
    data: data,
    beforeSend: function () {
      $("#overlay").show();
      $(".loader").show();
    },
    success: function (data) {
      if (data.notify == "Limit Exceed") {
        swal({
          title: "Oops!",
          text: "You have exceeded the limit allowed for Cash Register. Please do a mandatory Cash Drop",
          icon: "error",
          buttons: false,
          timer: 3000,
        });
        // $("#cashdroplaunchbtn").trigger("click") ;
        setTimeout(function () {
          $("#cashdrop").modal();
          $("#cdinput").val(data.cash_drop_amt.toFixed(2));
        }, 3500);
      }

      $("#overlay").hide();
      $(".loader").hide();

      $(".opencalc_close img").click();
      $("div.jquery-modal").remove();

      var return_bal = 0.0;
      $("#transaction_type,#transaction_status").show();
      $("#transaction_return_balance_html").html("$" + return_bal.toFixed(2));

      var return_balance_html = parseFloat($("#return_balance_html").html());
      var grand_total = parseFloat($("#cart_grand_total").val());
      var transaction_tendered = return_balance_html + grand_total;
      transaction_tendered = 0.0;
      $("#transaction_tendered").html("$" + transaction_tendered.toFixed(2));

      if(node_setting == 1){
        var product_array = new Array();
        json_string = '{"transaction_type":"EBT","transaction_status":"success","return_balance":'+return_bal+',"amount_tendered":'+transaction_tendered+'}';
        product_array.push(json_string);
        socket.emit('ebt_client_transaction',product_array);
      }

      $("#is_transaction_completed").val("1");
      $("#is_age_verified").val("0");
      $("#barcode_product_before_age_verify").val("");
      $("#age_verify_date").val("");

      var previous_order = localStorage.getItem("current_order");
      var current_order = data.order_id;
      localStorage.setItem("previous_order", previous_order);
      localStorage.setItem("current_order", current_order);

      $(".print_current_transaction").attr("data-order_id", current_order);
      $(".print_previous_transaction").attr("data-order_id", previous_order);

      $("#print_receipt_enable").removeAttr("style");

      $(".plusMinusContainer")
        .find(".minus_icon")
        .addClass("btn-custom-disable");
      $(".plusMinusContainer")
        .find(".plus_icon")
        .addClass("btn-custom-disable");
      $(".total-con").scrollTop($(".total-con")[0].scrollHeight);

      $("#transaction_type_html").html("Card");

      $(".print_current_transaction").css("pointer-events", "");
      jQuery("a[href='#close-modal'] img").trigger("click");
      swal({
        title: "Success!",
        text: "Transaction successfully..!",
        icon: "success",
        buttons: false,
        timer: 2000,
      });
    },
  });
  document.getElementById("optxt").innerHTML = "";
});

function get_current_cash_drawer_amt() {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/current_cash_in_terminal",
    dataType: "json",
    success: function (data) {
      //console.log(data.cash_in_drawer);
      // alert(data.cash_in_drawer);
      if (data.cash_in_drawer < 0) {
        $("#cashdrawer_amt").val(0.0);
        $("#pos_cash_in_drawer").val(0.0);
      } else {
        $("#cashdrawer_amt").val(data.cash_in_drawer.toFixed(2));
        $("#pos_cash_in_drawer").val(data.cash_in_drawer.toFixed(2));
      }
    },
  });
}
/*** EN - For Card Transaction Button *******/


/** ST - node module customer screen **/

if(node_setting == 1){

  var socket,strokes = [],currentStroke = null;
  socket = io.connect("http://localhost:3000");


  socket.emit('refresh_customer_screen_server');



  function send_customer_cart_data(data){
    socket.emit('display_customer_cart_data',data);
  }

  function clear_customer_screen(){
    data = '';
    socket.emit('clear_customer_screen_server',data);
  }

  socket.on('search_customer_pos',(data) =>{
          var customer_name = data.data.customer_name;
          var customer_id = data.data.customer_id;
          var tot_redeem_point = data.data.tot_redeem_point;
          var account_balance = data.account_balance;
          var db_point_amount = data.data.db_point_amount;
          var db_point = data.data.db_point;
          $(".pos-head").html(customer_name);
          $(".pos-head").css("color", "#000");
          $("#walk_in_customer_name").val(customer_name);
          $("#walk_in_customer_id").val(customer_id);
          $("#customer_mobile_no").val('');
          $("#cust_loyalty_points").html(tot_redeem_point);
          $("#cust_loyalty_amount").html(account_balance);

          $("#outbound_point_main").val(db_point);
          $("#outbound_point_amount_main").val(db_point_amount);


          $("a[href='#pos_redeem_points_modal']").attr('data-cust_loyalty_points',tot_redeem_point);
          $("a[href='#pos_redeem_points_modal']").attr('data-cust_loyalty_amount',account_balance);
  });

  socket.on('cash_transaction_from_customer',(data) =>{
    $('#opencalc_btn').trigger('click');
  });

  socket.on('credit_card_transaction_from_customer',(data) =>{
    $('#card_transaction').trigger('click');
  });

  socket.on('ebt_complete_transaction_customer',(data) =>{
    $("#card_transaction_ebt_payment_modal").modal('show');
  });

}



/* START - POS discount button */

jQuery(document).on("click", ".discbtn-click", function (e){
  var id = $(this).attr('id');
  if(id == 'percent_off'){
    $('#percentoff_div').show();
    $('#amountoff_div').hide();
  }else{
    $('#percentoff_div').hide();
    $('#amountoff_div').show();
  }
});

jQuery(document).on("click", ".apply_custom_discount", function (e){

  var exist_product_id = $("#exist_product_id").val();
  var is_transaction_completed = $("#is_transaction_completed").val();

  if (exist_product_id == "" || is_transaction_completed == 1) {
    $("#overlay").hide();
    $(".loader").hide();

    swal({
      icon: "warning",
      title: "Oops!",
      text: "There are no Products in your Cart",
      icon: "warning",
      buttons: false,
      dangerMode: false,
      timer: 2000,
    });

    return false;
  }

  $("#overlay,.loader").show();

  var id=$(this).attr('id');
  var discount_type=$(this).attr('data-type');
  var discount_value=$(this).attr('data-value');
  var cart_min_amount=$(this).attr('data-min_amount');

  var button_html = $(this).html();

  var sub_total = 0.0;
  $("input[name='product_price[]']").each(function (e) {
      sub_total = parseFloat(sub_total) + parseFloat($(this).val());
  });
  //alert(sub_total);


  if(cart_min_amount > sub_total){
    $("#overlay,.loader").hide();
    swal({
      icon: "warning",
      title: "Oops!",
      text: "Insufficient cart total to apply this discount !!",
      icon: "warning",
      buttons: false,
      dangerMode: false,
      timer: 3000,
    });
    $("#discount2 .cancel-btn").trigger('click');
    return false;
  }

  if(discount_type == 0){
    var discount_amount = (sub_total * discount_value) / 100 ;
    discount_amount = parseFloat(discount_amount);
    discount_amount = discount_amount.toFixed(2);
    $('#custom_discount_total').val(discount_amount);
    var span = '<span class="remove_custom_discount" id="'+id+'" data-type="'+discount_type+'" data-value="'+discount_value+'">'+button_html+' <a href="javascript:;">X</a></span>';
    $('#applied_coupon').append(span);
  }else{
    discount_amount = parseFloat(discount_value);
    discount_amount = discount_amount.toFixed(2);
    $('#custom_discount_total').val(discount_amount);
    var span = '<span class="remove_custom_discount" id="'+id+'" data-type="'+discount_type+'" data-value="'+discount_value+'">'+button_html+' <a href="javascript:;">X</a></span>';
    $('#applied_coupon').append(span);
  }

  calculatePOSTotal();

  $("#overlay,.loader").hide();

  $("#discount2 .cancel-btn").trigger('click');
});


jQuery(document).on("click", ".remove_custom_discount", function (e){

  $("#overlay,.loader").show();

  var id=$(this).attr('id');
  var discount_type=$(this).attr('data-type');
  var discount_value=$(this).attr('data-value');

  var sub_total = 0.0;
  $("input[name='product_price[]']").each(function (e) {
      sub_total = parseFloat(sub_total) + parseFloat($(this).val());
  });
  //alert(sub_total);

  if(discount_type == 0){
    var discount_amount = (sub_total * discount_value) / 100 ;
    discount_amount = parseFloat(discount_amount);
    discount_amount = discount_amount.toFixed(2);
    var final_disc = parseFloat($('#custom_discount_total').val()) - discount_amount ;
    $('#custom_discount_total').val(final_disc);
  }else{
    discount_amount = parseFloat(discount_value);
    discount_amount = discount_amount.toFixed(2);
    $('#custom_discount_total').val(discount_amount);
    var final_disc = parseFloat($('#custom_discount_total').val()) - discount_amount ;
    $('#custom_discount_total').val(final_disc);
  }

$(this).fadeOut(300, function() {
    $(this).remove();
});

  calculatePOSTotal();

  $("#overlay,.loader").hide();

  $("#discount2 .cancel-btn").trigger('click');
});
/* END - POS discount button */


jQuery(document).on("click", "#opencalc_btn", function (e){
    clear_partial();
});

//clear partial data
function clear_partial() {
  $('#partial_transaction_apply').val(0);
  $('#partial_transaction_cash_amount').val(0);
  $('#partial_transaction_card_amount').val(0);
}

