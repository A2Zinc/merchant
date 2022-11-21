<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$CI =& get_instance();
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
?>
<section class="thank_you_section">
	<div class="container">
		<div class="thankyou_inner">
			<img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
                        . '/assets/images/thankyou.png'; ?>" alt=""/>
			<h4>Thank you for your order!</h4>
			<p>An invoice has been sent by email, you should received soon.</p>
			<span>Order number : <?php echo $order_number; ?></span>
			<a href="<?php echo base_url(); ?>" class="btn btn-primary">Go to Homepage</a>
		</div>
	</div>            
</section>