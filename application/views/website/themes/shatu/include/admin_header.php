<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$CI =& get_instance();
$CI->load->model('Web_settings');
$CI->load->model('Companies');
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
$company_info = $CI->Companies->company_list();
?>

<body class="style-1">
	<header>
        <div class="container">
            <div class="header">
                <div class="logo">
                    <a href="<?php echo base_url() ?>"> <img src="<?php if (isset($Web_settings[0]['logo'])) {
						echo base_url().$Web_settings[0]['logo'];
					} ?>" class="img-responsive" alt="logo"></a>
                </div>
                <div class="menus">
                    <div class="left_nav">
                        <ul>
                            <li class="active"><a href="#">Home</a></li>
                           <?php
							if ($category_list) {
								$i = 1;
								foreach ($category_list as $parent_category) {
									if (10 == $i) {
										break;
									}
									$sub_parent_cat = $this->db->select('*')
									->from('product_category')
									->where('parent_category_id', $parent_category->category_id)
									->order_by('menu_pos')
									->get()
									->result();
									?>

									<li class="width-md menu-item menu-item-has-children animate-dropdown dropdown">
										<a title="<?php echo $parent_category->category_name ?>" data-hover="dropdown"
										   href="<?php
										   echo base_url('category/p/'.remove_space($parent_category->category_name).'/' . $parent_category->category_id) ?>"
										    class="dropdown-toggle text-capitalize" aria-haspopup="true"> <?php echo $parent_category->category_name ?>
											<div class="hover-fix"></div>
										</a>
										<?php if ($sub_parent_cat) { ?>
										<ul aria-expanded="false" class="submenu">
											<?php foreach ($sub_parent_cat as $sub_p_cat) {
												$sub_category = $this->db->select('*')
													->from('product_category')
													->where('parent_category_id', $sub_p_cat->category_id)
													->order_by('menu_pos')
													->get()
													->result();
												?>
												<li>
													<a class="menu-link" <?php if ($sub_category) { ?>  href="#" <?php } else { ?> href="<?php echo base_url('category/p/'.remove_space($sub_p_cat->category_name).'/' . $sub_p_cat->category_id) ?>" <?php } ?>><?php echo $sub_p_cat->category_name;
														if ($sub_category) {
															echo "<i class=\"fa arrow\"></i>";
														} ?> </a>
													<?php if ($sub_category) { ?>
														<ul aria-expanded="false">
															<?php foreach ($sub_category as $sub_cat) { ?>
																<li>
																	<a href="<?php echo base_url('category/p/'.remove_space($sub_cat->category_name).'/' . $sub_cat->category_id) ?>"><?php echo $sub_cat->category_name ?></a>
																</li>
															<?php } ?>
														</ul>
													<?php } ?>
												</li>
											<?php } ?>
										</ul>
									<?php } ?>
									</li>
									<?php
									$i++;
								}
							}
							?>
                            <li><a href="<?php echo base_url('about_us') ?>">About Us</a></li>
                            <li><a href="<?php echo base_url('contact_us') ?>">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="right_nav">
                        <ul>
                            <li><a href="#"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
                        . '/assets/images/icons/search.svg' ?>" alt=""/></a></li>
                            <li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">
									<img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
									. '/assets/images/icons/cart.svg' ?>" alt=""/>
									<div class="nav-label">
										<!--<span class="label-sub">C5art</span>-->
										<span class="icon-tips color4"><?php echo $this->cart->total_items() ?></span>
									</div>
								</a>
								<ul class="dropdown-menu cart w-250 shopping-cart" role="menu">
									<li class="shopping-cart-header">
										<i class="flaticon-shopping-bag extra-icon"></i><span class="badge color4"><?php echo $this->cart->total_items() ?></span>
										<div class="shopping-cart-total">
											<span class="lighter-text"><?php echo display('total')  ?>:</span>
											<span class="main-color-text"><?php echo(($position == 0) ? $currency->currency_icon . ' ' . number_format($this->cart->total(), 2, '.', ',') : number_format($this->cart->total(), 2, '.', ',') . ' ' . $currency->currency_icon) ?></span>
										</div>
									</li>
									<?php
									if ($this->cart->contents()) {
									foreach ($this->cart->contents() as $items): ?>
									<li class="clearfix">
										<img src="<?php echo base_url().$items['options']['image'] ?>" alt="item1" />
										<span class="item-name"><?php echo $items['name']; ?></span>
										<span class="item-price"><?php echo(($position == 0) ? $currency->currency_icon . ' ' . $this->cart->format_number($items['price']) : $this->cart->format_number($items['price']) . ' ' . $currency->currency_icon) ?></span>
										<span class="item-quantity"><?php echo display('quantity')  ?>: <?php echo $items['qty']  ?></span>
										<span class="remove_cart_product pull-right"><a href="#" class="delete_cart_item"
																			 name="<?php echo $items['rowid'] ?>">
												<i class="fa fa-trash"></i>
											</a></span>
									</li>
									<?php endforeach;
									} ?>
									<li class="text-center">
										<a href="<?php echo base_url('view_cart') ?>" class="shopping-cart-btn color4"><?php echo display('view_cart') ?></a>
										<a href="<?php echo base_url('checkout') ?>" class="shopping-cart-btn color4"><?php echo display('checkout') ?></a>
									</li>
								</ul>
							
							</li>
							<?php if ($this->session->userdata('customer_name')) { ?>
								<li class="dropdown hnav-li">
										<a href="#" class="account_btn dropdown-toggle" type="button" id="dropdownMenuButton"
										   data-toggle="dropdown" aria-haspopup="true"
										   aria-expanded="false"><?php echo ucwords($this->session->userdata('customer_name')) ?> <i
													class="fa fa-user-o"></i></a>
										<ul class="dropdown-menu">
											<li>
												<a href="<?php echo base_url('customer/customer_dashboard') ?>"><?php echo display('dashboard') ?></a>
											</li>
											<li><a href="<?php echo base_url('logout') ?>"><?php echo display('logout')
													?></a></li>

										</ul>
								</li>
							<?php }else{ ?>
								<li><a href="<?php echo base_url('login') ?>"><img src="<?php echo base_url() . 'application/views/website/themes/' . $theme
							. '/assets/images/icons/user.svg' ?>" alt=""/></a></li>
							<?php } ?>
							<li class="lang-icon">
								 <?php
								$css = [
									'class' => 'select resizeselect',
									'id' => 'change_language'
								];
								$user_lang = $this->session->userdata('language');
								echo form_dropdown('language', $languages, $user_lang, $css);
								?>
							</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
    if (!empty($this->session->userdata('err_message'))) {
        ?>
        <script>
            Swal({
                position: 'center',
                type: 'warning',
                title: '<?php echo $this->session->userdata('err_message')?>',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
        <?php
        $this->session->unset_userdata('err_message');
    }
    ?>
    <?php
    if (!empty($this->session->userdata('order_completed'))) {
        ?>
        <script>
            Swal({
                position: 'center',
                type: 'success',
                title: '<?php echo $this->session->userdata('order_completed')?>',
                showConfirmButton: false,
                timer: 4000
            }).then((result) => {
                <?php $this->session->unset_userdata('order_completed');  ?>
                location.reload();
            })
        </script>
        <?php

    }
    ?>

    <script>
        //Change currency ajax
        $('body').on('change', '#-change_currency', function () {
            var currency_id = $('#change_currency').val();
            $.ajax({
                type: "post",
                async: true,
                url: '<?php echo base_url('website/Home/change_currency')?>',
                data: {currency_id: currency_id},
                success: function (data) {
                    if (data == 2) {
                        location.reload();
                    } else {
                        location.reload();
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




        //Change language ajax
        $('body').on('change', '#change_language', function () {
            var language = $('#change_language').val();
            $.ajax({
                type: "post",
                async: true,
                url: '<?php echo base_url('website/Home/change_language')?>',
                data: {language: language},
                success: function (data) {
                    if (data == 2) {
                        location.reload();
                    } else {
                        location.reload();
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

    </script>