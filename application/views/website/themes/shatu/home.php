<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$CI =& get_instance();
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
?>
<?php
$default_currency_id =  $this->session->userdata('currency_id');
$currency_new_id     =  $this->session->userdata('currency_new_id');

if (empty($currency_new_id)) {
    $result  =  $cur_info = $this->db->select('*')
        ->from('currency_info')
        ->where('default_status','1')
        ->get()
        ->row();
    $currency_new_id = $result->currency_id;
}

if (!empty($currency_new_id)) {
    $cur_info = $this->db->select('*')
        ->from('currency_info')
        ->where('currency_id',$currency_new_id)
        ->get()
        ->row();

    $target_con_rate = $cur_info->convertion_rate;
    $position1 = $cur_info->currency_position;
    $currency1 = $cur_info->currency_icon;
}
?>
<section class="hero_banner">
	<div class="container">
		<div class="hero_banner_inner" page-title="Liquor">
			<div class="social_icon">
				<ul>
					<li><a href="#"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
                        . '/assets/images/icons/facebook_black.svg'; ?>" alt=""/></a></li>
					<li><a href="#"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
                        . '/assets/images/icons/twitter_dark.svg'; ?>" alt=""/></a></li>
					<li><a href="#"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
                        . '/assets/images/icons/instagram_dark.svg'; ?>" alt=""/></a></li>
				</ul>
            </div>
            <div class="slider">
            <?php 
     
             if ($promotion_product) {
                        foreach ($promotion_product as $promotionProduct) {
                            ?>
                            
                <div class="slider-inner">
                            <div class="banner_item">
			<div class="product_left ">
				<h2><?= !empty($promotionProduct->product_name) ? $promotionProduct->product_name : ''  ?></h2>
				<p>This one changed the way we think of bourbon, all because one man changed the way he thought about making it. Bill Samuels, Sr., simply wanted a whisky he would enjoy drinking.</p>
				
				<div class="add_cart_btn">
					<span>$<?= !empty($promotionProduct->onsale_price) ? $promotionProduct->onsale_price : ''  ?></span>
					<a href="javascript:void(0);" onclick="cart_btn(<?php echo $promotionProduct->product_id ?>)">Add to Cart</a>
				</div>   
				<div class="product-banner-details">
					<ul>
						<li>
							<label>Category</label>
							<span><?= !empty($promotionProduct->category_name) ? $promotionProduct->category_name : ''  ?></span>
						</li>
						<li>
							<label>Taste</label>
							<span>Sweet and balanced</span>
						</li>
						<li>
							<label>Region</label>
							<span>Kentucky, United States</span>
						</li>
					</ul>
                </div> 
              
			</div>
			  <div class="product_right_image">
                <?php if (@getimagesize($promotionProduct->image_large_details) === false) { ?>
                                        <img src="<?php echo base_url() . 'my-assets/image/no-image.jpg' ?>"
                                             class="media-object"
                                             alt="image">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() . $promotionProduct->image_large_details ?>"
                                             class="img-responsive slider-img"
                                             alt="sliderImage">
                                    <?php } ?>
            </div>
            </div>
               </div>
            <?php
                        }
                    }
                    ?>
		</div>
		</div>
		</div>
	</div>
</section>

<section class="category_section">
            <div class="container">
                <div class="section_title">
                    <h2>Product Categories/</h2>
                </div>
                <div class="product_category">
                    <div class="cols">
                        <?php  if(!empty($category_list)) {
                            foreach($category_list as $proCategory) {
                         ?>
                       
                        <div class="col-4">
                            <div class="category_box">
                                <div class="left_thumbnail" style="background:url(images/bg.png) ;">
                                    <img src="<?= !empty($proCategory->cat_image) ? base_url().$proCategory->cat_image : ' ' ;?>" alt="">
                                </div>
                                <div class="right_details">
                                    <span class="sr"></span>
                                    <h2><?= !empty($proCategory->category_name) ? $proCategory->category_name : ''  ?>/</h2>
                                    <span>IPA American</span>
                                    <p>Price Start from $55.89 <strong>Sweet and balanced</strong></p>
                                    <p class="average">Average<strong>ABV 7.5%</strong></p>
                                </div>
                                <div class="cat_btn">
                                    <a href="#" class="btn btn-primary radius-2 btn-md">See more Beer <img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
                        . '/assets/images/arrow.svg'; ?>" alt=""></a>
                                </div>
                                 <?php 
                               $productDatacategory =  $this->db->select('*')
                                                    ->where('category_id',$proCategory->category_id)
                                                    ->limit(5)
                                                    ->get('product_information')
                                                    ->result_array();
                                                   // print_r( $productDatacategory);
                                    if(!empty($productDatacategory)){
                                    ?>
                                <div class="all_cat_pro_box">
                                    <ul>
                                        <?php foreach($productDatacategory as $productCategory){ ?>
                                        <li>
                                            <div class="thumbnail">
                                                <img src="<?= !empty($productCategory['image_thumb']) ?  base_url().$productCategory['image_thumb'] : '' ; ?>" alt="">
                                            </div>
                                            <div class="pro_name">
                                                <h5><?= !empty($productCategory['product_name'])  ? $productCategory['product_name'] : '';?>/</h5>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                    <?php } ?>
                            </div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                      
                    </div>
                </div>
            </div>
        </section>
        <section class="category_wrap">
            <div class="container">
                <div class="section_title">
                    <h2>Discover The Best/</h2>
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
   
            <!--div class="cart_box">
                <div class="cart_inner">
                    <div class="cart_thumbnail">
                        <img src="images/Product.png" alt=""/>
                    </div>
                    <div class="cart_pro_details">
                        <h4>· Maker's Mark Bourbon Whisky/</h4>
                        <span>$55,89</span>
                        <p>This one changed the way we think of bourbon, all because one man changed the way he thought about making it.</p>
                        <div class="quantity_box">
                            <span>Quantity</span>
                            <div class="add_more_quantity">
                                <span class="minus_icon"><img src="images/Icons/keyboard_arrow_minus.svg" alt=""/></span>
                                <input type="text" class="form-control" value="1"/>
                                <span class="plus_icon"><img src="images/Icons/keyboard_arrow_down.svg" alt=""/></span>
                            </div>
                        </div>
                        <a href="#" class="shopping_cart_btn">Add to shopping Cart</a>
                    </div>
                </div>
            </div-->
        </section>

        <section class="brand_section">
            <div class="container">
                <div class="our_brands">
                    <ul>
                        <?php if($brands) { 
                            foreach($brands as $brandsName){
                            ?>
                             
                        <li><img src="<?= !empty($brandsName['brand_image']) ? base_url().$brandsName['brand_image'] : '' ?>" alt=""></li>
                        <?php } } ?>
                    </ul>
                </div>
            </div>
        </section>
<?php /* 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12 px-0">
        
                <!-- /.End of slider -->
            </div>
        </div>
    </div>

    <!-- Overview Area -->
    <section class="overview_area hidden-xs">
        <div class="container">
            <div class="row overview_inner">
                <div class="col-md-3 col-sm-6">
                    <div class="single_overview">
                        <div class="overview_icon">
                            <i class="fa fa-truck color33"></i>
                        </div>
                        <div class="overview_details">
                            <h4><?php echo display('free_shipping');  ?></h4>
                            <h6><?php echo display('from_newyork');  ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single_overview">
                        <div class="overview_icon">
                            <i class="fa fa-money color33"></i>
                        </div>
                        <div class="overview_details">
                            <h4><?php echo display('cash_on_delivery');  ?></h4>
                            <h6><?php echo display('the_internet_tend_to_repeat');  ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single_overview">
                        <div class="overview_icon">
                            <i class="fa fa-undo color33"></i>
                        </div>
                        <div class="overview_details">
                            <h4><?php echo display('45_days_return');  ?></h4>
                            <h6><?php echo display('making_it_look_like_readable');  ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single_overview">
                        <div class="overview_icon">
                            <i class="fa fa-clock-o color33"></i>
                        </div>
                        <div class="overview_details">
                            <h4><?php echo display('opening_all_week');  ?></h4>
                            <h6><?php echo display('8am_9pm');  ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Overview Area -->

    <?php
    if ($block_list) {
        foreach ($block_list as $block) {
            $cat_pro = $this->db->select('a.*,b.category_name,b.category_id')
                ->from('product_information a')
                ->join('product_category b', 'a.category_id = b.category_id', 'left')
                ->where('a.category_id', $block['block_cat_id'])
                ->get()
                ->result_array();

            if ($cat_pro) {
                if ($block['block_style'] == 2) {
                    ?>
                    <section class="product_area mb-40 mt-xs-40">
                        <div class="container">
                            <div class="product_inner">
                                <div class="sec_heading">
                                    <h2 class="sec_title color3"><?php echo $cat_pro[0]['category_name'] ?></h2>
                                </div>
                                <div class="owl-carousel product_slider product_col5_slider slider-nav">
                                    <?php foreach ($cat_pro as $product): ?>
                                        <div class="item boxed">
                                            <div class="item_inner">
                                                <a href="<?php echo base_url().'product_details/'.remove_space($product['product_name']).'/'.$product['product_id'];  ?>"
                                                   class="item_title2">
                                                <div class="item_image">
                                                    <img src="<?php echo base_url() . $product['image_thumb'] ?>"
                                                         alt="product-image">
                                                </div>
                                                </a>
                                                <div class="item_info text-center">
                                                    <a href="<?php echo base_url().'category/p/'.remove_space($product['category_name']).'/'.$product['category_id'];  ?>"
                                                       class="item_title2">
                                                        <p class="category-name"><?php echo $cat_pro[0]['category_name'] ?></p></a>
                                                    <a href="<?php echo base_url().'product_details/'.remove_space($product['product_name']).'/'.$product['product_id'];  ?>"
                                                       class="item_title2"><?php echo $product['product_name'] ?></a>
                                                    <div class="rating_stars">
                                                        <div class="rating-wrap m-0-auto">
                                                            <?php
                                                            $result = $this->db->select('sum(rate) as rates')
                                                                ->from('product_review')
                                                                ->where('product_id',$product['product_id'])
                                                                ->get()
                                                                ->row();

                                                            $rater = $this->db->select('rate')
                                                                ->from('product_review')
                                                                ->where('product_id',$product['product_id'])
                                                                ->get()
                                                                ->num_rows();

                                                            if ($result->rates != null) {
                                                                $total_rate = $result->rates/$rater;
                                                                if (gettype($total_rate) == 'integer') {
                                                                    for ($t=1; $t <= $total_rate; $t++) {
                                                                        echo "<i class=\"fa fa-star\"></i>";
                                                                    }
                                                                    for ($tt=$total_rate; $tt < 5; $tt++) {
                                                                        echo "<i class=\"fa fa-star-o\"></i>";
                                                                    }
                                                                }elseif (gettype($total_rate) == 'double') {
                                                                    $pieces = explode(".", $total_rate);
                                                                    for ($q=1; $q <= $pieces[0]; $q++) {
                                                                        echo "<i class=\"fa fa-star\"></i>";
                                                                        if ($pieces[0] == $q) {
                                                                            echo "<i class=\"fa fa-star-half-o\"></i>";
                                                                            for ($qq=$pieces[0]; $qq < 4; $qq++) {
                                                                                echo "<i class=\"fa fa-star-o\"></i>";
                                                                            }
                                                                        }
                                                                    }

                                                                }else{
                                                                    for ($w=0; $w <= 4; $w++) {
                                                                        echo "<i class=\"fa fa-star-o\"></i>";
                                                                    }
                                                                }
                                                            }else{
                                                                for ($o=0; $o <= 4; $o++) {
                                                                    echo "<i class=\"fa fa-star-o\"></i>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                        <!-- End Rating wrap -->
                                                    </div>
                                                    <?php if ($product['onsale'] == 1 && !empty($product['onsale_price'])) { ?>
                                                        <div class="product_cost">
                                                            <p class="current color35">
                                                                <?php
                                                                if ($target_con_rate > 1) {
                                                                    $price = $product['onsale_price'] * $target_con_rate;
                                                                    echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                }

                                                                if ($target_con_rate <= 1) {
                                                                    $price = $product['onsale_price'] * $target_con_rate;
                                                                    echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                }
                                                                ?>
                                                            </p>
                                                            <p class="previous">
                                                                <del>
                                                                <?php
                                                                if ($target_con_rate > 1) {
                                                                    $price = $product['price'] * $target_con_rate;
                                                                    echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                }

                                                                if ($target_con_rate <= 1) {
                                                                    $price = $product['price'] * $target_con_rate;
                                                                    echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                }
                                                                ?>
                                                                </del>
                                                            </p>
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div class="product_cost">
                                                            <p class="current color35">
                                                                <?php

                                                                if ($target_con_rate > 1) {
                                                                    $price = $product['price'] * $target_con_rate;
                                                                    echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                }

                                                                if ($target_con_rate <= 1) {
                                                                    $price = $product['price'] * $target_con_rate;
                                                                    echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="hover_content">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="#" class="wishlist" name="<?php echo $product['product_id']?>" title="<?php echo display('add_to_wishlist')?>"><i class="fa fa-heart"></i></a>
                                                            </li>
                                                            <li><a href="#" onclick="add_to_cart(<?php echo $product['product_id'].', \''.remove_space($product['product_name']).'\','; echo ($product['default_variant'])? '\''.$product['default_variant'].'\'':'\'nai\'' ;  ?>)"><i class="fa fa-shopping-bag"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Top features Area -->
                    <!-- Advertise Area -->
                    <?php  if (!empty($select_home_adds)) {
                        foreach ($select_home_adds as $ads):
                            if ($block['block_position'] == $ads->adv_position && !empty($ads->adv_code) && empty($ads->adv_code2) && empty($ads->adv_code3)) {
                                ?>
                                <div class="my-40">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <?php echo $ads->adv_code; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else if ($block['block_position'] == $ads->adv_position && !empty($ads->adv_code) && !empty($ads->adv_code2) && empty($ads->adv_code3)) { ?>

                                <div class="my-40">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <?php echo $ads->adv_code; ?>
                                            </div>
                                            <div class="col-xs-6">
                                                <?php echo $ads->adv_code2; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else if ($block['block_position'] == $ads->adv_position && !empty($ads->adv_code) && !empty($ads->adv_code2) && !empty($ads->adv_code3)) { ?>

                                <div class="my-40">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <?php echo $ads->adv_code; ?>
                                            </div>
                                            <div class="col-xs-4">
                                                <?php echo $ads->adv_code2; ?>
                                            </div>
                                            <div class="col-xs-4">
                                                <?php echo $ads->adv_code3; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php
                        endforeach;
                    } ?>


                    <!-- End Advertise Area -->
                    <?php
                }
                if ($block['block_style'] == 1) {
                    ?>
                    <div class="modal fade product_view hidden-xs" id="product_view">



                    </div>


                    <section class="product_category my-50">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-5 hidden-xs">
                                    <div class="row m-0 top_deals">
                                        <div class="category-heading sec-border mb-30">
                                            <h4 class="sec-title m-0"><?php echo display('best_sales') ?></h4>
                                        </div>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('product_information');
                                        $this->db->where('best_sale', '1');
                                        $this->db->where('category_id', $cat_pro[0]['category_id']);
                                        $this->db->order_by('id', 'desc');
                                        $this->db->limit('3');
                                        $query = $this->db->get();
                                        $best_category_sale = $query->result();

                                        if ($best_category_sale) {
                                            foreach ($best_category_sale as $sales) {
                                                ?>
                                                <div class="d-flex active mb-25">
                                                    <img class="mr-15 w-70"
                                                         src="<?php echo base_url() . $sales->image_thumb ?>"
                                                         alt="product image">
                                                    <div class="cat-desc">
                                                        <a href="<?php echo base_url('product_details/' .remove_space($sales->product_name).'/'.$sales->product_id) ?>"
                                                           class="item-title"><?php echo $sales->product_name ?></a>
                                                        <?php if ($sales->onsale == 1 && !empty($sales->onsale_price)) { ?>
                                                            <div class="product_cost">
                                                                <p class="current color35"><?php echo(($position == 0) ? $currency . number_format
                                                                        ($sales->onsale_price, 2, '.', ',') : number_format($sales->onsale_price, 2, '.', ',') . $currency) ?></p>
                                                                <p class="previous">
                                                                    <del><?php echo(($position == 0) ? $currency . number_format($sales->price, 2, '.', ',') : number_format($sales->price, 2, '.', ',') . $currency) ?></del>
                                                                </p>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="product_cost">
                                                                <p class="current color35"><?php echo(($position == 0) ? $currency . number_format
                                                                        ($sales->price, 2, '.', ',') : number_format($sales->price, 2, '.', ',') . $currency) ?></p>
                                                            </div>
                                                        <?php } ?>

                                                        <div class="rating_stars">
                                                            <div class="rating-wrap">
                                                                <?php
                                                                $result = $this->db->select('sum(rate) as rates')
                                                                    ->from('product_review')
                                                                    ->where('product_id',$sales->product_id)
                                                                    ->get()
                                                                    ->row();

                                                                $rater = $this->db->select('rate')
                                                                    ->from('product_review')
                                                                    ->where('product_id',$sales->product_id)
                                                                    ->get()
                                                                    ->num_rows();

                                                                if ($result->rates != null) {
                                                                    $total_rate = $result->rates/$rater;
                                                                    if (gettype($total_rate) == 'integer') {
                                                                        for ($t=1; $t <= $total_rate; $t++) {
                                                                            echo "<i class=\"fa fa-star\"></i>";
                                                                        }
                                                                        for ($tt=$total_rate; $tt < 5; $tt++) {
                                                                            echo "<i class=\"fa fa-star-o\"></i>";
                                                                        }
                                                                    }elseif (gettype($total_rate) == 'double') {
                                                                        $pieces = explode(".", $total_rate);
                                                                        for ($q=1; $q <= $pieces[0]; $q++) {
                                                                            echo "<i class=\"fa fa-star\"></i>";
                                                                            if ($pieces[0] == $q) {
                                                                                echo "<i class=\"fa fa-star-half-o\"></i>";
                                                                                for ($qq=$pieces[0]; $qq < 4; $qq++) {
                                                                                    echo "<i class=\"fa fa-star-o\"></i>";
                                                                                }
                                                                            }
                                                                        }

                                                                    }else{
                                                                        for ($w=0; $w <= 4; $w++) {
                                                                            echo "<i class=\"fa fa-star-o\"></i>";
                                                                        }
                                                                    }
                                                                }else{
                                                                    for ($o=0; $o <= 4; $o++) {
                                                                        echo "<i class=\"fa fa-star-o\"></i>";
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-8 col-sm-7">
                                    <div class="row m-0 product_inner">
                                        <div class="category-heading sec-border mb-30">
                                            <h4 class="sec-title m-0"><?php echo $block['category_name'];  ?></h4>
                                        </div>
                                        <div class="owl-carousel product_col4_slider product2_slider slider_nav">
                                            <?php for ($i = 0; $i < count($cat_pro); $i++) { ?>
                                                <div class="item hover-me">
                                                    <div class="item_inner">
                                                        <div class="item_image">
                                                            <img src="<?php echo base_url() . $cat_pro[$i]['image_thumb'] ?>"
                                                                 alt="product-image">
                                                            <div class="hover-info">
                                                                <ul class="nav">
                                                                    <li class="hidden-xs">
                                                                        <a href="#" onclick="quick_view(<?php echo $cat_pro[$i]['product_id']; ?>)" class="btn-s2"
                                                                                             data-toggle="modal"
                                                                                             data-target="#product_view"><span><?php echo display('quick_view');  ?></span>
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                            <div class="hover-box">
                                                                <ul class="nav">
                                                                    <li>
                                                                    <a href="#" class="wishlist" name="<?php echo $cat_pro[$i]['product_id']?>" title="<?php echo display('add_to_wishlist')?>"><i class="fa fa-heart"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" onclick="add_to_cart(<?php echo $cat_pro[$i]['product_id'].', '; echo ($cat_pro[$i]['default_variant'])? '\''.$cat_pro[$i]['default_variant'].'\'':'\'nai\'' ;  ?>)"><i class="fa fa-shopping-bag"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="item_info">
                                                            <div class="rating_stars mb-5">
                                                                <div class="rating-wrap">
                                                                    <?php
                                                                    $result = $this->db->select('sum(rate) as rates')
                                                                        ->from('product_review')
                                                                        ->where('product_id',$cat_pro[$i]['product_id'])
                                                                        ->get()
                                                                        ->row();

                                                                    $rater = $this->db->select('rate')
                                                                        ->from('product_review')
                                                                        ->where('product_id',$cat_pro[$i]['product_id'])
                                                                        ->get()
                                                                        ->num_rows();

                                                                    if ($result->rates != null) {
                                                                        $total_rate = $result->rates/$rater;
                                                                        if (gettype($total_rate) == 'integer') {
                                                                            for ($t=1; $t <= $total_rate; $t++) {
                                                                                echo "<i class=\"fa fa-star\"></i>";
                                                                            }
                                                                            for ($tt=$total_rate; $tt < 5; $tt++) {
                                                                                echo "<i class=\"fa fa-star-o\"></i>";
                                                                            }
                                                                        }elseif (gettype($total_rate) == 'double') {
                                                                            $pieces = explode(".", $total_rate);
                                                                            for ($q=1; $q <= $pieces[0]; $q++) {
                                                                                echo "<i class=\"fa fa-star\"></i>";
                                                                                if ($pieces[0] == $q) {
                                                                                    echo "<i class=\"fa fa-star-half-o\"></i>";
                                                                                    for ($qq=$pieces[0]; $qq < 4; $qq++) {
                                                                                        echo "<i class=\"fa fa-star-o\"></i>";
                                                                                    }
                                                                                }
                                                                            }

                                                                        }else{
                                                                            for ($w=0; $w <= 4; $w++) {
                                                                                echo "<i class=\"fa fa-star-o\"></i>";
                                                                            }
                                                                        }
                                                                    }else{
                                                                        for ($o=0; $o <= 4; $o++) {
                                                                            echo "<i class=\"fa fa-star-o\"></i>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo base_url('product_details/'.remove_space($cat_pro[$i]['product_name']).'/'.$cat_pro[$i]['product_id'])?>" class="item_title"><?php echo $cat_pro[$i]['product_name']?></a>
                                                            <?php if ($cat_pro[$i]['onsale'] == 1 && !empty($cat_pro[$i]['onsale_price'])) { ?>
                                                                <div class="product_cost">
                                                                    <p class="current color35">
                                                                        <?php
                                                                        if ($target_con_rate > 1) {
                                                                            $price = $cat_pro[$i]['onsale_price'] * $target_con_rate;
                                                                            echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                        }

                                                                        if ($target_con_rate <= 1) {
                                                                            $price = $cat_pro[$i]['onsale_price'] * $target_con_rate;
                                                                            echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                    <p class="previous">
                                                                        <del>
                                                                        <?php
                                                                        if ($target_con_rate > 1) {
                                                                            $price = $cat_pro[$i]['price'] * $target_con_rate;
                                                                            echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                        }

                                                                        if ($target_con_rate <= 1) {
                                                                            $price = $cat_pro[$i]['price'] * $target_con_rate;
                                                                            echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                        }
                                                                        ?>
                                                                        </del>
                                                                    </p>
                                                                </div>
                                                            <?php }else{ ?>
                                                                <div class="product_cost">
                                                                    <p class="current color35">
                                                                        <?php
                                                                        if ($target_con_rate > 1) {
                                                                            $price = $cat_pro[$i]['price'] * $target_con_rate;
                                                                            echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                        }

                                                                        if ($target_con_rate <= 1) {
                                                                            $price = $cat_pro[$i]['price'] * $target_con_rate;
                                                                            echo (($position1==0)?$currency1." ".number_format($price, 2, '.', ','):number_format($price, 2, '.', ',')." ".$currency1);
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php if (!empty($select_home_adds)) {
                        foreach ($select_home_adds as $ads):
                            if ($block['block_position']== $ads->adv_position && !empty($ads->adv_code) && empty($ads->adv_code2) && empty($ads->adv_code3)) {
                                ?>
                                <div class="my-40">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <?php echo $ads->adv_code; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else if ($block['block_position'] == $ads->adv_position && !empty($ads->adv_code) && !empty($ads->adv_code2) && empty($ads->adv_code3)) { ?>

                                <div class="my-40">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <?php echo $ads->adv_code; ?>
                                            </div>
                                            <div class="col-xs-6">
                                                <?php echo $ads->adv_code2; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else if ($block['block_position'] == $ads->adv_position && !empty($ads->adv_code) && !empty($ads->adv_code2) && !empty($ads->adv_code3)) { ?>
                                <div class="my-40">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <?php echo $ads->adv_code; ?>
                                            </div>
                                            <div class="col-xs-4">
                                                <?php echo $ads->adv_code2; ?>
                                            </div>
                                            <div class="col-xs-4">
                                                <?php echo $ads->adv_code3; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php
                        endforeach;
                    } ?>

                    <?php
                }
            }
        }
    }
    ?>

    <div class="brand-cat-content">
        <div class="container-full">
            <div class="brand-logo">
                <div class="row">
                    <div class="brand_slider owl-carousel nav-style2">
                        <?php foreach ($brands as $brand){ ?>
                        <div class="item logo-item">
                            <a href="<?php echo base_url()."brand_product/list/".$brand['brand_id'];  ?>" target="_blank">
                                <img class="img-responsive center-block" src="<?php echo $brand['brand_image']; ?>" alt="brand image"></a>
                        </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
            <!-- /.End of brand logo -->
        </div>
    </div>
    <!--  /.End of Products Brands -->
</div--> */ ?>
  <script>
$(document).ready(function(){   
    var id = $('.categoryBtn:first-child').data('id');  
	$('.categoryBtn:first-child').addClass('active');
    $.ajax({
     type: "POST",
     url:  "<?php base_url(); ?>website/home/prodctDatas", 
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
     url:  "<?php base_url(); ?>website/home/prodctDatas", 
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