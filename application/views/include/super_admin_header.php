<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$CI = &get_instance();
$CI->load->model('Soft_settings');
$CI->load->model('Gen_settingm');

$Soft_settings = $CI->Soft_settings->retrieve_setting_editdata();
//$store_wise_products = $CI->Reports->store_wise_product();
//dd($store_wise_products);
$getsitelogo = $CI->Gen_settingm->get_logo_favicon();


$store_wise_products_count = 0;
//if ($store_wise_products) {
//    foreach ($store_wise_products as $store_wise_product) {
//        $product = $store_wise_product['quantity'] - $store_wise_product['sell'];
//        if ($product < 10) {
//            $store_wise_products_count++;
//        }
//    }
//}
?>
<script src="<?php echo base_url(); ?>assets/cashier/sweetalert@2.1.2/sweetalert.min.js"></script>

<nav id="sidebar">
  <div class="sidebar-header">
    <!-- <img style="width: 100px;" src="<?= base_url('assets/') ?>images/logo-bg.svg"> -->

    <!-- <img style="width: 170px;" src="<?= base_url('assets/') ?>images/Liquor-011.png">         -->
    <img style="width: 170px;" src=" <?= base_url() . $getsitelogo['logo'] ?>">
    <!-- <img src="logo1.png" alt="logo"> -->

  </div>
  <div class="side-nav">
    <ul class="categories">
      <li>
        <a class="active" href="<?= base_url('Admin_dashboard') ?>"><svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.9797 16.1143C13.5788 16.1143 13.9782 15.7149 13.9782 15.1158V6.12989C13.9782 5.83036 13.8783 5.53083 13.5788 5.33114L7.58814 0.338937C7.18877 0.0394053 6.68955 0.0394053 6.29017 0.338937L0.299532 5.33114C0.099844 5.53083 0 5.83036 0 6.12989V15.1158C0 15.7149 0.399376 16.1143 0.99844 16.1143H4.9922V11.1221H8.98596V16.1143H12.9797Z" fill="white" />
          </svg><span> Dashboard </span></a>
      </li>
      <?php $segment=$this->uri->segment(1); ?>
        <li><a class="<?php echo in_array($segment, ['Cstore'])?'active':'' ?>" href="<?php echo base_url('merchant/Cstore') ?>"><svg width="14" height="17" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14 3V1C14 0.448 13.552 0 13 0H3C2.448 0 2 0.448 2 1V3L0 6H16L14 3Z"></path>
              <path d="M2 8V15C2 15.552 2.448 16 3 16H6V12H10V16H13C13.552 16 14 15.552 14 15V8H2Z"></path>
            </svg><span>Location</span></a></li>

               
        <li><a class="<?php echo in_array($segment, ['Cterminal'])?'active':'' ?>" href="<?php echo base_url('merchant/Cterminal/manage_store_terminal') ?>"><svg width="14" height="17" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="6" height="6" rx="1" fill="white"></rect>
              <rect y="8" width="6" height="6" rx="1"></rect>
              <rect x="8" width="6" height="6" rx="1"></rect>
              <rect x="8" y="8" width="6" height="6" rx="1"></rect>
            </svg><span>Terminal</span></a></li>

    
    
      <li>
        <a href="<?= base_url('adminlogin/logout') ?>"><svg width="14" height="17" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.2 9.40445L7.5 7.40445C8.4 6.70445 9 5.70445 9 4.50445V3.70445C9 1.80445 7.6 0.104445 5.7 0.00444541C3.7 -0.0955546 2 1.50445 2 3.50445V4.50445C2 5.70445 2.6 6.70445 3.5 7.40445L0.8 9.50445C0.3 9.90444 0 10.5044 0 11.1044V13.0044C0 13.6044 0.4 14.0044 1 14.0044H10C10.6 14.0044 11 13.6044 11 13.0044V11.0044C11 10.4044 10.7 9.80445 10.2 9.40445Z" />
          </svg><span> Logout </span></a>
      </li>





  </div>

  <div>
    <div class="sidebarfooter">
      <p>© Copyright Liquor Wine Time 2020.</p>
      <p>All rights reserved</p>
    </div>
  </div>
</nav>
<!--THIS IS ADDITION PART FOR MODAL -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">

      <div class="modal-body modalscroll">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mt-2 mb-3 "> 
              <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
              <h5 class="text-center">POS TERMINAL</h5>

            </div>
            <!-- <div class="col-md-5 ">
                        <div class="form-group">
                          <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="col-md-5 ">
                        <div class="form-group">
                          <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>
                      </div> -->
          </div>
        </div>

      </div>
      <div class="mb-5">
        <div style="text-align: center;">
          <button type="button" class="btn btn-outline-dark btn-lg customfootercancelbtn w-45" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter2"><i class="fas fa-key button_style1"></i><span class="set">Open cash register/shift</span> </button>
          <button type="button" class="btn btn-outline-dark btn-lg customfootercancelbtn"> <i class="fas fa-file-alt button_style2"></i><span class="set2"> Make Report</span> </button>

        </div>
      </div>
    </div>
  </div>
</div>


<!--MODAL 2-->
<!-- modal-2 -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle center1" id="exampleModalLongTitle">Open cash register/shift</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
      </div>
      <div class="modal-body modalscroll">
        <div class="container">
          <div class="row">
            <div class="col-md-4 price_style text-center">
              <p class="info">$ 12,000</p>

            </div>
            <div class="col-md-6 contain  text-center">

              <p class="mt-5 ">Register started by: Rakesh</p>
              <p class="mb-5 ">Time: 19 Aug 2020 | 22:25:50</p>

            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div style="text-align: center;">
          <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Discard</button>
          <a href="pos.html"> <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Done</button></a>
        </div>

      </div>
    </div>
  </div>
</div>



<!--END ADDITION PART-->
<div id="content">
  <div class="menu-header">
    <button type="button" id="sidebarCollapse" class="btn menu-btn">
      <img src="<?= base_url('assets/') ?>images/menu-left.png">
      <span id="change" class="hidemenu">Hide Menu</span>
    </button>
    <div style="float: right;position: relative;top: 4px;">
      <button size="small" type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success cbtn">POS TERMINAL</button>
      <i class="fas fa-search cicon"></i>
      <i class="fas fa-bell cicon"></i>
      <img class="cimg" src="<?= base_url('assets/') ?>images/avatar.png">
      <span>
        <?= $this->session->userdata("user_name") ?>
      </span>
    </div>
    <!-- <span class="menu-text">Page Title</span> -->
  </div>