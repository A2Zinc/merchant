<?php
$CI =& get_instance();
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
?>
<section class="cabinet_banner">
	<div class="container">
		<h2>· My Cabinet/</h2>
		<div class="cabinet_inner">
			<?php
			$products_html = '';
			if ($category_list) {
				$i = 1;
				foreach ($category_list as $parent_category) {
					?>
					<div data-id="<?php echo $parent_category->category_id; ?>" class="cabinet_box <?php echo ($i == 1 ? 'active' : ''); ?>">
						<div class="thumbnail">
							<img src="<?php echo base_url().$parent_category->cat_favicon ?>">
						</div>
						<h4><?php echo $parent_category->category_name ?>/</h4>
					</div>
					<?php
					if(isset($cat_wise_products[$parent_category->category_id]) && !empty($cat_wise_products[$parent_category->category_id])){
						$products_html .= '<div class="cat_products cat_'.$parent_category->category_id. ' ' .($i == 1 ? 'active' : '').' ">';
						$j = 1;
						foreach($cat_wise_products[$parent_category->category_id] as $product){
							if($j == 1){
								$products_html .= '<div class="cabinet_product_main">
									<div class="cabinet_product_inner">';
							}
							$products_html .= '<div class="products_box">
								<div class="product_thumbnail">
									<a href="'.base_url('product_details/'.remove_space($product->product_name).'/'
                                . $product->product_id).'">
										<img src="'.base_url().$product->image_thumb.'" alt=""/>
									</a>
								</div>
								<div class="cart_btn">
									<a href="#">
										<img src="'.base_url() . 'application/views/website/themes/' . $theme
                        . '/assets/images/icons/cart_circle.svg" alt=""/>
									</a>
								</div>
							</div>';
							if($j == 4 || $j == count($cat_wise_products[$parent_category->category_id])){
								$products_html .= '</div>
								</div>';
								$j = 0;
							}
							$j++;
						}
						$products_html .= '</div>';
					}
					
					$i++;
				}
			}
			?>
		</div>
	</div>
</section>


<section class="cabinet_product_section">
	<div class="container">
		<?php echo $products_html; ?>
	</div>
</section>
<script>
    $(document).ready(function () {
		$(document.body).on('click','.cabinet_box',function(){
			var catId = $(this).data('id');
			$(".cabinet_box").removeClass('active');
			$(this).addClass('active');
			$(".cat_products").removeClass('active');
			$(".cat_"+catId).addClass('active');
		})
	});
</script>