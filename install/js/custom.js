(function ($) {
  "use strict";

  //* Form js
  function verificationForm() {
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function () {
      if (animating) return false;
      animating = true;

      current_fs = $(this).parent();
      next_fs = $(this).parent().next();

      //activate next step on progressbar using the index of next_fs
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      //show the next fieldset
      next_fs.show();
      //hide the current fieldset with style
      current_fs.animate(
        {
          opacity: 0,
        },
        {
          step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = now * 50 + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
              transform: "scale(" + scale + ")",
              position: "absolute",
            });
            next_fs.css({
              left: left,
              opacity: opacity,
            });
          },
          duration: 800,
          complete: function () {
            current_fs.hide();
            animating = false;
          },
          //this comes from the custom easing plugin
          easing: "easeInOutBack",
        }
      );
    });

    $(".previous").click(function () {
      if (animating) return false;
      animating = true;

      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

      //de-activate current step on progressbar
      $("#progressbar li")
        .eq($("fieldset").index(current_fs))
        .removeClass("active");

      //show the previous fieldset
      previous_fs.show();
      //hide the current fieldset with style
      current_fs.animate(
        {
          opacity: 0,
        },
        {
          step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = (1 - now) * 50 + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
              left: left,
            });
            previous_fs.css({
              transform: "scale(" + scale + ")",
              opacity: opacity,
            });
          },
          duration: 800,
          complete: function () {
            current_fs.hide();
            animating = false;
          },
          //this comes from the custom easing plugin
          easing: "easeInOutBack",
        }
      );
    });

    $(".submit").click(function () {
      return false;
    });
  }

    // Verify license
    $(document).on("click",".verify_license",function(e) {

        /*$("#existing_store").hide();
        $("#new_store").show();
        $(".verify_license_hidden").trigger("click");
        return false;*/

        var merchant_id = $("#merchant_id").val();
        var licence_key = $("#licence_key").val();

        if(merchant_id == "") {
            $("#merchant_id").focus();
            $("#merchant_id_err").show();
            return false;
        } else {
            $("#merchant_id_err").hide();
        }

        if(licence_key == "") {
            $("#licence_key").focus();
            $("#licence_key_err").show();
            return false;
        } else {
            $("#licence_key_err").hide();
        }

        $("#overlay,.loader").show();

        $.ajax({
            type: "POST",
            url:  "validate_license_db.php",
            dataType: "json",
            data: {
                "merchant_id": merchant_id,
                "licence_key": licence_key
            },
            async: true,
            cache: false,
            success: function (data) { 

                $("#overlay,.loader").hide();
                console.log(data);                

                if(data.status == 1 && data.html != "") { // Success
                    $("#store_list").empty();
                    $(data.html).appendTo("#store_list");

                    $("#existing_store").show();
                    $("#new_store").hide();

                    $(".verify_license_hidden").trigger("click");
                } else if(data.status == 0) { // Wrong enter merchant_id/licence_key
                    swal({
                        title: "Oops!",
                        text: data.message,
                        icon: "error",
                        buttons: false,
                        timer: 3000,
                    });
                    return false;
                } else if(data.status == 2) { // Store is unavailable
                    
                    $(".verify_license_hidden").trigger("click");
                    $("#existing_store").hide();
                    $("#new_store").show();

                } else { // Error
                    swal({
                        title: "Oops!",
                        text: "Please try again.",
                        icon: "error",
                        buttons: false,
                        timer: 3000,
                    });
                    return false;
                }
            },
        });
        e.stopImmediatePropagation();
        return false;
    });

    // Setup Store
    $(document).on("click",".setup_store",function(e) {
        
        var merchant_id     = $('#store_list').find(':selected').attr("data-merchant_id");
        var store_db        = $('#store_list').find(':selected').attr("data-store_db");
        var store_username  = $('#store_list').find(':selected').attr("data-store_username");
        var store_password  = $('#store_list').find(':selected').attr("data-store_password");
        var host            = $('#store_list').find(':selected').attr("data-host");
        var store_list      = $("#store_list").val();

        if(store_list == "") {
            $("#store_list").focus();
            $("#store_list_err").show();
            return false;
        } else {
            $("#store_list_err").hide();
        }
        $("#overlay,.loader").show();
        $.ajax({
            type: "POST",
            url:  "setup_store_db.php",
            dataType: "json",
            data: {
                "store_list": store_list,
                "merchant_id": merchant_id,
                "store_db": store_db,
                "store_username": store_username,
                "store_password": store_password,
                "host": host
            },
            async: true,
            cache: false,
            success: function (data) {
                            
                if(data.status==1)
                    window.location.href ='create_store.php?action=summary';
                else{
                    $("#overlay,.loader").hide();
                    swal({
                        title: "Oops!",
                        text: data.message,
                        icon: "error",
                        buttons: false,
                        timer: 3000,
                    });
                    return false;
                }


            },
        });
        e.stopImmediatePropagation();
        return false;
    });

  //* Add Phone no select
  function phoneNoselect() {
    if ($("#msform").length) {
      $("#phone").intlTelInput();
      $("#phone").intlTelInput("setNumber", "+880");
    }
  }
  //* Select js
  function nice_Select() {
    if ($(".product_select").length) {
      $("select").niceSelect();
    }
  }
  /*Function Calls*/
  verificationForm();
  phoneNoselect();
  nice_Select();

})(jQuery);