<style type="text/css">
    .cash7 {
    width: 100%;
    text-align: center;
    padding: 14px;
}

.cash7 img {
    padding: 0;
}

p.leave99 {
    padding: 0;
}
body{
    background: #F1F1F1;
}
</style>
<link rel="stylesheet" href="<?=base_url()?>assets/flatpickr/flatpickr.min.css">
        <div class="containermain2">
        <div class="row m">
            <!-- <div class="col-md-8  col-xs-4 col-sm-6"> -->
            <div class="logobar ">
              <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
              <?php }else{?>
                <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
              <?php }?>
            </div>
            <!-- </div> -->


            <div class="gg">
                <!-- <div class="col-md-1 col-xs-6 col-sm-6"> -->
                <div>
                    <a><img src="<?php echo base_url(); ?>assets/images/Group 1882.png" alt="" class="mobileimg"></a>
                </div>
                <!-- </div> -->

                <!-- <div class="col-md-3 col-xs-6 col-sm-6"> -->
                <div class="mainscreen">
                    <a href="<?php echo base_url(); ?>cashier">
                        <p class="maindes">MAIN SCREEN</p>
                    </a>

                </div>
            </div>

        </div>
    </div>
            <div class="container m1">

                <div class="row mt-3">
                  <div class="col-md-4 col-sm-6 col-xs-12 ">
                        <div class="cash7">
                            <a class="e_order_one_2" href="<?php echo site_url('cashier/root_eorder') ?>">
                        <img src="<?php echo base_url(); ?>assets/images/4 (2).png" alt=" path" class="path001">
                       <a><p class="leave99">E-Order</p></a>
                       </a>
                       </div>

                 </div>

                 <div class="col-md-4 col-sm-6 col-xs-12 ">
                    <div class="cash7">
                            <a class="e_order_one_2" href="#">
                        <img src="<?php echo base_url(); ?>assets/images/4 (2).png" alt=" path" class="path001">
                       <a><p class="leave99">Mobile</p></a>
                    </a>
                    </div>
                 </div>

                <div class="col-md-4 col-sm-6 col-xs-12 ">
                    <div class="cash7">
                            <a class="e_order_one_2" href="#">
                        <img src="<?php echo base_url(); ?>assets/images/4 (2).png" alt=" path" class="path001">
                       <a><p class="leave99">Vendor</p></a>
                     </div>
                 </div>


              </div>







                </div>
            </div>
