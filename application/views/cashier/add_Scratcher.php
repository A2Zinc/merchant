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
            <h5 class="mainline ml-3 mt-3" >Scratcher Management</h5>
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
                            <p>Add New Scratcher</p>
                        </div>
                    </div>

                    <form action="" method="post" class="add_scratcher" autocomplete="off">
                        <!-- cardheader -->
                        <div class="customcardbody">
                            <div class="container mb25">
                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel" for="">Game Name *</label>
                                            <input type="text" class="form-control customcardinput" id="game_name" name="game_name" aria-describedby="" placeholder="Enter Game Name">
                                            <span class="errors" id="game_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Price *</label>
                                             <div style="position:relative;" ><span class="prefix">$</span>
                                        <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput" id="price_per_ticket" aria-describedby="" name="price"  placeholder=" Enter Price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></div>
<!--                                            <input type="text" class="form-control customcardinput " id="price_per_ticket" name="price_per_ticket" aria-describedby="" placeholder="Enter Ticket Price" maxlength="14" >-->
                                            <span class="errors" id="price_err" style="color:red; font-size:14px"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">UPC *</label>
                                     <input type="tel"  onClick="this.select();" class="form-control customcardinput" id="upc" aria-describedby="" name="upc"  placeholder=" Enter UPC" ></div>
                                           <span class="errors" id="upc_err" style="color:red; font-size:14px"></span>
                                        </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="customcardlabel">Bin *</label>
                                    <input type="tel"  onClick="this.select();" class="form-control customcardinput" id="bin_data" aria-describedby="" name="bin_data"  placeholder=" Enter Bin" ></div>
                                     <span class="errors" id="bin_err" style="color:red; font-size:14px"></span>
                                     </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="customcardlabel">Expiry *</label>
                                    <input type="date"  onClick="this.select();" class="form-control customcardinput" id="expiry" aria-describedby="" name="expiry"  placeholder=" Enter Expiry" ></div>
                                     <span class="errors" id="expiry_err" style="color:red; font-size:14px"></span>
                                    </div>
                                    <div class="col-md-6">
                                     <div class="form-group">
                                    <label class="customcardlabel">Payout Prize *</label>
                                    <div style="position:relative;" ><span class="prefix">$</span>
                                    <input type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" class="form-control customcardinput" id="payout_prize" aria-describedby="" name="payout_prize"  placeholder="   Winning Amount" oninput="  this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></div>
                                    <span class="errors" id="payout_err" style="color:red; font-size:14px"></span>
                                    </div>
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
                var game_name = $('#game_name').val();
                if ($('#game_name').val() == '') {
                    $("#game_err").html("Please enter Game Name").show();
                    return false;
                }
                if ($('#price_per_ticket').val() == '') {
                    $("#price_err").html("Please enter Price").show();
                    return false;
                }
               if ($('#upc').val() == '') {
                    $("#upc_err").html("Please enter UPC").show();
                    return false;
                }
                 if ($('#bin').val() == '') {
                    $("#bin_err").html("Please enter Bin").show();
                    return false;
                }
                if ($('#expiry').val() == '') {
                    $("#expiry_err").html("Please enter Expiry").show();
                    return false;
                }
               if ($('#payout_prize').val() == '') {
                    $("#payout_err").html("Please enter Payout Prize").show();
                    return false;
                }
             $.ajax({
                        type: 'ajax',
                        method: 'post',
                        url: '<?= base_url("cashier/Cashier/insert_scratcher"); ?>',
                        data: $('.add_scratcher').serialize(),
                         async: false,
                         dataType: 'json',
                        success: function(data) {
                            $('.add_scratcher')[0].reset();
                            if(data == 'success'){
                                swal({
                                  title: "Success!",
                                  text: "Scratcher is Successfully Inserted",
                                  icon: "success",
                                  buttons: false,
                                });
                            }
                            setTimeout(function() {
                                window.location = '<?= base_url('cashier/Cashier/Scracherlist') ?>';
                            }, 1600);
                        },

                    });
                    return false;
                //}

            });


        //});

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
          var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("expiry")[0].setAttribute('min', today);
        </script>
    <script>
        var jq = $.noConflict();
        jq(document).ready(function(){
          jq('.mobileimg').on('click', function(){

            jq('input[name=module]').val('pos');
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

    <script>
        $('.customcardinput').bind('change', function() {

        if ($('#game_name').val() == '') {
                    $("#game_err").html("Please enter Game Name").show();
                    return false;
                } else {
                $("#game_err").html("").show();
            }
                if ($('#price_per_ticket').val() == '') {
                    $("#price_err").html("Please enter Price").show();
                    return false;
                }
                else {
                $("#price_err").html("").show();
            }
               if ($('#upc').val() == '') {
                    $("#upc_err").html("Please enter UPC").show();
                    return false;
                }
                 else {
                $("#upc_err").html("").show();
               }

                 if ($('#bin_data').val() == '') {
                    $("#bin_err").html("Please enter Bin").show();
                    return false;
                }
                 else {
                $("#bin_err").html("").show();
               }
                if ($('#expiry').val() == '') {
                    $("#expiry_err").html("Please enter Expiry").show();
                    return false;
                }
                 else {
                $("#expiry_err").html("").show();
               }
               if ($('#payout_prize').val() == '') {
                    $("#payout_err").html("Please enter Payout Prize").show();
                    return false;
                }
                 else {
                $("#payout_err").html("").show();
               }
        </script>
