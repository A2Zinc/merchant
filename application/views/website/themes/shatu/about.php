<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$CI =& get_instance();
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
?>
<section class="about_banner">
	<div class="container">
		<div class="about_banner_inner" page-title="est 2020">
			<div class="product_details_banner_left">
				<h2>· About us/</h2>
				   <p>This one changed the way we think of bourbon, all because one man changed the way he thought about making it. Bill Samuels, Sr., simply wanted a whisky he would enjoy drinking.</p>
				   <div class="social_icon">
						<span>Follow us</span>
						<ul>
							<li><a href="#"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
				. '/assets/images/icons/facebook_black.svg' ?>" alt=""/></a></li>
							<li><a href="#"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
				. '/assets/images/icons/twitter_dark.svg' ?>" alt=""/></a></li>
							<li><a href="#"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
				. '/assets/images/icons/instagram_dark.svg' ?>" alt=""/></a></li>
						</ul>
					</div>
			</div>
			<div class="product_about_right">
				<img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
				. '/assets/images/product_component.png' ?>" alt=""/>
			</div>
		</div>
	</div>
</section>

<section class="about_box">
		<div class="container">
			<div class="about-inner">
				<div class="about_left">
					<h3>Who We Are?/</h3>
					<p>Unless you're lining up a bunch of shots, liquor takes a little more work than cracking a beer or pouring a glass of wine. However, the effort is well worth the result if you've picked up the right bottle. Enjoy the sophisticated complexity of whiskey all on its own or create an amazing gin cocktail. Impress your guests with a digestif or get the party started with a batch of margaritas. You can find a different liquor brand or cocktail to suit every occasion. Plus, being able to whip up a delicious cocktail will never not impress your guests.</p>
				</div>
				<div class="about_right">
					<img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
				. '/assets/images/about.png' ?>" alt=""/>
				</div>
			</div>
		</div>
</section>


<section class="team_section">
	<div class="container">
		<div class="section_title">
			<h3>Our Team/</h3>
		</div>
		<div class="team_box_inner">
			<div class="team_box">
				<div class="thumbnail" style="background: url(<?php echo base_url() . 'application/views/website/themes/' . $theme
				. '/assets/images/team-1.png' ?>);">

				</div>
				<h4>Mike Norman/</h4>
			</div>
			<div class="team_box">
				<div class="thumbnail"  style="background: url(<?php echo base_url() . 'application/views/website/themes/' . $theme
				. '/assets/images/team-2.png' ?>);">

				</div>
				<h4>Jesus Cook/</h4>
			</div>
			<div class="team_box">
				<div class="thumbnail"  style="background: url(<?php echo base_url() . 'application/views/website/themes/' . $theme
				. '/assets/images/team-3.png' ?>);">

				</div>
				<h4>Arthur Wagner/</h4>
			</div>
			<div class="team_box">
				<div class="thumbnail"  style="background: url(<?php echo base_url() . 'application/views/website/themes/' . $theme
				. '/assets/images/team-4.png' ?>);">

				</div>
				<h4>Jackson Perez/</h4>
			</div>
		</div>
	</div>
</section>