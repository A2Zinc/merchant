<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
?>

<!-- /.End of page breadcrumbs -->

<?php
$default_currency_id = $this->session->userdata('currency_id');
$currency_new_id = $this->session->userdata('currency_new_id');
if (empty($currency_new_id)) {
    $result = $cur_info = $this->db->select('*')
        ->from('currency_info')
        ->where('default_status', '1')
        ->get()
        ->row();
    $currency_new_id = $result->currency_id;
}

if (!empty($currency_new_id)) {
    $cur_info = $this->db->select('*')
        ->from('currency_info')
        ->where('currency_id', $currency_new_id)
        ->get()
        ->row();

    $target_con_rate = $cur_info->convertion_rate;
    $position1 = $cur_info->currency_position;
    $currency1 = $cur_info->currency_icon;
}
?>
	<section class="product_details_banner">
		<div class="container">
			<div class="product_details_banner_inner" page-title="est 2020">
				<div class="product_details_banner_left">
					<h2><?php echo $product_name ?></h2>
						<span class="price">
						<?php
						   if ($target_con_rate > 1) {
							   $price = $price * $target_con_rate;
							   echo(($position1 == 0) ? $currency1 . " " . number_format($price, 2, '.', ',') : number_format($price, 2, '.', ',') . " " . $currency1);
						   }

						   if ($target_con_rate <= 1) {
							   $price = $price * $target_con_rate;
							   echo(($position1 == 0) ? $currency1 . " " . number_format($price, 2, '.', ',') : number_format($price, 2, '.', ',') . " " . $currency1);
						   }
						?>
						</span>
						<div class="category_basic">
							<div class="size">3.2 OZ</div>
							<div class="qty">96 ML</div>
						</div>
					   <div class="details-wrap">
							<div class="details-box">
								<label>Category</label>
								<span><?php  echo $category_name; ?></span>
							</div>
							<div class="details-box">
								<label>ABV</label>
								<span>45%</span>
							</div>
							<div class="details-box">
								<label>Region</label>
								<span>Kentucky, United States</span>
							</div>
					   </div>
						<p><?php echo character_limiter(strip_tags($product_details), 200); ?></p>
						<div class="social_icon">
                            <span>Share</span>
							<!-- AddToAny BEGIN -->
							<ul class="a2a_kit a2a_kit_size_32 a2a_default_style">
								<li><a class="a2a_button_facebook"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
							. '/assets/images/icons/facebook_black.svg' ?>" alt=""/></a></li>
								<li><a class="a2a_button_twitter"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
							. '/assets/images/icons/twitter_dark.svg' ?>" alt=""/></a></li>
								<li><a class="a2a_button_pinterest"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
							. '/assets/images/icons/twitter_dark.svg' ?>" alt=""/></a></li>
							</ul>
							<script async src="https://static.addtoany.com/menu/page.js"></script>
						</div>
						<a href="#" onclick="cart_btn(<?php echo $product_id ?>)" class="btn btn-primary btn-md btn-block"><?php echo display('add_to_cart') ?></a>
				</div>
				<div class="product_details_banner_right product-media media-horizontal">
					<div class="product_details_image image_preview_container images-large">
						<img id="img_zoom" data-zoom-image="<?php echo base_url().$image_large_details ?>" src="<?php echo base_url().$image_large_details ?>" alt="">
					</div>
					<div class="product_smaller product_preview images-small">
						<ul class="product-slider owl-carousel thumbnails_carousel" id="thumbnails"  data-nav="true" data-dots="false" data-margin="10" data-responsive='{"0":{"items":6},"480":{"items":6},"600":{"items":6},"768":{"items":6}}'>
							<li><a href="#" data-image="<?php echo base_url().$image_large_details ?>" data-zoom-image="<?php echo base_url().$image_large_details ?>">
								<img src="<?php echo base_url().$image_large_details ?>" data-large-image="<?php echo base_url().$image_large_details ?>" alt="image">
							</a></li>
							<?php
							if ($product_gallery_img) {
								foreach ($product_gallery_img as $gallery) {
									?>
									<li><a href="#" data-image="<?php echo base_url() . $gallery->image_url; ?>"
									   data-zoom-image="<?php echo base_url() . $gallery->image_url; ?>">
										<img src="<?php echo base_url() . $gallery->image_url; ?>"
											 data-large-image="<?php echo base_url() . $gallery->image_url; ?>"
											 alt="image">
									</a></li>
									<?php
								}
							}
						   ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="category_wrap">
		<div class="container">
			<div class="section_title">
				<h2>Featured Products/</h2>
			</div>
			<div class="category_section_inner">
				<ul class="tabs_head">
				<?php 
				if(!empty($category_list)) {
						foreach($category_list as $proCategory) {
					 ?>
					<li class="categoryBtn" data-id="<?= !empty($proCategory->category_id) ? $proCategory->category_id : ''  ?>"><a href="javascript:void(0)"><?= !empty($proCategory->category_name) ? $proCategory->category_name : ''  ?>/</a></li>
				   
					<?php } }?>
				</ul>
				<div class="tabs_content">
					<div class="cat_product" id="beer">
						<div class="cat_product_section appendSection">
						  
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="feedback_section">
		<div class="container">
			<div class="section_title">
				<h2>Review Product/</h2>
			</div>
			<div class="feedback_inner">
				<?php
				if($review_list){
				foreach($review_list as $key=>$review_item) { ?>
					<div class="feedback_box" style="display:<?php echo ($key > 4 ? 'none' : 'block'); ?>">
						<div class="user_thumbnail" style="background: url(<?php echo base_url() . 'application/views/website/themes/' . $theme
							. '/assets/images/user.png' ?>);">

						</div>
						<div class="feedback_quote">
							<div class="quote_user_details">
								<h4><?php echo ucfirst($review_item->customer_name);  ?></h4>
								<span><?php
								   $comment_date= date_create($review_item->date_time);
									echo date_format($comment_date, 'd F Y');
								?></span>
							</div>
							<div class="rating">
								<ul>
									<?php
									$rating = ($review_item->rate ? $review_item->rate : 0);
									$blank = 5 - $rating;
									for($i=1;$i<=$rating;$i++){
										echo '<li class="fill"></li>';	
									}
									for($i=1;$i<=$blank;$i++){
										echo '<li class="blank"></li>';	
									}
									?>
								</ul>
							</div>
							<p><?php echo $review_item->comments  ?></p>
						</div>
					</div>
				<?php  }
					if(count($review_list) > 5){
						echo '<div class="text-center">
							<a href="javascript:void(0);" class="btn btn-primary btn-md radius-1 btn_view_all">View All</a>
						</div>';
					}
				} ?>
			</div>
		</div>
	</section>
	
<script>
	
    //Check variant stock
    $('body').on('change', '#select_size1', function () {
        var variant_id = $(this).val();
        var product_id = '<?php echo $product_id;?>';

        $.ajax({
            type: "post",
            async: true,
            url: '<?php echo base_url('website/Product/check_variant_wise_stock')?>',
            data: {variant_id: variant_id, product_id: product_id},
            success: function (data) {
                if (data == '2') {
                    Swal({
                        type: 'warning',
                        title: '<?php echo display("variant_not_available")?>'
                    });
                    $(".product_size").load(location.href + " .product_size>*", "");
                    return false;
                } else {
                    return true;
                }
            },
            error: function () {
                Swal({
                    type: 'warning',
                    title: '<?php echo display("request_failed")?>'
                })
            }
        });
    });

</script>


<!-- Rating or review product -->
<script type="text/javascript">
    $(document).ready(function () {
		$(document.body).on('click','.btn_view_all',function(){
			$(this).hide();
			$(".feedback_box").show();
		})
        $('.star_part a').click(function () {
            $('.star_part a').removeClass("active");
            $(this).addClass("active");
        });


        //Add review
        $('body').on('click', '.review', function () {

            var product_id = '<?php echo $product_id?>';
            var review_msg = $('#review_msg').val();
            var customer_id = '<?php echo $this->session->userdata('customer_id')?>';
            // var rate = $('.star_part a.active').attr('name');
            var rate        = $('#input-1').val();
            //Review msg check
            if (review_msg == 0) {
                Swal({
                    type: 'warning',
                    title: '<?php echo display('write_your_comment')?>'
                });
                return false;
            }

            //Customer id check
            if (customer_id == 0) {
                Swal({
                    type: 'warning',
                    title: '<?php echo display('please_login_first')?>'
                });
                return false;
            }

            $.ajax({
                type: "post",
                async: true,
                url: '<?php echo base_url('website/Home/add_review')?>',
                data: {product_id: product_id, customer_id: customer_id, review_msg: review_msg, rate: rate},
                success: function (data) {
                    if (data == '1') {
                        $('#review_msg').val('');
                        Swal({
                            type: 'success',
                            title: '<?php echo display('your_review_added')?>'
                        });
                        window.load();
                    } else if (data == '2') {
                        $('#review_msg').val('');
                        Swal({
                            type: 'warning',
                            title: '<?php echo display('already_reviewed')?>'
                        });
                        window.load();
                    } else if (data == '3') {
                        $('#review_msg').val('');
                        Swal({
                            type: 'warning',
                            title: '<?php echo display('please_login_first')?>'
                        });
                        window.load();
                    }
                },
                error: function () {
                    Swal({
                        type: 'warning',
                        title: '<?php echo display('request_failed')?>'
                    })
                }
            });
        });
    });
</script>
<script>
$(document).ready(function(){   
    var id = $('.categoryBtn:first-child').data('id');  
	$('.categoryBtn:first-child').addClass('active');
    $.ajax({
     type: "POST",
     url:  '<?php echo base_url('website/Home/prodctDatas'); ?>', 
     data: {id:id},
     dataType: "json",  
     success: function(output) {
       // obj = JSON.stringify(output);
        $('.appendSection').html('');
		var html = '';
        $(output).each(function(index, value) {
			console.log(value);
           html +=  '<div class="cat_product_box"><div class="cat_product_thumbnail"><img src="<?= base_url()?>'+ value.image_thumb +'"/><div class="wishlist add_whishlist" name="'+value.product_id+'" title="Add to wishlist"></div></div><div class="cat_product_details"><h4>'+ value.product_name+ '</h4><span>$ '+ value.price + '</span> <p><strong>IPA American</strong></p> <p>This have taste Woody oak, caramel, vanilla.</p> <p><strong>Sweet and balanced</strong></p><a href="javascript:void(0);" onclick="cart_btn('+value.product_id+')" class="btn btn-primary btn-sm radius-2">Buy Now</a></div></div> ';  
           $('.appendSection').html(html);
          
       }); 
       
     
    }

 
});
$(".categoryBtn").click(function(){
   var id = $(this).data('id'); 
 $(".categoryBtn").removeClass('active');
 $(this).addClass('active');
 $.ajax({
     type: "POST",
     url:  '<?php echo base_url('website/Home/prodctDatas'); ?>', 
     data: {id:id},
     dataType: "json",  
     success: function(output) {
        console.log(output);
        //obj = JSON.stringify(output);
       
        $('.appendSection').html('');
		var html = '';
        $(output).each(function(index, value) {
			console.log(value);
           html +=  '<div class="cat_product_box"><div class="cat_product_thumbnail"><img src="<?= base_url()?>'+ value.image_thumb +'"/><div class="wishlist add_whishlist" name="'+value.product_id+'" title="Add to wishlist"></div></div><div class="cat_product_details"><h4>'+ value.product_name+ '</h4><span>$ '+ value.price + '</span> <p><strong>IPA American</strong></p> <p>This have taste Woody oak, caramel, vanilla.</p> <p><strong>Sweet and balanced</strong></p><a href="javascript:void(0);" onclick="cart_btn('+value.product_id+')" class="btn btn-primary btn-sm radius-2">Buy Now</a></div></div> ';  
           $('.appendSection').html(html);
          
       });  
       
     
    }

 
});
});
});
</script>