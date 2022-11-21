<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Signin - LWT POS System</title>
    <link rel="stylesheet" href="<?=base_url('assets/')?>core/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>style/customstyle.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>style/dashboard.scss">
    <link href="<?=base_url('assets/')?>icon/fontawesome/css/all.css" rel="stylesheet">
    <!-- <link href="https://db.onlinewebfonts.com/c/860c3ec7bbc5da3e97233ccecafe512e?family=Circular+Std+Book" rel="stylesheet" type="text/css"/> -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body class="signback">
    <div class="container">
        
        <!-- Control the column width, and how they should appear on different devices -->
        <div class="signlogo">
          <img src="<?=base_url('assets/')?>images/Liquor-011.png">
          
                  </div>
        <div class="row ">
            <div class="col-sm-6  offset-md-3">
                <?php
    $message = $this->session->userdata('message');
    if (isset($message)) {
        ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message ?>
        </div>
        <?php
        $this->session->unset_userdata('message');
    }
    $error_message = $this->session->userdata('error_message');
    if (isset($error_message)) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error_message ?>
        </div>
        <?php
        $this->session->unset_userdata('error_message');
    }
    // $CI =& get_instance();
    // $CI->load->model('Soft_settings');
    // $setting_detail = $CI->Soft_settings->retrieve_setting_editdata();
    $setting_detail[0]['captcha']=1;
    ?>
                <div class="signupcard">

                    <div class="mb20">
                        <h4 class="dinlineblock signin_heading">Sign In</h4>
                        <p class="dinlineblock floatr forgotp"><a class="forgotp" id="forgot_pass" href="javascript:void(0)">Forgot Password?</a></p>
                    </div>

                    <?php echo form_open('adminlogin/merchant_do_login', array('id' => 'validate','class' => 'formaction')) ?>

                    <div class="form-group mb24" style="display: none;">
                        <label class="customlabel" for="usr">User Type</label>

                        <select  class="form-control" id='change_user_type'>
                            <option value="merchant">Merchant</option>
                            <option value="store">Store</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb24" id='user_db_session_div' style="display: none;">    
                        <label class="customlabel" for="usr">Select Store</label>
                        <select name="user_db_session" id='user_db_session' class="form-control" >
                            <?php 

                            foreach ($stores as $key => $value) { ?>
                                    <option value="<?php echo $value['store_db'] ?>"><?php echo $value['store_name'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group mb24">
                        <label class="customlabel" for="usr">Username</label>

                        <input type="text" placeholder="Please enter your username" name="username" class="form-control custom_input" id="usr">
                    </div>
                    <div class="form-group mb24">
                        <label class="customlabel" for="usr">Password</label>
                        <div class="input-group input-focus">
                            <input placeholder="********"  id="password-field" type="password" class="form-control custom_input" name="password" >
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <button type="submit" class="btn btn-block custombtn">Login</button>
                    </div>
                    <?php if ($setting_detail[0]['captcha'] == 0 && $setting_detail[0]['site_key'] != null && $setting_detail[0]['secret_key'] != null) { ?>
                        <div style="margin-bottom: 10px" class="g-recaptcha"
                             data-sitekey="<?php if (isset($setting_detail[0]['site_key'])) {
                                 echo $setting_detail[0]['site_key'];
                             } ?>">
                        </div>
                    <?php } ?>
                    <?php echo form_close() ?>
                </div>
            </div>

        </div>
        <br>

    </div>
        <div class="clearfix" style="clear: both;"></div>

    <!-- <div class="container signfooterdiv">
        <div class="row">
            <div class="col-sm-6  offset-md-3">
                <div style="text-align: center;">
                    <p class="signcopyright">© Copyright Liquor Wine Time 2020.</p>
                    <p class="signcopyright">All rights reserved</p>
                </div>

            </div>

        </div>
    </div>
 -->
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
         
          <div class="modal-body modalscroll">
            <div class="container">
              <div class="row">
                <div class="col-md-12 mt-2 mb-3 ">
                 <center><img src="<?=base_url('assets/images/sign.png')?>" class="img-fluid"></center>
                 <h5 class="text-center">FORGET PASSWORD</h5>

                </div>
                <div class="col-md-12">
                <form action="" method="post" id="forgot_pass_form"> 
                  <div class="form-group">
                    <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Email</label>
                   <input type="email" name="admin_email" id="email" class="form-control" onkeyup="ValidateEmail();">
                   <span class="errors" id="email_err" style="color:red; font-size:14px"></span>
                  </div>
                  <button type="submit" class="btn btn-block custombtn" id="forgot">Submit</button>
                </form>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/')?>core/bootstrap/dist/js/bootstrap.js"></script>
<script>
    function pageRedirect() {
      window.location.href = "dashboard.html";
    }      
</script> 
<script>
$(document).ready(function(){
    $('#change_user_type').change(function(){
        var change_user_type=$(this).val();
        if(change_user_type=='merchant'){

            $('#user_db_session').append('<option value="super_admin">Super admin</option>');
            $('#user_db_session').val('super_admin');
            $('#user_db_session_div').hide();
            $('.formaction').attr('action','<?= base_url() ?>adminlogin/merchant_do_login');            
        } else{
            $('#user_db_session').val('');
            $("#user_db_session option[value='super_admin']").remove();
             $('#user_db_session_div').show();
            $('.formaction').attr('action','<?= base_url() ?>admin_dashboard/do_login');

        }
    })
})
    $(".toggle-password").click(function() {

$(this).toggleClass("fas fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
</script>
<!-- Admin login area end -->
<script>


    $('#password').keypress(function (e) {
        if (e.which == 13) {
            $('form#validate').submit();
            return false;    
        }
    });

    $('#loader').hide();
    $('#forget_password_form').hide();
    $('#forget_password_button').on('click', function () {
        $('#login_form').remove();
        $('#login_button').remove();
        $('#forget_password_form').show();
        $('#submit_button').show();
    });

    $('#forgot_pass').on('click', function () {
        $('#forgotModal').modal('show');
    });

    $('#forgot').on('click',function (e) {
        e.preventDefault();
        var admin_email = $("#email").val();
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if(admin_email != '' && expr.test(admin_email)){
            $('#email_err').html('').show();
        }else{
            $('#email_err').html('Please enter registered email').show();     
            return false;
        } 
        
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url("Admin_dashboard/forget_admin_password");?>',
            data: {admin_email:admin_email},
            async: false,
            dataType: 'json',    
            success: function (data) {
                console.log(data);
                $('#forgotModal').modal('hide');
                if (3 == data) {
                    $("#recover_message").html("<?php echo display('this_email_not_exits')?>");
                    $("input[name=forget_email]").css({"border-color": "red"});
                    return false;
                }
                if (1 == data) {
                    $("#recover_message").html("<?php echo display('you_have_receive_a_email_please_check_your_email')?>").css({"color": "green"});
                    $("input[name=forget_email]").css({"border-color": "#dedede"});
                }
                if (2 == data) {
                    $("#recover_message").html("<?php echo display('email_not_send')?>");
                }
                if (4 == data) {
                    $("#recover_message").html("<?php echo display('please_try_again')?>");
                }
            }
        });
    })
</script>
<script>
    //always outside imp
        function ValidateEmail() {
            var email = $("#email").val();
            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (!expr.test(email)) {
                $('#email_err').html('Please enter valid email').show();
                return false;
            }else{
                $('#email_err').html("").show();
            }
        }
    </script>
</html>