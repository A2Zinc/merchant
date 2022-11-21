<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->model('Themes');
$theme = $CI->Themes->get_theme();
if ($this->cart->contents()) {
    ?>

    <?php
    if ($this->session->userdata('error_msg')) {
        ?>
        <!--======== Message alert ========-->
        <section class="coupon_area">
            <div class="container">
                <div class="row db coupon_inner text-center" style="color: red">
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <?php
                        $error_msg = $this->session->userdata('error_msg');
                        if ($error_msg) {
                            echo $error_msg;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--======= Message alert ======-->

        <?php
        $this->session->unset_userdata('error_msg');
    }
    if ($this->session->userdata('message')) {
        ?>

        <!--======== Message alert ========-->
        <section class="coupon_area">
            <div class="container">
                <div class="row db coupon_inner text-center" style="color: green">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <?php
                        $message = $this->session->userdata('message');
                        if ($message) {
                            echo $message;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--======= Message alert ======-->
        <?php
        $this->session->unset_userdata('message');
    }
    ?>
    <?php echo form_open('home/update_cart'); ?>

    <div class="cart-list-content">
        <div class="container">
            <div class="-row">
                <div class="-col-sm-12">
                   
                    <div class="shopping-cart-list">
                         <h1>· <?php echo display('cart') ?></h1>
                        <div class="column-labels">
                            <label class="product-details"><?php echo display('product_name') ?></label>
                            <label class="price-title"><?php echo display('price') ?></label>
                            <label class="product-quantity"><?php echo display('quantity') ?></label>
							<label class="total-price-title"><?php echo display('sub_total') ?></label>
                            <label class="product-removal"><?php echo display('delete') ?></label>
                        </div>
                        <?php $i = 1;
                        $cgst = 0;
                        $sgst = 0;
                        $igst = 0;
                        $discount = 0; ?>
                        <?php foreach ($this->cart->contents() as $items): ?>
                            <?php echo form_hidden($i . '[rowid]', $items['rowid']);

                            if (!empty($items['options']['cgst'])) {
                                $cgst = $cgst + ($items['options']['cgst'] * $items['qty']);
                            }

                            if (!empty($items['options']['sgst'])) {
                                $sgst = $sgst + ($items['options']['sgst'] * $items['qty']);
                            }

                            if (!empty($items['options']['igst'])) {
                                $igst = $igst + ($items['options']['igst'] * $items['qty']);
                            }

                            //Calculation for discount
                            if (!empty($items['discount'])) {
                                $discount = $discount + ($items['discount'] * $items['qty']) + $this->session->userdata('coupon_amnt');
                                $this->session->set_userdata('total_discount', $discount);
                            }
                            ?>

                            <div class="product-cart-list">
                                <div class="product-details">
									<img src="<?php echo base_url() . $items['options']['image']; ?>" alt="image">
                                    <div class="product-name"><?php echo $items['name']; ?></div>
                                </div>
                                <div class="cart-product-price"><?php echo(($position == 0) ? $currency . $this->cart->format_number($items['price']) : $this->cart->format_number($items['price']) . $currency) ?></div>
                                <div class="product-quantity">
									<button class="reduced items-count" type="button">
                                        <span class="qty qty-minus" data-dir="dwn">-</span>
                                    </button>
                                    <?php echo form_input(array('class' => 'quantity_input text-center', 'name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
									<button class="increase items-count" type="button">
										<span class="qty qty-plus" data-dir="up">+</span>
                                    </button>
                                    <button type="submit"><i class="fa fa-refresh"
                                                             style="font-size:20px;padding: 0px;"></i>
                                    </button>
                                </div>
								<div class="total-price"><?php echo(($position == 0) ? $currency . $this->cart->format_number($items['subtotal']) : $this->cart->format_number($items['subtotal']) . $currency) ?></div>
                                <div class="product-removal">
                                    <a href="<?php echo base_url('website/home/delete_cart_by_click/' . $items['rowid']) ?>" onclick='return confirm("<?php echo display('are_you_sure_want_to_delete')?>")'>
                                        <i style="font-size: 1.5em" class="fa fa-close" aria-hidden="true"></i>
                                    </a>
                                </div>
                                
                            </div>

                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
    <div class="calculate-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7 col-md-offset-6 col-sm-offset-5">
                    <div class="cart-totals">
                        <h2><?php echo display('cart_total') ?></h2>
                        <div class="cart-totals-border">
                            <div class="totals-item">
                                <label><?php echo display('sub_total') ?></label>
                                <div class="totals-value" id="cart-subtotal">
                                    <?php echo(($position == 0) ? $currency . " " . number_format($this->cart->total(), 2, '.', ',') : number_format($this->cart->total(), 2, '.', ',') . " " . $currency) ?>
                                </div>
                            </div>
                            <?php
                            $coupon_amnt = $this->session->userdata('coupon_amnt');
                            if ($coupon_amnt > 0) {
                                ?>
                                <div class="totals-item">
                                    <label>
                                        <?php echo display('coupon_discount') ?>
                                    </label>
                                    <div class="totals-value">
                                        <?php
                                        if ($coupon_amnt > 0) {
                                            echo(($position == 0) ? $currency . " " . number_format($coupon_amnt, 2, '.', ',') : number_format($coupon_amnt, 2, '.', ',') . " " . $currency);
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            $total_tax = $cgst + $sgst + $igst;
                            if ($total_tax > 0) {
                                ?>
                                <div class="totals-item">
                                    <label><?php echo display('total_tax') ?></label>
                                    <div class="totals-value" id="cart-tax"> <?php
                                        $total_tax = $cgst + $sgst + $igst;
                                        if ($total_tax > 0) {
                                            $total_tax = $cgst + $sgst + $igst;
                                            $this->_cart_contents['total_tax'] = $total_tax;
                                            echo(($position == 0) ? $currency . " " . number_format($total_tax, 2, '.', ',') : number_format($total_tax, 2, '.', ',') . " " . $currency);
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="totals-item totals-item-total">
                                <label><?php echo display('grand_total') ?></label>
                                <div class="totals-value" id="cart-total"><?php
                                    $cart_total = $this->cart->total() + $total_tax - $this->session->userdata('coupon_amnt');
                                    $this->session->set_userdata('cart_total', $cart_total);
                                    $total_amnt = $this->_cart_contents['cart_total'] = $cart_total;
                                    echo(($position == 0) ? $currency . " " . number_format($total_amnt, 2, '.', ',') : number_format($total_amnt, 2, '.', ',') . " " . $currency);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-default color3 text-white checkout"
                           href="<?php echo base_url('checkout') ?>"><?php
                            echo display('checkout') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <!--========== Empty Cart Area ==========-->
    <section class="shopping_cart_area">
        <div class="container">
            <div class="row db empty_cart text-center">
                <img src="<?php echo base_url('application/views/website/themes/' . $theme . '/assets/website/image/oops.png') ?>"
                     alt="oops image">
                <h2 class="page_title"><?php echo display('oops_your_cart_is_empty') ?></h2>
                <a href="<?php echo base_url() ?>"
                   class="base_button btn btn-success"><?php echo display('got_to_shop_now') ?></a>
            </div>
        </div>
    </section>
    <!--========== End Empty Cart Area ==========-->
<?php } ?>
<script>
$(document).ready(function(){
	$(document.body).on('click','.reduced',function(){
		var quantity = $(this).parents('.product-quantity').find('.quantity_input').val();
		if(quantity >1){
			quantity--;
			$(this).parents('.product-quantity').find('.quantity_input').val(quantity);
		}
	})
	$(document.body).on('click','.increase',function(){
		var quantity = $(this).parents('.product-quantity').find('.quantity_input').val();
		//if(quantity >1){
			quantity++;
			$(this).parents('.product-quantity').find('.quantity_input').val(quantity);
		//}
	})
})
</script>
