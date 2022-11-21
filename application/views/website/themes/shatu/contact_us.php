<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
					<h3><?php echo display('get_in_touch')?></h3>
					<p><?php echo display('your_email_address_will_not_be_published')?></p>
				</div>
				<div>
					<?php
					$message = $this->session->userdata('message');
					if (isset($message)) {
						?>
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<?php echo $message ?>
						</div>
						<?php
						$this->session->unset_userdata('message');
					}
					$error_message = $this->session->userdata('error_message');
					if (isset($error_message)) {
						?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<?php echo $error_message ?>
						</div>
						<?php
						$this->session->unset_userdata('error_message');
					}
					?>
					<form class="request_form" action="<?php echo base_url('submit_contact') ?>" method="post">
						<div class="form-group">
							<label><?php echo display('full_name')?></label>
							<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo display('full_name')?>" required>
						</div>
						<div class="form-group">
							<label><?php echo display('email')?></label>
							<input type="email" class="form-control" name="email" id="email" placeholder="<?php echo display('email')?>" required>
						</div>

						<div class="form-group">
							<label><?php echo display('phone_number')?></label>
							<input type="tel" class="form-control"  placeholder="037-573-0315" name="phone_number" id="phone_number" required />  
						</div>
						<div class="form-group">
							<label><?php echo display('message')?></label>
							<textarea class="form-control msg_box" name="message" placeholder="<?php echo display('write_your_msg_here')?> ..."></textarea>
						</div>

						<div class="btn-box">
							<button href="#" class="btn btn-primary"><?php echo display('submit')?></button>
						</div>
					</form>
				</div>
			</div>
			<div class="right_box">
				
			</div>
		</div>
	</div>
</section>
