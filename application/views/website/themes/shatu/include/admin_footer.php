<?php defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->model('Web_settings');
$CI->load->model('Pay_withs');
$CI->load->model('Companies');
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
$pay_withs = $CI->Pay_withs->pay_with_list_for_homepage();
$company_info = $CI->Companies->company_list();
?>
<footer>
	<div class="container">
		<div class="footer">
			<div class="footer_about">
				<a href="#">Liquor/
					Ecommerce</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<ul class="social_icon">
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
				</ul>
			</div>
			<div class="footer_nav">
				<h4>Navigate</h4>
				<ul>  
					<li><a href="#">Home</a></li>
					<li><a href="#">About us</a></li>
					<li><a href="#">Blogs</a></li> 
					<li><a href="#">Testimonial</a></li>
				</ul>
			</div>
			<div class="footer_nav">
				<h4>Shop Selection</h4>
				<ul>
					<li><a href="#">Beer</a></li>
					<li><a href="#">Liquor</a></li>
					<li><a href="#">Whiskey</a></li>
					<li><a href="#">Kegs</a></li>
					<li><a href="#">Specials</a></li>
				</ul>
			</div>
			<div class="footer_nav">
				<h4>Customer Care</h4>
				<ul>
					<li><a href="#">My Account</a></li>
					<li><a href="#">My Wishlist</a></li>
					<li><a href="#">Help/FAQ</a></li>
					<li><a href="#">Locations</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

