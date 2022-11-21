<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- /.End of header -->

<?php
$CI =& get_instance();
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
?>

<section class="account_form">
	<div class="container">
		<div class="login_form">
			<div class="left_box">
				<div class="box_title">
					<h3>Registration</h3>
					<p>Let's join with us to get extra voucher discount and updated about new products</p>
				</div>
				<div>
					<form action="<?php echo base_url('user_signup')?>" method="post">
						<?php
						if ($this->session->userdata('message')) {
							$message = $this->session->userdata('message');
							if ($message) {
								?>
								<div class="alert alert-success">
									<strong><?php echo  display('success')?></strong> <?php echo $message?>
								</div>
								<?php
							}
							$this->session->unset_userdata('message');
						}
						?>
						<div class="form-group">
							<label><?php echo display('first_name'); ?></label>
							<input type="text" id="first_name" class="form-control" name="first_name" placeholder="<?php echo display('first_name'); ?>" required>
						</div>
						<div class="form-group">
							<label><?php echo display('last_name'); ?></label>
							<input type="text" id="last_name" class="form-control" name="last_name" placeholder="<?php echo display('last_name'); ?>" required>
						</div>
						<div class="form-group">
							<label><?php echo display('email'); ?></label>
							<input type="email" id="user_email" class="form-control" name="email" placeholder="<?php echo display('email')?>" required />  
						</div>

						<div class="form-group">
							<label><?php echo display('password')?></label>
							<input type="password" id="user_pw" class="form-control"  name="password" placeholder="<?php echo display('password')?>"required />  
						</div>

						<div class="remember_box">
							<input type="checkbox" id="remember" name="remember" value="remember">
							<label> By creating an account you agree to the <a href="#">terms of use</a> and our <a href="#">privacy policy</a></label><br>
						</div>
						<div class="btn-box">
							<button type="submit" class="btn btn-primary" id="create_account_btn"><?php echo display('create_account')?></button>
						</div>
					</form>
				</div>
			</div>
			<div class="right_box">
				<div class="register_form login_box">
					<form action="<?php echo base_url() . 'do_login'; ?>" method="post">
						<div class="box_title">
							<h3><?php echo display('login') ?></h3>
							<p><?php echo display('welcome_back_to_login'); ?></p>
						</div>
						<div class="form-group">
							<label for="user_email_id"><?php echo display('username_or_email'); ?></label>
							<input type="text" id="user_email_id" name="email" class="form-control" placeholder="edward_anderson123@gmail.com" />
						</div>
						<div class="form-group">
							<label><?php echo display('password'); ?></label>
							<input type="password" id="password" class="form-control" name="password" placeholder="PASSWORD" />
						</div>
						<div class="form-group">
							<label class="checkbox_area">
								<input type="checkbox">
								<span class="checkmark"></span>
								<?php echo display('remember_me'); ?>
							</label>
						</div>
						<div class="login_btn">
							<input class="btn btn-primary btn-block" href="<?php echo base_url('login'); ?>" type="submit" value="<?php echo display('login') ?>">
						</div>
						<div class="forgot_link">
							<span><?php echo display('forget_password'); ?> <a href="javascript:void(0);" class="reset_link">Reset here</a></span>
						</div>
					</form>
				</div>
				<div class="register_form forgot_box" style="display:none;">
					<form action="#" method="post">
						<div style="color: red; font-weight: bold;" id="recover_message"></div>
						<div id="loader"><img style="width: 2em; height: 2em;"
											  src="<?php echo base_url('my-assets/image/loader.gif') ?>"
											  alt="">
						</div>
						<div class="box_title">
							<h3><?php echo display('login') ?></h3>
							<p><?php echo display('welcome_back_to_login'); ?></p>
						</div>
						<div class="form-group">
							<label for="forget_email"><?php echo display('email') ?></label>
							<input type="text" name="forget_email" required id="forget_email" class="form-control">
						</div>
						<div class="login_btn">
							<input class="btn btn-primary btn-block" id="forget_password_btn" type="button"
								   value="<?php echo display('reset_password') ?>">
						</div>
						<div class="forgot_link">
							<span><a href="javascript:void(0);" class="login_link"><?php echo display('login'); ?> here</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!--========== Alert Message ==========-->
<div class="login_page">
    <div class="container">
        <div class="row db m0 login_area">
            <?php
            $message = $this->session->userdata('message');
            if (!empty($message)) {
                ?>
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo $message; ?>
                </div>
                <?php
                $this->session->unset_userdata('message');
            }
            ?>
            <?php
            $error_message = $this->session->userdata('error_message');
            if ($error_message) {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo $error_message ?>
                </div>
                <?php
                $this->session->unset_userdata('error_message');
            }
            ?>
        </div>
    </div>
</div>
<!--========== Alert Message ==========-->
<!--=========for show and hide login dropdown===========-->
<script>
    $(document).ready(function () {
        $('.already_member,.hnav-li').on('click',function () {
            $('.user-register').show();
        });
		$('.login_link').on('click',function () {
            $('.forgot_box').hide();
            $('.login_box').show();
        });
		$('.reset_link').on('click',function () {
            $('.login_box').hide();
            $('.forgot_box').show();
        });
    });
</script>
<script>
    // ===========prevent page reload and click to the submit in forget password section==============
    $('#loader').hide();
    $("#forget_email").keypress('keyup', function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            document.getElementById("forget_password_btn").click();
            $("#recover_message").html('');
            $('#loader').show();
        }
    });
    //========================for recover email =======================
    $(document).ready(function () {
        $('#forget_password_btn').on('click', function () {
            var forget_email = $("input[name=forget_email]").val();
            $("#recover_message").html('');
            $('#loader').show();
            $.ajax({
                type: "post",
                async: true,
                dataType: "json",
                url: '<?php echo base_url('forget_password')?>',
                data: {email: forget_email},
                success: function (data) {
                    $('#loader').hide();
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
        });
    });
    $('.page-wrapper').css({'background':'#fff'});
</script>