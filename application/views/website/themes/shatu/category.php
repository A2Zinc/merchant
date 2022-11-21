<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$CI =& get_instance();
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
?>
 <section class="product_banner">
	<div class="container">
		<div class="product_banner_inner" page-title="est 2020">
			<div class="product_banner_left">
				<h2><?php echo $category_name ?> Collections/</h2>
				<p><?php echo $category_description ?></p>
				<div class="search_box">
					<input type="text" class="form-control" placeholder="Try to find some liquor…"/>
					<i class="search_icon"></i>
				</div>
			</div>
			<div class="product_banner_right">
				<img src="<?php echo base_url().$cat_image ?>" alt=""/>
			</div>
		</div>
	</div>
</section>
<?php
$sub_category = $this->Homes->get_sub_category($category_id);
if (!empty($sub_category)) {
	?>
	<section class="category_all_product_section">
		<div class="container">
			<div class="category_all_product_inner">
				<h3>· All about <?php echo $category_name ?>/ <a href="#" class="btn btn-sm radius-1 btn-primary">All</a></h3>
				<div class="category_all_product_listing">
			<?php
			$i = 1;
			$query_string = '';
			$query_string = $this->input->server('QUERY_STRING');
			if ($query_string) {
				$query_string = '?' . $this->input->server('QUERY_STRING');
			} else {
				$query_string = '';
			}
			$category_url_ids = $this->uri->segment('3');
			if ($category_url_ids) {
				$all_cat = (explode("--", $category_url_ids));
				$lastElementKey = count($all_cat);
			} else {
				$lastElementKey = 0;
			}
			if ($sub_category) {
				$i = 1;
				foreach ($sub_category as $cat) {
					if ($i == 11) break;
					$no_of_pro = $this->Categories->select_total_sub_cat_no_of_pro($cat['category_id']);
					$target_id = $cat['category_id'];
					if (strpos($category_url_ids, $target_id) !== false) {
						if ($lastElementKey == 1) {
							$output = preg_replace('/' . $target_id . '/', '', $category_url_ids);
							$url =  base_url('category') . '/' . $category_id . $query_string;
						} else {
							if (strpos($category_url_ids, $target_id . '--') !== false) {
								$output = preg_replace('/' . $target_id . '--/', '', $category_url_ids);
							} else {
								$output = preg_replace('/--' . $target_id . '/', '', $category_url_ids);
							}
							$url =  base_url('category') . '/' . $category_id . '/' . $output . $query_string;
						}
					} else {
						if ($lastElementKey == 0) {
							$url =  base_url('category') . '/' . $category_id . '/' . $category_url_ids . $target_id . $query_string;
						} else {
							$url =  base_url('category') . '/' . $category_id . '/' . $category_url_ids . '--' . $target_id . $query_string;
						}
					}
					?>
					<div class="category_all_product">
						<a href="<?php echo $url; ?>">
							<div class="thumbnail">
								<img src="<?php echo base_url().$cat['cat_image'] ?>" alt=""/>
							</div>                           
							<h5><?php echo $cat['category_name'] ?></h5>
						</a>
					</div>
					<?php
					$i++;
				}
			}
			?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<section class="products">
	<div class="container">
		<div class="filter_section">
			<h3><?php echo $category_name ?>/<span>(<?php echo $total; ?> results)</span></h3>
			<div class="filter_box">
				<div class="sort_by">
					<label>Sort by :</label>
						<?php
							$currentURL = current_url();
							$params = $_SERVER['QUERY_STRING'];
							$sort = $this->input->get('sort');
						?>
					<select class="form-control pages_class">
						<?php 
						$sortOptions = array(
							'high_to_low' => 'High to Low',
							'low_to_high' => 'Low to High',
							'top_rated' => 'Top Rated',
							'featured' => 'Featured',
							'popular' => 'Popular'
						);
						foreach($sortOptions as $k=>$sortOption){
							if ($params) {
								if ($sort) {
									$new_param = str_replace("sort=".$sort, 'sort='. $k, $params);
									$fullURL = $currentURL . '?' . $new_param;
								} else {
									$fullURL = $currentURL . '?' . $params . '&sort='.$k;
								}
							} else {
								 $fullURL = $currentURL . '?sort='.$k;
							}
							$selected = '';
							if ($this->input->get('sort') == $k) {
								$selected = "selected";
							}
							echo '<option value="'.$fullURL.'" '.$selected.'>'.$sortOption.'</option>';
						}
						?>
					</select>
				</div>
				<div class="paging">
					<label>Showing per page</label>
					<?php
						$currentURL = current_url();
						$params = $_SERVER['QUERY_STRING'];
						$page = $this->input->get('page');
					?>
					<select class="form-control pages_class">
						<?php 
						for($pageno=10;$pageno <= 50;$pageno++){
							if ($params) {
								if ($page) {
									$new_param = str_replace("page=".$page, 'page='. $pageno, $params);
									$fullURL = $currentURL . '?' . $new_param;
								} else {
									$fullURL = $currentURL . '?' . $params . '&page='.$pageno;
								}
							} else {
								 $fullURL = $currentURL . '?page='.$pageno;
							}
							$selected = '';
							if ($this->input->get('page') == $pageno) {
								$selected = "selected";
							}
							echo '<option value="'.$fullURL.'" '.$selected.'>'.$pageno.'</option>';
							$pageno = $pageno+9;
						}
						?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="product_inner">
			<div class="sidebar">
				<?php if (!empty($category_id)): ?>
				<?php
				$sub_category = $this->Homes->get_sub_category($category_id);
				if (!empty($sub_category)) {
					?>
					<div class="sidebar_box">
						<h4>Filter by :</h4>
						<h5>Category</h5>
						<ul class="subcategories">
							<?php
							$i = 1;
							$query_string = '';
							$query_string = $this->input->server('QUERY_STRING');
							if ($query_string) {
								$query_string = '?' . $this->input->server('QUERY_STRING');
							} else {
								$query_string = '';
							}
							$category_url_ids = $this->uri->segment('3');
							if ($category_url_ids) {
								$all_cat = (explode("--", $category_url_ids));
								$lastElementKey = count($all_cat);
							} else {
								$lastElementKey = 0;
							}
							if ($sub_category) {
								$i = 1;
								foreach ($sub_category as $cat) {
									if ($i == 11) break;
									$no_of_pro = $this->Categories->select_total_sub_cat_no_of_pro($cat['category_id']);
									?>
									<li>
										<input class="category_class styled-checkbox" id="category-<?php echo $cat['category_id']; ?>" type="checkbox" value="<?php
										$target_id = $cat['category_id'];
										if (strpos($category_url_ids, $target_id) !== false) {
											if ($lastElementKey == 1) {
												$output = preg_replace('/' . $target_id . '/', '', $category_url_ids);
												echo base_url('category') . '/' . $category_id . $query_string;
											} else {
												if (strpos($category_url_ids, $target_id . '--') !== false) {
													$output = preg_replace('/' . $target_id . '--/', '', $category_url_ids);
												} else {
													$output = preg_replace('/--' . $target_id . '/', '', $category_url_ids);
												}
												echo base_url('category') . '/' . $category_id . '/' . $output . $query_string;
											}
										} else {
											if ($lastElementKey == 0) {
												echo base_url('category') . '/' . $category_id . '/' . $category_url_ids . $target_id . $query_string;
											} else {
												echo base_url('category') . '/' . $category_id . '/' . $category_url_ids . '--' . $target_id . $query_string;
											}
										}
										?>" <?php
										if (strpos($category_url_ids, $target_id) !== false) {
											echo 'checked';
										}
										?>>
										<label for="category-<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name'] ?> (<?php echo $no_of_pro; ?>)</label>
									</li>
									<?php
									$i++;
								}
							}
							?>
						</ul>
					</div>
				<?php } ?>

				<div class="sidebar_box">
					<h4>Price Range</h4>
					<ul>
					<?php 
					if(!empty($max_value)){
						$divide = $max_value/5;
						$difference = ceil($divide / 10) * 10;
						$lastValue = 0;
						$id = 0;
						for($i=0;$i<=$max_value;$i++){
							$id++;
							$j=($i+$difference);
							$j = ($j > $max_value ? $max_value : $j);
							$currentURL = current_url();
							$params = $_SERVER['QUERY_STRING'];
							$price = $this->input->get('price');
							if ($params) {
								if ($price) {
									if($price == ($i.'-'.$j)){									
										$new_param = str_replace("price=" . $i.'-'.$j, "", $params);
										$fullURL = $currentURL . '?' . $new_param;
									}else{
										$new_param = str_replace("price=".$price, 'price='. $i.'-'.$j, $params);
										$fullURL = $currentURL . '?' . $new_param;
									}
								} else {
									$fullURL = $currentURL . '?' . $params . '&price='.$i.'-'.$j;
								}
							} else {
								 $fullURL = $currentURL . '?price='.$i.'-'.$j;
							}
                            $checked = '';
							if ($this->input->get('price') == $i.'-'.$j) {
                                $checked = "checked";
							}
							echo '<li>
								<input class="price_class styled-checkbox" id="range-'.$id.'" type="checkbox" value="'.$fullURL.'" '.$checked.'>
								<label for="range-'.$id.'">$'.number_format($i,2).' - $'.number_format($j,2).'</label>
							</li>';
							$i = $j;
						}
					}
					?>
					</ul>
				</div>
				<?php endif; ?>
				<div class="sidebar_box">
					<h4>Shipping</h4>
					<ul>
						<li>
							<input class="styled-checkbox" id="shipping-1" type="checkbox" value="value1">
							<label for="shipping-1">International Shipping</label>
						</li>
						<li>
							<input class="styled-checkbox" id="shipping-2" type="checkbox" value="value1">
							<label for="shipping-2">Free Shipping</label>
						</li>
					</ul>
				</div>
				<div class="sidebar_box">
					<h4><?php echo display('rating') ?></h4>
					<ul>
						<li class="checkbox checkbox-success">
							<input id="rating1" type="checkbox" class="styled-checkbox check_value" value="<?php
							$currentURL = current_url();
							$params = $_SERVER['QUERY_STRING'];
							$rate = $this->input->get('rate');
							if ($params) {
								if ($rate) {
									$new_param = str_replace("rate=" . $rate, "rate=4-5", $params);
									echo $fullURL = $currentURL . '?' . $new_param;
								} else {
									echo $fullURL = $currentURL . '?' . $params . '&rate=4-5';
								}
							} else {
								echo $fullURL = $currentURL . '?rate=4-5';
							}
							?>" <?php if ($this->input->get('rate') == '4-5') {
								echo("checked");
							} ?>>
							<label for="rating1" class="rating">
								<ul>
									<li class="fill"></li>
									<li class="fill"></li>
									<li class="fill"></li>
									<li class="fill"></li>
									<li class="blank"></li>
								</ul>
								<span><?php  echo display('4').'-'.display('5'); ?></span>
							</label>
						</li>
						<li class="checkbox checkbox-success">
							<input id="rating2" type="checkbox" class="styled-checkbox check_value" value="<?php
							$currentURL = current_url();
							$params = $_SERVER['QUERY_STRING'];
							$rate = $this->input->get('rate');
							if ($params) {
								if ($rate) {
									$new_param = str_replace("rate=" . $rate, "rate=3-5", $params);
									echo $fullURL = $currentURL . '?' . $new_param;
								} else {
									echo $fullURL = $currentURL . '?' . $params . '&rate=3-5';
								}
							} else {
								echo $fullURL = $currentURL . '?rate=3-5';
							}
							?>" <?php if ($this->input->get('rate') == '3-5') {
								echo("checked");
							} ?>>
							<label for="rating2" class="rating">
								<ul>
									<li class="fill"></li>
									<li class="fill"></li>
									<li class="fill"></li>
									<li class="blank"></li>
									<li class="blank"></li>
								</ul>
								<span><?php  echo display('3').'-'.display('5'); ?></span>
							</label>
						</li>
						<li class="checkbox checkbox-success">
							<input id="rating3" type="checkbox" class="styled-checkbox check_value" value="<?php
							$currentURL = current_url();
							$params = $_SERVER['QUERY_STRING'];
							$rate = $this->input->get('rate');
							if ($params) {
								if ($rate) {
									$new_param = str_replace("rate=" . $rate, "rate=2-5", $params);
									echo $fullURL = $currentURL . '?' . $new_param;
								} else {
									echo $fullURL = $currentURL . '?' . $params . '&rate=2-5';
								}
							} else {
								echo $fullURL = $currentURL . '?rate=2-5';
							}
							?>" <?php if ($this->input->get('rate') == '2-5') {
								echo("checked");
							} ?>>
							<label for="rating3" class="rating">
								<ul>
									<li class="fill"></li>
									<li class="fill"></li>
									<li class="blank"></li>
									<li class="blank"></li>
									<li class="blank"></li>
								</ul>
								<span><?php  echo display('2').'-'.display('5'); ?></span>
							</label>
						</li>
						<li class="checkbox checkbox-success">
							<input id="rating4" type="checkbox" class="styled-checkbox check_value" value="<?php
							$currentURL = current_url();
							$params = $_SERVER['QUERY_STRING'];
							$rate = $this->input->get('rate');
							if ($params) {
								if ($rate) {
									$new_param = str_replace("rate=" . $rate, "rate=1-5", $params);
									echo $fullURL = $currentURL . '?' . $new_param;
								} else {
									echo $fullURL = $currentURL . '?' . $params . '&rate=1-5';
								}
							} else {
								echo $fullURL = $currentURL . '?rate=1-5';
							}
							?>" <?php if ($this->input->get('rate') == '1-5') {
								echo("checked");
							} ?>>
							<label for="rating4" class="rating">
								<ul>
									<li class="fill"></li>
									<li class="blank"></li>
									<li class="blank"></li>
									<li class="blank"></li>
									<li class="blank"></li>
								</ul>
								<span><?php echo display('1').'-'.display('5');  ?></span>
							</label>
						</li>
					</ul>
					
				</div>
			</div>
			
			<div class="product_list">
				 <?php
                if ($category_product) {
					foreach ($category_product as $product) {
                ?>
					<div class="products_box">
						<div class="product_image">
							<div class="wishlist heart_icon" name="<?php echo $product->product_id;?>" title="<?php echo display('add_to_wishlist')?>"></div>
							<a href="<?php echo base_url('product_details/'.remove_space($product->product_name).'/'
                                . $product->product_id) ?>"><img src="<?php echo base_url().$product->image_thumb ?>" alt=""/>
							</a>
						</div>
						<div class="product_content">
							<a href="<?php echo base_url('product_details/'.remove_space($product->product_name).'/'
                                . $product->product_id) ?>"><h3><?php echo $product->product_name ?></h3></a>
							<div class="ratings">
								<ul>
								<?php
								$result = $this->db->select('sum(rate) as rates')
									->from('product_review')
									->where('product_id', $product->product_id)
									->get()
									->row();

								$rater = $this->db->select('rate')
									->from('product_review')
									->where('product_id', $product->product_id)
									->get()
									->num_rows();
								if ($result->rates != null) {
									$total_rate = $result->rates / $rater;
									if (gettype($total_rate) == 'integer') {
										for ($t = 1; $t <= $total_rate; $t++) {
											echo '<li class="fill"></li>';
										}
										for ($tt = $total_rate; $tt < 5; $tt++) {
											echo '<li class="blank"></li>';
										}
									} elseif (gettype($total_rate) == 'double') {
										$pieces = explode(".", $total_rate);
										for ($q = 1; $q <= $pieces[0]; $q++) {
											echo '<li class="fill"></li>';
											if ($pieces[0] == $q) {
												echo '<li class="fill"></li>';
												for ($qq = $pieces[0]; $qq < 4; $qq++) {
													echo '<li class="blank"></li>';
												}
											}
										}

									} else {
										for ($w = 0; $w <= 4; $w++) {
											echo '<li class="blank"></li>';
										}
									}
								} else {
									for ($o = 0; $o <= 4; $o++) {
										echo '<li class="blank"></li>';
									}
								}
								?>
								</ul>
								<span><?php echo $result->rates != null ? $result->rates : 0; ?></span>
							</div>
							<span><?php echo $product->category_name; ?></span>
							<h5>
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

                                <?php
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

                                <?php if ($product->onsale == 1 && !empty($product->onsale_price)) { ?>
                                    
									<?php

									if ($target_con_rate > 1) {
										$price = $product->onsale_price * $target_con_rate;
										echo(($position1 == 0) ? $currency1 . " " . number_format($price, 2, '.', ',') : number_format($price, 2, '.', ',') . " " . $currency1);
									}
									if ($target_con_rate <= 1) {
										$price = $product->onsale_price * $target_con_rate;
										echo(($position1 == 0) ? $currency1 . " " . number_format($price, 2, '.', ',') : number_format($price, 2, '.', ',') . " " . $currency1);
									}
									?>
                                    <del><span class="amount">
									<?php
									if ($target_con_rate > 1) {
										$price = $product->price * $target_con_rate;
										echo(($position1 == 0) ? $currency1 . " " . number_format($price, 2, '.', ',') : number_format($price, 2, '.', ',') . " " . $currency1);
									}

									if ($target_con_rate <= 1) {
										$price = $product->price * $target_con_rate;
										echo(($position1 == 0) ? $currency1 . " " . number_format($price, 2, '.', ',') : number_format($price, 2, '.', ',') . " " . $currency1);
									}
									?>
									</span></del>
                                    <?php
                                } else {
									if ($target_con_rate > 1) {
									   $price = $product->price * $target_con_rate;
									   echo(($position1 == 0) ? $currency1 . " " . number_format($price, 2, '.', ',') : number_format($price, 2, '.', ',') . " " . $currency1);
								   }

								   if ($target_con_rate <= 1) {
									   $price = $product->price * $target_con_rate;
									   echo(($position1 == 0) ? $currency1 . " " . number_format($price, 2, '.', ',') : number_format($price, 2, '.', ',') . " " . $currency1);
								   }
                                }
                                ?>
							</h5>
							<a onclick="cart_btn(<?php echo $product->product_id.', \''.remove_space($product->product_name).'\','; echo ($product->default_variant)? '\''.$product->default_variant.'\'':'\'nai\'' ;  ?>)" class="btn btn-primary btn-sm radius-1">Buy Now</a>
						</div>
					</div>
				 <?php
					}
                }
                ?>
				<div class="pagination-widget">
					<?php echo $links; ?>
				</div>
			</div>
			
		</div>

	</div>
</section>

<script>
    $(document).ready(function () {
        /*------------------------------------
        Price range slide
        -------------------------------------- */
        $(".price-range").ionRangeSlider({
            type: "double",
            grid: true,
            min: <?php echo $min_value?>,
            max: <?php echo $max_value?>,
            from: <?php if ($from_price == 0) {
                echo 'null';
            } else {
                echo $from_price;
            }?>,
            to: <?php if ($to_price == 0) {
                echo 'null';
            } else {
                echo $to_price;
            }?>,
            prefix: "<?php echo $default_currency_icon;?> ",
            onChange: function (data) {
                //field "search";
                var pattern = /[?]/;
                var URL = location.search;
                var fullURL = document.URL;

                if (pattern.test(URL)) {
                    var $_GET = {};
                    if (document.location.toString().indexOf('?') !== -1) {
                        var query = document.location
                            .toString()
                            // get the query string
                            .replace(/^.*?\?/, '')
                            // and remove any existing hash string (thanks, @vrijdenker)
                            .replace(/#.*$/, '')
                            .split('&');

                        for (var i = 0, l = query.length; i < l; i++) {
                            var aux = decodeURIComponent(query[i]).split('=');
                            $_GET[aux[0]] = aux[1];
                        }
                    }

                    //Get from value by get method
                    if ($_GET['price']) {
                        var fullURL = window.location.href.split('?')[0];
                        var url = window.location.search;
                        url = url.replace("price=" + $_GET['price'], 'price=' + data.from + '-' + data.to);
                        window.location.href = fullURL + url;
                    } else {
                        var url = window.location.search;
                        window.location.href = url + '&price=' + data.from + '-' + data.to;
                    }

                } else {
                    var fullURL = window.location.href.split('?')[0];
                    window.location.href = fullURL.split('?')[0] + '?price=' + data.from + '-' + data.to
                }
            }
        });
        /*------------------------------------
        Product search by size
        -------------------------------------- */
        $('body').on('click', '.size1', function () {
            var size_location = $(this).val();
            window.location.href = size_location;
        });

        /*------------------------------------
        Sort by rating
        -------------------------------------- */
        $('.check_value').on('click', function () {
            var rating_location = $(this).val();
            window.location.href = rating_location;
        });
        /*------------------------------------
        Brand
        -------------------------------------- */
        $('body').on('click', '.brand_class', function () {
            var brand_location = $(this).val();
            window.location.href = brand_location;
        });
		$('body').on('click', '.category_class', function () {
            var brand_location = $(this).val();
            window.location.href = brand_location;
        });
		$('body').on('click', '.price_class', function () {
            var brand_location = $(this).val();
            window.location.href = brand_location;
        });
		$('body').on('change', '.pages_class', function () {
            var brand_location = $(this).val();
            window.location.href = brand_location;
        });
        /*------------------------------------
        BRAND INFO SEARCH
        -------------------------------------- */
        //Brand Search
        $('body').on('keyup', '.brand_search', function () {
            var search_key = $(this).val();
            var category_id = '<?php echo $category_id?>';
            var query_string = '<?php
                $query_string = '';
                $query_string = $this->input->server('QUERY_STRING');
                if ($query_string) {
                    echo $query_string = '?' . $this->input->server('QUERY_STRING');
                } else {
                    echo $query_string = '';
                }
                ?>';
            var brand_url_ids = '<?php echo $this->uri->segment('3')?>';

            $.ajax({
                type: "post",
                async: true,
                url: '<?php echo base_url('website/Category/brand_search')?>',
                data: {
                    search_key: search_key,
                    category_id: category_id,
                    query_string: query_string,
                    brand_url_ids: brand_url_ids
                },
                success: function (data) {
                    console.log(data);
                    $('.brand-cat-scroll').html(data);
                },
                error: function (e) {
                    console.log(e);
                    swal("<?php echo display('request_failed')?> ", "", "warning");

                }
            });
        });
    });
</script>