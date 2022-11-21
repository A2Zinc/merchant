<style>
    .multiselect.dropdown-toggle.custom-select{
        width: 100%;
        height: 60px;
    margin-top: 0.1em;
    }
    .multiselect-native-select > .btn-group{
        width: 100%;
    }
    .dropdown-menu.show{
    width: 100%;
}
</style>
<body class="signback1">

    <div class="containermain2">
        <div class="row m">
            <!-- <div class="col-md-8  col-xs-4 col-sm-6"> -->
            <div class="logobar ">
              <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
              <?php }else{?>
                <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
              <?php }?>
            </div>
            <!-- </div> -->


            <div class="gg">
                <a class='aforback' href="<?= base_url('cashier/list_supplier') ?>"><button class="bckbtn">
                        <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
                    </button> </a>
                <!-- <div class="col-md-1 col-xs-6 col-sm-6"> -->
                <div>
                     <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg"></a>
                </div>
                <!-- </div> -->

                <!-- <div class="col-md-3 col-xs-6 col-sm-6"> -->
                <div class="mainscreen">
                    <a href="<?php echo base_url(); ?>cashier">
                        <p class="maindes">MAIN SCREEN</p>
                    </a>

                </div>
            </div>

        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-9">
            <h5 class="mainline ml-3 mt-3" >Lottery Management</h5>
        </div>
        <div class="col-md-3">
            <button class="save-data" id="btnSave">Save Information
                <img src="<?php echo base_url(); ?>assets/images/Vector (8).png" alt="" class="pl-2 ">
            </button>
        </div>
    </div>

    <!-- main-content -->
    <div class="container-fluid mt20">
        <div class="row">
            <div class="col-md-12">
                <div class="customcard">
                    <div class="customcardheader1">
                        <div class="row">
                            <p>Add New Lottery</p>
                        </div>
                    </div>

                    <form action="" method="post" class="add_lottery" autocomplete="off">
                        <!-- cardheader -->
                        <div class="customcardbody">
                            <div class="container mb25">
                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Lottery Name *</label>
                                            <input type="text" class="form-control customcardinput" id="lottery_name" name="lottery_name" aria-describedby="" placeholder="Enter Lottery Name">
                                            <span class="errors" id="lottery_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Price Per Ticket *</label>
                                             <div style="position:relative;" ><span class="prefix">$</span>
                                        <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput" id="price_per_ticket" aria-describedby="" name="price_per_ticket" maxlength="7" placeholder="  Price Per Ticket" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></div>
<!--                                            <input type="text" class="form-control customcardinput " id="price_per_ticket" name="price_per_ticket" aria-describedby="" placeholder="Enter Ticket Price" maxlength="14" >-->
                                            <span class="errors" id="price_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Draw Date *</label>
                                            <input type="date" class="form-control customcardinput" id="draw_date" name="draw_date" aria-describedby="" placeholder="Enter Draw Date" >
                                            <span class="errors" id="draw_date_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
<!--                                      <div class="container">

                                    <div class="ADD_more">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Winning Amount *</label>
                                             <div style="position:relative;" ><span class="prefix">$</span>
                                        <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput" id="winning_amount" aria-describedby="" name="winning_amount"  placeholder="   Winning Amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></div>
                                            <input type="text" class="form-control customcardinput" id="winning_amount" name="winning_amount" aria-describedby="" placeholder="Enter Winning Amount">
                                            <span class="errors" id="win_amt_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="customcardlabel">Winning Title *</label>
                                            <input type="text" class="form-control customcardinput" id="draw_date" name="draw_date" aria-describedby="" placeholder="Enter Winning Title" onkeyup="ValidateEmail();">
                                            <span class="errors" id="draw_date_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    </div>  </div>-->
                                    <div class="container">

                                        <div class="item-apend">
                                         <?php $random = rand(0,9999);?>
                                            <input type="hidden" name="combo_row[]" value="<?=$random?>" >
                                            <div class="row">
                                                <div class="col-md-4">
                                                 <div class="form-group">
                                                     <label class="customcardlabel" for="">Winning Title </label>
                                                     <input type="text" name="winning_title_<?=$random?>" class="form-control customcardinput inpt" id="btn_name" aria-describedby="" placeholder="Please enter Winning Title" maxlength="20">
                                                     <span class="errors" id="btn_err" style="color:red; font-size:14px"></span>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                 <div class="form-group">
                                                     <label class="customcardlabel" for="">Winning Price </label>
                                                     <div class="position-relative">
                                                         <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                                                         <input type="text" name="winning_price_<?=$random?>" class="form-control customcardinput inpt" id="prc" aria-describedby="" placeholder="Please enter Winning Price" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                     </div>
                                                     <span class="errors" id="prc_err" style="color:red; font-size:14px"></span>
                                                   </div>
                                                </div>
                                              </div><!-- row -->
                                         <!-- <div class="col-md-1" style="margin-top:-42px;,margin-bottom:31px;"> -->

                                       <!-- </div> -->
                                     </div><br>
                                      <button type="button" style="margin-top:-42px;margin-bottom:31px; background: #21634b;color: White;" class="btn btn-light apend_button add_button" href="javascript:void(0);">Add More</button>
                                             </div>

                                </div>
                                </div>
 </div>
                            <!-- cardbody -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
         $('#btnSave').on('click', function() {
                var lottery_name = $('#lottery_name').val();
                var email = $('#cemail').val();
                if ($('#lottery_name').val() == '') {
                    $("#lottery_err").html("Please enter Lottery Name").show();
                    return false;
                }
//                if (name_state == false) {
//                    $("#fname_err").html("This Supplier Name is already exist").show();
//                    return false;
//                }
                if ($('#price_per_ticket').val() == '') {
                    $("#price_err").html("Please enter Price Per Ticket.").show();
                    return false;
                }
               if ($('#draw_date').val() == '') {
                    $("#draw_date_err").html("Please enter Draw Date").show();
                    return false;
                }
//                if ($('#winning_amount').val() == '') {
//                    $("#win_amt_err").html("Please enter winning Amount").show();
//                    return false;
//                }
                //if (name_state == true) {
                    $.ajax({
                        type: 'ajax',
                        method: 'post',
                        url: '<?= base_url("cashier/Cashier/insert_lottery"); ?>',
                        data: $('.add_lottery').serialize(),
                         async: false,
                         dataType: 'json',
                        success: function(data) {
                            $('.add_lottery')[0].reset();
                            if(data == 'success'){
                                swal({
                                  title: "Success!",
                                  text: "Lottery is Successfully Inserted",
                                  icon: "success",
                                  buttons: false,
                                });
                            }
                            setTimeout(function() {
                                window.location = '<?= base_url('cashier/Cashier/Lotterylist') ?>';
                            }, 1600);
                        },

                    });
                    return false;
                //}

            });


        //});

        var maxField = 6; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.item-apend'); //Input field wrapper

  var x = 1; //Initial field counter is 1

  //Once add button is clicked
  $(addButton).click(function () {
    var randoMID = Math.floor(1000 + Math.random() * 9000);
      //Check maximum number of input fields
      if (x < maxField) {
          x++; //Increment field counter

          var fieldHTML =
              '<input type="hidden" name="combo_row[]" value="'+randoMID+'" ><div class="row"> <div class="col-md-4"> <div class="form-group"> <label class="customcardlabel" for="">Winning Title</label> <input type="text" name="winning_title_'+randoMID+'" class="form-control customcardinput inpt" id="" aria-describedby="" placeholder="Please enter Winning Title" maxlength="20"> </div></div><div class="col-md-4"> <div class="form-group"> <label class="customcardlabel" for="">Winning Amount</label> <div class="position-relative"><span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span><input type="text" name="winning_price_'+randoMID+'" class="form-control customcardinput inpt" id="" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();"  aria-describedby="" placeholder="Please enter Winning Amount"> </div></div></div><div class="col-md-1"> <button type="button" style="margin-top:20px;background: #21634b;color:white;" class="btn btn-light apend_button removeNominee">Remove</button> </div></div>'; //New input field html
          $(wrapper).append(fieldHTML); //Add field html
      }
  });

  //Once remove button is clicked
  $(wrapper).on('click', '.removeNominee', function (e) {
      e.preventDefault();
      $(this).parent().parent().remove(); //Remove field html
      x--; //Decrement field counter
  });
    </script>
    <script>
        $('.customcardinput').bind('change', function() {
            if ($('#lottery_name').val() == '') {
                $("#lottery_err").html("Please enter Lottery Name").show();
                return false;
            } else {
                $("#lottery_err").html("").show();
            }
            if ($('#price_per_ticket').val() == '') {
                $("#price_err").html("Please enter Price Per Ticket.").show();
                return false;
            } else {
                $("#price_err").html("").show();
            }
            if ($('#draw_date').val() == '') {
                $("#draw_date_err").html("Please Select Draw Date").show();
                return false;
            } else {
                $("#draw_date_err").html("").show();
            }

            if ($('#winning_amount').val() == '') {
                $("#win_amt_err").html("Please enter Winning Amount").show();
                return false;
            } else {
                $("#win_amt_err").html("").show();
            }


        });
       $('#btnCategory').on('click', function(){
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
        if($('#btn_name').val() == ''){
          $('#btn_err').html('Please enter Button Name').show();
          return false;
        }
        if($('#prc').val() == ''){
          $('#prc_err').html('Please enter Price').show();
          return false;
        }

        // if(cat_state == true){
          $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?=base_url("cashier/Cashier/add_category_btn");?>',
              data: $('.addCAT').serialize(),
              async: false,
              dataType: 'json',
              success: function(data){
                console.log(data);
                if(data == 'success'){
                    swal({
                        title: "Success!",
                        text: "Custom Category Buttons successfully Created",
                        icon: "success",
                        buttons: false,
                        timer: 3000,
                    });


                }
                setTimeout( function (){
                    window.location = '<?=base_url('cashier/settings?d=category')?>';
                },2500);

              },

          });
          return false;
        // }

    });

    </script>
   <link href="<?php echo base_url() ?>/assets/style/hummingbird-treeview.css" rel="stylesheet" type="text/css">
    <style>
        .stylish-input-group .input-group-addon {
            background: white !important;
        }

        .stylish-input-group .form-control {
            /* border-right:0; */
            box-shadow: 0 0 0;
            border-color: #ccc;
        }

        .stylish-input-group button {
            border: 0;
            background: transparent;
        }

        .hummingbird-treeview ul:not(.hummingbird-base) {

            padding-left: 15px;
        }
    </style>
    <script>
        var jq = $.noConflict();
        jq(document).ready(function(){
          jq('.mobileimg').on('click', function(){

            jq('input[name=module]').val('posterminal');
            jq('front-login').modal();
          });
        });
         var today = new Date().toISOString().split('T')[0];
document.getElementsByName("draw_date")[0].setAttribute('min', today);
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/style/bootstrap-multiselect.css" type="text/css">

    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/core/bootstrap-multiselect.js"></script>
    <style type="text/css">
        /*.multiselect {
            width: 545px;
            height: 50px;
        }*/
    </style>
