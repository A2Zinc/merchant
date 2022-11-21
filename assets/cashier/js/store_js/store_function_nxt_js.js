/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

var $j = $.noConflict();

$(document).ready(function () {
  $j(".select-2-dropdown").select2();
  $j(".js-signature").jqSignature();
  $j(".savesign").click(function () {
    let signUri = $j(".js-signature").jqSignature("getDataURL");
    var sign = signUri;
    $(".emp_sign").val(sign);
  });
  $j(".clearcanvas").click(function () {
    $j(".js-signature").jqSignature("clearCanvas");
  });
  $j(".savesign2").click(function () {
    let dateUri = $j(".data-canve").jqSignature("getDataURL");
  });
  $j(".clearcanvas2").click(function () {
    $j(".date-canva").jqSignature("clearCanvas");
  });


  $j(".sign1").click(function () {
    let signUri = $j(".js-signature").jqSignature("getDataURL");
    var sign = signUri;
    $("#i9form20").val(sign);
  });

  $j(".sign2").click(function () {
    let signUri = $j(".js-signature").jqSignature("getDataURL");
    var sign = signUri;
    $("#i9form23").val(sign);
  });

  $j(".sign3").click(function () {
    let signUri = $j(".js-signature").jqSignature("getDataURL");
    var sign = signUri;
    $("#i9form56").val(sign);
  });
});
// edit category code
var maxField1 = 15; //Input fields increment limitation
var addButton1 = $(".add-button"); //Add button selector
var wrapper1 = $(".item-apend1"); //Input field wrapper

var x = 1; //Initial field counter is 1

//Once add button is clicked
$(addButton1).click(function () {
  var randoMI = Math.floor(1000 + Math.random() * 9000);
  //Check maximum number of input fields
  if (x < maxField1) {
    x++; //Increment field counter

    var fieldHTML1 =
      '<input type="hidden" name="combo_row[]" value="' +
      randoMI +
      '" ><div class="row"> <div class="col-md-4"> <div class="form-group"> <label class="customcardlabel" for="">Product Name</label> <input type="text" name="name_' +
      randoMI +
      '" class="form-control customcardinput inpt product_name1" data-id="' +
      randoMI +
      '" id="" aria-describedby="" placeholder="Enter Product Name" maxlength="20" onchange="productDuplicates()"><span class="errors" id="btn_er_' +
      randoMI +
      '" style="color:red; font-size:14px"></span> <span class="errors" id="dupli_er_' +
      randoMI +
      '" style="color:red; font-size:14px"></span> </div></div><div class="col-md-3"> <div class="form-group"> <label class="customcardlabel" for="">Price</label> <div class="position-relative"><span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span><input type="number" name="price_' +
      randoMI +
      '" class="form-control customcardinput inpt price1_val_' +
      randoMI +
      '" id="" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();"  aria-describedby="" placeholder="Enter Price"></div><span class="errors" id="prc_er_' +
      randoMI +
      '" style="color:red; font-size:14px"></span> </div></div> <div class="col-md-1"> <label class="customcardlabel" for="">Container Deposit</label><div class="form-group mt-4">  <input type="checkbox" id="CRV_" name="CRV_' +
      randoMI +
      '" value="1" class="ml-3" data-ecent="' +
      randoMI +
      '"> </div></div>          <div class="col-md-2 ecent_' +
      randoMI +
      '" style="display:none;"> <label class="customcardlabel" for="">Percent</label><select name="percent_' +
      randoMI +
      '" class="form-control customcardinput"><option value="5">5 cent</option><option value="10">10 cent</option></select></div><div class="col-md-1"> <label class="customcardlabel" for="">Taxable</label><div class="form-group mt-4">  <input style="margin-top:1em;" type="checkbox" id="TAX_" name="Tax_' +
      randoMI +
      '" value="1" class="ml-3 " > </div></div><div class="col-md-1"> <button type="button" class="btn btn-light apend_button remove-Nominee">-</button> </div></div>'; //New input field html
    $(wrapper1).append(fieldHTML1); //Add field html
  }
});

//Once remove button is clicked
$(wrapper1).on("click", ".remove-Nominee", function (e) {
  e.preventDefault();
  $(this).parent().parent().remove(); //Remove field html
  x--; //Decrement field counter
});

$("#cat_table").on("click", ".miscellaneousRecord", function () {
  $("#div_miscellaneous_product").show();
  $("#div_pos").hide();
});

$('#cat_table').on('click', '.productRecord', function() {
    $('#div_custom_cat_product').show();
    $('#hide_custom_cat').val($(this).data('catname'));
    $('#hide_custom_cat_id').val($(this).data('id'));
    $('#div_pos').hide();

    var id = $(this).data('id');
    var catname =$(this).data('catname');
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_custom_category_data",
        data: { id : id},
        dataType: 'json',
        beforeSend: function(){
            $("#overlay,.loader").show();
        },
        success: function(data){
          $('.cat_cust_name').text('( '+catname+' )');
          $("#overlay,.loader").hide();
          $('#upos').html(data);
        },
    });
});


$(document).on('click', '.delete_custom_cate_pro', function() {
    var id = $(this).data('id');
    var cat_id = $(this).data('cat');
  swal({
        text: "Are you sure you want to delete this custom category product?",
        buttons: ["Cancel", true],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: base_url + "cashier/Cashier/delete_custom_category_product",
                method: "POST",
                data: {id: id, cat_id: cat_id},
                beforeSend: function(){
                    $("#overlay,.loader").show();
                },
                success: function() {
                  $("#overlay,.loader").hide();
                  swal({
                      title: "Success!",
                      text: "Custom category product deleted successfully!",
                      icon: "success",
                      buttons: false,
                      timer: 2000,
                  });
                  window.location = base_url + "cashier/settings?d=category";
                }
            })
        }
    });

});


$(document).on('click', '#addCustomCatProduct', function() {
  $('#add_custom_cate_pro_modal').modal();
  $('#custom_cat_id').val($('#hide_custom_cat_id').val());
  $('#custom_cat_name').val($('#hide_custom_cat').val());
  $('.percentDiv').hide();
  $("#is_tax").val(0);
  $("#is_crv").val(0);
  $("#is_ebt").val(0);
});

$(document).on("click", "#is_tax", function () {
    if($(this).prop("checked") == true){
        $(this).val(1);
    }
    else if($(this).prop("checked") == false){
        $(this).val(0);
    }
});

$(document).on("click", "#is_crv", function () {
    if($(this).prop("checked") == true){
        $('.percentDiv').show();
        $(this).val(1);
    }
    else if($(this).prop("checked") == false){
        $('.percentDiv').hide();
        $(this).val(0);
    }
});

$(document).on("click", "#is_ebt", function () {
    if($(this).prop("checked") == true){
        $(this).val(1);
    }
    else if($(this).prop("checked") == false){
        $(this).val(0);
    }
});

$(document).on("click", "#edit_is_tax", function () {
    if($(this).prop("checked") == true){
        $(this).val(1);
    }
    else if($(this).prop("checked") == false){
        $(this).val(0);
    }
});

$(document).on("click", "#edit_is_crv", function () {
    if($(this).prop("checked") == true){
        $('.percentDiv1').show();
        $(this).val(1);
    }
    else if($(this).prop("checked") == false){
        $('.percentDiv1').hide();
        $(this).val(0);
    }
});

$(document).on("click", "#edit_is_ebt", function () {
    if($(this).prop("checked") == true){
        $(this).val(1);
    }
    else if($(this).prop("checked") == false){
        $(this).val(0);
    }
});

$("#btnCatCustomPro").on("click", function () {
    var is_crv = $("#is_crv").val();
    var is_tax = $("#is_tax").val();
    var is_ebt = $("#is_ebt").val();

    if($('#product_name_txt').val() == ''){
        $('#product_name_err').html('Please enter product name').show();
        return false;
    }
    if($('#product_price').val() == ''){
        $('#product_prc_err').html('Please enter price').show();
        return false;
    }

    if(is_crv == 1){
      if($('#percent').val() == 0){
          $('#percent_err').html('Please select percent').show();
          return false;
      }
    }
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/insert_custom_cat_product",
        data: $('.add_custom_cat_pro').serialize()+'&is_crv='+is_crv+'&is_tax='+is_tax+'&is_ebt='+is_ebt,
        // async: false,
        dataType: 'json',
        beforeSend: function(){
            $("#overlay,.loader").show();
        },
        success: function(data) {
            $("#overlay,.loader").hide();
            $('#add_custom_cate_pro_modal').modal('hide');
            swal({
                title: "Success!",
                text: "Custom category product added successfully!",
                icon: "success",
                buttons: false,
                timer: 2000,
            });
            window.location = base_url + "cashier/settings?d=category";
        }

    });
    return false;
});

$('.inputFile28').bind('change', function() {
    if($('#product_name_txt').val() == ''){
        $('#product_name_err').html('Please enter product name').show();
        return false;
    }else{
        $('#product_name_err').html('').show();
    }
    if($('#product_price').val() == ''){
        $('#product_prc_err').html('Please enter price').show();
        return false;
    }else{
        $('#product_prc_err').html('').show();
    }

    if(is_crv == 1){
      if($('#percent').val() == 0){
          $('#percent_err').html('Please select percent').show();
          return false;
      }else{
          $('#percent_err').html('').show();
      }
    }else{
        $('#percent_err').html('').show();
    }
});

$('#BACK44').on('click', function() {
    $('#div_miscellaneous_product').hide();
    $('#div_pos').show();
});

$('#BACK45').on('click', function() {
    $('#div_custom_cat_product').hide();
    $('#div_pos').show();
});


$(document).on('click', '.EDIT_CUST_PRO', function() {
    $('#update_custom_cate_pro_modal').modal();
    var id = $(this).data('id');
    var cat_id = $(this).data('cat');
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_custom_cat_product_data",
        data: { id : id, cat_id:cat_id},
        dataType: 'json',
        beforeSend: function(){
            $("#overlay,.loader").show();
        },
        success: function(data){
            console.log(data);
            $("#overlay,.loader").hide();
            $('#custom_cat_id').val(data.cat_id);
            $('#edit_custom_cat_name').val(data.name);
            $('#edit_product_name_txt').val(data.proname);
            $('#cust_pro_id').val(data.id);
            $('#edit_product_price').val(data.value);

            if(data.is_crv== '1'){
                $('#edit_is_crv').attr('checked', true);
                $('.percentDiv1').show();
                $("#edit_percent").val(data.percent).change();
            }else if(data.is_crv== '0'){
                $('#edit_is_crv').attr('checked', false);
                $('.percentDiv1').hide();
            }

            if(data.is_taxable== '1'){
                $('#edit_is_tax').attr('checked', true);
            }else if(data.is_taxable== '0'){
                $('#edit_is_tax').attr('checked', false);
            }

            if(data.is_ebt== '1'){
                $('#edit_is_ebt').attr('checked', true);
            }else if(data.is_taxable== '0'){
                $('#edit_is_ebt').attr('checked', false);
            }
        },
    });
    return false;
});

$("#btnUpdateCatCustomPro").on("click", function () {
    var is_crv = $("#edit_is_crv").val();
    var is_tax = $("#edit_is_tax").val();
    var is_ebt = $("#edit_is_ebt").val();

    if($('#edit_product_name_txt').val() == ''){
        $('#edit_product_name_err').html('Please enter product name').show();
        return false;
    }
    if($('#edit_product_price').val() == ''){
        $('#edit_product_prc_err').html('Please enter price').show();
        return false;
    }
    //
    if(is_crv == 1){
      if($('#edit_percent').val() == 0){
          $('#edit_percent_err').html('Please select percent').show();
          return false;
      }
    }
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/update_custom_cat_product",
        data: $('.update_custom_cat_pro').serialize()+'&is_crv='+is_crv+'&is_tax='+is_tax+'&is_ebt='+is_ebt,
        // async: false,
        dataType: 'json',
        beforeSend: function(){
            $("#overlay,.loader").show();
        },
        success: function(data) {
            $("#overlay,.loader").hide();
            $('#update_custom_cate_pro_modal').modal('hide');
            swal({
                title: "Success!",
                text: "Custom category product update successfully!",
                icon: "success",
                buttons: false,
                timer: 2000,
            });
            window.location = base_url + "cashier/settings?d=category";
        }

    });
    return false;
});

$('.inputFile29').bind('change', function() {
  var is_crv = $("#edit_is_crv").val();
  if($('#edit_product_name_txt').val() == ''){
      $('#edit_product_name_err').html('Please enter product name').show();
      return false;
  }else{
     $('#edit_product_name_err').html('').show();
  }
  if($('#edit_product_price').val() == ''){
      $('#edit_product_prc_err').html('Please enter price').show();
      return false;
  }else{
     $('#edit_product_prc_err').html('').show();
  }
  //
  if(is_crv == 1){
    if($('#edit_percent').val() == 0){
        $('#edit_percent_err').html('Please select percent').show();
        return false;
    }else{
       $('#edit_percent_err').html('').show();
    }
  }else{
     $('#edit_percent_err').html('').show();
  }
});

$('#cat_table').on('click', '.editRecord', function() {
    $('#update_data').val(1);
    $('.CATDIV').show();
    $('.PRODIV').hide();
    $('.CATPOS').hide();
    $('.editCAT').show();
    $('#BACK4').show();
    var id = $(this).data('id');

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/get_custom_cat_data",
        data: { id : id},
        dataType: 'json',
        beforeSend: function(){
            $("#overlay,.loader").show();
        },
        success: function(data){
            console.log(data);
            $("#overlay,.loader").hide();
            $('#catID').val(data.cat_id);
            $('#ecategory').val(data.category_id);
            if(data.category_id == 0){
                $('#ecustm').val(data.catname);
            }else{
                $('#ecategory').val(data.category_id);
                $('#select2-ecategory-container').text(data.catname);
            }

        },
    });
});

$('#btnCategoryUpdate').on('click', function(e) {
    e.preventDefault();
    if($('#ecategory').val() == '--Select Category--'){
      if($('#ecustm').val() == ''){
        $('#ectr_err').html('Please enter Custom Category Name').show();
        return false;
      }
    }else{
      $('#ectr_err').html('').show();
    }

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + "cashier/Cashier/update_custom_category",
        data: $('.editCAT').serialize(),
        dataType: 'json',
        beforeSend: function(){
            $("#overlay,.loader").show();
        },
        success: function(data){
          $("#overlay,.loader").hide();
            swal({
                title: "Success!",
                text: "Custom category updated successfully!",
                icon: "success",
                buttons: false,
            });
            setTimeout( function (){
              window.location = base_url + "cashier/settings?d=category";
            },3000);
        },
    });
    return false;
});

$('.inptdata').bind('change', function() {
    if($('#ecategory').val() == '--Select Category--'){
      if($('#ecustm').val() == ''){
        $('#ectr_err').html('Please enter Custom Category Name').show();
        return false;
      }else {
        $('#ectr_err').html('').show();
      }
    }
});

$("#cat_table").on("click", ".deleteRecord", function () {
  $(this).closest("tr").addClass("removeRow");
  var id = $(this).data("id");
  swal({
    text: "Are you sure you want to delete this custom category ?",
    buttons: ["Cancel", true],
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: base_url + "cashier/Cashier/delete_custom_category",
        method: "POST",
        data: { id: id },
        beforeSend: function () {
          $("#overlay,.loader").show();
        },
        success: function () {
          $("#overlay,.loader").hide();
          $(".removeRow").fadeOut(1500);
        },
      });
    }
  });
});

$("#addCATS").click(function () {
  $(".addCAT").show();
  $(".CATPOS").hide();
  $("#BACK3").show();
});

$("#BACK3").click(function () {
  $(".addCAT").hide();
  $(".CATPOS").show();
  $("#BACK3").hide();
});

$("#BACK4").click(function () {
  $(".addCAT").hide();
  $(".CATPOS").show();
  $("#BACK4").hide();
  $(".editCAT").hide();
});

$(document).on("click", ".EDIT_POINT", function () {
  $(".POINTS1").hide();
  $(".update_point,#BACK66").show();
  var point_id = $(this).attr("data-id");
  var point_type = $(this).attr("data-point_type");
  var point_value = $(this).attr("data-point_value");
  var point_amount = $(this).attr("data-point_amount");
  if (point_type == 1) {
    $("#point_type").val("New Customer");
  } else if (point_type == 2) {
    $("#point_type").val("By Value");
  }
  $("#point_id").val(point_id);
  $("#point").val(point_value);
  $("#point_amount").val(point_amount);
  $("#point_type_ini").val(point_type);
});

$(document).ready(function () {
  var cat_state = false;
  $("#custm").on("blur", function () {
    var cat_name = $("#custm").val();

    $.ajax({
      url: base_url + "cashier/Cashier/check_custom_category",
      type: "post",
      data: { cat_name: cat_name },
      success: function (response) {
        if (response == "fail") {
          cat_state = false;
          $("#ctm_err").html("This Custom Category is already exist").show();
          return false;
        } else if (response == "success") {
          cat_state = true;
          $("#ctm_err").html("").show();
        }
      },
    });
  });

  var maxField = 15; //Input fields increment limitation
  var addButton = $(".add_button"); //Add button selector
  var wrapper = $(".item-apend"); //Input field wrapper

  var x = 1; //Initial field counter is 1
  //Once add button is clicked
  $(addButton).click(function () {
    var randoMID = Math.floor(1000 + Math.random() * 9000);
    //Check maximum number of input fields
    if (x < maxField) {
      x++; //Increment field counter

      var fieldHTML =
        '<input type="hidden" name="combo_row[]" value="' +
        randoMID +
        '" ><div class="row"> <div class="col-md-4"> <div class="form-group"> <label class="customcardlabel" for="">Product Name</label> <input type="text" name="name_' +
        randoMID +
        '" class="form-control customcardinput inpt product_name" data-id="' +
        randoMID +
        '" id="" aria-describedby="" placeholder="Enter Product Name" maxlength="20" onchange="productDuplicate()"><span class="errors" id="btn_err_' +
        randoMID +
        '" style="color:red; font-size:14px"></span><span class="errors" id="dupli_err_' +
        randoMID +
        '" style="color:red; font-size:14px"></span> </div></div><div class="col-md-3"> <div class="form-group"> <label class="customcardlabel" for="">Price</label> <div class="position-relative"><span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span><input type="number" name="price_' +
        randoMID +
        '" class="form-control customcardinput inpt price_val_' +
        randoMID +
        '" id="" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();"  aria-describedby="" placeholder="Enter Price"></div><span class="errors" id="prc_err_' +
        randoMID +
        '" style="color:red; font-size:14px"></span> </div></div> <div class="col-md-1"> <label class="customcardlabel" for="">Container Deposit</label><div class="form-group mt-4">  <input type="checkbox" id="CRV_" name="CRV_' +
        randoMID +
        '" value="1" class="ml-3"  data-cent="' +
        randoMID +
        '"> </div></div><div class="col-md-2 cent_' +
        randoMID +
        '" style="display:none;"> <label class="customcardlabel" for="">Percent</label><select name="percent_' +
        randoMID +
        '" class="form-control customcardinput"><option value="5">5 cent</option><option value="10">10 cent</option></select></div><div class="col-md-1"> <label class="customcardlabel" for="">Taxable</label><div class="form-group mt-4">  <input type="checkbox" id="TAX_" name="Tax_' +
        randoMID +
        '" value="1" class="ml-3" style="margin-top: 1em!important;"> </div></div><div class="col-md-1"> <button type="button" class="btn btn-light apend_button removeNominee">-</button> </div></div>'; //New input field html

      $(wrapper).append(fieldHTML); //Add field html
    }
  });

  //Once remove button is clicked
  $(wrapper).on("click", ".removeNominee", function (e) {
    e.preventDefault();
    $(this).parent().parent().remove(); //Remove field html
    x--; //Decrement field counter
  });

  $(document).on("click", "input[type='checkbox']", function () {
    var id = $(this).attr("data-cent");
    if ($(this).prop("checked") == true) {
      $(".cent_" + id).show();
    } else if ($(this).prop("checked") == false) {
      $(".cent_" + id).hide();
    }
  });

  $(document).on("click", "input[type='checkbox']", function () {
    var id = $(this).attr("data-ecent");
    if ($(this).prop("checked") == true) {
      $(".ecent_" + id).show();
    } else if ($(this).prop("checked") == false) {
      $(".ecent_" + id).hide();
    }
  });


$('#btnCategory').on('click', function(e){
  e.preventDefault();
    if($('#category').val() != '--Select Category--'){
       cat_state = true;
    }
    if($('#category').val() == '--Select Category--'){
      if($('#custm').val() == ''){
        $('#ctm_err').html('Please enter Custom Category Name').show();
        return false;
      }
    }else{
        $('#ctm_err').html('').show();
    }
    if(cat_state == false){
      $("#ctm_err").html("This Custom Category is already exist").show();
      return false;
    }

    if(cat_state == true){
      $.ajax({
          type: 'ajax',
          method: 'post',
          url: base_url + "cashier/Cashier/add_category_btn",
          data: $('.addCAT').serialize(),
          dataType: 'json',
          beforeSend: function(){
              $("#overlay,.loader").show();
          },
          success: function(data){
            $("#overlay,.loader").hide();
            if(data == 'success'){
                swal({
                    title: "Success!",
                    text: "Custom category created successfully!",
                    icon: "success",
                    buttons: false,
                    timer: 3000,
                });
            }
            setTimeout( function (){
                window.location = base_url + "cashier/settings?d=category";
            },2500);

          },
      });
      return false;
    }
});
  // end
$('.inpt').bind('change', function() {
    if($('#category').val() == '--Select Category--'){
      if($('#custm').val() == ''){
        $('#ctm_err').html('Please enter Custom Category Name').show();
        return false;
      }else {
        $('#ctm_err').html('').show();
      }
    }else{
        $('#ctm_err').html('').show();
    }
});

});

$("#addEMP").click(function () {
  $(".EMPLOYEE,.Archive").hide();
  $("#BACK,.add_user").show();
});

$("#BACK").click(function () {
  $(".EMPLOYEE").show();
  $(".Archive,.add_user").hide();
  $(".add_user")[0].reset();
  $(".errors").html("").show();
});

$("#BACK2").click(function () {
  $(".EMPLOYEE").show();
  $(".add_user,.update_user,.Archive").hide();
});

$("#Archive").click(function () {
  $(".add_user,.update_user,.EMPLOYEE,#BACK1").hide();
  $("#BACK2,.Archive").show();
});

$("#Archive1").click(function () {
  $("#div_scratcher_settings").hide();
  $("#BACK22,.Archive1").show();
});

$("#BACK22").click(function () {
  $("#div_scratcher_settings").show();
  $("#BACK22,.Archive1").hide();
});

$(".EDIT_EMP").click(function () {
  $(".Archive").hide();
  $(".update_user").show();
  $(".add_user").hide();
  $("#BACK1").show();
  $(".EMPLOYEE").hide();
  var user_id = $(this).data("id");
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/get_user_by_id",
    data: { user_id: user_id },
    async: false,
    dataType: "json",
    success: function (data) {
      $("#user_id").val(data.user_id);
      $("#efname").val(data.first_name);
      $("#elname").val(data.last_name);
      $("#enname").val(data.nick_name);
      $("#eemail").val(data.email);
      $("#oemail").val(data.email);
      $("#emobile").val(data.phone_no);
      $("#ew4addf").val(data.current_address);
      $("#eaddress_more").val(data.address_more);
      $("#euser_name").val(data.username);
      $("#erole").val(data.role);
      $("#edob").val(data.date_of_birth);
      if (data.gender == "0") {
        $("#egender").val(0);
      } else {
        $("#egender").val(data.gender);
      }
      if (data.marital_status == "0") {
        $("#emarital").val(0);
      } else {
        $("#emarital").val(data.marital_status);
      }
      $("#egurdian_name").val(data.gurdian_name);
      $("#egurdian_phone").val(data.gurdian_phone);
      $("#eper_address").val(data.relationship);
      $(".w4Form1").val(data.username);
      $(".i9Form1").val(data.username);
    },
  });
});

$("#BACK1").click(function () {
  $(".EMPLOYEE").show();
  $(".add_user").hide();
  $(".update_user").hide();
  window.location = base_url + "cashier/settings?d=employee";
});

$("#btnSave").click(function () {
  var email = $("#eemail").val();
  if ($("#efname").val() == "") {
    $("#efname_err").html("Please enter your First Name").show();
    return false;
  }
  if ($("#elname").val() == "") {
    $("#elname_err").html("Please enter your Last Name").show();
    return false;
  }
  if ($("#emobile").val().length != 14) {
    $("#emob_err").html("Please enter correct Phone No.").show();
    return false;
  }
  if (email == "") {
    $("#eemail_err").html("Please enter your email").show();
    return false;
  }
  if (ValidateEmail1(email) == false) {
    $("#eemail_err").html("Please enter valid email").show();
    return false;
  }
  if ($("#ew4addf").val() == "") {
    $("#ew4addf_err").html("Please enter your Address").show();
    return false;
  }
  if ($("#eaddress_more").val() == "") {
    $("#eaddress_more_err")
      .html("Please enter City or town, state, and ZIP code")
      .show();
    return false;
  }
  if ($("#epassword").val() != "") {
    if ($("#epassword").val().length != 4) {
      $("#epass_err").html("Password should not be less than 4 digits").show();
      return false;
    }
    if ($("#ecnf_password").val() == "") {
      $("#ecpass_err").html("Please enter your Confirm New Password").show();
      return false;
    }
    if ($("#epassword").val() != $("#ecnf_password").val()) {
      $("#ecpass_err").html("Password mismatch").show();
      return false;
    }
  }

  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_user",
    data: $(".update_user").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#btnSave").attr("disabled", true);
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      if (data == "success") {
        swal({
          title: "Success!",
          text: "Employee updated successfully!",
          icon: "success",
          buttons: false,
        });
        setTimeout(function () {
          window.location = base_url + "cashier/settings?d=employee";
        }, 3000);
      } else {
        if (data.email_err != "") {
          $("#eemail_err").html(data.email_err).show();
          $("#btnSave").attr("disabled", false);
          return false;
        }
      }
    },
  });
  return false;
});

$(".inputdat").bind("change", function () {
  var email = $("#eemail").val();
  if ($("#efname").val() == "") {
    $("#efname_err").html("Please enter your First Name").show();
    return false;
  } else {
    $("#efname_err").html("").show();
  }
  if ($("#elname").val() == "") {
    $("#elname_err").html("Please enter your Last Name").show();
    return false;
  } else {
    $("#elname_err").html("").show();
  }
  if ($("#emobile").val().length != 14) {
    $("#emob_err").html("Please enter correct Phone No.").show();
    return false;
  } else {
    $("#emob_err").html("").show();
  }
  if (email == "") {
    $("#eemail_err").html("Please enter your email").show();
    return false;
  } else {
    $("#eemail_err").html("").show();
  }
  if (ValidateEmail1(email) == false) {
    $("#eemail_err").html("Please enter valid email").show();
    return false;
  } else {
    $("#eemail_err").html("").show();
  }
  if ($("#ew4addf").val() == "") {
    $("#ew4addf_err").html("Please enter your Address").show();
    return false;
  } else {
    $("#ew4addf_err").html("").show();
  }
  if ($("#eaddress_more").val() == "") {
    $("#eaddress_more_err")
      .html("Please enter City or town, state, and ZIP code")
      .show();
    return false;
  } else {
    $("#eaddress_more_err").html("").show();
  }
  if ($("#epassword").val() != "") {
    if ($("#epassword").val().length != 4) {
      $("#epass_err").html("Password should not be less than 4 digits").show();
      return false;
    } else {
      $("#epass_err").html("").show();
    }
    if ($("#ecnf_password").val() == "") {
      $("#ecpass_err").html("Please enter your Confirm New Password").show();
      return false;
    } else {
      $("#ecpass_err").html("").show();
    }
    if ($("#epassword").val() != $("#ecnf_password").val()) {
      $("#ecpass_err").html("Password mismatch").show();
      return false;
    } else {
      $("#ecpass_err").html("").show();
    }
  }
});

$("#efname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#efname_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#efname_err").html("").show();
  }
});

$("#elname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#elname_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#elname_err").html("").show();
  }
});

$("#enname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#elname_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#elname_err").html("").show();
  }
});

$("#eper_address").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#epadrs_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#epadrs_err").html("").show();
  }
});

$("#egurdian_name").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#egurn_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#egurn_err").html("").show();
  }
});

$("#epassword").on("input", function () {
  if (!/^[0-9]+$/.test($("#epassword").val())) {
    $("#epass_err").html("Please enter only numeric digits").show();
    return false;
  } else {
    $("#epass_err").html("").show();
  }
});

$("#ecnf_password").on("input", function () {
  if (!/^[0-9]+$/.test($("#ecnf_password").val())) {
    $("#ecpass_err").html("Please enter only numeric digits").show();
    return false;
  } else {
    $("#ecpass_err").html("").show();
  }
});

$("#emobile").on("input", function () {
  if (!/^[0-9]+$/.test($("#emobile").val())) {
    $("#emob_err").html("Please enter your valid Phone No").show();
    return false;
  } else {
    $("#emob_err").html("").show();
  }
});

$("#egurdian_phone").on("input", function () {
  if (!/^[0-9]+$/.test($("#egurdian_phone").val())) {
    $("#egurph_err").html("Please enter your valid Phone No").show();
    return false;
  } else {
    $("#egurph_err").html("").show();
  }
});

$("#user_table").on("click", ".deleteRecord", function () {
  $(this).closest("tr").addClass("removeRow");
  var user_id = $(this).data("id");
  swal({
    text: "Are you sure you want to delete this employee ?",
    buttons: ["Cancel", true],
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: base_url + "cashier/delete_user",
        method: "POST",
        data: { user_id: user_id },
        beforeSend: function () {
          $("#overlay,.loader").show();
        },
        success: function () {
          $("#overlay,.loader").hide();
          $(".removeRow").fadeOut(1500);
          window.location = base_url + "cashier/settings?d=employee";
        },
      });
    }
  });
});

$('#user_table').DataTable({
    "processing": true,
    // // "pageLength": 10,
    // // "lengthMenu": [[10,50, 200, 500], [10,50, 200, 500]],
    "deferRender": true,
    "columnDefs": [
              { "orderable": false, "targets": [-1,-2,-3] },
            ],
    "initComplete": function(settings, json) {
      $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
      Keyboard.init('full');
    }
});

$('#inactive_table').DataTable({
    "processing": true,
    // // "pageLength": 10,
    // // "lengthMenu": [[10,50, 200, 500], [10,50, 200, 500]],
    "deferRender": true,
    "columnDefs": [
              { "orderable": false, "targets": [-1,-2,-3] },
            ],
    "initComplete": function(settings, json) {
      $('.dataTables_filter input').addClass('use-keyboard-input filterSearch');
      Keyboard.init('full');
    }
});


//inactive
$("#inactive_table").on("click", ".changeStatus", function () {
  $(this).closest("tr").addClass("removeRows");
  var user_id = $(this).data("id");
  swal({
    text: "Are you sure you want to make this employee active ?",
    buttons: ["Cancel", true],
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: base_url + "cashier/Cashier/activate_employee",
        method: "POST",
        data: { user_id: user_id },
        beforeSend: function () {
          $("#overlay,.loader").show();
        },
        success: function () {
          $("#overlay,.loader").hide();
          $(".removeRows").fadeOut(1500);
          window.location = base_url + "cashier/settings?d=employee";
        },
      });
    }
  });
});

$(".inputDate").flatpickr({
  enableTime: false,
  dateFormat: "m-d-Y",
  minDate: "1.1.1950", //dateformat using m.d.y
  maxDate: "1.1.Y",
  locale: {
    firstDayOfWeek: 1, // set start day of week to Monday
  },
});

$(document).ready(function () {
  var email_state = false;
  var username_state = false;
  $("#email").on("blur", function () {
    var email = $("#email").val();
    $.ajax({
      url: base_url + "cashier/Cashier/check_email",
      type: "post",
      data: { email: email },
      success: function (response) {
        if (response == "fail") {
          email_state = false;
          $("#email_err").html("This Email is already exist").show();
        } else if (response == "success") {
          email_state = true;
          $("#email_err").html("").show();
        }
      },
    });
  });

  $("#user_name").on("blur", function () {
    var username = $("#user_name").val();
    $.ajax({
      url: base_url + "cashier/Cashier/check_username",
      type: "post",
      data: { username: username },
      success: function (response) {
        if (response == "fail") {
          username_state = false;
          $("#uname_err").html("This employee id is already exist").show();
        } else if (response == "success") {
          username_state = true;
          $("#uname_err").html("").show();
        }
      },
    });
  });

  $("#btnUser").on("click", function () {
    var email_id = $("#email").val();
    if ($("#fname").val() == "") {
      $("#fname_err").html("Please enter your First Name").show();
      return false;
    }
    if ($("#lname").val() == "") {
      $("#lname_err").html("Please enter your Last Name").show();
      return false;
    }
    if ($("#mobile").val().length != 14) {
      $("#mob_err").html("Please enter correct Phone No.").show();
      return false;
    }
    if (email_id == " ") {
      $("#email_err").html("Please enter your Email").show();
      return false;
    }
    if (ValidateEmail(email_id) == false) {
      $("#email_err").html("Please enter valid Email").show();
      return false;
    }
    if (email_state == false) {
      $("#email_err").html("This Email is already exist").show();
      return false;
    }
    if ($("#w4addf").val() == "") {
      $("#w4addf_err").html("Please enter your Address").show();
      return false;
    }
    if ($("#address_more").val() == "") {
      $("#address_more_err")
        .html("Please enter City or town, state, and ZIP code")
        .show();
      return false;
    }
    if ($("#user_name").val() == " ") {
      $("#uname_err").html("Please enter Username").show();
      return false;
    }
    if (username_state == false) {
      $("#uname_err").html("This employee id is already exist").show();
      return false;
    }
    if ($("#role").val() == "-- Select --") {
      $("#role_err").html("Please select your Role").show();
      return false;
    }
    if ($("#password").val() == "") {
      $("#pass_err").html("Please enter your Password").show();
      return false;
    }
    if ($("#password").val().length != 4) {
      $("#pass_err").html("Password should not be less than 4 digits").show();
      return false;
    }
    if ($("#cnf_password").val() == "") {
      $("#cpass_err").html("Please enter your Confirm Password").show();
      return false;
    }
    if ($("#password").val() != $("#cnf_password").val()) {
      $("#cpass_err").html("Password mismatch").show();
      return false;
    } else {
      $("#cpass_err").html("").show();
    }
    if ($("#gender").val() == "0") {
      $("#gen_err").html("Please select Gender").show();
      return false;
    } else {
      $("#gen_err").html("").show();
    }
    if (email_state == true && username_state == true) {
      $.ajax({
        type: "ajax",
        method: "post",
        url: base_url + "cashier/insert_user",
        data: $(".add_user").serialize(),
        dataType: "json",
        beforeSend: function () {
          $("#overlay,.loader").show();
        },
        success: function (data) {
          $("#overlay,.loader").hide();
          if (data == "success") {
            swal({
              title: "Success!",
              text: "Employee added successfully!",
              icon: "success",
              buttons: false,
            });
          }
          setTimeout(function () {
            window.location = base_url + "cashier/settings?d=employee";
          }, 2500);
        },
      });
      return false;
    }
  });
});

$("#fname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#fname_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#fname_err").html("").show();
  }
});

$("#lname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#lname_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#lname_err").html("").show();
  }
});

$("#nname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#nick_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#nick_err").html("").show();
  }
});

$("#user_name").on("input", function () {
  if (!/^[0-9]+$/.test($("#user_name").val())) {
    $("#uname_err").html("Please enter only numeric digits").show();
    return false;
  } else {
    $("#uname_err").html("").show();
  }
});

$("#password").on("input", function () {
  if (!/^[0-9]+$/.test($("#password").val())) {
    $("#pass_err").html("Please enter only numeric digits").show();
    return false;
  } else {
    $("#pass_err").html("").show();
  }
});

$("#cnf_password").on("input", function () {
  if (!/^[0-9]+$/.test($("#cnf_password").val())) {
    $("#cpass_err").html("Please enter only numeric digits").show();
    return false;
  } else {
    $("#cpass_err").html("").show();
  }
});

$("#gurdian_name").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#gurn_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#gurn_err").html("").show();
  }
});

$("#mobile").on("input", function () {
  if (!/^[0-9]+$/.test($("#mobile").val())) {
    $("#mob_err").html("Please enter your valid Phone No").show();
    return false;
  } else {
    $("#mob_err").html("").show();
  }
});

$("#gurdian_phone").on("input", function () {
  if (!/^[0-9]+$/.test($("#gurdian_phone").val())) {
    $("#gurph_err").html("Please enter your valid Phone No").show();
    return false;
  } else {
    $("#gurph_err").html("").show();
  }
});

$("#per_address").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    $("#padrs_err").html("Only alphabets allowed").show();
    return false;
  } else {
    $("#padrs_err").html("").show();
  }
});

$("#password").keyup(function () {
  $(this).val($(this).val().replace(/ +?/g, ""));
});
$("#cnf_password").keyup(function () {
  $(this).val($(this).val().replace(/ +?/g, ""));
});

$(".customcardinput").bind("change", function () {
  var email_id = $("#email").val();
  if ($("#fname").val() == "") {
    $("#fname_err").html("Please enter your First Name").show();
    return false;
  } else {
    $("#fname_err").html("").show();
  }
  if ($("#lname").val() == "") {
    $("#lname_err").html("Please enter your Last Name").show();
    return false;
  } else {
    $("#lname_err").html("").show();
  }
  if ($("#mobile").val() == "") {
    $("#mob_err").html("Please enter your Phone No.").show();
    return false;
  } else {
    $("#mob_err").html("").show();
  }
  if (email_id == "") {
    $("#email_err").html("Please enter your Email").show();
    return false;
  } else {
    $("#email_err").html("").show();
  }
  if (ValidateEmail(email_id) == false) {
    $("#email_err").html("Please enter valid Email").show();
    return false;
  } else {
    $("#email_err").html("").show();
  }
  if ($("#w4addf").val() == "") {
    $("#w4addf_err").html("Please enter your Address").show();
    return false;
  } else {
    $("#w4addf_err").html("").show();
  }
  if ($("#address_more").val() == "") {
    $("#address_more_err")
      .html("Please enter City or town, state, and ZIP code")
      .show();
    return false;
  } else {
    $("#address_more_err").html("").show();
  }
  if ($("#user_name").val() == "") {
    $("#uname_err").html("Please enter your Username").show();
    return false;
  } else {
    $("#uname_err").html("").show();
  }
  if ($("#role").val() == "-- Select --") {
    $("#role_err").html("Please select your Role").show();
    return false;
  } else {
    $("#role_err").html("").show();
  }
  if ($("#password").val() == "") {
    $("#pass_err").html("Please enter your Password").show();
    return false;
  } else {
    $("#pass_err").html("").show();
  }
  if ($("#password").val().length != 4) {
    $("#pass_err").html("Password should not be less than 4 digits").show();
    return false;
  } else {
    $("#pass_err").html("").show();
  }
  if ($("#cnf_password").val() == "") {
    $("#cpass_err").html("Please enter your Confirm Password").show();
    return false;
  } else {
    $("#cpass_err").html("").show();
  }
  if ($("#password").val() != $("#cnf_password").val()) {
    $("#cpass_err").html("Password mismatch").show();
    return false;
  } else {
    $("#cpass_err").html("").show();
  }
  if ($("#gender").val() == "0") {
    $("#gen_err").html("Please select Gender").show();
    return false;
  } else {
    $("#gen_err").html("").show();
  }
});

function ValidateEmail(email_id) {
  var expr =
    /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  if (!expr.test(email_id)) {
    $("#email_err").html("Please enter valid email").show();
    return false;
  } else {
    $("#email_err").html("").show();
  }
}

function ValidateEmail1(email) {
  var expr =
    /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  if (!expr.test(email)) {
    $("#eemail_err").html("Please enter valid email").show();
    return false;
  } else {
    $("#eemail_err").html("").show();
  }
}

function ValidateEmails(email_id) {
  var expr =
    /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  if (!expr.test(email_id)) {
    $("#em_err").html("Please enter valid Email").show();
    return false;
  } else {
    $("#em_err").html("").show();
  }
}

$(".phoneInput").on("keyup paste", function (event) {
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

$("#btnTax").on("click", function () {
  if ($("#tax_other").val() == "") {
    $("#tax_err").html("Please enter tax").show();
    return false;
  }
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/updateTax",
    data: $(".add_tax").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      $("#tax_other").val(data.tax);
      if (data.status == "success") {
        swal({
          title: "Success!",
          text: "Tax is successfully updated!",
          icon: "success",
          buttons: false,
          timer: 1600,
        });
      }
      if (data == "fail") {
        swal({
          title: "Oops!",
          text: "Something went wrong. Please try again!",
          icon: "error",
          buttons: false,
          timer: 1600,
        });
      }
    },
  });
  return false;
});

$(".inputfiles").bind("change", function () {
  if ($("#tax_other").val() == "") {
    $("#tax_err").html("Please enter tax").show();
    return false;
  } else {
    $("#tax_err").html("").show();
  }
});

$("#btnNode").on("click", function () {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/update_node_setting",
    data: { node_status: $("#node_status").val() },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Node setting successfully updated!",
        icon: "success",
        buttons: false,
        timer: 1600,
      });
    },
  });
  return false;
});

$("#btnCard").on("click", function () {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/update_card_fees",
    data: { credit_card_fees: $("#ccard_fees").val(),credit_card_fees_type: $("input[name='credit_card_fees_type']:checked").val() },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Credit card fees successfully updated!",
        icon: "success",
        buttons: false,
        timer: 1600,
      });
    },
  });
  return false;
});

function isNumberKey(txt, evt) {
  var charCode = evt.which ? evt.which : evt.keyCode;
  if (charCode == 46) {
    //Check if the text already contains the . character
    if (txt.value.indexOf(".") === -1) {
      return true;
    } else {
      return false;
    }
  } else {
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
  }
  return true;
}

$("#btnGeneral").click(function () {
  var email_id = $("#gen_email").val();
  if ($("#gen_name").val() == "") {
    $("#nm_err").html("Please enter Store Name").show();
    return false;
  }
  if ($("#gen_mobile").val() == "") {
    $("#mb_err").html("Please enter Store Phone No").show();
    return false;
  }
  if ($("#gen_address").val() == "") {
    $("#adr_err").html("Please enter Store Address").show();
    return false;
  }
  if (email_id == "") {
    $("#em_err").html("Please enter Store Email").show();
    return false;
  }
  if (ValidateEmails(email_id) == false) {
    $("#em_err").html("Please enter valid Email").show();
    return false;
  }
  // if ($("#gen_url").val() == "") {
  //   $("#ur_err").html("Please enter Store Website URL").show();
  //   return false;
  // }
  if ($("#gen_app").val() == "") {
    $("#app_err").html("Please enter Store App URL").show();
    return false;
  }
  if ($("#gen_insta").val() == "") {
    $("#insta_err").html("Please enter Store Instagram URL").show();
    return false;
  }
  if ($("#gen_twt").val() == "") {
    $("#twt_err").html("Please enter Store Twitter URL").show();
    return false;
  }
  if ($("#gen_fb").val() == "") {
    $("#fb_err").html("Please enter Store Facebook URL").show();
    return false;
  }
  if ($("#gen_lang").val() == "") {
    $("#lang_err").html("Please enter Language").show();
    return false;
  }
  if ($("#secret_key").val() == "") {
    $("#scr_err").html("Please enter Secret Key").show();
    return false;
  }

  var formdata = $(".gen_setting")[0];
  $.ajax({
    url: base_url + "cashier/update_setting",
    type: "post",
    data: new FormData(formdata),
    processData: false,
    contentType: false,
    cache: false,
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      $(".gen_setting")[0].reset();
      if (data) {
        swal({
          title: "Success!",
          text: "General setting is successfully updated!",
          icon: "success",
          buttons: false,
        });
      }
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=general";
      }, 2500);
    },
  });
  return false;
});

$(".inputFile").bind("change", function () {
  var email_id = $("#gen_email").val();
  if ($("#gen_name").val() == "") {
    $("#nm_err").html("Please enter Store Name").show();
    return false;
  } else {
    $("#nm_err").html("").show();
  }
  if ($("#gen_mobile").val() == "") {
    $("#mb_err").html("Please enter Store Phone No").show();
    return false;
  } else {
    $("#mb_err").html("").show();
  }
  if ($("#gen_address").val() == "") {
    $("#adr_err").html("Please enter Store Address").show();
    return false;
  } else {
    $("#adr_err").html("").show();
  }
  if (email_id == "") {
    $("#em_err").html("Please enter Store Email").show();
    return false;
  } else {
    $("#em_err").html("").show();
  }
  if (ValidateEmails(email_id) == false) {
    $("#em_err").html("Please enter valid Email").show();
    return false;
  } else {
    $("#em_err").html("").show();
  }
  // if ($("#gen_url").val() == "") {
  //   $("#ur_err").html("Please enter Store Website URL").show();
  //   return false;
  // } else {
  //   $("#ur_err").html("").show();
  // }
  if ($("#gen_app").val() == "") {
    $("#app_err").html("Please enter Store App URL").show();
    return false;
  } else {
    $("#app_err").html("").show();
  }
  if ($("#gen_insta").val() == "") {
    $("#insta_err").html("Please enter Store Instagram URL").show();
    return false;
  } else {
    $("#insta_err").html("").show();
  }
  if ($("#gen_twt").val() == "") {
    $("#twt_err").html("Please enter Store Twitter URL").show();
    return false;
  } else {
    $("#twt_err").html("").show();
  }
  if ($("#gen_fb").val() == "") {
    $("#fb_err").html("Please enter Store Facebook URL").show();
    return false;
  } else {
    $("#fb_err").html("").show();
  }
  if ($("#gen_lang").val() == "") {
    $("#lang_err").html("Please enter Language").show();
    return false;
  } else {
    $("#lang_err").html("").show();
  }
  if ($("#secret_key").val() == "") {
    $("#scr_err").html("Please enter Secret Key").show();
    return false;
  } else {
    $("#scr_err").html("").show();
  }
});

$("#btnPrice").click(function () {
  if ($("#customkey_name_txt").val() == "") {
    $("#kname_err").html("Please enter Custom Key Name").show();
    return false;
  }
  if ($("#customkey_value_txt").val() == "") {
    $("#kvalue_err").html("Please enter Custom Key Value").show();
    return false;
  }

  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/update_key_setting",
    data: $(".custom-key").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      $(".custom-key")[0].reset();
      $("#customeKEY").modal("hide");
      if (data.status == "update") {
        swal({
          title: "Success!",
          text: "Custom key updated successfully!",
          icon: "success",
          buttons: false,
          timer: 2500,
        });
        $("#custom_" + data.customkey_id).text(data.customkey_name);
        $("#custom_" + data.customkey_id).attr(
          "data-name",
          data.customkey_name
        );
        $("#custom_" + data.customkey_id).attr(
          "data-value",
          data.customkey_value
        );
        $("#custom_" + data.customkey_id).attr(
          "data-is_taxable",
          data.is_taxable
        );
      }
      if (data.status == "insert") {
        swal({
          title: "Success!",
          text: "Custom key inserted successfully!",
          icon: "success",
          buttons: false,
          timer: 2500,
        });
      }
      if (data.status == "exits") {
        swal({
          title: "Oops!",
          text: "Custom key name " + data.ckey + " already exist!",
          icon: "error",
          buttons: false,
          timer: 2500,
        });
      }
    },
  });
  return false;
});

$(".clear_key").click(function () {
  var customkey_id = $(this).attr("id").replace("clear_", "");
  swal({
    text: "Are you sure you want to delete this custom key?",
    buttons: ["Cancel", true],
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: base_url + "cashier/Cashier/remove_custom_key",
        method: "POST",
        data: { customkey_id: customkey_id },
        dataType: "json",
        success: function (data) {
          if (data.status == "delete") {
            $("#custom_" + data.customkey_id).text("Custom Key");
            $("#custom_" + data.customkey_id).attr(
              "data-name",
              data.customkey_name
            );
            $("#custom_" + data.customkey_id).attr(
              "data-value",
              data.customkey_value
            );
            $("#custom_" + data.customkey_id).attr(
              "data-is_taxable",
              data.is_taxable
            );
          }
        },
      });
    }
  });
});

$(".inputFile21").bind("change", function () {
  if ($("#customkey_name_txt").val() == "") {
    $("#kname_err").html("Please enter Custom Key Name").show();
    return false;
  } else {
    $("#kname_err").html("").show();
  }
  if ($("#customkey_value_txt").val() == "") {
    $("#kvalue_err").html("Please enter Custom Key Value").show();
    return false;
  } else {
    $("#kvalue_err").html("").show();
  }
});

$(".w4Form1").click(function () {
  $("#w4-form").modal("show");
  $("#viewSign").show();
  var username = $(this).val();

  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/getw4FormData",
    data: { username: username },
    dataType: "json",
    success: function (data) {
      $("#m-fname").val($("#efname").val());
      $("#m-lname").val($("#elname").val());
      $("#m-address").val($("#ew4addf").val());
      $("#m-zip").val($("#eaddress_more").val());
      $("#security_number").val(data.social_security_no);
      $("#oincome").val(data.other_income);
      $("#Deductions").val(data.deductions);
      $("#withholding").val(data.extra_withholding);
      $("#sign_date").val(data.signature_date);
      $("#name_with_address").val(data.name_with_address);
      $("#employment_date").val(data.employment_date);
      $("#EIN").val(data.EIN);

      $("#jobs_worksheet_1").val(data.multiple_jobs_worksheet_1);
      $("#jobs_worksheet_2a").val(data.multiple_jobs_worksheet_2a);
      $("#jobs_worksheet_2b").val(data.multiple_jobs_worksheet_2b);
      $("#jobs_worksheet_2c").val(data.multiple_jobs_worksheet_2c);
      $("#jobs_worksheet_3").val(data.multiple_jobs_worksheet_3);
      $("#jobs_worksheet_4").val(data.multiple_jobs_worksheet_4);
      $("#deduct_worksheet_1").val(data.deductions_worksheet_1);
      $("#deduct_worksheet_2").val(data.deductions_worksheet_2);
      $("#deduct_worksheet_3").val(data.deductions_worksheet_3);
      $("#deduct_worksheet_4").val(data.deductions_worksheet_4);
      $("#deduct_worksheet_5").val(data.deductions_worksheet_5);
      $("#total_amt").val(data.total_amount);
      $("#qufy_childern").val(data.step3a);
      $("#ot_dependents").val(data.step3b);
      if (data.filling_condition == 1) {
        $("#fill_1").attr("checked", "true");
      }
      if (data.filling_condition == 2) {
        $("#fill_2").attr("checked", "true");
      }
      if (data.filling_condition == 3) {
        $("#fill_3").attr("checked", "true");
      }
      if (data.multiple_jobs_or_spouse_works == 1) {
        $("#step2").attr("checked", "true");
      }
      $("#uploaded_image").attr("src", "." + data.employee_signature);
    },
  });
});

$(".updateW4").click(function () {
  $("#w4hiden_add").val(1);
  var fname = $("#m-fname").val();
  var lname = $("#m-lname").val();
  var add = $("#m-address").val();
  var address_more = $("#m-zip").val();
  $("#efname").val(fname);
  $("#elname").val(lname);
  $("#ew4addf").val(add);
  $("#eaddress_more").val(address_more);
  $("#w4Firstname").val($("#efname").val());
  $("#w4Lastname").val($("#elname").val());
  $("#ew4laddress").val($("#ew4addf").val());
  $("#ew4zip").val($("#eaddress_more").val());
  $("#ew4securityno").val($("#security_number").val());
  var filling = $("input:checkbox:checked").val();
  $("#ew4filling").val(filling);
  // ;w4other_income
  $("#ew4other_income").val($("#oincome").val());
  $("#ew4deductions").val($("#Deductions").val());
  $("#ew4extra_withholding").val($("#withholding").val());
  $("#ew4sign_date").val($("#sign_date").val());
  $("#ew4namadd").val($("#name_with_address").val());
  $("#ew4empDate").val($("#employment_date").val());
  $("#ew4EIN").val($("#EIN").val());
  $("#emultiple_jobs_worksheet_1").val($("#jobs_worksheet_1").val());
  $("#emultiple_jobs_worksheet_2a").val($("#jobs_worksheet_2a").val());
  $("#emultiple_jobs_worksheet_2b").val($("#jobs_worksheet_2b").val());
  $("#emultiple_jobs_worksheet_2c").val($("#jobs_worksheet_2c").val());
  $("#emultiple_jobs_worksheet_3").val($("#jobs_worksheet_3").val());
  $("#emultiple_jobs_worksheet_4").val($("#jobs_worksheet_4").val());
  $("#edeductions_worksheet_1").val($("#deduct_worksheet_1").val());
  $("#edeductions_worksheet_2").val($("#deduct_worksheet_2").val());
  $("#edeductions_worksheet_3").val($("#deduct_worksheet_3").val());
  $("#edeductions_worksheet_4").val($("#deduct_worksheet_4").val());
  $("#edeductions_worksheet_5").val($("#deduct_worksheet_5").val());
  $("#estep2_val").val($("#step2").val());
  var first_val = parseFloat($("#qufy_childern").val());
  var second_val = parseFloat($("#ot_dependents").val());
  var total = first_val + second_val;
  $("#total_amt").val(total.toFixed(2));
  $("#etotal_amount").val(total.toFixed(2));
  $("#estep3a").val(first_val.toFixed(2));
  $("#estep3b").val(second_val.toFixed(2));
});

$(".w4Form").click(function () {
  $("input").val('');
  $("#w4-form").modal("show");
  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var add = $("#w4addf").val();
  var address_more = $("#address_more").val();
  $("#m-fname").val(fname);
  $("#m-lname").val(lname);
  $("#m-address").val(add);
  $("#m-zip").val(address_more);



});

$(".i9Form").click(function () {
  $("#i9-form").modal("show");
  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var add = $("#w4addf").val();
  var address_more = $("#address_more").val();
  $("#i9fname").val(fname);
  $("#i9lname").val(lname);
  $("#i9address").val(add);
  $("#i9city").val(address_more);
});


$(".i9Form1").click(function () {
  $("#i9-form").modal("show");
  var username = $(this).val();
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/geti9FormData",
    data: { username: username },
    dataType: "json",
    success: function (data) {
      console.log(data);
      $("#i9fname").val(data.firstname);
      $("#i9lname").val(data.lastname);
      $("#i9address").val(data.address);
      $("#i9email").val(data.email);
      $("#i9phone").val(data.contact_no);
      $("#security_no").val(data.social_security_no);
      $("#i9dob").val(data.dob);
      $("#i9zipcode").val(data.zipcode);
      $("#i9state").val(data.state);
      $("#i9city").val(data.city);
      $("#i9apt_no").val(data.apartment_no);
      $("#i9oname").val(data.nickname);
      $("#i9mname").val(data.middle_initial);
      //checkbox
      if (data.imprisonment == 1) {
        $("#imprisonment_1").attr("checked", "true");
      }
      if (data.imprisonment == 2) {
        $("#imprisonment_2").attr("checked", "true");
      }
      if (data.imprisonment == 3) {
        $("#imprisonment_3").attr("checked", "true");
        $("#USCIS").val(data.USCIS_no);
      }
      if (data.imprisonment == 4) {
        $("#imprisonment_4").attr("checked", "true");
        $("#USCIS_no").val(data.USCIS_no);
        $("#imprisonment_date").val(data.expiration_date);
        $("#i9admission").val(data.i_94_admission_no);
        $("#passport_no").val(data.foreign_passport_no);
        $("#country_nm").val(data.country_of_issuance);
      }
      $("#sign_emp_image").attr("src", "." + data.employee_signature);
      $("#signature_date1").val(data.signature_date);
      $("#sign_trans_image").attr("src", "." + data.translator_sign);
      $("#signature_date2").val(data.translator_sign_date);
      $("#i9lname2").val(data.translator_firstname);
      $("#i9fname2").val(data.translator_lastname);
      $("#translator_addr").val(data.translator_address);
      $("#translator_city").val(data.translator_city);
      $("#translator_state").val(data.translator_state);
      $("#translator_zip").val(data.translator_zipcode);
      $("#i9lname3").val(data.firstname);
      $("#i9fname3").val(data.lastname);
      $("#i9mname3").val(data.middle_initial);
      $("#citizen_country").val(data.citizenship_immigration);
      $("#doc_title_1").val(data.doc_title_1);
      $("#doc_title_2").val(data.doc_title_2);
      $("#doc_title_3").val(data.doc_title_3);
      $("#doc_title_4").val(data.doc_title_4);
      $("#doc_title_5").val(data.doc_title_5);
      $("#issuing_authority_1").val(data.issuing_authority_1);
      $("#issuing_authority_2").val(data.issuing_authority_2);
      $("#issuing_authority_3").val(data.issuing_authority_3);
      $("#issuing_authority_4").val(data.issuing_authority_4);
      $("#issuing_authority_5").val(data.issuing_authority_5);
      $("#doc_number_1").val(data.doc_number_1);
      $("#doc_number_2").val(data.doc_number_2);
      $("#doc_number_3").val(data.doc_number_3);
      $("#doc_number_4").val(data.doc_number_4);
      $("#doc_number_5").val(data.doc_number_5);
      $("#doc_expiry_1").val(data.doc_expiry_1);
      $("#doc_expiry_2").val(data.doc_expiry_2);
      $("#doc_expiry_3").val(data.doc_expiry_3);
      $("#doc_expiry_4").val(data.doc_expiry_4);
      $("#doc_expiry_5").val(data.doc_expiry_5);
      $("#authorized_sign").attr("src", "." + data.authorized_sign);
      $("#authorized_sign_date").val(data.authorized_sign_date);
      $("#authorized_title").val(data.authorized_title);
      $("#i9lname4").val(data.authorized_lastname);
      $("#i9fname4").val(data.authorized_firstname);
      $("#emp_organization").val(data.emp_organization);
      $("#organization_addres").val(data.organization_addres);
      $("#organization_city").val(data.organization_city);
      $("#organization_state").val(data.organization_state);
      $("#organization_zipcode").val(data.organization_zipcode);
      $("#i9lname5").val(data.firstname);
      $("#i9fname5").val(data.lastname);
      $("#i9mname5").val(data.middle_initial);
      $("#re_hire_date").val(data.re_hire_date);
      $("#doc_title_6").val(data.doc_title_6);
      $("#doc_no_6").val(data.doc_no_6);
      $("#doc_expiry_6").val(data.doc_expiry_6);
      $("#authorized_sign1").attr("src", "." + data.authorized_sign);
      $("#authorized_sign_date1").val(data.authorized_sign_date);
      $("#i9rname").val(data.authorized_firstname+' '+data.authorized_lastname);

      if (data.translator_check == 1) {
        $("#translator1").attr("checked", "true");
      }
      if (data.translator_check == 2) {
        $("#translator2").attr("checked", "true");
      }

    },
  });
});

$("#ni9formAdd").click(function () {
  $("#i9-form").modal("hide");
  $("#i9hiden_add").val(1);

  $("#ni9form1").val($("#i9fname").val());
  $("#ni9form2").val($("#i9lname").val());
  $("#ni9form3").val($("#i9mname").val());
  $("#ni9form4").val($("#i9oname").val());
  $("#ni9form5").val($("#i9address").val());
  $("#ni9form6").val($("#i9apt_no").val());
  $("#ni9form7").val($("#i9city").val());
  $("#ni9form8").val($("#i9state").val());
  $("#ni9form9").val($("#i9zipcode").val());
  $("#ni9form10").val($("#i9dob").val());
  $("#ni9form11").val($("#security_no").val());
  $("#ni9form12").val($("#i9email").val());
  $("#ni9form13").val($("#i9phone").val());

  if ($('#imprisonment_1').is(":checked")) {
    $("#ni9form14").val(1);
  }
  if ($('#imprisonment_2').is(":checked")) {
    $("#ni9form14").val(2);
  }
  if ($('#imprisonment_3').is(":checked")) {
    $("#ni9form14").val(3);
  }
  if ($('#imprisonment_4').is(":checked")) {
    $("#ni9form14").val(4);
  }

  $("#ni9form15").val($("#USCIS_no").val());
  $("#ni9form16").val($("#imprisonment_date").val());
  $("#ni9form17").val($("#i9admission").val());
  $("#ni9form18").val($("#passport_no").val());
  $("#ni9form19").val($("#country_nm").val());
  $("#ni9form21").val($("#signature_date1").val());

  if ($('#translator1').is(":checked")) {
    $("#ni9form22").val(1);
  }
  if ($('#translator2').is(":checked")) {
    $("#ni9form22").val(2);
  }

  $("#ni9form24").val($("#signature_date2").val());
  $("#ni9form25").val($("#i9lname2").val());
  $("#ni9form26").val($("#i9fname2").val());
  $("#ni9form27").val($("#translator_addr").val());
  $("#ni9form28").val($("#translator_city").val());
  $("#ni9form29").val($("#translator_state").val());
  $("#ni9form30").val($("#translator_zip").val());
  $("#ni9form31").val($("#citizen_country").val());
  $("#ni9form32").val($("#doc_title_1").val());
  $("#ni9form33").val($("#doc_title_2").val());
  $("#ni9form34").val($("#doc_title_3").val());
  $("#ni9form35").val($("#doc_title_4").val());
  $("#ni9form36").val($("#doc_title_5").val());
  $("#ni9form37").val($("#issuing_authority_1").val());
  $("#ni9form38").val($("#issuing_authority_2").val());
  $("#ni9form39").val($("#issuing_authority_3").val());
  $("#ni9form40").val($("#issuing_authority_4").val());
  $("#ni9form41").val($("#issuing_authority_5").val());
  $("#ni9form42").val($("#doc_number_1").val());
  $("#ni9form43").val($("#doc_number_2").val());
  $("#ni9form44").val($("#doc_number_3").val());
  $("#ni9form45").val($("#doc_number_4").val());
  $("#ni9form46").val($("#doc_number_5").val());
  $("#ni9form47").val($("#doc_expiry_1").val());
  $("#ni9form48").val($("#doc_expiry_2").val());
  $("#ni9form49").val($("#doc_expiry_3").val());
  $("#ni9form50").val($("#doc_expiry_4").val());
  $("#ni9form51").val($("#doc_expiry_5").val());
  $("#ni9form52").val($("#re_hire_date").val());
  $("#ni9form53").val($("#doc_title_6").val());
  $("#ni9form54").val($("#doc_no_6").val());
  $("#ni9form55").val($("#doc_expiry_6").val());
  $("#ni9form57").val($("#authorized_sign_date1").val());
  $("#ni9form58").val($("#authorized_title").val());
  $("#ni9form59").val($("#i9fname4").val());
  $("#ni9form60").val($("#i9lname4").val());
  $("#ni9form61").val($("#emp_organization").val());
  $("#ni9form62").val($("#organization_addres").val());
  $("#ni9form63").val($("#organization_city").val());
  $("#ni9form64").val($("#organization_state").val());
  $("#ni9form65").val($("#organization_zipcode").val());

});





$(".i9FormUpdate").click(function () {
  $("#i9-form").modal("hide");
  $("#i9hiden_submit").val(1);

  $("#i9form1").val($("#i9fname").val());
  $("#i9form2").val($("#i9lname").val());
  $("#i9form3").val($("#i9mname").val());
  $("#i9form4").val($("#i9oname").val());
  $("#i9form5").val($("#i9address").val());
  $("#i9form6").val($("#i9apt_no").val());
  $("#i9form7").val($("#i9city").val());
  $("#i9form8").val($("#i9state").val());
  $("#i9form9").val($("#i9zipcode").val());
  $("#i9form10").val($("#i9dob").val());
  $("#i9form11").val($("#security_no").val());
  $("#i9form12").val($("#i9email").val());
  $("#i9form13").val($("#i9phone").val());

  if ($('#imprisonment_1').is(":checked")) {
    $("#i9form14").val(1);
  }
  if ($('#imprisonment_2').is(":checked")) {
    $("#i9form14").val(2);
  }
  if ($('#imprisonment_3').is(":checked")) {
    $("#i9form14").val(3);
  }
  if ($('#imprisonment_4').is(":checked")) {
    $("#i9form14").val(4);
  }

  $("#i9form15").val($("#USCIS_no").val());
  $("#i9form16").val($("#imprisonment_date").val());
  $("#i9form17").val($("#i9admission").val());
  $("#i9form18").val($("#passport_no").val());
  $("#i9form19").val($("#country_nm").val());
  $("#i9form21").val($("#signature_date1").val());

  if ($('#translator1').is(":checked")) {
    $("#i9form22").val(1);
  }
  if ($('#translator2').is(":checked")) {
    $("#i9form22").val(2);
  }

  $("#i9form24").val($("#signature_date2").val());
  $("#i9form25").val($("#i9lname2").val());
  $("#i9form26").val($("#i9fname2").val());
  $("#i9form27").val($("#translator_addr").val());
  $("#i9form28").val($("#translator_city").val());
  $("#i9form29").val($("#translator_state").val());
  $("#i9form30").val($("#translator_zip").val());
  $("#i9form31").val($("#citizen_country").val());
  $("#i9form32").val($("#doc_title_1").val());
  $("#i9form33").val($("#doc_title_2").val());
  $("#i9form34").val($("#doc_title_3").val());
  $("#i9form35").val($("#doc_title_4").val());
  $("#i9form36").val($("#doc_title_5").val());
  $("#i9form37").val($("#issuing_authority_1").val());
  $("#i9form38").val($("#issuing_authority_2").val());
  $("#i9form39").val($("#issuing_authority_3").val());
  $("#i9form40").val($("#issuing_authority_4").val());
  $("#i9form41").val($("#issuing_authority_5").val());
  $("#i9form42").val($("#doc_number_1").val());
  $("#i9form43").val($("#doc_number_2").val());
  $("#i9form44").val($("#doc_number_3").val());
  $("#i9form45").val($("#doc_number_4").val());
  $("#i9form46").val($("#doc_number_5").val());
  $("#i9form47").val($("#doc_expiry_1").val());
  $("#i9form48").val($("#doc_expiry_2").val());
  $("#i9form49").val($("#doc_expiry_3").val());
  $("#i9form50").val($("#doc_expiry_4").val());
  $("#i9form51").val($("#doc_expiry_5").val());
  $("#i9form52").val($("#re_hire_date").val());
  $("#i9form53").val($("#doc_title_6").val());
  $("#i9form54").val($("#doc_no_6").val());
  $("#i9form55").val($("#doc_expiry_6").val());
  $("#i9form57").val($("#authorized_sign_date1").val());
  $("#i9form58").val($("#authorized_title").val());
  $("#i9form59").val($("#i9fname4").val());
  $("#i9form60").val($("#i9lname4").val());
  $("#i9form61").val($("#emp_organization").val());
  $("#i9form62").val($("#organization_addres").val());
  $("#i9form63").val($("#organization_city").val());
  $("#i9form64").val($("#organization_state").val());
  $("#i9form65").val($("#organization_zipcode").val());

});

$(".i9close").click(function () {
  var fname = $("#i9fname").val();
  var lname = $("#i9lname").val();
  var add = $("#i9address").val();
  var address_more = $("#i9city").val();
  $("#fname").val(fname);
  $("#lname").val(lname);
  $("#w4addf").val(add);
  $("#address_more").val(address_more);
});

$("#m-fname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#m-lname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#deny-row").click(function () {
  $("#w4-form").modal("hide");
});

$("#w4FormAdd").click(function () {
  $("#w4-form").modal("hide");
  $("#w4hiden_submit").val(1);
  var fname = $("#m-fname").val();
  var lname = $("#m-lname").val();
  var add = $("#m-address").val();
  var address_more = $("#m-zip").val();
  $("#fname").val(fname);
  $("#lname").val(lname);
  $("#w4addf").val(add);
  $("#address_more").val(address_more);
  $("#w4fname").val(fname);
  $("#w4lname").val(lname);
  $("#w4laddress").val(add);
  $("#w4zip").val(address_more);
  $("#w4securityno").val($("#security_number").val());
  var filling = $("input:checkbox:checked").val();
  $("#w4filling").val(filling);
  // ;w4other_income
  $("#w4other_income").val($("#oincome").val());
  $("#w4deductions").val($("#Deductions").val());
  $("#w4extra_withholding").val($("#withholding").val());
  $("#w4sign_date").val($("#sign_date").val());
  $("#w4namadd").val($("#name_with_address").val());
  $("#w4empDate").val($("#employment_date").val());
  $("#w4EIN").val($("#EIN").val());
  $("#multiple_jobs_worksheet_1").val($("#jobs_worksheet_1").val());
  $("#multiple_jobs_worksheet_2a").val($("#jobs_worksheet_2a").val());
  $("#multiple_jobs_worksheet_2b").val($("#jobs_worksheet_2b").val());
  $("#multiple_jobs_worksheet_2c").val($("#jobs_worksheet_2c").val());
  $("#multiple_jobs_worksheet_3").val($("#jobs_worksheet_3").val());
  $("#multiple_jobs_worksheet_4").val($("#jobs_worksheet_4").val());
  $("#deductions_worksheet_1").val($("#deduct_worksheet_1").val());
  $("#deductions_worksheet_2").val($("#deduct_worksheet_2").val());
  $("#deductions_worksheet_3").val($("#deduct_worksheet_3").val());
  $("#deductions_worksheet_4").val($("#deduct_worksheet_4").val());
  $("#deductions_worksheet_5").val($("#deduct_worksheet_5").val());
  $("#step2_val").val($("#step2").val());
  var first_val = parseFloat($("#qufy_childern").val());
  var second_val = parseFloat($("#ot_dependents").val());
  var total = first_val + second_val;
  $("#total_amt").val(total.toFixed(2));
  $("#total_amount").val(total.toFixed(2));
  $("#step3a").val(first_val.toFixed(2));
  $("#step3b").val(second_val.toFixed(2));
});

$("#qufy_childern").on("change", function () {
  if ($("#ot_dependents").val() != "") {
    var first_val = parseFloat($("#qufy_childern").val());
    var second_val = parseFloat($("#ot_dependents").val());
    var total = first_val + second_val;
    $("#total_amt").val(total.toFixed(2));
  } else {
    $("#total_amt").val("");
  }
  if ($("#qufy_childern").val() == "") {
    $("#total_amt").val(second_val);
  }
});

$("#ot_dependents").on("change", function () {
  if ($("#qufy_childern").val() != "") {
    var first_val = parseFloat($("#qufy_childern").val());
    var second_val = parseFloat($("#ot_dependents").val());
    var total = first_val + second_val;
    $("#total_amt").val(total.toFixed(2));
  } else {
    $("#total_amt").val("");
  }
  if ($("#ot_dependents").val() == "") {
    $("#total_amt").val(first_val);
  }
});

// $("#overlay,.loader").show();
$(document).ready(function () {
    // $("#overlay,.loader").show();
    // setTimeout(function () {
    //   $("#overlay,.loader").hide();
    // }, 1200);

  var d = $("#get_id").val();
  if (d == "category") {
    $("#pos").trigger("click");
  }
  if (d == "employee") {
    $("#user").trigger("click");
  }
  if (d == "general") {
    $("#general").trigger("click");
  }
  if (d == "role") {
    $("#roles").trigger("click");
  }
  if (d == "system") {
    $("#system_settings").trigger("click");
  }
  if (d == "receipt") {
    $("#receipt_settings").trigger("click");
  }
  if (d == "cash") {
    $("#cashadv_settings").trigger("click");
  }
  if (d == "shift") {
    $("#shift_settings").trigger("click");
  }
  if (d == "point") {
    $("#intake_point").trigger("click");
  }
  if (d == "outbound") {
    $("#outbound_point").trigger("click");
  }
  if (d == "font") {
    $("#font_settings").trigger("click");
  }
  if (d == "about_store") {
    $("#store_setting_intro").trigger("click");
  }
  if (d == "card_transaction") {
    $("#card_transaction").trigger("click");
  }
  if (d == "clover_card_transaction") {
    $("#div_clover_card_transaction").trigger("click");
  }
  if (d == "timezone") {
    $("#date_timezone").trigger("click");
  }
  if (d == "mail") {
    $("#mail_settings").trigger("click");
  }
  if (d == "discount_percent") {
    $("#discount_setting").trigger("click");
  }
  if (d == "miscellaneous") {
    $("#miscellaneous_product").trigger("click");
  }

  if (d == "notification") {
    $("#notify_settings").trigger("click");
  }
});

$(".w4FormUpdate").click(function () {
  $("#w4-form").modal("hide");
  $("#w4-form1").modal("show");
});

$('input[name="step2"]').click(function () {
  if ($(this).prop("checked") == true) {
    $("#step2").val("1");
  } else if ($(this).prop("checked") == false) {
    $("#step2").val("0");
  }
});

//check duplicatte product name
function productDuplicate() {
  var products = [];
  $(".product_name").removeClass("duplicate");
}

$("#i9lname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});
$("#i9fname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#i9lname2").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});
$("#i9fname2").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#i9mname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#i9oname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#i9lname3").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});
$("#i9fname3").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#i9mname3").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#i9lname4").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});
$("#i9fname4").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#i9lname5").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});
$("#i9fname5").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#i9mname5").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

$("#i9rname").on("keypress", function () {
  var regex = new RegExp("^[a-zA-Z ]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    return false;
  }
});

function productDuplicates() {
  var products = [];
  $(".product_name1").removeClass("duplicate");
}

//Label Setting functionality
// $("#editor").on("click", function () {
//   var label_height = $("#1a").val();
//   var label_width = $("#2a").val();
//   var label_font_size = $("#3a").val();
//   var label_image = $("#4a").val();
//   $(".first-slabel").css({ width: label_width });
//   $(".first-slabel").css({ height: label_height });
//   $(".prodname").css({ "font-size": label_font_size });
// });

$("#2a").on("change", function () {
  var editor_width = parseFloat($(this).val());
  var editor_height = parseFloat($('#1a').val());

  var zoom_percent = (editor_height + editor_width);
  var size = (zoom_percent * 10 );
  var pixcel_height = parseFloat(editor_height * 96 );
  var pixcel_width = parseFloat(editor_width * 96 );

  if($('#lbl_id').val() == 1){
      var barcode = (zoom_percent * 15.84);  //76
      var strike_prc = (zoom_percent - 3.3 );
      var prc = (zoom_percent - 2.5);
      $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
      $(".barimg").css({height: barcode});
      $(".lpc-price").css({fontSize: strike_prc + 'rem'});
      $(".lppc-price").css({fontSize: prc + 'rem'});
  }else if($('#lbl_id').val() == 2){
      var barcode = (zoom_percent * 24.00);
      var strike_prc = (zoom_percent * 0.231 );
      var prc = (zoom_percent * 0.453);
      var img = (zoom_percent * 15.40 );

      var upc_no = (zoom_percent * 133.3);

      $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
      $(".barimg").css({height: barcode});
      $(".lpc-price").css({fontSize: strike_prc + 'rem'});
      $(".lppc-price").css({fontSize: prc + 'rem'});
      $(".imgcon-lbl > img").css({maxHeight: img + 'px'});
      $(".bold").css({fontWeight: upc_no});
  } else if ($('#lbl_id').val() == 4) {
      var spl_text = (zoom_percent * 27);
      var strike_prc = (zoom_percent * 0.231 );
      var img = (zoom_percent * 15.40 );
      var prc = (zoom_percent * 0.453);

      $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
      $(".spl-text").css({fontSize: spl_text+ '%'});
      $(".lpc-price").css({fontSize: strike_prc + 'rem'});
      $(".lppc-price").css({fontSize: prc + 'rem'});
      $(".imgcon-lbl > img").css({maxHeight: img + 'px'});
  }else if($('#lbl_id').val()== 3){
      var barcode = (zoom_percent * 24.00);
      var strike_prc = (zoom_percent * 0.231 );
      var prc = (zoom_percent * 0.453);
      var upc_no = (zoom_percent * 133.3);

      $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
      $(".barimg").css({height: barcode});
      $(".lpc-price").css({fontSize: strike_prc + 'rem'});
      $(".lppc-price").css({fontSize: prc + 'rem'});
      $(".bold").css({fontWeight: upc_no});
  }


});

$("#1a").on("change", function () {
  var editor_height = parseFloat($(this).val());
  var editor_width = parseFloat($('#2a').val());
  var zoom_percent = (editor_height + editor_width);
  var size = (zoom_percent * 10 );
  var pixcel_height = parseFloat(editor_height * 96 );
  var pixcel_width = parseFloat(editor_width * 96 );

  if($('#lbl_id').val() == 1){
      var barcode = (zoom_percent * 15.84);  //76
      var strike_prc = (zoom_percent - 3.3 );
      var prc = (zoom_percent - 2.5);
      $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
      $(".barimg").css({height: barcode});
      $(".lpc-price").css({fontSize: strike_prc + 'rem'});
      $(".lppc-price").css({fontSize: prc + 'rem'});
  }else if($('#lbl_id').val() == 2){
      var barcode = (zoom_percent * 24.00);
      var strike_prc = (zoom_percent * 0.231 );
      var img = (zoom_percent * 15.40 );
      var prc = (zoom_percent * 0.453);
      var upc_no = (zoom_percent * 133.3);
      $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
      $(".barimg").css({height: barcode});
      $(".lpc-price").css({fontSize: strike_prc + 'rem'});
      $(".lppc-price").css({fontSize: prc + 'rem'});
      $(".imgcon-lbl > img").css({maxHeight: img + 'px'});
      $(".bold").css({fontWeight: upc_no});
  }else if ($('#lbl_id').val()== 4) {
      var spl_text = (zoom_percent * 27);
      var strike_prc = (zoom_percent * 0.231 );
      var img = (zoom_percent * 15.40 );
      var prc = (zoom_percent * 0.453);
      $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
      $(".spl-text").css({fontSize: spl_text+ '%'});
      $(".lpc-price").css({fontSize: strike_prc + 'rem'});
      $(".lppc-price").css({fontSize: prc + 'rem'});
      $(".imgcon-lbl > img").css({maxHeight: img + 'px'});
  }else if($('#lbl_id').val()== 3){
      var barcode = (zoom_percent * 24.00);
      var strike_prc = (zoom_percent * 0.231 );
      var prc = (zoom_percent * 0.453);
      var upc_no = (zoom_percent * 133.3);

      $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
      $(".barimg").css({height: barcode});
      $(".lpc-price").css({fontSize: strike_prc + 'rem'});
      $(".lppc-price").css({fontSize: prc + 'rem'});
      $(".bold").css({fontWeight: upc_no});
  }


});

$("#btnLabel").on("click", function () {
  var label_height = $("#1a").val();
  var label_width = $("#2a").val();
  var lbl_id = $('#lbl_id').val();


  if (label_height == "") {
    $("#height_err").html("Please enter Label Height").show();
    return false;
  }
  if (label_width == "") {
    $("#width_err").html("Please enter Label Width").show();
    return false;
  }

  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/label_editor",
    data: {
      lbl_id: lbl_id,
      label_height: label_height,
      label_width: label_width,
    },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      if (data == "success") {
        swal({
          title: "Success!",
          text: "Label updated successfully!",
          icon: "success",
          buttons: false,
          timer: 3000,
        });
      }
    },
  });
  return false;
});

$(".validlable").bind("change", function () {
  var label_height = $("#1a").val();
  var label_width = $("#2a").val();

  if (label_height == "") {
    $("#height_err").html("Please enter Label Height").show();
    return false;
  } else {
    $("#height_err").html("").show();
  }
  if (label_width == "") {
    $("#width_err").html("Please enter Label Width").show();
    return false;
  } else {
    $("#width_err").html("").show();
  }

});

$(document).ready(function () {
  $('#lbl_id').val(1);
  var id = 1;
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/get_label_editor_by_id",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      // $("#3a").val(data.label_font_size);
      $("#1a").val(data.label_height);
      $("#2a").val(data.label_width);
      // $("#4a").val(data.label_image).trigger("change"); //for select

      var editor_height = parseFloat(data.label_height);
      var editor_width = parseFloat(data.label_width);
      var zoom_percent = (editor_height + editor_width);
      var size = (zoom_percent * 10 );
      var pixcel_height = parseFloat(editor_height * 96 );
      var pixcel_width = parseFloat(editor_width * 96 );


      var barcode = (zoom_percent * 15.84);
      var strike_prc = (zoom_percent - 3.3 );

      var prc = (zoom_percent - 2.5);
      $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
      $(".barimg").css({height: barcode});
      $(".lpc-price").css({fontSize: strike_prc + 'rem'});
      $(".lppc-price").css({fontSize: prc + 'rem'});


    },
  });
  return false;
});

//permission script only
$("#user_table").on("click", ".Permissions", function () {
  var id = $(this).data("id");
  var emp_name = $(this).data("name");
  $("#perm_id").val(id);
  $(".EMPLOYEE").hide();
  $(".user_perm").show();
  var role_name = $(this).data("role");
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/get_user_permissions",
    data: { user_id: id, role_name: role_name  },
    // async: false,
    dataType: "json",
    success: function (data) {
      $('#permission_name').text('( '+emp_name+' )');
      if(data.user_permission.pos_rights == 'B,C,D,E,F,G,H,I,J'){
          $("#POS1").attr("checked", true);
      }else if(data.role_permission.pos_rights == 'B,C,D,E,F,G,H,I,J'){
          $("#POS1").attr("checked", true);
          $("#POS1").prop( "disabled",true);
      }

      if (data.user_permission.pos_rights.match(/B/)) {
        $("#pos2").attr("checked", true);
      } else if (data.role_permission.pos_rights.match(/B/)) {
        $("#pos2").attr("checked", true);
        $("#pos2").prop( "disabled",true);
      }
      if (data.user_permission.pos_rights.match(/C/)) {
        $("#pos3").attr("checked", true);
      } else if (data.role_permission.pos_rights.match(/C/)) {
        $("#pos3").attr("checked", true);
        $("#pos3").prop( "disabled",true);
      }
      if (data.user_permission.pos_rights.match(/D/)) {
        $("#pos4").attr("checked", true);
      } else if (data.role_permission.pos_rights.match(/D/)) {
        $("#pos4").attr("checked", true);
        $("#pos4").prop( "disabled",true);
      }
      if (data.user_permission.pos_rights.match(/E/)) {
        $("#pos5").attr("checked", true);
      } else if (data.role_permission.pos_rights.match(/E/)) {
        $("#pos5").attr("checked", true);
        $("#pos5").prop( "disabled",true);
      }
      if (data.user_permission.pos_rights.match(/F/)) {
        $("#pos6").attr("checked", true);
      } else if (data.role_permission.pos_rights.match(/F/)) {
        $("#pos6").attr("checked", true);
        $("#pos6").prop( "disabled",true);
      }
      if (data.user_permission.pos_rights.match(/G/)) {
        $("#pos7").attr("checked", true);
      } else if (data.role_permission.pos_rights.match(/G/)) {
        $("#pos7").attr("checked", true);
        $("#pos7").prop( "disabled",true);
      }
      if (data.user_permission.pos_rights.match(/H/)) {
        $("#pos8").attr("checked", true);
      } else if (data.role_permission.pos_rights.match(/H/)) {
        $("#pos8").attr("checked", true);
        $("#pos8").prop( "disabled",true);
      }
      if (data.user_permission.pos_rights.match(/I/)) {
        $("#pos9").attr("checked", true);
      } else if (data.role_permission.pos_rights.match(/I/)) {
        $("#pos9").attr("checked", true);
        $("#pos9").prop( "disabled",true);
      }
      if (data.user_permission.pos_rights.match(/J/)) {
         $("#pos10").attr("checked", true);
      } else if (data.role_permission.pos_rights.match(/J/)) {
          $("#pos10").attr("checked", true);
          $("#pos10").prop( "disabled",true);
      }

      if(data.user_permission.reports_rights == 'A,B,C,D,E,F,G,H,I'){
          $("#REPORTS1").attr("checked", true);
      }else if(data.role_permission.reports_rights == 'A,B,C,D,E,F,G,H,I'){
          $("#REPORTS1").attr("checked", true);
          $("#REPORTS1").prop( "disabled",true);
      }

      if (data.user_permission.reports_rights.match(/A/)) {
        $("#ret1").attr("checked", true);
      } else if (data.role_permission.reports_rights.match(/A/)) {
        $("#ret1").attr("checked", true);
        $("#ret1").prop( "disabled",true);
      }
      if (data.user_permission.reports_rights.match(/B/)) {
        $("#ret2").attr("checked", true);
      } else if (data.role_permission.reports_rights.match(/B/)) {
        $("#ret2").attr("checked", true);
        $("#ret2").prop( "disabled",true);
      }
      if (data.user_permission.reports_rights.match(/C/)) {
        $("#ret3").attr("checked", true);
      } else if (data.role_permission.reports_rights.match(/C/)) {
        $("#ret3").attr("checked", true);
        $("#ret3").prop( "disabled",true);
      }
      if (data.user_permission.reports_rights.match(/D/)) {
        $("#ret4").attr("checked", true);
      } else if (data.role_permission.reports_rights.match(/D/)) {
        $("#ret4").attr("checked", true);
        $("#ret4").prop( "disabled",true);
      }
      if (data.user_permission.reports_rights.match(/E/)) {
        $("#ret5").attr("checked", true);
      } else if (data.role_permission.reports_rights.match(/E/)) {
        $("#ret5").attr("checked", true);
        $("#ret5").prop( "disabled",true);
      }
      if (data.user_permission.reports_rights.match(/F/)) {
        $("#ret6").attr("checked", true);
      } else if (data.role_permission.reports_rights.match(/F/)) {
        $("#ret6").attr("checked", true);
        $("#ret6").prop( "disabled",true);
      }
      if (data.user_permission.reports_rights.match(/G/)) {
        $("#ret7").attr("checked", true);
      } else if (data.role_permission.reports_rights.match(/G/)) {
        $("#ret7").attr("checked", true);
        $("#ret7").prop( "disabled",true);
      }
      if (data.user_permission.reports_rights.match(/H/)) {
        $("#ret8").attr("checked", true);
      } else if (data.role_permission.reports_rights.match(/H/)) {
        $("#ret8").attr("checked", true);
        $("#ret8").prop( "disabled",true);
      }
      if (data.user_permission.reports_rights.match(/I/)) {
        $("#ret9").attr("checked", true);
      } else if (data.role_permission.reports_rights.match(/I/)) {
        $("#ret9").attr("checked", true);
        $("#ret9").prop( "disabled",true);
      }

      if(data.user_permission.inventory_rights == 'A,B,C,D,E,F,G,H,I,J,K,L'){
          $("#INVENTORY1").attr("checked", true);
      }else if(data.role_permission.inventory_rights == 'A,B,C,D,E,F,G,H,I,J,K,L'){
          $("#INVENTORY1").attr("checked", true);
          $("#INVENTORY1").prop( "disabled",true);
      }

      if (data.user_permission.inventory_rights.match(/A/)) {
        $("#inv1").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/A/)) {
        $("#inv1").attr("checked", true);
        $("#ret9").prop( "disabled",true);

      }
      if (data.user_permission.inventory_rights.match(/B/)) {
        $("#inv2").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/B/)) {
          $("#inv2").attr("checked", true);
          $("#inv2").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/C/)) {
        $("#inv3").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/C/)) {
          $("#inv3").attr("checked", true);
          $("#inv3").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/D/)) {
        $("#inv4").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/D/)) {
          $("#inv4").attr("checked", true);
          $("#inv4").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/E/)) {
        $("#inv5").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/E/)) {
          $("#inv5").attr("checked", true);
          $("#inv5").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/F/)) {
        $("#inv6").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/F/)) {
          $("#inv6").attr("checked", true);
          $("#inv6").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/G/)) {
        $("#inv7").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/G/)) {
          $("#inv7").attr("checked", true);
          $("#inv7").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/H/)) {
        $("#inv8").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/H/)) {
          $("#inv8").attr("checked", true);
          $("#inv8").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/I/)) {
        $("#inv9").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/I/)) {
          $("#inv9").attr("checked", true);
          $("#inv9").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/J/)) {
        $("#inv10").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/J/)) {
          $("#inv10").attr("checked", true);
          $("#inv10").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/K/)) {
        $("#inv11").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/K/)) {
          $("#inv11").attr("checked", true);
          $("#inv11").prop( "disabled",true);
      }
      if (data.user_permission.inventory_rights.match(/L/)) {
        $("#inv12").attr("checked", true);
      } else if (data.role_permission.inventory_rights.match(/L/)) {
          $("#inv12").attr("checked", true);
          $("#inv12").prop( "disabled",true);
      }

      if(data.user_permission.loyalty_rights == 'A,B,C,D,E,F,G,H,I'){
          $("#LOYALTY1").attr("checked", true);
      }else if(data.role_permission.loyalty_rights == 'A,B,C,D,E,F,G,H,I'){
          $("#LOYALTY1").attr("checked", true);
          $("#LOYALTY1").prop("disabled",true);
      }


      if (data.user_permission.loyalty_rights.match(/A/)) {
        $("#loy1").attr("checked", true);
      } else if (data.role_permission.loyalty_rights.match(/A/)) {
        $("#loy1").attr("checked", true);
        $("#loy1").prop( "disabled",true);
      }
      if (data.user_permission.loyalty_rights.match(/B/)) {
        $("#loy2").attr("checked", true);
      } else if (data.role_permission.loyalty_rights.match(/B/)) {
        $("#loy2").attr("checked", true);
        $("#loy2").prop( "disabled",true);
      }
      if (data.user_permission.loyalty_rights.match(/C/)) {
        $("#loy3").attr("checked", true);
      } else if (data.role_permission.loyalty_rights.match(/C/)) {
        $("#loy3").attr("checked", true);
        $("#loy3").prop( "disabled",true);
      }
      if (data.user_permission.loyalty_rights.match(/D/)) {
        $("#loy4").attr("checked", true);
      } else if (data.role_permission.loyalty_rights.match(/D/)) {
        $("#loy4").attr("checked", true);
        $("#loy4").prop( "disabled",true);
      }
      if (data.user_permission.loyalty_rights.match(/E/)) {
        $("#loy5").attr("checked", true);
      } else if (data.role_permission.loyalty_rights.match(/E/)) {
        $("#loy5").attr("checked", true);
        $("#loy5").prop( "disabled",true);
      }
      if (data.user_permission.loyalty_rights.match(/F/)) {
        $("#loy6").attr("checked", true);
      } else if (data.role_permission.loyalty_rights.match(/F/)) {
        $("#loy6").attr("checked", true);
        $("#loy6").prop( "disabled",true);
      }
      if (data.user_permission.loyalty_rights.match(/G/)) {
        $("#loy7").attr("checked", true);
      } else if (data.role_permission.loyalty_rights.match(/G/)) {
        $("#loy7").attr("checked", true);
        $("#loy7").prop( "disabled",true);
      }
      if (data.user_permission.loyalty_rights.match(/H/)) {
        $("#loy8").attr("checked", true);
      } else if (data.role_permission.loyalty_rights.match(/H/)) {
        $("#loy8").attr("checked", true);
        $("#loy8").prop( "disabled",true);
      }
      if (data.user_permission.loyalty_rights.match(/I/)) {
        $("#loy9").attr("checked", true);
      } else if (data.role_permission.loyalty_rights.match(/I/)) {
        $("#loy9").attr("checked", true);
        $("#loy9").prop( "disabled",true);
      }

      if(data.user_permission.store_rights == 'A,B,C,D,E,F,G,H,I,J'){
          $("#COUPON1").attr("checked", true);
      }else if(data.role_permission.store_rights == 'A,B,C,D,E,F,G,H,I,J'){
          $("#COUPON1").attr("checked", true);
          $("#COUPON1").prop("disabled",true);
      }

      if (data.user_permission.store_rights.match(/A/)) {
        $("#sto1").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/A/)) {
        $("#sto1").attr("checked", true);
        $("#sto1").prop( "disabled",true);
      }
      if (data.user_permission.store_rights.match(/B/)) {
        $("#sto2").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/B/)) {
        $("#sto2").attr("checked", true);
        $("#sto2").prop( "disabled",true);
      }
      if (data.user_permission.store_rights.match(/C/)) {
        $("#sto3").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/C/)) {
        $("#sto3").attr("checked", true);
        $("#sto3").prop( "disabled",true);
      }
      if (data.user_permission.store_rights.match(/D/)) {
        $("#sto4").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/D/)) {
        $("#sto4").attr("checked", true);
        $("#sto4").prop( "disabled",true);
      }
      if (data.user_permission.store_rights.match(/E/)) {
        $("#sto5").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/E/)) {
        $("#sto5").attr("checked", true);
        $("#sto5").prop( "disabled",true);
      }
      if (data.user_permission.store_rights.match(/F/)) {
        $("#sto6").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/F/)) {
        $("#sto6").attr("checked", true);
        $("#sto6").prop( "disabled",true);
      }
      if (data.user_permission.store_rights.match(/G/)) {
        $("#sto7").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/G/)) {
        $("#sto7").attr("checked", true);
        $("#sto7").prop( "disabled",true);
      }
      if (data.user_permission.store_rights.match(/H/)) {
        $("#sto8").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/H/)) {
        $("#sto8").attr("checked", true);
        $("#sto8").prop( "disabled",true);
      }
      if (data.user_permission.store_rights.match(/I/)) {
        $("#sto9").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/I/)) {
        $("#sto9").attr("checked", true);
        $("#sto9").prop( "disabled",true);
      }
      if (data.user_permission.store_rights.match(/J/)) {
        $("#sto10").attr("checked", true);
      } else if (data.role_permission.store_rights.match(/J/)) {
        $("#sto10").attr("checked", true);
        $("#sto10").prop( "disabled",true);
      }

      if(data.user_permission.hrms_rights == 'A,B,C,D'){
          $("#HRMS1").attr("checked", true);
      }else if(data.role_permission.hrms_rights == 'A,B,C,D'){
          $("#HRMS1").attr("checked", true);
          $("#HRMS1").prop("disabled",true);
      }

      if (data.user_permission.hrms_rights.match(/A/)) {
        $("#hrm1").attr("checked", true);
      } else if (data.role_permission.hrms_rights.match(/A/)) {
        $("#hrm1").attr("checked", true);
        $("#hrm1").prop( "disabled",true);
      }
      if (data.user_permission.hrms_rights.match(/B/)) {
        $("#hrm2").attr("checked", true);
      } else if (data.role_permission.hrms_rights.match(/B/)) {
        $("#hrm2").attr("checked", true);
        $("#hrm2").prop( "disabled",true);
      }
      if (data.user_permission.hrms_rights.match(/C/)) {
        $("#hrm3").attr("checked", true);
      } else if (data.role_permission.hrms_rights.match(/C/)) {
        $("#hrm3").attr("checked", true);
        $("#hrm3").prop( "disabled",true);
      }
      if (data.user_permission.hrms_rights.match(/D/)) {
        $("#hrm4").attr("checked", true);
      } else if (data.role_permission.hrms_rights.match(/D/)) {
        $("#hrm4").attr("checked", true);
        $("#hrm4").prop( "disabled",true);
      }

      if(data.user_permission.submit_timecard_rights == 'A,B'){
          $("#TIMECARD1").attr("checked", true);
      }else if(data.role_permission.submit_timecard_rights == 'A,B'){
          $("#TIMECARD1").attr("checked", true);
          $("#TIMECARD1").prop("disabled",true);
      }

      if (data.user_permission.submit_timecard_rights.match(/A/)) {
        $("#tim1").attr("checked", true);
      } else if (data.role_permission.submit_timecard_rights.match(/A/)) {
        $("#tim1").attr("checked", true);
        $("#tim1").prop( "disabled",true);
      }
      if (data.user_permission.submit_timecard_rights.match(/B/)) {
        $("#tim2").attr("checked", true);
      } else if (data.role_permission.submit_timecard_rights.match(/B/)) {
        $("#tim2").attr("checked", true);
        $("#tim2").prop( "disabled",true);
      }
      if (data.user_permission.e_order_rights.match(/A/)) {
        $("#erd1").attr("checked", true);
      } else if (data.role_permission.e_order_rights.match(/A/)) {
        $("#erd1").attr("checked", true);
        $("#erd1").prop( "disabled",true);
      }
      if (data.user_permission.market_place_rights.match(/A/)) {
        $("#mar1").attr("checked", true);
      } else if (data.role_permission.market_place_rights.match(/A/)) {
        $("#mar1").attr("checked", true);
        $("#mar1").prop( "disabled",true);
      }
    },
  });
});

$(document).ready(function () {
  $(".nested").addClass("active");
  $(".pos_check").click(function () {
    if ($(this).is(":checked")) {
      $(".check").attr("checked", true);
    } else {
      $(".check").attr("checked", false);
    }
    $("#POS").show();
  });

  $(".report_check").click(function () {
    if ($(this).is(":checked")) {
      $(".check1").attr("checked", true);
    } else {
      $(".check1").attr("checked", false);
    }
    $("#REPORTS").show();
  });

  $(".inventory_check").click(function () {
    if ($(this).is(":checked")) {
      $(".check2").attr("checked", true);
    } else {
      $(".check2").attr("checked", false);
    }
    $("#INVENTORY").show();
  });

  $(".loyalty_check").click(function () {
    if ($(this).is(":checked")) {
      $(".check3").attr("checked", true);
    } else {
      $(".check3").attr("checked", false);
    }
    $("#LOYALTY").show();
  });

  $(".coupon_check").click(function () {
    if ($(this).is(":checked")) {
      $(".check4").attr("checked", true);
    } else {
      $(".check4").attr("checked", false);
    }
    $("#COUPON").show();
  });

  $(".hrms_check").click(function () {
    if ($(this).is(":checked")) {
      $(".check5").attr("checked", true);
    } else {
      $(".check5").attr("checked", false);
    }
    $("#HRMS").show();
  });

  $(".timecard_check").click(function () {
    if ($(this).is(":checked")) {
      $(".check6").attr("checked", true);
    } else {
      $(".check6").attr("checked", false);
    }
    $("#TIMECARD").show();
  });

  $(document).on("focus", "input,textarea", function () {
    if ($(this).hasClass("use-keyboard-input")) {
      $("body").addClass("fixfixed");
    }
  });

  $(document).on("blur", "input,textarea", function () {
    if ($(this).hasClass("use-keyboard-input")) {
      $("body").removeClass("fixfixed");
    }
  });

  //Get notification store data -start
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/get_store_notification",
    dataType: "json",
    success: function (data) {
      console.log(data);
      if (data.pos_notification == "A,B") {
        $("#notify_POS1").attr("checked", true);
      } else {
        $("#notify_POS1").attr("checked", false);
      }
      if (data.pos_notification.match(/A/)) {
        $("#notification_pos1").attr("checked", true);
      }
      if (data.pos_notification.match(/B/)) {
        $("#notification_pos2").attr("checked", true);
      }

      if (data.inventory_notification == "A,B") {
        $("#notify_INVENTORY1").attr("checked", true);
      } else {
        $("#notify_INVENTORY1").attr("checked", false);
      }
      if (data.inventory_notification.match(/A/)) {
        $("#notification_inv1").attr("checked", true);
      }
      if (data.inventory_notification.match(/B/)) {
        $("#notification_inv2").attr("checked", true);
      }

      if (data.hrms_notification == "A,B,C,D") {
        $("#notify_HRMS1").attr("checked", true);
      } else {
        $("#notify_HRMS1").attr("checked", false);
      }
      if (data.hrms_notification.match(/A/)) {
        $("#notification_hrm1").attr("checked", true);
      }
      if (data.hrms_notification.match(/B/)) {
        $("#notification_hrm2").attr("checked", true);
      }
      if (data.hrms_notification.match(/C/)) {
        $("#notification_hrm3").attr("checked", true);
      }
      if (data.hrms_notification.match(/D/)) {
        $("#notification_hrm4").attr("checked", true);
      }
    },
  });
  //Get notification store data -end

  $("#notify_POS1").click(function () {
    if ($(this).is(":checked")) {
      $(".check7").attr("checked", true);
    } else {
      $(".check7").attr("checked", false);
    }
    $("#notify_POS").show();
  });

  $("#notify_INVENTORY1").click(function () {
    if ($(this).is(":checked")) {
      $(".check8").attr("checked", true);
    } else {
      $(".check8").attr("checked", false);
    }
    $("#notify_INVENTORY").show();
  });

  $("#notify_HRMS1").click(function () {
    if ($(this).is(":checked")) {
      $(".check9").attr("checked", true);
    } else {
      $(".check9").attr("checked", false);
    }
    $("#notify_HRMS").show();
  });
});

$("#btnPermission").on("click", function () {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/userPerm",
    data: $(".user_perm").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "User permissions updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=employee";
      }, 2500);
    },
  });
  return false;
});

$("#btnNotify").on("click", function () {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/store_notifiction",
    data: $(".store_notification").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Notification settings updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=notification";
      }, 2500);
    },
  });
  return false;
});

$("#add_roles").click(function () {
  $(".ROLES1").hide();
  $(".add_role").show();
  $("#BACK6").show();
});

$("#BACK6").click(function () {
  $(".ROLES1").show();
  $(".add_role").hide();
  $("#BACK6").hide();
});

var role_state = false;
$("#rolename").on("blur", function () {
  var rolename = $("#rolename").val();
  $.ajax({
    url: base_url + "cashier/Cashier/checkRole",
    type: "post",
    data: { rolename: rolename },
    success: function (response) {
      if (response == "fail") {
        role_state = false;
        $("#rolename_err").html("This Role is already exist").show();
      } else if (response == "success") {
        role_state = true;
        $("#rolename_err").html("").show();
      }
    },
  });
});

$("#btnRole").on("click", function () {
  if ($("#rolename").val() == "") {
    $("#rolename_err").html("Please enter Role Name").show();
    return false;
  }
  if (role_state == false) {
    $("#rolename_err").html("This Role is already exist").show();
    return false;
  }
  if (role_state == true) {
    $.ajax({
      type: "ajax",
      method: "post",
      url: base_url + "cashier/add_role",
      data: $(".add_role").serialize(),
      dataType: "json",
      beforeSend: function () {
        $("#overlay,.loader").show();
      },
      success: function (data) {
        $("#overlay,.loader").hide();
        swal({
          title: "Success!",
          text: "Role added successfully!",
          icon: "success",
          buttons: false,
        });
        setTimeout(function () {
          window.location = base_url + "cashier/settings?d=role";
        }, 3000);
      },
    });
    return false;
  }
});

$(".pos_check").click(function () {
  if ($(this).is(":checked")) {
    $(".check").attr("checked", true);
  } else {
    $(".check").attr("checked", false);
  }
  $("#POS_add").show();
});

$(".report_check").click(function () {
  if ($(this).is(":checked")) {
    $(".check1").attr("checked", true);
  } else {
    $(".check1").attr("checked", false);
  }
  $("#REPORTS_add").show();
});

$(".inventory_check").click(function () {
  if ($(this).is(":checked")) {
    $(".check2").attr("checked", true);
  } else {
    $(".check2").attr("checked", false);
  }
  $("#INVENTORY_add").show();
});

$(".loyalty_check").click(function () {
  if ($(this).is(":checked")) {
    $(".check3").attr("checked", true);
  } else {
    $(".check3").attr("checked", false);
  }
  $("#LOYALTY_add").show();
});

$(".coupon_check").click(function () {
  if ($(this).is(":checked")) {
    $(".check4").attr("checked", true);
  } else {
    $(".check4").attr("checked", false);
  }
  $("#COUPON_add").show();
});

$(".hrms_check").click(function () {
  if ($(this).is(":checked")) {
    $(".check5").attr("checked", true);
  } else {
    $(".check5").attr("checked", false);
  }
  $("#HRMS_add").show();
});

$(".timecard_check").click(function () {
  if ($(this).is(":checked")) {
    $(".check6").attr("checked", true);
  } else {
    $(".check6").attr("checked", false);
  }
  $("#TIMECARD_add").show();
});

$(".EDIT_ROLE").click(function () {
  $(".ROLES1").hide();
  $(".update_role").show();
  $("#BACK7").show();
  var role_id = $(this).attr("data-id");
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/get_frontrole_by_id",
    data: { role_id: role_id },
    dataType: "json",
    success: function (data) {
      $("#RoleID").val(data[0].Role_id);
      $("#editrole").val(data[0].role_name);
      if (
        data[0].pos_rights == "B,C,D,E,F,G,H,I,J" ||
        data[0].pos_rights == "A,B,C,D,E,F,G,H,I,J"
      ) {
        $("#POS2").attr("checked", true);
      } else {
        $("#POS2").attr("checked", false);
      }
      if (data[0].pos_rights.match(/B/)) {
        $("#posB").attr("checked", true);
      }
      if (data[0].pos_rights.match(/C/)) {
        $("#posC").attr("checked", true);
      }
      if (data[0].pos_rights.match(/D/)) {
        $("#posD").attr("checked", true);
      }
      if (data[0].pos_rights.match(/E/)) {
        $("#posE").attr("checked", true);
      }
      if (data[0].pos_rights.match(/F/)) {
        $("#posF").attr("checked", true);
      }
      if (data[0].pos_rights.match(/G/)) {
        $("#posG").attr("checked", true);
      }
      if (data[0].pos_rights.match(/H/)) {
        $("#posH").attr("checked", true);
      }
      if (data[0].pos_rights.match(/I/)) {
        $("#posI").attr("checked", true);
      }
      if (data[0].pos_rights.match(/J/)) {
        $("#posJ").attr("checked", true);
      }
      if (data[0].reports_rights == "A,B,C,D,E,F,G,H,I") {
        $("#REPORTS2").attr("checked", true);
      } else {
        $("#REPORTS2").attr("checked", false);
      }
      if (data[0].reports_rights.match(/A/)) {
        $("#retA").attr("checked", true);
      }
      if (data[0].reports_rights.match(/B/)) {
        $("#retB").attr("checked", true);
      }
      if (data[0].reports_rights.match(/C/)) {
        $("#retC").attr("checked", true);
      }
      if (data[0].reports_rights.match(/D/)) {
        $("#retD").attr("checked", true);
      }
      if (data[0].reports_rights.match(/E/)) {
        $("#retE").attr("checked", true);
      }
      if (data[0].reports_rights.match(/F/)) {
        $("#retF").attr("checked", true);
      }
      if (data[0].reports_rights.match(/G/)) {
        $("#retG").attr("checked", true);
      }
      if (data[0].reports_rights.match(/H/)) {
        $("#retH").attr("checked", true);
      }
      if (data[0].reports_rights.match(/I/)) {
        $("#retI").attr("checked", true);
      }
      if (data[0].inventory_rights == "A,B,C,D,E,F,G,H,I,J,K,L") {
        $("#INVENTORY2").attr("checked", true);
      } else {
        $("#INVENTORY2").attr("checked", false);
      }
      if (data[0].inventory_rights.match(/A/)) {
        $("#invA").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/B/)) {
        $("#invB").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/C/)) {
        $("#invC").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/D/)) {
        $("#invD").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/E/)) {
        $("#invE").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/F/)) {
        $("#invF").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/G/)) {
        $("#invG").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/H/)) {
        $("#invH").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/I/)) {
        $("#invI").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/J/)) {
        $("#invJ").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/K/)) {
        $("#invK").attr("checked", true);
      }
      if (data[0].inventory_rights.match(/L/)) {
        $("#invL").attr("checked", true);
      }
      if (data[0].loyalty_rights == "A,B,C,D,E,F,G,H,I") {
        $("#LOYALTY2").attr("checked", true);
      } else {
        $("#LOYALTY2").attr("checked", false);
      }
      if (data[0].loyalty_rights.match(/A/)) {
        $("#loyA").attr("checked", true);
      }
      if (data[0].loyalty_rights.match(/B/)) {
        $("#loyB").attr("checked", true);
      }
      if (data[0].loyalty_rights.match(/C/)) {
        $("#loyC").attr("checked", true);
      }
      if (data[0].loyalty_rights.match(/D/)) {
        $("#loyD").attr("checked", true);
      }
      if (data[0].loyalty_rights.match(/E/)) {
        $("#loyE").attr("checked", true);
      }
      if (data[0].loyalty_rights.match(/F/)) {
        $("#loyF").attr("checked", true);
      }
      if (data[0].loyalty_rights.match(/G/)) {
        $("#loyG").attr("checked", true);
      }
      if (data[0].loyalty_rights.match(/H/)) {
        $("#loyH").attr("checked", true);
      }
      if (data[0].loyalty_rights.match(/I/)) {
        $("#loyI").attr("checked", true);
      }
      if (data[0].store_rights == "A,B,C,D,E,F,G,H,I,J") {
        $("#COUPON2").attr("checked", true);
      } else {
        $("#COUPON2").attr("checked", false);
      }
      if (data[0].store_rights.match(/A/)) {
        $("#stoA").attr("checked", true);
      }
      if (data[0].store_rights.match(/B/)) {
        $("#stoB").attr("checked", true);
      }
      if (data[0].store_rights.match(/C/)) {
        $("#stoC").attr("checked", true);
      }
      if (data[0].store_rights.match(/D/)) {
        $("#stoD").attr("checked", true);
      }
      if (data[0].store_rights.match(/E/)) {
        $("#stoE").attr("checked", true);
      }
      if (data[0].store_rights.match(/F/)) {
        $("#stoF").attr("checked", true);
      }
      if (data[0].store_rights.match(/G/)) {
        $("#stoG").attr("checked", true);
      }
      if (data[0].store_rights.match(/H/)) {
        $("#stoH").attr("checked", true);
      }
      if (data[0].store_rights.match(/I/)) {
        $("#stoI").attr("checked", true);
      }
      if (data[0].store_rights.match(/J/)) {
        $("#stoJ").attr("checked", true);
      }
      if (data[0].hrms_rights == "A,B,C,D") {
        $("#HRMS2").attr("checked", true);
      } else {
        $("#HRMS2").attr("checked", false);
      }
      if (data[0].hrms_rights.match(/A/)) {
        $("#hrmA").attr("checked", true);
      }
      if (data[0].hrms_rights.match(/B/)) {
        $("#hrmB").attr("checked", true);
      }
      if (data[0].hrms_rights.match(/C/)) {
        $("#hrmC").attr("checked", true);
      }
      if (data[0].hrms_rights.match(/D/)) {
        $("#hrmD").attr("checked", true);
      }
      if (data[0].submit_timecard_rights == "A,B") {
        $("#TIMECARD2").attr("checked", true);
      } else {
        $("#TIMECARD2").attr("checked", false);
      }
      if (data[0].submit_timecard_rights.match(/A/)) {
        $("#timA").attr("checked", true);
      }
      if (data[0].submit_timecard_rights.match(/B/)) {
        $("#timB").attr("checked", true);
      }
      if (data[0].e_order_rights.match(/A/)) {
        $("#erdB").attr("checked", true);
      }
      if (data[0].market_place_rights.match(/A/)) {
        $("#marC").attr("checked", true);
      }
    },
  });
  return false;
});

$("#BACK7").click(function () {
  window.location = base_url + "cashier/settings?d=role";
});

$("#btnUpdateRole").on("click", function () {
  if ($("#editrole").val() == "") {
    $("#erole_err").html("Please enter Role Name").show();
    return false;
  }
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_role",
    data: $(".update_role").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Role updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=role";
      }, 3000);
    },
  });
  return false;
});

$("#tbl_role").on("click", ".deleteRecord", function () {
  $("#delete-role-modal").modal();
  var role_id = $(this).data("id");
  var role_name = $(this).data("name");
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/get_employee_by_role",
    data: { role_id: role_id, role_name: role_name },
    dataType: "json",
    success: function (data) {
      $("#role_tbl").html(data);
    },
  });
});

$(document).on("click", "#btndeleteRole", function () {
  var old_role_id = $(".hidRole_id").val();
  var new_role_id = $(".selectR1").val();
  var count = $('#role_tbl').find('td').eq(1).text();


  if (new_role_id == "" && count != 0) {
    $("#drole_err").html("Please select Role").show();
    return false;
  }
  $.ajax({
    url: base_url + "cashier/delete_role",
    method: "POST",
    data: { old_role_id: old_role_id, new_role_id: new_role_id },
    success: function () {
      $("#delete-role-modal").modal("hide");
      swal({
        title: "Success!",
        text: "Role is deleted successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=role";
      }, 2500);
    },
  });
});

$(document).on("change", ".selectR1", function () {
  var count = $('#role_tbl').find('td').eq(1).text();
  if ($(this).val() == "" && count != 0) {
    $("#drole_err").html("Please select Role").show();
    return false;
  } else {
    $("#drole_err").html("").show();
  }
});

$(document).on("click", "#btnFont", function () {
  var font_size = $("#multi").val();
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/update_fontsize",
    data: { font_size: font_size },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Font size updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=font";
      }, 2500);
    },
  });
  return false;
});

$(document).on("click", "#btnPayroll", function () {
  var font_size = $("#multi").val();
  var pay_period = $("input[name=pay_period]:checked").val();
  var pay_date = $("#pay_date").val();
  if (pay_date == "") {
    $("#paydt_err").html("Please select Pay Day").show();
    return false;
  }
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/update_payroll",
    data: { pay_period: pay_period, pay_date: pay_date },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Payroll settings applied successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=system";
      }, 2500);
    },
  });
  return false;
});

$(document).on("click", "#btncashADV", function () {
  var paycheck_amount = $("#paycheck_amount").val();
  var paychecks = $("#paychecks").val();
  if (paycheck_amount == 0) {
    $("#payamt_err").html("Please enter Max Paycheck Amount").show();
    return false;
  }
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/update_paychecks",
    data: { paycheck_amount: paycheck_amount, paychecks: paychecks },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Cash advance settings updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=cash";
      }, 2700);
    },
  });
  return false;
});

$(document).on("click", "#btnReceipt", function () {
  var cust_msg = $("#custom_msg1").val();
  var new_msg = $("#dropdownMenuButton").text();
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/update_receipt_msg",
    data: { cust_msg: cust_msg, new_msg: new_msg },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Custom receipt message updated!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=receipt";
      }, 2700);
    },
  });
  return false;
});

$(document).on("click", ".delmsg", function () {
  var msg = $(this).prev()[0].innerHTML;
  $(this).parent().remove();

  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/delete_recept_msg",
    data: { msg: msg },
    dataType: "json",
    success: function (data) {
      $("#dropdownMenuButton").text("--Select Custom Message--");
      $(".removeRows").fadeOut(1500);
    },
  });
  return false;
});

$(document).ready(function () {
  // var Role_id = '<?php echo $this->session->userdata["role_id"]?>';
  var Role_id = $("#get_role_id").val();
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/get_permission_store_function",
    data: { Role_id: Role_id },
    dataType: "json",
    success: function (data) {
      // var d = '<?php echo $this->input->get('d') ?>';
      var d = $("#get_id").val();
      if (
        data.store_rights.indexOf("A") == 0 &&
        d != "employee" &&
        d != "general" &&
        d != "category" &&
        d != "role" &&
        d != "system"
      ) {
        $("#div_store_setting_intro").activeClass("active");
        $("#div_user").hide();
        $("#div_key").show();
        $("#div_tax").hide();
        $("#div_general").hide();
        $("#div_pos").hide();
        $("#div_editor").hide();
        $("#div_roles").hide();
        $("#div_system_settings").hide();
        $("#div_card_transaction").hide();
        $("#div_clover_card_transaction").hide();
      } else if (
        data.store_rights.indexOf("B") == 0 &&
        d != "general" &&
        d != "category" &&
        d != "role" &&
        d != "system"
      ) {
        $("#user").toggleClass("active");
        $("#div_user").show();
        $("#div_key").hide();
        $("#div_tax").hide();
        $("#div_general").hide();
        $("#div_pos").hide();
        $("#div_editor").hide();
        $("#div_roles").hide();
        $("#div_system_settings").hide();
        $("#div_card_transaction").hide();
        $("#div_clover_card_transaction").hide();
      } else if (
        data.store_rights.indexOf("C") == 0 &&
        d != "category" &&
        d != "role" &&
        d != "system"
      ) {
        $("#general").toggleClass("active");
        $("#div_user").hide();
        $("#div_key").hide();
        $("#div_tax").hide();
        $("#div_general").show();
        $("#div_pos").hide();
        $("#div_editor").hide();
        $("#div_roles").hide();
        $("#div_system_settings").hide();
        $("#div_card_transaction").hide();
        $("#div_clover_card_transaction").hide();
      } else if (
        data.store_rights.indexOf("D") == 0 &&
        d != "category" &&
        d != "role" &&
        d != "system"
      ) {
        $("#editor").toggleClass("active");
        $("#div_user").hide();
        $("#div_key").hide();
        $("#div_tax").hide();
        $("#div_general").hide();
        $("#div_pos").hide();
        $("#div_editor").show();
        $("#div_roles").hide();
        $("#div_system_settings").hide();
        $("#div_card_transaction").hide();
        $("#div_clover_card_transaction").hide();
      } else if (
        data.store_rights.indexOf("E") == 0 &&
        d != "role" &&
        d != "system"
      ) {
        $("#pos").toggleClass("active");
        $("#div_user").hide();
        $("#div_key").hide();
        $("#div_tax").hide();
        $("#div_general").hide();
        $("#div_pos").show();
        $("#div_editor").hide();
        $("#div_roles").hide();
        $("#div_system_settings").hide();
        $("#div_card_transaction").hide();
        $("#div_clover_card_transaction").hide();
      } else if (data.store_rights.indexOf("F") == 0 && d != "system") {
        $("#roles").toggleClass("active");
        $("#div_user").hide();
        $("#div_key").hide();
        $("#div_tax").hide();
        $("#div_general").hide();
        $("#div_pos").hide();
        $("#div_editor").hide();
        $("#div_roles").show();
        $("#div_system_settings").hide();
        $("#div_card_transaction").hide();
        $("#div_clover_card_transaction").hide();
      } else if (data.store_rights.indexOf("G") == 0) {
        $("#system_settings").toggleClass("active");
        $("#div_user").hide();
        $("#div_key").hide();
        $("#div_tax").hide();
        $("#div_general").hide();
        $("#div_pos").hide();
        $("#div_editor").hide();
        $("#div_roles").hide();
        $("#div_system_settings").show();
        $("#div_card_transaction").hide();
        $("#div_clover_card_transaction").hide();
      } else if (data.store_rights.indexOf("H") == 0) {
        $("#tax").toggleClass("active");
        $("#div_user").hide();
        $("#div_key").hide();
        $("#div_tax").show();
        $("#div_general").hide();
        $("#div_pos").hide();
        $("#div_editor").hide();
        $("#div_roles").hide();
        $("#div_system_settings").hide();
        $("#div_card_transaction").hide();
        $("#div_clover_card_transaction").hide();
      } else if (d == "card_transaction") {
        $("#card_transaction").toggleClass("active");
        $("#div_user").hide();
        $("#div_key").hide();
        $("#div_tax").hide();
        $("#div_general").hide();
        $("#div_pos").hide();
        $("#div_editor").hide();
        $("#div_roles").hide();
        $("#div_system_settings").hide();
        $("#div_card_transaction").show();
      } else if (d == "clover_card_transaction") {
        $("#card_transaction").toggleClass("active");
        $("#div_user").hide();
        $("#div_key").hide();
        $("#div_tax").hide();
        $("#div_general").hide();
        $("#div_pos").hide();
        $("#div_editor").hide();
        $("#div_roles").hide();
        $("#div_system_settings").hide();
        $("#div_card_transaction").hide();
        $("#div_clover_card_transaction").show();
      }
    },
  });
});

$("#rcpt_table").on("click", ".delRcptPro", function () {
  $(this).closest("tr").addClass("removeRows1");
  var coupon_id = $(this).data("id");
  swal({
    text: "Are you sure you want to delete this receipt promotion ?",
    buttons: ["Cancel", true],
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: base_url + "cashier/Cashier/delete_receipt_promotion",
        method: "POST",
        data: { coupon_id: coupon_id },
        beforeSend: function () {
          $("#overlay,.loader").show();
        },
        success: function () {
          $("#overlay,.loader").hide();
          $(".removeRows1").fadeOut(1500);
          window.location = base_url + "cashier/settings?d=receipt";
        },
      });
    }
  });
});

$(".maxpaycheck").on("change", function () {
  var value = $(this).val();
  $("#rangeInput").val(value);
});

$(document).ready(function () {
  var Pay_Period = $("input[name=pay_period]:checked").val();
  if (Pay_Period == "4") {
    $(".weeks").hide();
    $(".months").show();
  } else {
    $(".weeks").show();
    $(".months").hide();
  }
});

$("input[type=radio][name=pay_period]").change(function () {
  var Pay_Period = $("input[name=pay_period]:checked").val();
  if (Pay_Period == "4") {
    $(".weeks").hide();
    $(".months").show();
  } else {
    $(".weeks").show();
    $(".months").hide();
  }
  $(".months").prop("selected", "");
  $(".weeks").prop("selected", "");
});

$("#pay_date").change(function () {
  var pay_date = $(this).val();
  if (pay_date == "") {
    $("#paydt_err").html("Please select Pay Day").show();
    return false;
  } else {
    $("#paydt_err").html("").show();
  }
});

$("#btncashReg").on("click", function () {
  if ($("#start_cash").val() == "" || $("#start_cash").val() == 0) {
    $("#start_err").html("Please enter Start Cash Amount").show();
    return false;
  }
  if ($("#cash_register").val() == "" || $("#cash_register").val() == 0) {
    $("#cash_reg_err").html("Please enter Cash Drop Threshold Value").show();
    return false;
  }
  if ($("#cashback_fee").val() == "" || $("#cashback_fee").val() == 0) {
    $("#cash_back_err").html("Please enter Cash Back Fee").show();
    return false;
  }
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_cashRegister",
    data: $(".add_cashreg").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      $("#cash_register").val(data.cash_register);
      $("#start_cash").val(data.start_cash);
      swal({
        title: "Success!",
        text: "Cash register settings successfully updated!",
        icon: "success",
        buttons: false,
        timer: 2500,
      });
    },
  });
  return false;
});

$(".validate1").bind("change", function () {
  if ($("#start_cash").val() == "" || $("#start_cash").val() == 0) {
    $("#start_err").html("Please enter Start Cash Amount").show();
    return false;
  } else {
    $("#start_err").html("").show();
  }

  if ($("#cash_register").val() == "" || $("#cash_register").val() == 0) {
    $("#cash_reg_err").html("Please enter Cash Drop Threshold Value").show();
    return false;
  } else {
    $("#cash_reg_err").html("").show();
  }

  if ($("#cashback_fee").val() == "" || $("#cashback_fee").val() == 0) {
    $("#cash_back_err").html("Please enter Cash Back Fee").show();
    return false;
  } else {
    $("#cash_back_err").html("").show();
  }
});

$(document).on("click", "#btnScratcher", function () {
  var bins = $("#bins1").val();
  if (bins == 0) {
    $("#scratcher_err").html("Please enter No. of Scratcher Bins").show();
    return false;
  }
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_bins",
    data: { bins: bins },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Scratcher settings updated successfully!",
        icon: "success",
        buttons: false,
        timer: 2700,
      });
      $("#bins1").val(bins);
    },
  });
  return false;
});

$(".btnShift").on("click", function () {
  var username = $(this).data("id");
  var shift_id = $(this).data("shift_id");
  var terminal_id = $(this).data("terminal_id");
  var cash_in_drawer = $(this).data("cash_in_drawer");
  var coin_dispenser = $(this).data("coin_dispenser");
  var bin_data = $(this).data("bin_data");
  var shift_in_out = $(this).data("shift_in_out");
  var defer_shift = $(this).data("defer_shift");
  var shift_date = $(this).data("shift_date");

  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/change_user_shift_status",
    data: {
      username: username,
      shift_id: shift_id,
      terminal_id: terminal_id,
      cash_in_drawer: cash_in_drawer,
      coin_dispenser: coin_dispenser,
      bin_data: bin_data,
      shift_in_out: shift_in_out,
      defer_shift: defer_shift,
      shift_date: shift_date,
    },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Shift logout successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=shift";
      }, 2700);
    },
  });
  return false;
});

$("#BACK66").click(function () {
  $(".POINTS1").show();
  $(".update_point,#BACK66").hide();
});

$("#btnPoint").on("click", function () {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_point",
    data: $(".update_point").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Point updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=point";
      }, 2700);
    },
  });
  return false;
});

$("#btn_outbound").on("click", function () {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_point",
    data: $(".out_point").serialize() + "&point_type_ini=" + 3,
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Point updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=outbound";
      }, 2700);
    },
  });
  return false;
});

$("#btnAbout").on("click", function () {
  var about_store = $("#mytextarea").val();
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/Cashier/update_about_store",
    data: { about_store: about_store },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "About setting updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=about_store";
      }, 2700);
    },
  });
  return false;
});

$("#btnTranscation").on("click", function () {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_card_transaction",
    data: $(".card_transaction").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Card processor settings updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=card_transaction";
      }, 2700);
    },
  });
  return false;
});

$("#active_transaction_type").on("change", function () {
  var method = $(this).val();
  if (method == 1) {
    $(".clover_div").hide();
    $(".bolt_div").show();
  } else if (method == 2) {
    $(".clover_div").show();
    $(".bolt_div").hide();
  }
});

$("#btnTimezone").on("click", function () {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_date_setting",
    data: $(".date_timezone").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Date & Time setting updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=timezone";
      }, 2700);
    },
  });
  return false;
});

$("#tbl_point").on("click", ".deactivate-point", function () {
  var deactive_id = $(this).data("id");
  var status = $(this).data("status");
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/change_point_status",
    data: { deactive_id: deactive_id, status: status },
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      window.location = base_url + "cashier/settings?d=point";
    },
  });
  return false;
});

$("#btnMail").on("click", function () {
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_mail_settings",
    data: $(".mail_settings").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      swal({
        title: "Success!",
        text: "Mail settings updated successfully!",
        icon: "success",
        buttons: false,
      });
      setTimeout(function () {
        window.location = base_url + "cashier/settings?d=mail";
      }, 2700);
    },
  });
  return false;
});
// reciept open
$("#previewReciept").on("click", function () {
  $("#mssg_preview").modal();
  var show_msg = $("#custom_msg1").val();
  if ($("#dropdownMenuButton").text() == "--Select Custom Message--") {
    $(".showhere").text(show_msg);
  } else {
    $(".showhere").text($("#dropdownMenuButton").text());
  }
});

//miscellaneoussection
$("#tbl_miscellaneous").on("click", ".EDIT_MIS", function () {
  var product_id = $(this).data("id");
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/get_miscellaneous_product_by_id",
    data: { id: product_id },
    dataType: "json",
    success: function (data) {
      $("#edit_miscellaneous").modal();
      $("#mis_product_id").val(data.id);
      $("#mis_name").val(data.product_name);
      $("#original_miscellaneous").val(data.product_name);
      $("#mis_price").val(data.product_price);
      if (data.is_taxable == 1) {
        $("#tax_miscellaneous").attr("checked", true);
        $("#tax_miscellaneous").val(1);
      } else {
        $("#tax_miscellaneous").val(0);
        $("#tax_miscellaneous").attr("checked", false);
      }
    },
  });
  return false;
});

$("#tax_miscellaneous").on("click", function () {
  if ($(this).prop("checked") == true) {
    $(this).val(1);
  } else if ($(this).prop("checked") == false) {
    $(this).val(0);
  }
});

$(document).on("click", "#btnMiscellaneous", function () {
  if ($("#mis_name").val() == "") {
    $("#mis_name_err").html("Please enter product name").show();
    return false;
  }
  if ($("#mis_price").val() == "") {
    $("#mis_price_err").html("Please enter price").show();
    return false;
  }
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/update_miscellaneous",
    data: $(".update_miscellaneous").serialize(),
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      if (data == "success") {
        $("#edit_miscellaneous").modal("hide");
        swal({
          title: "Success!",
          text: "Product has been updated successfully!",
          icon: "success",
          buttons: false,
        });
        setTimeout(function () {
          window.location = base_url + "cashier/settings?d=miscellaneous";
        }, 2700);
      } else if (data.name_err != "") {
        $("#mis_name_err").html(data.name_err).show();
        return false;
      }
    },
  });
  return false;
});

$(".inputFile65").bind("change", function () {
  if ($("#mis_name").val() == "") {
    $("#mis_name_err").html("Please enter product name").show();
    return false;
  } else {
    $("#mis_name_err").html("").show();
  }
  if ($("#mis_price").val() == "") {
    $("#mis_price_err").html("Please enter price").show();
    return false;
  } else {
    $("#mis_price_err").html("").show();
  }
});

$("#tbl_miscellaneous").on("click", ".deleteRecord", function () {
  var product_id = $(this).data("id");
  swal({
    text: "Are you sure you want to delete this product ?",
    buttons: ["Cancel", true],
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: base_url + "cashier/delete_miscellaneous_product",
        method: "POST",
        data: { id: product_id },
        beforeSend: function () {
          $("#overlay,.loader").show();
        },
        success: function () {
          $("#overlay,.loader").hide();
          $(".removeRow").fadeOut(1500);
          window.location = base_url + "cashier/settings?d=miscellaneous";
        },
      });
    }
  });
});

$("#add_tax_miscellaneous").on("click", function () {
  if ($(this).prop("checked") == true) {
    $(this).val(1);
  } else if ($(this).prop("checked") == false) {
    $(this).val(0);
  }
});

$(document).on("click", "#addMisceleneous", function () {
  $("#add_miscellaneous").modal();
});

$(document).on("click", "#btnAddMiscellaneous", function () {
  var is_taxable = $("#add_tax_miscellaneous").val();
  if ($("#add_mis_name").val() == "") {
    $("#mis_name1_err").html("Please enter product name").show();
    return false;
  }
  if ($("#add_mis_price").val() == "") {
    $("#mis_price1_err").html("Please enter price").show();
    return false;
  }
  $.ajax({
    type: "ajax",
    method: "post",
    url: base_url + "cashier/add_miscellaneous",
    data: $(".add_Mis_Pro").serialize() + "&is_taxable=" + is_taxable,
    dataType: "json",
    beforeSend: function () {
      $("#overlay,.loader").show();
    },
    success: function (data) {
      $("#overlay,.loader").hide();
      if (data == "success") {
        $("#add_miscellaneous").modal("hide");
        swal({
          title: "Success!",
          text: "Product has been added successfully!",
          icon: "success",
          buttons: false,
        });
        setTimeout(function () {
          window.location = base_url + "cashier/settings?d=miscellaneous";
        }, 2700);
      } else if (data.name_err != "") {
        $("#mis_name1_err").html(data.name_err).show();
        return false;
      }
    },
  });
  return false;
});

$(".inputFile64").bind("change", function () {
  if ($("#add_mis_name").val() == "") {
    $("#mis_name1_err").html("Please enter product name").show();
    return false;
  } else {
    $("#mis_name1_err").html("").show();
  }
  if ($("#add_mis_price").val() == "") {
    $("#mis_price1_err").html("Please enter price").show();
    return false;
  } else {
    $("#mis_price1_err").html("").show();
  }
});

$(document).ready( function(){
  $('#bp1,#bp3,#bp4,.show_img,.hide_img').hide();
  $('#bp2').show();
  $('#lbl_id').val(1);
})

$('.sc1').on('click',function(){
    $('#bp1,#bp3,#bp4,.show_img,.hide_img').hide();
    $('#bp2').show();
    $('#lbl_id').val(1);

    var id = 1;
    $.ajax({
      type: "ajax",
      method: "post",
      url: base_url + "cashier/Cashier/get_label_editor_by_id",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        // $("#3a").val(data.label_font_size);
        $("#1a").val(data.label_height);
        $("#2a").val(data.label_width);
        // $("#4a").val(data.label_image).trigger("change"); //for select

        var editor_height = parseFloat(data.label_height);
        var editor_width = parseFloat(data.label_width);
        var zoom_percent = (editor_height + editor_width);
        var pixcel_height = parseFloat(editor_height * 96 );
        var pixcel_width = parseFloat(editor_width * 96 );

        if($('#lbl_id').val() ==1 ) {
            var barcode = (zoom_percent * 15.84);  //76
            var strike_prc = (zoom_percent - 3.3 );
            var prc = (zoom_percent - 2.5);
            $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
            $(".barimg").css({height: barcode});
            $(".lpc-price").css({fontSize: strike_prc + 'rem'});
            $(".lppc-price").css({fontSize: prc + 'rem'});
        }
      },
    });
    return false;

});

$('.sc2').on('click',function(){
    $('#bp2,#bp3,#bp4').hide();
    $('#bp1,.show_img,.hide_img').show();
    $('#lbl_id').val(2);

    var id = 2;
    $.ajax({
      type: "ajax",
      method: "post",
      url: base_url + "cashier/Cashier/get_label_editor_by_id",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        // $("#3a").val(data.label_font_size);
        $("#1a").val(data.label_height);
        $("#2a").val(data.label_width);
        // $("#4a").val(data.label_image).trigger("change"); //for select

        var editor_height = parseFloat(data.label_height);
        var editor_width = parseFloat(data.label_width);
        var zoom_percent = (editor_height + editor_width);
        var pixcel_height = parseFloat(editor_height * 96 );
        var pixcel_width = parseFloat(editor_width * 96 );

        if ($('#lbl_id').val()==2) {
          var barcode = (zoom_percent * 24.00);
          var strike_prc = (zoom_percent * 0.231 );
          var img = (zoom_percent * 15.40 );
          var prc = (zoom_percent * 0.453);
          var upc_no = (zoom_percent * 133.3);

          $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
          $(".barimg").css({height: barcode});
          $(".lpc-price").css({fontSize: strike_prc + 'rem'});
          $(".lppc-price").css({fontSize: prc + 'rem'});
          $(".imgcon-lbl > img").css({maxHeight: img + 'px'});

          $(".bold").css({fontWeight: upc_no});
        }

      },
    });
    return false;

});

$('.sc3').on('click',function(){
    $('#bp2,#bp1,#bp3,.show_img,.hide_img').hide();
    $('#bp4').show();
    $('#lbl_id').val(4);

    var id = 4;
    $.ajax({
      type: "ajax",
      method: "post",
      url: base_url + "cashier/Cashier/get_label_editor_by_id",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        // $("#3a").val(data.label_font_size);
        $("#1a").val(data.label_height);
        $("#2a").val(data.label_width);
        // $("#4a").val(data.label_image).trigger("change"); //for select

        var editor_height = parseFloat(data.label_height);
        var editor_width = parseFloat(data.label_width);
        var zoom_percent = (editor_height + editor_width);
        var pixcel_height = parseFloat(editor_height * 96 );
        var pixcel_width = parseFloat(editor_width * 96 );

        if ($('#lbl_id').val() == 4) {
            var spl_text = (zoom_percent * 27);
            var strike_prc = (zoom_percent * 0.231 );
            var img = (zoom_percent * 15.40 );
            var prc = (zoom_percent * 0.453);

            $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
            $(".spl-text").css({fontSize: spl_text+ '%'});
            $(".lpc-price").css({fontSize: strike_prc + 'rem'});
            $(".lppc-price").css({fontSize: prc + 'rem'});
            $(".imgcon-lbl > img").css({maxHeight: img + 'px'});
        }

      },
    });
    return false;
});

$('.show_img').on('click',function(){
    $('.sc2').trigger('click');
    $('#lbl_id').val(2);

    var id = 2;
    $.ajax({
      type: "ajax",
      method: "post",
      url: base_url + "cashier/Cashier/get_label_editor_by_id",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        // $("#3a").val(data.label_font_size);
        $("#1a").val(data.label_height);
        $("#2a").val(data.label_width);
        // $("#4a").val(data.label_image).trigger("change"); //for select

        var editor_height = parseFloat(data.label_height);
        var editor_width = parseFloat(data.label_width);
        var zoom_percent = (editor_height + editor_width);
        var pixcel_height = parseFloat(editor_height * 96 );
        var pixcel_width = parseFloat(editor_width * 96 );

        if ($('#lbl_id').val()==2) {
          var barcode = (zoom_percent * 24.00);
          var strike_prc = (zoom_percent * 0.231 );
          var img = (zoom_percent * 15.40 );
          var prc = (zoom_percent * 0.453);
          var upc_no = (zoom_percent * 133.3);

          $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
          $(".barimg").css({height: barcode});
          $(".lpc-price").css({fontSize: strike_prc + 'rem'});
          $(".lppc-price").css({fontSize: prc + 'rem'});
          $(".imgcon-lbl > img").css({maxHeight: img + 'px'});

          $(".bold").css({fontWeight: upc_no});
        }

      },
    });
    return false;

});

$('.hide_img').on('click',function(){
    $('#bp2,#bp3,#bp1,#bp4').hide();
    $('.show_img,.hide_img,#bp3').show();
    $('#lbl_id').val(3);

    var id = 3;
    $.ajax({
      type: "ajax",
      method: "post",
      url: base_url + "cashier/Cashier/get_label_editor_by_id",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        // $("#3a").val(data.label_font_size);
        $("#1a").val(data.label_height);
        $("#2a").val(data.label_width);
        // $("#4a").val(data.label_image).trigger("change"); //for select

        var editor_height = parseFloat(data.label_height);
        var editor_width = parseFloat(data.label_width);
        var zoom_percent = (editor_height + editor_width);
        var pixcel_height = parseFloat(editor_height * 96 );
        var pixcel_width = parseFloat(editor_width * 96 );

        if($('#lbl_id').val()== 3){
            var barcode = (zoom_percent * 24.00);
            var strike_prc = (zoom_percent * 0.231 );
            var prc = (zoom_percent * 0.453);
            var upc_no = (zoom_percent * 133.3);

            $(".first-slabel").css({height: pixcel_height, width :pixcel_width});
            $(".barimg").css({height: barcode});
            $(".lpc-price").css({fontSize: strike_prc + 'rem'});
            $(".lppc-price").css({fontSize: prc + 'rem'});
            $(".bold").css({fontWeight: upc_no});
        }

      },
    });
    return false;



})

var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function () {
    // this.parentElement.querySelector(".nested").classList.toggle("active1");
    this.classList.toggle("caret-down");
  });
}

var toggler = document.getElementsByClassName("caret1");
var i;
for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function () {
    this.parentElement.querySelector(".nested1").classList.toggle("active2");
    this.classList.toggle("caret-down1");
  });
}

var toggler = document.getElementsByClassName("caret2");
var i;
for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function () {
    this.parentElement.querySelector(".nested2").classList.toggle("active3");
    this.classList.toggle("caret-down2");
  });
}

var toggler = document.getElementsByClassName("caret3");
var i;
for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function () {
    this.parentElement.querySelector(".nested3").classList.toggle("active4");
    this.classList.toggle("caret-down3");
  });
}
// keyboard drag code start
$(document).ready(function () {
  var $dragging = null;
  $(document.body).on("mousemove", function (e) {
    if ($dragging) {
      $dragging.offset({
        top: e.pageY,
        left: e.pageX,
      });
    }
  });

  $(document.body).on("mousedown", ".dragkeeb", function (e) {
    $dragging = $(".keyboard.numone");
  });

  $(document.body).on("mouseup", function (e) {
    $dragging = null;
  });

  function doTouch(e) {
    e.preventDefault();
    var touch = e.touches[0];
  }

  function doTouch2(e) {
    e.preventDefault();
    var touch = e.touches[0];
    let r = touch.pageX;
    let w = touch.pageY;
  }

  function doTouch3(e) {
    e.preventDefault();
    var touch = e.touches[0];
  }

  document.addEventListener(
    "touchstart",
    function (e) {
      setTimeout(function () {}, 0);
    },
    false
  );
  const maxMoveLeft = $(window).width();
  const maxMoveRight = $(window).height();
  $(document).on("touchstart", ".dragkeeb", function (e) {
    e.preventDefault();
    $dragging = $(".keyboard.numone");
  });

  $(document).on("touchmove", ".keyboard.numone", function (e) {
    e.preventDefault();
    var xPos = e.originalEvent.touches[0].pageX;
    var yPos = e.originalEvent.touches[0].pageY;
    let spaceTaken = $(".keyboard.numone")[0].getBoundingClientRect();

    $dragging.offset({
      top: yPos,
      left: xPos,
    });
  });

  $(document).on("touchend click", ".cancelkeeb", function (e) {
    $dragging = null;
    e.preventDefault();
    $(".keyboard.numone").hide();
    $(".keyboard.numone").addClass("keyboard--hidden");
    $(".modal").removeClass("moveup");
    $(".modal-dialog").removeClass("moveup");
  });
  function resetKeebPosition() {
    $(".keyboard.numone").css("top", "unset");
    $(".keyboard.numone").css("left", "unset");
    console.log("ths ran");
  }
  $(document).on("touchend click", ".dragkeeb", function (e) {
    $dragging = null;
    e.preventDefault();
    rect = $(".keyboard.numone")[0].getBoundingClientRect();

    if (
      rect.x + rect.width > window.innerWidth ||
      rect.y + rect.height > window.innerHeight
    ) {
      resetKeebPosition();
    }
  });
});


$('#security_number,#security_no').keyup(function() {
    var val = this.value.replace(/\D/g, '');
    val = val.replace(/^(\d{3})/, '$1-');
    val = val.replace(/-(\d{2})/, '-$1-');
    val = val.replace(/(\d)-(\d{4}).*/, '$1-$2');
    this.value = val;
});
